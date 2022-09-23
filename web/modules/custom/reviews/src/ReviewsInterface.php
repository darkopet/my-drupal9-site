<?php

namespace Drupal\reviews;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a reviews entity type.
 */
interface ReviewsInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
