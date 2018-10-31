<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_gmap_info",
 *   title = @Translation("Google map info"),
 *   description = @Translation("Google map info."),
 *   icon = "fa fa-h-square",
 *   description_field = "title"
 * )
 */

class GmapInfoShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $social_links = '';
    if (isset($attrs['l_twitter']) && !empty($attrs['l_twitter'])) {
      $social_links .= '<li><a href="' . $attrs['l_twitter'] . '"><i class="fa fa-twitter"></i></a></li>';
    }
    if (isset($attrs['l_facebook']) && !empty($attrs['l_facebook'])) {
      $social_links .= '<li><a href="' . $attrs['l_facebook'] . '"><i class="fa fa-facebook"></i></a></li>';
    }
    if (isset($attrs['l_youtube']) && !empty($attrs['l_youtube'])) {
      $social_links .= '<li><a href="' . $attrs['l_youtube'] . '"><i class="fa fa-youtube-play"></i></a></li>';
    }
    if (isset($attrs['l_linkedin']) && !empty($attrs['l_linkedin'])) {
      $social_links .= '<li><a href="' . $attrs['l_linkedin'] . '"><i class="fa fa-linkedin"></i></a></li>';
    }
    $theme_array = [
      '#theme' => 'jango_shortcodes_gmap_info',
      '#label' => $attrs['label'],
      '#address' => restore_html_string($attrs['address']),
      '#contacts' => restore_html_string($attrs['contacts']),
      '#text' => $social_links,
    ];

    return $this->render($theme_array);
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['label'] = [
      '#title' => t('Label'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>'
    ];
    $form['address'] = [
      '#title' => t('Address'),
      '#type' => 'textarea',
      '#default_value' => isset($attrs['address']) ? $attrs['address'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['contacts'] = [
      '#title' => t('Contacts'),
      '#type' => 'textarea',
      '#default_value' => isset($attrs['contacts']) ? $attrs['contacts'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    $form['l_twitter'] = [
      '#title' => t('Link twitter'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['l_twitter']) ? $attrs['l_twitter'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['l_facebook'] = [
      '#title' => t('Link facebook'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['l_facebook']) ? $attrs['l_facebook'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    $form['l_youtube'] = [
      '#title' => t('Link youtube'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['l_youtube']) ? $attrs['l_youtube'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['l_linkedin'] = [
      '#title' => t('Link linkedin'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['l_linkedin']) ? $attrs['l_linkedin'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
