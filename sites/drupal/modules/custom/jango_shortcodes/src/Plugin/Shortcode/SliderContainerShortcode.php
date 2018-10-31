<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_slider",
 *   title = @Translation("Slider container"),
 *   description = @Translation("Slider container."),
 *   icon = "fa fa-arrows-h",
 *   child_shortcode = "nd_slider_item",
 *   description_field = "title",
 * )
 */
class SliderContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    switch ($attrs['type_slider']) {
      case 'image':
        $theme_array = [
          '#theme' => 'jango_shortcodes_slider_container_image',
          '#label' => isset($attrs['label']) ? $attrs['label'] : '',
          '#text' => $text,
        ];
        $text = $this->render($theme_array);
        break;

      case 'block':
        $theme_array = [
          '#theme' => 'jango_shortcodes_slider_container_block',
          '#text1' => 'Unlimited Expendabilities & Possibilities!',
          '#text2' => 'CLEAN HTML & CSS JANGO IS LAUNCH READY!',
        ];
        $text = $this->render($theme_array);
        break;
    }

    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $slider_type = [
      'image' => 'Image',
      'block' => 'Block',
    ];
    $form['type_slider'] = [
      '#title' => t('Slider Type'),
      '#type' => 'select',
      '#options' => $slider_type,
      '#default_value' => isset($attrs['type_slider']) ? $attrs['type_slider'] : 'image',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type_slider"]' => ['value' => 'image'],
        ],
      ],
    ];

    return $form;
  }
}
