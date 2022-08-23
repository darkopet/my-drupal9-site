<?php

namespace Drupal\content_lister\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ContentListerController.
 *
 * @package Drupal\content_lister\Controller
 */

class ContentListerController extends ControllerBase {

  public function listNodes() {
    // Getting value while submitting filter form.
    $type = \Drupal::request()->query->get('type');

    //====load filter controller
    $form['form'] = $this->formBuilder()->getForm('Drupal\content_lister\Form\NodefilterForm');

    // Creating table header
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
