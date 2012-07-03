<?php // vim: et
// $Id$
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

// Try to make this page non-cached
header_nocache();

$SIDEBAR_DATA = '
<h3>Binaries for other systems</h3>
<p>
 We do not distribute UNIX/Linux binaries. Most Linux
 distributions come with PHP these days, so if you do
 not want to compile your own, go to your distribution\'s
 download site. Binaries available on external servers:
</p>
<ul class="toc">
 <li><a href="http://publib-b.boulder.ibm.com/Redbooks.nsf/RedpieceAbstracts/redp3639.html">AS/400</a></li>
 <li><a href="http://www.ampps.com/">Mac OS X (AMPPS)</a></li>
 <li><a href="http://www.mamp.info/">Mac OS X (MAMP)</a></li>
 <li><a href="http://developer.novell.com/wiki/index.php/PHP_for_NetWare">Novell NetWare</a></li>
 <li><a href="http://os2ports.smedley.info/index.php?page=php-5">OS/2</a></li>
 <li><a href="http://www.cp15.org/php/">RISC OS</a></li>
 <li><a href="http://freeware.sgi.com/index-by-alpha.html#php">SGI IRIX 6.5.x</a></li>
 <li>Solaris (<a href="http://sunfreeware.com/programlistsparc10.html#php">SPARC</a>, <a href="http://sunfreeware.com/programlistintel10.html#php">INTEL</a>)</li>
 <li><a href="http://www.opencsw.org/packages/php5">Solaris OpenCSW packages</a></li>
 <li><a href="http://iuscommunity.org/">Redhat/CentOS Binaries</a></li>
</ul>

<h3>Development and archive versions</h3>
<p>
 Regular source and binary snapshots are available
 from <a href="http://snaps.php.net/">snaps.php.net</a>.
 These are not intended for production use!
</p>
<p>
 To download the very latest development version,
 see the <a href="git.php">instructions on using Git</a>.
</p>
<div class="information">
<p>
 Information about older releases and their downloads
 are available on <a href="/releases/">our releases page</a>.
</p>
</div>
<br />

<h3>Other Downloads</h3>
<p>
 <a href="http://pear.php.net/packages.php">PEAR
 packages</a>, <a href="http://pecl.php.net/packages.php">PECL hosted
 PHP extensions</a> and <a href="http://gtk.php.net/download.php">PHP-GTK
 source and binaries</a> are available on their own pages.
</p>

<p>
 For downloadable PHP manual packages, go to the
 <a href="download-docs.php">documentation download</a>
 page.
</p>

<p>
 Get some
 <a href="download-logos.php">PHP logos</a>
 for your site, and some PHP icons to use on
 your computer.
</p>
';

site_header("Downloads",
    array(
        'link' => array(
            array(
                "rel"   => "alternate",
                "type"  => "application/atom+xml",
                "href"  => $MYSITE . "releases.atom",
                "title" => "PHP Release feed"
            ),
        ),
        "current" => "downloads",
    )
);
?>
<a name="v5"></a>
<?php
$SHOW_COUNT = 2;
for ($i=1; $i<=$SHOW_COUNT; ++$i) {
list($v, $a) = each($RELEASES[5]); 

?>
<?php if ($i == 1) { ?>
    <h1 id="v<?php echo $v; ?>">PHP <?php echo $v ?> (Current stable)</h1>
<?php } else { ?>
    <h1 id="v<?php echo $v; ?>">PHP <?php echo $v ?> (Old stable)</h1>
<?php } ?>

<h2>Complete Source Code</h2>
<ul>
<?php
foreach($a["source"] as $rel) {
    echo " <li>\n  ";

    if (!empty($rel['link'])) {
        $link = $rel['link'];
        $name = $rel['name'];
        echo "<a href='$link'>$name</a>";
    } else {
        download_link($rel["filename"], $rel["name"]); echo " -  {$rel["date"]}<br />\n";
        echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
        (isset($rel["note"]) && $rel["note"] ? "<p><strong>Note:</strong>{$rel["note"]}</p>": "");
    }
    echo " </li>\n";
}
?>
</ul>

<hr />
<?php
} // for
?>

<h1>GPG Keys</h1>
<p>
The releases are tagged and signed in the <a href='git.php'>PHP Git Repository</a>.
The follwing official GnuPG keys of the current PHP Release Manager can be used
to verify the tags:
</p>
<h2>PHP 5.4</h2>
<pre>
pub   2048D/5DA04B5D 2012-03-19
      Key fingerprint = F382 5282 6ACD 957E F380  D39F 2F79 56BC 5DA0 4B5D
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@gmail.com&gt;
uid                  Stanislav Malyshev (PHP key) &lt;stas@php.net&gt;
uid                  Stanislav Malyshev (PHP key) &lt;smalyshev@sugarcrm.com&gt;
</pre>
<pre>
pub   4096R/7267B52D 2012-03-20 [expires: 2016-03-19]
      Key fingerprint = 0B96 609E 270F 565C 1329  2B24 C13C 70B8 7267 B52D
uid                  David Soria Parra &lt;dsp@php.net&gt;
</pre>
<h2>PHP 5.3</h2>
<pre>
pub   2048R/FC9C83D7 2012-03-18 [expires: 2017-03-17]
      Key fingerprint = 0A95 E9A0 2654 2D53 835E  3F3A 7DEC 4E69 FC9C 83D7
uid                  Johannes Schlüter &lt;johannes@schlueters.de&gt;
uid                  Johannes Schlüter &lt;johannes@php.net&gt;
</pre>
<?php
site_footer();

