<?php

namespace Drupal\jango_shortcodes\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * @Shortcode(
 *   id = "nd_progress",
 *   title = @Translation("Progress Bar"),
 *   process_backend_callback = "nd_visualshortcodes_backend_nochilds",
 *   description = @Translation("Progress Bar line"),
 *   icon = "fa fa-tasks",
 * )
 */
class ProgressShortcode extends ShortcodeBase {

  /**
   * {@inheritdoc}
   */
  public function process($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $attrs['class']  = isset($attrs['class']) ? $attrs['class'] : '';
    $attrs['class'] .= isset($attrs['animated']) && $attrs['animated'] ? ' active' : '';
    $attrs['class'] .= isset($attrs['striped']) && $attrs['striped'] ? ' progress-striped' : '';
    $attrs['class'] .= isset($attrs['hover']) && $attrs['hover'] ? ' hover' : '';

    $attrs['percent'] = ($attrs['percent']) ? $attrs['percent'] : 0;
    $colors = [
      'blue' => 'info',
      'green' => 'success',
      'orange' => 'warning',
      'red' => 'danger',
      'black' => ''
    ];
    $color = (isset($attrs['color']) && isset($colors[$attrs['color']])) ? $attrs['color'] : 'blue';
    $text = isset($attrs['title']) && $attrs['title'] ? $attrs['title'] : $text;

    $attrs['class'] .= ' progress';
    if ($attrs['stack'] != TRUE) {
      $output  = '<div ' . _jango_shortcodes_shortcode_attributes($attrs) . ' data-appear-progress-animation="' . $attrs['percent'] . '%">';
      $output .= '<div class="progress-bar progress-bar-' . $colors[$color] . '" style="width:' . $attrs['percent'] . '%;">';
      $output .= $text;
      $output .= ' <span class = "progress-percent">' . $attrs['percent'] . '%</span>';
      $output .= '</div>
    </div>';
    }
    else {
      $theme_array = [
        '#theme' => 'jango_shortcodes_progress',
        '#color1' => $colors[$color],
        '#color2' => $colors[$attrs['color2']],
        '#color3' => $colors[$attrs['color3']],
        '#striped1' => isset($attrs['striped2']) && $attrs['striped'] ? ' progress-bar-striped' : '',
        '#striped2' => isset($attrs['striped2']) && $attrs['striped2'] ? ' progress-bar-striped' : '',
        '#striped3' => isset($attrs['striped3']) && $attrs['striped3'] ? ' progress-bar-striped' : '',
        '#percent1' => $attrs['percent'],
        '#percent2' => $attrs['percent2'],
        '#percent3' => $attrs['percent3'],
      ];
      $output = $this->render($theme_array);
    }

    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function settings($attrs, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
    $form = [];
    $attrs['title'] = isset($attrs['title']) && $attrs['title'] ? $attrs['title'] : $text;
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($attrs['title']) ? $attrs['title'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "row"><div class = "col-sm-7">',
      '#suffix' => '</div>',
    ];
    $colors = [
      'blue' => t('Blue'),
      'green' => t('Green'),
      'orange' => t('Orange'),
      'red' => t('Red'),
      'black' => t('Black')
    ];
    $form['color'] = [
      '#type' => 'radios',
      '#title' => t('Color'),
      '#options' => $colors,
      '#default_value' => isset($attrs['color']) ? $attrs['color'] : 'blue',
      '#attributes' => ['class' => ['color-radios']],
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '.progess-type-select' => ['value' => 'line'],
        ],
      ],
    ];
    $form['percent'] = [
      '#type' => 'textfield',
      '#title' => t('Percent'),
      '#default_value' => isset($attrs['percent']) ? $attrs['percent'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div></div>',
    ];
    $form['striped'] = [
      '#type' => 'checkbox',
      '#title' => t('Striped'),
      '#default_value' => isset($attrs['striped']) ? $attrs['striped'] : '',
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '.progess-type-select' => ['value' => 'line'],
        ],
      ],
    ];
    $form['animated'] = [
      '#type' => 'checkbox',
      '#title' => t('Animated'),
      '#default_value' => isset($attrs['animated']) ? $attrs['animated'] : '',
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          '.progess-type-select' => ['value' => 'line'],
        ],
      ],
    ];
    $form['stack'] = [
      '#type' => 'checkbox',
      '#title' => t('Stacked progress bar'),
      '#default_value' => isset($attrs['stack']) ? $attrs['stack'] : '',
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
    ];
    $form['color2'] = [
      '#type' => 'select',
      '#title' => t('Color 2'),
      '#options' => $colors,
      '#default_value' => isset($attrs['color2']) ? $attrs['color2'] : 'blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="stack"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['percent2'] = [
      '#type' => 'textfield',
      '#title' => t('Percent 2'),
      '#default_value' => isset($attrs['percent2']) ? $attrs['percent2'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="stack"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['striped2'] = [
      '#type' => 'checkbox',
      '#title' => t('Striped'),
      '#default_value' => isset($attrs['striped2']) ? $attrs['striped2'] : '',
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'input[name="stack"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['color3'] = [
      '#type' => 'select',
      '#title' => t('Color 3'),
      '#options' => $colors,
      '#default_value' => isset($attrs['color3']) ? $attrs['color3'] : 'blue',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class="row"><div class = "col-sm-3">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="stack"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['percent3'] = [
      '#type' => 'textfield',
      '#title' => t('Percent 3'),
      '#default_value' => isset($attrs['percent3']) ? $attrs['percent3'] : '',
      '#attributes' => ['class' => ['form-control']],
      '#prefix' => '<div class = "col-sm-2">',
      '#suffix' => '</div>',
      '#states' => [
        'visible' => [
          'input[name="stack"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['striped3'] = [
      '#type' => 'checkbox',
      '#title' => t('Striped'),
      '#default_value' => isset($attrs['striped3']) ? $attrs['striped3'] : '',
      '#prefix' => '<div class = "col-sm-3">',
      '#suffix' => '</div></div>',
      '#states' => [
        'visible' => [
          'input[name="stack"]' => ['checked' => TRUE],
        ],
      ],
    ];
    return $form;
  }
}
