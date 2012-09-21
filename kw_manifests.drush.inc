<?php

function kw_manifests_drush_command() {
  $items = array();

  $items['kw-manifests'] = array(
    'description' => 'Run all the manifests that are defined in this installation.',
    'aliases' => array('kw-m'),
  );

  return $items;
}

function drush_kraftwagen_manifests() {
  $manifests = kw_manifests_info();
  if (empty($manifests)) {
    drush_log(dt('No Kraftwagen manifests found.'), 'ok');
    return;
  }

  foreach ($manifests as $id => $manifest) {
    $id = kraftwagen_manifest_manifest_id($manifest);
    drush_log(dt('Applying manifest %name for %module', array('%name' => $manifest['name'], '%module' => $manifest['module'])));

    $result = kw_manifests_run($manifest);
    if (!$result) {
      drush_log(dt('Could not apply manifest %name for %module.', array('%name' => $manifest['name'], '%module' => $manifest['module'])), 'error');
      exit;
    }

    drush_log(dt('Manifest %name for %module ran successfully.', array('%name' => $manifest['name'], '%module' => $manifest['module'])), 'ok');
  }

  drush_log(dt('Finished running manifests.'), 'ok');
}
