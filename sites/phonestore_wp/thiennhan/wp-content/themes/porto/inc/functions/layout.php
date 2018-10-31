<?php

require_once(porto_functions . '/layout/breadcrumbs.php');
require_once(porto_functions . '/layout/page-title.php');

add_action('wp_head', 'porto_output_skin_options');

function porto_banner($banner_class = '') {
    global $porto_settings;

    $banner_type = porto_get_meta_value('banner_type');
    $master_slider = porto_get_meta_value('master_slider');
    $rev_slider = porto_get_meta_value('rev_slider');
    $banner_block = porto_get_meta_value('banner_block');

    $banner_class .= (porto_get_wrapper_type() != 'boxed' && $porto_settings['banner-wrapper'] == 'boxed') ? ' banner-wrapper-boxed' : '';

    if ($banner_type === 'master_slider' && isset($master_slider)) { ?>

        <div class="banner-container">
            <div id="banner-wrapper" class="<?php echo $banner_class ?>">
                <?php echo do_shortcode('[masterslider id="'.$master_slider.'"]'); ?>
            </div>
        </div>

    <?php } else if ($banner_type === 'rev_slider' && isset($rev_slider)) { ?>

        <div class="banner-container">
            <div id="banner-wrapper" class="<?php echo $banner_class ?>">
                <?php echo do_shortcode('[rev_slider '.$rev_slider.']'); ?>
            </div>
        </div>

    <?php } else if ($banner_type === 'banner_block' && isset($banner_block)) { ?>

        <div class="banner-container">
            <div id="banner-wrapper" class="<?php echo $banner_class ?>">
                <?php echo do_shortcode('[porto_block name="'.$banner_block.'"]'); ?>
            </div>
        </div>

    <?php
    }
}

function porto_currency_switcher() {
    global $porto_settings;

    ob_start();
    if ( !$porto_settings['wcml-switcher'] && has_nav_menu( 'currency_switcher' ) ) :
        wp_nav_menu(array(
            'theme_location' => 'currency_switcher',
            'container' => '',
            'menu_class' => 'currency-switcher mega-menu show-arrow' . ($porto_settings['switcher-effect']?' '.$porto_settings['switcher-effect']:'') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'depth' => 2,
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_top_navwalker
        ));
    endif;

    if ( $porto_settings['wcml-switcher'] && class_exists('WCML_Multi_Currency_Support') ) {
        global $sitepress, $woocommerce_wpml;

        if ( !is_page( get_option( 'woocommerce_myaccount_page_id' ) ) ) {
            $settings = $woocommerce_wpml->get_settings();
            $format = '%symbol% %code%';
            $wc_currencies = get_woocommerce_currencies();
            if (!isset($settings['currencies_order'])) {
                $currencies = $woocommerce_wpml->multi_currency_support->get_currency_codes();
            } else {
                $currencies = $settings['currencies_order'];
            }
            $active_c = '';
            $other_c = '';

            foreach ($currencies as $currency) {
                if ($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ) {
                    $selected = $currency == $woocommerce_wpml->multi_currency_support->get_client_currency() ? ' selected="selected"' : '';
                    $currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),

                    array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);

                    if ($selected) {
                        $active_c .= $currency_format;
                    } else {
                        $other_c .= '<li rel="' . $currency . '" class="menu-item"><h5>' . $currency_format . '</h5></li>';
                    }
                }
            }
            ?>
            <ul id="menu-currency-switcher" class="currency-switcher mega-menu show-arrow<?php echo ($porto_settings['switcher-effect']?' '.$porto_settings['switcher-effect']:'') ?><?php echo ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:'') ?>">
                <li class="menu-item<?php if ($other_c) echo ' has-sub' ?> narrow">
                    <h5><?php echo $active_c ?></h5>
                    <?php if ($other_c) : ?>
                        <div class="popup">
                            <div class="inner">
                                <ul class="sub-menu wcml-switcher">
                                    <?php echo $other_c ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>
            <?php
        }
    }

    return str_replace('&nbsp;', '', ob_get_clean());
}

function porto_mobile_currency_switcher() {
    global $porto_settings;

    ob_start();
    if ( !$porto_settings['wcml-switcher'] && has_nav_menu( 'currency_switcher' ) ) :
        wp_nav_menu(array(
            'theme_location' => 'currency_switcher',
            'container' => '',
            'menu_class' => 'currency-switcher accordion-menu show-arrow',
            'before' => '',
            'after' => '',
            'depth' => 2,
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_accordion_navwalker
        ));
    endif;

    if ( $porto_settings['wcml-switcher'] && class_exists('WCML_Multi_Currency_Support') ) {
        global $sitepress, $woocommerce_wpml;

        if ( !is_page( get_option( 'woocommerce_myaccount_page_id' ) ) ) {
            $settings = $woocommerce_wpml->get_settings();
            $format = '%symbol% %code%';
            $wc_currencies = get_woocommerce_currencies();
            if (!isset($settings['currencies_order'])) {
                $currencies = $woocommerce_wpml->multi_currency_support->get_currency_codes();
            } else {
                $currencies = $settings['currencies_order'];
            }
            $active_c = '';
            $other_c = '';

            foreach ($currencies as $currency) {
                if ($woocommerce_wpml->settings['currency_options'][$currency]['languages'][$sitepress->get_current_language()] == 1 ) {
                    $selected = $currency == $woocommerce_wpml->multi_currency_support->get_client_currency() ? ' selected="selected"' : '';
                    $currency_format = preg_replace(array('#%name%#', '#%symbol%#', '#%code%#'),

                        array($wc_currencies[$currency], get_woocommerce_currency_symbol($currency), $currency), $format);

                    if ($selected) {
                        $active_c .= $currency_format;
                    } else {
                        $other_c .= '<li rel="' . $currency . '" class="menu-item"><h5>' . $currency_format . '</h5></li>';
                    }
                }
            }
            ?>
            <ul id="menu-currency-switcher" class="currency-switcher accordion-menu show-arrow">
                <li class="menu-item<?php if ($other_c) echo ' has-sub' ?> narrow">
                    <h5><?php echo $active_c ?></h5>
                    <?php if ($other_c) : ?>
                        <span class="arrow"></span>
                        <ul class="sub-menu wcml-switcher">
                            <?php echo $other_c ?>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
        <?php
        }
    }

    return str_replace('&nbsp;', '', ob_get_clean());
}

