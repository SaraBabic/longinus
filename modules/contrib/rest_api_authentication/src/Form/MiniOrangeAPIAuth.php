<?php

namespace Drupal\rest_api_authentication\Form;

use Drupal\Component\Utility\EmailValidatorInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\rest_api_authentication\AdvancedSettingsForm;
use Drupal\rest_api_authentication\CustomerSetupForm;
use Drupal\rest_api_authentication\MiniorangeRestAPICustomer;
use Drupal\rest_api_authentication\RequestForDemoForm;
use Drupal\rest_api_authentication\SetupAuthenticationForm;
use Drupal\rest_api_authentication\UpgradePlansForm;
use Drupal\rest_api_authentication\Utilities;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a form for configuring MiniOrange API Authentication module.
 */
class MiniOrangeAPIAuth extends FormBase {
  /**
   * Config Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The Request Stack Service.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The Messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;
  /**
   * Email validator interface object.
   *
   * @var \Drupal\Component\Utility\EmailValidatorInterface
   */
  protected EmailValidatorInterface $emailValidator;

  /**
   * Constructor.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    RequestStack $request_stack,
    MessengerInterface $messenger,
    EmailValidatorInterface $email_validator,
  ) {
    $this->configFactory = $config_factory;
    $this->requestStack = $request_stack;
    $this->messenger = $messenger;
    $this->emailValidator = $email_validator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('request_stack'),
      $container->get('messenger'),
      $container->get('email.validator'),
    );
  }

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'rest_api_authentication_config_client';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $auth_method = $this->configFactory->get('authentication_method');
    if (empty($auth_method) || $auth_method = NULL) {
      $this->configFactory->getEditable('rest_api_authentication.settings')->set('authentication_method', 0)->save();
    }
    $form['markup_library_1'] = [
      '#attached' => [
        'library' => [
          "rest_api_authentication/rest_api_authentication.basic_style_settings",
        ],
      ],
    ];

    $current_request = $this->requestStack->getCurrentRequest();
    $tab = $current_request->query->get('tab');
    $tab = (isset($tab)) ? ($tab) : ('edit-api-auth');
    $form['rest_api_authentication_background'] = [
      '#markup' => '<div class="mo_rest_api_authn_background">',
    ];
    $form['verticaltabs'] = [
      '#type' => 'vertical_tabs',
      '#default_tab' => $tab,
    ];

    // Builds and inserts the Setup Authentication Method form.
    SetupAuthenticationForm::insertForm($form, $form_state);

    // Builds and inserts the Advanced Settings form.
    AdvancedSettingsForm::insertForm($form, $form_state);

    // Builds and inserts the Request For Demo form.
    RequestForDemoForm::insertForm($form, $form_state);

    // Builds and inserts the Upgrade Plans form.
    UpgradePlansForm::insertForm($form, $form_state);

    // Builds and inserts the Register/Login form.
    CustomerSetupForm::insertForm($form, $form_state);
    $form['rest_api_authentication_background_end'] = [
      '#markup' => '</div>',
    ];
    return $form;
  }

  /**
   * Function used to save the basic authentication method.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Current state of the form elements.
   *
   * @return void
   *   return nothing.
   */
  public function restApiAuthenticationSaveBasicConfig(array &$form, FormStateInterface $form_state): void {
    global $base_url;
    $form_input = $form_state->getValues();
    $enable_authentication = $form_input['enable_authentication'];

    $this->configFactory->getEditable('rest_api_authentication.settings')->set('enable_authentication', $enable_authentication)->save();
    $this->messenger->addMessage($this->t('Settings Saved Successfully.'));
    $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
    $response->send();
  }

