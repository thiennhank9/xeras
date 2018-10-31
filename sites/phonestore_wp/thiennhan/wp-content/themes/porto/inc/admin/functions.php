<?php

function porto_check_theme_options() {
    // check default options
    global $porto_settings;

    ob_start();
    include(porto_admin . '/porto/default_options.php');
    $options = ob_get_clean();
    $porto_default_settings = json_decode($options, true);

    foreach ($porto_default_settings as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                if (!isset($porto_settings[$key][$key1]) || !$porto_settings[$key][$key1]) {
                    $porto_settings[$key][$key1] = $porto_default_settings[$key][$key1];
                }
            }
        } else {
            if (!isset($porto_settings[$key])) {
                $porto_settings[$key] = $porto_default_settings[$key];
            }
        }
    }

    return $porto_settings;
}

function porto_options_sidebars() {
    return array(
        'wide-left-sidebar',
        'wide-right-sidebar',
        'left-sidebar',
        'right-sidebar'
    );
}

function porto_options_body_wrapper() {
    return array(
        'wide' => array('alt' => __('Wide', 'porto'), 'img' => porto_options_uri.'/layouts/body_wide.jpg'),
        'full' => array('alt' => __('Full', 'porto'), 'img' => porto_options_uri.'/layouts/body_full.jpg'),
        'boxed' => array('alt' => __('Boxed', 'porto'), 'img' => porto_options_uri.'/layouts/body_boxed.jpg'),
    );
}

function porto_options_layouts() {
    return array(
        "widewidth" => array('alt' => __('Wide Width', 'porto'), 'img' => porto_options_uri.'/layouts/page_wide.jpg'),
        "wide-left-sidebar" => array('alt' => __('Wide Left Sidebar', 'porto'), 'img' => porto_options_uri.'/layouts/page_wide_left.jpg'),
        "wide-right-sidebar" => array('alt' => __('Wide Right Sidebar', 'porto'), 'img' => porto_options_uri.'/layouts/page_wide_right.jpg'),
        "fullwidth" => array('alt' => __('Full Width', 'porto'), 'img' => porto_options_uri.'/layouts/page_full.jpg'),
        "left-sidebar" => array('alt' => __("Left Sidebar", 'porto'), 'img' => porto_options_uri.'/layouts/page_full_left.jpg'),
        "right-sidebar" => array('alt' => __("Right Sidebar", 'porto'), 'img' => porto_options_uri.'/layouts/page_full_right.jpg')
    );
}

function porto_options_wrapper() {
    return array(
        'wide' => array('alt' => __('Wide', 'porto'), 'img' => porto_options_uri.'/layouts/content_wide.jpg'),
        'full' => array('alt' => __('Full', 'porto'), 'img' => porto_options_uri.'/layouts/content_full.jpg'),
        'boxed' => array('alt' => __('Boxed', 'porto'), 'img' => porto_options_uri.'/layouts/content_boxed.jpg'),
    );
}

function porto_options_banner_wrapper() {
    return array(
        'wide' => array('alt' => __('Wide', 'porto'), 'img' => porto_options_uri.'/layouts/content_wide.jpg'),
        'boxed' => array('alt' => __('Boxed', 'porto'), 'img' => porto_options_uri.'/layouts/content_boxed.jpg'),
    );
}

function porto_options_header_types() {
    return array(
        '1' => array('alt' => __('Header Type 1', 'porto'), 'img' => porto_options_uri.'/headers/header_01.jpg'),
        '2' => array('alt' => __('Header Type 2', 'porto'), 'img' => porto_options_uri.'/headers/header_02.jpg'),
        '3' => array('alt' => __('Header Type 3', 'porto'), 'img' => porto_options_uri.'/headers/header_03.jpg'),
        '4' => array('alt' => __('Header Type 4', 'porto'), 'img' => porto_options_uri.'/headers/header_04.jpg'),
        '5' => array('alt' => __('Header Type 5', 'porto'), 'img' => porto_options_uri.'/headers/header_05.jpg'),
        '6' => array('alt' => __('Header Type 6', 'porto'), 'img' => porto_options_uri.'/headers/header_06.jpg'),
        '7' => array('alt' => __('Header Type 7', 'porto'), 'img' => porto_options_uri.'/headers/header_07.jpg'),
        '8' => array('alt' => __('Header Type 8', 'porto'), 'img' => porto_options_uri.'/headers/header_08.jpg'),
        '9' => array('alt' => __('Header Type 9', 'porto'), 'img' => porto_options_uri.'/headers/header_09.jpg'),
        '10' => array('alt' => __('Header Type 10', 'porto'), 'img' => porto_options_uri.'/headers/header_10.jpg'),
        '11' => array('alt' => __('Header Type 11', 'porto'), 'img' => porto_options_uri.'/headers/header_11.jpg'),
        '12' => array('alt' => __('Header Type 12', 'porto'), 'img' => porto_options_uri.'/headers/header_12.jpg'),
        '13' => array('alt' => __('Header Type 13', 'porto'), 'img' => porto_options_uri.'/headers/header_13.jpg'),
        '14' => array('alt' => __('Header Type 14', 'porto'), 'img' => porto_options_uri.'/headers/header_14.jpg'),
        '15' => array('alt' => __('Header Type 15', 'porto'), 'img' => porto_options_uri.'/headers/header_15.jpg'),
        '16' => array('alt' => __('Header Type 16', 'porto'), 'img' => porto_options_uri.'/headers/header_16.jpg'),
        'side' => array('alt' => __('Header Type(Side Navigation)', 'porto'), 'img' => porto_options_uri.'/headers/header_side.jpg'),



    );
}

