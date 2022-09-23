<?php

namespace Drupal\content_entity_reviews\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\content_entity_reviews\ReviewsInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Reviews entity.
 *
 * @ingroup content_entity_reviews
 *
 * This is the main definition of the entity type Reviews.
 * From it, an entityType is derived.
 * The most important properties in this example are listed below.
 *
 * id: The unique identifier of this entityType. Follows the pattern 'moduleName_xyz' to avoid naming conflicts.
 * label: Human readable name of the entity type.
 * handlers: Handler classes called handlers are used for different tasks. You can use standard handlers provided by Drupal or build custom ones derived from them.
 *
 * In detail:
 * - view_builder: we use the standard controller to view an instance.
 *   It is called when a route lists '_entity_view' default for the entityType (.routing.yml for details)
 *   The view can be manipulated by using the standard Drupal tools in the settings.
 *
 * - list_builder: we derive our own list builder class from the entityListBuilder to control the presentation.
 *   If there is a view available for this entity from the views module, it overrides the list builder. @todo view? naming convention?
 *
 * - form: we derive our own forms to add functionality like additional fields, redirects, etc.
 *   This forms are called when the routing list an '_entity_form' default for the entityType.
 *   Depending on the suffix (.add/.edit/.delete) in the route, the correct form is called.
 *
 * - access: our own accessController where we determine access rights based on permissions
 *
 * More properties:
 * - base_table: define the name of the table used to store the data. Make sure it is unique.
 *   The schema is automatically determined from the BaseFieldDefinitions below.
 *   The table is automatically created during installation.
 *
 * - fieldable: can additional fields be added via the graphic user interface GUI? Analog to content types.
 *
 * - entity_keys: how to access the fields. Analog to 'nid' or 'uid'.
 *
 * - links: provide links to do standard tasks. The 'edit-form' and 'delete-form' links are added to list built by entityListController.
 *   They will show up as action buttons in an additional column.
 *
 * There are many more properties to be used in an entity type definition.
 * For a complete overview refer to the '\Drupal\Core\Entity\EntityType' class definition.
 *
 * @ContentEntityType (
 *   id = 'content_entity_reviews'
 *   label = @Translation ("Reviews entity"),
 *   handlers = {
 *    "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *    "list_builder" = "Drupal\content_entity_reviews\ReviewsListBuilder",
 *    "views_data" = "Drupal\views\EntityViewsData",
 *    "from" = {
 *      "add" = "Drupal\content_entity_reviews\ReviewsForm",
 *      "edit" = "Drupal\content_entity_reviews\ReviewsForm",
 *      "delete" = "Drupal\content_entity_reviews\ReviewsDeleteForm",
 *     },
 *    "access" = "Drupal\content_entity_reviews\ReviewsAccesssControllerHandler",
 *   },
 *  base_table = "contact",
 *  admin_permission = "administer reviews entity"
 *  fieldable = TRUE,
 *  entity_keys = {
 *   "id" = "id",
 *   "label" = "name",
 *   "uuid" = "uuid",
 *  links = {
 *   "canonical" = "/content_entity_reviews/{content_entity_reviews}",
 *   "edit-form" = "/content_entity_reviews/{content_entity_reviews}/edit",
 *   "delete-form" = "/reviews/{content_entity_reviews}/delete",
 *   "collection" = "/content_entity_reviews/list"
 *  },
 *  field_ui_base_route = "content_entity_reviews.reviews_settings",
 *)
 * The 'links' above are defined by their path.
 * For Drupal core to find the corresponding path, the route name must follow the correct pattern:
 *
 * entity.<entity_name>.<link_name>
 * Example: 'entity.content_entity_reviews.canonical'
 * See routing file above for the corresponding implementation.
 *
 * The 'Reviews' class defines methods and fields for the reviews entity.
 *
 * Being derived from the ContentEntityBase class, we can override the methods we want.
 * In our case we want to provide access to the standard fields about creation and changed time stamps.
 *
 * Our interface (ReviewsInterface) also exposes the EntityOwnerInterface.
 * This allows us to provide methods for setting and providing ownership information.
 *
 * The most important part is the definitions of the field properties for this entity type.
 * These are of the same type as fields added through the GUI, but they can be changed in code.
 * In the definition we can define if the user with the rights privileges can influence the presentation of each field.
 */


class Reviews extends ContentEntityBase implements ReviewsInterface {

  use EntityChangedTrait; // Implements methods defined by EntityChangedInterface.

  /**
   * {@inheritdoc}
   *
   * When a new entity instance is added, set the user_id entity reference to the curren user as the creator of the instance.
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += array(
      'user_id' => \Drupal::currentUser()->id(),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner()
  {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId()
  {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid)
  {
    $this->set('user_id',$uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account)
  {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   *
   * Define the field properties here.
   *
   * Field name, type, size determine the table structure.
   * In addition, we can define how the field and its content can be manipulated in the GUI.
   * The behaviour of the widgets used can be determined here.
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {
    // Standard field used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Reviews entity.'))
      ->setReadOnly(TRUE);

    // Standard field used as unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Reviews entity.'))
      ->setReadOnly(TRUE);

    // Name field for the review.
    // We set display options for the view as well as the form.
    // Users with correct privileges can change the views and edit configuration.
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Reviews entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['first_name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First Name'))
      ->setDescription(t('The first name of the Reviews entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -5,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -5,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


    // Gender field for the contact.
    // ListTextType with a drop down menu widget.
    // The values shown in the menu are 'male' and 'female'.
    // In the view the field content is shown as string.
    // In the form the choices are presented as options list.
    $fields['gender'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Gender'))
      ->setDescription(t('The gender of the Contact entity.'))
      ->setSettings(array(
        'allowed_values' => array(
          'female' => 'female',
          'male' => 'male',
        ),
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'list_default',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'options_select',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


    // Owner field of the review.
    // Entity reference field, holds the reference to the user object.
    // The view shows the user name field of the user.
    // The form presents a auto complete field for the user name.
    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User Name'))
      ->setDescription(t('The Name of the associated user.'))
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'entity_reference_label',
        'weight' => -3,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'entity_reference_autocomplete',
        'settings' => array(
          'match_operator' => 'CONTAINS',
          'size' => 60,
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ),
        'weight' => -3,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of Reviews entity.'));
    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }
}

// This file defines the Reviews entity class.
// The database schema is automatically determined:
// - from the definition of the base fields
// - corresponding tables are set up in the database during installation of the module

?>