  /**
   * Generate API key for the API key authentication method.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Current state of the form elements.
   *
   * @return void
   *   return nothing.
   */
  public function restApiAuthenticationGenerateApiToken(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $api_key = Utilities::generateRandom(64);
    $this->configFactory->getEditable('rest_api_authentication.settings')
      ->set('api_token', $api_key)
      ->set('authentication_method', 1)->save();
    $this->messenger->addMessage($this->t('New API Key generated successfully.'));
    $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
    $response->send();
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $list_of_apis = $form['advancedsettings']['support_container_outline']['list_apis']['api_textarea']['#value'];
    $api_access = $form['advancedsettings']['support_container_outline']['list_apis']['settings']['#value'];
    $this->configFactory->getEditable('rest_api_authentication.settings')
      ->set('api_access_type', $api_access)
      ->set('list_of_apis', $list_of_apis)->save();
    $this->messenger->addMessage($this->t('Configurations for API Based Restriction saved successfully.'));
    $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-advanced-settings");
    $response->send();
  }

  /**
   * Save the basic authentication method.
   */
  public function restApiAuthenticationSaveBasicAuthConf(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $this->configFactory->getEditable('rest_api_authentication.settings')->set('authentication_method', 0)->save();
    $this->messenger->addMessage($this->t('Configurations saved successfully.'));
    $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-api-auth");
    $response->send();
  }

  /**
   * Send a request for Demo.
   */
  public function savedDemoRequest(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $email = trim($form['demo']['container_outline']['rest_api_authentication_email_address']['#value']);
    $phone = $form['demo']['container_outline']['rest_api_authentication_phone_number']['#value'];
    $query = trim($form['demo']['container_outline']['rest_api_authentication_demo_query']['#value']);
    Utilities::sendSupportQuery($email, $phone, $query, 'demo');
    $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-demo");
    $response->send();
  }

  /**
   * Activating the module.
   */
  public function activateModuleRequest(array &$form, FormStateInterface $form_state) {
    global $base_url;
    $username = $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_email']['#value'];
    $password = $form['customersetup']['customer_setup_container_outline']['rest_api_authentication_user_password']['#value'];
    if (empty($username)||empty($password)) {
      $this->messenger->addMessage($this->t('The <b><u>Email Address</u></b> and the <b><u>Password</u></b> fields are mandatory.'), 'error');
      return;
    }
    if (!$this->emailValidator->isValid($username)) {
      $this->messenger->addMessage($this->t('The email address <i> %username </i> does not seems to be valid.', ['%username' => $username]), 'error');
      return;
    }
    $customer_config = new MiniorangeRestAPICustomer($username, $password);
    $check_customer_response = json_decode($customer_config->checkCustomer());

    if (isset($check_customer_response->status) && $check_customer_response->status == 'CUSTOMER_NOT_FOUND') {
      $this->messenger->addMessage($this->t('Invalid credentials'), 'error');
      $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
      $response->send();
      return;
    }
    elseif (isset($check_customer_response->status) && $check_customer_response->status == 'CURL_ERROR') {
      $this->messenger->addMessage($this->t('cURL is not enabled. Please enable cURL'), 'error');
    }
    else {

      $customer_keys_response = json_decode($customer_config->getCustomerKeys());
      // $customer_keys_response = json_decode($customer_config->getCustomerKeys()->getBody()->getContents());
      if (json_last_error() == JSON_ERROR_NONE) {
        $this->configFactory->getEditable('rest_api_authentication.settings')
          ->set('rest_api_authentication_customer_id', $customer_keys_response->id)
          ->set('rest_api_authentication_customer_admin_token', $customer_keys_response->token)
          ->set('rest_api_authentication_customer_admin_email', $username)
          ->set('rest_api_authentication_customer_api_key', $customer_keys_response->apiKey)
          ->set('rest_api_authentication_customer_password', $password)->save();
        $current_status = 'PLUGIN_CONFIGURATION';
        $this->configFactory->getEditable('rest_api_authentication.settings')->set('rest_api_authentication_status', $current_status)->save();
        $this->messenger->addMessage($this->t('Successfully retrieved your account.'));
        $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
        $response->send();
        return;
      }
      else {
        $this->messenger->addMessage($this->t('Invalid credentials'), 'error');
        $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
        $response->send();
        return;
      }
    }
    $response = new RedirectResponse($base_url . "/admin/config/people/rest_api_authentication/auth_settings?tab=edit-customersetup");
    $response->send();
  }

}
