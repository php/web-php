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
   included files. Please touch it if you modify an
   another include file (and the modification affects
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
if ($_SERVER["HTTP_IF_MODIFIED_SINCE"] == $tsstring) {
    header("HTTP/1.1 304 Not Modified");
    exit();
}
// Inform the user agent what is our last modification date
else {
    header("Last-Modified: " . $tsstring);
}

include_once 'prepend.inc';

// This goes to the left sidebar of the front page
$SIDEBAR_DATA = '
<br />
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
&nbsp; ' . make_link("http://promote.pair.com/direct.pl?php.net", "pair Networks") . '<br />
&nbsp; ' . make_link("http://www.rackshack.net/", "RackShack") . ' <br />
&nbsp; ' . make_link("http://www.redundant.com/", "Redundant Networks") . '<br />
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
You can grab our news as an <img src="/gifs/rss10.gif" align="absmiddle" alt="XML" />
(RSS) feed via a daily dump in a file named <a href="/news.rss">news.rss</a>.
</p>

<h3>Contact</h3>

<p>
Please submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>';

// Possible mirror provider logo
// image types in priority order
$types = array("gif", "jpg", "png");

// Go through all possible types
while (list(,$ext) = each($types)) {
    
    // Check if file exists for this type
    if (file_exists("backend/mirror." . $ext)) {
        
        // Add text to rigth sidebar
        $RSIDEBAR_DATA .= "<div align=\"center\"><h3>This mirror sponsored by:</h3>\n";

        // Create image HTML code
        $img = make_image('mirror.' . $ext, mirror_provider(), false, false, 'backend', 0);
        
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
    
    // Current month number (for delimiter additions)
    $cm = 0;
    
    // Event duplication check hash
    $seen = array();
    
    // While we can read the events file
    while (!feof($fp)) {

        // Get information event elements from file
        list($d, $m, $y, $url, $desc, $id) = fgetcsv($fp, 8192);

        // Fgetcvs() returns an array with a single null element
        // for a blank line, which we need to skip
        if ($d === NULL) { continue; }
        
        // If the month number changed
        if ($cm != (int) $m) { 
            
            // If we are not at the begining
            if ($cm) {
                $RSIDEBAR_DATA .= "<br />\n";
            } 
            // If we are at the begining
            else {
                $RSIDEBAR_DATA .= '<div align="center"><h3>Upcoming Events<br /><a href="submit-event.php">[add event]</a></h3></div>';
            }

            // Update current month information
            $cm = (int) $m;
            
            // Add month name
            $RSIDEBAR_DATA .= "<h4>" . strftime('%B', mktime(12, 0, 0, $cm, $d, $y)) . "</h4>\n"; 
            
            // We have not seen any events in this month
            $seen = array();
        }
        
        // There is no event with this description in this month
        if (!$seen[$desc]) {
            // Add event to sidebar
            $RSIDEBAR_DATA .= "$d. <a href=\"cal.php?id=$id\">" . stripslashes($desc) . "</a><br />\n";
            // Set seen flag
            $seen[$desc] = true;
        }
    }

    // Close file (all events displayed)
    fclose($fp);
}

// Write out common header
commonHeader("Hypertext Preprocessor");

// Diagnostical echo, to see what the mirror thinks about itself
echo "\n<!--$MYSITE-->\n";

// Here come the news items...
?>

<?php print_link("http://www.mysql.com/events/uc2003/", make_image("mysqluc2003.png", "MySQL Users Conference and Expo 2003", "right") ); ?>

<h1>MySQL Users Conference and Expo 2003 in San Jose</h1>
<p>
<font class="newsdate">[16-Dec-2002]</font>
MySQL AB is proud to host the world's First Annual MySQL User
Conference, to be held in the heart of Silicon Valley, April 10-12,
2003. This event promises to be the biggest gathering of MySQL database
users ever in one location. Designed for both the MySQL developer and
the corporate decision maker, this is the place to learn about the
latest in MySQL technology, discover new business opportunities, take a
pulse on industry direction and commune with like minds. 
More information on <a href="http://www.mysql.com/events/uc2003/">the
event's website</a>.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0RC3 Released</h1>
<p>
<font class="newsdate">[11-Dec-2002]</font>
<a href="http://qa.php.net/">PHP 4.3.0RC3</a> is out. This will be the last
release candidate before the final release. From this point on, only crash and
showstopper bugs will be fixed. Your help with thouroughly testing this RC is
much appreciated.
</p>

<?php echo hdelim(); ?>

<h1>PHP news feed available</h1>
<p>
<font class="newsdate">[01-Dec-2002]</font>
The news of PHP.net is available now in RSS 1.0 format via our
new <a href="/news.rss">news.rss file</a>. You can
add this file to any news reader or portal site to get the latest
official PHP news. We strongly recommend you to cache the contents
locally on your side, as the newsfeed is updated daily. The RSS
file is available on every mirror site.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0RC2 Released</h1>
<p>
<font class="newsdate">[27-Nov-2002]</font>
<a href="http://qa.php.net/">PHP 4.3.0RC2</a>
has been released, just in time for the Thanksgiving. And thanks indeed must
be given to those who fixed bugs and pushed this release to be a lot closer
to the final one. Please <a href="http://qa.php.net/">download</a> and test
it as much as possible on real-life applications to uncover remaining issues.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.afup.org/", make_image("afup-logo.gif", "AFUP", "right") ); ?>

<h1>Forum PHP 2002 in Paris, France</h1>
<p>
<font class="newsdate">[21-Nov-2002]</font>
The French PHP User Group AFUP invites you to the "Forum PHP 2002" in
Paris, on December 9th and 10th. Designed to meet the needs of PHP aware
companies and all the French PHP developper's community alike, this
event will provided you with valuable and up-to-date information.
For more information (in French) see the
<a href="http://www.afup.org/article.php3?id_article=136">PHP Forum</a>
website.
</p>

<?php echo hdelim(); ?>

<h1>PHP Magazine - International Edition</h1>
<p>
<font class="newsdate">[17-Nov-2002]</font>
Software &amp; Support Verlag GmbH is going to publish an International version
of the <a href="http://www.phpmag.de/">PHP Magazin</a>. This magazine was
initiated after growing interest for an English magazine after the German
version has been around for a few months.
</p>
<p>
PHP Magazine not only informs about the scripting language itself, but also about
related technologies such as the Apache Web Server, database technologies, XML
and other innovative internet technologies.  Different sections within the
magazine are oriented towards the specific question areas with which a web
developer is confronted in daily practice.
</p>
<p>
The first issue will be published in December and the frequency of issues is
two months. You will be able to subscribe on the <a
href="http://www.php-mag.net/">website</a> which will open shortly.
</p>

<?php echo hdelim(); ?>

<h1>New Monthly PHP Magazine Launched</h1>
<p>
<font class="newsdate">[15-Nov-2002]</font>
php|architect, a new monthly magazine dedicated exclusively to PHP, has
launched <a href="http://www.phparch.com/">its website</a>. php|a is published
in PDF format and is available worldwide. It covers a variety of advanced
topics ranging from day-to-day programming to the internals of PHP. A sample
article on the creation of a web-based PDF converter is also
available on the magazine website
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0RC1 Released</h1>
<p>
<font class="newsdate">[14-Nov-2002]</font>
<a href="http://qa.php.net/">PHP 4.3.0RC1</a>
has been released. This is the first release candidate and should have a very
low number of problems and/or bugs. Nevertheless, please download and test it as
much as possible on real-life applications to uncover remaining issues.
</p>

<?php echo hdelim(); ?>

<h1>PHP site server updates</h1>
<p>
<font class="newsdate">[12-Nov-2002]</font>
We are in the process of moving to new server machines so there may
be downtimes in some services, including site search, user note display
and downloads. Please be patient until we finish our work, and everything
will be back again.
</p>

<?php echo hdelim(); ?>

<h1>PHP Search Bars available for major browsers</h1>
<p>
<font class="newsdate">[29-Oct-2002]</font>
We added a new option to access our site's content quickly. In addition to
<a href="/urlhowto.php">URL shortcuts</a>, keyboard shortcuts and
<a href="/tips.php">browser specific magic</a> you can now use our
<a href="/sidebars.php">Search Bar</a> from the major browsers. Please help
us to test this new service, and provide feedback via
<a href="http://bugs.php.net/">the bug system</a> (categorize your bug
as a PHP.net website bug please).
</p>

<?php echo hdelim(); ?>

<?php print_link("http://weblabor.hu/php-doc-chm", make_image("chmhelp.gif", "CHM", "right") ); ?>

<h1>10th Release of the PHP Manual CHM Edition</h1>
<p>
<font class="newsdate">[29-Oct-2002]</font>
The 10th sample of the CHM edition is available for download from today. The
sample probably fixes the copy to clipboard issues experienced by some users,
and it's also a content update with actual manual text, mirrors list and user notes.
<?php print_link("http://weblabor.hu/php-doc-chm", "See the edition's page for download"); ?>,
and please send feedback to <?php print_link("mailto:php-doc-chm@lists.php.net",
"the edition's dedicated mailing list"); ?>.
</p>

<?php echo hdelim(); ?>

<h1>PHP at the LinuxWorld Expo Oct. 29-31th in Frankfurt, Germany</h1>
<p>
<font class="newsdate">[28-Oct-2002]</font>
For the first time the Open Source projects comprising the popular LAMP
platform (Linux, Apache, MySQL and PHP) will be present at the 
<a href="http://www.linuxworldexpo.de">LinuxWorld Expo</a>
with its own booth.
</p>
<p>
At the booth, which is organized by the <a href="http://www.php-ev.de">German
PHP Association</a> and the <a href="http://www.phpug.de">PHP Usergroup
Frankfurt</a>, fair visitors can experience and learn about Apache, MySQL, PHP
and related projects.
</p>
<p>
Visitors can take LAMP home, too, since there will be a CD with the necessary
software available at the booth.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0pre2 Released</h1>
<p>
<font class="newsdate">[27-Oct-2002]</font>
<a href="http://qa.php.net/">PHP 4.3.0pre2</a>
is available for download. This is the second pre-release version and
incorporates a large number of bug fixes since the first pre-release. Still, to
help us catch as many bugs as possible, please download it and start testing.
</p>

<?php echo hdelim(); ?>

<h1>New keyboard shortcuts</h1>
<p>
<font class="newsdate">[17-Oct-2002]</font>
We introduced new keyboard shortcuts on the site today to make our pages
even more comfortable to use. You can hit Alt+S on Microsoft Windows
or Ctrl+S on Macintosh now to go right to the search box and type your
search keyword. A similar shortcut with the letter "L" is also introduced
on the manual pages to access the lookup input field. Thanks to Tommy Ipsen
for the suggestion. You can read more about keyboard shortcuts on web pages
<a href="http://www.w3.org/TR/html401/interact/forms.html#access-keys">in
the HTML standard</a>.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.3.0pre1 Released</h1>
<p>
<font class="newsdate">[10-Oct-2002]</font>
<a href="http://www.php.net/~andrei/php-4.3.0pre1.tar.bz2">PHP 4.3.0pre1</a>
is available for download. PHP 4.3.0 incorporates a very large number of
changes, new features, and bugfixes and thus requires extensive testing. This
preliminary release is meant to kick-start this testing while the fixes are
still being performed. Please join in and help us make this a high-quality
release. You can use the build tracker at
<a href="http://qa.php.net/buildtest-submit.php">http://qa.php.net/buildtest-submit.php</a>
to report your results.
</p>

<?php echo hdelim(); ?>

<h1>PHP 4.2.3 Released</h1>
<p>
<font class="newsdate">[06-Sept-2002]</font>
<a href="downloads.php">PHP 4.2.3</a> has been released with a large number of bug fixes.  It is a maintenance
release, and is a recommended update for all users of PHP, and Windows users in particular. A complete
list of changes can be found in the <a href="ChangeLog-4.php">ChangeLog</a>.
</p>

<?php echo hdelim(); ?>

<p align="center"><a href="/news.php">Old News</a></p>

<?php commonFooter(); ?>
