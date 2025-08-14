<?php
namespace local_authmapper;

defined('MOODLE_INTERNAL') || die();
use core\event\user_created;

class observer {
    public static function user_created(user_created $event) {
        global $DB;

        if (!get_config('local_authmapper', 'enable')) {
            return; // plugin disabled
        }

        // Get which field we should be matching against from the settings.
        $matchfield = get_config('local_authmapper', 'matchfield');
        if (empty($matchfield)) {
            $matchfield = 'idnumber'; // Default to idnumber if not set
        }

        $userid = $event->objectid;
        // Fetch BOTH username and idnumber so we can use either one.
        $user = $DB->get_record('user', ['id' => $userid], 'id, username, idnumber, auth', MUST_EXIST);
        
        $rawmappings = get_config('local_authmapper', 'mappings');
        if (empty($rawmappings)) {
            return;
        }

        // Get the value from the user record based on the setting (e.g., $user->username or $user->idnumber)
        $valuetomatch = $user->{$matchfield};

        $lines = preg_split('/\r\n|\r|\n/', $rawmappings);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '|') === false) {
                continue;
            }
            list($pattern, $authmethod) = explode('|', $line, 2);
            $pattern    = trim($pattern);
            $authmethod = trim($authmethod);

            $escaped = preg_quote($pattern, '/');
            $wildcard = str_replace(['\\*', '\\?'], ['.*', '.'], $escaped);
            $regex = '/^' . $wildcard . '$/';

            // Perform the match against the value from the chosen field.
            if (preg_match($regex, $valuetomatch)) {
                if ($user->auth !== $authmethod) {
                    $DB->set_field('user', 'auth', $authmethod, ['id' => $user->id]);
                }
                break;
            }
        }
    }
}
