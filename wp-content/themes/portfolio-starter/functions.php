<?php
function portfolio_starter_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array('primary' => __('Primary Menu', 'portfolio-starter')));
}
add_action('after_setup_theme', 'portfolio_starter_setup');

function portfolio_starter_assets() {
    $stylesheet_path = get_stylesheet_directory() . '/style.css';
    $version = file_exists($stylesheet_path) ? filemtime($stylesheet_path) : '1.0.0';

    wp_enqueue_style('portfolio-starter-style', get_stylesheet_uri(), array(), $version);
}
add_action('wp_enqueue_scripts', 'portfolio_starter_assets');

function portfolio_starter_projects() {
    register_post_type('project', array(
        'labels' => array('name' => __('Projects', 'portfolio-starter'), 'singular_name' => __('Project', 'portfolio-starter')),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'projects'),
    ));
}
add_action('init', 'portfolio_starter_projects');
