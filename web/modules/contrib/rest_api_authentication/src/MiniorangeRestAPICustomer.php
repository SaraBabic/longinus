<?php
/**
 * @file
 * Contains miniOrange Customer class.
 */

/**
 * @file
 * This class represents configuration for customer.
 */
namespace Drupal\rest_api_authentication;
use Drupal\Core\Url;
use Drupal\rest_api_authentication\Utilities;
use Drupal\rest_api_authentication\MiniorangeApiAuthConstants;
use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;



class MiniorangeRestAPICustomer {

  public $email;

  public $phone;

  public $customerKey;

  public $transactionId;

  public $password;

  public $otpToken;

  private $defaultCustomerId;

  private $defaultCustomerApiKey;

  /**
   * Constructor.
   */
  public function __construct($email, $password) {
    $this->email = $email;
    $this->password = $password;
    $this->defaultCustomerId = "16555";
    $this->defaultCustomerApiKey = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
  }
    function verifyLicense($code)
    {
        $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/api/backupcode/verify';

        $customerKey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_id');
        $apiKey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_api_key');
        global $base_url;

        /* Current time in milliseconds since midnight, January 1, 1970 UTC. */
        $currentTimeInMillis = round(microtime(true) * 1000);

        /* Creating the Hash using SHA-512 algorithm */
        $stringToHash = $customerKey . number_format($currentTimeInMillis, 0, '', '') . $apiKey;
        $hashValue = hash("sha512", $stringToHash);

        $fields = '';

        $fields = array(
            'code' => $code,
            'customerKey' => $customerKey,
            'additionalFields' => array(
                'field1' => $base_url
            )
        );

        $header = ['Content-Type'=> 'application/json','Customer-Key'=>$customerKey,'Timestamp'=>number_format($currentTimeInMillis, 0, '', ''),'Authorization'=>$hashValue];

        $field_string = json_encode($fields);

        try{
          $response = \Drupal::httpClient()->post($url,['header'=>$header,'body'=>$field_string,'verify'=>FALSE]);
        }catch(Exception $exception){
          $error_msg = $exception->getMessage();
          echo 'Request Error:' . $error_msg;
          exit();
        }

        return $response;
    }

    /**
   * Check if customer exists.
   */
  public function checkCustomer() {
    if (!Utilities::isCurlInstalled()) {
      return json_encode(array(
        "status" => 'CURL_ERROR',
        "statusMessage" => '<a href="'.MiniorangeApiAuthConstants::PHP_CURL .'">PHP cURL extension</a> is not installed or disabled.',
      ));
    }

    $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/customer/check-if-exists';

    $email = $this->email;

    $fields = array(
      'email' => $email,
    );
    $field_string = json_encode($fields);

    $header = ['Content-Type'=>'application/json','charset'=>'UTF - 8','Authorization'=>'Basic'];

    try{
      $content = \Drupal::httpClient()->post($url,['headers'=>$header,'body'=>$field_string,'verify'=>FALSE]);
      return $content->getBody();
    }catch (Exception $exception){
      $error = array(
        '%method' => 'checkCustomer',
        '%file' => 'customer_setup.php',
        '%error' => $exception->getMessage(),
      );
      \Drupal::logger('rest_api_authentication')->notice('Error at %method of %file: %error', $error);
      return $exception->getMessage();
    }
  }

    function updateStatus()
    {

      $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/api/backupcode/updatestatus';

      $customerKey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_id');
      $apiKey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_api_key');
      $currentTimeInMillis = round(microtime(true) * 1000);
      $stringToHash = $customerKey . number_format($currentTimeInMillis, 0, '', '') . $apiKey;
      $hashValue = hash("sha512", $stringToHash);
      $code = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_license_key');
      $fields = array('code' => $code, 'customerKey' => $customerKey);
      $field_string = json_encode($fields);

      $herder=['Content-Type'=>'application/json','Customer-Key'=>$customerKey,'Timestamp'=>number_format($currentTimeInMillis, 0, '', ''),'Authorization'=>$hashValue];

      try{
        $response = \Drupal::httpClient()->post($url,['headers'=>$herder,'body'=>$field_string,'verify'=>FALSE]);
      }catch (Exception $exception){
        $error_msg = $exception->getMessage();
        \Drupal::logger('rest_api_authentication')->notice('Error:  %error', $error_msg);
      }
    }

  /**
   * Get Customer Keys.
   */
  public function getCustomerKeys() {
    if (!Utilities::isCurlInstalled()) {
      return json_encode(array(
        "apiKey" => 'CURL_ERROR',
        "token" => '<a href="'.MiniorangeApiAuthConstants::PHP_CURL.'">PHP cURL extension</a> is not installed or disabled.',
      ));
    }

    $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/customer/key';

    $email = $this->email;
    $password = $this->password;

    $fields = array(
      'email' => $email,
      'password' => $password,
    );
    $field_string = json_encode($fields);

    $header = ['Content-Type'=> 'application/json','charset'=>'UTF - 8','Authorization'=>'Basic'];
    try{
      $content = \Drupal::httpClient()->post($url,['headers'=>$header,'body'=>$field_string,'verify'=>FALSE]);
      return $content->getBody();
    }catch (Exception $exception){
      $error = array(
        '%method' => 'getCustomerKeys',
        '%file' => 'customer_setup.php',
        '%error' => $exception->getMessage(),
      );
      \Drupal::logger('rest_api_authentication')->notice('Error at %method of %file: %error', $error);
      return $exception->getMessage();
    }
  }
}
