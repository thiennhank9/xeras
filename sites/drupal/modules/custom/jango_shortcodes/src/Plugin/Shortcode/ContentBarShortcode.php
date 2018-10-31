<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_content_bar",
 *   title = @Translation("Content bar"),
 *   description = @Translation("Content bar."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class ContentBarShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $theme_array = [
      '#theme' => 'jango_shortcodes_content_bar',
      '#text' => $text,
    ];
    return $this->render($theme_array);
  }
}
