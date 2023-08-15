<?php
namespace Drupal\rest_api_authentication;
use Drupal\Component\Utility\Html;
use Drupal\user;
class API_Authentication_Basic_Auth {

	static function validate_api_request($request) {
        $api_error = array();
        $api_error['user'] = null;
        $authorization_header = "";
        $config = \Drupal::configFactory()->getEditable('rest_api_authentication.settings');

        if ( !empty(\Drupal::config('rest_api_authentication.settings')->get('custom_header')) || \Drupal::config('rest_api_authentication.settings')->get('custom_header') !=null )
            $authorization_header = $request->headers->get(\Drupal::config('rest_api_authentication.settings')->get('custom_header'));

        if ( $request->headers->get('AUTHORIZATION') !=null || $request->headers->get('AUTHORISATION')!=null )
            $authorization_header = $request->headers->get('AUTHORIZATION') !=null ? $request->headers->get('AUTHORIZATION') : $request->headers->get('AUTHORISATION');

        $authorization_header = Html::escape($authorization_header);                            //html::escape() is used to filtering or escaping or XSS vulnerabilities

        if(empty($authorization_header) || $authorization_header == ""){
            $api_error = array('status' => 'error', 'error' => 'MISSING_AUTHORIZATION_HEADER', 'error_description' => 'Authorization header not received.');
            return $api_error;
        }
        if (!preg_match('/\Basic\b/', $authorization_header)) {
            $api_error = array('status' => 'error', 'error' => 'INVALID_AUTHORIZATION_HEADER_TOKEN_TYPE', 'error_description' => 'Authorization header must be the type of Basic.');
            return $api_error;
        }
        $authorization_header_array = explode( " ", $authorization_header );
        $authorization_header_value = $authorization_header_array[1];
        $decoded_authorization_header = base64_decode($authorization_header_value);

        $creds = explode(":", $decoded_authorization_header);

        if( isset($creds[0]) && isset($creds[1]) ) {
            $name = $creds[0];
            if(empty($name)){
                $api_error = array('status' => 'error', "error" => "MISSING_USERNAME", 'error_description' => 'Username Not Found');
                return $api_error;
            }
            $pwd = $creds[1];

            if(! ( \Drupal::service('user.auth')->authenticate( $name, $pwd ) ) ){
                $config->set('miniorange_basic_authentication_tried', "Failed")->save();
                $api_error = array('status' => 'error', "error" => "INVALID_CREDENTIALS", 'error_description' => 'Invalid username or password');
                return $api_error;
            }
            $user = user_load_by_name($name);
            $api_error['status'] = 'SUCCESS';
            $api_error['user'] = $user;

            $config->set('miniorange_basic_authentication_tried', "Successful")->save();
        }
        else{

            $config->set('miniorange_basic_authentication_tried', "Failed")->save();
            $api_error = array('status' => 'error', "error" => "INCOMPLETE_REQUEST", 'error_description' => 'Incomplete request');
        }
        return $api_error;
    }
}
