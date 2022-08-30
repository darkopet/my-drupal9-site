<?php

namespace Drupal\content_lister\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class CompanyController.
 *
 * @package Drupal\content_lister\Controller
 */

class CompanyController extends ControllerBase {
  /**
   * @var RequestStack
   */
  protected $requestStack;
  /**
   * Constructs a CompanyController object
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

  public function listCompanies() {
      $type = "company";
      $title = $this->requestStack->getCurrentRequest()->query->get('title');
      $form['form'] = $this->formBuilder()->getForm('Drupal\content_lister\Form\CompanyfilterForm');

      $header = [
        'nid' => $this->t('Nid'),
        'vid' => $this->t('Vid'),
        'type' => $this->t('Type'),
        'title' => $this->t('Title'),
      ];
      if ($type == "company" && !$title) {
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
