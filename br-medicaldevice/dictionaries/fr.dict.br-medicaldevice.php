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
Dict::Add('FR FR', 'French', 'Français', array(
    'Menu:MedicalDeviceManagement' => 'Gestion des dispositifs médicaux',
    'Menu:MedicalDeviceSpace' => 'Espace dispositifs médicaux',
    'Menu:MedicalDeviceSpace:Devices' => 'Dispositifs médicaux',
    'Menu:MedicalDeviceSpace:Options' => 'Options',
    'Menu:MedicalDevice' => 'Dispositifs médicaux',
    'Menu:MedicalDevice+' => 'Dispositifs médicaux',
    'Menu:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Menu:MedicalDicomApplicationEntity+' => 'DICOM AE',
    'Menu:MedicalDevice:Shortcuts' => 'Raccourcis',
    'Menu:MedicalDevice:Shortcuts+' => '',
));

//
// Typology: MedicalBrand
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalBrand' => 'Marque médicale',
    'Class:MedicalBrand+' => '',
    'Class:MedicalBrand/Attribute:name' => 'Nom',
    'Class:MedicalBrand/Attribute:name+' => '',
    'Class:MedicalBrand/Attribute:logo' => 'Logo',
    'Class:MedicalBrand/Attribute:logo+' => '',
    'Class:MedicalBrand/Attribute:medicalmodels_list' => 'Modèles médicaux',
    'Class:MedicalBrand/Attribute:medicalmodels_list+' => 'Tous les modèles médicaux correspondant à cette marque',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Dispositifs médicaux',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'Tous les dispositifs médicaux correspondant à cette marque',
    'Class:MedicalBrand/UniquenessRule:name' => 'Cette marque médicale existe déjà',
    'Class:MedicalBrand/UniquenessRule:name+' => 'Le nom doit être unique',
));

//
// Typology: MedicalModel
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalModel' => 'Modèle médical',
    'Class:MedicalModel+' => '',
    'Class:MedicalModel/ComplementaryName' => 'Marque: %1$s, Type: %2$s',
    'Class:MedicalModel/Attribute:name' => 'Nom',
    'Class:MedicalModel/Attribute:name+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Marque médicale',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => '',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Marque médicale Nom',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => '',
    'Class:MedicalModel/Attribute:picture' => 'Image',
    'Class:MedicalModel/Attribute:picture+' => '',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Dispositifs médicaux',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'Tous les dispositifs médicaux correspondant à ce modèle',
    'Class:MedicalModel/Attribute:type' => 'Type de dispositif',
    'Class:MedicalModel/Attribute:type+' => '',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice' => 'Dispositif médical',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice+' => 'Dispositif médical',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser' => 'Analyseur',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser+' => 'Analyseur',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge' => 'Centrifugeuse',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge+' => 'Centrifugeuse',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator' => 'Incubateur',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator+' => 'Incubateur',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem' => 'Système de manipulation de liquides',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem+' => 'Système de manipulation de liquides',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope+' => 'Microscope',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE' => 'Équipement d’imagerie médicale',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE+' => 'Équipement d’imagerie médicale, comme CT, IRM, TEP, rayon X',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevicePOCT' => 'Appareil POCT',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevicePOCT+' => 'Appareil de test au point de soin',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceRefrigerator' => 'Réfrigérateur',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceRefrigerator+' => 'Réfrigérateur et congélateur',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSafetyCabinet' => 'Armoire de sécurité',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSafetyCabinet+' => 'Armoire de sécurité',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSamplePreparation' => 'Appareil de préparation d’échantillons',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceSamplePreparation+' => 'Appareil de préparation d’échantillons',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceTubeSorter' => 'Trieur de tubes',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceTubeSorter+' => 'Trieur de tubes',
    'Class:MedicalModel/UniquenessRule:name_medicalbrand' => 'ce modèle existe déjà pour cette marque',
    'Class:MedicalModel/UniquenessRule:name_medicalbrand+' => 'Le nom doit être unique au sein de la marque',
));

//
// Class: MedicalDevice
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalDevice' => 'Dispositif médical',
    'Class:MedicalDevice+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Marque médicale',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => '',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Marque médicale Nom',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Modèle médical',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => '',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Modèle médical Nom',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => '',
));

