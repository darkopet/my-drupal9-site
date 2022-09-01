<?php

namespace Drupal\site_status_message\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\State\State;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "site_status_message",
 *   admin_label = @Translation("Site Status Message"),
 * )
 */
class StatusMessageBlock extends BlockBase implements ContainerFactoryPluginInterface {
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
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CurrentRouteMatch $currentRouteMatch, State $state) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentRouteService = $currentRouteMatch;
    $this->state = $state;
  }
  /**
   * @param ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_route_match'),
      $container->get('state')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build(): array {
    return [
      '#theme' => 'site_status_message',
      '#attached' => [
        'library' => [
          'site_status_message/site_status_message',
        ],
      ],
      '#message' => $this->state->get('site_status')['message'],
      '#type' => $this->state->get('site_status')['type']
    ];
  }
}
