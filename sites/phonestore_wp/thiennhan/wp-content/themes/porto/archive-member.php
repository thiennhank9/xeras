<?php get_header() ?>

<?php

global $porto_settings;

$member_infinite = $porto_settings['member-infinite'];

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

    <?php if (!is_search() && $porto_settings['member-title']) : ?>
        <h2><?php echo force_balance_tags($porto_settings['member-title']) ?></h2>
    <?php endif; ?>

    <?php if (have_posts()) : ?>

        <div class="page-members <?php if ($member_infinite) echo ' infinite-container' ?> clearfix">

            <?php
            $member_taxs = array();

            $taxs = get_categories(array(
                'taxonomy' => 'member_cat',
                'orderby' => isset($porto_settings['member-cat-orderby']) ? $porto_settings['member-cat-orderby'] : 'name',
                'order' => isset($porto_settings['member-cat-order']) ? $porto_settings['member-cat-order'] : 'asc'
            ));

            foreach ($taxs as $tax) {
                $member_taxs[urldecode($tax->slug)] = $tax->name;
            }

            // Show Filters
            if (!is_search() && is_array($member_taxs) && !empty($member_taxs)) : ?>
                <ul class="member-filter nav nav-pills sort-source">
                    <li class="active" data-filter="*"><a><?php echo __('Show All', 'porto'); ?></a></li>
                    <?php foreach ($member_taxs as $member_tax_slug => $member_tax_name) : ?>
                        <li data-filter="<?php echo esc_attr($member_tax_slug) ?>"><a><?php echo esc_html($member_tax_name) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <hr>
            <?php endif; ?>

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