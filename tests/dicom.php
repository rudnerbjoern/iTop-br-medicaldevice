<?php

declare(strict_types=1);

namespace Combodo\iTop\Service\Events {
    class EventData
    {
    }
}

namespace {
    // Minimal iTop substitutes for the local DICOM model tests.
    class cmdbAbstractObject
    {
        public array $values = [];
        public array $issues = [];

        public function Get(string $attribute): mixed
        {
            return $this->values[$attribute] ?? null;
        }

        public function Set(string $attribute, mixed $value): void
        {
            $this->values[$attribute] = $value;
        }

        public function PrefillCreationForm(&$aContextParam): void
        {
        }

        final public function AddCheckIssue(string $sIssue)
        {
            // PHP accepts extra positional arguments, but iTop only uses the message.
            if (func_num_args() !== 1) {
                throw new \ArgumentCountError('AddCheckIssue expects only the issue message.');
            }
            $this->issues[] = $sIssue;
        }
    }

    class UserRights
    {
        public static ?cmdbAbstractObject $user = null;

        public static function GetUserObject(): ?cmdbAbstractObject
        {
            return self::$user;
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
    $prefillCases = [
        'keep the AE organization when the user belongs to another organization' => [11, 22, 11],
        'keep the AE organization when the user has no organization' => [11, 0, 11],
        'default an empty AE organization to the user organization' => [0, 22, 22],
        'leave the AE organization unset when the user has no organization' => [null, 0, null],
        'leave the AE organization unset without a current user' => [null, null, null],
    ];
    foreach ($prefillCases as $name => [$existingOrg, $userOrg, $expectedOrg]) {
        $tests[$name] = static function () use ($existingOrg, $userOrg, $expectedOrg): void {
            $ae = new \BR\Extension\Medicaldevice\Model\_MedicalDicomApplicationEntity();
            $ae->Set('org_id', $existingOrg);
            if ($userOrg !== null) {
                UserRights::$user = new cmdbAbstractObject();
                UserRights::$user->Set('org_id', $userOrg);
            }
            $context = [];
            try {
                $ae->PrefillCreationForm($context);
            } finally {
                UserRights::$user = null;
            }
            if ($ae->Get('org_id') !== $expectedOrg) {
                throw new \RuntimeException('Unexpected AE organization: ' . var_export($ae->Get('org_id'), true));
            }
        };
    }

    $aeCases = [
        'accept a complete classic SCU endpoint' => [[], []],
        'require an IP address for classic SCU' => [['ipaddress_id' => 0], ['RoleRequiresIP']],
        'require a port for classic SCU' => [['port' => 0], ['RoleRequiresPort']],
        'reject a negative port for passive SCP' => [['role' => 'SCP', 'port' => -1], ['PortOutOfRange']],
        'report a negative classic SCU port as out of range' => [['port' => -1], ['PortOutOfRange']],
        'accept the minimum port' => [['port' => 1], []],
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
