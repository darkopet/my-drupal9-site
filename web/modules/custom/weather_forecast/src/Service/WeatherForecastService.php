<?php

namespace Drupal\weather_forecast\Service;

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
  public function data(string $city): array{
    $request = $this->httpClient->request('GET', 'api.openweathermap.org/data/2.5/forecast/daily?q=' . $city . '&units=metric&cnt=5&appid=542ffd081e67f4512b705f89d2a611b2', []);
    $data = json_decode($request->getBody()->getContents());
    $weather = $data->list;
    return $weather;
  }
}
