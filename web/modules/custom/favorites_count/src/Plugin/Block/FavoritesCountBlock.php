<?php

namespace Drupal\favorites_count\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountProxy;
use Drupal\flag\FlagCountManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\flag\FlagService;


/**
 * Provides a 'FavoritesEventCounterBlock' block.
 *
 * @Block(
 *  id = "favorites_count",
 *  admin_label = @Translation("Favorites Event Counter Block"),
 * )
 */
class FavoritesCountBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   * Drupal\flag\FlagService definition.
   *
   * @var \Drupal\flag\FlagService
   */
  protected $flag;

  /**
   * Drupal\flag\FlagCountManagerInterface definition.
   *
   * @var \Drupal\flag\FlagCountManagerInterface
   */
  protected $flagCount;

  /**
   * Drupal\Core\Session\AccountProxy definition.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $accountProxy;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('flag.count'),
      $container->get('current_user'),
      $container->get('flag'),
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param FlagService $flag
   * @param FlagCountManagerInterface $flagCount
   * @param AccountProxy $accountProxy
   */
  public function __construct(
    array $configuration,
          $plugin_id,
          $plugin_definition,
    FlagCountManagerInterface $flagCount,
    AccountProxy $accountProxy,
    FlagService $flag)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->flag = $flag;
    $this->flagCount = $flagCount;
    $this->accountProxy = $accountProxy;
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $currentUser = $this->accountProxy->getAccount();
    $favoriteFlag =  $this->flag->getFlagById('bookmark');
    $countFlag = $this->flagCount->getUserFlagFlaggingCount($favoriteFlag, $currentUser);
    return [
      '#theme' => 'favorites_count',
      '#data' => $countFlag,
      '#attached' => [
        'library' => [
          'favorites_count/ajax',
        ],
      ],
    ];
  }

  public function getCacheTags() {
    return ['flagging'];
  }

  public function getCacheContexts() {
    return ['user'];
  }
}
