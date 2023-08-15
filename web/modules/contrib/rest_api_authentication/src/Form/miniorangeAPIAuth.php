<?php

/**
 * @file
 * Contains \Drupal\rest_api_authentication\Form\miniorangeAPIAuth.
 */

namespace Drupal\rest_api_authentication\Form;
use Drupal\rest_api_authentication\advancedSettingsForm;
use Drupal\rest_api_authentication\customerSetupForm;
use Drupal\rest_api_authentication\requestForDemoForm;
use Drupal\rest_api_authentication\setupAuthenticationForm;
use Drupal\rest_api_authentication\Utilities;
use Drupal\rest_api_authentication\upgradePlansForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\rest_api_authentication\MiniorangeRestAPICustomer;
use Symfony\Component\HttpFoundation\RedirectResponse;

class miniorangeAPIAuth extends FormBase {

    public function getFormId() {
        return 'rest_api_authentication_config_client';
    }

    public function buildForm(array $form, FormStateInterface $form_state){
        global $base_url;
        $auth_method = \Drupal::config('rest_api_authentication.settings')->get('authentication_method');
        if(empty($auth_method) || $auth_method=null){
          \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',0)->save();
        }
        $form['markup_library_1'] = array(
          '#attached' => array(
              'library' => array(
                  "rest_api_authentication/rest_api_authentication.basic_style_settings",
                )
          ),
      );
      $tab = (isset($_GET['tab'])) ? ($_GET['tab']) : ('edit-api-auth');
      $form['rest_api_authentication_background'] = array(
        '#markup' => '<div class="mo_rest_api_authn_background">',
      );
      $form['verticaltabs'] = [
        '#type' => 'vertical_tabs',
        '#default_tab' => $tab,
      ];

      /**
       * builds and inserts the Setup Authentication Method form
       */
      setupAuthenticationForm::insertForm($form, $form_state);

      /**
       * builds and inserts the Advanced Settings form
       */
      advancedSettingsForm::insertForm($form, $form_state);

      /**
       * builds and inserts the Request For Demo form
       */
      requestForDemoForm::insertForm($form, $form_state);

      /**
       * builds and inserts the Upgrade Plans form
       */
      upgradePlansForm::insertForm($form, $form_state);

      /**
       * builds and inserts the Register/Login form
       */
      customerSetupForm::insertForm($form, $form_state);
      $form['rest_api_authentication_background_end'] = array(
        '#markup' => '</div>',
      );
      return $form;
    }

