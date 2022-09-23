<?php

namespace Drupal\review\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Review type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "review_type",
 *   label = @Translation("Review type"),
 *   label_collection = @Translation("Review types"),
 *   label_singular = @Translation("review type"),
 *   label_plural = @Translation("reviews types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count reviews type",
 *     plural = "@count reviews types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\review\Form\ReviewTypeForm",
 *       "edit" = "Drupal\review\Form\ReviewTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\review\ReviewTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer review types",
 *   bundle_of = "review",
 *   config_prefix = "review_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/review_types/add",
 *     "edit-form" = "/admin/structure/review_types/manage/{review_type}",
 *     "delete-form" = "/admin/structure/review_types/manage/{review_type}/delete",
 *     "collection" = "/admin/structure/review_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class ReviewType extends ConfigEntityBundleBase {

  /**
   * The machine name of this review type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the review type.
   *
   * @var string
   */
  protected $label;

}
