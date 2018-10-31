<?php

namespace Drupal\nd_visualshortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\taxonomy\Entity\Term;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

/**
 * @Shortcode(
 *   id = "a_nd_saved",
 *   title = @Translation("Saved Shortcodes"),
 *   description = @Translation("Saved structure Shortcodes"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-save"
 * )
 */
class SavedShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $query = \Drupal::database()
      ->select('nd_visualshortcodes_saved', 'n')
      ->fields('n', array('code'))
      ->condition('id', $attrs['saved']);
    $code = $query->execute()->fetchField();
    return $code;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $saved = \Drupal::database()->select('nd_visualshortcodes_saved', 'n')->fields('n', array('id', 'name'))->orderBy('name')->execute()->fetchAllKeyed(0, 1);
    asort($saved);
    $form['saved'] = array(
      '#title' => t('Saved Shortcodes'),
      '#type' => 'select',
      '#options' => $saved,
      '#default_value' => isset($attrs['saved']) ? $attrs['saved'] : '',
      '#attributes' => array('class' => array('form-control'))
    );
    $form['delete']['#markup'] = '<a href = "#" class = "delete-saved-shortcode btn btn-warning">' . t('Delete selected') . '</a>';
    return $form;
  }
}
