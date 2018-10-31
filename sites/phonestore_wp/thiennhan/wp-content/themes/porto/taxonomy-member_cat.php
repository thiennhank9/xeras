<?php get_header() ?>

<?php
global $porto_settings, $wp_query;

$term = $wp_query->queried_object;
$term_id = $term->term_id;

$member_options = get_metadata($term->taxonomy, $term->term_id, 'member_options', true);

$member_infinite = ($member_options == 'member_options') ? (get_metadata($term->taxonomy, $term->term_id, 'member_infinite', true) != 'member_infinite' ? true : false ) : $porto_settings['member-infinite'];

if ($member_infinite) {
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

        <div class="page-members <?php if ($member_infinite) echo ' infinite-container' ?> clearfix">

            <div class="member-row <?php if ($member_infinite) : ?> members-infinite<?php endif; ?>"<?php if ($member_infinite) : ?> data-pagenum="<?php echo esc_attr($pagenum) ?>" data-path="<?php echo esc_url($page_path) ?>"<?php endif; ?>>
                <?php
                while (have_posts()) {
                    the_post();

                    get_template_part('content', 'archive-member');
                }
                ?>
            </div>

            <?php porto_pagination(); ?>

        </div>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>

        <p><?php _e('Apologies, but no results were found for the requested archive.', 'porto'); ?></p>

    <?php endif; ?>
</div>

<?php get_footer() ?>