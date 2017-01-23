    </main>

  <?php get_sidebar(); ?>
  <?php get_template_part('includes/explore'); ?>

  <?php if (!is_singular()) : ?>
  <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  </div><!-- /.site-wrap -->

  <footer id="site-info" class="section">
    <div class="content">

      <section class="col col-1">
        <div class="logo"><a href="https://www.mozilla.org">Mozilla</a></div>
        <p id="license" class="license">
        <?php printf(__('Portions of this content are ©1998-%1s by individual contributors. Content available under a <a href="%2s" rel="external license">Creative Commons license</a>', 'frontierline'), date('Y'), esc_attr('https://www.mozilla.org/foundation/licensing/website-content/')); ?>
        </p>
      </section>

      <section class="col col-2">
        <ul class="links-join">
          <li><a href="https://www.mozilla.org/contact/"><?php _e('Contact Us', 'frontierline'); ?></a></li>
          <li class="wrap"><a class="donate" href="https://donate.mozilla.org/?presets=100,50,25,15&amp;amount=50&amp;currency=usd"><?php _e('Donate', 'frontierline'); ?></a></li>
        </ul>

        <ul class="links-legal">
          <li><a href="https://www.mozilla.org/privacy/"><?php _e('Privacy', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="https://www.mozilla.org/privacy/websites/#cookies"><?php _e('Cookies', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="https://www.mozilla.org/about/legal/"><?php _e('Legal', 'frontierline'); ?></a></li>
          <li class="clear"><a href="https://www.mozilla.org/about/legal/fraud-report/"><?php _e('Report Trademark Abuse', 'frontierline'); ?></a></li>
        </ul>
      </section>

      <section class="col col-3">
        <ul class="links-social">
          <li>
            Mozilla:
            <ul>
              <li class="wrap"><a href="https://twitter.com/mozilla">Twitter<span> (@mozilla)</span></a></li>
              <li class="wrap"><a href="https://www.facebook.com/mozilla">Facebook<span> (Mozilla)</span></a></li>
            </ul>
          </li>
          <li>
            Firefox:
            <ul>
              <li class="wrap"><a href="https://twitter.com/firefox">Twitter<span> (@firefox)</span></a></li>
              <li class="wrap"><a href="https://www.facebook.com/Firefox">Facebook<span> (Firefox)</span></a></li>
              <li class="wrap"><a href="https://www.youtube.com/firefoxchannel">YouTube<span> (firefoxchannel)</span></a></li>
            </ul>
          </li>
        </ul>
      </section>

    </div>
  </footer>

  <!--[if IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchMedia.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/matchMedia.addListener.js"></scrip>
  <![endif]-->

  <?php wp_footer(); ?>
</body>
</html>
