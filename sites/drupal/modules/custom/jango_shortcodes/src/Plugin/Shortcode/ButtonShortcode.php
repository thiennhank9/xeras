<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_button",
 *   title = @Translation("Button"),
 *   description = @Translation("Button Link"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-bold",
 * )
 */
class ButtonShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '');
    $attrs['class'] .= ' btn';
    $attrs['class'] .= (isset($attrs['size']) ? ' ' . $attrs['size'] : '');
    $role = '';
    if (!isset($attrs['color'])) {
      $attrs['class'] .= (isset($attrs['variants']) ? ' ' . $attrs['variants'] : '');
      $role = 'role="button"';
    }
    $attrs['class'] .= (isset($attrs['color']) ? ' ' . $attrs['color'] : '');
    $attrs['class'] .= (isset($attrs['button_state']) ? ' ' . $attrs['button_state'] : '');
    $attrs['class'] .= (isset($attrs['block']) && $attrs['block'] ? ' btn-block' : '');
    $attrs['class'] .= (isset($attrs['display']) ? ' ' . $attrs['display'] : '');
    $attrs['class'] .= (isset($attrs['uppercase']) && $attrs['uppercase'] ? ' c-btn-uppercase' : '');
    $attrs['class'] .= (isset($attrs['bold']) && $attrs['bold'] ? ' c-btn-bold' : '');
    $attrs['class'] .= (isset($attrs['border_width']) ? ' ' . $attrs['border_width'] : '');

    $text = isset($attrs['text']) ? $attrs['text'] : '';
    if (isset($attrs['icon']) && $attrs['icon']) {
      if (isset($attrs['icon_position']) && $attrs['icon_position']) {
        $text = '<i class="' . $attrs['icon'] . '"></i> ' . $text;
      }
      else {
        $text = '<i class="' . $attrs['icon'] . '"></i>' . $text;
      }
    }

    if (isset($attrs['button_type'])) {
      switch ($attrs['button_type']) {
        case 'link' :
          $text = '<a ' . _jango_shortcodes_shortcode_attributes($attrs) . ' href="' . $attrs['link'] . '" ' . $role . '>' . $text . '</a>';
          break;

        default:
          $text = '<a ' . _jango_shortcodes_shortcode_attributes($attrs) . ' href="' . $attrs['link'] . '" ' . $role . '>' . t($text) . '</a>';
      }
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $button_type = [
      'button' => t('Button'),
      'link' => t('Link'),
      'input_text' => t('Input text'),
      'input_submit' => t('Input submit')
    ];
    $form['button_type'] = [
      '#type' => 'select',
      '#title' => t('Button type'),
      '#options' => $button_type,
      '#default_value' => isset($attrs['button_type']) ? $attrs['button_type'] : 'button',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
    ];

    $displays = [
      '' => t('Default'),
      'c-btn-square' => t('Square'),
      'c-btn-circle' => t('Circle')
    ];
    $form['display'] = [
      '#type' => 'select',
      '#title' => t('Display'),
      '#options' => $displays,
      '#default_value' => isset($attrs['display']) ? $attrs['display'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-3">',
    ];

    $sizes = [
      '' => t('Default'),
      'btn-xlg' => t('Extra large'),
      'btn-lg' => t('Large'),
      'btn-md' => t('Middle'),
      'btn-sm' => t('Small'),
      'btn-xs' => t('Extra small')
    ];
    $form['size'] = [
      '#type' => 'select',
      '#title' => t('Size'),
      '#options' => $sizes,
      '#default_value' => isset($attrs['size']) ? $attrs['size'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-3">',
    ];

    $color = [
      '' => t('Default'),
      'c-theme-btn' => t('Theme color'),
      'c-btn-blue' => t('Blue'),
      'c-btn-green' => t('Green'),
      'c-btn-red' => t('Red'),
      'c-btn-yellow' => t('Yellow'),
      'c-btn-purple' => t('Purple'),
      'c-btn-dark' => t('Dark'),
      'c-btn-grey' => t('Grey'),
      'c-btn-blue-1' => t('Blue 1'),
      'c-btn-green-1' => t('Green 1'),
      'c-btn-red-1' => t('Red 1'),
      'c-btn-yellow-1' => t('Yellow 1'),
      'c-btn-purple-1' => t('Purple 1'),
      'c-btn-dark-1' => t('Dark 1'),
      'c-btn-grey-1' => t('Grey 1'),
      'c-btn-blue-2' => t('Blue 2'),
      'c-btn-green-2' => t('Green 2'),
      'c-btn-red-2' => t('Red 2'),
      'c-btn-yellow-2' => t('Yellow 2'),
      'c-btn-purple-2' => t('Purple 2'),
      'c-btn-dark-2' => t('Dark 2'),
      'c-btn-grey-2' => t('Grey 2'),
      'c-btn-white' => t('White'),
    ];
    $form['color'] = [
      '#type' => 'select',
      '#title' => t('Color'),
      '#options' => $color,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];

    $form['text'] = [
      '#title' => t('Text'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['text']) ? $attrs['text'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
    ];
    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link'),
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '#',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-4">',
    ];
    $variants = [
      ' btn-default' => t('Default'),
      ' btn-success' => t('Success'),
      ' btn-warning' => t('Warning'),
      ' btn-danger' => t('Danger'),
      ' btn-info' => t('Info'),
      ' btn-primary' => t('Primary'),
      'btn-link' => t('Link')
    ];
    $form['variants'] = [
      '#type' => 'select',
      '#title' => t('Variants'),
      '#options' => $variants,
      '#default_value' => isset($attrs['variants']) ? $attrs['variants'] : ' btn-default',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];

    $form['icon'] = [
      '#title' => t('FontAwesome Icon'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
    ];

    $icon_position = ['' => t('Backward'), 'beside' => t('Beside')];
    $form['icon_position'] = [
      '#type' => 'select',
      '#title' => t('Icon position'),
      '#options' => $icon_position,
      '#default_value' => isset($attrs['icon_position']) ? $attrs['icon_position'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-4">',
    ];

    $button_state = [
      '' => t('Default'),
      'active' => t('Active'),
      'disabled' => t('Disabled')
    ];
    $form['button_state'] = [
      '#type' => 'select',
      '#title' => t('Button state'),
      '#options' => $button_state,
      '#default_value' => isset($attrs['button_state']) ? $attrs['button_state'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '</div><div class = "col-sm-4">',
      '#suffix' => '</div></div>'
    ];

    $form['uppercase'] = [
      '#title' => t('Uppercase'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['uppercase']) ? $attrs['uppercase'] : FALSE,
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>'
    ];
    $form['bold'] = [
      '#title' => t('Bold'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['bold']) ? $attrs['bold'] : FALSE,
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>'
    ];

    $form['block'] = [
      '#type' => 'checkbox',
      '#title' => t('Display as block'),
      '#default_value' => isset($attrs['block']) ? $attrs['block'] : FALSE,
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $border_width = [
      '' => t('Default'),
      'c-btn-border-1x' => t('1px'),
      'c-btn-border-2x' => t('2px')
    ];
    $form['border_width'] = [
      '#type' => 'select',
      '#title' => t('Border width'),
      '#options' => $border_width,
      '#default_value' => isset($attrs['border_width']) ? $attrs['border_width'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>'
    ];

    return $form;
  }
}
