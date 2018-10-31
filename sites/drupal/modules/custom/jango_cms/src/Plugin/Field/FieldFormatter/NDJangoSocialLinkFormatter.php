<?php

namespace Drupal\jango_cms\Plugin\Field\FieldFormatter;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Component\Render\FormattableMarkup;

/**
 * Plugin implementation of the 'image slider' formatter.
 *
 * @FieldFormatter(
 *   id = "jango_cms_social_link",
 *   label = @Translation("Jango: Social Links"),
 *   field_types = {
 *     "link"
 *   }
 * )
 */
class NDJangoSocialLinkFormatter extends FormatterBase implements ContainerFactoryPluginInterface {

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
    foreach ($items as $delta => $item) {
      $link_text = new FormattableMarkup('<i class="@item_title"></i>', ['@item_title' => $item->title]);
      $link_url = Url::fromUri($item->getUrl()->getUri(), ['attributes' => ['target' => '_blank']]);
      $list_items[] = Link::fromTextAndUrl($link_text, $link_url)->toString();
    }
    $list = [
      '#theme' => 'item_list',
      '#list_type' => 'ul',
      '#items' => $list_items,
      '#attributes' => ['class' => ['c-socials', 'c-theme-ul']],
    ];
    $element[0]['#markup'] = \Drupal::service('renderer')->renderPlain($list);;

    return $element;
  }
}
