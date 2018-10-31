<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_table",
 *   title = @Translation("Table"),
 *   description = @Translation("Table container."),
 *   icon = "fa fa-table",
 *   child_shortcode = "nd_table_row",
 * )
 */

class TableShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    $attrs['class'] .= isset($attrs['table_type']) ? 'table ' . $attrs['table_type'] : '';
    if (isset($attrs['caption'])) {
      $caption = '<caption>' . $attrs['caption'] . '</caption>';
    }
    else {
      $caption = '';
    }
    $text = '<table ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $caption . $text . '</tbody></table>';
    if (isset($attrs['responsive']) && $attrs['responsive']) {
      $text = '<div class="table-responsive">' . $text . '</div>';
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $types = [
      ' ' => t('Default'),
      'table-striped' => t('Striped'),
      'table-bordered' => t('Bordered'),
      'table-hover' => t('Hover'),
      'table-condensed' => t('Condensed')
    ];
    $form['table_type'] = [
      '#type' => 'select',
      '#options' => $types,
      '#title' => t('List Type'),
      '#default_value' => isset($attrs['table_type']) ? $attrs['table_type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['responsive'] = [
      '#title' => t('Responsive'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['responsive']) ? $attrs['responsive'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];
    $form['caption'] = [
      '#title' => t('Table caption'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['caption']) ? $attrs['caption'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-12">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
