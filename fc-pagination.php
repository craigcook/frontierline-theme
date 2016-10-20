<?php
/*
Plugin Name: FC Pagination
Author: Craig Cook
Author URI: http://www.focalcurve.com/
Description: Show numbered pagination instead of "Next page" and "Previous Page".
Version: 1.1

Based on WP Page Numbers, by Jens Törnell (http://www.jenst.se)
*/

function fc_pagination_check_num($num) {
  return ($num%2) ? true : false;
}

function fc_pagination_page_of_page($max_page, $paged, $page_of_page_text, $page_of_of) {
  $pagingString = "";
  if ( $max_page > 1)
  {
    $pagingString .= '<li class="page-status"><span>This is </span>';
    if($page_of_page_text == "")
      $pagingString .= 'Page ';
    else
      $pagingString .= $page_of_page_text . ' ';

    if ( $paged != "" )
      $pagingString .= $paged;
    else
      $pagingString .= 1;

    if($page_of_of == "")
      $pagingString .= ' of ';
    else
      $pagingString .= ' ' . $page_of_of . ' ';
    $pagingString .= floor($max_page).'</li>';
  }
  return $pagingString;
} /* *** end function fc_pagination_page_of_page *** */

function fc_pagination_prevpage($paged, $max_page, $prevpage) {
  if( $max_page > 1 && $paged > 1 )
    $pagingString = '<li class="prev"><a href="'.get_pagenum_link($paged-1). '">'.$prevpage.'</a></li>';
  return $pagingString;
} /* *** end function fc_pagination_prevpage *** */

function fc_pagination_left_side($max_page, $limit_pages, $paged, $pagingString) {
  $pagingString = "";
  $page_check_max = false;
  $page_check_min = false;
  if($max_page > 1)
  {
    for($i=1; $i<($max_page+1); $i++)
    {
      if( $i <= $limit_pages )
      {
        if ($paged == $i || ($paged == "" && $i == 1))
          $pagingString .= '<li class="current"><span>You\'re on page </span><strong>'.$i.'</strong></li>'."\n";
        else
          $pagingString .= '<li><a href="'.get_pagenum_link($i). '"><span>Go to page </span>'.$i.'</a></li>'."\n";
        if ($i == 1)
          $page_check_min = true;
        if ($max_page == $i)
          $page_check_max = true;
      }
    }
    return array($pagingString, $page_check_max, $page_check_min);
  }
} /* *** end function fc_pagination_left_side *** */

function fc_pagination_middle_side($max_page, $paged, $limit_pages_left, $limit_pages_right) {
  $pagingString = "";
  $page_check_max = false;
  $page_check_min = false;
  for($i=1; $i<($max_page+1); $i++)
  {
    if($paged-$i <= $limit_pages_left && $paged+$limit_pages_right >= $i)
    {
      if ($paged == $i)
        $pagingString .= '<li class="current"><span>You\'re on page </span><strong>'.$i.'</strong></li>'."\n";
      else
        $pagingString .= '<li><a href="'.get_pagenum_link($i). '"><span>Go to page </span>'.$i.'</a></li>'."\n";

      if ($i == 1)
        $page_check_min = true;
      if ($max_page == $i)
        $page_check_max = true;
    }
  }
  return array($pagingString, $page_check_max, $page_check_min);
} /* *** end function fc_pagination_middle_side *** */

function fc_pagination_right_side($max_page, $limit_pages, $paged, $pagingString) {
  $pagingString = "";
  $page_check_max = false;
  $page_check_min = false;
  for($i=1; $i<($max_page+1); $i++)
  {
    if( ($max_page + 1 - $i) <= $limit_pages )
    {
      if ($paged == $i)
        $pagingString .= '<li class="current"><span>You\'re on page </span><strong>'.$i.'</strong></li>'."\n";
      else
        $pagingString .= '<li><a href="'.get_pagenum_link($i). '">'.$i.'</a></li>'."\n";

      if ($i == 1)
      $page_check_min = true;
    }
    if ($max_page == $i)
      $page_check_max = true;

  }
  return array($pagingString, $page_check_max, $page_check_min);
} /* *** end function fc_pagination_right_side *** */

