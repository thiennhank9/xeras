<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_social_button",
 *   title = @Translation("Social button link"),
 *   description = @Translation("Social button link."),
 *   icon = "fa fa-bold",
 *   description_field = "text",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class SocialButtonLinkShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '');
    $attrs['class'] .= ' btn btn-block btn-social c-btn-square c-btn-uppercase btn-md';
    $attrs['class'] .= (isset($attrs['color']) ? ' ' . $attrs['color'] : '');

    $text = isset($attrs['text']) ? $attrs['text'] : '';
    if (isset($attrs['icon']) && $attrs['icon']) {
      if (isset($attrs['icon_position']) && $attrs['icon_position']) {
        $text = '<i class="' . $attrs['icon'] . '"></i> ' . $text;
      }
      else {
        $text = '<i class="' . $attrs['icon'] . '"></i>' . $text;
      }
    }
    return '<a ' . _jango_shortcodes_shortcode_attributes($attrs) . ' href="' . $attrs['link'] . '">' . $text . '</a>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['icon'] = [
      '#title' => t('Awesome+SimpleLine+Glyphicon Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
    ];

    $colors = [
      'btn-adn' => t('App.net'),
      'btn-bitbucket' => t('bitbucket'),
      'btn-dropbox' => t('dropbox'),
      'btn-facebook' => t('facebook'),
      'btn-flickr' => t('flickr'),
      'btn-foursquare' => t('foursquare'),
      'btn-github' => t('github'),
      'btn-google' => t('google'),
      'btn-instagram' => t('instagram'),
      'btn-linkedin' => t('linkedin'),
      'btn-microsoft' => t('microsoft'),
      'btn-openid' => t('openid'),
      'btn-pinterest' => t('pinterest'),
      'btn-reddit' => t('reddit'),
      'btn-soundcloud' => t('soundcloud'),
      'btn-tumblr' => t('tumblr'),
      'btn-twitter' => t('twitter'),
      'btn-vimeo' => t('vimeo'),
      'btn-vk' => t('vk'),
      'btn-yahoo' => t('yahoo'),
    ];
    $form['color'] = [
      '#type' => 'select',
      '#title' => t('Social network'),
      '#options' => $colors,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    $form['text'] = [
      '#title' => t('Text'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['text']) ? $attrs['text'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
    ];
    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link'),
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '#',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
