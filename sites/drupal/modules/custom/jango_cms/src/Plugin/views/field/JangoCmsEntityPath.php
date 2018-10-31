<?php

/**
 * @file
 * Definition of Drupal\d8views\Plugin\views\field\JangoCmsEntityPath
 */

namespace Drupal\jango_cms\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("jango_cms_entity_path")
 */
class JangoCmsEntityPath extends FieldPluginBase {

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
    $options['base_path'] = ['default' => FALSE];
    return $options;
  }

  /**
   * Provide the options form.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    $form['base_path'] = array(
      '#title' => $this->t('Base path'),
      '#type' => 'checkbox',
      '#default_value' => $this->options['base_path'],
      '#description' => $this->t('Enable to set base path before entity url.'),
    );

    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {
    $parameter = '';
    $entity = $values->_entity;
    $entity_id = $entity->id();
    $entity_type_id = $entity->getEntityTypeId();

    switch ($entity_type_id) {
      case 'commerce_product':
        $entity_type = 'product';
        break;

      case 'commerce_order':
        $entity_type = $entity_type_id;
        $relationship_entities = $values->_relationship_entities;
        $type = 'commerce_product_variation';
        if (isset($relationship_entities[$type])) {
          $entity_id = $relationship_entities[$type]->id();
          $entity_type = 'product';
          $parameter = '?v=' . $entity_id;
        }
        break;

      default:
        $entity_type = $entity_type_id;
    }

    $path = \Drupal::service('path.alias_manager')->getAliasByPath('/' . $entity_type . '/' . $entity_id) . $parameter;
    return $this->options['base_path'] ? base_path() . ltrim($path, '/') : $path;
  }
}