function porto_view_switcher() {
    global $porto_settings;

    ob_start();
    if ( !$porto_settings['wpml-switcher'] && has_nav_menu( 'view_switcher' ) ) :
        wp_nav_menu(array(
            'theme_location' => 'view_switcher',
            'container' => '',
            'menu_class' => 'view-switcher mega-menu show-arrow' . ($porto_settings['switcher-effect']?' '.$porto_settings['switcher-effect']:'') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'depth' => 2,
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_top_navwalker
        ));
    endif;

    if ( $porto_settings['wpml-switcher'] && function_exists('icl_get_languages') ) {
        $languages = icl_get_languages('skip_missing=0&orderby=code');
        if (!empty($languages)) {
            $active_lang = '';
            $other_langs = '';
            foreach ($languages as $l) {
                if (!$l['active']) {
                    $other_langs .= '<li class="menu-item"><a href="'.esc_url($l['url']).'">';
                }
                if ($l['country_flag_url']){
                    if ($l['active']) {
                        $active_lang .= '<span class="flag"><img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" /></span>';
                    } else {
                        $other_langs .= '<span class="flag"><img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" /></span>';
                    }
                }
                if ($l['active']) {
                    $active_lang .= icl_disp_language($l['native_name'], $l['translated_name']);
                } else {
                    $other_langs .= icl_disp_language($l['native_name'], $l['translated_name']);
                }
                if (!$l['active']) {
                    $other_langs .= '</a></li>';
                }
            }
            ?>
            <ul id="menu-view-switcher" class="view-switcher mega-menu show-arrow<?php echo ($porto_settings['switcher-effect']?' '.$porto_settings['switcher-effect']:'') ?><?php echo ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:'') ?>">
                <li class="menu-item<?php if ($other_langs) echo ' has-sub' ?> narrow">
                    <h5><?php echo $active_lang ?></h5>
                    <?php if ($other_langs) : ?>
                    <div class="popup">
                        <div class="inner">
                            <ul class="sub-menu">
                                <?php echo $other_langs ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </li>
            </ul>
            <?php
        }
    }

    return str_replace('&nbsp;', '', ob_get_clean());
}

function porto_mobile_view_switcher() {
    global $porto_settings;

    ob_start();
    if ( !$porto_settings['wpml-switcher'] && has_nav_menu( 'view_switcher' ) ) :
        wp_nav_menu(array(
            'theme_location' => 'view_switcher',
            'container' => '',
            'menu_class' => 'view-switcher accordion-menu show-arrow',
            'before' => '',
            'after' => '',
            'depth' => 2,
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_accordion_navwalker
        ));
    endif;

    if ( $porto_settings['wpml-switcher'] && function_exists('icl_get_languages') ) {
        $languages = icl_get_languages('skip_missing=0&orderby=code');
        if (!empty($languages)) {
            $active_lang = '';
            $other_langs = '';
            foreach ($languages as $l) {
                if (!$l['active']) {
                    $other_langs .= '<li class="menu-item"><a href="'.esc_url($l['url']).'">';
                }
                if ($l['country_flag_url']){
                    if ($l['active']) {
                        $active_lang .= '<span class="flag"><img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" /></span>';
                    } else {
                        $other_langs .= '<span class="flag"><img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'.esc_attr($l['language_code']).'" width="18" /></span>';
                    }
                }
                if ($l['active']) {
                    $active_lang .= icl_disp_language($l['native_name'], $l['translated_name']);
                } else {
                    $other_langs .= icl_disp_language($l['native_name'], $l['translated_name']);
                }
                if (!$l['active']) {
                    $other_langs .= '</a></li>';
                }
            }
            ?>
            <ul id="menu-view-switcher" class="view-switcher accordion-menu show-arrow">
                <li class="menu-item<?php if ($other_langs) echo ' has-sub' ?> narrow">
                    <h5><?php echo $active_lang ?></h5>
                    <?php if ($other_langs) : ?>
                        <span class="arrow"></span>
                        <ul class="sub-menu">
                            <?php echo $other_langs ?>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
        <?php
        }
    }

    return str_replace('&nbsp;', '', ob_get_clean());
}

function porto_top_navigation() {
    global $porto_settings;

    $html = '';
    if (isset($porto_settings['menu-login-pos']) && $porto_settings['menu-login-pos'] == 'top_nav') {
        if (is_user_logged_in()) {
            $logout_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $logout_link = version_compare(porto_get_woo_version_number(), '2.3', '<') ? wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) : wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
            } else {
                $logout_link = wp_logout_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></li>';
        } else {
            $login_link = $register_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $login_link = wc_get_page_permalink( 'myaccount' );
                if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {
                    $register_link = wc_get_page_permalink( 'myaccount' );
                }
            } else {
                $login_link = wp_login_url( get_home_url() );
                $active_signup = get_site_option( 'registration', 'none' );
                $active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
                if ($active_signup != 'none')
                    $register_link = wp_registration_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></li>';
            if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                $html .= '<li class="menu-item"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></li>';
            }
        }
    }

    ob_start();
    if ( has_nav_menu( 'top_nav' ) ) :
        wp_nav_menu(array(
            'theme_location' => 'top_nav',
            'container' => '',
            'menu_class' => 'top-links mega-menu' . ($porto_settings['menu-arrow']?' show-arrow':'') . ($porto_settings['menu-effect']?' '.$porto_settings['menu-effect']:'') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'depth' => 2,
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_top_navwalker
        ));
    endif;

    $output = str_replace('&nbsp;', '', ob_get_clean());

    if ($output && $html) {
        $output = preg_replace('/<\/ul>$/', $html . '</ul>', $output, 1);
    }

    return $output;
}

function porto_mobile_top_navigation() {
    global $porto_settings;

    $html = '';
    if (isset($porto_settings['menu-login-pos']) && $porto_settings['menu-login-pos'] == 'top_nav') {
        if (is_user_logged_in()) {
            $logout_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $logout_link = version_compare(porto_get_woo_version_number(), '2.3', '<') ? wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) : wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
            } else {
                $logout_link = wp_logout_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></li>';
        } else {
            $login_link = $register_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $login_link = wc_get_page_permalink( 'myaccount' );
                if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {
                    $register_link = wc_get_page_permalink( 'myaccount' );
                }
            } else {
                $login_link = wp_login_url( get_home_url() );
                $active_signup = get_site_option( 'registration', 'none' );
                $active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
                if ($active_signup != 'none')
                    $register_link = wp_registration_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></li>';
            if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                $html .= '<li class="menu-item"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></li>';
            }
        }
    }

    ob_start();
    if ( has_nav_menu( 'top_nav' ) ) :
        wp_nav_menu(array(
            'theme_location' => 'top_nav',
            'container' => '',
            'menu_class' => 'top-links accordion-menu' . ($porto_settings['menu-arrow']?' show-arrow':''),
            'before' => '',
            'after' => '',
            'depth' => 2,
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_accordion_navwalker
        ));
    endif;

    $output = str_replace('&nbsp;', '', ob_get_clean());

    if ($output && $html) {
        $output = preg_replace('/<\/ul>$/', $html . '</ul>', $output, 1);
    }

    return $output;
}

