<?php
/**
 * Global navigation bar.
 */
?>

<nav id="nav-global" class="nav-global">
  <div class="content">
    <div class="logo"><a href="https://www.mozilla.org" rel="external" title="<?php _e('Visit mozilla.org', 'frontierline'); ?>">Mozilla</a></div>

    <div class="nav-mozilla">
      <span class="toggle" role="button" aria-controls="nav-mozilla-menu" aria-expanded="false" tabindex="0"><?php _e('Menu', 'frontierline'); ?></span>
      <ul class="nav-mozilla-menu" id="nav-mozilla-menu">
        <li><a href="https://www.mozilla.org/internet-health/" rel="external"><?php _e('Internet Health', 'frontierline'); ?></a></li>
        <li><a href="https://www.mozilla.org/technology/" rel="external"><?php _e('Web Innovations', 'frontierline'); ?></a></li>
        <li><a href="https://donate.mozilla.org/" rel="external"><?php _e('Donate', 'frontierline'); ?></a></li>
        <li><a href="https://www.mozilla.org/firefox/products/" rel="external">Firefox</a></li>
      </ul>
    </div>
  </div>
</nav>
