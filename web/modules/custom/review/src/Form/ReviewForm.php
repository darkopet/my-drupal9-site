<?php

namespace Drupal\review\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the review entity edit forms.
 */
class ReviewForm extends ContentEntityForm {

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
        $this->messenger()->addStatus($this->t('New review %label has been created.', $message_arguments));
        $this->logger('review')->notice('Created new review %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The review %label has been updated.', $message_arguments));
        $this->logger('review')->notice('Updated review %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.review.canonical', ['review' => $entity->id()]);

    return $result;
  }

}
