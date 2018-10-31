<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_modal",
 *   title = @Translation("Modals"),
 *   description = @Translation("Modal windows."),
 *   icon = "fa fa-tasks",
 *   description_field = "title",
 * )
 */
class ModalsShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $footer_color = 'c-theme-btn';

    switch ($attrs['type']) {
      case 'default':
        $modal_class = str_replace(" ", "", 'my_modal_' . $attrs['label']);
        $modal_d = 'my_modal';
        break;
      case 'large':
        $modal_class = str_replace(" ", "", 'bs-example-modal-lg_' . $attrs['label']);
        $modal_d = 'modal-lg';
        $footer_color = 'c-btn-dark';
        break;
      case 'small':
        $modal_class = str_replace(" ", "", 'bs-example-modal-sm_' . $attrs['label']);
        $modal_d = 'modal-sm';
        break;
      default:
        $modal_class = '';
        $modal_d = '';
        break;
    }

    $link_label = isset($attrs['link_label']) && !empty($attrs['link_label']) ? $attrs['link_label'] : FALSE;
    $theme_array = [
      '#theme' => 'jango_shortcodes_modals',
      '#modal_class' => $modal_class,
      '#label' => $attrs['label'],
      '#modal_d' => $modal_d,
      '#text' => $text,
      '#footer_color' => $footer_color,
      '#link' => isset($attrs['link']) ? $attrs['link'] : '#',
      '#link_label' => $link_label,
    ];

    $color = 'c-btn-' . $attrs['color'] . (isset($attrs['type_button']) ? ' ' . $attrs['type_button'] : '');
    $output  = '<button type="button" ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="btn ' . $color . ' c-btn-square c-btn-bold c-btn-uppercase
c-btn-square c-btn-bold c-btn-uppercase" data-toggle="modal" data-target=".' . $modal_class . '">' . $attrs['label'] . '</button>';
    $output .= $this->render($theme_array);

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'default' => 'Default',
      'large' => 'Large',
      'small' => 'Small',
    ];
    $type_button = [
      '' => 'Default',
      'c-btn-border-2x' => 'Bordered',
    ];
    $form['type_button'] = [
      '#type' => 'select',
      '#title' => t('Type Button'),
      '#options' => $type_button,
      '#default_value' => isset($attrs['type_button']) ? $attrs['type_button'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Modal size'),
      '#options' => $type,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'default',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '#edit-type-modal' => ['value' => 'default'],
        ],
      ],
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link for button'),
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['link_label'] = [
      '#type' => 'textfield',
      '#title' => t('Button Label'),
      '#default_value' => isset($attrs['link_label']) ? $attrs['link_label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $colors = [
      'red' => 'Red',
      'blue' => 'Blue',
      'green' => 'Green',
      'purple' => 'Purple',
    ];
    $form['color'] = [
      '#type' => 'select',
      '#options' => $colors,
      '#title' => t('Color'),
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
