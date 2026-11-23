<?php

/**
 * Synchronizes native data flows with their owning DICOM link.
 *
 * @copyright   Copyright (C) 2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 */

declare(strict_types=1);

namespace BR\Extension\Medicaldevice\DataFlows\Service;

use CMDBSource;
use DataFlow;
use DBObject;
use DBObjectSearch;
use DBObjectSet;
use IssueLog;
use MetaModel;
use RuntimeException;
use SetupLog;
use Throwable;
use UnexpectedValueException;

/** Derives directional flows from DICOM links for setup, write events and scheduled repairs. */
final class MedicalDicomFlowSync
{
    /** Flow attributes whose values are controlled by the owning DICOM link. */
    public const MANAGED = ['dicom_link_id', 'dicom_leg', 'source_id', 'destination_id', 'org_id', 'name', 'description', 'status'];
    /** ID of the link currently allowed to write its managed flows. */
    private static ?int $writingLink = null;

    /** Checks whether the current reconciliation is authorized to modify this flow. */
    public static function writing(DBObject $flow): bool
    {
        return self::$writingLink !== null && self::$writingLink === (int) $flow->Get('dicom_link_id');
    }

    /** Selects all matching records, including obsolete objects, independently of the current user’s filters. */
    private static function records(string $query, array $args = []): DBObjectSet
    {
        // Selection must include inactive records independently of the editor's UI preferences.
        $filter = DBObjectSearch::FromOQL($query);
        $filter->AllowAllData();
        $filter->SetShowObsoleteData(true);
        return new DBObjectSet($filter, [], $args);
    }

    /**
     * Reconciles every DICOM link and totals the results across links.
     *
     * @param bool $preview Count the required flow changes without persisting them.
     * @return array{create: int, update: int, delete: int, review: int}
     */
    public static function reconcileAll(bool $preview = false): array
    {
        $summary = ['create' => 0, 'update' => 0, 'delete' => 0, 'review' => 0];
        $links = self::records('SELECT MedicalDicomCommunicationLink');
        while ($link = $links->Fetch()) {
            foreach (self::reconcile((int) $link->GetKey(), $preview) as $key => $count) {
                $summary[$key] += $count;
            }
        }
        return $summary;
    }

    /** Reconciles each link that uses the changed application entity as its source or target. */
    public static function endpointChanged(int $id): void
    {
        $links = self::records('SELECT MedicalDicomCommunicationLink WHERE source_ae_id = :ae OR target_ae_id = :ae', ['ae' => $id]);
        while ($link = $links->Fetch()) {
            self::reconcile((int) $link->GetKey());
        }
    }

    /** Returns the unique host CI in the link’s organization, or zero when the endpoint cannot be resolved. */
    private static function ci(int $aeId, int $org): int
    {
        $ae = MetaModel::GetObject('MedicalDicomApplicationEntity', $aeId, false, true);
        if (!$ae || (int) $ae->Get('org_id') !== $org) {
            return 0;
        }
        $ids = array_unique(array_filter([(int) $ae->Get('functionalci_id'), (int) $ae->Get('medicaldevicemie_id')]));
        if (count($ids) !== 1) {
            return 0;
        }
        $id = (int) reset($ids);
        $ci = MetaModel::GetObject('FunctionalCI', $id, false, true);
        return $ci && !($ci instanceof DataFlow) && (int) $ci->Get('org_id') === $org ? $id : 0;
    }

    /**
     * Maps the payload direction to ordered source and destination CI IDs.
     * Unresolved endpoints and endpoints on the same host produce no flows.
     *
     * @return array{forward?: array{int, int}, reverse?: array{int, int}}
     * @throws UnexpectedValueException If the direction of a resolved link is unknown.
     */
    public static function legs(string $direction, int $source, int $target): array
    {
        if (!$source || !$target || $source === $target) {
            return [];
        }
        return match ($direction) {
            'PUSH' => ['forward' => [$source, $target]],
            'PULL' => ['reverse' => [$target, $source]],
            'BIDIR' => ['forward' => [$source, $target], 'reverse' => [$target, $source]],
            default => throw new UnexpectedValueException('Unknown DICOM communication direction'),
        };
    }

