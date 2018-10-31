<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $woocommerce, $product, $porto_settings;

$rand = porto_generate_rand();
$attachment_count = count( $product->get_gallery_attachment_ids() );
?>

<div class="product-images">

    <!-- MasterSlider Main -->
    <div id="product-image-slider-<?php echo $rand ?>" class="product-image-slider master-slider<?php if (!$attachment_count) echo ' hide-ms-nav' ?>">

        <div class="ms-slide">
            <?php
            if ( has_post_thumbnail() ) {

                $attachment_id = get_post_thumbnail_id();
                $image_title = esc_attr( get_the_title( $attachment_id ) ); if (!$image_title) $image_title = '';
                $image_link  = wp_get_attachment_url( $attachment_id );
                $image_thumb_link = wp_get_attachment_image_src($attachment_id, 'shop_thumbnail');
                $image_single_link = wp_get_attachment_image_src($attachment_id, 'shop_single');

                if ( !$attachment_count ) {
                    $porto_settings['product-thumbs'] = false;
                }

                $image_html = '<img src="' . $image_single_link[0] . '" data-href="' . $image_link . '" class="woocommerce-main-image zoom" alt="' . $image_title . '" itemprop="image" content="' . $image_link . '" />';
                if ($porto_settings['product-thumbs'])
                    $image_html .= '<img class="ms-thumb" alt="' . $image_title . '" src="' . $image_thumb_link[0] . '" />';
                echo apply_filters( 'woocommerce_single_product_image_html', $image_html, $post->ID );

            } else {
                $image_link = wc_placeholder_img_src();
                $image_html = '<img src="' . $image_link . '" data-href="' . $image_link . '" class="woocommerce-main-image zoom" alt="' . $image_title . '" itemprop="image" content="' . $image_link . '" />';
                if ($porto_settings['product-thumbs'])
                    $image_html .= '<img class="ms-thumb" alt="' . $image_title . '" src="' . $image_link . '" />';
                echo apply_filters( 'woocommerce_single_product_image_html', $image_html, $post->ID );

            }
            ?>
        </div>

        <?php do_action( 'woocommerce_product_thumbnails' ); ?>

    </div>
    <!-- END MasterSlider Main -->


</div>
<!-- END MasterSlider -->

