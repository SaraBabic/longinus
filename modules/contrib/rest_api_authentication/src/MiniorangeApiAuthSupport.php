<?php

namespace Drupal\rest_api_authentication;

use GuzzleHttp\Exception\GuzzleException;

/**
 * @file
 * This class represents support information for customer.
 */
/**
 * Represents support information for customers.
 */
class MiniorangeApiAuthSupport {
  /**
   * The email address associated with the support request.
   *
   * @var string
   */
  public $email;

  /**
   * The phone number associated with the support request.
   *
   * @var string
   */
  public $phone;
  /**
   * The support query.
   *
   * @var string
   */
  public $query;
  /**
   * The plan type associated with the support request.
   *
   * @var string
   */
  public $plan;

  /**
   * Constructs a new MiniorangeApiAuthSupport object.
   *
   * @param string $email
   *   The email address.
   * @param string $phone
   *   The phone number.
   * @param string $query
   *   The support query.
   * @param string $plan
   *   (Optional) The plan type.
   */
  public function __construct($email, $phone, $query, $plan = '') {
    $this->email = $email;
    $this->phone = $phone;
    $this->query = $query;
    $this->plan = $plan;

  }

  /**
   * Send support query.
   */
  public function sendSupportQuery() {
    $modules_info = \Drupal::service('extension.list.module')->getExtensionInfo('rest_api_authentication');
    $modules_version = $modules_info['version'];
    global $base_url;
    if ($this->plan == 'demo') {
      $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/api/notify/send';

      $subject = "Demo request for Drupal - " . \Drupal::VERSION . " REST API Authentication Free Module ";
      $this->query = 'Demo required for - ' . $this->query;

      $customerKey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_id');
      $apikey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_api_key');
      if ($customerKey == '') {
        $customerKey = "16555";
        $apikey = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
      }

      $currentTimeInMillis = Utilities::getTimestamp();
      $stringToHash = $customerKey . $currentTimeInMillis . $apikey;
      $hashValue = hash("sha512", $stringToHash);

      $content = '<div >Hello, <br><br>Company :<a href="' . $base_url . '" target="_blank" >' . $base_url . '</a><br><br>Phone Number:' . $this->phone . '<br><br>Email:<a href="mailto:' . $this->email . '" target="_blank">' . $this->email . '</a><br><br>Query:[Drupal- ' . \Drupal::VERSION . ' API Authentication Free | ' . $modules_version . ' ] ' . $this->query . '</div>';

      $fields = [
        'customerKey' => $customerKey,
        'sendEmail' => TRUE,
        'email' => [
          'customerKey' => $customerKey,
          'fromEmail' => $this->email,
          'fromName' => 'miniOrange',
          'toEmail' => 'drupalsupport@xecurify.com',
          'toName' => 'drupalsupport@xecurify.com',
          'subject' => $subject,
          'content' => $content,
        ],
      ];

      $header = [
        'Content-Type' => 'application/json',
        'Customer-Key' => $customerKey,
        'Timestamp' => $currentTimeInMillis,
        'Authorization' => $hashValue,
      ];
    }
    elseif ($this->plan == 'trial') {
      $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/api/notify/send';

      $subject = "Trial request for Drupal - " . \Drupal::VERSION . " REST API Authentication Module ";
      $this->query = 'Demo required for: ' . $this->query;

      $customerKey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_id');
      $apikey = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_api_key');
      if ($customerKey == '') {
        $customerKey = "16555";
        $apikey = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
      }

      $currentTimeInMillis = Utilities::getTimestamp();
      $stringToHash = $customerKey . $currentTimeInMillis . $apikey;
      $hashValue = hash("sha512", $stringToHash);

      $content = '<div >Hello, <br><br>Company :<a href="' . $base_url . '" target="_blank" >' . $base_url . '</a><br><br>Phone Number:' . $this->phone . '<br><br>Email:<a href="mailto:' . $this->email . '" target="_blank">' . $this->email . '</a><br><br>Query:[Drupal- ' . \Drupal::VERSION . ' API Authentication Free | ' . $modules_version . ' ] ' . $this->query . '</div>';

      $fields = [
        'customerKey' => $customerKey,
        'sendEmail' => TRUE,
        'email' => [
          'customerKey' => $customerKey,
          'fromEmail' => $this->email,
          'fromName' => 'miniOrange',
          'toEmail' => 'drupalsupport@xecurify.com',
          'toName' => 'drupalsupport@xecurify.com',
          'subject' => $subject,
          'content' => $content,
        ],
      ];

      $header = [
        'Content-Type' => 'application/json',
        'Customer-Key' => $customerKey,
        'Timestamp' => $currentTimeInMillis,
        'Authorization' => $hashValue,
      ];

    }
    else {

      $this->query = '[Drupal - ' . \Drupal::VERSION . ' REST API Authentication Free Module|' . $modules_version . '] <br>' . $this->query;
      $fields = [
        'company' => $base_url,
        'email' => $this->email,
        'phone' => $this->phone,
        'ccEmail' => 'drupalsupport@xecurify.com',
        'query' => $this->query,
      ];

      $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/customer/contact-us';

      $header = ['Content-Type' => 'application/json', 'charset' => 'UTF-8', 'Authorization' => 'Basic'];

    }

    $field_string = json_encode($fields);

    try {
      \Drupal::httpClient()->post($url, ['headers' => $header, 'body' => $field_string, 'verify' => FALSE]);
      return TRUE;

    }
    catch (\Exception $exception) {
      $error = [
        '%method' => 'sendSupportQuery',
        '%file' => 'miniorange_oauth_client_support.php',
        '%error' => $exception->getMessage(),
      ];
      \Drupal::logger('rest_api_authentication')->notice('%error', $error);
      return FALSE;
    }
    catch (GuzzleException $e) {
      $error = [
        '%method' => 'sendSupportQuery',
        '%file' => 'miniorange_oauth_client_support.php',
        '%error' => $e->getMessage(),
      ];
      \Drupal::logger('rest_api_authentication')->notice('%error', $error);
      return FALSE;
    }
  }

}
