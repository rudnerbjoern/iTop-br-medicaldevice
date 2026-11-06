<?php

declare(strict_types=1);

// Capture the real module registration without starting iTop setup.
class SetupWebPage
{
    public static array $modules = [];

    public static function AddModule(string $file, string $id, array $settings): void
    {
        self::$modules[] = [$file, $id, $settings];
    }
}

return [
    'register the medical device module with matching release metadata' => static function (): void {
        SetupWebPage::$modules = [];
        require __DIR__ . '/../br-medicaldevice/module.br-medicaldevice.php';
        $manifest = simplexml_load_file(__DIR__ . '/../extension.xml', SimpleXMLElement::class, LIBXML_NONET);
        if ($manifest === false || count(SetupWebPage::$modules) !== 1) {
            throw new RuntimeException('Expected one module registration and a readable manifest.');
        }
        [, $id, $settings] = SetupWebPage::$modules[0];
        if ($id !== trim((string) $manifest->extension_code) . '/' . trim((string) $manifest->version)
            || !in_array('itop-config-mgmt/3.2.0', $settings['dependencies'], true)
            || $settings['mandatory'] !== false || $settings['visible'] !== true) {
            throw new RuntimeException('Module identity, dependency or installation flags do not match the project.');
        }
    },
    'offer a matching model type for every medical device class' => static function (): void {
        $model = simplexml_load_file(__DIR__ . '/../br-medicaldevice/datamodel.br-medicaldevice.xml');
        $classes = $model->xpath('/itop_design/classes/class[@id="MedicalDevice" or parent="MedicalDevice"]');
        $types = $model->xpath('/itop_design/classes/class[@id="MedicalModel"]/fields/field[@id="type"]/values/value/code');
        $classNames = array_map(static fn (SimpleXMLElement $class): string => (string) $class['id'], $classes);
        $typeNames = array_map(static fn (SimpleXMLElement $type): string => (string) $type, $types);
        sort($classNames);
        sort($typeNames);
        if ($classNames === [] || $classNames !== $typeNames
            || (string) $model->classes->xpath('class[@id="MedicalDevice"]/parent')[0] !== 'ConnectableCI') {
            throw new RuntimeException('Medical device inheritance and selectable model types are inconsistent.');
        }
    },
    'wire DICOM write checks to the implemented PHP callbacks' => static function (): void {
        $model = simplexml_load_file(__DIR__ . '/../br-medicaldevice/datamodel.br-medicaldevice.xml');
        foreach (['MedicalDicomApplicationEntity', 'MedicalDicomCommunicationLink'] as $name) {
            $classes = $model->xpath('/itop_design/classes/class[@id="' . $name . '"]');
            if (count($classes) !== 1) {
                throw new RuntimeException('Missing DICOM class: ' . $name);
            }
            $class = $classes[0];
            $parent = trim((string) $class->php_parent->name);
            $file = __DIR__ . '/../br-medicaldevice/' . trim((string) $class->php_parent->file);
            require_once $file;
            $listeners = $class->xpath('event_listeners/event_listener[event="EVENT_DB_CHECK_TO_WRITE"]');
            if (count($listeners) !== 1
                || (string) $listeners[0]->callback !== 'On' . $name . 'CheckToWrite'
                || !is_callable([new $parent(), (string) $listeners[0]->callback])) {
                throw new RuntimeException('DICOM write validation is not wired correctly: ' . $name);
            }
        }
    },
];
