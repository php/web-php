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

<h3><a href="/thanks.php">Thanks To</a></h3>
<ul class="simple">
 <li><a href="http://www.easydns.com/?V=698570efeb62a6e2">easyDNS</a></li>
 <li><a href="http://www.directi.com/">Directi</a></li>
 <li><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
 <li><a href="http://www.ev1servers.net/">EV1Servers</a></li>
 <li><a href="http://www.servercentral.net/">Server Central</a></li>
 <li><a href="http://www.hostedsolutions.com/">Hosted Solutions</a></li>
 <li><a href="http://www.spry.com/">Spry VPS Hosting</a></li>
 <li><a href="http://ez.no/">eZ systems</a> / <a href="http://www.hit.no/english">HiT</a></li>
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
 <li><a href="http://www.ostg.com/">OSTG</a></li>
</ul>

<h3>Syndication</h3>
<p>
 You can grab our news as an RSS feed via a daily dump in a file
 named <a href="/news.rss">news.rss</a>.
</p>';

$MIRROR_IMAGE = '';

// Try to find a sponsor image in case this is an official mirror
if (is_official_mirror()) {

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
}

// Prepend mirror image to sidebar text
$RSIDEBAR_DATA = $MIRROR_IMAGE . $RSIDEBAR_DATA;

// Run the boldEvents() function on page load
$ONLOAD = "boldEvents(); searchHistory();";

// Write out common header
commonHeader("Hypertext Preprocessor");

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<?php news_image("http://phpconf.hu/2005/", "hu_conf.gif", "PHPConf.hu"); ?>

<h1>Third Hungarian PHP Conference</h1>

<p>
 <span class="newsdate">[17-Jan-2005]</span>
 The Web Application Development Division of the John von Neumann Computer
 Society is proud to present the <a href="http://phpconf.hu/2005/">Third
 Hungarian PHP Conference</a> which will take place in Budapest, on Saturday
 March 12th, sponsored by several international and local companies.
 The conference offers an entirely free one day activity with several
 presentations addressing basic and advanced topics as well, mostly in
 Hungarian. This year, the organizers are also happy to welcome Derick
 Rethans and Lukas Smith speaking. Continuing on the success of previous
 years, a five+five kilobyte-limited PHP 5 contest has been started to
 discover the most talented PHP programmers in the country.
</p>

<hr />

<?php news_image("http://www.phparch.com/tropics", "php_tropics.jpg", "php|tropics"); ?>
<h1>php|tropics</h1>

<p>
 <span class="newsdate">[06-Jan-2005]</span>
 On the heels of last year's php|cruise, this year
 <a href="http://www.phparch.com">php|architect magazine</a> has
 announced <a href="http://www.phparch.com/tropics">php|tropics</a>, a
 5-day conference event that will take place between May 11 and 15, 2005 at the
 Moon Palace All-inclusive Resort in wonderful Cancun, Mexico.
</p>
<p>
 With sessions and hands-on tutorials held by many leading PHP experts,
 including Ilia Alshanetsky, Wez Furlong, Derick Rethans, George Schlossnagle
 and many others, php|tropics is an excellent and inexpensive way to learn lots
 about PHP in a fun-filled and exciting atmosphere. This year, the conference
 also sports "bring your own laptop" tutorials, where the audience is encourage
 to participate in hands-on exercises throughout the event.
</p>
<p>
 A special early-bird discount is in effect until February 28, and attendees
 who sign up before that date receive a $100 discount. In addition,
 php|architect will sponsor and cover all examination fees for conference
 attendees interested in trying their hand at the Zend Certification Exam.
</p>

<hr />

<?php news_image("http://www.php.net/", "php-logo.gif", "Programming Language of 2004"); ?>
<h1>PHP awarded Programming Language of 2004</h1>

<p>
 <span class="newsdate">[05-Jan-2005]</span>
 PHP has been awarded the <a href="http://www.tiobe.com/tpci.htm">Programming
 Language of 2004</a>, according to the TIOBE Programming Community Index.
 This index uses information collected from the popular search engines, and
 are based on the world-wide availability of skilled engineers, courses and
 third party vendors.
