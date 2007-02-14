<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'downloads.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

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
 <li><a href="http://php.alexwaugh.com/">RISC OS</a></li>
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
 are available on <a href="/releases.php">our releases page</a>.
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

<p>
 <a href="http://www.zend.com/store/products/zend-optimizer.php">Zend
 Optimizer</a> for PHP 4.0.3 and later is
 available on Zend Technologies\' web site.
</p>
';

site_header("Downloads");
?>

<a name="v5"></a>
<h1>PHP 5.2.1</h1>

<h2>Complete Source Code</h2>
<ul>
 <li>
  <?php download_link('php-5.2.1.tar.bz2', 'PHP 5.2.1 (tar.bz2)'); ?> - 08 Feb 2007<br />
  <span class="md5sum">md5: 261218e3569a777dbd87c16a15f05c8d</span>
 </li>
 <li>
  <?php download_link('php-5.2.1.tar.gz', 'PHP 5.2.1 (tar.gz)'); ?> - 08 Feb 2007<br />
  <span class="md5sum">md5: 604eaee2b834bb037d2c83e53e300d3f</span>
 </li>
</ul>

<h2>Windows Binaries</h2>
<ul>
 <li>
  <?php download_link('php-5.2.1-Win32.zip', 'PHP 5.2.1 zip package'); ?> - 08 Feb 2007<br />
  <span class="md5sum">md5: 682dd66fb03c7dd24c522f474e1b04b6</span>
 </li>
 <li>
  <?php download_link('php-5.2.1-win32-installer.msi', 'PHP 5.2.1 installer'); ?> - 12 Feb 2007<br />
  <span class="md5sum">md5: f0a1445f4adfdc2e00a81b2eb788be5c</span>
  <p><strong>Note:</strong> This file was updated February 12th to fix problems when upgrading from previous PHP versions.</p>
 </li>
 <li>
  <?php download_link('pecl-5.2.1-Win32.zip', 'PECL 5.2.1 Win32 binaries'); ?> - 08 Feb 2007<br />
  <span class="md5sum">md5: dc8b394146faf7effa6f26df02e8e534</span>
 </li>
 <li>
  <?php download_link('php-5.2.1-nts-Win32.zip', 'PHP 5.2.1 Non-thread-safe Win32 binaries'); ?> - 08 Feb 2007<br />
  <span class="md5sum">md5: 815c8c61af58fffdc34d34c24310ffe2</span>
 </li>
 <li>
  <?php download_link('pecl-5.2.1-nts-Win32.zip', 'PECL 5.2.1 Non-thread-safe Win32 binaries'); ?> - 08 Feb 2007<br />
  <span class="md5sum">md5: ffd78a31a704d68c8adadc9288261583</span>
 </li>
</ul>

<p>
 We have a <a href="/manual/en/migration5.oop.php">PHP 5 / Zend Engine 2 page</a> explaining the
 language level changes introduced in PHP 5. The <a href="/ChangeLog-5.php">PHP 5
 ChangeLog</a> details all the other changes.
</p>

<hr />


<a name="v4"></a>
<h1>PHP 4.4.5</h1>

<h2>Complete Source Code</h2>
<ul>
 <li>
  <?php download_link('php-4.4.5.tar.bz2','PHP 4.4.5 (tar.bz2)'); ?> - 14 Feb 2007<br />
  <span class="md5sum">md5: bf61d557c82962dc9533f6ef35283d4c</span>
 </li>
 <li>
  <?php download_link('php-4.4.5.tar.gz', 'PHP 4.4.5 (tar.gz)');  ?> - 14 Feb 2007<br />
  <span class="md5sum">md5: cfc1d47cdc7c1bfd27666abb8fe97a45</span>
 </li>
</ul>

<p>
 See the <a href="/ChangeLog-4.php">ChangeLog</a> for a complete list of
 changes, or the <a href="/release_4_4_5.php">release notes</a> for more
 information on this particular release.
</p>

<h2>Windows Binaries</h2>

<p>
 All Windows binaries can be used on Windows 98/Me and on Windows
 NT/2000/XP/2003.
</p>

<ul>
<!--
 <li>
  The Windows binaries and installer will follow shortly.
 </li>
-->

 <li>
  <?php download_link('php-4.4.5-Win32.zip', 'PHP 4.4.5 zip package'); ?> - 14 Feb 2007<br />
  (CGI binary plus server API versions for Apache, Apache2 (experimental),
  ISAPI, NSAPI, Servlet and Pi3Web. MySQL support built-in, many extensions
  included, packaged as zip)<br />
  <span class="md5sum">md5: c4197ede538cc911b04cdf3d7c0e37f1</span>
 </li>
</ul>

<?php site_footer(); ?>
