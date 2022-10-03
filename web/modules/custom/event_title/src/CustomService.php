<?php

namespace Drupal\event_title;

use Drupal\node\NodeInterface;

/**
 * Class CustomService
 * @package Drupal\event_title\Services
 */

class CustomService {

  protected $eventTitle;

  /**
   * CustomService constructor.
   * @param NodeInterface $eventTitle
   */
  public function __construct(NodeInterface $eventTitle)
  {
    $this->eventTitle->getValue();
  }

  /**
   * @return Drupal\Component\Render\MarkupInterface|string
   */
  /**
   * @return NodeInterface
   */
  public function getData() {
    return $this->eventTitle->get();
  }

}