</p>
<p>
 Congratulations to us all!
</p>

<hr />

<h1>A Note on Security in PHP</h1>

<p>
 <span class="newsdate">[31-Dec-2004]</span>
 The PHP Development Team has issued an <a href="/security-note.php">important
 statement</a> that deals with the security of PHP, and of PHP-based applications.
 The trigger for releasing this statement was the growing misconception in the PHP
 community regarding recent security problems, which exploited bugs
 in PHP applications, rather than bugs in PHP itself.  It's a recommended read
 for anybody using PHP.
</p>

<hr />

<h1>Function list suggestions available</h1>
<p>
 <span class="newsdate">[27-Dec-2004]</span>
 Surely, some of our visitors are back at work for a few days between
 holidays, and hopefully they will find our post-christmas gift useful.
 The function list suggestions we started to test a year ago seemed to
 be working better as some bugs were found and fixed, so it was time to
 make the result available on all php.net pages.
</p>
<p>
 Whenever you type something into the search field, while having the
 function list search option selected, you will get a list of suggested
 functions starting with the letters you typed in. You can browse the list
 with the up/down keys, and you will be able to autocomplete the function
 name with the spacebar.
</p>
<p>
 If you are not interested in this feature, you can turn it
 off for yourself on the <a href="/my.php">My PHP.net</a> page.
 <a href="/search.php">More information</a> about is available on
 the search page.
</p>

<hr />

<?php news_image("http://www.phpwest.com/", "phpwest.gif", "PHP West Conferences"); ?>
<h1>Speakers Announced for PHP West Conference on Web Services</h1>
<p>
 <span class="newsdate">[22-Dec-2004]</span>
 <a href="http://www.phpwest.com">PHP West</a> is holding a conference
 on January 14th, 2005 at the Vancouver Planetarium providing a great
 environment for the promotion of PHP within the Vancouver area. With the
 high impact level of <a href="http://www.phpwest.com/?s=schedule">speakers
 scheduled for this event</a>, you can look forward to in depth talks from
 the likes of Rasmus Lerdorf, Terry Chay, John Coggeshall, Ilia Alshanetsky,
 and Cal Henderson speaking on a wide array of topics focused on Web Services.
</p>

<p>
 <a href="http://shop.phpwest.com/product_info.php/products_id/28">Tickets
 are only 50$!</a> Due to limited capacity for this event we recommend
 you register soon to reserve your seat.
</p>

<hr />

<h1>PHP 4.3.10 &amp; 5.0.3 released!</h1>
<p>
 <span class="newsdate">[15-Dec-2004]</span>
  The PHP Development Team would like to announce the immediate release of 
  <a href="/downloads.php">PHP 4.3.10</a> and <a href="/downloads.php">PHP 5.0.3</a>. 
  These are maintenance releases that in addition to non-critical bug fixes 
  address several very serious security issues. All Users of PHP are strongly 
  encouraged to upgrade to one of these releases as soon as possible.
</p>

<p>
 For changes since PHP 4.3.9, please consult the
 <a href="/ChangeLog-4.php#4.3.10">PHP 4 ChangeLog</a>.
 For changes since PHP 5.0.2, please consult the
 <a href="/ChangeLog-5.php#5.0.3">PHP 5 ChangeLog</a>.
</p>

<hr />

<h1>Second Bulgarian PHP Conference</h1>
<p>
 <span class="newsdate">[15-Dec-2004]</span>
 The second Web Technology conference in Bulgaria will be held in March 2005
 at the city of Sofia. Within its framework, the <a
 href="http://webtech2005.info/index.php?/archives/19-PHP-iioaaioee.html">Second
 Bulgarian PHP Conference</a> and first IT Business conference will be held.
 The purpose of this meeting is to discuss the new tendencies in this direction
 and to popularize the internet technologies in the spheres of business,
 education, and services. The range of subjects includes technologies like
 PHP, Perl, business systems through web, education through the internet, and
 others. The <a
 href="http://webtech2005.info/index.php?/archives/9-Call-for-Papers.html">Call
 For Papers</a> is open, if you would like to have a speach at this event.
