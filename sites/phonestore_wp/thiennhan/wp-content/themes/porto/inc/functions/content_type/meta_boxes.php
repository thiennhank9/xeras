<?php

function porto_ct_default_meta_view_boxes() {

    $theme_layouts = porto_ct_layouts();
    $sidebar_options = porto_ct_sidebars();
    $banner_pos = porto_ct_banner_pos();
    $banner_type = porto_ct_banner_type();
    $footer_view = porto_ct_footer_view();
    $master_sliders = porto_ct_master_sliders();
    $rev_sliders = porto_ct_rev_sliders();

    // Get menus
    $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
    $menu_options = array();
    if (!empty($menus)) {
        foreach ($menus as $menu) {
            $menu_options[$menu->term_id] = $menu->name;
        }
    }

    return array(
        // Loading Overlay
        "loading_overlay"=> array(
            "name" => "loading_overlay",
            "title" => __("Loading Overlay", 'porto'),
            "type" => "radio",
            "default" => "",
            "options" => array_merge(
                porto_ct_show_options()
            )
        ),
        // Breadcrumbs
        "breadcrumbs"=> array(
            "name" => "breadcrumbs",
            "title" => __("Breadcrumbs", 'porto'),
            "desc" => __("Hide breadcrumbs", 'porto'),
            "type" => "checkbox"
        ),
        // Page Title
        "title" => array(
            "name" => "page_title",
            "title" => __("Page Title", 'porto'),
            "desc" => __("Hide page title", 'porto'),
            "type" => "checkbox"
        ),
        // Header
        "header" => array(
            "name" => "header",
            "title" => __("Header", 'porto'),
            "desc" => __("Hide header", 'porto'),
            "type" => "checkbox"
        ),
        // Footer
        "footer" => array(
            "name" => "footer",
            "title" => __("Footer", 'porto'),
            "desc" => __("Hide footer", 'porto'),
            "type" => "checkbox"
        ),
        // Main Menu
        "main_menu" => array(
            "name" => "main_menu",
            "title" => __("Main Menu", 'porto'),
            "desc" => __("Select the main menu you would like to display.", 'porto'),
            "type" => "select",
            "default" => "",
            "options" => $menu_options
        ),
        // Sidebar Menu
        "sidebar_menu" => array(
            "name" => "sidebar_menu",
            "title" => __("Sidebar Menu", 'porto'),
            "desc" => __("Select the main menu you would like to display.", 'porto'),
            "type" => "select",
            "default" => "",
            "options" => $menu_options
        ),
        // Layout, Sidebar
        "default"=> array(
            "name" => "default",
            "title" => __("Layout & Sidebar", 'porto'),
            "desc" => __("Use selected layout and sidebar", 'porto'),
            "type" => "checkbox"
        ),
        // Layout
        "layout" => array(
            "name" => "layout",
            "title" => __("Layout", 'porto'),
            "desc" => __("Select layout.", 'porto'),
            "type" => "radio",
            "default" => "right-sidebar",
            "options" => $theme_layouts
        ),
        // Sidebar
        "sidebar"=> array(
            "name" => "sidebar",
            "title" => __("Sidebar", 'porto'),
            "desc" => __("Select the sidebar you would like to display. <strong>Note</strong>: You must first create the sidebar under <strong>Appearance > Sidebars</strong>.", 'porto'),
            "type" => "select",
            "default" => "blog-sidebar",
            "options" => $sidebar_options
        ),
        // Banner Position
        "banner_pos"=> array(
            "name" => "banner_pos",
            "title" => __("Banner Position", 'porto'),
            "type" => "radio",
            "default" => "",
            "options" => $banner_pos
        ),
        // Footer View
        "footer_view"=> array(
            "name" => "footer_view",
            "title" => __("Footer View", 'porto'),
            "type" => "radio",
            "default" => "",
            "options" => $footer_view
        ),
        // Banner Type
        "banner_type"=> array(
            "name" => "banner_type",
            "title" => __("Banner Type", 'porto'),
            "type" => "select",
            "options" => $banner_type
        ),
        // Master Slider
        "master_slider"=> array(
            "name" => "master_slider",
            "title" => __("Master Slider", 'porto'),
            "desc" => __("Select the Master Slider.", 'porto'),
            "type" => "select",
            "options" => $master_sliders
        ),
        // Revolution Slider
        "rev_slider"=> array(
            "name" => "rev_slider",
            "title" => __("Revolution Slider", 'porto'),
            "desc" => __("Select the Revolution Slider.", 'porto'),
            "type" => "select",
            "options" => $rev_sliders
        ),
        // Banner
        "banner_block"=> array(
            "name" => "banner_block",
            "title" => __("Banner Block", 'porto'),
            "desc" => __("You should input block slug name. You can create a block in <strong>Blocks/Add New</strong>.", 'porto'),
            "type" => "text"
        ),
        // Content Top
        "content_top"=> array(
            "name" => "content_top",
            "title" => __("Content Top", 'porto'),
            "desc" => __("You should input block slug name. You can create a block in <strong>Blocks/Add New</strong>.", 'porto'),
            "type" => "text"
        ),
        // Content Inner Top
        "content_inner_top"=> array(
            "name" => "content_inner_top",
            "title" => __("Content Inner Top", 'porto'),
            "desc" => __("You should input block slug name. You can create a block in <strong>Blocks/Add New</strong>.", 'porto'),
            "type" => "text"
        ),
        // Content Inner Bottom
        "content_inner_bottom"=> array(
            "name" => "content_inner_bottom",
            "title" => __("Content Inner Bottom", 'porto'),
            "desc" => __("You should input block slug name. You can create a block in <strong>Blocks/Add New</strong>.", 'porto'),
            "type" => "text"
        ),
        // Content Bottom
        "content_bottom"=> array(
            "name" => "content_bottom",
            "title" => __("Content Bottom", 'porto'),
            "desc" => __("You should input block slug name. You can create a block in <strong>Blocks/Add New</strong>.", 'porto'),
            "type" => "text"
        )
    );
}

