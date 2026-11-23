<?php

/**
 * Registers the optional DICOM flow bridge and its setup installer.
 */

SetupWebPage::AddModule(
    __FILE__,
    'br-medicaldevice-bridge-for-dataflows/1.0.0',
    [
        'label' => 'Medical Devices - DICOM data flows',
        'category' => 'business',
        'dependencies' => ['br-medicaldevice/3.2.7', 'itop-flow-map/3.3.0'],
        'mandatory' => false,
        'visible' => true,
        'auto_select' => 'SetupInfo::ModuleIsSelected("br-medicaldevice") && SetupInfo::ModuleIsSelected("itop-flow-map")',
        'installer' => 'MedicalDicomFlowInstaller',
        'datamodel' => [
            'src/Service/MedicalDicomFlowSync.php',
            'src/Event/MedicalDicomFlowListener.php',
            'src/BackgroundProcess/MedicalDicomFlowRepair.php',
        ],
        'webservice' => [],
        'data.struct' => [],
        'data.sample' => [],
        'doc.manual_setup' => '',
        'doc.more_information' => '',
        'settings' => [],
    ]
);

if (!class_exists('MedicalDicomFlowInstaller', false) && class_exists('ModuleInstallerAPI')) {
    /**
     * Backfills flows for DICOM links during iTop setup.
     *
     * @copyright   Copyright (C) 2026 Björn Rudner
     * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
     * @disregard P1009 ModuleInstallerAPI is provided by iTop setup.
     */
    final class MedicalDicomFlowInstaller extends ModuleInstallerAPI
    {
        /**
         * Reconciles existing DICOM links after schema creation and logs the totals.
         *
         * @disregard P1009 Config is provided by iTop setup.
         */
        public static function AfterDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
        {
            $summary = \BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync::reconcileAll();
            /** @disregard P1009 SetupLog is provided by iTop setup. */
            SetupLog::Info('DICOM flow reconciliation: '.json_encode($summary, JSON_THROW_ON_ERROR));
        }
    }
}
