<?php

/**
 * @copyright   Copyright (C) 2024 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2024-06-11
 *
 * Localized data
 */

//
// Application Menu
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Menu:MedicalDeviceManagement' => 'Medizingeräte Verwaltung',
    'Menu:MedicalDeviceSpace' => 'Medizingeräte Space',
    'Menu:MedicalDeviceSpace:Devices' => 'Medizingeräte',
    'Menu:MedicalDeviceSpace:Options' => 'Optionen',
    'Menu:MedicalDevice' => 'Medizingeräte',
    'Menu:MedicalDevice+' => 'Medizingeräte',
    'Menu:MedicalDevice:Shortcuts' => 'Shortcuts',
    'Menu:MedicalDevice:Shortcuts+' => '',
));

//
// Typology
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalBrand' => 'Medizinische Marke',
    'Class:MedicalBrand+' => '',
    'Class:MedicalBrand/Attribute:name' => 'Name',
    'Class:MedicalBrand/Attribute:name+' => '',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'Alle Medizinprodukte dieser Marke',
    'Class:MedicalBrand/UniquenessRule:name+' => 'Der Name muss einmalig sein',
    'Class:MedicalBrand/UniquenessRule:name' => 'Diese medizinische Marke existiert bereits',
    'Class:MedicalModel' => 'Medizinisches Modell',
    'Class:MedicalModel+' => '',
    'Class:MedicalModel/Attribute:name' => 'Name',
    'Class:MedicalModel/Attribute:name+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Medizinische Marke',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => 'Medizinische Marke',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Medizinische Marke Name',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => '',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'Alle Medizinprodukte, die diesem Modell entsprechen',
    'Class:MedicalModel/UniquenessRule:name_brand+' => 'Der Name muss für die Marke einzigartig sein',
    'Class:MedicalModel/UniquenessRule:name_brand' => 'dieses Modell existiert bereits für diese Marke',
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
));

//
// Class: MedicalDevice
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDevice' => 'Medizingerät',
    'Class:MedicalDevice+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Medizinische Marke',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Medizinische Marke Name',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Medizinisches Modell',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Medizinisches Modell Name',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => '',
));

//
// Class: MedicalDeviceAnalyser
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceAnalyser' => 'Analysegerät',
    'Class:MedicalDeviceAnalyser+' => '',
));

//
// Class: MedicalDeviceTubeSorter
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceTubeSorter' => 'Probensortierer',
    'Class:MedicalDeviceTubeSorter+' => 'Tube Sorter',
));

//
// Class: MedicalDeviceLiquidHandlingSystem
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Pipettierroboter',
    'Class:MedicalDeviceLiquidHandlingSystem+' => 'Liquid Handling System',
));

//
// Class: MedicalDeviceCentrifuge
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceCentrifuge' => 'Zentrifuge',
    'Class:MedicalDeviceCentrifuge+' => 'Zentrifuge und Schüttler',
));

//
// Class: MedicalDeviceRefrigerator
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceRefrigerator' => 'Kühlschrank',
    'Class:MedicalDeviceRefrigerator+' => 'Kühl- und Gefrierschrank',
));

//
// Class: MedicalDeviceIncubator
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceIncubator' => 'Brutschrank',
    'Class:MedicalDeviceIncubator+' => '',
));

//
// Class: MedicalDeviceSafetyCabinet
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceSafetyCabinet' => 'Sicherheitswerkbank',
    'Class:MedicalDeviceSafetyCabinet+' => 'Safety Cabinet',
));

//
// Class: MedicalDevicePOCT
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDevicePOCT' => 'POCT Gerät',
    'Class:MedicalDevicePOCT+' => 'Point of care testing',
));

//
// Class: MedicalDeviceMicroscope
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalDeviceMicroscope+' => '',
));

//
// Class: MedicalDeviceSamplePreparation
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceSamplePreparation' => 'Probenvorbereitung',
    'Class:MedicalDeviceSamplePreparation+' => 'Geräte zur Probenvorbereitung',
));
