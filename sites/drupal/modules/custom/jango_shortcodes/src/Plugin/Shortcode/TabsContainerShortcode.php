<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_tabs",
 *   title = @Translation("Tabs Container"),
 *   description = @Translation("Header"),
 *   icon = "fa fa-folder-open",
 *   child_shortcode = "nd_tab"
 * )
 */
class TabsContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    global $tab_content;
    global $tabs_counter;

    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['class'] .= 'c-content-tab-1 c-theme c-margin-t-30';
    // Tab Links
    $tabs_counter = !$tabs_counter ? 1 : $tabs_counter + 1;

    $font_class = isset($attrs['uppercase']) && $attrs['uppercase'] ? ' c-font-uppercase' : '';
    $font_class .= isset($attrs['bold']) && $attrs['bold'] ? ' c-font-bold' : ' c-font-sbold';
    $font_class .= isset($attrs['align']) && $attrs['align'] ? $attrs['align'] : '';

    $class = 'nav nav-tabs ' . (isset($attrs['type']) ? $attrs['type'] : '') . ' ' . $font_class;
    $border_class = isset($attrs['no_paddings']) && $attrs['no_paddings'] ? 'not-bordered' : 'c-bordered';

    switch ($attrs['type']) {
      case 'tabs-below' :
        $tab_class = 'tab-content ' . $border_class . ' c-padding-lg';
        $tabs = '<div class="clearfix"><ul class="' . $class . '">' . $text . '</ul></div>';
        $content = '<div class = "' . $tab_class . '">' . $tab_content . '</div>';
        $text = $content . $tabs;
        $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div>';
        break;

      case 'tabs-left' :
        $tab_class = 'tab-content c-padding-sm';
        $tabs = '<div class="row"><div class="col-md-3 col-sm-12 col-xs-12"><ul class="' . $class . '">' . $text . '</ul></div>';
        $content = '<div class="col-md-9 col-sm-12 col-xs-12"><div class = "' . $tab_class . '">' . $tab_content . '</div></div>';
        $text = $tabs . $content;
        $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div></div>';
        break;

      case 'tabs-right' :
        $tab_class = 'tab-content c-padding-sm';
        $tabs = '<div class="row"><div class="col-md-3 col-sm-12 col-xs-12"><ul class="' . $class . '">' . $text . '</ul></div>';
        $content = '<div class="col-md-9 col-sm-12 col-xs-12"><div class = "' . $tab_class . '">' . $tab_content . '</div></div>';
        $text = $content . $tabs;
        $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div></div>';
        break;

      default:
        $tabs = '<div class="clearfix"><ul class="' . $class . '">' . $text . '</ul></div>';
        $tab_class = 'tab-content ' . $border_class . ' c-padding-lg';
        $content = '<div class = "' . $tab_class . '">' . $tab_content . '</div>';
        // Create tabs
        $text = $tabs . $content;
        $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $text . '</div>';
    }

    // Clear the global variable for next possible tabs
    $tab_content = '';
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $types = [
      ' top' => t('Top'),
      'tabs-below' => t('Below'),
      'tabs-left' => t('Left'),
      'tabs-right' => t('Right')
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('Tabs position'),
      '#options' => $types,
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $align = [
      ' ' => t('Left'),
      ' pull-right' => t(' Right'),
      ' nav-justified' => t(' Justified')
    ];
    $form['align'] = [
      '#type' => 'select',
      '#title' => t('Align'),
      '#options' => $align,
      '#default_value' => isset($attrs['align']) ? $attrs['align'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];

    $form['uppercase'] = [
      '#title' => t('Uppercase'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['uppercase']) ? $attrs['uppercase'] : TRUE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $form['bold'] = [
      '#title' => t('Bold'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['bold']) ? $attrs['bold'] : TRUE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];

    $form['no_paddings'] = [
      '#title' => t('No Padding'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['no_paddings']) ? $attrs['no_paddings'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
