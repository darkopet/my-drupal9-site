<?php
namespace Drupal\personalized\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * @Block(
 *   id = "journey_talk_personalized_block"
 * )
 */
class PersonalizedBlock extends BlockBase {

  public function build() {
    $funny_emojis = [':)', ':(', ':D', ':)'];
    return [
      '#markup' => $this->t('<p>Funny emoji just for you: @emoji</p>
                             <p>(Hand-picked at @time!)</p>', [
                               '@emoji' => $funny_emojis[rand(0, count($funny_emojis) - 1)],
                               '@time' => (int) microtime(TRUE),
      ]),
    ];
  }
  public function getCacheContexts() {
    return ['session'];
  }
}
