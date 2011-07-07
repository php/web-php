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
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-events.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-confs.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/pregen-news.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

// Prepare news headings.
$news = "<ul>";
foreach (print_news($NEWS_ENTRIES, "frontpage", 5, null, true) as $entry) {
    $news .= <<< EOT
<li>[{$entry["date"]}] <a href="{$entry["permlink"]}">{$entry["title"]}</a></li>
EOT;
}
$news .= "</ul>";
$news .= '<p class="center"><a href="/archive/index.php">News Archive</a></p>';

// Prepare sidebar.
$sidebar = <<< EOT
<div class=home-sidebar>
    <h2>Recent News</h2>
    <ul>
        <li>PHP 5.3.5 and 5.2.17 Released!</li>
        <li>PHP 5.2.16 Released!</li>
        <li>PHP 5.3.4 Released!</li>
    </ul>

    <h2>Conferences</h2>
    <ul>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
    </ul>

    <h2>User Group Events</h2>
    <ul>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Lorem ipsum dolor sit amet</li>
    </ul>

    <h2>Thanks To</h2>
    <ul>
     <li><a href="http://www.easydns.com/?V=698570efeb62a6e2" title="DNS Hosting provided by easyDNS">easyDNS</a></li>
     <li><a href="http://www.directi.com/">Directi</a></li>
     <li><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
     <li><a href="http://www.servercentral.net/">Server Central</a></li>
     <li><a href="http://www.hostedsolutions.com/">Hosted Solutions</a></li>
     <li><a href="http://www.spry.com/">Spry VPS Hosting</a></li>
     <li><a href="http://ez.no/">eZ Systems</a> / <a href="http://www.hit.no/">HiT</a></li>
     <li><a href="http://www.osuosl.org">OSU Open Source Lab</a></li>
     <li><a href="http://www.yahoo.com/">Yahoo! Inc.</a></li>
     <li><a href="http://www.binarysec.com/">BinarySEC</a></li>
     <li><a href="http://www.nexcess.net/">NEXCESS.NET</a></li>
     <li><a href="http://www.rackspace.com/">Rackspace</a></li>
     <li><a href="http://www.eukhost.com/">EUKhost</a></li>
     <li><a href="http://www.micfo.com/">micfo</a></li>
    </ul>
</div>
EOT;

// Prepare announcements.
$announcements = "
<div class='announcements'>
Upcoming conferences: PHP North West, 2011
</div>
";

// Prepare featured content.
$features = "
<div class=featured-content>
    <div class='feature top-left'>
        <span class=graphic></span>
        <h2>Get Involved!</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
        </p>
    </div>
    <div class='feature top-right'>
        <span class=graphic></span>
        <h2>Need Help?</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
        </p>
    </div>
    <div class='separator'></div>
    <div class='feature bottom-left'>
        <span class=graphic></span>
        <h2>PECL + PEAR</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
        </p>
    </div>
    <div class='feature bottom-right'>
        <span class=graphic></span>
        <h2>Website Tips/Tricks</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.
        </p>
    </div>
    <br style='clear: both;' />
</div>
";

// Wrap announcements and features in a content element
$content = "
<div class='home-content'>
    $announcements
    $features
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

        ),
        'elephpants' => true
    )
);

// Print body of home page.
print $sidebar;
print $content;

// Print the common footer.
site_footer(
    array("atom" => "/feed.atom") // Add a link to the feed at the bottom
);
