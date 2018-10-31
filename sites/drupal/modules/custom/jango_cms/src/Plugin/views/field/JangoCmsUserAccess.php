<?php

/**
 * @file
 * Definition of Drupal\d8views\Plugin\views\field\JangoCmsUserAccess
 */

namespace Drupal\jango_cms\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("jango_cms_user_access")
 */
class JangoCmsUserAccess extends FieldPluginBase {

  /**
   * @{inheritdoc}
   */
  public function query() {
    // Leave empty to avoid a query on this field.
  }

  /**
   * Define the available options
   * @return array
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['permission'] = ['default' => ''];
    return $options;
  }

  /**
   * Provide the options form.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    $form['permission'] = array(
      '#title' => $this->t('Permission machine name'),
      '#type' => 'textfield',
      '#default_value' => $this->options['permission'],
      '#description' => $this->t('Enter permission machine name for check.'),
    );
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {
    $permission = $this->options['permission'];
    return \Drupal::currentUser()->hasPermission($permission) ? 'TRUE' : 'FALSE';
  }
}
