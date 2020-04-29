<?php
if (! function_exists('frontierline_setup')):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override frontierline_setup() in a child theme, add your own frontierline_setup
 * function to your child theme's functions.php file.
 */
function frontierline_setup() {

  // Make the theme available for translation.
  // Translations can be added to the /languages/ directory.
  load_theme_textdomain('frontierline', get_template_directory() . '/languages');

  // Add styles to post editor (editor-style.css)
  add_editor_style();

  // This theme uses Featured Images (also known as post thumbnails)
  add_theme_support('post-thumbnails');

  // Let WordPress generate document titles
  add_theme_support('title-tag');

  // Let WordPress generate feeds
  add_theme_support('automatic-feed-links');

  // Set up some custom image sizes
  add_image_size('post-full-size', 1400, 770, array('center', 'center')); // Full post image - used at the top of single articles
  add_image_size('post-large', 600, 330, array('center', 'center')); // Large post image - used in grid summary view
  add_image_size('post-thumbnail', 300, 165, array('center', 'center')); // Thumbnail post image - used in mini view
  add_image_size('extra-large', 1000, 0); // Extra large image - for big images embedded in posts

  $header_defaults = array(
    'header-text'            => false,
    'width'                  => 1600,
    'height'                 => 600,
  );
  add_theme_support('custom-header', $header_defaults);

  // Indicate widgets can use selective refresh in the Customizer.
  add_theme_support('customize-selective-refresh-widgets');

  // Register custom menus
  register_nav_menu('main_menu', __('Main Menu', 'frontierline'));
  register_nav_menu('site_menu', __('Site Menu', 'frontierline'));
}
endif;
add_action('after_setup_theme', 'frontierline_setup');


/**
 * Do some stuff when the theme is activated.
 */
if (! function_exists('frontierline_activate')):
  function frontierline_activate() {
    // Set default media options
    update_option('thumbnail_size_w', 150, true);
    update_option('thumbnail_size_h', 150, true);
    update_option('thumbnail_crop', 1);
    update_option('medium_size_w', 300, true);
    update_option('medium_size_h', '', true);
    update_option('large_size_w', 600, true);
    update_option('large_size_h', '', true);
  }
endif;
add_action('after_switch_theme', 'frontierline_activate');


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Register and define the social sharing settings
 */
function frontierline_admin_init(){
  register_setting(
    'reading',
    'frontierline_newsform_posts',
    array(
      'default' => 1,
    )
);
  add_settings_field(
    'newsform_posts',
    __('Show newsletter form under posts', 'frontierline'),
    'frontierline_settings_field_newsform_posts',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'frontierline_newsform_pages',
    array(
      'default' => 1,
    )
  );
  add_settings_field(
    'newsform_pages',
    __('Show newsletter form on Pages', 'frontierline'),
    'frontierline_settings_field_newsform_pages',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'frontierline_newsform_other',
    array(
      'default' => 1,
    )
  );
  add_settings_field(
    'newsform_other',
    __('Show newsletter form under posts lists and other views', 'frontierline'),
    'frontierline_settings_field_newsform_other',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'frontierline_share_posts'
  );
  add_settings_field(
    'share_posts',
    __('Social sharing for posts', 'frontierline'),
    'frontierline_settings_field_share_posts',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'frontierline_share_pages'
  );
  add_settings_field(
    'share_pages',
    __('Social sharing for Pages', 'frontierline'),
    'frontierline_settings_field_share_pages',
    'reading',
    'default'
  );

  register_setting(
    'reading',
    'frontierline_twitter_username'
  );
  add_settings_field(
    'twitter_username',
    __('Twitter username', 'frontierline'),
    'frontierline_settings_field_twitter_username',
    'reading',
    'default'
  );
}
add_action('admin_init', 'frontierline_admin_init');


/**
 * Renders the Newsletter form setting field for posts.
 */
function frontierline_settings_field_newsform_posts() { ?>
    <div class="layout newsform-posts">
        <label>
            <input type="checkbox" id="frontierline_newsform_posts" name="frontierline_newsform_posts" value="1" <?php checked( '1', get_option('frontierline_newsform_posts') ); ?>>
            <span>
      <?php _e('Show newsletter form under posts', 'frontierline'); ?>
    </span>
            <p class="description"><?php _e('Adds a subscribe form to the Mozilla newsletter to the bottom of blog articles.', 'frontierline'); ?></p>
        </label>
    </div>
    <?php
}

