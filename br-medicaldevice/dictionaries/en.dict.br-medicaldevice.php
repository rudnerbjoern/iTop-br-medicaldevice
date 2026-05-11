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
Dict::Add('EN US', 'English', 'English', array(
    'Menu:MedicalDeviceManagement' => 'Medical Device Management',
    'Menu:MedicalDeviceSpace' => 'Medical Device Space',
    'Menu:MedicalDeviceSpace:Devices' => 'Medical Devices',
    'Menu:MedicalDeviceSpace:Dicom' => 'DICOM',
    'Menu:MedicalDeviceSpace:Options' => 'Options',
    'Menu:MedicalDevice' => 'Medical Devices',
    'Menu:MedicalDevice+' => 'Medical Devices',
    'Menu:MedicalDicomApplicationEntity' => 'DICOM AE',
    'Menu:MedicalDicomApplicationEntity+' => 'DICOM AE',
    'Menu:MedicalDevice:Shortcuts' => 'Shortcuts',
    'Menu:MedicalDevice:Shortcuts+' => 'Quick access entries for medical device management.',
));

//
// Typology: MedicalBrand
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalBrand' => 'Medical Brand',
    'Class:MedicalBrand+' => 'Manufacturer or brand of medical devices and models.',
    'Class:MedicalBrand/Attribute:name' => 'Name',
    'Class:MedicalBrand/Attribute:name+' => 'Name of the medical brand.',
    'Class:MedicalBrand/Attribute:logo' => 'Logo',
    'Class:MedicalBrand/Attribute:logo+' => 'Logo of the medical brand.',
    'Class:MedicalBrand/Attribute:medicalmodels_list' => 'Medical Models',
    'Class:MedicalBrand/Attribute:medicalmodels_list+' => 'All the medical models corresponding to this brand',
    'Class:MedicalBrand/Attribute:medicaldevices_list' => 'Medical Devices',
    'Class:MedicalBrand/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this brand',
    'Class:MedicalBrand/UniquenessRule:name' => 'This medical brand already exists',
    'Class:MedicalBrand/UniquenessRule:name+' => 'The brand name must be unique.',
));

//
// Typology: MedicalModel
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalModel' => 'Medical Model',
    'Class:MedicalModel+' => 'Medical device model assigned to a medical brand.',
    'Class:MedicalModel/ComplementaryName' => 'Brand: %1$s, Type: %2$s',
    'Class:MedicalModel/Attribute:name' => 'Name',
    'Class:MedicalModel/Attribute:name+' => 'Name of the medical model.',
    'Class:MedicalModel/Attribute:medicalbrand_id' => 'Medical Brand',
    'Class:MedicalModel/Attribute:medicalbrand_id+' => 'Brand to which this medical model belongs.',
    'Class:MedicalModel/Attribute:medicalbrand_name' => 'Medical Brand Name',
    'Class:MedicalModel/Attribute:medicalbrand_name+' => 'Name of the brand to which this medical model belongs.',
    'Class:MedicalModel/Attribute:picture' => 'Picture',
    'Class:MedicalModel/Attribute:picture+' => 'Picture of the medical model.',
    'Class:MedicalModel/Attribute:medicaldevices_list' => 'Medical Devices',
    'Class:MedicalModel/Attribute:medicaldevices_list+' => 'All the medical devices corresponding to this model',
    'Class:MedicalModel/Attribute:type' => 'Device type',
    'Class:MedicalModel/Attribute:type+' => 'Type of medical device represented by this model.',
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
    'Class:MedicalDevice+' => 'Generic medical device managed in the CMDB.',
    'Class:MedicalDevice/Attribute:medicalbrand_id' => 'Medical Brand',
    'Class:MedicalDevice/Attribute:medicalbrand_id+' => 'Brand of the medical device.',
    'Class:MedicalDevice/Attribute:medicalbrand_name' => 'Medical Brand Name',
    'Class:MedicalDevice/Attribute:medicalbrand_name+' => 'Name of the brand of the medical device.',
    'Class:MedicalDevice/Attribute:medicalmodel_id' => 'Medical Model',
    'Class:MedicalDevice/Attribute:medicalmodel_id+' => 'Model of the medical device.',
    'Class:MedicalDevice/Attribute:medicalmodel_name' => 'Medical Model Name',
    'Class:MedicalDevice/Attribute:medicalmodel_name+' => 'Name of the model of the medical device.',
));

