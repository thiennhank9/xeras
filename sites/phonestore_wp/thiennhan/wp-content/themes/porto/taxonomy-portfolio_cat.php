<?php get_header() ?>

<?php
global $porto_settings, $portfolio_columns, $wp_query;

$term = $wp_query->queried_object;
$term_id = $term->term_id;

$portfolio_options = get_metadata($term->taxonomy, $term->term_id, 'portfolio_options', true);

$portfolio_layout = ($portfolio_options == 'portfolio_options') ? get_metadata($term->taxonomy, $term->term_id, 'portfolio_layout', true) : $porto_settings['portfolio-layout'];
$portfolio_infinite = ($portfolio_options == 'portfolio_options') ? (get_metadata($term->taxonomy, $term->term_id, 'portfolio_infinite', true) != 'portfolio_infinite' ? true : false ) : $porto_settings['portfolio-infinite'];

$portfolio_columns = '';
$portfolio_view = '';
if ($portfolio_layout == 'grid') {
    $portfolio_columns = ($portfolio_options == 'portfolio_options') ? get_metadata($term->taxonomy, $term->term_id, 'portfolio_grid_columns', true) : $porto_settings['portfolio-grid-columns'];
    $portfolio_view = ($portfolio_options == 'portfolio_options') ? get_metadata($term->taxonomy, $term->term_id, 'portfolio_grid_view', true) : $porto_settings['portfolio-grid-view'];
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

            <?php
            $portfolio_taxs = array();

            $taxs = get_categories(array(
                'taxonomy' => 'portfolio_cat',
                'child_of' => $term_id,
                'orderby' => isset($porto_settings['portfolio-cat-orderby']) ? $porto_settings['portfolio-cat-orderby'] : 'name',
                'order' => isset($porto_settings['portfolio-cat-order']) ? $porto_settings['portfolio-cat-order'] : 'asc'
            ));

            foreach ($taxs as $tax) {
                $portfolio_taxs[urldecode($tax->slug)] = $tax->name;
            }

            // Show Filters
            if (is_array($portfolio_taxs) && !empty($portfolio_taxs)) : ?>
                <ul class="portfolio-filter nav nav-pills sort-source">
                    <li class="active" data-filter="*"><a><?php echo __('Show All', 'porto'); ?></a></li>
                    <?php foreach ($portfolio_taxs as $portfolio_tax_slug => $portfolio_tax_name) : ?>
                        <li data-filter="<?php echo esc_attr($portfolio_tax_slug) ?>"><a><?php echo esc_html($portfolio_tax_name) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php if ($portfolio_layout == 'grid') { ?>
                    <hr>
                <?php } else if ($portfolio_layout == 'timeline') { ?>
                    <hr class="invisible">
                <?php } else { ?>
                    <hr class="tall">
                <?php } ?>
            <?php endif; ?>

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