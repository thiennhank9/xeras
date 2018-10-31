<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_feature",
 *   title = @Translation("Feature"),
 *   description = @Translation("Feature Box"),
 *   icon = "fa fa-gears",
 * )
 */
class FeatureShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['type'] = isset($attrs['type']) ? $attrs['type'] : '';
    //$colored = isset($attrs['colored']) && $attrs['colored'] ? ' color' : '';

    $icon = '';
    if(isset($attrs['icon'])) {
      $icon_class = strpos($attrs['icon'], 'c-icon-') !== false ? 'c-content-line-icon c-theme ' . $attrs['icon'] : 'icon-font c-theme-font ' . $attrs['icon'];
      $icon = '<div class="' . $icon_class . '"></div>';
    }
    $align = $attrs['type'] == 'alt-features' ? 'align-left' : '';
    if ($icon != '') {
      $text = isset($text) && $text <> '' ? '<div class="' . $attrs['type'] . '-descr ' . $align . '">' . $text . '</div>' : '';
      $text = $icon . (isset($attrs['text']) ? '<h3 class="' . 'c-font-uppercase c-font-bold">' . $attrs['text'] . '</h3>' : '') . $text;
    }
    else {
      $text = (isset($attrs['text']) ? '<h4 class="mt-0 font-alt">' . $attrs['text'] . '</h4>' : '') . $text;
      $text = '<div class="' . $attrs['type'] . '-descr ' . $align . '">' . $text . '</div>';
    }
    $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div>';
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['text'] = [
      '#title' => t('Text'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['text']) ? $attrs['text'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['icon'] = [
      '#title' => t('Icon'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $type = [
      'alt-features' => t('Big Icon'),
      'medium' => t('Medium Icon'),
      'features' => t('Features'),
      'benefit' => t('Benefit'),
      'alt-service' => t('Left Small Icon'),
      'ci' => t('Contact'),
      'round_background' => t('Round Background'),
      'service' => t('Active Background'),
    ];
    $form['type'] = [
      '#title' => t('Type'),
      '#type' => 'select',
      '#options' => $type,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'alt-features',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    return $form;
  }
}
