<?php

namespace Drupal\organizer_news_queue\Plugin\QueueWorker;

use Drupal\organizer_news_queue\Plugin\QueueWorker\NodePublishBase;

/**
 * A Node Publisher that publishes nodes on CRON run.
 *
 * @QueueWorker(
 *   id = "cron_node_publisher",
 *   title = @Translation("Cron Node Publisher"),
 *   cron = {"time" = 10}
 * )
 */
class CronNodePublisher extends NodePublishBase {


}