function porto_main_menu() {
    global $porto_settings, $porto_layout;

    $header_type = porto_get_header_type();

    $is_home = false;

    if ( is_front_page() && is_home() ) {
        $is_home = true;
    } elseif ( is_front_page() ) {
        $is_home = true;
    }

    if (($header_type == 1 || $header_type == 4 || $header_type == 13 || $header_type == 14) && ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') && $porto_settings['menu-sidebar']) {
        if ($is_home || (!$is_home && !$porto_settings['menu-sidebar-home']))
            return '';
    }

    $html = '';

    if (isset($porto_settings['menu-login-pos']) && $porto_settings['menu-login-pos'] == 'main_menu') {
        if (is_user_logged_in()) {
            $logout_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $logout_link = version_compare(porto_get_woo_version_number(), '2.3', '<') ? wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) : wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
            } else {
                $logout_link = wp_logout_url( get_home_url() );
            }

            if (($header_type == 1 || $header_type == 4 || $header_type == 13 || $header_type == 14)) {
                $html .= '<li class="'. ($porto_settings['menu-align'] == 'centered' ? 'inline-menu-item' : (is_rtl() ? 'pull-left' : 'pull-right')).'"><div class="menu-custom-block"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></div></li>';
            } else {
                $html .= '<li class="menu-item"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></li>';
            }
        } else {
            $login_link = $register_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $login_link = wc_get_page_permalink( 'myaccount' );
                if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {
                    $register_link = wc_get_page_permalink( 'myaccount' );
                }
            } else {
                $login_link = wp_login_url( get_home_url() );
                $active_signup = get_site_option( 'registration', 'none' );
                $active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
                if ($active_signup != 'none')
                    $register_link = wp_registration_url( get_home_url() );
            }
            if (($header_type == 1 || $header_type == 4 || $header_type == 13 || $header_type == 14)) {
                if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                    $html .= '<li class="'. ($porto_settings['menu-align'] == 'centered' ? 'inline-menu-item' : (is_rtl() ? 'pull-left' : 'pull-right')).'"><div class="menu-custom-block"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></div></li>';
                }
                $html .= '<li class="'. ($porto_settings['menu-align'] == 'centered' ? 'inline-menu-item' : (is_rtl() ? 'pull-left' : 'pull-right')).'"><div class="menu-custom-block"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></div></li>';
            } else {
                $html .= '<li class="menu-item"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></li>';
                if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                    $html .= '<li class="menu-item"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></li>';
                }
            }
        }
    }

    if ($header_type == 1 || $header_type == 4 || $header_type == 13 || $header_type == 14) {
        if ($porto_settings['menu-block']) {
            $html .= '<li class="'. ($porto_settings['menu-align'] == 'centered' ? 'inline-menu-item' : (is_rtl() ? 'pull-left' : 'pull-right')).'"><div class="menu-custom-block">'.force_balance_tags($porto_settings['menu-block']).'</div></li>';
        }
    }

    ob_start();
    $main_menu = porto_get_meta_value('main_menu');
    if ( has_nav_menu( 'main_menu' ) || $main_menu ) :
        $args = array(
            'container' => '',
            'menu_class' => 'main-menu mega-menu' . ($porto_settings['menu-arrow']?' show-arrow':'') . ($porto_settings['menu-effect']?' '.$porto_settings['menu-effect']:'') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_top_navwalker
        );
        if ($main_menu) {
            $args['menu'] = $main_menu;
        } else {
            $args['theme_location'] = 'main_menu';
        }
        wp_nav_menu($args);
    endif;

    $output = str_replace('&nbsp;', '', ob_get_clean());

    if ($output && $html) {
        $output = preg_replace('/<\/ul>$/', $html . '</ul>', $output, 1);
    }

    return $output;
}

function porto_main_toggle_menu() {
    global $porto_settings, $porto_layout;

    $header_type = porto_get_header_type();

    if ($header_type != 9)
        return porto_main_menu();

    ob_start();
    $main_menu = porto_get_meta_value('main_menu');
    if ( has_nav_menu( 'main_menu' ) || $main_menu ) :
        $args = array(
            'container' => '',
            'menu_class' => 'main-menu sidebar-menu' . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_sidebar_navwalker
        );
        if ($main_menu) {
            $args['menu'] = $main_menu;
        } else {
            $args['theme_location'] = 'main_menu';
        }
        wp_nav_menu($args);
    endif;

    $output = str_replace('&nbsp;', '', ob_get_clean());

    return $output;
}

function porto_header_side_menu() {
    global $porto_settings;

    $output = '';

    $html = '';
    if (isset($porto_settings['menu-login-pos']) && $porto_settings['menu-login-pos'] == 'main_menu') {
        if (is_user_logged_in()) {
            $logout_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $logout_link = version_compare(porto_get_woo_version_number(), '2.3', '<') ? wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) : wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
            } else {
                $logout_link = wp_logout_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></li>';
        } else {
            $login_link = $register_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $login_link = wc_get_page_permalink( 'myaccount' );
                if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {
                    $register_link = wc_get_page_permalink( 'myaccount' );
                }
            } else {
                $login_link = wp_login_url( get_home_url() );
                $active_signup = get_site_option( 'registration', 'none' );
                $active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
                if ($active_signup != 'none')
                    $register_link = wp_registration_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></li>';
            if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                $html .= '<li class="menu-item"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></li>';
            }
        }
    }
    if ($porto_settings['menu-block']) {
        $html .= '<li class="menu-custom-item"><div class="menu-custom-block">'.force_balance_tags($porto_settings['menu-block']).'</div></li>';
    }

    ob_start();
    $main_menu = porto_get_meta_value('main_menu');
    if ( has_nav_menu( 'main_menu' ) || $main_menu ) {
        $args = array(
            'container' => '',
            'menu_class' => 'main-menu sidebar-menu' . ((has_nav_menu( 'sidebar_menu' ) || porto_get_meta_value('sidebar_menu')) ? ' has-side-menu' : '') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_sidebar_navwalker
        );
        if ($main_menu) {
            $args['menu'] = $main_menu;
        } else {
            $args['theme_location'] = 'main_menu';
        }
        wp_nav_menu($args);
    }

    $output .= str_replace('&nbsp;', '', ob_get_clean());

    if ($output && $html) {
        $output = preg_replace('/<\/ul>$/', $html . '</ul>', $output, 1);
    }

    return $output;
}

