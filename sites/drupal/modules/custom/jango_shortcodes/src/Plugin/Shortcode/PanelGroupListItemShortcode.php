<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_panel_group_list_item",
 *   title = @Translation("Panel group list item"),
 *   description = @Translation("'Panel group list item."),
 *   icon = "fa fa-li",
 * )
 */

class PanelGroupListItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    $attrs['class'] .= 'list-group-item';
    return '<li ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</li>';
  }
}
