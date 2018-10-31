<?php

// Insert Portfolio Meta Boxes
function porto_portfolio_meta_boxes() {
    
    global $portfolio_meta_boxes;

    porto_show_meta_boxes($portfolio_meta_boxes);
}

// Insert View Meta Boxes
function porto_portfolio_view_meta_boxes() {

    global $portfolio_view_meta_boxes;

    porto_show_meta_boxes($portfolio_view_meta_boxes);
}

// Insert Skin Meta Boxes
function porto_portfolio_skin_meta_boxes() {

    global $portfolio_skin_meta_boxes;

    porto_show_meta_boxes($portfolio_skin_meta_boxes);
}

function porto_add_portfolio_meta_box() {
    global $porto_settings;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'portfolio-meta-boxes', __('Portfolio Options', 'porto'), 'porto_portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
        add_meta_box( 'view-meta-boxes', __('View Options', 'porto'), 'porto_portfolio_view_meta_boxes', 'portfolio', 'normal', 'low' );
        if ($porto_settings['show-content-type-skin']) {
            add_meta_box( 'skin-meta-boxes', __('Skin Options', 'porto'), 'porto_portfolio_skin_meta_boxes', 'portfolio', 'normal', 'low' );
        }
    }
}

// Save Portfolio Metas        
function porto_portfolio_save_postdata( $post_id ) {
    global $portfolio_meta_boxes;
    
    return porto_save_postdata( $post_id, $portfolio_meta_boxes );
}

// Save Portfolio View Metas
function porto_portfolio_view_save_postdata( $post_id ) {
    global $portfolio_view_meta_boxes;

    return porto_save_postdata( $post_id, $portfolio_view_meta_boxes );
}

// Save Portfolio Skin Metas
function porto_portfolio_skin_save_postdata( $post_id ) {
    global $portfolio_skin_meta_boxes;

    return porto_save_postdata( $post_id, $portfolio_skin_meta_boxes );
}