function porto_sidebar_menu() {
    global $porto_settings, $porto_layout;

    $header_type = porto_get_header_type();

    $is_home = false;
    if ( is_front_page() && is_home() ) {
        $is_home = true;
    } elseif ( is_front_page() ) {
        $is_home = true;
    }

    $output = '';

    $html = '';
    if (!((($header_type == 1 || $header_type == 4 || $header_type == 13 || $header_type == 14) && ($porto_layout == 'wide-left-sidebar' || $porto_layout == 'wide-right-sidebar' || $porto_layout == 'left-sidebar' || $porto_layout == 'right-sidebar') && $porto_settings['menu-sidebar']))) {

    } else if (($header_type == 1 || $header_type == 4 || $header_type == 13 || $header_type == 14) && !$is_home && $porto_settings['menu-sidebar-home']) {

    } else {
        if (isset($porto_settings['menu-login-pos']) && $porto_settings['menu-login-pos'] == 'main_menu') {
            if (is_user_logged_in()) {
                $logout_link = '';
                if ( class_exists( 'WooCommerce' ) ) {
                    $logout_link = version_compare(porto_get_woo_version_number(), '2.3', '<') ? wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) : wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
                } else {
                    $logout_link = wp_logout_url( get_home_url() );
                }
                $html .= '<li class="menu-item"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></li>';
            } else {
                $login_link = $register_link = '';
                if ( class_exists( 'WooCommerce' ) ) {
                    $login_link = wc_get_page_permalink( 'myaccount' );
                    if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {
                        $register_link = wc_get_page_permalink( 'myaccount' );
                    }
                } else {
                    $login_link = wp_login_url( get_home_url() );
                    $active_signup = get_site_option( 'registration', 'none' );
                    $active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
                    if ($active_signup != 'none')
                        $register_link = wp_registration_url( get_home_url() );
                }
                $html .= '<li class="menu-item"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></li>';
                if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                    $html .= '<li class="menu-item"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></li>';
                }
            }
        }
        if ($porto_settings['menu-block']) {
            $html .= '<li class="menu-custom-item"><div class="menu-custom-block">'.force_balance_tags($porto_settings['menu-block']).'</div></li>';
        }

        ob_start();
        $main_menu = porto_get_meta_value('main_menu');
        if ( has_nav_menu( 'main_menu' ) || $main_menu ) {
            $args = array(
                'container' => '',
                'menu_class' => 'main-menu sidebar-menu' . ((has_nav_menu( 'sidebar_menu' ) || porto_get_meta_value('sidebar_menu')) ? ' has-side-menu' : '') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'fallback_cb' => false,
                'walker' => new porto_sidebar_navwalker
            );
            if ($main_menu) {
                $args['menu'] = $main_menu;
            } else {
                $args['theme_location'] = 'main_menu';
            }
            wp_nav_menu($args);
        }

        $output .= str_replace('&nbsp;', '', ob_get_clean());

        if ($output && $html) {
            $output = preg_replace('/<\/ul>$/', $html . '</ul>', $output, 1);
        }
    }

    // sidebar menu
    ob_start();
    $sidebar_menu = porto_get_meta_value('sidebar_menu');
    if ( has_nav_menu( 'sidebar_menu' ) || $sidebar_menu ) {
        $args = array(
            'container' => '',
            'menu_class' => 'sidebar-menu' . ($output ? ' has-main-menu' : '') . ($porto_settings['menu-sub-effect']?' '.$porto_settings['menu-sub-effect']:''),
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_sidebar_navwalker
        );
        if ($sidebar_menu) {
            $args['menu'] = $sidebar_menu;
        } else {
            $args['theme_location'] = 'sidebar_menu';
        }
        wp_nav_menu($args);
    }

    $output .= str_replace('&nbsp;', '', ob_get_clean());
    return $output;
}

function porto_mobile_menu() {
    global $porto_settings;

    $html = '';
    if (isset($porto_settings['menu-login-pos']) && $porto_settings['menu-login-pos'] == 'main_menu') {
        if (is_user_logged_in()) {
            $logout_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $logout_link = version_compare(porto_get_woo_version_number(), '2.3', '<') ? wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) : wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) );
            } else {
                $logout_link = wp_logout_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $logout_link . '"><i class="avatar">' . get_avatar( get_current_user_id(), $size = '24' ) . '</i>' . __('Logout', 'porto') . '</a></li>';
        } else {
            $login_link = $register_link = '';
            if ( class_exists( 'WooCommerce' ) ) {
                $login_link = wc_get_page_permalink( 'myaccount' );
                if (get_option('woocommerce_enable_myaccount_registration') === 'yes') {
                    $register_link = wc_get_page_permalink( 'myaccount' );
                }
            } else {
                $login_link = wp_login_url( get_home_url() );
                $active_signup = get_site_option( 'registration', 'none' );
                $active_signup = apply_filters( 'wpmu_active_signup', $active_signup );
                if ($active_signup != 'none')
                    $register_link = wp_registration_url( get_home_url() );
            }
            $html .= '<li class="menu-item"><a href="' . $login_link . '"><i class="fa fa-user"></i>' . __('Login', 'porto') . '</a></li>';
            if ($register_link && isset($porto_settings['menu-enable-register']) && $porto_settings['menu-enable-register']) {
                $html .= '<li class="menu-item"><a href="' . $register_link . '"><i class="fa fa-user-plus"></i>' . __('Register', 'porto') . '</a></li>';
            }
        }
    }

    ob_start();
    $main_menu = porto_get_meta_value('main_menu');
    if ( has_nav_menu( 'main_menu' ) || $main_menu ) :
        $args = array(
            'container' => '',
            'menu_class' => 'mobile-menu accordion-menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_accordion_navwalker
        );
        if ($main_menu) {
            $args['menu'] = $main_menu;
        } else {
            $args['theme_location'] = 'main_menu';
        }
        wp_nav_menu($args);
    endif;

    $output = str_replace('&nbsp;', '', ob_get_clean());

    // sidebar menu
    ob_start();
    $sidebar_menu = porto_get_meta_value('sidebar_menu');
    if ( has_nav_menu( 'sidebar_menu' ) || $sidebar_menu ) {
        $args = array(
            'container' => '',
            'menu_class' => 'mobile-menu accordion-menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'fallback_cb' => false,
            'walker' => new porto_accordion_navwalker
        );
        if ($sidebar_menu) {
            $args['menu'] = $sidebar_menu;
        } else {
            $args['theme_location'] = 'sidebar_menu';
        }
        wp_nav_menu($args);
    }

    $output .= str_replace('&nbsp;', '', ob_get_clean());

    if ($output && $html) {
        $output = preg_replace('/<\/ul>$/', $html . '</ul>', $output, 1);
    }

    return $output;
}

