<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_div",
 *   title = @Translation("DIV & BG Container"),
 *   description = @Translation("DIV tag"),
 *   icon = "fa fa-folder-o"
 * )
 */
class DivShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['data_height'] = isset($attrs['data_height']) ? $attrs['data_height'] : '';
    $attrs['class'] = isset($attrs['bg_color']) ? $attrs['bg_color'] . ' ' : '';
    $attrs['class'] .= isset($attrs['vertical_align']) && $attrs['vertical_align'] ? 'home-text ' : '';
    $attrs['class'] .= isset($attrs['bg_full_width']) && $attrs['bg_full_width'] ? 'bg-full-width ' : '';

    if (isset($attrs['vertical_align']) && $attrs['vertical_align']) {
      $text = '<div class="home-content">' . $text . '</div>';
    }
    $attributes = (isset($attrs['vertical_align']) && $attrs['vertical_align']) ? 'class="home-content"' : _jango_shortcodes_shortcode_attributes($attrs);
    $text = '<div ' . $attributes . '>' . $text . '</div>';

    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['vertical_align'] = [
      '#title' => t('Vertical Align'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['vertical_align']) ? $attrs['vertical_align'] : FALSE,
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
    ];
    $auto_height = [
      '' => t('Default'),
      'true' => t('True'),
      'False' => t('False')
    ];
    $form['data_height'] = [
      '#title' => t('Auto height'),
      '#type' => 'select',
      '#options' => $auto_height,
      '#default_value' => isset($attrs['data_height']) ? $attrs['data_height'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-4">',
    ];
    $bg_colors = [
      ' ' => t('None'),
      'c-bg-white' => t('White'),
      'c-bg-blue' => t('Blue'),
      'c-bg-red' => t('Red'),
      'c-bg-green' => t('Green'),
      'c-bg-yellow' => t('Yellow'),
      'c-bg-purple' => t('Purple'),
      'c-bg-purple-1' => t('Purple Light'),
      'c-bg-black' => t('Black'),
      'c-bg-dark' => t('Dark'),
      'c-bg-grey' => t('Grey'),
      'c-bg-grey-1' => t('Grey Light'),
      'c-bg-theme' => t('Theme Color'),
    ];
    $form['bg_color'] = [
      '#title' => t('Background Color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['bg_color']) ? $attrs['bg_color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    $form['bg_full_width'] = [
      '#title' => t('Force FullWidth Background'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['bg_full_width']) ? $attrs['bg_full_width'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    return $form;
  }
}
