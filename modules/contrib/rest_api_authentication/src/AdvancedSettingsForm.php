<?php

namespace Drupal\rest_api_authentication;

use Drupal\Core\Form\FormStateInterface;

/**
 * Advanced setting form.
 */
class AdvancedSettingsForm {

  /**
   * Inserts the advanced settings form elements into the provided form array.
   *
   * @param array $form
   *   The form array to which the advanced settings elements will be added.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Current state of the form elements.
   *
   * @return array
   *   The modified form array with the advanced settings elements added.
   */
  public static function insertForm(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $disabled = TRUE;
    $form['advancedsettings'] = [
      '#type' => 'details',
      '#title' => t('Advanced Settings'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['advancedsettings']['support_container_outline']['publisher'] = [
      '#markup' => '<b>ADVANCED SETTINGS:</b> These features are present in the <a href = "' . $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>PREMIUM</b></a> version of the module<hr><br><div class="mo_rest_api_highlight_background_note_1">Need any help? Just send us a query and we will get back to you soon.<br /></div><br>',
    ];
    $form['advancedsettings']['support_container_outline']['custom_headers'] = [
      '#type' => 'details',
      '#title' => t('Custom Header'),
      '#description' => t('This feature allows you to set custom headers for authentication. If you want to authenticate the Drupal REST APIs in a more secure way, you can set a custom Header.'),
    ];
    $form['advancedsettings']['support_container_outline']['custom_headers']['div_key'] = [
      '#type' => 'textfield',
      '#disabled' => $disabled,
      '#id'  => 'rest_api_authentication_token_key',
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('custom_header'),
      '#title' => t('Custom header for authentication:'),
      '#attributes' => ['style' => 'width:50%'],
    ];
    $form['advancedsettings']['support_container_outline']['custom_headers']['div_key3'] = [
      '#type' => 'button',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#value' => t('Save Configuration'),
    ];

    $form['advancedsettings']['support_container_outline']['token_expiry'] = [
      '#type' => 'details',
      '#title' => t('Token Expiry Configurations'),
      '#description' => t('Applicable for OAuth 2.0 and JWT Authentication methods. JWT Token and the OAuth Access Token will be get expired after the given time.'),
    ];

    $form['advancedsettings']['support_container_outline']['token_expiry']['access_token_expiry_time'] = [
      '#type' => 'textfield',
      '#disabled' => $disabled,
      '#title' => t('Access Token Expiry Time (In minutes):'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('token_expiry'),
      '#attributes' => ['style' => 'width:50%'],
    ];
    $form['advancedsettings']['support_container_outline']['token_expiry']['support_container_outline'] = [
      '#type' => 'button',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#value' => t('Save Token Configuration'),
    ];

    $form['advancedsettings']['support_container_outline']['list_ip'] = [
      '#type' => 'details',
      '#title' => t('White list & Blacklist Ip Addresses'),
      '#description' => t('In this section, you can configure IP Based restriction for your API calls.'),
    ];
    $form['advancedsettings']['support_container_outline']['list_ip']['settings'] = [
      '#type' => 'radios',
      '#disabled' => $disabled,
      '#prefix' => '<hr>',
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('ip_access_type'),
      '#title' => '',
      '#options' => [
        0 => t('Allowed IP Addresses'),
        1 => t('Blocked IP Addresses'),
      ],
      '#attributes' => ['class' => ['container-inline']],
    ];
    $form['advancedsettings']['support_container_outline']['list_ip']['ip_textarea'] = [
      '#type' => 'textarea',
      '#disabled' => $disabled,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('list_of_ips'),
      '#title' => t('You can add the IP Addresses here:'),
      '#attributes' => [
        'style' => 'width:100%',
        'placeholder' => 'You can also add multiple APIs using a ; as a seperator',
      ],
    ];
    $form['advancedsettings']['support_container_outline']['list_ip']['token_submit_key3'] = [
      '#type' => 'submit',
      '#disabled' => $disabled,
      '#button_type' => 'primary',
      '#name' => 'submit',
      '#value' => t('Save IP Configuration'),
      '#submit' => ['::ip_restriction_submit'],
    ];

    $form['advancedsettings']['support_container_outline']['list_apis'] = [
      '#type' => 'details',
      '#title' => t('Restrict custom APIs'),
      '#description' => t('Custom APIs mentioned here will be restricted. You can and multiple APIs using ";" as a separator'),
    ];
    $form['advancedsettings']['support_container_outline']['list_apis']['custom_api_textarea'] = [
      '#type' => 'textarea',
      '#disabled' => $disabled,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('list_of_apis'),
      '#title' => t('You can add the APIs here:'),
      '#attributes' => [
        'style' => 'width:100%',
        'placeholder' => 'You can also add multiple APIs using a ; as a separator',
      ],
    ];
    $form['advancedsettings']['support_container_outline']['list_apis']['token_submit_key3'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#name' => 'submit',
      '#value' => t('Save Configuration'),
    ];

    $form['advancedsettings']['support_container_outline']['restrict_roles'] = [
      '#type' => 'details',
      '#title' => t('Role Based Restriction'),
      '#description' => t('Restriction based on User Roles.'),
    ];
    $form['advancedsettings']['support_container_outline']['restrict_roles']['api_textarea'] = [
      '#type' => 'textarea',
      '#disabled' => $disabled,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('list_of_role_restrictions'),
      '#title' => t('You can add the APIs and roles here:'),
      '#attributes' => [
        'style' => 'width:100%',
        'placeholder' => 'You can also add multiple APIs->roles using a semicolon (;) as a separator',
      ],
    ];
    $form['advancedsettings']['support_container_outline']['restrict_roles']['token_submit_key3'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => $disabled,
      '#value' => t('Save Role Based Restrictions'),
      '#submit' => ['::role_restriction_submit'],
    ];
    return $form;
  }

}
