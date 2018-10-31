<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_step",
 *   title = @Translation("Step item"),
 *   description = @Translation("Step item."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class StepItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $count, $delay;
    $count++;

    $theme_array = [
      '#theme' => 'jango_shortcodes_step_item',
      '#icon' => $attrs['icon'],
      '#text' => $text,
    ];
    $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="col-md-4 col-sm-6 wow animate fadeInLeft" data-wow-delay="' . $delay . 's">';
    $output .= $this->render($theme_array);
    $output .= '</div>';
    $delay += 0.2;

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
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];

    return $form;
  }
}
