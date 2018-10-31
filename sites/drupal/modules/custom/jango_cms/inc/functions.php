<?php

/**
 * @return mixed
 */
function drupal_get_title() {
  $request = \Drupal::request();
  $route_match = \Drupal::routeMatch();
  return \Drupal::service('title_resolver')->getTitle($request, $route_match->getRouteObject());
}
