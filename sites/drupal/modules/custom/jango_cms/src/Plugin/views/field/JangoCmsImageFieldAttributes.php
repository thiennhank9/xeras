<?php

/**
 * @file
 * Definition of Drupal\d8views\Plugin\views\field\JangoCmsImageFieldAttributes
 */

namespace Drupal\jango_cms\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;
use Drupal\file\Entity\File;

/**
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("jango_cms_image_field_attributes")
 */
class JangoCmsImageFieldAttributes extends FieldPluginBase {

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
    $options['field_machine_name'] = ['default' => ''];
    $options['attribute_name'] = ['default' => ''];
    return $options;
  }

  /**
   * Provide the options form.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    $form['field_machine_name'] = array(
      '#title' => $this->t('Field machine name'),
      '#type' => 'textfield',
      '#default_value' => $this->options['field_machine_name'],
      '#description' => $this->t('Enter the image field machine name that is used in the entity.'),
    );
    $options = [
      '_delta' => t('Delta'),
      '_langcode' => t('Language code'),
      '_bundle' => t('Bundle'),
      '_target_id' => t('Target ID'),
      '_alt' => t('Alt'),
      '_title' => t('Title'),
      '_width' => t('Width'),
      '_heigh' => t('Heigh'),
      'url' => t('URL'),
    ];
    $form['attribute_name'] = array(
      '#title' => $this->t('Attribute name for field'),
      '#type' => 'select',
      '#default_value' => $this->options['attribute_name'],
      '#options' => $options,
    );
    parent::buildOptionsForm($form, $form_state);
  }

  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {
    $entity_type = $values->_entity->getEntityTypeId();
    $field_name = $this->options['field_machine_name'];
    $attribute_name = $this->options['attribute_name'];
    $return = '';

    switch ($attribute_name) {
      case '_delta':
      case '_langcode':
      case '_bundle':
        $return = isset($values->{$entity_type . '__' . $field_name . $attribute_name}) ? $values->{$entity_type . '__' . $field_name . $attribute_name} : '';
        break;

      case '_target_id':
      case '_alt':
      case '_title':
      case '_width':
      case '_heigh':
        $return = isset($values->{$entity_type . '__' . $field_name . '_' . $field_name . $attribute_name}) ? $values->{$entity_type . '__' . $field_name . '_' . $field_name . $attribute_name} : '';
        break;

      case 'url':
        if (isset($values->{$entity_type . '__' . $field_name . '_' . $field_name . '_target_id'})) {
          $fid = $values->{$entity_type . '__' . $field_name . '_' . $field_name . '_target_id'};
          $file = File::load($fid);
          if ($file) {
            $uri = $file->getFileUri();
            $return = file_create_url($uri);
          }
        }
        break;
    }

    return $return;
  }
}
