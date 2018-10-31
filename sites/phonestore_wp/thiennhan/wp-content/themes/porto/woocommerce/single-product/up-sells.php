<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $porto_settings, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 || !$porto_settings['product-upsells'] ) {
    return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $porto_settings['product-upsells-count'],
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = isset($porto_settings['product-upsells-cols']) ? $porto_settings['product-upsells-cols'] : $porto_settings['product-cols'];

if (!$woocommerce_loop['columns']) $woocommerce_loop['columns'] = 4;

if ( $products->have_posts() ) : ?>

	<div class="upsells products">

		<h2 class="slider-title"><span class="inline-title"><?php _e( 'You may also like&hellip;', 'woocommerce' ) ?></span><span class="line"></span></h2>

        <div class="slider-wrapper">

            <?php
            global $woocommerce_loop;

            $woocommerce_loop['view'] = 'products-slider';

            woocommerce_product_loop_start();
            ?>

                <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

		    <?php
            woocommerce_product_loop_end();
            ?>
        </div>

	</div>

<?php endif;

wp_reset_postdata();
