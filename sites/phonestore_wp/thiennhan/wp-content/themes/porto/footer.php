<?php
global $porto_settings, $porto_layout;

$footer_type = $porto_settings['footer-type'];
$default_layout = porto_meta_default_layout();
$wrapper = porto_get_wrapper_type();
?>
        <?php get_sidebar(); ?>

        <?php if (porto_get_meta_value('footer', true)) : ?>

            <?php

            $cols = 0;
            for ($i = 1; $i <= 4; $i++) {
                if ( is_active_sidebar( 'content-bottom-'. $i ) )
                    $cols++;
            }

            if (is_404()) $cols = 0;

            if ($cols) : ?>
                <?php if ($wrapper == 'boxed' || $porto_layout == 'fullwidth' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') : ?>
                    <div class="container sidebar content-bottom-wrapper">
                        <div class="row">
                <?php else :
                    if ($default_layout == 'fullwidth' || $default_layout == 'left-sidebar' || $default_layout == 'right-sidebar') :
                    ?>
                    <div class="container sidebar content-bottom-wrapper">
                        <div class="row">
                    <?php else : ?>
                    <div class="sidebar content-bottom-wrapper">
                    <?php
                    endif;
                endif; ?>

                    <?php
                    $col_class = array();
                    switch ($cols) {
                        case 1:
                            $col_class[1] = 'col-sm-12';
                            break;
                        case 2:
                            $col_class[1] = 'col-sm-12';
                            $col_class[2] = 'col-sm-12';
                            break;
                        case 3:
                            $col_class[1] = 'col-sm-12 col-md-4';
                            $col_class[2] = 'col-sm-12 col-md-4';
                            $col_class[3] = 'col-sm-12 col-md-4';
                            break;
                        case 4:
                            $col_class[1] = 'col-sm-12 col-md-3';
                            $col_class[2] = 'col-sm-12 col-md-3';
                            $col_class[3] = 'col-sm-12 col-md-3';
                            $col_class[4] = 'col-sm-12 col-md-3';
                            break;
                    }
                    ?>
                    <?php
                    $cols = 1;
                    for ($i = 1; $i <= 4; $i++) {
                        if ( is_active_sidebar( 'content-bottom-'. $i ) ) {
                            ?>
                            <div class="<?php echo $col_class[$cols++] ?>">
                                <?php dynamic_sidebar( 'content-bottom-'. $i ); ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                <?php if ($wrapper == 'boxed' || $porto_layout == 'fullwidth' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') : ?>
                    </div>
                </div>
                <?php else :
                    if ($default_layout == 'fullwidth' || $default_layout == 'left-sidebar' || $default_layout == 'right-sidebar') :
                    ?>
                        </div>
                    </div>
                    <?php else : ?>
                    </div>
                    <?php
                    endif;
                endif; ?>
            <?php endif; ?>

            </div><!-- end main -->

            <?php
            $footer_view = porto_get_meta_value('footer_view');
            ?>

            <div class="footer-wrapper<?php if ($porto_settings['footer-wrapper'] == 'wide') echo ' wide' ?> <?php echo $footer_view ?>">

                <?php if (porto_get_wrapper_type() != 'boxed' && $porto_settings['footer-wrapper'] == 'boxed') : ?>
                <div id="footer-boxed">
                <?php endif; ?>

                    <?php
                    get_template_part('footer/footer_'.$footer_type);
                    ?>

                <?php if (porto_get_wrapper_type() != 'boxed' && $porto_settings['footer-wrapper'] == 'boxed') : ?>
                </div>
                <?php endif; ?>

            </div>

            <?php porto_blueimp_gallery_html() ?>

        <?php else: ?>

            </div><!-- end main -->

        <?php endif; ?>

    </div><!-- end wrapper -->

<div class="panel-overlay"></div>
<div class="filter-overlay"></div>

<?php

// navigation panel
get_template_part('panel');

// category filter
$is_category_filter = class_exists('WooCommerce') && $porto_settings['category-mobile-filter'] && (is_shop() || is_product_category());
if ($is_category_filter && ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar')) {
    get_template_part('category-filter');
}

?>

<!--[if lt IE 9]>
<script src="<?php echo esc_url(porto_js) ?>/html5shiv.min.js"></script>
<script src="<?php echo esc_url(porto_js) ?>/respond.min.js"></script>
<![endif]-->

<?php wp_footer(); ?>

<?php
// js code (Theme Settings/General)
if (isset($porto_settings['js-code'])) { ?>
    <script type="text/javascript">
        <?php echo $porto_settings['js-code']; ?>
    </script>
<?php } ?>

</body>
</html>