<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $value
 * @var $units
 * @var $color
 * @var $custom_color
 * @var $label_value
 * @var $css
 *
 * Extra Params
 * @var $type : custom
 * @var $view
 * @var $view_size
 * @var $icon
 * @var $icon_color
 * @var $size
 * @var $trackcolor
 * @var $barcolor
 * @var $scalecolor
 * @var $speed
 * @var $line
 * @var $linecap
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_Vc_Pie
 */
$title = $output = '';
$atts = $this->convertOldColorsToNew( $atts );
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ($type == 'default') {

    wp_enqueue_script('vc_pie');

    $colors = array(
        'blue' => '#5472d2',
        'turquoise' => '#00c1cf',
        'pink' => '#fe6c61',
        'violet' => '#8d6dc4',
        'peacoc' => '#4cadc9',
        'chino' => '#cec2ab',
        'mulled-wine' => '#50485b',
        'vista-blue' => '#75d69c',
        'orange' => '#f7be68',
        'sky' => '#5aa1e3',
        'green' => '#6dab3c',
        'juicy-pink' => '#f4524d',
        'sandy-brown' => '#f79468',
        'purple' => '#b97ebb',
        'black' => '#2a2a2a',
        'grey' => '#ebebeb',
        'white' => '#ffffff'
    );

    if ( 'custom' === $color ) {
        $color = $custom_color;
    } else {
        $color = isset( $colors[ $color ] ) ? $colors[ $color ] : '';
    }

    if ( ! $color ) {
        $color = $colors['grey'];
    }

    $class_to_filter = 'vc_pie_chart wpb_content_element';
    $class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

    $output = '<div class= "' . esc_attr( $css_class ) . '" data-pie-value="' . esc_attr( $value ) . '" data-pie-label-value="' . esc_attr( $label_value ) . '" data-pie-units="' . esc_attr( $units ) . '" data-pie-color="' . esc_attr( $color ) . '">';
    $output .= '<div class="wpb_wrapper">';
    $output .= '<div class="vc_pie_wrapper">';
    $output .= '<span class="vc_pie_chart_back" style="border-color: ' . esc_attr( $color ) . '"></span>';
    $output .= '<span class="vc_pie_chart_value"></span>';
    $output .= '<canvas width="101" height="101"></canvas>';
    $output .= '</div>';

    if ( '' !== $title ) {
        $output .= '<h4 class="wpb_heading wpb_pie_chart_heading">' . $title . '</h4>';
    }

    $output .= '</div>';
    $output .= '</div>';

    echo $output;
} else {
    global $porto_settings;
    if (empty($barcolor))
        $barcolor = $porto_settings['skin-color'];

    $el_class = $this->getExtraClass( $el_class );
    if ($view) $el_class .= ' '.$view;
    if ($view_size) $el_class .= ' circular-bar-'.$view_size;
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'circular-bar center ' . $el_class, $this->settings['base'], $atts );
    $output = '<div class= "' . esc_attr( $css_class ) . '">';
        $output .= '<div class="circular-bar-chart" data-trackcolor="' . esc_attr( $trackcolor ) . '" data-barcolor="' . esc_attr( $barcolor ) . '" data-scalecolor="' . esc_attr( $scalecolor ) . '" data-percent="' . esc_attr( $value ) . '" data-size="' . esc_attr( $size ) . '" data-speed="' . esc_attr( $speed ) . '" data-linewidth="' . esc_attr( $line ) . '" data-label-value="' . esc_attr( $label_value ) . '" data-linecap="' . esc_attr( $linecap ) . '" style="height:' . esc_attr( $size ) . 'px">';
            if ($view == 'only-icon' && $icon) {
                $output .= '<i class="' . esc_attr( $icon ) . '"'.($icon_color?' style="color:' . esc_attr( $icon_color ) . '"':'').'></i>';
            } else if ($view == 'single-line') {
                if ($title!='') {
                    $output .= '<strong>'.$title.'</strong>';
                }
            } else {
                if ($title!='') {
                    $output .= '<strong>'.$title.'</strong>';
                }
                $output .= '<label><span class="percent">0</span>'.$units.'</label>';
            }
	    $output .= '</div>';

	$output .= '</div>';
	echo $output;
}