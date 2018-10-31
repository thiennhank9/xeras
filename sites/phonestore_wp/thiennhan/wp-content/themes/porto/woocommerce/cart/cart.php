<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$porto_woo_version = porto_get_woo_version_number();

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<div class="featured-box">
    <div class="box-content">
        <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <table class="shop_table responsive cart" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
                    <th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
                    <th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
                    <th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        ?>
                        <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                            <td class="product-remove">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                        '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                        esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                        __( 'Remove this item', 'woocommerce' ),
                                        esc_attr( $product_id ),
                                        esc_attr( $_product->get_sku() )
                                    ), $cart_item_key );
                                ?>
                            </td>

                            <td class="product-thumbnail">
                                <?php
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                    if ( ! $_product->is_visible() ) {
                                        echo $thumbnail;
                                    } else {
                                        if ( version_compare($porto_woo_version, '2.3', '<') ) {
                                            printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
                                        } else {
                                            printf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $thumbnail );
                                        }
                                    }
                                ?>
                            </td>

                            <td class="product-name">
                                <?php
                                    if ( ! $_product->is_visible() ) {
                                        echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                                    } else {
                                        if ( version_compare($porto_woo_version, '2.3', '<') ) {
                                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );
                                        } else {
                                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink( $cart_item ), $_product->get_title() ), $cart_item, $cart_item_key );
                                        }
                                    }

                                    // Meta data
                                    echo WC()->cart->get_item_data( $cart_item );

                                    // Backorder notification
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
                                    }
                                ?>
                            </td>

                            <td class="product-price">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key, $cart_item );
                                ?>
                            </td>

                            <td class="product-quantity">
                                <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input( array(
                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                            'min_value'   => '0'
                                        ), $_product, false );
                                    }

                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
                                ?>
                            </td>

                            <td class="product-subtotal">
                                <?php
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }

                do_action( 'woocommerce_cart_contents' );
                ?>
                <tr>
                    <td colspan="6" class="actions">

                        <?php if ( WC()->cart->coupons_enabled() ) { ?>
                            <div class="coupon pt-left">

                                <label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="btn btn-default" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'woocommerce' ); ?>" />

                                <?php do_action('woocommerce_cart_coupon'); ?>

                            </div>
                        <?php } ?>

                        <?php if ( version_compare($porto_woo_version, '2.3', '<') ) : ?>
                            <div class="actions pt-right">
                                <input type="submit" class="btn btn-default btn-lg" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" /> <input type="submit" class="checkout-button button btn-lg alt wc-forward" name="proceed" value="<?php esc_attr_e( 'Proceed to Checkout', 'woocommerce' ); ?>" />
                            </div>

                            <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
                        <?php else : ?>
                            <div class="cart-actions pt-right">
                                <input type="submit" class="btn btn-default btn-lg" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />

                                <?php do_action( 'woocommerce_cart_actions' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                    </td>
                </tr>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>
            </tbody>
        </table>

        <?php do_action( 'woocommerce_after_cart_table' ); ?>

        </form>
    </div>
</div>

<div class="cart-collaterals">

    <div class="row">
        <?php if ( version_compare($porto_woo_version, '2.3', '<') ) : ?>
            <div class="col-md-6 shipping-form-wrap">
                <div class="featured-box align-left">
                    <div class="box-content">
                        <?php woocommerce_shipping_calculator(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( version_compare($porto_woo_version, '2.3.8', '<') ) : ?>
        <div class="<?php if ($porto_woo_version < 2.3) echo 'col-md-6'; else echo 'col-md-12' ?>">
            <?php woocommerce_cart_totals(); ?>
        </div>
        <?php endif; ?>
    </div>

    <?php do_action( 'woocommerce_cart_collaterals' ); ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
