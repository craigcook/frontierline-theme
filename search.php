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
    <?php printf(__('We found one result for “%2$s”', 'We found %1$s results for “%2$s”', $total_results, 'frontierline'), $total_results, esc_html(get_search_query())); ?>
    </h1>

    <?php /* Start the Loop */ ?>
    <div class="content posts-wrap">
    <?php while (have_posts()) : the_post(); ?>

      <?php get_template_part('content-views/content', 'summary'); ?>

    <?php endwhile; ?>
    </div>

    <?php if (paginate_links()) : get_template_part('includes/nav-pagination'); endif; ?>

  <?php else : ?>

    <h2 class="page-title content">
      <?php printf(__('Sorry, we didn’t find anything for “%s”', 'frontierline'), esc_html(get_search_query())); ?>
    </h2>

    <div class="content">
      <p><?php _e('Try another search?', 'frontierline'); ?></p>
      <?php get_search_form(); ?>
    </div>

  <?php endif; ?>

<?php get_footer(); ?>
