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
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Menu:MedicalDeviceManagement' => 'Medizingeräte-Verwaltung',
    'Menu:MedicalDeviceSpace' => 'Medizingeräte Space',
    'Menu:MedicalDeviceSpace:Devices' => 'Medizingeräte',
    'Menu:MedicalDeviceSpace:Options' => 'Optionen',
    'Menu:MedicalDevice' => 'Medizingeräte',
    'Menu:MedicalDevice+' => 'Medizingeräte',
    'Menu:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Menu:MedicalDicomApplicationEntity+' => 'DICOM AE',
    'Menu:MedicalDevice:Shortcuts' => 'Shortcuts',
    'Menu:MedicalDevice:Shortcuts+' => '',
));

//
// Typology: MedicalBrand
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalBrand' => 'Medizinische Marke',
    'Class:MedicalBrand+' => '',
    'Class:MedicalBrand/Attribute:name' => 'Name',
    'Class:MedicalBrand/Attribute:name+' => '',
    'Class:MedicalBrand/Attribute:logo' => 'Logo',
    'Class:MedicalBrand/Attribute:logo+' => '',
    'Class:MedicalBrand/Attribute:medicalmodels_list' => 'Medizinische Produkte',
    'Class:MedicalBrand/Attribute:medicalmodels_list+' => 'Alle Medizinprodukte dieser Marke',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'Alle Medizingeräte dieser Marke',
    'Class:MedicalBrand/UniquenessRule:name' => 'Diese medizinische Marke existiert bereits',
));

//
// Typology: MedicalModel
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalModel' => 'Medizinisches Produkt',
    'Class:MedicalModel+' => '',
    'Class:MedicalModel/ComplementaryName' => 'Marke: %1$s, Typ: %2$s',
    'Class:MedicalModel/Attribute:name' => 'Name',
    'Class:MedicalModel/Attribute:name+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Medizinische Marke',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => 'Medizinische Marke',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Medizinische Marke Name',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => '',
    'Class:MedicalModel/Attribute:picture' => 'Bild',
    'Class:MedicalModel/Attribute:picture+' => '',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'Alle Medizinprodukte, die diesem Modell entsprechen',
    'Class:MedicalModel/Attribute:type' => 'Gerätetyp',
    'Class:MedicalModel/Attribute:type+' => '',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice' => 'Medizinisches Gerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice+' => 'Medizinisches Gerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser' => 'Analysegerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser+' => 'Analysegerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge' => 'Zentrifuge',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge+' => 'Zentrifuge',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator' => 'Brutschrank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator+' => 'Brutschrank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem' => 'Pipettierroboter',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem+' => 'Liquid Handling System',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope' => 'Mikroskop',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope+' => 'Mikroskop',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE' => 'Medizinisches Bildgebungsgerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE+' => 'Medical Imaging Equipment, z. B. CT, MRT, PET, Röntgen',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevicePOCT' => 'POCT-Gerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevicePOCT+' => 'Point-of-Care-Testgerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceRefrigerator' => 'Kühlschrank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceRefrigerator+' => 'Kühl- und Gefrierschrank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSafetyCabinet' => 'Sicherheitswerkbank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSafetyCabinet+' => 'Sicherheitswerkbank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSamplePreparation' => 'Probenvorbereitung',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSamplePreparation+' => 'Gerät zur Probenvorbereitung',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceTubeSorter' => 'Probensortierer',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceTubeSorter+' => 'Probensortierer',
    'Class:MedicalModel/UniquenessRule:name_medicalbrand' => 'Dieses Modell existiert bereits für diese Marke',
));

//
// Class: MedicalDevice
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDevice' => 'Medizingerät',
    'Class:MedicalDevice+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Medizinische Marke',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Medizinische Marke Name',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Medizinisches Produkt',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Medizinisches Produkt Name',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => '',
));

