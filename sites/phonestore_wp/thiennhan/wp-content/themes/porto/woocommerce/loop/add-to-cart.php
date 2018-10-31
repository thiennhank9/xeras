<?php
/**
 * Loop Add to Cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $porto_settings, $product;

$wishlist = class_exists('YITH_WCWL') && $porto_settings['product-wishlist'];
$quickview = $porto_settings['product-quickview'];

?>
<div class="add-links-wrap">
    <div class="add-links <?php if (!$wishlist && !$quickview) echo 'no-effect' ?> clearfix">
        <?php
        global $porto_settings;

        $catalog_mode = false;
        if ($porto_settings['catalog-enable']) {
            if ($porto_settings['catalog-admin'] || (!$porto_settings['catalog-admin'] && !(current_user_can( 'administrator' ) && is_user_logged_in())) ) {
                if (!$porto_settings['catalog-cart']) {
                    $catalog_mode = true;
                }
            }
        }
        if (!$catalog_mode) {
            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    esc_attr( isset( $quantity ) ? $quantity : 1 ),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : 'add_to_cart_read_more',
                    esc_attr( $product->product_type ),
                    esc_html( $product->add_to_cart_text() )
                ),
            $product );
        } else {
            $more_link = get_post_meta(get_the_id(), 'product_more_link', true);
            if (!$more_link) {
                $more_link = apply_filters( 'the_permalink', get_permalink() );
            }
            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
                    esc_url( $more_link ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    esc_attr( isset( $quantity ) ? $quantity : 1 ),
                    'add_to_cart_read_more',
                    esc_attr( $product->product_type ),
                    esc_html( $porto_settings['catalog-readmore-label'] )
                ),
                $product );
        }

        if ($wishlist)
            echo do_shortcode('[yith_wcwl_add_to_wishlist]');
        if ($quickview) {
            echo '<div class="quickview" data-id="'.$product->id.'" title="' . __('Quick View', 'porto') . '">'.__('Quick View', 'porto').'</div>';
        }
        ?>
    </div>
</div>