<?php

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
