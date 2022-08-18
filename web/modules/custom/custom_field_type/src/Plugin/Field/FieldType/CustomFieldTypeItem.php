<?php

namespace Drupal\custom_field_type\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

// Creating a field type to tell Drupal what will be stored in the table for this field.
// An abstract for the custom field type for YouTube link and embed.
/**
 * Plugin implementation of the 'custom_field_type' field type.
 *
 * @FieldType(
 *   id = "custom_field_type",
 *   label = @Translation("Youtube Video Link & Embed."),
 *   module = "custom_field_type",
 *   description = @Translation("Output video from Youtube"),
 * )
 */


class CustomFieldTypeItem extends FieldItemBase {

 /**
  *  {@inheritdoc}
  */

  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    // TODO: Implement schema() method.
    // Defining to store the value field of the text type.
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ),
      ),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    // Fallback output with an empty result when an empty field in case of a call to the field from a third-party code.
    $value = $this->get('value')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    // TODO: Implement propertyDefinitions() method.
    // Describe the columns for MySQL table and entity object.
    $properties['value'] = DataDefinition::create('string')->setLabel(t('Youtube Video URL'));
    return $properties;
  }
}
