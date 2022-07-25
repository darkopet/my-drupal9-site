<?php
namespace Drupal\friend_form\Plugin\Block;

use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;
/**
 *
 * @Block(
 *   id = "friend_form",
 *   admin_label = @Translation("Friend Form Block"),
 *   category = @Translation("Custom"),
 * )
 */
class FriendFormBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   * @var $formBuilder FormBuilder
   */
  protected FormBuilder $formBuilder;
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
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $formBuilder)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    return  $this->formBuilder->getForm('Drupal\friend_form\Form\FriendForm');
  }
}
