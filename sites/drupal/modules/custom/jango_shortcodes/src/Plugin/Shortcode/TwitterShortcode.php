<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_twitter",
 *   title = @Translation("Twitter"),
 *   description = @Translation("Twitter."),
 *   icon = "fa fa-twitter",
 *   description_field = "link",
 * )
 */

class TwitterShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = 'c-twitter';
    $theme_array = [
      '#theme' => 'jango_shortcodes_twitter',
      '#text' => $text,
      '#url' => isset($attrs['url']) ? $attrs['url'] : '',
      '#bg' => isset($attrs['bg']) ? 'data-theme="' . $attrs['bg'] . '"' : '',
      '#limit' => isset($attrs['limit']) ? $attrs['limit'] : 2,
    ];
    $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>';
    $output .= $this->render($theme_array);
    $output .= '</div>';

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['url'] = [
      '#type' => 'textfield',
      '#title' => t('Twitter Url'),
      '#default_value' => isset($attrs['url']) ? $attrs['url'] : '//twitter.com/YOUR_ACCOUNT_ID',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>'
    ];
    $form['limit'] = [
      '#type' => 'textfield',
      '#title' => t('Limit'),
      '#default_value' => isset($attrs['limit']) ? $attrs['limit'] : 2,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>'
    ];
    $form['bg'] = [
      '#type' => 'select',
      '#title' => t('Background'),
      '#options' => ['' => t('Default'), 'dark' => t('Dark')],
      '#default_value' => isset($attrs['bg']) ? $attrs['bg'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>'
    ];

    return $form;
  }
}
