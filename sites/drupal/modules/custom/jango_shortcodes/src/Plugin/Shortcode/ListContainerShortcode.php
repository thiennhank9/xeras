<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_ul_list",
 *   title = @Translation("List container"),
 *   description = @Translation("List for any content."),
 *   icon = "fa fa-list",
 *   description_field = "type",
 *   child_shortcode = "nd_ul_list_item",
 * )
 */

class ListContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    $color = (isset($attrs['list_color']) ? 'c-theme ' : '');

    switch ($attrs['ullist_type']) {
      case 'dot' :
        $attrs['class'] .= 'c-content-list-1 ' . $color . 'c-separator-dot';
        $text = '<ul ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</ul>';
        break;

      case 'square' :
        $attrs['class'] .= 'c-content-list-1 ' . $color . ' c-separator-dot c-square';
        $text = '<ul ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</ul>';
        break;

      default:
        $attrs['class'] .= 'c-content-list-1 ' . $color;
        $text = '<ul ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</ul>';
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $types = [
      ' ' => t('Default'),
      'dot' => t('Dot'),
      'square' => t('Square'),
    ];
    $form['ullist_type'] = [
      '#type' => 'select',
      '#options' => $types,
      '#title' => t('List Type'),
      '#default_value' => isset($attrs['ullist_type']) ? $attrs['ullist_type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $colors = ['' => t('Default'), 'multi' => t('Colored')];
    $form['list_color'] = [
      '#type' => 'select',
      '#options' => $colors,
      '#title' => t('Color'),
      '#default_value' => isset($attrs['list_color']) ? $attrs['list_color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
