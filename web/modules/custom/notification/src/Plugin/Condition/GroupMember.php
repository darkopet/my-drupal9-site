<?php

namespace Drupal\notification\Plugin\Condition;

use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\ResettableStackedRouteMatchInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;


/**
 * Provides a condition for members of the current group.
 *
 * This condition evaluates to TRUE when in a group context, and the current
 * user is a member of the group. When the condition is negated, the condition
 * is shown when either not in group context, or in group context but the
 * current user is not a member of the group.
 *
 * @Condition(
 *   id = "group_member",
 *   label = @Translation("Display Notifications"),
 * )
 */
class GroupMember extends ConditionPluginBase implements ContainerFactoryPluginInterface {

  /**
   * The current route match service.
   *
   * @var \Drupal\Core\Routing\ResettableStackedRouteMatchInterface
   */
  protected $currentRouteMatch;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * Creates a new PodcastType instance.
   *
   * @param array $configuration
   *   The plugin configuration.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Session\AccountProxyInterface $currentUser
   *   The current user.
   */
  public function __construct(
    array $configuration,
          $plugin_id,
          $plugin_definition,
    AccountProxyInterface $currentUser,
    EntityTypeManagerInterface $entityTypeManager
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentUser = $currentUser;
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    // Set the default value for the checkbox on the block configuration page.
    // This condition is not be enabled by default, so the default is set to
    // zero.
    return ['show' => 0] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    // Define the checkbox to enable the condition.
    $form['show'] = [
      '#title' => $this->t('Display only when user has notifications enabled'),
      '#type' => 'checkbox',
      // Use whatever value is stored in cofiguration as the default.
      '#default_value' => $this->configuration['show'],
      '#description' => '',
    ];

    return parent::buildConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    // Save the submitted value to configuration.
    $this->configuration['show'] = $form_state->getValue('show');

    parent::submitConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function summary() {
    if ($this->configuration['show']) {
      if ($this->isNegated()) {
        // The condition is enabled and negated.
        return $this->t('Do Not Limit Notifications');
      }
      else {
        return $this->t('Show Notifications Block.');
      }
    }
    return $this->t('Not Restricted');
  }

  /**
   * {@inheritdoc}
   */
  public function evaluate() {
    $userId = $this->currentUser->id();
    $user = $this->entityTypeManager->getStorage('user')->load($userId);
    $showNotification = $user->get('field_notify_me_about_new_events')->getValue()[0]['value'];

    if($showNotification){
      return TRUE;
    }

      return FALSE;

  }
}