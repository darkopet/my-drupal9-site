<?php

namespace Drupal\new_custom_queue\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;

class NewsHeadlinesQueueService {
  private $entityTypeManager;

  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  public function getNid(): array {
    $events = $this->entityTypeManager->getStorage('node');
    $nids = [];
    foreach ($events as $event) {
      $eventStart = $event->get('field_start_end_date')->getValue()[0]['value'];
      $current = date('Y-m-d H:i:s', time());
      $diffStart = ((strtotime($current) - strtotime($eventStart)) / 60 / 60 / 24);
      if ($diffStart < 0) {
        $nid = $event->get('field_event_organizer')->getValue()[0]['target_id'];
        array_push($nids, $nid);
      }
    }
    return $nids;
  }
}