function fc_pagination_nextpage($paged, $max_page, $nextpage) {
  if( $paged != "" && $paged < $max_page)
    $pagingString = '<li class="next"><a href="'.get_pagenum_link($paged+1). '">'.$nextpage.'</a></li>'."\n";
  return $pagingString;
} /* *** end function fc_pagination_nextpage *** */

function fc_pagination() {
  global $wp_query;
  global $max_page;
  global $paged;
  global $showpagination;
  if ( !$max_page ) { $max_page = $wp_query->max_num_pages; }
  if ( !$paged ) { $paged = 1; }

  $settings = get_option('fc_pagination_array');
  $page_of_page = $settings["page_of_page"];
  $page_of_page_text = $settings["page_of_page_text"];
  $page_of_of = $settings["page_of_of"];

  $next_prev_text = $settings["next_prev_text"];
  $show_start_end_numbers = $settings["show_start_end_numbers"];
  $show_page_numbers = $settings["show_page_numbers"];

  $limit_pages = $settings["limit_pages"];
  $nextpage = $settings["nextpage"];
  $prevpage = $settings["prevpage"];
  $startspace = $settings["startspace"];
  $endspace = $settings["endspace"];

  if( $nextpage == "" ) { $nextpage = "Next"; }
  if( $prevpage == "" ) { $prevpage = "Previous"; }
  if( $startspace == "" ) { $startspace = "&hellip;"; }
  if( $endspace == "" ) { $endspace = "&hellip;"; }

  if($limit_pages == "") { $limit_pages = "10"; }
  elseif ( $limit_pages == "0" ) { $limit_pages = $max_page; }

  if(fc_pagination_check_num($limit_pages) == true) {
    $limit_pages_left = ($limit_pages-1)/2;
    $limit_pages_right = ($limit_pages-1)/2;
  }
  else {
    $limit_pages_left = $limit_pages/2;
    $limit_pages_right = ($limit_pages/2)-1;
  }

  if( $max_page <= $limit_pages ) { $limit_pages = $max_page; }

  $pagingString = "<div class='pagination'>\n";
  $pagingString .= '<ol>';

  if($page_of_page != "no")
    $pagingString .= fc_pagination_page_of_page($max_page, $paged, $page_of_page_text, $page_of_of);

  if( ($paged) <= $limit_pages_left ) {
    list ($value1, $value2, $page_check_min) = fc_pagination_left_side($max_page, $limit_pages, $paged, $pagingString);
    $pagingMiddleString .= $value1;
  }
  elseif( ($max_page+1 - $paged) <= $limit_pages_right ) {
    list ($value1, $value2, $page_check_min) = fc_pagination_right_side($max_page, $limit_pages, $paged, $pagingString);
    $pagingMiddleString .= $value1;
  }
  else {
    list ($value1, $value2, $page_check_min) = fc_pagination_middle_side($max_page, $paged, $limit_pages_left, $limit_pages_right);
    $pagingMiddleString .= $value1;
  }
  if($next_prev_text != "no") {
    $pagingString .= fc_pagination_prevpage($paged, $max_page, $prevpage);
    if ($page_check_min == false && $show_start_end_numbers != "no") {
      $pagingString .= "<li class=\"first\">";
      $pagingString .= "<a href=\"" . get_pagenum_link(1) . "\"><span>Go to page </span> 1</a>";
      $pagingString .= "</li>\n<li class=\"gap\">".$startspace."</li>\n";
    }
  }

  if($show_page_numbers != "no") {
    $pagingString .= $pagingMiddleString;

    if ($value2 == false && $show_start_end_numbers != "no") {
      $pagingString .= "<li class=\"gap\">".$endspace."</li>\n";
      $pagingString .= "<li class=\"last\">";
      $pagingString .= "<a href=\"" . get_pagenum_link($max_page) . "\"><span>Go to page </span>" . $max_page . "</a>";
      $pagingString .= "</li>\n";
    }
  }

  if($next_prev_text != "no") {
    $pagingString .= fc_pagination_nextpage($paged, $max_page, $nextpage);
  }
  $pagingString .= "</ol>\n";
  $pagingString .= "</div>\n";

  if(
    $page_of_page == "no"
    && $next_prev_text == "no"
    && $show_start_end_numbers == "no"
    && $show_page_numbers == "no"
    ) {
    $showpagination == false; // if there's nothing to show, then show no pagination
  }

  else {
    if($max_page != 1)
      echo $pagingString;
  }
} /* *** end function fc_pagination *** */


