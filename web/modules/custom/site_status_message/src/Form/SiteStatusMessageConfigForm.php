<?php

/**
 * @file
 * Contains Drupal\site_status_message\Form\SiteStatusMessageConfigForm.
 */

namespace Drupal\site_status_message\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\State\State;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SiteStatusMessageConfigForm extends ConfigFormBase {
  /**
   * @var State
   */
  protected $state;
  /**
   * Constructor method.
   *
   * @param State $state
   *  The object State.
   */
  public function __construct($state) {
    $this->state = $state;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('state')
    );
  }
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
    $form['site_status_message_type'] = [
      '#type' => 'select',
      '#title' => $this->t('Type:'),
      '#options' => [
        'status' => $this->t('- Select status -'),
        'warning' => $this->t('Warning'),
        'error' => $this->t('Error'),
        'info' => $this->t('Information'),
        'tba' => $this->t('To Be Announced'),
      ],
      '#default_value' => $config->get('site_status_message_type'),
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
    ->set('site_status_message_type', $form_state->getValue('site_status_message_type'))
    ->save();
    $this->state->set('site_status', [
      'message' => $form_state->getValue('site_status_message'),
      'type' =>  $form_state->getValue('site_status_message_type')
      ]
    );
  }
}
