<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * The image shortcode.
 *
 * @Shortcode(
 *   id = "html",
 *   title = @Translation("HTML"),
 *   description = @Translation("HTML with CKEDITOR"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-code",
 * )
 */
class HtmlShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $class = isset($attrs['p_classes']) && $attrs['p_classes'] ? $attrs['p_classes'] : '';
    $class .= isset($attrs['p_color']) ? ' ' . $attrs['p_color'] : '';
    $attrs['class'] = $class;
    $output = restore_html_string($text);
    // Made a little hack for tables which can't be controled because rendered some WYSIWYG editor, and also list styles
    $output = str_replace([
      '<table',
      '<ul>',
      '<ol>'
    ], [
      '<table class="table table-bordered table-striped"',
      '<ul class="c-links c-theme-ul">',
      '<ol class="c-links c-theme-ul">'
    ], $output);
    $attrs_output = _jango_shortcodes_shortcode_attributes($attrs);
    if ($attrs_output) {
      return '<div ' . $attrs_output . '>' . $output . '</div>';
    }
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = nd_visualshortcodes_shortcode_html_settings($attrs, $text);

    $classes = [
      '' => t('None'),
      'c-text c-font-16 c-font-regular' => t('Grey description text')
    ];
    $form['p_classes'] = [
      '#type' => 'select',
      '#title' => t('Text Options'),
      '#options' => $classes,
      '#default_value' => isset($attrs['p_classes']) ? $attrs['p_classes'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-3">',
      '#suffix' => '</div>',
    ];
    $color = [
      '' => t('Default'),
      'f-grey' => t('Grey'),
      'f-white' => t('White'),
      'f-black' => t('Black')
    ];
    $form['p_color'] = [
      '#type' => 'select',
      '#title' => t('Text Color'),
      '#options' => $color,
      '#default_value' => isset($attrs['p_color']) ? $attrs['p_color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-3">',
      '#suffix' => '</div></div>'
    ];

    return $form;
  }
}
