<?php

// Customize theme
function customize_smart_theme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', [
        // 'comment-list',
        // 'comment-form',
        // 'search-form',
        // 'gallery',
        'caption',
        'script',
        'style'
    ]);

    // Register menu(s)
    register_nav_menu('top_menu', 'Top menu');
    register_nav_menus([
        'top_menu'   => 'Top menu',
        'full-menu'  => 'full-menu'
    ]);

    // Load textdomain
    load_theme_textdomain('smart', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'customize_smart_theme');

// Custom admin logo
add_action('login_head', function () {
    echo '<style>h1 a { background-image:url(' . get_bloginfo('template_directory') . '/assets/img/logo.svg)!important; background-size: 100% 100% !important;}</style>';
});

// Remove category & tag text before title
// add_filter('get_the_archive_title', function ($title) {
//   return preg_replace('~^[^:]+: ~', '', $title);
// });

// Get ACF options page for WP Multilang
// function id_WPSE_114111()
// {
//     echo "<pre>";
//     var_dump(get_current_screen());
//     echo "</pre>";
// }

// add_action('admin_notices', 'id_WPSE_114111');


// Remove unneeded classes & IDs from menu items
add_filter('nav_menu_css_class', 'remove_nav_styles');
add_filter('nav_menu_item_id', 'remove_nav_styles');
add_filter('page_css_class', 'remove_nav_styles');
add_filter('nav_menu_item_id', '__return_false');

function remove_nav_styles($var)
{
    // Allow custom styles
    $allow = array();
    return is_array($var) ? array_intersect($var, $allow) : '';
}