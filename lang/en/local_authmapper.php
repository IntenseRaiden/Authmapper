<?php
$string['pluginname']    = 'Auth Mapper';
$string['enable']        = 'Enable Auth Mapper';
$string['enable_desc']   = 'If checked, the mapping logic will run when a new user is created.';

$string['matchfield'] = 'Field to match against';
$string['matchfield_desc'] = 'Select whether the pattern should be matched against the user\'s username or their ID number.';
$string['matchfield_username'] = 'Username';
$string['matchfield_idnumber'] = 'ID Number';

$string['mappings']      = 'Pattern to Auth Method Mappings';
$string['mappings_desc'] = <<<HTML
<p>This plugin listens for the user creation event in Moodle. When a new user is created, it checks the user's selected field (<strong>Username</strong> or <strong>ID Number</strong>) against the patterns defined below. If a match is found, the user's authentication method is updated.</p>
<p>Define one mapping per line in the format <code>pattern|authmethod</code>. Wildcards supported:</p>
<ul>
    <li><code>*</code> &ndash; matches any sequence of characters (zero or more).</li>
    <li><code>?</code> &ndash; matches any single character.</li>
</ul>
<h6>Examples:</h6>
<ul>
    <li>For ID Number: <code>100*|saml2</code> &ndash; Matches IDs starting with '100'.</li>
    <li>For Username: <code>staff_*|manual</code> &ndash; Matches usernames starting with 'staff_'.</li>
</ul>
<hr>
<p><strong>IMPORTANT WARNING:</strong> The 'authmethod' must be the exact internal name of an enabled authentication plugin (e.g., <code>saml2</code>, <code>oauth2</code>, <code>manual</code>). If you specify an auth method that does not exist or is disabled, it can prevent the user from being able to log in. An administrator will need to manually edit the user's profile to select a valid authentication method to fix their account.</p>
HTML;