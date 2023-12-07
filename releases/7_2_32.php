<?php
$_SERVER['BASE_PAGE'] = 'releases/7_2_32.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 7.2.32 Release Announcement');
?>
<h1>PHP 7.2.32 Release Announcement</h1>

<p>
  The PHP development team announces the immediate availability of PHP 7.2.32.
  This is a security release impacting the
  <a href="https://windows.php.net/">official Windows builds</a> of PHP.
</p>

<p>
  For windows users running an official build, this release contains a
  patched version of <a href="https://curl.haxx.se">libcurl</a> addressing
  <a href="https://curl.haxx.se/docs/CVE-2020-8169.html">CVE-2020-8169</a>.
</p>

<p>
  For all other consumers of PHP, this release is functionally identical
  to PHP 7.2.31 and no upgrade from that point release is necessary.
</p>

<p>
  For source downloads of PHP 7.2.32 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
  Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
  The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-7.php#7.2.32">ChangeLog</a>.
</p>
<?php site_footer();
