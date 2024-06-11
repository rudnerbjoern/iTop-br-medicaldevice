<?php

/**
 * @copyright   Copyright (C) 2024 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2024-05-07
 *
 * Localized data
 */

//
// Application Menu
//

Dict::Add('EN US', 'English', 'English', array(
    'Menu:MedicalDeviceManagement' => 'Medical Device Management',
    'Menu:MedicalDeviceSpace' => 'Medical Device Space',
    'Menu:MedicalDeviceSpace:Devices' => 'Medical Devices',
    'Menu:MedicalDeviceSpace:Options' => 'Options',
    'Menu:MedicalDevice' => 'Medical Devices',
    'Menu:MedicalDevice+' => 'Medical Devices',
    'Menu:MedicalDevice:Shortcuts' => 'Shortcuts',
    'Menu:MedicalDevice:Shortcuts+' => '',
));

//
// Typology
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalBrand' => 'Medical Brand',
    'Class:MedicalBrand+' => '',
    'Class:MedicalBrand/Attribute:name' => 'Name',
    'Class:MedicalBrand/Attribute:name+' => '',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Medical Devices',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this brand',
    'Class:MedicalBrand/UniquenessRule:name+' => 'The name must be unique',
    'Class:MedicalBrand/UniquenessRule:name' => 'This medical brand already exists',
    'Class:MedicalModel' => 'Medical Model',
    'Class:MedicalModel+' => '',
    'Class:MedicalModel/Attribute:name' => 'Name',
    'Class:MedicalModel/Attribute:name+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Medical Brand',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Medical Brand Name',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => '',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Medical Devices',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this model',
    'Class:MedicalModel/UniquenessRule:name_brand+' => 'Name must be unique in the brand',
    'Class:MedicalModel/UniquenessRule:name_brand' => 'this model already exists for this brand',
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
));

//
// Class: MedicalDevice
//

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
// Class: MedicalDeviceAnalyser
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceAnalyser' => 'Analyser',
    'Class:MedicalDeviceAnalyser+' => '',
));

//
// Class: MedicalDeviceTubeSorter
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceTubeSorter' => 'Tube Sorter',
    'Class:MedicalDeviceTubeSorter+' => '',
));

//
// Class: MedicalDeviceLiquidHandlingSystem
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Liquid Handling System',
    'Class:MedicalDeviceLiquidHandlingSystem+' => '',
));

//
// Class: MedicalDeviceCentrifuge
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceCentrifuge' => 'Centrifuge',
    'Class:MedicalDeviceCentrifuge+' => '',
));

//
// Class: MedicalDeviceRefrigerator
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceRefrigerator' => 'Refrigerator',
    'Class:MedicalDeviceRefrigerator+' => 'Refrigerator and Freezer',
));

//
// Class: MedicalDeviceIncubator
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceIncubator' => 'Incubator',
    'Class:MedicalDeviceIncubator+' => '',
));

//
// Class: MedicalDeviceSafetyCabinet
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceSafetyCabinet' => 'Safety Cabinet',
    'Class:MedicalDeviceSafetyCabinet+' => '',
));

//
// Class: MedicalDevicePOCT
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDevicePOCT' => 'POCT Device',
    'Class:MedicalDevicePOCT+' => 'Point of care testing device',
));

//
// Class: MedicalDeviceSamplePreparation
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceSamplePreparation' => 'Sample Preparation',
    'Class:MedicalDeviceSamplePreparation+' => 'Devices for Sample Preparation',
));
