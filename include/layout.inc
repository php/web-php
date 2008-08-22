<?php
/* $Id$ */

// Set the static content root differently on php.net
$_SERVER['STATIC_ROOT'] = ($MYSITE == 'http://www.php.net/') ?
                          'http://static.php.net/www.php.net' : '';

// Use class names instead of colors
ini_set('highlight.comment', 'comment');
ini_set('highlight.default', 'default');
ini_set('highlight.keyword', 'keyword');
ini_set('highlight.string',  'string');
ini_set('highlight.html',    'html');

// Highlight PHP code
function highlight_php($code, $return = FALSE)
{
    // Using OB, as highlight_string() only supports
    // returning the result from 4.2.0
    ob_start();
    highlight_string($code);
    $highlighted = ob_get_contents();
    ob_end_clean();

	// This should eventually be a php_syntax_check() call when we move to PHP5
	// But use this ugly hack for now to avoid code snippets with bad syntax screwing up the highlighter   
	if(strstr($highlighted,"include/layout.inc</b>")) $highlighted = '<span class="html">'.nl2br(htmlentities($code))."</span>";
 
    // Fix output to use CSS classes and wrap well
    $highlighted = '<div class="phpcode">' . str_replace(
        array(
            '&nbsp;',
            '<br />',
            '<font color="',        // for PHP 4
            '<span style="color: ', // from PHP 5.0.0RC1
            '</font>',
            "\n ",
            '  ',
            '  '
        ),
        array(
            ' ',
            "<br />\n",
            '<span class="',
            '<span class="',
            '</span>',
            "\n&nbsp;",
            '&nbsp; ',
            '&nbsp; '
        ),
        $highlighted
    ) . '</div>';
    
    if ($return) { return $highlighted; }
    else { echo $highlighted; }
}

// Stats pages still need this
function commonHeader($title) { site_header($title); }

