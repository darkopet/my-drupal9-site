<?php

/**
 * @file
 * Contains Drupal\site_status_message\Form\SiteStatusMessageConfigForm.
 */

namespace Drupal\site_status_message\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SiteStatusMessageConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'site_status_message.adminsettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'site_status_message.form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('site_status_message.adminsettings');

    $form['site_status_message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Site Status message'),
      '#description' => $this->t('Site Status message display to users when they login'),
      '#default_value' => $config->get('site_status_message'),
    ];
    $form['site_status_message_settings'] = [
      '#type' => 'select',
      '#title' => $this->t('Settings:'),
      '#options' => [
        'status' => $this->t('Status'),
        'warning' => $this->t('Warning'),
        'error' => $this->t('Error'),
        'info' => $this->t('Information'),
        'tba' => $this->t('To Be Announced'),
      ],
      '#default_value' => $config->get('site_status_message_settings'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('site_status_message.adminsettings')
    ->set('site_status_message', $form_state->getValue('site_status_message'))
    ->set('site_status_settings', $form_state->getValue('site_status_settings'))
      ->save();
  }
}
