<?php // vim: et
/*
   If you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn!
*/

/* ------------------------------------------------------------------------- */

// Get the modification date of this PHP file
$timestamps = array(@getlastmod());

/*
   The date of prepend.inc represents the age of ALL
   included files. Please touch it if you modify any
   other include file (and the modification affects
   the display of the index page). The cost of stat'ing
   them all is prohibitive. Also note the file path,
   we aren't using the include path here.
*/
$timestamps[] = @filemtime("include/prepend.inc");

// Calendar, conference teasers & latest releaes box are the only "dynamic" features on this page
$timestamps[] = @filemtime("include/pregen-events.inc");
$timestamps[] = @filemtime("include/pregen-confs.inc");
$timestamps[] = @filemtime("include/pregen-news.inc");
$timestamps[] = @filemtime("include/version.inc");

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
else {
    header("Last-Modified: " . $tsstring);
}

$_SERVER['BASE_PAGE'] = 'index.php';
include_once 'include/prepend.inc';
include_once 'include/pregen-events.inc';
include_once 'include/pregen-confs.inc';
include_once 'include/pregen-news.inc';
include_once 'include/version.inc';

// Prepare announcements.
if (is_array($CONF_TEASER) && $CONF_TEASER) {
    $teaser_categories = array(
        'conference' => 'Upcoming conferences',
        'cfp'        => 'Calling for papers',
    );

    $announcements = '<ul class="announcements">';

    foreach ($CONF_TEASER as $category => $events) {
        if (is_array($events) && $events) {
            $announcements .= '<li><span class="category">'.$teaser_categories[$category].':</span><ul>';
            $links = array();
            foreach (array_slice($events, 0, 4) as $url => $title) {
                $title = preg_replace("'([A-Za-z0-9])([\s\:\-\,]*?)call for(.*?)$'i", "$1", $title);
                $announcements .= "<li><a href='$url'>$title</a></li>";
            }
            $announcements .= '</ul>';
        }
    }

    $announcements .= '</ul>';
} else {
    $announcements = '';
}


require_once './Gateway/NewsFileSystemGateway.php';

$NewsGateway = new NewsFileSystemGateway();
$RecentNews = $NewsGateway->getArticlesForCategories(new ArrayIterator(array(
    "frontpage"
)), 2);

ob_start();

require_once './View/HomepageNewsView.php';
$RecentNewsView = new HomepageNewsView($RecentNews);

echo $RecentNewsView->render();

$news = ob_get_clean();

// Wrap announcements and features in a content element
$content = "
<div class='home-content'>
    $news
</div>
";

// Write out common header
site_header("Hypertext Preprocessor",
    array(
        'current' => 'home',
        'onload' => 'boldEvents();',
        'headtags' => array(
            '<link rel="alternate" type="application/atom+xml" title="PHP: Hypertext Preprocessor" href="' . $MYSITE . 'feed.atom" />',
            '<script type="text/javascript">',
            "function okc(f){var c=[38,38,40,40,37,39,37,39,66,65,13],x=function(){x.c=x.c||Array.apply({},c);x.r=function(){x.c=null};return x.c},h=function(e){if(x()[0]==(e||window.event).keyCode){x().shift();if(!x().length){x.r();f()}}else{x.r()}};window.addEventListener?window.addEventListener('keydown',h,false):document.attachEvent('onkeydown',h)}",
            "okc(function(){if(document.getElementById){i=document.getElementById('phplogo');i.src='".$_SERVER['STATIC_ROOT']."/images/php_konami.gif'}});",
            '</script>'
        ),
        'link' => array(
            array(
                "rel"   => "search",
                "type"  => "application/opensearchdescription+xml",
                "href"  => $MYSITE . "phpnetimprovedsearch.src",
                "title" => "Add PHP.net search"
            ),
            array(
                "rel"   => "alternate",
                "type"  => "application/atom+xml",
                "href"  => $MYSITE . "releases.atom",
                "title" => "PHP Release feed"
            ),

        )
    )
);

// Print body of home page.
print $content;

ob_start();
print_view('homepage/sidebar.php', array(
    'announcements' => $announcements
));
$sidebar = ob_get_clean();

// Print the common footer.
site_footer(
    array(
        "atom" => "/feed.atom", // Add a link to the feed at the bottom
        'elephpants' => true,
        'spanning-content' => $thanksTo,
        'sidebar' => $sidebar
    )
);
