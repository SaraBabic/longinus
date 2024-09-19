<?php

namespace Drupal\rest_api_authentication\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\rest_api_authentication\MiniorangeApiAuthSupport;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form for the requesting the trial request.
 */
class MiniornageAPIAuthnRequestTrial extends FormBase {
  /**
   * The Messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * Constructor.
   */
  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger'),
    );
  }

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'rest_api_authentication_request_support';
  }

  /**
   * {@inheritDoc}
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
      '#title' => $this->t('Email'),
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
      '#title' => $this->t('Description'),
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
   * Process the 'modal_example_form' Form.
   *
   * @param array $form
   *   Form element of the 'modal_example_form'.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state object.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   Object of AjaxResponse.
   */
  public function submitModalFormAjax(array $form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $response = new AjaxResponse();
    $email = $form_values['rest_api_authentication_trial_email_address'];
    // If there are any form errors, AJAX replace the form.
    if ($form_state->hasAnyErrors()) {
      $response->addCommand(new ReplaceCommand('#modal_example_form', $form));
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->messenger->addMessage($this->t('The email address <b><em>%email</em></b> is not valid.', ['%email' => $email]), 'error');
      $response->addCommand(new ReplaceCommand('#modal_example_form', $form));
    }
    else {
      $query = $form_values['rest_api_authentication_trial_description'];
      $query_type = 'trial';

      $support = new MiniorangeApiAuthSupport($email, '', $query, $query_type);
      $support_response = $support->sendSupportQuery();
      if ($support_response) {
        $message = [
          '#type' => 'item',
          '#markup' => $this->t('Your request for a trial module was sent successfully. Please allow us some time and we will send you the trial module as soon as possible.'),
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