/**
 * Renders the Newsletter form setting field for pages.
 */
function frontierline_settings_field_newsform_pages() { ?>
    <div class="layout newsform-pages">
        <label>
            <input type="checkbox" id="frontierline_newsform_pages" name="frontierline_newsform_pages" value="1" <?php checked( '1', get_option('frontierline_newsform_pages') ); ?>>
            <span>
      <?php _e('Show newsletter form on Pages', 'frontierline'); ?>
    </span>
            <p class="description"><?php _e('Adds a subscribe form to the Mozilla newsletter to the bottom of static Pages.', 'frontierline'); ?></p>
        </label>
    </div>
    <?php
}

/**
 * Renders the Newsletter form setting field for post lists and other views.
 */
function frontierline_settings_field_newsform_other() { ?>
    <div class="layout newsform-other">
        <label>
            <input type="checkbox" id="frontierline_newsform_other" name="frontierline_newsform_other" value="1" <?php checked( '1', get_option('frontierline_newsform_other') ); ?>>
            <span>
      <?php _e('Show newsletter form under posts lists and other views', 'frontierline'); ?>
    </span>
            <p class="description"><?php _e('Adds a subscribe form to the Mozilla newsletter to the bottom of posts lists and other views.', 'frontierline'); ?></p>
        </label>
    </div>
    <?php
}

/**
 * Renders the Add Sharing setting field for posts.
 */
function frontierline_settings_field_share_posts() { ?>
  <div class="layout share-posts">
  <label>
    <input type="checkbox" id="frontierline_share_posts" name="frontierline_share_posts" value="1" <?php checked( '1', get_option('frontierline_share_posts') ); ?>>
    <span>
      <?php _e('Add social sharing buttons to posts', 'frontierline'); ?>
    </span>
    <p class="description"><?php _e('Adds buttons for Twitter and Facebook to the top of blog articles.', 'frontierline'); ?></p>
  </label>
  </div>
  <?php
}

/**
 * Renders the Add Sharing setting field for pages.
 */
function frontierline_settings_field_share_pages() { ?>
  <div class="layout share-pages">
  <label>
    <input type="checkbox" id="frontierline_share_pages" name="frontierline_share_pages" value="1" <?php checked( '1', get_option('frontierline_share_pages') ); ?>>
    <span>
      <?php _e('Add social sharing buttons to Pages', 'frontierline'); ?>
    </span>
    <p class="description"><?php _e('Adds buttons for Twitter and Facebook to the top of static Pages.', 'frontierline'); ?></p>
  </label>
  </div>
  <?php
}

/**
* Renders the Twitter account setting field to share via.
*/
function frontierline_settings_field_twitter_username() { ?>
  <div class="layout twitter-username">
  <label>
    <input type="text" id="frontierline_twitter_username" name="frontierline_twitter_username" value="<?php echo get_option('frontierline_twitter_username'); ?>">
    <p class="description"><?php _e('The Twitter account for attribution when sharing. Appears as "via @username" at the end of the tweet, and Twitter may suggest related accounts to follow. Leave this blank for no attribution.', 'frontierline'); ?></p>
  </label>
  </div>
  <?php
}


/**
* Make custom image sizes available in admin
*/
function frontierline_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'extra-large' => __('Extra Large', 'frontierline'),
    ) );
}
add_filter('image_size_names_choose', 'frontierline_custom_sizes');


/**
* Use auto-excerpts for meta description if hand-crafted exerpt is missing
*/
function frontierline_meta_desc() {
  $post_desc_length = 30; // auto-excerpt length in number of words

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
      $description = single_cat_title('Articles posted in ', 'frontierline');
    }
  }
  else {
    $description = trim(strip_tags(get_bloginfo('description')));
  }

  if($description) {
    echo $description;
  }
}


/**
* Disable the embedded styles when using [gallery] shortcode
*/
add_filter('use_default_gallery_style', '__return_false');


