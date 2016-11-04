<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ ?>
    <div class="content posts-wrap">
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part('views/content', 'summary'); ?>

    <?php endwhile; ?>
    </div>

<?php if (paginate_links()) : ?>
  <nav class="pagination">
    <?php
    global $wp_query;

    $big = 999999999; // need an unlikely integer
    $translated = __('Page', 'frontierline');

    echo paginate_links(array(
      'base'                => str_replace( $big, '%#%', esc_url(get_pagenum_link($big))),
      'format'              => '?paged=%#%',
      'current'             => max( 1, get_query_var('paged')),
      'total'               => $wp_query->max_num_pages,
      'before_page_number'  => '<span class="a11y">'.$translated.'</span>',
      'prev_text'           => __('Previous'),
      'next_text'           => __('Next'),
      'type'                => 'list',
    ));
    ?>
  </nav>
<?php endif; ?>

  <?php else : ?>

    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title"><?php _e('Nothing Found', 'frontierline'); ?></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p><?php _e('Sorry, we couldn&#8217;t find any results for the requested archive. Perhaps try searching?', 'frontierline'); ?></p>
        <?php get_search_form(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-0 -->

  <?php endif; ?>

<?php get_footer(); ?>
