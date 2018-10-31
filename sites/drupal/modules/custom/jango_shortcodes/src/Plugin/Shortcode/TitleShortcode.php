<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_title",
 *   title = @Translation("Title"),
 *   description = @Translation("Title"),
 *   description_field = "title",
 *   icon = "fa fa-h-square",
 * )
 */
class TitleShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['icon_color'] = isset($attrs['icon_color']) && $attrs['icon_color'] ? $attrs['icon_color'] : 'blue';
    $attrs['icon'] = isset($attrs['icon']) && $attrs['icon'] ? $attrs['icon'] : '';
    $attrs['color'] = isset($attrs['color']) && $attrs['color'] ? $attrs['color'] : ' ';
    $attrs['size'] = isset($attrs['size']) && $attrs['size'] ? $attrs['size'] : ' ';
    $attrs['label_align'] = isset($attrs['label_align']) && $attrs['label_align'] ? $attrs['label_align'] : '';

    if (isset($attrs['underline']) && ($attrs['underline'] == 'c-line-center c-theme-bg' || $attrs['underline'] == 'c-line-left c-theme-bg' || $attrs['underline'] == 'c-line-right c-theme-bg')) {
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-title-1">';
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-content-title-3 c-theme-border') {
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-title-3 c-border-' . $attrs['bg_color'] . '">';
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-content-title-3 c-theme-border c-right') {
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-title-3 c-right c-border-' . $attrs['bg_color'] . '">';
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-content-title-4') {
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="' . $attrs['underline'] . '">';
      $attrs['color'] .= ' c-line-strike';
    }
    else {
      $class = !isset($attrs['underline']) || $attrs['underline'] == '' ? 1 : 2;
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-title-' . $class . '">';
    }

    $text .= '<h3 class="' . $attrs['label_align'] . ' c-font-uppercase ' . $attrs['color'] . ' c-font-bold ' . $attrs['size'] . '">';
    if (isset($attrs['icon']) && $attrs['icon']) {
      $text .= '<i class="' . $attrs['icon'] . ' ' . $attrs['icon_color'] . '"></i> ';
    }
    $text .= '<span class="title-wrap">' . restore_html_string($attrs['title']) . '</span></h3>';
    if (isset($attrs['description']) && $attrs['description'] != NULL) {
      $text .= '<p class="' . $attrs['label_align'] . ' c-font-uppercase c-font-17  ' . $attrs['color'] . '">' . $attrs['description'] . '</p>';
    }
    if (isset($attrs['underline']) && $attrs['underline'] && isset($attrs['bg_color']) && $attrs['bg_color']) {
      $text .= '<div class="' . $attrs['underline'] . ' c-bg-' . $attrs['bg_color'] . ' c-bg-after-' . $attrs['bg_color'] . '"></div>';
    }
    $text .= '</div>';

    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['title'] = [
      '#title' => t('Title'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['icon'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>'
    ];
    $color = [
      '' => t('Default'),
      'c-theme-font' => t('Theme Color'),
      'c-font-blue' => t('Blue'),
      'c-font-red' => t('Red'),
      'c-font-green' => t('Green'),
      'c-font-yellow' => t('Yellow'),
      'c-font-purple' => t('Purple'),
      'c-font-black' => t('Black'),
      'c-font-white' => t('White'),
      'c-font-grey' => t('Grey')
    ];
    $form['color'] = [
      '#title' => t('Font Color'),
      '#type' => 'select',
      '#options' => $color,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $line = [
      '' => t(' - None - '),
      'c-line' => 'Line long',
      'c-line-center c-theme-bg' => 'Line short',
      'c-line-left c-theme-bg' => 'Line short left',
      'c-line-right c-theme-bg' => 'Line short right',
      'c-line c-dot c-dot-center' => 'Line with point',
      'c-line c-dot c-dot-center c-line-short' => 'Line short with point',
      'c-line c-dot c-dot c-dot-left' => 'Line with point left',
      'c-line c-dot c-dot c-dot-right' => 'Line with point right',
      'c-line c-dot c-dot-square' => 'Line with square',
      'c-line c-dot c-dot-square c-dot-left' => 'Line with square left',
      'c-line c-dot c-dot-square c-dot-right' => 'Line with square right',
      'c-content-title-3 c-theme-border' => 'Vertical line left',
      'c-content-title-3 c-theme-border c-right' => 'Vertical line right',
      'c-content-title-4' => t('Middle Line'),
    ];
    $form['underline'] = [
      '#title' => t('Line Type'),
      '#type' => 'select',
      '#options' => $line,
      '#default_value' => isset($attrs['underline']) ? $attrs['underline'] : 'c-theme-bg',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div></div>',
    ];
    $form['description'] = [
      '#title' => t('Description'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $bg_colors = [
      '' => t('Transparent'),
      'blue' => t('Blue'),
      'red' => t('Red'),
      'green' => t('Green'),
      'yellow' => t('Yellow'),
      'purple' => t('Purple'),
      'white' => t('White'),
      'black' => t('Black'),
      'theme' => t('Theme')
    ];
    $form['icon_color'] = [
      '#title' => t('Icon Color'),
      '#type' => 'select',
      '#options' => $color,
      '#default_value' => isset($attrs['icon_color']) ? $attrs['icon_color'] : 'blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $text_align = [
      'c-left' => t('Left'),
      'c-right' => t('Right'),
      'c-center' => t('Center'),
    ];
    $form['label_align'] = [
      '#title' => t('Text Align'),
      '#type' => 'select',
      '#options' => $text_align,
      '#default_value' => isset($attrs['label_align']) ? $attrs['label_align'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['bg_color'] = [
      '#type' => 'select',
      '#options' => $bg_colors,
      '#title' => t('Underline color'),
      '#default_value' => isset($attrs['bg_color']) ? $attrs['bg_color'] : 'c-accordion-blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $sizes = ['' => t('Default'), 'c-font-18' => t('18px'), 'c-font-20' => t('20px')];
    $form['size'] = [
      '#type' => 'select',
      '#options' => $sizes,
      '#title' => t('Font Size'),
      '#default_value' => isset($attrs['size']) ? $attrs['size'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    return $form;
  }
}
