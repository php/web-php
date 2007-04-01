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
	if(strstr($highlighted,"include/layout.inc</b>")) $highlighted = '<span class="default">'.htmlentities($code)."</span>";
 
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
    global $EXPL_LANG, $SIDEBAR_DATA, $RSIDEBAR_DATA, $PAGE_COLUMNS;
    
    // Default to empty array if improper parameter passed
    if (!is_array($config)) { $config = array(); }
    
    // String defaults
    $lang_input = $base = $meta = $layout_helper = '';
    
    // Count number of columns for layout. The number identifies
    // the layout precisely, as we have no page having a right
    // sidebar and no left sidebar
    $PAGE_COLUMNS = 1;
    if (!empty($SIDEBAR_DATA))  { $PAGE_COLUMNS++; }
    if (!empty($RSIDEBAR_DATA)) { $PAGE_COLUMNS++; }
    
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
    
    // Define layout helper in case we need it
    if ($PAGE_COLUMNS > 2) {
        $layout_helper = "<div id=\"layout_{$PAGE_COLUMNS}_helper\">";
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

    print <<<END_HEADER
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <title>PHP{$title}</title>
 <style type="text/css" media="all">
  @import url("{$_SERVER['STATIC_ROOT']}/styles/site.css");
  @import url("{$_SERVER['STATIC_ROOT']}/styles/{$mirror_specific_style}.css");
 </style>
 <!--[if IE]><![if gte IE 6]><![endif]-->
  <style type="text/css" media="print">
   @import url("{$_SERVER['STATIC_ROOT']}/styles/print.css");
  </style>
 <!--[if IE]><![endif]><![endif]-->
 <meta http-equiv="Content-Type" content="text/html; charset={$config['charset']}"/>
 <link rel="shortcut icon" href="{$_SERVER['STATIC_ROOT']}/favicon.ico" />{$link}
 <script type="text/javascript" src="{$_SERVER['STATIC_ROOT']}/userprefs.js"></script>{$base}{$meta}{$moreheadtags}
</head>
<body{$onload}>

<div id="headnav">
 <a href="/"><img src="{$_SERVER['STATIC_ROOT']}?=PHPE9568F36-D428-11d2-A769-00AA001ACF42"
 alt="PHP" width="120" height="67" /></a>
 <div id="headmenu">
  <a href="/downloads.php">downloads</a> |
  <a href="/docs.php">documentation</a> |
  <a href="/FAQ.php">faq</a> |
  <a href="/support.php">getting help</a> |
  <a href="/mailing-lists.php">mailing lists</a> |
  <a href="http://bugs.php.net/">reporting bugs</a> |
  <a href="/sites.php">php.net sites</a> |
  <a href="/links.php">links</a> |
  <a href="/conferences/">conferences</a> |
  <a href="/my.php">my php.net</a>
 </div>
</div>

<div id="headsearch">
 <form method="post" action="/search.php" id="topsearch">
  <p>
   <span title="Keyboard shortcut: Alt+S (Win), Ctrl+S (Apple)">
    <span class="shortkey">s</span>earch for
   </span>
   <input type="text" name="pattern" value="" size="30" accesskey="s" />
   <span>in the</span>
   <select name="show">
    <option value="quickref" selected="selected">function list</option>
    <option value="all"      >all php.net sites</option>
    <option value="local"    >this mirror only</option>
    <option value="manual"   >online documentation</option>
    <option value="bugdb"    >bug database</option>
    <option value="news_archive">Site News Archive</option>
    <option value="changelogs">All Changelogs</option>
    <option value="pear"     >just pear.php.net</option>
    <option value="pecl"     >just pecl.php.net</option>
    <option value="talks"    >just talks.php.net</option>
    <option value="maillist" >general mailing list</option>
    <option value="devlist"  >developer mailing list</option>
    <option value="phpdoc"   >documentation mailing list</option>
   </select>
   <input type="image"
          src="{$_SERVER['STATIC_ROOT']}/images/small_submit_white.gif"
          class="submit" alt="search" />{$lang_input}
  </p>
 </form>
</div>

<div id="layout_{$PAGE_COLUMNS}">{$layout_helper}
END_HEADER;

    // Print out left column
    if ($PAGE_COLUMNS > 1) {
        echo "\n <div id=\"leftbar\">\n$SIDEBAR_DATA\n </div>";
    }
    
    // Print out right column
    if ($PAGE_COLUMNS > 2) {
        echo "\n <div id=\"rightbar\">\n$RSIDEBAR_DATA\n </div>";
    }

    // Any layout workarounds?
    if (!empty($config["layout_workaround"])) {
        echo $config["layout_workaround"];
    }

    // Start main page content
    echo "\n <div id=\"content\" class=\"$classname\">\n";
}

// Stats pages still need this
function commonFooter() { site_footer(); }

