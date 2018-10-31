<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * @Shortcode(
 *   id = "nd_node",
 *   title = @Translation("Node"),
 *   description = @Translation("Render node."),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-file-o",
 * )
 */
class NodeShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    if (isset($attrs['admin_url']) && strpos($attrs['admin_url'], 'node/') !== FALSE) {
      $node_name = substr($attrs['admin_url'], strpos($attrs['admin_url'], 'node/') + 5);
      $parts = explode('/', $node_name);
      $node = Node::load($parts[0]);
      if (isset($node->nid) && $node->nid) {
        $node = node_view($node);
        $output = render($node);
        $attrs = _jango_shortcodes_shortcode_attributes($attrs);
        $text = $attrs ? '<div ' . $attrs  . '>' . $output . '</div>' : $output;
      }
    }
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $form['admin_url'] = [
      '#title' => t('Node Title'),
      '#type' => 'textfield',
      '#autocomplete_route_name' => 'jango_shortcodes_ajax_node_autocomplete',
      '#default_value' => isset($attrs['admin_url']) ? $attrs['admin_url'] : '',
      '#attributes' => ['class' => ['form-control']],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function description($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $value = '';
    if (strpos($attrs['admin_url'], 'node/') !== FALSE) {
      $node_name = substr($attrs['admin_url'], strpos($attrs['admin_url'], 'node/') + 5);
      $parts = explode('/', $node_name);
      $nid = $parts[0];
      if (is_numeric($nid)) {
        $node = Node::load($nid);
        $link_text = $node->getTitle();
        $link_url = Url::fromRoute('entity.node.edit_form', ['node' => $nid], ['attributes' => ['target' => '_blank']]);
        $link = Link::fromTextAndUrl($link_text, $link_url)->toString();
        $value = $link->getGeneratedLink();
      }
    }
    return $value;
  }
}
