<?php

namespace Drupal\rest_api_authentication;

/**
 * Help to register the customers.
 */
class MiniorangeRestAPICustomer {
  /**
   * The email of the customer.
   *
   * @var string
   */
  public $email;
  /**
   * The phone number of the customer.
   *
   * @var string
   */
  public $phone;
  /**
   * The customer key.
   *
   * @var string
   */
  public $customerKey;
  /**
   * The transaction ID.
   *
   * @var string
   */
  public $transactionId;
  /**
   * The password of the customer.
   *
   * @var string
   */
  public $password;
  /**
   * The OTP token.
   *
   * @var string
   */
  public $otpToken;
  /**
   * The default customer ID.
   *
   * @var string
   */
  private $defaultCustomerId;
  /**
   * The default customer API key.
   *
   * @var string
   */
  private $defaultCustomerApiKey;
  /**
   * Constructor.
   */

  /**
   * Constructor.
   *
   * @param string $email
   *   The email of the customer.
   * @param string $password
   *   The password of the customer.
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
      return json_encode([
        "status" => 'CURL_ERROR',
        "statusMessage" =>
        '<a href="' . MiniorangeApiAuthConstants::PHP_CURL . '">PHP cURL extension</a> is not installed or disabled.',
      ]);
    }

    $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/customer/check-if-exists';
    $email = $this->email;
    $fields = ['email' => $email];
    $field_string = json_encode($fields);
    $header = ['Content-Type' => 'application/json', 'charset' => 'UTF - 8', 'Authorization' => 'Basic'];
    try {
      $content = \Drupal::httpClient()->post($url, ['headers' => $header, 'body' => $field_string, 'verify' => FALSE]);
      return $content->getBody();
    }
    catch (\Exception $exception) {
      $error = ['%method' => 'checkCustomer', '%file' => 'customer_setup.php', '%error' => $exception->getMessage()];
      \Drupal::logger('rest_api_authentication')->notice('Error at %method of %file: %error', $error);
      return $exception->getMessage();
    }
  }

  /**
   * Get Customer Keys.
   */
  public function getCustomerKeys() {
    if (!Utilities::isCurlInstalled()) {
      return json_encode([
        "apiKey" => 'CURL_ERROR',
        "token" => '<a href="' . MiniorangeApiAuthConstants::PHP_CURL . '">PHP cURL extension</a> is not installed or disabled.',
      ]);
    }

    $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/customer/key';
    $email = $this->email;
    $password = $this->password;
    $fields = ['email' => $email, 'password' => $password];
    $field_string = json_encode($fields);
    $header = ['Content-Type' => 'application/json', 'charset' => 'UTF - 8', 'Authorization' => 'Basic'];
    try {
      $content = \Drupal::httpClient()->post($url, ['headers' => $header, 'body' => $field_string, 'verify' => FALSE]);
      return $content->getBody();
    }
    catch (\Exception $exception) {
      $error = ['%method' => 'getCustomerKeys', '%file' => 'customer_setup.php', '%error' => $exception->getMessage()];
      \Drupal::logger('rest_api_authentication')->notice('Error at %method of %file: %error', $error);
      return $exception->getMessage();
    }
  }

}
