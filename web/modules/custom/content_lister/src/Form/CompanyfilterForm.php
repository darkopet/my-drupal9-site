<?php

namespace Drupal\content_lister\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides the form for filter Students.
 */
class CompanyfilterForm extends ConfigFormBase implements ContainerInjectionInterface {

  public function __construct(ConfigFactoryInterface $config_factory, Url $from_route) {
    parent::__construct($config_factory);
    $this->fromRoute = $from_route;
  }
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('from_route'),
    );
  }
  public function getEditableConfigNames(){
    // TODO: Implement getEditableConfigNames() method.
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

    $url = Url::fromRoute('content_lister.companies')
      ->setRouteParameters(array('title'=>$title));

    $form_state->setRedirectUrl($url);
  }
}
