<?php

namespace Drupal\apiguard\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\apiguard\Core\Utils\KeyFile;
use \Defuse\Crypto\Crypto;
use \Defuse\Crypto\Key;

/**
 *
 * @see \Drupal\Core\Form\FormBase
 * @see \Drupal\Core\Form\ConfigFormBase
 */
class AddProxy extends ApiFormBase {
  private const CONFIG_FILE = 'private/.apiguard';

  public function buildForm(array $form, FormStateInterface $form_state) {

    $statusCode = $form_state->get('statusCode');
    if ($statusCode === NULL || empty($statusCode)) {  
      $status = '<span style="color:red !important">' . t('Unknown') . '</span>';
    }
    else if (is_numeric($statusCode) && ! preg_match('/^(?:4|5)[0-9]{2}$/', $statusCode)){
      $status = '<span style="color:green">' . t('Successful') . '</span>';
    }
    else {
      $status = '<span style="color:red">' . $statusCode . '</span>';
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

    $form['configs_fieldset']['api_guard_settings_group'] = [
        '#type' => 'textfield',
        '#title' => t('Group'),
    ];

    $form['configs_fieldset']['api_guard_settings_user_id'] = [
        '#type' => 'textfield',
        '#title' => t('User'),
    ];

    $form['configs_fieldset']['test_connection_status'] = [
      '#prefix' => '<div id="test-connect-result"><br>',
      '#suffix' => '</div>',
      '#markup' =>  $status,
    ];

    $form['configs_fieldset']['actions'] = [
      '#type' => 'actions',
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
      $cipher = file_get_contents(self::CONFIG_FILE);
      $key = Key::loadFromAsciiSafeString(KeyFile::getSystemKey());
      $data = Crypto::decrypt($cipher, $key);

      $props = parse_ini_string($data);
      $form['configs_fieldset']['api_guard_endpoint_url']['#default_value'] = $props['url'];
      $form['configs_fieldset']['api_guard_settings_group']['#default_value'] = $props['group'];
      $form['configs_fieldset']['api_guard_settings_user_id']['#default_value'] = $props['userId'];
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
      $url = $form_state->getValue(['configs_fieldset', 'api_guard_endpoint_url']);
      $response = \Httpful\Request::get($url)->send();

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
              'userId=' . $form_state->getValue(['configs_fieldset', 'api_guard_settings_user_id']);

      $key = Key::loadFromAsciiSafeString(KeyFile::getSystemKey());
      $cipher = Crypto::encrypt($data, $key);

      file_put_contents(self::CONFIG_FILE, $cipher);

      //ensure only owner can read/write
      drupal_chmod(self::CONFIG_FILE, 0600);
    }
    catch(\Exception $e) {
      $output = 'Failed to save properties: ' . $e->getMessage();
    }

    drupal_set_message($output);
  }

}
