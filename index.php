<?php
/*
   If you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn!
*/

/* ------------------------------------------------------------------------- */

// Get the modification date of this PHP file
$timestamps[] = @getlastmod();

/*
   The date of prepend.inc represents the age of ALL
   included files. Please touch it if you modify any
   other include file (and the modification affects
   the display of the index page). The cost of stat'ing
   them all is prohibitive. Also note the file path,
   we aren't using the include path here.
*/
$timestamps[] = @filemtime("include/prepend.inc");

// Calendar is the only "dynamic" feature on this page
$timestamps[] = @filemtime("include/pregen-events.inc");

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

// This goes to the left sidebar of the front page
$SIDEBAR_DATA = '
<h3>What is PHP?</h3>
<p>
 <acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
 is a widely-used general-purpose scripting language that is
 especially suited for Web development and can be embedded into HTML.
 If you are new to PHP and want to get some idea
 of how it works, try the <a href="/tut.php">introductory tutorial</a>.
 After that, check out the online <a href="/docs.php">manual</a>,
 and the example archive sites and some of the other resources
 available in the <a href="/links.php">links section</a>.
</p>
<p>
 Ever wondered how popular PHP is? see the
 <a href="/usage.php">Netcraft Survey</a>.
</p>
<p>
 PHP is a project of the
 <a href="http://www.apache.org/">Apache Software Foundation</a>.
</p>

<h3><a href="/thanks.php">Thanks To</a></h3>
<ul class="simple">
 <li><a href="http://www.easydns.com/?V=698570efeb62a6e2">easyDNS</a></li>
 <li><a href="http://www.directi.com/">Directi</a></li>
 <li><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
 <li><a href="http://www.rackshack.net/">RackShack</a></li>
 <li><a href="http://www.servercentral.net/">Server Central</a></li>
 <li><a href="http://www.redundant.com/">Redundant Networks</a></li>
 <li><a href="http://www.simplicato.com/?a=1007">Simplicato</a></li>
 <li><a href="http://www.rackspace.com/?supbid=php.net">Rackspace</a></li>
</ul>
<h3>Related sites</h3>
<ul class="simple">
 <li><a href="http://www.apache.org/">Apache</a></li>
 <li><a href="http://www.mysql.com/">MySQL</a></li>
 <li><a href="http://www.postgresql.org/">PostgreSQL</a></li>
 <li><a href="http://www.zend.com/">Zend Technologies</a></li>
</ul>
<h3>Community</h3>
<ul class="simple">
 <li><a href="http://www.devnetwork.net/">PHP Developers Network</a></li>
 <li><a href="http://www.linuxfund.org/">LinuxFund.org</a></li>
 <li><a href="http://www.osdn.org/">OSDN</a></li>
</ul>

<h3>Syndication</h3>
<p>
 You can grab our news as an RSS feed via a daily dump in a file
 named <a href="/news.rss">news.rss</a>.
</p>

<h3>Contact</h3>
<p>
 Please submit website bugs in the
 <a href="http://bugs.php.net/">bug system</a>.
</p>';

$MIRROR_IMAGE = '';

// Iterate through possible mirror provider logo types in priority order
$types = array("gif", "jpg", "png");
while (list(,$ext) = each($types)) {

    // Check if file exists for this type
    if (file_exists("backend/mirror." . $ext)) {

        // Add text to rigth sidebar
        $MIRROR_IMAGE = "<div align=\"center\"><h3>This mirror sponsored by:</h3>\n";

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
                         $img . "</a></div><br /><hr />\n";

        // We have found an image
        break;
    }
}

// Prepend mirror image to sidebar text
$RSIDEBAR_DATA = $MIRROR_IMAGE . $RSIDEBAR_DATA;

// Run the boldEvents() function on page load
$ONLOAD = "boldEvents(); searchHistory();";

// Write out common header
commonHeader("Hypertext Preprocessor");

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<?php news_image("http://servercentral.net", "server_central.gif", "Server Central"); ?>

