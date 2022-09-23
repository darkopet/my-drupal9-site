<?php

namespace Drupal\content_entity_drushgen\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the content entity drushgen entity edit forms.
 */
class ContentEntityDrushgenForm extends ContentEntityForm {

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
        $this->messenger()->addStatus($this->t('New content entity drushgen %label has been created.', $message_arguments));
        $this->logger('content_entity_drushgen')->notice('Created new content entity drushgen %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The content entity drushgen %label has been updated.', $message_arguments));
        $this->logger('content_entity_drushgen')->notice('Updated content entity drushgen %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.content_entity_drushgen.canonical', ['content_entity_drushgen' => $entity->id()]);

    return $result;
  }

}
