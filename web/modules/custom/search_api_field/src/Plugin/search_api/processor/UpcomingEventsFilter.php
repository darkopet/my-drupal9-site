<?php

namespace Drupal\search_api_field\Plugin\search_api\processor;

use Drupal\search_api_field\Service\GetCompaniesService;
use Drupal\search_api\Datasource\DatasourceInterface;
use Drupal\search_api\Item\ItemInterface;
use Drupal\search_api\Processor\ProcessorPluginBase;
use Drupal\search_api\Processor\ProcessorProperty;
use Psr\Container\ContainerInterface;

/**
 * Custom field in Search Index which will be displayed as a facet.
 *
 * @SearchApiProcessor (
 *  id = "serch_api_field",
 *  label = @Translation("Custom Search Api Field"),
 *  description = @Translation("Display companies with at least one event when option checked in facet."),
 *  stages = {
 *   "add_properties" = 0,
 *   "pre_index_save" = -10,
 *   "preprocess_index" = -30,
 *   },
 * )
 */

class UpcomingEventsFilter extends ProcessorPluginBase {
  /**
   * @var $service GetCompaniesService
   */
  protected $service;
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('companies.ids'),
    );
  }
  /**
   * @param GetCompaniesService $service
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, GetCompaniesService $service) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->service=$service;
  }

  /**
   * {@inheritdoc}
   */
  public function getPropertyDefinitions(DatasourceInterface $datasource = NULL) {
    $properties = [];
    if (!$datasource) {
      $definition = [
        'label' => $this->t('Has Upcoming Events'),
        'description' => $this->t('Companies with upcoming Events.'),
        'type' => 'string',
        'processor_id' => $this->getPluginId(),
      ];
      $properties['search_api_field'] = new ProcessorProperty($definition);
    }
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function addFieldValues(ItemInterface $item) {
    $id = $item->getDatasource()->getItemId($item->getOriginalObject());
    $id = preg_replace('/[^0-9]/','',$id);
    $nids = $this->service->getNids();

    $fields = $this->getFieldsHelper()
      ->filterForPropertyPath($item->getFields(), NULL, 'search_api_field');
    foreach ($fields as $field) {
      if(in_array($id, $nids)) {
        $field->addValue('Filter Companies');
      }
    }
  }
}
