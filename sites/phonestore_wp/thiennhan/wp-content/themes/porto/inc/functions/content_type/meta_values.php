<?php

// Function for Content Type, ReducxFramework
function porto_ct_layouts() {
    return array(
        "widewidth" => __("Wide Width", 'porto'),
        "wide-left-sidebar" => __("Wide Left Sidebar", 'porto'),
        "wide-right-sidebar" => __("Wide Right Sidebar", 'porto'),
        "fullwidth" => __("Full Width", 'porto'),
        "left-sidebar" => __("Left Sidebar", 'porto'),
        "right-sidebar" => __("Right Sidebar", 'porto')
    );
}

function porto_ct_post_archive_layouts() {
    return array(
        'full' => __('Full', 'porto'),
        'large' => __('Large', 'porto'),
        'large-alt' => __('Large Alt', 'porto'),
        'medium' => __('Medium', 'porto'),
        'grid' => __('Grid', 'porto'),
        'timeline' => __('Timeline', 'porto')
    );
}

function porto_ct_post_single_layouts() {
    return array(
        'full' => __('Full', 'porto'),
        'large' => __('Large', 'porto'),
        'large-alt' => __('Large Alt', 'porto'),
        'medium' => __('Medium', 'porto')
    );
}

function porto_ct_portfolio_archive_layouts() {
    return array(
        'grid' => __('Grid', 'porto'),
        'timeline' => __('Timeline', 'porto'),
        'full' => __('Full', 'porto'),
        'large' => __('Large', 'porto'),
        'medium' => __('Medium', 'porto')
    );
}

function porto_ct_portfolio_single_layouts() {
    return array(
        'full' => __('Full', 'porto'),
        'large' => __('Large', 'porto'),
        'medium' => __('Medium', 'porto')
    );
}

function porto_ct_sidebars() {
    global $wp_registered_sidebars;

    $sidebar_options = array();
    if (!empty($wp_registered_sidebars)) {
        foreach ($wp_registered_sidebars as $sidebar) {
            $sidebar_options[$sidebar['id']] = $sidebar['name'];
        }
    };

    return $sidebar_options;
}

function porto_ct_banner_pos() {
    return array(
        "" => __("Default", 'porto'),
        "before_header" => __("Before Header", 'porto'),
        "below_header" => __("Below Header", 'porto'),
        "fixed" => __("Fixed", 'porto'),
    );
}

function porto_ct_banner_type() {
    return array(
        "master_slider" => __("Master Slider", 'porto'),
        "rev_slider" => __("Revolution Slider", 'porto'),
        "banner_block" => __("Banner Block", 'porto')
    );
}

function porto_ct_footer_view() {
    return array(
        "" => __("Default", 'porto'),
        "simple" => __("Simple", 'porto'),
        "fixed" => __("Simple and Position Fixed", 'porto')
    );
}

function porto_ct_master_sliders() {
    global $wpdb;

    $table_name = $wpdb->prefix . "masterslider_sliders";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
        $sliders = $wpdb->get_results( "SELECT * FROM $table_name
                                        WHERE status='published'
                                        ORDER BY ID DESC" );

        $master_sliders = array();
        if (!empty($sliders)) {
            foreach($sliders as $slider) {
                $master_sliders[$slider->ID] = '#'.$slider->ID.': '.$slider->title;
            }
        }

        return $master_sliders;
    }

    return null;
}

function porto_ct_rev_sliders() {
    global $wpdb;

    $table_name = $wpdb->prefix . "revslider_sliders";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
        $sliders = $wpdb->get_results('SELECT * FROM '.$table_name);
        $rev_sliders = array();
        if (!empty($sliders)) {
            foreach($sliders as $slider) {
                $rev_sliders[$slider->alias] = '#'.$slider->id.': '.$slider->title;
            }
        }

        return $rev_sliders;
    }

    return null;
}

function porto_ct_related_product_columns() {
    return array(
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6"
    );
}

function porto_ct_product_columns() {
    return array(
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => __("7 (widthout sidebar)", 'porto'),
        "8" => __("8 (widthout sidebar)", 'porto')
    );
}

function porto_ct_category_addlinks_pos() {
    return array(
        "outimage" => __("Out of Image", 'porto'),
        "onimage" => __("On Image", 'porto')
    );
}

function porto_ct_bg_repeat() {
    return array(
        "" => __("Default", 'porto'),
        "no-repeat" => __("No Repeat", 'porto'),
        "repeat" => __("Repeat All", 'porto'),
        "repeat-x" => __("Repeat Horizontally", 'porto'),
        "repeat-y" => __("Repeat Vertically", 'porto'),
        "inherit" => __("Inherit", 'porto'),
    );
}

function porto_ct_bg_size() {
    return array(
        "" => __("Default", 'porto'),
        "inherit" => __("Inherit", 'porto'),
        "cover" => __("Cover", 'porto'),
        "contain" => __("Contain", 'porto'),
    );
}

function porto_ct_bg_attachment() {
    return array(
        "" => __("Default", 'porto'),
        "fixed" => __("Fixed", 'porto'),
        "scroll" => __("Scroll", 'porto'),
        "inherit" => __("Inherit", 'porto'),
    );
}

function porto_ct_bg_position() {
    return array(
        "" => __("Default", 'porto'),
        "left top" => __("Left Top", 'porto'),
        "left center" => __("Left Center", 'porto'),
        "left bottom" => __("Left Bottom", 'porto'),
        "center top" => __("Center Top", 'porto'),
        "center center" => __("Center Center", 'porto'),
        "center bottom" => __("Center Bottom", 'porto'),
        "right top" => __("Right Top", 'porto'),
        "right center" => __("Right Center", 'porto'),
        "right bottom" => __("Right Bottom", 'porto'),
    );
}

function porto_ct_category_view_mode() {
    return array(
        "" => __("Default", 'porto'),
        "grid" => __("Grid", 'porto'),
        "list" => __("List", 'porto')
    );
}

function porto_ct_categories_orderby() {
    return array(
        "id" => __("ID", 'porto'),
        "name" => __("Name", 'porto'),
        "slug" => __("Slug", 'porto'),
        "count" => __("Count", 'porto')
    );
}

function porto_ct_categories_order() {
    return array(
        "asc" => __("Asc", 'porto'),
        "desc" => __("Desc", 'porto')
    );
}

function porto_ct_share_options() {
    return array(
        "" => __("Default", 'porto'),
        "yes" => __("Yes", 'porto'),
        "no" => __("No", 'porto')
    );
}

function porto_ct_show_options() {
    return array(
        "" => __("Default", 'porto'),
        "yes" => __("Show", 'porto'),
        "no" => __("Hide", 'porto')
    );
}