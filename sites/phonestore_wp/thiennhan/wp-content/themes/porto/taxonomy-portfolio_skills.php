<?php get_header() ?>

<?php
global $porto_settings, $portfolio_columns, $wp_query;

$term = $wp_query->queried_object;
$term_id = $term->term_id;

$portfolio_layout = $porto_settings['portfolio-layout'];
$portfolio_infinite = $porto_settings['portfolio-infinite'];

$portfolio_columns = '';
$portfolio_view = '';
if ($portfolio_layout == 'grid') {
    $portfolio_columns = $porto_settings['portfolio-grid-columns'];
    $portfolio_view = $porto_settings['portfolio-grid-view'];
}

if ($portfolio_infinite) {
    global $wp_rewrite;

    $pagenum = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
    $pagelink = get_pagenum_link();

    if ( !$wp_rewrite->using_permalinks() || is_admin() || strpos($pagelink, '?') ) {
        if (strpos($pagelink, '?') !== false)
            $page_path = apply_filters( 'get_pagenum_link', $pagelink . '&amp;paged=');
        else
            $page_path = apply_filters( 'get_pagenum_link', $pagelink . '?paged=');
    } else {
        $page_path = apply_filters( 'get_pagenum_link', $pagelink . user_trailingslashit( $wp_rewrite->pagination_base . "/" ));
    }
}

?>

<div id="content" role="main">

    <?php if (category_description()) : ?>
        <div class="page-content">
            <?php echo category_description() ?>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>

        <div class="page-portfolios portfolios-<?php echo $portfolio_layout ?><?php if ($portfolio_infinite) echo ' infinite-container' ?> clearfix">

            <?php if ($portfolio_layout == 'timeline') :
                global $prev_post_year, $prev_post_month, $first_timeline_loop, $post_count;

                $prev_post_year = null;
                $prev_post_month = null;
                $first_timeline_loop = false;
                $post_count = 1;
                ?>

            <section class="timeline">

                <div class="timeline-body<?php if ($portfolio_infinite) echo ' portfolios-infinite' ?>"<?php if ($portfolio_infinite) : ?> data-pagenum="<?php echo esc_attr($pagenum) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>

            <?php else : ?>

            <div class="clearfix <?php if ($portfolio_infinite) : ?> portfolios-infinite<?php endif; ?>
                <?php if ($portfolio_layout == 'grid') : ?> portfolio-row portfolio-row-<?php echo $portfolio_columns ?> <?php echo $portfolio_view ?><?php endif; ?>"
                <?php if ($portfolio_infinite) : ?> data-pagenum="<?php echo esc_attr($pagenum) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>

            <?php endif; ?>

                <?php
                while (have_posts()) {
                    the_post();

                    get_template_part('content', 'archive-portfolio-'.$portfolio_layout);
                }
                ?>

            <?php if ($portfolio_layout == 'timeline') : ?>
                </div>
            </section>
            <?php else : ?>
            </div>
            <?php endif; ?>

            <?php porto_pagination(); ?>

        </div>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>

        <p><?php _e('Apologies, but no results were found for the requested archive.', 'porto'); ?></p>

    <?php endif; ?>

</div>

<?php get_footer() ?>