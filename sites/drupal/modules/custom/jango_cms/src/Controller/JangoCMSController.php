<?php

namespace Drupal\jango_cms\Controller;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;

/**
 * Controller routines for page example routes.
 */
class JangoCMSController extends ControllerBase {

  /**
   * @param $type
   * @return array
   */
  public function home_variants($type) {
    $site_config = \Drupal::config('system.site');
    $front_page_args = explode('/', $site_config->get('page.front'));  // "/node/170"
    $nid = isset($front_page_args[2]) && is_numeric($front_page_args[2]) ? $front_page_args[2] : 0;
    $node = Node::load($nid);
    return node_view($node);
  }

  /**
   * @param $type
   * @return array
   */
  public function onepage_variants($type) {
    $node = Node::load(156);
    return node_view($node);
  }

  public function save_variable() {
    if (isset($_POST['variable']) && isset($_POST['variable_key'])) {
      $variable = \Drupal::config('jango_cms.settings')->get($_POST['variable']);
      // If value is not set - remove this
      if (!isset($_POST['value']) && isset($_POST['variable_key'])) {
        unset($variable[$_POST['variable_key']]);
      }
      elseif (isset($_POST['variable_key'])) {
        $variable[$_POST['variable_key']] = $_POST['value'];
      }
      else {
        $variable = $_POST['value'];
      }
      \Drupal::configFactory()
        ->getEditable('jango_cms.settings')
        ->set($_POST['variable'], $variable)
        ->save();
    }
    throw new BadRequestHttpException();
  }

  /**
   * @param \Drupal\node\NodeInterface $node
   * @return array
   */
  public function view_mode_teaser(NodeInterface $node) {
    return node_view($node);
  }
}
