<?php

/**
 * @file
 */

use Drupal\Component\Utility\Unicode;

/**
 *
 */
function _nikadevs_cms_get_active_layout() {
  // Get all regions for current theme.
  $current_theme = \Drupal::config('system.theme')->get('default');
  $theme_settings = $current_theme . '.settings';

  $layouts = \Drupal::configFactory()->getEditable($theme_settings)->get('nikadevs_cms_layout');

  if ($layouts == 'default' || $layouts) {
    // \Drupal::configFa ctory()->getEditable($theme_settings)->set('nikadevs_cms_layout',array())->save();
  }

  $active_layout = 'layout-default';

  foreach ($layouts as $layout_key => $layout) {
    if (!empty($layout['pages'])) {
      $pages = Unicode::strtolower($layout['pages']);
      // Convert the Drupal path to lowercase.
      $current_path = \Drupal::service('path.current')->getPath();

      $path = Unicode::strtolower(\Drupal::service('path.alias_manager')->getAliasByPath($current_path));
      // Compare the lowercase internal and lowercase path alias (if any).
      $page_match = \Drupal::service('path.matcher')->matchPath($path, $pages);

      if ($path != $current_path) {
        $page_match = $page_match || \Drupal::service('path.matcher')->matchPath($current_path, $pages);
      }
      // If match found - use this layout.
      if ($page_match) {
        $active_layout = $layout_key;
        break;
      }
    }

  }

  if (!isset($layouts[$active_layout])) {
    return array();
  }

  $layout = $layouts[$active_layout];

  unset($layout['rows']['id-0']);

  foreach ($layout['rows'] as $key => $row) {
    // If selected "Use row from Default Layout".
    if (isset($layout['rows'][$key]['settings']['use_default']) && $layout['rows'][$key]['settings']['use_default']) {
      foreach ($layouts['layout-default']['rows'] as $default_key => $default_row) {
        if ($row['name'] == $default_row['name']) {
          // Update Region Settings.
          $layout['rows'][$key] = $default_row;
          // Remove regions for current Row.
          foreach ($layout['regions'] as $key_region => $region) {
            if ($region['row_id'] == $key) {
              unset($layout['regions'][$key_region]);
            }
          }
          // Add Regions from 'Default' Layout.
          foreach ($layouts['layout-default']['regions'] as $key_region => $region) {
            if ($region['row_id'] == $default_key) {
              $region['row_id'] = $key;
              $layout['regions'][$key_region] = $region;
            }
          }
          break;
        }
      }
    }
    // Process "Paddings" settings.
    $paddings = array('padding_left', 'padding_right', 'padding_top', 'padding_bottom');
    foreach ($paddings as $padding) {
      if (isset($layout['rows'][$key]['settings'][$padding])) {
        $layout['rows'][$key]['wrap']['attributes']['style'] = isset($layout['rows'][$key]['wrap']['attributes']['style']) ? $layout['rows'][$key]['wrap']['attributes']['style'] : '';
        $layout['rows'][$key]['wrap']['attributes']['style'] .= str_replace('_', '-', $padding) . ': ' . $layout['rows'][$key]['settings'][$padding] . 'px; ';
      }
    }
    $layout['rows'][$key]['wrap']['attributes']['class'] = array('nd-region');
    // Made ID value is SEO friendly.
    $layout['rows'][$key]['id'] = $layout['rows'][$key]['attributes']['id'];
    $layout['rows'][$key]['attributes']['id'] = preg_replace('/[^\p{L}\p{N}]/u', '-', $layout['rows'][$key]['name']);
    if (isset($layout['rows'][$key]['settings']['class'])) {
      $layout['rows'][$key]['wrap']['attributes']['class'][] = $layout['rows'][$key]['settings']['class'];
    }
    $layout['rows'][$key]['settings']['prefix'] = isset($layout['rows'][$key]['settings']['prefix']) ? $layout['rows'][$key]['settings']['prefix'] : '';
    $layout['rows'][$key]['settings']['suffix'] = isset($layout['rows'][$key]['settings']['suffix']) ? $layout['rows'][$key]['settings']['suffix'] : '';
    if (isset($row['settings']['row_container']) && $row['settings']['row_container']) {
      $layout['rows'][$key]['settings']['prefix'] .= '<div class = "container">';
      $layout['rows'][$key]['settings']['suffix'] .= '</div>';
    }
  }
  return $layout;
}

/**
 *
 */
function _nikadevs_cms_active_layout($vars) {

  $layout = _nikadevs_cms_get_active_layout();

  // Fill out Layout with content.
  foreach ($layout['regions'] as $key => $region) {
    if ($region['row_id'] == 'id-0') {
      unset($layout['regions'][$key]);
    }
    else {

      // Process "Paddings" settings.
      $paddings = array('padding_left', 'padding_right', 'padding_top', 'padding_bottom');
      foreach ($paddings as $padding) {
        if (isset($region['settings'][$padding])) {
          $layout['regions'][$key]['attributes']['style'] = isset($layout['regions'][$key]['attributes']['style']) ? $layout['regions'][$key]['attributes']['style'] : '';
          $layout['regions'][$key]['attributes']['style'] .= str_replace('_', '-', $padding) . ': ' . $region['settings'][$padding] . 'px; ';
        }
      }
      $layout['regions'][$key]['attributes']['class'][] = isset($region['settings']['class']) ? $region['settings']['class'] : '';
      $layout['regions'][$key]['settings']['tag'] = isset($region['settings']['tag']) ? ($region['settings']['tag'] == 'none' ? '' : $region['settings']['tag']) : 'div';
      $layout['regions'][$key]['content'] = isset($vars['page'][$key]) ? render($vars['page'][$key]) : '';
    }
  }

  return $layout;
}
