<?php

namespace Drupal\apiguard\Form;

use Drupal\Core\Form\FormStateInterface;

use Drupal\apiguard\Core\Utils\KeyFile;
use Drupal\apiguard\Core\Utils\Signature;

use \Defuse\Crypto\Crypto;
use \Defuse\Crypto\Key;

/**
 *
 * @see \Drupal\Core\Form\FormBase
 * @see \Drupal\Core\Form\ConfigFormBase
 */
class Settings extends ApiFormBase {
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
      Settings::$CONFIG_URL = $props['url'];
      Settings::$CONFIG_GROUP = $props['group'];
      Settings::$CONFIG_USERID = $props['userId'];
      Settings::$CONFIG_USERPWD = Crypto::encrypt($props['pwd'], $key);
    }
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $attachments['#attached']['library'][] = 'apiguard/apiguard.settings';

    $statusCode = $form_state->get('statusCode');
    if ($statusCode === NULL || empty($statusCode)) {  
      $status = '<span style="color:red !important">' . t('Unknown') . '</span>';
    }
    else if (is_numeric($statusCode) && ! preg_match('/^(?:4|5)[0-9]{2}$/', $statusCode)){
      $status = '<div class="success">' . t('Successful') . '</div>';
    }
    else {
      $status = '<span class="fail">' . $statusCode . '</span>';
    }

    $form['#tree'] = TRUE;
    $form['configs_fieldset'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Settings'),
      '#prefix' => '<div id="names-fieldset-wrapper">',
      '#suffix' => '</div>',
    ];

    $form['configs_fieldset']['api_guard_endpoint_url'] = [
        '#type' => 'textfield',
        '#title' => t('Gateway URL'),
    ];

/*
    $form['configs_fieldset']['api_guard_settings_group'] = [
        '#type' => 'textfield',
        '#title' => t('Group'),
    ];
*/
    $form['configs_fieldset']['api_guard_settings_user_id'] = [
        '#type' => 'textfield',
        '#title' => t('User'),
    ];

    $form['configs_fieldset']['api_guard_settings_user_pwd'] = [
        '#type' => 'password',
        '#title' => t('Password'),
    ];

    $form['configs_fieldset']['test_connection_status'] = [
      '#prefix' => '<div id="test-connect-result"><br>',
      '#suffix' => '</div>',
      '#markup' =>  $status,
    ];

    $form['configs_fieldset']['actions'] = [
      '#type' => 'actions',
    ];

    $form['configs_fieldset']['secret'] = [
        '#type' => 'hidden',
    ];

    $form['configs_fieldset']['actions']['test_connection'] = [
      '#type' => 'submit',
      '#value' => t('Test Connection'),
      '#submit' => ['::testConnection'],
      '#ajax' => [
        'callback' => '::test_connection_form_callback',
        'wrapper' => 'test-connect-result',
      ],
    ];
    
    $form_state->setCached(FALSE);
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    if (file_exists(self::CONFIG_FILE)) {
      $form['configs_fieldset']['api_guard_endpoint_url']['#default_value'] = Settings::$CONFIG_URL;
      $form['configs_fieldset']['api_guard_settings_group']['#default_value'] = Settings::$CONFIG_GROUP;
      $form['configs_fieldset']['api_guard_settings_user_id']['#default_value'] = Settings::$CONFIG_USERID;
      $form['configs_fieldset']['secret']['#default_value'] = Settings::$CONFIG_USERPWD;
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apiguard_config_settings';
  }

  function testConnection(array &$form, FormStateInterface $form_state) {
    #$url = $form['configs_fieldset']['api_guard_endpoint_url']['#value'];
    try {
      $url = $form_state->getValue(['configs_fieldset', 'api_guard_endpoint_url']) . "/health";
      $date = date("Y-m-d h:i:sa");
      $pwd = $form_state->getValue(['configs_fieldset', 'api_guard_settings_user_pwd']);
      if ($pwd == '') {
        $key = Key::loadFromAsciiSafeString(KeyFile::getSystemKey());
        $pwd = Crypto::decrypt($form['configs_fieldset']['secret']['#value'], $key);
      }

      $secret = $form_state->getValue(['configs_fieldset', 'api_guard_settings_user_id']) .
                ':' .
                 $pwd;

      $sig = Signature::getBase64HmacSha256($url, $date, '', $secret);

      $response = \Httpful\Request::post($url)
                  ->addHeaders(array(
                    'Authorization' => $sig,           
                    'Date' => $date,
                  ))
                  ->send();

      $form_state->set('statusCode', $response->code);
    }
    catch(\Exception $e) {
      $form_state->set('statusCode', $e->getMessage());
    }

    $form_state->setRebuild();
  }

  function test_connection_form_callback($form, $form_state) {
    return $form['configs_fieldset']['test_connection_status'];
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    //TODO: add validation

    $output = 'Config settings saved succesfully.';
    try {
      $data = 'url=' . $form_state->getValue(['configs_fieldset', 'api_guard_endpoint_url']) . PHP_EOL .
              'group=' . $form_state->getValue(['configs_fieldset', 'api_guard_settings_group']) . PHP_EOL .
              'userId=' . $form_state->getValue(['configs_fieldset', 'api_guard_settings_user_id']) . PHP_EOL .
              'pwd=' . $form_state->getValue(['configs_fieldset', 'api_guard_settings_user_pwd']);

      $key = Key::loadFromAsciiSafeString(KeyFile::getSystemKey());
      $cipher = Crypto::encrypt($data, $key);

      file_put_contents(self::CONFIG_FILE, $cipher);

      //ensure only owner can read/write
      drupal_chmod(self::CONFIG_FILE, 0600);
      drupal_set_message($output);
    }
    catch(\Exception $e) {
      drupal_set_message(t('Failed to save properties: ') . $e->getMessage(), 'error');
    }
  }
}

Settings::init();
