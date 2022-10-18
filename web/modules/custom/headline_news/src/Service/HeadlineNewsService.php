<?php

namespace Drupal\headline_news\Service;

use GuzzleHttp\ClientInterface;
use Psr\Container\ContainerInterface;

/**
 * The HeadlineNewsService service class.
 */
class HeadlineNewsService {
  /**
   * The HTTP client to fetch the feed data with.
   *
   * @var ClientInterface
   */
  protected ClientInterface $httpClient;

  /**
   * Constructor for WeatherForecastService.
   *
   * @param ClientInterface $http_client
   *   A Guzzle client object.
   */
  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('http_client')
    );
  }
  public function getHeadlines(string $organizer) {
    $request = $this->httpClient->request('GET', 'https://newsapi.org/v2/everything?q=' . $organizer . '&from=' . date('Y-m-d') . '&sortBy=publishedAt&apiKey=de33e4a7b4f94ff694b58b8efa876baf', []);
    $data = json_decode($request->getBody()->getContents());
//  dd($data);
    return $data;
  }
}
