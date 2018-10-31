<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 *
 * Extra Params
 * @var $is_section
 * @var $section_skin
 * @var $section_color_scale
 * @var $section_skin_scale
 * @var $section_text_color
 * @var $text_align
 * @var $remove_margin_top
 * @var $remove_margin_bottom
 * @var $remove_padding_top
 * @var $remove_padding_bottom
 * @var $remove_border
 * @var $show_divider
 * @var $divider_pos
 * @var $divider_color
 * @var $divider_height
 * @var $show_divider_icon
 * @var $divider_icon
 * @var $divider_icon_skin
 * @var $divider_icon_style
 * @var $divider_icon_pos
 * @var $divider_icon_size
 * @var $divider_icon_color
 * @var $divider_icon_bg_color
 * @var $divider_icon_border_color
 * @var $divider_icon_wrap_border_color
 * @var $animation_type
 * @var $animation_duration
 * @var $animation_delay
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$el_class = $this->getExtraClass( $el_class );

if ($animation_type)
    $el_class .= ' appear-animation';

$css_classes = array(
    $el_class,
    'vc_column_container',
    $width,
    vc_shortcode_custom_css_class( $css ),
);

if ($is_section) {
    $css_classes[] .= ' section';
    if ($section_skin) {
        $css_classes[] .= 'section-' . $section_skin;
        if ($section_skin_scale) {
            $css_classes[] .= 'section-' . $section_skin . '-' . $section_skin_scale;
        }
    }
    if ($section_skin == 'default' && $section_color_scale) {
        $css_classes[] .= 'section-default-' . $section_color_scale;
    }
    if ($section_text_color) {
        $css_classes[] .= 'section-text-' . $section_text_color;
    }
}

if ($remove_margin_top)
    $css_classes[] .= 'm-t-none';

if ($remove_margin_bottom)
    $css_classes[] .= 'm-b-none';

if ($remove_padding_top)
    $css_classes[] .= 'p-t-none';

if ($remove_padding_bottom)
    $css_classes[] .= 'p-b-none';

if ($remove_border)
    $css_classes[] .= 'section-no-borders';

$divider_output = '';
if ($is_section && $show_divider) {
    if ( 'bottom' === $divider_pos)
        $css_classes[] .= 'section-with-divider-footer';
    else
        $css_classes[] .= 'section-with-divider';

    $divider_classes = array('divider', 'divider-solid');
    if ($divider_icon_skin != 'custom') $divider_classes[] = 'divider-' . $divider_icon_skin;
    if ($divider_icon_style) $divider_classes[] = 'divider-' . $divider_icon_style;
    if ($divider_icon_size) $divider_classes[] = 'divider-icon-' . $divider_icon_size;
    if ($divider_icon_pos) $divider_classes[] = 'divider-' . $divider_icon_pos;

    $divider_inline_style = '';
    if ($divider_color)
        $divider_inline_style .= 'background-color:' . $divider_color . ';';
    if ($divider_height)
        $divider_inline_style .= 'height:' . (int)$divider_height . 'px;';

    if ($divider_inline_style)
        $divider_inline_style = ' style="' . esc_attr( $divider_inline_style ) . '"';

    $divider_class = 'divider' . rand();
    if ($divider_icon_skin == 'custom' && ($divider_icon_color || $divider_icon_bg_color || $divider_icon_border_color || $divider_icon_wrap_border_color)) :
        $divider_classes[] = $divider_class;
        ?>
        <style type="text/css" data-type="vc_shortcodes-custom-css"><?php
            if ($divider_icon_color || $divider_icon_bg_color || $divider_icon_border_color) : ?>
            .<?php echo $divider_class ?> .fa {
                <?php
                if ($divider_icon_color) : ?>color: <?php echo $divider_icon_color ?> !important;<?php endif;
                if ($divider_icon_bg_color) : ?>background-color: <?php echo $divider_icon_bg_color ?> !important;<?php endif;
                if ($divider_icon_border_color) : ?>border-color: <?php echo $divider_icon_border_color ?> !important;<?php endif;
                ?>
            }<?php endif;
            if ($divider_icon_wrap_border_color) : ?>
            .<?php echo $divider_class ?> .fa:after {
                <?php
                if ($divider_icon_wrap_border_color) : ?>border-color: <?php echo $divider_icon_wrap_border_color ?> !important;<?php endif;
                ?>
            }<?php endif;
            ?></style>
    <?php
    endif;

    $divider_output = '<div class="' . implode( ' ', $divider_classes ) . '"' . $divider_inline_style . '><i class="' . esc_attr( $divider_icon ) . '"></i></div>';
}

if ($text_align)
    $css_classes[] .= 'text-' . $text_align;

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if ($animation_type)
    $wrapper_attributes[] = 'data-appear-animation="'.$animation_type.'"';
if ($animation_delay)
    $wrapper_attributes[] = 'data-appear-animation-delay="'.$animation_delay.'"';
if ($animation_duration && $animation_duration != 1000)
    $wrapper_attributes[] = 'data-appear-animation-duration="'.$animation_duration.'"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

if ($show_divider && !$divider_pos) {
    $output .= $divider_output;
}

$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';

if ($show_divider && 'bottom' === $divider_pos) {
    $output .= $divider_output;
}

$output .= '</div>';

echo $output;