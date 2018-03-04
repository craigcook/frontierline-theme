<?php
if (! function_exists('frontierline_fx_setup')):
function frontierline_fx_setup() {
  // Make the theme available for translation.
  // Translations can be added to the /languages/ directory.
  load_theme_textdomain('frontierline', get_stylesheet_directory() . '/languages');
}
endif;
add_action('after_setup_theme', 'frontierline_fx_setup');

/* Enqueue Frontierline original stylesheet */
function frontierline_css() {
  wp_enqueue_style('frontierline', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'frontierline_css');
