<?php
/**
 * local/authmapper plugin for Moodle 4.5+
 *
 * Enables mapping of user idnumber patterns to auth methods on user creation.
 * WARNING: To avoid ReDoS attacks, only simple wildcard patterns ('*' and '?') are allowed.
 */

// Directory structure:
// local/authmapper/
// ├── version.php
// ├── settings.php
// ├── db/events.php
// ├── classes/observer.php
// ├── classes/privacy/provider.php
// └── lang/en/local_authmapper.php

// version.php
// -----------------------------
defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_authmapper';
$plugin->version   = 2025080700;        // YYYYMMDDXX (2025-08-07)
$plugin->requires  = 2024051200;        // Moodle 4.5 stable
$plugin->maturity  = MATURITY_STABLE;
$plugin->release   = 'v1.2';            // added enable toggle