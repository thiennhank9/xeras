<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * @Shortcode(
 *   id = "nd_slider_item",
 *   title = @Translation("Slider item"),
 *   description = @Translation("Slider item"),
 *   icon = "fa fa-long-arrow-right",
 * )
 */
class SliderShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    switch ($attrs['type_slider']) {
      case 'image':
        $file = isset($attrs['fid']) ? File::load($attrs['fid']) : '';
        $theme_array = [
          '#theme' => 'jango_shortcodes_slider_item_image',
          '#url' => $file ? file_create_url($file->getFileUri()) : '',
          '#height' => isset($attrs['height']) ? $attrs['height'] : '380px',
        ];
        $text = $this->render($theme_array);
        break;

      case 'block':
        $theme_array = [
          '#theme' => 'jango_shortcodes_slider_item_block',
          '#block_color' => $attrs['block_color'],
          '#text' => $text,
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
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];

   $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#prefix' => '<div class="col-sm-4"><div class="image-gallery-upload ">',
      '#suffix' => '</div></div>',
      '#attributes' => ['class' => ['image-gallery-upload hidden']],
      '#field_suffix' => '<div class="preview-image"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>'
    ];

    if (isset($attrs['fid'])) {
      $file = File::load($attrs['fid']);
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="col-sm-4"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>';
      }
    }

    $form['height'] = [
      '#type' => 'textfield',
      '#title' => t('Height'),
      '#default_value' => isset($attrs['height']) ? $attrs['height'] : '380px',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type_slider"]' => ['value' => 'image'],
        ],
      ],
    ];
    $bg_colors = [
      'green' => t('Green'),
      'blue' => t('Blue'),
      'red' => t('Red'),
      'yellow' => t('Yellow'),
      'purple' => t('Purple'),
      'gray' => t('Gray'),
      'white' => t('White'),
      'dark' => t('Dark'),
    ];
    $form['block_color'] = [
      '#title' => t('Block color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['block_color']) ? $attrs['block_color'] : 'green',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type_slider"]' => ['value' => 'block'],
        ],
      ],
    ];

    return $form;
  }
}
