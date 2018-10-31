<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_dividers",
 *   title = @Translation("Divider"),
 *   description = @Translation("Divider."),
 *   icon = "fa fa-h-square",
 *   description_field = "title",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class DividerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $icon = isset($attrs['icon']) ? $attrs['icon'] . ' c-font-' . $attrs['font_color'] : '';
    $title_icon = isset($attrs['icon']) ? 'c-icon-bg' : '';

    $output  = '<div class="c-content-divider ' . $title_icon . ' ' . $attrs['label_align'] . ' c-bg-' . $attrs['line_color'] . ' ' . $attrs['divider_size'] . '">';
    $output .= '<i class="' . $icon . ' ' . $attrs['divider_type'] . ' c-bg-' . $attrs['color_icon'] . '"></i>';
    $output .= '</div>';

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['icon'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>'
    ];
    $dividers_type = [
      'icon-dot' => 'Type dot',
      'icon-dot c-square' => 'Type square',
    ];
    $form['divider_type'] = [
      '#title' => t('Divider type'),
      '#type' => 'select',
      '#options' => $dividers_type,
      '#default_value' => isset($attrs['divider_type']) ? $attrs['divider_type'] : 'icon-dot',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $bg_colors = [
      'white' => t('White'),
      'green' => t('Green'),
      'blue' => t('Blue'),
      'red' => t('Red'),
      'yellow' => t('Yellow'),
      'purple' => t('Purple'),
      'gray' => t('Gray'),
      'dark' => t('Dark'),
    ];
    $text_align = [
      'c-left' => t('Left'),
      'c-right' => t('Right'),
      'center' => t('Center'),
    ];
    $text_size = [
      'c-divider' => t('Default'),
      'c-divider-sm' => t('Small'),
    ];
    $form['divider_size'] = [
      '#title' => t('Dividers size'),
      '#type' => 'select',
      '#options' => $text_size,
      '#default_value' => isset($attrs['divider_size']) ? $attrs['divider_size'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['label_align'] = [
      '#title' => t('Text Align'),
      '#type' => 'select',
      '#options' => $text_align,
      '#default_value' => isset($attrs['label_align']) ? $attrs['label_align'] : 'c-left',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['font_color'] = [
      '#title' => t('Icon color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['font_color']) ? $attrs['font_color'] : 'white',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['line_color'] = [
      '#title' => t('Line color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['line_color']) ? $attrs['line_color'] : 'green',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['color_icon'] = [
      '#title' => t('Background color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['color_icon']) ? $attrs['color_icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
