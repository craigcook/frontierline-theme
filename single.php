<?php
/**
 * Single post.
 */
?>

<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="content">
      <?php get_template_part('content-views/content'); ?>
    </div>

    <?php get_template_part('includes/nav-paging'); ?>

    <?php get_template_part('includes/related-posts'); ?>

  <?php if (is_singular()) : // Probably redundant because this is the single template, but just to be safe... ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  <?php comments_template('', true ); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
