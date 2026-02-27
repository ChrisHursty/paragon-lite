<?php
/**
 * Theme functions for Paragon Lite.
 *
 * @package Paragon_Lite
 */

if (! defined('PARAGON_LITE_VERSION')) {
    define('PARAGON_LITE_VERSION', '1.0.0');
}

/**
 * Setup theme defaults and support features.
 */
function paragon_lite_setup()
{
    load_theme_textdomain('paragon-lite', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 120,
        'width'       => 420,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'paragon-lite'),
        'footer'  => __('Footer Menu', 'paragon-lite'),
    ));
}
add_action('after_setup_theme', 'paragon_lite_setup');

/**
 * Register widget areas.
 */
function paragon_lite_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'paragon-lite'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'paragon-lite'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'paragon_lite_widgets_init');

/**
 * Enqueue styles and scripts.
 */
function paragon_lite_scripts()
{
    wp_enqueue_style('paragon-lite-style', get_stylesheet_uri(), array(), PARAGON_LITE_VERSION);
    wp_enqueue_script('paragon-lite-script', get_template_directory_uri() . '/assets/js/main.js', array(), PARAGON_LITE_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'paragon_lite_scripts');
