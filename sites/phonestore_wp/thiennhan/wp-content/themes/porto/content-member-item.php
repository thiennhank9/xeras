<?php

global $post, $porto_settings;

$item_classes = ' ';
$item_cats = get_the_terms($post->ID, 'member_cat');
if ($item_cats):
    foreach ($item_cats as $item_cat) {
        $item_classes .= urldecode($item_cat->slug) . ' ';
    }
endif;

if (has_post_thumbnail()) :
    $attachment_id = get_post_thumbnail_id();
    $attachment = porto_get_attachment($attachment_id);
    $attachment_medium = porto_get_attachment($attachment_id, 'member');
    if ($attachment && $attachment_medium) :
        ?>
        <div class="member-item thumbnail">
            <div class="thumb-info">
                <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" width="<?php echo $attachment_medium['width'] ?>" height="<?php echo $attachment_medium['height'] ?>" src="<?php echo $attachment_medium['src'] ?>" alt="<?php echo $attachment_medium['alt'] ?>"<?php if ($porto_settings['member-zoom']) : ?> data-image="<?php echo $attachment['src'] ?>" data-caption="<?php echo $attachment['caption'] ?>"<?php endif; ?> />
                </a>
                <div class="thumb-info-title">
                    <a href="<?php the_permalink() ?>" class="thumb-info-inner"><?php the_title(); ?></a>
                    <?php
                    $cat_list = get_the_term_list($post->ID, 'member_cat', '', ', ', '');
                    if ($cat_list) : ?>
                        <span class="thumb-info-type"><?php echo $cat_list ?></span>
                    <?php endif; ?>
                </div>
                <?php if ($porto_settings['member-zoom']) : ?>
                    <span class="zoom"><i class="fa fa-search"></i></span>
                <?php endif; ?>
            </div>
            <span class="thumb-info-caption">
                <?php
                $member_id = get_the_ID();
                $member_overview = get_post_meta($member_id, 'member_overview', true);
                $member_overview = strip_tags( strip_shortcodes($member_overview) );
                $limit = 15;
                $member_overview = explode(' ', $member_overview, $limit);

                if (count($member_overview) >= $limit) {
                    array_pop($member_overview);
                    $member_overview = implode(" ",$member_overview).__('...', 'porto');
                } else {
                    $member_overview = implode(" ",$member_overview);
                }

                echo '<p>'.$member_overview.'</p>';
                ?>
                <div class="thumb-info-social-icons share-links">
                    <?php
                    // Social Share
                    $share_facebook = get_post_meta($member_id, 'member_facebook', true);
                    $share_twitter = get_post_meta($member_id, 'member_twitter', true);
                    $share_linkedin = get_post_meta($member_id, 'member_linkedin', true);
                    $share_googleplus = get_post_meta($member_id, 'member_googleplus', true);
                    $share_pinterest = get_post_meta($member_id, 'member_pinterest', true);
                    $share_email = get_post_meta($member_id, 'member_email', true);
                    $share_vk = get_post_meta($member_id, 'member_vk', true);
                    $share_xing = get_post_meta($member_id, 'member_xing', true);
                    $share_tumblr = get_post_meta($member_id, 'member_tumblr', true);
                    $share_reddit = get_post_meta($member_id, 'member_reddit', true);
                    $share_vimeo = get_post_meta($member_id, 'member_vimeo', true);
                    $share_instagram = get_post_meta($member_id, 'member_instagram', true);
                    $share_whatsapp = get_post_meta($member_id, 'member_whatsapp', true);
                    $target = (isset($porto_settings['member-social-target']) && $porto_settings['member-social-target']) ? ' target="_blank"' : '';

                    if ($share_facebook) :
                        ?><a href="<?php echo esc_url($share_facebook) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Facebook', 'porto') ?>" class="share-facebook"><?php echo __('Facebook', 'porto') ?></a><?php
                    endif;

                    if ($share_twitter) :
                        ?><a href="<?php echo esc_url($share_twitter) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Twitter', 'porto') ?>" class="share-twitter"><?php echo __('Twitter', 'porto') ?></a><?php
                    endif;

                    if ($share_linkedin) :
                        ?><a href="<?php echo esc_url($share_linkedin) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('LinkedIn', 'porto') ?>" class="share-linkedin"><?php echo __('LinkedIn', 'porto') ?></a><?php
                    endif;

                    if ($share_googleplus) :
                        ?><a href="<?php echo esc_url($share_googleplus) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Google +', 'porto') ?>" class="share-googleplus"><?php echo __('Google +', 'porto') ?></a><?php
                    endif;

                    if ($share_pinterest) :
                        ?><a href="<?php echo esc_url($share_pinterest) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Pinterest', 'porto') ?>" class="share-pinterest"><?php echo __('Pinterest', 'porto') ?></a><?php
                    endif;

                    if ($share_email) :
                        ?><a href="mailto:<?php echo esc_attr($share_email) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Email', 'porto') ?>" class="share-email"><?php echo __('Email', 'porto') ?></a><?php
                    endif;

                    if ($share_vk) :
                        ?><a href="<?php echo esc_url($share_vk) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('VK', 'porto') ?>" class="share-vk"><?php echo __('VK', 'porto') ?></a><?php
                    endif;

                    if ($share_xing) :
                        ?><a href="<?php echo esc_url($share_xing) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Xing', 'porto') ?>" class="share-xing"><?php echo __('Xing', 'porto') ?></a><?php
                    endif;

                    if ($share_tumblr) :
                        ?><a href="<?php echo esc_url($share_tumblr) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Tumblr', 'porto') ?>" class="share-tumblr"><?php echo __('Tumblr', 'porto') ?></a><?php
                    endif;

                    if ($share_reddit) :
                        ?><a href="<?php echo esc_url($share_reddit) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Reddit', 'porto') ?>" class="share-reddit"><?php echo __('Reddit', 'porto') ?></a><?php
                    endif;

                    if ($share_vimeo) :
                        ?><a href="<?php echo esc_url($share_vimeo) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Vimeo', 'porto') ?>" class="share-vimeo"><?php echo __('Vimeo', 'porto') ?></a><?php
                    endif;

                    if ($share_instagram) :
                        ?><a href="<?php echo esc_url($share_instagram) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('Instagram', 'porto') ?>" class="share-instagram"><?php echo __('Instagram', 'porto') ?></a><?php
                    endif;

                    if ($share_whatsapp) :
                        ?><a href="whatsapp://send?text=<?php echo esc_url($share_whatsapp) ?>"<?php echo $target ?> data-toggle="tooltip" data-placement="bottom" title="<?php echo __('WhatsApp', 'porto') ?>" class="share-whatsapp" style="display:none"><?php echo __('WhatsApp', 'porto') ?></a><?php
                    endif;

                    ?>
                </div>
            </span>
        </div>
    <?php
    endif;
endif;