// Get Portfolio Metas        
function porto_portfolio_get_postdata() {
    global $porto_settings, $portfolio_meta_boxes, $portfolio_view_meta_boxes, $portfolio_skin_meta_boxes, $portfolio_cat_meta_boxes;

    // Slideshow Types
    $slideshow_types = array(
        "images" => __("Images", 'porto'),
        "video" => __("Video & Audio", 'porto'),
        "none" => __("None", 'porto'),
    );

    // Portfolio View Meta Boxes
    $portfolio_view_meta_boxes = porto_ct_default_meta_view_boxes();

    // Layout
    $portfolio_view_meta_boxes['layout']['default'] = 'fullwidth';

    // Sidebar
    $portfolio_view_meta_boxes['sidebar']['default'] = 'portfolio-sidebar';

    // Portfolio Skin Meta Boxes
    $portfolio_skin_meta_boxes = porto_ct_default_meta_skin_boxes();

    // Portfolio Meta Boxes
    $portfolio_meta_boxes = array(
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
        // Visit Site Link
        "portfolio_link" => array(
            "name" => "portfolio_link",
            "title" => __("Portfolio Link", 'porto'),
            "desc" => __("External Link for the Portfolio which adds a <strong>Live Preview</strong> button with the link. Leave blank for post URL.", 'porto'),
            "type" => "text"
        ),
        // Client Name
        "portfolio_client" => array(
            "name" => "portfolio_client",
            "title" => __("Client Name", 'porto'),
            "type" => "text"
        ),
        // Layout
        "portfolio_layout" => array(
            "name" => "portfolio_layout",
            "title" => __("Portfolio Layout", 'porto'),
            "desc" => __("Select the portfolio layout.", 'porto'),
            "type" => "radio",
            "default" => "default",
            "options" => array_merge(
                array(
                    "default" => __("Default", 'porto')
                ),
                porto_ct_portfolio_single_layouts()
            )
        ),
        // Share
        "portfolio_share" => array(
            "name" => "portfolio_share",
            "title" => __("Share", 'porto'),
            "type" => "radio",
            "default" => "",
            "options" => array_merge(
                porto_ct_share_options()
            )
        ),
        // Like Count
        "like_count"=> array(
            "name" => "like_count",
            "title" => __("Like Count", 'porto'),
            "type" => "text",
            "default" => __('0', 'porto')
        ),
    );

    // Category Meta Boxes
    $portfolio_cat_meta_boxes = porto_ct_default_meta_view_boxes();

    // Sidebar
    $portfolio_cat_meta_boxes['sidebar']['default'] = 'portfolio-sidebar';

    // Portfolio Options
    $portfolio_cat_meta_boxes = array_insert_before('breadcrumbs', $portfolio_cat_meta_boxes, "portfolio_options", array(
        "name" => "portfolio_options",
        "title" => __("Portfolio Options", 'porto'),
        "desc" => __("Use selected portfolio options. (<strong>Infinite Scroll, Portfolio Layout, Grid Columns, Grid View Type</strong>)", 'porto'),
        "type" => "checkbox"
    ));

    // Infinite Scroll
    $portfolio_cat_meta_boxes = array_insert_before('breadcrumbs', $portfolio_cat_meta_boxes, "portfolio_infinite", array(
        "name" => "portfolio_infinite",
        "title" => __("Infinite Scroll", 'porto'),
        "desc" => __("Disable infinite scroll.", 'porto'),
        "type" => "checkbox"
    ));

    // Portfolio Layout
    $portfolio_cat_meta_boxes = array_insert_before('breadcrumbs', $portfolio_cat_meta_boxes, "portfolio_layout", array(
        "name" => "portfolio_layout",
        "title" => __("Portfolio Layout", 'porto'),
        "desc" => __("Select the portfolio layout.", 'porto'),
        "type" => "radio",
        "default" => "grid",
        "options" => porto_ct_portfolio_archive_layouts()
    ));
    // Portfolio Grid Columns
    $portfolio_cat_meta_boxes = array_insert_before('breadcrumbs', $portfolio_cat_meta_boxes, "portfolio_grid_columns", array(
        "name" => "portfolio_grid_columns",
        "title" => __("Grid Columns", 'porto'),
        "desc" => __("Select the portfolio columns in <strong>grid layout</strong>.", 'porto'),
        "type" => "radio",
        "default" => "4",
        "options" => array(
            "2" => __("2 Columns", 'porto'),
            "3" => __("3 Columns", 'porto'),
            "4" => __("4 Columns", 'porto'),
            "5" => __("5 Columns", 'porto'),
            "6" => __("6 Columns", 'porto'),
        )
    ));
    // Portfolio Grid View
    $portfolio_cat_meta_boxes = array_insert_before('breadcrumbs', $portfolio_cat_meta_boxes, "portfolio_grid_view", array(
        "name" => "portfolio_grid_view",
        "title" => __("Grid View Type", 'porto'),
        "desc" => __("Select the portfolio view type in <strong>grid layout</strong>.", 'porto'),
        "type" => "radio",
        "default" => "default",
        "options" => array(
            "default" => __("Default", 'porto'),
            "full" => __("Full Width", 'porto')
        )
    ));

    if (isset($porto_settings['show-category-skin']) && $porto_settings['show-category-skin']) {
        $portfolio_cat_meta_boxes = array_merge($portfolio_cat_meta_boxes, porto_ct_default_meta_skin_boxes());
    }
}

add_action('add_meta_boxes', 'porto_add_portfolio_meta_box');
add_action('admin_menu', 'porto_portfolio_get_postdata');
add_action('save_post', 'porto_portfolio_save_postdata');
add_action('save_post', 'porto_portfolio_view_save_postdata');
add_action('save_post', 'porto_portfolio_skin_save_postdata');

// Create Category Meta
global $wpdb;
$type = 'portfolio_cat';
$table_name = $wpdb->prefix . $type . 'meta';
$variable_name = $type . 'meta';
$wpdb->$variable_name = $table_name;

// Create Category Meta Table
create_metadata_table($table_name, $type);

// category meta
add_action( 'portfolio_cat_add_form_fields', 'porto_add_portfolio_cat', 10, 2);
function porto_add_portfolio_cat() {
    global $portfolio_cat_meta_boxes;

    porto_show_tax_add_meta_boxes($portfolio_cat_meta_boxes);
}

add_action( 'portfolio_cat_edit_form_fields', 'porto_edit_portfolio_cat', 10, 2);
function porto_edit_portfolio_cat($tag, $taxonomy) {
    global $portfolio_cat_meta_boxes;

    porto_show_tax_edit_meta_boxes($tag, $taxonomy, $portfolio_cat_meta_boxes);
}

add_action( 'created_term', 'porto_save_portfolio_cat', 10,3 );
add_action( 'edit_term', 'porto_save_portfolio_cat', 10,3 );

function porto_save_portfolio_cat($term_id, $tt_id, $taxonomy) {
    if (!$term_id) return;
    
    global $portfolio_cat_meta_boxes;

    porto_post_get_postdata();
    return porto_save_taxdata( $term_id, $tt_id, $taxonomy, $portfolio_cat_meta_boxes );
}