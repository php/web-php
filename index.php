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

// Calendar is the only dynamic feature on this page
$timestamps[] = @filemtime("backend/events.csv");

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

include './include/prepend.inc';

// This goes to the left sidebar of the front page
$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a widely-used general-purpose scripting language that is
especially suited for Web development and can be embedded into HTML.
If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
Ever wondered how popular PHP is? see the ' .
make_link("/usage.php", "Netcraft Survey") . '.
</p>

<p>
PHP is a project of the ' .
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br />
&nbsp; ' . make_link("http://www.directi.com/", "Directi") . '<br />
&nbsp; ' . make_link("http://promote.pair.com/direct.pl?php.net", "pair Networks") . '<br />
&nbsp; ' . make_link("http://www.rackshack.net/", "RackShack") . ' <br />
&nbsp; ' . make_link("http://www.redundant.com/", "Redundant Networks") . '<br />
&nbsp; ' . make_link("http://www.simplicato.com/?a=1007", "Simplicato") . '<br />
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br />
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br />
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br />
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br />
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br />
<h3>Community</h3>
&nbsp; ' . make_link("http://www.devnetwork.net/", "PHP Developers Network") . '<br />
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br />
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br />

<h3>Syndication</h3>

<p>
You can grab our news as an RSS feed via a daily dump in a file
named <a href="/news.rss">news.rss</a>.
</p>

<h3>Contact</h3>

<p>
Please submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>';

// Possible mirror provider logo
// image types in priority order
$types = array("gif", "jpg", "png");

// Default right sidebar
$RSIDEBAR_DATA = '';

