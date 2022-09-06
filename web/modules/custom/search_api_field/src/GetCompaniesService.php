<?php

namespace Drupal\search_api_field\Plugin;

use Drupal\Core\Database\Connection;
use Drupal\Core\Routing\CurrentRouteMatch;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GetCompaniesService {
  /**
   * @var Connection $database
   */
  protected Connection $database;
  /**
   * @var CurrentRouteMatch $currentRouteService
   */
  protected CurrentRouteMatch $currentRouteService;

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param Connection $connection
   * @param CurrentRouteMatch $currentRouteMatch
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, Connection $connection, CurrentRouteMatch $currentRouteMatch)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->database = $connection;
    $this->currentRouteService = $currentRouteMatch;
  }

  /**
   * @param ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition

   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('database'),
      $container->get('current_route_match'),
    );
  }
  public function getNids() {
    $node = $this->currentRouteService->getParameter('node');
    dd($node);
    $contentType = $node->get('type')->getValue()[0]['target_id'];
    $query = $this->database->select('node_field_data', 'nfd');
    $query->condition('nfd.nid', $nid);
    $query->fields('nfd', ['uid']);
    $result = $query->execute()->fetchAll();
    if (!empty($result)) {
      return $result[0]->uid;
    } else {
      return 0;
    }
  }
}
