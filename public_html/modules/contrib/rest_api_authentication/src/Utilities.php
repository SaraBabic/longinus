<?php
/**
 * @package    miniOrange
 * @subpackage Plugins
 * @license    GNU/GPLv3
 * @copyright  Copyright 2015 miniOrange. All Rights Reserved.
 *
 *
 * This file is part of miniOrange Drupal REST API module.
 *
 * miniOrange Drupal REST API modules is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * miniOrange Drupal REST API module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with miniOrange REST API Authentication plugin.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Drupal\rest_api_authentication;

use Drupal;
use Drupal\Core\Form\FormStateInterface;
use  Drupal\rest_api_authentication\MiniorangeApiAuthConstants;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

class Utilities {
	public static function generateRandom($length=30) {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';

        for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public static function isCurlInstalled() {
		return in_array('curl', get_loaded_extensions());
	}

	public static function openSupportRequestForm() {
		$response = new AjaxResponse();
		$modal_form = \Drupal::formBuilder()->getForm('\Drupal\rest_api_authentication\Form\MiniornageAPIAuthnRequestSupport');
		$response->addCommand(new OpenModalDialogCommand('Support Request/Contact Us', $modal_form, ['width' => '40%']));
		return $response;
	  }
    /**
     * Sends support query
     */
    public static function send_support_query($email, $phone, $query, $type){
        if(empty($email)||empty($query)){
            \Drupal::messenger()->addMessage(t('The <b><u>Email</u></b> and <b><u>Query</u></b> fields are mandatory.'), 'error');
            return;
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            \Drupal::messenger()->addMessage(t('The email address <b><i>' . $email . '</i></b> is not valid.'), 'error');
            return;
        }
        $support = new MiniorangeApiAuthSupport($email, $phone, $query, $type);
        $support_response =$support->sendSupportQuery();
		if ($support_response) {
			$message = array(
			'#type' => 'item',
			'#markup' => t('Support query successfully sent. We will get back to you shortly.'),
			);
			$ajax_form = new OpenModalDialogCommand('Thank you!', $message, ['width' => '50%']);
		} else {
			$error = array(
			'#type' => 'item',
			'#markup' => t('Error submitting the support query. Please send us your query at
						 <a href="mailto:drupalsupport@xecurify.com">
						 drupalsupport@xecurify.com</a>.'),
			);
			$ajax_form = new OpenModalDialogCommand('Error!', $error, ['width' => '50%']);
		}
    }

    /**
	 * This function is used to get the timestamp value
	 */
	public static function get_timestamp() {
		$url = MiniorangeApiAuthConstants::BASE_URL . '/moas/rest/mobile/get-timestamp';
    $fields = [];

    $fieldString = is_string($fields) ? $fields : json_encode($fields);

    try{
      $response = \Drupal::httpClient()->post($url,['headers'=>[],'body'=>$fieldString,'verify'=>FALSE]);
      $content = $response->getBody()->getContents();

    }catch (Exception $exception){
      \Drupal::logger('rest_api_authentication')->notice('Error in sending curl Request'.$exception->getMessage());
      exit();
    }
		if(empty( $content )){
			$currentTimeInMillis = round( microtime( true ) * 1000 );
			$currentTimeInMillis = number_format( $currentTimeInMillis, 0, '', '' );
		}
		return empty( $content ) ? $currentTimeInMillis : $content;
	}

	public static function getCustomerEmail(){
	   $user = \Drupal::currentUser();
       $adminEmail = is_null(\Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_admin_email')) ? $user->getEmail() : \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_admin_email');
       return $adminEmail;
	}

	public static function getUsersOS() {

		global $user_agent;
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$operating_sysytem  = "Unknown OS Platform";

		$os_array     = array(
							  '/windows nt 10/i'      =>  'Windows 10',
							  '/windows nt 6.3/i'     =>  'Windows 8.1',
							  '/windows nt 6.2/i'     =>  'Windows 8',
							  '/windows nt 6.1/i'     =>  'Windows 7',
							  '/windows nt 6.0/i'     =>  'Windows Vista',
							  '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
							  '/windows nt 5.1/i'     =>  'Windows XP',
							  '/windows xp/i'         =>  'Windows XP',
							  '/windows nt 5.0/i'     =>  'Windows 2000',
							  '/windows me/i'         =>  'Windows ME',
							  '/win98/i'              =>  'Windows 98',
							  '/win95/i'              =>  'Windows 95',
							  '/win16/i'              =>  'Windows 3.11',
							  '/macintosh|mac os x/i' =>  'Mac OS X',
							  '/mac_powerpc/i'        =>  'Mac OS 9',
							  '/linux/i'              =>  'Linux',
							  '/ubuntu/i'             =>  'Ubuntu',
							  '/iphone/i'             =>  'iPhone',
							  '/ipod/i'               =>  'iPod',
							  '/ipad/i'               =>  'iPad',
							  '/android/i'            =>  'Android',
							  '/blackberry/i'         =>  'BlackBerry',
							  '/webos/i'              =>  'Mobile'
						);

		foreach ($os_array as $regex => $value)
			if (preg_match($regex, $user_agent))
				$operating_sysytem = $value;

		return $operating_sysytem;
	}

	public static function drupal_is_cli()
    {
      $server = \Drupal::request()->server;
      $server_software = $server->get('SERVER_SOFTWARE');
      $server_argc = $server->get('argc');

      return !isset($server_software) && (php_sapi_name() == 'cli' || (is_numeric($server_argc) && $server_argc > 0)) ? true : false;
    }
  public static function skippedFeedback(){
    $module_info = \Drupal::service('extension.list.module')->getExtensionInfo('rest_api_authentication');
    $modules_version = $module_info['version'];
    $url = MiniorangeApiAuthConstants::BASE_URL . '/moas/api/notify/send';
    $config = \Drupal::config('rest_api_authentication.settings');
    $email = '';
    $email = $config->get('rest_api_authentication_customer_admin_email');
    $current_user = 'there';
    if($email == null){
      $email = \Drupal::currentUser()->getEmail();
      $current_user = \Drupal::currentUser()->getDisplayName();
      $current_user = !empty($current_user) ? $current_user : 'there';
    }
    $customerKey = $config->get('rest_api_authentication_customer_id');
    $apikey = $config->get('rest_api_authentication_customer_api_key');
    if($customerKey==''){
      $customerKey="16555";
      $apikey="fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
    }
    $currentTimeInMillis = Utilities::get_timestamp();
    $stringToHash 		= $customerKey .  $currentTimeInMillis . $apikey;
    $hashValue 			= hash("sha512", $stringToHash);
    $fromEmail 			= 'no-reply@xecurify.com';
    $subject            = 'Regarding miniOrange ' . \DRUPAL::VERSION . ' REST API Authentication Module - '.$modules_version.' Feedback';

    $content =
      '<div>Hello '.$current_user.',
            <br><br>Thank you for showing interest in the miniOrange Drupal REST API Authentication module.
            <br><br>It seems like you want to authenticate the APIs of your Drupal site. I hope that you found our module useful and easy to configure.
            <br><br>Can you please let us know whether you are able to configure the module successfully or not? If you are facing any issues while configuring the module, please reach out to us at <a href="mailto:'.'drupalsupport@xecurify.com'.'" target="_blank">'. 'drupalsupport@xecurify.com' .'</a>. We will be happy to help you out. If you want we can also set up an online meeting sometime for the same.
            <br><br>Also, can you please provide us with some more information on your use case so that we can provide you with a solution that will satisfy all of your use case requirements?
            <br><br>Looking forward to hearing from you.
            <br><br>Thanks and Regards,
            <br>miniOrange Drupal team
            <br><br><b>This is an auto generated email so please do not reply to this message.</b> You can reply to us on <a href="mailto:drupalsupport@xecurify.com">drupalsupport@xecurify.com</a>';

    $fields = array(
      'customerKey'	=> $customerKey,
      'sendEmail' 	=> true,
      'email' 		=> array(
        'customerKey'   => $customerKey,
        'fromEmail'     => $fromEmail,
        'fromName' 		=> 'miniOrange',
        'toEmail' 		=> $email,
        'toName' 		=> $email,
        'subject' 		=> $subject,
        'content' 		=> $content
      ),
    );

    $field_string = json_encode($fields);
    $header = array('Content-Type'=> 'application/json', 'Customer-Key' => $customerKey, 'Timestamp' => $currentTimeInMillis, 'Authorization' => $hashValue);
    try{
      $response = \Drupal::httpClient()->post($url,['headers'=>$header,'body'=>$field_string,'verify'=>FALSE]);
    }catch (Exception $exception){
      $error_msg = $exception->getMessage();
      echo 'Request Error:' . $error_msg;
      exit();
    }
  }

  public static function restAPIAuthenticationFeedbackFunc(){
    global $base_url;
    $post         = \Drupal::request()->request->all();
    $skip         = isset($post['skip']) ? 1 : 0 ;
    $is_cli       = Utilities::drupal_is_cli();
    $config       = \Drupal::config('rest_api_authentication.settings');
    $site_mail    = \Drupal::currentUser()->getEmail();
    $modules_info = \Drupal::service('extension.list.module')->getExtensionInfo('rest_api_authentication');
    $customerKey  = $config->get('rest_api_authentication_customer_id');
    $fromEmail    = '';
    if(isset($post['uninstall_email']) && !empty($post['uninstall_email'])) {
      $fromEmail  = $post['uninstall_email'];
    }
    else {
      $admin_email = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_admin_email');
      $fromEmail       = empty($admin_email) ? $site_mail : $admin_email;
    }
    $apikey        = $config->get('rest_api_authentication_customer_api_key');
    if ($customerKey == '') {
      $customerKey = "16555";
      $apikey = "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
    }
    $module_version   = $modules_info['version'];

    if( $skip || $is_cli){
      Utilities::skippedFeedback();
    }else{
      $url = MiniorangeApiAuthConstants::BASE_URL. '/moas/api/notify/send';
      $reason = '';
      if(isset($post['uninstall_reason'])) {
        $reason      = $post['uninstall_reason'];
      }

      $q_feedback          = $post['uninstall_other_reason'] ?? '-';
      $basicAuthTried      = $config->get('miniorange_basic_authentication_tried');
      $apikeyAuthTried     = $config->get('miniorange_api_key_authentication_tried');
      $licensePageVisited  = $config->get('miniorange_rest_api_license_page_visited');
      $users_OS            = Utilities::getUsersOS();
      $installed_on        = $config->get('miniorange_rest_api_installation_time_ref');
      $installed_date      = date('d/m/Y H:i:s', $installed_on);
      $triedAuthMethods    = ($basicAuthTried == 'Did not Try') ? 'None' : '<br>Basic Auth: ' . $basicAuthTried . '</br>';

      if (!str_contains($triedAuthMethods, 'None')) {
        $triedAuthMethods .= $apikeyAuthTried !== 'Did not Try' ? '<br>Api Key Auth: ' . $apikeyAuthTried . '</br>' : '';
      } else {
        $triedAuthMethods = $apikeyAuthTried !== 'Did not Try' ? '<br>Api Key Auth: ' . $apikeyAuthTried . '<br>' : 'None';
      }

      if(isset($post['uninstall_other_reason']) && !empty($post['uninstall_other_reason'])) {
        $reason = $reason . ' ('. $q_feedback . ') ';
      }
      $message = 'Reason: ' . $reason;

      $current_time_in_ms = Utilities::get_timestamp();
      $stringToHash = $customerKey . $current_time_in_ms . $apikey;
      $hashValue = hash("sha512", $stringToHash);

      $subject = 'Drupal ' . \DRUPAL::VERSION . ' REST API Authentication Module Feedback | ' . $module_version . ' | PHP Version ' . phpversion();
      $query = '[Drupal ' . \DRUPAL::VERSION . ' REST API Authentication | ' . $module_version . ' | PHP Version ' . phpversion() . ' ]: ' . $message;
      $content = '<div >Hello, <br><br>Company :<a href="' . $base_url . '" target="_blank" >' . $base_url . '</a><br><br>Email :<a href="mailto:' . $fromEmail . '" target="_blank">' . $fromEmail . '</a><br><br>Installed on: ' . $installed_date . '<br><br>Operating System:' . $users_OS . '<br><br>Payment Page Visited: ' . $licensePageVisited . '<br><br>Tried Authentication Methods: ' . $triedAuthMethods . '<br><br>Query: ' . $query . '</div>';
      $fields = array(
        'customerKey' => $customerKey,
        'sendEmail' => true,
        'email' => array(
          'customerKey' => $customerKey,
          'fromEmail' => $fromEmail,
          'fromName' => 'miniOrange',
          'toEmail' => 'drupalsupport@xecurify.com',
          'toName' => 'drupalsupport@xecurify.com',
          'subject' => $subject,
          'content' => $content
        ),
      );

      $field_string = json_encode($fields);

      $header = ['Content-Type' => 'application/json', 'Customer-Key' => $customerKey, 'Timestamp' => $current_time_in_ms, 'Authorization' => $hashValue];

      try {
        $response = \Drupal::httpClient()->post($url, ['headers' => $header, 'body' => $field_string, 'verify' => FALSE]);

      } catch (Exception $exception) {

      }
    }
  }

}
