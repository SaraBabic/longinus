<?php

namespace Drupal\publishing_options\Services;

use Drupal\Core\Database\Connection;

/**
 *
 */
class PublishingOptionsContent {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

  /**
   * Construct a repository object.
   *
   * @param \Drupal\Core\Database\Connection $connection
   *   The database connection.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * Get publishing option title.
   *
   * @param int $id
   *   a variable containing the pubid of title to get.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return string title
   */
  public function title($id) {
    $query = $this->connection->select('publishing_options', 'po')
      ->fields('po', ['title'])
      ->condition('pubid', $id)
      ->execute();

    return $query->fetch()->title;
  }

  /**
   * Get publishing option from the database.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return array
   */
  public function getPublishingOptions($title = NULL, $pubid = NULL) {
    $query = $this->connection->select('publishing_options', 'po')
      ->fields('po');
    if (!is_null($pubid)) {
      $query->condition('pubid', $pubid);
    }
    if (!is_null($title)) {
      $title = str_replace('_', ' ', $title);
      $query->condition('title', $title);
    }

    if (is_null($pubid) && is_null($title)) {
      $results = $query->execute()->fetchAll();
    }
    else {
      $results = $query->execute()->fetch();
    }
    return $results;
  }

  /**
   * Get publishing option from the database.
   *
   * @param int $id
   *   A variable containing the publishing option 'pubid' of the entry to
   *   retrieve.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return array
   */
  public function getPublishingOptionsById($id = NULL) {
    $query = $this->connection->select('publishing_options', 'po')
      ->condition('po.pubid', $id)
      ->fields('po');
    $result = $query->execute()->fetchAll();

    return $result;
  }

  /**
   * Get publishing option from the database.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return array
   */
  public function getPublishingOptionBundles($bundle = NULL, $pubid = NULL) {
    $bundles = $this->connection->select('publishing_options_bundles', 'pob')
      ->fields('pob');

    if (!is_null($pubid)) {
      $bundles->condition('pubid', $pubid);
    }

    if (!is_null($bundle)) {
      $bundles->condition('bundle', $bundle);
    }

    $results = $bundles->execute();
    $bundles = [];
    foreach ($results as $id => $result) {
      $bundles[$id] = $result;
    }
    return $bundles;
  }

  /**
   * Get publishing option from the database.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return array
   */
  public function getPublishingOptionByTitle($title) {

    $title = str_replace('_', ' ', $title);

    $bundles = $this->connection->select('publishing_options', 'po')
      ->fields('po');
    $bundles->condition('title', $title);

    $result = $bundles->execute()->fetch();

    return $result;
  }

  /**
   * Get publishing option from the database.
   *
   * @param int $id
   *   A variable containing the publishing option 'pubid' of the entry to
   *   retrieve.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return array
   */
  public function getPublishingOptionById($id) {
    $query = $this->connection->select('publishing_options', 'po');
    $query->fields('po')
      ->condition('po.pubid', $id, '=');

    $result = $query->execute()->fetch();

    $publishing_option['title'] = $result->title;

    if (!is_null($result->pubid)) {
      unset($query);
      $query = $this->connection->select('publishing_options_bundles', 'pob');
      $query->fields('pob', ['bundle'])
        ->condition('pob.pubid', $id, '=');
      $bundles =  $query->execute()->fetchAll();
      foreach ((array) $bundles as $key => $bundle) {
        $publishing_option['bundles'][$bundle->bundle] = $bundle->bundle;
      }
    }
    return $publishing_option;
  }

  /**
   * Get node and option relation.
   *
   * @param int $nid
   *   Variable containing node id.
   *
   * @param int $pubid
   *   Variable containing publishing id.
   *
   * @see Drupal\Core\Database\Connection::select()
   *
   * @return array
   */
  public function getNode($nid = NULL, $pubid = NULL) {
    $nodes = $this->connection->select('publishing_options_option_node', 'poon')
      ->fields('poon');

    if (!is_null($nid)) {
      $nodes->condition('nid', $nid);
    }

    if (!is_null($pubid)) {
      $nodes->condition('pubid', $pubid);
    }

    $results = $nodes->execute();
    $saved_node_relations = [];
    foreach ($results as $id => $result) {
      if (is_array($results) && count($results) > 1) {
        $saved_node_relations[$id] = $result;
      }
      else {
        $saved_node_relations = $result;
      }
    }
    return $saved_node_relations;
  }

  /**
   * Insert an entry into the database.
   *
   * @param int $pubid
   *   Variable containing the publishing id to insert add.
   *
   * @param string $bundle
   *   Variable containing the bundle to add.
   *
   * @return int|string
   * @throws
   *
   * @see \Drupal\Core\Database\Connection::insert()
   *
   */
  public function insertBundle($pubid, $bundle) {
    $fields = [
      'pubid' => (int) $pubid,
      'bundle' => $bundle,
    ];

    $insert = $this->connection->insert('publishing_options_bundles');
    $insert->fields(['pubid', 'bundle'], $fields);

    return $insert->execute();
  }

