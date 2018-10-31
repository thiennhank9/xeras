<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_testimonials",
 *   title = @Translation("Testimonials container"),
 *   description = @Translation("Testimonials container."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 *   child_shortcode = "nd_testimonial",
 * )
 */

class TestimonialsContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output = $text;
    switch ($attrs['type']) {
      case 'carousel':
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonials_container_carousel',
          '#text' => $text,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-testimonials-1" data-slider="owl" data-single-item="true" data-auto-play="5000">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'slider':
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonials_container_slider',
          '#title' => $attrs['title'],
          '#text' => $text,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-testimonial-2-slider" data-slider="owl">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'block':
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-v-center c-bg-red" style="height: 320px;">';
        $output .= $text;
        $output .= '</div>';
        break;

      case 'reviews':
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonials_container_reviews',
          '#text' => $text,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-blog-post-card-1-slider" data-slider="owl">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'arrow':
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonials_container_arrow',
          '#text' => $text,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-testimonials-4" data-slider="owl">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $types = [
      'carousel' => 'Carousel',
      'slider' => 'Slider',
      'block' => 'Block',
      'reviews' => 'Reviews',
      'arrow' => 'Arrow Slider',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $types,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'carousel',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title label'),
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          '#edit-type' => ['value' => 'slider'],
        ],
      ],
    ];

    return $form;
  }
}
