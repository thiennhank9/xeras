<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_products_filter",
 *   title = @Translation("Products Filter"),
 *   description = @Translation("Products Filter."),
 *   icon = "fa fa-search",
 *   description_field = "title",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class ProductsFilterShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['type'] = isset($attrs['type']) ? $attrs['type'] : '';
    $attrs['title'] = isset($attrs['title']) ? $attrs['title'] : '';
    $attrs['class'] = 'c-margin-b-30';

    switch ($attrs['type']) {
      case 'rating':
        $attrs['class'] .= ' filter-rating-wraper';
        $theme_array = [
          '#theme' => 'jango_shortcodes_product_filter_rating',
          '#title' => $attrs['title'],
        ];
        $output = $this->render($theme_array);
        break;

      case 'availability':
        $theme_array = [
          '#theme' => 'jango_shortcodes_product_filter_availability',
          '#title' => $attrs['title'],
        ];
        $output = $this->render($theme_array);
        break;

      case 'price':
      default:
        $attrs['class'] .= ' c-shop-filter-search-1';
        $price_type = isset($attrs['price_type']) ? $attrs['price_type'] : 'c-theme-1';
        $currency = isset($attrs['price_currency']) ? $attrs['price_currency'] : '$';

        if ($price_type == 'from_to_textfields') {
          $theme_array = [
            '#theme' => 'jango_shortcodes_product_filter_price_from_to_textfields',
            '#title' => $attrs['title'],
            '#currency' => $currency,
          ];
          $output = $this->render($theme_array);
        }
        else {
          $attrs['class'] .= ' filter-range-wrapper';
          $from = isset($attrs['price_from']) ? $attrs['price_from'] : 0;
          $to = isset($attrs['price_to']) ? $attrs['price_to'] : 500;

          $theme_array = [
            '#theme' => 'jango_shortcodes_product_filter_price',
            '#title' => $attrs['title'],
            '#currency' => $currency,
            '#min' => (int) ($from / 20),
            '#max' => $to * 3,
            '#price_type' => $price_type,
            '#from' => $from,
            '#to' => $to,
            '#price_handle' => isset($attrs['price_handle']) && $attrs['price_handle'] == 'square' ? 'data-slider-handle="square"' : '',
          ];
          $output = $this->render($theme_array);
        }
        break;
    }
    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' role="alert">' . $output . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $types = [
      'price' => t('Price'),
      'rating' => t('Rating'),
      'availability' => t('Availability'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Type'),
      '#options' => $types,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
    ];

    $price_types = [
      'from_to_textfields' => t('From To Textfields'),
      'c-theme-1' => t('Slider Blue'),
      'c-theme-2' => t('Slider Red'),
    ];
    $form['price_type'] = [
      '#type' => 'select',
      '#title' => t('Type Price'),
      '#options' => $price_types,
      '#default_value' => isset($attrs['price_type']) ? $attrs['price_type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['value' => 'price'],
        ],
      ],
    ];

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
    ];

    $form['price_from'] = [
      '#type' => 'textfield',
      '#title' => t('Default Price from'),
      '#default_value' => isset($attrs['price_from']) ? $attrs['price_from'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-3">',
      '#states' => [
        'invisible' => [
          'select[name="price_type"]' => ['value' => 'from_to_textfields'],
        ],
      ],
    ];
    $form['price_to'] = [
      '#type' => 'textfield',
      '#title' => t('To'),
      '#default_value' => isset($attrs['price_to']) ? $attrs['price_to'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'invisible' => [
          'select[name="price_type"]' => ['value' => 'from_to_textfields']
        ],
      ],
    ];

    $form['price_handle'] = [
      '#type' => 'select',
      '#title' => t('Price Handle'),
      '#options' => [
        'round' => t('Round'),
        'square' => t('Square')
      ],
      '#default_value' => isset($attrs['price_handle']) ? $attrs['price_handle'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#states' => [
        'invisible' => [
          'select[name="price_type"]' => ['value' => 'from_to_textfields'],
        ],
      ],
    ];

    $form['price_currency'] = [
      '#type' => 'textfield',
      '#title' => t('Price Currency'),
      '#default_value' => isset($attrs['price_currency']) ? $attrs['price_currency'] : '$',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-2">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['value' => 'price'],
        ],
      ],
    ];

    return $form;
  }
}
