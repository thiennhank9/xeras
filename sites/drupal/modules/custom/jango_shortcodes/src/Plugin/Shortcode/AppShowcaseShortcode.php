<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * @Shortcode(
 *   id = "nd_app_showcase",
 *   title = @Translation("App showcase"),
 *   description = @Translation("App showcase."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class AppShowcaseShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $url = '';
    if (isset($attrs['fid'])) {
      $uri = File::load($attrs['fid'])->getFileUri();
      $url = file_create_url($uri);
    }
    $theme_name = \Drupal::theme()->getActiveTheme()->getName();
    $path_to_theme = base_path() . drupal_get_path('theme', $theme_name);

    if ($attrs['bg_type'] == 1) {
      $theme_array = [
        '#theme' => 'jango_shortcodes_app_showcase_bg_type_1',
        '#path_to_theme' => $path_to_theme,
        '#url' => $url,
        '#label' => $attrs['label'],
        '#description' => $attrs['description'],
        '#label2' => $attrs['label2'],
        '#description2' => $attrs['description2'],
        '#label3' => $attrs['label3'],
        '#description3' => $attrs['description3'],
        '#label4' => $attrs['label4'],
        '#description4' => $attrs['description4'],
      ];
      $output = $this->render($theme_array);
    }
    else {
      $theme_array = [
        '#theme' => 'jango_shortcodes_app_showcase',
        '#path_to_theme' => $path_to_theme,
        '#url' => $url,
        '#label' => $attrs['label'],
        '#description' => $attrs['description'],
        '#label2' => $attrs['label2'],
        '#description2' => $attrs['description2'],
        '#label3' => $attrs['label3'],
        '#description3' => $attrs['description3'],
        '#label4' => $attrs['label4'],
        '#description4' => $attrs['description4'],
      ];
      $output = $this->render($theme_array);
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $bg_type = [
      '1' => 'Dark',
      '2' => 'Light',
    ];
    $form['bg_type'] = [
      '#type' => 'select',
      '#options' => $bg_type,
      '#title' => t('Background'),
      '#default_value' => isset($attrs['bg_type']) ? $attrs['bg_type'] : '1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Background in mobile'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#attributes' => ['class' => ['image-media-upload hidden']],
      '#field_suffix' => '<div class="preview-image"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') . '</a><a href="#" class="gallery-remove button">' . t('Remove Image') . '</a>',
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];
    if (isset($attrs['fid']) && !empty($attrs['fid'])) {
      $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="col-sm-4"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') . '</a><a href="#" class="gallery-remove button">' . t('Remove Image') . '</a>';
      }
    }
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label (left-top)'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['description'] = [
      '#type' => 'textarea',
      '#title' => t('Description (left-top)'),
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];
    $form['label2'] = [
      '#type' => 'textfield',
      '#title' => t('Label (right-top)'),
      '#default_value' => isset($attrs['label2']) ? $attrs['label2'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['description2'] = [
      '#type' => 'textarea',
      '#title' => t('Description (right-top)'),
      '#default_value' => isset($attrs['description2']) ? $attrs['description2'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];
    $form['label3'] = [
      '#type' => 'textfield',
      '#title' => t('Label (left-bottom)'),
      '#default_value' => isset($attrs['label3']) ? $attrs['label3'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['description3'] = [
      '#type' => 'textarea',
      '#title' => t('Description (left-bottom)'),
      '#default_value' => isset($attrs['description3']) ? $attrs['description3'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];
    $form['label4'] = [
      '#type' => 'textfield',
      '#title' => t('Label (right-bottom)'),
      '#default_value' => isset($attrs['label4']) ? $attrs['label4'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['description4'] = [
      '#type' => 'textarea',
      '#title' => t('Description (right-bottom)'),
      '#default_value' => isset($attrs['description4']) ? $attrs['description4'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
