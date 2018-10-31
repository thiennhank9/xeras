<?php

namespace Drupal\nd_visualshortcodes\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\Entity\FilterFormat;
use Drupal\filter\FilterFormatInterface;
/**
 * Configure nd_visualshortcodes settings for this site.
 */
class nd_visualshortcodesSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'visual_shortcodes_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['nd_visualshortcodes.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('nd_visualshortcodes.settings');

  $form= array(
    '#tree' => TRUE,
  );
  $form['autostart'] = array(
    '#type' => 'checkbox',
    '#title' => t('Autostart Visual Shortcodes editor'),
    '#default_value' =>  $config->get('autostart')  
  );
  $form['confirm_delete'] = array(
    '#type' => 'checkbox',
    '#title' => t('Confirm to delete shortcode'),
    '#default_value' =>  $config->get('confirm_delete')  
  );

  $user = \Drupal::currentUser();
  $fformats = filter_formats($user);
  // var_dump($fformats);
  $formats=array();
  // dsm($fformats->toArray());
  foreach($fformats as $format) {
    // $formats["id"] = "text";
    // $formats["id2"] ="name";
    $formats[$format->id()] = $format->id();
  }
  $form['formats'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Enable for next Text Formats'),
    '#options' => $formats,
    '#default_value' => $config->get('formats')
  );
  $form['html_default_format'] = array(
    '#type' => 'select',
    '#title' => t('Default HTML tag Format'),
    '#options' => $formats,
    '#default_value' => $config->get('html_default_format')
  );


	return parent::buildForm($form, $form_state);
	
	
	
	
	
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $autostart = $form_state->getValue('autostart');
    $confirm_delete = $form_state->getValue('confirm_delete');
    $html_default_format = $form_state->getValue('html_default_format');
    $formats = $form_state->getValue('formats');

    $this->config('nd_visualshortcodes.settings')    
      ->set('autostart', $autostart)
      ->set('formats', $formats)      
      ->set('confirm_delete', $confirm_delete)      
      ->set('html_default_format', $html_default_format)      
      ->save();

    parent::submitForm($form, $form_state);
  }

}
