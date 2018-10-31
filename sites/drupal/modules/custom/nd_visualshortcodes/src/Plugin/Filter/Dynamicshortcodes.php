<?php

/**
 * @file
 * Contains \Drupal\php\Plugin\Filter\Dynamicshortcodes.
 */

namespace Drupal\nd_visualshortcodes\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Provides PHP code filter. Use with care.
 *
 * @Filter(
 *   id = "dynamicshortcodes",
 *   module = "nd_visualshortcodes",
 *   title = @Translation("Dynamic Shortcodes"),
 *   description = @Translation("Shortcodes which shouldn't be cached."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 *   cache = FALSE
 * )
 */
class Dynamicshortcodes extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    return new FilterProcessResult($text);
  }

}
