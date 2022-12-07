<?php // vim: et
(function ($uri): void {
    // Special redirect cases not able to be captured in error.php
    $shortcuts = [
        '/?:' => '/language.operators.comparison#language.operators.comparison.ternary',
        '/??' => '/language.operators.comparison#language.operators.comparison.coalesce',
        '/??=' => '/language.operators.assignment#language.operators.assignment.other',
    ];
    if (isset($shortcuts[$uri])) {
        header("Location: {$shortcuts[$uri]}");
        exit;
    }
})($_SERVER['REQUEST_URI'] ?? '');

// Get the modification date of this PHP file
$timestamps = [@getlastmod()];

/*
   The date of prepend.inc represents the age of ALL
   included files. Please touch it if you modify any
   other include file (and the modification affects
   the display of the index page). The cost of stat'ing
   them all is prohibitive.
*/
$timestamps[] = @filemtime("include/prepend.inc");

// These are the only dynamic parts of the frontpage
$timestamps[] = @filemtime("include/pregen-confs.inc");
$timestamps[] = @filemtime("include/pregen-news.inc");
$timestamps[] = @filemtime("include/version.inc");
$timestamps[] = @filemtime("js/common.js");

// The latest of these modification dates is our real Last-Modified date
$timestamp = max($timestamps);

// Note that this is not a RFC 822 date (the tz is always GMT)
$tsstring = gmdate("D, d M Y H:i:s ", $timestamp) . "GMT";

// Check if the client has the same page cached
if (isset($_SERVER["HTTP_IF_MODIFIED_SINCE"]) &&
    ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring)) {
    header("HTTP/1.1 304 Not Modified");
    exit();
}

// Inform the user agent what is our last modification date
header("Last-Modified: " . $tsstring);

$_SERVER['BASE_PAGE'] = 'index.php';
include_once 'include/prepend.inc';
include_once 'include/branches.inc';
include_once 'include/pregen-confs.inc';
include_once 'include/pregen-news.inc';
include_once 'include/version.inc';

mirror_setcookie("LAST_NEWS", $_SERVER["REQUEST_TIME"], 60 * 60 * 24 * 365);

$content = "<div class='home-content'>";
$frontpage = [];
foreach ($NEWS_ENTRIES as $entry) {
    foreach ($entry["category"] as $category) {
        if ($category["term"] == "frontpage") {
            $frontpage[] = $entry;
            if (count($frontpage) >= 25) {
                break 2;
            }
        }
    }
}
foreach ($frontpage as $entry) {
    $link = preg_replace('~^(http://php.net/|https://www.php.net/)~', '', $entry["id"]);
    $id = parse_url($entry["id"], PHP_URL_FRAGMENT);
    $date = date_create($entry['updated']);
    $date_human = date_format($date, 'd M Y');
    $date_w3c = date_format($date, DATE_W3C);
    $content .= <<<NEWSENTRY
<article class="newsentry">
  <header class="title">
    <time datetime="$date_w3c">$date_human</time>
    <h2 class="newstitle">
      <a href="{$MYSITE}{$link}" id="{$id}">{$entry["title"]}</a>
    </h2>
  </header>
  <div class="newscontent">
    {$entry["content"]}
  </div>
</article>
NEWSENTRY;
}
$content .= '<p class="archive"><a href="/archive/">Older News Entries</a></p>';
$content .= "</div>";

$intro = <<<EOF
  <div class="hero">
    <img class="hero-logo" src="/images/logos/php-logo-white.svg" alt="php" width="240" height="120">
    <p class="hero-text">A <strong>popular general-purpose scripting language</strong> that is especially suited to web development.<br />Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.</p>
    <div class="hero-actions">
      <a href="/releases/8.1/index.php" class="hero-btn hero-btn-primary">What's new in 8.1</a>
      <a href="/downloads.php" class="hero-btn hero-btn-secondary">Download</a>
    </div>
EOF;

$intro .= "<ul class='hero-versions'>\n";
$active_branches = get_active_branches();
krsort($active_branches);
foreach ($active_branches as $major => $releases) {
    krsort($releases);
    foreach ((array)$releases as $release) {
        $version = $release['version'];
        list($major, $minor, $_) = explode('.', $version);
        $intro .= "
            <li class='hero-version'><a class='hero-version-link' href='/downloads.php#v$version'>$version</a> &middot; <a class='notes' href='/ChangeLog-$major.php#$version'>Changelog</a> &middot; <a class='notes' href='/migration$major$minor'>Upgrading</a></li>\n";
    }
}
$intro .= "</ul>\n";
$intro .= <<<EOF
  </div>
