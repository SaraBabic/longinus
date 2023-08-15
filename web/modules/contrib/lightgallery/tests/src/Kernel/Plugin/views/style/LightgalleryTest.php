<?php

namespace Drupal\Tests\lightgallery\Kernel\Plugin\views\style;

use Drupal\entity_test\Entity\EntityTest;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\file\Entity\File;
use Drupal\Tests\views\Kernel\ViewsKernelTestBase;
use Drupal\views\Tests\ViewTestData;
use Drupal\views\Views;

/**
 * Test the view lightgallery style plugin.
 *
 * @group lightgallery
 *
 * @coversDefaultClass \Drupal\lightgallery\Plugin\views\style\LightGallery
 */
class LightgalleryTest extends ViewsKernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'field',
    'file',
    'image',
    'entity_test',
    'lightgallery',
    'lightgallery_views_test',
  ];

  /**
   * Parent entities.
   *
   * @var \Drupal\entity_test\Entity\EntityTest[]
   */
  protected $parents;

  /**
   * {@inheritdoc}
   */
  public static $testViews = ['test_lightgallery'];

  /**
   * {@inheritdoc}
   */
  protected function setUp($import_test_views = TRUE): void {
    parent::setUp(TRUE);

    // Add the entity schema.
    $this->installEntitySchema('entity_test');
    $this->installEntitySchema('file');

    // Install file schema.
    $this->installSchema('file', ['file_usage']);

    // Create the image field.
    FieldStorageConfig::create([
      'field_name' => 'field_image',
      'type' => 'image',
      'entity_type' => 'entity_test',
    ])->save();
    FieldConfig::create([
      'entity_type' => 'entity_test',
      'field_name' => 'field_image',
      'bundle' => 'entity_test',
    ])->save();

    ViewTestData::createTestViews(get_class($this), ['lightgallery_views_test']);
  }

  /**
   * Tests the lightgallery style plugin.
   */
  public function testLightgalleryView() {
    \Drupal::service('file_system')->copy($this->root . '/core/misc/druplicon.png', 'public://example.jpg');
    $file = File::create([
      'uri' => 'public://example.jpg',
    ]);
    $file->save();

    foreach (range(1, 5) as $i) {
      $entity = EntityTest::create([
        'title' => 'Entity ' . $i,
        'field_image' => [
          'target_id' => $file->id(),
        ],
      ]);
      $entity->save();
    }

    $view = Views::getView('test_lightgallery');
    $this->executeView($view);

    // Count the results.
    $this->assertCount(5, $view->result);

    $output = $view->render();

    /** @var \Drupal\Core\Render\Markup $rendered_output */
    $rendered_output = \Drupal::service('renderer')->renderRoot($output);

    $this->assertStringContainsString('<div class="lightgallery-wrapper">', $rendered_output->__toString());
    $this->assertStringContainsString('<img class="img-responsive"', $rendered_output->__toString());
    $this->assertStringContainsString('<ul class="lightgallery"', $rendered_output->__toString());
  }

}
