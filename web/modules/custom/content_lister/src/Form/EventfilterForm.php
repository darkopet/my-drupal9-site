<?php

namespace Drupal\content_lister\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Url;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides the form for filter Students.
 */
class EventfilterForm extends FormBase {
  /**
   * @var $currentRouteService CurrentRouteMatch
   */
  protected $currentRouteService;

  /**
   * @param CurrentRouteMatch $currentRouteMatch
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
  public function getFormId() {
    return 'content_lister_filter_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['filters'] = [
      '#type'  => 'fieldset',
      '#title' => $this->t('Filter'),
      '#open'  => true,
    ];
    $form['filters']['title'] = [
      '#title'         => 'Title',
      '#type'          => 'search'
    ];
    $form['filters']['actions'] = [
      '#type'       => 'actions'
    ];
    $form['filters']['actions']['submit'] = [
      '#type'  => 'submit',
      '#value' => $this->t('Filter')
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    if ( $form_state->getValue('title') == "") {
      $form_state->setErrorByName('from', $this->t('You must enter a valid title.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array & $form, FormStateInterface $form_state) {
    $field = $form_state->getValues();

    $title = $field["title"];

    $url = Url::fromRoute('content_lister.events')
      ->setRouteParameters(array('title'=>$title));

    $form_state->setRedirectUrl($url);
  }
}
