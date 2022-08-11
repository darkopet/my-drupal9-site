<?php

namespace Drupal\favorites_count\Controller;

use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Session\AccountProxy;
use Drupal\flag\FlagCountManagerInterface;
use Drupal\flag\FlagService;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 *
 * Controller for getting current number of flags
 *
 */
class FavoritesCountController extends ControllerBase implements ContainerInjectionInterface{

  /**
   * Drupal\flag\FlagService definition.
   *
   * @var \Drupal\flag\FlagService
   */
  protected $flag;

  /**
   * Drupal\flag\FlagCountManagerInterface definition.
   *
   * @var \Drupal\flag\FlagCountManagerInterface
   */
  protected $flagCount;

  /**
   * Drupal\Core\Session\AccountProxy definition.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $accountProxy;


  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('flag'),
      $container->get('flag.count'),
      $container->get('current_user'),
    );
  }

  /**
   * Constructs a CountController object
   * @param FlagService $flag
   * @param FlagCountManagerInterface $flagCount
   * @param AccountProxy $accountProxy
   */

  public function __construct(
    FlagService $flag,
    FlagCountManagerInterface $flagCount,
    AccountProxy $accountProxy)
  {
    $this->flag = $flag;
    $this->flagCount = $flagCount;
    $this->accountProxy = $accountProxy;
  }

  /**
   * {@inheritdoc}
   */

  public function count(): Response
  {
    $currentUser = $this->accountProxy->getAccount();
    $favoriteFlag =  $this->flag->getFlagById('bookmark');
    $countFlag = $this->flagCount->getUserFlagFlaggingCount($favoriteFlag,$currentUser);

    return new Response($countFlag);
  }
}
