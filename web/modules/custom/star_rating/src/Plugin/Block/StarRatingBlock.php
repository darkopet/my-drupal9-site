<?php

namespace Drupal\star_rating\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\State\State;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "Star rating",
 *   admin_label = @Translation("Star Rating"),
 * )
 */
class StarRatingBlock extends BlockBase implements ContainerFactoryPluginInterface
{
  /**
   * @var CurrentRouteMatch $currentRouteService
   */
  protected CurrentRouteMatch $currentRouteService;
  /**
   * @var State
   */
  protected $state;


  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param CurrentRouteMatch $currentRouteMatch
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CurrentRouteMatch $currentRouteMatch, State $state)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentRouteService = $currentRouteMatch;
    $this->state = $state;
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
      $container->get('current_route_match'),
      $container->get('state'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $node = $this->currentRouteService->getParameter('node');
    $contentType = $node->get('type')->getValue()[0]['target_id'];
    $taxonomyTermItemsNumber = count($node->get('field_location_equipment')->getValue());

    if ($contentType === 'location') {

      return [
        '#theme' => 'star_rating',
        '#attached' => [
          'library' => [
            'star_rating/star',
          ],
        ],
        '#rate' => $taxonomyTermItemsNumber,
      ];
    } else {
      return ['test'];
    }
  }
}
