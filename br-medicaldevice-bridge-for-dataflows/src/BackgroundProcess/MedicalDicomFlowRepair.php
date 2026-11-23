<?php

/**
 * Repairs missed DICOM flow updates in bounded batches.
 *
 * @copyright   Copyright (C) 2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 */

declare(strict_types=1);

namespace BR\Extension\Medicaldevice\DataFlows\BackgroundProcess;

use BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync;
use DBProperty;
use DBObjectSearch;
use DBObjectSet;
use iBackgroundProcess;
use IssueLog;
use Throwable;

/** Resumes the periodic scan from the last processed DICOM link ID. */
final class MedicalDicomFlowRepair implements iBackgroundProcess
{
    private const CURSOR = 'br-medicaldevice-flow-repair-cursor';

    /** Returns the interval between repair runs in seconds. */
    public function GetPeriodicity()
    {
        return 900;
    }

    /**
     * Checks up to 100 links, records individual failures and saves the cursor for the next run.
     *
     * @param int $iTimeLimit Unix timestamp at which processing must stop.
     * @return string Summary of checked links and failures for the cron log.
     */
    public function Process($iTimeLimit)
    {
        $last = (int) DBProperty::GetProperty(self::CURSOR, 0);
        $query = DBObjectSearch::FromOQL('SELECT MedicalDicomCommunicationLink WHERE id > :last');
        $query->AllowAllData();
        $query->SetShowObsoleteData(true);
        $links = new DBObjectSet($query, ['id' => true], ['last' => $last], [], 100);
        $processed = 0;
        $errors = 0;
        while (time() < $iTimeLimit) {
            $link = $links->Fetch();
            if (!$link) {
                if ($processed < 100) {
                    $last = 0;
                }
                break;
            }
            $last = (int) $link->GetKey();
            try {
                MedicalDicomFlowSync::reconcile($last);
            } catch (Throwable $error) {
                ++$errors;
                IssueLog::Error("DICOM flow repair failed for link #$last: ".$error->getMessage());
            }
            ++$processed;
        }
        DBProperty::SetProperty(self::CURSOR, (string) $last);
        return "DICOM links checked: $processed; failures: $errors";
    }
}
