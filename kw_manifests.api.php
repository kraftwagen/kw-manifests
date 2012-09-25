<?php

/**
 * @file
 * Hooks related to registering manifests.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Define the manifests provided by a module.
 *
 * The hook enables modules to define manifests. It should be in the module's
 * .install file.
 *
 * @return
 *   An array of manifests. The array is keyed on the machine-readable manifest
 *   name. The name must be unique per module.
 *   - "callback": The function that should be called to execute the manifest
 *   - "callback arguments": (optional) Array of arguments that should be passed 
 *     into the callback. The allows you to keep your manifest callbacks a bit 
 *     more generic, so you can DRY your code up a little.
 *   - "file": (optional) A file that will be included before the manifest is 
 *     executed; this allows manifest callback functions to be in separate 
 *     files. The file should be relative to the implementing module's directory
 *     unless otherwise specified by the "file path" option.
 *   - "file path": (optional) The path to the directory containing the file 
 *     specified in "file". This defaults to the path to the module implementing
 *     the hook.
 */
function hook_kw_manifests_info() {
  $manifests = array();

  $manifests['my_manifest'] = array(
    'callback' => 'mymodule_manifest_my_manifest',
    'file' => 'mymodule.manifests.inc',
  );

  return $manifests;
}

/**
 * @} End of "addtogroup hooks".
 */