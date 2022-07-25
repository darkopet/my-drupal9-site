<?php
/**
 * @file
 * Contains \Drupal\friend_form\Plugin\Block\FriendFormBlock.
 */

namespace Drupal\friend_form\Plugin\Block;

use Drupla\Core\Block\BlockBase;

/**
 * Provides a 'friend_form' block.
 *
 * @Block(
 *   id = "friend_form_block",
 *   admin_label =  @Translation("friend_form block"),
 *   category = @Translation("Custom friend_form block")
 * )
 */
class FriendFormBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::self->buildForm('Drupal\friend_form\Form\FriendForm');
    return $form;
  }
}
