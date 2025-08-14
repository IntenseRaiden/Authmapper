# Auth Mapper Plugin for Moodle

The Auth Mapper plugin automatically updates a user's authentication method upon account creation based on patterns in their username or ID number. This allows administrators to easily assign different user populations to different login systems (e.g., SAML2, OAuth 2, Manual) based on a predictable identifier.

## Requirements
* Moodle 4.5 or later.
* The authentication plugins you wish to map to (e.g., SAML2, OAuth 2) must be installed and enabled on your Moodle site.

## Installation
1.  Download the ZIP file from the Moodle Plugins Directory.
2.  Log in to your Moodle site as an administrator and go to **Site administration > Plugins > Install plugins**.
3.  Upload the ZIP file. You will be prompted to select the plugin type.
4.  Select **"Local plugin"** from the dropdown and continue with the installation.

## Configuration
1.  After installation, go to **Site administration > Plugins > Local plugins > Auth Mapper**.
2.  **Enable** the plugin.
3.  Choose whether to match patterns against the **Username** or **ID Number**.
4.  Add your mapping rules to the text area, one per line, in the format `pattern|authmethod`.
    - `*` matches any sequence of characters.
    - `?` matches any single character.
    - **Note:** The `authmethod` must be the internal system name (e.g., `manual`), not the display name from the dropdown menu (e.g., 'Manual accounts').

    **Example Rules:**
    - `staff_*|manual` will match any username starting with `staff_` and set their auth method to Manual.
    - `100*|saml2` will match any ID number starting with `100` and set their auth method to SAML2 SSO.

## Support
For support or to report a bug, please raise an issue on the official GitHub repository:
[https://github.com/IntenseRaiden/Authmapper/issues](https://github.com/IntenseRaiden/Authmapper/issues)