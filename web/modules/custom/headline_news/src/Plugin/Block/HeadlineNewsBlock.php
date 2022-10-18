<?php

namespace Drupal\headline_news\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;

/**
 *
 * @Block(
 *   id = "headline_news",
 *   admin_label = @Translation("Headline News Block"),
 *   category = @Translation("Custom"),
 * )
 */
class HeadlineNewsBlock extends BlockBase implements ContainerFactoryPluginInterface
{

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
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
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
    $organizer = 'tesla';
    $results = \Drupal::service('headline.news')->getHeadlines($organizer);
    dd($results->articles);
    foreach ($results->articles as $result) {
      $headlineNews[] = ['company' => $organizer, 'headline' => $result->title];
    }
    return [
      '#theme' => 'headline_news',
      '#data' => $headlineNews,
    ];
  }
}
