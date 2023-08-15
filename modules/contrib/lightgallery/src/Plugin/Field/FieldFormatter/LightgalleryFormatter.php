<?php

namespace Drupal\lightgallery\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\File\FileUrlGeneratorInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatterBase;
use Drupal\lightgallery\Field\FieldLightgalleryImageStyle;
use Drupal\lightgallery\Field\FieldThumbImageStyle;
use Drupal\lightgallery\Field\FieldTitleSource;
use Drupal\lightgallery\Field\FieldUseThumbs;
use Drupal\lightgallery\Group\GroupsEnum;
use Drupal\lightgallery\Manager\LightgalleryManager;
use Drupal\lightgallery\Optionset\LightgalleryOptionset;
use Drupal\Core\Field\FieldDefinitionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Light gallery formatter.
 *
 * @FieldFormatter(
 *   id = "lightgallery",
 *   label = @Translation("Lightgallery"),
 *   field_types = {
 *     "image"
 *   }
 * )
 */
class LightgalleryFormatter extends ImageFormatterBase {

  /**
   * The image style entity storage.
   *
   * @var \Drupal\image\ImageStyleStorageInterface
   */
  protected $imageStyleStorage;

  /**
   * The file URL generator.
   *
   * @var \Drupal\Core\File\FileUrlGeneratorInterface
   */
  protected $fileUrlGenerator;

  /**
   * Constructs an ImageFormatter object.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Any third party settings.
   * @param \Drupal\Core\Entity\EntityStorageInterface $image_style_storage
   *   The image style storage.
   * @param \Drupal\Core\File\FileUrlGeneratorInterface $file_url_generator
   *   The file URL generator.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, EntityStorageInterface $image_style_storage, FileUrlGeneratorInterface $file_url_generator) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
    $this->imageStyleStorage = $image_style_storage;
    $this->fileUrlGenerator = $file_url_generator;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('entity_type.manager')->getStorage('image_style'),
      $container->get('file_url_generator')
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    $default_settings = [];

    // Invert the groups to be the key of the array.
    $lightgallery_groups = array_flip(GroupsEnum::toArray());
    $fields_settings = LightgalleryManager::getSettingFields();

    // Set the default value for each group and field.
    foreach ($fields_settings as $field) {
      // If the field has a group in the groups array, set the default value
      // for the field.
      if (isset($lightgallery_groups[$field->getGroup()->getName()])) {
        $default_settings[$field->getGroup()->getName()][$field->getName()] = $field->getDefaultValue();
      }
    }
    return $default_settings + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $fields_settings = LightgalleryManager::getSettingFields();
    $element = parent::settingsForm($form, $form_state);
    /**
     * @var \Drupal\lightgallery\Field\FieldInterface $field
     * @var \Drupal\lightgallery\Group\GroupInterface $group
     */
    foreach ($fields_settings as $field) {
      $group = $field->getGroup();
      if (empty($element[$group->getName()])) {
        // Attach group to form.
        $element[$group->getName()] = [
          '#type' => 'details',
          '#title' => $group->getTitle(),
          '#open' => $group->isOpen(),
        ];
      }

      if ($field->appliesToFieldFormatter()) {
        // Attach field to group and form.
        $element[$group->getName()][$field->getName()] = [
          '#type' => $field->getType(),
          '#title' => $field->getTitle(),
          '#default_value' => $this->getSetting($group->getName())[$field->getName()] ?? $field->getDefaultValue(),
          '#description' => $field->getDescription(),
          '#required' => $field->isRequired(),
        ];

        if (!empty($field->getOptions())) {
          // Set field options.
          if (is_callable($field->getOptions())) {
            $element[$group->getName()][$field->getName()]['#options'] = call_user_func($field->getOptions());
          }
        }
      }
    }

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $image_styles = LightgalleryManager::getImageStyles();
    // Unset possible 'No defined styles' option.
    unset($image_styles['']);

    $thumb_image_style = new FieldThumbImageStyle();
    $lightgallery_image_style = new FieldLightgalleryImageStyle();
    $use_thumbnails = new FieldUseThumbs();
    $title_source = new FieldTitleSource();

