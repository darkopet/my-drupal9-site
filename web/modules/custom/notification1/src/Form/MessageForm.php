<?php

namespace Drupal\notification1\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Provides the form for filter Messages.
 */
class MessageForm extends FormBase {

  /**
   *
   * @var EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   *
   * @param EntityTypeManager $entityTypeManager
   */
  public function __construct(EntityTypeManager $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'msg_event_filter_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $options = [
      '' => 'Select Event Type'
    ];
    $query = $this->entityTypeManager->getStorage('taxonomy_term')->getQuery();
    $nids = $query->condition('vid', "event_type")->execute();
    $terms = $this->entityTypeManager->getStorage('taxonomy_term')->loadMultiple($nids);
//  dd($terms);
    foreach ($terms as $term) {
      $options[$term->tid->value] = $term->name->value;
//      dd($options);
    }
    $form['filters'] = [
      '#type'  => 'fieldset',
      '#title' => $this->t('Filter'),
      '#open'  => true,
    ];

    $form['filters']['event_type'] = [
      '#title'         => 'Event Type',
      '#type'          => 'select',
      '#options'       => $options,
    ];
    $form['filters']['actions'] = [
      '#type'       => 'actions'
    ];

    $form['filters']['actions']['submit'] = [
      '#type'  => 'submit',
      '#value' => $this->t('Apply')

    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array & $form, FormStateInterface $form_state) {
    $field = $form_state->getValues();
    $event_type = $field["event_type"];
    $url = Url::fromRoute('<current>')
      ->setRouteParameters(array('event_type'=>$event_type));
    $form_state->setRedirectUrl($url);
  }
}
