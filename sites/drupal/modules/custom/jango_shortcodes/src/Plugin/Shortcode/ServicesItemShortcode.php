<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_services",
 *   title = @Translation("Services item"),
 *   description = @Translation("Services item."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class ServicesItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output = $text;
    switch ($attrs['type']) {
      case 'type_1':
        $attrs['icon'] = strpos($attrs['icon'], 'c-icon-') !== false ? 'c-content-line-icon c-theme ' . $attrs['icon'] : 'icon-font c-theme-font ' . $attrs['icon'];
        $theme_array = [
          '#theme' => 'jango_shortcodes_services_item_type_1',
          '#icon_type' => $attrs['icon_type'],
          '#icon' => $attrs['icon'],
          '#label' => $attrs['label'],
          '#description' => $attrs['description'],
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="col-md-4 col-sm-6">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'type_2':
        $theme_array = [
          '#theme' => 'jango_shortcodes_services_item_type_2',
          '#label' => $attrs['label'],
          '#description' => $attrs['description'],
          '#label_2' => $attrs['label_2'],
          '#description_2' => $attrs['description_2'],
          '#label_3' => $attrs['label_3'],
          '#description_3' => $attrs['description_3'],
          '#label_4' => $attrs['label_4'],
          '#description_4' => $attrs['description_4'],
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-feature-11">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'type_3':
        $theme_array = [
          '#theme' => 'jango_shortcodes_services_item_type_3',
          '#text' => $text,
        ];
        $output = $this->render($theme_array);
        break;
    }
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'type_1' => 'Services has icon',
      'type_2' => 'Services without icons',
      'type_3' => 'Services without video',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $bg_type = [
      '1' => 'Light',
      '2' => 'Dark',
    ];
    $form['bg_type'] = [
      '#type' => 'select',
      '#options' => $bg_type,
      '#title' => t('Background'),
      '#default_value' => isset($attrs['bg_type']) ? $attrs['bg_type'] : '1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $icon_type = [
      'c-content-feature-2 c-option-2 c-theme-bg-parent-hover' => 'Effect hover on icon ',
      'c-content-feature-2' => 'No effect',
    ];
    $form['icon_type'] = [
      '#type' => 'select',
      '#options' => $icon_type,
      '#title' => t('Icon effect'),
      '#default_value' => isset($attrs['icon_type']) ? $attrs['icon_type'] : 'c-content-feature-2 c-option-2 c-theme-bg-parent-hove',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<br /><br /><br /><br /><div class = "col-sm-6">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_1'],
            ['value' => 'type_2'],
          ],
        ],
      ],
    ];
    $form['icon'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_1'],
          ],
        ],
      ],
    ];
    $form['description'] = [
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_1'],
            ['value' => 'type_2'],
          ],
        ],
      ],
    ];
    $form['label_2'] = [
      '#type' => 'textfield',
      '#title' => t('Label 2'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['description_2'] = [
      '#type' => 'textarea',
      '#title' => t('Description 2'),
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['label_3'] = [
      '#type' => 'textfield',
      '#title' => t('Label 3'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['description_3'] = [
      '#type' => 'textarea',
      '#title' => t('Description 3'),
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['label_4'] = [
      '#type' => 'textfield',
      '#title' => t('Label 4'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['description_4'] = [
      '#type' => 'textarea',
      '#title' => t('Description 4'),
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];

    return $form;
  }
}