function site_header($title = '', $config = array())
{
    global $EXPL_LANG, $PGI, $PRE_DATA;
    
    // Default to empty array if improper parameter passed
    if (!is_array($config)) { $config = array(); }
    
    // String defaults
    $lang_input = $base = $meta = '';
    
    // Print out lang and charset headers
    if (!isset($config["lang"]))    { $config["lang"] = "en"; }
    if (!isset($config["charset"])) { $config["charset"] = "utf-8"; }
    header("Content-type: text/html;charset={$config['charset']}");
    header("Content-language: {$config['lang']}");
    
    if (!empty($title)) { $title = ": $title"; }
    
    // This page should not be indexed by robots
    if (in_array("noindex", $config)) {
        $meta .= "\n <meta name=\"robots\" content=\"noindex\" />";
    }
    
    // Set onload handler if required
    $onload = (isset($config['onload']) ? ' onload="' . $config['onload'] . '"' : '');
    
    // Explicit language setting means that we should put that into the form
    if (isset($EXPL_LANG)) {
        $lang_input = "\n   <input type=\"hidden\" name=\"lang\" value=\"$EXPL_LANG\" />";
    }
    
    // Link tags
    $link = "";
    if (isset($config['link']) && is_array($config['link'])) {
        foreach($config['link'] as $rel => $url) {
            if (!is_array($url)) {
                $link .= "\n <link rel=\"$rel\" href=\"$url\" />";
            } else {
                $link .= "\n <link ";
                foreach($url as $attr => $val) {
                    $link .= "$attr=\"$val\" ";
                }
                $link .= "/>";
            }
        }
    }

    // Base href setting for URL shortcuts to work
    if (!empty($_SERVER['BASE_HREF'])) {
        $base = "\n <base href=\"{$_SERVER['BASE_HREF']}\" />";
    }
    
    // Choose name of mirror site specific CSS file
    $mirror_specific_style = ($_SERVER['STATIC_ROOT'] ? 'phpnet' : 'mirror');
    
    // Support for more header tags
    $moreheadtags = '';
    if (isset($config['headtags'])) {
      if (is_array($config['headtags'])) {
        $moreheadtags = "\n " . join("\n ", $config['headtags']);
      } else {
        $moreheadtags = "\n " . ((string)$config['headtags']);
      }
    } 
    $classname = "default";
    if(isset($_SERVER['BASE_PAGE'])) {
        $classname = dirname($_SERVER['BASE_PAGE']);
        if(empty($classname)) {
            $classname = "default";
        }
    }

    // Right-to-left support
    $rtl = "";
    if (isset($PGI, $PGI['head'], $PGI['head'][1])) {
        switch (language_convert($PGI['head'][1])) {
            case "he":
            case "ar":
                $rtl = ' style="direction: rtl"';
                break;
        }
    }

    $profile = "";
    if (isset($config['profile']) && !empty($config['profile'])) {
        $profile = ' profile="';
        if (is_array($config['profile'])) {
            $profile .= implode(" ", $config['profile']);
        } else {
            $profile .= $config['profile'];
        }
        $profile .= '"';
    }
 

    print <<<END_HEADER
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head{$profile}>
  <title>PHP{$title}</title>
  <meta http-equiv="Content-Type" content="text/html; charset={$config['charset']}" />
  <link type="text/css" media="screen" rel="stylesheet" href="{$_SERVER['STATIC_ROOT']}/styles/screen.css" />
  <link type="text/css" media="print" rel="stylesheet" href="{$_SERVER['STATIC_ROOT']}/styles/print.css" />
  <link type="text/css" media="handfield" rel="stylesheet" href="{$_SERVER['STATIC_ROOT']}/styles/handfield.css" />
  <!--[if IE ]>
    <link type="text/css" rel="stylesheet" media="screen" href="{$_SERVER['STATIC_ROOT']}/styles/ie.css" />
  <![endif]-->
  <link rel="shortcut icon" href="{$_SERVER['STATIC_ROOT']}/favicon.ico" />{$link}
  <script type="text/javascript" src="{$_SERVER['STATIC_ROOT']}/userprefs.js"></script>
  {$base}{$meta}{$moreheadtags}
</head>

<body id="homepage">
 <ul id="root">
  <li id="header">
   <div class="content">
    <h1><a href="/index.php">PHP: Hypertext Preprocessor</a></h1>
    <form method="post" action="/search.php" id="topsearch">
     <div id="search-box">
      <label for="searchbox">Search for</label>
      <span><input type="text" class="text" maxlength="20" name="pattern" id="searchbox" /></span>
      <label for="searchlist">in the</label>
      <span>
        <select name="show" id="searchlist">
          <option value="quickref" selected="selected">function list</option>
          <option value="all"         >all php.net sites</option>
          <option value="local"       >this mirror only</option>
          <option value="manual"      >online documentation</option>
          <option value="bugdb"       >bug database</option>
          <option value="news_archive">Site News Archive</option>
          <option value="changelogs"  >All Changelogs</option>
          <option value="pear"        >just pear.php.net</option>
          <option value="pecl"        >just pecl.php.net</option>
          <option value="talks"       >just talks.php.net</option>
          <option value="maillist"    >general mailing list</option>
          <option value="devlist"     >developer mailing list</option>
          <option value="phpdoc"      >documentation mailing list</option>
        </select>
      </span>
      <span><input type="submit" class="button" value="Search" /></span>
     </div>
    </form>
   </div>
  </li><!--#header-->
  <li id="main-menu">
   <ul id="top-navigation">
    <li class="first"><a href="/downloads.php">Downloads</a></li>
    <li><a href="/docs.php">Documentation</a></li>
    <li><a href="/FAQ.php">Faq</a></li>
    <li><a href="/support.php">Getting Help</a></li>
    <li><a href="/mailing-lists.php">Mailing Lists</a></li>
    <li><a href="http://bugs.php.net">Reporting Bugs</a></li>
    <li><a href="/sites.php">Php.net Sites</a></li>
    <li><a href="/links.php">Links</a></li>
    <li><a href="/conferences/">Conferences</a></li>
    <li class="last"><a href="/my.php">My Php.net</a></li>
   </ul>
  </li><!--#main-menu-->
  <!-- {{{ FIXME: REMOVE THIS WARNING -->
  <li id="warning">
    <div class="warning">
      <strong>WARNING</strong>: You are browsing a developmental server.
    </div>
  </li>
  <!-- }}} -->
  $PRE_DATA
  <li id="content">
   <ul id="content-columns">

END_HEADER;
}

