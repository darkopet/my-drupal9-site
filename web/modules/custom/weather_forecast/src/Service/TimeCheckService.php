<?php

namespace Drupal\weather_forecast\Service;

class TimeCheckService {

  public function eventStart() {
    $type = \Drupal::routeMatch()->getParameter('node')->get('type')->getValue()[0]['target_id'];
    if($type == 'event') {
      $startTime = \Drupal::routeMatch()->getParameter('node')->get('field_start_end_date')->getValue()[0]['value'];
      $startDate = substr(($startTime), 0, strpos($startTime, "T"));
    }
    return $startDate;
  }
  public function eventEnd() {
    $type = \Drupal::routeMatch()->getParameter('node')->get('type')->getValue()[0]['target_id'];
    if($type == 'event') {
      $endTime = \Drupal::routeMatch()->getParameter('node')->get('field_start_end_date')->getValue()[0]['end_value'];
      $endDate = substr(($endTime), 0, strpos($endTime, "T"));
    }
    return $endDate;
  }
}
