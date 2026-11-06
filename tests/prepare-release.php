<?php

declare(strict_types=1);

require_once __DIR__ . '/../scripts/prepare-release.php';

$manifest = file_get_contents(__DIR__ . '/../extension.xml');
$module = file_get_contents(__DIR__ . '/../br-medicaldevice/module.br-medicaldevice.php');
$xml = simplexml_load_string($manifest);
$current = trim((string) $xml->version);
$parts = explode('.', $current);
$next = $parts[0] . '.' . $parts[1] . '.' . ((int) $parts[2] + 1);

$tests = [
    'prepare matching release metadata without changing other content' => static function () use ($manifest, $module, $current, $next): void {
        [$updatedManifest, $updatedModule] = prepareReleaseContents($manifest, $module, $next, '2028-02-29');
        $xml = simplexml_load_string($updatedManifest);
        if ((string) $xml->version !== $next || (string) $xml->release_date !== '2028-02-29'
            || $updatedModule !== str_replace("'br-medicaldevice/$current'", "'br-medicaldevice/$next'", $module)
            || preg_replace('~<(version|release_date)>.*?</\1>~s', '', $updatedManifest)
                !== preg_replace('~<(version|release_date)>.*?</\1>~s', '', $manifest)) {
            throw new RuntimeException('Unexpected release metadata or unrelated edits.');
        }
    },
];

$tests['preserve compatibility versions and unrelated module version strings'] = static function () use ($manifest, $module, $next): void {
    $extra = "\n\$example = 'br-medicaldevice/0.0.0';\n";
    [$updatedManifest, $updatedModule] = prepareReleaseContents($manifest, $module . $extra, $next, '2028-02-29');
    $before = simplexml_load_string($manifest);
    $after = simplexml_load_string($updatedManifest);
    if ((string) $before->itop_version_min !== (string) $after->itop_version_min
        || !str_ends_with($updatedModule, $extra)) {
        throw new RuntimeException('Compatibility version or unrelated module text was changed.');
    }
};

$tests['support double-quoted module registration'] = static function () use ($manifest, $module, $current, $next): void {
    $module = str_replace("'br-medicaldevice/$current'", '"br-medicaldevice/' . $current . '"', $module);
    [, $updatedModule] = prepareReleaseContents($manifest, $module, $next, '2028-02-29');
    if (!str_contains($updatedModule, '"br-medicaldevice/' . $next . '"')) {
        throw new RuntimeException('Double-quoted module version was not updated.');
    }
};

$cases = [
    'reject malformed version' => [$manifest, $module, 'v3.2.3', '2028-02-29'],
    'reject version with leading zeros' => [$manifest, $module, '03.2.3', '2028-02-29'],
    'reject unchanged version' => [$manifest, $module, $current, '2028-02-29'],
    'reject older version' => [$manifest, $module, '0.0.0', '2028-02-29'],
    'reject invalid calendar date' => [$manifest, $module, $next, '2027-02-29'],
    'reject ambiguous module version' => [$manifest, $module . $module, $next, '2028-02-29'],
    'reject mismatched module version' => [$manifest, str_replace("'br-medicaldevice/$current'", "'br-medicaldevice/0.0.0'", $module), $next, '2028-02-29'],
    'reject malformed current version' => [str_replace($current, 'invalid', $manifest), $module, $next, '2028-02-29'],
    'reject missing module registration' => [$manifest, "<?php \$example = 'br-medicaldevice/$current';", $next, '2028-02-29'],
    'reject missing date element' => [preg_replace('~<release_date>.*?</release_date>~s', '', $manifest), $module, $next, '2028-02-29'],
];
foreach ($cases as $name => $arguments) {
    $tests[$name] = static function () use ($arguments): void {
        try {
            prepareReleaseContents(...$arguments);
        } catch (RuntimeException $error) {
            return;
        }
        throw new RuntimeException('Invalid release input was accepted.');
    };
}

return $tests;
