<?php
/**
 * Theme functions for Paragon Lite.
 *
 * @package Paragon_Lite
 */

if (! defined('PARAGON_LITE_VERSION')) {
    define('PARAGON_LITE_VERSION', '1.1.0');
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
    add_theme_support('responsive-embeds');
    add_theme_support('customize-selective-refresh-widgets');
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
    add_theme_support('custom-background', array(
        'default-color' => 'f7f8fb',
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
    $style_path = get_template_directory() . '/style.css';
    $script_path = get_template_directory() . '/assets/js/main.js';

    wp_enqueue_style(
        'paragon-lite-style',
        get_stylesheet_uri(),
        array(),
        file_exists($style_path) ? (string) filemtime($style_path) : PARAGON_LITE_VERSION
    );

    wp_enqueue_script(
        'paragon-lite-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        file_exists($script_path) ? (string) filemtime($script_path) : PARAGON_LITE_VERSION,
        array(
            'in_footer' => true,
            'strategy'  => 'defer',
        )
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'paragon_lite_scripts');

/**
 * Add Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function paragon_lite_customize_register($wp_customize)
{
    $wp_customize->add_section('paragon_lite_style', array(
        'title'    => __('Theme Style', 'paragon-lite'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('paragon_lite_accent_color', array(
        'default'           => '#2d6cdf',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'paragon_lite_accent_color', array(
        'label'   => __('Accent Color', 'paragon-lite'),
        'section' => 'paragon_lite_style',
    )));

    $wp_customize->add_setting('paragon_lite_container_width', array(
        'default'           => 1100,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('paragon_lite_container_width', array(
        'label'       => __('Container Width (px)', 'paragon-lite'),
        'section'     => 'paragon_lite_style',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 900,
            'max' => 1400,
            'step' => 10,
        ),
    ));
}
add_action('customize_register', 'paragon_lite_customize_register');

/**
 * Output custom style variables from Customizer settings.
 */
function paragon_lite_inline_css_variables()
{
    $accent_color = sanitize_hex_color(get_theme_mod('paragon_lite_accent_color', '#2d6cdf'));
    $container_width = absint(get_theme_mod('paragon_lite_container_width', 1100));

    if (! $accent_color) {
        $accent_color = '#2d6cdf';
    }

    if ($container_width < 900 || $container_width > 1400) {
        $container_width = 1100;
    }

    $inline_css = sprintf(
        ':root { --color-accent: %1$s; --container: %2$spx; }',
        esc_html($accent_color),
        esc_html((string) $container_width)
    );

    wp_add_inline_style('paragon-lite-style', $inline_css);
}
add_action('wp_enqueue_scripts', 'paragon_lite_inline_css_variables', 20);
