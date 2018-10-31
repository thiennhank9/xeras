<?php

global $porto_settings, $prev_post_year, $prev_post_month, $first_timeline_loop, $post_count, $post;

$portfolio_layout = 'timeline';

if (has_post_thumbnail()) :
    $attachment_id = get_post_thumbnail_id();
    $attachment = porto_get_attachment($attachment_id);
    if ($attachment) :
        $post_timestamp = strtotime($post->post_date);
        $post_month = date('n', $post_timestamp);
        $post_year = get_the_date('o');
        $current_date = get_the_date('o-n');
        ?>

        <?php if ($prev_post_month != $post_month || ($prev_post_month == $post_month && $prev_post_year != $post_year)) : $post_count = 1; ?>
        <div class="timeline-date"><h3><?php echo get_the_date('F Y'); ?></h3></div>
    <?php endif; ?>

        <?php
        $item_classes = ' timeline-box';
        $item_classes .= ($post_count % 2 == 1?' left ':' right ');

        $item_cats = get_the_terms($post->ID, 'portfolio_cat');
        if ($item_cats):
            foreach ($item_cats as $item_cat) {
                $item_classes .= urldecode($item_cat->slug) . ' ';
            }
        endif;
        ?>
        <article <?php post_class('portfolio portfolio-' . $portfolio_layout . $item_classes); ?>>
            <?php porto_render_rich_snippets(); ?>
            <div class="portfolio-item thumbnail full">
                <div class="thumb-info">
                    <a href="<?php the_permalink(); ?>">
                        <img class="img-responsive" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>"<?php if ($porto_settings['portfolio-zoom']) : ?> data-image="<?php echo $attachment['src'] ?>" data-caption="<?php echo $attachment['caption'] ?>"<?php endif; ?> />
                    </a>
                    <div class="thumb-info-title">
                        <a href="<?php the_permalink() ?>" class="thumb-info-inner"><?php the_title(); ?></a>
                        <?php
                        $cat_list = get_the_term_list($post->ID, 'portfolio_cat', '', ', ', '');
                        if ($cat_list) : ?>
                            <span class="thumb-info-type"><?php echo $cat_list ?></span>
                        <?php endif; ?>
                    </div>
                    <a href="<?php the_permalink() ?>" class="thumb-info-action">
                        <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                    </a>
                    <?php if ($porto_settings['portfolio-zoom']) : ?>
                        <span class="zoom"><i class="fa fa-search"></i></span>
                    <?php endif; ?>
                </div>
            </div>
        </article>
        <?php
        $prev_post_year = $post_year;
        $prev_post_month = $post_month;
        $post_count++;
    endif;
endif;