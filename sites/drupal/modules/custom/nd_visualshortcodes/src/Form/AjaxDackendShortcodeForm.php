<?php

namespace Drupal\nd_visualshortcodes\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\Entity\FilterFormat;
use Drupal\filter\FilterFormatInterface;
use Drupal\image\Entity\ImageStyle;
use Drupal\file\Entity\File;

class AjaxDackendShortcodeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_dackend_shortcode_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $extra = NULL) {
    $shortcodeService = \Drupal::service('shortcode');
    $shortcodes = $shortcodeService->loadShortcodePlugins();
    $config = \Drupal::config('nd_visualshortcodes.settings');

    $shortcode = $form_state->getValue('shortcode_name') ? $form_state->getValue('shortcode_name') : $extra['shortcode'];

    if (isset($shortcodes[$shortcode]['class'])) {
      $class = $shortcodes[$shortcode]['class'];
      $obj = new $class(array(), 0, 0);
      if (method_exists($obj, 'settings')) {
        $short_form = $obj->settings($extra['attrs'], isset($extra['text']) ? $extra['text'] : '');
        $form['shortcode_name'] = array(
          '#type' => 'hidden',
          '#value' => $shortcode
        );
        $form['shortcode'] = array(
          '#type' => 'details',
          '#title' => t('Shortcode'),
          '#collapsible' => TRUE,
          '#collapsed' => FALSE,
          '#group' => 'additional_settings',
          '#weight' => -5,
        );
        $form['shortcode']['settings'] = $short_form;
      }
    }

    $attrs = $extra['attrs'];
    $form['additional_settings'] = array(
      '#type' => 'vertical_tabs',
    );

