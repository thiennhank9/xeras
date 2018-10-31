<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_icon",
 *   title = @Translation("Icon"),
 *   description = @Translation("Icon with its name."),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-image",
 * )
 */
class IconShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class']  = isset($attrs['type']) ? $attrs['type'] . ' ' : '';
    $attrs['class'] .= isset($attrs['bg_color']) ? $attrs['bg_color'] . ' ' : '';
    $output = '';
    if (isset($attrs['icon'])) {
      $attrs['class'] .= $attrs['icon'];
      $output = '<i ' . _jango_shortcodes_shortcode_attributes($attrs) . (isset($attrs['size']) ? ' style = "font-size:' . $attrs['size'] . 'px;"' : '') . '></i>';
    }
    elseif (isset($attrs['custom_icon'])) {
      $attrs['class'] .= 'c-content-line-icon ' . (isset($attrs['custom_icon_size']) ? $attrs['custom_icon_size'] : '');
      $attrs['class'] .= ' ' . $attrs['custom_icon'];
      $output = '<i ' . _jango_shortcodes_shortcode_attributes($attrs) . '></i>';
    }

    return isset($attrs['link']) ?  '<a href="' . $attrs['link'] . '" target = "_blank">' . $output . '</a> ' : $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['icon'] = [
      '#title' => t('Awesome, SimpleLine, Glyphicon Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['size'] = [
      '#title' => t('Icon size (px)'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['size']) ? $attrs['size'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $types = ['' => t('Default'), 'nd-icon-square' => t('Square')];
    $form['type'] = [
      '#title' => t('Type'),
      '#type' => 'select',
      '#options' => $types,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $bg_colors = ['' => t('None'), 'nd-bg-dark' => t('Dark'), 'nd-bg-grey' => t('Grey')];
    $form['bg_color'] = [
      '#title' => t('BG Color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['bg_color']) ? $attrs['bg_color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $form['link'] = [
      '#title' => t('Link'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-12">',
      '#suffix' => '</div></div>',
    ];
    $form['custom_icon'] = [
      '#title' => t('Custom Icon'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_custom_line_icons_autocomplete',
      '#default_value' => isset($attrs['custom_icon']) ? $attrs['custom_icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
      '#suffix' => '</div>'
    ];

    $custom_icon_size = [
      '' => t('Default'),
      'c-icon-md' => t('Middle'),
      'c-icon-sm' => t('Small')
    ];
    $form['custom_icon_size'] = [
      '#type' => 'select',
      '#title' => t('Custom icon size'),
      '#options' => $custom_icon_size,
      '#default_value' => isset($attrs['custom_icon_size']) ? $attrs['custom_icon_size'] : ' label',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
