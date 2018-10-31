<?php

/**
 * @file
 * Contains \Drupal\jango_cms\Plugin\Shortcode\ButtonShortcode.
 */

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * The image shortcode.
 *
 * @Shortcode(
 *   id = "nd_accordions",
 *   title = @Translation("Accordions Container"),
 *   description = @Translation("Accordions container"),
 *   child_shortcode = "nd_accordion",
 *   icon = "fa fa-bars"
 * )
 */
class AccordionsShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $accordion_count;
    $accordion_count++;
    $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="c-content-accordion-1 ' . $attrs['bg_color'] . '">';
    $output .= '<div class="panel-group" id="accordion-' . $accordion_count . '" role="tablist" >' . $text . '</div>';
    $output .= '</div>';
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $bg_colors = [
      'c-theme' => t('Theme'),
      'c-accordion-blue' => t('Blue'),
      'c-accordion-red' => t('Red'),
      'c-accordion-green' => t('Green'),
      'c-accordion-yellow' => t('Yellow'),
      'c-accordion-purple' => t('Purple'),
      'c-accordion-brown' => t('Brown'),
    ];
    $form['bg_color'] = [
      '#type' => 'select',
      '#options' => $bg_colors,
      '#title' => t('Background'),
      '#default_value' => isset($attrs['bg_color']) ? $attrs['bg_color'] : 'c-accordion-blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    return $form;
  }
}
