<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * @Shortcode(
 *   id = "nd_testimonial",
 *   title = @Translation("Testimonial item"),
 *   description = @Translation("Testimonial Item."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class TestimonialItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    switch ($attrs['type']) {
      case 'carousel':
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonial_item_carousel',
          '#text' => $text,
        ];
        $text = $this->render($theme_array);
        break;

      case 'slider':
        $attrs['name'] = isset($attrs['name']) && $attrs['name'] ? $attrs['name'] : '';
        $attrs['position'] = isset($attrs['position']) && $attrs['position'] ? $attrs['position'] : '';
        $url = '';
        if (isset($attrs['fid'])) {
          $uri = File::load($attrs['fid'])->getFileUri();
          $url = file_create_url($uri);
        }

        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonial_item_slider',
          '#url' => $url,
          '#name' => $attrs['name'],
          '#position' => $attrs['position'],
          '#text' => $text,
          '#author' => (($attrs['name'] && $attrs['position']) || !empty($url)) ? TRUE : FALSE,
        ];
        $text = $this->render($theme_array);
        break;

      case 'block':
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonial_item_block',
          '#text' => $text,
        ];
        $text = $this->render($theme_array);
        break;

      case 'reviews':
        $attrs['bg_type'] = isset($attrs['bg_type']) && $attrs['bg_type'] ? $attrs['bg_type'] : 'c-option-default';
        $img = '';
        if (isset($attrs['fid']) && !empty($attrs['fid'])) {
          $uri = File::load($attrs['fid'])->getFileUri();
          $alt = '';
          $title = '';
          $img_array = ['#theme' => 'image_style', '#style_name' => 'project__80x80_', '#title' => $title, '#alt' => $alt, '#uri' => $uri,];
          $img = $this->render($img_array);
        }
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonial_item_reviews',
          '#bg_type' => $attrs['bg_type'],
          '#text' => $text,
          '#img' => $img,
          '#name' => $attrs['name'],
          '#position' => $attrs['position'],
        ];
        $text = $this->render($theme_array);
        break;

      case 'arrow':
        $attrs['font_color'] = isset($attrs['font_color']) && $attrs['font_color'] ? $attrs['font_color'] : '';
        $url = '';
        if (isset($attrs['fid'])) {
          $uri = File::load($attrs['fid'])->getFileUri();
          $url = file_create_url($uri);
        }
        $theme_array = [
          '#theme' => 'jango_shortcodes_testimonial_item_arrow',
          '#text' => $text,
          '#url' => $url,
          '#font_color' => $attrs['font_color'],
          '#name' => $attrs['name'],
          '#position' => $attrs['position'],
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
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#default_value' => isset($attrs['name']) ? $attrs['name'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          [
            ['#edit-type' => ['value' => 'slider']],
            'or',
            ['#edit-type' => ['value' => 'reviews']],
            'or',
            ['#edit-type' => ['value' => 'arrow']],
          ],
        ],
      ],
    ];
    $form['position'] = [
      '#type' => 'textfield',
      '#title' => t('Position'),
      '#default_value' => isset($attrs['position']) ? $attrs['position'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          [
            ['#edit-type' => ['value' => 'slider']],
            'or',
            ['#edit-type' => ['value' => 'reviews']],
            'or',
            ['#edit-type' => ['value' => 'arrow']],
          ],
        ],
      ],
    ];

    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Portrait'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#prefix' => '<div class="row"><div class="col-sm-4"><div class="image-gallery-upload ">',
      '#suffix' => '</div></div>',
      '#attributes' => ['class' => ['image-gallery-upload hidden']],
      '#field_suffix' => '<div class="preview-image"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>',
      '#states' => [
        'visible' => [
          [
            ['#edit-type' => ['value' => 'slider']],
            'or',
            ['#edit-type' => ['value' => 'reviews']],
            'or',
            ['#edit-type' => ['value' => 'arrow']],
          ],
        ],
      ],
    ];

    if (isset($attrs['fid'])) {
      $file = File::load($attrs['fid']);
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="row"><div class="col-sm-4"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>';
      }
    }

    $bg_types = [
      'c-option-default' => 'Default',
      'c-option-light' => 'Light',
      'c-option-light-transparent' => 'Light transparent',
      'c-option-dark' => 'Dark',
      'c-option-dark-transparent' => 'Dark transparent',
    ];
    $form['bg_type'] = [
      '#type' => 'select',
      '#options' => $bg_types,
      '#title' => t('Background color'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'c-option-default',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'reviews']],
      ],
    ];
    $font_color = [
      '' => 'Dark',
      'c-font-white' => 'White',
    ];
    $form['font_color'] = [
      '#type' => 'select',
      '#options' => $font_color,
      '#title' => t('Font color'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : ' ',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'arrow']],
      ],
    ];

    return $form;
  }
}
