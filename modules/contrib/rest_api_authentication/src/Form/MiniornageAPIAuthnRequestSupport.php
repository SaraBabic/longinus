<?php

namespace Drupal\rest_api_authentication\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\rest_api_authentication\MiniorangeApiAuthSupport;

/**
 * Provides form - Requesting support for MiniOrange API Authentication module.
 */
class MiniornageAPIAuthnRequestSupport extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'mo_rest_api_authentication_request_support';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $options = NULL) {

    $form['#prefix'] = '<div id="modal_support_form">';
    $form['#suffix'] = '</div>';
    $form['status_messages'] = [
      '#type' => 'status_messages',
      '#weight' => -10,
    ];

    $form['markup_library'] = [
      '#attached' => [
        'library' => [
          "rest_api_authentication/rest_api_authentication.admin",
        ],
      ],
    ];

    $form['markup_1'] = [
      '#markup' => $this->t('<p>Need any help? We can help you with configuring <strong>Drupal API Authentication module</strong> on your site. Just send us a query and we will get back to you right away.</p>'),
    ];
    $form['rest_api_authentication_support_email_address'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => $this->t('Enter your email'),
        'style' => 'width:99%;margin-bottom:1%;',
      ],
    ];
    $form['rest_api_authentication_support_phone_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Phone'),
      '#attributes' => [
        'placeholder' => $this->t('Enter number with country code Eg. +00xxxxxxxxxx'),
        'style' => 'width:99%;margin-bottom:1%;',
      ],
    ];
    $form['rest_api_authentication_support_query'] = [
      '#type' => 'textarea',
      '#required' => TRUE,
      '#title' => $this->t('Query'),
      '#attributes' => [
        'placeholder' => $this->t('Describe your query here!'),
        'style' => 'width:99%',
      ],
    ];

    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['send'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#attributes' => [
        'class' => [
          'use-ajax',
          'button--primary',
        ],
      ],
      '#ajax' => [
        'callback' => [$this, 'submitModalFormAjax'],
        'event' => 'click',
      ],
    ];

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';
    return $form;
  }

  /**
   * Ajax callback for submitting the support request form.
   *
   * @param array $form
   *   Form element of the 'modal_example_form'.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   Return ajax response.
   */
  public function submitModalFormAjax(array $form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $response = new AjaxResponse();
    // If there are any form errors, AJAX replace the form.
    if ($form_state->hasAnyErrors()) {
      $response->addCommand(new ReplaceCommand('#modal_support_form', $form));
    }
    else {
      $email = $form_values['rest_api_authentication_support_email_address'];
      $phone = $form_values['rest_api_authentication_support_phone_number'];
      $query = $form_values['rest_api_authentication_support_query'];
      $query_type = 'Support';

      $support = new MiniorangeApiAuthSupport($email, $phone, $query, $query_type);
      $support_response = $support->sendSupportQuery();
      if ($support_response) {
        $message = [
          '#type' => 'item',
          '#markup' => $this->t('Support query successfully sent. We will get back to you shortly.'),
        ];
        $ajax_form = new OpenModalDialogCommand('Thank you!', $message, ['width' => '50%']);
      }
      else {
        $error = [
          '#type' => 'item',
          '#markup' => $this->t('Error submitting the support query. Please send us your query at
						 <a href="mailto:drupalsupport@xecurify.com">
						 drupalsupport@xecurify.com</a>.'),
        ];
        $ajax_form = new OpenModalDialogCommand('Error!', $error, ['width' => '50%']);
      }
      $response->addCommand($ajax_form);
    }
    return $response;
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {}

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}

}
