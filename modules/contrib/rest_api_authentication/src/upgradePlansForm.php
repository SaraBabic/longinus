<?php

namespace Drupal\rest_api_authentication;
use Drupal\Core\Form\FormStateInterface;
use Drupal\rest_api_authentication\MiniorangeApiAuthConstants;

class upgradePlansForm{
  public static function insertForm(array &$form, FormStateInterface $form_state){
    global $base_url;
    $form['markup_library_4'] = array(
      '#attached' => array(
        'library' => array(
          "rest_api_authentication/rest_api_authentication.style_settings",
        )
      ),
    );

    $form['upgrade-plans'] = [
      '#type' => 'details',
      '#title' => t('Upgrade Plans'),
      '#open' => TRUE,
      '#group' => 'verticaltabs',
    ];

    $form['upgrade-plans']['upgrade_container_outline']['licensing'] = array(
      '#markup' =>'<html lang="en">
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
                              <li>Basic Email Support</li>
                            </ul>
                        </div>
                    </div>

                            <div class="pricing-table class_inline_1">
                                <div class="pricing-header">
                                    <p class="pricing-title">Premium</p>
                            <p class="pricing-rate"><sup>$</sup> 399<sup>*</sup></p>
                            <a href="'.MiniorangeApiAuthConstants::BASE_URL.'/moas/login?redirectUrl='.MiniorangeApiAuthConstants::BASE_URL.'/moas/initializepayment&requestOrigin=drupal_rest_api_authentication_premium_plan" target="_blank" class="button">Upgrade Now</a><br><br>
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
                                        <li>3rd Party/External IDP Token Based Authentication</li>
                                        <li>Generate separate API Keys for every user</li>
                                        <li>Custom Authentication Header</li>
                                        <li>Configurable Token Expiry Time</li>
                                        <li>Whitelist or Blacklist APIs</li>
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
    );
    $form['upgrade-plans']['upgrade_container_outline']['instr'] = array(
      '#markup' => '
        <br>
        The above mentioned cost is applicable for one instance only. Licenses are perpetual and include free version updates for the first 12 months. You can renew maintenance(version updates) after the first 12 months at 50% of the current license cost. We also provide various Support Plans which includes 12 months of support.
        <br><br><br><b>10 Days Return Policy -</b><br><br>
        At miniOrange, we want to ensure that you are 100% happy with your purchase. If the premium module you purchased is not working as advertised and you have attempted to resolve any issues with our support team, which could not get resolved, we will refund the whole amount given that you have a raised a refund request within the first 10 days of the purchase.<br><br>Please email us at <a href="mailto:drupalsupport@xecurify.com">drupalsupport@xecurify.com</a> for any queries.'
    );

    $config = \Drupal::configFactory()->getEditable('rest_api_authentication.settings');
    if(isset($_GET['tab'])){
      if($_GET['tab'] == 'edit-upgrade-plans'){
        $config->set('miniorange_rest_api_license_page_visited', "TRUE")->save();
      }
    }
    return $form;
  }
}
