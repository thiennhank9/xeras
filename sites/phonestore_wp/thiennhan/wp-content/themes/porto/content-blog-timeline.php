<?php

global $porto_settings, $prev_post_year, $prev_post_month, $first_timeline_loop, $post_count, $post;

$post_layout = 'timeline';

$post_timestamp = strtotime($post->post_date);
$post_month = date('n', $post_timestamp);
$post_year = get_the_date('o');
$current_date = get_the_date('o-n');
?>

<?php if ($prev_post_month != $post_month || ($prev_post_month == $post_month && $prev_post_year != $post_year)) : $post_count = 1; ?>
    <div class="timeline-date"><h3><?php echo get_the_date('F Y'); ?></h3></div>
<?php endif; ?>

<?php
$classes = 'timeline-box ';
$classes .= ($post_count % 2 == 1?'left':'right');
?>

    <article <?php post_class($classes . ' post post-' . $post_layout); ?>>

        <?php // Post Slideshow ?>
        <?php get_template_part('slideshow'); ?>

        <div class="post-content">

            <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>

            <?php
            porto_render_rich_snippets( false );
            if ($porto_settings['blog-excerpt']) {
                echo porto_get_excerpt( $porto_settings['blog-excerpt-length'], false );
            } else {
                echo '<div class="entry-content">';
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'porto' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'porto' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                echo '</div>';
            }
            ?>

        </div>

        <div class="post-meta">
            <span><i class="fa fa-calendar"></i> <?php echo get_the_date() ?></span>
        </div>
        <div class="post-meta">
            <span><i class="fa fa-user"></i> <?php echo __('By', 'porto'); ?> <?php the_author_posts_link(); ?></span>
            <?php
            $cats_list = get_the_category_list(', ');
            if ($cats_list) : ?>
                <span><i class="fa fa-folder-open"></i> <?php echo $cats_list ?></span>
            <?php endif; ?>
            <?php
            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list) : ?>
                <span><i class="fa fa-tag"></i> <?php echo $tags_list ?></span>
            <?php endif; ?>
            <span><i class="fa fa-comments"></i> <?php comments_popup_link(__('0 Comments', 'porto'), __('1 Comment', 'porto'), '% '.__('Comments', 'porto')); ?></span>
        </div>
        <div class="clearfix">
            <a class="btn btn-xs btn-primary pt-right" href="<?php echo esc_url( apply_filters( 'the_permalink', get_permalink() ) ) ?>"><?php _e('Read more...', 'porto') ?></a>
        </div>

    </article>

<?php
$prev_post_year = $post_year;
$prev_post_month = $post_month;
$post_count++;