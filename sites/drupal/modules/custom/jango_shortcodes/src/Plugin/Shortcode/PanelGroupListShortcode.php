<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_panel_group_list",
 *   title = @Translation("Panel group list"),
 *   description = @Translation("List for panel."),
 *   icon = "fa fa-list",
 *   description_field = "type",
 *   child_shortcode = "nd_panel_group_list_item",
 * )
 */

class PanelGroupListShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    $attrs['class'] .= 'list-group';
    return '<ul ' . _jango_shortcodes_shortcode_attributes($attrs) . '">' . $text . '</ul>';
  }
}