  /**
   * Insert an entry into the database.
   *
   * @param int $nid
   *   Variable containing node id.
   *
   * @param int $pubid
   *   Variable containing the publishing id to insert add.
   *
   * @param int $selected
   *   Variable containing default selecte option.
   *
   * @see Drupal\Core\Database\Connection::insert()
   *
   * @throws
   *
   * @return
   */
  public function insertOptionNodeRelation($nid, $pubid, $selected) {

    $fields = [
      'pubid' => (int) $pubid,
      'nid' => (int) $nid,
    ];

    if ($selected) {
      $selected = (bool) $selected;
      $fields['selected'] = (int) $selected;
    }

    $insert = $this->connection->insert('publishing_options_option_node');
    $insert->fields(['pubid', 'nid', 'selected'], $fields);

    return $insert->execute();
  }

  /**
   * Insert an entry into the database.
   *
   * @param int $nid
   *   Variable containing node id.
   *
   * @param int $pubid
   *   Variable containing the publishing id to insert add.
   *
   * @param int $selected
   *   Variable containing default selecte option.
   *
   * @see Drupal\Core\Database\Connection::insert()
   *
   * @throws
   *
   * @return
   */
  public function upsertOptionNodeSelection($nid, $pubid, $selected) {

    $fields = [
      'pubid' => (int) $pubid,
      'nid' => (int) $nid,
    ];

    $selected = (bool) $selected;
    $fields['selected'] = (int) $selected;

    $insert = $this->connection->merge('publishing_options_option_node')
      ->insertFields($fields)
      ->updateFields(
        [
          'selected' => $fields['selected'],
        ]
      )
      ->key(
              [
                'pubid' => $pubid,
                'nid' => $nid,
              ]
          );

    return $insert->execute();
  }

  /**
   * Insert an entry into the database.
   *
   * @param array $data
   *   An array containing content for a new publishing options
   *   entry to insert.
   *
   * @see Drupal\Core\Database\Connection::insert()
   *
   * @throws
   */
  public function insert(array $data = []): void {
    // Insert or update publishing option
    $publishingOption = $this->connection->upsert('publishing_options')
      ->key('pubid');
    if (isset($data['pubid'])) {
      $publishingOption->fields([
        'title' => $data['title'],
        'created' => time(),
        'modified' => time(),
        'pubid' => $data['pubid']
      ]);
    } else {
      $publishingOption->fields([
        'title' => $data['title'],
        'created' => time(),
        'modified' => time()
      ]);
    }
    $result = $publishingOption->execute();

    if (array_key_exists('pubid', $data)) {
      $pubid = $data['pubid'];
    }
    else {
      $pubid = $this->connection->query("SELECT MAX(pubid) FROM {publishing_options}")->fetchField();
    }

    if ($pubid) {
      foreach ($data['bundles'] as $id => $bundle) {
        if ($bundle > 0) {
        $test =  $this->connection->merge('publishing_options_bundles')
            ->insertFields(
                    [
                      'pubid' => $pubid,
                      'bundle' => $bundle,
                    ]
                )
            ->updateFields(
                    [
                      'bundle' => $bundle,
                    ]
                )
            ->key(['pubid' => $pubid, 'bundle' => $bundle])
            ->execute();
        }
        else {
          $this->connection->delete('publishing_options_bundles')
            ->condition('pubid', $pubid)
            ->condition('bundle', $id)
            ->execute();
        }
      }
    }

  }

  /**
   * Delete an entry from the database.
   *
   * @param int $id
   *   A variable containing the publishing option 'pubid' of the entry to delete.
   *
   * @see Drupal\Core\Database\Connection::delete()
   */
  public function delete($id) {
    $this->connection->delete('publishing_options')
      ->condition('pubid', $id)
      ->execute();

    $bundles = $this->connection->select('publishing_options_bundles', 'pob')
      ->fields('pob')
      ->condition('pubid', $id)
      ->execute()
      ->fetchAll();

    foreach ($bundles as $bundle) {
      $this->connection->delete('publishing_options_bundles')
        ->condition('pubid', $id)
        ->condition('bundle', $bundle->bundle)
        ->execute();
    }
  }

  /**
   * Delete an entry from the database.
   *
   * @param int $id
   *   A variable containing the publishing option 'pubid' of the entry to delete.
   *
   * @see Drupal\Core\Database\Connection::delete()
   */
  public function deleteBundle($id, $bundle) {
    $this->connection->delete('publishing_options_bundles')
      ->condition('pubid', $id)
      ->condition('bundle', $bundle)
      ->execute();
  }

  /**
   * Delete an entry from the database.
   *
   * @param int $id
   *   A variable containing the publishing option 'pubid' of the entry to delete.
   *
   * @see Drupal\Core\Database\Connection::delete()
   */
  public function deleteNodeRelation($nid, $bubid) {
    $this->connection->delete('publishing_options_option_node')
      ->condition('nid', $nid)
      ->condition('pubid', $bubid)
      ->execute();
  }

}
