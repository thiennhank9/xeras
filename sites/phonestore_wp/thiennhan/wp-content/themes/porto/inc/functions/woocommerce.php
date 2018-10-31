<?php

// get woocommerce version number
function porto_get_woo_version_number() {
    // If get_plugins() isn't available, require it
    if ( ! function_exists( 'get_plugins' ) )
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    // Create the plugins folder and file variables
    $plugin_folder = get_plugins( '/' . 'woocommerce' );
    $plugin_file = 'woocommerce.php';

    // If the plugin version number is set, return it
    if ( isset( $plugin_folder[$plugin_file]['Version'] ) ) {
        return $plugin_folder[$plugin_file]['Version'];
    } else {
        // Otherwise return null
        return NULL;
    }
}

// remove actions
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

// add actions
add_action('woocommerce_before_shop_loop', 'porto_grid_list_toggle', 40);
add_action('woocommerce_before_shop_loop', 'woocommerce_pagination', 50);
add_action('woocommerce_before_shop_loop_item_title', 'porto_loop_product_thumbnail', 10);
add_action('woocommerce_after_shop_loop_item_title', 'porto_woocommerce_single_excerpt', 9);
add_action('woocommerce_archive_description', 'porto_woocommerce_category_image', 2);

// add filters
add_filter('woocommerce_show_page_title', 'porto_woocommerce_show_page_title');
add_filter('woocommerce_layered_nav_link', 'porto_layered_nav_link');
add_filter('loop_shop_per_page', 'porto_loop_shop_per_page');

add_filter('woocommerce_available_variation', 'porto_woocommerce_available_variation', 10, 3);

add_filter('woocommerce_related_products_args', 'porto_remove_related_products', 10);
add_filter('add_to_cart_fragments', 'porto_woocommerce_header_add_to_cart_fragment');

add_filter('woocommerce_cart_item_class', 'porto_woocommerce_cart_item_class', 10, 3);

// change action position
add_action('woocommerce_share', 'porto_woocommerce_share');

function porto_woocommerce_share() {
    global $porto_settings;

    $share = porto_get_meta_value('product_share');
    if ($porto_settings['share-enable'] && 'no' !== $share && ('yes' === $share || ('yes' !== $share && $porto_settings['product-share'])))
    get_template_part('share');
}

// hide woocommer page title
function porto_woocommerce_show_page_title($args) {
    return false;
}

// show grid/list toggle buttons
function porto_grid_list_toggle() {
?>
    <div class="gridlist-toggle">
        <a href="#" id="grid" title="<?php echo __('Grid View', 'porto') ?>"></a><a href="#" id="list" title="<?php echo __('List View', 'porto') ?>"></a>
    </div>
<?php
}

// get product count per page
function porto_loop_shop_per_page() {
    global $porto_settings;

    parse_str($_SERVER['QUERY_STRING'], $params);

    // replace it with theme option
    if ($porto_settings['category-item']) {
        $per_page = explode(',', $porto_settings['category-item']);
    } else {
        $per_page = explode(',', '12,24,36');
    }

    $item_count = !empty($params['count']) ? $params['count'] : $per_page[0];

    return $item_count;
}

// add thumbnail image parameter
function porto_woocommerce_available_variation($variations, $product, $variation) {

    if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
        $attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );

        $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail');
        $variations = array_merge( $variations, array( 'image_thumb' => $image_thumb_link[0] ) );

        $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'shop_single');
        $variations = array_merge( $variations, array( 'image_src' => $image_thumb_link[0] ) );

        $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'full');
        $variations = array_merge( $variations, array( 'image_link' => $image_thumb_link[0] ) );
    } else if ( has_post_thumbnail() ) {
        $attachment_id = get_post_thumbnail_id();

        $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail');
        $variations = array_merge( $variations, array( 'image_thumb' => $image_thumb_link[0] ) );

        $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'shop_single');
        $variations = array_merge( $variations, array( 'image_src' => $image_thumb_link[0] ) );

        $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'full');
        $variations = array_merge( $variations, array( 'image_link' => $image_thumb_link[0] ) );
    }
    return $variations;
}

