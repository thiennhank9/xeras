<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\Core\Plugin\Context\Context;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\image\Entity\ImageStyle;
use Drupal\file\Entity\File;
use Drupal\Core\Link;

/**
 * @Shortcode(
 *   id = "nd_breadcrumb",
 *   title = @Translation("Breadcrumb"),
 *   description = @Translation("Breadcrumbs."),
 *   icon = "fa fa-bold",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class BreadcrumbShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['type']) ? $attrs['type'] : '';
    $attrs['class'] .= ' c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold';
    $attrs['class'] .= isset($attrs['subtitle']) ? '  c-subtitle' : '';
    $attrs['class'] .= isset($attrs['font_color']) ? ' ' . $attrs['font_color'] : '';
    $attrs['class'] .= isset($attrs['height']) ? ' ' . $attrs['height'] : '';
    if (isset($attrs['fid']) && !empty($attrs['fid'])) {
      $attrs['style_background_image'] = $attrs['fid'];
      $attrs['class'] .= ' c-bg-img-center';
    }
    else {
      $attrs['class'] .= ' c-bordered c-bordered-both';
    }

    $breadcrumb = \Drupal::service('breadcrumb')->build(\Drupal::routeMatch())->toRenderable();
    $breadcrumbs = \Drupal::service('renderer')->render($breadcrumb);
    $breadcrumbs = str_replace('<ol', '<ol class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular"', $breadcrumbs);

    global $breadcrumb_page_title;
    $title = !is_null($breadcrumb_page_title) ? $breadcrumb_page_title : drupal_get_title();
    $theme_array = [
      '#theme' => 'jango_shortcodes_breadcrumb',
      '#title' => $title,
      '#subtitle' => isset($attrs['subtitle']) ? $attrs['subtitle'] : FALSE,
      '#text' => $breadcrumbs,
    ];
    $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>';
    $output .=  $this->render($theme_array);
    $output .= '</div>';

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['subtitle'] = [
      '#type' => 'textfield',
      '#title' => t('Subtitle'),
      '#default_value' => isset($attrs['subtitle']) ? $attrs['subtitle'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-9">',
      '#suffix' => '</div>',
    ];
    $type = [
      '' => t('2 Columns'),
      'c-centered' => t('1 Column, centered'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Text position'),
      '#options' => $type,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>'
    ];

    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#prefix' => '<div class = "row"><div class = "col-sm-6"><div class="image-gallery-upload ">',
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
        $form['fid']['#field_suffix'] = '<div class = "preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>';
      }
    }

    $font_color = [
      '' => t('Grey'),
      'c-font-black' => t('Black'),
      'c-font-white' => t('White'),
    ];
    $form['font_color'] = [
      '#type' => 'select',
      '#title' => t('Font Color'),
      '#options' => $font_color,
      '#default_value' => isset($attrs['font_color']) ? $attrs['font_color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $height = [
      '' => t('Small'),
      'c-bgimage' => t('Medium'),
      'c-bgimage-full no-overlay' => t('Big'),
      'c-bgimage-full' => t('Big With Overlay'),
    ];
    $form['height'] = [
      '#type' => 'select',
      '#title' => t('Height'),
      '#options' => $height,
      '#default_value' => isset($attrs['height']) ? $attrs['height'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
