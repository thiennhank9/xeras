<?php

namespace Drupal\nikadevs_cms\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\File;

/**
 * NikaDevsCmsController.
 */
class NikaDevsCmsController extends ControllerBase {

  protected $database;

  /**
   * Constructor.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  /**
   *
   */
  public function nikadevs_cms_admin() {
    $element = array(
      '#markup' => 'Welcome to NikaDevs Admin pages.',
    );
    return $element;
  }

  /**
   *
   */
  public function nikadevs_cms_drop_layout_builder() {

  }

  /**
   *
   */
  public function nikadevs_cms_layout_builder_update() {
    module_load_include('inc', 'nikadevs_cms', 'inc/nikadevs_cms');
    // Get all regions for current theme.
    $current_theme = \Drupal::config('system.theme')->get('default');
    $theme_settings = $current_theme . '.settings';
    $layouts = \Drupal::configFactory()->getEditable($theme_settings)->get('nikadevs_cms_layout');

    if (isset($_POST['op']) && $_POST['op'] == 'delete') {
      unset($layouts[$_POST['id']]);
    }
    else {
      $layouts[$_POST['id']] = $_POST['layout'];
    }
    \Drupal::configFactory()->getEditable($theme_settings)->set('nikadevs_cms_layout', $layouts)->save();
    exit;
  }

  /**
   *
   */
  public function nikadevs_cms_block_settings_update() {
    $element = array(
      '#markup' => 'Settings update.',
    );
    return $element;
  }

  /**
   *
   */
  public function nikadevs_cms_filedelete() {
    $element = array(
      '#markup' => 'File delete',
    );
    return $element;

  }

  public function release_cleanup() {
    $database = \Drupal::database();
    $database->truncate('cache_bootstrap')->execute();
    $database->truncate('cache_config')->execute();
    $database->truncate('cache_container')->execute();
    $database->truncate('cache_data')->execute();
    $database->truncate('cache_default')->execute();
    $database->truncate('cache_entity')->execute();
    $database->truncate('cache_menu')->execute();
    $database->truncate('cache_render')->execute();
    $database->truncate('watchdog')->execute();

    $database->update('users_field_data')->fields(
      [
        'name' => 'Admin',
        'pass' => '$S$EK6Qqcs8A69geE.JSbbYJX7VhIyJnd/7Kn42RzT5RrkxHFZfiRYQ',
        'mail' => 'admin@example.com',
        'init' => 'admin@example.com'
      ])
      ->condition('uid', 1)->execute();

    $res = \Drupal::database()->select('file_managed', 'f')->fields('f')->execute();
    $module_path = drupal_get_path('module', 'nikadevs_cms');
    foreach($res as $row) {
      $file_name =  drupal_realpath($row->uri);
      unlink($file_name);
      copy($module_path . '/img/upload_image.png', $file_name);
    }

    db_delete('users')->condition('uid', array(0, 1), 'NOT IN')->execute();

    $element = array(
      '#markup' => 'Done',
    );
    return $element;
  }

  public function flag_cleanup() {
    $database = \Drupal::database();


//    $database->delete('config')->condition('name', 'flag.flag.compare')->execute();
//    $database->delete('config')->condition('name', 'flag.flag.wishlist')->execute();
    $database->delete('config')->condition('name', 'system.action.flag_delete_flagging')->execute();

    $element = array(
      '#markup' => 'Done',
    );
    return $element;
  }
}
