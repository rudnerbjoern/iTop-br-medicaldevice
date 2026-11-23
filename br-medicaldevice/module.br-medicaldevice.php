<?php

/**
 * Registers the medical device module and its iTop dependencies.
 *
 * @copyright   Copyright (C) 2024-2026 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 */

/** @disregard P1009 Undefined type SetupWebPage */
SetupWebPage::AddModule(
    __FILE__, // Path to the current file, all other file names are relative to the directory containing this file
    'br-medicaldevice/3.3.0',
    array(
        // Identification
        //
        'label' => 'Datamodel: Medical Devices',
        'category' => 'business',

        // Setup
        //
        'dependencies' => array(
            'itop-structure/3.3.0',
            'itop-config-mgmt/3.3.0',
            'itop-bridge-cmdb-services/3.3.0',
            'teemip-ip-mgmt/3.3.1',
        ),
        'mandatory' => false,
        'visible' => true,

        // Components
        //
        'datamodel' => array(),
        'webservice' => array(),
        'data.struct' => array(
            // add your 'structure' definition XML files here,
        ),
        'data.sample' => array(
            'data/data.sample.ct-pacs.xml',
        ),

        // Documentation
        //
        'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
        'doc.more_information' => '', // hyperlink to more information, if any

        // Default settings
        //
        'settings' => array(
            // Module specific settings go here, if any
        ),
    )
);
