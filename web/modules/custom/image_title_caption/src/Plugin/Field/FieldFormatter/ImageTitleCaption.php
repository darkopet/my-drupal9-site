<?php

namespace Drupal\image_title_caption\Plugin\Field\FieldFormatter;

use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceFormatterBase;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatter;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'image_title_caption' formatter.
 *
 * @FieldFormatter(
 *   id = "image_title_caption",
 *   label = @Translation("Image with caption from title"),
 *   field_types = {
 *    "image"
 *   }
 * )
 */
class ImageTitleCaption extends EntityReferenceFormatterBase {

  /**
   * @var CurrentRouteMatch $currentRouteService
   */
  protected CurrentRouteMatch $currentRouteService;

  /**
   * The logger factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;



  /**
   * Constructs an EntityReferenceEntityFormatter instance.
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
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger_factory
   *   The logger factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity display repository.
   * @param CurrentRouteMatch $currentRouteMatch
   *   The entity display repository.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings,  LoggerChannelFactoryInterface $logger_factory, EntityTypeManagerInterface $entity_type_manager, CurrentRouteMatch $currentRouteMatch) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
    $this->loggerFactory = $logger_factory;
    $this->entityTypeManager = $entity_type_manager;
    $this->currentRouteService = $currentRouteMatch;
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
      $container->get('logger.factory'),
      $container->get('entity_type.manager'),
      $container->get('current_route_match')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $node = $this->currentRouteService->getCurrentRouteMatch()->getParameter('node');
    if($node->get('type')->getValue()[0]['target_id'] === 'location') {
      $field_location_equipment = $node->get('field_location_equipment')->getValue();
//      dd($field_location_equipment);

      foreach ($field_location_equipment as $taxonomyTermm){
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($taxonomyTermm['target_id']);
//        dd($term);
      }
//      dd($field_location_equipment);
    }
//    dd($node);
      $element['#theme'] = 'image_title_caption';
      $element['#title'] = $node->get('field_location_image')->getValue()[0]['title'] ;
      $element['#url'] = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQs8EmDWAi3je4ZKxWbY7Tx5x6Et0JMEGRgXg&usqp=CAU';

    return $element;
  }
}
