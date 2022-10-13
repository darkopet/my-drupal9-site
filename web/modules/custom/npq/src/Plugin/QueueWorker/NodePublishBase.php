<?php

/**
 * @file
 * Contains Drupal\organizer_news_queue\Plugin\QueueWorker\NodePublishBase.php
 */

namespace Drupal\npq\Plugin\QueueWorker;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides base functionality for the NodePublish Queue Workers.
 */

class NodePublishBase extends QueueWorkerBase implements ContainerFactoryPluginInterface {
  /**
   * The node storage.
   *
   * @var EntityStorageInterface
   */
  protected $nodeStorage;

  /**
   * Main constructor.
   *
   * @param array $configuration
   *   Configuration array.
   * @param mixed $plugin_id
   *   The plugin id.
   * @param mixed $plugin_definition
   *   The plugin definition.
   * @param EntityStorageInterface $node_storage
   *   The node storage.
   */
  public function __construct(array                      $configuration, $plugin_id, $plugin_definition,
                              EntityStorageInterface     $node_storage)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->nodeStorage = $node_storage;
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
      $container->get('entity_type.manager')->getStorage('node'),
    );
  }

  /**
   * Publishes a node.
   *
   * @param NodeInterface $node
   * @return int
   */
  protected function publishNode($node) {
    $node->setPublished(TRUE);
    return $node->save();
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    /** @var NodeInterface $node */
    $node = $this->nodeStorage->load($data->nid);
    if (!$node->isPublished() && $node instanceof NodeInterface) {
      return $this->publishNode($node);
    }
  }
}
