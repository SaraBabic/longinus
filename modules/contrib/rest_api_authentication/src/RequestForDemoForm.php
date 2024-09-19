<?php

namespace Drupal\rest_api_authentication;

use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form for requesting a demo of the module.
 */
class RequestForDemoForm {

  /**
   * Inserts the request for demo form into the provided form array.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state object.
   *
   * @return array
   *   The modified form array.
   */
  public static function insertForm(array &$form, FormStateInterface $form_state) {
    $form['demo'] = [
      '#type' => 'details',
      '#title' => t('Support/Request For Demo'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['demo']['container_outline']['markup_support_1'] = [
      '#markup' => '<b>SUPPORT/REQUEST FOR DEMO:</b><hr><div class="mo_rest_api_highlight_background_note_1">Want to test our premium module before purchasing? Just send us a request from here and we will send you a 7 day free trial.</div><br>',
    ];
    $form['demo']['container_outline']['rest_api_authentication_email_address'] = [
      '#type' => 'textfield',
      '#id' => 'general_text_field',
      '#attributes' => ['placeholder' => 'Enter your Email', 'style' => 'width: 70%'],
    ];

    $form['demo']['container_outline']['rest_api_authentication_phone_number'] = [
      '#type' => 'textfield',
      '#id' => 'general_text_field',
      '#attributes' => ['placeholder' => 'Enter your Phone Number', 'style' => 'width: 70%'],
    ];

    $form['demo']['container_outline']['rest_api_authentication_demo_query'] = [
      '#type' => 'textarea',
      '#id' => 'general_text_field',
      '#attributes' => ['placeholder' => 'Please write your use case requirements here', 'style' => 'width: 70%'],
    ];
    $form['demo']['container_outline']['rest_api_authentication_demo_query_submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => t('Submit'),
      '#submit' => ['::savedDemoRequest'],
    ];
    return $form;
  }

}
