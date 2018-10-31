<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $product, $woocommerce, $porto_settings;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {

    $loop = 0;
    $columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

    foreach ( $attachment_ids as $attachment_id ) {

        $classes = array( 'zoom' );

        if ( $loop == 0 || $loop % $columns == 0 )
            $classes[] = 'first';

        if ( ( $loop + 1 ) % $columns == 0 )
            $classes[] = 'last';

        $image_link = wp_get_attachment_url( $attachment_id );

        if ( ! $image_link )
            continue;
        ?>
        <div class="ms-slide">
            <?php
            $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
            $image_link  = wp_get_attachment_url( $attachment_id );
            $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail');
            $image_single_link = wp_get_attachment_image_src($attachment_id, 'shop_single');
            $image_class = esc_attr( implode( ' ', $classes ) );
            $image_title = esc_attr( get_the_title( $attachment_id ) ); if (!$image_title) $image_title = '';

            $image_html = '<img src="' . $image_single_link[0] . '" data-href="' . $image_link . '" class="' . $image_class . '" alt="' . $image_title . '" itemprop="image" content="' . $image_link . '" />';
            if ($porto_settings['product-thumbs'])
                $image_html .= '<img class="ms-thumb" alt="' . $image_title . '" src="' . $image_thumb_link[0] . '" />';
            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $image_html, $attachment_id, $post->ID, $image_class );

            $loop++;
        ?>
        </div>
        <?php
    }
}