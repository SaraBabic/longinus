<?php

namespace Drupal\rest_api_authentication;
use Drupal\Core\Form\FormStateInterface;
use Drupal\rest_api_authentication\MiniorangeApiAuthConstants;

class customerSetupForm{
  public static function insertForm(array &$form, FormStateInterface $form_state){
    $current_status = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_status');
    $form['customersetup'] = [
      '#type' => 'details',
      '#title' => t('Register/Login'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];
    if ($current_status == 'PLUGIN_CONFIGURATION') {
      $form['customersetup']['customer_setup_container_outline']['markup_support_1'] = array(
        '#markup' => '<div class="mo_rest_welcome_message">Thank you for registering with miniOrange</div><br><br><h4>Your Profile: </h4>'
      );
      $header = array(
        'email' => array(
          'data' => t('Customer Email')
        ),
        'customerid' => array(
          'data' => t('Customer ID')
        ),
        'module_version' => array(
          'data' => t('Module Version')
        ),
        'php_version' => array(
          'data' => t('PHP Version')
        ),
      'drupal_version' => array(
          'data' => t('Drupal Version')
      ),
      );

      $options = [];
      $modules_info = \Drupal::service('extension.list.module')->getExtensionInfo('rest_api_authentication');
      $options[0] = array(
        'email' => \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_admin_email'),
        'customerid' => \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_id'),
        'module_version'=> $modules_info['version'],
        'php_version' => phpversion(),
        'drupal_version'=> \Drupal::VERSION,

      );
      $form['customersetup']['customer_setup_container_outline']['customerinfo'] = array(
        '#theme' => 'table',
        '#header' => $header,
        '#rows' => $options,
        '#suffix' => '<br>'
      );
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_status', $current_status)->save();
    }
    else{
      $form['customersetup']['customer_setup_container_outline']['markup_support_1'] = array(
        '#markup' => '<b>LOGIN TO YOUR ACCOUNT USING THE MINIORANGE CREDENTIALS</b><hr><br><div class="mo_rest_api_highlight_background_note_1">If you do not have an account with us yet, please click on the link <a href="'. MiniorangeApiAuthConstants::CREATE_ACCOUNT .'" target="_blank">here</a><br>In case you are facing any issues while trying to configure or use our module, just send us a request and we will get back to you right away.<br /></div><br>',
      );

      $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_email'] = array(
        '#type' => 'textfield',
        '#id' => 'general_text_field',
        '#title' => t('Email: '),
        '#prefix' => '<br>',
        '#attributes' => array('placeholder' => 'Enter your Email here','style' => 'width: 70%'),
      );
      $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_password'] = array(
        '#type' => 'password',
        '#id' => 'general_text_field',
        '#title' => t('Password: '),
        '#attributes' => array('placeholder' => 'Enter your Password here','style' => 'width: 70%'),
      );

      $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_activate_module_submit'] = array(
        '#type' => 'submit',
        '#prefix' => '<table><tr><td>',
        '#button_type' => 'primary',
        '#suffix' => '</td><td>',
        '#value' => t('Login'),
        '#submit' => array('::activate_module_request'),
      );
      $form['customersetup']['header_bottom_create_account'] = array(
        '#markup' => '<a href="'.MiniorangeApiAuthConstants::CREATE_ACCOUNT.'" target="_blank">  Create a new account</a>',
        '#suffix' => '</td></tr></table>',
      );
      return $form;
    }
    return $form;
  }
}
