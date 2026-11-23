<?php

/**
 * Checks payload directions, unresolved endpoints and the module versions in the bundle.
 */

declare(strict_types=1);

use BR\Extension\Medicaldevice\DataFlows\Service\MedicalDicomFlowSync;

require_once __DIR__.'/../br-medicaldevice-bridge-for-dataflows/src/Service/MedicalDicomFlowSync.php';

$tests = [];
foreach ([
    'PUSH' => ['forward' => [10, 20]],
    'PULL' => ['reverse' => [20, 10]],
    'BIDIR' => ['forward' => [10, 20], 'reverse' => [20, 10]],
] as $direction => $expected) {
    $tests["map $direction by payload direction"] = static function () use ($direction, $expected): void {
        if (MedicalDicomFlowSync::legs($direction, 10, 20) !== $expected) {
            throw new RuntimeException('Incorrect payload legs');
        }
    };
}

$tests['unresolved endpoints and shared hosts have no payload legs'] = static function (): void {
    foreach ([[0, 20], [10, 0], [10, 10]] as [$source, $destination]) {
        if (MedicalDicomFlowSync::legs('BIDIR', $source, $destination) !== []) {
            throw new RuntimeException('Unexpected leg for unresolved or identical hosts');
        }
    }
};
$tests['bundle declares both installable module versions'] = static function (): void {
    $root = dirname(__DIR__);
    $xml = simplexml_load_file($root.'/extension.xml');
    foreach (['br-medicaldevice', 'br-medicaldevice-bridge-for-dataflows'] as $id) {
        $entries = $xml->xpath('/extension/modules/module[id="'.$id.'"]/version');
        if (count($entries) !== 1 || !str_contains(file_get_contents("$root/$id/module.$id.php"), "'$id/".$entries[0]."'")) {
            throw new RuntimeException('Unexpected module registration for '.$id);
        }
    }
};
return $tests;
