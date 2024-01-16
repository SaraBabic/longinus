<?php

namespace Drupal\rest_api_authentication\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\rest_api_authentication\MiniorangeApiAuthSupport;
use Drupal\Core\Form\FormBase;

/**
 *
 */
class MiniornageAPIAuthnRequestTrial extends FormBase {

  /**
   *
   */
  public function getFormId() {
    return 'rest_api_authentication_request_support';
  }

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state, $options = NULL) {

    $form['#prefix'] = '<div id="modal_example_form">';
    $form['#suffix'] = '</div>';
    $form['status_messages'] = [
      '#type' => 'status_messages',
      '#weight' => -10,
    ];

    $form['rest_api_authentication_trial_email_address'] = [
      '#type' => 'email',
      '#title' => t('Email'),
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => $this->t('Enter your email'),
        'style' => 'width:99%;margin-bottom:1%;',
      ],
    ];

    $form['rest_api_authentication_trial_description'] = [
      '#type' => 'textarea',
      '#rows' => 4,
      '#required' => TRUE,
      '#title' => t('Description'),
      '#attributes' => [
        'placeholder' => $this->t('Describe your use case here!'),
        'style' => 'width:99%;',
      ],
    ];

    $form['rest_api_authentication_trial_note'] = [
      '#markup' => $this->t('<div>If you have any questions or in case you need any sort of assistance in configuring our module according to your requirements, you can get in touch with us on <a href="mailto:drupalsupport@xecurify.com">drupalsupport@xecurify.com</a> and we will assist you further.</div>'),
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
   *
   */
  public function submitModalFormAjax(array $form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $response = new AjaxResponse();
    $email = $form_values['rest_api_authentication_trial_email_address'];
    // If there are any form errors, AJAX replace the form.
    if ($form_state->hasAnyErrors()) {
      $response->addCommand(new ReplaceCommand('#modal_example_form', $form));
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      \Drupal::messenger()->addMessage(t('The email address <b><i>' . $email . '</i></b> is not valid.'), 'error');
      $response->addCommand(new ReplaceCommand('#modal_example_form', $form));
    }
    else {

      $query = $form_values['rest_api_authentication_trial_description'];
      $query_type = 'trial';

      $support = new MiniorangeApiAuthSupport($email, '', $query, $query_type);
      $support_response =$support->sendSupportQuery();
      if ($support_response) {
			  $message = array(
			  '#type' => 'item',
			  '#markup' => $this->t('Your request for a trial module was sent successfully. Please allow us some time and we will send you the trial module as soon as possible.'),
			  );
			  $ajax_form = new OpenModalDialogCommand('Thank you!', $message, ['width' => '50%']);
		  } else {
			  $error = array(
			 '#type' => 'item',
			 '#markup' => $this->t('Error submitting the support query. Please send us your query at
				<a href="mailto:drupalsupport@xecurify.com">
				drupalsupport@xecurify.com</a>.'),
			  );
			  $ajax_form = new OpenModalDialogCommand('Error!', $error, ['width' => '50%']);
		  }

      $response->addCommand($ajax_form);
    }
    return $response;
  }

  /**
   *
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {}

  /**
   *
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}

}
