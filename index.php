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
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

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
 <li><a href="http://www.easydns.com/?V=698570efeb62a6e2" title="DNS Hosting provided by easyDNS">easyDNS</a></li>
 <li><a href="http://www.directi.com/">Directi</a></li>
 <li><a href="http://promote.pair.com/direct.pl?php.net">pair Networks</a></li>
 <li><a href="http://www.ev1servers.net/">EV1Servers</a></li>
 <li><a href="http://www.servercentral.net/">Server Central</a></li>
 <li><a href="http://www.hostedsolutions.com/">Hosted Solutions</a></li>
 <li><a href="http://www.spry.com/">Spry VPS Hosting</a></li>
 <li><a href="http://ez.no/">eZ Systems</a> / <a href="http://www.hit.no/english">HiT</a></li>
 <li><a href="http://www.osuosl.org">OSU Open Source Lab</a></li>
 <li><a href="http://www.yahoo.com/">Yahoo! Inc.</a></li>
 <li><a href="http://www.binarysec.com/">BinarySEC</a></li>
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

/* {{{ Generate latest release info */
$PHP_5_STABLE = $PHP_4_STABLE = array();
$PHP_5_RC     = $PHP_4_RC     = "";
$rel          = $rc           = "";

list($PHP_5_STABLE, ) = each($RELEASES[5]);
list($PHP_4_STABLE, ) = each($RELEASES[4]);

$rel = <<< EOT
  <div id="releaseBox">
   <h4>Stable Releases</h4>
   <ol id="releases">
    <li class="php5"><a href="/downloads.php#v5">Current PHP 5 Stable: <span class="release">$PHP_5_STABLE</span></a></li>
    <li class="php5"><a href="/downloads.php#v4">Current PHP 4 Stable: <span class="release">$PHP_4_STABLE</span></a></li>
   </ol>
  </div>\n
EOT;

/* Do we have any release candidates to brag about? */
if (count($RELEASES[5]>1)) {
    list($PHP_5_RC, ) = each($RELEASES[5]);

    if (!empty($PHP_5_RC)) {
        $rc .= "    <li class=\"php5\"><a href=\"http://qa.php.net/\">Current PHP 5 RC: <span class=\"release\">$PHP_5_RC</span></a></li>\n";
    }
}
if (count($RELEASES[4]>1)) {
    list($PHP_4_RC, ) = each($RELEASES[4]);

    if (!empty($PHP_4_RC)) {
        $rc .= "    <li class=\"php4\"><a href=\"http://qa.php.net/\">Current PHP 4 RC: <span class=\"release\">$PHP_4_RC</span></a></li>\n";
    }
}
if (!empty($rc)) {
	$rel .= <<< EOT
  <div id="candidateBox">
   <h4><a href="http://qa.php.net/rc.php">Release Candidates</a></h4>
   <ol id="candidates">
$rc
   </ol>
  </div>\n
EOT;
}
/* }}} */

// Prepend mirror image & latest releases to sidebar text
$RSIDEBAR_DATA = $MIRROR_IMAGE . $rel . $RSIDEBAR_DATA;

// Write out common header
site_header("Hypertext Preprocessor",
    array(
        'onload' => 'boldEvents();',
        'headtags' => '<link rel="alternate" type="application/rss+xml" title="PHP: Hypertext Preprocessor" href="' . $MYSITE . 'news.rss" />',
        'link' => array(
            array(
                "rel"   => "search",
                "type"  => "application/opensearchdescription+xml",
                "href"  => $MYSITE . "phpnetimprovedsearch.src",
                "title" => "Add PHP.net search"
            ),
        ),
    )
);

if (is_array($CONF_TEASER) && count($CONF_TEASER)) {
    $categories = array("conference" => "Conferences", "cfp" => "Calling for papers");
    echo '  <div id="confTeaser">' . "\n";
    echo "   <table>\n";
    foreach($CONF_TEASER as $k => $a) {
        if (is_array($a) && count($a)) {
            echo "    <tr>\n     <td valign='top' style='white-space: nowrap'>".$categories[$k].":</td>\n";
            echo "     <td valign='top'>\n";
            echo '      <ul class="' .$k. '">' . "\n";
            $count = 0;
            $a = preg_replace("'([A-Za-z0-9])([\s\:\-\,]*?)call for(.*?)$'i", "$1", $a);
            foreach($a as $url => $title) {
                if ($count++ >= 4) {
                    break;
                }
                echo '       <li><a href="' . $url. '">' . $title. '</a></li>' . "\n";
            }
            echo "      </ul>\n     </td>\n    </tr>\n";
        } // if set
    }
    echo "   </table>\n  </div>\n\n<br />\n";
}

// DO NOT REMOVE THIS COMMENT (the RSS parser is dependant on it)
?>

