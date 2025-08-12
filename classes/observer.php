<?php
namespace local_authmapper;

defined('MOODLE_INTERNAL') || die();
use core\event\user_created;

class observer {
    /**
     * Handle user_created event to remap auth based on idnumber.
     * Only simple wildcard patterns (* and ?) are allowed to mitigate ReDoS.
     * Checks plugin enable setting.
     *
     * @param user_created $event
     */
    public static function user_created(user_created $event) {
        global $DB;

        if (!get_config('local_authmapper', 'enable')) {
            return; // plugin disabled
        }

        $userid = $event->objectid;
        $user = $DB->get_record('user', ['id' => $userid], 'id, idnumber, auth', MUST_EXIST);
        $rawmappings = get_config('local_authmapper', 'mappings');
        if (empty($rawmappings)) {
            return;
        }

        $lines = preg_split('/\r\n|\r|\n/', $rawmappings);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '|') === false) {
                continue;
            }
            list($pattern, $authmethod) = explode('|', $line, 2);
            $pattern    = trim($pattern);
            $authmethod = trim($authmethod);

            // Convert wildcard pattern to safe regex
            $escaped = preg_quote($pattern, '/');
            $wildcard = str_replace(['\\*', '\\?'], ['.*', '.'], $escaped);
            $regex = '/^' . $wildcard . '$/';

            if (preg_match($regex, $user->idnumber)) {
                if ($user->auth !== $authmethod) {
                    $DB->set_field('user', 'auth', $authmethod, ['id' => $user->id]);
                }
                break;
            }
        }
    }
}