// Stats pages still need this
function commonFooter() { site_footer(); }

function site_footer($config = array())
{
    global $LAST_UPDATED;
    
    $stats         = (have_stats() ? "\n <li><a href=\"/stats/\">stats</a></li>" : "");
    $rsslink       = (isset($config["rss"]) ?
        "<li><a href=\"{$config["rss"]}\">RSS</a></li>" :
        "");
    $atomlink      = (isset($config["atom"]) ?
        "<li><a href=\"{$config["atom"]}\">Atom</a></li>" :
        "");
    $viewsource    = (isset($_SERVER['BASE_PAGE']) ?
        "<li><a href=\"/source.php?url=/{$_SERVER['BASE_PAGE']}\">show source</a></li>" :
        "");
    $provider_url  = mirror_provider_url();
    $provider_name = mirror_provider();
    $mirror_text   = (is_official_mirror() ?
        "<a href=\"/mirror.php\">This mirror</a> generously provided by:" :
        "<a href=\"/mirror.php\">This unofficial mirror</a> is operated at:"); 
    $last_updated  = strftime("%c %Z", $LAST_UPDATED);
    //$functionsjs   = (in_array("functionsjs", $config) ? "\n<script src=\"" . $_SERVER['STATIC_ROOT'] . '/functions.js" type="text/javascript"></script>' : '');
    
    print <<<END_FOOTER

      </ul> <!-- #content-columns -->
    </li> <!-- #content -->
  <li id="footer"><span class="corners-top"><span></span></span>
   <div class="info">
    <div id="copyright"><a href="/copyright.php">Copyright &copy; 2001-2008 The PHP Group</a><br />All rights reserved.</div>			
    <div id="footer-menu">
     <ul>  
      $rsslink $atomlink $viewsource
      <li><a href="/credits.php">Credits</a></li>
      $stats
      <li><a href="/stats/">Stats</a></li>
      <li><a href="/sitemap.php">Sitemap</a></li>
      <li><a href="/contact.php">Contact</a></li>
      <li><a href="/contact.php#ads">Advertising</a></li>
      <li class="last"><a href="/mirrors.php">Mirror sites</a></li>
     </ul><br />
     <small>{$mirror_text} <a href="{$provider_url}">{$provider_name}</a> Last updated: {$last_updated}</small>
    </div>
   </div>
   <span class="corners-bottom"><span></span></span>
  </li><!--#footer-->
 </ul><!--#root-->

</body>
</html>
END_FOOTER;
}

// Resize the image using the output of make_image()
// (considering possible HTML/XHTML image tag endings)
function resize_image($img, $width = 1, $height = 1)
{
    // Drop width and height values from image if available
    $str = preg_replace('!width=\"([0-9]+?)\"!i',  '', $img);
    $str = preg_replace('!height=\"([0-9]+?)\"!i', '', $str);
    
    // Return image with new width and height added
    return preg_replace(
        '!/?>$!',
        sprintf(' height="%s" width="%s" />', $height, $width),
        $str
    );
}

