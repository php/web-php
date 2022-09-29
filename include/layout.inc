<?php

use phpweb\I18n\Languages;
use phpweb\Navigation\NavItem;
use phpweb\News\NewsHandler;

$_SERVER['STATIC_ROOT'] = $MYSITE;
$_SERVER['MYSITE'] = $MYSITE;

// Use class names instead of colors
ini_set('highlight.comment', 'comment');
ini_set('highlight.default', 'default');
ini_set('highlight.keyword', 'keyword');
ini_set('highlight.string',  'string');
ini_set('highlight.html',    'html');

// convert PHP 8.2 highlight_string() output to match PHP 8.3+
function normalize_highlight_string(string $html): string
{
    $search = ["\r\n", "\n", '<br />', '&nbsp;'];
    $replace = ["\n", '', "\n", ' '];
    $result = str_replace($search, $replace, $html);

    // strip extra span tag
    $result = substr_replace($result, '', 5, 6);
    $result = substr_replace($result, '', -14, 7);

    return '<pre>' . $result . '</pre>';
}

// Highlight PHP code
function highlight_php($code, $return = false)
{
    $highlighted = highlight_string($code, true);

    if (PHP_VERSION_ID < 80300) {
        $highlighted = normalize_highlight_string($highlighted);
    }

    // Fix output to use CSS classes
    $search = ['<code style="color: ', '<span style="color: '];
    $replace = ['<code class="', '<span class="'];
    $highlighted = '<div class="phpcode">' . str_replace($search, $replace, $highlighted) . '</div>';

    if ($return) { return $highlighted; }
    echo $highlighted;
    return null;
}

// Same as highlight_php() but does not require '<?php' in $code
function highlight_php_trimmed($code, $return = false)
{
    $code = "<?php\n" . $code;
    $highlighted_code = highlight_php($code, true);
    $highlighted_code = preg_replace("!&lt;\?php(\\n)+!", '', $highlighted_code, 1);

    // add syntax highlighting for variables
    $variableReplacer = function (array $matches) {
        if ($matches[1] !== '') {
            $replacement = '<span class="default">' . $matches[1] . '</span>';
        } else {
            $replacement = '';
        }
        return $replacement . '<span class="variable">' . $matches[2] . '</span>';
    };

    $pattern = '!<span class="default">([\w\s]*)(\$[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*\s*)</span>!';
    $highlighted_code = preg_replace_callback($pattern, $variableReplacer, $highlighted_code);

    if ($return) { return $highlighted_code; }
    echo $highlighted_code;
    return null;
}

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
        $str,
    );
}

// Return an <img> tag for a given image file available on the server
function make_image($file, $alt = false, $align = false, $extras = false,
                    $dir = '/images', $addsize = false)
{
    // If no / was provided at the start of $dir, add it
    $webdir = $_SERVER['MYSITE'] . ($dir[0] == '/' ? '' : '/') . $dir;

    // Get width and height values if possible
    if ($addsize && ($size = @getimagesize($_SERVER['DOCUMENT_ROOT'] . "$dir/$file"))) {
        $sizeparams = ' ' . trim($size[3]);
    } else {
        $sizeparams = '';
    }

    // Convert right or left alignment to CSS float,
    // but leave other alignments intact (for now)
    if (in_array($align, ["right", "left"], true)) {
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
        ($alt ?: ''),
        $sizeparams,
        $align,
        ($extras ? ' ' . $extras : ''),
    );
}

// Print an <img> tag out for a given file
function print_image($file, $alt = false, $align = false, $extras = false,
                     $dir = '/images'): void
{
    echo make_image($file, $alt, $align, $extras, $dir);
}

// Shortcut to usual news image printing (right floating
// image from the news dir with an alt and an URL)
function news_image($URL, $image, $alt, $print = true, $align = 'right')
{
    $str = "<a href=\"$URL\">" . make_image("news/$image", $alt, $align) . "</a>";
    if ($print) {
        echo $str;
    }
    return $str;
}

// Return HTML code for a submit button image
function make_submit($file, $alt = false, $align = false, $extras = false,
                     $dir = '/images', $border = 0)
{
    // Get an image without size info and convert the
    // border attribute to use CSS, as border="" is not
    // supported on <input> elements in [X]HTML
    $img = make_image($file, $alt, $align, $extras, $dir, false);
    $img = str_replace(
        "border=\"$border\"",
        "style=\"border: {$border}px;\"",
        $img,
    );

    // Return with ready input image
    return '<input type="image"' . substr($img, 4);
}

