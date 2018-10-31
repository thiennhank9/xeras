<?php

/**********************/
/* Wordpress Importer */
/**********************/
$plugin = porto_plugins .'/importer/importer.php';
include $plugin;

/******************************/
/* Include Sidebars Generator */
/******************************/
$plugin = porto_plugins .'/sidebar-generator/sidebar_generator.php';
include $plugin;

/*************************/
/* TGM Plugin Activation */
/*************************/
$plugin = porto_plugins.'/class-tgm-plugin-activation.php';
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) { require_once $plugin; }
add_action( 'tgmpa_register', 'porto_register_required_plugins' );
function porto_register_required_plugins() {

    // disable visual composer automatic update
    global $vc_manager;
    if ( $vc_manager ) {
        $vc_updater = $vc_manager->updater();
        if ($vc_updater)
            remove_filter('upgrader_pre_download', array(&$vc_updater, 'upgradeFilterFromEnvato'));
    }

    // get master slider download url
    add_filter('axiom_plugin_updater_custom_package_download_url', 'porto_axiom_plugin_updater_custom_package_download_url');

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'                     => 'WPBakery Visual Composer',
            'slug'                     => 'js_composer',
            'source'                   => porto_plugins . '/js_composer.zip',
            'required'                 => true,
            'version'                  => '4.7.2'

        ),
        array(
            'name'                     => 'Ultimate Addons for Visual Composer',
            'slug'                     => 'Ultimate_VC_Addons',
            'source'                   => porto_plugins . '/Ultimate_VC_Addons.zip',
            'required'                 => true,
            'version'                  => '3.13.4'

        ),
        array(
            'name'                     => 'Porto Shortcodes',
            'slug'                     => 'porto-shortcodes',
            'source'                   => porto_plugins . '/porto-shortcodes.zip',
            'required'                 => true,
            'version'                  => '1.3.3'
        ),
        array(
            'name'                     => 'Porto Widgets',
            'slug'                     => 'porto-widgets',
            'source'                   => porto_plugins . '/porto-widgets.zip',
            'required'                 => true,
            'version'                  => '1.1.3'
        ),
        array(
            'name'                     => 'Porto Content Types',
            'slug'                     => 'porto-content-types',
            'source'                   => porto_plugins . '/porto-content-types.zip',
            'required'                 => true,
            'version'                  => '1.2.1'
        ),
        array(
            'name'                     => 'Dynamic Featured Image',
            'slug'                     => 'dynamic-featured-image',
            'required'                 => true
        ),
        array(
            'name'                     => 'Master Slider',
            'slug'                     => 'masterslider',
            'source'                   => porto_plugins . '/masterslider.zip',
            'required'                 => true,
            'version'                  => '2.20.3'

        ),
        array(
            'name'                     => 'Woocommerce',
            'slug'                     => 'woocommerce',
            'required'                 => true
        ),
        array(
            'name'                     => 'Regenerate Thumbnails',
            'slug'                     => 'regenerate-thumbnails',
            'required'                 => true
        ),
        array(
            'name'                     => 'Contact Form 7',
            'slug'                     => 'contact-form-7',
            'required'                 => false
        ),
        array(
            'name'                     => 'Really Simple CAPTCHA',
            'slug'                     => 'really-simple-captcha',
            'required'                 => false
        ),
        array(
            'name'                     => 'WP Sitemap Page',
            'slug'                     => 'wp-sitemap-page',
            'required'                 => false
        ),
        array(
            'name'                     => 'Post Type Archive Link',
            'slug'                     => 'post-type-archive-links',
            'required'                 => false
        ),
        array(
            'name'                     => 'Yith Woocommerce Wishlist',
            'slug'                     => 'yith-woocommerce-wishlist',
            'required'                 => false
        ),
        array(
            'name'                     => 'Yith Woocommerce Ajax Navigation',
            'slug'                     => 'yith-woocommerce-ajax-navigation',
            'required'                 => false
        ),
        array(
            'name'                     => 'Yith Woocommerce Ajax Search',
            'slug'                     => 'yith-woocommerce-ajax-search',
            'required'                 => false
        ),
        array(
            'name'                     => 'MailPoet Newsletters',
            'slug'                     => 'wysija-newsletters',
            'required'                 => false
        ),
        array(
            'name'                     => 'Envato Toolkit',
            'slug'                     => 'envato-wordpress-toolkit',
            'source'                   => porto_plugins . '/envato-wordpress-toolkit.zip',
            'required'                 => false,
            'version'                  => '1.7.3'
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'               => 'porto',          // Text domain - likely want to be the same as your theme.
        'default_path'         => '',                          // Default absolute path to pre-packaged plugins
        'menu'                 => 'install-required-plugins',  // Menu slug
        'has_notices'          => true,                        // Show admin notices or not
        'is_automatic'         => false,                       // Automatically activate plugins after installation or not
        'message'              => '',                          // Message to output right before the plugins table
        'strings'              => array(
            'page_title'                               => __( 'Install Required Plugins', 'porto' ),
            'menu_title'                               => __( 'Install Plugins', 'porto' ),
            'installing'                               => __( 'Installing Plugin: %s', 'porto' ), // %1$s = plugin name
            'oops'                                     => __( 'Something went wrong with the plugin API.', 'porto' ),
            'notice_can_install_required'              => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'           => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                    => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'             => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'          => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                   => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                     => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                     => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                             => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                            => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                   => __( 'Return to Required Plugins Installer', 'porto' ),
            'plugin_activated'                         => __( 'Plugin activated successfully.', 'porto' ),
            'complete'                                 => __( 'All plugins installed and activated successfully. %s', 'porto' ), // %1$s = dashboard link
            'nag_type'                                 => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );
}

// disable master slider auto update
add_filter( 'masterslider_disable_auto_update', '__return_true' );

// get masterslider plugin url
function porto_axiom_plugin_updater_custom_package_download_url() {
    return porto_plugins_uri . '/masterslider.zip';
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'porto_vc_set_as_theme' );
function porto_vc_set_as_theme() {
    if (function_exists('vc_set_as_theme'))
        vc_set_as_theme();
}

if (!function_exists('is_plugin_activate'))
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
if ( class_exists( 'WooCommerce' ) ) :
    add_action( 'admin_init', 'porto_include_woo_templates' );

    function porto_include_woo_templates() {
        include_once( WC()->plugin_path() . '/includes/wc-template-functions.php' );
    }
endif;

$ultimate_js = get_option('ultimate_js');
if (!$ultimate_js)
    add_option('ultimate_js', 'disable');

?>