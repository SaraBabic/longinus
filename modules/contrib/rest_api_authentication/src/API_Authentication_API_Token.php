<?php
namespace Drupal\rest_api_authentication;
use Drupal\Component\Utility\Html;
use Drupal\user;
class API_Authentication_API_Token {

	static function validate_api_request($request) {
        $api_error = array();
        $api_error['user'] = null;
        $authorization_header = "";
        $api_error['status'] = 'error';

        $config = \Drupal::configFactory()->getEditable('rest_api_authentication.settings');

        if ( $request->headers->get('AUTHORIZATION') !=null || $request->headers->get('AUTHORISATION')!=null )
            $authorization_header = $request->headers->get('AUTHORIZATION') !=null ? $request->headers->get('AUTHORIZATION') : $request->headers->get('AUTHORISATION');

        if(empty($authorization_header) || $authorization_header == ""){
            $api_error = array('status' => 'error', 'http_code'=>'401','error' => 'MISSING_AUTHORIZATION_HEADER', 'error_description' => 'Authorization header not received');
            return $api_error;
        }
        if (!preg_match('/\Basic\b/', $authorization_header)) {
            $api_error = array('status' => 'error','http_code'=>'401', 'error' => 'INVALID_AUTHORIZATION_HEADER_TOKEN_TYPE', 'error_description' => 'Authorization header must be the type of Basic.');
            return $api_error;
        }

        $authorization_header = Html::escape($authorization_header);                            //html::escape() is used to filtering or escaping or XSS vulnerabilities
        if($authorization_header != "" && strcasecmp($authorization_header, 'Basic' ) != 0 ){
            $authorization_header_array = explode( " ", $authorization_header );
            $authorization_header_value = $authorization_header_array[1];
            $decoded_authorization_header = base64_decode($authorization_header_value);

            $creds = explode(":", $decoded_authorization_header);

			if( isset($creds[0]) && isset($creds[1]) ) {
                $name = $creds[0];
                if(!empty($name))
                    $user = user_load_by_name($name);
                $api_key = $creds[1];

                if( $user->isBlocked()){
                  $api_error = array('status' => 'error','http_code'=>'403', "error" => "USER_BLOCKED", 'error_description' => 'The Username '.$user->getDisplayName().' has not been activated or is blocked.');
                  return $api_error;
                }
                if(\Drupal::config('rest_api_authentication.settings')->get('api_token') != $api_key ){
                    $api_error = array('status' => 'error','http_code'=>'401',"error" => "INVALID_API_KEY", 'error_description' => 'Sorry, you are using invalid API Key');
                }
                else if(empty($user)){
                    $api_error = array('status' => 'error','http_code'=>'404', "error" => "USER_DOES_NOT_EXIST", 'error_description' => 'The user does not exists');
                }
                else{
                    $api_error['status'] = 'SUCCESS';
                    $api_error['user'] = $user;
                }
            }
            else{
                $api_error = array('status' => 'error','http_code'=>'400', "error" => "INVALID_AUTHORIZATION_HEADER", 'error_description' => 'The authorization header seems to be invalid');
            }
        }
        else{
            $api_error = array('status' => 'error', 'http_code'=>'400',"error" => "MISSING_AUTHORIZATION_HEADER", 'error_description' => 'The Authorization header is missing from the request.');
        }
        return $api_error;
    }
}
