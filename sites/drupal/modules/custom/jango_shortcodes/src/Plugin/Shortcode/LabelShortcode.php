<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_label",
 *   title = @Translation("Label"),
 *   description = @Translation("Label."),
 *   icon = "fa fa-image",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class LabelShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = (isset($attrs['class']) ? $attrs['class'] : '');
    $attrs['class'] .= $attrs['type'] . $attrs['variants'];
    $attrs['class'] .= $attrs['bold'] ? ' c-font-bold' : ' c-font-slim';

    return '<span ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . (isset($attrs['title']) ? $attrs['title'] : '') . '</span>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-12">',
      '#suffix' => '</div></div>'
    ];

    $type = [
      ' label' => t('Default'),
      'label' => t('Bootstrap'),
      'c-content-label' => t('Oswald'),
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Label type'),
      '#options' => $type,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : ' label',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $variants = [
      ' label-default' => t('Default'),
      ' label-success' => t('Success'),
      ' label-warning' => t('Warning'),
      ' label-danger' => t('Danger'),
      ' label-info' => t('Info'),
      ' label-primary' => t('Primary'),
    ];
    $form['variants'] = [
      '#type' => 'select',
      '#title' => t('Variants'),
      '#options' => $variants,
      '#default_value' => isset($attrs['variants']) ? $attrs['variants'] : ' label-default',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $colors = [
      '' => t('Default'),
      ' c-bg-blue' => t('Blue'),
      ' c-bg-red' => t('Red'),
      ' c-bg-green' => t('Green'),
      ' c-bg-yellow' => t('Yellow'),
      ' c-bg-purple' => t('Purple'),
      ' c-bg-dark' => t('Dark'),
      ' c-bg-blue-2' => t('Blue 2'),
      ' c-bg-green-2' => t('Green 2'),
      ' c-bg-yellow-2' => t('Yellow 2'),
      ' c-bg-purple-2' => t('Purple 2'),
      ' c-bg-red-2' => t('Red 2'),
      ' c-bg-dark-2' => t('Dark 2'),
    ];
    $form['color'] = [
      '#type' => 'select',
      '#title' => t('Select color'),
      '#options' => $colors,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $sizes = [
      '' => t('Default'),
      ' c-label-sm' => t('Small'),
      ' c-label-lg' => t('Large')
    ];
    $form['size'] = [
      '#type' => 'select',
      '#title' => t('Label size'),
      '#options' => $sizes,
      '#default_value' => isset($attrs['size']) ? $attrs['size'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $form['uppercase'] = [
      '#title' => t('Uppercase'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['uppercase']) ? $attrs['uppercase'] : FALSE,
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>'
    ];
    $form['bold'] = [
      '#title' => t('Bold'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['bold']) ? $attrs['bold'] : FALSE,
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>'
    ];

    return $form;
  }
}
