<?php

namespace Drupal\event_timer\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "event_timer_block",
 *   admin_label = @Translation("Event timer"),
 * )
 */
class EventTimerBlock extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $node = \Drupal::routeMatch()->getParameter('node');
   var_dump(($node->get('field_start_end_date')->getValue()[0]['value']));
   var_dump(date('Y-m-d'));
    return [
      '#markup' => $this->t('Days until the event start: '),
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
