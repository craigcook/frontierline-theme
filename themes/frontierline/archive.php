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

    <h1 class="page-title content">
    <?php if (is_category()) : ?>
      <?php printf(__('Articles in “%s”', 'frontierline'), single_cat_title('',false)); ?>
    <?php elseif (is_tag()) : ?>
      <?php printf(__('Articles tagged with “%s”','frontierline'), single_tag_title('',false)); ?>
    <?php elseif (is_day()) : ?>
      <?php printf(__('Articles from %s', 'frontierline'), get_the_date()); ?>
    <?php elseif (is_month()) : ?>
      <?php printf(__('Articles from %s', 'frontierline'), get_the_date('F, Y')); ?>
    <?php elseif (is_year()) : ?>
      <?php printf(__('Articles from %s', 'frontierline'), get_the_date('Y')); ?>
    <?php elseif (is_author()) : ?>
      <?php printf(__('Articles by %s','frontierline'), get_the_author()); ?>
    <?php else : ?>
      <?php the_archive_title(); ?>
    <?php endif; ?>
    </h1>

    <?php /* Start the Loop */ ?>
    <div class="content posts-grid hfeed">
    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('content-views/content', 'summary'); ?>

    <?php endwhile; ?>
    </div>

    <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

  <?php else : ?>

    <?php get_template_part('content-views/content', 'none');  ?>

  <?php endif; ?>

<?php get_footer(); ?>
