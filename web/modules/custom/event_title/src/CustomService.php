<?php

namespace Drupal\event_title;

use Drupal\Core\Controller\TitleResolver;

/**
 * Class CustomService
 * @package Drupal\event_title\Services
 */

class CustomService {

  protected TitleResolver $getTitle;

  /**
   * CustomService constructor.
   * @param TitleResolver $getTitle
   */
  public function __construct(TitleResolver $getTitle) {
//    dd($getTitle);
    $this->getTitle = $getTitle;
  }

  public function titleCase(&$variables):string {
    $node = $variables['node'];
//  dd($node);
    $title = $node->get('title')->getValue()[0]['value'];
//  dd($title);
    if ($node->get('type')->getValue()[0]['target_id'] === 'event') {
      $smallwordsarray = ['of','a','the','and','an','or','nor','but','is','if','then','else','when',
        'at','from','by','on','off','for','in','out','over','to','into','with','so',
        'yet','both', 'much','though', 'why', 'what', 'until', 'while', 'even', 'as'
      ];
      $words = explode(' ', $title);
      foreach ($words as $key => $word) {
        if (!$key or !in_array($word, $smallwordsarray))
          $words[$key] = ucwords($word);
      }
      $newtitle = implode(' ', $words);
    }
//  dd($newtitle);
    return $newtitle;
  }

}
