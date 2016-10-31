<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('views/post'); ?>

    <?php get_template_part('parts/nav-paging'); ?>

    <?php get_template_part('parts/related-posts'); ?>

  <?php if (is_singular()) : ?>
    <?php get_template_part('parts/newsletter-form'); ?>
  <?php endif; ?>

  <?php comments_template( '', true ); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
