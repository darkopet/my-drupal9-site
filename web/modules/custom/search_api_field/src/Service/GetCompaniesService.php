<?php

namespace Drupal\search_api_field\Service;

use Drupal\Core\Entity\EntityTypeManagerInterface;

class GetCompaniesService {
  private $entityTypeManager;

  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  public function getNids():array {
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
