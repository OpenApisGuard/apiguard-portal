<?php

/**
 * Administration page for Townsend Security Key Connection module.
 */

/**
 * Form builder for the settings form.
 */
function townsec_key_settings_form($form, &$form_state) {
  $form = array();

  $servers = array(
    'primary' => t('Primary Server Settings'),
    'backup' => t('Backup Server Settings'),
  );

  foreach ($servers as $name => $title) {
    $form[$name] = array(
      '#type' => 'fieldset',
      '#title' => $title,
      '#collapsible' => TRUE,
      '#collapsed' => ($name == 'primary') ? FALSE : TRUE,
    );
    $form[$name]["townsec_akm_{$name}_client_cert_and_key_file"] = array(
      '#type' => 'textfield',
      '#title' => t('Location of Client X509 Certificate and Private Key File'),
      '#description' => t('The file location relative to the root Drupal directory (e.g. %rel).', array(
        '%rel' => '../private/cert/local.pem',
      )),
      '#default_value' => variable_get("townsec_akm_{$name}_client_cert_and_key_file", ''),
      '#required' => ($name == 'primary') ? TRUE : FALSE,
    );
    $form[$name]["townsec_akm_{$name}_ca_cert_file"] = array(
      '#type' => 'textfield',
      '#title' => t('Location of Certificate Authority Certificate File'),
      '#description' => t('The file location relative to the root Drupal directory (e.g. %rel).', array(
        '%rel' => '../private/cert/ca.pem',
      )),
      '#default_value' => variable_get("townsec_akm_{$name}_ca_cert_file", ''),
      '#required' => ($name == 'primary') ? TRUE : FALSE,
    );
    $form[$name]["townsec_akm_{$name}_host_server"] = array(
      '#type' => 'textfield',
      '#title' => t('AKM Host Server'),
      '#description' => t('Enter the AKM host server name or IP number.'),
      '#default_value' => variable_get("townsec_akm_{$name}_host_server", ''),
      '#required' => ($name == 'primary') ? TRUE : FALSE,
    );

    $form[$name]["townsec_akm_{$name}_key_port"] = array(
      '#type' => 'textfield',
      '#title' => t('Key Retrieval Port'),
      '#description' => t('Enter the number of the port for key retrieval.'),
      '#default_value' => variable_get("townsec_akm_{$name}_key_port", ''),
      '#required' => ($name == 'primary') ? TRUE : FALSE,
    );
    $form[$name]["townsec_akm_{$name}_encrypt_port"] = array(
      '#type' => 'textfield',
      '#title' => t('Remote Encryption Port'),
      '#description' => t('Enter the number of the port for remote encryption.'),
      '#default_value' => variable_get("townsec_akm_{$name}_encrypt_port", ''),
      '#required' => ($name == 'primary') ? TRUE : FALSE,
    );
  }

  return system_settings_form($form);
}

function townsec_key_settings_form_validate($form, $form_state) {
  $values = $form_state['values'];
  foreach (array('primary', 'backup') as $name) {
    $files = array(
      "townsec_akm_{$name}_client_cert_and_key_file",
      "townsec_akm_{$name}_ca_cert_file",
    );
    foreach ($files as $file) {
      $filename = $values[$file];
      if ($filename && !is_readable($filename)) {
        form_set_error($file, "{$filename} is not readable.");
      }
    }

    $ports = array(
      "townsec_akm_{$name}_key_port",
      "townsec_akm_{$name}_encrypt_port",
    );
    foreach ($ports as $port) {
      $port_value = $values[$port];
      if ($port_value && !is_numeric($port_value)) {
        form_set_error($port, 'Port value must be a number.');
      }
    }
  }
}
