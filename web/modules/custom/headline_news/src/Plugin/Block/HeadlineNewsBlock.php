<?php

namespace Drupal\headline_news\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;

/**
 *
 * @Block(
 *   id = "headline_news",
 *   admin_label = @Translation("News from the web about organizer"),
 *   category = @Translation("Custom"),
 * )
 */
class HeadlineNewsBlock extends BlockBase implements ContainerFactoryPluginInterface {
  /**
   *
   * @var FormBuilder
   */
  protected $formBuilder;
  /**
   * @var CurrentRouteMatch $currentRouteService
   */
  protected CurrentRouteMatch $currentRouteService;

  /**
   * @param ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param CurrentRouteMatch $currentRouteMatch
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
      $container->get('current_route_match'),
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param FormBuilder $formBuilder
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $formBuilder, CurrentRouteMatch $currentRouteMatch)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
    $this->currentRouteService = $currentRouteMatch;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    if($this->currentRouteService->getCurrentRouteMatch()->getParameter('node') === null){
      $organizer = 'tesla';
    } elseif ($this->currentRouteService->getCurrentRouteMatch()->getParameter('node')->get('type')->getValue()[0]['target_id'] === 'event') {
      if ($this->currentRouteService->getCurrentRouteMatch()->getParameter('node')->get('field_event_organizer')->getValue()[0]['target_id']){
          $organizer = 'apple';
      } else {
        $organizer = 'microsoft';
      }
    } else {
      $organizer = 'foxconn';
    }

    $results = \Drupal::service('headline.news')->getHeadlines($organizer);
    foreach ($results->articles as $result) {
      $headlineNews[] = ['company' => $organizer, 'headline' => $result->title, 'link' => $result->url];
    }
    return [
      '#theme' => 'headline_news',
      '#data' => $headlineNews,
    ];
  }
}
