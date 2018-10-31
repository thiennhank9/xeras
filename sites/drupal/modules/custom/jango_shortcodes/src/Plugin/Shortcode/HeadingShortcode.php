<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_heading",
 *   title = @Translation("Heading"),
 *   description = @Translation("Heading."),
 *   icon = "fa fa-h-square",
 *   description_field = "title",
 * )
 */

class HeadingShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $class = (isset($attrs['uppercase']) && $attrs['uppercase'] == 1) ? 'c-font-uppercase' : '';
    $class .= (isset($attrs['bold']) && $attrs['bold'] == 1) ? ' c-font-bold' : '';

    $line_classes = '';
    if (isset($attrs['underline']) && $attrs['underline'] == 'c-line-center c-theme-bg') {
      $line_classes = 'c-line-' . $attrs['label_align'] . ' c-bg-' . $attrs['line_color'];
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-line c-dot c-dot-') {
      $line_classes = 'c-line c-dot c-dot-' . $attrs['label_align'] . ' c-bg-' . $attrs['line_color'] . ' c-bg-after-' . $attrs['line_color'];
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-line c-dot c-dot-square') {
      $line_classes = 'c-line c-dot c-dot-square c-dot-' . $attrs['label_align'] . ' c-bg-' . $attrs['line_color'] . '  c-bg-after-' . $attrs['line_color'];
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-line') {
      $line_classes = 'c-line c-bg-' . $attrs['line_color'] . '  c-bg-after-' . $attrs['line_color'];
    }

    if (isset($attrs['underline']) && ($attrs['underline'] == 'c-line c-dot c-dot-' || $attrs['underline'] == 'c-line c-dot c-dot-square' || $attrs['underline'] == 'c-line')) {
      $title = '2';
    }
    elseif (isset($attrs['underline']) && $attrs['underline'] == 'c-content-title-3') {
      $title = '3 c-border-' . $attrs['line_color'] . ' c-' . $attrs['label_align'];
    }
    else {
      $title = '1';
    }

    $tag = isset($attrs['tag']) && $attrs['tag'] ? $attrs['tag'] : 'h3';
    $theme_array = [
      '#theme' => 'jango_shortcodes_heading',
      '#label_align' => $attrs['label_align'],
      '#color' => $attrs['color'],
      '#class' => $class,
      '#tag' => $tag,
      '#icon' => isset($attrs['icon']) ? '<i class="' . $attrs['icon'] . ' ' . $attrs['color_icon'] . '"></i>' : '',
      '#title' => restore_html_string($attrs['title']),
      '#line_classes' => $line_classes,
      '#description' => isset($attrs['description']) ? restore_html_string($attrs['description']) : '',
    ];
    $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' class="c-content-title-' . $title . ' ' . $attrs['text_size'] . '">';
    $output .= $this->render($theme_array);
    $output .= '</div>';

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['title'] = [
      '#title' => t('Title'),
      '#type' => 'textfield',
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $form['icon'] = [
      '#title' => t('Icons'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_icons_autocomplete',
      '#default_value' => isset($attrs['icon']) ? $attrs['icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>'
    ];
    $color = [
      'c-font' => t('Default'),
      'c-font-blue' => t('Blue'),
      'c-font-red' => t('Red'),
      'c-font-green' => t('Green'),
      'c-font-yellow' => t('Yellow'),
      'c-font-purple' => t('Purple'),
      'c-font-black' => t('Black'),
      'c-font-white' => t('White'),
    ];
    $form['color'] = [
      '#title' => t('Font Color'),
      '#type' => 'select',
      '#options' => $color,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $line = [
      'default' => t(' - None - '),
      'c-line' => 'Line long',
      'c-line-center c-theme-bg' => 'Line short',
      'c-line c-dot c-dot-' => 'Line with point',
      'c-line c-dot c-dot-square' => 'Line with square',
      'c-content-title-3' => 'Vertical line ',
      'c-content-title-3 c-theme-border c-right' => 'Vertical line right',
      'c-content-title-4' => t('Middle Line'),
    ];
    $form['underline'] = [
      '#title' => t('Line Type'),
      '#type' => 'select',
      '#options' => $line,
      '#default_value' => isset($attrs['underline']) ? $attrs['underline'] : 'default',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div></div>',
    ];
    $form['description'] = [
      '#title' => t('Description'),
      '#type' => 'textarea',
      '#default_value' => isset($attrs['description']) ? $attrs['description'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];
    $bg_colors = [
      'green' => t('Green'),
      'blue' => t('Blue'),
      'red' => t('Red'),
      'yellow' => t('Yellow'),
      'purple' => t('Purple'),
      'gray' => t('Gray'),
      'white' => t('White'),
      'dark' => t('Dark'),
    ];
    $form['icon_color'] = [
      '#title' => t('Icon Color'),
      '#type' => 'select',
      '#options' => $color,
      '#default_value' => isset($attrs['icon_color']) ? $attrs['icon_color'] : 'blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $text_align = [
      'left' => t('Left'),
      'right' => t('Right'),
      'center' => t('Center'),
    ];
    $text_size = [
      'c-title' => t('Default'),
      'c-title-md' => t('Medium'),
      'c-title-sm' => t('Small'),
    ];
    $form['label_align'] = [
      '#title' => t('Text Align'),
      '#type' => 'select',
      '#options' => $text_align,
      '#default_value' => isset($attrs['label_align']) ? $attrs['label_align'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['uppercase'] = [
      '#title' => t('Uppercase'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['uppercase']) ? $attrs['uppercase'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['bold'] = [
      '#title' => t('Bold'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['bold']) ? $attrs['bold'] : FALSE,
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>'
    ];
    $form['line_color'] = [
      '#title' => t('Line color'),
      '#type' => 'select',
      '#options' => $bg_colors,
      '#default_value' => isset($attrs['line_color']) ? $attrs['line_color'] : 'green',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['text_size'] = [
      '#title' => t('Text size'),
      '#type' => 'select',
      '#options' => $text_size,
      '#default_value' => isset($attrs['text_size']) ? $attrs['text_size'] : 'c-title',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['color_icon'] = [
      '#title' => t('Icon color'),
      '#type' => 'select',
      '#options' => $color,
      '#default_value' => isset($attrs['color_icon']) ? $attrs['color_icon'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
    ];
    $size = array('h1' => t('H1'), 'h2' => t('H2'), 'h3' => t('H3'), 'h4' => t('H4'), 'h5' => t('H5'), 'h6' => t('H6'));
    $form['tag'] = array(
      '#title' => t('Tag'),
      '#type' => 'select',
      '#options' => $size,
      '#default_value' => isset($attrs['tag']) ? $attrs['tag'] : 'h3',
      '#attributes' => array('class' => array('form-control')),
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    );
    return $form;
  }
}
