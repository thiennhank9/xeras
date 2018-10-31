<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_social_icon",
 *   title = @Translation("Social Icon"),
 *   description = @Translation("Social Icon."),
 *   icon = "fa fa-image",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class SocialIconShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '') . 'socicon-btn';
    $attrs['class'] .= (isset($attrs['circle']) && $attrs['circle'] ? ' ' . 'socicon-btn-circle' : '');
    $attrs['class'] .= (isset($attrs['social_icon_size']) ? ' ' . $attrs['social_icon_size'] : '');
    $attrs['class'] .= (isset($attrs['solid']) && $attrs['solid'] ? ' ' . 'socicon-solid' : '');

    if (isset($attrs['solid']) && $attrs['solid']) {
      if (!isset($attrs['social_icon_size'])) {
        $attrs['social_icon_size'] = 'default';
      }

      switch ($attrs['social_icon_size']) {
        case 'socicon-lg' :
          $attrs['class'] .= ' c-theme-bg c-font-white c-bg-red-hover';
          break;

        case 'socicon-sm' :
          $attrs['class'] .= ' c-bg-yellow c-font-white c-theme-bg-on-hover';
          break;

        default:
          $attrs['class'] .= ' c-bg-red c-font-white c-bg-green-hover';
      }
    }

    $attrs['class'] .= (isset($attrs['icon']) ? ' socicon-' . $attrs['icon'] : '') . ' tooltips';
    $tooltips = (isset($attrs['tooltips']) ? ' ' . $attrs['tooltips'] : '');

    return '<a href="' . (isset($attrs['link']) ? ' ' . $attrs['link'] : '#') . '" class = "' . $attrs['class'] . '" data-original-title="' . $tooltips . '"></a>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['icon'] = [
      '#title' => t('Social icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_social_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-5">',
      '#suffix' => '</div>'
    ];
    $social_icon_size = [
      '' => t('Default'),
      'socicon-lg' => t('Large'),
      'socicon-sm' => t('Small'),
    ];
    $form['social_icon_size'] = [
      '#type' => 'select',
      '#title' => t('Custom icon size'),
      '#options' => $social_icon_size,
      '#default_value' => isset($attrs['social_icon_size']) ? $attrs['social_icon_size'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $form['circle'] = [
      '#title' => t('Circle'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['circle']) ? $attrs['circle'] : FALSE,
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>'
    ];

    $form['solid'] = [
      '#title' => t('Solid'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['solid']) ? $attrs['solid'] : FALSE,
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div></div>'
    ];

    $form['link'] = [
      '#title' => t('Link'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    $form['tooltips'] = [
      '#type' => 'textfield',
      '#title' => t('Tooltip'),
      '#default_value' => isset($attrs['tooltips']) ? $attrs['tooltips'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div></div>'
    ];

    return $form;
  }
}
