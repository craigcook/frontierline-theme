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
    <h2 class="page-title content">
    <?php printf(_n('We found one result for “%2$s”', 'We found %1$s results for “%2$s”', $total_results, 'frontierline'), $total_results, esc_html(get_search_query())); ?>
    </h2>

    <?php /* Start the Loop */ ?>
    <div class="content posts-grid">
    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('content-views/content', 'summary'); ?>

    <?php endwhile; ?>
    </div>

    <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

  <?php else : ?>

    <?php get_template_part('content-views/content', 'none');  ?>

  <?php endif; ?>

<?php get_footer(); ?>
