<?php

namespace Drupal\reviews\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the reviews entity edit forms.
 */
class ReviewsForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New reviews %label has been created.', $message_arguments));
        $this->logger('reviews')->notice('Created new reviews %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The reviews %label has been updated.', $message_arguments));
        $this->logger('reviews')->notice('Updated reviews %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.reviews.canonical', ['reviews' => $entity->id()]);

    return $result;
  }

}
