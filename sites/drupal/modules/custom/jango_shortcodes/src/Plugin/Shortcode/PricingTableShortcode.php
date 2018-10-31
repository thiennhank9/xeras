<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_pricing_tables",
 *   title = @Translation("Pricing tables"),
 *   description = @Translation("Pricing tables."),
 *   icon = "fa fa-dollar",
 *   child_shortcode = "nd_pricing_table"
 * )
 */
class PricingTableShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output = $text;
    switch ($attrs['type']) {
      case 'type_1':
        global $counter;
        $counter = 0;
        $theme_array = [
          '#theme' => 'jango_shortcodes_pricing_table_type_1',
          '#class' => isset($attrs['active']) && $attrs['active'] ? 'c-opt-2' : 'c-opt-1',
          '#label1' => $attrs['label'],
          '#label2' => $attrs['label2'],
          '#label3' => $attrs['label3'],
          '#label4' => $attrs['label4'],
          '#label5' => $attrs['label5'],
          '#text' => $text,
        ];
        $output = $this->render($theme_array);
        break;

      case 'type_2':
        global $counter_price;
        $counter_price = 0;
        $theme_array = [
          '#theme' => 'jango_shortcodes_pricing_table_type_2',
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
      '#suffix' => '</div></div>',
    ];
    $form['active'] = [
      '#title' => t('Light/Dark'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['active']) ? $attrs['active'] : FALSE,
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label2'] = [
      '#type' => 'textfield',
      '#title' => t('Label 2'),
      '#default_value' => isset($attrs['label2']) ? $attrs['label2'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label3'] = [
      '#type' => 'textfield',
      '#title' => t('Label 3'),
      '#default_value' => isset($attrs['label3']) ? $attrs['label3'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label4'] = [
      '#type' => 'textfield',
      '#title' => t('Label 4'),
      '#default_value' => isset($attrs['label4']) ? $attrs['label4'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $form['label5'] = [
      '#type' => 'textfield',
      '#title' => t('Label 5'),
      '#default_value' => isset($attrs['label5']) ? $attrs['label5'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    return $form;
  }
}
