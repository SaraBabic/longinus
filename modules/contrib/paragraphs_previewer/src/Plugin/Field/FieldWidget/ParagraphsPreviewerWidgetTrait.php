<?php

namespace Drupal\paragraphs_previewer\Plugin\Field\FieldWidget;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Url;

/**
 * Paragraphs previewer trait to support multiple paragraphs widgets.
 */
trait ParagraphsPreviewerWidgetTrait {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    $settings = parent::defaultSettings();
    $settings['edit_mode'] = static::PARAGRAPHS_PREVIEWER_DEFAULT_EDIT_MODE;
    return $settings;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = parent::settingsSummary();
    array_unshift($summary, t('Previewer: Enabled'));
    return $summary;
  }

  /**
   * Determine if the previewer is enabled for the given paragraphs edit mode.
   *
   * @param string $mode
   *   The paragraphs edit mode.
   *
   * @return bool
   *   TRUE if the previewer is enabled.
   */
  public function isPreviewerEnabled($mode) {
    return $mode != 'removed' && $mode != 'remove';
  }

  /**
   * {@inheritdoc}
   */
  public function formMultipleElements(FieldItemListInterface $items, array &$form, FormStateInterface $form_state) {
    $elements = parent::formMultipleElements($items, $form, $form_state);
    $elements['#attached']['library'][] = 'paragraphs_previewer/widget';
    return $elements;
  }

  /**
   * {@inheritdoc}
   *
   * @see \Drupal\content_translation\Controller\ContentTranslationController::prepareTranslation()
   *   Uses a similar approach to populate a new translation.
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);
    $field_name = $this->fieldDefinition->getName();
    $parents = $element['#field_parents'];

    $widget_state = static::getWidgetState($parents, $field_name, $form_state);
    if (!isset($widget_state['paragraphs'][$delta]['mode']) ||
        !isset($widget_state['paragraphs'][$delta]['entity'])) {
      return $element;
    }

    $item_mode = $widget_state['paragraphs'][$delta]['mode'];
    if (!$this->isPreviewerEnabled($item_mode)) {
      return $element;
    }

    $paragraphs_entity = $widget_state['paragraphs'][$delta]['entity'];
    $element_parents = array_merge($parents, [$field_name, $delta]);
    $id_prefix = implode('-', $element_parents);

    $previewer_element = [
      '#type' => 'submit',
      '#value' => t('Preview'),
      '#name' => strtr($id_prefix, '-', '_') . '_previewer',
      '#weight' => -99999,
      '#submit' => [[get_class($this), 'submitPreviewerItem']],
      '#field_item_parents' => $element_parents,
      '#limit_validation_errors' => [
        array_merge($parents, [$field_name, 'add_more']),
      ],
      '#delta' => $delta,
      '#ajax' => [
        'callback' => [get_class($this), 'ajaxSubmitPreviewerItem'],
        'wrapper' => $widget_state['ajax_wrapper_id'],
        'effect' => 'fade',
      ],
      '#access' => $paragraphs_entity->access('view'),
      '#attributes' => [
        'class' => ['paragraphs-previewer'],
      ],
      '#attached' => [
        'library' => ['paragraphs_previewer/dialog'],
      ],
    ];

    // Set the dialog title.
    if (isset($element['top']['paragraph_type_title']['info']['#markup'])) {
      $previewer_element['#previewer_dialog_title'] = strip_tags($element['top']['paragraph_type_title']['info']['#markup']);
    }
    else {
      $previewer_element['#previewer_dialog_title'] = t('Preview');
    }

    if (isset($element['top']['actions']['actions'])) {
      // Support "paragraphs" widget.
      $button_container = &$element['top']['actions']['actions'];
    }
    elseif (isset($element['top']['links'])) {
      // Support legacy "entity_reference_paragraphs" widget.
      $button_container = &$element['top']['links'];
    }
    else {
      // Place in the top as a fallback.
      $button_container = &$element['top'];
    }

    // Adjust button CSS classes.
    $existing_button = reset($button_container);
    $previewer_element['#attributes']['class'] += isset($existing_button['#attributes']['class'])
      ? $existing_button['#attributes']['class']
      : ['link'];

    $button_container['previewer_button'] = $previewer_element;

    return $element;
  }

  /**
   * Previewer button submit callback.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public static function submitPreviewerItem(array $form, FormStateInterface $form_state) {
    $form_state->setRebuild();
  }

  /**
   * Previewer button AJAX callback.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public static function ajaxSubmitPreviewerItem(array $form, FormStateInterface $form_state) {
    $preview_url = NULL;
    $dialog_title = t('Preview');
    $dialog_options = [
      'dialogClass' => 'paragraphs-previewer-ui-dialog',
      'minWidth' => 320,
      'width' => '98%',
      'minHeight' => 100,
      'height' => 400,
      'autoOpen' => TRUE,
      'modal' => TRUE,
      'draggable' => TRUE,
      'autoResize' => FALSE,
      'resizable' => TRUE,
      'closeOnEscape' => TRUE,
      'closeText' => '',
    ];

    $previewer_element = $form_state->getTriggeringElement();

    // Get dialog title.
    if (isset($previewer_element['#previewer_dialog_title'])) {
      $dialog_title = $previewer_element['#previewer_dialog_title'];
    }

    // Build previewer callback url.
    if (!empty($previewer_element['#field_item_parents']) && !empty($form['#build_id'])) {
      $route_name = 'paragraphs_previewer.form_preview';
      $route_parameters = [
        'form_build_id' => $form['#build_id'],
        'element_parents' => implode(':', $previewer_element['#field_item_parents']),
      ];
      $preview_url = Url::fromRoute($route_name, $route_parameters);
    }

    // Build modal content.
    $dialog_content = [
      '#theme' => 'paragraphs_previewer_modal_content',
      '#preview_url' => $preview_url,
    ];

    // Build response.
    $response = new AjaxResponse();

    // Attach the library necessary for using the OpenModalDialogCommand and
    // set the attachments for this Ajax response.
    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';
    $response->setAttachments($form['#attached']);

    // Add modal dialog.
    $response->addCommand(new OpenModalDialogCommand($dialog_title, $dialog_content, $dialog_options));

    return $response;
  }

}
