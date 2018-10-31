<?php

/**
 * @file
 * Definition of Drupal\d8views\Plugin\views\field\JangoCmsCommentCount
 */

namespace Drupal\jango_cms\Plugin\views\field;

use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("jango_cms_comment_count")
 */
class JangoCmsCommentCount extends FieldPluginBase {

  /**
   * @{inheritdoc}
   */
  public function query() {
    // Leave empty to avoid a query on this field.
  }

  /**
   * @{inheritdoc}
   */
  public function render(ResultRow $values) {
    $node = $values->_entity;
    $query = \Drupal::database()->select('comment_entity_statistics', 'com_en_stat');
    $query->condition('com_en_stat.entity_id', $node->id());
    $query->fields('com_en_stat', ['comment_count']);
    $comments = $query->execute()->fetchCol();
    return !empty($comments) ? reset($comments) : 0;
  }
}
