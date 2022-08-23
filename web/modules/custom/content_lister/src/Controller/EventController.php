<?php

namespace Drupal\content_lister\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class EventController.
 *
 * @package Drupal\content_lister\Controller
 */

class EventController extends ControllerBase {
  public function listEvents() {
      // Getting value while submitting filter form.
      $type = "event";
      $title = \Drupal::request()->query->get('title');
//    dd($title);
      $form['form'] = $this->formBuilder()->getForm('Drupal\content_lister\Form\EventfilterForm');

      // Creating table header
      $header = [
        'nid' => $this->t('Nid'),
        'vid' => $this->t('Vid'),
        'type' => $this->t('Type'),
        'title' => $this->t('Title'),
      ];

      if ($type == "event" && !$title) {
        $form['table'] = [
          '#type' => 'table',
          '#header' => $header,
          '#rows' => get_nodes_field_data("All", $type, $title),
          '#empty' => $this->t('No users found'),
        ];
      } else if ($title){
        $form['table'] = [
          '#type' => 'table',
          '#header' => $header,
          '#rows' => get_nodes_field_data("", $type, $title),
          '#empty' => $this->t('No records found'),
        ];
      }
      $form['pager'] = [
        '#type' => 'pager'
      ];
      return $form;
      }
}
