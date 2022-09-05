<?php

namespace Drupal\search_api_field\Plugin;

use Drupal\Core\Database\Connection;

class GetCompaniesServices {
  /**
   * @var \Drupal\Core\Database\Connection $database
   */
  protected $database;

  /**
   * Constructs a new MyTools object.
   * @param \Drupal\Core\Database\Connection $connection
   */
  public function __construct(Connection $connection)
  {
    $this->database = $connection;
  }

  /**
   * Show the author of the node.
   *
   * @param int $nid
   * The node id.
   *
   * @return int
   * Return the uid.
   */
  public function getCompanies($nid)
  {
    $query = $this->database->select('node_field_data', 'nfd');
    $query->condition('nfd.nid', $nid);
    $query->fields('nfd', ['uid']);
    $result = $query->execute()->fetchAll();
    if (!empty($result)) {
      return $result[0]->uid;
    }
  }
}
