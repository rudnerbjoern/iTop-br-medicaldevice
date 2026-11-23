<?php

/**
 * English labels and messages for DICOM data flows managed by the bridge.
 */

Dict::Add('EN US', 'English', 'English', [
    'Class:MedicalDicomDataFlow' => 'DICOM data flow',
    'Class:MedicalDicomDataFlow/Attribute:dicom_link_id' => 'DICOM communication link',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg' => 'Payload direction',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg/Value:forward' => 'Forward',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg/Value:reverse' => 'Reverse',
    'Class:DataFlow/Attribute:execution_frequency/Value:unspecified' => 'Unspecified',
    'DicomFlow:Tab' => 'DICOM data flows',
    'DicomFlow:Managed' => 'Manage this flow through its DICOM communication link.',
    'Class:MedicalDicomCommunicationLink/Attribute:dicom_dataflows' => 'DICOM data flows',
    'Class:MedicalDicomApplicationEntity/Attribute:dicom_dataflows' => 'DICOM data flows',
]);
