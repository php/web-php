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

    // Current month number (for delimiter additions)
    $cm = 0;

    // Event duplication check hash
    $seen = array();

    // While we can read the events file
    while (!feof($fp)) {

        // Get information event elements from file
        list($d, $m, $y, $ccode, $desc, $id) = fgetcsv($fp, 8192);

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
$ONLOAD = "boldEvents()";

// Write out common header
commonHeader("Hypertext Preprocessor");

// Diagnostical echo, to see what the mirror thinks about itself
echo "\n<!--$MYSITE-->\n";
?>

<h1>PHP 4.3.2 Released!</h1>
<p>
<font class="newsdate">[29-May-2003]</font>
The PHP developers are proud to announce the immediate availability of
<a href="release_4_3_2.php">PHP 4.3.2</a>. This release contains a large number of bug fixes
and is a <b>strongly</b> recommended update for all users of PHP.
Full list of fixes can be found in the <a href="ChangeLog-4.php">NEWS</a> file.
</p>

<?php echo hdelim(); ?>

<h1>Automatic Mirror Select</h1>
<p>
<font class="newsdate">[23-May-2003]</font>
In our ongoing battle to fight load and keep serving you content, whenever you
perform a search on www.php.net, you will be redirected onto a nearby mirror
(determined using the <a href="http://www.directi.com/?site=ip-to-country">Directi
Ip-to-Country Database</a>). 
You may experience a few quirks in the search until your mirrors have synced an up-to-date
version of the site.
</p>

<?php echo hdelim(); ?>

<?php print_link("http://www.ActiveState.com/Corporate/ActiveAwards/", make_image("news/activestate_logo.gif", "ActiveState", "right") ); ?>

<h1>ActiveState Active Awards</h1>
<p>
<font class="newsdate">[12-May-2003]</font>
ActiveState is pleased to announce the third annual Programmers' Choice
and Activators' Choice Awards. The awards honor those individuals who
<b>actively</b> contribute to open languages and display excellence in their
programming efforts. 
</p><p>
More information and voting is at:
<a href="http://www.ActiveState.com/Corporate/ActiveAwards/">http://www.ActiveState.com/Corporate/ActiveAwards/</a>
</p>

<?php echo hdelim(); ?>

<h1>Country Detection</h1>
<p>
<font class="newsdate">[04-May-2003]</font>
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
<font class="newsdate">[24-Apr-2003]</font>
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
<font class="newsdate">[06-Mar-2003]</font>
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
<font class="newsdate">[01-Mar-2003]</font>
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
<font class="newsdate">[25-Feb-2003]</font>
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
<font class="newsdate">[17-Feb-2003]</font>
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