    $form['paddings'] = array(
      '#type' => 'details',
      '#title' => t('Paddings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#group' => 'additional_settings',
      '#weight' => 1,
    );
    $form['margings'] = array(
      '#type' => 'details',
      '#title' => t('Margins'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#group' => 'additional_settings',
      '#weight' => 2,
    );

    $form['classes_animation'] = array(
      '#type' => 'details',
      '#title' => t('Classes, ID & Other'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#group' => 'additional_settings',
      '#weight' => 3,
    );
    $form['border_radius'] = array(
      '#type' => 'details',
      '#title' => t('Border'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#group' => 'additional_settings',
      '#weight' => 4,
    );
    $form['background'] = array(
      '#type' => 'details',
      '#title' => t('Background'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
      '#group' => 'additional_settings',
      '#weight' => 5,
    );
    $form['paddings']['container'] = array(
      '#type' => 'container',
      '#prefix' => '<div class = "row col-settings device-icons-wrap">',
      '#suffix' => '</div>'
    );
    $form['paddings']['container']['style_padding_left'] = array(
      '#type' => 'textfield',
      '#title' => t('Padding Left'),
      '#default_value' => isset($attrs['style_padding_left']) ? $attrs['style_padding_left'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['paddings']['container']['style_padding_right'] = array(
      '#type' => 'textfield',
      '#title' => t('Padding Right'),
      '#default_value' => isset($attrs['style_padding_right']) ? $attrs['style_padding_right'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['paddings']['container']['style_padding_top'] = array(
      '#type' => 'textfield',
      '#title' => t('Padding Top'),
      '#default_value' => isset($attrs['style_padding_top']) ? $attrs['style_padding_top'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['paddings']['container']['style_padding_bottom'] = array(
      '#type' => 'textfield',
      '#title' => t('Padding Bottom'),
      '#default_value' => isset($attrs['style_padding_bottom']) ? $attrs['style_padding_bottom'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['margings']['container'] = array(
      '#type' => 'container',
      '#prefix' => '<div class = "row col-settings device-icons-wrap">',
      '#suffix' => '</div>'
    );
    $form['margings']['container']['style_margin_left'] = array(
      '#type' => 'textfield',
      '#title' => t('Margin Left'),
      '#default_value' => isset($attrs['style_margin_left']) ? $attrs['style_margin_left'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['margings']['container']['style_margin_right'] = array(
      '#type' => 'textfield',
      '#title' => t('Margin Right'),
      '#default_value' => isset($attrs['style_margin_right']) ? $attrs['style_margin_right'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['margings']['container']['style_margin_top'] = array(
      '#type' => 'textfield',
      '#title' => t('Margin Top'),
      '#default_value' => isset($attrs['style_margin_top']) ? $attrs['style_margin_top'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['margings']['container']['style_margin_bottom'] = array(
      '#type' => 'textfield',
      '#title' => t('Margin Bottom'),
      '#default_value' => isset($attrs['style_margin_bottom']) ? $attrs['style_margin_bottom'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['classes_animation']['id'] = array(
      '#type' => 'textfield',
      '#title' => t('ID'),
      '#default_value' => isset($attrs['id']) ? $attrs['id'] : '',
      '#attributes' => array('class' => array('form-control')),
    );
    $form['classes_animation']['extra_classes'] = array(
      '#type' => 'textfield',
      '#title' => t('Extra Classes'),
      '#default_value' => isset($attrs['extra_classes']) ? $attrs['extra_classes'] : '',
      '#attributes' => array('class' => array('form-control')),
      '#prefix' => '<div class = "row"><div class = "col-xs-6">',
    );

    $types = array(
      '' => t('Default'),
      'left' => t('Left'),
      'center' => t('Center'),
      'right' => t('Right')
    );
    $form['classes_animation']['text_align'] = array(
      '#type' => 'select',
      '#title' => t('Text Align'),
      '#options' => $types,
      '#default_value' => isset($attrs['text_align']) ? $attrs['text_align'] : '',
      '#attributes' => array('class' => array('form-control')),
      '#prefix' => '</div><div class = "col-xs-6">',
      '#suffix' => '</div></div>'
    );
    $form['classes_animation']['container']['animation'] = array(
      '#type' => 'select',
      '#title' => t('Animation'),
      '#options' => _nd_visualshortcodes_list_animations(),
      '#default_value' => isset($attrs['animation']) ? $attrs['animation'] : '',
      '#prefix' => '<div class = "row col-settings"><div class = "col-xs-6 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['classes_animation']['container']['animation_delay'] = array(
      '#type' => 'textfield',
      '#title' => t('Animation Delay (ms)'),
      '#default_value' => isset($attrs['animation_delay']) ? $attrs['animation_delay'] : '',
      '#prefix' => '<div class = "col-xs-6 centered">',
      '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['classes_animation']['extra_style'] = array(
      '#type' => 'textarea',
      '#title' => t('CSS Styles'),
      '#default_value' => isset($attrs['extra_style']) ? $attrs['extra_style'] : '',
      '#attributes' => array('class' => array('form-control')),
    );

    $fonts = $config->get('nd_visualshortcodes_fonts');
    if (!empty($fonts)) {
      $form['classes_animation']['font'] = array(
        '#type' => 'select',
        '#title' => t('Font'),
        '#options' => $fonts,
        '#default_value' => isset($attrs['font']) ? $attrs['font'] : '',
        '#prefix' => '<div class = "row col-settings"><div class = "col-xs-6 centered">',
        '#suffix' => '</div>',
        '#attributes' => array('class' => array('form-control'))
      );
    }
    $form['border_radius']['different_values'] = array(
      '#type' => 'checkbox',
      '#title' => t('Different Border Radius'),
      '#default_value' => isset($attrs['different_values']) ? $attrs['different_values'] : FALSE,
      '#attributes' => array('class' => array('nd_visualshortcodes_different_values'))
    );
    $form['border_radius']['style_border_radius'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Radius'),
      '#default_value' => isset($attrs['style_border_radius']) ? $attrs['style_border_radius'] : FALSE,
      '#states' => array(
        'visible' => array(
          '.nd_visualshortcodes_different_values' => array('checked' => FALSE)
        )
      ),
      '#attributes' => array('class' => array('form-control'))
    );
    $form['border_radius']['container'] = array(
      '#type' => 'container',
      '#prefix' => '<div class = "row col-settings device-icons-wrap">',
      '#suffix' => '</div>',
      '#states' => array(
        'visible' => array(
          '.nd_visualshortcodes_different_values' => array('checked' => TRUE)
        )
      )
    );
    $form['border_radius']['container']['style_border_radius_left'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Radius Left'),
      '#default_value' => isset($attrs['style_border_radius_left']) ? $attrs['style_border_radius_left'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['border_radius']['container']['style_border_radius_left'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Radius Left'),
      '#default_value' => isset($attrs['style_border_radius_left']) ? $attrs['style_border_radius_left'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['border_radius']['container']['style_border_radius_right'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Radius Right'),
      '#default_value' => isset($attrs['style_border_radius_right']) ? $attrs['style_border_radius_right'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['border_radius']['container']['style_border_radius_top'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Radius Top'),
      '#default_value' => isset($attrs['style_border_radius_top']) ? $attrs['style_border_radius_top'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['border_radius']['container']['style_border_radius_bottom'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Radius Bottom'),
      '#default_value' => isset($attrs['style_border_radius_bottom']) ? $attrs['style_border_radius_bottom'] : '',
      '#prefix' => '<div class = "col-xs-3 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    // Border settings
    $form['border_radius']['style_border_width'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Width (px)'),
      '#default_value' => isset($attrs['style_border_width']) ? $attrs['style_border_width'] : '',
      '#prefix' => '<div class = "row"><div class = "col-xs-4 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $styles = array(
      '' => t(' - None - '),
      'dotted' => t('Dotted'),
      'dashed' => t('Dashed'),
      'solid' => t('Solid'),
      'double' => t('Double'),
      'groove' => t('Groove'),
      'ridge' => t('Ridge'),
      'inset' => t('Inset'),
      'outset' => t('Outset')
    );
    $form['border_radius']['style_border_style'] = array(
      '#type' => 'select',
      '#title' => t('Border Style'),
      '#options' => $styles,
      '#default_value' => isset($attrs['style_border_style']) ? $attrs['style_border_style'] : '',
      '#prefix' => '<div class = "col-xs-4 centered">',
      '#suffix' => '</div>',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['border_radius']['style_border_color'] = array(
      '#type' => 'textfield',
      '#title' => t('Border Color'),
      '#default_value' => isset($attrs['style_border_color']) ? $attrs['style_border_color'] : '',
      '#prefix' => '<div class = "col-xs-4 centered">',
      '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('form-control colorpicker-enable'))
    );
    // Background tab
    $form['background']['style_background_color'] = array(
      '#type' => 'textfield',
      '#title' => t('Background Color'),
      '#default_value' => isset($attrs['style_background_color']) ? $attrs['style_background_color'] : FALSE,
      '#attributes' => array('class' => array('form-control colorpicker-enable'))
    );

    $form['background']['style_background_image'] = array(
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['style_background_image']) ? $attrs['style_background_image'] : '',
      '#prefix' => '<div class="image-gallery-upload ">',
      '#attributes' => array('class' => array('image-gallery-upload hidden')),
      '#field_suffix' => '<div class = "preview-image"></div><a href = "#" class = "vc-gallery-images-select button">' . t('Upload Image') . '</a><a href = "#" class = "gallery-remove button">' . t('Remove Image') . '</a>'
    );

    if (isset($attrs['style_background_image'])) {
      $file = File::load($attrs['style_background_image']);
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['background']['style_background_image']['#prefix'] = '<div class="image-gallery-upload has_image">';
        $form['background']['style_background_image']['#field_suffix'] = '<div class = "preview-image"><img src="' . $filename . '"></div><a href = "#" class = "vc-gallery-images-select button">' . t('Upload Image') . '</a><a href = "#" class = "gallery-remove button">' . t('Remove Image') . '</a>';
      }

    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // parent::submitForm($form, $form_state);
  }
}