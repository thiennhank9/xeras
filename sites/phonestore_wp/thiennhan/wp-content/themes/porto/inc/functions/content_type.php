<?php

require_once(porto_functions . '/content_type/portfolio_like.php');
require_once(porto_functions . '/content_type/meta_values.php');
require_once(porto_functions . '/content_type/meta_boxes.php');

function porto_get_meta_value($meta_key, $boolean = false) {
    global $wp_query, $porto_settings;

    $value = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if ($cat) $value = get_metadata('category', $cat->term_id, $meta_key, true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $value = get_post_meta(wc_get_page_id( 'shop' ), $meta_key, true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $value = get_metadata($term->taxonomy, $term->term_id, $meta_key, true);
            }
        }
    } else {
        if (is_singular()) {
            $value = get_post_meta(get_the_id(), $meta_key, true);
        } else {
            if (!is_home() && is_front_page()) {
                if (isset($porto_settings[$meta_key]))
                    $value = $porto_settings[$meta_key];
            } else if (is_home() && !is_front_page()) {
                if (isset($porto_settings['blog-'.$meta_key]))
                    $value = $porto_settings['blog-'.$meta_key];
            } else if (is_home() || is_front_page()) {
                if (isset($porto_settings[$meta_key]))
                    $value = $porto_settings[$meta_key];
            }
        }
    }

    if ($boolean) {
        $value = ($value != $meta_key) ? true : false;
    }

    return $value;
}

function porto_meta_use_default() {
    global $wp_query;

    $value = '';

    if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if ($cat) $value = get_metadata('category', $cat->term_id, 'default', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $value = get_post_meta(wc_get_page_id( 'shop' ), 'default', true);
        } else {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ($term) {
                $value = get_metadata($term->taxonomy, $term->term_id, 'default', true);
            }
        }
    } else {
        if (is_singular()) {
            $value = get_post_meta(get_the_id(), 'default', true);
        }
    }

    return ($value != 'default') ? true : false;
}

function porto_meta_layout() {
    global $wp_query, $porto_settings;

    $value = isset($porto_settings['layout']) ? $porto_settings['layout'] : $porto_settings['layout'];
    $default = porto_meta_use_default();

    if ((class_exists('bbPress') && is_bbpress()) || (class_exists('BuddyPress') && is_buddypress())) {
        $value = $porto_settings['bb-layout'];
    } else if (is_404()) {
        $value = 'fullwidth';
    } else if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if ($default)
            $value = $porto_settings['post-archive-layout'];
        else
            if ($cat) $value = get_metadata('category', $cat->term_id, 'layout', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            if ($default)
                $value = $porto_settings['product-archive-layout'];
            else
                $value = get_post_meta(wc_get_page_id( 'shop' ), 'layout', true);
        } else {
            if (is_post_type_archive('portfolio')) {
                $value = $porto_settings['portfolio-archive-layout'];
            } else if (is_post_type_archive('member')) {
                $value = $porto_settings['member-archive-layout'];
            } else if (is_post_type_archive('faq')) {
                $value = $porto_settings['faq-archive-layout'];
            } else {
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                if ($term) {
                    if ($default) {
                        switch ($term->taxonomy) {
                            case in_array($term->taxonomy, porto_get_taxonomies('portfolio')):
                                $value = $porto_settings['portfolio-archive-layout'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('product')):
                                $value = $porto_settings['product-archive-layout'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('member')):
                                $value = $porto_settings['member-archive-layout'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('faq')):
                                $value = $porto_settings['faq-archive-layout'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('post')):
                                $value = $porto_settings['post-archive-layout'];
                                break;
                            default:
                                $value = $porto_settings['layout'];
                        }
                    } else {
                        $value = get_metadata($term->taxonomy, $term->term_id, 'layout', true);
                    }
                } else if (is_tag()) {
                    $value = $porto_settings['post-archive-layout'];
                }
            }
        }
    } else {
        if (is_singular()) {
            if ($default) {
                switch (get_post_type()) {
                    case 'product':
                        $value = $porto_settings['product-single-layout'];
                        break;
                    case 'portfolio':
                        $value = $porto_settings['portfolio-single-layout'];
                        break;
                    case 'member':
                        $value = $porto_settings['member-single-layout'];
                        break;
                    case 'post':
                        $value = $porto_settings['post-single-layout'];
                        break;
                    default:
                        $value = $porto_settings['layout'];
                }
            } else {
                $value = get_post_meta(get_the_id(), 'layout', true);
            }
        } else {
            if (!is_home() && is_front_page()) {
                $value = $porto_settings['layout'];
            } else if (is_home() && !is_front_page()) {
                $value = $porto_settings['post-archive-layout'];
            } else if (is_home() || is_front_page()) {
                $value = $porto_settings['layout'];
            }
        }
    }

    return $value;
}

