<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_panel",
 *   title = @Translation("Panel Box"),
 *   description = @Translation("Panel Box."),
 *   icon = "fa fa-square-o",
 *   description_field = "title",
 * )
 */

class PanelBoxShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['class'] .= 'c-content-panel';
    $attrs['class'] .= isset($attrs['dark']) && $attrs['dark'] ? ' c-bg-dark' : '';

    $theme_array = [
      '#theme' => 'jango_shortcodes_panel_box',
      '#dark' => isset($attrs['dark']) && $attrs['dark'] ? ' c-bg-dark-1 c-bg-dark-1-font' : '',
      '#title' => isset($attrs['title']) ? $attrs['title'] : '',
      '#text' => $text,
    ];

    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $this->render($theme_array) . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['title'] = [
      '#title' => t('Title'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['dark'] = [
      '#title' => t('Dark background'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['dark']) ? $attrs['dark'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
