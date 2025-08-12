<?php
$string['pluginname']    = 'Auth Mapper';
$string['enable']        = 'Enable Auth Mapper';
$string['enable_desc']   = 'If checked, the mapping logic will run when a new user is created.';
$string['mappings']      = 'ID to Auth Method Mappings';
$string['mappings_desc'] = <<<HTML
<p>This plugin listens for the user creation event in Moodle. When a new user is created, it checks the user's <strong>ID number</strong> against the patterns defined below. If a match is found, the user's authentication method is updated accordingly.</p>
<p>Define one mapping per line in the format <code>pattern|authmethod</code>. Wildcards supported:</p>
<ul>
    <li><code>*</code> &ndash; matches any sequence of characters (zero or more).</li>
    <li><code>?</code> &ndash; matches any single character.</li>
</ul>
<h6>Examples:</h6>
<ul>
    <li><code>100*|saml2</code> &ndash; Matches IDs starting with '100'. Sets auth to SAML2 SSO.</li>
    <li><code>STAFF-??|manual</code> &ndash; Matches IDs like 'STAFF-01', 'STAFF-AB', etc. Sets auth to Manual accounts.</li>
    <li><code>C9*|oauth2</code> &ndash; Matches IDs starting with 'C9'. Sets auth to OAuth 2.</li>
</ul>
<hr>
<p><strong>IMPORTANT WARNING:</strong> The 'authmethod' must be the exact internal name of an enabled authentication plugin (e.g., <code>saml2</code>, <code>oauth2</code>, <code>manual</code>, <code>ldap</code>). If you specify an auth method that does not exist or is disabled (e.g., using <code>saml</code> instead of <code>saml2</code>), it can prevent the new user from being able to log in. An administrator will need to manually edit the user's profile to select a valid authentication method to fix their account.</p>
HTML;