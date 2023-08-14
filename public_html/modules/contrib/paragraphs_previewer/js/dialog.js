/**
 * @file
 * Paragraphs Previewer handling.
 */

(function ($, Drupal, window) {
  'use strict';

  var previewer = {};

  /**
   * Set the initial dialog settings based on client side information.
   *
   * @param Drupal.dialog dialog
   *   The dialog object
   * @param jQuery $element
   *   The element jQuery object.
   * @param object $settings
   *   Optional The combined dialog settings.
   */
  previewer.dialogInitialize = function(dialog, $element, settings) {
    var windowHeight = $(window).height();
    if (windowHeight > 0) {
      // Set maxHeight based on calculated pixels.
      // Setting a relative value (100%) server side did not allow scrolling
      // within the modal.
      settings.maxHeight = windowHeight;
      settings.height = 0.98 * windowHeight;
    }
  };

  /**
   * Dialog after create listener.
   *
   * @param Drupal.dialog dialog
   *   The dialog object
   * @param jQuery $element
   *   The element jQuery object.
   * @param object $settings
   *   The combined dialog settings.
   */
  previewer.onDialogAfterCreate = function(dialog, $element, settings) {
    // Set body class to disable scrolling.
    $('body').addClass('paragraphs-previewer-dialog-active');

    var $loadables = $('iframe', $element);
    if ($loadables.length > 0) {
      // Add class after loaded.
      $loadables.on('load', function () {
        if (!$element.hasClass('paragraphs-previewer-dialog-loaded')) {
          $element.addClass('paragraphs-previewer-dialog-loaded');
        }
      });
    }
    else {
      // Nothing to load.
      $element.addClass('paragraphs-previewer-dialog-loaded');
    }
  };

  /**
   * Dialog after close listener.
   *
   * @param Drupal.dialog dialog
   *   The dialog object
   * @param jQuery $element
   *   The element jQuery object.
   */
  previewer.onDialogAfterClose = function(dialog, $element) {
    // Remove body class to enable scrolling in the parent window.
    $('body').removeClass('paragraphs-previewer-dialog-active');
  };

  /**
   * Determine if an dialog event is a previewer dialog.
   *
   * @param Drupal.dialog dialog
   *   The dialog object
   * @param jQuery $element
   *   The element jQuery object.
   * @param object $settings
   *   Optional. The combined dialog settings.
   *
   * @return bool
   *   TRUE if the dialog is a previewer dialog.
   */
  previewer.dialogIsPreviewer = function(dialog, $element, settings) {
    var dialogClass = '';
    if (typeof settings == 'object' && ('dialogClass' in settings)) {
      dialogClass = settings.dialogClass;
    }
    else if ($element.length && !!$element.dialog && $element.hasClass('ui-dialog-content')) {
      dialogClass = $element.dialog('option', 'dialogClass');
    }

    return typeof dialogClass !== 'undefined' && dialogClass.indexOf('paragraphs-previewer-ui-dialog') > -1;
  };

  // Drupal behaviors.
  Drupal.behaviors.paragraphsPreviewer = {
    attach: function (context) {
      // Dialog listeners.
      $(window).on({
        'dialog:beforecreate': function (event, dialog, $element, settings) {
          if (previewer.dialogIsPreviewer(dialog, $element, settings)) {
            previewer.dialogInitialize(dialog, $element, settings);
          }
        },
        'dialog:aftercreate': function (event, dialog, $element, settings) {
          if (previewer.dialogIsPreviewer(dialog, $element, settings)) {
            previewer.onDialogAfterCreate(dialog, $element, settings);
          }
        },
        'dialog:afterclose': function (event, dialog, $element) {
          if (previewer.dialogIsPreviewer(dialog, $element)) {
            previewer.onDialogAfterClose(dialog, $element);
          }
        }
      });
    }
  };

})(jQuery, Drupal, window);