// add sort order parameter
function porto_layered_nav_link($link) {

    parse_str($_SERVER['QUERY_STRING'], $params);

    if (!empty($params['orderby']))
        $link = esc_url( add_query_arg( 'orderby', $params['orderby'], $link ) );

    if (!empty($params['count']))
        $link = esc_url( add_query_arg( 'count', $params['count'], $link ) );

    return $link;
}

// change product thumbnail in products list page
function porto_loop_product_thumbnail() {
    global $porto_settings;

    $id = get_the_ID();
    $size = 'shop_catalog';

    $gallery = get_post_meta($id, '_product_image_gallery', true);
    $attachment_image = '';
    if (!empty($gallery) && $porto_settings['category-image-hover']) {
        $gallery = explode(',', $gallery);
        $first_image_id = $gallery[0];
        $attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image'));
    }

    $thumb_image = get_the_post_thumbnail($id , $size, array('class' => ''));
    if (!$thumb_image) {
        if ( wc_placeholder_img_src() ) {
            $thumb_image = wc_placeholder_img( $size );
        }
    }

    echo '<div class="inner'.(($attachment_image)?' img-effect':'').'">';

    // show images
    echo $thumb_image;
    echo $attachment_image;

    echo '</div>';
}

// change product thumbnail in products widget
function porto_widget_product_thumbnail() {
    global $porto_settings;

    $id = get_the_ID();
    $size = 'shop_thumbnail';

    $gallery = get_post_meta($id, '_product_image_gallery', true);
    $attachment_image = '';
    if (!empty($gallery) && $porto_settings['category-image-hover']) {
        $gallery = explode(',', $gallery);
        $first_image_id = $gallery[0];
        $attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image '));
    }

    $thumb_image = get_the_post_thumbnail($id , $size, array('class' => ''));
    if (!$thumb_image) {
        if ( wc_placeholder_img_src() ) {
            $thumb_image = wc_placeholder_img( $size );
        }
    }

    echo '<div class="inner'.(($attachment_image)?' img-effect':'').'">';

    // show images
    echo $thumb_image;
    echo $attachment_image;

    echo '</div>';
}

// remove related products
function porto_remove_related_products( $args ) {
    global $porto_settings;

    if (isset($porto_settings['product-related']) && !$porto_settings['product-related'])
        return array();
    return $args;
}

// add ajax cart fragment
function porto_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $porto_settings;

    $_cartQty = WC()->cart->cart_contents_count;

    $minicart_type = porto_get_minicart_type();

    $fragments['#mini-cart .cart-items'] = '<span class="cart-items">'. ($minicart_type == 'minicart-inline'
            ? '<span class="mobile-hide">' . sprintf( _n( '%d item', '%d items', $_cartQty, 'porto' ), $_cartQty ) . '</span><span class="mobile-show">' . $_cartQty . '</span>'
            : (($_cartQty > 0) ? $_cartQty : '0')) .'</span>';

    return $fragments;
}

// ajax remove cart item
add_action( 'wp_ajax_porto_cart_item_remove', 'porto_cart_item_remove' );
add_action( 'wp_ajax_nopriv_porto_cart_item_remove', 'porto_cart_item_remove' );
function porto_cart_item_remove() {

    $cart = WC()->instance()->cart;
    $cart_id = $_POST['cart_id'];
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if ($cart_item_id) {
        $cart->set_quantity($cart_item_id, 0);
    }

    $cart_ajax = new WC_AJAX();
    $cart_ajax->get_refreshed_fragments();

    exit();
}

// refresh cart fragment
add_action( 'wp_ajax_porto_refresh_cart_fragment', 'porto_refresh_cart_fragment' );
add_action( 'wp_ajax_nopriv_porto_refresh_cart_fragment', 'porto_refresh_cart_fragment' );
function porto_refresh_cart_fragment() {

    $cart_ajax = new WC_AJAX();
    $cart_ajax->get_refreshed_fragments();

    exit();
}

function porto_get_products_by_ids($product_ids) {
    $product_ids = explode(',', $product_ids);
    $product_ids = array_map('trim', $product_ids);

    $args = array(
        'post_type'    => 'product',
        'post_status' => 'publish',
        'ignore_sticky_posts'    => 1,
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key'         => '_visibility',
                'value'     => array('catalog', 'visible'),
                'compare'     => 'IN'
            )
        ),
        'post__in' => $product_ids
    );

    $query = new WP_Query($args);

    return $query;
}

