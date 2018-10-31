<?php

namespace Drupal\jango_shortcodes\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
//    if ($route = $collection->get('entity.commerce_payment_method.collection')) {
//      $uid = \Drupal\user\Entity\User::load(1)->id();
      // @todo Can't load current user. Gives Anonymous under Admin account.
//      $uid = \Drupal::currentUser()->id();
//      $route->setPath('/user/' . $uid . '/orders');
//    }

// Always deny access to '/user/logout'.
// Note that the second parameter of setRequirement() is a string.
//    if ($route = $collection->get('user.logout')) {
//      $route->setRequirement('_access', 'FALSE');
//    }
  }
}
