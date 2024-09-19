<?php

namespace Drupal\rest_api_authentication;

use Drupal\Component\Utility\Html;

/**
 * Validate the request when API key Authentication method configured in module.
 */
class ApiAuthenticationApiToken {

  /**
   * Validates an API request by checking the authorization header.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The request object containing the headers.
   *
   * @return array|string[]
   *   Array containing the status, HTTP code, error, and error description.
   */
  public static function validateApiRequest($request): array {
    $api_error = [];
    $api_error['user'] = NULL;
    $authorization_header = "";
    $api_error['status'] = 'error';
    if ($request->headers->get('AUTHORIZATION') != NULL || $request->headers->get('AUTHORISATION') != NULL) {
      $authorization_header = $request->headers->get('AUTHORIZATION') != NULL ? $request->headers->get('AUTHORIZATION') : $request->headers->get('AUTHORISATION');
    }

    if (empty($authorization_header) || $authorization_header == "") {
      return [
        'status' => 'error',
        'http_code' => '401',
        'error' => 'MISSING_AUTHORIZATION_HEADER',
        'error_description' => 'Authorization header not received',
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

    // html::escape() is used to filtering or escaping or XSS vulnerabilities.
    $authorization_header = Html::escape($authorization_header);
    if ($authorization_header != "" && strcasecmp($authorization_header, 'Basic') != 0) {
      $authorization_header_array = explode(" ", $authorization_header);
      $authorization_header_value = $authorization_header_array[1];
      $decoded_authorization_header = base64_decode($authorization_header_value);

      $creds = explode(":", $decoded_authorization_header);

      if (isset($creds[0]) && isset($creds[1])) {
        $name = $creds[0];
        if (!empty($name)) {
          $user = user_load_by_name($name);
        }
        $api_key = $creds[1];

        if (empty($user)) {
          $api_error = [
            'status' => 'error',
            'http_code' => '404',
            "error" => "USER_DOES_NOT_EXIST",
            'error_description' => 'The user does not exists',
          ];
        }
        if ((!empty($user)) && $user->isBlocked()) {
          return [
            'status' => 'error',
            'http_code' => '403',
            "error" => "USER_BLOCKED",
            'error_description' => 'The Username ' . $user->getDisplayName() . ' has not been activated or is blocked.',
          ];
        }
        if (\Drupal::config('rest_api_authentication.settings')->get('api_token') != $api_key) {
          $api_error = [
            'status' => 'error',
            'http_code' => '401',
            "error" => "INVALID_API_KEY",
            'error_description' => 'Sorry, you are using invalid API Key',
          ];
        }
        else {
          $api_error['status'] = 'SUCCESS';
          $api_error['user'] = $user;
        }
      }
      else {
        $api_error = [
          'status' => 'error',
          'http_code' => '400',
          "error" => "INVALID_AUTHORIZATION_HEADER",
          'error_description' => 'The authorization header seems to be invalid',
        ];
      }
    }
    else {
      $api_error = [
        'status' => 'error',
        'http_code' => '400',
        "error" => "MISSING_AUTHORIZATION_HEADER",
        'error_description' => 'The Authorization header is missing from the request.',
      ];
    }
    return $api_error;
  }

}
