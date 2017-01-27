<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

get_header(); ?>

<?php if ( have_posts() ) : ?>

  <?php /* Start the Loop */ ?>
  <div class="content posts-grid hfeed">
  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('content-views/content', 'summary'); ?>

  <?php endwhile; ?>
  </div>

  <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

<?php else : ?>

  <?php get_template_part('content-views/content', 'none');  ?>

<?php endif; ?>

<?php get_footer(); ?>