function porto_search_form() {
    global $porto_settings;

    if (!$porto_settings['show-searchform']) return '';

    ob_start();
    ?>
    <div class="searchform-popup">
        <a class="search-toggle"><i class="fa fa-search"></i></a>
        <?php echo porto_search_form_content(); ?>
    </div>
    <?php
    return ob_get_clean();
}

function porto_search_form_content() {
    global $porto_settings;

    if (!$porto_settings['show-searchform']) return '';

    ob_start();
    if (isset($porto_settings['search-type']) && $porto_settings['search-type'] === 'product' && class_exists( 'WooCommerce' ) && defined('YITH_WCAS')) {
        $wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';
        $wc_get_template( 'yith-woocommerce-ajax-search.php', array(), '', YITH_WCAS_DIR . 'templates/' );
        return;
    }
    ?>
    <form action="<?php echo home_url(); ?>/" method="get"
        class="searchform <?php if (isset($porto_settings['search-type']) && ($porto_settings['search-type'] === 'post' || $porto_settings['search-type'] === 'product' || $porto_settings['search-type'] === 'portfolio') && (isset($porto_settings['search-cats']) && $porto_settings['search-cats'])) echo 'searchform-cats'; ?>">
        <fieldset>
            <span class="text"><input name="s" id="s" type="text" value="<?php echo get_search_query() ?>" placeholder="<?php echo __('Search&hellip;', 'porto'); ?>" autocomplete="off" /></span>
            <?php if (isset($porto_settings['search-type']) && ($porto_settings['search-type'] === 'post' || $porto_settings['search-type'] === 'product' || $porto_settings['search-type'] === 'portfolio')) : ?>
                <input type="hidden" name="post_type" value="<?php echo $porto_settings['search-type'] ?>"/>
                <?php
                if (isset($porto_settings['search-cats']) && $porto_settings['search-cats']) {
                    $args = array(
                        'show_option_all' => __( 'All Categories', 'porto' ),
                        'hierarchical' => 1,
                        'class' => 'cat',
                        'echo' => 1,
                        'value_field' => 'slug',
                        'selected' => 1
                    );
                    if ($porto_settings['search-type'] === 'product' && class_exists('WooCommerce')) {
                        $args['taxonomy'] = 'product_cat';
                        $args['name'] = 'product_cat';
                    }
                    if ($porto_settings['search-type'] === 'portfolio') {
                        $args['taxonomy'] = 'portfolio_cat';
                        $args['name'] = 'portfolio_cat';
                    }
                    wp_dropdown_categories($args);
                }
            endif; ?>
            <span class="button-wrap"><button class="btn btn-special" title="<?php echo __('Search', 'porto'); ?>" type="submit"><i class="fa fa-search"></i></button></span>
        </fieldset>
    </form>
    <?php
    return ob_get_clean();
}

function porto_header_socials() {
    global $porto_settings;

    if (!$porto_settings['show-header-socials']) return '';

    ob_start();
    echo '<div class="share-links">';
    if ($porto_settings['header-social-facebook']) :
        ?><a target="_blank" class="share-facebook" href="<?php echo esc_url($porto_settings['header-social-facebook']) ?>" title="<?php _e('Facebook', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-twitter']) :
        ?><a target="_blank" class="share-twitter" href="<?php echo esc_url($porto_settings['header-social-twitter']) ?>" title="<?php _e('Twitter', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-rss']) :
        ?><a target="_blank" class="share-rss" href="<?php echo esc_url($porto_settings['header-social-rss']) ?>" title="<?php _e('RSS', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-pinterest']) :
        ?><a target="_blank" class="share-pinterest" href="<?php echo esc_url($porto_settings['header-social-pinterest']) ?>" title="<?php _e('Pinterest', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-youtube']) :
        ?><a target="_blank" class="share-youtube" href="<?php echo esc_url($porto_settings['header-social-youtube']) ?>" title="<?php _e('Youtube', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-instagram']) :
        ?><a target="_blank" class="share-instagram" href="<?php echo esc_url($porto_settings['header-social-instagram']) ?>" title="<?php _e('Instagram', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-skype']) :
        ?><a target="_blank" class="share-skype" href="<?php echo esc_url($porto_settings['header-social-skype']) ?>" title="<?php _e('Skype', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-linkedin']) :
        ?><a target="_blank" class="share-linkedin" href="<?php echo esc_url($porto_settings['header-social-linkedin']) ?>" title="<?php _e('LinkedIn', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-googleplus']) :
        ?><a target="_blank" class="share-googleplus" href="<?php echo esc_url($porto_settings['header-social-googleplus']) ?>" title="<?php _e('Google Plus', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-vk']) :
        ?><a target="_blank" class="share-vk" href="<?php echo esc_url($porto_settings['header-social-vk']) ?>" title="<?php _e('VK', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-xing']) :
        ?><a target="_blank" class="share-xing" href="<?php echo esc_url($porto_settings['header-social-xing']) ?>" title="<?php _e('Xing', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-tumblr']) :
        ?><a target="_blank" class="share-tumblr" href="<?php echo esc_url($porto_settings['header-social-tumblr']) ?>" title="<?php _e('Tumblr', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-reddit']) :
        ?><a target="_blank" class="share-reddit" href="<?php echo esc_url($porto_settings['header-social-reddit']) ?>" title="<?php _e('Reddit', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-vimeo']) :
        ?><a target="_blank" class="share-vimeo" href="<?php echo esc_url($porto_settings['header-social-vimeo']) ?>" title="<?php _e('Vimeo', 'porto') ?>"></a><?php
    endif;

    if ($porto_settings['header-social-whatsapp']) :
        ?><a target="_blank" class="share-whatsapp" style="display:none" href="whatsapp://send?text=<?php echo esc_url($porto_settings['header-social-whatsapp']) ?>" title="<?php echo __('WhatsApp', 'porto') ?>"><?php echo __('WhatsApp', 'porto') ?></a><?php
    endif;

    echo '</div>';

    return ob_get_clean();
}

