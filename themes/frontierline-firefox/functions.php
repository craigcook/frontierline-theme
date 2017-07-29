<?php
if (! function_exists('frontierline_fx_setup')):
function frontierline_fx_setup() {
  // Make the theme available for translation.
  // Translations can be added to the /languages/ directory.
  load_theme_textdomain('frontierline', get_stylesheet_directory() . '/languages');
}
endif;
add_action('after_setup_theme', 'frontierline_fx_setup');

// Use custom feed templates without dc:creator
function frontierline_feed_rss2() {
    load_template( STYLESHEETPATH . '/feeds/feed-rss2.php');
}
add_feed('rss2', 'frontierline_feed_rss2');

function frontierline_feed_rdf() {
    load_template( STYLESHEETPATH . '/feeds/feed-rdf.php');
}
add_feed('rdf', 'frontierline_feed_rdf');

function frontierline_feed_atom() {
    load_template( STYLESHEETPATH . '/feeds/feed-atom.php');
}
add_feed('atom', 'frontierline_feed_atom');
?>