    if (isset($image_styles[$this->settings[$lightgallery_image_style->getGroup()
      ->getName()][$lightgallery_image_style->getName()]])) {
      $summary[] = $this->t('Lightgallery image style: @style',
        [
          '@style' => $image_styles[$this->settings[$lightgallery_image_style->getGroup()
            ->getName()][$lightgallery_image_style->getName()]],
        ]);
    }
    else {
      $summary[] = $this->t('Lightgallery image style: Original image');
    }

    if (isset($image_styles[$this->settings[$thumb_image_style->getGroup()
      ->getName()][$thumb_image_style->getName()]])) {
      $summary[] = $this->t('Thumbnail image style: @style',
        [
          '@style' => $image_styles[$this->settings[$thumb_image_style->getGroup()
            ->getName()][$thumb_image_style->getName()]],
        ]);
    }
    else {
      $summary[] = $this->t('Thumbnail image style: Original image');
    }

    $summary[] = ($this->settings[$use_thumbnails->getGroup()
      ->getName()][$use_thumbnails->getName()]) ? $this->t('Use thumbs in gallery: Yes') : $this->t('Use thumbs in gallery: No');

    $summary[] = !empty($this->settings[$title_source->getGroup()
      ->getName()][$title_source->getName()]) ? $this->t('Value used as title: @title', [
        '@title' => $this->settings[$title_source->getGroup()
          ->getName()][$title_source->getName()],
      ]) : $this->t('Value used as title: none');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    /** @var \Drupal\image\Plugin\Field\FieldType\ImageItem $item */
    $item_list = [];

    $files = $this->getEntitiesToView($items, $langcode);
    // Early opt-out if the field is empty.
    if (empty($files)) {
      return $item_list;
    }

    // Init lightgallery image style field.
    $lightgallery_image_style_field = new FieldLightgalleryImageStyle();
    // Fetch lightgallery image style.
    $lightgallery_image_style = $this->settings[$lightgallery_image_style_field->getGroup()
      ->getName()][$lightgallery_image_style_field->getName()];
    // Init thumb image style field.
    $thumb_image_style_field = new FieldThumbImageStyle();
    // Fetch thumb image style.
    $thumb_image_style = $this->settings[$thumb_image_style_field->getGroup()
      ->getName()][$thumb_image_style_field->getName()];
    // Init title source field.
    $title_source_field = new FieldTitleSource();
    $title_source = $this->settings[$title_source_field->getGroup()
      ->getName()][$title_source_field->getName()];

    foreach ($files as $file) {
      if ($uri = $file->getFileUri()) {
        // The reffering item is the image.
        $item = $file->_referringItem;
        // Load image urls.
        if (!empty($lightgallery_image_style)) {
          $item_detail['slide'] = $item_detail['thumb'] = $this->imageStyleStorage->load($lightgallery_image_style)->buildUrl($uri);
        }
        else {
          $item_detail['slide'] = $item_detail['thumb'] = $this->fileUrlGenerator->generateAbsoluteString($uri);
        }

        // If image styles are different, also load thumb.
        if ($thumb_image_style != $lightgallery_image_style) {
          if (!empty($thumb_image_style)) {
            // Load thumb url.
            $item_detail['thumb'] = $this->imageStyleStorage->load($thumb_image_style)->buildUrl($uri);
          }
          else {
            $item_detail['thumb'] = $this->fileUrlGenerator->generateAbsoluteString($uri);
          }
        }

        if (!empty($title_source) && !empty($item->{$title_source})) {
          // Set title of slide.
          $item_detail['title'] = ['#markup' => Xss::filterAdmin($item->{$title_source})];
        }
      }

      $item_list[] = $item_detail;
    }

    // Flatten settings array.
    $options = LightgalleryManager::flattenArray($this->settings);
    // Set unique id, so that multiple instances on one page can be created.
    $unique_id = uniqid();
    // Load libraries.
    $lightgallery_optionset = new LightgalleryOptionset($options);
    $lightgallery_manager = new LightgalleryManager($lightgallery_optionset);
    // Build render array.
    $content = [
      '#theme' => 'lightgallery',
      '#items' => $item_list,
      '#id' => $unique_id,
      '#attached' => $lightgallery_manager->loadLibraries($unique_id),
    ];

    return $content;

  }

}
