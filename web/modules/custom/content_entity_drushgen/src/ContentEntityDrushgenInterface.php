<?php

namespace Drupal\content_entity_drushgen;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a content entity drushgen entity type.
 */
interface ContentEntityDrushgenInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
