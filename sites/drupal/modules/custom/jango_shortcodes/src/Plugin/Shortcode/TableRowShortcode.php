<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_table_row",
 *   title = @Translation("Table row"),
 *   description = @Translation("Table row container."),
 *   icon = "fa fa-th",
 *   child_shortcode = "nd_table_row_td",
 * )
 */

class TableRowShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    $attrs['class'] .= isset($attrs['type']) ? $attrs['type'] : '';
    global $body_counter;

    if ($attrs['type_position'] == 'header') {
      return '<thead><tr ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</tr></thead>';
    }
    if ($attrs['type_position'] == 'body') {
      $body_counter++;
      if ($body_counter == 1) {
        $text = '<tbody><tr ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</tr>';
      }
      else {
        $text = '<tr ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</tr>';
      }
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      '' => t('Default'),
      'active' => t('Active'),
      'success' => t('Success'),
      'info' => t('Info'),
      'warning' => t('Warning'),
      'danger' => t('Danger'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];

    $type_position = ['body' => t('Body'), 'header' => t('Header')];
    $form['type_position'] = [
      '#type' => 'select',
      '#options' => $type_position,
      '#title' => t('Place in'),
      '#default_value' => isset($attrs['type_position']) ? $attrs['type_position'] : 'body',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
