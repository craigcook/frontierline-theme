<form id="search" class="fm-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <fieldset>
    <p>
      <label for="s"><?php _e('Search this site', 'rebrand'); ?></label>
      <input type="search" value="<?php the_search_query(); ?>" name="s" id="s">
      <button type="submit" class="button button-minor"><?php _e('Search', 'rebrand'); ?></button>
    </p>
  </fieldset>
</form>
