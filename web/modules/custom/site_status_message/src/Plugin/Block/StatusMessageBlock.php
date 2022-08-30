<?php

namespace Drupal\event_timer\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Session\AccountInterface;
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
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param CurrentRouteMatch $currentRouteMatch
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CurrentRouteMatch $currentRouteMatch) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentRouteService = $currentRouteMatch;
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
      $container->get('current_route_match')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {

    return [
      '#theme' => 'event_block',
      '#type' => '',
      '#message' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account)
  {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }
}
