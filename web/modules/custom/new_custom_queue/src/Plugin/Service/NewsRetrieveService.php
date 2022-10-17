<?php

namespace Drupal\new_custom_queue\Service;

use GuzzleHttp\ClientInterface;
use Psr\Container\ContainerInterface;

/**
 * The WeatherForecastService service class.
 */
class NewsRetrieveService {
  /**
   * The HTTP client to fetch the feed data with.
   *
   * @var ClientInterface
   */
  protected $httpClient;

  /**
   * Constructor for WeatherForecastService.
   *
   * @param ClientInterface $http_client
   *   A Guzzle client object.
   */
  public function __construct(ClientInterface $http_client){
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
  public function data(string $organizer): array{
    $request = $this->httpClient->request('GET', 'https://newsapi.org/v2/everything?q=' . $organizer . 'from=2022-09-17&sortBy=publishedAt&apiKey=de33e4a7b4f94ff694b58b8efa876baf', []);
    $data = json_decode($request->getBody()->getContents());
    $news = $data->list;
    return $news;
  }
}