// Return an <img /> tag for a given image file available on the server
function make_image($file, $alt = FALSE, $align = FALSE, $extras = FALSE,
                    $dir = '/images', $border = 0, $addsize = TRUE)
{
    // If no / was provided at the start of $dir, add it
    $webdir = $_SERVER['STATIC_ROOT'] . ($dir{0} == '/' ? '' : '/') . $dir;

    // Get width and height values if possible
    if ($addsize && ($size = @getimagesize($_SERVER['DOCUMENT_ROOT'] . "$dir/$file"))) {
        $sizeparams = ' ' . trim($size[3]);
    } else {
        $sizeparams = '';
    }
    
    // Convert right or left alignment to CSS float,
    // but leave other alignments intact (for now)
    if (in_array($align, array("right", "left"))) {
        $align = ' style="float: ' . $align . ';"';
    } elseif ($align) {
        $align = ' align="' . $align . '"';
    } else {
        $align = '';
    }
    
    // Return with image built up
    return sprintf('<img src="%s/%s" alt="%s"%s%s%s />',
        $webdir,
        $file,
        ($alt    ? $alt : ''),
        $sizeparams,
        $align,
        ($extras ? ' ' . $extras              : '')
    );
    return $image;
}

// Print an <img /> tag out for a given file
function print_image($file, $alt = FALSE, $align = FALSE, $extras = FALSE,
                     $dir = '/images', $border = 0)
{
    echo make_image($file, $alt, $align, $extras, $dir, $border);
}

// Shortcut to usual news image printing (right floating
// image from the news dir with an alt and an URL) 
function news_image($URL, $image, $alt, $print = true)
{
    $str = "<a href=\"$URL\">" . make_image("news/$image", $alt, "right") . "</a>";
    if ($print) {
        echo $str;
    }
    return $str;
}

// Return a hiperlink to something within the site
function make_link ($url, $linktext = FALSE, $target = FALSE, $extras = FALSE)
{
    return sprintf("<a href=\"%s\"%s%s>%s</a>",
        $url,
        ($target   ? ' target="' . $target . '"' : ''),
        ($extras   ? ' ' . $extras               : ''),
        ($linktext ? $linktext                   : $url)
    );
}

// Print a hyperlink to something, within the site
function print_link($url, $linktext = FALSE, $target = FALSE, $extras = FALSE)
{
    echo make_link($url, $linktext, $target, $extras);
}

// make_popup_link()
// return a hyperlink to something, within the site, that pops up a new window
//
function make_popup_link ($url, $linktext=false, $target=false, $windowprops="", $extras=false) {
	return sprintf("<a href=\"%s\" target=\"%s\" onclick=\"window.open('%s','%s','%s');return false;\"%s>%s</a>",
		htmlspecialchars($url, ENT_QUOTES),
		($target ? $target : "_new"),
		htmlspecialchars($url, ENT_QUOTES),
		($target ? $target : "_new"),
                $windowprops,
		($extras ? ' '.$extras : ''),
		($linktext ? $linktext : $url)
	);
}

// print_popup_link()
// print a hyperlink to something, within the site, that pops up a new window
//
function print_popup_link($url, $linktext=false, $windowprops="", $target=false, $extras=false) {
	echo make_popup_link($url, $linktext, $windowprops, $target, $extras);
}

// Print a link for a downloadable file (including filesize)
function download_link($file, $title, $showsize = TRUE, $mirror = '')
{
    // Construct the download link for this site or a mirror site
    $download_link = "get/$file/from/a/mirror";
    if ($mirror != '') {
        $download_link = $mirror . $download_link;
    } else {
        $download_link = "/" . $download_link;
    }

    // Print out the download link
    print_link($download_link, $title);

    // Size display is required
    if ($showsize) {

        // We have a full path or a relative to the distributions dir
        if ($tmp = strrchr($file, "/")) {
            $local_file = substr($tmp, 1, strlen($tmp));
        } else {
            $local_file = "distributions/$file";
        }

        // Try to get the size of the file
        $size = @filesize($local_file);

        // Print out size in bytes (if size is
        // less then 1Kb, or else in Kb)
        if ($size) {
            echo ' [';
            if ($size < 1024) {
                echo number_format($size, 0, '.', ',') . 'b';
            } else {
                echo number_format($size/1024, 0, '.', ',') . 'Kb';
            }
            echo ']';
        }
    }
}

