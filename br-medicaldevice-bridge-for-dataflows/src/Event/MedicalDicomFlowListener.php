<?php

/**
 * Handles writes to DICOM links and changes to endpoint assignments.
 *
 * @copyright   Copyright (C) 2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 */

declare(strict_types=1);

namespace BR\Extension\Medicaldevice\DataFlows\Event;

use BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync;
use Combodo\iTop\Service\Events\EventData;
use Combodo\iTop\Service\Events\EventService;
use Combodo\iTop\Service\Events\iEventServiceSetup;
use MedicalDicomCommunicationLink;
use MedicalDicomApplicationEntity;

/** Connects iTop write events on DICOM links and application entities to the flow synchronizer. */
final class MedicalDicomFlowListener implements iEventServiceSetup
{
    /** Subscribes to after-write events for the two DICOM source classes. */
    public function RegisterEventsAndListeners(): void
    {
        EventService::RegisterListener(EVENT_DB_AFTER_WRITE, [$this, 'SyncDicomFlowLink'], MedicalDicomCommunicationLink::class, fPriority: 30);
        EventService::RegisterListener(EVENT_DB_AFTER_WRITE, [$this, 'SyncDicomFlowEndpoints'], MedicalDicomApplicationEntity::class, fPriority: 30);
    }

    /** Reconciles the flows owned by the link that was just saved. */
    public function SyncDicomFlowLink(EventData $event): void
    {
        MedicalDicomFlowSync::reconcile((int) $event->Get('object')->GetKey());
    }

    /** Rechecks affected links when an existing endpoint changes host or organization. */
    public function SyncDicomFlowEndpoints(EventData $event): void
    {
        if ($event->Get('is_new')) {
            return;
        }

        $changed = array_keys($event->Get('changes'));
        if (array_intersect($changed, ['functionalci_id', 'medicaldevicemie_id', 'org_id'])) {
            MedicalDicomFlowSync::endpointChanged((int) $event->Get('object')->GetKey());
        }
    }
}
