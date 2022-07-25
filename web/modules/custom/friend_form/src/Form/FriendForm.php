<?php
/**
 * @file
 * Contains \Drupal\friend_form\Form\FriendForm.
 */
namespace Drupal\friend_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormInterface;

class friendForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'friend_form_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['message_title'] = array(
      '#type' => 'textfield',
      '#title' => t('Message Title:'),
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
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $value = $form_state->getValue('friend_email');

    if (!\Drupal::service('email.validator')->isValid($value)) {
      $form_state->setErrorByName('friend_email', t('Enter a valid email address.'));
    }
  }
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . $value);
    }
    return $form;
  }
}
