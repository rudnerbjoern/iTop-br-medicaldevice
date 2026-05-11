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
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Menu:MedicalDeviceManagement' => 'Medizingeräte-Verwaltung',
    'Menu:MedicalDeviceSpace' => 'Medizingerätebereich',
    'Menu:MedicalDeviceSpace:Devices' => 'Medizingeräte',
    'Menu:MedicalDeviceSpace:Dicom' => 'DICOM',
    'Menu:MedicalDeviceSpace:Options' => 'Optionen',
    'Menu:MedicalDevice' => 'Medizingeräte',
    'Menu:MedicalDevice+' => 'Medizingeräte',
    'Menu:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Menu:MedicalDicomApplicationEntity+' => 'DICOM AE',
    'Menu:MedicalDevice:Shortcuts' => 'Verknüpfungen',
    'Menu:MedicalDevice:Shortcuts+' => 'Schnellzugriff auf Medizingeräte-Datensätze',
));

//
// Typology: MedicalBrand
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalBrand' => 'Medizinische Marke',
    'Class:MedicalBrand+' => 'Hersteller oder Marke von Medizingeräten und Medizinprodukten.',
    'Class:MedicalBrand/Attribute:name' => 'Name',
    'Class:MedicalBrand/Attribute:name+' => 'Name der medizinischen Marke.',
    'Class:MedicalBrand/Attribute:logo' => 'Logo',
    'Class:MedicalBrand/Attribute:logo+' => 'Logo der medizinischen Marke.',
    'Class:MedicalBrand/Attribute:medicalmodels_list' => 'Medizinische Produkte',
    'Class:MedicalBrand/Attribute:medicalmodels_list+' => 'Alle Medizinprodukte dieser Marke',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'Alle Medizingeräte dieser Marke',
    'Class:MedicalBrand/UniquenessRule:name' => 'Diese medizinische Marke existiert bereits',
    'Class:MedicalBrand/UniquenessRule:name+' => 'Der Markenname muss eindeutig sein.',
));

//
// Typology: MedicalModel
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalModel' => 'Medizinisches Produkt',
    'Class:MedicalModel+' => 'Medizinisches Produktmodell, das einer medizinischen Marke zugeordnet ist.',
    'Class:MedicalModel/ComplementaryName' => 'Marke: %1$s, Typ: %2$s',
    'Class:MedicalModel/Attribute:name' => 'Name',
    'Class:MedicalModel/Attribute:name+' => 'Name des medizinischen Produktmodells.',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Medizinische Marke',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => 'Marke, zu der dieses medizinische Produktmodell gehört.',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Name der medizinischen Marke',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => 'Name der Marke, zu der dieses medizinische Produktmodell gehört.',
    'Class:MedicalModel/Attribute:picture' => 'Bild',
    'Class:MedicalModel/Attribute:picture+' => 'Bild des medizinischen Produktmodells.',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Medizinische Geräte',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'Alle Medizinprodukte, die diesem Modell entsprechen',
    'Class:MedicalModel/Attribute:type' => 'Gerätetyp',
    'Class:MedicalModel/Attribute:type+' => 'Typ des Medizingeräts, den dieses Modell beschreibt.',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice' => 'Medizinisches Gerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDevice+' => 'Medizinisches Gerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser' => 'Analysegerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceAnalyser+' => 'Analysegerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge' => 'Zentrifuge',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceCentrifuge+' => 'Zentrifuge',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator' => 'Brutschrank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceIncubator+' => 'Brutschrank',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem' => 'Pipettierroboter',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceLiquidHandlingSystem+' => 'Pipettierroboter bzw. Liquid-Handling-System',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope' => 'Mikroskop',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMicroscope+' => 'Mikroskop',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE' => 'Medizinisches Bildgebungsgerät',
    'Class:MedicalModel/Attribute:type/Value:MedicalDeviceMIE+' => 'Medizinisches Bildgebungsgerät, z. B. CT, MRT, PET oder Röntgen',
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
    'Class:MedicalDevice+' => 'Generisches Medizingerät in der CMDB.',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Medizinische Marke',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => 'Marke des Medizingeräts.',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Name der medizinischen Marke',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => 'Name der Marke des Medizingeräts.',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Medizinisches Produkt',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => 'Modell des Medizingeräts.',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Name des medizinischen Produktmodells',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => 'Name des Modells des Medizingeräts.',
));

