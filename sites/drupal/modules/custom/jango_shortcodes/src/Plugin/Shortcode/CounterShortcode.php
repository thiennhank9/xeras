<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_counter",
 *   title = @Translation("Counter item"),
 *   description = @Translation("Counter item. Jango components."),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-sort-numeric-asc"
 * )
 */
class CounterShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $border = isset($attrs['radius_bold']) && $attrs['radius_bold'] ? 'c-bordered' : 'c-theme-border';
    $text_bold = isset($attrs['font_bold']) && $attrs['font_bold'] ? ' c-font-bold' : '';

    $theme_array = [
      '#theme' => 'jango_shortcodes_counter',
      '#text_bold' => $text_bold,
      '#background_color' => $attrs['background_color'],
      '#border_color' => $attrs['border_color'],
      '#border' => $border,
      '#font_color' => $attrs['font_color'],
      '#count' => $attrs['count'],
      '#text' => $text,
    ];
    $text = $this->render($theme_array);
    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="col-md-4">' . $text . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['count'] = [
      '#type' => 'textfield',
      '#title' => t('Count'),
      '#default_value' => isset($attrs['count']) ? $attrs['count'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $font_colors = [
      'c-font-white' => t('White'),
      'c-font-blue' => t('Blue'),
      'c-font-red' => t('Red'),
      'c-font-green' => t('Green'),
      'c-font-yellow' => t('Yellow'),
      'c-font-purple' => t('Purple'),
      'c-font-black' => t('Black'),
    ];
    $form['font_color'] = [
      '#type' => 'select',
      '#options' => $font_colors,
      '#title' => t('Font color'),
      '#default_value' => isset($attrs['font_color']) ? $attrs['font_color'] : 'c-font-white',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $bg_colors = [
      ' ' => t('None'),
      'c-bg-white' => t('White'),
      'c-bg-blue' => t('Blue'),
      'c-bg-red' => t('Red'),
      'c-bg-green' => t('Green'),
      'c-bg-yellow' => t('Yellow'),
      'c-bg-purple' => t('Purple'),
      'c-bg-black' => t('Black'),
    ];
    $form['background_color'] = [
      '#type' => 'select',
      '#title' => t('Background Color'),
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['background_color']) ? $attrs['background_color'] : ' ',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $border_colors = [
      'c-border-blue' => t('Blue'),
      'c-border-red' => t('Red'),
      'c-border-green' => t('Green'),
      'c-border-yellow' => t('Yellow'),
      'c-border-purple' => t('Purple'),
      'c-border-black' => t('Black'),
    ];
    $form['border_color'] = [
      '#type' => 'select',
      '#title' => t('Border Color'),
      '#options' => $border_colors,
      '#default_value' => isset($attrs['border_color']) ? $attrs['border_color'] : 'c-border-blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $form['radius_bold'] = [
      '#type' => 'checkbox',
      '#title' => t('Radius bold'),
      '#default_value' => isset($attrs['radius_bold']) ? $attrs['radius_bold'] : FALSE,
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div></div>',
    ];
    $form['font_bold'] = [
      '#type' => 'checkbox',
      '#title' => t('Font bold'),
      '#default_value' => isset($attrs['font_bold']) ? $attrs['font_bold'] : FALSE,
      '#prefix' => '<div class="row"><div class = "col-sm-2">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
