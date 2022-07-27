<?php
/**
 * @file
 * Contains \Drupal\event_form\Form\EventForm.
 */
namespace Drupal\event_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class eventForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'event_form_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['message_title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title:'),
    );
    $form['friend_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name:'),
      '#required' => TRUE,
    );
    $form['friend_email'] = array(
      '#type' => 'email',
      '#title' => t('Email:'),
      '#required' => TRUE,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('SEND'),
      '#button_type' => 'primary',
    );
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $friendEmail = $form_state->getValue('friend_email');
    if (!\Drupal::service('email.validator')->isValid($friendEmail)) {
        $form_state->setErrorByName('friend_email', t('Enter a valid email address.'));
    }
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      $this->messenger()->addMessage($key . ': ' . $value);
    }
    $params = [
      'values' => $form_state->getValues(),
    ];
    // The 'plugin.manager.mail' service is the one to use for $mailManager.
    $mailManager = \Drupal::service('plugin.manager.mail');
    $mailManager->mail('event_form', 'event_form_submit', 'darkop@xgate.io', 'en', $params);
//  $this->mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
    return $form;
  }
}
