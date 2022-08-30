<?php

namespace Drupal\content_lister\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class ContentListerController.
 *
 * @package Drupal\content_lister\Controller
 */

class ContentListerController extends ControllerBase {
  /**
   * @var RequestStack
   */
  protected $requestStack;
  /**
   * Constructs a LocationController object
   */
  public function __construct(RequestStack $requestStack) {
    $this->requestStack = $requestStack;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('request_stack')
    );
  }
  public function listNodes() {
    $type = $this->requestStack->getCurrentRequest()->query->get('title');
    $form['form'] = $this->formBuilder()->getForm('Drupal\content_lister\Form\NodefilterForm');

    $header = [
      'nid' => $this->t('Nid'),
      'vid' => $this->t('Vid'),
      'type' => $this->t('Type'),
      'uuid' => $this->t('Uuid'),
      'langcode' => $this->t('Langcode'),
    ];
    if ($type == "") {
      $form['table'] = [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => get_nodes("All", ""),
        '#empty' => $this->t('No nodes found'),
      ];
    } else {
      $form['table'] = [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => get_nodes("", $type),
        '#empty' => $this->t('No records found'),
      ];
    }
    $form['pager'] = [
      '#type' => 'pager'
    ];
    return $form;
   }
}
