<?php

namespace Drupal\lazy_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Security\TrustedCallbackInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;

/**
 *
 * @Block(
 *   id = "lazy_block",
 *   admin_label = @Translation("Lazy Review Block"),
 *   category = @Translation("Custom"),
 * )
 */
class LazyReviewBlock extends BlockBase implements ContainerFactoryPluginInterface, TrustedCallbackInterface {
  /**
   * @var $formBuilder FormBuilder
   */
  protected $formBuilder;

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
      $container->get('form_builder'),
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param FormBuilder $formBuilder
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $formBuilder) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
      $build['lazy_builder'] = [
        '#lazy_builder' => [
          LazyReviewBlock::class . '::lazyBuilder',
          [],
        ],
        '#create_placeholder' => TRUE,
      ];
    return $build;
  }
  public static function lazyBuilder() {
    $signedInUser = \Drupal::currentUser()->getAccountName();
    $reviewStorage = \Drupal::entityTypeManager()->getStorage('review');
    $reviewsAddedByCurrentUser = [];
    $items = $reviewStorage->loadMultiple();
    foreach ($items as $item) {
      $reviewAddedByUser = ($item->getOwner()->get('name')->getValue()[0]['value']);
      if(($item->get('bundle')->getValue()[0]['target_id']) == 'company_review_type'){
        $rating = $item->get('field_company_review_rating')->getValue()[0]['value'];
      } elseif (($item->get('bundle')->getValue()[0]['target_id']) == 'location_review_type') {
        $rating = $item->get('field_location_review_rating')->getValue()[0]['value'];
      }
      if ($reviewAddedByUser == $signedInUser) {
        $reviewsAddedByCurrentUser[] = ['title' =>$item->label(), 'rating' => $rating];
      }
    }
    sleep(5);
    return [
      '#theme' => 'lazy_block',
      '#data' => $reviewsAddedByCurrentUser,
    ];
  }
  public static function trustedCallbacks() {
    return [
      'lazyBuilder'
    ];
  }
}