function porto_meta_default_layout() {
    global $wp_query, $porto_settings;

    $value = isset($porto_settings['layout']) ? $porto_settings['layout'] : $porto_settings['layout'];

    if ((class_exists('bbPress') && is_bbpress()) || (class_exists('BuddyPress') && is_buddypress())) {
        $value = $porto_settings['bb-layout'];
    } else if (is_404()) {
        $value = 'fullwidth';
    } else if (is_category()) {
        $value = $porto_settings['post-archive-layout'];
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            $value = $porto_settings['product-archive-layout'];
        } else {
            if (is_post_type_archive('portfolio')) {
                $value = $porto_settings['portfolio-archive-layout'];
            } else if (is_post_type_archive('member')) {
                $value = $porto_settings['member-archive-layout'];
            } else if (is_post_type_archive('faq')) {
                $value = $porto_settings['faq-archive-layout'];
            } else {
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                if ($term) {
                    switch ($term->taxonomy) {
                        case in_array($term->taxonomy, porto_get_taxonomies('portfolio')):
                            $value = $porto_settings['portfolio-archive-layout'];
                            break;
                        case in_array($term->taxonomy, porto_get_taxonomies('product')):
                            $value = $porto_settings['product-archive-layout'];
                            break;
                        case in_array($term->taxonomy, porto_get_taxonomies('member')):
                            $value = $porto_settings['member-archive-layout'];
                            break;
                        case in_array($term->taxonomy, porto_get_taxonomies('faq')):
                            $value = $porto_settings['faq-archive-layout'];
                            break;
                        case in_array($term->taxonomy, porto_get_taxonomies('post')):
                            $value = $porto_settings['post-archive-layout'];
                            break;
                        default:
                            $value = $porto_settings['layout'];
                    }
                } else if (is_tag()) {
                    $value = $porto_settings['post-archive-layout'];
                }
            }
        }
    } else {
        if (is_singular()) {
            switch (get_post_type()) {
                case 'product':
                    $value = $porto_settings['product-single-layout'];
                    break;
                case 'portfolio':
                    $value = $porto_settings['portfolio-single-layout'];
                    break;
                case 'member':
                    $value = $porto_settings['member-single-layout'];
                    break;
                case 'post':
                    $value = $porto_settings['post-single-layout'];
                    break;
                default:
                    $value = $porto_settings['layout'];
            }
        } else {
            if (!is_home() && is_front_page()) {
                $value = $porto_settings['layout'];
            } else if (is_home() && !is_front_page()) {
                $value = $porto_settings['post-archive-layout'];
            } else if (is_home() || is_front_page()) {
                $value = $porto_settings['layout'];
            }
        }
    }

    return $value;
}

function porto_meta_sidebar() {
    global $wp_query, $porto_settings;

    $layout = porto_meta_layout();
    if (!($layout == 'wide-left-sidebar' || $layout == 'wide-right-sidebar' || $layout == 'left-sidebar' || $layout == 'right-sidebar'))
        return '';

    $value = $porto_settings['sidebar'];
    $default = porto_meta_use_default();

    if ((class_exists('bbPress') && is_bbpress()) || (class_exists('BuddyPress') && is_buddypress())) {
        $value = $porto_settings['bb-sidebar'];
    } else if (is_404()) {
        $value = '';
    } else if (is_category()) {
        $cat = $wp_query->get_queried_object();
        if ($default)
            $value = 'blog-sidebar';
        else
            if ($cat) $value = get_metadata('category', $cat->term_id, 'sidebar', true);
    } else if (is_archive()) {
        if (function_exists('is_shop') && is_shop())  {
            if ($default)
                $value = 'woo-category-sidebar';
            else
                $value = get_post_meta(wc_get_page_id( 'shop' ), 'sidebar', true);
        } else {
            if (is_post_type_archive('portfolio')) {
                $value = $porto_settings['portfolio-archive-sidebar'];
            } else if (is_post_type_archive('member')) {
                $value = $porto_settings['member-archive-sidebar'];
            } else if (is_post_type_archive('faq')) {
                $value = $porto_settings['faq-archive-sidebar'];
            } else {
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                if ($term) {
                    if ($default) {
                        switch ($term->taxonomy) {
                            case in_array($term->taxonomy, porto_get_taxonomies('portfolio')):
                                $value = $porto_settings['portfolio-archive-sidebar'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('product')):
                                $value = 'woo-category-sidebar';
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('member')):
                                $value = $porto_settings['member-archive-sidebar'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('faq')):
                                $value = $porto_settings['faq-archive-sidebar'];
                                break;
                            case in_array($term->taxonomy, porto_get_taxonomies('post')):
                                $value = 'blog-sidebar';
                                break;
                            default:
                                $value = $porto_settings['sidebar'];
                        }
                    } else {
                        $value = get_metadata($term->taxonomy, $term->term_id, 'sidebar', true);
                    }
                } else if (is_tag()) {
                    $value = 'blog-sidebar';
                }
            }
        }
    } else {
        if (is_singular()) {
            global $post;
            if ($default) {
                switch ($post->post_type) {
                    case 'product':
                        $value = 'woo-product-sidebar';
                        break;
                    case 'portfolio':
                        $value = $porto_settings['portfolio-single-sidebar'];
                        break;
                    case 'member':
                        $value = $porto_settings['member-single-sidebar'];
                        break;
                    case 'post':
                        $value = 'blog-sidebar';
                        break;
                    default:
                        $value = $porto_settings['sidebar'];
                }
            } else {
                $value = get_post_meta(get_the_id(), 'sidebar', true);
            }
        } else {
            $value = 'blog-sidebar';
        }
    }

    return $value;
}

function porto_get_taxonomies($content_type) {
    $args=array(
        'object_type' => array($content_type)
    );
    $output = 'names'; // or objects
    $operator = 'and'; // 'and' or 'or'
    $taxonomies = get_taxonomies($args, $output, $operator);
    return $taxonomies;
}