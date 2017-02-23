<?php
/**
 * Display comments and the comment form.
 */

// If the post is protected bail out before loading any comments.
if (post_password_required()) {
  return;
}
?>

<?php if ( have_comments() || comments_open() || pings_open() ) : // If there are comments OR comments are open OR pings are open ?>

<section id="comments" class="section">
  <div class="content">
  <header class="comments-head">
    <?php if (have_comments()) : ?>
      <h3>
      <?php
        $comments_number = get_comments_number();
        if ( 1 === $comments_number ) {
          /* L10n: %s: post title */
          printf( _x('One comment on &ldquo;%s&rdquo;', 'comments title', 'frontierline'), get_the_title());
        } else {
          printf(
            /* L10n: 1: number of comments, 2: post title */
            _nx(
              '%1$s comment on &ldquo;%2$s&rdquo;',
              '%1$s comments on &ldquo;%2$s&rdquo;',
              $comments_number,
              'comments title',
              'frontierline'
            ),
            number_format_i18n($comments_number),
            get_the_title()
          );
        }
      ?>
      </h3>
    <?php else : ?>
      <h3><?php _e('No comments yet', 'frontierline'); ?></h3>
    <?php endif; ?>

    <?php if (comments_open()) : ?>
      <p class="cmt-post"><a href="#respond"><?php _e('Post a comment','frontierline'); ?></a></p>
    <?php endif; ?>
  </header>

<?php if ( have_comments() ) : // If there are comments ?>
  <ol id="comment-list" class="comment-list hfeed">
  <?php wp_list_comments('type=all&style=ol&callback=frontierline_comment'); // Comment template is in functions.php ?>
  </ol>

  <?php if (get_comment_pages_count() > 1) : // If comment paging is enabled and there are enough comments to paginate, show the comment paging ?>
    <p class="pages"><?php _e('More comments:', 'frontierline'); paginate_comments_links(); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php if (!comments_open() && pings_open()) : // If comments are closed but pings are open ?>
  <p class="comments-closed pings-open">
    <?php
    /* L10n: 'trackbacks' are when another website refers to this blog post with a link notification */
    printf(__('Comments are closed, but <a href="%1$s" title="Trackback URL for this post">trackbacks</a> are open.', 'frontierline'), get_trackback_url()); ?>
  </p>
<?php endif; ?>

<?php if (comments_open()) : ?>

  <div id="respond">
  <?php if (get_option('comment_registration')) : // If registration is required and you're not logged in, show a message ?>
    <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'frontierline'), esc_attr(wp_login_url(get_permalink()))); ?></p>
  <?php else : // else show the form ?>
    <form id="comment-form" action="<?php echo esc_attr(get_option('siteurl')); ?>/wp-comments-post.php" method="post">
      <fieldset>
        <legend><span><?php comment_form_title(__('Post your comment', 'frontierline'), __('Reply to %s', 'frontierline')); ?></span></legend>
        <p id="cancel-comment-reply"><?php cancel_comment_reply_link(__('Cancel reply', 'frontierline')); ?></p>
        <ol>
        <?php if ($user_ID) : ?>
          <li class="self"><?php printf( __( 'You are logged in as <a href="%1$s">%2$s</a>. <a class="logout" href="%3$s">Log out?</a>', 'frontierline'), admin_url( 'profile.php' ), esc_html($user_identity), wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ); ?></li>
        <?php else : ?>
          <li id="cmt-name">
            <label for="author"><?php _e('Your name', 'frontierline'); ?> <?php if ($req) : ?><span class="note"><?php _e('(required)', 'frontierline'); ?></span><?php endif; ?></label>
            <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="25" <?php if ($req) echo 'required aria-required="true"'; ?>>
          </li>
          <li id="cmt-email">
            <label for="email"><?php _e('Your e-mail address', 'frontierline'); ?> <?php if ($req) : ?><span class="note"><?php _e('(required, will not be published)', 'frontierline'); ?></span><?php endif; ?></label>
            <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="25" <?php if ($req) echo 'required aria-required="true"'; ?>>
          </li>
          <li id="cmt-ackbar">
            <label for="age"><?php _e('Spamming robots, please fill in this field. Real humans should leave it blank.', 'frontierline'); ?></label>
            <input type="text" name="age" id="age" size="4" tabindex="-1">
          </li>
        <?php endif; ?>
          <li id="cmt-cmt">
            <label for="comment"><?php _e('Your comment', 'frontierline'); ?></label>
            <textarea name="comment" id="comment" cols="50" rows="10"></textarea>
          </li>
          <li id="comment-submit">
            <button name="submit" type="submit" class="button"><?php _e('Submit', 'frontierline'); ?></button>
            <?php comment_id_fields(); ?>
            <?php do_action('comment_form', $post->ID); ?>
          </li>
        </ol>
      </fieldset>
    </form>
  <?php endif; // end if reg required and not logged in ?>
  </div><?php // end #respond ?>
<?php endif; // end if comments open ?>
  </div>
</section><?php // end #comments ?>

<?php endif; // if you delete this the sky will fall on your head ?>
