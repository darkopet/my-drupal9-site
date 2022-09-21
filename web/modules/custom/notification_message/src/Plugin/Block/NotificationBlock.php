<?php

namespace Drupal\notification_message\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\token\TokenInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountProxy;
use Drupal\Core\Form\FormBuilder;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a 'NotificationBlock' block.
 *
 * @Block(
 *  id = "notification_block",
 *  admin_label = @Translation("Meri Notification"),
 * )
 */

class NotificationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   *
   * @var TokenInterface
   */
  protected $token;

  /**
   *
   * @var EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   *
   * @var AccountProxy
   */
  protected $accountProxy;

  /**
   *
   * @var FormBuilder
   */
  protected $formBuilder;

  /**
   *
   * @var RequestStack
   */
  protected $requestStack;

  /**
   * @param ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('token'),
      $container->get('entity_type.manager'),
      $container->get('current_user'),
      $container->get('form_builder'),
      $container->get('request_stack')

    );
  }

  /**
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param TokenInterface $token
   * @param EntityTypeManagerInterface $currentRouteMatch
   * @param FormBuilder $formBuilder
   * @param RequestStack $requestStack
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    TokenInterface $token,
    EntityTypeManagerInterface $entityTypeManager,
    AccountProxy $accountProxy,
    FormBuilder $formBuilder,
    RequestStack $requestStack)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->token = $token;
    $this->entityTypeManager = $entityTypeManager;
    $this->accountProxy = $accountProxy;
    $this->formBuilder = $formBuilder;
    $this->requestStack = $requestStack;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $userId = $this->accountProxy->id();
    if ($userId) {
      $user = $this->entityTypeManager->getStorage('user')->load($userId);
      $showNotification = $user->get('field_notify_me_about_new_events')->getValue()[0]['value'];
      if ($showNotification) {
        $block[0]['form'] = $this->formBuilder->getForm('Drupal\notification_message\Form\MessageForm');
        $block[1]['content'] = [
          '#theme' => 'notification_block',
          '#content' => $this->getNotificationList(),
        ];
        return $block;
      }
      else {
        return [];
      }
    }
    return [];
  }

  public function getNotificationList() {
    $eventTypeFilter = $this->requestStack->getCurrentRequest()->query->get('event_type');
    $notificationList = [];
    $userId = $this->accountProxy->id();
    $user = $this->entityTypeManager->getStorage('user')->load($userId);
    $limit = $user->get('field_maximum_items')->getValue()[0]['value'];
    $query = $this->entityTypeManager->getStorage('message')->getQuery();
    if ($eventTypeFilter) {
      $query->condition('field_event_type_msg',$eventTypeFilter);
    }
    $mids = $query->pager($limit)->sort('created', $direction = 'DESC')->condition('template','event_created_message')->execute();
    foreach ($mids as $mid) {
      $message = $this->entityTypeManager->getStorage('message')->load($mid);
      $referencedNode = $message->get('field_node_reference_message')->getValue()[0]['target_id'];
      $node = $this->entityTypeManager->getStorage('node')->load($referencedNode);
        $startDate = strtotime($node->get('field_start_end_date')->getValue()[0]['value']);
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
