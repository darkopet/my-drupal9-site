<?php

/**
 * @file
 * Contains Drupal\welcome\Form\MessagesForm.
 */

namespace Drupal\welcome\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MessagesForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'welcome.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'welcome.form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Initializing the configuration variable named (labeled) $config
    // Loads the admin settings using the configuration name of the module welcome.adminsettings
    $config = $this->config('welcome.adminsettings');							// retrieving the configuration

    // This form has one element called welcome_message_textarea
    // The default value is returned from the configuration object. get() method is being called with the name of the property to get (welcome_message).
    $form['welcome_message'] = [
      '#type' => 'textarea',
      // The title and description are displayed when the form is being viewed.
      '#title' => $this->t('Welcome message'),
      '#description' => $this->t('Welcome message display to users when they login'),
      '#default_value' => $config->get('welcome_message'),						// getting the configuration settings
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Saving the data when the form is submitted.
    parent::submitForm($form, $form_state);

    // $this is admin settings form class MessagesForm
    // -> is an object operator
    // config('welcome.adminsettings') is the name of the configuration of the module
    // the rest is setting 'welcome_message', getting the values form the form state, saving the form data

    $this->config('welcome.adminsettings')						// retrieve the configuration
    ->set('welcome_message', $form_state->getValue('welcome_message'))		// set the configuration setting
    ->save();								// saving the form data
  }
}
