<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_table_row_td",
 *   title = @Translation("Table row cell"),
 *   description = @Translation("Table row cell container."),
 *   icon = "fa fa-th",
 *   child_shortcode = "html",
 * )
 */

class TableRowCellShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] . ' ' : '');
    if (isset($attrs['type_scope'])) {
      $scope = ' scope="' . $attrs['type_scope'] . '"';
    }
    else {
      $scope = '';
    }
    if ($attrs['type_cell'] == 'td') {
      $text = '<td ' . _jango_shortcodes_shortcode_attributes($attrs) . $scope . '>' . $text . '</td>';
    }
    if ($attrs['type_cell'] == 'th') {
      $text = '<th ' . _jango_shortcodes_shortcode_attributes($attrs) . $scope . '>' . $text . '</th>';
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type_scope = [
      '' => t('Default'),
      'col' => t('Col'),
      'row' => t('Row'),
      'colgroup' => t('Colgroup'),
      'rowgroup' => t('Rowgroup'),
    ];
    $form['type_scope'] = [
      '#type' => 'select',
      '#options' => $type_scope,
      '#title' => t('Type Scope'),
      '#default_value' => isset($attrs['type_scope']) ? $attrs['type_scope'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];

    $type_cell = ['td' => t('TD'), 'th' => t('TH')];
    $form['type_cell'] = [
      '#type' => 'select',
      '#options' => $type_cell,
      '#title' => t('Place in'),
      '#default_value' => isset($attrs['type_cell']) ? $attrs['type_cell'] : 'td',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
