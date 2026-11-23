<?php

/**
 * German labels and messages for DICOM data flows managed by the bridge.
 */

Dict::Add('DE DE', 'German', 'Deutsch', [
    'Class:MedicalDicomDataFlow' => 'DICOM-Datenfluss',
    'Class:MedicalDicomDataFlow/Attribute:dicom_link_id' => 'DICOM-Kommunikationsverbindung',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg' => 'Nutzdatenrichtung',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg/Value:forward' => 'Vorwärts',
    'Class:MedicalDicomDataFlow/Attribute:dicom_leg/Value:reverse' => 'Rückwärts',
    'Class:DataFlow/Attribute:execution_frequency/Value:unspecified' => 'Nicht angegeben',
    'DicomFlow:Tab' => 'DICOM-Datenflüsse',
    'DicomFlow:Managed' => 'Dieser Datenfluss wird über seine DICOM-Kommunikationsverbindung verwaltet.',
    'Class:MedicalDicomCommunicationLink/Attribute:dicom_dataflows' => 'DICOM-Datenflüsse',
    'Class:MedicalDicomApplicationEntity/Attribute:dicom_dataflows' => 'DICOM-Datenflüsse',
]);
