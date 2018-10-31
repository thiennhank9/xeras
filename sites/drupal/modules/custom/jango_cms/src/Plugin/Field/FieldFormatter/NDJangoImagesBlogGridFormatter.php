<?php
/**
 * @file
 * Contains \Drupal\jango_cms\Plugin\Field\FieldFormatter\NDJangoImagesTeamFormatter.
 */

namespace Drupal\jango_cms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatterBase;

/**
 * Plugin implementation of the 'image slider' formatter.
 *
 * @FieldFormatter(
 *   id = "jango_cms_images_blog_grid",
 *   label = @Translation("Jango CMS: Blog Grid"),
 *   field_types = {
 *     "image",
 *   }
 * )
 */
class NDJangoImagesBlogGridFormatter extends ImageFormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
//    foreach ($items as $delta => $item) {
//    }
    /*
    $files = $this->getEntitiesToView($items, $langcode);

    // Early opt-out if the field is empty.
    if (empty($files)) {
      return $elements;
    }

    $image_style_setting = $this->getSetting('image_style');

    // Collect cache tags to be added for each item in the field.
    $base_cache_tags = [];
    if (!empty($image_style_setting)) {
      $image_style = $this->imageStyleStorage->load($image_style_setting);
      $base_cache_tags = $image_style->getCacheTags();
    }

    $output = '<ul class="clearlist content-slider mb-40">';

    foreach ($files as $delta => $file) {
      $cache_tags = Cache::mergeTags($base_cache_tags, $file->getCacheTags());
      // Extract field item attributes for the theme function, and unset them
      // from the $item so that the field template does not re-render them.
      $item = $file->_referringItem;
      $item_attributes = $item->_attributes;
      unset($item->_attributes);

      $image = [
        '#theme' => 'image_formatter',
        '#item' => $item,
        '#item_attributes' => $item_attributes,
        '#image_style' => $image_style_setting,
        '#cache' => [
          'tags' => $cache_tags,
        ],
      ];

      $output .= '<li>' . render($image) . '</li>';
    }

    $output .= '</ul>';
    $elements['#markup'] = $output;

    return $elements;
    */
    $elements[0]['#markup'] = '<div>Blog Grid Image Formatter!!!</div>>';
    return $elements;
  }

}
