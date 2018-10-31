<?php get_header() ?>

<?php
global $porto_settings, $porto_layout;

wp_reset_postdata();
?>

    <div id="content" role="main">

        <?php if (have_posts()) : the_post();
            $portfolio_layout = get_post_meta($post->ID, 'portfolio_layout', true);
            $portfolio_layout = ($portfolio_layout == 'default' || !$portfolio_layout) ? $porto_settings['portfolio-content-layout'] : $portfolio_layout;
            ?>

            <?php get_template_part('content', 'portfolio-'.$portfolio_layout); ?>

            <hr class="tall"/>

            <?php
            if ($porto_settings['portfolio-related']) :
                $related_portfolios = porto_get_related_portfolios($post->ID);
                if ($related_portfolios->have_posts()) : ?>
                    <div class="related-portfolios <?php echo $porto_settings['portfolio-related-style'] ?>">
                        <h4 class="sub-title"><?php echo __('Related <strong>Works</strong>', 'porto'); ?></h4>
                        <div class="row">
                            <div class="portfolio-carousel owl-carousel" data-cols-lg="<?php echo ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') ? '3' : '4' ?>" data-cols-md="3" data-cols-sm="2">
                                <?php
                                while ($related_portfolios->have_posts()) {
                                    $related_portfolios->the_post();

                                    get_template_part('content', 'portfolio-item');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endif;

        endif; ?>

    </div>

<?php get_footer() ?>