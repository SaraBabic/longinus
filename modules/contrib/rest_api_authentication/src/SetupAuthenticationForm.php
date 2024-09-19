<?php

namespace Drupal\rest_api_authentication;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the form for setting up authentication methods.
 */
class SetupAuthenticationForm {

  /**
   * Inserts the setup authentication form into the provided form array.
   *
   * @param array $form
   *   Stores the data in the form fields.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The populated form array.
   */
  public static function insertForm(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $form['markup_library_3'] = [
      '#attached' => [
        'library' => [
          "rest_api_authentication/rest_api_authentication.basic_style_settings",
        ],
      ],
    ];
    $form['api_auth'] = [
      '#type' => 'details',
      '#title' => t('Setup Authentication Method'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['head_note'] = [
      '#markup' => '<div class="mo_rest_api_highlight_background_note_1">Need any help? We will be more than happy to help you with configuring the module as per your use case requirements.</div><br>',
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['enable_authentication'] = [
      '#type' => 'checkbox',
      '#title' => t('Enable Authentication'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('enable_authentication'),
      '#description' => t('Select this checkbox to enable authenticating your Drupal APIs through this module'),
    ];

    $url = $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans';
    $form['api_auth']['mo_rest_api_authentication_authenticator']['whitelist_get_apis'] = [
      '#type' => 'checkbox',
      '#disabled' => TRUE,
      '#title' => t('Whitelist all GET APIs <a href = ":url"><b>[Premium]</b></a>', [':url' => $url]),
      '#default_value' => FALSE,
      '#description' => t('Select this checkbox to disable authentication for all GET calls'),
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['save_basic_settings'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Save Above Settings'),
      '#submit' => ['::restApiAuthenticationSaveBasicConfig'],
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['head_text'] = [
      '#markup' => '<table><tr><td class="td-class"><b>Select the authentication method of your choice: </td><td></b><a class="button button--small shift-right" target="_blank" href="https://www.drupal.org/docs/contributed-modules/api-authentication">🕮 Setup Guides</a><a class="button button--small shift-right" target="_blank" href="https://youtube.com/playlist?list=PL2vweZ-PcNpevVNw68h6SYsGQHpGcFa6g&feature=shared">⏵Setup videos</a></td></tr></table>',
    ];

    $oauth_token = $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans';
    $jwt_token = $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans';
    $external_idp = $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans';
    $form['api_auth']['mo_rest_api_authentication_authenticator']['settings']['active'] = [
      '#type' => 'radios',
      '#title' => '',
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('authentication_method'),
      '#options' => [
        0 => ('Basic Authentication'),
        1 => t('API Key Authentication'),
        2 => t('OAuth/Access Token <b><a href = ":oauth_token">[Premium]</b></a>', [':oauth_token' => $oauth_token]),
        3 => t('JWT Token <b><a href = ":jwt_token">[Premium]</b></a>', [':jwt_token' => $jwt_token]),
        4 => t('External IDP Token <b><a href = ":external_idp">[Premium]</b></a>', [':external_idp' => $external_idp]),
      ],
      '#attributes' => ['class' => ['container-inline']],
    ];

    $form['api_auth']['rest_api_authentication_method_submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 0]]],
      '#value' => t('Select Method'),
      '#attributes' => ['style' => 'margin-top:0%'],
      '#submit' => ['::restApiAuthenticationSaveBasicAuthConf'],
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_ext_oauth'] = [
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 4]]],
      '#title' => t('User Info Endpoint:'),
      '#disabled' => TRUE,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('user_info_endpoint'),
      '#attributes' => ['style' => 'width:100%'],
    ];
    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_ext_oauth_username'] = [
      '#type' => 'textfield',
      '#disabled' => TRUE,
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 4]]],
      '#title' => t('Username Attribute:'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('username_attribute'),
      '#attributes' => ['style' => 'width:100%'],
    ];
    $form['api_auth']['rest_api_authentication_save_ext_oauth'] = [
      '#type' => 'button',
      '#disabled' => TRUE,
      '#button_type' => 'primary',
      '#value' => t('Save Configurations'),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 4]]],
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_key'] = [
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 1]]],
      '#disabled' => TRUE,
      '#title' => t('API Key required for Authentication:'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('api_token'),
      '#attributes' => ['style' => 'width:100%'],
    ];
    $form['api_auth']['rest_api_authentication_generate_key'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Generate New API Key'),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 1]]],
      '#submit' => ['::restApiAuthenticationGenerateApiToken'],
    ];

    $generate_api = $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans';
    $form['api_auth']['rest_api_authentication_key_generate_all_keys'] = [
      '#type' => 'checkbox',
      '#disabled' => TRUE,
      '#title' => t('Generate separate API Keys for all Drupal users <a href = ":generate_api"><b>[Premium]</b></a>', [':generate_api' => $generate_api]),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 1]]],
    ];

    $rest_api_key = $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans';
    $form['api_auth']['rest_api_authentication_key_generate_akey'] = [
      '#type' => 'checkbox',
      '#disabled' => TRUE,
      '#title' => t('Reset API Key for a specific Drupal user <a href = ":rest_api_key"><b>[Premium]</b></a>', [':rest_api_key' => $rest_api_key]),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 1]]],
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_oauth_client_id'] = [
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 2]]],
      '#title' => t('Client ID:'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('oauth_client_id'),
      '#attributes' => ['style' => 'width:100%'],
      '#disabled' => 'true',
    ];
    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_oauth_client_secret'] = [
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 2]]],
      '#title' => t('Client Secret:'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('oauth_client_secret'),
      '#attributes' => ['style' => 'width:100%'],
      '#disabled' => 'true',
    ];
    $form['api_auth']['rest_api_authentication_generate_and_secret'] = [
      '#type' => 'button',
      '#disabled' => TRUE,
      '#value' => t('Generate a new Client ID and Secret'),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 2]]],
    ];
    $form['api_auth']['rest_api_authentication_save_oauth_config'] = [
      '#type' => 'button',
      '#disabled' => TRUE,
      '#button_type' => 'primary',
      '#value' => t('Save Settings'),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 2]]],
    ];
    $form['api_auth']['rest_api_authentication_generate_id_token'] = [
      '#type' => 'button',
      '#button_type' => 'primary',
      '#disabled' => TRUE,
      '#value' => t('Save JWT Configuration'),
      '#states' => ['visible' => [':input[name = "active"]' => ['value' => 3]]],
    ];
    $form['api_auth']['select_api_head_text'] = [
      '#markup' => '<br><br><b>APIs to be restricted: </b><a href = "' . $base_url . '/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>[PREMIUM]</b></a><hr>',
    ];
    $form['api_auth']['head_api_options'] = [
      '#type' => 'checkbox',
      '#title' => '<b><a target="_blank" href="' . MiniorangeApiAuthConstants::DRUPAL_SITE . '/docs/8/core/modules/rest">RESTful Web Services APIs</a></b> (Always specify the <b>?_format=</b> query argument, e.g. http://example.com/node/1?_format=json)',
      '#default_value' => "1",
      '#disabled' => TRUE,
      '#attributes' => ['class' => ['container-inline']],
    ];

    $form['api_auth']['head_jsonapi_options'] = [
      '#type' => 'checkbox',
      '#title' => '<b><a href="' . MiniorangeApiAuthConstants::DRUPAL_SITE . '/docs/core-modules-and-themes/core-modules/jsonapi-module" target="_blank">JSON:API module APIs</a></b> (Always specify the <b><u>/jsonapi/</u></b> in the API, e.g. http://example.com/jsonapi/node/article/{{article_uuid}})',
      '#default_value' => "1",
      '#disabled' => TRUE,
      '#attributes' => ['class' => ['container-inline']],
    ];

    $form['api_auth']['head_graphql_options'] = [
      '#type' => 'checkbox',
      '#title' => '<b><a target="_blank" href="' . MiniorangeApiAuthConstants::DRUPAL_SITE . '/docs/contributed-modules/graphql">GraphQL APIs</a></b>',
      '#default_value' => "0",
      '#disabled' => TRUE,
      '#attributes' => ['class' => ['container-inline']],
    ];

    $form['api_auth']['head_customapi_options'] = [
      '#type' => 'checkbox',
      '#title' => 'Any Other/Custom APIs',
      '#default_value' => "0",
      '#disabled' => TRUE,
      '#attributes' => ['class' => ['container-inline']],
    ];

    return $form;
  }

}
