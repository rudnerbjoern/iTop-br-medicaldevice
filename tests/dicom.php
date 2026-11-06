<?php

declare(strict_types=1);

namespace Combodo\iTop\Service\Events {
    class EventData
    {
    }
}

namespace {
    // Minimal iTop substitutes; only the extension's validation callbacks are exercised.
    class cmdbAbstractObject
    {
        public array $values = [];
        public array $issues = [];

        public function Get(string $attribute): mixed
        {
            return $this->values[$attribute] ?? null;
        }

        public function AddCheckIssue(string $message, ?string $attribute = null): void
        {
            $this->issues[] = $message;
        }
    }

    class Dict
    {
        public static function S(string $key): string
        {
            return $key;
        }
    }

    class MetaModel
    {
        public static array $objects = [];

        public static function GetObject(string $class, int $id, bool $mustExist = true): ?cmdbAbstractObject
        {
            return self::$objects[$id] ?? null;
        }
    }

    require_once __DIR__ . '/../br-medicaldevice/src/Model/_MedicalDicomApplicationEntity.php';
    require_once __DIR__ . '/../br-medicaldevice/src/Model/_MedicalDicomCommunicationLink.php';

    $tests = [];
    $aeCases = [
        'accept a complete classic SCU endpoint' => [[], []],
        'require an IP address for classic SCU' => [['ipaddress_id' => 0], ['RoleRequiresIP']],
        'require a port for classic SCU' => [['port' => 0], ['RoleRequiresPort']],
        'accept the maximum port' => [['port' => 65535], []],
        'reject a port above the maximum' => [['port' => 65536], ['PortOutOfRange']],
        'require modality for active roles' => [['modality' => null], ['RoleRequiresModality']],
        'require an endpoint URL for DICOMweb' => [
            ['protocol' => 'dicomweb', 'ipaddress_id' => 0, 'port' => 0], ['DicomwebRequiresEndpointUrl'],
        ],
        'accept DICOMweb without a classic endpoint' => [
            ['protocol' => 'dicomweb', 'ipaddress_id' => 0, 'port' => 0,
                'endpoint_url' => 'https://pacs.example.org/dicomweb'], [],
        ],
        'reject a whitespace-only DICOMweb URL' => [
            ['protocol' => 'dicomweb', 'endpoint_url' => '   '], ['DicomwebRequiresEndpointUrl'],
        ],
        'allow SCP without active-role attributes' => [
            ['role' => 'SCP', 'ipaddress_id' => 0, 'port' => 0, 'modality' => null], [],
        ],
        'require classic endpoint and modality for BOTH over TLS' => [
            ['role' => 'BOTH', 'protocol' => 'dicom_tls', 'ipaddress_id' => 0, 'port' => 0, 'modality' => ''],
            ['RoleRequiresIP', 'RoleRequiresPort', 'RoleRequiresModality'],
        ],
    ];
    foreach ($aeCases as $name => [$changes, $expected]) {
        $tests[$name] = static function () use ($changes, $expected): void {
            $ae = new \BR\Extension\Medicaldevice\Model\_MedicalDicomApplicationEntity();
            $ae->values = array_replace([
                'role' => 'SCU', 'protocol' => 'dicom', 'ipaddress_id' => 1,
                'port' => 104, 'endpoint_url' => '', 'modality' => 'CT',
            ], $changes);
            $ae->OnMedicalDicomApplicationEntityCheckToWrite(new \Combodo\iTop\Service\Events\EventData());
            $expected = array_map(
                static fn (string $issue): string => 'Class:MedicalDicomApplicationEntity/Error:' . $issue,
                $expected
            );
            if ($ae->issues !== $expected) {
                throw new \RuntimeException('Unexpected AE validation issues: ' . json_encode($ae->issues));
            }
        };
    }

    $linkCases = [
        'accept SCU to SCP' => [1, 2, 'SCU', 'SCP', []],
        'accept BOTH to BOTH' => [1, 2, 'BOTH', 'BOTH', []],
        'reject a self-link' => [1, 1, 'BOTH', 'BOTH', ['SourceEqualsTarget']],
        'reject an SCP-only source' => [1, 2, 'SCP', 'SCP', ['InvalidSourceRole']],
        'reject an SCU-only target' => [1, 2, 'SCU', 'SCU', ['InvalidTargetRole']],
        'report both invalid endpoint roles' => [1, 2, 'SCP', 'SCU', ['InvalidSourceRole', 'InvalidTargetRole']],
        'defer missing source to mandatory-field validation' => [0, 2, 'SCU', 'SCP', []],
        'defer missing target to mandatory-field validation' => [1, 0, 'SCU', 'SCP', []],
    ];
    foreach ($linkCases as $name => [$source, $target, $sourceRole, $targetRole, $expected]) {
        $tests[$name] = static function () use ($source, $target, $sourceRole, $targetRole, $expected): void {
            $sourceAe = new cmdbAbstractObject();
            $sourceAe->values = ['role' => $sourceRole];
            $targetAe = new cmdbAbstractObject();
            $targetAe->values = ['role' => $targetRole];
            MetaModel::$objects = [1 => $sourceAe, 2 => $targetAe];
            $link = new \BR\Extension\Medicaldevice\Model\_MedicalDicomCommunicationLink();
            $link->values = ['source_ae_id' => $source, 'target_ae_id' => $target];
            $link->OnMedicalDicomCommunicationLinkCheckToWrite(new \Combodo\iTop\Service\Events\EventData());
            $expected = array_map(
                static fn (string $issue): string => 'Class:MedicalDicomCommunicationLink/Error:' . $issue,
                $expected
            );
            if ($link->issues !== $expected) {
                throw new \RuntimeException('Unexpected link validation issues: ' . json_encode($link->issues));
            }
        };
    }
    return $tests;
}
