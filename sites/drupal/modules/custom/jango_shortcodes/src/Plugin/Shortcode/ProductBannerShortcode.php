<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;
use Drupal\Core\Url;

/**
 * @Shortcode(
 *   id = "nd_product",
 *   title = @Translation("Product Banner"),
 *   description = @Translation("ProductBanner."),
 *   icon = "fa fa-cart",
 *   description_field = "title",
 * )
 */

class ProductBannerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $type = isset($attrs['type']) ? $attrs['type'] : '';
    $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
    $filename = !empty($file) ? file_create_url($file->getFileUri()) : '';
    $button_link = isset($attrs['button_link']) ? restore_html_string($attrs['button_link']) : '';
    $title = isset($attrs['title']) ? restore_html_string($attrs['title']) : '';

    switch ($type) {
      case 'image_hover_button':
        $attrs['class'] = 'c-content c-content-overlay';
        $theme_array = [
          '#theme' => 'jango_shortcodes_product_banner_image_hover_button',
          '#button_link' => isset($attrs['button_link']) ? Url::fromUri('internal:/' . $button_link) : '',
          '#button_text' => isset($attrs['button_text']) ? t($attrs['button_text']) : '',
          '#height' => isset($attrs['height']) ? $attrs['height'] : 550,
          '#filename' => $filename,
        ];
        $output = $this->render($theme_array);
        break;

      case 'title_button':
        $attrs['class'] = 'c-content-product-5 c-content-overlay';
        $theme_array = [
          '#theme' => 'jango_shortcodes_product_banner_title_button',
          '#height' => isset($attrs['height']) ? $attrs['height'] : 400,
          '#filename' => $filename,
          '#title' => $title,
          '#button_link' => isset($attrs['button_link']) ? Url::fromUri('internal:/' . $button_link) : '',
          '#button_text' => isset($attrs['button_text']) ? t($attrs['button_text']) : '',
        ];
        $output = $this->render($theme_array);
        break;

      case 'image_hover_text':
        $attrs['class'] = 'c-content-product-5 c-content-overlay';
        $theme_array = [
          '#theme' => 'jango_shortcodes_product_banner_image_hover_text',
          '#title' => $title,
          '#button_link' => isset($attrs['button_link']) ? Url::fromUri('internal:/' . $button_link) : '',
          '#button_text' => isset($attrs['button_text']) ? t($attrs['button_text']) : '',
          '#height' => isset($attrs['height']) ? $attrs['height'] : 400,
          '#filename' => $filename,
        ];
        $output = $this->render($theme_array);
        break;

      case 'promo':
        $attrs['class'] = 'c-content-product-5';
        $theme_array = [
          '#theme' => 'jango_shortcodes_product_banner_promo',
          '#height' => isset($attrs['height']) ? $attrs['height'] : 800,
          '#filename' => $filename,
          '#button_link' => isset($attrs['button_link']) ? Url::fromUri('internal:/' . $button_link) : '',
          '#button_text' => isset($attrs['button_text']) ? t($attrs['button_text']) : '',
          '#title' => $title,
          '#text' => $text,
        ];
        $output = $this->render($theme_array);
        break;

      case 'image_text':
      default:
        $attrs['class'] = 'c-content-product-4 ' . (isset($attrs['bg_type']) ? $attrs['bg_type'] : '');
        $height = isset($attrs['height']) && !empty($attrs['height']) ? $attrs['height'] : FALSE;
        if ($height) {
          $attrs['style_height'] = $height;
        }
        $theme_img_array = [
          '#theme' => 'jango_shortcodes_product_banner_image_text_image',
          '#style' => ($height ? 'height:' . $height . 'px; background-size: 100%;' : '') . 'background-image: url(' . $filename . ')',
        ];
        $img = $this->render($theme_img_array);

        $theme_txt_array = [
          '#theme' => 'jango_shortcodes_product_banner_image_text_text',
          '#content_align' => isset($attrs['img_position']) && $attrs['img_position'] == 'left' ? 'right' : 'left',
          '#style' => $height ? ' style="padding-top: ' . ($height - 500) . 'px;"' : '',
          '#title' => $title,
          '#text' => $text,
          '#price' => isset($attrs['price']) ? $attrs['price'] : '',
          '#button_link' => isset($attrs['button_link']) ? Url::fromUri('internal:/' . $button_link) : '',
          '#button_text' => isset($attrs['button_text']) ? t($attrs['button_text']) : '',
        ];
        $txt = $this->render($theme_txt_array);

        $output = isset($attrs['img_position']) && $attrs['img_position'] == 'left' ? $img . $txt : $txt . $img;
        break;
    }
    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $output . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $types = [
      'image_text' => t('Image and Text'),
      'image_hover_text' => t('Image Hover'),
      'image_hover_button' => t('Image Button Hover'),
      'promo' => t('Promo'),
      'title_button' => t('Title and Button'),
    ];
    $form['type'] = [
      '#title' => t('Type'),
      '#type' => 'select',
      '#options' => $types,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    $form['title'] = [
      '#title' => t('Title'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'invisible' => [
          'select[name="type"]' => ['value' => 'image_hover_button'],
        ],
      ],
    ];

    $form['price'] = [
      '#title' => t('Price'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['price']) ? $attrs['price'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['value' => 'image_text'],
        ],
      ],
    ];

    $bg = [
      'c-content-bg-1' => t('Grey'),
      'c-content-bg-2' => t('Dark Grey'),
      'bg-dark-fix c-theme-bg' => t('Theme Color'),
      'bg-dark-fix c-bg-dark' => t('Dark'),
      'bg-dark-fix c-bg-red' => t('Red'),
      'bg-dark-fix c-bg-pink' => t('Light Pink'),
      'bg-dark-fix c-bg-blue' => t('Blue'),
      'bg-dark-fix c-bg-light-blue' => t('Light Blue'),
      'bg-dark-fix' => t('None White Color'),
      '' => t('None'),
    ];
    $form['bg_type'] = [
      '#title' => t('Background'),
      '#type' => 'select',
      '#options' => $bg,
      '#default_value' => isset($attrs['bg_type']) ? $attrs['bg_type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['value' => 'image_text'],
        ],
      ],
    ];
    $form['button_text'] = [
      '#title' => t('Button Text'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['button_text']) ? $attrs['button_text'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['button_link'] = [
      '#title' => t('Button Link'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['button_link']) ? $attrs['button_link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
    ];

    $img_position = ['left' => t('Left'), 'right' => t('Right')];
    $form['img_position'] = [
      '#title' => t('Image Position'),
      '#type' => 'select',
      '#options' => $img_position,
      '#default_value' => isset($attrs['img_position']) ? $attrs['img_position'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'select[name="type"]' => ['value' => 'image_text'],
        ],
      ],
    ];

    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#prefix' => '<div class="row"><div class="col-sm-4"><div class="image-gallery-upload ">',
      '#suffix' => '</div></div>',
      '#attributes' => ['class' => ['image-gallery-upload hidden']],
      '#field_suffix' => '<div class="preview-image"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>'
    ];

    if (isset($attrs['fid'])) {
      $file = File::load($attrs['fid']);
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="row"><div class="col-sm-6"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>';
      }
    }


    $form['height'] = [
      '#title' => t('Override Height'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['height']) ? $attrs['height'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
