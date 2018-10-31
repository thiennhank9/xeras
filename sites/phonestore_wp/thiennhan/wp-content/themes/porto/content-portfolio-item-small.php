<?php
global $porto_settings;

if (has_post_thumbnail()) :
    ?>
    <div class="portfolio-item-small">
        <?php
        $attachment_id = get_post_thumbnail_id();
        $attachment_thumb = porto_get_attachment($attachment_id, 'widget-thumb-medium');
        ?>
        <div class="portfolio-image thumbnail">
            <a href="<?php the_permalink(); ?>">
                <img width="<?php echo $attachment_thumb['width'] ?>" height="<?php echo $attachment_thumb['height'] ?>" src="<?php echo $attachment_thumb['src'] ?>" alt="<?php echo $attachment_thumb['alt'] ?>" />
            </a>
        </div>
    </div>
<?php
endif;