function porto_minicart() {
    global $woocommerce, $porto_settings;

    if (!$porto_settings['show-minicart']) return '';

    if ($porto_settings['catalog-enable']) {
        if ($porto_settings['catalog-admin'] || (!$porto_settings['catalog-admin'] && !(current_user_can( 'administrator' ) && is_user_logged_in())) ) {
            if (!$porto_settings['catalog-cart']) {
                return '';
            }
        }
    }

    $minicart_type = porto_get_minicart_type();

    ob_start();
    if ( class_exists( 'WooCommerce' ) ) :
        ?>
        <div id="mini-cart" class="dropdown mini-cart <?php echo $minicart_type ?><?php echo ($porto_settings['minicart-effect']?' '.$porto_settings['minicart-effect']:'') ?>">
            <div class="dropdown-toggle cart-head <?php echo str_replace('minicart-icon', 'cart-head', $porto_settings['minicart-icon']) ?>" data-toggle="dropdown" data-delay="50" data-close-others="false">
                <i class="minicart-icon <?php echo $porto_settings['minicart-icon'] ?>"></i>
                <?php if (defined('WP_CACHE') && WP_CACHE) :
                    $_cartQty = '<i class="fa fa-spinner fa-pulse"></i>';
                    ?>
                    <span class="cart-items"><?php echo ($minicart_type == 'minicart-inline')
                            ? '<span class="mobile-hide">' . $_cartQty . '</span><span class="mobile-show">' . $_cartQty . '</span>' : $_cartQty; ?></span>
                <?php else :
                    $_cartQty = $woocommerce->cart->cart_contents_count;
                    ?>
                    <span class="cart-items"><?php echo ($minicart_type == 'minicart-inline')
                            ? '<span class="mobile-hide">' . sprintf( _n( '%d item', '%d items', $_cartQty, 'porto' ), $_cartQty ) . '</span><span class="mobile-show">' . $_cartQty . '</span>'
                            : (($_cartQty > 0) ? $_cartQty : '0'); ?></span>
                <?php endif; ?>
            </div>
            <div class="dropdown-menu cart-popup widget_shopping_cart">
                <div class="widget_shopping_cart_content">
                    <div class="cart-loading"></div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: theme.ajax_url,
                        data: { action: "porto_refresh_cart_fragment" },
                        success: function( response ) {
                            var fragments = response.fragments;
                            var cart_hash = response.cart_hash;

                            if ( fragments ) {
                                $.each(fragments, function(key, value) {
                                    $(key).replaceWith(value);
                                });
                            }
                            $( 'body' ).trigger( 'wc_fragments_loaded' );
                        }
                    });
                });
            </script>
        </div>
    <?php
    endif;

    return ob_get_clean();
}

function porto_get_wrapper_type() {
    global $porto_settings;

    return $porto_settings['wrapper'];
}

function porto_get_header_type() {
    global $porto_settings;

    return $porto_settings['header-type'];
}

function porto_get_minicart_type() {
    global $porto_settings;

    $header_type = porto_get_header_type();
    return ($header_type == 'side' || $header_type >= 10) ? 'minicart-inline' : $porto_settings['minicart-type'];
}

function porto_get_blog_id() {
    global $porto_settings;

    return get_current_blog_id();
}

function porto_is_dark_skin() {
    global $porto_settings;

    return (isset($porto_settings['css-type']) && $porto_settings['css-type'] == 'dark');
}

function porto_blueimp_gallery_html() {
?>
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-start-slideshow="true" data-filter=":even">
        <div class="slides"></div>
        <h3 class="title">&nbsp;</h3>
        <a class="prev"></a>
        <a class="next"></a>
        <a class="close"></a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
<?php
}

add_filter('masterslider_layer_shortcode', 'porto_master_slider_iframe', 10, 4);

function porto_master_slider_iframe($layer, $merged, $atts, $content) {
    return str_replace('<iframe', '<iframe frameborder="0"', $layer);
}

function porto_render_rich_snippets( $title_tag = true, $author_tag = true, $updated_tag = true ) {

    global $porto_settings;

    if (isset($porto_settings['rich-snippets']) && $porto_settings['rich-snippets']) {
        if ($title_tag) {
            echo '<span class="entry-title" style="display: none;">' . get_the_title() . '</span>';
        }
        if ($author_tag) {
            echo '<span class="vcard" style="display: none;"><span class="fn">';
            the_author_posts_link();
            echo '</span></span>';
        }
        if ($updated_tag) {
            echo '<span class="updated" style="display:none">' . get_the_modified_time('c') . '</span>';
        }
    }

}

function porto_get_button_style() {
    global $porto_settings;

    return isset($porto_settings['button-style']) ? $porto_settings['button-style'] : '';
}

function porto_print_button_style() {
    global $porto_settings;

    echo isset($porto_settings['button-style']) ? $porto_settings['button-style'] : '';
}

