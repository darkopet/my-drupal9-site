<?php

namespace Drupal\favorites_count\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;


class FavoritesCountBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param getUserFlagFlaggingCount $flagCounter
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, getUserFlagFlaggingCount $flagCounter)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->flagCounter = $flagCounter;
  }
  //if (settings.url.includes('/flag/flag') || settings.url.includes('flag/unflag'))
  /**
   * {@inheritdoc}
   */
  public function build() {
    return  $this->flagCounter;
  }
}
