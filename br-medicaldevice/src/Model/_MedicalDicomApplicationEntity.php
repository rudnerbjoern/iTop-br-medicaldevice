<?php

/**
 * iTop extension model for Medical DICOM Application Entities (AE).
 *
 * - Prefills organization on object creation based on the current user.
 * - Enforces DICOM governance rules at write time to ensure technically valid configurations.
 *
 * @copyright   Copyright (C) 2024-2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/agpl-3.0.en.html
 * @version     2026-01-16
 */

namespace BR\Extension\Medicaldevice\Model;

use Combodo\iTop\Service\Events\EventData;
use cmdbAbstractObject;
use UserRights;
use Dict;

/**
 * Class representing a DICOM Application Entity (AE) in iTop.
 *
 * This class adds:
 * - Defaulting behavior when creating a new AE record (org prefill)
 * - Governance validation during the database "check to write" phase
 */
class _MedicalDicomApplicationEntity extends cmdbAbstractObject
{
    /**
     * Prefill default values when opening the creation form.
     *
     * iTop calls this hook when the user creates a new object via the UI.
     * Here we prefill the organization (`org_id`) with the current user's org,
     * which reduces manual input and keeps ownership consistent.
     *
     * Note: This is a convenience/defaulting feature; users may still change
     * the value depending on iTop configuration and permissions.
     *
     * @param array $aContextParam iTop context parameters passed by reference
     * @return void
     */
    public function PrefillCreationForm(&$aContextParam): void
    {
        // Keep the standard iTop behavior first (important for compatibility)
        parent::PrefillCreationForm($aContextParam);

        // Get the currently authenticated iTop user object (may be null in some contexts)
        $oUser = UserRights::GetUserObject();
        if ($oUser !== null) {
            // Assign the user's organization to the new AE record
            $this->Set('org_id', (int) $oUser->Get('org_id'));
        }
    }

    /**
     * Validates governance rules for DICOM Application Entities before persisting changes.
     *
     * This method is intended to be bound to iTop's write-time validation event
     * (typically EVENT_DB_CHECK_TO_WRITE).
     *
     * It ensures that Application Entities configured as *actively communicating*
     * (role SCU or BOTH) have the required network endpoint configuration and
     * basic operational correctness.
     *
     * Applies to all write paths (UI, imports, API, sync), because it runs at
     * the database write validation stage.
     *
     * Governance rules:
     * 1) If role is SCU or BOTH: IP address and port must be set.
     * 2) If a port is set: it must be within the valid port range (1..65535).
     * 3) If role is SCU or BOTH: modality must be set (governance/classification rule).
     *
     * Any issue added via AddCheckIssue() is blocking and prevents persistence.
     *
     * @param \Combodo\iTop\Service\Events\EventData $oEventData Event context provided by iTop
     * @return void
     */
    public function OnMedicalDicomApplicationEntityCheckToWrite(EventData $oEventData): void
    {
        // --- Read current object state (attributes) -----------------------------------------

        // Communication role of the AE:
        // - SCP  = passive endpoint (receives associations)
        // - SCU  = active endpoint (initiates associations)
        // - BOTH = can initiate and receive
        $sRole = (string) $this->Get('role'); // Expected values: 'SCP', 'SCU', 'BOTH'

        // Network endpoint configuration.
        // ipaddress_id is a foreign key to an IP address object in iTop.
        $iIpId = (int) $this->Get('ipaddress_id');

        // Port used by the AE (DICOM commonly 104, 11112, etc., but governance allows any valid port)
        $iPort = (int) $this->Get('port');

        // DICOM modality classification (e.g. CT, MR, US) - may be null depending on iTop storage
        $sMod = $this->Get('modality');

        // Determine whether this AE is required to be "actively reachable/configured"
        // (active roles must have endpoint data)
        $bNeedsEndpoint = in_array($sRole, array('SCU', 'BOTH'), true);

        // --- Rule 1: Active roles require IP and port --------------------------------------

        // For SCU/BOTH we enforce that the endpoint is fully specified.
        // This prevents "active" AEs that cannot actually be used operationally.
        if ($bNeedsEndpoint) {
            // ipaddress_id must reference a valid IP object (id > 0)
            if ($iIpId <= 0) {
                // Use Dict::S() for translatable iTop messages (defined in the dictionary)
                $this->AddCheckIssue(Dict::S('Class:MedicalDicomApplicationEntity/Error:RoleRequiresIP'));
            }

            // Port must be set to a positive number
            if ($iPort <= 0) {
                $this->AddCheckIssue(Dict::S('Class:MedicalDicomApplicationEntity/Error:RoleRequiresPort'));
            }
        }

        // --- Rule 2: Port must be within valid range ---------------------------------------

        // Only validate range when a port is specified (>0).
        // Valid TCP/UDP ports are 1..65535.
        if ($iPort > 0 && ($iPort < 1 || $iPort > 65535)) {
            $this->AddCheckIssue(Dict::S('Class:MedicalDicomApplicationEntity/Error:PortOutOfRange'));
        }

        // --- Rule 3: Active roles should have a modality -----------------------------------

        // Governance/classification rule:
        // For active roles (SCU/BOTH), modality must be provided to support correct
        // clinical/technical classification and downstream governance/reporting.
        //
        // Note: Checking both empty string and null because iTop attributes may return either.
        if ($bNeedsEndpoint && ($sMod === '' || $sMod === null)) {
            $this->AddCheckIssue(Dict::S('Class:MedicalDicomApplicationEntity/Error:RoleRequiresModality'));
        }

        // $oEventData is currently unused, but remains part of the signature for iTop event compatibility.
    }
}