//
// Devices
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceAnalyser' => 'Analysegerät',
    'Class:MedicalDeviceAnalyser+' => '',
    'Class:MedicalDeviceCentrifuge' => 'Zentrifuge',
    'Class:MedicalDeviceCentrifuge+' => 'Zentrifuge',
    'Class:MedicalDeviceIncubator' => 'Brutschrank',
    'Class:MedicalDeviceIncubator+' => 'Brutschrank',
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Pipettierroboter',
    'Class:MedicalDeviceLiquidHandlingSystem+' => 'Liquid Handling System',
    'Class:MedicalDeviceMicroscope' => 'Mikroskop',
    'Class:MedicalDeviceMicroscope+' => 'Mikroskop',
    'Class:MedicalDeviceMIE' => 'Medizinisches Bildgebungsgerät',
    'Class:MedicalDeviceMIE+' => 'Medical Imaging Equipment, z. B. CT, MRT, PET, Röntgen',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list' => 'DICOM AE(s)',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list+' => 'DICOM Application Entities, die diesem Bildgebungsgerät zugeordnet sind',
    'Class:MedicalDevicePOCT' => 'POCT Gerät',
    'Class:MedicalDevicePOCT+' => 'Point-of-Care-Testing (POCT)',
    'Class:MedicalDeviceRefrigerator' => 'Kühlschrank',
    'Class:MedicalDeviceRefrigerator+' => 'Kühl- und Gefrierschrank',
    'Class:MedicalDeviceSafetyCabinet' => 'Sicherheitswerkbank',
    'Class:MedicalDeviceSafetyCabinet+' => 'Safety Cabinet',
    'Class:MedicalDeviceSamplePreparation' => 'Probenvorbereitung',
    'Class:MedicalDeviceSamplePreparation+' => 'Gerät zur Probenvorbereitung',
    'Class:MedicalDeviceTubeSorter' => 'Probensortierer',
    'Class:MedicalDeviceTubeSorter+' => 'Tube Sorter',
));

//
// Class: MedicalDicomApplicationEntity
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Class:MedicalDicomApplicationEntity+' => 'DICOM Application Entity',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle' => 'AE-Titel',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle+' => '1-16 Zeichen: nur Großbuchstaben (A-Z), Ziffern (0-9) oder Unterstrich (_). Keine Leerzeichen oder Sonderzeichen erlaubt.',
    'Class:MedicalDicomApplicationEntity/Attribute:org_id' => 'Organisation',
    'Class:MedicalDicomApplicationEntity/Attribute:org_name' => 'Organisationsname',
    'Class:MedicalDicomApplicationEntity/Attribute:status' => 'Status',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation' => 'Implementierung',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production' => 'Produktiv',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete' => 'Obsolet',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id' => 'Medizinisches Bildgebungsgerät',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name' => 'Medizinisches Bildgebungsgerät Name',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id' => 'Functional CI',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id+' => 'Technischer Host (Server oder virtuelle Maschine), auf dem die DICOM Application Entity betrieben wird.',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name' => 'Functional CI Name',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id' => 'IP-Adresse',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name' => 'IP-Adresse Name',
    'Class:MedicalDicomApplicationEntity/Attribute:port' => 'Port',
    'Class:MedicalDicomApplicationEntity/Attribute:modality' => 'Modalität',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT' => 'CT - Computertomographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR' => 'MR - Magnetresonanztomographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US' => 'US - Ultraschall',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA' => 'XA - Angiographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM' => 'NM - Nuklearmedizin',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR' => 'CR - Computerradiographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX' => 'DX - Digitale Radiographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT' => 'PT - PET (Positronen-Emissions-Tomographie)',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC' => 'SC - Sekundärerfassung',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT' => 'OT - Andere',
    'Class:MedicalDicomApplicationEntity/Attribute:role' => 'Rolle',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH' => 'BEIDES',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH+' => 'Service Class User und Provider',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP' => 'SCP',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP+' => 'Service Class Provider (Empfänger)',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU' => 'SCU',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU+' => 'Service Class User (Sender)',
    'Class:MedicalDicomApplicationEntity/Attribute:description' => 'Beschreibung',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle' => 'Es existiert bereits eine AE mit demselben Titel in der Organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port' => 'Es existiert bereits eine AE mit derselben IP-Adresse und demselben Port in der Organisation "$this->org_id_friendlyname$"',
));
