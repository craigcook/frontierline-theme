<?php
/**
 * Global navigation bar.
 */
?>

<nav id="nav-global" class="nav-global can-stick">
  <div class="content">
    <div class="logo"><a href="https://www.mozilla.org" rel="external" title="<?php _e('Visit mozilla.org', 'frontierline'); ?>">Mozilla</a></div>

    <div class="nav-mozilla">
      <span class="toggle" role="button" aria-controls="nav-mozilla-menu" aria-expanded="false" tabindex="0"><?php _e('Menu', 'frontierline'); ?></span>
      <ul class="nav-mozilla-menu" id="nav-mozilla-menu">
        <li class="nav-global-health"><a href="https://www.mozilla.org/internet-health/" rel="external"><?php _e('Internet Health', 'frontierline'); ?></a></li>
        <li class="nav-global-tech"><a href="https://www.mozilla.org/technology/" rel="external"><?php _e('Web Innovations', 'frontierline'); ?></a></li>
        <li class="nav-global-donate"><a href="https://donate.mozilla.org/" rel="external"><?php _e('Give', 'frontierline'); ?></a></li>
        <li class="nav-global-firefox"><a href="https://www.mozilla.org/firefox/products/" rel="external"><?php _e('Discover Firefox', 'frontierline'); ?></a></li>
      </ul>
    </div>

    <a class="page-top" href="#masthead" title="<?php _e('Go to the top of the page', 'frontierline'); ?>"><?php _e('Top', 'frontierline'); ?></a>
  </div>
</nav>
