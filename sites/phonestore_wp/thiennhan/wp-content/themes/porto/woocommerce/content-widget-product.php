<?php global $product, $porto_settings; ?>
<li>
	<a class="product-image" href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php porto_widget_product_thumbnail(); ?>
	</a>
    <div class="product-details">
        <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
            <?php echo $product->get_title(); ?>
        </a>
        <?php if ( ! empty( $show_rating ) || $porto_settings['woo-show-rating'] ) echo porto_get_rating_html($product); ?>
        <?php echo $product->get_price_html(); ?>
    </div>
</li>