<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\block\Entity\Block;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * @Shortcode(
 *   id = "nd_block",
 *   title = @Translation("Block"),
 *   description = @Translation("Render drupal block"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-file",
 * )
 */
class BlockShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $block = '';
    if (strpos($attrs['admin_url'], 'admin/structure/block') !== FALSE) {
      $block_name = substr($attrs['admin_url'], strpos($attrs['admin_url'], '/manage/') + 8);
      $block = \Drupal::entityTypeManager()->getStorage('block')->load($block_name)->getPlugin()->build();
      $block = render($block);
    }
    $attrs_output = _jango_shortcodes_shortcode_attributes($attrs);
    return $attrs_output ? '<div ' . $attrs_output  . '>' . $block . '</div>' : $block;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $current_theme = \Drupal::config('system.theme')->get('default');

    $blocks = \Drupal::entityQuery('block')
      ->condition('theme', $current_theme)
      ->execute();

    $options = [];
    foreach ($blocks as $id) {
      $block = Block::load($id);
      $options['admin/structure/block/manage/' . $id] = $block->label();
    }
    asort($options);
    $form['admin_url'] = [
      '#title' => t('Block'),
      '#type' => 'select',
      '#options' => $options,
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
    if (isset($attrs['admin_url']) && strpos($attrs['admin_url'], 'admin/structure/block') !== FALSE) {
      $form = BlockShortcode::settings($attrs, $text);
      $link_text = $form['admin_url']['#options'][$attrs['admin_url']];
      $link_url = Url::fromUri('internal:/' . $attrs['admin_url'], ['attributes' => ['target' => '_blank']]);
      $link = Link::fromTextAndUrl($link_text, $link_url)->toString();
      $value = $link->getGeneratedLink();
    }
    return $value;
  }
}
