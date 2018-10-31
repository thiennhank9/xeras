<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_navigation",
 *   title = @Translation("Navigation"),
 *   description = @Translation("Navigation."),
 *   icon = "fa fa-bars",
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 * )
 */

class NavigationShortcode extends ShortcodeBase {

  function render_navigation($menu_name, $class, $color_type) {
    $menu_tree = \Drupal::menuTree();
    // Build the typical default set of menu tree parameters.
    $parameters = $menu_tree->getCurrentRouteMenuTreeParameters($menu_name);
    // Load the tree based on this set of parameters.
    $tree = $menu_tree->load($menu_name, $parameters);
    // Transform the tree using the manipulators you want.
    $manipulators = [
      // Only show links that are accessible for the current user.
      ['callable' => 'menu.default_tree_manipulators:checkAccess'],
      // Use the default sorting of menu links.
      ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort'],
    ];
    $tree = $menu_tree->transform($tree, $manipulators);
    // Finally, build a renderable array from the transformed tree.
    $menu = $menu_tree->build($tree);

    if ($color_type == 'multicolor') {
      $i = 0;
      $color_array = [
        'c-bg-before-blue',
        'c-bg-before-red',
        'c-bg-before-green',
        'c-bg-before-purple',
        'c-bg-before-yellow',
      ];

      foreach ($menu['#items'] as $key => $item) {
        if ($i > 4) {
          $i = 0;
        }
        $menu['#items'][$key]['attributes']->addClass($color_array[$i]);
        $i++;
      }
    }

    $menu['#attributes']['class'] = $class;
    return \Drupal::service('renderer')->render($menu);
  }

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $menu_name = isset($attrs['menu']) ? $attrs['menu'] : 'navigations';
    $type = isset($attrs['type']) ? $attrs['type'] : '';
    $color = isset($attrs['color']) ? $attrs['color'] : '';
    $uppercase = isset($attrs['uppercase']) && $attrs['uppercase'] ? 'c-font-uppercase' : '';

    $attrs['class'] = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['class'] .= 'c-content-ver-nav';

    $newcolor = (isset($type) && empty($type) && $color == 'multicolor') ? 'c-arrow-dot' : $color;
    $type = isset($type) && !empty($type) ? $type : '';

    $classes = [
      'c-menu',
      $type,
      $newcolor,
      $uppercase,
    ];
    $output = $this->render_navigation($menu_name, $classes, $color);

    $attrs_output = _jango_shortcodes_shortcode_attributes($attrs);
    if ($attrs_output) {
      $output = '<div ' . $attrs_output . '>' . $output . '</div>';
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $menus = menu_ui_get_menus();
    $form['menu'] = [
      '#type' => 'select',
      '#title' => t('Menu'),
      '#default_value' => isset($attrs['menu']) ? $attrs['menu'] : '',
      '#options' => $menus,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div>',
    ];

    $types = [
      '' => t('Default'),
      'c-arrow-dot' => t('Circle'),
      'c-arrow-dot c-square' => t('Square')
    ];
    $form['type'] = [
      '#type' => 'select',
      '#title' => t('List type'),
      '#default_value' => isset($attrs['type']) ? $attrs['type'] : '',
      '#options' => $types,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div>',
    ];

    $color = [
      '' => t('Default'),
      'c-theme' => t('Blue'),
      'multicolor' => t('Multicolor')
    ];
    $form['color'] = [
      '#type' => 'select',
      '#title' => t('Color'),
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : '',
      '#options' => $color,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    $form['uppercase'] = [
      '#title' => t('Uppercase'),
      '#type' => 'checkbox',
      '#default_value' => isset($attrs['uppercase']) ? $attrs['uppercase'] : FALSE,
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class="col-sm-4">',
      '#suffix' => '</div></div>',
    ];

    return $form;
  }
}