function clean($var) {
  return htmlspecialchars(get_magic_quotes_gpc() ? stripslashes($var) : $var, ENT_QUOTES);
}

// Clean out the content of one user note for printing to HTML
function clean_note($text)
{
    // Highlight PHP source
    $text = highlight_php(trim($text), TRUE);

    // Turn urls into links
    $text = preg_replace(
        '!((mailto:|(http|ftp|nntp|news):\/\/).*?)(\s|<|\)|"|\\\\|\'|$)!',
        '<a href="\1" rel="nofollow" target="_blank">\1</a>\4',
        $text
    );
    
    return $text;
}

function display_errors($errors)
{ 
	echo '<div class="errors">';
	if (count($errors) > 1) {
		echo "You need to do the following before your submission will be accepted:<ul>";
		foreach ($errors as $error) {
			echo "<li>$error</li>\n";
		}
		echo "</ul>";
	}
	else {
		echo $errors[0];
	}
	echo '</div>';
}

// Displays an event. Used in event submission
// previews and event information displays
function display_event($event, $include_date = 1)
{
    global $COUNTRIES;
    // Current month (int)($_GET['cm'] ?: 0)
    global $cm;
    // Current year (int)($_GET['cy'] ?: 0)
    global $cy;
    
    // Weekday names array
    for ($i = 1; $i <= 7; $i++) {
        $days[$i] = strftime('%A', mktime(12, 0, 0, 4, $i, 2001));
    }

    // Recurring possibilities
    $re = array(
         1 => 'First',
         2 => 'Second',
         3 => 'Third',
         4 => 'Fourth',
        -1 => 'Last',
        -2 => '2nd Last',
        -3 => '3rd Last'
    );

    $sday = (isset($event['start']) && !empty($event['start'])) ? strtotime($event['start']) : 0;
    $eday = (isset($event['end']) && !empty($event['end'])) ? strtotime($event['end']) : 0;
?>
<table border="0" cellspacing="0" cellpadding="3" width="100%" class="vevent">
 <tr bgcolor="#dddddd"><td>
<?php
    
    // Print out date if needed
    if ($include_date && (isset($event['start']))) {
        echo "<b>", date("F j, Y", $sday), "</b>\n";
    }
    
    // Print link in case we have one
    if ($event['url']) { echo '<a href="', htmlentities($event['url']),'" class="url">'; }
    // Print event description
    echo "<b class='summary'>", stripslashes(htmlentities($event['sdesc'])), "</b>";
    // End link
    if ($event['url']) { echo "</a>"; }
  
    // Print extra date info for recurring and multiday events
    switch ($event['type']) {
        case 2:
        case 'multi':
            $dtend = date("Y-m-d", strtotime("+1 day", $eday));
            echo " (<abbr class='dtstart'>", date("Y-m-d",$sday), "</abbr> to <abbr class='dtend' title='$dtend'>", date("Y-m-d",$eday), "</abbr>)";
            break;
        case 3:
        case 'recur':
            $days = $re[$event['recur']]. " " .$days[$event['recur_day']];
            if (!$cm || $cy) {
                $cm = date("m");
                $cy = date("Y");
            }
            $month = date("M", mktime(0, 0, 0, $cm, 1, $cy));
            $dtstart = date("Y-m-d", strtotime($days . ' 0st' .$month. ' ' .$cy));
            echo ' (Every <abbr class="dtstart" title="'.$dtstart.'">', $days, "</abbr> of the month)";
            break;
    }
   
    // Event category
	if(isset($event['category']) && $event['category']) {
    	$cat = array("unknown", "User Group Event", "Conference", "Training"); 
		echo ' [' . $cat[$event['category']] . '] ';	
	}
	
    // Print out country information
    echo ' (<span class="location">' , $COUNTRIES[$event['country']] , '</span>)';
?>
 </td></tr>
 <tr bgcolor="#eeeeee" class="description"><td>
<?php

    // Print long description
    echo preg_replace("/\r?\n\r?\n/", "<br /><br />", trim($event['ldesc']));
    // If we have an URL, print it out
    if ($event['url']) {
        echo '<br /><br /><b>URL:</b> ',
             '<a href="', htmlentities($event['url']), '">',
             htmlentities($event['url']), '</a>';
    }
?>
 </td></tr>
</table>
<?php
}

