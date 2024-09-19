<?php

namespace Drupal\rest_api_authentication;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the customer setup form.
 */
class CustomerSetupForm {

  /**
   * Builds the customer setup form.
   *
   * @param array $form
   *   Stores the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Stores the current state of the form.
   *
   * @return array
   *   The modified form array.
   */
  public static function insertForm(array &$form, FormStateInterface $form_state) {
    $current_status = \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_status');
    $form['customersetup'] = [
      '#type' => 'details',
      '#title' => t('Register/Login'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];
    if ($current_status == 'PLUGIN_CONFIGURATION') {
      $form['customersetup']['customer_setup_container_outline']['markup_support_1'] = [
        '#markup' => '<div class="mo_rest_welcome_message">Thank you for registering with miniOrange</div><br><br><h4>Your Profile: </h4>',
      ];
      $header = [
        'email' => [
          'data' => t('Customer Email'),
        ],
        'customerid' => [
          'data' => t('Customer ID'),
        ],
        'module_version' => [
          'data' => t('Module Version'),
        ],
        'php_version' => [
          'data' => t('PHP Version'),
        ],
        'drupal_version' => [
          'data' => t('Drupal Version'),
        ],
      ];

      $options = [];
      $modules_info = \Drupal::service('extension.list.module')->getExtensionInfo('rest_api_authentication');
      $options[0] = [
        'email' => \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_admin_email'),
        'customerid' => \Drupal::config('rest_api_authentication.settings')->get('rest_api_authentication_customer_id'),
        'module_version' => $modules_info['version'],
        'php_version' => phpversion(),
        'drupal_version' => \Drupal::VERSION,

      ];
      $form['customersetup']['customer_setup_container_outline']['customerinfo'] = [
        '#theme' => 'table',
        '#header' => $header,
        '#rows' => $options,
        '#suffix' => '<br>',
      ];
      \Drupal::configFactory()->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_status', $current_status)->save();
    }
    else {
      $form['customersetup']['customer_setup_container_outline']['markup_support_1'] = [
        '#markup' => '<b>LOGIN TO YOUR ACCOUNT USING THE MINIORANGE CREDENTIALS</b><hr><br><div class="mo_rest_api_highlight_background_note_1">If you do not have an account with us yet, please click on the link <a href="' . MiniorangeApiAuthConstants::CREATE_ACCOUNT . '" target="_blank">here</a><br>In case you are facing any issues while trying to configure or use our module, just send us a request and we will get back to you right away.<br /></div><br>',
      ];

      $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_email'] = [
        '#type' => 'textfield',
        '#id' => 'general_text_field',
        '#title' => t('Email:'),
        '#prefix' => '<br>',
        '#attributes' => ['placeholder' => 'Enter your Email here', 'style' => 'width: 70%'],
      ];
      $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_password'] = [
        '#type' => 'password',
        '#id' => 'general_text_field',
        '#title' => t('Password:'),
        '#attributes' => ['placeholder' => 'Enter your Password here', 'style' => 'width: 70%'],
      ];

      $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_activate_module_submit'] = [
        '#type' => 'submit',
        '#prefix' => '<table><tr><td>',
        '#button_type' => 'primary',
        '#suffix' => '</td><td>',
        '#value' => t('Login'),
        '#submit' => ['::activateModuleRequest'],
      ];
      $form['customersetup']['header_bottom_create_account'] = [
        '#markup' => '<a href="' . MiniorangeApiAuthConstants::CREATE_ACCOUNT . '" target="_blank">  Create a new account</a>',
        '#suffix' => '</td></tr></table>',
      ];
      return $form;
    }
    return $form;
  }

}
