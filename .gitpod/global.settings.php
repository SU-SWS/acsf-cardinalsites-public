<?php

error_reporting(E_ALL & ~E_DEPRECATED);
// Print errors on WSOD.
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (!getenv('STANFORD_ENCRYPT')) {
  putenv("STANFORD_ENCRYPT=" . substr(file_get_contents("$repo_root/salt.txt"), 0, 32));
}

$settings['file_temp_path'] = '/tmp';

// If this is changed, be sure to change it in the
// factory-hooks/post-settings-php/includes.php file
$settings['config_sync_directory'] = $repo_root . "/docroot/profiles/custom/stanford_profile/config/sync";

// Saml login doesn't work on gitpod. So disable it.
$config['simplesamlphp_auth.settings']['activate'] = FALSE;

$settings['container_yamls'][] = __DIR__ . '/../local.services.yml';