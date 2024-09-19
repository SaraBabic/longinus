<?php

namespace Drupal\rest_api_authentication;

/**
 * This class helps the module to write the function.
 */

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;

/**
 * Has the function which help while authenticate the API requests.
 */
class Utilities {

  /**
   * Generate the random string of the given length.
   */
  public static function generateRandom($length = 30) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  /**
   * Check if the curl is installed or not.
   */
  public static function isCurlInstalled() {
    return in_array('curl', get_loaded_extensions());
  }

  /**
   * Help to open the support form.
   */
  public static function openSupportRequestForm() {
    $response = new AjaxResponse();
    $modal_form = \Drupal::formBuilder()->getForm('\Drupal\rest_api_authentication\Form\MiniornageAPIAuthnRequestSupport');
    $response->addCommand(new OpenModalDialogCommand('Support Request/Contact Us', $modal_form, ['width' => '40%']));
    return $response;
  }

  /**
   * Sends support query.
   */
  public static function sendSupportQuery($email, $phone, $query, $type) {
    $response = new AjaxResponse();
    if (empty($email)||empty($query)) {
      \Drupal::messenger()->addMessage(t('The <b><u>Email</u></b> and <b><u>Query</u></b> fields are mandatory.'), 'error');
      return;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      \Drupal::messenger()->addMessage(t('The email address <b><em>%email</em></b> is not valid.', ['%email' => $email]), 'error');
      return;
    }
    $support = new MiniorangeApiAuthSupport($email, $phone, $query, $type);
    $support_response = $support->sendSupportQuery();
    if ($support_response) {
      $message = [
        '#type' => 'item',
        '#markup' => t('Support query successfully sent. We will get back to you shortly.'),
      ];
      $ajax_form = new OpenModalDialogCommand('Thank you!', $message, ['width' => '50%']);
    }
    else {
      $error = [
        '#type' => 'item',
        '#markup' => t('Error submitting the support query. Please send us your query at
						 <a href="mailto:drupalsupport@xecurify.com">
						 drupalsupport@xecurify.com</a>.'),
      ];
      $ajax_form = new OpenModalDialogCommand('Error!', $error, ['width' => '50%']);
    }
    $response->addCommand($ajax_form);
    return $response;
  }

  /**
   * This function is used to get the timestamp value.
   */
  public static function getTimestamp() {
    $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/mobile/get-timestamp';
    $fields = [];

    $fieldString = is_string($fields) ? $fields : json_encode($fields);

    try {
      $response = \Drupal::httpClient()->post($url, ['headers' => [], 'body' => $fieldString, 'verify' => FALSE]);
      $content = $response->getBody()->getContents();

    }
    catch (\Exception $exception) {
      \Drupal::logger('rest_api_authentication')->notice('Error in sending curl Request' . $exception->getMessage());
      exit();
    }
    if (empty($content)) {
      $currentTimeInMillis = round(microtime(TRUE) * 1000);
      $currentTimeInMillis = number_format($currentTimeInMillis, 0, '', '');
    }
    return empty($content) ? $currentTimeInMillis : $content;
  }

}
