<?php

/**
 * @file
 * Contains Drupal\star_rating\Form\StarRatingForm.
 */

namespace Drupal\star_rating\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\State\State;
use Symfony\Component\DependencyInjection\ContainerInterface;

class StarRatingForm extends ConfigFormBase {
  /**
   * @var State
   */
  protected $state;
  /**
   * Constructor method.
   *
   * @param State $state
   *  The object State.
   */
  public function __construct($state) {
    $this->state = $state;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('state')
    );
  }
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'star_rating',
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'star_rating.form';
  }
}