    /**
     * Locks one link and reconciles all its flows within a transaction or an existing transaction’s savepoint.
     *
     * @param bool $preview Count changes without writing flow records.
     * @return array{create: int, update: int, delete: int, review: int}
     */
    public static function reconcile(int $id, bool $preview = false): array
    {
        $counts = ['create' => 0, 'update' => 0, 'delete' => 0, 'review' => 0];
        // Serialize event, setup and repair callers before reading the current source of truth.
        $table = MetaModel::DBGetTable('MedicalDicomCommunicationLink');
        $key = MetaModel::DBGetKey('MedicalDicomCommunicationLink');
        $nested = CMDBSource::IsInsideTransaction();
        $savepoint = 'dicom_flow_'.$id;
        CMDBSource::Query($nested ? "SAVEPOINT $savepoint" : 'START TRANSACTION');
        try {
            CMDBSource::Query("SELECT `$key` FROM `$table` WHERE `$key` = $id FOR UPDATE");
            $link = MetaModel::GetObject('MedicalDicomCommunicationLink', $id, false, true);
            if ($link) {
                self::apply($link, $preview, $counts);
            }
            CMDBSource::Query($nested ? "RELEASE SAVEPOINT $savepoint" : 'COMMIT');
        } catch (Throwable $error) {
            CMDBSource::Query($nested ? "ROLLBACK TO SAVEPOINT $savepoint" : 'ROLLBACK');
            if ($nested) {
                CMDBSource::Query("RELEASE SAVEPOINT $savepoint");
            }
            throw $error;
        }
        return $counts;
    }

    /**
     * Compares the expected legs with stored flows and counts creations, updates, removals and links requiring review.
     *
     * @param array{create: int, update: int, delete: int, review: int} $counts Result counters updated by reference.
     */
    private static function apply(DBObject $link, bool $preview, array &$counts): void
    {
        $id = (int) $link->GetKey();
        $org = (int) $link->Get('org_id');
        $legs = self::legs($link->Get('direction'), self::ci((int) $link->Get('source_ae_id'), $org),
            self::ci((int) $link->Get('target_ae_id'), $org));
        if (!$legs) {
            $counts['review']++;
            $message = "DICOM link #$id has missing, ambiguous, cross-organization or identical CI endpoints.";
            IssueLog::Warning($message);
            if (class_exists('SetupLog', false)) {
                SetupLog::Warning($message);
            }
        }
        $status = match ($link->Get('status')) {
            'production', 'deprecated' => 'active',
            'planned', 'approved', 'obsolete' => 'inactive',
            default => throw new UnexpectedValueException('Unknown DICOM link status'),
        };
        $rows = self::records('SELECT MedicalDicomDataFlow WHERE dicom_link_id = :link', ['link' => $id]);
        $existing = [];
        while ($flow = $rows->Fetch()) {
            $leg = $flow->Get('dicom_leg');
            if (isset($existing[$leg])) {
                throw new RuntimeException("Duplicate managed flow for DICOM link #$id ($leg)");
            }
            $existing[$leg] = $flow;
        }
        $previous = self::$writingLink;
        self::$writingLink = $id;
        try {
            foreach ($legs as $leg => [$source, $target]) {
                $flow = $existing[$leg] ?? null;
                $new = $flow === null;
                if ($new) {
                    $flow = MetaModel::NewObject('MedicalDicomDataFlow', [
                        'dicom_link_id' => $id, 'dicom_leg' => $leg, 'execution_frequency' => 'unspecified',
                        'source_impact' => 'no', 'destination_impact' => 'no',
                    ]);
                }
                $fields = ['name' => "DICOM #$id ($leg)", 'source_id' => $source, 'destination_id' => $target,
                    'org_id' => $org, 'status' => $status, 'description' => $link->Get('description')];
                foreach ($fields as $attribute => $value) {
                    if ((string) $flow->Get($attribute) !== (string) $value) {
                        $flow->Set($attribute, $value);
                    }
                }
                if ($new || $flow->IsModified()) {
                    $counts[$new ? 'create' : 'update']++;
                    if (!$preview) {
                        $flow->DBWrite();
                    }
                }
                unset($existing[$leg]);
            }
            foreach ($existing as $flow) {
                $counts['delete']++;
                if (!$preview) {
                    $flow->DBDelete();
                }
            }
        } finally {
            self::$writingLink = $previous;
        }
    }
}