/**
* Disable comments on Pages by default
*
* This is a hack. WP doesn't currently make it possible to enable comments
* by default for Posts while disabling them for Pages; it's either comments on
* all or comments on none. But in most cases authors will prefer to turn off
* comments for Pages. This just unchecks those checkboxes automatically so authors
* don't need to remember. Comments can still be enabled for Pages on an individual
* basis.
*/
function frontierline_page_comments_off() {
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
add_action ('admin_footer', 'frontierline_page_comments_off');


/**
* Replace the default title separator.
*/
function frontierline_document_title_separator() {
  $sep = '–'; // this is en dash, not a hyphen
  return $sep;
}
add_filter('document_title_separator', 'frontierline_document_title_separator');


/**
* Returns the page number currently being browsed.
*/
function frontierline_page_number() {
  global $paged; // Contains page number.
  $sep = ' ' . frontierline_document_title_separator() . ' ';
  if ($paged >= 2) {
    return $sep . sprintf(__('Page %s', 'frontierline'), $paged);
  }
}


/**
* Prints a nice multipart page title.
* Used in the meta tags where wp_title() doesn't cut it.
*/
function frontierline_meta_page_title() {
    $pagenum = frontierline_page_number();
    $sep = ' ' . frontierline_document_title_separator() . ' ';
    $sitename = get_bloginfo('name');

    if (is_single()) {
        $title = single_post_title('', false) . $sep . $sitename;
    }
    elseif (is_home() || is_front_page()) {
        $title = $sitename . $pagenum;
        if (get_bloginfo('description', 'display')) {
            $title .= $sep . get_bloginfo('description', 'display');
        }
    }
    elseif (is_page()) {
        $title = single_post_title('', false) . $sep . $sitename;
    }
    elseif (is_archive()) {
        if (is_category()) {
            $title = sprintf(__('Articles in “%s”', 'frontierline'), single_cat_title('', false)) . $pagenum . $sep . $sitename;
        } elseif (is_tag()) {
            $title = sprintf(__('Articles tagged with “%s”','frontierline'), single_tag_title('', false)) . $pagenum . $sep . $sitename;
        } elseif (is_author()) {
            $title = sprintf(__('Articles by %s', 'frontierline'), get_the_author()) . $pagenum . $sep . $sitename;
        } elseif (is_day()) {
            $title = sprintf(__('Articles from %s', 'frontierline'), get_the_date()) . $pagenum . $sep . $sitename;
        } elseif (is_month()) {
            $title = sprintf(__('Articles from %s', 'frontierline'), get_the_date('F, Y')) . $pagenum . $sep . $sitename;
        } elseif (is_year()) {
            $title = sprintf(__('Articles from %s', 'frontierline'), get_the_date('Y')) . $pagenum . $sep . $sitename;
        } else {
            $title = get_the_archive_title() . $pagenum . $sep . $sitename;
        }
    } elseif (is_search()) {
        $title = sprintf(__('Search results for “%s”', 'frontierline'), esc_html(get_search_query())) . $pagenum . $sep . $sitename;
    } elseif (is_404()) {
      $title = __('Not Found', 'frontierline') . $sep . $sitename;
    } else {
      $title = wp_title('', false, 'right') . $pagenum . $sep . $sitename;
    }

    echo $title;
}


/*
* Return the current blog domain.
*/
function frontierline_blog_domain() {
    return parse_url(get_site_url())['host'];
}


/*
* Print the current page URL.
*/
function frontierline_current_url() {
    global $wp;
    $current_url = esc_url(home_url(add_query_arg(array(),$wp->request)));

    echo $current_url;
}


/**
* Load various scripts and styles
*/
function frontierline_enqueue_bits() {
  // Load the theme style sheet
  wp_enqueue_style('frontierline', get_stylesheet_uri(), false, filemtime(get_stylesheet_directory() . '/style.css'));

  // Load the default jQuery
  wp_enqueue_script('jquery');

  // Load the global script
  wp_register_script('global', get_template_directory_uri() . '/js/global.js', 'jquery', '2.2', true);
  wp_enqueue_script('global');

  // Load the newsletter script
  wp_register_script('basket-client', get_template_directory_uri() . '/js/basket-client.js', '', '1.2', true);
  wp_enqueue_script('basket-client');

  // Load the threaded comment reply script on pages where threaded comments are enabled
  if (get_option('thread_comments') && is_singular() && comments_open()) {
    wp_enqueue_script('comment-reply', true);
  }
}
add_action( 'wp_enqueue_scripts', 'frontierline_enqueue_bits' );


/**
* Remove WP version from head (helps us evade spammers/hackers)
*/
remove_action('wp_head', 'wp_generator');


/**
* Adjust the comment form fields and order.
*/
function frontierline_comment_form_fields( array $fields ) {
  unset( $fields['url'] );
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}
add_filter( 'comment_form_fields', 'frontierline_comment_form_fields' );


/**
* Catch spambots with a honeypot field in the comment form.
* It's hidden from view with CSS so most humans will leave it blank, but robots will kindly fill it in to alert us to their presence.
* The field has an innucuous name -- 'age' in this case -- likely to be autofilled by a robot.
*/
function frontierline_honeypot_field( array $fields ) {
  $fields['cmt-ackbar'] =
    '<p id="cmt-ackbar"><label for="age">' . __('Spamming robots, please fill in this field. Real humans should leave it blank.', 'frontierline') . '</label>' .
    '<input type="text" name="age" id="age" size="4" tabindex="-1"></p>';
  return $fields;
}
add_filter('comment_form_default_fields', 'frontierline_honeypot_field');

function frontierline_honeypot( array $data ){
  if( !isset($_POST['comment']) && !isset($_POST['content'])) { die("No Direct Access"); }  // Make sure the form has actually been submitted

  if($_POST['age']) {  // If the Honeypot field has been filled in
    $message = _e('Sorry, you appear to be a spamming robot because you filled in the hidden spam trap field. To show you are not a spammer, submit your comment again and leave the field blank.', 'frontierline');
    $title = _e('Spam Prevention', 'frontierline');
    $args = array('response' => 200);
    wp_die( $message, $title, $args );
    exit(0);
  } else {
     return $data;
  }
}
add_filter('preprocess_comment', 'frontierline_honeypot');


/**
* Ask robots not to index some pages.
*/
function frontierline_norobots() {
  if (is_paged() || is_date() || is_search() || is_author()) :
    wp_no_robots();
  endif;
}
add_action('wp_head', 'frontierline_norobots');


/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function frontierline_remove_recent_comments_style() {
  add_filter('show_recent_comments_widget_style', '__return_false');
}
add_action('widgets_init', 'frontierline_remove_recent_comments_style');


/**
 * Set available formats for the visual editor.
 * This removes Heading 1, which is reserved for the post title.
 */
function frontierline_post_formats($formats) {
  $formats['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Preformatted=pre; Code=code;";
  return $formats;
}
add_filter('tiny_mce_before_init', 'frontierline_post_formats');


/**
 * Activate custom formats.
 */
function frontierline_custom_formats($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'frontierline_custom_formats');


/**
 * Insert custom formats into the visual editor.
 * Disclaimer - a note/disclaimer callout, typically at the top or bottom of a post.
 *    Such disclaimers should be part of the post and not a custom field, this format just makes it easier for authors vs needing to edit HTML to add the class.
 */
function frontierline_insert_formats($init_array) {
    $style_formats = array(
        array(
            'title' => 'Disclaimer',
            'block' => 'p',
            'classes' => 'disclaimer',
            'wrapper' => false,
        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}
// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'frontierline_insert_formats');


/**
 * Sets the post excerpt length to 30 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function frontierline_excerpt_length( $length ) {
  return 30;
}
add_filter('excerpt_length', 'frontierline_excerpt_length');


/**
 * Returns a "Read more" link for excerpts
 */
function frontierline_read_more_link() {
  return ' <a class="go" href="'. esc_url( get_permalink() ) . '">' . __('Read more', 'frontierline') . '</a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and frontierline_read_more_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function frontierline_auto_excerpt_more( $more ) {
  return ' &hellip;' . frontierline_read_more_link();
}
add_filter('excerpt_more', 'frontierline_auto_excerpt_more');


/**
 * Adds a pretty "Read more" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function frontierline_custom_excerpt_more($output) {
  if (has_excerpt() && ! is_attachment()) {
    $output .= frontierline_read_more_link();
  }
  return $output;
}
add_filter('get_the_excerpt', 'frontierline_custom_excerpt_more');


/**
 * Register the widgetized sidebar.
 */
function frontierline_widgets_init() {
  register_sidebar( array(
    'name' => __('Sidebar Menu', 'frontierline'),
    'id' => 'sidebar',
    'description'   => esc_html__('Widgets added here will appear in the flyout sidebar.', 'frontierline'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action('widgets_init', 'frontierline_widgets_init');


/**
* Comment Template
*/
if (! function_exists('frontierline_comment')) :
function frontierline_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  $comment_type = get_comment_type();
  $date_format = get_option('date_format');
  $time_format = get_option('time_format');
?>

 <li id="comment-<?php comment_ID(); ?>" <?php comment_class('hentry'); ?>>
  <?php if ($comment_type == 'trackback') : ?>
    <h4 class="entry-title"><?php _e('Trackback from ', 'frontierline'); ?> <cite><?php esc_html(comment_author_link()); ?></cite>
      <?php /* L10n: Trackback headings read "Trackback from <Site> on <Date> at <Time>:" */ ?>
      <span class="comment-meta">
        <?php _e('on', 'frontierline'); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title=" <?php _e('Permanent link to this comment by ','frontierline'); comment_author(); ?>">
          <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
          <?php /* L10n: Trackback headings read "Trackback from <Site> on <Date> at <Time>:" */ ?>
          <?php printf( __('%1$s at %2$s:','frontierline'), get_comment_date($date_format), get_comment_time($time_format) ); ?>
          </time>
        </a>
      </span>
    </h4>
  <?php elseif ($comment_type == 'pingback') : ?>
    <h4 class="entry-title"><?php _e('Ping from ', 'frontierline'); ?> <cite><?php esc_html(comment_author_link()); ?></cite>
      <?php /* L10n: Pingback headings read "Ping from <Site> on <Date> at <Time>:" */ ?>
      <span class="comment-meta">
        <?php _e('on', 'frontierline'); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title="<?php _e('Permanent link to this comment by ','frontierline'); comment_author(); ?>">
          <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
          <?php /* L10n: Pingback headings read "Ping from <Site> on <Date> at <Time>:" */ ?>
          <?php printf( __('%1$s at %2$s:','frontierline'), get_comment_date($date_format), get_comment_time($time_format) ); ?>
          </time>
        </a>
      </span>
    </h4>
  <?php else : ?>
    <h4 class="entry-title vcard">
      <cite class="author fn"><?php esc_html(comment_author()); ?></cite>
      <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( $comment, 60 ).'</span>'); endif; ?>
      <span class="comment-meta">
        <?php _e('wrote on', 'frontierline'); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" rel="bookmark" title="<?php _e('Permanent link to this comment by ','frontierline'); comment_author(); ?>">
          <time class="published" datetime="<?php comment_date('Y-m-d'); ?>" title="<?php comment_date('Y-m-d'); ?>">
          <?php /* L10n: Comment headings read "<Name> wrote on <Date> at <Time>:" */ ?>
          <?php printf( __('%1$s at %2$s:','frontierline'), get_comment_date($date_format), get_comment_time($time_format) ); ?>
          </time>
        </a>
      </span>
    </h4>
  <?php endif; ?>

  <?php if ($comment->comment_approved == '0') : ?>
    <p class="mod-message">
      <strong><?php _e('Your comment is awaiting moderation.', 'frontierline'); ?></strong>
    </p>
  <?php endif; ?>

    <blockquote class="entry-content">
      <?php esc_html(comment_text()); ?>
    </blockquote>

  <?php if ((get_option('thread_comments') == true) || (current_user_can('edit_post', $comment->comment_post_ID))) : ?>
    <p class="comment-util">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      <?php if ( current_user_can('edit_post', $comment->comment_post_ID) ) : ?>
      <span class="edit"><?php edit_comment_link(__('Edit comment', 'frontierline'),'',''); ?></span>
      <?php endif; ?>
    </p>
  <?php endif; ?>
<?php
}
endif;


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array  Difference betwen the two arrays
 */
function frontierline_disable_emojis_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}


/**
 * Disable the emoji scripts and prefetch.
 */
function frontierline_disable_emojis() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('emoji_svg_url', '__return_false');
  add_filter('tiny_mce_plugins', 'frontierline_disable_emojis_tinymce');
}
add_action('init', 'frontierline_disable_emojis');


/**
 * Remind authors to set a featured image if they're enabled.
 */
function frontierline_image_reminder() {
  global $pagenow;
  if (get_theme_mod('frontierline_no_post_image') !== '1' || get_theme_mod('frontierline_no_summary_image') !== '1') {
    $message = __('Remember to include a featured image! It should be at least 1400 by 770 pixels.', 'frontierline');

    if (get_theme_mod('frontierline_no_summary_image') !== '1') {
      $message .= __(' Posts without a featured image will show a standard placeholder image.', 'frontierline');
    }
  }
  if ($pagenow === 'post-new.php') {
    echo '<div class="updated"><p>' . $message . '</p></div>';
  }
}
add_action('admin_notices', 'frontierline_image_reminder');


/**
 * Get a pseudo-random number for the given post.
 */
function frontierline_fallback_image_num( $post_id ) {
  $post_name = get_post($post_id)->post_name;
  $hash_number = hexdec(substr(md5($post_name), 0, 8));
  return ($hash_number%6)+1;
}


/**
 * Adds custom classes to the array of body classes.
 */
function frontierline_body_classes($classes) {
  // Get the color scheme, or the default if there isn't one.
  $colors = frontierline_sanitize_color_scheme(get_theme_mod('frontierline_color_scheme', 'none'));
  $classes[] = 'color-scheme-' . $colors;

  // Get the header pattern, or the default if there isn't one.
  $patterns = frontierline_sanitize_head_pattern(get_theme_mod('frontierline_head_pattern', 'none'));
  $classes[] = 'pattern-' . $patterns;

  return $classes;
}
add_filter('body_class', 'frontierline_body_classes');


/**
 * Metabox for Custom sidebar content (static pages)
 */
define('WYSIWYG_EDITOR_ID', 'myeditor');
define('WYSIWYG_META_KEY', 'extra-content');

// Register the metabox
function frontierline_register_sidebar_metabox() {
  add_meta_box(WYSIWYG_EDITOR_ID, __('Custom Sidebar Content'), 'frontierline_render_sidebar_metabox_cb', 'page');
}

// Callback. Renders the metabox
function frontierline_render_sidebar_metabox_cb($post){
  $editor_id = WYSIWYG_EDITOR_ID;

  $content = get_post_meta($post->ID, WYSIWYG_META_KEY, true);
  wp_editor($content, $editor_id);
}

// save contents of metabox
function frontierline_save_sidebar_metabox(){
  $editor_id = WYSIWYG_EDITOR_ID;
  $meta_key = WYSIWYG_META_KEY;

  if(isset($_REQUEST[$editor_id]))
  update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
}

add_action('admin_init', 'frontierline_register_sidebar_metabox');
add_action('save_post', 'frontierline_save_sidebar_metabox');


/**
 * Hide hero image on single posts
 */
function frontierline_hide_hero($post) {
    wp_nonce_field(basename( __FILE__ ), '_frontierline_hide_hero_nonce');
    $hidden = get_post_meta($post->ID, '_frontierline_hide_hero', true);
  ?>
    <p><?php _e('The image will be used as a thumbnail for this post and for social media, but won‘t appear on the post page.', 'frontierline'); ?></p>
    <label class="selectit" for="frontierline_hide_hero">
      <input type="checkbox" name="_frontierline_hide_hero" id="frontierline_hide_hero" value="1" <?php if ($hidden) { ?>checked<?php } ?>>
      <?php _e('Hide featured image', 'frontierline'); ?>
    </label>
<?php
}

function register_frontierline_hide_hero() {
  if (get_theme_mod('frontierline_no_post_image') !== '1') {
    add_meta_box('postimage-hide', __('Hide Featured Image', 'frontierline'), 'frontierline_hide_hero', array('post','page'), 'side', 'low');
  }
}
add_action('admin_init', 'register_frontierline_hide_hero', 1);

function save_frontierline_hide_hero($post_id, $post) {
  if (!isset($_POST['_frontierline_hide_hero_nonce']) || !wp_verify_nonce($_POST['_frontierline_hide_hero_nonce'], basename( __FILE__ ))) {
    return $post_id;
  }
  if(!current_user_can('edit_post', $post_id)) {
    return $post_id;
  }

  if (isset($_POST['_frontierline_hide_hero'])) {
    update_post_meta($post_id, '_frontierline_hide_hero', true);
  } else {
    update_post_meta($post_id, '_frontierline_hide_hero', false);
  }
}
add_action('save_post', 'save_frontierline_hide_hero', 10, 3);


/**
 * Use custom feed templates.
 * Omits author when 'frontierline_no_byline' is true.
 */
// RSS2 (standard)
function frontierline_feed_rss2() {
  get_template_part('feeds/feed', 'rss2');
}
remove_all_actions('do_feed_rss2');
add_action('do_feed_rss2', 'frontierline_feed_rss2', 10, 1);

// RDF
function frontierline_feed_rdf() {
  get_template_part('feeds/feed', 'rdf');
}
remove_all_actions('do_feed_rdf');
add_action('do_feed_rdf', 'frontierline_feed_rdf', 10, 1);

// Atom
function frontierline_feed_atom() {
  get_template_part('feeds/feed', 'atom');
}
remove_all_actions('do_feed_atom');
add_action('do_feed_atom', 'frontierline_feed_atom', 10, 1);

?>
