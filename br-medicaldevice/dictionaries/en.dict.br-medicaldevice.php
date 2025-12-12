<?php

/**
 * @copyright   Copyright (C) 2024-2025 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2025-12-12
 *
 * Localized data
 */

//
// Application Menu
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Menu:MedicalDeviceManagement' => 'Medical Device Management',
    'Menu:MedicalDeviceSpace' => 'Medical Device Space',
    'Menu:MedicalDeviceSpace:Devices' => 'Medical Devices',
    'Menu:MedicalDeviceSpace:Options' => 'Options',
    'Menu:MedicalDevice' => 'Medical Devices',
    'Menu:MedicalDevice+' => 'Medical Devices',
    'Menu:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Menu:MedicalDicomApplicationEntity+' => 'DICOM AE',
    'Menu:MedicalDevice:Shortcuts' => 'Shortcuts',
    'Menu:MedicalDevice:Shortcuts+' => '',
));

//
// Typology: MedicalBrand
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalBrand' => 'Medical Brand',
    'Class:MedicalBrand+' => '',
    'Class:MedicalBrand/Attribute:name' => 'Name',
    'Class:MedicalBrand/Attribute:name+' => '',
    'Class:MedicalBrand/Attribute:logo' => 'Logo',
    'Class:MedicalBrand/Attribute:logo+' => '',
    'Class:MedicalBrand/Attribute:medicalmodels_list' => 'Medical Models',
    'Class:MedicalBrand/Attribute:medicalmodels_list+' => 'All the medical models corresponding to this brand',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Medical Devices',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this brand',
    'Class:MedicalBrand/UniquenessRule:name' => 'This medical brand already exists',
));

//
// Typology: MedicalModel
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalModel' => 'Medical Model',
    'Class:MedicalModel+' => '',
    'Class:MedicalModel/ComplementaryName' => 'Brand: %1$s, Type: %2$s',
    'Class:MedicalModel/Attribute:name' => 'Name',
    'Class:MedicalModel/Attribute:name+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Medical Brand',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Medical Brand Name',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => '',
    'Class:MedicalModel/Attribute:picture' => 'Picture',
    'Class:MedicalModel/Attribute:picture+' => '',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Medical Devices',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this model',
    'Class:MedicalModel/Attribute:type' => 'Device type',
    'Class:MedicalModel/Attribute:type+' => '',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice' => 'Medical Device',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice+' => 'Medical Device',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser' => 'Analyser',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser+' => 'Analyser',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge' => 'Centrifuge',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge+' => 'Centrifuge',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator' => 'Incubator',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator+' => 'Incubator',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem' => 'Liquid Handling System',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem+' => 'Liquid Handling System',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope+' => 'Microscope',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE' => 'Medical Imaging Equipment',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE+' => 'Medical Imaging Equipment, like CT, MRI, PET, X-ray',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevicePOCT' => 'POCT device',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevicePOCT+' => 'Point of care testing device',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceRefrigerator' => 'Refrigerator',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceRefrigerator+' => 'Refrigerator and Freezer',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSafetyCabinet' => 'Safety Cabinet',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSafetyCabinet+' => 'Safety Cabinet',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSamplePreparation' => 'Sample Preparation Device',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSamplePreparation+' => 'Sample Preparation Device',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceTubeSorter' => 'Tube Sorter',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceTubeSorter+' => 'Tube Sorter',
    'Class:MedicalModel/UniquenessRule:name_medicalbrand' => 'This model already exists for this brand',
));

//
// Class: MedicalDevice
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDevice' => 'Medical Device',
    'Class:MedicalDevice+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Medical Brand',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Medical Brand Name',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Medical Model',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Medical Model Name',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => '',
));

//
// Devices
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceAnalyser' => 'Analyser',
    'Class:MedicalDeviceAnalyser+' => '',
    'Class:MedicalDeviceCentrifuge' => 'Centrifuge',
    'Class:MedicalDeviceCentrifuge+' => '',
    'Class:MedicalDeviceIncubator' => 'Incubator',
    'Class:MedicalDeviceIncubator+' => '',
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Liquid Handling System',
    'Class:MedicalDeviceLiquidHandlingSystem+' => '',
    'Class:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalDeviceMicroscope+' => '',
    'Class:MedicalDeviceMIE' => 'Medical Imaging Equipment',
    'Class:MedicalDeviceMIE+' => 'Medical Imaging Equipment, like CT, MRI, PET, X-ray',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list' => 'DICOM AE(s)',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list+' => 'DICOM application entities linked to this medical imaging equipment',
    'Class:MedicalDevicePOCT' => 'POCT Device',
    'Class:MedicalDevicePOCT+' => 'Point of care testing device',
    'Class:MedicalDeviceRefrigerator' => 'Refrigerator',
    'Class:MedicalDeviceRefrigerator+' => 'Refrigerator and Freezer',
    'Class:MedicalDeviceSafetyCabinet' => 'Safety Cabinet',
    'Class:MedicalDeviceSafetyCabinet+' => '',
    'Class:MedicalDeviceSamplePreparation' => 'Sample Preparation Device',
    'Class:MedicalDeviceSamplePreparation+' => 'Devices for Sample Preparation',
    'Class:MedicalDeviceTubeSorter' => 'Tube Sorter',
    'Class:MedicalDeviceTubeSorter+' => '',
));

//
// Class: MedicalDicomApplicationEntity
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Class:MedicalDicomApplicationEntity+' => 'DICOM Application Entity',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle' => 'AE Title',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle+' => 'Must be 1-16 characters: uppercase letters (A-Z), digits (0-9), or underscore (_). No spaces or special characters allowed.',
    'Class:MedicalDicomApplicationEntity/Attribute:org_id' => 'Organization',
    'Class:MedicalDicomApplicationEntity/Attribute:org_name' => 'Organization Name',
    'Class:MedicalDicomApplicationEntity/Attribute:status' => 'Status',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation' => 'Implementation',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production' => 'Production',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete' => 'Obsolete',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id' => 'Medical Imaging Equipment',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name' => 'Medical Imaging Equipment Name',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id' => 'Functional CI',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id+' => 'Technical host (server or virtual machine) on which the DICOM application entity is running',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name' => 'Functional CI Name',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id' => 'IP Address',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name' => 'IP Address Name',
    'Class:MedicalDicomApplicationEntity/Attribute:port' => 'Port',
    'Class:MedicalDicomApplicationEntity/Attribute:modality' => 'Modality',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT' => 'CT - Computed Tomography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR' => 'MR - Magnetic Resonance',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US' => 'US - Ultrasound',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA' => 'XA - Angiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM' => 'NM - Nuclear Medicine',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR' => 'CR - Computed Radiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX' => 'DX - Digital Radiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT' => 'PT - PET',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC' => 'SC - Secondary Capture',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT' => 'OT - Other',
    'Class:MedicalDicomApplicationEntity/Attribute:role' => 'Role',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH' => 'BOTH',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH+' => 'BOTH',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP' => 'SCP',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP+' => 'Service Class Provider',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU' => 'SCU',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU+' => 'Service Class User',
    'Class:MedicalDicomApplicationEntity/Attribute:description' => 'Description',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle' => 'There is already an AE with the same title in the "$this->org_id_friendlyname$" organization',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port' => 'There is already an AE with the same IP address and port in the "$this->org_id_friendlyname$" organization',
));
