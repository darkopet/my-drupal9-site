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
 *   id = "event_timer_block",
 *   admin_label = @Translation("Event timer"),
 * )
 */
class EventTimerBlock extends BlockBase implements ContainerFactoryPluginInterface {
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
    $node = $this->currentRouteService->getParameter('node');

    $startTimeInt = strtotime($node->get('field_start_end_date')->getValue()[0]['value']);
    $endTimeInt = strtotime($node->get('field_start_end_date')->getValue()[0]['end_value']);
    $currentTimeInt = strtotime(date('Y-m-d h:i:s', time()));
    $diffStartTime = $startTimeInt-$currentTimeInt;

    $time_info = $node->get('field_start_end_date')->getValue()[0]['value'];
    $message = '';

    if ($currentTimeInt < $startTimeInt)
    {
      if ($diffStartTime < 86400)
      {
         $message = $this->t('The event is starting today.');
      }
      $message = 'Days left to the event start: ' . intdiv($diffStartTime, 86400);
    }
    elseif ($startTimeInt <= $currentTimeInt && $currentTimeInt <= $endTimeInt) {
      $message = $this->t('The event is currently in progress.');
    }
    return [
      '#theme' => 'event_block',
      '#message' => $message,
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
