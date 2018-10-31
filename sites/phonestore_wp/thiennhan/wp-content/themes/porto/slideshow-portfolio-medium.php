<?php
// Portfolio Slideshow
global $porto_settings;

$slideshow_type = get_post_meta($post->ID, 'slideshow_type', true);

if (!$slideshow_type)
    $slideshow_type = 'images';

$image_count = 0;

$attachment_id = get_post_thumbnail_id();
if ($attachment_id)
    $image_count = 1;

if( class_exists('Dynamic_Featured_Image') ) {
    global $dynamic_featured_image;
    $featured_images = $dynamic_featured_image->get_featured_images();
    $image_count += count($featured_images);
}

if ($slideshow_type != 'none') : ?>

    <?php if ($slideshow_type == 'images' && has_post_thumbnail()) : ?>
        <div class="portfolio-image<?php if ($image_count == 1) echo ' single'; ?>">
            <div class="portfolio-slideshow owl-carousel">
                <?php
                $attachment_medium = porto_get_attachment($attachment_id, 'portfolio-medium');
                $attachment = porto_get_attachment($attachment_id);
                if ($attachment) {
                    ?>
                    <div>
                        <div class="img-thumbnail">
                            <div class="inner">
                                <img class="lazyOwl img-responsive" width="<?php echo $attachment_medium['width'] ?>" height="<?php echo $attachment_medium['height'] ?>" data-src="<?php echo $attachment_medium['src'] ?>" alt="<?php echo $attachment_medium['alt'] ?>"<?php if ($porto_settings['portfolio-zoom']) : ?> data-image="<?php echo $attachment['src']; ?>" data-caption="<?php echo $attachment_medium['caption']; ?>"<?php endif; ?> />
                                <?php if ($porto_settings['portfolio-zoom']) : ?>
                                    <span class="zoom"><i class="fa fa-search"></i></span>
                                    <?php if (!is_singular('portfolio')) : ?><a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a><?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                }

                if( class_exists('Dynamic_Featured_Image') ) {
                    foreach ($featured_images as $featured_image) {
                        $attachment_medium = porto_get_attachment($featured_image['attachment_id'], 'portfolio-medium');
                        $attachment = porto_get_attachment($featured_image['attachment_id']);
                        if ($attachment) {
                            ?>
                            <div>
                                <div class="img-thumbnail">
                                    <div class="inner">
                                        <img class="lazyOwl img-responsive" width="<?php echo $attachment_medium['width'] ?>" height="<?php echo $attachment_medium['height'] ?>" data-src="<?php echo $attachment_medium['src'] ?>" alt="<?php echo $attachment_medium['alt'] ?>"<?php if ($porto_settings['portfolio-zoom']) : ?> data-image="<?php echo $attachment['src']; ?>" data-caption="<?php echo $attachment_medium['caption']; ?>"<?php endif; ?> />
                                        <?php if ($porto_settings['portfolio-zoom']) : ?>
                                            <span class="zoom"><i class="fa fa-search"></i></span>
                                            <?php if (!is_singular('portfolio')) : ?><a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a><?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    if ($slideshow_type == 'video') {
        $video_code = get_post_meta($post->ID, 'video_code', true);
        if ($video_code) {
            ?>
            <div class="portfolio-image single">
                <div class="img-thumbnail fit-video">
                    <?php echo force_balance_tags($video_code) ?>
                </div>
            </div>
        <?php
        }
    }
endif;
?>