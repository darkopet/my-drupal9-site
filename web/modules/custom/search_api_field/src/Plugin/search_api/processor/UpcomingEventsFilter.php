<?php

namespace Drupal\search_api_field\Plugin\search_api\processor;

use Drupal\search_api\Datasource\DatasourceInterface;
use Drupal\search_api\Item\ItemInterface;
use Drupal\search_api\Processor\ProcessorPluginBase;
use Drupal\search_api\Processor\ProcessorProperty;

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
    $id = $item->getDatasource()->getItemId($item->getOriginalObject());

    $id = preg_replace('/[^0-9]/', '', $id);
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
