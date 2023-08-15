<?php

namespace Drupal\rest_api_authentication;
use Drupal\Core\Form\FormStateInterface;
class advancedSettingsForm{
  public static function insertForm(array &$form, FormStateInterface $form_state){
    global $base_url;
    $disabled = TRUE;
    $form['advancedsettings'] = [
      '#type' => 'details',
      '#title' => t('Advanced Settings'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['advancedsettings']['support_container_outline']['publisher'] = array(
      '#markup' => '<b>ADVANCED SETTINGS:</b> These features are present in the <a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>PREMIUM</b></a> version of the module<hr><br><div class="mo_rest_api_highlight_background_note_1">Need any help? Just send us a query and we will get back to you soon.<br /></div><br>',
    );
    $form['advancedsettings']['support_container_outline']['custom_headers'] = array(
      '#type' => 'details',
      '#title' => t(' Custom Header '),
      '#description' => 'This feature allows you to set custom headers for authentication. If you want to authenticate the Drupal REST APIs in a more secure way, you can set a custom Header.',
    );
    $form['advancedsettings']['support_container_outline']['custom_headers']['div_key'] = array(
      '#type' => 'textfield',
      '#disabled' => $disabled,
      '#id'  => 'rest_api_authentication_token_key',
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('custom_header'),
      '#title' => t('Custom header for authentication: '),
      '#attributes' => array('style' => 'width:50%'),
    );
    $form['advancedsettings']['support_container_outline']['custom_headers']['div_key3'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#value' => t('Save Configuration'),
      '#submit' => array('::custom_header_submit'),
    );

    $form['advancedsettings']['support_container_outline']['token_expiry'] = array(
      '#type' => 'details',
      '#title' => t(' Token Expiry Configurations'),
      '#description' => 'Applicable for OAuth 2.0 and JWT Authentication methods. JWT Token and the OAuth Access Token will be get expired after the given time.',
    );

    $form['advancedsettings']['support_container_outline']['token_expiry']['access_token_expiry_time'] = array(
      '#type' => 'textfield',
      '#disabled' => $disabled,
      '#title' => t('Access Token Expiry Time (In minutes): '),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('token_expiry'),
      '#attributes' => array('style' => 'width:50%'),
    );
    $form['advancedsettings']['support_container_outline']['token_expiry']['support_container_outline'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#value' => t('Save Token Configuration'),
      '#submit' => array('::token_expiry_submit'),
    );

    $form['advancedsettings']['support_container_outline']['list_ip'] = array(
      '#type' => 'details',
      '#title' => t(' White list & Blacklist Ip Addresses'),
      '#description' => 'In this section, you can configure IP Based restriction for your API calls.',
    );
    $form['advancedsettings']['support_container_outline']['list_ip']['settings'] = array(
      '#type' => 'radios',
      '#disabled' => $disabled,
      '#prefix' => '<hr>',
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('ip_access_type'),
      '#title' => '',
      '#options' => array(
        0 => t('Allowed IP Addresses'),
        1 => t('Blocked IP Addresses'),
      ),
      '#attributes' => array('class' => array('container-inline')),
    );
    $form['advancedsettings']['support_container_outline']['list_ip']['ip_textarea'] = array(
      '#type' => 'textarea',
      '#disabled' => $disabled,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('list_of_ips'),
      '#title' => t('You can add the IP Addresses here: '),
      '#attributes' => array('style' => 'width:100%','placeholder' => 'You can also add multiple APIs using a ; as a seperator'),
    );
    $form['advancedsettings']['support_container_outline']['list_ip']['token_submit_key3'] = array(
      '#type' => 'submit',
      '#disabled' => $disabled,
      '#button_type' => 'primary',
      '#name'=>'submit',
      '#value' => t('Save IP Configuration'),
      '#submit' => array('::ip_restriction_submit'),
    );

    $form['advancedsettings']['support_container_outline']['list_apis'] = array(
      '#type' => 'details',
      '#title' => t(' Restrict custom APIs'),
      '#description' => 'Custom APIs mentioned here will be restricted. You can and multiple APIs using ";" as a separator',
    );
    $form['advancedsettings']['support_container_outline']['list_apis']['custom_api_textarea'] = array(
      '#type' => 'textarea',
      '#disabled' => $disabled,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('list_of_apis'),
      '#title' => t('You can add the APIs here: '),
      '#attributes' => array('style' => 'width:100%','placeholder' => 'You can also add multiple APIs using a ; as a separator'),
    );
    $form['advancedsettings']['support_container_outline']['list_apis']['token_submit_key3'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#name'=>'submit',
      '#value' => t('Save Configuration'),
    );

    $form['advancedsettings']['support_container_outline']['restrict_roles'] = array(
      '#type' => 'details',
      '#title' => t(' Role Based Restriction'),
      '#description' => 'Restriction based on User Roles.',
    );
    $form['advancedsettings']['support_container_outline']['restrict_roles']['api_textarea'] = array(
      '#type' => 'textarea',
      '#disabled' => $disabled,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('list_of_role_restrictions'),
      '#title' => t('You can add the APIs and roles here: '),
      '#attributes' => array('style' => 'width:100%','placeholder' => 'You can also add multiple APIs->roles using a semicolon (;) as a separator'),
    );
    $form['advancedsettings']['support_container_outline']['restrict_roles']['token_submit_key3'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#value' => t('Save Role Based Restrictions'),
      '#submit' => array('::role_restriction_submit'),
    );
    return $form;
  }
}
