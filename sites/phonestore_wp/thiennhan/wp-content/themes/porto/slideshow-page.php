<?php
// Page Slideshow
global $porto_settings;

$image_count = 0;

$attachment_id = get_post_thumbnail_id();
if ($attachment_id)
    $image_count = 1;

if( class_exists('Dynamic_Featured_Image') ) {
    global $dynamic_featured_image;
    $featured_images = $dynamic_featured_image->get_featured_images();
    $image_count += count($featured_images);
}

if (has_post_thumbnail()) : ?>
    <div class="page-image<?php if ($image_count == 1) echo ' single'; ?>">
        <div class="page-slideshow owl-carousel">
            <?php
            $attachment = porto_get_attachment($attachment_id);
            if ($attachment) {
                ?>
                <div>
                    <div class="img-thumbnail">
                        <div class="inner">
                            <img class="lazyOwl img-responsive" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" data-src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>"<?php if ($porto_settings['page-zoom']) : ?> data-image="<?php echo $attachment['src']; ?>" data-caption="<?php echo $attachment['caption']; ?>"<?php endif; ?> />
                            <?php if ($porto_settings['page-zoom']) : ?>
                                <span class="zoom"><i class="fa fa-search"></i></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            }

            if( class_exists('Dynamic_Featured_Image') ) {
                foreach ($featured_images as $featured_image) {
                    $attachment = porto_get_attachment($featured_image['attachment_id']);
                    if ($attachment) {
                        ?>
                        <div>
                            <div class="img-thumbnail">
                                <div class="inner">
                                    <img class="lazyOwl img-responsive" width="<?php echo $attachment['width'] ?>" height="<?php echo $attachment['height'] ?>" data-src="<?php echo $attachment['src'] ?>" alt="<?php echo $attachment['alt'] ?>"<?php if ($porto_settings['page-zoom']) : ?> data-image="<?php echo $attachment['src']; ?>" data-caption="<?php echo $attachment['caption']; ?>"<?php endif; ?> />
                                    <?php if ($porto_settings['page-zoom']) : ?>
                                        <span class="zoom"><i class="fa fa-search"></i></span>
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
<?php
endif;
?>