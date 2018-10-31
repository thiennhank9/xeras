<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_counters",
 *   title = @Translation("Counter container"),
 *   description = @Translation("Counters container. Jango components."),
 *   icon = "fa fa-tasks",
 *   description_field = "title",
 *   child_shortcode = "nd_counter",
 * )
 */

class CounterContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-counter-1 c-opt-1">';
    $output .= '<div class="row">' . $text . '</div>';
    $output .= '</div>';
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];

    return $form;
  }
}
