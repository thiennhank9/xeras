<?php

// Insert Block Meta Boxes
function porto_block_meta_boxes() {

    global $block_meta_boxes;

    porto_show_meta_boxes($block_meta_boxes);
}

function porto_add_block_meta_box() {
    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'block-meta-boxes', __('Block Options', 'porto'), 'porto_block_meta_boxes', 'block', 'normal', 'high' );
    }
}

// Save Block Metas
function porto_block_save_postdata( $post_id ) {
    global $block_meta_boxes;

    return porto_save_postdata( $post_id, $block_meta_boxes );
}

// Get Block Metas
function porto_block_get_postdata() {
    global $block_meta_boxes;

    // Block Meta Boxes
    $block_meta_boxes = array(
        // Layout
        "container" => array(
            "name" => "container",
            "title" => __("Wrap as Container", 'porto'),
            "desc" => "",
            "type" => "radio",
            "default" => "no",
            "options" => array(
                "yes" => __("Yes", 'porto'),
                "no" => __("No", 'porto')
            )
        ),
    );
}

add_action('add_meta_boxes', 'porto_add_block_meta_box');
add_action('admin_menu', 'porto_block_get_postdata');
add_action('save_post', 'porto_block_save_postdata');