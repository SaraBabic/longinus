<?php

namespace Drupal\rest_api_authentication;
use Drupal\Core\Form\FormStateInterface;
use Drupal\rest_api_authentication\MiniorangeApiAuthConstants;

class setupAuthenticationForm{
  public static function insertForm(array &$form, FormStateInterface $form_state){
    global $base_url;
    $form['markup_library_3'] = array(
      '#attached' => array(
        'library' => array(
          "rest_api_authentication/rest_api_authentication.basic_style_settings",
        )
      ),
    );
    $form['api_auth'] = [
      '#type' => 'details',
      '#title' => t('Setup Authentication Method'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['api_auth']['mo_rest_api_authentication_authenticator']['head_note'] = array(
      '#markup' => '<div class="mo_rest_api_highlight_background_note_1">Need any help? We will be more than happy to help you with configuring the module as per your use case requirements.</div><br>',
    );

    $form['api_auth']['mo_rest_api_authentication_authenticator']['enable_authentication'] = array(
      '#type' => 'checkbox',
      '#title' => t('Enable Authentication'),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('enable_authentication'),
      '#description' => 'Select this checkbox to enable authenticating your Drupal APIs through this module',
    );

    $form['api_auth']['mo_rest_api_authentication_authenticator']['whitelist_get_apis'] = array(
      '#type' => 'checkbox',
      '#disabled' => TRUE,
      '#title' => t('Whitelist all GET APIs <a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>[Premium]</b></a>'),
      '#default_value' => FALSE,
      '#description' => 'Select this checkbox to disable authentication for all GET calls ',
    );

    $form['api_auth']['mo_rest_api_authentication_authenticator']['save_basic_settings'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Save Above Settings'),
      '#submit' => array('::rest_api_authentication_save_basic_config'),
    );

    $form['api_auth']['mo_rest_api_authentication_authenticator']['head_text'] = array(
      '#markup' => '<table><tr><td class="td-class"><b>Select the authentication method of your choice: </td><td></b><a class="button button--small shift-right" target="_blank" href="https://www.drupal.org/docs/contributed-modules/api-authentication">🕮 Setup Guides</a><a class="button button--small shift-right" target="_blank" href="https://youtube.com/playlist?list=PL2vweZ-PcNpevVNw68h6SYsGQHpGcFa6g&feature=shared">⏵Setup videos</a></td></tr></table>',
    );
    $form['api_auth']['mo_rest_api_authentication_authenticator']['settings']['active'] = array(
      '#type' => 'radios',
      '#title' => '',
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('authentication_method'),
      '#options' => array(
        0 => ('Basic Authentication'),
        1 => t('API Key Authentication'),
        2 => t('OAuth/Access Token <b><a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans">[Premium]</b></a>'),
        3 => t('JWT Token <b><a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans">[Premium]</b></a>'),
        4 => t('External IDP Token <b><a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans">[Premium]</b></a>'),
      ),
      '#attributes' => array('class' => array('container-inline')),
    );

    $form['api_auth']['rest_api_authentication_method_submit'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 0 ), ),),
      '#value' => t('Select Method'),
      '#attributes' => array('style' => 'margin-top:0%'),
      '#submit' => array('::rest_api_authentication_save_basic_auth_conf'),
    );


    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_ext_oauth'] = array(
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 4 ), ),),
      '#title' => t('User Info Endpoint: '),
      '#disabled' => TRUE,
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('user_info_endpoint'),
      '#attributes' => array('style' => 'width:100%'),
    );
    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_ext_oauth_username'] = array(
      '#type' => 'textfield',
      '#disabled' => TRUE,
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 4 ), ),),
      '#title' => t('Username Attribute: '),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('username_attribute'),
      '#attributes' => array('style' => 'width:100%'),
    );
    $form['api_auth']['rest_api_authentication_save_ext_oauth'] = array(
      '#type' => 'submit',
      '#disabled' => TRUE,
      '#button_type' => 'primary',
      '#value' => t('Save Configurations'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 4 ), ),),
      '#submit' => array('::rest_api_authentication_save_ext_oauth'),
    );

    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_key'] = array(
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 1 ), ),),
      '#disabled' => TRUE,
      '#title' => t('API Key required for Authentication: '),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('api_token'),
      '#attributes' => array('style' => 'width:100%'),
    );
    $form['api_auth']['rest_api_authentication_generate_key'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Generate New API Key'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 1 ), ),),
      '#submit' => array('::rest_api_authentication_generate_api_token'),
    );

    $form['api_auth']['rest_api_authentication_key_generate_all_keys'] = array(
      '#type' => 'checkbox',
      '#disabled' => TRUE,
      '#title' => t('Generate separate API Keys for all Drupal users <a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>[Premium]</b></a>'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 1 ), ),),
    );
    $form['api_auth']['rest_api_authentication_key_generate_akey'] = array(
      '#type' => 'checkbox',
      '#disabled' => TRUE,
      '#title' => t('Reset API Key for a specific Drupal user <a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>[Premium]</b></a>'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 1 ), ),),
    );

    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_oauth_client_id'] = array(
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 2 ), ),),
      '#title' => t('Client ID: '),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('oauth_client_id'),
      '#attributes' => array('style' => 'width:100%'),
      '#disabled' => 'true',
    );
    $form['api_auth']['mo_rest_api_authentication_authenticator']['rest_api_authentication_oauth_client_secret'] = array(
      '#type' => 'textfield',
      '#id'  => 'rest_api_authentication_token_key',
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 2 ), ),),
      '#title' => t('Client Secret: '),
      '#default_value' => \Drupal::config('rest_api_authentication.settings')->get('oauth_client_secret'),
      '#attributes' => array('style' => 'width:100%'),
      '#disabled' => 'true',
    );
    $form['api_auth']['rest_api_authentication_generate_and_secret'] = array(
      '#type' => 'submit',
      '#disabled' => TRUE,
      '#value' => t('Generate a new Client ID and Secret'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 2 ), ),),
      '#submit' => array('::rest_api_authentication_generate_oauth_keys'),
    );
    $form['api_auth']['rest_api_authentication_save_oauth_config'] = array(
      '#type' => 'submit',
      '#disabled' => TRUE,
      '#button_type' => 'primary',
      '#value' => t('Save Settings'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 2 ), ),),
      '#submit' => array('::rest_api_authentication_save_oauth_token'),
    );
    $form['api_auth']['rest_api_authentication_generate_id_token'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#disabled' => TRUE,
      '#value' => t('Save JWT Configuration'),
      '#states' => array('visible' => array(':input[name = "active"]' => array('value' => 3 ), ),),
      '#submit' => array('::rest_api_authentication_save_id_token'),
    );
    $form['api_auth']['select_api_head_text'] = array(
      '#markup' => '<br><br><b>APIs to be restricted: </b><a href = "'.$base_url.'/admin/config/people/rest_api_authentication/auth_settings?tab=edit-upgrade-plans"><b>[PREMIUM]</b></a><hr>',
    );
    $form['api_auth']['head_api_options'] = array(
      '#type' => 'checkbox',
      '#title' => '<b><a target="_blank" href="'.MiniorangeApiAuthConstants::DRUPAL_SITE.'/docs/8/core/modules/rest">RESTful Web Services APIs</a></b> (Always specify the <b>?_format=</b> query argument, e.g. http://example.com/node/1?_format=json)',
      '#default_value' => "1",
      '#disabled' => true,
      '#attributes' => array('class' => array('container-inline')),
    );

    $form['api_auth']['head_jsonapi_options'] = array(
      '#type' => 'checkbox',
      '#title' => '<b><a href="'.MiniorangeApiAuthConstants::DRUPAL_SITE.'/docs/core-modules-and-themes/core-modules/jsonapi-module" target="_blank">JSON:API module APIs</a></b> (Always specify the <b><u>/jsonapi/</u></b> in the API, e.g. http://example.com/jsonapi/node/article/{{article_uuid}})',
      '#default_value' => "1",
      '#disabled' => true,
      '#attributes' => array('class' => array('container-inline')),
    );

    $form['api_auth']['head_graphql_options'] = array(
      '#type' => 'checkbox',
      '#title' => '<b><a target="_blank" href="'.MiniorangeApiAuthConstants::DRUPAL_SITE.'/docs/contributed-modules/graphql">GraphQL APIs</a></b>',
      '#default_value' => "0",
      '#disabled' => true,
      '#attributes' => array('class' => array('container-inline')),
    );

    $form['api_auth']['head_customapi_options'] = array(
      '#type' => 'checkbox',
      '#title' => 'Any Other/Custom APIs',
      '#default_value' => "0",
      '#disabled' => true,
      '#attributes' => array('class' => array('container-inline')),
    );

    return $form;
  }
}
