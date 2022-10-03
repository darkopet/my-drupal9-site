<?php

/**
 * @file
 * Contains \Drupal\review\Form\CompanyReviewForm
 */

namespace Drupal\review\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Routing\CurrentRouteMatch;

class CompanyReviewForm extends FormBase
{
  /**
   * @var $currentRouteService CurrentRouteMatch
   */
  protected $currentRouteService;


  /**
   * @param CurrentRouteMatch $currentRouteMatch
   *   The email validator.
   */

  public function __construct(CurrentRouteMatch $currentRouteMatch) {

    $this->currentRouteService = $currentRouteMatch;
  }

  public static function create(ContainerInterface $container) {
    $form = new static(
      $container->get('current_route_match')
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'reviewform';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['config.reviewform'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $id = $this->currentRouteService->getParameter('id');

    $form['open_modal'] = [
      '#type' => 'link',
      '#title' => $this->t('Add Company Review'),
      '#url' => Url::fromRoute('add_review.company_review_form'),
      '#attributes' => [
        'class' => [
          'use-ajax',
          'button',
        ],
      ],
    ];
    // Attach the library for pop-up dialogs/modals.
    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
  }
}
