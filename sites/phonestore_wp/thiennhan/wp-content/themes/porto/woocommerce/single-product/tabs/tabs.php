<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $porto_settings;

$review_index = 0;

$rand = porto_generate_rand();

$custom_tabs_count = isset($porto_settings['product-custom-tabs-count']) ? $porto_settings['product-custom-tabs-count'] : '2';
$custom_tabs_title = array();
$custom_tabs_content = array();
if ($custom_tabs_count) {
    for ($i = 0; $i < $custom_tabs_count; $i++) {
        $index = $i + 1;

        $custom_tab_title = get_post_meta(get_the_id(), 'custom_tab_title'.$index, true);
        $custom_tab_content = get_post_meta(get_the_id(), 'custom_tab_content'.$index, true);
        if ($custom_tab_title && $custom_tab_content) {
            $custom_tabs_title[] = $custom_tab_title;
            $custom_tabs_content[] = $custom_tab_content;
        }
    }
}
$global_tab_title = $porto_settings['product-tab-title'];
$global_tab_block = $porto_settings['product-tab-block'];

if ( ! empty( $tabs ) || !empty($custom_tabs_title) || $global_tab_title ) : ?>

    <div class="woocommerce-tabs woocommerce-tabs-<?php echo $rand ?>" id="product-tab">
        <ul class="resp-tabs-list">
            <?php
            $i = 0;
            foreach ( $tabs as $key => $tab ) :
                ?><li aria-controls="tab-<?php esc_attr( $key ) ?>">
                    <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
                </li><?php
                if ($key == 'reviews') $review_index = $i;
                $i++;
            endforeach;

            foreach ( $custom_tabs_title as $i => $custom_tab_title) :
                $index = $i + 1;
                ?><li aria-controls="tab-custom<?php echo $index ?>">
                <?php echo force_balance_tags($custom_tabs_title[$i]) ?>
                </li><?php
            endforeach;

            if ($global_tab_title && $global_tab_block) :
                ?><li aria-controls="tab-custom3">
                    <?php echo force_balance_tags($global_tab_title) ?>
                </li><?php
                $i++;
            endif; ?>

        </ul>
        <div class="resp-tabs-container">
            <?php foreach ( $tabs as $key => $tab ) : ?>

                <div class="tab-content" id="tab-<?php esc_attr( $key ) ?>">
                    <?php call_user_func( $tab['callback'], $key, $tab ) ?>
                </div>

            <?php endforeach; ?>

            <?php
            foreach ( $custom_tabs_content as $i => $custom_tab_content) :
                $index = $i + 1;
                ?>

                <div class="tab-content" id="tab-custom<?php echo $index ?>">
                    <?php echo wpautop(do_shortcode($custom_tab_content)) ?>
                </div>

            <?php endforeach; ?>

            <?php if ($global_tab_title && $global_tab_block) : ?>
                <div class="tab-content" id="tab-custom3">
                    <?php echo do_shortcode('[porto_block name="'.$global_tab_block.'"]') ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <script type="text/javascript">
        /* <![CDATA[ */
        jQuery(function($) {
            $('.woocommerce-tabs-<?php echo $rand ?>').easyResponsiveTabs({
                type: '<?php echo esc_js($porto_settings['product-tabs']) ?>', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true,   // 100% fit in a container
                activate: function(event) { // Callback function if tab is switched

                }
            });

            <?php if (!porto_is_ajax()) : ?>
            // go to reviews, write a review
            $('.woocommerce-review-link, .woocommerce-write-review-link').click(function(e) {
                var recalc_pos = false;
                if ($('#content #tab-reviews').css('display') != 'block') {
                    recalc_pos = true;
                }
                if ($("h2[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").length && $("h2[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").next().css('display') == 'none')
                    $("h2[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").click();
                else if ($("li[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").length && $("li[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").next().css('display') == 'none')
                    $("li[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").click();

                var target = $(this.hash);
                if (target.length) {
                    e.preventDefault();

                    var delay = 1;
                    if ($(window).scrollTop() < theme.StickyHeader.sticky_pos) {
                        delay += 250;
                        $('html, body').animate({
                            scrollTop: theme.StickyHeader.sticky_pos + 1
                        }, 200);
                    }
                    setTimeout(function() {
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - theme.StickyHeader.sticky_height - theme.StickyHeader.adminbar_height - 14
                        }, 600, 'easeOutQuad');
                    }, delay);

                    return false;
                }
            });
            // Open review form lightbox if accessed via anchor
            if ( window.location.hash == '#review_form' || window.location.hash == '#reviews' || window.location.hash.indexOf('#comment-') != -1 ) {
                setTimeout(function() {
                    if ($("h2[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").next().css('display') == 'none') {
                        $("h2[aria-controls=tab_item-<?php echo esc_js($review_index) ?>]").click();
                        var target = $(window.location.hash);
                        if (target.length) {
                            var delay = 1;
                            if ($(window).scrollTop() < theme.StickyHeader.sticky_pos) {
                                delay += 250;
                                $('html, body').animate({
                                    scrollTop: theme.StickyHeader.sticky_pos + 1
                                }, 200);
                            }
                            setTimeout(function() {
                                $('html, body').stop().animate({
                                    scrollTop: target.offset().top - theme.StickyHeader.sticky_height - theme.StickyHeader.adminbar_height - 14
                                }, 600, 'easeOutQuad');
                            }, delay);
                        }
                    }
                }, 200);
            }
            <?php endif; ?>
        });
        /* ]]> */
    </script>

<?php endif; ?>