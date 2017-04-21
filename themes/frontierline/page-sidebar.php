<?php
/*
Template Name: Content with Custom Sidebar
*/
?>

<?php get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>

    <div class="content">
      <?php get_template_part('content-views/content-page-sidebar'); ?>
      <div class="custom-sidebar">
        <?php echo get_post_meta( get_the_ID(), 'extra-content', true ); ?>
      </div>
    </div>


  <?php if (is_singular()) : // Probably redundant because this is the single Page template, but just to be safe... ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  <?php comments_template('', true ); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