<script type="text/javascript">

    (function ( $ ) {
        "use strict";

        $(document).ready(function () {
            var product_image_slider = new MasterSlider();

            var $image_slider = $('#product-image-slider-<?php echo esc_js($rand) ?>');
            $image_slider.data('imageSlider', product_image_slider);
            var $product_thumbs = $image_slider.find('.ms-thumb');
            var ms_view = '#product-image-slider-<?php echo esc_js($rand) ?> .ms-view';

            <?php if ($porto_settings['product-zoom']) : ?>
            var zoomConfig = {
                zoomContainer: ms_view,
                responsive: true,
                zoomWindowFadeIn: 300,
                zoomType: '<?php echo esc_js($porto_settings['zoom-type']) ?>',
                <?php if ($porto_settings['zoom-type'] == 'lens') : ?>
                scrollZoom: <?php echo esc_js($porto_settings['zoom-scroll'] ? 'true' : 'false') ?>,
                lensSize: <?php echo esc_js($porto_settings['zoom-lens-size']) ?>,
                lensShape: '<?php echo esc_js($porto_settings['zoom-lens-shape']) ?>',
                containLensZoom: <?php echo esc_js($porto_settings['zoom-contain-lens'] ? 'true' : 'false') ?>,
                lensBorder: <?php echo esc_js($porto_settings['zoom-lens-border']) ?>,
                borderColour: '<?php echo esc_js($porto_settings['zoom-border-color']) ?>',
                <?php endif; ?>
                borderSize: <?php echo esc_js($porto_settings['zoom-type'] == 'inner' ? 0 : $porto_settings['zoom-border']) ?>,
                cursor: 'grab'
            };
            <?php endif; ?>

            // slider setup
            product_image_slider.setup("product-image-slider-<?php echo $rand ?>", {
                layout          : "fillwidth",
                loop            : <?php echo esc_js($attachment_count > 2 ? 'true' : 'false') ?>,
                autoHeight      : true,
                overPause       : true,
                centerControls  : false,
                speed           : 35,
                preload         : 0,
                parallaxMode    : 'swipe',
                layersMode      : 'full'
            });

            // slider controls
            product_image_slider.control('arrows' ,{ autohide:true });
            <?php if ($porto_settings['product-thumbs']) : ?>
            product_image_slider.control('thumblist', { autohide:false, margin:0, width:100, height:100, space:8, speed:40 });
            <?php endif; ?>
            <?php if ($porto_settings['product-image-popup']) : ?>
            product_image_slider.control('lightbox');
            <?php endif; ?>

            var sliderLoaded = false;
            var zoomLoading = false;

            <?php if ($porto_settings['product-zoom']) : ?>
            function initProductImageZoom() {
                if (zoomLoading || !sliderLoaded || typeof product_image_slider.api.view == 'undefined' || product_image_slider.api.view.currentSlide == null) return;

                zoomLoading = true;
                var curSlide = product_image_slider.api.view.currentSlide;
                var imgCont = curSlide.$imgcont;
                $(ms_view).find('.zoomContainer').remove();
                var zoomImg = imgCont.find('.zoom');
                var image = new Image();
                var zoomImgSrc = zoomImg.attr( 'src' );
                image.onload = function() {
                    zoomConfig.onZoomedImageLoaded = function() {
                        var elevateZoom = zoomImg.data('elevateZoom');
                        elevateZoom.swaptheimage(zoomImgSrc, zoomImgSrc);
                        zoomLoading = false;
                    };
                    zoomImg.elevateZoom(zoomConfig);
                };
                image.src = zoomImgSrc;
            }
            <?php endif; ?>

            function initProductImageLightBox() {
                $image_slider.find('.ms-lightbox-btn').click(function() {
                    var links = [];
                    var i = 0;
                    var $image_links = $image_slider.find('.zoom');
                    $image_links.each(function() {
                        var slide = {};
                        var $image = $(this);
                        slide.title = $image.attr('alt');
                        if ($image.attr('href'))
                            slide.href = $image.attr('href');
                        else
                        slide.href = $image.attr('data-href');
                        slide.thumbnail = $image.attr('src');
                        links[i] = slide;
                        i++;
                    });
                    var curSlide = product_image_slider.api.view.currentSlide;
                    var imgCont = curSlide.$imgcont;
                    var curImage = imgCont.find('.zoom');
                    var options = {index: $image_links.index(curImage)};
                    blueimp.Gallery(links, options);
                });
            }

            product_image_slider.api.addEventListener(MSSliderEvent.INIT, function() {
                sliderLoaded = true;
                setTimeout(function() {
                    product_image_slider.slideController.locate();
                }, 600);
                <?php if ($porto_settings['product-zoom']) : ?>
                initProductImageZoom();
                <?php endif; ?>
                initProductImageLightBox();
                $image_slider.find('.ms-thumblist-fwd').unbind('click').click(function() {
                    product_image_slider.api.next();
                });
                $image_slider.find('.ms-thumblist-bwd').unbind('click').click(function() {
                    product_image_slider.api.previous();
                });

                <?php if ($porto_settings['product-zoom']) : ?>
                product_image_slider.api.view.addEventListener(MSViewEvents.SWIPE_START, function() {
                    $(ms_view).find('.zoomContainer').remove();
                    zoomLoading = false;
                });

                product_image_slider.api.view.addEventListener(MSViewEvents.SWIPE_CANCEL, function() {
                    initProductImageZoom();
                });
                <?php endif; ?>
            });

            <?php if ($porto_settings['product-zoom']) : ?>
            product_image_slider.api.addEventListener(MSSliderEvent.CHANGE_END, function() {
                initProductImageZoom();
            });
            <?php endif; ?>

            product_image_slider.api.addEventListener(MSSliderEvent.RESIZE, function() {
                <?php if ($porto_settings['product-zoom']) : ?>
                initProductImageZoom();
                <?php endif; ?>
                var $product_thumb = $($product_thumbs.get(0));
                var thumb_padding = parseInt($product_thumb.closest('.ms-thumb-frame').css('border-left-width')) + parseInt($product_thumb.closest('.ms-thumb-frame').css('padding-left'));
                var thumb_width = parseInt(($image_slider.width() - 24 - thumb_padding * 6) / 4) - 0.01;
                $product_thumbs.css('width', thumb_width);
            });
        });

    })(jQuery);
</script>
