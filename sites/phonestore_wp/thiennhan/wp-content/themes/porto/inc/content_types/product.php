<?php

// Insert Product Meta Boxes
function porto_product_meta_boxes() {
    
    global $product_meta_boxes;

    porto_show_meta_boxes($product_meta_boxes);
}

// Insert View Meta Boxes
function porto_product_view_meta_boxes() {

    global $product_view_meta_boxes;

    porto_show_meta_boxes($product_view_meta_boxes);
}

// Insert Skin Meta Boxes
function porto_product_skin_meta_boxes() {

    global $product_skin_meta_boxes;

    porto_show_meta_boxes($product_skin_meta_boxes);
}
        
function porto_add_product_meta_box() {
    global $porto_settings;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'product-meta-boxes', __('Product Options', 'porto'), 'porto_product_meta_boxes', 'product', 'normal', 'high' );
        add_meta_box( 'view-meta-boxes', __('View Options', 'porto'), 'porto_product_view_meta_boxes', 'product', 'normal', 'low' );
        if ($porto_settings['show-content-type-skin']) {
            add_meta_box( 'skin-meta-boxes', __('Skin Options', 'porto'), 'porto_product_skin_meta_boxes', 'product', 'normal', 'low' );
        }
    }
}

// Save Product Metas        
function porto_product_save_postdata( $post_id ) {
    global $product_meta_boxes;
    
    return porto_save_postdata( $post_id, $product_meta_boxes );
}

// Save View Metas
function porto_product_view_save_postdata( $post_id ) {
    global $product_view_meta_boxes;

    return porto_save_postdata( $post_id, $product_view_meta_boxes );
}

// Save Skin Metas
function porto_product_skin_save_postdata( $post_id ) {
    global $product_skin_meta_boxes;

    return porto_save_postdata( $post_id, $product_skin_meta_boxes );
}

// Get Product Metas
function porto_product_get_postdata() {
    global $porto_settings, $product_meta_boxes, $product_view_meta_boxes, $product_skin_meta_boxes, $product_cat_meta_boxes;
    
    $view_mode = porto_ct_category_view_mode();
    $product_columns = porto_ct_product_columns();
    $addlinks_pos = porto_ct_category_addlinks_pos();

    // Product View Meta Boxes
    $product_view_meta_boxes = porto_ct_default_meta_view_boxes();

    // Sidebar
    $product_view_meta_boxes['sidebar']['default'] = 'woo-product-sidebar';

    // Product Skin Meta Boxes
    $product_skin_meta_boxes = porto_ct_default_meta_skin_boxes();

    $custom_tabs_count = isset($porto_settings['product-custom-tabs-count']) ? $porto_settings['product-custom-tabs-count'] : '2';
    $custom_tabs = array();
    if ($custom_tabs_count) {
        for ($i = 0; $i < $custom_tabs_count; $i++) {
            $index = $i + 1;

            // Custom Tab Title
            $custom_tabs['custom_tab_title'.$index] = array(
                "name" => "custom_tab_title".$index,
                "title" => sprintf( __( 'Custom Tab Title %d', 'porto' ), $index ),
                "desc" => __("Input the custom tab title.", 'porto'),
                "type" => "text"
            );

            // Content Tab Content
            $custom_tabs['custom_tab_content'.$index] = array(
                "name" => "custom_tab_content".$index,
                "title" => sprintf( __( 'Custom Tab Content %d', 'porto' ), $index ),
                "desc" => __("Input the custom tab content.", 'porto'),
                "type" => "editor"
            );
        }
    }

    // Product Meta Boxes
    $product_meta_boxes = array_merge($custom_tabs, array(
        // Share
        "product_share" => array(
            "name" => "product_share",
            "title" => __("Share", 'porto'),
            "type" => "radio",
            "default" => "",
            "options" => array_merge(
                porto_ct_share_options()
            )
        ),
        // Read More Link
        "product_more_link" => array(
            "name" => "product_more_link",
            "title" => __("Read More Link in Catalog Mode", 'porto'),
            "type" => "text"
        ),
    ));
    
    // Category Meta Boxes
    $product_cat_meta_boxes = porto_ct_default_meta_view_boxes();

    // Sidebar
    $product_cat_meta_boxes['sidebar']['default'] = 'woo-category-sidebar';

    // View Mode
    $product_cat_meta_boxes = array_insert_after('sidebar', $product_cat_meta_boxes, "view_mode", array(
        "name" => "view_mode",
        "title" => __("View Mode", 'porto'),
        "type" => "radio",
        "options" => $view_mode
    ));

    // Columns
    $product_cat_meta_boxes = array_insert_after('view_mode', $product_cat_meta_boxes, "product_cols", array(
        "name" => "product_cols",
        "title" => __("Product Columns", 'porto'),
        "type" => "select",
        "options" => $product_columns
    ));

    $product_cat_meta_boxes = array_insert_after('product_cols', $product_cat_meta_boxes, "addlinks_pos", array(
        "name" => "addlinks_pos",
        "title" => __("Add Links Position", 'porto'),
        "desc" => __('Select position of add to cart, add to wishlist, quickview.', 'porto'),
        "type" => "select",
        "options" => $addlinks_pos
    ));

    // Category Image
    $product_cat_meta_boxes = array_insert_after('addlinks_pos', $product_cat_meta_boxes, "category_image", array(
        "name" => "category_image",
        "title" => __("Category Image", 'porto'),
        "type" => "upload"
    ));

    if (isset($porto_settings['show-category-skin']) && $porto_settings['show-category-skin']) {
        $product_cat_meta_boxes = array_merge($product_cat_meta_boxes, porto_ct_default_meta_skin_boxes());
    }
}

add_action('add_meta_boxes', 'porto_add_product_meta_box');
add_action('admin_menu', 'porto_product_get_postdata');
add_action('save_post', 'porto_product_save_postdata');
add_action('save_post', 'porto_product_view_save_postdata');

// Create Product Cat Meta
global $wpdb;
$type = 'product_cat';
$table_name = $wpdb->prefix . $type . 'meta';
$variable_name = $type . 'meta';
$wpdb->$variable_name = $table_name;

// Create Product Cat Meta Table
create_metadata_table($table_name, $type);

// category meta
add_action( 'product_cat_add_form_fields', 'porto_add_product_cat', 10, 2);
function porto_add_product_cat() {
    global $product_cat_meta_boxes;

    porto_show_tax_add_meta_boxes($product_cat_meta_boxes);
}

add_action( 'product_cat_edit_form_fields', 'porto_edit_product_cat', 10, 2);
function porto_edit_product_cat($tag, $taxonomy) {
    global $product_cat_meta_boxes;

    porto_show_tax_edit_meta_boxes($tag, $taxonomy, $product_cat_meta_boxes);
}

add_action( 'created_term', 'porto_save_product_cat', 10,3 );
add_action( 'edit_term', 'porto_save_product_cat', 10,3 );

function porto_save_product_cat($term_id, $tt_id, $taxonomy) {
    if (!$term_id) return;
    
    global $product_cat_meta_boxes;

    porto_product_get_postdata();
    return porto_save_taxdata( $term_id, $tt_id, $taxonomy, $product_cat_meta_boxes );
}
