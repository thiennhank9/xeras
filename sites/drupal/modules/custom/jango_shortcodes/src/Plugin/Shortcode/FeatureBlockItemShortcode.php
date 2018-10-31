<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;

/**
 * @Shortcode(
 *   id = "nd_feature_block",
 *   title = @Translation("Feature block item"),
 *   description = @Translation("Feature block item."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 * )
 */

class FeatureBlockItemShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output = $text;
    switch ($attrs['type']) {
      case 'type_1':
        $theme_array = [
          '#theme' => 'jango_shortcodes_feature_block_item_type_1',
          '#icon' => $attrs['icon'],
          '#label' => $attrs['label'],
          '#text' => $text,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="col-sm-6 c-feature-13-tile">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'type_2':
        $output  = '<li ' . _jango_shortcodes_shortcode_attributes($attrs) . '>';
        $output .= '<div class="c-card c-bg-opacity-' . $attrs['bg_type'] . '">' . $text . '</div>';
        $output .= '</li>';
        break;

      case 'type_3':
        $url = '';
        if (isset($attrs['fid']) && !empty($attrs['fid'])) {
          $uri = File::load($attrs['fid'])->getFileUri();
          $url = file_create_url($uri);
        }
        $theme_array = [
          '#theme' => 'jango_shortcodes_feature_block_item_type_3',
          '#label' => $attrs['label'],
          '#text' => $text,
          '#link' => $attrs['link'],
          '#button_label' => isset($attrs['link_label']) ? $attrs['link_label'] : FALSE,
          '#url' => $url,
        ];
        $output = $this->render($theme_array);
        break;

      case 'type_4':
        $theme_array = [
          '#theme' => 'jango_shortcodes_feature_block_item_type_4',
          '#icon' => $attrs['icon'],
          '#text' => $text,
        ];
        $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-feature-13-tile">';
        $output .= $this->render($theme_array);
        $output .= '</div>';
        break;

      case 'type_5':
        global $count;
        $count++;
        if ($count % 2 != 0) {
          $theme_array = [
            '#theme' => 'jango_shortcodes_feature_block_item_type_5_right',
            '#icon' => $attrs['icon'],
            '#text' => $text,
            '#border' => $attrs['border'],
          ];
          $output  = '<ul class="c-list">';
          $output .= '<li ' . _jango_shortcodes_shortcode_attributes($attrs) . '>';
          $output .= $this->render($theme_array);
          $output .= '</li><div class="c-border-middle c-bg-opacity-2"></div>';
        }
        else {
          $theme_array = [
            '#theme' => 'jango_shortcodes_feature_block_item_type_5_left',
            '#icon' => $attrs['icon'],
            '#text' => $text,
            '#border' => $attrs['border'],
          ];
          $output = '<li ' . _jango_shortcodes_shortcode_attributes($attrs) . '>';
          $output .= $this->render($theme_array);
          $output .= '</li></ul>';
        }
        break;

      case 'type_6':
        global $count;
        $count++;
        if ($count % 2 != 0) {
          $theme_array = [
            '#theme' => 'jango_shortcodes_feature_block_item_type_6_right',
            '#icon' => $attrs['icon'],
            '#text' => $text,
            '#border' => $attrs['border'],
          ];
          $output  = '<ul class="c-list">';
          $output .= $this->render($theme_array);
        }
        else {
          $theme_array = [
            '#theme' => 'jango_shortcodes_feature_block_item_type_6_left',
            '#icon' => $attrs['icon'],
            '#text' => $text,
            '#border' => $attrs['border'],
          ];
          $output = $this->render($theme_array);
          $output .= '</ul>';
        }
        break;

      case 'type_7':
        global $count;
        $count++;

        if ($count % 2 != 0) {
          $theme_array = [
            '#theme' => 'jango_shortcodes_feature_block_item_type_7_right',
            '#bg_color' => $attrs['bg_color'],
            '#icon' => $attrs['icon'],
            '#text' => $text,
          ];
          $output  = '<ul class="c-list">';
          $output .= $this->render($theme_array);
        }
        else {
          $theme_array = [
            '#theme' => 'jango_shortcodes_feature_block_item_type_7_left',
            '#bg_color' => $attrs['bg_color'],
            '#icon' => $attrs['icon'],
            '#text' => $text,
          ];
          $output = $this->render($theme_array);
          $output .= '</ul>';
        }
        break;

      case 'type_8':
        global $count_2;
        $count_2++;

        $theme_array = [
          '#theme' => 'jango_shortcodes_feature_block_item_type_8',
          '#icon' => $attrs['icon'],
          '#class' => $attrs['bg_type'] == '1' ? 'c-font-white c-font-27 c-bg-blue-7 c-float-left' : 'c-font-blue-1-5 c-font-27 c-bg-white c-float-left',
          '#text' => $text,
        ];

        switch ($count_2) {
          case 1:
            $output = '<ul class="c-list">';
            $output .= $this->render($theme_array);
            break;

          case 2:
            $output = $this->render($theme_array);
            break;

          case 3:
            $output = $this->render($theme_array);
            $output .= '</ul>';
            $count_2 = 0;
            break;
        }
        break;

      case 'type_9':
        global $count_3;
        $count_3++;

        $bg_type = $attrs['bg_type'] == 1 ? 2 : 1;
        if ($count_3 % 2 != 0) {
          $output  = '<ul class="c-grid"><li>';
          $output .= '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-card c-font-right c-bg-opacity-' . $bg_type . '">' . $text . '</div>';
          $output .= '</li>';
          if ($attrs['check_image'] == 1) {
            $output = '<ul class="c-grid"><li><div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-card c-img c-bg-img-center"></div></li>';
          }
        }
        else {
          $output = '<li><div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-card c-bg-opacity-' . $bg_type . '">' . $text . '</div></li></ul>';
          $count_3 = 0;
          if ($attrs['check_image'] == 1) {
            $output = '<li><div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-card c-img c-bg-img-center"></div></li></ul>';
          }
        }
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
      'type_1' => 'Feature block Grid',
      'type_2' => 'Feature block List',
      'type_3' => 'Feature block with a button',
      'type_4' => 'Feature block List vertical',
      'type_5' => 'Feature block with a border',
      'type_6' => 'Feature block with a border (dark)',
      'type_7' => 'Feature block with fill background',
      'type_8' => 'Feature group list',
      'type_9' => 'Feature big opacity block',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'type_1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['icon'] = [
      '#title' => t('Icon'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_1'],
            ['value' => 'type_4'],
            ['value' => 'type_5'],
            ['value' => 'type_6'],
            ['value' => 'type_8'],
          ],
        ],
      ],
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_1'],
            ['value' => 'type_3'],
          ],
        ],
      ],
    ];
    $bg_type = [
      '1' => 'Light',
      '2' => 'Dark',
    ];
    $form['bg_type'] = [
      '#type' => 'select',
      '#options' => $bg_type,
      '#title' => t('Background type'),
      '#default_value' => isset($attrs['bg_type']) ? $attrs['bg_type'] : '1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_2'],
            ['value' => 'type_8'],
            ['value' => 'type_9'],
          ],
        ],
      ],
    ];
    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#attributes' => ['class' => ['image-media-upload hidden']],
      '#field_suffix' => '<a href="#" class="media-upload button">' . t('Upload Image') . '</a><a href="#" class="media-remove button">' . t('Remove Image') . '</a>',
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_3'],
          ],
        ],
      ],
    ];
    if (isset($attrs['fid']) && !empty($attrs['fid'])) {
      $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="col-sm-6"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') . '</a><a href="#" class="gallery-remove button">' . t('Remove Image') . '</a>';
      }
    }
    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link for button'),
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_3'],
          ],
        ],
      ],
    ];
    $form['border'] = [
      '#type' => 'checkbox',
      '#title' => t('Border'),
      '#default_value' => isset($attrs['border']) ? $attrs['border'] : TRUE,
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_5'],
            ['value' => 'type_6'],
          ],
        ],
      ],
    ];
    $bg_color = [
      'white' => 'White',
      'dark' => 'Dark',
      'green' => 'Green',
      'blue' => 'Blue',
      'yellow' => 'Yellow',
      'red' => 'Red',
    ];
    $form['bg_color'] = [
      '#type' => 'select',
      '#options' => $bg_color,
      '#title' => t('Background color'),
      '#default_value' => isset($attrs['bg_color']) ? $attrs['bg_color'] : 'bg_color',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_7']],
      ],
    ];
    $form['check_image'] = [
      '#type' => 'checkbox',
      '#title' => t('This block background image'),
      '#default_value' => isset($attrs['check_image']) ? $attrs['check_image'] : FALSE,
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_9'],
          ],
        ],
      ],
    ];
    $form['link_label'] = [
      '#type' => 'textfield',
      '#title' => t('Label for button'),
      '#default_value' => isset($attrs['link_label']) ? $attrs['link_label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-6">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          '#edit-type' => [
            ['value' => 'type_3'],
          ],
        ],
      ],
    ];

    return $form;
  }
}
