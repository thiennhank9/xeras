<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_tabbed",
 *   title = @Translation("Tabbed item"),
 *   description = @Translation("Tabbed item."),
 *   icon = "fa fa-minus",
 *   description_field = "title"
 * )
 */

class TabbedShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $tabs_content;
    global $tabs_counter;
    $tabs_counter++;

    $output = $text;
    $id = rand(0, 100000);

    if(isset($attrs['icon'])) {
      $attrs['icon'] = strpos($attrs['icon'], 'c-icon-') !== false ? 'c-content-line-icon ' . $attrs['icon'] : 'icon-font ' . $attrs['icon'];
    }    

    switch ($attrs['type']) {
      case 'type_1':
        $theme_array = [
          '#theme' => 'jango_shortcodes_tabbed_item_type_1',
          '#li_class' => $tabs_counter == 1 ? ' class=active' : '',
          '#id' => $id,
          '#icon' => isset($attrs['icon']) ? $attrs['icon'] : '',
          '#label' => isset($attrs['label']) ? $attrs['label'] : '',
        ];
        $output = $this->render($theme_array);

        if (!empty($text)) {
          $theme_array = [
            '#theme' => 'jango_shortcodes_tabbed_item_type_1_tabs_content',
            '#class' => $tabs_counter == 1 ? ' in active' : '',
            '#id' => $id,
            '#text' => $text,
          ];
          $tabs_content .= $this->render($theme_array);
        }
        break;

      case 'type_2':
        $theme_array = [
          '#theme' => 'jango_shortcodes_tabbed_item_type_2',
          '#li_class' => $tabs_counter == 1 ? ' class=active' : '',
          '#a_class' => $attrs['menu_type'] == 3 ? ' c-theme-font c-font-bold' : '',
          '#id' => $id,
          '#label' => isset($attrs['label']) ? $attrs['label'] : '',
        ];
        $output = $this->render($theme_array);
        if (!empty($text)) {
          $theme_array = [
            '#theme' => 'jango_shortcodes_tabbed_item_type_2_tabs_content',
            '#class' => $tabs_counter == 1 ? ' in active' : '',
            '#id' => $id,
            '#text' => $text,
          ];
          $tabs_content .= $this->render($theme_array);
        }
        break;

      case 'type_3':
        $theme_array = [
          '#theme' => 'jango_shortcodes_tabbed_item_type_3',
          '#li_class' => $tabs_counter == 1 ? ' class=active' : '',
          '#id' => $id,
          '#label' => isset($attrs['label']) ? $attrs['label'] : '',
        ];
        $output = $this->render($theme_array);
        if (!empty($text)) {
          $theme_array = [
            '#theme' => 'jango_shortcodes_tabbed_item_type_3_tabs_content',
            '#class' => $tabs_counter == 1 ? ' in active' : '',
            '#id' => $id,
            '#text' => $text,
          ];
          $tabs_content .= $this->render($theme_array);
        }
        break;
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'type_1' => 'Tabbed has icon',
      'type_2' => 'Tabbed default',
      'type_3' => 'Tabbed colored',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'carousel',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => t('Label'),
      '#default_value' => isset($attrs['label']) ? $attrs['label'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    ];
    $form['icon'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_1']],
      ],
    ];
    $menu_type = [
      '3' => 'Gray',
      '4' => 'Blue',
    ];
    $form['menu_type'] = [
      '#type' => 'select',
      '#options' => $menu_type,
      '#title' => t('Menu type'),
      '#default_value' => isset($attrs['menu_type']) ? $attrs['menu_type'] : '3',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => ['#edit-type' => ['value' => 'type_2']],
      ],
    ];

    return $form;
  }
}