function porto_get_rating_html( $product, $rating = null ) {

    if (get_option('woocommerce_enable_review_rating') == 'no')
        return '';

    if ( ! is_numeric( $rating ) ) {
        $rating = $product->get_average_rating();
    }

    $rating_html  = '<div class="star-rating" title="' . $rating . '">';

    $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span>';

    $rating_html .= '</div>';

    return $rating_html;
}

// Quick View Html
add_action('wp_ajax_porto_product_quickview', 'porto_product_quickview');
add_action('wp_ajax_nopriv_porto_product_quickview', 'porto_product_quickview');

function porto_product_quickview() {

    global $post, $product;
    $post = get_post($_GET['pid']);
    $product = wc_get_product( $post->ID );

    if ( post_password_required() ) {
        echo get_the_password_form();
        die();
        return;
    }

    ?>

    <div class="quickview-wrap quickview-wrap-<?php echo $post->ID ?> single-product">
        <div class="product product-summary-wrap">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 summary-before">
                    <?php
                    do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 summary entry-summary">
                    <?php
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                    <script type="text/javascript">
                        /* <![CDATA[ */
                        <?php
                        $suffix               = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
                        $assets_path          = esc_url(str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() )) . '/assets/';
                        $frontend_script_path = $assets_path . 'js/frontend/';
                        ?>
                        var wc_add_to_cart_params = <?php echo array2json(apply_filters( 'wc_add_to_cart_params', array(
                            'ajax_url'                => WC()->ajax_url(),
                            'ajax_loader_url'         => apply_filters( 'woocommerce_ajax_loader_url', $assets_path . 'images/ajax-loader@2x.gif' ),
                            'i18n_view_cart'          => esc_attr__( 'View Cart', 'woocommerce' ),
                            'cart_url'                => get_permalink( wc_get_page_id( 'cart' ) ),
                            'is_cart'                 => is_cart(),
                            'cart_redirect_after_add' => get_option( 'woocommerce_cart_redirect_after_add' )
                        ) )) ?>;
                        var wc_single_product_params = <?php echo array2json(apply_filters( 'wc_single_product_params', array(
                            'i18n_required_rating_text' => esc_attr__( 'Please select a rating', 'woocommerce' ),
                            'review_rating_required'    => get_option( 'woocommerce_review_rating_required' ),
                        ) )) ?>;
                        var woocommerce_params = <?php echo array2json(apply_filters( 'woocommerce_params', array(
                            'ajax_url'        => WC()->ajax_url(),
                            'ajax_loader_url' => apply_filters( 'woocommerce_ajax_loader_url', $assets_path . 'images/ajax-loader@2x.gif' ),
                        ) )) ?>;
                        var wc_cart_fragments_params = <?php echo array2json(apply_filters( 'wc_cart_fragments_params', array(
                            'ajax_url'      => WC()->ajax_url(),
                            'fragment_name' => apply_filters( 'woocommerce_cart_fragment_name', 'wc_fragments' )
                        ) )) ?>;
                        var wc_add_to_cart_variation_params = <?php echo array2json(apply_filters( 'wc_add_to_cart_variation_params', array(
                            'i18n_no_matching_variations_text' => esc_attr__( 'Sorry, no products matched your selection. Please choose a different combination.', 'woocommerce' ),
                            'i18n_unavailable_text'            => esc_attr__( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ),
                        ) )) ?>;
                        jQuery(document).ready(function($) {
                            $( document ).off( 'click', '.plus, .minus');
                            $( document ).off( 'click', '.add_to_cart_button');
                            $.getScript('<?php echo $frontend_script_path . 'add-to-cart' . $suffix . '.js' ?>');
                            $.getScript('<?php echo $frontend_script_path . 'single-product' . $suffix . '.js' ?>');
                            $.getScript('<?php echo $frontend_script_path . 'woocommerce' . $suffix . '.js' ?>');
                            $.getScript('<?php echo $frontend_script_path . 'add-to-cart-variation' . $suffix . '.js' ?>');
                        });
                        /* ]]> */
                    </script>
                </div><!-- .summary -->
            </div>
        </div>
    </div>

    <?php

    die();
}

