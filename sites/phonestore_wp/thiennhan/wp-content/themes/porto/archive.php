<?php get_header() ?>

<?php
global $porto_settings;

$post_layout = $porto_settings['post-layout'];
$post_infinite = $porto_settings['blog-infinite'];

if ( is_category() ) {
    global $wp_query;

    $term = $wp_query->queried_object;
    $term_id = $term->term_id;

    $post_options = get_metadata($term->taxonomy, $term->term_id, 'post_options', true);

    $post_layout = ($post_options == 'post_options') ? get_metadata($term->taxonomy, $term->term_id, 'post_layout', true) : $post_layout;
    $post_infinite = ($post_options == 'post_options') ? (get_metadata($term->taxonomy, $term->term_id, 'post_infinite', true) != 'post_infinite' ? true : false ) : $post_infinite;
}

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

    <?php if ( have_posts() ) : ?>

        <?php if (category_description()) : ?>
            <div class="page-content">
                <?php echo category_description() ?>
            </div>
        <?php endif; ?>

		<?php if ($post_layout == 'timeline') {
            global $prev_post_year, $prev_post_month, $first_timeline_loop, $post_count;

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

        <h2 class="entry-title"><?php _e( 'Nothing Found', 'porto' ); ?></h2>

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'porto' ), admin_url( 'post-new.php' ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'porto' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'porto' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>

    <?php endif; ?>
</div>

<?php get_footer() ?>