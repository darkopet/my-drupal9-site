<?php
namespace Drupal\content_lister\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the form for filter Students.
 */
class NodefilterForm extends FormBase {

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
    $form['filters']['type'] = [
      '#title'         => 'Content Type',
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

    if ( $form_state->getValue('type') == "") {
      $form_state->setErrorByName('from', $this->t('You must enter a valid content type.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array & $form, FormStateInterface $form_state) {
    $field = $form_state->getValues();
//    dd($field);
    $type = $field["type"];
//    dd($type);
    $url = \Drupal\Core\Url::fromRoute('content_lister.nodes')
      ->setRouteParameters(array('type'=>$type));
//    dd($url);
    $form_state->setRedirectUrl($url);
//    dd($form_state);
  }
}