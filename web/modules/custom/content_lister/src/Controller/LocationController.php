<?php

namespace Drupal\content_lister\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class LocationController.
 *
 * @package Drupal\content_lister\Controller
 */

class LocationController extends ControllerBase {
  public function listLocations() {
      // Getting value while submitting filter form.
      $type = "location";
      $title = \Drupal::request()->query->get('title');
      $form['form'] = $this->formBuilder()->getForm('Drupal\content_lister\Form\LocationfilterForm');

      // Creating table header
      $header = [
        'nid' => $this->t('Nid'),
        'vid' => $this->t('Vid'),
        'type' => $this->t('Type'),
        'title' => $this->t('Title'),
      ];

      if ($type == "location" && !$title) {
        $form['table'] = [
          '#type' => 'table',
          '#header' => $header,
          '#rows' => get_nodes_field_data("All", $type, $title),
          '#empty' => $this->t('No users found'),
        ];
      } else if($title) {
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
