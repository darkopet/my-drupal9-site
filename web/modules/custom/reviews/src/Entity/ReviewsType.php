<?php

namespace Drupal\reviews\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Reviews type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "reviews_type",
 *   label = @Translation("Reviews type"),
 *   label_collection = @Translation("Reviews types"),
 *   label_singular = @Translation("reviews type"),
 *   label_plural = @Translation("reviewss types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count reviewss type",
 *     plural = "@count reviewss types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\reviews\Form\ReviewsTypeForm",
 *       "edit" = "Drupal\reviews\Form\ReviewsTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\reviews\ReviewsTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer reviews types",
 *   bundle_of = "reviews",
 *   config_prefix = "reviews_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/reviews_types/add",
 *     "edit-form" = "/admin/structure/reviews_types/manage/{reviews_type}",
 *     "delete-form" = "/admin/structure/reviews_types/manage/{reviews_type}/delete",
 *     "collection" = "/admin/structure/reviews_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class ReviewsType extends ConfigEntityBundleBase {

  /**
   * The machine name of this reviews type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the reviews type.
   *
   * @var string
   */
  protected $label;

}