// Print news links for archives
function news_archive_sidebar()
{
    global $SIDEBAR_DATA;
    $SIDEBAR_DATA = '
<h3>Latest news</h3>

<p>
 For the latest news, <a href="/index.php" rel="home">check the homepage</a>,
 or <a href="/feed.atom">our Atom feed</a>.
</p>

<h3>Archives by year</h3>

<ul class="toc">
';
    for ($i = 1998; $i <= date("Y"); $i++) {
        $pagename = "archive/$i.php";
        $classname = ($pagename == $_SERVER['BASE_PAGE'] ? ' class="active"' : '');
        $SIDEBAR_DATA .= "<li{$classname}><a href=\"/{$pagename}\">{$i}</a></li>\n";
    }
    $SIDEBAR_DATA .= '</ul>';
}

// Print news
function print_news($news, $dog, $max = 5) {
    $count = 0;
    foreach($news as $item) {
        $extra = array("hentry");
        $ok = false;

        // Only print entries in the provided s/dog/cat/ egory
        // If its a conference, use the hCalendar container
        foreach($item["category"] as $category) {
            if (in_array($category["term"], (array)$dog)) {
                $ok = true;
                ++$count;
            }
            if ($category["term"] === "conferences" || $category["term"] === "cfp") {
              $extra[] = "vevent";
            }
        }
        if ($count > $max) {
            break;
        }
        if ($ok === false) {
            continue;
        }

        $image = "";
        if(isset($item["newsImage"])) {
            $image = news_image($item["newsImage"]["link"], $item["newsImage"]["content"], $item["newsImage"]["title"], false);
        }

        //$id = parse_url($item["id"], PHP_URL_FRAGMENT); 5.1.2
        $id = parse_url($item["id"]);
        $id = $id["fragment"];

        // Find the permlink
        foreach($item["link"] as $link) {
            if ($link["rel"] === "via") {
                $permlink = $link["href"];
                break;
            }
        }
        if (!isset($permlink)) {
            $permlink = "#" .$id;
        }

        // PHP4 strtotime() doesn't support RFC3339 timestamps
        $published = substr($item["published"], 0, 10);
        $newsdate = date("d-M-Y", strtotime($published));

      echo block_info_start(CORNERS_TOP, array("info" => $extra));
      echo <<< EOT
      <h3 class="summary entry-title"><a name="{$id}" id="{$id}" href="{$permlink}" rel="bookmark" class="bookmark">{$item["title"]}</a></h3>
      <p class="news-date"><abbr class="published newsdate" title="{$item["published"]}">$newsdate</abbr></p>
      <div class="newsImage">{$image}</div>
      {$item["content"]}

EOT;
      echo block_info_end(CORNERS_NONE);
    }
}

// {{{ Layout boxes
define("CORNERS_NONE",         0x00); // Don't print out the rounded corners
define("CORNERS_TOP",          0x01); // Print out rounded corners at the top
define("CORNERS_BOTTOM",       0x02); // Print out rounded corners at the bottom

define("COLUMN_LEFT",          1); // First column (left sidebar)
define("COLUMN_MAIN",          2); // Main content column in 2 column view
define("COLUMN_MIDDLE",        3); // Second column in 3 column view
define("COLUMN_RIGHT",         4); // Third column (right sidebar)

// I am extremely lazy and have a piss poor copy&paste skilz.
// Better of opening/closing these layout boxes using help functions