//
// Devices
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDeviceAnalyser' => 'Analyser',
    'Class:MedicalDeviceAnalyser+' => 'Medical analyser device.',
    'Class:MedicalDeviceCentrifuge' => 'Centrifuge',
    'Class:MedicalDeviceCentrifuge+' => 'Medical centrifuge device.',
    'Class:MedicalDeviceIncubator' => 'Incubator',
    'Class:MedicalDeviceIncubator+' => 'Medical incubator device.',
    'Class:MedicalDeviceLiquidHandlingSystem' => 'Liquid Handling System',
    'Class:MedicalDeviceLiquidHandlingSystem+' => 'Device for automated liquid handling.',
    'Class:MedicalDeviceMicroscope' => 'Microscope',
    'Class:MedicalDeviceMicroscope+' => 'Medical microscope device.',
    'Class:MedicalDeviceMIE' => 'Medical Imaging Equipment',
    'Class:MedicalDeviceMIE+' => 'Medical Imaging Equipment, like CT, MRI, PET, X-ray',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list' => 'DICOM AE(s)',
    'Class:MedicalDeviceMIE/Attribute:dicomae_list+' => 'DICOM application entities linked to this medical imaging equipment',
    'Class:MedicalDevicePOCT' => 'POCT Device',
    'Class:MedicalDevicePOCT+' => 'Point of care testing device',
    'Class:MedicalDeviceRefrigerator' => 'Refrigerator',
    'Class:MedicalDeviceRefrigerator+' => 'Refrigerator and Freezer',
    'Class:MedicalDeviceSafetyCabinet' => 'Safety Cabinet',
    'Class:MedicalDeviceSafetyCabinet+' => 'Medical safety cabinet.',
    'Class:MedicalDeviceSamplePreparation' => 'Sample Preparation Device',
    'Class:MedicalDeviceSamplePreparation+' => 'Devices for Sample Preparation',
    'Class:MedicalDeviceTubeSorter' => 'Tube Sorter',
    'Class:MedicalDeviceTubeSorter+' => 'Device for sorting sample tubes.',
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
    'Class:MedicalDicomApplicationEntity/Attribute:org_id+' => 'Organization that owns this DICOM application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:org_name' => 'Organization Name',
    'Class:MedicalDicomApplicationEntity/Attribute:org_name+' => 'Name of the organization that owns this DICOM application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:status' => 'Status',
    'Class:MedicalDicomApplicationEntity/Attribute:status+' => 'Lifecycle status of the DICOM application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation' => 'Implementation',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:implementation+' => 'The DICOM application entity is being implemented.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production' => 'Production',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:production+' => 'The DICOM application entity is in production use.',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete' => 'Obsolete',
    'Class:MedicalDicomApplicationEntity/Attribute:status/Value:obsolete+' => 'The DICOM application entity is obsolete and should no longer be used.',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id' => 'Medical Imaging Equipment',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_id+' => 'Medical imaging equipment to which this DICOM application entity belongs.',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name' => 'Medical Imaging Equipment Name',
    'Class:MedicalDicomApplicationEntity/Attribute:medicaldevicemie_name+' => 'Name of the linked medical imaging equipment.',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id' => 'Functional CI',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_id+' => 'Technical host (server or virtual machine) on which the DICOM application entity is running',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name' => 'Functional CI Name',
    'Class:MedicalDicomApplicationEntity/Attribute:functionalci_name+' => 'Name of the technical host.',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id' => 'IP Address',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_id+' => 'IP address used by this DICOM application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name' => 'IP Address Name',
    'Class:MedicalDicomApplicationEntity/Attribute:ipaddress_name+' => 'Name or FQDN of the linked IP address.',
    'Class:MedicalDicomApplicationEntity/Attribute:port' => 'Port',
    'Class:MedicalDicomApplicationEntity/Attribute:port+' => 'TCP port used by this DICOM application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol' => 'Port Type / Protocol',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol+' => 'Type of DICOM communication or protocol used for this network endpoint.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom' => 'DICOM',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom+' => 'Classic DICOM communication over TCP.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom_tls' => 'DICOM TLS',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicom_tls+' => 'DICOM communication over a TLS-secured TCP connection.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicomweb' => 'DICOMweb',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:dicomweb+' => 'Web-based DICOM communication, e.g. QIDO-RS, WADO-RS or STOW-RS.',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:other' => 'Other',
    'Class:MedicalDicomApplicationEntity/Attribute:protocol/Value:other+' => 'Other or project-specific communication type.',
    'Class:MedicalDicomApplicationEntity/Attribute:modality' => 'Modality',
    'Class:MedicalDicomApplicationEntity/Attribute:modality+' => 'DICOM modality provided or used by this application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT' => 'CT - Computed Tomography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CT+' => 'Computed Tomography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR' => 'MR - Magnetic Resonance',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:MR+' => 'Magnetic Resonance',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US' => 'US - Ultrasound',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:US+' => 'Ultrasound',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA' => 'XA - Angiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:XA+' => 'Angiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM' => 'NM - Nuclear Medicine',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:NM+' => 'Nuclear Medicine',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR' => 'CR - Computed Radiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:CR+' => 'Computed Radiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX' => 'DX - Digital Radiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:DX+' => 'Digital Radiography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT' => 'PT - PET',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:PT+' => 'Positron Emission Tomography',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC' => 'SC - Secondary Capture',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:SC+' => 'Secondary Capture',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT' => 'OT - Other',
    'Class:MedicalDicomApplicationEntity/Attribute:modality/Value:OT+' => 'Other DICOM modality',
    'Class:MedicalDicomApplicationEntity/Attribute:role' => 'Role',
    'Class:MedicalDicomApplicationEntity/Attribute:role+' => 'DICOM network role of this application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH' => 'BOTH',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:BOTH+' => 'Service Class User and Service Class Provider',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP' => 'SCP',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCP+' => 'Service Class Provider',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU' => 'SCU',
    'Class:MedicalDicomApplicationEntity/Attribute:role/Value:SCU+' => 'Service Class User',
    'Class:MedicalDicomApplicationEntity/Attribute:description' => 'Description',
    'Class:MedicalDicomApplicationEntity/Attribute:description+' => 'Additional description of the DICOM application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:outgoing_links_list' => 'Outgoing DICOM Links',
    'Class:MedicalDicomApplicationEntity/Attribute:outgoing_links_list+' => 'Approved DICOM communication links initiated by this application entity.',
    'Class:MedicalDicomApplicationEntity/Attribute:incoming_links_list' => 'Incoming DICOM Links',
    'Class:MedicalDicomApplicationEntity/Attribute:incoming_links_list+' => 'Approved DICOM communication links targeting this application entity.',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle' => 'There is already an AE with the same title in the "$this->org_id_friendlyname$" organization',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_aetitle+' => 'The AE title must be unique within the organization.',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port' => 'There is already an AE with the same IP address and port in the "$this->org_id_friendlyname$" organization',
    'Class:MedicalDicomApplicationEntity/UniquenessRule:no_duplicate_ip_port+' => 'The combination of IP address and port must be unique within the organization.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresIP' => 'For role SCU or BOTH, an IP address is required.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresPort' => 'For role SCU or BOTH, a port is required.',
    'Class:MedicalDicomApplicationEntity/Error:PortOutOfRange' => 'The port must be in the range 1 to 65535.',
    'Class:MedicalDicomApplicationEntity/Error:RoleRequiresModality' => 'For role SCU or BOTH, a modality must be specified.',
));