function fc_pagination_settings() {
  if(isset($_POST['submitted'])) {
    if($_POST["page_of_page"] == "")
      $_POST["page_of_page"] = "no";
    if($_POST["next_prev_text"] == "")
      $_POST["next_prev_text"] = "no";
    if($_POST["show_start_end_numbers"] == "")
      $_POST["show_start_end_numbers"] = "no";
    if($_POST["show_page_numbers"] == "")
      $_POST["show_page_numbers"] = "no";

    $settings = array (
      "page_of_page"            => $_POST["page_of_page"],
      "page_of_page_text"         => $_POST["page_of_page_text"],
      "page_of_of"            => $_POST["page_of_of"],
      "next_prev_text"          => $_POST["next_prev_text"],
      "show_start_end_numbers"      => $_POST["show_start_end_numbers"],
      "show_page_numbers"         => $_POST["show_page_numbers"],
      "limit_pages"           => $_POST["limit_pages"],
      "nextpage"              => $_POST["nextpage"],
      "prevpage"              => $_POST["prevpage"],
      "startspace"            => $_POST["startspace"],
      "endspace"              => $_POST["endspace"],
    );
    update_option('fc_pagination_array', $settings);

    echo "<div id=\"message\" class=\"updated fade\"><p><strong>Pagination options updated.</strong></p></div>";
  }

  $settings = get_option('fc_pagination_array');

  $page_of_page = $settings["page_of_page"];
  $page_of_page_text = $settings["page_of_page_text"];
  $page_of_of = $settings["page_of_of"];

  $next_prev_text = $settings["next_prev_text"];
  $show_start_end_numbers = $settings["show_start_end_numbers"];
  $show_page_numbers = $settings["show_page_numbers"];

  $limit_pages = $settings["limit_pages"];

  $nextpage = $settings["nextpage"];
  $prevpage = $settings["prevpage"];
  $startspace = $settings["startspace"];
  $endspace = $settings["endspace"];

?>

<form method="post" name="options" target="_self">
  <div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div>
    <h2>Pagination Settings</h2>

    <h3>Text</h3>
    <p>You can set all the text strings to any values you like, though numbers will always be numbers. The text strings will fall back to their default values if left blank. To prevent part of the menu from displaying, uncheck the show/hide option for that component.</p>
    <table style="width: 100%;" border="0">
      <tr>
        <td style="width: 300px;"><label for="page_of_page_text"><strong>Page</strong> <em>(Default: "Page" X of Y)</em></label></td>
        <td colspan="3">
          <input name="page_of_page_text" id="page_of_page_text" type="text" value="<?php echo $page_of_page_text; ?>" />
        </td>
      </tr>

      <tr>
        <td><label for="page_of_of"><strong>of</strong> <em>(Default: Page X "of" Y)</em></label></td>
        <td colspan="3">
          <input name="page_of_of" id="page_of_of" type="text" value="<?php echo $page_of_of; ?>" />
        </td>
      </tr>

      <tr>
        <td><label for="prevpage"><strong>Previous page</strong> <em>(Default: "Previous")</em></label></td>
        <td colspan="3">
          <input name="prevpage" id="prevpage" type="text" value="<?php echo $prevpage; ?>" />
        </td>
      </tr>

      <tr>
        <td><label for="startspace"><strong>Beginning spacer</strong> <em>(Default: "&hellip;")</em></label></td>
        <td colspan="3">
          <input name="startspace" id="startspace" type="text" value="<?php echo $startspace; ?>" />
        </td>
      </tr>

      <tr>
        <td><label for="endspace"><strong>End spacer</strong> <em>(Default: "&hellip;")</em></label></td>
        <td colspan="3">
          <input name="endspace" id="endspace" type="text" value="<?php echo $endspace; ?>" />
        </td>
      </tr>

      <tr>
        <td><label for="nextpage"><strong>Next page</strong> <em>(Default: "Next")</em></label></td>
        <td colspan="3">
          <input name="nextpage" id="nextpage" type="text" value="<?php echo $nextpage; ?>" />
        </td>
      </tr>
    </table>
    </fieldset>
  </div>

  <div class="wrap">
    <fieldset>
    <h3>Show / Hide</h3>
    <p>Use the show/hide options to suppress the display of different parts of the pagination menu. Hiding all the parts will hide the entire pagination menu. Naturally this means there will be no mechanism to navigate through pages unless an alternative is provided (archives, a plugin, etc.) so uncheck with caution.</p>

      <p><label for="page_of_page">
        <input type="checkbox" name="page_of_page" id="page_of_page" <?php
        if($page_of_page == "on" || $page_of_page == "")
        {
          echo 'checked="checked"';
        }
        ?>/> Show page status <em>(E.g.: "Page 3 of 5")</em></label>
      </p>

      <p><label for="next_prev_text">
        <input type="checkbox" name="next_prev_text" id="next_prev_text" <?php
        if($next_prev_text == "on" || $next_prev_text == "")
        {
          echo 'checked="checked"';
        }
        ?>/> Show next / previous page text <em>(E.g.: "Previous" and "Next")</em></label>
      </p>

      <p><label for="show_start_end_numbers">
        <input type="checkbox" name="show_start_end_numbers" id="show_start_end_numbers" <?php
        if($show_start_end_numbers == "on" || $show_start_end_numbers == "")
        {
          echo 'checked="checked"';
        }
        ?>/> Show start and end numbers <em>(E.g.: "1&hellip;" "&hellip;5")</em></label>
      </p>

      <p><label for="show_page_numbers">
        <input type="checkbox" name="show_page_numbers" id="show_page_numbers" <?php
        if($show_page_numbers == "on" || $show_page_numbers == "")
        {
          echo 'checked="checked"';
        }
        ?>/> Show page numbers <em>(E.g.: "3 4 5 6 7")</em></label>
      </p>
    </fieldset>
  </div>

  <div class="wrap">
    <h3>Number of Pages</h3>
    <p>This will limit the maximum number of pages displayed in the menu (10 is the default). Setting this to 0 removes this limitation (every page will appear in the menu, which may be undesirable if there are a great many pages).</p>
    <table style="width: 100%;" border="0">
      <tr>
        <td style="width: 300px;"><label for="limit_pages"><strong>Number of pages to show: </strong> <em>(Default: 10)</em></label></td>
        <td colspan="3">
          <input name="limit_pages" id="limit_pages" type="text" value="<?php echo $limit_pages; ?>" /> <em>(0 = unlimited)</em>
        </td>
      </tr>
    </table>
  </div>

  <p class="submit">
    <input name="submitted" type="hidden" value="yes" />
    <input type="submit" name="Submit" value="Update Settings" class="button-primary" />
  </p>
</form>

<?php
} /* *** end function fc_pagination_settings *** */

function fc_pagination_add_to_menu() {
    add_submenu_page('options-general.php', 'FC Pagination', 'FC Pagination', 10, __FILE__, 'fc_pagination_settings');
}
add_action('admin_menu', 'fc_pagination_add_to_menu');

/* *** end Pagination *** */
?>
