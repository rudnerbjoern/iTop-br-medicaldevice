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
));

//
// Class: MedicalDeviceType
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceType' => 'Medical Device Type',
    'Class:MedicalDeviceType+' => '',
    'Class:MedicalDeviceType/Attribute:medicaldevices_list' => 'Medical devices',
    'Class:MedicalDeviceType/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this type',
));

//
// Class: MedicalDevice
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDevice' => 'Medical Device',
    'Class:MedicalDevice+' => '',
    'Class:MedicalDevice/Attribute:medicaldevicetype_id' => 'Medical Device Type',
    'Class:MedicalDevice/Attribute:medicaldevicetype_id+' => '',
    'Class:MedicalDevice/Attribute:medicaldevicetype_name' => 'Medical Device Type Name',
    'Class:MedicalDevice/Attribute:medicaldevicetype_name+' => '',
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
    'Class:MedicalDeviceRefrigerator+' => '',
));
