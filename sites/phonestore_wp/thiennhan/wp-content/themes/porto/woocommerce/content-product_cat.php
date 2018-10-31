<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $woocommerce_loop, $porto_settings, $porto_layout, $porto_products_cols_lg, $porto_products_cols_md, $porto_products_cols_xs, $porto_products_cols_ls;

$woocommerce_loop['cat_loop']++;
$class = '';

if (!$porto_products_cols_lg) {
    $cols = $porto_settings['product-cols'];
    if ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') {
        if ($cols == 8 || $cols == 7)
            $cols = 6;
    }
    switch ($cols) {
        case 1: $cols_md = 1; $cols_xs = 1; $cols_ls = 1; break;
        case 2: $cols_md = 2; $cols_xs = 2; $cols_ls = 1; break;
        case 3: $cols_md = 3; $cols_xs = 2; $cols_ls = 1; break;
        case 4: $cols_md = 4; $cols_xs = 2; $cols_ls = 1; break;
        case 5: $cols_md = 4; $cols_xs = 2; $cols_ls = 1; break;
        case 6: $cols_md = 5; $cols_xs = 3; $cols_ls = 2; break;
        case 7: $cols_md = 6; $cols_xs = 3; $cols_ls = 2; break;
        case 8: $cols_md = 6; $cols_xs = 3; $cols_ls = 2; break;
        default: $cols = 4; $cols_md = 4; $cols_xs = 2; $cols_ls = 1;
    }
}

if ($woocommerce_loop['cat_loop'] % $porto_products_cols_lg == 1)
    $class .= ' pcols-lg-first';
if ($woocommerce_loop['cat_loop'] % $porto_products_cols_md == 1)
    $class .= ' pcols-md-first';
if ($woocommerce_loop['cat_loop'] % $porto_products_cols_xs == 1)
    $class .= ' pcols-xs-first';
if ($woocommerce_loop['cat_loop'] % $porto_products_cols_ls == 1)
    $class .= ' pcols-ls-first';

?>
<li class="product-category <?php echo $class ?>">

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

    <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
        <div class="thumbnail">
            <div class="thumb-info">
                <?php
                /**
                 * woocommerce_before_subcategory_title hook
                 *
                 * @hooked woocommerce_subcategory_thumbnail - 10
                 */
                do_action( 'woocommerce_before_subcategory_title', $category );
                ?>

                <div class="thumb-info-wrap">
                    <div class="thumb-info-title">
                        <h3 class="sub-title thumb-info-inner"><?php echo esc_html($category->name); ?></h3>
                        <?php if ( $category->count > 0 ) : ?>
                        <span class="thumb-info-type">
                            <?php echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">' . $category->count . '</mark>', $category ) . ' ' . __( 'Products', 'woocommerce' ); ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <?php
    /**
     * woocommerce_after_subcategory_title hook
     */
    do_action( 'woocommerce_after_subcategory_title', $category );
    ?>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>