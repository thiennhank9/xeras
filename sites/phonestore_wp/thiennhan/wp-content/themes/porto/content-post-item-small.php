<?php
global $porto_settings;

?>
<div class="post-item-small">
    <?php if (has_post_thumbnail()) :
        $attachment_id = get_post_thumbnail_id();
        $attachment_thumb = porto_get_attachment($attachment_id, 'widget-thumb');
        ?>
        <div class="post-image thumbnail">
            <a href="<?php the_permalink(); ?>">
                <img width="<?php echo $attachment_thumb['width'] ?>" height="<?php echo $attachment_thumb['height'] ?>" src="<?php echo $attachment_thumb['src'] ?>" alt="<?php echo $attachment_thumb['alt'] ?>" />
            </a>
        </div>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
    <span class="post-date"><?php echo get_the_date(); ?></span>
</div>