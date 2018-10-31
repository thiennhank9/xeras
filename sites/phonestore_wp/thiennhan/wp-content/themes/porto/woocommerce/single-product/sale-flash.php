<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $product, $porto_settings;

$labels = '';
if ($porto_settings['product-hot']) {
    $featured = get_post_meta($post->ID, '_featured', 'true') == 'yes' ? true : false;
    if ($featured) {
        $labels .= '<div class="onhot">'. __('Hot', 'porto') .'</div>';
    }
}

if ( $porto_settings['product-sale'] && $product->is_on_sale() ) {
    $percentage = 0;
    if ($product->regular_price)
        $percentage = - round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
    if ($porto_settings['product-sale-percent'] && $percentage)
        $labels .= '<div class="onsale">'. $percentage .'%</div>';
    else
        $labels .= apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale', 'porto' ) . '</span>', $post, $product );
}
echo '<div class="labels">';

echo $labels;

echo '</div>';
?>