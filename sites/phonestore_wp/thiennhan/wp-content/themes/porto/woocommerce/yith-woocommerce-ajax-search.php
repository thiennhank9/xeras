<?php
/**
 * YITH WooCommerce Ajax Search template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Ajax Search
 * @version 1.1.1
 */

if ( !defined( 'YITH_WCAS' ) ) { exit; } // Exit if accessed directly

wp_enqueue_script('yith_wcas_jquery-autocomplete' );

global $porto_settings;

?>

<form role="search" method="get" id="yith-ajaxsearchform" action="<?php echo esc_url( home_url( '/'  ) ) ?>" class="yith-ajaxsearchform-container searchform <?php if (isset($porto_settings['search-cats']) && $porto_settings['search-cats']) echo 'searchform-cats'; ?>">
    <fieldset>
        <span class="text"><input name="s" id="yith-s" type="text" value="<?php echo get_search_query() ?>" placeholder="<?php echo __('Search&hellip;', 'porto'); ?>" /></span>
        <?php
        if (isset($porto_settings['search-cats']) && $porto_settings['search-cats']) {
            $args = array(
                'show_option_all' => __( 'All Categories', 'porto' ),
                'hierarchical' => 1,
                'class' => 'cat',
                'echo' => 1,
                'value_field' => 'slug',
                'selected' => 1
            );
            $args['taxonomy'] = 'product_cat';
            $args['name'] = 'product_cat';
            wp_dropdown_categories($args);
        }
        ?>
        <span class="button-wrap"><button class="btn" id="yith-searchsubmit" title="<?php echo __('Search', 'porto'); ?>" type="submit"><i class="fa fa-search"></i></button></span>
        <input type="hidden" name="post_type" value="product" />
    </fieldset>
</form>

<script type="text/javascript">
jQuery(function($){
    var search_loader_url = '<?php echo esc_url(porto_uri . '/images/ajax-loader@2x.gif') ?>';

    $('#yith-s').<?php echo version_compare(YITH_WCAS_VERSION, '1.3.1', '>=') ? 'yithautocomplete' : 'autocomplete' ?>({
        minChars: <?php echo get_option('yith_wcas_min_chars') * 1; ?>,
        appendTo: '.yith-ajaxsearchform-container',
        serviceUrl: function() {
            <?php if (isset($porto_settings['search-cats']) && $porto_settings['search-cats']) : ?>
            var val = $('.yith-ajaxsearchform-container #product_cat').val();
            <?php else : ?>
            var val = '0';
            <?php endif; ?>
            if (val != '0')
            return woocommerce_params.ajax_url + '?action=yith_ajax_search_products'<?php echo (isset($porto_settings['search-cats']) && $porto_settings['search-cats']) ? " + '&product_cat=' + $('.yith-ajaxsearchform-container #product_cat').val()" : "" ?>;
            else
                return woocommerce_params.ajax_url + '?action=yith_ajax_search_products'<?php echo (isset($porto_settings['search-cats']) && $porto_settings['search-cats']) ? "" : "" ?>;
        },
        onSearchStart: function(){
            $(this).css('background', 'url('+search_loader_url+') no-repeat 97% center');
            $(this).css('background-size', '16px 16px');
        },
        onSearchComplete: function(){
            $(this).css('background', 'transparent');
        },
        onSelect: function (suggestion) {
            if( suggestion.id != -1 ) {
                window.location.href = suggestion.url;
            }
        },
        formatResult: function (suggestion, currentValue) {
            var pattern = '(' + $.Autocomplete.utils.escapeRegExChars(currentValue) + ')';
            var html = '';

            if ( typeof suggestion.img !== 'undefined' ) {
                html += suggestion.img;
            }

            html += '<div class="yith_wcas_result_content"><div class="title">';
            html += suggestion.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
            html += '</div>';

            if ( typeof suggestion.div_badge_open !== 'undefined' ) {
                html += suggestion.div_badge_open;
            }

            if ( typeof suggestion.on_sale !== 'undefined' ) {
                html += suggestion.on_sale;
            }

            if ( typeof suggestion.featured !== 'undefined' ) {
                html += suggestion.featured;
            }

            if ( typeof suggestion.div_badge_close !== 'undefined' ) {
                html += suggestion.div_badge_close;
            }

            if ( typeof suggestion.price !== 'undefined' && suggestion.price != '' ) {
                html += ' ' + suggestion.price;
            }

            if ( typeof suggestion.excerpt !== 'undefined' ) {
                html += ' ' +  suggestion.excerpt.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
            }

            html += '</div>';


            return html;
        }
    });
});
</script>