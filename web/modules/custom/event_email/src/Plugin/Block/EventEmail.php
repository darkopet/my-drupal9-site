<?php

namespace Drupal\event_email\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;


/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "event_email",
 *   admin_label = @Translation("Send to friend"),
 *   category = @Translation("Send to friend"),
 * )
 */
class EventEmail extends BlockBase implements ContainerFactoryPluginInterface{

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
   * @param FormBuilder $eventCountdownService
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $formBuilder)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = $this->formBuilder->getForm('Drupal\event_email\Form\ModalForm');
    return $form;
  }

}