//
// Devices
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDeviceAnalyser' => 'Analysegerät',
    'Class:MedicalDeviceAnalyser+' => 'Medizinisches Analysegerät.',
    'Class:MedicalDeviceCentrifuge' => 'Zentrifuge',
    'Class:MedicalDeviceCentrifuge+' => 'Medizinische Zentrifuge.',
    'Class:MedicalDeviceIncubator' => 'Brutschrank',
    'Class:MedicalDeviceIncubator+' => 'Medizinischer Brutschrank.',
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Pipettierroboter',
    'Class:MedicalDeviceLiquidHandlingSystem+' => 'Gerät für die automatisierte Flüssigkeitshandhabung.',
    'Class:MedicalDeviceMicroscope' => 'Mikroskop',
    'Class:MedicalDeviceMicroscope+' => 'Medizinisches Mikroskop.',
    'Class:MedicalDeviceMIE' => 'Medizinisches Bildgebungsgerät',
    'Class:MedicalDeviceMIE+' => 'Medizinisches Bildgebungsgerät, z. B. CT, MRT, PET oder Röntgen',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list' => 'DICOM-AEs',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list+' => 'DICOM-Anwendungseinheiten, die diesem medizinischen Bildgebungsgerät zugeordnet sind.',
    'Class:MedicalDevicePOCT' => 'POCT-Gerät',
    'Class:MedicalDevicePOCT+' => 'Point-of-Care-Testing (POCT)',
    'Class:MedicalDeviceRefrigerator' => 'Kühlschrank',
    'Class:MedicalDeviceRefrigerator+' => 'Kühl- und Gefrierschrank',
    'Class:MedicalDeviceSafetyCabinet' => 'Sicherheitswerkbank',
    'Class:MedicalDeviceSafetyCabinet+' => 'Medizinische Sicherheitswerkbank.',
    'Class:MedicalDeviceSamplePreparation' => 'Probenvorbereitung',
    'Class:MedicalDeviceSamplePreparation+' => 'Gerät zur Probenvorbereitung',
    'Class:MedicalDeviceTubeSorter' => 'Probensortierer',
    'Class:MedicalDeviceTubeSorter+' => 'Gerät zum Sortieren von Probenröhrchen.',
));

//
// Class: MedicalDicomApplicationEntity
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Class:MedicalDicomApplicationEntity+' => 'DICOM-Anwendungseinheit',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle' => 'AE-Titel',
    'Class:MedicalDicomApplicationEntity/Attribute:aetitle+' => '1-16 Zeichen: nur Großbuchstaben (A-Z), Ziffern (0-9) oder Unterstrich (_). Keine Leerzeichen oder Sonderzeichen erlaubt.',
    'Class:MedicalDicomApplicationEntity/Attribute:org_id' => 'Organisation',
    'Class:MedicalDicomApplicationEntity/Attribute:org_name' => 'Name der Organisation',
    'Class:MedicalDicomApplicationEntity/Attribute:status' => 'Status',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation' => 'Implementierung',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation+' => 'Die DICOM-Anwendungseinheit wird implementiert.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production' => 'Produktiv',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production+' => 'Die DICOM-Anwendungseinheit wird produktiv genutzt.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete' => 'Obsolet',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete+' => 'Die DICOM-Anwendungseinheit ist obsolet und sollte nicht mehr verwendet werden.',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id' => 'Medizinisches Bildgebungsgerät',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name' => 'Medizinisches Bildgebungsgerät (Name)',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id'  => 'Technischer Host',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id+' => 'Technischer Host (Server oder virtuelle Maschine), auf dem die DICOM-Anwendungseinheit betrieben wird.',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name' => 'Technischer Host (Name)',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id' => 'IP-Adresse',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name' => 'Name der IP-Adresse',
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
    'Class:MedicalDicomApplicationEntity/Attribute:description+' => 'Zusätzliche Beschreibung der DICOM-Anwendungseinheit.',
    'Class:MedicalDicomApplicationEntity/Attribute:outgoing_links_list' => 'Ausgehende DICOM-Links',
    'Class:MedicalDicomApplicationEntity/Attribute:outgoing_links_list+' => 'Freigegebene DICOM-Kommunikationsverbindungen, die von dieser Anwendungseinheit initiiert werden.',
    'Class:MedicalDicomApplicationEntity/Attribute:incoming_links_list' => 'Eingehende DICOM-Links',
    'Class:MedicalDicomApplicationEntity/Attribute:incoming_links_list+' => 'Freigegebene DICOM-Kommunikationsverbindungen, die diese Anwendungseinheit als Ziel haben.',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle' => 'Es existiert bereits eine AE mit demselben Titel in der Organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle+' => 'Der AE-Titel muss innerhalb der Organisation eindeutig sein.',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port' => 'Es existiert bereits eine AE mit derselben IP-Adresse und demselben Port in der Organisation "$this->org_id_friendlyname$"',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port+' => 'Die Kombination aus IP-Adresse und Port muss innerhalb der Organisation eindeutig sein.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresIP' => 'Für die Rolle SCU bzw. BEIDES ist eine IP-Adresse erforderlich.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresPort' => 'Für die Rolle SCU bzw. BEIDES ist ein Port erforderlich.',
    'Class:MedicalDicomApplicationEntity/Error:PortOutOfRange' => 'Der Port muss im Bereich 1 bis 65535 liegen.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresModality' => 'Für die Rolle SCU bzw. BEIDES ist eine Modalität anzugeben.',
));

