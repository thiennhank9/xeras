<?php

// Insert Post Meta Boxes
function porto_post_meta_boxes() {
    
    global $post_meta_boxes;

    porto_show_meta_boxes($post_meta_boxes);
}

// Insert View Meta Boxes
function porto_post_view_meta_boxes() {

    global $post_view_meta_boxes;

    porto_show_meta_boxes($post_view_meta_boxes);
}

// Insert Skin Meta Boxes
function porto_post_skin_meta_boxes() {

    global $post_skin_meta_boxes;

    porto_show_meta_boxes($post_skin_meta_boxes);
}
        
function porto_add_post_meta_box() {
    global $porto_settings;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'post-meta-boxes', __('Post Options', 'porto'), 'porto_post_meta_boxes', 'post', 'normal', 'high' );
        add_meta_box( 'view-meta-boxes', __('View Options', 'porto'), 'porto_post_view_meta_boxes', 'post', 'normal', 'low' );
        if ($porto_settings['show-content-type-skin']) {
            add_meta_box( 'skin-meta-boxes', __('Skin Options', 'porto'), 'porto_post_skin_meta_boxes', 'post', 'normal', 'low' );
        }
    }
}

// Save Post Metas
function porto_post_save_postdata( $post_id ) {
    global $post_meta_boxes;
    
    return porto_save_postdata( $post_id, $post_meta_boxes );
}

// Save View Metas
function porto_post_view_save_postdata( $post_id ) {
    global $post_view_meta_boxes;

    return porto_save_postdata( $post_id, $post_view_meta_boxes );
}

// Save Skin Metas
function porto_post_skin_save_postdata( $post_id ) {
    global $post_skin_meta_boxes;

    return porto_save_postdata( $post_id, $post_skin_meta_boxes );
}

// Get Past Metas        
function porto_post_get_postdata() {
    global $porto_settings, $post_meta_boxes, $post_view_meta_boxes, $post_skin_meta_boxes, $category_meta_boxes;

    // Slideshow Types
    $slideshow_types = array(
        "images" => __("Images", 'porto'),
        "video" => __("Video & Audio", 'porto'),
        "none" => __("None", 'porto'),
    );

    // Post View Meta Boxes
    $post_view_meta_boxes = porto_ct_default_meta_view_boxes();

    // Layout
    $post_view_meta_boxes['layout']['default'] = 'right-sidebar';

    // Sidebar
    $post_view_meta_boxes['sidebar']['default'] = 'blog-sidebar';

    // Post Skin Meta Boxes
    $post_skin_meta_boxes = porto_ct_default_meta_skin_boxes();

    // Post Meta Boxes
    $post_meta_boxes = array(
        // Slideshow Type
        "slideshow_type" => array(
            "name" => "slideshow_type",
            "title" => __("Slideshow Type", 'porto'),
            "desc" => __("Select the slideshow type.", 'porto'),
            "type" => "radio",
            "default" => "images",
            "options" => $slideshow_types
        ),
        // Video & Audio Embed Code
        "video_code" => array(
            "name" => "video_code",
            "title" => __("Video & Audio Embed Code", 'porto'),
            "desc" => __("Paste the iframe code of the Flash (YouTube or Vimeo etc). Only necessary when the portfolio type is video.", 'porto'),
            "type" => "textarea"
        ),
        // External URL
        "external_url" => array(
            "name" => "external_url",
            "title" => __("External URL", 'porto'),
            "desc" => __("Input website url if post format is link.", 'porto'),
            "type" => "text"
        ),
        // Layout
        "post_layout" => array(
            "name" => "post_layout",
            "title" => __("Post Layout", 'porto'),
            "desc" => __("Select the post layout.", 'porto'),
            "type" => "radio",
            "default" => "default",
            "options" => array_merge(
                array(
                    "default" => __("Default", 'porto')
                ),
                porto_ct_post_single_layouts()
            )
        ),
        // Share
        "post_share" => array(
            "name" => "post_share",
            "title" => __("Share", 'porto'),
            "type" => "radio",
            "default" => "",
            "options" => array_merge(
                porto_ct_share_options()
            )
        ),
    );

    // Category Meta Boxes
    $category_meta_boxes = porto_ct_default_meta_view_boxes();

    // Post Options
    $category_meta_boxes = array_insert_before('breadcrumbs', $category_meta_boxes, "post_options", array(
        "name" => "post_options",
        "title" => __("Post Options", 'porto'),
        "desc" => __("Use selected post options. (<strong>Infinite Scroll, Post Layout, Grid Columns</strong>)", 'porto'),
        "type" => "checkbox"
    ));

    // Infinite Scroll
    $category_meta_boxes = array_insert_before('breadcrumbs', $category_meta_boxes, "post_infinite", array(
        "name" => "post_infinite",
        "title" => __("Infinite Scroll", 'porto'),
        "desc" => __("Disable infinite scroll.", 'porto'),
        "type" => "checkbox"
    ));

    // Post Layout
    $category_meta_boxes = array_insert_before('breadcrumbs', $category_meta_boxes, "post_layout", array(
        "name" => "post_layout",
        "title" => __("Post Layout", 'porto'),
        "desc" => __("Select the post layout.", 'porto'),
        "type" => "radio",
        "default" => "large",
        "options" => porto_ct_post_archive_layouts()
    ));
    // Post Grid Columns
    $category_meta_boxes = array_insert_before('breadcrumbs', $category_meta_boxes, "post_grid_columns", array(
        "name" => "post_grid_columns",
        "title" => __("Grid Columns", 'porto'),
        "desc" => __("Select the post columns in <strong>grid layout</strong>.", 'porto'),
        "type" => "radio",
        "default" => "3",
        "options" => array(
            "2" => __("2 Columns", 'porto'),
            "3" => __("3 Columns", 'porto'),
            "4" => __("4 Columns", 'porto')
        )
    ));

    if (isset($porto_settings['show-category-skin']) && $porto_settings['show-category-skin']) {
        $category_meta_boxes = array_merge($category_meta_boxes, porto_ct_default_meta_skin_boxes());
    }
}

add_action('add_meta_boxes', 'porto_add_post_meta_box');
add_action('admin_menu', 'porto_post_get_postdata');
add_action('save_post', 'porto_post_save_postdata');
add_action('save_post', 'porto_post_view_save_postdata');

// Create Category Meta
global $wpdb;
$type = 'category';
$table_name = $wpdb->prefix . $type . 'meta';
$variable_name = $type . 'meta';
$wpdb->$variable_name = $table_name;

// Create Category Meta Table
create_metadata_table($table_name, $type);

// category meta
add_action( 'category_add_form_fields', 'porto_add_category', 10, 2);
function porto_add_category() {
    global $category_meta_boxes;

    porto_show_tax_add_meta_boxes($category_meta_boxes);
}

add_action( 'category_edit_form_fields', 'porto_edit_category', 10, 2);
function porto_edit_category($tag, $taxonomy) {
    global $category_meta_boxes;

    porto_show_tax_edit_meta_boxes($tag, $taxonomy, $category_meta_boxes);
}

add_action( 'created_term', 'porto_save_category', 10,3 );
add_action( 'edit_term', 'porto_save_category', 10,3 );

function porto_save_category($term_id, $tt_id, $taxonomy) {
    if (!$term_id) return;
    
    global $category_meta_boxes;

    porto_post_get_postdata();
    return porto_save_taxdata( $term_id, $tt_id, $taxonomy, $category_meta_boxes );
}
