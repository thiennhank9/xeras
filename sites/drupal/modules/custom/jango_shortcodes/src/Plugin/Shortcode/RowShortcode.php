<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "row",
 *   title = @Translation("Row for columns"),
 *   description = @Translation("Row bootstrap tag"),
 *   child_shortcode = "col",
 *   icon = "fa fa-th-large",
 *   process_backend_callback = "_nd_visualshortcodes_backend_element",
 * )
 */

class RowShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = 'row ' . (isset($attrs['class']) ? $attrs['class'] : '');
    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) .'>' . $text . '</div>';
  }
}
