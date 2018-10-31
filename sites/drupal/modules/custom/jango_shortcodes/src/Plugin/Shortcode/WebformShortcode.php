<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\webform\Entity\Webform;


/**
 * @Shortcode(
 *   id = "nd_webform",
 *   title = @Translation("Webform"),
 *   description = @Translation("Render webform"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-file-o",
 * )
 */

class WebformShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $output[$attrs['webform']] = [
      '#type' => 'webform',
      '#webform' => $attrs['webform'],
    ];

    $attrs_output = _jango_shortcodes_shortcode_attributes($attrs);
    return $attrs_output ? '<div ' . $attrs_output . '>' . render($output) . '</div>' : render($output);
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $options = [];
    $webforms = Webform::loadMultiple();
    foreach ($webforms as $webform) {
      $options[$webform->id()] = $webform->label();
    }

    $form = [];
    $form['webform'] = [
      '#type' => 'select',
      '#options' => $options,
      '#title' => t('Webform'),
      '#description' => t('Select the webform.'),
      '#default_value' => isset($attrs['webform']) ? $attrs['webform'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-6">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
