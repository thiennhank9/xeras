<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_pricing_table",
 *   title = @Translation("Pricing item"),
 *   description = @Translation("Pricing item."),
 *   icon = "fa fa-dollar",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds"
 * )
 */
class PricingItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output = '';
    switch ($attrs['type']) {
      case 'type_1':
        global $counter;
        $counter++;
        $str = '';

        if (empty($attrs['icon2'])) {
          $str .= '<div class="c-row c-font-17">' . $attrs['label2'] . '</div>';
        }
        else {
          $str .= '<div class="c-row" ><i class="fa ' . $attrs['icon2'] . ' c-font-20"></i></div>';
        }

        if (empty($attrs['icon3'])) {
          $str .= '<div class="c-row c-font-17">' . $attrs['label3'] . '</div >';
        }
        else {
          $str .= '<div class="c-row" ><i class="fa ' . $attrs['icon3'] . ' c-font-20"></i></div>';
        }

        if (empty($attrs['icon4'])) {
          $str .= '<div class="c-row c-font-17">' . $attrs['label4'] . '</div>';
        }
        else {
          $str .= '<div class="c-row"><i class="fa ' . $attrs['icon4'] . ' c-font-20" ></i></div>';
        }

        if (empty($attrs['icon5'])) {
          $str .= '<div class="c-row c-font-17">' . $attrs['label5'] . '</div>';
        }
        else {
          $str .= ' <div class="c-row"><i class="fa ' . $attrs['icon5'] . ' c-font-20"></i></div>';
        }

        $theme_array = [
          '#theme' => 'jango_shortcodes_pricing_item_type_1',
          '#class' => $counter == 2 ? 'odd' : 'even',
          '#label' => $attrs['label'],
          '#str' => $str,
          '#price' => $attrs['price'],
          '#text' => $text,
        ];
        $output = $this->render($theme_array);
        break;

      case 'type_2':
        global $counter_price;
        $counter_price++;
        $class = ' c-tile-small';
        $animation = (isset($attrs['animation']) && !empty($attrs['animation'])) ? 'wow animate ' . $attrs['animation'] : '';
        if ($counter_price == 2) {
          $class = '';
          $output = '<div class="c-tile' . $class . ' c-bordered c-shadow c-bg-' . $attrs['background'] . ' c-border-' . $attrs['background'] . ' ' . $animation . '">';
        }
        else {
          $output = '<div class="c-tile' . $class . ' c-bordered c-shadow c-border-' . $attrs['background'] . ' ' . $animation . '">';
        }
        $theme_array = [
          '#theme' => 'jango_shortcodes_pricing_item_type_2',
          '#lb_back' => $attrs['lb_back'],
          '#color_text' => $attrs['color_text'],
          '#name' => $attrs['name'],
          '#price' => $attrs['price'],
          '#text' => $text,
        ];
        $output .= $this->render($theme_array);
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
      'type_1' => 'Table',
      'type_2' => 'Package',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'type_1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label table row'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label2'] = [
      '#type' => 'textfield',
      '#title' => t('Label following row'),
      '#default_value' => isset($attrs['label2']) ? $attrs['label2'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['icon2'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon2']) ? $attrs['icon2'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label3'] = [
      '#type' => 'textfield',
      '#title' => t('Label following row'),
      '#default_value' => isset($attrs['label3']) ? $attrs['label3'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['icon3'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon3']) ? $attrs['icon3'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label4'] = [
      '#type' => 'textfield',
      '#title' => t('Label following row'),
      '#default_value' => isset($attrs['label4']) ? $attrs['label4'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['icon4'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon4']) ? $attrs['icon4'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label5'] = [
      '#type' => 'textfield',
      '#title' => t('Label following row'),
      '#default_value' => isset($attrs['label5']) ? $attrs['label5'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['icon5'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon5']) ? $attrs['icon5'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['price'] = [
      '#title' => t('Price'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['price']) ? $attrs['price'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['name'] = [
      '#title' => t('Name package'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['name']) ? $attrs['name'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $bg_color = [
      'white' => 'White',
      'green' => 'Green',
      'blue' => 'Blue',
      'red' => 'Red',
      'purple' => 'Purple',
      'dark' => 'Dark',
      'theme c-theme-bg' => 'Theme',
    ];
    $form['background'] = [
      '#type' => 'select',
      '#options' => $bg_color,
      '#title' => t('Background color'),
      '#default_value' => isset($attrs['background']) ? $attrs['background'] : 'white',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['color_text'] = [
      '#type' => 'select',
      '#options' => $bg_color,
      '#title' => t('Label color'),
      '#default_value' => isset($attrs['color_text']) ? $attrs['color_text'] : 'white',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];
    $form['lb_back'] = [
      '#type' => 'select',
      '#options' => $bg_color,
      '#title' => t('Label background color'),
      '#default_value' => isset($attrs['lb_back']) ? $attrs['lb_back'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];

    return $form;
  }
}
