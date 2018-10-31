<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "col",
 *   title = @Translation("Column"),
 *   description = @Translation("Column with size settings"),
 *   icon = "fa fa-columns",
 *   process_backend_callback = "_nd_visualshortcodes_backend_element",
 * )
 */
class ColShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class']  = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['class'] .= isset($attrs['paddings']) ? ' ' . $attrs['paddings'] : '';
    if (isset($attrs['phone'])) {
      $attrs['class'] .= ' col-xs-' . $attrs['phone'];
    }
    if (isset($attrs['tablet'])) {
      $attrs['class'] .= ' col-sm-' . $attrs['tablet'];
    }
    if (isset($attrs['desktop'])) {
      $attrs['class'] .= ' col-md-' . $attrs['desktop'];
    }
    if (isset($attrs['wide'])) {
      $attrs['class'] .= ' col-lg-' . $attrs['wide'];
    }

    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = nd_visualshortcodes_shortcode_col_settings($attrs, $text);
    $paddings = [
      '' => 'Default',
      'c-bs-grid-reset-space' => t('No Paddings')
    ];
    $form['paddings'] = [
      '#type' => 'select',
      '#title' => t('Paddings'),
      '#options' => $paddings,
      '#default_value' => isset($attrs['paddings']) ? $attrs['paddings'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-3">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
