<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\image\Entity\ImageStyle;
use Drupal\file\Entity\File;

/**
 * @Shortcode(
 *   id = "nd_image",
 *   title = @Translation("Image"),
 *   description = @Translation("Image"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-file-image-o"
 * )
 */
class ImageShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
    $uri = '';
    if ($file) {
      $uri = $file->getFileUri() ? $file->getFileUri() : '';
    }
    if (!$uri) {
      return '';
    }
    $attrs['class'] = isset($attrs['align']) && $attrs['align'] ? 'image-align text-align-' . $attrs['align'] : '';
    // @todo needs review.
    $alt = isset($attrs['alt']) ? $attrs['alt'] : '';
    $title = isset($attrs['title']) ? $attrs['title'] : '';
    $attributes = ['style' => ''];

    if (isset($attrs['width']) && $attrs['width']) {
      $attributes['style'] .= 'width:' . $attrs['width'] . 'px;';
    }

    if (isset($attrs['height']) && $attrs['height']) {
      $attributes['style'] .= 'height:' . $attrs['height'] . 'px;';
    }

    if (isset($attrs['image_style']) && $attrs['image_style']) {
      $image_array = ['#theme' => 'image_style', '#style_name' => $attrs['image_style'], '#title' => $title, '#alt' => $alt, '#uri' => $uri, '#attributes' => $attributes,];
      $img = $this->render($image_array);
    }
    else {
      $image_array = ['#theme' => 'image', '#title' => $title, '#alt' => $alt, '#uri' => $uri, '#attributes' => $attributes,];
      $img = $this->render($image_array);
    }
    $attrs['href'] = isset($attrs['link']) && $attrs['link'] ? $attrs['link'] : '';
    $attrs['target'] = isset($attrs['target']) && $attrs['target'] ? '_blank' : '';

    return $attrs['href'] ? '<a ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $img . '</a>' : '<span ' . _jango_shortcodes_shortcode_attributes($attrs) . '>' . $img . '</span>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Image'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#prefix' => '<div class="row"><div class="col-sm-6"><div class="image-gallery-upload ">',
      '#suffix' => '</div></div>',
      '#attributes' => ['class' => ['image-gallery-upload hidden']],
      '#field_suffix' => '<div class="preview-image"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>'
    ];

    if (isset($attrs['fid'])) {
      $file = File::load($attrs['fid']);
      if ($file) {
        $filename = $file->getFileUri();
        $filename = ImageStyle::load('medium')->buildUrl($filename);
        $form['fid']['#prefix'] = '<div class="row"><div class="col-sm-6"><div class="image-gallery-upload has_image">';
        $form['fid']['#field_suffix'] = '<div class="preview-image"><img src="' . $filename . '"></div><a href="#" class="vc-gallery-images-select button">' . t('Upload Image') .'</a><a href="#" class="gallery-remove button">' . t('Remove Image') .'</a>';
      }
    }

    $styles = image_style_options();
    $form['image_style'] = [
      '#type' => 'select',
      '#title' => t('Image Style'),
      '#options' => $styles,
      '#default_value' => isset($attrs['image_style']) ? $attrs['image_style'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $aligns = ['' => t(' - None - '), 'center' => t('Center'), 'left' => t('Left'), 'right' => t('Right')];
    $form['align'] = [
      '#type' => 'select',
      '#title' => t('Align'),
      '#options' => $aligns,
      '#default_value' => isset($attrs['align']) ? $attrs['align'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $form['link'] = [
      '#type' => 'textfield',
      '#title' => t('Link'),
      '#default_value' => isset($attrs['link']) ? $attrs['link'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div>',
    ]; 
    $form['width'] = [
      '#type' => 'textfield',
      '#title' => t('Width'),
      '#default_value' => isset($attrs['width']) ? $attrs['width'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
    ];
    $form['height'] = [
      '#type' => 'textfield',
      '#title' => t('Height'),
      '#default_value' => isset($attrs['height']) ? $attrs['height'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $form['target'] = [
      '#type' => 'checkbox',
      '#title' => t('Open in new window'),
      '#default_value' => isset($attrs['target']) ? $attrs['target'] : FALSE,
      '#prefix' => '<div class="row"><div class = "col-sm-4">',
      '#suffix' => '</div>',
    ];   
    $form['alt'] = array(
      '#type' => 'textfield',
      '#title' => t('Alt'),
      '#default_value' => isset($attrs['alt']) ? $attrs['alt'] : '',
      '#attributes' => array('class' => array('form-control')),
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div>',
    );
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => array('class' => array('form-control')),
      '#prefix' => '<div class = "col-sm-4">',
      '#suffix' => '</div></div>',
    );
    return $form;
  }
}