<a name="6"></a>
<h1>The PHP.net Google Summer of Code</h1>
<p>
 <span class="newsdate">[14-Apr-2007]</span>
 The PHP team is once again proud to participate in the 
 <a href="http://code.google.com/soc/">Google Summer of Code</a>.
 Seven students will &quot;flip bits instead of burgers&quot; this summer:
 <ul><li>Hannes Magnusson will work on <a href="http://wiki.phpdoc.info/LiveDocs">LiveDocs</a>,
 which is a &quot;tool to display DocBook XML files in a web browser on the
 fly, without the need of building all HTML target files first&quot;. This
 project will be of great value to the PHP Documentation Team.</li>
 <li>The PHP Interpreter uses reference counting to keep track of which objects
 are no longer referenced and thus can be destroyed. A major weakness in the
 current implementation is that it cannot detect reference cycles, that is
 objects that reference each other in a circular graph structure which is not
 referenced itself from outside the circle. Mentored by Derick Rethans,
 David Wang will implement a new reference counting algorithm that will
 alleviate this problem.</li>
 <li><a href="http://xdebug.org/">Xdebug</a> provides a range of useful
 functionality for PHP developers, including detailed error information,
 code coverage and profiling support, and support for remote debugging using
 the GDB and DBGp protocols. Mentored by Xdebug's creator, Derick Rethans,
 Adam Harvey will develop a cross-platform GUI application that implements
 the DBGp protocol and allows PHP applications to be debugged using Xdebug
 in a development environment agnostic fashion.</li>
 <li>Mentored by Lukas Smith, Konsta Vesterinen will work on the object-relational
 mapper <a href="http://www.phpdoctrine.net/">Doctrine</a>.</li>
 <li>Mutation Testing, or Automated Error Seeding, is an approach where the testing
 tool makes some change to the tested code, runs the tests, and if the tests pass
 displays a message saying what it changed. This approach is different than code
 coverage analysis, because it can find code that is executed by the running of
 tests but not actually tested. Mentored by Sebastian Bergmann, Mike Lewis will
 implement Mutation Testing for <a href="http://www.phpunit.de/">PHPUnit</a>.</li>
 <li>Mentored by Lukas Smith, Igor Feghali will add support for foreign keys to
 <a href="http://pear.php.net/package/MDB2_Schema/">MDB2_Schema</a>, a package
 that &quot;enables users to maintain RDBMS independant schema files in XML that
 can be used to create, alter and drop database entities and insert data into a
 database&quot;.</li>
 <li>Mentored by David Coallier, Nicolas Bérard-Nault will refactor the internals
 of <a href="http://www.jaws-project.com/">Jaws</a>, a Framework and Content
 Management System for building dynamic web sites, for PHP 6.</li></ul>
</p>

<hr />

<a name="5"></a>
<h1>PHP 4.4.6 Released</h1>
<p>
 <span class="newsdate">[01-Mar-2007]</span>
  The PHP development team would like to announce the immediate <a
  href="/downloads.php#v4">availability of PHP 4.4.6</a>.

  The main issue that this release addresses is a crash problem that was
  introduced in PHP 4.4.5.  The problem occurs when session variables are used
  while register_globals is enabled.
  
  Details about the PHP 4.4.6 release can be found in the <a
  href="/releases/4_4_6.php">release announcement for 4.4.6</a>, the full list
  of changes is available in the <a href="/ChangeLog-4.php#4.4.6">ChangeLog for
  PHP 4</a>.
</p>

<hr />

<a name="4"></a>
<h1>PHP 5.2.1 and PHP 4.4.5 Released</h1>
<p>
 <span class="newsdate">[14-Feb-2007]</span>
  The PHP development team would like to announce the immediate <a
  href="/downloads.php#v5">availability of PHP 5.2.1</a> and <a
  href="/downloads.php#v4">availability of PHP 4.4.5</a>.
  These releases are major stability and security enhancements of the 5.x and
  4.4.x branches, and all users are strongly encouraged to upgrade to it as
  soon as possible.  Further details about the PHP 5.2.1 release can be found in the <a
  href="/releases/5_2_1.php">release announcement for 5.2.1</a>, the full list of
  changes is available in the <a href="/ChangeLog-5.php#5.2.1">ChangeLog for PHP
  5</a>. Details about the PHP 4.4.5 release can be found in the <a
  href="/releases/4_4_5.php">release announcement for 4.4.5</a>, the full list of
  changes is available in the <a href="/ChangeLog-4.php#4.4.5">ChangeLog for PHP
  4</a>.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.1 and PHP 4.4.5:</b>
</p>
<ul>
	<li>Fixed possible safe_mode &amp; open_basedir bypasses inside the session extension.</li>
	<li>Fixed unserialize() abuse on 64 bit systems with certain input strings.</li>
	<li>Fixed possible overflows and stack corruptions in the session extension.</li>
	<li>Fixed an underflow inside the internal sapi_header_op() function.</li>
	<li>Fixed non-validated resource destruction inside the shmop extension.</li>
	<li>Fixed a possible overflow in the str_replace() function.</li>
	<li>Fixed possible clobbering of super-globals in several code paths.</li>
	<li>Fixed a possible information disclosure inside the wddx extension.</li>
	<li>Fixed a possible string format vulnerability in *print() functions on 64 bit systems.</li>
	<li>Fixed a possible buffer overflow inside ibase_{delete,add,modify}_user() functions.</li>
	<li>Fixed a string format vulnerability inside the odbc_result_all() function.</li>
