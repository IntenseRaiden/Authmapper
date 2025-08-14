<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_authmapper', get_string('pluginname', 'local_authmapper'));
    
    // Enable/disable plugin
    $settings->add(new admin_setting_configcheckbox(
        'local_authmapper/enable',
        get_string('enable', 'local_authmapper'),
        get_string('enable_desc', 'local_authmapper'),
        1
    ));

    // Choose the field to match against (Username or ID Number)
    $settings->add(new admin_setting_configselect(
        'local_authmapper/matchfield',
        get_string('matchfield', 'local_authmapper'),
        get_string('matchfield_desc', 'local_authmapper'),
        'idnumber', // Default to ID Number
        [
            'idnumber' => get_string('matchfield_idnumber', 'local_authmapper'),
            'username' => get_string('matchfield_username', 'local_authmapper'),
        ]
    ));

    // Pattern mappings
    $settings->add(new admin_setting_configtextarea(
        'local_authmapper/mappings',
        get_string('mappings', 'local_authmapper'),
        get_string('mappings_desc', 'local_authmapper'),
        ''
    ));
    $ADMIN->add('localplugins', $settings);
}