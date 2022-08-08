<?php

namespace Drupal\uncacheable\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * @Block(
 *   id = "journey_talk_uncacheable_block"
 * )
 */
class UncacheableBlock extends BlockBase {

  public function build() {
    usleep(250*1000);
    return[
      '#markup' => $this->t('<p>Weather forecast at @time: emoticon.</p>', [
        '@time' => (int) microtime(TRUE),
      ]),
    ];
  }
  public function getCacheMaxAge() {
    return 0;
  }
}