</ul>
<p>
<b>Security Enhancements and Fixes in PHP 5.2.1 only:</b>
</p>
<ul>
	<li>Prevent search engines from indexing the phpinfo() page.</li>
	<li>Fixed a number of input processing bugs inside the filter extension.</li>
	<li>Fixed allocation bugs caused by attempts to allocate negative values in some code paths.</li>
	<li>Fixed possible stack/buffer overflows inside zip, imap &amp; sqlite extensions.</li>
	<li>Fixed several possible buffer overflows inside the stream filters.</li>
	<li>Memory limit is now enabled by default.</li>
	<li>Added internal heap protection.</li>
	<li>Extended filter extension support for $_SERVER in CGI and apache2 SAPIs.</li>
</ul>
<p>
<b>Security Enhancements and Fixes in PHP 4.4.5 only:</b>
</p>
<ul>
	<li>Fixed possible overflows inside zip &amp; imap extensions.</li>
	<li>Fixed a possible buffer overflow inside mail() function on Windows.</li>
	<li>Unbundled the ovrimos extension.</li>
</ul>

<p>
The majority of the security vulnerabilities discovered and resolved can in
most cases be only abused by local users and cannot be triggered remotely.
However, some of the above issues can be triggered remotely in certain
situations, or exploited by malicious local users on shared hosting setups
utilizing PHP as an Apache module. Therefore, we strongly advise all users of
PHP, regardless of the version to upgrade to the 5.2.1 or 4.4.5 releases as soon as possible.
</p>

<p>
For users upgrading to PHP 5.2 from PHP 5.0 and PHP 5.1, an upgrade guide is
available <a href="/migration52">here</a>, detailing the changes between
those releases and PHP 5.2.1.
</p>

<p><strong>Update: Feb 14th;</strong> Added release information for PHP
4.4.5.</p>

<p><strong>Update: Feb 12th;</strong> The Windows install package had problems
with upgrading from previous PHP versions. That has now been fixed and new file
posted in the <a href="/downloads.php">download section</a>.</p>
<hr />

<a name="3"></a>
<h1>The front page has changed</h1>
<p>
 <span class="newsdate">[08-Feb-2007]</span>
 The news on the front page of php.net has changed, the <a href="/conferences/">conference 
 announcements</a> are now located on their own page. The idea is to keep php.net specific 
 news clear and also opens the door for additional news entries, like for RC releases. 
 More changes are on the way so keep an eye out.
</p>

<hr />

<a name="2"></a>
<?php news_image('http://php.net/manual/en/','php-logo.gif','The PHP Manual'); ?>
<h1>PHP Manual Updates</h1>
<p>
 <span class="newsdate">[03-Feb-2007]</span>
 The PHP documentation team is proud to present to the PHP community a few
 fixes and tweaks to the <a href="http://php.net/manual/en/">PHP Manual</a>,
 including:
</p>
 <ul>
  <li>an improved, XSL-based build system that will deliver compiled manuals
  to mirrors in a more timely manner (goodbye dsssl)</li>
  <li>manual pages can now contain images (see
  <code><a href="http://php.net/en/function.imagearc">imagearc()</a></code>
  for an example)</li>
  <li>updated function version information and capture system (fewer
  "no version information, might be only in CVS" messages)</li>
  <li>... and more to come!</li>
 </ul>
<p>
 Please <a href="http://php.net/about.howtohelp">help us improve the documentation</a> by <a href="http://bugs.php.net/">submitting bug reports</a>, and adding notes to undocumented functions.
</p>

<hr />

<a name="1"></a>
<h1>PHP 5.2.0 Released</h1>
<p>
 <span class="newsdate">[02-Nov-2006]</span>
 The PHP development team is proud to announce the immediate release of PHP
 5.2.0. This release is a major improvement in the 5.X series, which includes a
 large number of new features, bug fixes and security enhancements.
 Further details about this release can be found in the release announcement
 <a href="/releases/5_2_0.php">5.2.0</a>, the full list of changes is
 available in the ChangeLog <a href="/ChangeLog-5.php#5.2.0">PHP 5</a>.
</p>
<p>
All users of PHP, especially those using earlier PHP 5 releases are advised
to upgrade to this release as soon as possible. This release also obsoletes
the 5.1 branch of PHP.
</p>

<p>
For users upgrading from PHP 5.0 and PHP 5.1 there is an upgrading guide 
available <a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.0.
</p>

<hr />

<p class="center"><a href="/archive/index.php">News Archive</a></p>

<?php
site_footer(
    array("rss" => "/news.rss") // Add a link to the feed at the bottom
);