function porto_output_skin_options() {

    global $porto_settings;

    // Skin
    $body_bg_color = porto_get_meta_value('body_bg_color');
    $body_bg_image = porto_get_meta_value('body_bg_image');
    $body_bg_repeat = porto_get_meta_value('body_bg_repeat');
    $body_bg_size = porto_get_meta_value('body_bg_size');
    $body_bg_attachment = porto_get_meta_value('body_bg_attachment');
    $body_bg_position = porto_get_meta_value('body_bg_position');

    $page_bg_color = porto_get_meta_value('page_bg_color');
    $page_bg_image = porto_get_meta_value('page_bg_image');
    $page_bg_repeat = porto_get_meta_value('page_bg_repeat');
    $page_bg_size = porto_get_meta_value('page_bg_size');
    $page_bg_attachment = porto_get_meta_value('page_bg_attachment');
    $page_bg_position = porto_get_meta_value('page_bg_position');

    $content_bottom_bg_color = porto_get_meta_value('content_bottom_bg_color');
    $content_bottom_bg_image = porto_get_meta_value('content_bottom_bg_image');
    $content_bottom_bg_repeat = porto_get_meta_value('content_bottom_bg_repeat');
    $content_bottom_bg_size = porto_get_meta_value('content_bottom_bg_size');
    $content_bottom_bg_attachment = porto_get_meta_value('content_bottom_bg_attachment');
    $content_bottom_bg_position = porto_get_meta_value('content_bottom_bg_position');

    $header_bg_color = porto_get_meta_value('header_bg_color');
    $header_bg_image = porto_get_meta_value('header_bg_image');
    $header_bg_repeat = porto_get_meta_value('header_bg_repeat');
    $header_bg_size = porto_get_meta_value('header_bg_size');
    $header_bg_attachment = porto_get_meta_value('header_bg_attachment');
    $header_bg_position = porto_get_meta_value('header_bg_position');

    $sticky_header_bg_color = porto_get_meta_value('sticky_header_bg_color');
    $sticky_header_bg_image = porto_get_meta_value('sticky_header_bg_image');
    $sticky_header_bg_repeat = porto_get_meta_value('sticky_header_bg_repeat');
    $sticky_header_bg_size = porto_get_meta_value('sticky_header_bg_size');
    $sticky_header_bg_attachment = porto_get_meta_value('sticky_header_bg_attachment');
    $sticky_header_bg_position = porto_get_meta_value('sticky_header_bg_position');

    $footer_top_bg_color = porto_get_meta_value('footer_top_bg_color');
    $footer_top_bg_image = porto_get_meta_value('footer_top_bg_image');
    $footer_top_bg_repeat = porto_get_meta_value('footer_top_bg_repeat');
    $footer_top_bg_size = porto_get_meta_value('footer_top_bg_size');
    $footer_top_bg_attachment = porto_get_meta_value('footer_top_bg_attachment');
    $footer_top_bg_position = porto_get_meta_value('footer_top_bg_position');

    $footer_bg_color = porto_get_meta_value('footer_bg_color');
    $footer_bg_image = porto_get_meta_value('footer_bg_image');
    $footer_bg_repeat = porto_get_meta_value('footer_bg_repeat');
    $footer_bg_size = porto_get_meta_value('footer_bg_size');
    $footer_bg_attachment = porto_get_meta_value('footer_bg_attachment');
    $footer_bg_position = porto_get_meta_value('footer_bg_position');

    $footer_bottom_bg_color = porto_get_meta_value('footer_bottom_bg_color');
    $footer_bottom_bg_image = porto_get_meta_value('footer_bottom_bg_image');
    $footer_bottom_bg_repeat = porto_get_meta_value('footer_bottom_bg_repeat');
    $footer_bottom_bg_size = porto_get_meta_value('footer_bottom_bg_size');
    $footer_bottom_bg_attachment = porto_get_meta_value('footer_bottom_bg_attachment');
    $footer_bottom_bg_position = porto_get_meta_value('footer_bottom_bg_position');

    $breadcrumbs_bg_color = porto_get_meta_value('breadcrumbs_bg_color');
    $breadcrumbs_bg_image = porto_get_meta_value('breadcrumbs_bg_image');
    $breadcrumbs_bg_repeat = porto_get_meta_value('breadcrumbs_bg_repeat');
    $breadcrumbs_bg_size = porto_get_meta_value('breadcrumbs_bg_size');
    $breadcrumbs_bg_attachment = porto_get_meta_value('breadcrumbs_bg_attachment');
    $breadcrumbs_bg_position = porto_get_meta_value('breadcrumbs_bg_position');

    if ($body_bg_color || $body_bg_image || $body_bg_repeat || $body_bg_size || $body_bg_attachment || $body_bg_position
        || $page_bg_color || $page_bg_image || $page_bg_repeat || $page_bg_size || $page_bg_attachment || $page_bg_position
        || $content_bottom_bg_color || $content_bottom_bg_image || $content_bottom_bg_repeat || $content_bottom_bg_size || $content_bottom_bg_attachment || $content_bottom_bg_position
        || $header_bg_color || $header_bg_image || $header_bg_repeat || $header_bg_size || $header_bg_attachment || $header_bg_position
        || $sticky_header_bg_color || $sticky_header_bg_image || $sticky_header_bg_repeat || $sticky_header_bg_size || $sticky_header_bg_attachment || $sticky_header_bg_position
        || $footer_top_bg_color || $footer_top_bg_image || $footer_top_bg_repeat || $footer_top_bg_size || $footer_top_bg_attachment || $footer_top_bg_position
        || $footer_bg_color || $footer_bg_image || $footer_bg_repeat || $footer_bg_size || $footer_bg_attachment || $footer_bg_position
        || $footer_bottom_bg_color || $footer_bottom_bg_image || $footer_bottom_bg_repeat || $footer_bottom_bg_size || $footer_bottom_bg_attachment || $footer_bottom_bg_position
        || $breadcrumbs_bg_color || $breadcrumbs_bg_image || $breadcrumbs_bg_repeat || $breadcrumbs_bg_size || $breadcrumbs_bg_attachment || $breadcrumbs_bg_position) : ?>

        <style type="text/css">
            <?php if ($body_bg_color || $body_bg_image || $body_bg_repeat || $body_bg_size || $body_bg_attachment || $body_bg_position) : ?>
            body {
                <?php if ($body_bg_color) : ?>background-color: <?php echo $body_bg_color ?> !important;<?php endif; ?>
                <?php if ($body_bg_image == 'none') : echo 'background-image: none !important'; else : if ($body_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $body_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($body_bg_repeat) : ?>background-repeat: <?php echo $body_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($body_bg_size) : ?>background-size: <?php echo $body_bg_size ?> !important;<?php endif; ?>
                <?php if ($body_bg_attachment) : ?>background-attachment: <?php echo $body_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($body_bg_position) : ?>background-position: <?php echo $body_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($page_bg_color || $page_bg_image || $page_bg_repeat || $page_bg_size || $page_bg_attachment || $page_bg_position) : ?>
            #main {
                <?php if ($page_bg_color) : ?>background-color: <?php echo $page_bg_color ?> !important;<?php endif; ?>
                <?php if ($page_bg_image == 'none') : echo 'background-image: none !important'; else : if ($page_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $page_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($page_bg_repeat) : ?>background-repeat: <?php echo $page_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($page_bg_size) : ?>background-size: <?php echo $page_bg_size ?> !important;<?php endif; ?>
                <?php if ($page_bg_attachment) : ?>background-attachment: <?php echo $page_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($page_bg_position) : ?>background-position: <?php echo $page_bg_position ?> !important;<?php endif; ?>
            }
            <?php if ($page_bg_color == 'transparent') : ?>
            .page-content {
                margin-left: -<?php echo $porto_settings['grid-gutter-width'] / 2 ?>px;
                margin-right: -<?php echo $porto_settings['grid-gutter-width'] / 2 ?>px;
            }
            .main-content {
                padding-bottom: 0 !important;
            }
            .left-sidebar,
            .right-sidebar,
            .wide-left-sidebar,
            .wide-right-sidebar {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                margin: 0;
            }
            <?php endif; ?>
            <?php endif; ?>
            <?php if ($content_bottom_bg_color || $content_bottom_bg_image || $content_bottom_bg_repeat || $content_bottom_bg_size || $content_bottom_bg_attachment || $content_bottom_bg_position) : ?>
            #main .content-bottom-wrapper {
                <?php if ($content_bottom_bg_color) : ?>background-color: <?php echo $content_bottom_bg_color ?> !important;<?php endif; ?>
                <?php if ($content_bottom_bg_image == 'none') : echo 'background-image: none !important'; else : if ($content_bottom_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $content_bottom_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($content_bottom_bg_repeat) : ?>background-repeat: <?php echo $content_bottom_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($content_bottom_bg_size) : ?>background-size: <?php echo $content_bottom_bg_size ?> !important;<?php endif; ?>
                <?php if ($content_bottom_bg_attachment) : ?>background-attachment: <?php echo $content_bottom_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($content_bottom_bg_position) : ?>background-position: <?php echo $content_bottom_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($header_bg_color || $header_bg_image || $header_bg_repeat || $header_bg_size || $header_bg_attachment || $header_bg_position) : ?>
            #header,
            .fixed-header #header {
                <?php if ($header_bg_color) : ?>background-color: <?php echo $header_bg_color ?> !important;<?php endif; ?>
                <?php if ($header_bg_image == 'none') : echo 'background-image: none !important'; else : if ($header_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $header_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($header_bg_repeat) : ?>background-repeat: <?php echo $header_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($header_bg_size) : ?>background-size: <?php echo $header_bg_size ?> !important;<?php endif; ?>
                <?php if ($header_bg_attachment) : ?>background-attachment: <?php echo $header_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($header_bg_position) : ?>background-position: <?php echo $header_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($sticky_header_bg_color || $sticky_header_bg_image || $sticky_header_bg_repeat || $sticky_header_bg_size || $sticky_header_bg_attachment || $sticky_header_bg_position) : ?>
            #header.sticky-header,
            .fixed-header #header.sticky-header {
                <?php if ($sticky_header_bg_color) : ?>background-color: <?php echo $sticky_header_bg_color ?> !important;<?php endif; ?>
                <?php if ($sticky_header_bg_image == 'none') : echo 'background-image: none !important'; else : if ($sticky_header_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $sticky_header_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($sticky_header_bg_repeat) : ?>background-repeat: <?php echo $sticky_header_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($sticky_header_bg_size) : ?>background-size: <?php echo $sticky_header_bg_size ?> !important;<?php endif; ?>
                <?php if ($sticky_header_bg_attachment) : ?>background-attachment: <?php echo $sticky_header_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($sticky_header_bg_position) : ?>background-position: <?php echo $sticky_header_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($footer_top_bg_color || $footer_top_bg_image || $footer_top_bg_repeat || $footer_top_bg_size || $footer_top_bg_attachment || $footer_top_bg_position) : ?>
            .footer-top {
                <?php if ($footer_top_bg_color) : ?>background-color: <?php echo $footer_top_bg_color ?> !important;<?php endif; ?>
                <?php if ($footer_top_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_top_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_top_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($footer_top_bg_repeat) : ?>background-repeat: <?php echo $footer_top_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($footer_top_bg_size) : ?>background-size: <?php echo $footer_top_bg_size ?> !important;<?php endif; ?>
                <?php if ($footer_top_bg_attachment) : ?>background-attachment: <?php echo $footer_top_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($footer_top_bg_position) : ?>background-position: <?php echo $footer_top_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($footer_bg_color || $footer_bg_image || $footer_bg_repeat || $footer_bg_size || $footer_bg_attachment || $footer_bg_position) : ?>
            #footer {
                <?php if ($footer_bg_color) : ?>background-color: <?php echo $footer_bg_color ?> !important;<?php endif; ?>
                <?php if ($footer_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($footer_bg_repeat) : ?>background-repeat: <?php echo $footer_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($footer_bg_size) : ?>background-size: <?php echo $footer_bg_size ?> !important;<?php endif; ?>
                <?php if ($footer_bg_attachment) : ?>background-attachment: <?php echo $footer_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($footer_bg_position) : ?>background-position: <?php echo $footer_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($footer_bottom_bg_color || $footer_bottom_bg_image || $footer_bottom_bg_repeat || $footer_bottom_bg_size || $footer_bottom_bg_attachment || $footer_bottom_bg_position) : ?>
            #footer .footer-bottom,
            .footer-wrapper.fixed #footer .footer-bottom {
                <?php if ($footer_bottom_bg_color) : ?>background-color: <?php echo $footer_bottom_bg_color ?> !important;<?php endif; ?>
                <?php if ($footer_bottom_bg_image == 'none') : echo 'background-image: none !important'; else : if ($footer_bottom_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $footer_bottom_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($footer_bottom_bg_repeat) : ?>background-repeat: <?php echo $footer_bottom_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($footer_bottom_bg_size) : ?>background-size: <?php echo $footer_bottom_bg_size ?> !important;<?php endif; ?>
                <?php if ($footer_bottom_bg_attachment) : ?>background-attachment: <?php echo $footer_bottom_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($footer_bottom_bg_position) : ?>background-position: <?php echo $footer_bottom_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
            <?php if ($breadcrumbs_bg_color || $breadcrumbs_bg_image || $breadcrumbs_bg_repeat || $breadcrumbs_bg_size || $breadcrumbs_bg_attachment || $breadcrumbs_bg_position) : ?>
            .page-top {
                <?php if ($breadcrumbs_bg_color) : ?>background-color: <?php echo $breadcrumbs_bg_color ?> !important;<?php endif; ?>
                <?php if ($breadcrumbs_bg_image == 'none') : echo 'background-image: none !important'; else : if ($breadcrumbs_bg_image) : ?>background-image: url('<?php echo esc_url(str_replace(array('http://', 'https://'), array('//', '//'), $breadcrumbs_bg_image)) ?>') !important;<?php endif; endif; ?>
                <?php if ($breadcrumbs_bg_repeat) : ?>background-repeat: <?php echo $breadcrumbs_bg_repeat ?> !important;<?php endif; ?>
                <?php if ($breadcrumbs_bg_size) : ?>background-size: <?php echo $breadcrumbs_bg_size ?> !important;<?php endif; ?>
                <?php if ($breadcrumbs_bg_attachment) : ?>background-attachment: <?php echo $breadcrumbs_bg_attachment ?> !important;<?php endif; ?>
                <?php if ($breadcrumbs_bg_position) : ?>background-position: <?php echo $breadcrumbs_bg_position ?> !important;<?php endif; ?>
            }
            <?php endif; ?>
        </style>

    <?php endif;
}

