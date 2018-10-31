<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_steps",
 *   title = @Translation("Step container"),
 *   description = @Translation("Step container."),
 *   icon = "fa fa-bars",
 *   child_shortcode = "nd_step",
 * )
 */

class StepContainerShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    return '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . 'class="row">' . $text . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];

    return $form;
  }
}
