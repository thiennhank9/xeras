<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_gmap",
 *   title = @Translation("Google Map"),
 *   description = @Translation("Google Map."),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-map-marker",
 * )
 */
class GmapShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $scrollwheel = isset($attrs['scrollwheel']) && $attrs['scrollwheel'] ? 'data-scrollwheel="true"' : 'data-scrollwheel="false"';
    $theme_array = [
      '#theme' => 'jango_shortcodes_gmap',
      '#text' => $text,
      '#lat' => isset($attrs['lat']) ? $attrs['lat'] : 40.7786855,
      '#lng' => isset($attrs['lng']) ? $attrs['lng'] : -73.9625954,
      '#type' => $attrs['type'],
      '#scrollwheel' => $scrollwheel,
      '#address' => isset($attrs['address']) ? $attrs['address'] : '',
    ];
    return $this->render($theme_array);
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $type = [
      'roadmap' => t('Roadmap'),
      'panorama' => t('Panorama'),
    ];
    $form['type'] = [
      '#title' => t('Map type'),
      '#type' => 'select',
      '#options' => $type,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'roadmap',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['scrollwheel'] = [
      '#type' => 'checkbox',
      '#title' => t('Scroll wheel'),
      '#default_value' => isset($attrs['scrollwheel']) ? $attrs['scrollwheel'] : FALSE,
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $form['lat'] = [
      '#title' => t('Latitude'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['lat']) ? $attrs['lat'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>'
    ];
    $form['lng'] = [
      '#title' => t('Longitude'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['lng']) ? $attrs['lng'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>'
    ];
    $form['address'] = [
      '#title' => t('Address'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['address']) ? $attrs['address'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['value' => 'roadmap'],
        ],
      ],
    ];
    return $form;
  }
}
