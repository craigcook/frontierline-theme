<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('template-parts/content'); ?>

    <?php get_template_part('template-parts/nav-paging'); ?>

    <?php get_template_part('template-parts/related-posts'); ?>

  <?php if (is_singular()) : ?>
    <?php get_template_part('template-parts/newsletter-form'); ?>
  <?php endif; ?>

  <?php comments_template( '', true ); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
