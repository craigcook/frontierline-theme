<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

get_header(); ?>

  <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ ?>
    <div class="posts-wrap">
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'content-summary', get_post_format() ); ?>

    <?php endwhile; ?>
    </div>

  <nav class="pagination">
    <?php echo paginate_links(); ?>
  </nav>

  <?php else : ?>

    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title"><?php _e( 'Nothing Found', 'onemozilla' ); ?></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p><?php _e( 'Sorry, we couldn&#8217;t find any results for the requested archive. Perhaps try searching?', 'onemozilla' ); ?></p>
        <?php get_search_form(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-0 -->

  <?php endif; ?>

<?php get_footer(); ?>
