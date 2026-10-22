<?php
function portfolio_blocks_setup() {
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Projects', 'portfolio-blocks'),
            'singular_name' => __('Project', 'portfolio-blocks'),
            'add_new_item' => __('Add New Project', 'portfolio-blocks'),
            'edit_item' => __('Edit Project', 'portfolio-blocks'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'projects'),
    ));
}
add_action('init', 'portfolio_blocks_setup');

function portfolio_blocks_enqueue_styles() {
    $stylesheet_path = get_stylesheet_directory() . '/style.css';
    $version = file_exists($stylesheet_path) ? filemtime($stylesheet_path) : wp_get_theme()->get('Version');

    wp_enqueue_style(
        'portfolio-blocks-style',
        get_stylesheet_uri(),
        array(),
        $version
    );
}
add_action('wp_enqueue_scripts', 'portfolio_blocks_enqueue_styles', 20);

function portfolio_blocks_current_year() {
    return esc_html(wp_date('Y'));
}
add_shortcode('portfolio_current_year', 'portfolio_blocks_current_year');
