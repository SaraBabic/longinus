<?php

namespace Drupal\rest_api_authentication;
use Drupal\Core\Form\FormStateInterface;
class requestForDemoForm{
  public static function insertForm(array &$form, FormStateInterface $form_state){
    $form['demo'] = [
      '#type' => 'details',
      '#title' => t('Support/Request For Demo'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['demo']['container_outline']['markup_support_1'] = array(
      '#markup' => '<b>SUPPORT/REQUEST FOR DEMO:</b><hr><div class="mo_rest_api_highlight_background_note_1">Want to test our premium module before purchasing? Just send us a request from here and we will send you a 7 day free trial.</div><br>',
    );
    $form['demo']['container_outline']['rest_api_authentication_email_address'] = array(
      '#type' => 'textfield',
      '#id' => 'general_text_field',
      '#attributes' => array('placeholder' => 'Enter your Email','style' => 'width: 70%'),
    );

    $form['demo']['container_outline']['rest_api_authentication_phone_number'] = array(
      '#type' => 'textfield',
      '#id' => 'general_text_field',
      '#attributes' => array('placeholder' => 'Enter your Phone Number','style' => 'width: 70%'),
    );

    $form['demo']['container_outline']['rest_api_authentication_demo_query'] = array(
      '#type' => 'textarea',
      '#id' => 'general_text_field',
      '#attributes' => array('placeholder' => 'Please write your use case requirements here','style' => 'width: 70%'),
    );
    $form['demo']['container_outline']['rest_api_authentication_demo_query_submit'] = array(
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Submit'),
      '#submit' => array('::saved_demo_request'),
    );
    return $form;
  }
}
