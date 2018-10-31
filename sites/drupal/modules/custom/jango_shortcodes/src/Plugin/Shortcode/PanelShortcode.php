<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_panel_child",
 *   title = @Translation("Panel"),
 *   description = @Translation("Panel child."),
 *   icon = "fa fa-p-square",
 * )
 */

class PanelShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['class'] .= ' row';

    $header = '';
    if (isset($attrs['header'])) {
      $header = $attrs['with_title'] ? '<h3 class="panel-title">' . $attrs['header'] . '</h3>' : $attrs['header'];
      $header = '<div class="panel-heading">' . $header . '</div>';
    }
    $body = '<div class="panel-body">' . (isset($attrs['body']) ? $attrs['body'] : '') . '</div>';
    $footer = '';
    if (isset($attrs['footer']) && !empty($attrs['footer'])) {
      $footer = '<div class="panel-footer">' . $attrs['footer'] . '</div>';
    }

    $type = isset($attrs['type']) ? $attrs['type'] : 'panel-default';
    $theme_array = [
      '#theme' => 'jango_shortcodes_panel',
      '#type' => $type,
      '#header' => $header,
      '#body' => $body,
      '#text' => $text,
      '#footer' => $footer,
    ];

    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $this->render($theme_array) . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'panel-default' => t('Default'),
      'panel-primary' => t('Primary'),
      'panel-success' => t('Success'),
      'panel-info' => t('Info'),
      'panel-warning' => t('Warning'),
      'panel-danger' => t('Danger'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('List Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'panel-default',
      '#attributes' => ['class' => ['form-control']],
    ];
    $form['header'] = [
      '#title' => t('Header'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['header']) ? $attrs['header'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['with_title'] = [
      '#title' => t('With title'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['with_title']) ? $attrs['with_title'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div></div>',
    ];
    $form['footer'] = [
      '#title' => t('Footer'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['footer']) ? $attrs['footer'] : '',
      '#attributes' => ['class' => ['form-control']],
    ];
    $form['body'] = [
      '#title' => t('Body'),
      '#type' => 'textarea',
      '#default_value' => isset($attrs['body']) ? $attrs['body'] : '',
      '#attributes' => ['class' => ['form-control']],
    ];

    return $form;
  }
}