//
// Class: MedicalDicomCommunicationLink
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MedicalDicomCommunicationLink' => 'DICOM-Kommunikationsverbindung',
    'Class:MedicalDicomCommunicationLink+' => 'Definiert eine freigegebene Kommunikationsbeziehung zwischen zwei DICOM-Anwendungseinheiten.',
    'Class:MedicalDicomCommunicationLink/Attribute:org_id' => 'Organisation',
    'Class:MedicalDicomCommunicationLink/Attribute:org_id+' => 'Organisation, innerhalb derer diese DICOM-Kommunikationsverbindung geregelt wird.',
    'Class:MedicalDicomCommunicationLink/Attribute:org_name' => 'Organisationsname',
    'Class:MedicalDicomCommunicationLink/Attribute:org_name+' => 'Name der Organisation, die diese Kommunikationsverbindung regelt.',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_id' => 'Quell-DICOM-AE',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_id+' => 'DICOM-Anwendungseinheit, die die Kommunikation initiiert.',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_name' => 'Quell-AE-Titel',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_name+' => 'AE-Titel der Quell-DICOM-Anwendungseinheit.',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_id' => 'Ziel-DICOM-AE',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_id+' => 'DICOM-Anwendungseinheit, die die Kommunikation empfängt.',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_name' => 'Ziel-AE-Titel',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_name+' => 'AE-Titel der Ziel-DICOM-Anwendungseinheit.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction' => 'Kommunikationsrichtung',
    'Class:MedicalDicomCommunicationLink/Attribute:direction+' => 'Definiert das Kommunikationsmuster zwischen Quelle und Ziel.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PUSH' => 'Push',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PUSH+' => 'Die Quelle sendet Daten an das Ziel.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PULL' => 'Pull',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PULL+' => 'Die Quelle ruft Daten vom Ziel ab.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:BIDIR' => 'Bidirektional',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:BIDIR+' => 'Die Kommunikation ist in beide Richtungen freigegeben.',
    'Class:MedicalDicomCommunicationLink/Attribute:status' => 'Status',
    'Class:MedicalDicomCommunicationLink/Attribute:status+' => 'Status der DICOM-Kommunikationsverbindung.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:planned' => 'Geplant',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:planned+' => 'Die Kommunikationsverbindung ist geplant.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:approved' => 'Freigegeben',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:approved+' => 'Die Kommunikationsverbindung ist freigegeben.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:production' => 'Produktiv',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:production+' => 'Die Kommunikationsverbindung wird produktiv genutzt.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:deprecated' => 'Veraltet',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:deprecated+' => 'Die Kommunikationsverbindung ist veraltet und sollte ersetzt werden.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:obsolete' => 'Obsolet',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:obsolete+' => 'Die Kommunikationsverbindung ist obsolet und sollte nicht mehr verwendet werden.',
    'Class:MedicalDicomCommunicationLink/Attribute:description' => 'Beschreibung',
    'Class:MedicalDicomCommunicationLink/Attribute:description+' => 'Zusätzliche Beschreibung der DICOM-Kommunikationsverbindung.',
    'Class:MedicalDicomCommunicationLink/UniquenessRule:unique_link_per_org' => 'Diese DICOM-Kommunikationsverbindung existiert innerhalb der Organisation bereits.',
    'Class:MedicalDicomCommunicationLink/UniquenessRule:unique_link_per_org+' => 'Die Kombination aus Quelle, Ziel und Richtung muss innerhalb der Organisation eindeutig sein.',
    'Class:MedicalDicomCommunicationLink/Error:SourceEqualsTarget' => 'Quelle und Ziel dürfen nicht dieselbe DICOM-Anwendungseinheit sein.',
    'Class:MedicalDicomCommunicationLink/Error:InvalidSourceRole' => 'Die Quell-DICOM-Anwendungseinheit darf nicht ausschließlich als SCP konfiguriert sein.',
    'Class:MedicalDicomCommunicationLink/Error:InvalidTargetRole' => 'Die Ziel-DICOM-Anwendungseinheit darf nicht ausschließlich als SCU konfiguriert sein.',
));
