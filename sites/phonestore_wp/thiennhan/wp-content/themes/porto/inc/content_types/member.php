<?php

// Insert Member Meta Boxes
function porto_member_meta_boxes() {

    global $member_meta_boxes;

    porto_show_meta_boxes($member_meta_boxes);
}

// Insert View Meta Boxes
function porto_member_view_meta_boxes() {

    global $member_view_meta_boxes;

    porto_show_meta_boxes($member_view_meta_boxes);
}

// Insert Skin Meta Boxes
function porto_member_skin_meta_boxes() {

    global $member_skin_meta_boxes;

    porto_show_meta_boxes($member_skin_meta_boxes);
}

function porto_add_member_meta_box() {
    global $porto_settings;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'member-meta-boxes', __('Member Options', 'porto'), 'porto_member_meta_boxes', 'member', 'normal', 'high' );
        add_meta_box( 'view-meta-boxes', __('View Options', 'porto'), 'porto_member_view_meta_boxes', 'member', 'normal', 'low' );
        if ($porto_settings['show-content-type-skin']) {
            add_meta_box( 'skin-meta-boxes', __('Skin Options', 'porto'), 'porto_member_skin_meta_boxes', 'member', 'normal', 'low' );
        }
    }
}

// Save Member Metas        
function porto_member_save_postdata( $post_id ) {
    global $member_meta_boxes;

    return porto_save_postdata( $post_id, $member_meta_boxes );
}

// Save View Metas
function porto_member_view_save_postdata( $post_id ) {
    global $member_view_meta_boxes;

    return porto_save_postdata( $post_id, $member_view_meta_boxes );
}

// Save Skin Metas
function porto_member_skin_save_postdata( $post_id ) {
    global $member_skin_meta_boxes;

    return porto_save_postdata( $post_id, $member_skin_meta_boxes );
}

