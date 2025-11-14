<?php

use phpweb\News\NewsHandler;

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
include_once 'include/version.inc';

mirror_setcookie("LAST_NEWS", $_SERVER["REQUEST_TIME"], 60 * 60 * 24 * 365);

$content = "<div class='home-content'>";
foreach ((new NewsHandler())->getFrontPageNews() as $entry) {
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
<div class="modern-hero">
  <div class="hero-container">
    <div class="hero-content">
      <div class="hero-main-content">
        <div class="hero-badge">
          <span>The Web's Favorite Language</span>
        </div>
        <img src="/images/logos/php-logo-white.svg" alt="PHP" class="hero-logo" width="120" height="60">
        <h1 class="hero-title">
          <span class="title-line">Build</span>
          <span class="title-line">the Web</span>
          <span class="title-accent">with PHP</span>
        </h1>
        <p class="hero-description">
          The popular general-purpose scripting language that powers everything from personal blogs to the most visited websites in the world. Fast, flexible, and pragmatic.
        </p>

        <div class="hero-stats">
          <div class="stat-item">
            <div class="stat-number">79%</div>
            <div class="stat-label">of websites</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">30+</div>
            <div class="stat-label">years strong</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">Active</div>
            <div class="stat-label">development</div>
          </div>
        </div>

        <div class="hero-actions">
          <a href="/downloads.php" class="btn-primary">
            <span>Download PHP</span>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10 12l-4-4h3V4h2v4h3l-4 4zm-7 4h14v2H3v-2z"/>
            </svg>
          </a>
          <a href="/releases/8.4/index.php" class="btn-secondary">
            <span>What's New in 8.4</span>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="hero-code-demo">
            <div class="code-window">
          <div class="code-header">
            <div class="code-dots">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="code-title">hello-world.php</div>
            <div class="code-actions">
              <button class="code-btn active" data-demo="basic">PDO</button>
              <button class="code-btn" data-demo="modern">Attributes</button>
              <button class="code-btn" data-demo="framework">Arrays</button>
            </div>
          </div>
          <div class="code-content">
            <div class="code-demo active" id="basic-demo">
              <pre><code><span class="token-tag">&lt;?php</span>
<span class="token-comment">// PDO Database Connection</span>
<span class="token-variable">\$pdo</span> = <span class="token-keyword">new</span> <span class="token-class">PDO</span>(
    <span class="token-string">'mysql:host=localhost;dbname=app'</span>,
    <span class="token-variable">\$username</span>, <span class="token-variable">\$password</span>
);

<span class="token-comment">// Secure prepared statements</span>
<span class="token-variable">\$stmt</span> = <span class="token-variable">\$pdo</span>-><span class="token-function">prepare</span>(
    <span class="token-string">'SELECT * FROM users WHERE age > ?'</span>
);
<span class="token-variable">\$stmt</span>-><span class="token-function">execute</span>([<span class="token-number">18</span>]);
<span class="token-variable">\$users</span> = <span class="token-variable">\$stmt</span>-><span class="token-function">fetchAll</span>();
</code></pre>
            </div>

            <div class="code-demo" id="modern-demo">
              <pre><code><span class="token-tag">&lt;?php</span>
<span class="token-comment">// PHP 8+ Attributes & Features</span>
<span class="token-attribute">#[Required]</span>
<span class="token-attribute">#[Validate('email')]</span>
<span class="token-keyword">readonly</span> <span class="token-keyword">class</span> <span class="token-class">User</span> {
    <span class="token-keyword">public</span> <span class="token-keyword">function</span> <span class="token-function">__construct</span>(
        <span class="token-keyword">public</span> <span class="token-keyword">string</span> <span class="token-variable">\$email</span>,
        <span class="token-keyword">public</span> <span class="token-keyword">?DateTime</span> <span class="token-variable">\$lastLogin</span> = <span class="token-keyword">null</span>
    ) {}
}

<span class="token-comment">// Match expressions & null coalescing</span>
<span class="token-variable">\$status</span> = <span class="token-keyword">match</span>(<span class="token-variable">\$user</span>-><span class="token-property">role</span>) {
    <span class="token-string">'admin'</span> => <span class="token-string">'Administrator'</span>,
    <span class="token-string">'user'</span> => <span class="token-string">'Member'</span>,
    <span class="token-keyword">default</span> => <span class="token-string">'Guest'</span>
};
</code></pre>
            </div>

            <div class="code-demo" id="framework-demo">
              <pre><code><span class="token-tag">&lt;?php</span>
<span class="token-comment">// Powerful Array Functions</span>
<span class="token-variable">\$products</span> = [
    [<span class="token-string">'name'</span> => <span class="token-string">'Laptop'</span>, <span class="token-string">'price'</span> => <span class="token-number">999</span>, <span class="token-string">'category'</span> => <span class="token-string">'tech'</span>],
    [<span class="token-string">'name'</span> => <span class="token-string">'Phone'</span>, <span class="token-string">'price'</span> => <span class="token-number">599</span>, <span class="token-string">'category'</span> => <span class="token-string">'tech'</span>],
    [<span class="token-string">'name'</span> => <span class="token-string">'Book'</span>, <span class="token-string">'price'</span> => <span class="token-number">29</span>, <span class="token-string">'category'</span> => <span class="token-string">'books'</span>]
];

<span class="token-comment">// Filter, map, reduce operations</span>
<span class="token-variable">\$techProducts</span> = <span class="token-function">array_filter</span>(<span class="token-variable">\$products</span>,
    <span class="token-keyword">fn</span>(<span class="token-variable">\$p</span>) => <span class="token-variable">\$p</span>[<span class="token-string">'category'</span>] === <span class="token-string">'tech'</span>
);

<span class="token-variable">\$total</span> = <span class="token-function">array_reduce</span>(<span class="token-variable">\$products</span>,
    <span class="token-keyword">fn</span>(<span class="token-variable">\$sum</span>, <span class="token-variable">\$p</span>) => <span class="token-variable">\$sum</span> + <span class="token-variable">\$p</span>[<span class="token-string">'price'</span>], <span class="token-number">0</span>
);
</code></pre>
            </div>
          </div>
        </div>
      </div>

        </div>
      </div>
    </div>
EOF;

site_header(null,
    [
        'current' => 'home',
        'headtags' => [
            '<link rel="alternate" type="application/atom+xml" title="PHP: Hypertext Preprocessor" href="' . $MYSITE . 'feed.atom">',
            '<script>',
            "function okc(f){var c=[38,38,40,40,37,39,37,39,66,65,13],x=function(){x.c=x.c||Array.apply({},c);x.r=function(){x.c=null};return x.c},h=function(e){if(x()[0]==(e||window.event).keyCode){x().shift();if(!x().length){x.r();f()}}else{x.r()}};window.addEventListener?window.addEventListener('keydown',h,false):document.attachEvent('onkeydown',h)}",
            "okc(function(){if(document.getElementById){i=document.getElementById('phplogo');i.src='" . $MYSITE . "images/php_konami.gif'}});",
            '</script>',
        ],
        'link' => [
            [
                "rel" => "search",
                "type" => "application/opensearchdescription+xml",
                "href" => $MYSITE . "phpnetimprovedsearch.src",
                "title" => "Add PHP.net search",
            ],
            [
                "rel" => "alternate",
                "type" => "application/atom+xml",
                "href" => $MYSITE . "releases/feed.php",
                "title" => "PHP Release feed",
            ],

        ],
        'css' => ['home.css'],
        'js_files' => ['js/home-tabs.js'],
        'intro' => $intro,
    ],
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

    <div class='panel'>
      <a href='https://thephp.foundation/' class='headline'>The PHP Foundation</a>
      <div class='body'>
        <p>The PHP Foundation is a collective of people and organizations, united in the mission to ensure the long-term prosperity of the PHP language.
        <p><a href='https://thephp.foundation/donate/' target="_blank" rel="noopener noreferrer" class='btn btn-primary'>Donate</a></p>
      </div>
    </div>
$announcements
    <p class='panel'><a href='/cal.php'>User Group Events</a></p>
    <p class='panel'><a href='/thanks.php'>Special Thanks</a></p>
    <div class='panel social-media'>
      <span class='headline'>Social media</span>
      <div class='body'>
        <ul>
          <li>
            <a href="https://twitter.com/official_php" target="_blank" rel="noopener noreferrer">
              <i class="icon-x-twitter"></i>
              @official_php
            </a>
          </li>
          <li>
            <a href="https://fosstodon.org/@php" target="_blank" rel="noopener noreferrer">
              <i class="icon-mastodon"></i>
              @php@fosstodon.org
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/company/phpnet" target="_blank" rel="noopener noreferrer">
              <i class="icon-linkedin"></i>
              @phpnet
            </a>
          </li>
        </ul>
      </div>
    </div>

SIDEBAR_DATA;

// Print the common footer.
site_footer([
    "atom" => "/feed.atom", // Add a link to the feed at the bottom
    'elephpants' => true,
    'sidebar' => $SIDEBAR,
]);
