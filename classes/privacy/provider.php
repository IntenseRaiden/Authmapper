<?php
namespace local_authmapper\privacy;

defined('MOODLE_INTERNAL') || die();

class provider implements \core_privacy\local\metadata\null_provider {
    public static function get_reason(): string {
        return 'The local_authmapper plugin does not store any personal data.';
    }
}