<?php

global $post;

$item_classes = ' ';
$item_cats = get_the_terms($post->ID, 'faq_cat');
if ($item_cats):
    foreach ($item_cats as $item_cat) {
        $item_classes .= urldecode($item_cat->slug) . ' ';
    }
endif;
?>

<article <?php post_class('faq' . $item_classes); ?>>
    <section class="toggle<?php echo $item_classes ?>">
        <label><?php the_title() ?></label>
        <div class="toggle-content">
            <?php
            porto_render_rich_snippets();
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'porto' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'porto' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
            ?>
        </div>
    </section>
</article>