<?php
/**
 * Utility navigation.
 */
?>

<nav id="nav-util" class="can-stick <?php if ('enabled' === get_theme_mod('frontierline_category_drawer', 'enabled')) : ?>has-categories<?php endif; ?>">
  <ul class="content">
    <li class="nav-util-sidebar"><a href="#sidebar" aria-controls="sidebar" id="toggle-sidebar"><?php _e('Explore', 'frontierline'); ?></a></li>
   <?php if ('enabled' === get_theme_mod('frontierline_category_drawer', 'enabled')) : ?>
    <li class="nav-util-categories"><a href="#categories" aria-controls="categories" id="toggle-categories"><?php _e('Categories', 'frontierline'); ?></a></li>
   <?php endif; ?>
    <li class="nav-util-search"><?php get_search_form(); ?></li>
  </ul>
</nav>
