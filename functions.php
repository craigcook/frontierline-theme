<?php
if ( ! function_exists( 'onemozilla_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override onemozilla_setup() in a child theme, add your own onemozilla_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */
function onemozilla_setup() {

  /* Make the theme available for translation.
   * Translations can be added to the /languages/ directory.
   */
  load_theme_textdomain( 'onemozilla', get_template_directory() . '/languages' );

  $locale = get_locale();
  $locale_file = get_template_directory() . "/languages/$locale.php";
  if ( is_readable( $locale_file ) )
    require_once( $locale_file );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', __( 'Primary Menu', 'onemozilla' ) );

  // This theme uses Featured Images (also known as post thumbnails)
  add_theme_support( 'post-thumbnails' );

  // Full post image
  add_image_size( 'post-full-size', 1600, 400, true );

  // Large post image
  add_image_size( 'post-large', 600, 330, true );

  $header_defaults = array(
    'width'         => 1600,
    'height'        => 600,
    'header-text'   => false,
  );
  add_theme_support( 'custom-header', $header_defaults );

  // Disable the header text and color options
  define( 'NO_HEADER_TEXT', true );

  // ... and thus ends the changeable header business.

  // We've moved the share_posts and hide_authors out of theme options but we'll bring over those settings (if they exist)

  // Stash the values in variables
  if (isset($options['share_posts'])) {
    $share_posts = $options['share_posts'];
  }

  if (isset($options['hide_author'])) {
    $hide_authors = $options['hide_author'];
  }

  if ( isset($share_posts) && (get_option('onemozilla_share_posts') == null) ) {
    update_option('onemozilla_share_posts', $share_posts);
  }
  if ( isset($hide_authors) && (get_option('onemozilla_hide_authors') == null) ) {
    update_option('onemozilla_hide_authors', $hide_authors);
  }

}
endif; // onemozilla_setup
add_action('after_setup_theme', 'onemozilla_setup');


/*********
 * Do some stuff when the theme is activated.
 */
if ( ! function_exists( 'onemozilla_activate' ) ):
  function onemozilla_activate() {
    // Set default media options
    update_option('thumbnail_size_w', 150, true);
    update_option('thumbnail_size_h', 150, true);
    update_option('thumbnail_crop', 1);
    update_option('medium_size_w', 300, true);
    update_option('medium_size_h', '', true);
    update_option('large_size_w', 600, true);
    update_option('large_size_h', '', true);
  }
endif; // onemozilla_activate
add_action('after_switch_theme', 'onemozilla_activate');


/*********
 * Register and define the Social Sharing and Hide Authors settings
 */
function onemozilla_admin_init(){
  register_setting(
    'reading',
    'onemozilla_share_posts'
  );
  add_settings_field(
    'share_posts',
    __( 'Social sharing for posts', 'onemozilla' ),
    'onemozilla_settings_field_share_posts',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'onemozilla_share_pages'
  );
  add_settings_field(
    'share_pages',
    __( 'Social sharing for pages', 'onemozilla' ),
    'onemozilla_settings_field_share_pages',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'onemozilla_hide_authors'
  );
  add_settings_field(
    'hide_authors',
    __( 'Hide post authors', 'onemozilla' ),
    'onemozilla_settings_field_hide_authors',
    'reading',
    'default'
  );
}
add_action('admin_init', 'onemozilla_admin_init');

/**
 * Renders the Add Sharing setting field for posts.
 */
function onemozilla_settings_field_share_posts() { ?>
  <div class="layout share-posts">
  <label>
    <input type="checkbox" id="onemozilla_share_posts" name="onemozilla_share_posts" value="1" <?php checked( '1', get_option('onemozilla_share_posts') ); ?> />
    <span>
      <?php _e('Add social sharing buttons to posts', 'onemozilla'); ?>
    </span>
    <p class="description"><?php _e('Adds buttons for Facebook, Twitter, and Google+.', 'onemozilla' ); ?></p>
  </label>
  </div>
  <?php
}

/**
 * Renders the Add Sharing setting field for pages.
 */
function onemozilla_settings_field_share_pages() { ?>
  <div class="layout share-pages">
  <label>
    <input type="checkbox" id="onemozilla_share_pages" name="onemozilla_share_pages" value="1" <?php checked( '1', get_option('onemozilla_share_pages') ); ?> />
    <span>
      <?php _e('Add social sharing buttons to pages', 'onemozilla'); ?>
    </span>
    <p class="description"><?php _e('Adds buttons for Facebook, Twitter, and Google+.', 'onemozilla' ); ?></p>
  </label>
  </div>
  <?php
}

/**
 * Renders the Show Author setting field.
 */
function onemozilla_settings_field_hide_authors() { ?>
  <div class="layout hide-authors">
  <label>
    <input type="checkbox" name="onemozilla_hide_authors" value="1" <?php checked( '1', get_option('onemozilla_hide_authors') ); ?> />
    <span>
      <?php _e('Hide post authors', 'onemozilla'); ?>
    </span>
    <p class="description"><?php _e('This removes the author byline and author bio from individual posts.', 'onemozilla' ); ?></p>
  </label>
  </div>
  <?php
}


/*********
 * Adds classes to the array of post classes. We'll use these as style hooks for post headers.
 */
function onemozilla_post_classes( $classes ) {
  global $post;
  $comment_count = get_comments_number($post->ID);

  if ( get_option('onemozilla_hide_authors') != 1 ) {
    $classes[] = 'show-author';
  }
  elseif ( get_option('onemozilla_hide_authors') == 1 ) {
    $classes[] = 'no-author';
  }
  if ( comments_open($post->ID) || pings_open($post->ID) || ($comment_count > 0) ) {
    $classes[] = 'show-comments';
  }
  elseif ( !comments_open($post->ID) && !pings_open($post->ID) && ($comment_count == 0) ) {
    $classes[] = 'no-comments';
  }
  if ( get_option('onemozilla_share_posts') == 1 || get_option('onemozilla_share_pages') == 1 ) {
    $classes[] = 'show-sharing';
  }
  return $classes;
}
add_filter( 'post_class', 'onemozilla_post_classes' );


/*********
* Use auto-excerpts for meta description if hand-crafted exerpt is missing
*/
function fc_meta_desc() {
  $post_desc_length  = 25; // auto-excerpt length in number of words

  global $cat, $cache_categories, $wp_query, $wp_version;
  if(is_single() || is_page()) {
    $post = $wp_query->post;
    $post_custom = get_post_custom($post->ID);

    if(!empty($post->post_excerpt)) {
      $text = $post->post_excerpt;
    } else {
      $text = $post->post_content;
    }
    $text = do_shortcode($text);
    $text = str_replace(array("\r\n", "\r", "\n", "  "), " ", $text);
    $text = str_replace(array("\""), "", $text);
    $text = trim(strip_tags($text));
    $text = explode(' ', $text);
    if(count($text) > $post_desc_length) {
      $l = $post_desc_length;
      $ellipsis = '...';
    } else {
      $l = count($text);
      $ellipsis = '';
    }
    $description = '';
    for ($i=0; $i<$l; $i++)
      $description .= $text[$i] . ' ';

    $description .= $ellipsis;
  }
  elseif(is_category()) {
    $category = $wp_query->get_queried_object();
    if (!empty($category->category_description)) {
      $description = trim(strip_tags($category->category_description));
    } else {
      $description = single_cat_title('Articles posted in ');
    }
  }
  else {
    $description = trim(strip_tags(get_bloginfo('description')));
  }

  if($description) {
    echo $description;
  }
}

/*********
* Disable the embedded styles when using [gallery] shortcode
*/
add_filter( 'use_default_gallery_style', '__return_false' );

/*********
* Disable comments on Pages by default
*
* This is a hack. WP doesn't currently make it possible to enable comments
* by default for Posts while disabling them for Pages; it's either comments on
* all or comments on none. But in most cases authors will prefer to turn off
* comments for Pages. This just unchecks those checkboxes automatically so authors
* don't need to remember. Comments can still be enabled for Pages on an individual
* basis.
*/
function fc_page_comments_off() {
  if(isset($_REQUEST['post_type'])) {
    if ( $_REQUEST['post_type'] == "page" ) {
      echo '<script>
          if (document.post) {
            var opt_comment = document.post.comment_status;
            var opt_ping = document.post.ping_status;
            if (the_comment && the_ping) {
              the_comment.checked = false;
              the_ping.checked = false;
            }
          }
      </script>';
    }
  }
}
add_action ( 'admin_footer', 'fc_page_comments_off' );





/*********
* Prints the page number currently being browsed, with a pipe before it.
* Used in header.php to add the page number to the <title>.
*/
if ( ! function_exists( 'fc_page_number' ) ) :
function fc_page_number() {
  global $paged; // Contains page number.
  if ( $paged >= 2 )
    echo ' | ' . sprintf( __( 'Page %s' , 'wordpress' ), $paged );
}
endif;

/*********
* Allow uploading some additional MIME types
*/
function fc_add_mimes( $mimes=array() ) {
  $mimes['webm'] = 'video/webm';
  $mimes['ogv'] = 'video/ogg';
  $mimes['mp4'] = 'video/mp4';
  $mimes['m4v'] = 'video/mp4';
  $mimes['flv'] = 'video/x-flv';
  return $mimes;
}
add_filter('upload_mimes', 'fc_add_mimes');

/*********
* Load various JavaScripts
*/
function onemozilla_load_scripts() {
  // Load the default jQuery
  wp_enqueue_script('jquery');

  // Load the global script
  wp_register_script('global', get_template_directory_uri() . '/js/global.js', 'jquery', '1.0', true);
  wp_enqueue_script('global');

  // Load the threaded comment reply script
  if ( get_option('thread_comments') && is_singular() ) {
    wp_enqueue_script('comment-reply', true);
  }

  // Check required fields on comment form
  wp_register_script('checkcomments', get_template_directory_uri() . '/js/fc-checkcomment.js', 'jquery', '1.0', true);
  if ( get_option('require_name_email') && is_singular() && comments_open() ) {
    wp_enqueue_script('checkcomments');
  }
}
add_action( 'wp_enqueue_scripts', 'onemozilla_load_scripts' );

/*********
* Remove WP version from head (helps us evade spammers/hackers)
*/
remove_action('wp_head', 'wp_generator');

/*********
* Catch spambots with a honeypot field in the comment form.
* It's hidden from view with CSS so most humans will leave it blank, but robots will kindly fill it in to alert us to their presence.
* The field has an innucuous name -- 'age' in this case -- likely to be autofilled by a robot.
*/
function fc_honeypot( array $data ){
  if( !isset($_POST['comment']) && !isset($_POST['content'])) { die("No Direct Access"); }  // Make sure the form has actually been submitted

  if($_POST['age']) {  // If the Honeypot field has been filled in
    $message = _e('Sorry, you appear to be a spamming robot because you filled in the hidden spam trap field. To show you are not a spammer, submit your comment again and leave the field blank.', 'onemozilla');
    $title = 'Spam Prevention';
    $args = array('response' => 200);
    wp_die( $message, $title, $args );
    exit(0);
  } else {
     return $data;
  }
}
add_filter('preprocess_comment','fc_honeypot');

/*********
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function onemozilla_remove_recent_comments_style() {
  add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'onemozilla_remove_recent_comments_style' );

/*********
* Customize the password protected form
*/
function fc_password_form() {
  global $post;
  $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
  $output = '<form class="pwform" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
            <p>'.__('This post is password protected. To view it, please enter the password.', 'onemozilla').'</p>
            <ol><li><label for="'.$label.'">'.__('Password', 'onemozilla').'</label><input name="post_password" id="'.$label.'" type="password" size="20" /></li><li><button type="submit" name="Submit">'.esc_attr__('Submit', 'onemozilla').'</button></li></ol>
            </form>';
return $output;
}
add_filter('the_password_form', 'fc_password_form');



/**
 * Enable a few more buttons in the visual editor
 */
function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'cleanup';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");


/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function onemozilla_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'onemozilla_excerpt_length' );


/**
 * Returns a "Continue Reading" link for excerpts
 */
function onemozilla_continue_reading_link() {
  return ' <a class="go" href="'. esc_url( get_permalink() ) . '">' . __( 'Read more', 'onemozilla' ) . '</a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and onemozilla_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function onemozilla_auto_excerpt_more( $more ) {
  return ' &hellip;' . onemozilla_continue_reading_link();
}
add_filter( 'excerpt_more', 'onemozilla_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function onemozilla_custom_excerpt_more( $output ) {
  if ( has_excerpt() && ! is_attachment() ) {
    $output .= onemozilla_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'onemozilla_custom_excerpt_more' );


/**
 * Register the widgetized sidebar.
 */
function onemozilla_widgets_init() {

  register_sidebar( array(
    'name' => __( 'Sidebar', 'onemozilla' ),
    'id' => 'sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => __( 'Article Footer', 'onemozilla' ),
    'id' => 'article-footer',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => "</aside>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

}
add_action( 'widgets_init', 'onemozilla_widgets_init' );


/**********
* Determine if the page is paged and should show posts navigation
*/
function fc_show_posts_nav() {
 global $wp_query;
 return ($wp_query->max_num_pages > 1) ? TRUE : FALSE;
}

/*********
* Determine if a previous post exists (i.e. that this isn't the first one)
*
* @param bool $in_same_cat Optional. Whether link should be in same category.
* @param string $excluded_categories Optional. Excluded categories IDs.
*/
function fc_previous_post($in_same_cat = false, $excluded_categories = '') {
  if ( is_attachment() )
    $post = & get_post($GLOBALS['post']->post_parent);
  else
    $post = get_previous_post($in_same_cat, $excluded_categories);
  if ( !$post )
    return false;
  else
    return true;
}

/*********
* Determine if a next post exists (i.e. that this isn't the last post)
*
* @param bool $in_same_cat Optional. Whether link should be in same category.
* @param string $excluded_categories Optional. Excluded categories IDs.
*/
function fc_next_post($in_same_cat = false, $excluded_categories = '') {
  if ( is_attachment() )
    $post = & get_post($GLOBALS['post']->post_parent);
  else
    $post = get_next_post($in_same_cat, $excluded_categories);
  if ( !$post )
    return false;
  else
    return true;
}

/*********
* Comment Template
*/
if ( ! function_exists( 'onemozilla_comment' ) ) :
function onemozilla_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  $comment_type = get_comment_type();
  $date_format = get_option("date_format");
  $time_format = get_option("time_format");
?>

 <li id="comment-<?php comment_ID(); ?>" <?php comment_class('hentry'); ?>>
  <?php if ( $comment_type == 'trackback' ) : ?>
    <h3 class="entry-title"><?php _e( 'Trackback from ', 'onemozilla' ); ?> <cite><?php esc_html(comment_author_link()); ?></cite>
      <?php /* L10N: Trackback headings read "Trackback from <Site> on <Date> at <Time>:" */ ?>
      <span class="comment-meta"><?php _e('on', 'onemozilla'); ?>
      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title=" <?php _e('Permanent link to this comment by ','onemozilla'); comment_author(); ?>">
      <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
      <?php /* L10N: Trackback headings read "Trackback from <Site> on <Date> at <Time>:" */ ?>
      <?php printf( __('%1$s at %2$s','onemozilla'), get_comment_date($date_format), get_comment_time($time_format) ); ?></time></a>:</span>
    </h3>
  <?php elseif ( $comment_type == 'pingback' ) : ?>
    <h3 class="entry-title"><?php _e( 'Pingback from ', 'onemozilla' ); ?> <cite><?php esc_html(comment_author_link()); ?></cite>
      <?php /* L10N: Pingback headings read "Pingback from <Site> on <Date> at <Time>:" */ ?>
      <span class="comment-meta"><?php _e('on', 'onemozilla'); ?>
      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title="<?php _e('Permanent link to this comment by ','onemozilla'); comment_author(); ?>">
      <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
      <?php /* L10N: Pingback headings read "Pingback from <Site> on <Date> at <Time>:" */ ?>
      <?php printf( __('%1$s at %2$s','onemozilla'), get_comment_date($date_format), get_comment_time($time_format) ); ?></time></a>:</span>
    </h3>
  <?php else : ?>
    <?php if ( ( $comment->comment_author_url != "http://" ) && ( $comment->comment_author_url != "" ) ) : // if author has a link ?>
      <h3 class="entry-title vcard">
        <cite class="author fn"><?php esc_html(comment_author()); ?></cite>
        <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( $comment, 48 ).'</span>'); endif; ?>
        <span class="comment-meta">
        <?php /* L10N: Comment headings read "<Name> wrote on <Date> at <Time>:" */ ?>
        <?php _e('wrote on', 'onemozilla'); ?>
          <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title="<?php _e('Permanent link to this comment by ','onemozilla'); comment_author(); ?>">
            <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
            <?php /* L10N: Comment headings read "<Name> wrote on <Date> at <Time>:" */ ?>
            <?php printf( __('%1$s at %2$s','onemozilla'), get_comment_date($date_format), get_comment_time($time_format) ); ?></time>
          </a>:
        </span>
     </h3>
    <?php else : // author has no link ?>
      <h3 class="entry-title vcard">
        <cite class="author fn"><?php esc_html(comment_author()); ?></cite>
        <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( $comment, 64 ).'</span>'); endif; ?>
        <span class="comment-meta"><?php _e('wrote on', 'onemozilla'); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title="<?php _e('Permanent link to this comment by ','onemozilla'); comment_author(); ?>">
        <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
        <?php /* L10N: Comment headings read "<Name> wrote on <Date> at <Time>:" */ ?>
        <?php printf( __('%1$s at %2$s','onemozilla'), get_comment_date($date_format), get_comment_time($time_format) ); ?></time></a>:</span>
      </h3>
    <?php endif; ?>
  <?php endif; ?>

    <?php if ($comment->comment_approved == '0') : ?>
      <p class="mod"><strong><?php _e('Your comment is awaiting moderation.', 'onemozilla'); ?></strong></p>
    <?php endif; ?>

    <blockquote class="entry-content">
      <?php esc_html(comment_text()); ?>
    </blockquote>

  <?php if ( (get_option('thread_comments') == true) || (current_user_can('edit_post', $comment->comment_post_ID)) ) : ?>
    <p class="comment-util"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php if ( current_user_can('edit_post', $comment->comment_post_ID) ) : ?><span class="edit"><?php edit_comment_link(__('Edit Comment','onemozilla'),'',''); ?></span><?php endif; ?></p>
  <?php endif; ?>
<?php
} /* end onemozilla_comment */
endif;


?>
