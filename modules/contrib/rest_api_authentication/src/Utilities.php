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

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
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
}