EOF;

// Write out common header
$meta_image_path = $MYSITE . 'images/meta-image.png';
$meta_description = "PHP is a popular general-purpose scripting language that powers everything from your blog to the most popular websites in the world.";

site_header("Hypertext Preprocessor",
    [
        'current' => 'home',
        'headtags' => [
            '<link rel="alternate" type="application/atom+xml" title="PHP: Hypertext Preprocessor" href="' . $MYSITE . 'feed.atom">',
            '<script>',
            "function okc(f){var c=[38,38,40,40,37,39,37,39,66,65,13],x=function(){x.c=x.c||Array.apply({},c);x.r=function(){x.c=null};return x.c},h=function(e){if(x()[0]==(e||window.event).keyCode){x().shift();if(!x().length){x.r();f()}}else{x.r()}};window.addEventListener?window.addEventListener('keydown',h,false):document.attachEvent('onkeydown',h)}",
            "okc(function(){if(document.getElementById){i=document.getElementById('phplogo');i.src='" . $MYSITE . "images/php_konami.gif'}});",
            '</script>'
        ],
        'link' => [
            [
                "rel" => "search",
                "type" => "application/opensearchdescription+xml",
                "href" => $MYSITE . "phpnetimprovedsearch.src",
                "title" => "Add PHP.net search"
            ],
            [
                "rel" => "alternate",
                "type" => "application/atom+xml",
                "href" => $MYSITE . "releases/feed.php",
                "title" => "PHP Release feed"
            ],

        ],
        'css' => ['home.css'],
        'intro' => $intro,
        'meta_tags' => <<<META
<meta name="Description" content="{$meta_description}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@official_php" />
<meta name="twitter:title" content="PHP: Hypertext Preprocessor" />
<meta name="twitter:description" content="{$meta_description}" />
<meta name="twitter:creator" content="@official_php" />
<meta name="twitter:image:src" content="{$meta_image_path}" />

<meta itemprop="name" content="PHP: Hypertext Preprocessor" />
<meta itemprop="description" content="$meta_description" />
<meta itemprop="image" content="{$meta_image_path}" />

<meta property="og:image" content="{$meta_image_path}" />
<meta property="og:description" content="$meta_description" />
META
    ]
);

// Print body of home page.
echo $content;

// Prepare announcements.
if (is_array($CONF_TEASER)) {
    $conftype = [
        'conference' => 'Upcoming conferences',
        'cfp' => 'Conferences calling for papers',
    ];
    $announcements = "";
    foreach ($CONF_TEASER as $category => $entries) {
        if ($entries) {
            $announcements .= '<div class="panel">';
            $announcements .= '  <a href="/conferences" class="headline" title="' . $conftype[$category] . '">' . $conftype[$category] . '</a>';
            $announcements .= '<div class="body"><ul>';
            foreach (array_slice($entries, 0, 4) as $url => $title) {
                $title = preg_replace("'([A-Za-z0-9])([\s:\-,]*?)call for(.*?)$'i", "$1", $title);
                $announcements .= "<li><a href='$url' title='$title'>$title</a></li>";
            }
            $announcements .= '</ul></div>';
            $announcements .= '</div>';
        }
    }
} else {
    $announcements = '';
}

$SIDEBAR = <<<SIDEBAR_DATA

$announcements
    <p class='panel'><a href='/cal.php'>User Group Events</a></p>
    <p class='panel'><a href='/thanks.php'>Special Thanks</a></p>
    <div class='panel social-media'>
      <span class='headline'>Social media</span>
      <div class='body'>
        <ul>
          <li>
            <a href="https://twitter.com/official_php">
              <i class="icon-twitter"></i>
              @official_php
            </a>
          </li>
        </ul>
      </div>
    </div>

SIDEBAR_DATA;

// Print the common footer.
site_footer(
    [
        "atom" => "/feed.atom", // Add a link to the feed at the bottom
        'elephpants' => true,
        'sidebar' => $SIDEBAR
    ]
);
