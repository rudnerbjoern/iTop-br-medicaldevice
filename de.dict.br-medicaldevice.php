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

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Menu:MedicalDeviceManagement' => 'Medizingeräte Verwaltung',
    'Menu:MedicalDeviceSpace' => 'Medizingeräte Space',
    'Menu:MedicalDeviceSpace:Devices' => 'Medizingeräte',
    'Menu:MedicalDeviceSpace:Options' => 'Optionen',
));

//
// Class: MedicalDeviceType
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceType' => 'Medizingerätetyp',
    'Class:MedicalDeviceType+' => '',
    'Class:MedicalDeviceType/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalDeviceType/Attribute:medicaldevices_list+' => 'Alle medizinischen Geräte von diesem Typ',
));

//
// Class: MedicalDevice
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDevice' => 'Medizingerät',
    'Class:MedicalDevice+' => '',
    'Class:MedicalDevice/Attribute:medicaldevicetype_id' => 'Medizingerättyp',
    'Class:MedicalDevice/Attribute:medicaldevicetype_id+' => '',
    'Class:MedicalDevice/Attribute:medicaldevicetype_name' => 'Medizingerättyp Name',
    'Class:MedicalDevice/Attribute:medicaldevicetype_name+' => '',
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
    'Class:MedicalDeviceTubeSorter+' => '',
));

//
// Class: MedicalDeviceCentrifuge
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceCentrifuge' => 'Zentrifuge',
    'Class:MedicalDeviceCentrifuge+' => '',
));

//
// Class: MedicalDeviceRefrigerator
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceRefrigerator' => 'Kühlschrank',
    'Class:MedicalDeviceRefrigerator+' => '',
));
