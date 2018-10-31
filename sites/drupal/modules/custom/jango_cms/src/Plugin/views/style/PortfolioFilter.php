<?php

namespace Drupal\jango_cms\Plugin\views\style;

use Drupal\core\form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * Style plugin to render a list of years and months
 * in reverse chronological order linked to content.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "nd_portfolio_filter",
 *   title = @Translation("Portfolio Filter"),
 *   help = @Translation("Render a list of Images with Isotope Filter"),
 *   theme = "views_view_nd_portfolio_filter",
 *   display_types = { "normal" }
 * )
 *
 */
class PortfolioFilter extends StylePluginBase {

  /**
   * Does the style plugin allows to use style plugins.
   *
   * @var bool
   */
  protected $usesRowPlugin = TRUE;

  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * Does the style plugin support custom css class for the rows.
   *
   * @var bool
   */
  protected $usesRowClass = TRUE;

  /**
   * Set default options
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['columns'] = array('default' => 2);
    $options['field_filter'] = array('default' => '');
    $options['type'] = array('default' => '');
    $options['hover'] = array('default' => '');
    $options['classes'] = array('default' => '');
    $options['title_show'] = array('default' => '');
    $options['grid_type'] = array('default' => '');
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    // Path prefix for TARDIS links.
    $form['columns'] = array(
      '#type' => 'select',
      '#title' => t('Columns'),
      '#options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5],
      '#default_value' => (isset($this->options['columns'])) ? $this->options['columns'] : 2,
    );

    $grid_type = [
      '' => t('Default'),
      'masonry' => t('Masonry')
    ];

    // Path prefix for TARDIS links.
    $form['grid_type'] = array(
      '#type' => 'select',
      '#title' => t('Grid Type'),
      '#options' => $grid_type,
      '#default_value' => (isset($this->options['grid_type'])) ? $this->options['grid_type'] : '',
    );

    $types = [
      '' => t('No Border'),
      ' work-grid-gut' => t('Gutter')
    ];

    // Path prefix for TARDIS links.
    $form['type'] = array(
      '#type' => 'select',
      '#title' => t('Paddings'),
      '#options' => $types,
      '#default_value' => (isset($this->options['type'])) ? $this->options['type'] : '',
    );

    $hovers = [
      '' => t('Black'),
      'hover-white' => t('White'),
    ];

    // Path prefix for TARDIS links.
    $form['hover'] = array(
      '#type' => 'select',
      '#title' => t('Hover Background Color'),
      '#options' => $hovers,
      '#default_value' => (isset($this->options['hover'])) ? $this->options['hover'] : '',
    );

    $titles = [
      '' => t('Show'),
      'hide-titles' => t('Hide'),
    ];

    // Path prefix for TARDIS links.
    $form['title_show'] = array(
      '#type' => 'select',
      '#title' => t('Title Visibility'),
      '#options' => $titles,
      '#default_value' => (isset($this->options['title_show'])) ? $this->options['title_show'] : '',
    );

    // Extra CSS classes.
    $form['field_filter'] = array(
      '#type' => 'textfield',
      '#title' => t('Filter Field'),
      '#default_value' => (isset($this->options['field_filter'])) ? $this->options['field_filter'] : '',
    );

    // Extra CSS classes.
    $form['classes'] = array(
      '#type' => 'textfield',
      '#title' => t('CSS classes'),
      '#default_value' => (isset($this->options['classes'])) ? $this->options['classes'] : '',
    );
  }
}
