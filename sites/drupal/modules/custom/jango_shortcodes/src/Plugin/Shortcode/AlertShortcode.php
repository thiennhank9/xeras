<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_alert",
 *   title = @Translation("Alert"),
 *   description = @Translation("Alert."),
 *   icon = "fa fa-exclamation",
 *   child_shortcode = "html",
 * )
 */

class AlertShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '');
    $attrs['class'] .= ' alert';
    $attrs['class'] .= (isset($attrs['type']) ? ' ' . $attrs['type'] : '');
    $attrs['class'] .= (isset($attrs['dismissible']) && $attrs['dismissible'] ? ' alert-dismissible' : '');

    $button = '';
    if (isset($attrs['dismissible']) && $attrs['dismissible']) {
      $button = '<button class="close" aria-label="Close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>';
    }

    if (isset($attrs['text_link']) && $attrs['text_link']) {
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' role="alert">' . $attrs['text'] . '<a class="c-font-slim" href="' . $attrs['link'] . '"> ' . $attrs['text_link'] . '</a>' . $button . '</div>';
    }
    else {
      $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' role="alert">' . $attrs['text'] . $button . '</div>';
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'alert-success' => t('Succes'),
      'alert-info' => t('Info'),
      'alert-warning' => t('Warning'),
      'alert-danger' => t('Danger'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Type'),
      '#options' => $type,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['text'] = [
      '#type' => 'textfield',
      '#title' => t('Text'),
      '#default_value' => isset($attrs['text']) ? $attrs['text'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['text_link'] = [
      '#type' => 'textfield',
      '#title' => t('Text link'),
      '#default_value' => isset($attrs['text_link']) ? $attrs['text_link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link'),
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];
    $form['dismissible'] = [
      '#title' => t('Dismissible'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['dismissible']) ? $attrs['dismissible'] : FALSE,
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>'
    ];

    return $form;
  }
}
