<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_width
 * @var $style
 * @var $color
 * @var $border_width
 * @var $accent_color
 * @var $el_class
 * @var $align
 * @var string $css
 *
 * Extra Params
 * @var $type
 * @var $gap
 * @var $pattern
 * @var $show_icon
 * @var $icon
 * @var $icon_skin
 * @var $icon_style
 * @var $icon_size
 * @var $icon_pos
 * @var $icon_color
 * @var $icon_bg_color
 * @var $icon_border_color
 * @var $icon_wrap_border_color
 *
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Separator
 */
$css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

echo '<div class="porto-separator ' . esc_attr( $gap ).'">';

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

global $porto_settings;
$default_color = porto_is_dark_skin() ? 'rgba(255,255,255,0.15)' : 'rgba(0,0,0,0.15)';

if (!$accent_color)
    $accent_color = $default_color;

$css_class .= ' ' . $align;
if ($color == 'custom' || !$color)
    $color = $accent_color;
if (!$align)
    $align = 'align_center';
if (!$show_icon)
    $icon = '';

if ($icon) {
    if ($icon_skin != 'custom') $css_class .= ' divider-' . $icon_skin;
    if ($icon_style) $css_class .= ' divider-' . $icon_style;
    if ($icon_size) $css_class .= ' divider-icon-' . $icon_size;
    if ($icon_pos) $css_class .= ' divider-' . $icon_pos;
}

if ($type)
    $style = 'solid';

if ($style) {
    if ($style == 'solid') $css_class .= ($icon ? ' divider-' : ' ') . $style;
    else $css_class .= ' ' . $style;
}

$inline_style = '';
$custom_css = '';
$rand = 'separator'.rand();
$f_rand = false;

if (!$style && ($color != $default_color || $align != 'align_center')) {
    $inline_style .= 'background-image: -webkit-linear-gradient(left' . (($align == 'align_center' || $align == 'align_right') ? ', transparent' : '') . ', ' . $color .
    (($align == 'align_center' || $align == 'align_left') ? ', transparent' : '') .
    '); background-image: linear-gradient(to right' . (($align == 'align_center' || $align == 'align_right') ? ', transparent' : '') . ', ' . $color .
    (($align == 'align_center' || $align == 'align_left') ? ', transparent' : '') . ');';
} else if ($style == 'solid' && $color != $default_color) {
    $inline_style .= 'background-color:'.$color.';';
} else if ($style == 'dashed' && $color != $default_color) {
    if (!$f_rand) {
        $css_class .= ' ' . $rand;
        $f_rand = true;
    }
    $custom_css .= '.'.$rand.':after {border-color:'.$color.' !important;}';
} else if ($style == 'pattern') {
    if ($pattern) {
        $pattern_url = wp_get_attachment_url($pattern);
        if (!$f_rand) {
            $css_class .= ' ' . $rand;
            $f_rand = true;
        }
        $custom_css .= '.'.$rand.':after {background-image:url('.$pattern_url.') !important;}';
    }
}

if ($border_width) {
    if ($style == 'dashed') {
        if (!$f_rand) {
            $css_class .= ' ' . $rand;
            $f_rand = true;
        }
        $custom_css .= '.'.$rand.':after {border-width:' . $border_width . 'px !important;margin-top:-' . $border_width . 'px !important;}';
    } else {
        $inline_style .= 'height:' . $border_width . 'px;';
    }
}

if ($inline_style) {
    $inline_style = ' style="' . $inline_style . '"';
}

if ($custom_css) {
    echo '<style type="text/css" data-type="vc_shortcodes-custom-css">'.$custom_css.'</style>';
}

if ($icon) {
    $divider_class = 'divider' . rand();
    if ($icon_skin == 'custom' && ($icon_color || $icon_bg_color || $icon_border_color || $icon_wrap_border_color)) :
        $css_class .= ' ' . $divider_class;
        ?>
        <style type="text/css" data-type="vc_shortcodes-custom-css"><?php
            if ($icon_color || $icon_bg_color || $icon_border_color) : ?>
            .<?php echo $divider_class ?> .fa {
                <?php
                if ($icon_color) : ?>color: <?php echo $icon_color ?> !important;<?php endif;
                if ($icon_bg_color) : ?>background-color: <?php echo $icon_bg_color ?> !important;<?php endif;
                if ($icon_border_color) : ?>border-color: <?php echo $icon_border_color ?> !important;<?php endif;
                ?>
            }<?php endif;
            if ($icon_wrap_border_color) : ?>
            .<?php echo $divider_class ?> .fa:after {
                <?php
                if ($icon_wrap_border_color) : ?>border-color: <?php echo $icon_wrap_border_color ?> !important;<?php endif;
                ?>
            }<?php endif;
        ?></style>
    <?php
    endif;
    echo '<div class="divider ' . esc_attr( $css_class ) . ($el_width?' separator-line-' . esc_attr( $el_width ) :'') . '"' . $inline_style . '><i class="' . esc_attr( $icon ) . '"></i></div>';
} else {
    if ($type == 'small') {
        echo '<div class="divider divider-small ' . ($align ? ($align == 'align_left' ? '' : str_replace('align_', 'divider-small-', $align)) : 'divider-small-center') . '">' . '<hr ' . $inline_style . '>' . '</div>';
    } else {
        echo '<hr class="separator-line ' . esc_attr( $css_class ) . ($el_width?' separator-line-'.$el_width:'').'"' . $inline_style . '>';
    }
}

echo '</div>';