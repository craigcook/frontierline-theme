<?php
/**
 * Utility navigation.
 */
?>

<nav id="nav-util">
  <ul class="content">
    <li class="nav-util-sidebar"><a href="#sidebar" aria-controls="sidebar" id="toggle-sidebar"><?php _e('Blog menu', 'frontierline'); ?></a></li>
    <li class="nav-util-explore"><a href="#explore" aria-controls="explore" id="toggle-explore"><?php _e('Explore', 'frontierline'); ?></a></li>
    <li class="nav-util-home"><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'frontierline'); ?></a></li>
  </ul>
</nav>
