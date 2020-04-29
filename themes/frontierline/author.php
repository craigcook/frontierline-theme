<?php
// Don't allow direct access to the theme
if(!defined('DB_NAME')) {
  exit('Direct template access is not allowed');
}

// Count search results
global $wp_query;
$total_results = $wp_query->found_posts;

get_header();
?>

  <?php if (have_posts()) : ?>
    <header class="author-info content vcard">
      <h1 class="page-title fn"><?php the_author(); ?></h1>
      <?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
    <?php if (get_the_author_meta('description')) : ?>
      <div class="author-description"><?php the_author_meta('description'); ?></div>
    <?php endif; ?>
    </header>

    <?php /* Start the Loop */ ?>
    <div class="content posts-grid hfeed">
    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('content-views/content', 'summary-noimage'); ?>

    <?php endwhile; ?>
    </div>

    <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

  <?php else : ?>

    <?php get_template_part('content-views/content', 'none');  ?>

  <?php endif; ?>

<?php get_footer(); ?>
