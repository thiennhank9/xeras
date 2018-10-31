<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_container",
 *   title = @Translation("Container 1170px"),
 *   description = @Translation("Bootstrap container"),
 *   icon = "fa fa-hdd-o",
 * )
 */
class ContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = 'container ' . (isset($attrs['class']) ? $attrs['class'] : '');
    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) .'>' . $text . '</div>';
  }
}
