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
 <li><a href="http://www.entropy.ch/software/macosx/php/">Mac OS X</a></li>
 <li><a href="http://developer.novell.com/wiki/index.php/PHP_for_NetWare">Novell NetWare</a></li>
 <li><a href="http://smedley.info/os2ports/">OS/2</a></li>
 <li><a href="http://www.cp15.org/php/">RISC OS</a></li>
 <li><a href="http://freeware.sgi.com/index-by-alpha.html#php">SGI IRIX 6.5.x</a></li>
 <li>Solaris (<a href="http://sunfreeware.com/programlistsparc10.html#php">SPARC</a>, <a href="http://sunfreeware.com/programlistintel10.html#php">INTEL</a>)</li>
</ul>

<h3>Development and archive versions</h3>
<p>
 Regular source and binary snapshots are available
 from <a href="http://snaps.php.net/">snaps.php.net</a>.
 These are not intended for production use!
</p>
<p>
 To download the very latest development version,
 see the <a href="anoncvs.php">instructions on
 using anonymous CVS</a>
</p>
<p>
 Information about older releases and their downloads
 are available on <a href="/releases/">our releases page</a>.
</p>

<h3>Other Downloads</h3>
<p>
 <a href="http://pear.php.net/packages.php">PEAR
 packages</a>, <a href="http://pecl.php.net/packages.php">PECL hosted
 PHP extensions</a>, <a href="http://gtk.php.net/download.php">PHP-GTK
 source and binaries</a>, and
 <a href="http://smarty.php.net/download.php">Smarty
 sources</a> are available on their own pages.
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
    )
);
?>

<a name="v5"></a>
<h1>PHP <?php list($v, $a) = each($RELEASES[5]); echo $v ?></h1>

<h2>Complete Source Code</h2>
<ul>
<?php
foreach($a["source"] as $rel) {
    echo " <li>\n  ";
    download_link($rel["filename"], $rel["name"]); echo " -  {$rel["date"]}<br />\n";
    echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
    (isset($rel["note"]) ? "<p><strong>Note:</strong>{$rel["note"]}</p>": "");
    echo " </li>\n";
}
?>
</ul>

<h2>Windows Binaries</h2>
<ul>
<?php
if(isset($a["windows"])) {
    foreach($a["windows"] as $rel) {
        echo " <li>\n  ";
        download_link($rel["filename"], $rel["name"]); echo " - {$rel["date"]}<br />\n";
        echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
        echo isset($rel["note"]) ? "<p><strong>Note:</strong> {$rel["note"]}</p>": "";
        echo " </li>\n";
    }
} else {
    echo "<li>The Windows binaries and installer will follow shortly.</li>\n";
}
?>
</ul>

<p>
 We have a <a href="/manual/en/migration5.oop.php">PHP 5 / Zend Engine 2 page</a> explaining the
 language level changes introduced in PHP 5. The <a href="/ChangeLog-5.php">PHP 5
 ChangeLog</a> details all the other changes.
</p>

<hr />


<a name="v4"></a>
<h1>PHP <?php list($v, $a) = each($RELEASES[4]); echo $v ?></h1>

<p>
 Support for PHP 4 will be <b style="color: red">discontinued</b> at 2007-12-31. Please consider
 upgrading to PHP 5.2.
</p>

<h2>Complete Source Code</h2>
<ul>
<?php
foreach($a["source"] as $rel) {
    echo " <li>\n  ";
    download_link($rel["filename"], $rel["name"]); echo " - {$rel["date"]}<br />\n";
    echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
    (isset($rel["note"]) ? "<p><strong>Note:</strong> {$rel["note"]}</p>": "");
    echo " </li>\n";
}
?>
</ul>

<?php
$announce_text = ".";
if($a["announcement"]) {
    $file = str_replace(".", "_", $v);
    $announce_text = ', or the <a href="/releases/' .$file. '.php">release notes</a> for'
                   . ' more information on this particular release.';
}
?>
<p>
 See the <a href="/ChangeLog-4.php">ChangeLog</a> for a complete list of
 changes<?php echo $announce_text;?>
</p>

<h2>Windows Binaries</h2>

<p>
 All Windows binaries can be used on Windows 98/Me and on Windows
 NT/2000/XP/2003.
</p>

<ul>
<?php
if(isset($a["windows"])) {
    foreach($a["windows"] as $rel) {
        echo " <li>\n  ";
        download_link($rel["filename"], $rel["name"]); echo " - {$rel["date"]}<br />\n";
        echo "  <span class=\"md5sum\">md5: {$rel["md5"]}</span>\n";
        echo isset($rel["note"]) ? "<p><strong>Note:</strong> {$rel["note"]}</p>": "";
        echo " </li>\n";
    }
} else {
    echo "<li>The Windows binaries follow shortly.</li>\n";
}
?>
</ul>

<?php site_footer(); ?>