//
// Class: MedicalDicomCommunicationLink
//
/** @disregard P1009 Undefined type Dict */
Dict::Add('EN US', 'English', 'English', array(
    'Class:MedicalDicomCommunicationLink' => 'DICOM Communication Link',
    'Class:MedicalDicomCommunicationLink+' => 'Defines an approved communication relationship between two DICOM Application Entities.',
    'Class:MedicalDicomCommunicationLink/Attribute:org_id' => 'Organization',
    'Class:MedicalDicomCommunicationLink/Attribute:org_id+' => 'Owning organization within which this DICOM communication link is governed.',
    'Class:MedicalDicomCommunicationLink/Attribute:org_name' => 'Organization Name',
    'Class:MedicalDicomCommunicationLink/Attribute:org_name+' => 'Name of the organization governing this communication link.',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_id' => 'Source DICOM AE',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_id+' => 'DICOM Application Entity initiating the communication.',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_name' => 'Source AE Title',
    'Class:MedicalDicomCommunicationLink/Attribute:source_ae_name+' => 'AE title of the source DICOM application entity.',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_id' => 'Target DICOM AE',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_id+' => 'DICOM Application Entity receiving the communication.',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_name' => 'Target AE Title',
    'Class:MedicalDicomCommunicationLink/Attribute:target_ae_name+' => 'AE title of the target DICOM application entity.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction' => 'Communication Direction',
    'Class:MedicalDicomCommunicationLink/Attribute:direction+' => 'Defines the communication pattern between source and target.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PUSH' => 'Push',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PUSH+' => 'The source sends data to the target.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PULL' => 'Pull',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:PULL+' => 'The source retrieves data from the target.',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:BIDIR' => 'Bidirectional',
    'Class:MedicalDicomCommunicationLink/Attribute:direction/Value:BIDIR+' => 'Communication is approved in both directions.',
    'Class:MedicalDicomCommunicationLink/Attribute:status' => 'Status',
    'Class:MedicalDicomCommunicationLink/Attribute:status+' => 'Lifecycle status of the DICOM communication link.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:planned' => 'Planned',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:planned+' => 'The communication link is planned.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:approved' => 'Approved',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:approved+' => 'The communication link is approved.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:production' => 'Production',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:production+' => 'The communication link is in production use.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:deprecated' => 'Deprecated',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:deprecated+' => 'The communication link is deprecated and should be replaced.',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:obsolete' => 'Obsolete',
    'Class:MedicalDicomCommunicationLink/Attribute:status/Value:obsolete+' => 'The communication link is obsolete and should no longer be used.',
    'Class:MedicalDicomCommunicationLink/Attribute:description' => 'Description',
    'Class:MedicalDicomCommunicationLink/Attribute:description+' => 'Additional description of the DICOM communication link.',
    'Class:MedicalDicomCommunicationLink/UniquenessRule:unique_link_per_org' => 'This DICOM communication link already exists within the organization.',
    'Class:MedicalDicomCommunicationLink/UniquenessRule:unique_link_per_org+' => 'The same source, target and direction combination must be unique within the organization.',
    'Class:MedicalDicomCommunicationLink/Error:SourceEqualsTarget' => 'Source and target must not be the same DICOM Application Entity.',
    'Class:MedicalDicomCommunicationLink/Error:InvalidSourceRole' => 'The source DICOM Application Entity must not be configured as SCP-only.',
    'Class:MedicalDicomCommunicationLink/Error:InvalidTargetRole' => 'The target DICOM Application Entity must not be configured as SCU-only.',
));
