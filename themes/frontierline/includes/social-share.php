<?php
/**
 * Display Twitter and Facebook buttons.
 */

global $post;

$blog_name = sanitize_text_field(get_bloginfo('name'));
$share_url = urlencode(get_permalink($post->ID));
$share_text = urlencode(html_entity_decode(get_the_title($post->ID), ENT_COMPAT, 'UTF-8'));
$share_via = sanitize_text_field(get_option('frontierline_twitter_username'));
?>

<div class="social-share">
  <b><?php _e('Share:', 'frontierline'); ?></b>
  <ul>
    <li><a rel="external nofollow noopener" target="_blank" class="twitter" data-network="Twitter" data-blog="<?php echo $blog_name; ?>" href="https://twitter.com/intent/tweet/?text=<?php echo $share_text; ?>&amp;url=<?php echo $share_url; ?><?php if (get_option('frontierline_twitter_username')) : ?>&amp;via=<?php echo $share_via; endif ?>&amp;utm_source=twitter&amp;utm_medium=social&amp;utm_campaign=shares_from_blog">Twitter</a></li>
    <li><a rel="external nofollow noopener" target="_blank" class="facebook" data-network="Facebook" data-blog="<?php echo $blog_name; ?>" href="https://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo urlencode($share_url); ?>&amp;p[title]=<?php echo urlencode(html_entity_decode($share_text, ENT_COMPAT, 'UTF-8')); ?>&amp;utm_source=facebook&amp;utm_medium=social&amp;utm_campaign=shares_from_blog">Facebook</a></li>
  </ul>
</div>
