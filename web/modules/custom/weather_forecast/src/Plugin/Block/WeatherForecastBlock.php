<?php

namespace Drupal\weather_forecast\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Security\TrustedCallbackInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;
use Drupal\weather_forecast\WeatherForecastService;

/**
 *
 * @Block(
 *   id = "weather_forecast",
 *   admin_label = @Translation("Weather Forecast Block"),
 *   category = @Translation("Custom"),
 * )
 */
class WeatherForecastBlock extends BlockBase implements ContainerFactoryPluginInterface, TrustedCallbackInterface {
  /**
   * @var $formBuilder FormBuilder
   */
  protected $formBuilder;
  /**
   * @var $weatherForecastService WeatherForecastService
   */
  protected $weatherForecastService;

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
      $container->get('weather_forecast_service'),
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param FormBuilder $formBuilder
   * @param WeatherForecastService $weatherForecastService
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $formBuilder, WeatherForecastService $weatherForecastService) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
    $this->weatherForecastService = $weatherForecastService;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
//    $data = $this->weatherForecastService->data();
//    dd($data);
    $build = [];
      $build['lazy_builder'] = [
        '#lazy_builder' => [
          WeatherForecastBlock::class . '::lazyBuilder',
          [],
        ],
        '#create_placeholder' => TRUE,
      ];
    return $build;
  }

  public static function lazyBuilder() {
//    $data = $this->weatherForecastService->data();
//    $data = \Drupal\weather_forecast\WeatherForecastService::data();
    sleep(5);
    return [
      '#theme' => 'weather_forecast',
      '#data' => 'sdasdasdva',
    ];
  }
  public static function trustedCallbacks() {
    return [
      'lazyBuilder'
    ];
  }
}