</p>

<hr />

<h1>International PHP Conference 2005 - Spring Edition (Amsterdam, May 2-4)</h1>
<p>
 <span class="newsdate">[15-Dec-2004]</span>
 The PHP Center and the Software &amp; Support Verlag are pleased
 to announce the <a href="http://www.phpconference.com/">International
 PHP Conference 2005 Spring Edition</a> in Amsterdam, Netherlands.
 The dates for this event will be May 2-4, 2005. The conference venue
 is the RAI conference center.
</p>
<p> 
 Like last year the organizers would like to present an interesting and
 various programme to the international PHP Community, so they are happy
 to ask you to <a
 href="http://www.phpconference.com/konferenzen/divers/psecom,id,191,nodeid,240.html">submit
 your proposals</a> for the session programme.
</p>

<p>
 The topics are General PHP, PHP &amp; Business/Integration,
 PHP &amp; Databases, PHP Design, PHP Extensions, PHP &amp; XML
 and PHP-GTK.
</p>

<hr />

<?php news_image("http://conf.phpquebec.org/en/conf2005/", "conference_php_quebec.gif", "Conference PHP Quebec"); ?>

<h1>Call for Speakers: PHP Qu&eacute;bec 2005</h1>
<p>
 <span class="newsdate">[09-Nov-2004]</span>
 The PHP Qu&eacute;bec is proud to announce the PHP Qu&eacute;bec 
 conference 2005, which will be held on March, 30th&amp;31th and
 April 1rst 2005.   We are looking for the best speakers, willing to 
 share their experience and skills with the educated crowd of PHP 
 programmers in eastern Canada and in the USA. PHP Qu&eacute;bec 
 2005 features 4 distinct tracks:
 <ul>
  <li>
   Professional PHP
  </li>
  <li>
   PHP advanced technics
  </li>
  <li>
   MySQL 
  </li>
  <li>
   Apache and ASF projects 
  </li>
 </ul>
 For more information, read the 
 <a href="http://conf.phpquebec.com/en/conf2005/appel">PHP Qu&eacute;bec web site</a>.
</p>

<hr />

<?php news_image("http://nosoftwarepatents.com/", "90x40_3.jpg", "No Software Patents"); ?>

<h1>MySQL, RedHat and other partners started a new campaign against software patents</h1>
<p>
<span class="newsdate">[01-Nov-2004]</span>
In order to boost more awareness of the pending software patent issues in the
European Union&mdash;MySQL, ISP 1&amp;1, RedHat and other partners started
a new portal "<a href="http://nosoftwarepatents.com">http://nosoftwarepatents.com</a>".
The site is available in 10 different european languages and explains why
software patents are bad, and how they might affect you. In order to learn
more, or participate in events against software patents, have a look at the
very informative <a href="http://nosoftwarepatents.com">website</a>.
</p>

<hr />

<?php news_image("http://www.zend.com/php5/contest/", "zendtech_logo.gif", "Zend Technologies"); ?>

<h1>Zend's PHP 5 Coding Contest winners announced</h1>
<p>
<span class="newsdate">[25-Oct-2004]</span>
Congratulations to Qiang Xue, whose application '<a href="http://www.xisc.com/">PRADO</a>' earned high votes both from the public and from the judges' panel!
There are 49 other prizewinning applications in Zend's
<a href="http://www.zend.com/php5/contest">contest gallery</a>
- too many to list here.  Some of them are ongoing projects, bringing PHP 5 a
small armoury of useful open source tools.
</p>

<p>
The top 50 applications will remain on display until the end of this year, giving
you the chance to take a leisurely look through the code and see how the new
features in PHP 5 should be used.
</p>

<hr />

<p class="center"><a href="/news-2004.php">News Archive</a></p>

<?php commonFooter(); ?>
