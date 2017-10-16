<?php

namespace Drupal\apiguard_add_api_proxy\Plugin\Core\Utils;

use \Defuse\Crypto\Crypto;
use \Defuse\Crypto\Key;

class Configs {
  private const CONFIG_FILE = 'private/.apiguard';

  public static $CONFIG_URL = '';
  public static $CONFIG_GROUP = '';
  public static $CONFIG_USERID = '';
  public static $CONFIG_USERPWD = '';

  public static function init() {
    if (file_exists(self::CONFIG_FILE)) {
      $cipher = file_get_contents(self::CONFIG_FILE);
      $key = Key::loadFromAsciiSafeString(KeyFile::getSystemKey());
      $data = Crypto::decrypt($cipher, $key);

      $props = parse_ini_string($data);
      Configs::$CONFIG_URL = $props['url'];
      Configs::$CONFIG_GROUP = $props['group'];
      Configs::$CONFIG_USERID = $props['userId'];
      Configs::$CONFIG_USERPWD = Crypto::encrypt($props['pwd'], $key);
    }
  }
}

Configs::init();
