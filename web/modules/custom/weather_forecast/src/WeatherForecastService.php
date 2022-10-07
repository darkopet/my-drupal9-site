<?php

namespace Drupal\weather_forecast;

use Drupal\node\Entity\Node;
use GuzzleHttp\ClientInterface;
use Psr\Container\ContainerInterface;

/**
 * The WeatherForecastService service class.
 */
class WeatherForecastService
{
  /**
   * The HTTP client to fetch the feed data with.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * Constructor for WeatherForecastService.
   *
   * @param \GuzzleHttp\ClientInterface $http_client
   *   A Guzzle client object.
   */
  public function __construct(ClientInterface $http_client)
  {
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('http_client')
    );
  }

  public function data()
  {
    $request = $this->httpClient->request('GET', 'api.openweathermap.org/data/2.5/forecast/daily?q=Beijing&units=metric&cnt=6&appid=542ffd081e67f4512b705f89d2a611b2', []);
    $data = $request->getBody()->getContents();
    $build = [
      '#theme' => 'weather_forecast',
      '#data' => $data,
    ];
    if ($request->getStatusCode() != 200) {
      return $build;
    }
  }

  public function timeCheck(Node $node) {
    if ($node->getType() === 'event') {
      dd($node);
    }
  }
}
