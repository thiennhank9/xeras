<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_feature_blocks",
 *   title = @Translation("Feature block container"),
 *   description = @Translation("Feature block container."),
 *   icon = "fa fa-minus",
 *   description_field = "title",
 *   child_shortcode = "nd_feature_block",
 * )
 */

class FeatureBlockContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    switch ($attrs['type']) {
      case 'type_1':
        $text = '<div class="c-feature-13-container">' . $text . '</div>';
        break;

      case 'type_2':
        $text = '<div class="c-content-feature-6"><ul class="c-list">' . $text . '</ul></div>';
        break;

      case 'type_3':
        $text = '<div class="c-content-feature-5">' . $text . '</div>';
        break;

      case 'type_4':
        $text = '<div class="c-feature-13-container">' . $text . '</div>';
        break;

      case 'type_5':
        $text = '<div class="c-content-feature-10">' . $text . '</div>';
        break;

      case 'type_6':
        $text = '<div class="c-content-feature-10">' . $text . '</div>';
        break;

      case 'type_7':
        $text = '<div class="c-content-feature-10">' . $text . '</div>';
        break;

      case 'type_8':
        $text = '<div class="c-content-feature-9">' . $text . '</div>';
        break;

      case 'type_9':
        $text = '<div class="c-content-feature-8 c-opt-1">' . $text . '</div>';
        break;
    }

    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $type = [
      'type_1' => 'Feature block Grid',
      'type_2' => 'Feature block List',
      'type_3' => 'Feature block with a button',
      'type_4' => 'Feature block List vertical',
      'type_5' => 'Feature block with a border',
      'type_6' => 'Feature block with a border (dark)',
      'type_7' => 'Feature block with fill background',
      'type_8' => 'Feature group list',
      'type_9' => 'Feature big opacity block',
    ];
    $form['type'] = [
      '#type' => 'select',
      '#options' => $type,
      '#title' => t('Type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : 'type_1',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