// Return a hiperlink to something within the site
function make_link(string $url, string $linktext = ''): string
{
    return sprintf("<a href=\"%s\">%s</a>", $url, $linktext ?: $url);
}

// Print a link for a downloadable file (including filesize)
function download_link($file, $title): void
{
    $download_link = "/distributions/" . $file;

    // Print out the download link
    echo make_link($download_link, $title);

    // We have a full path or a relative to the distributions dir
    if ($tmp = strrchr($file, "/")) {
        $local_file = substr($tmp, 1, strlen($tmp));
    } else {
        $local_file = "distributions/$file";
    }

    if (@file_exists($local_file . ".asc")) {
        echo " ";
        $sig_link = "/distributions/$file.asc";
        echo make_link($sig_link, "(sig)");
    }

    // Try to get the size of the file
    $size = @filesize($local_file);

    // Print out size in bytes (if size is
    // less then 1Kb, or else in Kb)
    if ($size) {
        echo ' [';
        if ($size < 1024) {
            echo number_format($size) . 'b';
        } else {
            echo number_format($size / 1024) . 'Kb';
        }
        echo ']';
    }
}

function clean($var) {
  return htmlspecialchars($var, ENT_QUOTES);
}

function display_errors($errors): void
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
function display_event($event, $include_date = 1): void
{
    global $COUNTRIES;
    // Current month (int)($_GET['cm'] ?: 0)
    global $cm;
    // Current year (int)($_GET['cy'] ?: 0)
    global $cy;

    // Weekday names array
    for ($i = 1; $i <= 7; $i++) {
        $days[$i] = date('l', mktime(12, 0, 0, 4, $i, 2012));
    }

    // Recurring possibilities
    $re = [
        1 => 'First',
        2 => 'Second',
        3 => 'Third',
        4 => 'Fourth',
        -1 => 'Last',
        -2 => '2nd Last',
        -3 => '3rd Last',
    ];

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
            $days = $re[$event['recur']] . " " . $days[$event['recur_day']];
            if (!$cm || $cy) {
                $cm = date("m");
                $cy = date("Y");
            }
            $month = date("M", mktime(0, 0, 0, $cm, 1, $cy));
            $dtstart = date("Y-m-d", strtotime($days . ' 0st' . $month . ' ' . $cy));
            echo ' (Every <abbr class="dtstart" title="' . $dtstart . '">', $days, "</abbr> of the month)";
            break;
    }

    // Event category
    if (isset($event['category']) && $event['category']) {
        $cat = ["unknown", "User Group Event", "Conference", "Training"];
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
function news_archive_sidebar(): void
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
function print_news($news, $dog, $max = 5, $return = false) {
    $retval = [];
    $count = 0;
    $news = $news ?: []; // default to empty array (if no news)
    foreach ($news as $item) {
        $ok = false;

        // Only print entries in the provided s/dog/cat/ egory
        // If $dog is null, everything matches
        foreach ($item["category"] as $category) {
            if (null === $dog || in_array($category["term"], (array)$dog, true)) {
                $ok = true;
                $count++;
                break;
            }
        }
        if ($count > $max) {
            break;
        }
        if ($ok === false) {
            continue;
        }

        $image = "";
        if (isset($item["newsImage"])) {
            $image = news_image($item["newsImage"]["link"], $item["newsImage"]["content"], $item["newsImage"]["title"], false, '');
        }

        $id = parse_url($item["id"]);
        $id = $id["fragment"];

        // Find the permlink
        foreach ($item["link"] as $link) {
            if ($link["rel"] === "via") {
                $permlink = $link["href"];
                break;
            }
        }
        if (!isset($permlink)) {
            $permlink = "#" . $id;
        }

        $published = substr($item["published"], 0, 10);
        $nixtimestamp = strtotime($published);
        $newsdate = date("d M Y", $nixtimestamp);

        if ($return) {
            $retval[] = [
                "title" => $item["title"],
                "id" => $id,
                "permlink" => $permlink,
                "date" => $newsdate,
            ];
            continue;
        }

        echo <<<EOT
<article class="newsItem">
  <header class="title">
    <time class="newsdate" datetime="{$item["published"]}">{$newsdate}</time>
    <h2 class="newstitle"><a id="{$id}" href="{$permlink}" rel="bookmark" class="bookmark">{$item["title"]}</a></h2>
  </header>
  <div class="newscontent">
    <div class="newsImage">{$image}</div>
    {$item["content"]}
  </div>
</article>

EOT;
    }

    return $retval;
}

function site_header(?string $title = NULL, array $config = []): void
{
    global $MYSITE, $LANG;

    $title = $title ? "PHP: {$title}" : 'PHP';
    $meta_image_path = $MYSITE . 'images/meta-image.png';
    $meta_description = $config['description'] ?? "PHP is a popular general-purpose scripting language that powers everything from your blog to the most popular websites in the world.";

    $defaults = [
        "lang" => $LANG,
        "current" => "",
        "meta-navigation" => [],
        'classes' => '',
        'layout_span' => 9,
        "cache" => false,
        "headsup" => "",
        'meta_tags' => <<<META
<meta name="Description" content="{$meta_description}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@official_php" />
<meta name="twitter:title" content="{$title}" />
<meta name="twitter:description" content="{$meta_description}" />
<meta name="twitter:creator" content="@official_php" />
<meta name="twitter:image:src" content="{$meta_image_path}" />

<meta itemprop="name" content="{$title}" />
<meta itemprop="description" content="{$meta_description}" />
<meta itemprop="image" content="{$meta_image_path}" />

<meta property="og:image" content="{$meta_image_path}" />
<meta property="og:description" content="$meta_description" />

<link href="https://fosstodon.org/@php" rel="me" />
META
    ];

    $config = array_merge($defaults, $config);

    $config["headsup"] = get_news_changes();

    $lang = (new Languages())->convert($config["lang"]);
    $curr = $config["current"];
    $classes = $config['classes'];

    if (isset($_COOKIE["MD"]) || isset($_GET["MD"])) {
        $classes .= "markdown-content";
        $config["css_overwrite"] = ["/styles/i-love-markdown.css"];
    }

    // shorturl; http://wiki.snaplog.com/short_url
    if (isset($_SERVER['BASE_PAGE']) && $shortname = get_shortname($_SERVER["BASE_PAGE"])) {
        $shorturl = "https://www.php.net/" . $shortname;
    }

    require __DIR__ . "/header.inc";
}
function site_footer(array $config = []): void
{
    require __DIR__ . "/footer.inc";
}

function get_nav_items(): array {
  return [
    new NavItem(
      name: 'Downloads',
      href: '/downloads.php',
      id: 'downloads',
    ),
    new NavItem(
      name: 'Documentation',
      href: '/docs.php',
      id: 'docs',
    ),
    new NavItem(
      name: 'Get Involved',
      href: '/get-involved.php',
      id: 'community',
    ),
    new NavItem(
      name: 'Help',
      href: '/support.php',
      id: 'help',
    ),
    new NavItem(
      name: 'PHP 8.5',
      href: '/releases/8.5/index.php',
      id: 'php8',
      image: '/images/php8/logo_php8_5.svg',
    )
  ];
}

function get_news_changes()
{
    $lastNews = (new NewsHandler())->getLastestNews();
    if ($lastNews === null) {
        return false;
    }

    $date = date_create($lastNews["updated"]);
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
        $link = preg_replace('~^(http://php.net/|https://www.php.net/)~', '/', $lastNews["link"][0]["href"]);
        $title = $lastNews["title"];
        return "<a href='{$link}'>{$title}</a>";
    }
    return false;
}

function doc_toc($lang): void {
    $file = __DIR__ . "/../manual/$lang/toc/index.inc";
    if (!file_exists($file)) {
        $lang = "en"; // Fallback on english if the translation doesn't exist
        $file = __DIR__ . "/../manual/en/toc/index.inc";
    }
    require __DIR__ . "/../manual/$lang/toc/index.inc";

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
function doc_toc_list($lang, $index, $file): void {
    include __DIR__ . "/../manual/$lang/toc/$file.inc";

    doc_toc_title($lang, $index, $file);
    foreach ($TOC as $entry) {
        echo "\t<dd><a href='/manual/$lang/{$entry[0]}'>{$entry[1]}</a></dd>\n";
    }
}
function doc_toc_title($lang, $index, $file, $elm = "dt"): void {
    foreach ($index as $entry) {
        if ($entry[0] == "$file.php") {
            $link = $entry[0];
            $title = $entry[1];
            break;
        }
    }
    echo "<$elm><a href='/manual/$lang/$link'>$title</a></$elm>\n";
}