// Print a layout column (COLUMN_*)
function column($id = "") {
  static $columns = array(
    COLUMN_LEFT   => "left", 
    COLUMN_MAIN   => "main",
    COLUMN_MIDDLE => "mid",
    COLUMN_RIGHT  => "right",
  );
  if (isset($columns[$id])) {
    $id = $columns[$id] . "-column";
    echo <<< OPEN
    <li id="$id">
      <div class="content">

OPEN;
    return true;
  }
  if($id === "") {
    echo <<< CLOSE
      </div> <!-- .content -->
    </li><!-- #id.. -->

CLOSE;
    return true;
  }

  trigger_error("Unknown column passed ($id), not printing any markup", E_USER_WARNING);
  return false;

}

// Print out a box (CORNERS_*)
// $classes can be used to add specific CSS classes to the div elements
function box($corners = CORNERS_NONE, $classes = array()) {
  static $defaults = array(
    "block"   => array("block"),
    "info"    => array("info"),
    "corners" => array("corners-top"),
  );
  // Previous CORNERS_ settings
  static $stack = array();
  // Merge the default CSS classnames with $classes
  $classes = array_merge_recursive($defaults, $classes);

  // No args == closing column
  $open = !(func_num_args() == 0);

  if ($open) {
    $block  = '  <div class="' .join(" ", $classes["block"]). '"><!-- .block -->';
    $info   = '    <div class="' .join(" ", $classes["info"]). '"><!-- .info -->';
    $top    = '    <span class="' .join(" ", $classes["corners"]). '"><span></span></span>';

    $stack[] = $corners;
    if ($corners == CORNERS_NONE) {
      echo "$block\n$info\n";
      return;
    }
    echo "$block\n$top\n$info\n";
    return;
  }

  $corners = array_pop($stack);

  $info   = '    </div><!-- .info -->';
  $bottom = '    <span class="corners-bottom"><span></span></span>';
  $block  = '  </div><!-- .block -->';

  if ($corners == CORNERS_NONE) {
    echo "$info\n$block\n";
    return;
  }
  echo "$info\n$bottom\n$block\n";
}

// Wrapper for column(COLUMN_*); box(CORNERS_*); (and box(); column();)
// $extra is contains for the moment only one option key, "classes", see box()
function column_box($column = "", $corners = CORNERS_TOP, $extra = array()) {
  static $defaults = array(
    "classes" => array(),
  );

  $extra = array_merge_recursive($defaults, $extra);

  // No args == closing column
  $open = !(func_num_args() == 0);

  if ($open) {
    column($column);
    box($corners, $extra["classes"]);
  } else {
    box();
    column();
  }
}


function block_info_start($corners = CORNERS_NONE, $classes = array()) {
  static $defaults = array(
    "block"   => array("block"),
    "info"    => array("info"),
    "corners" => array("corners-top"),
  );
  $classes = array_merge_recursive($defaults, $classes);

  $block  = '  <div class="' .join(" ", $classes["block"]). '"><!-- .block -->';
  $info   = '    <div class="' .join(" ", $classes["info"]). '"><!-- .info -->';
  $top    = '    <span class="' .join(" ", $classes["corners"]). '"><span></span></span>';

  if ($corners == CORNERS_NONE) {
    return "$block\n$info\n";
  }
  if ($corners == CORNERS_TOP) {
    return "$block\n$top\n$info\n";
  }
}

function block_info_end($corners = CORNERS_NONE) {
  $info   = '    </div><!-- .info -->';
  $bottom = '    <span class="corners-bottom"><span></span></span>';
  $block  = '  </div><!-- .block -->';

  if ($corners == CORNERS_NONE) {
    return "$info\n$block\n";
  }
  if ($corners == CORNERS_BOTTOM) {
    return "$info\n$bottom\n$block\n";
  }
}

// Yes. I'm seriusly _THAT_ lazy :D
$START_BLOCK_INFO_CORNERS = block_info_start(CORNERS_TOP);
$END_BLOCK_INFO_CORNERS   = block_info_end(CORNERS_BOTTOM);

$START_BLOCK_INFO         = block_info_start(CORNERS_NONE);
$END_BLOCK_INFO           = block_info_end(CORNERS_NONE);

// }}}


/* vim: set et ts=4 sw=4 ft=php: : */

