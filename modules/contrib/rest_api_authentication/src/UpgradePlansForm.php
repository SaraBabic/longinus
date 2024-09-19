<?php

namespace Drupal\rest_api_authentication;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a form for upgrade plans tab.
 */
class UpgradePlansForm {

  /**
   * Inserts the upgrade plans form.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   The form array with the upgrade plans inserted.
   */
  public static function insertForm(array &$form, FormStateInterface $form_state) {
    $form['markup_library_4'] = [
      '#attached' => [
        'library' => [
          "rest_api_authentication/rest_api_authentication.style_settings",
        ],
      ],
    ];

    $form['upgrade-plans'] = [
      '#type' => 'details',
      '#title' => t('Upgrade Plans'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['upgrade-plans']['upgrade_container_outline']['licensing'] = [
      '#markup' => '<html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Main Style -->
        </head>
        <body>
        <!-- Pricing Table Section -->
        <section id="pricing-table">
            <div>
                <div>
                    <div class="pricing">
                        <div>
                        <div class="pricing-table class_inline_1">
                        <div class="pricing-header">
                            <p class="pricing-title">Free</p>
                            <p class="pricing-rate"><sup>$</sup> 0</p>
                             <a href="#" disabled="disabled" class="btn-disabled button">Current Plan</a><br><br>
                        </div>

                        <div class="pricing-list">
                            <ul>
                              <li>Supports JSON API module</li>
                              <li>Supports default REST APIs</li>
                              <li>-</li>
                              <li>API Key Authentication</li>
                              <li>Basic Authentication</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>-</li>
                              <li>Basic Email Support</li>
                            </ul>
                        </div>
                    </div>

                            <div class="pricing-table class_inline_1">
                                <div class="pricing-header">
                                    <p class="pricing-title">Premium</p>
                            <p class="pricing-rate"><sup>$</sup> 399<sup>*</sup></p>
                            <a href="https://portal.miniorange.com/initializepayment?requestOrigin=drupal_rest_api_authentication_premium_plan" target="_blank" class="button">Upgrade Now</a><br><br>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>Supports JSON API module</li>
                                        <li>Supports default REST APIs</li>
                                        <li>Supports restriction of custom APIs</li>
                                        <li>API Key Authentication</li>
                                        <li>Basic Authentication</li>
                                        <li>Access Token Based Authentication</li>
                                        <li>JWT Based Authentication</li>
                                        <li>Authenticate private files and images</li>
                                        <li>Support for multiple authentication methods</li>
                                        <li>3rd Party/External IDP Token Based Authentication</li>
                                        <li>Generate separate API Keys for every user</li>
                                        <li>Custom Authentication Header</li>
                                        <li>Configurable Token Expiry Time</li>
                                        <li>Allow or restrict the custom APIs</li>
                                        <li>IP Address Based Restriction</li>
                                        <li>Role Based Restriction</li>
                                        <li>Premium GoTo Meeting Support</li>
                                    </ul>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Table Section End -->
    </body>
    </html>',
    ];
    $form['upgrade-plans']['upgrade_container_outline']['instr'] = [
      '#markup' => '
        <br>
        The above-mentioned cost is applicable for one instance only. If you are planning to use the module on multiple instances, you can check out the bulk purchase discount on our <a href="https://plugins.miniorange.com/drupal-rest-api-authentication#pricing" target="_blank">website</a>.
        <br><br><br><b>10 Days Return Policy -</b><br><br>
        At miniOrange, we want to ensure that you are 100% happy with your purchase. If the premium module you purchased is not working as advertised and you have attempted to resolve any issues with our support team, which could not get resolved, we will refund the whole amount given that you have a raised a refund request within the first 10 days of the purchase.<br><br>Please email us at <a href="mailto:drupalsupport@xecurify.com">drupalsupport@xecurify.com</a> for any queries.',
    ];
    $current_request = \Drupal::service('request_stack')->getCurrentRequest();
    $tab = $current_request->query->get('tab');
    if (isset($tab)) {
      if ($tab == 'edit-upgrade-plans') {
      }
    }
    return $form;
  }

}
