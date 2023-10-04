<?php

error_reporting(E_ALL & ~E_DEPRECATED);

if (PHP_SAPI !== 'cli') {
  ini_set('memory_limit', '256M');
}

if (!getenv('STANFORD_ENCRYPT')) {
  putenv("STANFORD_ENCRYPT=" . substr(file_get_contents("$repo_root/salt.txt"), 0, 32));
}

$settings['file_temp_path'] = '/tmp';

// If this is changed, be sure to change it in the
// factory-hooks/post-settings-php/includes.php file
$settings['config_sync_directory'] = $repo_root . "/docroot/profiles/custom/stanford_profile/config/sync";

$settings['container_yamls'][] = __DIR__ . '/../local.services.yml';
