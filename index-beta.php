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

$news = "<ul>";
foreach (print_news($NEWS_ENTRIES, "frontpage", 5, null, true) as $entry) {
    $news .= <<< EOT
<li>[{$entry["date"]}] <a href="{$entry["permlink"]}">{$entry["title"]}</a></li>
EOT;
}
$news .= "</ul>";
$news .= '<p class="center"><a href="/archive/index.php">News Archive</a></p>';

$MIRROR_IMAGE = '';
// Try to find a sponsor image in case this is an official mirror
if (is_official_mirror()) {

    // Iterate through possible mirror provider logo types in priority order
    $types = array("gif", "jpg", "png");
    while (list(,$ext) = each($types)) {

        // Check if file exists for this type
        if (file_exists("backend/mirror." . $ext)) {

            // Add text to rigth sidebar
            $MIRROR_IMAGE = "<h3 class=\"fat-border\">This mirror sponsored by:</h3>\n";

            // Create image HTML code
            $img = make_image(
                'mirror.' . $ext,
                htmlspecialchars(mirror_provider()),
                FALSE,
                FALSE,
                'backend',
                0
            );

            // Add size information depending on mirror type
            if (is_primary_site() || is_backup_primary()) {
                $img = resize_image($img, 125, 125);
            } else {
                $img = resize_image($img, 120, 60);
            }

            // End mirror specific part
            $MIRROR_IMAGE .= '<a href="' . mirror_provider_url() . '">' .
                            $img . "</a><br />\n";

            // We have found an image
            break;
        }
    }
}

$confs = "";
if (is_array($CONF_TEASER) && count($CONF_TEASER)) {
    $categories = array("conference" => "Upcoming conferences", "cfp" => "Calling for papers");
    foreach($CONF_TEASER as $k => $a) {
        if (is_array($a) && count($a)) {
            $confs .= "<h4 class=\"fat-border\">" .$categories[$k]."</h4><ul>\n";
            $count = 0;
            $a = preg_replace("'([A-Za-z0-9])([\s\:\-\,]*?)call for(.*?)$'i", "$1", $a);
            foreach($a as $url => $title) {
                if ($count++ >= 4) {
                    break;
                }
                $confs .= '       <li><a href="' . $url. '">' . $title. '</a></li>' . "\n";
            }
            $confs .= "</ul>";
        } // if set
    }
}

/* {{{ Generate latest release info */
/* Do we have any release candidates to brag about? */
$RCS = array(
  $PHP_5_2_RC => $PHP_5_2_RC_DATE,
  $PHP_5_3_RC => $PHP_5_3_RC_DATE,
);
$rel = $rc = "";
if (isset($RCS)) {
    foreach ((array)$RCS as $r => $d) {
        if ($r) {
            $rc .= '    <li class="php5"><a href="http://qa.php.net/"><span class="release">' . "$r ($d)</span></a></li>\n";
        }
    }
}

if (!empty($rc)) {
	$rel .= <<< EOT
   <h3 class="fat-border"><a href="http://qa.php.net/rc.php">Release Candidates</a></h3>
   <ol id="candidates">
$rc
   </ol>
EOT;
}
$thanks = <<< EOT
<h3 class="fat-border"><a href="/thanks.php">Thanks To</a></h3>
<ul class="simple">
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
</ul>
EOT;

/* }}} */
// This goes to the left sidebar of the front page
$SIDEBAR_DATA = '
<h3>Recent news</h3>
' . $news . '
' . $MIRROR_IMAGE . '
' . $rel . '
' . $confs . '
' . $thanks . '
';



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
    )
);



?>


<?php
site_footer(
    array("atom" => "/feed.atom") // Add a link to the feed at the bottom
);

