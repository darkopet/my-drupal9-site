<?php

namespace Drupal\content_lister\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides the form for filter Students.
 */
class CompanyfilterForm extends FormBase {
  /**
   * @var Request
   */
  protected $requestUri;
  /**
   * Constructs a LocationController object
   */
  public function __construct(Request $requestUri) {
    $this->requestUri = $requestUri;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('request_')
    );
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

    if ($form_state->getValue('title') == "") {
      $form_state->setErrorByName('from', $this->t('You must enter a valid title.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array & $form, FormStateInterface $form_state) {
    $field = $form_state->getValues();

    $title = $field["title"];

    $url = $this->requestUri->getUriForPath('content_lister.companies')
      ->setRouteParameters(array('title'=>$title));

    $form_state->setRedirectUrl($url);
  }
}
