<?php

namespace Drupal\content_entity_reviews;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a Reviews entity.
 * @ingroup content_entity_reviews
 */

interface ReviewsInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface{

}

//  Good practice: to provide an interface for definition of the public access to the entity.
//  It invokes the 'EntityOwnerInterface' to get access to additional functionality.
