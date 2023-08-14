<?php

namespace Drupal\publishing_options\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Url;
use Drupal\Core\Datetime\DateFormatter;

/**
 * An example controller.
 */
class AdminPagesController extends ControllerBase {

  /**
   * The Database Connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The date time object.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $datetime;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $controller = new static(
          $container->get('database'),
          $container->get('date.formatter')
      );
    $controller->setStringTranslation($container->get('string_translation'));
    return $controller;
  }

  /**
   * TableSortExampleController constructor.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection.
   */
  public function __construct(Connection $database, DateFormatter $datetime) {
    $this->database = $database;
    $this->datetime = $datetime;
  }

  /**
   * Returns a render-able array for a test page.
   */
  public function index() {
    $header = [
      [
        'data' =>
        $this->t('ID'),
        'field' => 'po.pubid',
        'class' => [RESPONSIVE_PRIORITY_LOW],
        'sort' => 'asc',
      ],
      [
        'data' =>
        $this->t('Title'),
        'field' => 'po.title',
      ],
      [
        'data' =>
        $this->t('Updated'),
        'field' => 'po.modified',
        'class' => [RESPONSIVE_PRIORITY_LOW],
      ],
      [
        'data' =>
        $this->t('Operations'),
        'field' => 'operation',
      ],
    ];
    $query = $this->database->select('publishing_options', 'po')
      ->extend('Drupal\Core\Database\Query\TableSortExtender')
      ->extend('Drupal\Core\Database\Query\PagerSelectExtender');

    $query->fields('po', ['pubid', 'title', 'modified']);

    $query = $query->orderByHeader($header);
    $query = $query->limit(10);
    $results = $query->execute();

    // Initialize an empty array.
    $rows = [];
    // Next, loop through the $results array.
    foreach ($results as $id => $row) {
      $row->modified = $this->datetime->format($row->modified, 'custom', 'M d, Y', NULL, NULL);
      $row = (array) $row;

      $row[$id] = [
        'data' => [
          '#type' => 'operations',
          '#attributes' => [
            'id' => 'views-display-extra-actions',
          ],
          '#links' => [
            'edit' => [
              'title' => $this->t('Edit'),
              'url' => Url::fromRoute('publishing_options.edit', ['id' => $row['pubid']]),
            ],
            'delete' => [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('publishing_options.delete', ['id' => $row['pubid']]),
            ],
          ],
        ],
      ];
      $rows[] = ['data' => $row];
    }

    // Build the table.
    $build = [
      '#markup' => '<p>' . $this->t(
          'The layout here is themed as a table
           that is sortable by clicking the header name.'
      ) . '</p>',
    ];

    $build['tablesort_table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#empty' => $this->t('No publishing options found. Add your first @create.',
        [
          '@create' => Link::createFromRoute(
            'publishing option',
            'publishing_options.add')
            ->toString()
        ]
      ),
    ];

    $build['pager'] = [
      '#type' => 'pager',
    ];

    return $build;
  }

}
