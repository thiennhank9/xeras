<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_ul_list_item",
 *   title = @Translation("List item"),
 *   description = @Translation("List item."),
 *   icon = "fa fa-li",
 * )
 */

class ListItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    $attrs['class'] .= isset($attrs['list_item_color']) ? $attrs['list_item_color'] : '';
    return '<li ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</li>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $colors = [
      '' => t('Default'),
      'c-bg-before-red' => t('Red'),
      'c-bg-before-blue' => t('Blue'),
      'c-bg-before-green' => t('Green'),
      'c-bg-before-purple' => t('Purple'),
      'c-bg-before-yellow' => t('Yellow'),
    ];
    $form['list_item_color'] = [
      '#type' => 'select',
      '#options' => $colors,
      '#title' => t('Color'),
      '#default_value' => isset($attrs['list_item_color']) ? $attrs['list_item_color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
