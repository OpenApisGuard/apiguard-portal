<?php

namespace Drupal\apiguard_add_api_proxy\Plugin\Core\Utils;

use \Defuse\Crypto\Key;

class KeyFile {
	private const KEY_FILE = 'private/.apiguard.key'; 
	/**
	 * Get system decoded key (32 bytes)
	 */
	public static function getSystemKey() {
	  if (! file_exists(self::KEY_FILE)) {
		  	// Create a default key.
		  $ranKey = Key::createNewRandomKey();
		  $key = $ranKey->saveToAsciiSafeString();
		  file_put_contents(self::KEY_FILE, $key);

		  drupal_chmod(self::KEY_FILE, 0400);
		  drupal_set_message(t('The key file has been written to %file', array(
		    '%file' => self::KEY_FILE,
		  )));    
	  }
	  else {
	  	  $key = file_get_contents(self::KEY_FILE);
	  }

	  return $key;
	}
}