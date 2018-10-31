<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * @Shortcode(
 *   id = "nd_tabbeds",
 *   title = @Translation("Tabbed container"),
 *   child_shortcode = "nd_tabbed",
 *   description = @Translation("Tabbed container."),
 *   icon = "fa fa-minus",
 *   description_field = "title"
 * )
 */

class TabbedContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $tabs_content;
    global $tabs_counter;

    $tabs_counter = !$tabs_counter ? 1 : $tabs_counter + 1;
    $output = '';

    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '') . 'tab-content';
    $attributes = _jango_shortcodes_shortcode_attributes($attrs);

    switch ($attrs['type']) {
      case'type_1':
        $uri = isset($attrs['fid']) ? File::load($attrs['fid'])->getFileUri() : '';
        $theme_array = [
          '#theme' => 'jango_shortcodes_tabbed_container_type_1',
          '#text' => $text,
          '#tabs_content' => $tabs_content,
          '#url' => file_create_url($uri),
          '#attrs' => $attributes
        ];
        $output = $this->render($theme_array);
        break;

      case'type_2':
        $theme_array = [
          '#theme' => 'jango_shortcodes_tabbed_container_type_2',
          '#class' => $attrs['menu_type'] == 3 ? 'c-content-tab-3 c-opt-1' : 'c-content-tab-4 c-opt-5',
          '#class_ul' => $attrs['menu_type'] == 3 ? 'nav c-theme-nav' : 'nav nav-justified',
          '#text' => $text,
          '#tabs_content' => $tabs_content,
          '#attrs' => $attributes
        ];
        $output = $this->render($theme_array);
        break;

      case'type_3':
        $theme_array = [
          '#theme' => 'jango_shortcodes_tabbed_container_type_3',
          '#bg_type' => $attrs['bg_type'],
          '#text' => $text,
          '#tabs_content' => $tabs_content,
          '#attrs' => $attributes
        ];
        $output = $this->render($theme_array);
        break;
    }
    $tabs_counter = 0;
    $tabs_content = '';

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'type_1' => 'Tabbed has icon',
      'type_2' => 'Tabbed default',
      'type_3' => 'Tabbed colored',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'carousel',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
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


    $bg_type = [
      '3' => 'Default',
      '4' => 'Dark',
    ];
    $form['bg_type'] = [
      '#type' => 'select',
      '#options' => $bg_type,
      '#title' => t('Background type'),
      '#default_value' => isset($attrs['bg_type']) ? $attrs['bg_type'] : '3',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_3']],
      ],
    ];
    $menu_type = [
      '3' => 'Gray',
      '4' => 'Blue',
    ];
    $form['menu_type'] = [
      '#type' => 'select',
      '#options' => $menu_type,
      '#title' => t('Menu type'),
      '#default_value' => isset($attrs['menu_type']) ? $attrs['menu_type'] : '3',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];

    return $form;
  }
}
