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
 * There are many more properties to be used in an entity
 */

class Reviews {

}

// This file defines the Reviews entity class.
// The database schema is automatically determined:
// - from the definition of the base fields
// - corresponding tables are set up in the database during installation of the module

