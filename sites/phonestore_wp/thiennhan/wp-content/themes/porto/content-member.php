<?php
global $porto_settings, $porto_layout;

?>

<article <?php post_class('member'); ?>>

    <div class="row">
        <?php
        $attachment_id = get_post_thumbnail_id();
        $attachment = porto_get_attachment($attachment_id);
        if ($attachment) : ?>
        <div class="col-sm-4">
            <?php // Member Slideshow ?>
            <?php get_template_part('slideshow', 'member'); ?>
        </div>
        <div class="col-sm-8">
            <?php else : ?>
            <div class="col-sm-12">
                <?php endif; ?>
                <?php
                $member_id = $post->ID;
                $firstname = get_post_meta($member_id, 'member_firstname', true);
                $lastname = get_post_meta($member_id, 'member_lastname', true);
                $role = get_post_meta($member_id, 'member_role', true);
                $overview = get_post_meta($member_id, 'member_overview', true);
                ?>

                <h2 class="entry-title<?php echo ($role?' shorter':'') ?>"><?php echo esc_html($firstname) ?><?php echo ($lastname?' <strong>'.esc_html($lastname).'</strong>':'') ?></h2>
                <?php porto_render_rich_snippets( false ); ?>
                <?php echo ($role?'<h4 class="member-role">'.esc_html($role).'</h4>':'') ?>
                <div class="member-share-links share-links">
                    <?php
                    // Social Share
                    $share_facebook = get_post_meta($member_id, 'member_facebook', true);
                    $share_twitter = get_post_meta($member_id, 'member_twitter', true);
                    $share_linkedin = get_post_meta($member_id, 'member_linkedin', true);
                    $share_googleplus = get_post_meta($member_id, 'member_googleplus', true);
                    $share_pinterest= get_post_meta($member_id, 'member_pinterest', true);
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

                <?php echo wpautop(do_shortcode(get_post_meta($post->ID, 'member_overview', true))); ?>

                <?php
                $member_link = get_post_meta($post->ID, 'member_link', true);
                if ($member_link) :
                    ?>
                    <div class="post-gap-small"></div>

                    <a<?php echo $target ?> class="btn btn-primary btn-icon" href="<?php echo esc_url($member_link) ?>">
                        <i class="fa fa-external-link"></i><?php _e('More Info', 'porto') ?>
                    </a>

                    <span data-appear-animation-delay="800" data-appear-animation="rotateInUpLeft" class="dir-arrow <?php echo is_rtl() ? 'hrb' : 'hlb' ?> appear-animation"></span>

                    <div class="post-gap-small"></div>
                <?php endif; ?>

            </div>
        </div>

        <div class="post-gap"></div>

        <?php if (get_the_content()) : ?>
            <hr class="tall"/>
            <div class="post-content">

                <?php
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

                <div class="post-gap-small"></div>

            </div>
        <?php endif; ?>

        <?php get_template_part('content', 'member-portfolios'); ?>

        <?php if (class_exists('WooCommerce')) get_template_part('content', 'member-products'); ?>

        <?php
        if ($porto_settings['member-related']) :
            $related_members = porto_get_related_members($post->ID);
            if ($related_members->have_posts()) : ?>
                <div class="related-members">
                    <h4 class="sub-title"><?php echo __('Related <strong>Members</strong>', 'porto'); ?></h4>
                    <div class="row">
                        <div class="member-carousel owl-carousel" data-cols-lg="<?php echo ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') ? '3' : '4' ?>" data-cols-md="3" data-cols-sm="2">
                            <?php
                            while ($related_members->have_posts()) {
                                $related_members->the_post();

                                get_template_part('content', 'member-item');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif;
        endif;
        ?>

</article>