<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\file\Entity\File;

/**
 * @Shortcode(
 *   id = "nd_video",
 *   title = @Translation("Video"),
 *   description = @Translation("Video"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-video-camera",
 * )
 */
class VideoShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? ' ' . $attrs['class'] : '' . ' embed-responsive embed-responsive-' . $attrs['aspect_ratio'];
    $width = '100%';
    $height = '100%';
    $attrs['class'] .= ' video';
    $video_url = '#';
    $attrs['url'] = isset($attrs['url']) ? $attrs['url'] : '';
    if (strpos($attrs['url'], 'vimeo') !== FALSE) {
      preg_match('|/(\d+)|', $attrs['url'], $matches);
      $video_url = '//player.vimeo.com/video/' . $matches[1] . '?title=0&amp;byline=0&amp;portrait=0&amp;color=FFFFFF';
    }
    else {
      if (strpos($attrs['url'], 'youtube') !== FALSE) {
        if (strpos($attrs['url'], '?v=') !== FALSE) {
          $id = substr($attrs['url'], strpos($attrs['url'], '?v=') + 3);
          $video_url = '//www.youtube.com/embed/' . $id . '?theme=dark&color=white';
        }
        else {
          $video_url = $attrs['url'];
        }
      }
    }
    if (isset($attrs['video_source']) && $attrs['video_source'] == 'internet') {
      $text = '
    <div ' . _jango_shortcodes_shortcode_attributes($attrs) . '>
      <iframe src="' . $video_url . '"></iframe>
    </div>';
    }
    else {
      $file = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid']) : '';
      $uri = !empty($file) && $file->getFileUri() ? $file->getFileUri() : '';
      if (!$uri) {
        return '';
      }
      if (strpos($file->getFileUri(), 'mp4') !== FALSE) {
        $type = 'video/mp4';
      }
      else {
        $type = 'video/webm';
      }
      $file = isset($attrs['vfid']) && !empty($attrs['vfid']) ? File::load($attrs['vfid']) : '';
      $video_uri = $file->getFileUri() ? $file->getFileUri() : '';
      if (!$video_uri) {
        return '';
      }
      $text = '
    <video ' . $width . ' ' . $height . 'poster="' . file_create_url($uri) . '" controls="controls">
      <source type="' . $type . '" src="' . file_create_url($video_uri) . '"></source>
      Your browser doesn\'t support HTML5 video.
    </video>';
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $video_source = ['local' => t('Local'), 'internet' => t('Internet')];
    $form['video_source'] = [
      '#title' => t('Video source'),
      '#type' => 'select',
      '#options' => $video_source,
      '#attributes' => ['class' => ['form-control']],
      '#default_value' => isset($attrs['video_source']) ? $attrs['video_source'] : 'internet',
      '#prefix' => '<div class = "row"><div class = "col-sm-3">',
    ];
    $states1 = [
      'visible' => [
        'select[name="video_source"]' => ['value' => 'local'],
      ],
    ];
    $filename = isset($attrs['fid']) && !empty($attrs['fid']) ? File::load($attrs['fid'])->getFileUri() : '';
    $image_array = ['#theme' => 'image_style', '#style_name' => 'media_thumbnail', '#uri' => $filename,];
    $image = $filename ? $this->render($image_array) : '';

    $form['fid'] = [
      '#type' => 'textfield',
      '#title' => t('Placeholder'),
      '#default_value' => isset($attrs['fid']) ? $attrs['fid'] : '',
      '#attributes' => ['class' => ['image-media-upload hidden']],
      '#field_suffix' => '<div class = "preview-image">' . $image . '</div><a href="#" class="media-upload button">' . t('Upload Image') . '</a><a href="#" class="media-remove button">' . t('Remove Image') . '</a>',
      '#prefix' => '</div><div class = "col-sm-9">',
      '#suffix' => '</div></div>',
      '#states' => $states1,
    ];
    $v_filename = isset($attrs['vfid']) && !empty($attrs['vfid']) ? File::load($attrs['vfid'])->getFileUri() : '';
    $video_array = ['#theme' => 'image_style', '#style_name' => 'media_thumbnail', '#uri' => $v_filename,];
    $video = $v_filename ? $this->render($video_array) : '';

    $form['vfid'] = [
      '#type' => 'textfield',
      '#title' => t('Video'),
      '#default_value' => isset($attrs['vfid']) ? $attrs['vfid'] : '',
      '#attributes' => ['class' => ['image-media-upload hidden']],
      '#field_suffix' => '<div class = "preview-image">' . $video . '</div><a href="#" class="media-upload button">' . t('Upload Video') . '</a><a href="#" class="media-remove button">' . t('Remove Video') . '</a>',
      '#prefix' => '<div class = "row"><div class = "col-sm-12">',
      '#suffix' => '</div></div>',
      '#states' => $states1,
    ];
    $states2 = [
      'visible' => [
        'select[name="video_source"]' => ['value' => 'internet'],
      ],
    ];
    $form['url'] = [
      '#type' => 'textfield',
      '#title' => t('Video Url'),
      '#default_value' => isset($attrs['url']) ? $attrs['url'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#description' => t('Supports: YouTube or Vimeo in case "Internet" and mp4 or webm in case "Local"'),
      '#prefix' => '<div class = "row"><div class = "col-sm-12">',
      '#suffix' => '</div></div>',
      '#states' => $states2,
    ];
    $aspect_ratio = ['16by9' => t('16x9'), '4by3' => t('4x3')];
    $form['aspect_ratio'] = [
      '#type' => 'select',
      '#options' => $aspect_ratio,
      '#title' => t('Aspect ratio'),
      '#default_value' => isset($attrs['aspect_ratio']) ? $attrs['aspect_ratio'] : '16by9',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-6">',
      '#suffix' => '</div>',
    ];

    return $form;
  }
}
