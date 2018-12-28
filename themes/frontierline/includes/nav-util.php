<?php
/**
 * Utility navigation.
 */
?>

<nav id="nav-util" class="can-stick <?php if (get_theme_mod('frontierline_category_drawer') === '1') : ?>has-categories<?php endif; ?>">
  <ul class="content">
    <li class="nav-util-sidebar"><?php if (is_active_sidebar('sidebar')) : ?><a href="#sidebar" aria-controls="sidebar" id="toggle-sidebar"><?php _e('Explore', 'frontierline'); ?></a><?php endif; ?></li>
    <li class="nav-util-categories"><?php if (get_theme_mod('frontierline_category_drawer') === '1') : ?><a href="#categories" aria-controls="categories" id="toggle-categories"><?php _e('Categories', 'frontierline'); ?></a><?php endif; ?></li>
    <li class="nav-util-search"><?php get_search_form(); ?></li>
  </ul>
</nav>
