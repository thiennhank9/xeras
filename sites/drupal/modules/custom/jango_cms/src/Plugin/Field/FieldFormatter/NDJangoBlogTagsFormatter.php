<?php

namespace Drupal\jango_cms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Url;
use Drupal\Core\Link;


/**
 * Plugin implementation of the 'image slider' formatter.
 *
 * @FieldFormatter(
 *   id = "jango_cms_blog_tags",
 *   label = @Translation("Jango: Blog Tags"),
 *   field_types = {
 *     "entity_reference"
 *   }
 * )
 */
class NDJangoBlogTagsFormatter extends FormatterBase implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings']
    );
  }

  /**
   * Constructs a new LinkFormatter.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Third party settings.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    $list_items = [];
    $tags = $items->getValue('target_id');
    foreach ($tags as $tag) {
      $term = Term::load($tag['target_id']);
      $url = Url::fromRoute('entity.taxonomy_term.canonical', ['taxonomy_term' => $tag['target_id']]);
      $list_items[] = \Drupal::l($term->getName(), $url);
    }
    $list = [
      '#theme' => 'item_list',
      '#list_type' => 'ul',
      '#items' => $list_items,
      '#attributes' => ['class' => ['c-tags', 'c-theme-ul-bg']],
    ];

    $element[0]['#markup'] = \Drupal::service('renderer')->renderPlain($list);
    return $element;
  }
}
