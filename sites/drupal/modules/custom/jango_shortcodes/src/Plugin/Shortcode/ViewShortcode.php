<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;
use Drupal\views\Entity\View;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * @Shortcode(
 *   id = "nd_view",
 *   title = @Translation("View"),
 *   description = @Translation("Render view"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   icon = "fa fa-sun-o",
 * )
 */
class ViewShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $view = '';
    if (isset($attrs['admin_url']) && strpos($attrs['admin_url'], 'admin/structure/views/view') !== FALSE) {
      $view_name = substr($attrs['admin_url'], strpos($attrs['admin_url'], 'view/') + 5);
      $parts = explode('/', $view_name);
      $view_name = $parts[0];
      $view = isset($parts[2]) ? views_embed_view($view_name, $parts[2]) : views_embed_view($view_name);
      $view = \Drupal::service('renderer')->render($view);
    }
    $text = '<div ' . _jango_shortcodes_shortcode_attributes($attrs)  . '>' . $view . '</div>';
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $views = View::loadMultiple();
    $select_views = [];
    foreach ($views as $key => $view) {
      foreach ($view->get('display') as $display_id => $display_view) {
        if ($display_id == 'default') {
          $select_views['admin/structure/views/view/' . $key] = $view->label();
        }
        else {
          $select_views['admin/structure/views/view/' . $key . '/edit/' . $display_id] = $view->label() . ': '. $display_view['display_title'];
        }
      }
    }
    $form['admin_url'] = [
      '#title' => t('View'),
      '#type' => 'select',
      '#options' => $select_views,
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
    if (isset($attrs['admin_url']) && strpos($attrs['admin_url'], 'admin/structure/views/view') !== FALSE) {
      $form = ViewShortcode::settings($attrs, $text);
      $link_text = $form['admin_url']['#options'][$attrs['admin_url']];
      $link_url = Url::fromUri('internal:/' . $attrs['admin_url'], ['attributes' => ['target' => '_blank']]);
      $link = Link::fromTextAndUrl($link_text, $link_url)->toString();
      $value = $link->getGeneratedLink();
    }
    return $value;
  }
}
