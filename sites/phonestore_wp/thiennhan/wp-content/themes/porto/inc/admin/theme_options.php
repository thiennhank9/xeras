<?php

/**
 * Porto Theme Options
 */

require_once( porto_admin . '/functions.php' );

// include redux framework core functions
require_once( porto_admin . '/ReduxCore/framework.php' );

// porto theme settings options
require_once( porto_admin . '/porto/settings.php' );

require_once( porto_admin . '/porto/save_settings.php' );

if (get_option('porto_init_theme', '0') != '1') {
    porto_check_theme_options();
}
