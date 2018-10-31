<?php
global $porto_settings, $porto_layout;

$portfolio_ids = get_post_meta(get_the_ID(), 'member_portfolios', true);
$portfolios = porto_get_portfolios_by_ids($portfolio_ids);

if ($portfolios->have_posts()) : ?>
    <div class="post-gap"></div>

    <div class="related-portfolios <?php echo $porto_settings['portfolio-related-style'] ?>">
        <h4 class="sub-title"><?php echo __('My <strong>Works</strong>', 'porto'); ?></h4>
        <div class="row">
            <div class="portfolio-carousel owl-carousel" data-cols-lg="<?php echo ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') ? '3' : '4' ?>" data-cols-md="3" data-cols-sm="2">
                <?php
                while ($portfolios->have_posts()) {
                    $portfolios->the_post();

                    get_template_part('content', 'portfolio-item');
                }
                ?>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_postdata();
?>