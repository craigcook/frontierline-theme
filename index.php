<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ ?>
    <div class="content posts-wrap hfeed">
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part('content-views/content', 'summary'); ?>

    <?php endwhile; ?>
    </div>

    <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

  <?php else : ?>

    <div class="content">
      <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
          <h1 class="entry-title"><?php _e('Nothing Found', 'frontierline'); ?></h1>
        </header>

        <div class="entry-content">
          <p><?php _e('Sorry, we couldn&#8217;t find any results for the requested archive. Perhaps try searching?', 'frontierline'); ?></p>
          <?php get_search_form(); ?>
        </div>
      </article>
    </div>

  <?php endif; ?>

<?php get_footer(); ?>
