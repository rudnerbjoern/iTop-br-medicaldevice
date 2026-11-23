<?php

/**
 * French labels and messages for DICOM data flows managed by the bridge.
 */

Dict::Add('FR FR', 'French', 'Français', [
    'Class:MedicalDicomDataFlow' => 'Flux de données DICOM',
    'Class:MedicalDicomDataFlow/Attribute:dicom_link_id' => 'Lien de communication DICOM',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg' => 'Sens des données',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg/Value:forward' => 'Direct',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg/Value:reverse' => 'Inverse',
    'Class:DataFlow/Attribute:execution_frequency/Value:unspecified' => 'Non précisée',
    'DicomFlow:Tab' => 'Flux de données DICOM',
    'DicomFlow:Managed' => 'Ce flux est géré par son lien de communication DICOM.',
    'Class:MedicalDicomCommunicationLink/Attribute:dicom_dataflows' => 'Flux de données DICOM',
    'Class:MedicalDicomApplicationEntity/Attribute:dicom_dataflows' => 'Flux de données DICOM',
]);
