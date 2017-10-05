<?php

/**
 * @file
 * Plugin definition for a key provider using
 * Townsend Security’s Alliance Key Manager service.
 */

$plugin = array(
  'label' => t('Townsend Security AKM'),
  'description' => t('Use Townsend Security’s Alliance Key Manager service for the encryption key.'),
  'default configuration' => 'key_provider_townsec_akm_default_configuration',
  'build configuration form' => 'key_provider_townsec_akm_build_configuration_form',
  'get key value' => 'key_provider_townsec_akm_get_key_value',
);

/**
 * Callback method to return defualt configuration.
 */
function key_provider_townsec_akm_default_configuration() {
  return array('key_name' => '');
}

/**
 * Callback method to return the configuration form.
 */
function key_provider_townsec_akm_build_configuration_form($form, &$form_state) {
  $plugin_config = $form_state['storage']['key_config']['key_provider_settings'];
  $plugin_config += key_provider_townsec_akm_default_configuration();

  $form['key_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Key Name'),
    '#description' => t('Enter the name of the key.'),
    '#default_value' => $plugin_config['key_name'],
    '#required' => TRUE,
  );

  return $form;
}

/**
 * Callback method to return a key value.
 */
function key_provider_townsec_akm_get_key_value($config) {
	
	$plugin_config = $config['key_provider_settings'];
  $key_name = $plugin_config['key_name'];

  foreach (array('primary', 'backup') as $server) {
    $port = variable_get("townsec_akm_{$server}_key_port");
    $hostname = variable_get("townsec_akm_{$server}_host_server");

    $local = variable_get("townsec_akm_{$server}_client_cert_and_key_file");
    $ca = variable_get("townsec_akm_{$server}_ca_cert_file");

    $host = "tls://{$hostname}:{$port}";
    $ctx = stream_context_create(array(
      'ssl' => array(
        'cafile' => DRUPAL_ROOT . '/' . $ca,
        'capture_peer_cert' => TRUE,
        'local_cert' => DRUPAL_ROOT . '/' . $local,
        'verify_peer' => TRUE,
        'verify_peer_name' => FALSE,
      ),
    ));

    $errno = $errstr = NULL;
    $fp = stream_socket_client(
      $host,
      $errno,
      $errstr,
      30,
      STREAM_CLIENT_CONNECT,
      $ctx
    );

    if (!$fp) {
      continue;
    }

    $request = sprintf("000712001%-40s%24sBIN", $key_name, '');
    fwrite($fp, $request);

    $len = fread($fp, 5);
    if (!$len) {
      continue;
    }

    $response = fread($fp, $len);
    if (!$response) {
      continue;
    }

    $key = substr($response, 95, 256);

    fclose($fp);

    if ($server === 'backup') {
      watchdog(
        'Key Connect',
        'Primary server not found, successfully used backup server %server.',
        array('%server' => $host)
      );
    }

    return rtrim($key);
  }

  drupal_set_message(t('An error occurred'), 'error', TRUE);
  watchdog('Key Connect', 'No Key Server Found');

  return FALSE;
}

