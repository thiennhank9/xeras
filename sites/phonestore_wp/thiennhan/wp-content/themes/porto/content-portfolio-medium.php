<?php
global $porto_settings;

$portfolio_layout = 'medium';
?>

<article <?php post_class('portfolio portfolio-' . $portfolio_layout); ?>>

    <div class="portfolio-title">
        <div class="row">
            <?php if ($porto_settings['portfolio-page-nav']) : ?>
                <div class="portfolio-nav-all col-sm-1">
                    <a title="<?php _e('Back to list', 'porto') ?>" data-toggle="tooltip" href="<?php echo get_post_type_archive_link( 'portfolio' ) ?>"><i class="fa fa-th"></i></a>
                </div>
            <?php endif; ?>
            <?php if ($porto_settings['portfolio-page-nav']) : ?>
            <div class="col-sm-10 text-center">
                <?php else : ?>
                <div class="col-sm-12 text-center">
                    <?php endif; ?>
                    <h2 class="entry-title shorter"><?php the_title(); ?></h2>
                    <?php porto_render_rich_snippets( false ); ?>
                </div>
                <?php if ($porto_settings['portfolio-page-nav']) : ?>
                    <div class="portfolio-nav col-sm-1">
                        <?php previous_post_link('%link', '<div data-toggle="tooltip" title="'.__('Previous', 'porto').'" class="portfolio-nav-prev"><i class="fa fa-chevron-left"></i></div>'); ?>
                        <?php next_post_link('%link', '<div data-toggle="tooltip" title="'.__('Next', 'porto').'" class="portfolio-nav-prev"><i class="fa fa-chevron-right"></i></div>'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <hr class="tall">

        <div class="row">
            <?php
            $attachment_id = get_post_thumbnail_id();
            $attachment = porto_get_attachment($attachment_id);
            if ($attachment) : ?>
            <div class="col-sm-4">
                <?php // Portfolio Slideshow ?>
                <?php get_template_part('slideshow', 'portfolio-medium'); ?>
            </div>
            <div class="col-sm-8">
                <?php else : ?>
                <div class="col-sm-12">
                    <?php endif; ?>
                    <h4 class="inline-block portfolio-desc"><?php _e('Project <strong>Description</strong>', 'porto') ?></h4>

                    <div class="portfolio-info">
                        <ul>
                            <li>
                                <?php echo porto_portfolio_like() ?>
                            </li>
                            <li>
                                <i class="fa fa-calendar"></i> <?php echo get_the_date() ?>
                            </li>
                            <?php
                            $cat_list = get_the_term_list($post->ID, 'portfolio_cat', '', ', ', '');
                            if ($cat_list) : ?>
                                <li>
                                    <i class="fa fa-tags"></i> <?php echo $cat_list ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <?php
                    $portfolio_link = get_post_meta($post->ID, 'portfolio_link', true);
                    $skill_list = get_the_term_list($post->ID, 'portfolio_skills', '', '</li><li><i class="fa fa-check-circle"></i> ', '');
                    $portfolio_client = get_post_meta($post->ID, 'portfolio_client', true);
                    ?>

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

                    <?php
                    if ($portfolio_link) :
                        ?>
                        <div class="post-gap-small"></div>

                        <a target="_blank" class="btn btn-primary btn-icon" href="<?php echo esc_url($portfolio_link) ?>">
                            <i class="fa fa-external-link"></i><?php _e('Live Preview', 'porto') ?>
                        </a>

                        <span data-appear-animation-delay="800" data-appear-animation="rotateInUpLeft" class="dir-arrow <?php echo is_rtl() ? 'hrb' : 'hlb' ?> appear-animation"></span>

                        <div class="post-gap"></div>
                    <?php endif; ?>

                    <ul class="portfolio-details">
                        <?php
                        if ($skill_list) : ?>
                            <li>
                                <p><strong><?php _e('Skills', 'porto') ?>:</strong></p>

                                <ul class="list list-skills icons list-unstyled list-inline">
                                    <li><i class="fa fa-check-circle"></i>
                                        <?php echo $skill_list ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif;
                        if ($portfolio_client) : ?>
                            <li>
                                <p><strong><?php _e('Client', 'porto') ?>:</strong></p>
                                <p><?php echo esc_html($portfolio_client) ?></p>
                            </li>
                        <?php endif; ?>
                        <?php
                        $share = porto_get_meta_value('portfolio_share');
                        if ($porto_settings['share-enable'] && 'no' !== $share && ('yes' === $share || ('yes' !== $share && $porto_settings['portfolio-share']))) : ?>
                            <li>
                                <p><strong><?php _e('Share', 'porto') ?>:</strong></p>
                                <?php get_template_part('share') ?>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>

            <div class="post-gap"></div>

            <?php if ($porto_settings['portfolio-author']) : ?>
                <div class="post-block post-author clearfix">
                    <h3><i class="fa fa-user"></i><?php _e('Author', 'porto') ?></h3>
                    <div class="img-thumbnail">
                        <?php echo get_avatar(get_the_author_meta('email'), '80'); ?>
                    </div>
                    <p><strong class="name"><?php the_author_posts_link(); ?></strong></p>
                    <p><?php the_author_meta("description"); ?></p>
                </div>
                <div class="post-gap"></div>
            <?php endif; ?>

            <?php if ($porto_settings['portfolio-comments']) : ?>
                <?php
                wp_reset_postdata();
                comments_template();
                ?>
            <?php endif; ?>

</article>