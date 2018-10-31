<?php

/**
 * @file
 * Contains \Drupal\jango_cms\Plugin\Shortcode\ButtonShortcode.
 */

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * The image shortcode.
 *
 * @Shortcode(
 *   id = "nd_accordion",
 *   title = @Translation("Accordion Item"),
 *   description = @Translation("Accordion Item"),
 *   child_shortcode = "nd_accordion",
 *   icon = "fa fa-minus",
 *   description_field = "title"
 * )
 */
class AccordionShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $accordion_count;
    $attrs['icon'] = isset($attrs['icon']) && $attrs['icon'] ? $attrs['icon'] : '';
    $id = rand(0, 10000000);

    if (isset($attrs['active']) && $attrs['active'] == 1) {
      $link_title = '';
      $link_content = 'in';
      $expanded = 'aria-expanded="true"';
      $style = '';
    }
    else {
      $link_title = 'collapsed';
      $link_content = '';
      $expanded = 'aria-expanded="false"';
      $style = 'height: 0px;';
    }

    $theme_array = [
      '#theme' => 'jango_shortcodes_accordion',
      '#link_title' => $link_title,
      '#accordion_count' => $accordion_count + 1,
      '#id' => $id,
      '#aria_expanded' => $expanded,
      '#icon' => $attrs['icon'],
      '#title' => $attrs['title'],
      '#link_content' => $link_content,
      '#style' => $style,
      '#text' => $text,
    ];

    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="panel">' . $this->render($theme_array) . '</div>';
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
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['icon'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>'
    ];
    $form['active'] = [
      '#title' => t('Item active'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['active']) ? $attrs['active'] : TRUE,
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