// Get Member Metas        
function porto_member_get_postdata() {
    global $porto_settings, $member_meta_boxes, $member_view_meta_boxes, $member_skin_meta_boxes, $member_cat_meta_boxes;

    // Slideshow Types
    $slideshow_types = array(
        "images" => __("Images", 'porto'),
        "video" => __("Video & Audio", 'porto'),
        "none" => __("None", 'porto'),
    );

    // Member View Meta Boxes
    $member_view_meta_boxes = porto_ct_default_meta_view_boxes();

    // Layout
    $member_view_meta_boxes['layout']['default'] = 'fullwidth';

    // Sidebar
    $member_view_meta_boxes['sidebar']['default'] = 'member-sidebar';

    // Member Skin Meta Boxes
    $member_skin_meta_boxes = porto_ct_default_meta_skin_boxes();

    // Member Meta Boxes
    $member_meta_boxes = array(
        // Fist name
        "member_firstname" => array(
            "name" => "member_firstname",
            "title" => __("First Name", 'porto'),
            "type" => "text"
        ),
        // Last name
        "member_lastname" => array(
            "name" => "member_lastname",
            "title" => __("Last Name", 'porto'),
            "type" => "text"
        ),
        // Portfolio IDs
        "member_role" => array(
            "name" => "member_role",
            "title" => __("Role", 'porto'),
            "type" => "text"
        ),
        // Overview
        "member_overview" => array(
            "name" => "member_overview",
            "title" => __("Overview", 'porto'),
            "type" => "editor"
        ),
        // Portfolio IDs
        "member_portfolios" => array(
            "name" => "member_portfolios",
            "title" => __("Portfolio IDs", 'porto'),
            "desc" => __("Comma separated list of portfolio ids.", 'porto'),
            "type" => "text"
        ),
        // Product IDs
        "member_products" => array(
            "name" => "member_products",
            "title" => __("Product IDs", 'porto'),
            "desc" => __("Comma separated list of product ids.", 'porto'),
            "type" => "text"
        ),
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
            "desc" => __("Paste the iframe code of the Flash (YouTube or Vimeo etc). Only necessary when the member type is video.", 'porto'),
            "type" => "textarea"
        ),
        // Visit Site Link
        "member_link" => array(
            "name" => "member_link",
            "title" => __("Member Link", 'porto'),
            "desc" => __("External Link for the Member which adds a visit site button with the link. Leave blank for post URL.", 'porto'),
            "type" => "text"
        ),
        // Facebook
        "member_facebook" => array(
            "name" => "member_facebook",
            "title" => __("Facebook", 'porto'),
            "type" => "text"
        ),
        // Twitter
        "member_twitter" => array(
            "name" => "member_twitter",
            "title" => __("Twitter", 'porto'),
            "type" => "text"
        ),
        // LinkedIn
        "member_linkedin" => array(
            "name" => "member_linkedin",
            "title" => __("LinkedIn", 'porto'),
            "type" => "text"
        ),
        // Google +
        "member_googleplus" => array(
            "name" => "member_googleplus",
            "title" => __("Google +", 'porto'),
            "type" => "text"
        ),
        // Pinterest
        "member_pinterest" => array(
            "name" => "member_pinterest",
            "title" => __("Pinterest", 'porto'),
            "type" => "text"
        ),
        // Email
        "member_email" => array(
            "name" => "member_email",
            "title" => __("Email", 'porto'),
            "type" => "text"
        ),
        // VK
        "member_vk" => array(
            "name" => "member_vk",
            "title" => __("VK", 'porto'),
            "type" => "text"
        ),
        // Xing
        "member_xing" => array(
            "name" => "member_xing",
            "title" => __("Xing", 'porto'),
            "type" => "text"
        ),
        // Tumblr
        "member_tumblr" => array(
            "name" => "member_tumblr",
            "title" => __("Tumblr", 'porto'),
            "type" => "text"
        ),
        // Reddit
        "member_reddit" => array(
            "name" => "member_reddit",
            "title" => __("Reddit", 'porto'),
            "type" => "text"
        ),
        // Vimeo
        "member_vimeo" => array(
            "name" => "member_vimeo",
            "title" => __("Vimeo", 'porto'),
            "type" => "text"
        ),
        // Instagram
        "member_instagram" => array(
            "name" => "member_instagram",
            "title" => __("Instagram", 'porto'),
            "type" => "text"
        ),
        // WhatsApp
        "member_whatsapp" => array(
            "name" => "member_whatsapp",
            "title" => __("WhatsApp", 'porto'),
            "type" => "text"
        )
    );

    // Category Meta Boxes
    $member_cat_meta_boxes = porto_ct_default_meta_view_boxes();

    // Sidebar
    $member_cat_meta_boxes['sidebar']['default'] = 'member-sidebar';

    // Member Options
    $member_cat_meta_boxes = array_insert_before('breadcrumbs', $member_cat_meta_boxes, "member_options", array(
        "name" => "member_options",
        "title" => __("Member Options", 'porto'),
        "desc" => __("Use selected member options. (<strong>Infinite Scroll</strong>)", 'porto'),
        "type" => "checkbox"
    ));

    // Infinite Scroll
    $member_cat_meta_boxes = array_insert_before('breadcrumbs', $member_cat_meta_boxes, "member_infinite", array(
        "name" => "member_infinite",
        "title" => __("Infinite Scroll", 'porto'),
        "desc" => __("Disable infinite scroll.", 'porto'),
        "type" => "checkbox"
    ));

    if (isset($porto_settings['show-category-skin']) && $porto_settings['show-category-skin']) {
        $member_cat_meta_boxes = array_merge($member_cat_meta_boxes, porto_ct_default_meta_skin_boxes());
    }
}

add_action('add_meta_boxes', 'porto_add_member_meta_box');
add_action('admin_menu', 'porto_member_get_postdata');
add_action('save_post', 'porto_member_save_postdata');
add_action('save_post', 'porto_member_view_save_postdata');
add_action('save_post', 'porto_member_skin_save_postdata');

// Create Category Meta
global $wpdb;
$type = 'member_cat';
$table_name = $wpdb->prefix . $type . 'meta';
$variable_name = $type . 'meta';
$wpdb->$variable_name = $table_name;

// Create Category Meta Table
create_metadata_table($table_name, $type);

// category meta
add_action( 'member_cat_add_form_fields', 'porto_add_member_cat', 10, 2);
function porto_add_member_cat() {
    global $member_cat_meta_boxes;

    porto_show_tax_add_meta_boxes($member_cat_meta_boxes);
}

add_action( 'member_cat_edit_form_fields', 'porto_edit_member_cat', 10, 2);
function porto_edit_member_cat($tag, $taxonomy) {
    global $member_cat_meta_boxes;

    porto_show_tax_edit_meta_boxes($tag, $taxonomy, $member_cat_meta_boxes);
}

add_action( 'created_term', 'porto_save_member_cat', 10,3 );
add_action( 'edit_term', 'porto_save_member_cat', 10,3 );

function porto_save_member_cat($term_id, $tt_id, $taxonomy) {
    if (!$term_id) return;

    global $member_cat_meta_boxes;

    porto_post_get_postdata();
    return porto_save_taxdata( $term_id, $tt_id, $taxonomy, $member_cat_meta_boxes );
}
