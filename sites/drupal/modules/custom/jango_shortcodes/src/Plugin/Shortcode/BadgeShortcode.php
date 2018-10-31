<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_badge",
 *   title = @Translation("Badge"),
 *   description = @Translation("Badge."),
 *   icon = "fa fa-image",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class BadgeShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $class = '';
    if (isset($attrs['type']) && $attrs['type'] == 'square') {
      if (isset($attrs['type_label']) && $attrs['type_label'] == 'bootstrap') {
        $class .= $attrs['uppercase'] ? ' c-font-uppercase' : ' c-font-bold';
        $text = '<span ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="label c-font-slim ' . $class . ' ' . $attrs['color'] . '">' . $attrs['label'] . '</span>';
      }
      else {
        $class .= (isset($attrs['size']) && $attrs['size'] == 'small') ? ' c-label-sm c-font-uppercase c-font-bold' : ' c-label-lg c-font-uppercase c-font-bold';
        $text = '<span ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="c-content-label ' . $class . ' ' . $attrs['color'] . '">' . $attrs['label'] . '</span>';
      }
    }
    else {
      $text = '<span ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="badge ' . $class . ' ' . $attrs['color'] . '">' . $attrs['label'] . '</span>';
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $attrs['title'] = isset($attrs['title']) && $attrs['title'] ? $attrs['title'] : $text;

    $type = [
      'square' => 'Square',
      'circle' => 'Circle',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'square',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $type_label = [
      'bootstrap' => 'Bootstrap',
      'oswald' => 'Oswald',
    ];
    $form['type_label'] = [
      '#type' => 'select',
      '#options' => $type_label,
      '#title' => t('Type label'),
      '#default_value' => isset($attrs['type_label']) ? $attrs['type_label'] : 'square',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => ['value' => 'square'],
        ],
      ],
    ];
    $size = [
      'small' => 'Small',
      'large' => 'Large',
    ];
    $form['size'] = [
      '#type' => 'select',
      '#options' => $size,
      '#title' => t('Size'),
      '#default_value' => isset($attrs['size']) ? $attrs['size'] : 'small',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type-label' => ['value' => 'oswald'],
        ],
      ],
    ];
    $form['uppercase'] = [
      '#type' => 'checkbox',
      '#title' => t('Uppercase'),
      '#default_value' => isset($attrs['uppercase']) ? $attrs['uppercase'] : '',
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type-label' => ['value' => 'bootstrap'],
        ],
        'invisible' => [
          '#edit-type' => ['value' => 'circle'],
        ],
      ],
    ];
    $form['bold'] = [
      '#type' => 'checkbox',
      '#title' => t('Bold'),
      '#default_value' => isset($attrs['bold']) ? $attrs['bold'] : '',
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type-label' => ['value' => 'bootstrap'],
        ],
        'invisible' => [
          '#edit-type' => ['value' => 'circle'],
        ],
      ],
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $colors = [
      'c-bg-blue' => t('Blue'),
      'c-bg-red' => t('Red'),
      'c-bg-green' => t('Green'),
      'c-bg-yellow' => t('Yellow'),
      'c-bg-purple' => t('Purple'),
      'c-bg-black' => t('Black'),
    ];
    $form['color'] = [
      '#type' => 'select',
      '#title' => t('Color'),
      '#options' => $colors,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : 'blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          '.progess-type-select' => ['value' => 'line'],
        ],
      ],
    ];

    return $form;
  }
}
