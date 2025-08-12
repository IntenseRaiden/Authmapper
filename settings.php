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
    // Pattern mappings
     $settings->add(new admin_setting_configtextarea(
        'local_authmapper/mappings',
        get_string('mappings', 'local_authmapper'),
        get_string('mappings_desc', 'local_authmapper'),
        ''
    ));
    $ADMIN->add('localplugins', $settings);
}