function porto_woocommerce_category_image() {
    if ( is_product_category() ){
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        if ($term) {
            $image = esc_url(get_metadata($term->taxonomy, $term->term_id, 'category_image', true));
            if ( $image ) {
                echo '<img src="' . $image . '" class="category-image" alt="' . esc_attr($term->name) . '" />';
            }
        }
    }
}

function porto_woocommerce_cart_item_class($class, $cart_item, $cart_item_key) {
    return $class . ' porto_cart_item_' . $cart_item_key;
}

function porto_woocommerce_single_excerpt() {
    global $post;

    if ( ! $post->post_excerpt ) {
        return;
    }
    ?>
    <div class="description">
        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
    </div>
    <?php
}

function porto_woocommerce_product_nav() {
    global $porto_settings;

    if (!$porto_settings['product-nav'])
        return;

    if ( is_singular('product') ) {
        echo '<div class="product-nav">';
        porto_woocommerce_next_product(true);
        porto_woocommerce_prev_product(true);
        echo '</div>';
    }
}

function porto_woocommerce_next_product($in_same_cat = false, $excluded_categories = '') {
    porto_adjacent_post_link_product($in_same_cat, $excluded_categories, false);
}

function porto_woocommerce_prev_product($in_same_cat = false, $excluded_categories = '') {
    porto_adjacent_post_link_product($in_same_cat, $excluded_categories, true);
}

function porto_adjacent_post_link_product($in_same_cat = false, $excluded_categories = '', $previous = true) {
    if ( $previous && is_attachment() )
        $post = get_post( get_post()->post_parent );
    else
        $post = porto_get_adjacent_post_product( $in_same_cat, $excluded_categories, $previous );

    if ( $post ) {
        if ($previous) {
            $label = 'prev';
        } else {
            $label = 'next';
        }
        $product = wc_get_product($post->ID);
        ?>
        <div class="product-<?php echo $label ?>">
            <a href="<?php echo get_permalink( $post ) ?>" title="">
                <span class="product-link"></span>
                <span class="product-popup">
                    <span class="featured-box">
                        <span class="box-content">
                            <span class="product-image">
                                <span class="inner">
                                    <?php if (has_post_thumbnail( $post->ID )) {
                                        echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
                                    } else {
                                        echo '<img src="'. wc_placeholder_img_src() .'" alt="Placeholder" width="'.wc_get_image_size('shop_thumbnail_image_width').'" height="'.wc_get_image_size('shop_thumbnail_image_height').'" />';
                                    } ?>
                                </span>
                            </span>
                            <span class="product-details">
                                <span class="product-title"><?php echo ( get_the_title($post) ) ? get_the_title($post) : $post->ID; ?></span>
                                <?php echo $product->get_price_html(); ?>
                            </span>
                        </span>
                    </span>
                </span>
            </a>
        </div>
        <?php
    }
}