    function rest_api_authentication_save_basic_config(array &$form, FormStateInterface $form_state){
      global $base_url;
      $form_input = $form_state->getValues();
      $enable_authentication = $form_input['enable_authentication'];

      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('enable_authentication',$enable_authentication)->save();
      \Drupal::messenger()->addMessage(t('Settings Saved Successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
      $response->send();
      return;
    }

    function rest_api_authentication_generate_api_token(array &$form, FormStateInterface $form_state){
      global $base_url;
      $api_key = Utilities::generateRandom(64);
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('api_token', $api_key)->save();
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',1)->save();
      \Drupal::messenger()->addMessage(t('New API Key generated successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
      $response->send();
      return;
    }
    function rest_api_authentication_save_ext_oauth(array &$form, FormStateInterface $form_state){
      global $base_url;
      $user_info = $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_ext_oauth']['#value'];
      $username_attribute = $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_ext_oauth_username']['#value'];
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('user_info_endpoint',$user_info)->save();
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('username_attribute',$username_attribute)->save();
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',4)->save();
      \Drupal::messenger()->addMessage(t('Configurations for 3rd party provider saved successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
      $response->send();
      return;
    }
    function rest_api_authentication_generate_oauth_keys(array &$form, FormStateInterface $form_state){
      $client_id = Utilities::generateRandom(30);
      $client_secret = Utilities::generateRandom(30);
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('oauth_client_id',$client_id)->save();
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('oauth_client_secret',$client_secret)->save();
      self::rest_api_authentication_save_oauth_token($form, $form_state);
    }
    function rest_api_authentication_save_oauth_token(array &$form, FormStateInterface $form_state){
      global $base_url;
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',2)->save();
      \Drupal::messenger()->addMessage(t('OAuth method configurations Saved successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
      $response->send();
      return;
    }
    function rest_api_authentication_save_id_token(array &$form, FormStateInterface $form_state){
      global $base_url;
      if(isset($form['api_auth']['mo_rest_api_authentication_authenticator']['settings']['active']))
        $authentication_method =  $form['api_auth']['mo_rest_api_authentication_authenticator']['settings']['active']['#value'];
      if($authentication_method == 0){
        \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',0)->save();
        \Drupal::messenger()->addMessage(t('Basic Authentication Configurations Saved successfully.'));
        $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
        $response->send();
        return;
      }
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',3)->save();
      \Drupal::messenger()->addMessage(t('Selected method saved Successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
      $response->send();
      return;
    }

    function submitForm(array &$form, FormStateInterface $form_state){
      global $base_url;
      $list_of_apis = $form['advancedsettings']['support_container_outline']['list_apis']['api_textarea']['#value'];
      $api_access =   $form['advancedsettings']['support_container_outline']['list_apis']['settings']['#value'];
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('api_access_type',$api_access)->save();
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('list_of_apis',$list_of_apis)->save();
      \Drupal::messenger()->addMessage(t('Configurations for API Based Restriction saved successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-advanced-settings");
      $response->send();
      return;
    }

    function rest_api_authentication_save_basic_auth_conf(array &$form, FormStateInterface $form_state){
      global $base_url;
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('authentication_method',0)->save();
      \Drupal::messenger()->addMessage(t('Configurations saved successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
      $response->send();
      return;
    }

    /**
     * Send support query.
     */
    public function saved_support(array &$form, FormStateInterface $form_state) {
      $email = trim($form['rest_api_authentication_support_email_address']['#value']);
      $phone = $form['rest_api_authentication_support_phone_number']['#value'];
      $query = trim($form['rest_api_authentication_support_query']['#value']);
      Utilities::send_support_query($email, $phone, $query, null);
    }

    /**
     * Custom Header Save Button
     */
    public function custom_header_submit(array &$form, FormStateInterface $form_state) {
      global $base_url;
      $custom_header = trim($form['advancedsettings']['support_container_outline']['custom_headers']['div_key']['#value']);
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('custom_header',$custom_header)->save();
      \Drupal::messenger()->addMessage(t('Custom Header Configurations saved successfully.'));

      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-advanced-settings");
      $response->send();
      return;
    }

    /**
     * Save token Expiry
     */
    public function token_expiry_submit(array &$form, FormStateInterface $form_state) {
      global $base_url;
      $custom_header = trim($form['advancedsettings']['support_container_outline']['custom_headers']['div_key']['#value']);
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('custom_header',$custom_header)->save();
      $token_expiry = trim($form['advancedsettings']['support_container_outline']['token_expiry']['access_token_expiry_time']['#value']);
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('token_expiry',$token_expiry)->save();
      \Drupal::messenger()->addMessage(t('Configurations saved successfully.'));
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-advanced-settings");
      $response->send();
      return;
    }

    /**
     * Send a request for Demo.
     */
    public function saved_demo_request(array &$form, FormStateInterface $form_state) {
      global $base_url;
      $email = trim($form['demo']['container_outline']['rest_api_authentication_email_address']['#value']);
      $phone = $form['demo']['container_outline']['rest_api_authentication_phone_number']['#value'];
      $query = trim($form['demo']['container_outline']['rest_api_authentication_demo_query']['#value']);
      Utilities::send_support_query($email, $phone, $query, 'demo');
      $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-demo");
      $response->send();
    }
/**
 * Remove account
 */
    function rest_api_authentication_remove_account(&$form, $form_state){
        global $base_url;
        if (isset($_POST['value_check']) && $_POST['value_check'] == 'True'){
            if(\Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_license_key') != NULL) {
              $current_status = 'CUSTOMER_SETUP';
                $username = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_admin_email');
                $customer = new MiniorangeRestAPICustomer($username, NULL);
                $response = json_decode($customer->updateStatus());

                if ($response->status == 'SUCCESS'){
                    $clear_value = '';
                    \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_admin_email', $clear_value)->save();
                    \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_id', $clear_value)->save();
                    \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_api_key', $clear_value)->save();
                    \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_license_key', $clear_value)->save();
                    \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_password', $clear_value)->save();

                    \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_status', $current_status)->save();

                    \Drupal::messenger()->addMessage(t('Your account has been removed successfully!'), 'status');
                    $_POST['value_check'] = 'False';
                }
            }
            $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customer-setup");
            $response->send();
            return;
        }
        else{
            $myArray = array();
            $myArray = $_POST;
            $form_id = $_POST['form_id'];
            $form_token = $_POST['form_token'];
            $op = $_POST['op'];
            $build_id = $_POST['form_build_id'];
            global $base_url;
            ?>

            <html>
            <head>
                <title>Confirmation</title>
                <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
            </head>

            <body style="font-family: 'PT Serif', serif;">
            <div style="margin: 15% auto; height:35%; width: 40%; background-color: #eaebed; text-align: center; box-shadow: 10px 5px 5px darkgray; border-radius: 2%;">
                <div style="color: #a94442; background-color:#f2dede; padding: 15px; margin-bottom: 20px; text-align:center; border:1px solid #E6B3B2; font-size:16pt; border-radius: 2%;">
                    <strong>Are you sure you want to remove account..!!</strong>
                </div>
                <p style="font-size:14px; margin-left: 8%; margin-right: 8%"><strong>Warning </strong>: If you remove your account, you will have to enter licence key again after login/sign in with the new account.</p>
                <br/>
                <form name="f" method="post" action="" id="mo_remove_account">
                    <div>
                        <input type="hidden" name="op" value=<?php echo $op;?>>
                        <input type="hidden" name="form_build_id" value= <?php echo $build_id;?>>
                        <input type="hidden" name="form_token" value=<?php echo $form_token;?>>
                        <input type="hidden" name="form_id" value= <?php echo $form_id;?>>
                        <input type="hidden" name="value_check" value= 'True'>
                    </div>
                    <div  style="margin: auto; text-align: center;"   class="mo2f_modal-footer">
                        <input type="submit" style=" padding:1%; width:100px; background: #0091CD none repeat scroll 0% 0%; cursor: pointer; font-size:15px; border-width: 1px; border-style: solid; border-radius: 3px; white-space: nowrap; box-sizing: border-box;border-color: #0073AA; box-shadow: 0px 1px 0px rgba(120, 200, 230, 0.6) inset; color: #FFF;" name="miniorange_confirm_submit" class="button button-danger button-large" value="Confirm"/>&nbsp;&nbsp;&nbsp;&nbsp;

                        <a type="submit" style=" padding:1%; width:100px; background: #0091CD none repeat scroll 0% 0%; cursor: pointer; font-size:15px; border-width: 1px; border-style: solid; border-radius: 3px; white-space: nowrap; box-sizing: border-box;border-color: #0073AA; box-shadow: 0px 1px 0px rgba(120, 200, 230, 0.6) inset; color: #FFF; text-decoration: none;" class="button button-danger button-large" href=<?php echo $base_url.'/admin/config/people/rest_api_authentication/customer_setup'; ?> >Cancel</a>

                    </div>
                </form>
            </div>
            </body>
            </html>
            <?php
            exit;
        }
    }

    /**
     * Activating the module
     */
    public function activate_module_request(array &$form, FormStateInterface $form_state) {
      global $base_url;
      $username = $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_email']['#value'];
      $password = $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_password']['#value'];
      if(empty($username)||empty($password)){
          \Drupal::messenger()->addMessage(t('The <b><u>Email Address</u></b> and the <b><u>Password</u></b> fields are mandatory.'), 'error');
          return;
      }
      if (!\Drupal::service('email.validator')->isValid( $username )) {
          \Drupal::messenger()->addMessage(t('The email address <i>' . $username . '</i> does not seems to be valid.'), 'error');
          return;
      }
      $customer_config = new MiniorangeRestAPICustomer($username,$password);
      $check_customer_response = json_decode($customer_config->checkCustomer());

      if (isset( $check_customer_response->status ) && $check_customer_response->status == 'CUSTOMER_NOT_FOUND') {
        \Drupal::messenger()->addMessage(t('Invalid credentials'), 'error');
        $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
        $response->send();
        return;
      }
      elseif (isset( $check_customer_response->status ) && $check_customer_response->status == 'CURL_ERROR') {
        \Drupal::messenger()->addMessage(t('cURL is not enabled. Please enable cURL'), 'error');
      }
      else {

        $customer_keys_response = json_decode($customer_config->getCustomerKeys());
//        $customer_keys_response = json_decode($customer_config->getCustomerKeys()->getBody()->getContents());

        if (json_last_error() == JSON_ERROR_NONE) {
            \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_id', $customer_keys_response->id)->save();
            \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_admin_token', $customer_keys_response->token)->save();
            \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_admin_email', $username)->save();
            \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_api_key', $customer_keys_response->apiKey)->save();
            \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_customer_password', $password)->save();
          $current_status = 'PLUGIN_CONFIGURATION';
            \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_status', $current_status)->save();
            \Drupal::messenger()->addMessage(t('Successfully retrieved your account.'));
            $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
            $response->send();
            return;
      }
      else {
        \Drupal::messenger()->addMessage(t('Invalid credentials'), 'error');
        $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
        $response->send();
        return;
      }
    }
    $response = new RedirectResponse($base_url."/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
    $response->send();
      return;
    }
}
