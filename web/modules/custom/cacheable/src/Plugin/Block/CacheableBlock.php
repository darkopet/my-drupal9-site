<?php

namespace Drupal\cacheable\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * @Block(
 *   id = "journey_talk_cacheable_block"
 * )
 */
class CacheableBlock extends BlockBase {

  public function build() {
    return[
      '#markup' => $this->t('%name runs this site!', [
        '%name' => \Drupal\user\Entity\User::load(1)->getAccountName(),
      ]),
    ];
  }

  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIf($account->id() != 1);
  }

  public function getCacheTags() {
    return ['user:1'];
  }
}
