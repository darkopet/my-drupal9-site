<?php

namespace Drupal\field_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Link;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityRepositoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceFormatterBase;
use Drupal\file\Entity\File;

/**
 * Plugin implementation of the Entity Reference formatter.
 *
 * @FieldFormatter(
 *   id = "field_formatter",
 *   label = @Translation("Title and Icon"),
 *   weight = "11",
 *   field_types = {
 *     "entity_reference",
 *   },
 * )
 */
class FieldFormatter extends EntityReferenceFormatterBase
{

  /**
   * The entity field manager.
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;


  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The entity repository.
   *
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  /**
   * The image style entity storage.
   *
   * @var \Drupal\image\ImageStyleStorageInterface
   */
  protected $imageStyleStorage;

  /**
   * Constructs an ImageFormatter object.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Any third party settings settings.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   * @param \Drupal\Core\Entity\EntityStorageInterface $image_style_storage
   *   The image style storage.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings,EntityRepositoryInterface $entity_repository,  EntityFieldManagerInterface $entity_field_manager, AccountInterface $current_user, EntityStorageInterface $image_style_storage) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
    $this->currentUser = $current_user;
    $this->imageStyleStorage = $image_style_storage;
    $this->entityFieldManager = $entity_field_manager;
    $this->entityRepository = $entity_repository;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('current_user'),
      $container->get('entity.repository'),
      $container->get('entity_type.manager')->getStorage('image_style'),
      $container->get('entity_field.manager'),
    );
  }

  public function viewElements(FieldItemListInterface $items, $langcode)
  {

    $element = [];
    foreach ($this->getEntitiesToView($items, $langcode) as $delta => $entity) {

      $image_style_setting = $this->getSetting('image_style');
      $name = $entity->getName();
      $element[$delta]['#theme'] = 'field_formatter';

      if ( ( $entity->get('field_event_taxonomy_image')->getValue()) == []) {
        $entity_type_id = 'taxonomy_term';
        $bundle = 'equipment';
        $my_bundle_fields = $this->entityFieldManager
          ->getFieldDefinitions($entity_type_id, $bundle);
        $image_uuid = $my_bundle_fields['field_event_taxonomy_image']->getSetting('default_image')['uuid'];
        $img = $this->entityRepository->loadEntityByUuid('file', $image_uuid);
        $image_uri = $img->getFileUri();
        $image_uri = str_replace('public://', '', $image_uri);

        $element[$delta]['#image_style'] =  $image_style_setting;
        $element[$delta]['#alt'] = 'default';
        $element[$delta]['#item'] = $name;
        $element[$delta]['#url'] =  $image_uri ;

      } else {

        $image = $entity->get('field_event_taxonomy_image')->getValue()[0];
        $element[$delta]['#item'] = $name;
        $element[$delta]['#image_style'] =  $image_style_setting;
        $image_id = $image['target_id'];
        $image_alt = $image['alt'];
        $uri = File::load($image_id)->getFileUri();
        $uri = str_replace('public://', '', $uri);
        $element[$delta]['#url'] = $uri;
        $element[$delta]['#alt'] = $image_alt;


      }
      return $element;
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
        'image_style' => '',
      ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $image_styles = image_style_options(FALSE);

    $description_link = Link::fromTextAndUrl(
      $this->t('Configure Image Styles'),
      Url::fromRoute('entity.image_style.collection')
    );

    $form['image_style'] = [
      '#title' => t('Image style'),
      '#type' => 'select',
      '#default_value' => $this->getSetting('image_style'),
      '#empty_option' => t('None (original image)'),
      '#options' => $image_styles,
      '#description' => $description_link->toRenderable() + [
          '#access' => $this->currentUser->hasPermission('administer image styles'),
        ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];

    $image_styles = image_style_options(FALSE);
    unset($image_styles['']);
    $image_style_setting = $this->getSetting('image_style');
    if (isset($image_styles[$image_style_setting])) {
      $summary[] = t('Image style: @style', ['@style' => $image_styles[$image_style_setting]]);
    }
    else {
      $summary[] = t('Original image');
    }
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
}
