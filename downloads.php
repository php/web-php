<?php // vim: et
// $Id$
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/version.inc';

// Try to make this page non-cached
header_nocache();
if (time() < 1301738460 && !isset($_COOKIE["done"])) {
    setcookie("done", 1);
    header("Location: http://rubyonrails.org/download");
    exit;
}

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
 <li><a href="http://www.entropy.ch/software/macosx/php/">Mac OS X</a></li>
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
 see the <a href="svn.php">instructions on
 using SVN</a>
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
<h1 id="v<?php echo $v; ?>">PHP <?php echo $v ?></h1>

<h2>Complete Source Code</h2>
<ul>
<?php
foreach($a["source"] as $rel) {
    echo " <li>\n  ";
    download_link($rel["filename"], $rel["name"]); echo " -  {$rel["date"]}<br />\n";
    echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
    (isset($rel["note"]) && $rel["note"] ? "<p><strong>Note:</strong>{$rel["note"]}</p>": "");
    echo " </li>\n";
}
?>
</ul>

<h2>Windows Binaries</h2>
<p>
<?php
if(isset($a["windows"])) {
    echo 'The PECL bundle is no longer built for the 5.2.x series. However, the 5.2.6 PECL package does work with this release.';
}
?>
</p>
<ul>
<?php
if(isset($a["windows"])) {
    foreach($a["windows"] as $rel) {
        echo " <li>\n  ";
        download_link($rel["filename"], $rel["name"]); echo " - {$rel["date"]}<br />\n";
        echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
        echo isset($rel["note"]) && $rel["note"] ? "<p><strong>Note:</strong> {$rel["note"]}</p>": "";
        echo " </li>\n";
    }
} else {
    echo "<li>For the Windows binaries and installer, see <a href='http://windows.php.net/download/'>http://windows.php.net/download/</a>.</li>\n";
}
?>
</ul>
<?php
if ($i < $SHOW_COUNT) {
  echo "<hr />\n";
}
} // for
?>

<?php
site_footer();

