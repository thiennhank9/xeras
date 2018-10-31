<?php
global $porto_settings;

if (has_post_thumbnail()) :
    $attachment_id = get_post_thumbnail_id();
    $attachment = porto_get_attachment($attachment_id);
    $attachment_related = porto_get_attachment($attachment_id, 'full' === $porto_settings['portfolio-related-style'] ? 'full' : 'related-portfolio');
    if ($attachment && $attachment_related) :
        ?>
        <div class="portfolio-item thumbnail <?php echo $porto_settings['portfolio-related-style'] ?>">
            <div class="thumb-info">
                <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" width="<?php echo $attachment_related['width'] ?>" height="<?php echo $attachment_related['height'] ?>" src="<?php echo $attachment_related['src'] ?>" alt="<?php echo $attachment_related['alt'] ?>"<?php if ($porto_settings['portfolio-zoom']) : ?> data-image="<?php echo $attachment['src'] ?>" data-caption="<?php echo $attachment['caption'] ?>"<?php endif; ?> />
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
    <?php
    endif;
endif;