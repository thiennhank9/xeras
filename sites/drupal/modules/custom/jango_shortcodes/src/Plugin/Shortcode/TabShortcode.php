<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_tab",
 *   title = @Translation("Tab"),
 *   description = @Translation("Tab"),
 *   icon = "fa fa-folder",
 *   description_field = "title"
 * )
 */
class TabShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $tab_counter;
    global $tab_content;
    $tab_counter++;

    // Tab Link
    $color = isset($attrs['color']) && $attrs['color'] ? 'class="' . $attrs['color'] . '" ' : '';
    $class = isset($attrs['active']) && $attrs['active'] ? 'class="active"' : '';
    $output = '<li ' . $class . '><a ' . $color . 'data-toggle="tab" href="#tab-' . $tab_counter . '" aria-expanded="' . (isset($attrs['active']) && $attrs['active'] ? 'true' : 'false') . '">' . (isset($attrs['title']) ? $attrs['title'] : '') . '</a></li>';

    // Tab Content
    $attrs['class']  = (isset($attrs['class']) ? $attrs['class'] : '') . ' tab-pane';
    $attrs['class'] .= isset($attrs['active']) && $attrs['active'] ? ' active' : '';
    $attrs['id'] = 'tab-' . $tab_counter;
    $tab_content .= '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div>';

    return $output;
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

    $form['active'] = [
      '#title' => t('Active'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['active']) ? $attrs['active'] : FALSE,
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>'
    ];

    $color = [
      '' => t('Default'),
      ' c-border-red' => t('Red'),
      ' c-border-purple' => t('Purple')
    ];
    $form['color'] = [
      '#type' => 'select',
      '#title' => t('Tab border color'),
      '#options' => $color,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    return $form;
  }
}
