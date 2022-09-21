<?php

namespace Drupal\notification;

use Drupal\token\TokenInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Session\AccountProxy;

class GetNotificationList {

  private $entityTypeManager;
  private $requestStack;
  private $token;
  private $accountProxy;

  public function __construct(
    EntityTypeManagerInterface $entityTypeManager,
    TokenInterface $token,
    RequestStack $requestStack,
    AccountProxy $accountProxy
  )
  {
    $this->entityTypeManager = $entityTypeManager;
    $this->token = $token;
    $this->requestStack = $requestStack;
    $this->accountProxy = $accountProxy;
  }

  public function getList() {
    $eventTypeFilter = $this->requestStack->getCurrentRequest()->query->get('event_type');
    $notificationList = [];
    $userId = $this->accountProxy->id();
    $user = $this->entityTypeManager->getStorage('user')->load($userId);
    $limit = $user->get('field_maximum_notifications')->getValue()[0]['value'];
    $query = $this->entityTypeManager->getStorage('message')->getQuery();
    $query->condition('field_event_type_message', $eventTypeFilter);
    $mids = $query->pager($limit)->sort('created', $direction = 'DESC')->condition('template', 'event_created')->execute();

    if ($eventTypeFilter && $mids !== []) {
      foreach ($mids as $mid) {
        $message = $this->entityTypeManager->getStorage('message')->load($mid);
        $referencedNode = $message->get('field_node_reference')->getValue()[0]['target_id'];
        $node = $this->entityTypeManager->getStorage('node')->load($referencedNode);
        $startDate = $node->get('field_start_end_date')->getValue()[0]['value'];
        $startDate = strtotime($startDate);
        $now = time();
        if ($now < $startDate) {
          $text = $message->getText()[0];
          $html = $this->token->replace($text, [
            'node' => $node,
          ], []);
          $html = html_entity_decode($html);
          $notificationList[$mid] = $html;
        }
      }
      return $notificationList;
    }
  }
}

