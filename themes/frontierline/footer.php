    </main>

  <?php get_sidebar(); ?>

  <?php if ('enabled' === get_theme_mod('frontierline_category_drawer', 'enabled')) : ?>
    <?php get_template_part('includes/categories'); ?>
  <?php endif; ?>

  <?php if (!is_singular()) : ?>
    <?php get_template_part('includes/newsletter-form'); ?>
  <?php endif; ?>

  </div><!-- /.site-wrap -->



  <footer id="site-info" class="section">
    <div class="content">

      <section class="col col-1">
        <div class="logo"><a href="https://www.mozilla.org">Mozilla</a></div>
        <p id="license" class="license">
        <?php printf(__('Trechos deste conteúdo possuem direitos reservados (©1998-%1s) por colaboradores da mozillabr.org. Conteúdo disponível sob a <a href="%2s" rel="external license">licença Creative Commons</a>', 'frontierline'), date('Y'), esc_attr('https://www.mozilla.org/foundation/licensing/website-content/')); ?>
        </p>
      </section>

      <section class="col col-2">
        <ul class="links-join">
          <li><a href="#"><?php _e('Sobre', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="#"><?php _e('Times', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="#"><?php _e('Projetos', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="#"><?php _e('Blog', 'frontierline'); ?></a></li>
          <li><a href="#"><?php _e('Entre em contato', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="#"><?php _e('Como participar', 'frontierline'); ?></a></li>
          <li class="clear"><a href="#"><?php _e('Contribua com esse site', 'frontierline'); ?></a></li>
        </ul>

        <ul class="links-legal">
          <li><a href="https://www.mozilla.org/privacy/"><?php _e('Privacidade', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="https://www.mozilla.org/privacy/websites/#cookies"><?php _e('Cookies', 'frontierline'); ?></a></li>
          <li class="wrap"><a href="https://www.mozilla.org/about/legal/"><?php _e('Jurídico', 'frontierline'); ?></a></li>
          <li class="clear"><a href="https://www.mozilla.org/about/legal/fraud-report/"><?php _e('Denunciar abuso de marcas registradas', 'frontierline'); ?></a></li>
        </ul>
      </section>

      <section class="col col-3">
        <ul class="links-social">
          <li>
            Mozilla Brasil:
            <ul>
              <li class="wrap"><a href="https://twitter.com/mozillabrasil">Twitter<span> (@mozillabrasil)</span></a></li>
              <li class="wrap"><a href="https://www.facebook.com/mozillabrasil">Facebook<span> (Mozilla Brasil)</span></a></li>
              <li class="wrap"><a href="https://www.flickr.com/photos/mozillabrasil/">Flickr<span> (Mozilla)</span></a></li>
            </ul>
          </li>
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
