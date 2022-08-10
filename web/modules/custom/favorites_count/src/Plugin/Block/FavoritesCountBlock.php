<?php

namespace Drupal\favorites_count\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\modules\contrib\FlagCountManager;

class FavoritesCountBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   * @var $flagCounter getUserFlagFlaggingCount
   */
  protected $flagCounter;

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
      $container->get('flag_counter'),
    // $flag_service = Drupal::service('flag.count');
    // $counts = $flag_service->getUserFlagFlaggingCount($node);
    // if (settings.url.includes('/flag/flag') || settings.url.includes('flag/unflag'))
    );
  }
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

  /**
   * {@inheritdoc}
   */
  public function build() {
    return  $this->flagCounter;
  }
}
