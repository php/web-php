<?php
/* $Id$ */

$_SERVER['STATIC_ROOT'] = $MYSITE;
$_SERVER['MYSITE'] = $MYSITE;

// Use class names instead of colors
ini_set('highlight.comment', 'comment');
ini_set('highlight.default', 'default');
ini_set('highlight.keyword', 'keyword');
ini_set('highlight.string',  'string');
ini_set('highlight.html',    'html');

// Highlight PHP code
function highlight_php($code, $return = FALSE)
{
    $highlighted = highlight_string($code, TRUE);

    // Use this ugly hack for now to avoid code snippets with bad syntax screwing up the highlighter
    if(strstr($highlighted, "include/layout.inc</b>")) {
	    $highlighted = '<span class="html">'. nl2br(htmlentities($code, ENT_HTML5), FALSE) ."</span>";
	}

    // Fix output to use CSS classes and wrap well
    $highlighted = '<div class="phpcode">' . str_replace(
        array(
            '&nbsp;',
            '<br>',
            '<span style="color: ',
            '</font>',
            "\n ",
            '  ',
            '  '
        ),
        array(
            ' ',
            "<br>\n",
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


// Stats pages still need this
function commonFooter() { site_footer(); }

// Resize the image using the output of make_image()
function resize_image($img, $width = 1, $height = 1)
{
    // Drop width and height values from image if available
    $str = preg_replace('!width=\"([0-9]+?)\"!i',  '', $img);
    $str = preg_replace('!height=\"([0-9]+?)\"!i', '', $str);

    // Return image with new width and height added
    return preg_replace(
        '!/?>$!',
        sprintf(' height="%s" width="%s">', $height, $width),
        $str
    );
}

// Return an <img> tag for a given image file available on the server
function make_image($file, $alt = FALSE, $align = FALSE, $extras = FALSE,
                    $dir = '/images', $border = 0, $addsize = TRUE)
{
    // If no / was provided at the start of $dir, add it
    $webdir = $_SERVER['MYSITE'] . ($dir{0} == '/' ? '' : '/') . $dir;

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
    return sprintf('<img src="%s/%s" alt="%s"%s%s%s>',
        $webdir,
        $file,
        ($alt    ? $alt : ''),
        $sizeparams,
        $align,
        ($extras ? ' ' . $extras              : '')
    );
}

// Print an <img> tag out for a given file
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
        htmlspecialchars($url, ENT_QUOTES | ENT_IGNORE),
        ($target ? $target : "_new"),
        htmlspecialchars($url, ENT_QUOTES | ENT_IGNORE),
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

        if(@file_exists($local_file.".asc")) {
            echo " ";
            $sig_link = "get/$file.asc/from/a/mirror";
            if ($mirror != '') {
                $sig_link = $mirror . $sig_link;
            } else {
                $sig_link = "/" . $sig_link;
            }
            print_link($sig_link, "(sig)");
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
  return htmlspecialchars(get_magic_quotes_gpc() ? stripslashes($var) : $var, ENT_QUOTES);
}

// Clean out the content of one user note for printing to HTML
function clean_note($text)
{
    // Highlight PHP source
    $text = highlight_php(trim($text), TRUE);

    // Turn urls into links
    $text = preg_replace(
        '!((mailto:|(https?|ftp|nntp|news):\/\/).*?)(\s|<|\)|"|\\\\|\'|$)!',
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
        $days[$i] = strftime('%A', mktime(12, 0, 0, 4, $i, 2012));
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

    if (!isset($event['start']) && isset($event['sday'])) {
        $sday = mktime(12,0,0,$event['smonth'],$event['sday'],$event['syear']);
    } else {
        $sday = (isset($event['start']) && !empty($event['start'])) ? strtotime($event['start']) : 0;
    }

    if (!isset($event['end']) && isset($event['eday'])) {
        $eday = mktime(12,0,0,$event['emonth'],$event['eday'],$event['eyear']);
    } else {
        $eday = (isset($event['end']) && !empty($event['end'])) ? strtotime($event['end']) : 0;
    }
?>
<table border="0" cellspacing="0" cellpadding="3" width="100%" class="vevent">
 <tr bgcolor="#dddddd"><td>
<?php

    // Print out date if needed
    if ($include_date && (isset($event['start']))) {
        echo "<b>", date("F j, Y", $sday), "</b>\n";
    }

    // Print link in case we have one
    if ($event['url']) { echo '<a href="', htmlentities($event['url'], ENT_QUOTES | ENT_IGNORE, 'UTF-8'),'" class="url">'; }
    // Print event description
    echo "<b class='summary'>", stripslashes(htmlentities($event['sdesc'], ENT_QUOTES | ENT_IGNORE, 'UTF-8')), "</b>";
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
    echo preg_replace("/\r?\n\r?\n/", "<br><br>", trim(htmlentities($event['ldesc'],ENT_QUOTES | ENT_IGNORE, 'UTF-8')));
    // If we have an URL, print it out
    if ($event['url']) {
        echo '<br><br><b>URL:</b> ',
             '<a href="', htmlentities($event['url'], ENT_QUOTES | ENT_IGNORE, 'UTF-8'), '">',
             htmlentities($event['url'], ENT_QUOTES | ENT_IGNORE, 'UTF-8'), '</a>';
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
<h3 class="announcements">Archives by year</h3>

';
    for ($i = date("Y"); $i >= 1998; $i--) {
        $pagename = "archive/$i.php";
        $classname = ($pagename == $_SERVER['BASE_PAGE'] ? " active" : '');
        $SIDEBAR_DATA .= "<p class='panel{$classname}'><a href=\"/{$pagename}\">{$i}</a></p>\n";
    }
}

// Print news
function print_news($news, $dog, $max = 5, $onlyyear = null, $return = false) {
    $retval = array();
    $count = 0;
    $news = $news ? $news : array(); // default to empty array (if no news)
    foreach($news as $item) {
        $vevent = "";
        $ok = false;

        // Only print entries in the provided s/dog/cat/ egory
        // If its a conference, use the hCalendar container
        foreach($item["category"] as $category) {
            if (in_array($category["term"], (array)$dog)) {
                $ok = true;
                ++$count;
            }
            if ($category["term"] === "conferences" || $category["term"] === "cfp") {
                $vevent = " vevent";
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

        $published = substr($item["published"], 0, 10);
        $nixtimestamp = strtotime($published);
        $newsdate = date("d M Y", $nixtimestamp);
        if ($onlyyear && date("Y", $nixtimestamp) != $onlyyear) {
            $count--;
            continue;
        }

        if ($return) {
            $retval[] = array(
                "title" => $item["title"],
                "id"    => $id,
                "permlink" => $permlink,
                "date"     => $newsdate,
            );
            continue;
        }

        echo <<< EOT
<article class="newsItem">
  <header>
    <div class="newsImage">{$image}</div>
    <h2 class="newstitle"><a id="{$id}" href="{$permlink}" rel="bookmark" class="bookmark">{$item["title"]}</a></h2>
  </header>
  <time class="newsdate" datetime="{$item["published"]}">{$newsdate}</time>
  <div class="newscontent">
    {$item["content"]}
  </div>
</article>

EOT;
    }

    return $retval;
}




function site_header($title = '', $config = array())
{
    global $MYSITE;

    $defaults = array(
        "lang" => myphpnet_language(),
        "current" => "",
        "meta-navigation" => array(),
        'classes' => '',
        'layout_span' => 9,
        "cache"       => false,
        "headsup"     => "",
    );


    $config = array_merge($defaults, $config);


    $config["headsup"] = get_news_changes();
    if (!$config["headsup"]) {
        $config["headsup"] = get_near_usergroups();
    }

    $lang = language_convert($config["lang"]);
    $curr = $config["current"];
    $classes = $config['classes'];

    if (isset($_COOKIE["MD"]) || isset($_GET["MD"])) {
        $classes .= "markdown-content";
        $config["css_overwrite"] = array("/styles/i-love-markdown.css");
    }

    if (empty($title)) {
        $title = "Hypertext Preprocessor";
    }

    // shorturl; http://wiki.snaplog.com/short_url
    if (isset($_SERVER['BASE_PAGE']) && $shortname = get_shortname($_SERVER["BASE_PAGE"])) {
        $shorturl = "http://php.net/" . $shortname;
    }

    require dirname(__FILE__) ."/header.inc";
}
function site_footer($config = array())
{
    global $MYSITE;
    require dirname(__FILE__) . "/footer.inc";
}

function get_news_changes()
{
    include dirname(__FILE__) . "/pregen-news.inc";
    $date = date_create($NEWS_ENTRIES[0]["updated"]);
    if (isset($_COOKIE["LAST_NEWS"]) && $_COOKIE["LAST_NEWS"] >= $date->getTimestamp()) {
        return false;
    }

    /* It is a bug when this happens.. but I don't know where it is coming from */
    if (!isset($_SERVER["BASE_PAGE"])) {
        return false;
    }
    if ($_SERVER["BASE_PAGE"] == "index.php") {
        return false;
    }

    $date->modify("+1 week");
    if ($date->getTimestamp() > $_SERVER["REQUEST_TIME"]) {
        $link = substr($NEWS_ENTRIES[0]["link"][0]["href"], 14); // Strip http://php.net
        $title = $NEWS_ENTRIES[0]["title"];
        return "<a href='{$link}'>{$title}</a>";
    }
}
function get_near_usergroups()
{
    global $COUNTRIES, $COUNTRY;

    if (!myphpnet_showug()) {
        return false;
    }
    if ($_SERVER["BASE_PAGE"] == "ug.php") {
        return false;
    }
    if (isset($_COOKIE["LAST_UG"]) && $_COOKIE["LAST_UG"] >= $_SERVER["REQUEST_TIME"]) {
        if (!isset($_GET["showug"])) {
            return false;
        }
    }

    $ugs = get_usergroups_in($COUNTRY);
    $count = count($ugs);
    if (!$count) {
        return false;
    }

    return sprintf("There %s %d <a href='/ug.php?cc=%s'>PHP User Group%s in %s</a>, are you a member of your local UG?",
        $count == 1 ? "is" : "are",
        $count,
        $COUNTRY,
        $count == 1 ? "" : "s",
        $COUNTRIES[$COUNTRY]
    );


}
function get_usergroups_in($country, &$allcountries = array()) {
    global $COUNTRY_ALPHA_2_TO_3;

    $filename = $_SERVER["DOCUMENT_ROOT"] . "/backend/usergroups.json";

    $matches = array();
    $data = json_decode(file_get_contents($filename), true);
    foreach($data["groups"] as $group) {
        if (isset($group["country"])) {
            $allcountries[$COUNTRY_ALPHA_2_TO_3[$group["country"]]] = 1;
            if ($group["country"] == $country) {
                $matches[] = $group;
            }
        }
    }
    usort($matches, function($first, $second){
        return strnatcasecmp($first['name'], $second['name']);
    });

    return $matches;
}

function news_toc($sections = null) {
    include dirname(__FILE__) . "/pregen-news.inc";
    $items = array(
        "news" => array(
            "title" => "News",
            "link"  => "/archive/",
            "children" => print_news($NEWS_ENTRIES, "frontpage", 3, null, true),
        ),
        "conferences" => array(
            "title" => "Conferences",
            "link"  => "/conferences/",
            "children" => print_news($NEWS_ENTRIES, "conferences", 3, null, true),
        ),
        "papers" => array(
            "title" => "Call for Papers",
            "link"  => "/conferences/",
            "children" => print_news($NEWS_ENTRIES, "cfp", 3, null, true),
        ),
    );

    foreach($items as $section => $menu) {

        // only print requested sections.
        if (is_array($sections) && !in_array($section, $sections)) {
            continue;
        }

        echo "<dt><a href='{$menu["link"]}'>{$menu["title"]}</a></dt>\n";
        foreach($menu["children"] as $child) {
            echo "<dd><a href='{$child["permlink"]}'>{$child["title"]}</a></dd>\n";
        }
    }
}
function doc_toc($lang) {
    $file = dirname(__FILE__) . "/../manual/$lang/toc/index.inc";
    if (!file_exists($file)) {
        $lang = "en"; // Fallback on english if the translation doesn't exist
        $file = dirname(__FILE__) . "/../manual/en/toc/index.inc";
    }
    require dirname(__FILE__) . "/../manual/$lang/toc/index.inc";

    echo "<dl>\n";
    doc_toc_list($lang, $TOC, "getting-started");
    doc_toc_list($lang, $TOC, "langref");
    echo "</dl>\n";

    echo "<dl>\n";
    doc_toc_list($lang, $TOC, "security");
    doc_toc_list($lang, $TOC, "features");
    echo "</dl>\n";

    echo "<dl>\n";
    doc_toc_list($lang, $TOC, "funcref");
    echo "</dl>\n";

    echo "<dl>\n";
    echo "<dt>Keyboard Shortcuts</dt>";
    echo "<dt>?</dt>\n";
    echo "<dd>This help</dd>\n";
    echo "<dt>j</dt>\n";
    echo "<dd>Next menu item</dd>\n";
    echo "<dt>k</dt>\n";
    echo "<dd>Previous menu item</dd>\n";
    echo "<dt>g p</dt>\n";
    echo "<dd>Previous man page</dd>\n";
    echo "<dt>g n</dt>\n";
    echo "<dd>Next man page</dd>\n";
    echo "<dt>G</dt>\n";
    echo "<dd>Scroll to bottom</dd>\n";
    echo "<dt>g g</dt>\n";
    echo "<dd>Scroll to top</dd>\n";
    echo "<dt>g h</dt>\n";
    echo "<dd>Goto homepage</dd>\n";
    echo "<dt>g s</dt>\n";
    echo "<dd>Goto search<br>(current page)</dd>\n";
    echo "<dt>/</dt>\n";
    echo "<dd>Focus search box</dd>\n";
    echo "</dl>";

}
function doc_toc_list($lang, $index, $file) {
    include dirname(__FILE__) . "/../manual/$lang/toc/$file.inc";

    doc_toc_title($lang, $index, $file);
    foreach($TOC as $entry) {
        echo "\t<dd><a href='/manual/$lang/{$entry[0]}'>{$entry[1]}</a></dd>\n";
    }
}
function doc_toc_title($lang, $index, $file, $elm = "dt") {
    foreach($index as $entry) {
        if ($entry[0] == "$file.php") {
            $link  = $entry[0];
            $title = $entry[1];
            break;
        }
    }
    echo "<$elm><a href='/manual/$lang/$link'>$title</a></$elm>\n";
}

/* vim: set et ts=4 sw=4 ft=php: : */

