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

<?php news_image("http://www.directionphp.biz/", "directionphp.png", "Direction|PHP"); ?>

<h1>Monthly PHP Magazine in French launched!</h1>
<p>
 <span class="newsdate">[15-Oct-2003]</span>
 <a href="http://www.nexen.net/">Nexen.net</a> has launched Direction|PHP,
 the first PHP and MySQL dedicated magazine in French. This monthly publication
 features indeep coverage of PHP industry, business and user cases and technical
 articles from PHP|Architect.<br />
 For more information, read the <a 
 href="http://www.directionphp.biz/index.php">Direction|PHP website</a> (in French).
</p>

<hr />

<?php news_image("http://www.apachecon.com/", "apachecon2003.jpg", "ApacheCon"); ?>

<h1>ApacheCon 2003, the Global Hub for All Things Apache</h1>
<p>
 <span class="newsdate">[11-Oct-2003]</span>
 The <a href="http://www.apachecon.com/">official conference
 of the Apache Software Foundation</a> will be held November 16-20,
 2003 in Las Vegas. More than 60 sessions highlight core and
 next-generation Apache server tools, offering a wide
 range of beginner, intermediate and advanced sessions.
 Learn firsthand the latest developments in Apache, as
 well as key open source projects, including PHP, Perl,
 XML, Java, MySQL, and WebDAV.
</p>

<hr />

<h1>PHP 4.3.4RC1 released</h1>
<p>
 <span class="newsdate">[29-Sep-2003]</span>
 <a href="http://qa.php.net/">PHP 4.3.4RC1</a> has been released for testing.
 This release candidate contains only bug fixes, so it should be quite stable.
 Please test this release as much as possible, so that any remaining issues
 can be uncovered and resolved prior to the final release.
</p>
<p>
 List of changes can be found in the 
 <a href="http://cvs.php.net/diff.php/php-src/NEWS?r1=1.1247.2.357&r2=1.1247.2.411">NEWS</a>
 file.
</p>

<hr />

<?php news_image("http://www.phpcruise.com/", "phpcruise.png", "php|cruise"); ?>

<h1>php|cruise: The World's First Ever PHP-only Cruise</h1>
<p>
 <span class="newsdate">[20-Sep-2003]</span>
  The publishers of php|architect have announced <a
  href="http://www.phparch.com/cruise/">php|cruise</a>, a five-day cruise to the
  Bahamas Islands featuring a lot of fun and over thirty different
  sessions dedicated to PHP from well known experts like Wez Furlong, Alan
  Knowles and John Coggeshall. 
</p>
<p>
 The cruise will take place March 1st to 5th, 2004. The organizers have
 <a href="http://www.phparch.com/cruise/contest/">announced a contest</a> to
 give away one free place on the cruise.
</p>

<hr />

<?php news_image("http://www.zend.com/zend/php_survey_results.php", "zendtech_logo.gif", "Zend Technologies"); ?>

<h1>PHP Usage Survey Results</h1>
<p>
 <span class="newsdate">[18-Sep-2003]</span>
 <a href="http://www.zend.com/zend/php_survey_results.php">Check out</a> the results
 of the PHP Usage Survey conducted by Zend Technologies, including feedback
 from thousands of PHP users around the world.  Thanks for all who contributed!
</p>

<hr />

<?php news_image("http://weblabor.hu/php-doc-chm", "chmhelp.gif", "CHM"); ?>

<h1>PHP Manual CHM Edition - 12th build</h1>
<p>
 <span class="newsdate">[06-Sep-2003]</span>
 The 12th build of the extended CHM edition is out now, and
 <a href="/get/php_manual_chm_12.zip/from/a/mirror">available for download</a>.
 This build contains updated content and user notes, as well as fixes the
 bugs found in the previous build. A new optional "phpZ" skin is also
 introduced in this release, courtesy of Gonzalo De la Pena Andreu. For
 more information, visit <a href="http://weblabor.hu/php-doc-chm/">the
 homepage of this edition.</a>
</p>

<hr />

<?php news_image("http://www.phpconference.de/2003/index_en.php", "international_conference_2003.gif", "International PHP Conference 2003"); ?>

<h1>International PHP Conference 2003 program online</h1>
<p>
 <span class="newsdate">[05-Sep-2003]</span>
 The organisers of the
 <a href="http://www.phpconference.de/2003/index_en.php">International
 PHP Conference</a> which will take place for the third time in Frankfurt,
 Germany from Nov. 2 to 5, 2003 have announced the conference program.
 The conference board which consists of Bjoern Schotte, Zak
 Greant, Zeev Suraski, Thies Arntzen and Jan Lehnardt has chosen more than
 40 sessions for the main program on Nov. 4 and 5 and 7 in-depth
 Power Workshops for the pre conference program on Nov. 2 and 3. Among the
 prominent speaking crowd is Zeev Suraski, Ken Coar and many others. See
 <a href="http://www.phpconference.de/2003/index_en.php">the conference
 website</a> for more information.
</p>

<hr />

<?php news_image("http://servercentral.net", "server_central.gif", "Server Central"); ?>

<h1>Server Central Donates Server</h1>
<p>
 <span class="newsdate">[28-Aug-2003]</span>
 Chicago-based company <a href="http://servercentral.net/">Server Central</a>
 has donated PHP.net a brand new server with a gigabit connection. The box is
 a quad 2.4GHz machine with 2GB ram, so we're going to be using it to power
 our more resource-intensive tasks, including building the manual. Thanks,
 Server Central!
</p>

<hr />

<h1>European Open Source Development Threatened!</h1>
<p>
 <span class="newsdate">[27-Aug-2003]</span>
 Today sees an international day of protest against the move by the EU to
 make obtaining a patent easier within Europe. Such patents may cause Open
 Source software such as PHP to infringe on existing licenses and new ones, 
 meaning we would no longer be safe to distribute PHP within Europe. Contact
 your EU Representative to get this cruicial vote blocked. Find out more at
 the <a href="http://swpat.ffii.org/">campaign website</a> 
</p>
 
<hr />

<?php news_image("http://www.php-con.com", "phpcon_2003.gif", "php{con west 2003"); ?>  

<h1>php{con west is announced</h1>
<p>
 <span class="newsdate">[26-Aug-2003]</span>
 php{con returns to the San Francisco Bay Area with new sessions, PHP gurus
 and a whole new day of PHP-intensive learning. Their program features a full
 day of tutorials, three technical session tracks over two days, an all day 
 coding marathon, Code Sprint, social events, works in progress, and
 presentations from PHP luminaries. Early Bird discounts end on September
 26th. See the full program and register online at
 <a href="http://www.php-con.com">their website</a>
</p>

<hr />

<h1>PHP 4.3.3 released!</h1>
<p>
 <span class="newsdate">[25-Aug-2003]</span>
 The PHP developers are proud to announce the immediate availability of
 <a href="release_4_3_3.php">PHP 4.3.3</a>. This release contains a large
 number of bug fixes and we <strong>strongly</strong> recommend that all
 users of PHP upgrade to this version. Full list of fixes can be found in
 the <a href="ChangeLog-4.php#4.3.3">NEWS</a> file.
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

<p class="center"><a href="/news-2003.php">News Archive</a></p>

<?php commonFooter(); ?>
