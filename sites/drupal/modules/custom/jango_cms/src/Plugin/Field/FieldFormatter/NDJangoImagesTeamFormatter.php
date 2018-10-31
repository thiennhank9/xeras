<?php
/**
 * @file
 * Contains \Drupal\jango_cms\Plugin\Field\FieldFormatter\NDJangoImagesTeamFormatter.
 */

namespace Drupal\jango_cms\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatterBase;
use Drupal\Core\Url;

/**
 * Plugin implementation of the 'image slider' formatter.
 *
 * @FieldFormatter(
 *   id = "jango_cms_images_team",
 *   label = @Translation("Jango CMS: Image Team"),
 *   field_types = {
 *     "image",
 *   }
 * )
 */
class NDJangoImagesTeamFormatter extends ImageFormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    $files = $this->getEntitiesToView($items, $langcode);
    // Early opt-out if the field is empty.
    if (empty($files)) {
      return $element;
    }

    $nid = (int) $items->getEntity()->id();
    $path = Url::fromRoute('entity.node.canonical', ['node' => $nid])->toString();
    $url = '';
    foreach ($files as $delta => $file) {
      $url = file_create_url($file->getFileUri());
    }

    $theme_array = [
      '#theme' => 'jango_cms_images_team_formatter',
      '#path' => $path,
      '#url' => $url,
    ];
    $element[0]['#markup'] = \Drupal::service('renderer')->renderPlain($theme_array);

    return $element;
  }
}
