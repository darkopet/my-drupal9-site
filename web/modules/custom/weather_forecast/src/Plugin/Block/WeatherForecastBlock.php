<?php

namespace Drupal\weather_forecast\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Security\TrustedCallbackInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilder;
use Drupal\weather_forecast\Service\WeatherForecastService;
use Drupal\weather_forecast\Service\TimeCheckService;

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
   * @var $timeCheckService TimeCheckService
   */
  protected $timeCheckService;

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
      $container->get('time_check_service'),
    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param FormBuilder $formBuilder
   * @param WeatherForecastService $weatherForecastService
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition,
                              FormBuilder $formBuilder, WeatherForecastService $weatherForecastService, TimeCheckService $timeCheckService) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $formBuilder;
    $this->weatherForecastService = $weatherForecastService;
    $this->timeCheckService = $timeCheckService;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
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
    $city = 'Skopje';
    $currentDay = date('Y-m-d');
    $data = \Drupal::service('weather_forecast_service')->data($city);
    $checkStartData = \Drupal::service('time_check_service')->eventStart();
    $checkEndData = \Drupal::service('time_check_service')->eventEnd();
    foreach ($data as $item) {
      if(date("Y-m-d", $item->dt) > $checkStartData) {
        if(date("Y-m-d", $item->dt) === $currentDay) {
          $weather[] = ['city' => $city, 'temp' => $item->temp->day, 'weather' => $item->weather[0]->main];
        }
      } else
        $weather[] = ['Not started.'];
    }
    sleep(5);
    return [
      '#theme' => 'weather_forecast',
      '#data' => $weather,
    ];
  }
  public static function trustedCallbacks() {
    return [
      'lazyBuilder'
    ];
  }
}
