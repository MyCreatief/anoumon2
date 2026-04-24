<?php
// Enqueue theme stylesheets and scripts
function theme_enqueue_scripts() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    // Add any additional stylesheets or scripts here
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

// Register navigation menus
function register_custom_menus() {
    register_nav_menus( array(
        'navigatie' => 'Navigatie Menu',
        // Add more menu locations here if needed
    ) );
}
add_action( 'after_setup_theme', 'register_custom_menus' );

// Add support for post thumbnails
add_theme_support( 'post-thumbnails' );

// Add any additional theme functionalities or customizations here
function add_custom_widget_area() {
    register_sidebar( array(
        'name'          => 'Footer Widget Area',
        'id'            => 'footer-widget-area',
        'description'   => 'This is the widget area for the footer.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'add_custom_widget_area' );