<h1>Server Central Donates Server</h1>
<p>
 <span class="newsdate">[28-Aug-2003]</span>
 Chicago-based company <a href="http://servercentral.net/">Server Central</a> has donated PHP.net a brand new 
 server with a gigabit connection. The box is a quad 2.4GHz machine with 2GB ram, so we're going to be using 
 it to power our more resource-intensive tasks, including building the manual.  Thanks, Server Central!
</p>

<hr />

<h1>European Open Source Development Threatened!</h1>
<p>
 <span class="newsdate">[27-Aug-2003]</span>
 Today sees an international day of protest against the move by the EU to make obtaining a patent easier within 
 Europe. Such patents may cause Open Source software such as PHP to infringe on existing licenses and new ones, 
 meaning we would no longer be safe to distribute PHP within Europe. Contact your EU Representative to get this
 cruicial vote blocked. Find out more at the <a href="http://swpat.ffii.org/">campaign website</a> 
</p>
 
<hr />

<?php news_image("http://www.php-con.com", "phpcon_2003.gif", "php{con west 2003"); ?>  

<h1>php{con west is announced</h1>
<p>
 <span class="newsdate">[26-Aug-2003]</span>
 php{con returns to the San Francisco Bay Area with new sessions, PHP gurus and a whole new day of PHP-intensive 
 learning. Their program features a full day of tutorials, three technical session tracks over two days, an all day 
 coding marathon, Code Sprint, social events, works in progress, and presentations from PHP luminaries. Early Bird 
 discounts end on September 26th. See the full program and register online at <a href="http://www.php-con.com">their
 website</a>
</p>

<hr />

<h1>PHP 4.3.3 released!</h1>
<p>
 <span class="newsdate">[25-Aug-2003]</span>
 The PHP developers are proud to announce the immediate availability of
 <a href="release_4_3_3.php">PHP 4.3.3</a>. This release contains a large number of bug fixes
 and we <strong>strongly</strong> recommend that all users of PHP upgrade to this version.
 Full list of fixes can be found in the <a href="ChangeLog-4.php#4.3.3">NEWS</a> file.
</p>

<hr />

<?php news_image("http://www.ActiveState.com/Corporate/ActiveAwards/", "activestate_logo.gif", "ActiveState"); ?>

<h1>Active Awards 2003 Winners</h1>

<p>
 <span class="newsdate">[15-Aug-2003]</span>
 The <a href="http://www.activestate.com/Corporate/ActiveAwards/">Active Awards</a>
 are held annually to honor members of the open source community who actively
 contribute to open source languages and display excellence in their programming
 efforts. Programmers' Choice Award winners were nominated and chosen by the open
 source community. Activators' Choice Award winners were chosen by ActiveState's
 development team.
</p>
<p>
 This year's nominees were: Monte Ohrt, Paul S. Owen, Stanislav Malyshev,
 Stig Bakken and Wez Furlong. The Programmers' Choice winner is
 <strong>Stig Bakken</strong>, the father of PEAR. The Activators' Choice
 winner is <strong>Ilia Alshanetsky</strong>, member of the PHP Quality
 Assurance team, developer of the fudforum package, and a major contributor
 to PHP development.
</p>

<hr />

<h1>PHP.net news history</h1>

<p>
 <span class="newsdate">[15-Aug-2003]</span>
 Ever wonder what was the original PHP 3.0 release announcement, what
 where the choices when the PHP: Hypertext Preprocessor name was
 choosen, or since when you can use URL shortcuts to access pieces
 of our site? We have digged up some of the most interesting news
 items published on PHP.net since January 1998, when the site started
 to serve its visitors. You can find these <a href="/news-2003.php">in
 the news archives</a>. There is also some historical information in
 <a href="/history">the manual's history appendix</a>.
</p>

<hr />

<h1>Select mirror for redirection</h1>

<p>
 <span class="newsdate">[13-Aug-2003]</span>
 The www.php.net site tries to do the best to choose close mirrors based
 on all available data when redirecting users to mirror sites. Sometimes
 close mirror sites are unfortunately not the fastest. This is why we have
 added the mirror site selection possibility to <a href="/my.php">our My
 PHP.net service</a>, which enables users to select a specific mirror
 site for redirections.
</p>

<hr />

<?php news_image("http://www.php-mag.net/", "php-mag.gif", "PHP Magazine"); ?> 

<h1>PHP Magazine web site now with daily news</h1>

<p>
 <span class="newsdate">[12-Aug-2003]</span>
 <a href="http://www.php-mag.net/">The International PHP Magazine web site</a>
 now offers daily news for PHP professionals and beginners from all over the
 world, helping them to stay up-to-date with the latest news on PHP and
 related technologies.
</p>

<hr />

<h1>PHP 4.3.3RC3 released</h1>
<p>
 <span class="newsdate">[07-Aug-2003]</span>
 <a href="http://qa.php.net/">PHP 4.3.3RC3</a> has been released for testing.
 This is should be the last release candidate prior to the final 4.3.3 release.
 Please test this release as much as possible, so that any remaining issues can
 be uncovered and resolved.
</p>
<p>
 List of changes can be found in the 
 <a href="http://cvs.php.net/diff.php/php-src/NEWS?login=2&amp;r2=1.1247.2.329&amp;r1=1.1247.2.314">NEWS</a>
 file.
</p>

<hr />

<h1>URL Shortcuts and Site Search</h1>

<p>
 <span class="newsdate">[29-Jul-2003]</span>
 After many of our users requested a change in how
 <a href="/urlhowto.php">our URL shortcuts</a> behave when someone mistypes
 a shortcut, the default behaviour now is to look for a function name
 instead of performing a documentation search on Google. Those, who were
 satisfied with the Google search, can <a href="/my.php">set their
 preference at the My PHP.net page</a>. We are working on a better
 onsite search solution, Google is used temporarily to search our site.
</p>

<hr />

<?php news_image("http://www.phparch.com/", "phpa_logo_small.gif", "php|architect"); ?> 

<h1>php|architect now in print</h1>

<p>
 <span class="newsdate">[17-Jul-2003]</span>
 The publishers of <a href="http://www.phparch.com/">php|architect</a>, a
 monthly magazine dedicated exclusively to the world of PHP, have announced the
 availability of a <a href="http://www.phparch.com/print/">print edition</a> of 
 their publication. Subscriptions are now available at a special introductory
 price for readers worldwide.
</p>

<hr />

<?php news_image("http://www.linuxtag.org/2003/en/index.html", "linuxtag2003.gif", "LinuxTag"); ?>

<h1>PHP @ LinuxTag</h1>
<p>
 <span class="newsdate">[06-Jul-2003]</span>
 From July, 10th to 13th 2003
 <a href="http://www.linuxtag.org/2003/en/index.html">LinuxTag</a>, Europe's
 largest Fair and Congress dedicated to Open Source in general and Linux in
 particular, takes place in Karlsruhe, Germany.
</p>
<p>
 Under the motto "PHP and Friends" the PHP Project showcases PHP and related
 projects, like MySQL, SQLite, Midgard, osCommerce or DB Designer, at booth
 F21.  In addition to the booth "PHP and Friends" offer an interesting
 programme of
 <a href="http://www.infodrom.org/Debian/events/LinuxTag2003/workshops.php3">technical
 talks and workshops</a> which are held by 24 speakers from 11 nations and cover
 the latest trends and technologies related to PHP, Apache and MySQL. Among the
 speakers are core developers of the discussed Open Source projects, for instance
 Ken Coar (Apache), Rasmus Lerdorf (PHP) or Kaj Arn&ouml; (MySQL).
</p>

<hr />

<h1>PHP 5.0.0 Beta 1</h1>
<p>
 <span class="newsdate">[29-Jun-2003]</span>
 The PHP development community is proud to announce the release of PHP 5
 Beta 1. Both source packages, and a Windows build are available in the
 <a href="/downloads.php">Downloads Section</a>. A list of changes 
 can be found in the <a href="/ChangeLog-5.php">ChangeLog</a> file.
</p>
<p>
 Some of the more major changes include:
</p>
<ul>
 <li>
  PHP 5 features the Zend Engine 2.  For a list of Zend Engine 2 changes, please visit 
  <a href="/zend-engine-2.php">this</a> webpage.
 </li>
 <li>
  XML support has been completely redone in PHP 5, all extensions are now focused around the 
  excellent libxml2 library (<a href="http://www.xmlsoft.org/">http://www.xmlsoft.org/</a>).
 </li>
 <li>
  SQLite has been bundled with PHP. For more information on SQLite, please visit their 
  <a href="http://www.hwaci.com/sw/sqlite/">website</a>.
 </li>
 <li>
  Streams have been greatly improved, including the ability to access low-level socket 
  operations on streams.
 </li>
</ul>
<p>
 <strong>Note</strong>: <em>This is a beta version. It should not be used in
 production or even semi-production web sites.</em> There are known bugs in it,
 and in addition, some of the features may change (based on feedback). We
 encourage you to download and play with it (and <a href="http://bugs.php.net/">report 
 bugs</a> if you find any!), but please do not replace your production
 installations of PHP 4 at this time.
</p>

<hr />

<?php news_image("http://www.zend.com/survey/php_net.php", "zendtech_logo.gif", "Zend Technologies"); ?>

<h1>PHP Usage Survey</h1>
<p>
 <span class="newsdate">[24-Jun-2003]</span>
 Zend Technologies is sponsoring a public PHP Usage Survey.
 The results will be shared with the PHP Group, and will help
 us to better understand the ways in which PHP is being used,
 and what may need improvement.
 <a href="http://www.zend.com/survey/php_net.php">Fill it out</a>
 and get a chance to win one of 50 PHP T-shirts!
</p>

<hr />

<?php news_image("http://www.phpconference.de/2003/index_en.php", "international_conference_2003.gif", "International PHP Conference"); ?>

<h1>International PHP Conference 2003</h1>
<p>
 <span class="newsdate">[24-Jun-2003]</span>
 The traditional International PHP Conference 2003 will be taking place from
 2nd November to 5th November in Frankfurt (FFM). You can expect a gathering
 of PHP experts and core developers and to focus on PHP 5 as the main topic
 for the conference.
</p>
<p>
 The conference is also featuring an <strong>OpenSource Exhibition</strong>
 where PHP related OpenSource projects can present themselves for free.
</p>

<hr />

<h1>PHP 4.3.2 Released!</h1>
<p>
 <span class="newsdate">[29-May-2003]</span>
 The PHP developers are proud to announce the immediate availability of
 <a href="release_4_3_2.php">PHP 4.3.2</a>. This release contains a large number of bug fixes
 and is a <strong>strongly</strong> recommended update for all users of PHP.
 Full list of fixes can be found in the <a href="ChangeLog-4.php#4.3.2">NEWS</a> file.
</p>

<hr />

<h1>Automatic Mirror Select</h1>
<p>
 <span class="newsdate">[23-May-2003]</span>
 In our ongoing battle to fight load and keep serving you content, whenever you
 perform a search on www.php.net, you will be redirected onto a nearby mirror
 (determined using the <a href="http://www.directi.com/?site=ip-to-country">Directi
 Ip-to-Country Database</a>). 
 You may experience a few quirks in the search until your mirrors have synced an up-to-date
 version of the site.
</p>

<hr />

<p class="center"><a href="/news-2003.php">News Archive</a></p>

<?php commonFooter(); ?>
