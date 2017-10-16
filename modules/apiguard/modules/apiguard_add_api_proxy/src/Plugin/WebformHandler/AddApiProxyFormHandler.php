<?php
namespace Drupal\apiguard_add_api_proxy\Plugin\WebformHandler;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Serialization\Yaml;
use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\webformSubmissionInterface;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use \Defuse\Crypto\Crypto;
use \Defuse\Crypto\Key;

use Drupal\apiguard_add_api_proxy\Plugin\Core\Utils\Configs;
use Drupal\apiguard_add_api_proxy\Plugin\Core\Utils\KeyFile;
use Drupal\apiguard_add_api_proxy\Plugin\Core\Utils\Signature;

/**
 * Form submission handler.
 *
 * @WebformHandler(
 *   id = "add_api_proxy_form_handler",
 *   label = @Translation("Add API Proxy"),
 *   category = @Translation("Form Handler"),
 *   description = @Translation("Add APIS to Apiguard Gateway"),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_SINGLE,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 * )
 */
class AddApiProxyFormHandler extends WebformHandlerBase {

     /**
       * {@inheritdoc}
       

     public function defaultConfiguration() {
        return [
            'submission_url' => 'https://api.example.org/SOME/ENDPOINT',
        ];
    }

    /**
     * {@inheritdoc}
     
    public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
        $form['submission_url'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Submission URL to api.example.org'),
            '#description' => $this->t('The URL to post the submission data to.'),
            '#default_value' => $this->configuration['submission_url'],
            '#required' => TRUE,
        ];
        return $form;
    }



  /**
   *Correct:

$response = $client->post('http://example.com/api', [
    'json' => [
        'name' => 'Example name',
    ]
])
Correct:

$response = $client->post('http://example.com/api', [
    'headers' => ['Content-Type' => 'application/json'],
    'body' => json_encode([
        'name' => 'Example name',
    ])
])
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission) {
      $name = $webform_submission->getData('proxy_name');
      $requestUri = $webform_submission->getData('proxy_api_endpoint');
      $downstreamUri = $webform_submission->getData('proxy_target_endpoint');

      drupal_set_message('name=' . $name);
      drupal_set_message('requestUri=' . $requestUri);
      drupal_set_message('downstreamUri=' . $downstreamUri);
      
      try {
        if (!empty($name) && !empty($requestUri) && !empty($downstreamUri)) {

          // create signature
          #$apiguardUrl = 'http://localhost:8080/apiguard/apis';
          $apiguardUrl = Configs::$CONFIG_URL;
          $date = date("Y-m-d h:i:sa");
          $body = array('name'=> $name,
                'request_uri'=> $requestUri,
                'downstream_uri'=> $downstreamUri,);
          $jsonBody = json_encode($body);
          $key = Key::loadFromAsciiSafeString(KeyFile::getSystemKey());
          $secret = Configs::$CONFIG_USERID . ":" . Crypto::decrypt(Configs::$CONFIG_USERPWD, $key);
          $sig = Signature::getBase64HmacSha256($apiguardUrl, $date, $jsonBody, $secret);

          $client = new Client();
          $response = $client->post($apiguardUrl, [
              'headers' => [
                'Date' => $date,
                'Content-type' => 'application/json',
                'Authorization' => $sig
              ],
              'json' => $body
            ]);
            
          $respBody = $response->getBody();     
          $code = $response->getStatusCode();

          drupal_set_message('status=' . $code);
         
          if ($code >= 200 && $code < 300) {
            $jresp = json_decode($respBody, true);
            $msg = 'Porxy name = ' . $jresp['name'] . PHP_EOL .
                'Porxy endpoint = ' . $jresp['reqUri'] . PHP_EOL .
                'Target endpoint = ' . $jresp['downstreamUri'];
            drupal_set_message(t("Successful: ") . $respBody);
          }
          else {
            // Handle the error
            \Drupal::logger('AddApiProxyFormHandler')->error($respBody);
            drupal_set_message(t("Failed: ") . $respBody);
          }
          
          return true;
        }
      }
      catch(RequestException $e) {
        $msg = '';
        $resp = $e->getResponse();
        if (isset($resp)) {
          $code = $resp->getStatusCode();
          if ($code >= 400 && $code < 500) {
            $msg = t('Bad request: ');
          }
        }

        drupal_set_message($msg . $e->getMessage(), 'error');
      }
      catch(\Exception $e) {
        drupal_set_message($e->getMessage(), 'error');
      }
 }
}   
?>