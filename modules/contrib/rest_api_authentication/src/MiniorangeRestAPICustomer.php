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
