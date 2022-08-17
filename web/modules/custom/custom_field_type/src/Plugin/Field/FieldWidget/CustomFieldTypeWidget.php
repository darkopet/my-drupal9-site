<?php

namespace Drupal\custom_field_type\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

// Annotation of the class, field_type created previously is being specified
/**
 * Plugin implementation of the 'custom_field_type' widget.
 *
 * @FieldWidget(
 *   id = "custom_field_type",
 *   module = "custom_field_type",
 *   label = @Translation("Youtube Video URL"),
 *   field_types = {
 *    "custom_field_type"
 *   }
 * )
 */

class CustomFieldTypeWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  {
    // TODO: Implement formElement() method.
    // Creating a simple text field through the FormAPI where a YouTube video link will be entered.
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += array(
      '#type' => 'textfield',
      '#default_value' => $value,
      '#size' => 32,
      '#maxlength' => 256,
      '#element_validate' => array(
        array($this, 'validate'),
      ),
    );
    return array('value' => $element);
  }

  /**
   * Validate the color text field.
   */
  public function validate($element, FormStateInterface $form_state) {
    // Validation callback specified in #element_validate to ensure the user has entered the correct link to the video.
    $value = $element['#value'];
    if (strlen($value) == 0) {
      $form_state->setValueForElement($element, '');
      return;
    }
    if(!preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $value, $matches)) {
      $form_state->setError($element, t("Youtube video URL is not correct."));
    }
  }
}
