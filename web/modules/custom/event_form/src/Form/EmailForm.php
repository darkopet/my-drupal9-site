<?php
/**
 * @file
 * Contains \Drupal\event_form\Form\EmailForm.
 */
namespace Drupal\event_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Routing\CurrentRouteMatch;

class EmailForm extends FormBase
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
    return 'emailform';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['config.emailform'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $id = $this->currentRouteService->getParameter('node')->id();

    $form['open_modal'] = [
      '#type' => 'link',
    '#title' => $this->t('Open Modal'),
      '#url' => Url::fromRoute('event_form.modal_form', ['id'=>$id]),
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
