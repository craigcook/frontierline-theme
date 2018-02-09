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
        if ( $comments_number == 1 ) {
          /* L10n: %s: post title */
          printf(__('One comment on “%s”', 'frontierline'), get_the_title());
        } else {
          /* L10n: 1: number of comments, 2: post title */
          printf(__('%1$s comments on “%2$s”', 'frontierline'), number_format_i18n($comments_number), get_the_title());
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
<?php
  comment_form( array(
    'id_form' => 'comment-form',
    'cancel_reply_before' => '<p id="cancel-comment-reply">',
    'cancel_reply_after' => '</p>',
    'class_submit' => 'button',
  ) );
?>
<?php endif; // end if comments open ?>
  </div>
</section><?php // end #comments ?>

<?php endif; // if you delete this the sky will fall on your head ?>
