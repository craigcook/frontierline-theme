<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="content">
      <?php get_template_part('views/post'); ?>
    </div>

    <?php get_template_part('includes/nav-paging'); ?>

    <?php get_template_part('includes/related-posts'); ?>

  <?php if (is_singular()) : ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  <?php comments_template('', true ); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
