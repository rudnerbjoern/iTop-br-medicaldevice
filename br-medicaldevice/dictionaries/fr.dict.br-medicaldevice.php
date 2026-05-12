<?php

/**
 * @copyright   Copyright (C) 2024-2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2026-05-11
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
    'Menu:MedicalDeviceSpace:Dicom' => 'DICOM',
    'Menu:MedicalDeviceSpace:Options' => 'Options',
    'Menu:MedicalDevice' => 'Dispositifs médicaux',
    'Menu:MedicalDevice+' => 'Dispositifs médicaux',
    'Menu:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Menu:MedicalDicomApplicationEntity+' => 'DICOM AE',
    'Menu:MedicalDevice:Shortcuts' => 'Raccourcis',
    'Menu:MedicalDevice:Shortcuts+' => 'Accès rapides pour la gestion des dispositifs médicaux.',
));

//
// Typology: MedicalBrand
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalBrand' => 'Marque médicale',
    'Class:MedicalBrand+' => 'Fabricant ou marque de dispositifs et de modèles médicaux.',
    'Class:MedicalBrand/Attribute:name' => 'Nom',
    'Class:MedicalBrand/Attribute:name+' => 'Nom de la marque médicale.',
    'Class:MedicalBrand/Attribute:logo' => 'Logo',
    'Class:MedicalBrand/Attribute:logo+' => 'Logo de la marque médicale.',
    'Class:MedicalBrand/Attribute:medicalmodels_list' => 'Modèles médicaux',
    'Class:MedicalBrand/Attribute:medicalmodels_list+' => 'Tous les modèles médicaux correspondant à cette marque',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Dispositifs médicaux',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'Tous les dispositifs médicaux correspondant à cette marque',
    'Class:MedicalBrand/UniquenessRule:name' => 'Cette marque médicale existe déjà',
    'Class:MedicalBrand/UniquenessRule:name+' => 'Le nom de la marque doit être unique.',
));

//
// Typology: MedicalModel
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalModel' => 'Modèle médical',
    'Class:MedicalModel+' => 'Modèle de dispositif médical associé à une marque médicale.',
    'Class:MedicalModel/ComplementaryName' => 'Marque: %1$s, Type: %2$s',
    'Class:MedicalModel/Attribute:name' => 'Nom',
    'Class:MedicalModel/Attribute:name+' => 'Nom du modèle médical.',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Marque médicale',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => 'Marque à laquelle ce modèle médical appartient.',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Marque médicale Nom',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => 'Nom de la marque à laquelle ce modèle médical appartient.',
    'Class:MedicalModel/Attribute:picture' => 'Image',
    'Class:MedicalModel/Attribute:picture+' => 'Image du modèle médical.',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Dispositifs médicaux',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'Tous les dispositifs médicaux correspondant à ce modèle',
    'Class:MedicalModel/Attribute:type' => 'Type de dispositif',
    'Class:MedicalModel/Attribute:type+' => 'Type de dispositif médical représenté par ce modèle.',
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
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE+' => 'Équipement d’imagerie médicale, comme CT, IRM, TEP ou radiographie',
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
    'Class:MedicalModel/UniquenessRule:name_medicalbrand' => 'Le nom doit être unique au sein de la marque',
    'Class:MedicalModel/UniquenessRule:name_medicalbrand+' => 'La combinaison du nom du modèle et de la marque doit être unique.',
));

//
// Class: MedicalDevice
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalDevice' => 'Dispositif médical',
    'Class:MedicalDevice+' => 'Dispositif médical générique géré dans la CMDB.',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Marque médicale',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => 'Marque du dispositif médical.',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Marque médicale Nom',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => 'Nom de la marque du dispositif médical.',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Modèle médical',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => 'Modèle du dispositif médical.',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Modèle médical Nom',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => 'Nom du modèle du dispositif médical.',
));

//
// Devices
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalDeviceAnalyser' => 'Analyseur',
    'Class:MedicalDeviceAnalyser+' => 'Analyseur médical utilisé pour les processus de diagnostic ou de laboratoire',
    'Class:MedicalDeviceCentrifuge' => 'Centrifugeuse',
    'Class:MedicalDeviceCentrifuge+' => 'Centrifugeuse médicale ou de laboratoire',
    'Class:MedicalDeviceIncubator' => 'Incubateur',
    'Class:MedicalDeviceIncubator+' => 'Incubateur médical ou de laboratoire',
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Système de manipulation de liquides',
    'Class:MedicalDeviceLiquidHandlingSystem+' => 'Système automatisé de manipulation des liquides',
    'Class:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalDeviceMicroscope+' => 'Microscope médical ou de laboratoire',
    'Class:MedicalDeviceMIE' => 'Équipement d’imagerie médicale',
    'Class:MedicalDeviceMIE+' => 'Équipement d’imagerie médicale, comme CT, IRM, TEP, rayon X',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list' => 'DICOM AE(s)',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list+' => 'Entités d’application DICOM liées à cet équipement d’imagerie médicale',
    'Class:MedicalDevicePOCT' => 'Appareil POCT',
    'Class:MedicalDevicePOCT+' => 'Appareil de test au point de soin',
    'Class:MedicalDeviceRefrigerator' => 'Réfrigérateur',
    'Class:MedicalDeviceRefrigerator+' => 'Réfrigérateur et congélateur',
    'Class:MedicalDeviceSafetyCabinet' => 'Armoire de sécurité',
    'Class:MedicalDeviceSafetyCabinet+' => 'Poste de sécurité médical ou de laboratoire',
    'Class:MedicalDeviceSamplePreparation' => 'Appareil de préparation d’échantillons',
    'Class:MedicalDeviceSamplePreparation+' => 'Appareils pour la préparation d’échantillons',
    'Class:MedicalDeviceTubeSorter' => 'Trieur de tubes',
    'Class:MedicalDeviceTubeSorter+' => 'Appareil utilisé pour trier les tubes d’échantillons',
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
    'Class:MedicalDicomApplicationEntity/Attribute:status' => 'État',
    'Class:MedicalDicomApplicationEntity/Attribute:status+' => 'État du cycle de vie de l’entité d’application DICOM.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation' => 'Implémentation',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation+' => 'L’entité d’application DICOM est en cours de mise en œuvre.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production' => 'Production',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production+' => 'L’entité d’application DICOM est utilisée en production.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete' => 'Obsolète',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete+' => 'L’entité d’application DICOM est obsolète et ne doit plus être utilisée.',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id' => 'Équipement d’imagerie médicale',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id+' => 'Équipement d’imagerie médicale auquel cette entité d’application DICOM appartient.',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name' => 'Nom de l’équipement d’imagerie médicale',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name+' => 'Nom de l’équipement d’imagerie médicale lié.',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id' => 'Functional CI',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id+' => 'Hôte technique (serveur ou machine virtuelle) sur lequel l’entité d’application DICOM est exploitée',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name' => 'Nom de la CI fonctionnelle',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name+' => 'Nom de l’hôte technique.',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id' => 'Adresse IP',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id+' => 'Adresse IP utilisée par cette entité d’application DICOM.',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name' => 'Nom de l’adresse IP',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name+' => 'Nom ou FQDN de l’adresse IP liée.',
    'Class:MedicalDicomApplicationEntity/Attribute:port' => 'Port',
    'Class:MedicalDicomApplicationEntity/Attribute:port+' => 'Port TCP utilisé par cette entité d’application DICOM.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol' => 'Type de port / Protocole',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol+' => 'Type de communication DICOM ou protocole utilisé pour ce point de terminaison réseau.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom' => 'DICOM',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom+' => 'Communication DICOM classique via TCP.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom_tls' => 'DICOM TLS',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom_tls+' => 'Communication DICOM via une connexion TCP sécurisée par TLS.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicomweb' => 'DICOMweb',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicomweb+' => 'Communication DICOM basée sur le Web, par exemple QIDO-RS, WADO-RS ou STOW-RS.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:other' => 'Autre',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:other+' => 'Autre type de communication ou type spécifique au projet.',
    'Class:MedicalDicomApplicationEntity/Attribute:endpoint_url' => 'URL du point de terminaison',
    'Class:MedicalDicomApplicationEntity/Attribute:endpoint_url+' => 'URL de base du point de terminaison DICOMweb. Uniquement pertinente lorsque DICOMweb est utilisé comme protocole.',
    'Class:MedicalDicomApplicationEntity/Attribute:modality' => 'Modalité',
    'Class:MedicalDicomApplicationEntity/Attribute:modality+' => 'Modalité DICOM fournie ou utilisée par cette entité d’application.',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT' => 'CT - Tomodensitométrie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT+' => 'Tomodensitométrie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR' => 'MR - Imagerie par résonance magnétique',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR+' => 'Imagerie par résonance magnétique',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US' => 'US - Échographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US+' => 'Échographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA' => 'XA - Angiographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA+' => 'Angiographie',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM' => 'NM - Médecine nucléaire',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM+' => 'Médecine nucléaire',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR' => 'CR - Radiographie informatisée',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR+' => 'Radiographie informatisée',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX' => 'DX - Radiographie numérique',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX+' => 'Radiographie numérique',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT' => 'PT - TEP (Tomographie par émission de positons)',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT+' => 'Tomographie par émission de positons',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC' => 'SC - Capture secondaire',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC+' => 'Capture secondaire',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT' => 'OT - Autre',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT+' => 'Autre modalité DICOM',
    'Class:MedicalDicomApplicationEntity/Attribute:role' => 'Rôle',
    'Class:MedicalDicomApplicationEntity/Attribute:role+' => 'Rôle réseau DICOM de cette entité d’application.',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH' => 'LES DEUX',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH+' => 'Utilisateur et fournisseur de classe de service',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP' => 'SCP',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP+' => 'Fournisseur de classe de service',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU' => 'SCU',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU+' => 'Utilisateur de classe de service',
    'Class:MedicalDicomApplicationEntity/Attribute:description' => 'Description',
    'Class:MedicalDicomApplicationEntity/Attribute:description+' => 'Description complémentaire de l’entité d’application DICOM.',
    'Class:MedicalDicomApplicationEntity/Attribute:outgoing_links_list' => 'Liens DICOM sortants',
    'Class:MedicalDicomApplicationEntity/Attribute:outgoing_links_list+' => 'Liens de communication DICOM approuvés initiés par cette entité d’application.',
    'Class:MedicalDicomApplicationEntity/Attribute:incoming_links_list' => 'Liens DICOM entrants',
    'Class:MedicalDicomApplicationEntity/Attribute:incoming_links_list+' => 'Liens de communication DICOM approuvés ciblant cette entité d’application.',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle' => 'Il existe déjà une AE avec le même titre dans l’organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle+' => 'Le titre AE doit être unique',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port' => 'Il existe déjà une AE avec la même adresse IP et le même port dans l’organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port+' => 'La combinaison adresse IP + port doit être unique',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresIP' => 'Pour le rôle SCU ou LES DEUX, une adresse IP est requise.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresPort' => 'Pour le rôle SCU ou LES DEUX, un port est requis.',
    'Class:MedicalDicomApplicationEntity/Error:PortOutOfRange' => 'Le port doit être compris entre 1 et 65535.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresModality' => 'Pour le rôle SCU ou LES DEUX, une modalité doit être renseignée.',
    'Class:MedicalDicomApplicationEntity/Error:DicomwebRequiresEndpointUrl' => 'Une URL de point de terminaison doit être indiquée pour DICOMweb.',
));

//
// Class: MedicalDicomCommunicationLink
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MedicalDicomCommunicationLink' => 'Lien de communication DICOM',
    'Class:MedicalDicomCommunicationLink+' => 'Définit une relation de communication approuvée entre deux entités d’application DICOM.',
    'Class:MedicalDicomCommunicationLink/Attribute:org_id' => 'Organisation',
    'Class:MedicalDicomCommunicationLink/Attribute:org_id+' => 'Organisation dans laquelle ce lien de communication DICOM est gouverné.',
    'Class:MedicalDicomCommunicationLink/Attribute:org_name' => 'Nom de l’organisation',
    'Class:MedicalDicomCommunicationLink/Attribute:org_name+' => 'Nom de l’organisation qui gouverne ce lien de communication.',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_id' => 'AE DICOM source',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_id+' => 'Entité d’application DICOM initiant la communication.',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_name' => 'Titre AE source',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_name+' => 'Titre AE de l’entité d’application DICOM source.',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_id' => 'AE DICOM cible',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_id+' => 'Entité d’application DICOM recevant la communication.',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_name' => 'Titre AE cible',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_name+' => 'Titre AE de l’entité d’application DICOM cible.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction' => 'Sens de communication',
    'Class:MedicalDicomCommunicationLink/Attribute:direction+' => 'Définit le mode de communication entre la source et la cible.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PUSH' => 'Push',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PUSH+' => 'La source envoie des données vers la cible.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PULL' => 'Pull',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PULL+' => 'La source récupère des données depuis la cible.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:BIDIR' => 'Bidirectionnel',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:BIDIR+' => 'La communication est approuvée dans les deux sens.',
    'Class:MedicalDicomCommunicationLink/Attribute:status' => 'Statut',
    'Class:MedicalDicomCommunicationLink/Attribute:status+' => 'Statut du cycle de vie du lien de communication DICOM.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:planned' => 'Planifié',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:planned+' => 'Le lien de communication est planifié.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:approved' => 'Approuvé',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:approved+' => 'Le lien de communication est approuvé.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:production' => 'Production',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:production+' => 'Le lien de communication est utilisé en production.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:deprecated' => 'Obsolescent',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:deprecated+' => 'Le lien de communication est déconseillé et doit être remplacé.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:obsolete' => 'Obsolète',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:obsolete+' => 'Le lien de communication est obsolète et ne doit plus être utilisé.',
    'Class:MedicalDicomCommunicationLink/Attribute:description' => 'Description',
    'Class:MedicalDicomCommunicationLink/Attribute:description+' => 'Description complémentaire du lien de communication DICOM.',
    'Class:MedicalDicomCommunicationLink/UniquenessRule:unique_link_per_org' => 'Ce lien de communication DICOM existe déjà dans l’organisation.',
    'Class:MedicalDicomCommunicationLink/UniquenessRule:unique_link_per_org+' => 'La même combinaison source, cible et sens doit être unique dans l’organisation.',
    'Class:MedicalDicomCommunicationLink/Error:SourceEqualsTarget' => 'La source et la cible ne doivent pas être la même entité d’application DICOM.',
    'Class:MedicalDicomCommunicationLink/Error:InvalidSourceRole' => 'L’entité DICOM source ne doit pas être configurée uniquement comme SCP.',
    'Class:MedicalDicomCommunicationLink/Error:InvalidTargetRole' => 'L’entité DICOM cible ne doit pas être configurée uniquement comme SCU.',
));
