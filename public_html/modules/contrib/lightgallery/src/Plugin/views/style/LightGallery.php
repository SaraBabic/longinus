<?php

namespace Drupal\lightgallery\Plugin\views\style;

use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\file\FileInterface;
use Drupal\file\Plugin\Field\FieldType\FileFieldItemList;
use Drupal\lightgallery\Manager\LightgalleryManager;
use Drupal\views\Plugin\views\style\StylePluginBase;
use Drupal\image\Entity\ImageStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Style plugin to render each item in an ordered or unordered list.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "lightgallery",
 *   title = @Translation("Lightgallery"),
 *   help = @Translation("Displays a view as a Lightgallery, using the Lightgallery jQuery plugin."),
 *   theme = "lightgallery_views_style",
 *   theme_file = "lightgallery_views.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class LightGallery extends StylePluginBase {
  /**
   * {@inheritdoc}
   */
  protected $usesRowPlugin = FALSE;

  /**
   * {@inheritdoc}
   */
  protected $usesFields = TRUE;

  /**
   * {@inheritdoc}
   */
  protected $usesOptions = TRUE;

  /**
   * {@inheritdoc}
   */
  protected $usesGrouping = FALSE;

  /**
   * {@inheritdoc}
   */
  protected $usesRowClass = FALSE;

  /**
   * A Drupal entity field manager service.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;

  /**
   * Contains all available fields on view.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $fieldSources;

  /**
   * Generated url for files.
   *
   * @var \Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected $fileUrlGenerator;

  /**
   * Constructs lightgallery view style plugin.
   *
   * @param array $configuration
   *   The configuration array.
   * @param string $plugin_id
   *   The plugin id for the view style.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityFieldManagerInterface $entity_field_manager
   *   The Entity Type Manager.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $file_url_generator
   *   The file url generator.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityFieldManagerInterface $entity_field_manager, FileUrlGeneratorInterface $file_url_generator) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityFieldManager = $entity_field_manager;
    $this->fileUrlGenerator = $file_url_generator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    // Create a new instance of the plugin. This also allows us to extract
    // services from the container and inject them into our plugin via its own
    // constructor as needed.
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_field.manager'),
      $container->get('file_url_generator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function evenEmpty() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    // Get the active field options.
    $this->fieldSources = $this->confGetFieldSources();
    $field_images = $this->getImageFields();
    $missing_field_warning = '';
    if (empty($field_images)) {
      $missing_field_warning = $this->t('<strong>You must add a field of type image to your view display before this value can be set.</strong><br/>');
    }

    $fields_settings = LightgalleryManager::getSettingFields();
    /**
     * @var \Drupal\lightgallery\Field\FieldInterface $field
     * @var \Drupal\lightgallery\Group\GroupInterface $group
     */
    foreach ($fields_settings as $field) {
      $group = $field->getGroup();
      if (empty($form[$group->getName()])) {
        // Attach group to form.
        $form[$group->getName()] = [
          '#type' => 'details',
          '#title' => $group->getTitle(),
          '#open' => !empty($group->getOpenValue()) ? $this->options['lightgallery'][$group->getOpenValue()] : $group->isOpen(),
        ];
      }

      if ($field->appliesToViews()) {
        // Attach field to group and form.
        $form[$group->getName()][$field->getName()] = [
          '#type' => $field->getType(),
          '#title' => $field->getTitle(),
          '#default_value' => $this->options['lightgallery'][$field->getName()] ?? $field->getDefaultValue(),
          '#description' => $field->getDescription(),
          '#required' => $field->isRequired(),
        ];

        if ($field->getName() == 'thumb_field' || $field->getName() == 'image_field') {
          // Add exception for these fields.
          $form[$group->getName()][$field->getName()]['#suffix'] = $missing_field_warning;
        }

        if (!empty($field->getOptions())) {
          // Set field options.
          if (is_callable($field->getOptions())) {
            $form[$group->getName()][$field->getName()]['#options'] = call_user_func($field->getOptions());
          }
        }
      }
    }

  }

  /**
   * Form validator.
   *
   * @param mixed $form
   *   The form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public function validateOptionsForm(&$form, FormStateInterface $form_state) {
    parent::validateOptionsForm($form, $form_state);

    // Flatten style options array.
    $style_options = $form_state->getValue('style_options');
    $form_state->setValue([
      'style_options',
      'lightgallery',
    ], LightgalleryManager::flattenArray($style_options));

    // Unset nested values.
    $form_state->unsetValue(['style_options', 'lightgallery_core']);
    $form_state->unsetValue(['style_options', 'lightgallery_thumbs']);
    $form_state->unsetValue(['style_options', 'lightgallery_autoplay']);
    $form_state->unsetValue(['style_options', 'lightgallery_full_screen']);
    $form_state->unsetValue(['style_options', 'lightgallery_pager']);
    $form_state->unsetValue(['style_options', 'lightgallery_zoom']);
    $form_state->unsetValue(['style_options', 'lightgallery_hash']);
  }

  /**
   * Utility to determine which view fields can be used for image data.
   */
  protected function confGetFieldSources() {
    $options = [
      'field_options_images' => [],
      'field_options' => [],
    ];
    $view = $this->view;
    $field_handlers = $view->display_handler->getHandlers('field');
    $field_labels = $view->display_handler->getFieldLabels();

    /** @var \Drupal\views\Plugin\views\field\FieldHandlerInterface $handler */
    // Separate image fields from non-image fields. For image fields we can
    // work with fids and fields of type image or file.
    foreach ($field_handlers as $field => $handler) {
      $is_image = FALSE;
      $id = $handler->getPluginId();
      $name = $field_labels[$field];
      if ($id == 'field') {
        // The field definition is on the handler, it's right bloody there, but
        // it's protected so we can't access it. This means we have to take the
        // long road (via our own injected entity manager) to get the field type
        // info.
        $entity_type = $handler->getEntityType();

        // Fetch the real field name, because views alters the field name if the
        // same fields gets added multiple times.
        $field_name = $handler->field;
        $field_definition = $this->entityFieldManager->getFieldStorageDefinitions($entity_type)[$field_name];
        if ($field_definition) {
          $field_type = $field_definition->getType();
          if ($field_type == 'image' || $field_type == 'file') {
            $field_cardinality = $field_definition->get('cardinality');
            $options['field_options_images'][$field] = $name . ($field_cardinality == 1 ? '' : '*');
            $is_image = TRUE;
          }
        }
      }
      if (!$is_image) {
        $options['field_options'][$field] = $name;
      }
    }

    return $options;
  }

  /**
   * Render fields.
   *
   * @Override parent.
   */
  public function renderFields(array $result) {
    $rendered_fields = [];
    $this->view->row_index = 0;
    $keys = array_keys($this->view->field);

    // If all fields have a field::access FALSE there might be no fields, so
    // there is no reason to execute this code.
    if (!empty($keys)) {
      $fields = $this->view->field;
      $field_sources = $this->confGetFieldSources();
      $image_fields = array_keys($field_sources['field_options_images']);
      foreach ($result as $count => $row) {
        $this->view->row_index = $count;
        foreach ($keys as $id) {
          if (in_array($id, $image_fields)) {
            // This is an image/thumb field.
            // Create URI for selected image style.
            $field_settings = $this->view->field[$id]->options['settings'];
            $image_style = NULL;
            if (array_key_exists('lightgallery_core', $field_settings)) {
              $image_style = $field_settings['lightgallery_core']['lightgallery_image_style'];
            }
            if (array_key_exists('image_style', $field_settings)) {
              $image_style = $field_settings['image_style'];
            }

            $field_name = $fields[$id]->field;

            $field = $result[$count]->_entity->{$field_name};
            if ($field instanceof FileFieldItemList) {
              foreach ($field as $entity_field) {
                $file = $entity_field->entity;
                if ($file instanceof FileInterface && $uri = $file->getFileUri()) {
                  if (!empty($image_style)) {
                    $rendered_fields[$count][$id][] = ImageStyle::load($image_style)
                      ->buildUrl($uri);
                  }
                  else {
                    $rendered_fields[$count][$id][] = $this->fileUrlGenerator->generateAbsoluteString($uri);
                  }
                }
              }
            }
          }
          else {
            // Just render the field as views would do.
            $rendered_fields[$count][$id] = $this->view->field[$id]->render($row);
          }
        }

        // Populate row tokens.
        $this->rowTokens[$count] = $this->view->field[$id]->getRenderTokens([]);
      }
    }
    unset($this->view->row_index);

    return $rendered_fields;
  }

  /**
   * Returns available image fields on view.
   */
  private function getImageFields() {
    return !empty($this->fieldSources['field_options_images']) ? $this->fieldSources['field_options_images'] : [];
  }

}
