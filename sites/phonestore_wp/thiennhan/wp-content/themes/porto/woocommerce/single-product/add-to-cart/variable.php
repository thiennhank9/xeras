<?php
/**
 * Variable product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product, $post;

$porto_woo_version = porto_get_woo_version_number();

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
    <?php do_action( 'woocommerce_before_variations_form' ); ?>

    <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
        <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
    <?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php $loop = 0; foreach ( $attributes as $attribute_name => $options ) : $loop++; ?>
					<tr>
						<td class="label"><label for="<?php echo sanitize_title($attribute_name); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
                        <?php if ( version_compare($porto_woo_version, '2.4', '<')) : ?>
						    <td class="value"><select id="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>" name="attribute_<?php echo sanitize_title( $attribute_name ); ?>"<?php if ( version_compare($porto_woo_version, '2.3', '>=') ) : ?> data-attribute_name="attribute_<?php echo sanitize_title( $attribute_name ); ?>"<?php endif; ?>>
							    <option value=""><?php echo __( 'Choose an option', 'woocommerce' ) ?>&hellip;</option>
							    <?php
								    if ( is_array( $options ) ) {

	    								if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) {
		    								$selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ];
			    						} elseif ( isset( $selected_attributes[ sanitize_title( $attribute_name ) ] ) ) {
				    						$selected_value = $selected_attributes[ sanitize_title( $attribute_name ) ];
					    				} else {
						    				$selected_value = '';
							    		}

                                        if ( version_compare($porto_woo_version, '2.3', '<') ) {
                                            // Get terms if this is a taxonomy - ordered
                                            if ( taxonomy_exists( sanitize_title( $attribute_name ) ) ) {

                                                $orderby = wc_attribute_orderby( sanitize_title( $attribute_name ) );

                                                switch ( $orderby ) {
                                                    case 'name' :
                                                        $args = array( 'orderby' => 'name', 'hide_empty' => false, 'menu_order' => false );
                                                        break;
                                                    case 'id' :
                                                        $args = array( 'orderby' => 'id', 'order' => 'ASC', 'menu_order' => false, 'hide_empty' => false );
                                                    break;
                                                    case 'menu_order' :
                                                        $args = array( 'menu_order' => 'ASC', 'hide_empty' => false );
                                                    break;
                                                }

                                                $terms = get_terms( sanitize_title( $attribute_name ), $args );

                                                foreach ( $terms as $term ) {
                                                    if ( ! in_array( $term->slug, $options ) )
                                                        continue;

                                                    echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
                                                }
                                            } else {

                                                foreach ( $options as $option ) {
                                                    echo '<option value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                                                }

                                            }
                                        } else {
                                            if ( taxonomy_exists( $attribute_name ) ) {

                                                $terms = wc_get_product_terms( $post->ID, $attribute_name, array( 'fields' => 'all' ) );

                                                foreach ( $terms as $term ) {
                                                    if ( ! in_array( $term->slug, $options ) ) {
                                                        continue;
                                                    }
                                                    echo '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . '>' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</option>';
                                                }

                                            } else {

                                                foreach ( $options as $option ) {
                                                    echo '<option value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                                                }

                                            }
                                        }
		    						}
			    				?>
				    		</select> <?php
					    		if ( sizeof( $attributes ) === $loop ) {
						    		echo '<a class="reset_variations" href="#reset">' . __( 'Clear selection', 'woocommerce' ) . '</a>';
                                }
						    ?></td>
					    <?php else: ?>
                            <td class="value">
                                <?php
                                $selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
                                wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
                                echo end( $attribute_keys ) === $attribute_name ? '<a class="reset_variations" href="#">' . __( 'Clear selection', 'woocommerce' ) . '</a>' : '';
                                ?>
                            </td>
                        <?php endif; ?>
                    </tr>
		        <?php endforeach;?>
			</tbody>
		</table>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap" style="display:none;">
			<?php
            /**
             * woocommerce_before_single_variation Hook
             */
            do_action( 'woocommerce_before_single_variation' ); ?>

            <?php if ( version_compare($porto_woo_version, '2.4', '<')) : ?>
                <div class="single_variation"></div>

                <div class="variations_button">

                    <?php woocommerce_quantity_input( array(
                        'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
                    ) ); ?>
                    <button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
                </div>

                <input type="hidden" name="add-to-cart" value="<?php echo $product->id; ?>" />
                <input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
                <input type="hidden" name="variation_id"<?php if ( version_compare($porto_woo_version, '2.3', '>=') ) : ?> class="variation_id"<?php endif; ?>value="" />
            <?php else : ?>
                <?php
                /**
                 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
                 * @since 2.4.0
                 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                 */
                do_action( 'woocommerce_single_variation' );
                ?>
            <?php endif; ?>
            <?php
            /**
             * woocommerce_after_single_variation Hook
             */
            do_action( 'woocommerce_after_single_variation' );
            ?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; ?>

    <?php do_action( 'woocommerce_after_variations_form' ); ?>

</form>

<?php
    do_action( 'woocommerce_after_add_to_cart_form' );
?>
