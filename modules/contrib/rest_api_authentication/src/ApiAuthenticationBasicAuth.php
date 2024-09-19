<?php

namespace Drupal\rest_api_authentication;

use Drupal\Component\Utility\Html;

/**
 * Validates API requests using Basic Authentication.
 */
class ApiAuthenticationBasicAuth {

  /**
   * Validates the API request.
   *
   * @param mixed $request
   *   The request object.
   *
   * @return array
   *   An array containing the validation result.
   */
  public static function validateApiRequest($request) {
    $api_error = [];
    $api_error['user'] = NULL;
    $authorization_header = "";
    if (!empty(\Drupal::config('rest_api_authentication.settings')->get('custom_header')) || \Drupal::config('rest_api_authentication.settings')->get('custom_header') != NULL) {
      $authorization_header = $request->headers->get(\Drupal::config('rest_api_authentication.settings')->get('custom_header'));
    }

    if ($request->headers->get('AUTHORIZATION') != NULL || $request->headers->get('AUTHORISATION') != NULL) {
      $authorization_header = $request->headers->get('AUTHORIZATION') != NULL ? $request->headers->get('AUTHORIZATION') : $request->headers->get('AUTHORISATION');
    }

    // html::escape() is used to filtering or escaping or XSS vulnerabilities.
    $authorization_header = Html::escape($authorization_header);

    if (empty($authorization_header) || $authorization_header == "") {
      return [
        'status' => 'error',
        'http_code' => '401',
        'error' => 'MISSING_AUTHORIZATION_HEADER',
        'error_description' => 'Authorization header not received.',
      ];
    }
    if (!preg_match('/\Basic\b/', $authorization_header)) {
      return [
        'status' => 'error',
        'http_code' => '401',
        'error' => 'INVALID_AUTHORIZATION_HEADER_TOKEN_TYPE',
        'error_description' => 'Authorization header must be the type of Basic.',
      ];
    }
    $authorization_header_array = explode(" ", $authorization_header);
    $authorization_header_value = $authorization_header_array[1];
    $decoded_authorization_header = base64_decode($authorization_header_value);

    $creds = explode(":", $decoded_authorization_header);

    if (isset($creds[0]) && isset($creds[1])) {
      $name = $creds[0];
      if (empty($name)) {
        return [
          'status' => 'error',
          'http_code' => '401',
          "error" => "MISSING_USERNAME",
          'error_description' => 'Username Not Found',
        ];
      }
      $pwd = $creds[1];

      if (!(\Drupal::service('user.auth')->authenticate($name, $pwd))) {
        return [
          'status' => 'error',
          'http_code' => '401',
          "error" => "INVALID_CREDENTIALS",
          'error_description' => 'Invalid username or password',
        ];
      }
      $user = user_load_by_name($name);

      if ($user->isBlocked()) {
        return [
          'status' => 'error',
          'http_code' => '403',
          "error" => "USER_BLOCKED",
          'error_description' => 'The Username ' . $user->getDisplayName() . ' has not been activated or is blocked.',
        ];
      }
      $api_error['status'] = 'SUCCESS';
      $api_error['user'] = $user;
    }
    else {
      $api_error = [
        'status' => 'error',
        'http_code' => '400',
        "error" => "INCOMPLETE_REQUEST",
        'error_description' => 'Incomplete request',
      ];
    }
    return $api_error;
  }

}
