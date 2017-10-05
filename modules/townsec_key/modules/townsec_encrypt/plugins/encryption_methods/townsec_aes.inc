<?php

/**
 * @file
 * Plugin definition for the Townsend Security AES encryption method.
 */

$plugin = array(
  'title' => t('Townsend Security AES'),
  'description' => t('This encryption method uses the Townsend Security Alliance Key Manager onboard AES encryption to provide remote NIST certified encryption of sensitive data.'),
  'encrypt callback' => 'townsec_encrypt_encryption_method_townsec_aes',
  'settings form' => 'townsec_key_aes_encrypt_settings_form',
);

/**
 * Encryption callback for Townsend Security AES encryption method
 */
function townsec_encrypt_encryption_method_townsec_aes($op = 'encrypt', $text = '', $key = '', $options = array()) {
  
  $primencrypt = variable_get('townsec_akm_primary_encrypt_port', null);
  $bkupencrypt = variable_get('townsec_akm_backup_encrypt_port', null);
  $primserver = 'tls://' . variable_get('townsec_akm_primary_host_server', null) . ':' . $primencrypt;
  $bkupserver = 'tls://' . variable_get('townsec_akm_backup_host_server', null) . ':' . $bkupencrypt;
  $keyname = $key;
  $errno = NULL;
  $errstr = NULL;
  $primlocal = DRUPAL_ROOT . '/' . variable_get('townsec_akm_primary_client_cert_and_key_file', null);
  $primca = DRUPAL_ROOT . '/' . variable_get('townsec_akm_primary_ca_cert_file', null);
  $bkuplocal = DRUPAL_ROOT . '/' . variable_get('townsec_akm_backup_client_cert_and_key_file', null);
  $bkupca = DRUPAL_ROOT . '/' . variable_get('townsec_akm_backup_ca_cert_file', null);

  // Create TLS Connection with provided key locations.
  $primopts = array(
    'ssl' => array(
      'cafile' => $primca,
      'capture_peer_cert' => TRUE,
      'local_cert' => $primlocal,
      'verify_peer' => TRUE,
      'verify_peer_name' => FALSE,
    ),
  );
  $bkupopts = array(
    'ssl' => array(
      'cafile' => $bkupca,
      'capture_peer_cert' => TRUE,
      'local_cert' => $bkuplocal,
      'verify_peer' => TRUE,
      'verify_peer_name' => FALSE,
    ),
  );
  // Create TLS context.
  $primctx = stream_context_create($primopts);
  $bkupctx = stream_context_create($bkupopts);
  if ($fp = stream_socket_client($primserver, $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $primctx)) {
    // Initiate the primary connection.
  }
  elseif ($fp = stream_socket_client($bkupserver, $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $bkupctx)) {
    // Create backup connection.
  }
  if ($fp == FALSE) {
    return '';
  }
  // Key Length = 40 (left justify pad on right).
  // Instance = 24 (leave blank or instance got back).
  if ($op == 'encrypt') {
    // Generate a random IV to use w/ the encryption.
    $iv = user_password(16);
    $textcount = sprintf('%05d', strlen($text));
    if(floor($textcount/16) != $textcount/16){
      $padlen = 16 * ceil($textcount/16);
      $text = sprintf('% -' . $padlen . 's', $text);
      $textcount = sprintf('%05d', strlen($text));
    }
    $key = sprintf('% -64s', $keyname);
    $request = sprintf("000982019YNB16" . $textcount . "YNYY" . $iv . "" . $key . "" . "" . $text . "");
    fwrite($fp, $request);
    $len = fread($fp, 5);
    if ($len) {
      //Be sure to read all the way to the end of the returned values
      $return = fread($fp, $len + (3*$textcount));
      if ($return) {
        $inst = substr($return, 15, 24);
        $coded = substr($return, 39);
        $value = $iv . $inst . $coded;
      }
    }
    else {
      return '';
    }
    fclose($fp);
    return $value;
  }
  else {
    $iv = substr($text, 0, 16);
    $inst = substr($text, 16, 24);
    $coded = substr($text, 40);
    $textcount = sprintf('%05d', strlen($coded));
    $keypad = sprintf('% -40s', $keyname);
    $key = $keypad . $inst;
    //Make sure request is mod16
    if(floor($textcount/16) != $textcount/16){
      $padlen = 16 * ceil($textcount/16);
      $coded = sprintf('% -' . $padlen . 's', $coded);
      $textcount = sprintf('%05d', strlen($coded));
    }
    $decrypt_header = "001012021YNB16" . $textcount . "BINYNYY" . $iv . $key;
    $decrypt = sprintf($decrypt_header . $coded);
    fwrite($fp, $decrypt);
    $len = fread($fp, 5);
    if ($len) {
      $rsp = fread($fp, $len + $textcount);
      if ($rsp) {
        $value = substr($rsp, 39);
        $value = rtrim($value);
      }
    }
    else {
      return '';
    }
    fclose($fp);
    return $value;
  }
}

/**
 * Settings form for our key provider.
 */
function townsec_key_aes_encrypt_settings_form($defaults) {
  $form = array();
 
  $form['encode'] = array(
    '#type' => 'select',
    '#title' => t('Encoding Method'),
    '#description' => t('Choose the encoding method.'),
    '#options' => array(
      'BIN' => t('Binary'),
      'B64' => t('Base64 Encoded'),
      'B16' => t('Base16 Encoded'),
    ),
    '#default_value' => isset($defaults['key_type']) ? $defaults['encode'] : 'B64',
  );
	
	return $form;
}