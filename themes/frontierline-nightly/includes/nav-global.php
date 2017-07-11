<?php
/**
 * Global navigation bar.
 */
?>

<nav id="nav-global" class="nav-global can-stick">
  <div class="content">
    <div class="logo"><a href="https://www.mozilla.org" rel="external" title="<?php _e('Visit mozilla.org', 'frontierline'); ?>">Mozilla</a></div>

    <p class="fx-cta"><a href="https://www.mozilla.org/firefox/channel/desktop/#nightly" rel="external" class="button button-green"><?php _e('Download Firefox Nightly', 'frontierline'); ?></a></p>

    <div class="nav-mozilla">
      <span class="toggle" role="button" aria-controls="nav-mozilla-menu" aria-expanded="false" tabindex="0"><?php _e('Menu', 'frontierline'); ?></span>
      <ul class="nav-mozilla-menu" id="nav-mozilla-menu">
        <li class="nav-global-twitter"><a href="https://twitter.com/FirefoxNightly" rel="external"><?php _e('Twitter', 'frontierline'); ?></a></li>
        <li class="nav-global-join"><a href="https://wiki.mozilla.org/Nightly" rel="external"><?php _e('Get Involved', 'frontierline'); ?></a></li>
      </ul>
    </div>

    <a class="page-top" href="#masthead" title="<?php _e('Go to the top of the page', 'frontierline'); ?>"><?php _e('Top', 'frontierline'); ?></a>
  </div>
</nav>