function porto_get_adjacent_post_product( $in_same_cat = false, $excluded_categories = '', $previous = true ) {
    global $wpdb;

    if ( ! $post = get_post() )
        return null;

    $current_post_date = $post->post_date;
    $join = '';
    $posts_in_ex_cats_sql = '';
    if ( $in_same_cat || ! empty( $excluded_categories ) ) {
        $join = " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";

        if ( $in_same_cat ) {
            if ( ! is_object_in_taxonomy( $post->post_type, 'product_cat' ) )
                return '';
            $cat_array = wp_get_object_terms($post->ID, 'product_cat', array('fields' => 'ids'));
            if ( ! $cat_array || is_wp_error( $cat_array ) )
                return '';
            $join .= " AND tt.taxonomy = 'product_cat' AND tt.term_id IN (" . implode(',', $cat_array) . ")";
        }

        $posts_in_ex_cats_sql = "AND tt.taxonomy = 'product_cat'";
        if ( ! empty( $excluded_categories ) ) {
            if ( ! is_array( $excluded_categories ) ) {
                // back-compat, $excluded_categories used to be IDs separated by " and "
                if ( strpos( $excluded_categories, ' and ' ) !== false ) {
                    _deprecated_argument( __FUNCTION__, '3.3', sprintf( __( 'Use commas instead of %s to separate excluded categories.' ), "'and'" ) );
                    $excluded_categories = explode( ' and ', $excluded_categories );
                } else {
                    $excluded_categories = explode( ',', $excluded_categories );
                }
            }

            $excluded_categories = array_map( 'intval', $excluded_categories );

            if ( ! empty( $cat_array ) ) {
                $excluded_categories = array_diff($excluded_categories, $cat_array);
                $posts_in_ex_cats_sql = '';
            }

            if ( !empty($excluded_categories) ) {
                $posts_in_ex_cats_sql = " AND tt.taxonomy = 'product_cat' AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
            }
        }
    }

    $adjacent = $previous ? 'previous' : 'next';
    $op = $previous ? '<' : '>';
    $order = $previous ? 'DESC' : 'ASC';

    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $posts_in_ex_cats_sql", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

    $query = "SELECT p.id FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result ) {
        if ( $result )
            $result = get_post( $result );
        return $result;
    }

    $result = $wpdb->get_var( $query );
    if ( null === $result )
        $result = '';

    wp_cache_set($query_key, $result, 'counts');

    if ( $result )
        $result = get_post( $result );

    return $result;
}

add_action('woocommerce_init', 'porto_woocommerce_init');

function porto_woocommerce_init() {
    global $porto_settings;

    // Hide product short description
    if (isset($porto_settings['catalog-enable']) && !$porto_settings['product-short-desc']) {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    }

    // Catalog Mode

    if (isset($porto_settings['catalog-enable']) && $porto_settings['catalog-enable']) {
        if ($porto_settings['catalog-admin'] || (!$porto_settings['catalog-admin'] && !(current_user_can( 'administrator' ) && is_user_logged_in())) ) {
            if (!$porto_settings['catalog-price']) {
                remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

                add_filter('woocommerce_get_price_html', 'porto_woocommerce_get_price_html_empty', 100, 2);
                add_filter('woocommerce_cart_item_price', 'porto_woocommerce_get_price_empty', 100, 3);
                add_filter('woocommerce_cart_item_subtotal', 'porto_woocommerce_get_price_empty', 100, 3);
                add_filter('woocommerce_cart_subtotal', 'porto_woocommerce_get_price_empty', 100, 3);
                add_filter('woocommerce_get_variation_price_html', 'porto_woocommerce_get_price_html_empty', 100, 2);
            }
            if (!$porto_settings['catalog-cart']) {
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
                remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

                if ($porto_settings['catalog-readmore']) {
                    add_action('woocommerce_single_product_summary', 'porto_woocommerce_readmore_button', 30);
                } else {
                    $porto_settings['category-addlinks-pos'] = 'onimage';
                }
            }
            if (!$porto_settings['catalog-review']) {
                add_filter('pre_option_woocommerce_enable_review_rating', 'porto_woocommerce_disable_rating');
                add_filter('woocommerce_product_tabs', 'porto_woocommerce_remove_reviews_tab', 98);
                function porto_woocommerce_remove_reviews_tab($tabs) {
                    unset($tabs['reviews']);
                    return $tabs;
                }
            }
        }
    }

    // change product tabs position

    if (!porto_is_ajax() && isset($porto_settings['product-tabs-pos']) && $porto_settings['product-tabs-pos'] == 'below') {
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs');
        add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 25);
    }
}

function porto_woocommerce_get_price_html_empty($price, $product) {
    return '';
}

function porto_woocommerce_get_price_empty($price, $param2, $param3) {
    return '';
}

function porto_woocommerce_disable_rating($false) {
    return 'no';
}

function porto_woocommerce_readmore_button() {
    global $porto_settings;
    $more_link = get_post_meta(get_the_id(), 'product_more_link', true);
    if ($more_link) :
    ?>
        <div class="cart">
            <a href="<?php echo esc_url( $more_link ) ?>" class="single_add_to_cart_button button readmore"><?php echo $porto_settings['catalog-readmore-label'] ?></a>
        </div>
    <?php
    endif;
}