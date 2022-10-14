<?php

namespace Drupal\new_custom_queue\Plugin\QueueWorker;

use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\new_custom_queue\Service\HeadlinesQueueService;
use Drupal\new_custom_queue\Service\NewsRetrieveService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Custom Queue Worker.
 *
 * @QueueWorker(
 *   id = "headlines_queue",
 *   title = @Translation("HeadlinesQueueWorker"),
 *   cron = {"time" = 60}
 * )
 */
final class HeadlinesQueueWorker extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager.
   *
   * @var EntityTypeManagerInterface
   */
  protected EntityTypeManagerInterface $entityTypeManager;
  /**
   * The database connection.
   *
   * @var Connection
   */
  protected Connection $database;
  /**
   * The node storage.
   *
   * @var EntityStorageInterface
   */
  protected EntityStorageInterface $nodeStorage;
  /**
   * @var HeadlinesQueueService
   */
  protected HeadlinesQueueService $queueService;
  /**
   * @var NewsRetrieveService
   */
  protected NewsRetrieveService $retrieveService;

  /**
   * Main constructor.
   *
   * @param array $configuration
   *   Configuration array.
   * @param mixed $plugin_id
   *   The plugin id.
   * @param mixed $plugin_definition
   *   The plugin definition.
   * @param EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param Connection $database
   *   The connection to the database.
   * @param EntityStorageInterface $node_storage
   *   The node storage.
   * @param HeadlinesQueueService $queueService
   *   Custom Headline News Service.
   * @param NewsRetrieveService $retrieveService
   *   NewsAPI retrieve Service.
   */
  public function __construct(array                      $configuration, $plugin_id, $plugin_definition,
                              EntityTypeManagerInterface $entity_type_manager,
                              Connection                 $database,
                              HeadlinesQueueService      $queueService,
                              NewsRetrieveService        $retrieveService)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
    $this->database = $database;
    $this->nodeStorage = $this->entityTypeManager->getStorage('node');
    $this->queueService = $queueService;
    $this->retrieveService = $retrieveService;
  }

  /**
   * Used to grab functionality from the container.
   *
   * @param ContainerInterface $container
   *   The container.
   * @param array $configuration
   *   Configuration array.
   * @param mixed $plugin_id
   *   The plugin id.
   * @param mixed $plugin_definition
   *   The plugin definition.
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('database'),
      $container->get('headlines.news'),
      $container->get('news.retrieve')
    );
  }

  /**
   * Processes an item in the queue.
   *
   * @param mixed $data
   *   The queue item data.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   * @throws \Drupal\Core\Entity\EntityStorageException
   * @throws \Exception
   */
  public function processItem($organizer) {
    $news = $this->retrieveService->data($organizer);
    dd($news);
    return $news;
  }
}
