<?php get_header() ?>

<?php
global $porto_settings;

$post_layout = $porto_settings['post-layout'];
$post_infinite = $porto_settings['blog-infinite'];

if ($post_infinite) {
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

    <?php if (have_posts()) : ?>

        <?php if ($post_layout == 'timeline') {
            global $porto_settings, $prev_post_year, $prev_post_month, $first_timeline_loop, $post_count, $post;

            $prev_post_year = null;
            $prev_post_month = null;
            $first_timeline_loop = false;
            $post_count = 1;
            ?>

        <div class="blog-posts posts-<?php echo $post_layout ?><?php if ($post_infinite) echo ' infinite-container' ?>">
            <section class="timeline">
                <div class="timeline-body<?php if ($post_infinite) echo ' posts-infinite' ?>"<?php if ($post_infinite) : ?> data-pagenum="<?php echo esc_attr($pagenum) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>

        <?php } else if ($post_layout == 'grid') { ?>

        <div class="blog-posts posts-<?php echo $post_layout ?><?php if ($post_infinite) echo ' infinite-container' ?>">
            <div class="grid row<?php if ($post_infinite) echo ' posts-infinite' ?>"<?php if ($post_infinite) : ?> data-pagenum="<?php echo esc_attr($pagenum) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>

        <?php } else { ?>

        <div class="blog-posts posts-<?php echo $post_layout ?><?php if ($post_infinite) echo ' infinite-container posts-infinite' ?>"<?php if ($post_infinite) : ?> data-pagenum="<?php echo esc_attr($pagenum) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>

        <?php } ?>

            <?php
            while (have_posts()) {
                the_post();

                get_template_part('content', 'blog-'.$post_layout);
            }
            ?>

        <?php if ($post_layout == 'timeline') { ?>

                </div>
            </section>

        <?php } else if ($post_layout == 'grid') { ?>

            </div>

        <?php } else { ?>

        <?php } ?>

            <?php porto_pagination(); ?>
        </div>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>

        <?php _e('Apologies, but no results were found for the requested archive.', 'porto'); ?>

    <?php endif; ?>

</div>

<?php get_footer() ?>