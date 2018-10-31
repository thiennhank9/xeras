<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_quote",
 *   title = @Translation("Quote"),
 *   description = @Translation("Quote for text"),
 *   icon = "fa fa-quote-right",
 *   child_shortcode = "html"
 * )
 */
class QuoteShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '');
    $attrs['class'] .= isset($attrs['color']) && $attrs['color'] ? ' ' . $attrs['color'] : '';
    $attrs['class'] .= isset($attrs['reversed']) && $attrs['reversed'] ? ' blockquote-reverse' : '';
    $output = '<blockquote ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</blockquote>';
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $colors = [
      '' => t('Default'),
      ' c-border-red' => t('Red'),
      ' c-border-blue' => t('Blue'),
      ' c-theme-border' => t('Green')
    ];
    $form['color'] = [
      '#title' => t('Color'),
      '#type' => 'select',
      '#options' => $colors,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $form['reversed'] = [
      '#title' => t('Reverse border'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['reversed']) ? $attrs['reversed'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    return $form;
  }
}
