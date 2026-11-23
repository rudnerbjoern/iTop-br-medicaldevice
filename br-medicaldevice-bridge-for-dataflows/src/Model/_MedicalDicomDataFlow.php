<?php

/**
 * Protects flow attributes managed by the owning DICOM communication link.
 *
 * @copyright   Copyright (C) 2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 */

declare(strict_types=1);

namespace BR\Extension\Medicaldevice\DataFlows\Model;

use BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync;
use Combodo\iTop\Service\Events\EventData;
use DataFlow;
use Dict;

/** PHP parent for the iTop model class representing one direction of a DICOM link. */
class _MedicalDicomDataFlow extends DataFlow
{
    /** Restricts creation and edits to managed attributes to the synchronizer for the owning link. */
    public function CheckDicomFlowOwner(EventData $event): void
    {
        if (MedicalDicomFlowSync::writing($this)) {
            return;
        }

        if ($this->IsNew() || array_intersect(array_keys($this->ListChanges()), MedicalDicomFlowSync::MANAGED)) {
            $this->AddCheckIssue(Dict::S('DicomFlow:Managed'));
        }
    }

    /** Allows flow deletion during reconciliation or as part of deleting the owning link. */
    public function CheckDicomFlowDelete(EventData $event): void
    {
        $deletes = $event->Get('deletion_plan')->ListDeletes();
        if (!MedicalDicomFlowSync::writing($this) && !isset($deletes['MedicalDicomCommunicationLink'][$this->Get('dicom_link_id')])) {
            $this->AddDeleteIssue(Dict::S('DicomFlow:Managed'));
        }
    }

    /** Marks the attributes maintained by the owning link as read-only on the flow form. */
    public function SetDicomFlowFlags(EventData $event): void
    {
        foreach (MedicalDicomFlowSync::MANAGED as $attribute) {
            $this->AddAttributeFlags($attribute, OPT_ATT_READONLY);
        }
    }
}
