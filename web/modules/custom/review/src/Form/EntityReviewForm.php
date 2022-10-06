<?php

namespace Drupal\review\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\review\Entity\Review;

/**
 * Class CustomForm.
 */
class EntityReviewForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'entity_review_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $node = \Drupal::routeMatch()->getParameter('node');
    $nodeType = $node->getType();


    $form['review_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Review Name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];

    $form['review_description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Review Description'),
      '#maxlength' => 256,
      '#size' => 256,
      '#weight' => '0',
    ];

    $form['review_type'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Review Type'),
      '#value' => $nodeType,
      '#weight' => '0',
      '#disabled' => TRUE,
    ];

    $form['review_rating'] = [
      '#type' => 'container',
      'select' => [
        '#type' => 'select',
        '#title' => $this->t('Rating'),
        '#options' => [1, 2, 3, 4, 5],
        '#default_value' => [1, 2, 3, 4, 5],
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    // Create review.
    $entity = Review::create([
      'label'       => $values['review_name'],
      'bundle'        => $values['review_type'] . '_review_type',
      'status'      => TRUE,
      'description' => $values['review_description'],
      'field_' . $values['review_type'] . '_review_rating' => $values['select']
    ]);
    $entity->save();
  }

}
