<?php
/* Enqueue Frontierline original stylesheet */
function frontierline_css() {
  wp_enqueue_style('frontierline-parent', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'frontierline_css');