function site_footer($config = array())
{
    global $LAST_UPDATED, $PAGE_COLUMNS;
    
    $stats         = (have_stats() ? "\n <a href=\"/stats/\">stats</a> |" : "");
    $rsslink       = (isset($config["rss"]) ?
        "<a href=\"{$config["rss"]}\">RSS</a> |" :
        "");
    $viewsource    = (isset($_SERVER['BASE_PAGE']) ?
        "<a href=\"/source.php?url=/{$_SERVER['BASE_PAGE']}\">show source</a> |" :
        "");
    $provider_url  = mirror_provider_url();
    $provider_name = mirror_provider();
    $mirror_text   = (is_official_mirror() ?
        "<a href=\"/mirror.php\">This mirror</a> generously provided by:" :
        "<a href=\"/mirror.php\">This unofficial mirror</a> is operated at:"); 
    $last_updated  = strftime("%c %Z", $LAST_UPDATED);
    $layout_helper = ($PAGE_COLUMNS > 2 ? "</div>" : "");
    //$functionsjs   = (in_array("functionsjs", $config) ? "\n<script src=\"" . $_SERVER['STATIC_ROOT'] . '/functions.js" type="text/javascript"></script>' : '');
    
    print <<<END_FOOTER

 </div>
 <div class="cleaner">&nbsp;</div>
{$layout_helper}</div>

<div id="footnav">
 $rsslink $viewsource
 <a href="/credits.php">credits</a> |$stats
 <a href="/sitemap.php">sitemap</a> |
 <a href="/contact.php">contact</a> |
 <a href="/contact.php#ads">advertising</a> |
 <a href="/mirrors.php">mirror sites</a>
</div>

<div id="pagefooter">
 <div id="copyright">
  <a href="/copyright.php">Copyright &copy; 2001-2007 The PHP Group</a><br />
  All rights reserved.
 </div>

 <div id="thismirror">
  {$mirror_text}
  <a href="{$provider_url}">{$provider_name}</a><br />
  Last updated: {$last_updated}
 </div>
</div>

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
function news_image($URL, $image, $alt)
{
    echo "<a href=\"$URL\">" . make_image("news/$image", $alt, "right") . "</a>";
}

// Return HTML code for a submit button image
function make_submit($file, $alt = FALSE, $align = FALSE, $extras = FALSE,
                     $dir = '/images', $border = 0)
{
    // Get an image without size info and convert the
    // border attribute to use CSS, as border="" is not
    // supported on <input> elements in [X]HTML
    $img = make_image($file, $alt, $align, $extras, $dir, 0, FALSE);
    $img = str_replace(
        "border=\"$border\"",
        "style=\"border: {$border}px;\"",
        $img
    );

    // Return with ready input image
    return '<input type="image"' . substr($img, 4);
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
		htmlspecialchars($url),
		($target ? $target : "_new"),
		htmlspecialchars($url),
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

function sect_to_file($string) {
	$string = strtolower($string);
	$string = str_replace(' ','-',$string);
	$string = str_replace('_','-',$string);
	$func = "function.$string.php";
	$chap = "ref.$string.php";
	$feat = "features.$string.php";
	$struct = "control-structures.$string.php";
	if(@is_file($func)) return $func;
	else if(@is_file($chap)) return $chap;
	else if(@is_file($feat)) return $feat;
	else if(@is_file($struct)) return $struct;
	else return "$string.php";
}

function clean($var) {
  return htmlspecialchars(get_magic_quotes_gpc() ? stripslashes($var) : $var);
}

// Clean out the content of one user note for printing to HTML
function clean_note($text)
{
    // Highlight PHP source
    $text = highlight_php(trim($text), TRUE);

    // Turn urls into links
    $text = preg_replace(
        '!((mailto:|(http|ftp|nntp|news):\/\/).*?)(\s|<|\)|"|\\\\|\'|$)!',
        '<a href="\1" target="_blank">\1</a>\4',
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
<table border="0" cellspacing="0" cellpadding="3" width="100%">
 <tr bgcolor="#dddddd"><td>
<?php
    
    // Print out date if needed
    if ($include_date && (isset($event['start']))) {
        echo "<b>", date("F j, Y", $sday), "</b>\n";
    }
    
    // Print link in case we have one
    if ($event['url']) { echo '<a href="', htmlentities($event['url']),'">'; }
    // Print event description
    echo "<b>", stripslashes(htmlentities($event['sdesc'])), "</b>";
    // End link
    if ($event['url']) { echo "</a>"; }
  
    // Print extra date info for recurring and multiday events
    switch ($event['type']) {
        case 2:
        case 'multi':
            echo " (", date("Y-m-d",$sday), " to ", date("Y-m-d",$eday), ")";
            break;
        case 3:
        case 'recur':
            echo " (Every ", $re[$event['recur']], " ",
                 $days[$event['recur_day']], " of the month)";
            break;
    }
   
    // Event category
	if(isset($event['category']) && $event['category']) {
    	$cat = array("unknown", "User Group Event", "Conference", "Training"); 
		echo ' [' . $cat[$event['category']] . '] ';	
	}
	
    // Print out country information
    echo ' (' , $COUNTRIES[$event['country']] , ')';
?>
 </td></tr>
 <tr bgcolor="#eeeeee"><td>
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
 For the latest news, <a href="/index.php">check the homepage</a>,
 or <a href="/news.rss">our RSS feed</a>.
</p>

<h3>Archives by year</h3>

<ul class="toc">
';
    for ($i = 1998; $i < 2007; $i++) {
        $pagename = "archive/$i.php";
        $classname = ($pagename == $_SERVER['BASE_PAGE'] ? ' class="active"' : '');
        $SIDEBAR_DATA .= "<li{$classname}><a href=\"/{$pagename}\">{$i}</a></li>\n";
    }
    $SIDEBAR_DATA .= '</ul>';
}

/* vim: set et ts=4 sw=4 ft=php: : */
