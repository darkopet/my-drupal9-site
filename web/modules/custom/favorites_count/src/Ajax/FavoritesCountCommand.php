<?php

namespace Drupal\favorites_count\Ajax;

use Drupal\Core\Ajax\CommandInterface;

/**
 * Class ExampleCommand.
 */
class FavoritesCountCommandCommand implements CommandInterface {

  protected $message;

  public function __construct($message) {
    $this->message = $message;
  }

  /**
   * Render custom ajax command.
   *
   * @return ajax
   *   Command function.
   */
  public function render() {
    return [
      'command' => 'favorites_count',
      'message' => $this->message,
    ];
  }
}