// Go through all possible types
while (list(,$ext) = each($types)) {

    // Check if file exists for this type
    if (file_exists("backend/mirror." . $ext)) {

        // Add text to rigth sidebar
        $RSIDEBAR_DATA .= "<div align=\"center\"><h3>This mirror sponsored by:</h3>\n";

        // Create image HTML code
        $img = make_image(
            'mirror.' . $ext,
            htmlspecialchars(mirror_provider()),
            false,
            false,
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
        $RSIDEBAR_DATA .= make_link(mirror_provider_url(), $img) .
                          '</div><br />' . hdelim();

        // We have found an image
        break;
    }
}

// Read in events CSV file
$fp = @fopen("backend/events.csv", "r");

// If we were able to open the file
if ($fp) {

    // Current month number, current category and categories list
    $cm = $ccat = 0;
    $cats = array('unknown', 'User Group Events', 'Conferences', 'Training');

    // Event duplication check hash
    $seen = array();

    $RSIDEBAR_DATA .= '<h3>Upcoming Events <a href="submit-event.php">[add]</a></h3>';

    // While we can read the events file
    while (true) {

        // Get information event elements from file
        $elems = fgetcsv($fp, 8192);
        if($elems === false) { break; }
        list($d, $m, $y, $ccode, $desc, $id, , , , , , , $cat) = $elems;

        // Fgetcvs() returns an array with a single null element
        // for a blank line, which we need to skip
        if ($d === NULL) { continue; }

        // If the month number changed
        if ($cm != (int) $m) {

            // Update current month information
            $cm = (int) $m;

            // Start month with a header
            $RSIDEBAR_DATA .= '<h4 class="eventmonth">' .
                              strftime('%B', mktime(12, 0, 0, $cm, $d, $y)) .
                              "</h4>\n";

            // We have not seen any events in this month
            $seen = array();
        }

        // Start new category with a category header
        if ($ccat != (int) $cat) {
            $RSIDEBAR_DATA .= '<h4>' . $cats[$cat] . '</h4>';
            $ccat = $cat;
        }
        
        // There is no event with this description in this month already seen
        if (!isset($seen[$desc])) {
            
            // Add event to sidebar
            $RSIDEBAR_DATA .= "<span class=\"event_$ccode\">$d. <a href=\"cal.php?id=$id\">" .
                              htmlspecialchars(stripslashes($desc)) .
                              "</a></span><br />\n";
            
            // Set seen flag
            $seen[$desc] = TRUE;
        }
    }

    // Close file (all events displayed)
    fclose($fp);
}

// Run the boldEvents() function on page load
$ONLOAD = "boldEvents(); searchHistory();";

// Write out common header
commonHeader("Hypertext Preprocessor");

// Diagnostical echo, to see what the mirror thinks about itself
echo "\n<!--$MYSITE-->\n";
?>

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
 <a href="http://cvs.php.net/diff.php/php-src/NEWS?login=2&r2=1.1247.2.329&r1=1.1247.2.314">NEWS</a>
 file.
</p>

<?php echo hdelim(); ?>

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

<?php echo hdelim(); ?>

<?php print_link("http://www.phparch.com/", make_image("news/phpa_logo_small.gif", "php|architect", "right")); ?> 

<h1>php|architect now in print</h1>

<p>
 <span class="newsdate">[17-Jul-2003]</span>
 The publishers of <a href="http://www.phparch.com/">php|architect</a>, a
 monthly magazine dedicated exclusively to the world of PHP, have announced the
 availability of a <a href="http://www.phparch.com/print/">print edition</a> of 
 their publication. Subscriptions are now available at a special introductory
 price for readers worldwide.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.linuxtag.org/2003/en/index.html", make_image("news/linuxtag2003.gif", "LinuxTag", "right") ); ?>

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
 <a href="http://www.infodrom.org/Debian/events/LinuxTag2003/workshops.php3">technical talks and workshops</a>
 which are held by 24 speakers from 11 nations and cover the latest trends and
 technologies related to PHP, Apache and MySQL.  Among the speakers are core
 developers of the discussed Open Source projects, for instance Ken Coar
 (Apache), Rasmus Lerdorf (PHP) or Kaj Arn&ouml; (MySQL).
</p>

<?php echo hdelim(); ?>

<h1>PHP 5.0.0 Beta 1</h1>
<p>
 <span class="newsdate">[29-Jun-2003]</span>
 The PHP development community is proud to announce the release of PHP 5 Beta 1.  Both source packages,
 and a Windows build are available in the <a href="/downloads.php">Downloads Section</a>.  A list of changes 
 can be found in the <a href="/ChangeLog-5.php">ChangeLog</a> file.
</p>
<p>
Some of the more major changes include:
</p>
<ul>
 <li>PHP 5 features the Zend Engine 2.  For a list of Zend Engine 2 changes, please visit 
 <a href="/zend-engine-2.php">this</a> webpage.</li>
 <li>XML support has been completely redone in PHP 5, all extensions are now focused around the 
 excellent libxml2 library (<a href="http://www.xmlsoft.org/">http://www.xmlsoft.org/</a>).</li>
 <li>SQLite has been bundled with PHP.  For more information on SQLite, please visit their 
 <a href="http://www.hwaci.com/sw/sqlite/">website</a>.</li>
 <li>Streams have been greatly improved, including the ability to access low-level socket 
 operations on streams.</li>
</ul>
<p>
<b>Note</b>: <i>This is a beta version. It should not be used in production or even semi-production
web sites.</i> There are known bugs in it, and in addition, some of the features may change (based on
feedback). We encourage you to download and play with it (and <a href="http://bugs.php.net/">report bugs</a>
if you find any!), but please do not replace your production installations of PHP 4 at this time.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.zend.com/survey/php_net.php", make_image("news/zendtech_logo.gif", "Zend Technologies", "right") ); ?>

<h1>PHP Usage Survey</h1>
<p>
 <span class="newsdate">[24-Jun-2003]</span>
Zend Technologies is sponsoring a public PHP Usage Survey.  The results will be shared with the PHP Group, and will help us to better understand the ways in which PHP is being used, and what may need improvement.  <a href="http://www.zend.com/survey/php_net.php">Fill it out</a> and get a chance to win one of 50 PHP T-shirts!
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.phpconference.de/2003/index_en.php", make_image("news/international_conference_2003.gif", "International PHP Conference", "right") ); ?>

<h1>International PHP Conference 2003</h1>
<p>
 <span class="newsdate">[24-Jun-2003]</span>
The traditional International PHP Conference 2003 will be taking place from
2nd November to 5th November in Frankfurt (FFM).  The Call for Papers has
been issued, so if you have an interesting talk, the organizers would
love to hear about it!
You can expect a gathering of PHP experts and core developers and to focus on PHP 5
as the main topic for the conference.
</p>
<p>
You can find the CfP <a href="http://www.phpconference.de/2003/cfp_en.php">on
the website</a>.  The deadline is 14th July, 2003.</p>
<p>
The conference is also featuring an <b>OpenSource Exhibition</b> where PHP related
OpenSource projects can present themselves for free.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.3RC1 released</h1>
<p>
 <span class="newsdate">[19-Jun-2003]</span>
 <a href="http://qa.php.net/">PHP 4.3.3RC1</a> has been released for testing.
 This is the first release candidate and should have a very low number of problems
 and/or bugs. Nevertheless, please download and test it as much as possible on real-life 
 applications to uncover any remaining issues.
</p>
<p>
 List of changes can be found in the 
 <a href="http://cvs.php.net/diff.php/php-src/NEWS?r1=1.1247.2.215.2.1&amp;r2=1.1247.2.261">NEWS</a>
 file.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.ActiveState.com/Corporate/ActiveAwards/", make_image("news/activestate_logo.gif", "ActiveState", "right") ); ?>

<h1>Active Awards Programmers' Choice Nominees are in!</h1>
<p>
<span class="newsdate">[06-June-2003]</span>
Thanks to the community for recognizing their peers in ActiveState's
third annual Active Awards.  The awards honor those individuals who
<b>actively</b> contribute to open languages and display excellence in their
programming efforts.  Please visit and help choose this years award winner!
</p><p>
More information and voting is at:
<a href="http://www.ActiveState.com/Corporate/ActiveAwards/">http://www.ActiveState.com/Corporate/ActiveAwards/</a>
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.2 Released!</h1>
<p>
<span class="newsdate">[29-May-2003]</span>
The PHP developers are proud to announce the immediate availability of
<a href="release_4_3_2.php">PHP 4.3.2</a>. This release contains a large number of bug fixes
and is a <b>strongly</b> recommended update for all users of PHP.
Full list of fixes can be found in the <a href="ChangeLog-4.php">NEWS</a> file.
</p>

<?php echo hdelim(); ?>

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

<?php echo hdelim(); ?>

<h1>Country Detection</h1>
<p>
<span class="newsdate">[04-May-2003]</span>
We are proud to introduce you the latest addition to our <a href="/my.php">My
PHP.net</a> service. The PHP.net site and mirror sites now autodetect
your country using the <a href="http://www.directi.com/?site=ip-to-country">Directi
Ip-to-Country Database</a>. We use this information to present events in
your country in bold letters on the frontpage, and to offer close mirror
sites for downloads and your usual daily work.
</p>

<?php echo hdelim(); ?>

<h1>My PHP.net</h1>

<p>
<span class="newsdate">[24-Apr-2003]</span>
The PHP website and mirrors sites now have a
'<a href="/my.php">My PHP.net</a>' page, which allows
you to check what language settings you have, and enables
you to set one which will override all the other detected
parameters.
</p>

<p>
However, normally this is not needed, as we remember the
language you used last time. Be sure to have cookies turned
on for PHP.net to let this feature work!
</p>

<?php echo hdelim(); ?>

<h1>Grant Program</h1>

<p>
<span class="newsdate">[06-Mar-2003]</span>
<a href="http://www.phparch.com">php|architect</a>, is proud to
announce the creation of the php|architect Grant Program, whose goal is
to provide financial support to best-of-breed PHP-related projects.
</p>

<p>
Participation in the program is open to all open-source projects
that are related to PHP (but not necessarily written <i>in</i> PHP). The
program is accepting submissions now and will start distributing grants
in June of 2003.
</p>

<p>
For more information, visit the <a 
href="http://www.phparch.com/grant/">program's website</a>.
</p>

<?php echo hdelim(); ?>

<h1>Set your own language preference</h1>

<p>
<span class="newsdate">[01-Mar-2003]</span>
Starting from today, your browser's "Accept Language" setting is also
honored on language sensitive pages on the php.net site. If you would
like to get to the documentation page of echo for example, you can use
the <a href="/echo">/echo</a> shortcut on all mirror sites, if your
browser is set to provide your language preference information to the
server. This also makes the PHP error message links point to the
documentation in your preferred language.
</p>

<p>
You can set your preferences under Edit/Preferences/Navigator/Languages
in Mozilla, and under Tools/Internet Options/Languages in Internet
Explorer. This will probably also enhance your web experience on sites
providing translated content.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://phpconf.hu/", make_image("news/hu_conf.gif", "PHPConf.hu", "right") ); ?>

<h1>First Hungarian PHP Conference</h1>

<p>
<span class="newsdate">[25-Feb-2003]</span>
The members of the Hungarian PHP community announce
<a href="http://phpconf.hu/">the first Hungarian PHP Conference</a> which
will take place in Budapest, on Saturday March 29th, sponsored by several
international and local companies. The conference offers an entirely free one
day activity with several presentations addressing basic and advanced topics,
as well, exclusively in Hungarian. Moreover, a five kilobyte-limited PHP
contest has been started to discover the most talented PHP programmers in
our country. The programme includes the first session of the so-called PHP
Division which will be established with the set purpose of representing the
community itself and promoting their interests in any national business and
official phorums.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.1 released in response to CGI vulnerability</h1>

<p>
<span class="newsdate">[17-Feb-2003]</span>
The PHP Group today announced the details of a serious
<a href="release_4_3_1.php">CGI vulnerability</a> in PHP version 4.3.0. A
security update, <a href="downloads.php">PHP 4.3.1</a>, fixes the issue.
Everyone running affected version of PHP (as CGI) are encouraged to upgrade
immediately. The new 4.3.1 release does not include any other changes,
so upgrading from 4.3.0 is safe and painless.
</p>

<?php echo hdelim(); ?>

<p align="center"><a href="/news.php">Old News</a></p>

<?php commonFooter(); ?>
