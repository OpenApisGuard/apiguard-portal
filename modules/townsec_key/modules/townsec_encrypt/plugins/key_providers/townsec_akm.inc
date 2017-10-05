<?php

/**
 * @file
 * Plugin definition for the Townsend Security AKM key storage method.
 */

$plugin = array(
  'title' => t('Townsend Security AKM'),
  'description' => t('Use Townsend Security’s Alliance Key Manager service.'),
  'key callback' => 'townsec_key_storage_method_akm_get_key',
  'settings form' => 'townsec_key_storage_method_akm_settings_form',
  'instructions' => 'townsec_key_storage_method_akm_instructions',
  'status callback' => 'townsec_key_storage_method_akm_status',
);

/**
 * Callback method to return the encryption key from the AKM service.
 */
function townsec_key_storage_method_akm_get_key($settings) {
	
  return $settings['key_name'];
}

/**
 * Settings form for our key provider.
 */
function townsec_key_storage_method_akm_settings_form($defaults) {
  $form = array();
  
  $form['key_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Key Name'),
    '#description' => t('Enter the name of the encryption key on the Alliance Key Manager you would like to use.'),
    '#default_value' => isset($defaults['key_name']) ? $defaults['key_name'] : '',
    '#required' => TRUE,
  );
  return $form;
}

function townsec_key_storage_method_akm_instructions() {
  return array(
    'instructions' => array(
      '#markup' => t('Enter the name of the encryption key on the Alliance Key Manager you would like to use.'),
    )
  );
}

function townsec_key_storage_method_akm_status($settings) {
  $key = townsec_key_storage_method_akm_get_key($settings);
  if (!empty($key)) {
    $status = array(
      'valid' => 1,
      'message' => t('Key found'),
    );
  }
  else {
    $status = array(
      'valid' => 0,
      'message' => t('Key not found'),
    );
  }

  return $status;
}
