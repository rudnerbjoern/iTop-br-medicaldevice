<?php

/**
 * iTop extension model for Medical DICOM Communication Links.
 *
 * - Prefills organization on object creation using context/source object/user fallback.
 * - Enforces governance checks before persistence to avoid invalid AE-to-AE relationships.
 *
 * @copyright   Copyright (C) 2024-2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/agpl-3.0.en.html
 * @version     2026-01-16
 */

namespace BR\Extension\Medicaldevice\Model;

use Combodo\iTop\Service\Events\EventData;
use cmdbAbstractObject;
use UserRights;
use MetaModel;
use Dict;

/**
 * Represents a logical communication relationship between two DICOM Application Entities (AEs).
 *
 * This class adds:
 * - Defaulting behavior when creating a new link (org_id resolution)
 * - Governance validation during iTop's database "check to write" phase
 */
class _MedicalDicomCommunicationLink extends cmdbAbstractObject
{
    /**
     * Prefill default values when creating a new MedicalDicomCommunicationLink.
     *
     * Primary goal: determine and prefill the owning organization (`org_id`)
     * as early as possible and in a deterministic way, regardless of creation channel.
     *
     * Resolution order:
     *  1) Keep an already prefilled org_id (copy, explicit context, previous logic).
     *  2) Derive org_id from the source object in the creation context (contextual creation).
     *  3) Fallback to the current user's organization (manual/console creation).
     *
     * This hook can be executed for different creation paths (UI, REST, CSV, etc.).
     *
     * @param array $aContextParam iTop context parameters passed by reference
     * @return void
     */
    public function PrefillCreationForm(&$aContextParam): void
    {
        // Keep standard iTop prefill behavior first (important for compatibility)
        parent::PrefillCreationForm($aContextParam);

        // 1) Do not override org_id if it has already been provided
        //    (e.g. duplication/copy, explicit context value, earlier prefill logic)
        if ((int) $this->Get('org_id') > 0) {
            return;
        }

        // Resolved organization id (0 means "not resolved yet")
        $iOrgId = 0;

        // 2) Attempt to derive org_id from the "source object" in the creation context.
        //    This is common when creating the link from a related object's UI action.
        if (
            $iOrgId <= 0
            && isset($aContextParam['source_obj'])
            && is_object($aContextParam['source_obj'])
        ) {
            $oSourceObj = $aContextParam['source_obj'];

            // Only read org_id from the source object if:
            // - it provides a Get() method
            // - the class actually has an org_id attribute (avoid hard assumptions)
            if (
                method_exists($oSourceObj, 'Get')
                && MetaModel::IsValidAttCode(get_class($oSourceObj), 'org_id')
            ) {
                $iOrgId = (int) $oSourceObj->Get('org_id');
            }
        }

        // 3) Final fallback: use the current user's organization.
        //    Useful in contexts without a source object (e.g. manual creation, console usage).
        if ($iOrgId <= 0) {
            $oUser = UserRights::GetUserObject();
            if ($oUser !== null) {
                $iOrgId = (int) $oUser->Get('org_id');
            }
        }

        // Apply the resolved organization to the new object (only if found)
        if ($iOrgId > 0) {
            $this->Set('org_id', $iOrgId);
        }
    }

    /**
     * Validate DICOM communication links before persistence.
     *
     * Intended to be bound to iTop's write-time validation event
     * (typically EVENT_DB_CHECK_TO_WRITE).
     *
     * Purpose: prevent invalid or non-compliant communication relationships
     * between two DICOM Application Entities (AEs).
     *
     * Validation is blocking and applies to all write paths:
     * - UI changes
     * - CSV imports
     * - REST / JSON API operations
     * - Synchronization processes
     *
     * Rules:
     * 1) Source and target AE must not be identical.
     * 2) Source AE must not be SCP-only (because it cannot initiate communication).
     * 3) Target AE must not be SCU-only (because it cannot accept communication as a server).
     *
     * @param \Combodo\iTop\Service\Events\EventData $oEventData Event context provided by iTop
     * @return void
     */
    public function OnMedicalDicomCommunicationLinkCheckToWrite(EventData $oEventData): void
    {
        // --- Read current object state (attributes) -----------------------------------------

        // Foreign keys referencing the involved AEs
        $iSourceId = (int) $this->Get('source_ae_id');
        $iTargetId = (int) $this->Get('target_ae_id');

        // If either endpoint is missing, do not evaluate role governance.
        // Example: UI can transiently unset one side during unlinking; other constraints
        // (nullability/mandatory attributes) will handle invalid final states.
        if ($iSourceId <= 0 || $iTargetId <= 0) {
            return;
        }

        // --- Rule 1: Source and target must not be the same --------------------------------

        // Disallow self-links, because they do not represent a meaningful communication relationship.
        if ($iSourceId === $iTargetId) {
            $this->AddCheckIssue(Dict::S('Class:MedicalDicomCommunicationLink/Error:SourceEqualsTarget'));
            return; // Further role checks are unnecessary when the relationship is invalid anyway
        }

        // --- Rule 2: Source must not be SCP-only -------------------------------------------

        // Load the source AE object (false: do not throw exceptions if not found)
        $oSourceAe = MetaModel::GetObject('MedicalDicomApplicationEntity', $iSourceId, false);

        // SCP-only AEs are server/passive endpoints and cannot be the initiating side of a link.
        if ($oSourceAe !== null && (string) $oSourceAe->Get('role') === 'SCP') {
            // Attach the issue to the source_ae_id field so the UI can highlight it
            $this->AddCheckIssue(
                Dict::S('Class:MedicalDicomCommunicationLink/Error:InvalidSourceRole'),
                'source_ae_id'
            );
        }

        // --- Rule 3: Target must not be SCU-only -------------------------------------------

        // Load the target AE object
        $oTargetAe = MetaModel::GetObject('MedicalDicomApplicationEntity', $iTargetId, false);

        // SCU-only AEs are client/active endpoints and cannot be the receiving "server" side of a link.
        if ($oTargetAe !== null && (string) $oTargetAe->Get('role') === 'SCU') {
            // Attach the issue to the target_ae_id field so the UI can highlight it
            $this->AddCheckIssue(
                Dict::S('Class:MedicalDicomCommunicationLink/Error:InvalidTargetRole'),
                'target_ae_id'
            );
        }

        // $oEventData is currently unused, but kept for iTop event signature compatibility.
    }
}