function porto_options_footer_types() {
    return array(
        '1' => array('alt' => __('Footer Type 1', 'porto'), 'img' => porto_options_uri.'/footers/footer_01.jpg'),
        '2' => array('alt' => __('Footer Type 2', 'porto'), 'img' => porto_options_uri.'/footers/footer_02.jpg'),
        '3' => array('alt' => __('Footer Type 3', 'porto'), 'img' => porto_options_uri.'/footers/footer_03.jpg')


    );
}

function porto_demo_types() {
    return array(
        '' => array('alt' => __('Default', 'porto'), 'img' => porto_options_uri.'/demos/default.jpg'),
        '_1' => array('alt' => __('Demo 1', 'porto'), 'img' => porto_options_uri.'/demos/demo_01.jpg'),
        '_2' => array('alt' => __('Demo 2', 'porto'), 'img' => porto_options_uri.'/demos/demo_02.jpg'),
        '_3' => array('alt' => __('Demo 3', 'porto'), 'img' => porto_options_uri.'/demos/demo_03.jpg'),
        '_4' => array('alt' => __('Demo 4', 'porto'), 'img' => porto_options_uri.'/demos/demo_04.jpg'),
        '_5' => array('alt' => __('Demo 5', 'porto'), 'img' => porto_options_uri.'/demos/demo_05.jpg'),
        '_6' => array('alt' => __('Demo 6', 'porto'), 'img' => porto_options_uri.'/demos/demo_06.jpg'),
        '_7' => array('alt' => __('Demo 7', 'porto'), 'img' => porto_options_uri.'/demos/demo_07.jpg'),
        '_8' => array('alt' => __('Demo 8', 'porto'), 'img' => porto_options_uri.'/demos/demo_08.jpg'),
        '_9' => array('alt' => __('Demo 9', 'porto'), 'img' => porto_options_uri.'/demos/demo_09.jpg'),
        '_10' => array('alt' => __('Demo 10', 'porto'), 'img' => porto_options_uri.'/demos/demo_10.jpg'),
        '_11' => array('alt' => __('Demo 11', 'porto'), 'img' => porto_options_uri.'/demos/demo_11.jpg'),
        '_12' => array('alt' => __('Demo 12', 'porto'), 'img' => porto_options_uri.'/demos/demo_12.jpg'),
        '_13' => array('alt' => __('Demo 13', 'porto'), 'img' => porto_options_uri.'/demos/demo_13.jpg'),
        '_14' => array('alt' => __('Demo 14', 'porto'), 'img' => porto_options_uri.'/demos/demo_14.jpg'),
        '_15' => array('alt' => __('Demo 15', 'porto'), 'img' => porto_options_uri.'/demos/demo_15.jpg'),
        '_16' => array('alt' => __('Demo 16', 'porto'), 'img' => porto_options_uri.'/demos/demo_16.jpg'),
        '_17' => array('alt' => __('Demo 17', 'porto'), 'img' => porto_options_uri.'/demos/demo_17.jpg'),
        '_18' => array('alt' => __('Demo 18', 'porto'), 'img' => porto_options_uri.'/demos/demo_18.jpg'),
        '_19' => array('alt' => __('Demo 19', 'porto'), 'img' => porto_options_uri.'/demos/demo_19.jpg'),
        '_20' => array('alt' => __('Demo 20', 'porto'), 'img' => porto_options_uri.'/demos/demo_20.jpg'),
        '_21' => array('alt' => __('Demo 21', 'porto'), 'img' => porto_options_uri.'/demos/demo_21.jpg'),
        '_22' => array('alt' => __('Demo 22', 'porto'), 'img' => porto_options_uri.'/demos/demo_22.jpg'),
        '_rtl' => array('alt' => __('RTL Demo', 'porto'), 'img' => porto_options_uri.'/demos/demo_rtl.jpg'),


    );
}

function porto_options_breadcrumbs_types() {
    return array(
        '1' => array('alt' => __('Breadcrumbs Type 1', 'porto'), 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_01.jpg'),
        '2' => array('alt' => __('Breadcrumbs Type 2', 'porto'), 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_02.jpg'),
        '3' => array('alt' => __('Breadcrumbs Type 3', 'porto'), 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_03.jpg'),
        '4' => array('alt' => __('Breadcrumbs Type 4', 'porto'), 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_04.jpg'),
        '5' => array('alt' => __('Breadcrumbs Type 5', 'porto'), 'img' => porto_options_uri.'/breadcrumbs/breadcrumbs_05.jpg'),


    );
}


