<?php

namespace Drupal\notification1\Plugin\Block;

use Drupal\notification1\GetNotificationList;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;

/**
 * Provides a 'NotificationBlock' block.
 *
 * @Block(
 *  id = "notification_block",
 *  admin_label = @Translation("Notification Block"),
 * )
 */

class NotificationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * @var $service GetNotificationList
   */
  protected $service;

  /**
   *
   * @var FormBuilder
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
      $container->get('notification1.list')
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param FormBuilder $formBuilder
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $formBuilder, GetNotificationList $service) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
    $this->service = $service;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $query = \Drupal::entityTypeManager()->getStorage('message')->getQuery();
    $block[0]['form'] = $this->formBuilder->getForm('Drupal\notification1\Form\MessageForm');
    $block[1]['content'] = [
      '#theme' => 'notification1',
      '#content' => $this->service->getList(),
    ];
    return $block;
  }
}
