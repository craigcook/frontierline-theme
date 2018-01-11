    </main>

  <?php get_sidebar(); ?>

  <?php if (get_theme_mod('frontierline_category_drawer') === '1') : ?>
    <?php get_template_part('includes/categories'); ?>
  <?php endif; ?>

  <?php if (!is_singular()) : ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  </div><!-- /.site-wrap -->



<footer id="site-info" class="section">
  <div class="content">
    <nav class="primary">
      <div class="logo">
        <a href="https://www.mozilla.org/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Mozilla">Mozilla</a>
      </div>
      <section class="mozilla">
        <h5><a href="https://www.mozilla.org/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Mozilla">Mozilla</a></h5>
        <ul class="mozilla-links">
          <li><a href="https://www.mozilla.org/about/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="About"><?php _e('About', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/contact/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Contact Us"><?php _e('Contact Us', 'frontierline'); ?></a></li>
          <li><a href="https://donate.mozilla.org/?presets=50,30,20,10&amp;amount=30&amp;currency=usd&amp;utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" class="donate" data-link-type="footer" data-link-name="Donate"><?php _e('Donate', 'frontierline'); ?></a></li>
          <li>
            <ul class="social-links">
              <li><a class="twitter" href="https://twitter.com/mozilla" data-link-type="footer" data-link-name="Twitter (@mozilla)">Twitter<span> (@mozilla)</span></a></li>
              <li><a class="facebook" href="https://www.facebook.com/mozilla" data-link-type="footer" data-link-name="Facebook (Mozilla)">Facebook<span> (Mozilla)</span></a></li>
              <li><a class="instagram" href="https://www.instagram.com/mozillagram/" data-link-type="footer" data-link-name="Instagram (@mozillagram)">Instagram<span> (@mozillagram)</span></a></li>
            </ul>
          </li>
        </ul>
      </section>
      <section class="firefox">
        <h5><a href="https://www.mozilla.org/firefox/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Mozilla">Firefox</a></h5>
        <ul class="firefox-links">
          <li><a href="https://www.mozilla.org/firefox/new/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Download Firefox"><?php _e('Download Firefox', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Desktop"><?php _e('Desktop', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/mobile/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Mobile"><?php _e('Mobile', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/features/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Features"><?php _e('Features', 'frontierline'); ?></a></li>
          <li><a href="https://www.mozilla.org/firefox/channel/desktop/?utm_source=<?php echo frontierline_blog_domain(); ?>&amp;utm_campaign=footer&amp;utm_medium=referral" data-link-type="footer" data-link-name="Beta, Nightly, Developer Edition"><?php _e('Beta, Nightly, Developer Edition', 'frontierline'); ?></a></li>
          <li>
            <ul class="social-links">
              <li><a class="twitter" href="https://twitter.com/firefox" data-link-type="footer" data-link-name="Twitter (@firefox)">Twitter<span> (@firefox)</span></a></li>
              <li><a class="facebook" href="https://www.facebook.com/Firefox" data-link-type="footer" data-link-name="Facebook (Firefox)">Facebook<span> (Firefox)</span></a></li>
              <li><a class="youtube" href="https://www.youtube.com/firefoxchannel" data-link-type="footer" data-link-name="YouTube (firefoxchannel)">YouTube<span> (firefoxchannel)</span></a></li>
            </ul>
          </li>
        </ul>
      </section>
    </nav>

    <nav class="secondary">
        <div class="small-links">
          <ul>
            <li><a rel="nofollow" href="https://www.mozilla.org/privacy/" data-link-type="footer" data-link-name="Privacy"><?php _e('Website Privacy Notice', 'frontierline'); ?></a></li>
            <li><a rel="nofollow" href="https://www.mozilla.org/privacy/websites/#cookies" data-link-type="footer" data-link-name="Cookies"><?php _e('Cookies', 'frontierline'); ?></a></li>
            <li><a rel="nofollow" href="https://www.mozilla.org/about/legal/" data-link-type="footer" data-link-name="Legal"><?php _e('Legal', 'frontierline'); ?></a></li>
          </ul>
          <p class="license">
          <?php printf(__('Portions of this content are ©1998-%1s by individual contributors. Content available under a <a href="%2s" rel="external license">Creative Commons license</a>.', 'frontierline'), date('Y'), esc_attr('https://www.mozilla.org/foundation/licensing/website-content/')); ?>
          </p>
        </div>
    </nav>
  </div>
</footer>

  <!--[if IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchMedia.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchMedia.addListener.js"></scrip>
  <![endif]-->

  <?php wp_footer(); ?>
</body>
</html>
