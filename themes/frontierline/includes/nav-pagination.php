<?php
  global $wp_query;

  $big = 999999999; // need an unlikely integer
  $translated = __('Page', 'frontierline');

  $args = array(
            'base'                => str_replace( $big, '%#%', esc_url(get_pagenum_link($big))),
            'format'              => '?paged=%#%',
            'current'             => max( 1, get_query_var('paged')),
            'total'               => $wp_query->max_num_pages,
            'before_page_number'  => '<span class="a11y">'.$translated.'</span>',
            'prev_text'           => __('Previous', 'frontierline'),
            'next_text'           => __('Next', 'frontierline'),
            'type'                => 'list',
          );
?>

<nav class="pagination">
  <?php echo paginate_links($args); ?>
</nav>
