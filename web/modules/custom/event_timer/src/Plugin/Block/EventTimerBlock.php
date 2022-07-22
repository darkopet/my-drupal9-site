<?php

namespace Drupal\event_timer\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "event_timer_block",
 *   admin_label = @Translation("Event timer"),
 * )
 */
class EventTimerBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $node = \Drupal::routeMatch()->getParameter('node');

    $start = $node->get('field_start_end_date')->getValue()[0]['value'];
    var_dump($start);
    $startint = strtotime($start);
    var_dump($startint);

    echo "<br><br>";

    $end = $node->get('field_start_end_date')->getValue()[0]['end_value'];
    var_dump($end);
    $endint = strtotime($end);
    var_dump($endint);

    echo "<br><br>";

    $current = date('Y-m-d h:i:s', time());
    var_dump($current);
    echo "<br>";
    $currint = strtotime($current);
    var_dump($currint);
    echo "<br><br>";

    (int) $resultstart = $startint-$currint;
    (int) $resultend = $endint-$currint;
//    var_dump($resultstart);
//    var_dump($resultend);

    if ($currint < $startint)
    {
      if ($resultstart < 86400)
      {
        return [
          '#markup' => $this->t('The event is starting today.')
        ];
      }
      return [
        '#markup' => $this->t('Days left to the event start: ' . intdiv($resultstart, 86400)),
      ];
    }
    elseif ($startint <= $currint && $currint <= $endint) {
      return [
      '#markup' => $this->t('This event is ongoing.'),
      ];
    }
    elseif ($currint > $endint) {
      return [
        '#markup' => $this->t('The event has passed.'),
      ];
    };
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account)
  {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }
}
