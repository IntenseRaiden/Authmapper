<?php
defined('MOODLE_INTERNAL') || die();

$observers = [
    [
        'eventname'   => '\core\event\user_created',
        'callback'    => '\local_authmapper\observer::user_created',
        'includefile' => '/local/authmapper/classes/observer.php',
        'internal'    => false,
        'priority'    => 9999,
    ],
];