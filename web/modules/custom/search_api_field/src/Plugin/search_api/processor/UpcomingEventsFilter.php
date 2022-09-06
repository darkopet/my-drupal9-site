<?php

namespace Drupal\search_api_field\Plugin\search_api\processor;

use Drupal\search_api\Datasource\DatasourceInterface;
use Drupal\search_api\Item\ItemInterface;
use Drupal\search_api\Processor\ProcessorPluginBase;
use Drupal\search_api\Processor\ProcessorProperty;
use Drupal\search_api\Processor\ProcessorPropertyInterface;
use Drupal\search_api_field\Plugin\GetCompaniesService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Custom field in Search Index which will be displayed as a facet.
 *
 * @SearchApiProcessor  (
 *  id = "upcoming_events_filter",
 *  label = @Translation("Upcoming Events Filter"),
 *  description = @Translation("Display companies with at least one event when option checked in facet."),
 *  stages = {
 *   "add_properties" = 0,
 *   "pre_index_save" = -10,
 *   "preprocess_query" = -30,
 *   },
 * )
 */

class UpcomingEventsFilter extends ProcessorPluginBase {
  /**
   * @var GetCompaniesService $service
   */
  protected GetCompaniesService $service;

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param GetCompaniesService $service
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, GetCompaniesService $service)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->service = $service;
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
      $container->get('service'),
    );
  }
  /**
   * @param DatasourceInterface|NULL $datasource
   * @return array|ProcessorPropertyInterface[]
   */
  public function getPropertyDefinitions(DatasourceInterface $datasource = NULL) {
    $properties = [];
    if (!$datasource) {
      $definition = [
        'label' => $this->t('Upcoming Events Filter'),
        'description' => $this->t('Filter Companies.'),
        'type' => 'string',
        'is_list' => FALSE,
        'processor_id' => $this->getPluginId(),
      ];
      $properties['search_api_field'] = new ProcessorProperty($definition);
    }
    return $properties;
  }
  public function addFieldValues(ItemInterface $item) {
    $nid = $item->getDatasource()->getItemId($item->getOriginalObject());
    $nid = preg_replace('/[^0-9]/','',$nid);
    $nids = $this->service->getNids();
    if ($nid) {
      $fields = $this->getFieldsHelper()
        ->filterForPropertyPath($item->getFields(), NULL, 'search_api_field');
      foreach ($fields as $field) {
        if(in_array($nid, $nids)) {
          $field->addValue('Filter Companies');
        }
      }
    }
  }
}
