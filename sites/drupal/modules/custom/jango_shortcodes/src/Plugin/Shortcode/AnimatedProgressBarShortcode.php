<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_animated_progress_bar",
 *   title = @Translation("Animated progress bar"),
 *   description = @Translation("Animated progress bar."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class AnimatedProgressBarShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $font_color = 'c-font-' . $attrs['bg_type'];
    $icon = isset($attrs['icon']) ? '<div class="c-progress-bar-icon c-border-' . $attrs['bg_type'] . '"><i class="' . $attrs['icon'] . '"></i></div>' : '';
    $data = isset($attrs['icon']) ? 'false' : 'true';

    if ($attrs['type_bar'] != 'line') {
      $theme_array = [
        '#theme' => 'jango_shortcodes_animated_progress_bar_not_line',
        '#bg_type' => $attrs['bg_type'],
        '#font_color' => $font_color,
        '#type_bar' => $attrs['type_bar'],
        '#stroke_width' => $attrs['stroke_width'],
        '#percent' => ($attrs['percent'] / 100),
        '#data' => $data,
        '#animation_stroke' => $attrs['animation_stroke'],
        '#icon' => $icon,
        '#description' => $attrs['description'],
      ];
      $output = $this->render($theme_array);
    }
    else {
      $theme_array = [
        '#theme' => 'jango_shortcodes_animated_progress_bar',
        '#icon' => isset($attrs['icon']) && !empty($attrs['icon']) ? $attrs['icon'] : FALSE,
        '#font_color' => $font_color,
        '#description' => isset($attrs['description']) ? $attrs['description'] : '',
        '#bg_type' => $attrs['bg_type'],
        '#line_width' => $attrs['line_width'],
        '#percent' => ($attrs['percent'] / 100),
        '#data' => $data,
        '#animation_stroke' => $attrs['animation_stroke'],
      ];
      $output = $this->render($theme_array);
    }
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type_bar = [
      'circle' => 'Circle',
      'semicircle' => 'Semi - Circle',
      'line' => 'Line',
    ];
    $bg_type = [
      'green' => 'Green',
      'red' => 'Red',
      'blue' => 'Blue',
      'purple' => 'Purple',
      'grey-2' => 'Grey',
      'yellow' => 'Yellow',
    ];
    $stroke_width = [
      '3' => '3',
      '4' => '4',
      '5' => '5',
      '6' => '6',
      '7' => '7',
      '8' => '8',
    ];
    $line_width = [
      '1' => '1',
      '2' => '2',
    ];
    $animation = [
      'easeInOut' => 'easeInOut',
      'bounce' => 'bounce',
    ];
    $form['percent'] = [
      '#type' => 'textfield',
      '#title' => t('Percent'),
      '#default_value' => isset($attrs['percent']) ? $attrs['percent'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $form['type_bar'] = [
      '#type' => 'select',
      '#options' => $type_bar,
      '#title' => t('Background'),
      '#default_value' => isset($attrs['type_bar']) ? $attrs['type_bar'] : 'circle',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['bg_type'] = [
      '#type' => 'select',
      '#options' => $bg_type,
      '#title' => t('Background'),
      '#default_value' => isset($attrs['bg_type']) ? $attrs['bg_type'] : '1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['description'] = [
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    $form['icon'] = [
      '#title' => t('Icon'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['stroke_width'] = [
      '#type' => 'select',
      '#options' => $stroke_width,
      '#title' => t('Stroke width'),
      '#default_value' => isset($attrs['stroke_width']) ? $attrs['stroke_width'] : '2',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
      '#states' => [
        'invisible' => [
          'select[name="type_bar"]' => ['value' => 'line'],
        ],
      ],
    ];
    $form['line_width'] = [
      '#type' => 'select',
      '#options' => $line_width,
      '#title' => t('Line width'),
      '#default_value' => isset($attrs['line_width']) ? $attrs['line_width'] : '1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'select[name="type_bar"]' => ['value' => 'line'],
        ],
      ],
    ];
    $form['animation_stroke'] = [
      '#type' => 'select',
      '#options' => $animation,
      '#title' => t('Animation type'),
      '#default_value' => isset($attrs['animation_stroke']) ? $attrs['animation_stroke'] : 'easeInOut',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