function porto_ct_default_meta_skin_boxes() {

    $bg_repeat = porto_ct_bg_repeat();
    $bg_size = porto_ct_bg_size();
    $bg_attachment = porto_ct_bg_attachment();
    $bg_position = porto_ct_bg_position();

    return array(
        // Body Background
        "body_bg_color"=> array(
            "name" => "body_bg_color",
            "title" => __("Body Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "body_bg_image"=> array(
            "name" => "body_bg_image",
            "title" => __("Body Background Image", 'porto'),
            "type" => "upload"
        ),
        "body_bg_repeat"=> array(
            "name" => "body_bg_repeat",
            "title" => __("Body Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "body_bg_size"=> array(
            "name" => "body_bg_size",
            "title" => __("Body Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "body_bg_attchment"=> array(
            "name" => "body_bg_attachment",
            "title" => __("Body Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "body_bg_position"=> array(
            "name" => "body_bg_position",
            "title" => __("Body Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Page Content Background
        "page_bg_color"=> array(
            "name" => "page_bg_color",
            "title" => __("Page Content Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "page_bg_image"=> array(
            "name" => "page_bg_image",
            "title" => __("Page Content Background Image", 'porto'),
            "type" => "upload"
        ),
        "page_bg_repeat"=> array(
            "name" => "page_bg_repeat",
            "title" => __("Page Content Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "page_bg_size"=> array(
            "name" => "page_bg_size",
            "title" => __("Page Content Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "page_bg_attchment"=> array(
            "name" => "page_bg_attachment",
            "title" => __("Page Content Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "page_bg_position"=> array(
            "name" => "page_bg_position",
            "title" => __("Page Content Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Content Bottom Widgets Area Background
        "content_bottom_bg_color"=> array(
            "name" => "content_bottom_bg_color",
            "title" => __("Content Bottom Widgets Area Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "content_bottom_bg_image"=> array(
            "name" => "content_bottom_bg_image",
            "title" => __("Content Bottom Widgets Area Background Image", 'porto'),
            "type" => "upload"
        ),
        "content_bottom_bg_repeat"=> array(
            "name" => "content_bottom_bg_repeat",
            "title" => __("Content Bottom Widgets Area Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "content_bottom_bg_size"=> array(
            "name" => "content_bottom_bg_size",
            "title" => __("Content Bottom Widgets Area Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "content_bottom_bg_attchment"=> array(
            "name" => "content_bottom_bg_attchment",
            "title" => __("Content Bottom Widgets Area Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "content_bottom_bg_position"=> array(
            "name" => "content_bottom_bg_position",
            "title" => __("Content Bottom Widgets Area Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Header Background
        "header_bg_color"=> array(
            "name" => "header_bg_color",
            "title" => __("Header Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "header_bg_image"=> array(
            "name" => "header_bg_image",
            "title" => __("Header Background Image", 'porto'),
            "type" => "upload"
        ),
        "header_bg_repeat"=> array(
            "name" => "header_bg_repeat",
            "title" => __("Header Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "header_bg_size"=> array(
            "name" => "header_bg_size",
            "title" => __("Header Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "header_bg_attchment"=> array(
            "name" => "header_bg_attachment",
            "title" => __("Header Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "header_bg_position"=> array(
            "name" => "header_bg_position",
            "title" => __("Header Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Sticky Header Background
        "sticky_header_bg_color"=> array(
            "name" => "sticky_header_bg_color",
            "title" => __("Sticky Header Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "sticky_header_bg_image"=> array(
            "name" => "sticky_header_bg_image",
            "title" => __("Sticky Header Background Image", 'porto'),
            "type" => "upload"
        ),
        "sticky_header_bg_repeat"=> array(
            "name" => "sticky_header_bg_repeat",
            "title" => __("Sticky Header Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "sticky_header_bg_size"=> array(
            "name" => "sticky_header_bg_size",
            "title" => __("Sticky Header Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "sticky_header_bg_attchment"=> array(
            "name" => "sticky_header_bg_attachment",
            "title" => __("Sticky Header Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "sticky_header_bg_position"=> array(
            "name" => "sticky_header_bg_position",
            "title" => __("Sticky Header Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Footer Top Widget Area Background
        "footer_top_bg_color"=> array(
            "name" => "footer_top_bg_color",
            "title" => __("Footer Top Widget Area Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "footer_top_bg_image"=> array(
            "name" => "footer_top_bg_image",
            "title" => __("Footer Top Widget Area Background Image", 'porto'),
            "type" => "upload"
        ),
        "footer_top_bg_repeat"=> array(
            "name" => "footer_top_bg_repeat",
            "title" => __("Footer Top Widget Area Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "footer_top_bg_size"=> array(
            "name" => "footer_top_bg_size",
            "title" => __("Footer Top Widget Area Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "footer_top_bg_attchment"=> array(
            "name" => "footer_top_bg_attachment",
            "title" => __("Footer Top Widget Area Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "footer_top_bg_position"=> array(
            "name" => "footer_top_bg_position",
            "title" => __("Footer Top Widget Area Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Footer Background
        "footer_bg_color"=> array(
            "name" => "footer_bg_color",
            "title" => __("Footer Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "footer_bg_image"=> array(
            "name" => "footer_bg_image",
            "title" => __("Footer Background Image", 'porto'),
            "type" => "upload"
        ),
        "footer_bg_repeat"=> array(
            "name" => "footer_bg_repeat",
            "title" => __("Footer Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "footer_bg_size"=> array(
            "name" => "footer_bg_size",
            "title" => __("Footer Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "footer_bg_attchment"=> array(
            "name" => "footer_bg_attachment",
            "title" => __("Footer Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "footer_bg_position"=> array(
            "name" => "footer_bg_position",
            "title" => __("Footer Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Footer Bottom Background
        "footer_bottom_bg_color"=> array(
            "name" => "footer_bottom_bg_color",
            "title" => __("Footer Bottom Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "footer_bottom_bg_image"=> array(
            "name" => "footer_bottom_bg_image",
            "title" => __("Footer Bottom Background Image", 'porto'),
            "type" => "upload"
        ),
        "footer_bottom_bg_repeat"=> array(
            "name" => "footer_bottom_bg_repeat",
            "title" => __("Footer Bottom Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "footer_bottom_bg_size"=> array(
            "name" => "footer_bottom_bg_size",
            "title" => __("Footer Bottom Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "footer_bottom_bg_attchment"=> array(
            "name" => "footer_bottom_bg_attachment",
            "title" => __("Footer Bottom Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "footer_bottom_bg_position"=> array(
            "name" => "footer_bottom_bg_position",
            "title" => __("Footer Bottom Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        ),
        // Breadcrumbs Background
        "breadcrumbs_bg_color"=> array(
            "name" => "breadcrumbs_bg_color",
            "title" => __("Breadcrumbs Background Color", 'porto'),
            "type" => "text",
            "desc" => __("You should input hex color(ex: #ffffff) or 'transparent'.", 'porto')
        ),
        "breadcrumbs_bg_image"=> array(
            "name" => "breadcrumbs_bg_image",
            "title" => __("Breadcrumbs Background Image", 'porto'),
            "type" => "upload"
        ),
        "breadcrumbs_bg_repeat"=> array(
            "name" => "breadcrumbs_bg_repeat",
            "title" => __("Breadcrumbs Background Repeat", 'porto'),
            "type" => "select",
            "options" => $bg_repeat
        ),
        "breadcrumbs_bg_size"=> array(
            "name" => "breadcrumbs_bg_size",
            "title" => __("Breadcrumbs Background Size", 'porto'),
            "type" => "select",
            "options" => $bg_size
        ),
        "breadcrumbs_bg_attchment"=> array(
            "name" => "breadcrumbs_bg_attachment",
            "title" => __("Breadcrumbs Background Attachment", 'porto'),
            "type" => "select",
            "options" => $bg_attachment
        ),
        "breadcrumbs_bg_position"=> array(
            "name" => "breadcrumbs_bg_position",
            "title" => __("Breadcrumbs Background Position", 'porto'),
            "type" => "select",
            "options" => $bg_position
        )
    );
}