//
// Devices
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalDeviceAnalyser' => 'Analyseur',
    'Class:MedicalDeviceAnalyser+' => '',
    'Class:MedicalDeviceCentrifuge' => 'Centrifugeuse',
    'Class:MedicalDeviceCentrifuge+' => '',
    'Class:MedicalDeviceIncubator' => 'Incubateur',
    'Class:MedicalDeviceIncubator+' => '',
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Système de manipulation de liquides',
    'Class:MedicalDeviceLiquidHandlingSystem+' => '',
    'Class:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalDeviceMicroscope+' => '',
    'Class:MedicalDeviceMIE' => 'Équipement d’imagerie médicale',
    'Class:MedicalDeviceMIE+' => 'Équipement d’imagerie médicale, comme CT, IRM, TEP, rayon X',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list' => 'DICOM AE(s)',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list+' => 'Entités d’application DICOM liées à cet équipement d’imagerie médicale',
    'Class:MedicalDevicePOCT' => 'Appareil POCT',
    'Class:MedicalDevicePOCT+' => 'Appareil de test au point de soin',
    'Class:MedicalDeviceRefrigerator' => 'Réfrigérateur',
    'Class:MedicalDeviceRefrigerator+' => 'Réfrigérateur and Freezer',
    'Class:MedicalDeviceSafetyCabinet' => 'Armoire de sécurité',
    'Class:MedicalDeviceSafetyCabinet+' => '',
    'Class:MedicalDeviceSamplePreparation' => 'Appareil de préparation d’échantillons',
    'Class:MedicalDeviceSamplePreparation+' => 'Appareils pour la préparation d’échantillons',
    'Class:MedicalDeviceTubeSorter' => 'Trieur de tubes',
    'Class:MedicalDeviceTubeSorter+' => '',
));

//
// Class: MedicalDicomApplicationEntity
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Class:MedicalDicomApplicationEntity+' => 'Entité d’application DICOM',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle' => 'Titre AE',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle+' => '1 à 16 caractères : lettres majuscules (A-Z), chiffres (0-9) ou soulignement (_). Pas d’espaces ni de caractères spéciaux.',
    'Class:MedicalDicomApplicationEntity/Attribute:org_id' => 'Organisation',
    'Class:MedicalDicomApplicationEntity/Attribute:org_name' => 'Nom de l’organisation',
    'Class:MedicalDicomApplicationEntity/Attribute:status' => 'Etat',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation' => 'Implémentation',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production' => 'Production',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete' => 'Obsolète',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete+' => '',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id' => 'Équipement d’imagerie médicale',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name' => 'Nom de l’équipement d’imagerie médicale',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id' => 'Functional CI',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id+' => 'Hôte technique (serveur ou machine virtuelle) sur lequel l’entité d’application DICOM est exploitée',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name' => 'Nom de la CI fonctionnelle',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id' => 'Adresse IP',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name' => 'Nom de l’adresse IP',
    'Class:MedicalDicomApplicationEntity/Attribute:port' => 'Port',
    'Class:MedicalDicomApplicationEntity/Attribute:modality' => 'Modalité',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT' => 'CT - Tomodensitométrie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR' => 'MR - Imagerie par résonance magnétique',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US' => 'US - Échographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA' => 'XA - Angiographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM' => 'NM - Médecine nucléaire',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR' => 'CR - Radiographie informatisée',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX' => 'DX - Radiographie numérique',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT' => 'PT - TEP (Tomographie par émission de positons)',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC' => 'SC - Capture secondaire',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT' => 'OT - Autre',
    'Class:MedicalDicomApplicationEntity/Attribute:role' => 'Rôle',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH' => 'LES DEUX',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH+' => 'Utilisateur et fournisseur de classe de service',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP' => 'SCP',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP+' => 'Fournisseur de classe de service',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU' => 'SCU',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU+' => 'Utilisateur de classe de service',
    'Class:MedicalDicomApplicationEntity/Attribute:description' => 'Description',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle' => 'Il existe déjà une AE avec le même titre dans l’organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle+' => 'Le titre AE doit être unique',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port' => 'Il existe déjà une AE avec la même adresse IP et le même port dans l’organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port+' => 'La combinaison adresse IP + port doit être unique',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresIP' => 'Pour le rôle SCU ou LES DEUX, une adresse IP est requise.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresPort' => 'Pour le rôle SCU ou LES DEUX, un port est requis.',
    'Class:MedicalDicomApplicationEntity/Error:PortOutOfRange' => 'Le port doit être compris entre 1 et 65535.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresModality' => 'Pour le rôle SCU ou LES DEUX, une modalité doit être renseignée.',
));
