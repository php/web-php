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
<ul class="simple">
' .// <li><a href="http://195.228.168.217/louise/index.php?MENU=6">AmigaOS</a></li>
 '<li><a href="http://www.entropy.ch/software/macosx/php/">Mac OS X</a></li>
 <li><a href="http://developer.novell.com/ndk/php.htm">Novell NetWare</a></li>
 <li><a href="http://silk.apana.org.au/php/">OS/2</a></li>
 <li><a href="http://php.alexwaugh.com/">RISC OS</a></li>
 <li><a href="http://freeware.sgi.com/index-by-alpha.html#php">SGI IRIX 6.5.x</a></li>
 <li><a href="http://publib-b.boulder.ibm.com/Redbooks.nsf/RedpieceAbstracts/redp3639.html">AS/400</a></li>
</ul>

<h3>Older versions of PHP</h3>
<p>
 See <a href="/releases.php">our releases
 page</a> for older PHP versions.
</p>

<h3>Other Downloads</h3>
<p>
 For downloadable manual packages, go to the
 <a href="download-docs.php">documentation download</a>
 page
</p>

<p>
 Get some
 <a href="download-logos.php">PHP logos</a>
 for your site, and some PHP icons to use on
 your computer
</p>

<p>
 To download the latest development version,
 see the <a href="anoncvs.php">instructions on
 using anonymous CVS</a>
</p>

<p>
 <a href="http://www.zend.com/zend/optimizer.php">Zend
 Optimizer</a> for PHP 4.0.3 and later is
 available on Zend Technologies\' web site
</p>

<p>
 For <a href="http://gtk.php.net/">PHP-GTK</a>
 downloads, please visit our site dedicated
 to <a href="http://gtk.php.net/">PHP-GTK</a>.
</p>
';

site_header("Downloads");
?>


<a name="v5">
<h1>PHP 5.0.0</h1>

<h2>Complete Source Code</h2>
<ul>
 <li>
  <?php download_link('php-5.0.0.tar.bz2', 'PHP 5.0.0 (tar.bz2)'); ?> - 13 Jul 2004<br />
  <span class="md5sum">md5: 562b7ad1e903248bbe77884cb904b8b7</span>
 </li>
 <li>
  <?php download_link('php-5.0.0.tar.gz', 'PHP 5.0.0 (tar.gz)'); ?> - 13 Jul 2004<br />
  <span class="md5sum">md5: d9df0d177fa62091a486f0e5cb5aaaca</span>
 </li>
</ul>

<h2>Windows Binaries</h2>
<ul>
 <li>
  <?php download_link('php-5.0.0-Win32.zip', 'PHP 5.0.0 zip package'); ?> - 13 Jul 2004<br />
  <span class="md5sum">md5: f8fb5676b6a32f7be1c8d8d373fbc2af</span>
 </li>
 <li>
  <?php download_link('pecl-5.0.0-Win32.zip', 'Collection of PECL modules for PHP 5.0.0'); ?> - 13 Jul 2004<br />
  <span class="md5sum">md5: ede9d837b3dc48a38ca992ca753ee114</span>
 </li>
</ul>

<p>
 We have a <a href="/zend-engine-2.php">PHP 5 / Zend Engine 2 page</a> explaining the
 language level changes introduced in PHP 5. The <a href="/ChangeLog-5.php">PHP 5
 ChangeLog</a> details all the other changes.
</p>

<hr />

<a name="v4">
<h1>PHP 4.3.8</h1>

<h2>Complete Source Code</h2>
<ul>
 <li>
  <?php download_link('php-4.3.8.tar.bz2','PHP 4.3.8 (tar.bz2)'); ?> - 13 July 2004<br />
  <span class="md5sum">md5: e8ab484fcb94cd2e0d7ecfd0762cfd33</span>
 </li>
 <li>
  <?php download_link('php-4.3.8.tar.gz', 'PHP 4.3.8 (tar.gz)');  ?> - 13 July 2004<br />
  <span class="md5sum">md5: dd69f8c89281f088eadf4ade3dbd39ee</span>
 </li>
</ul>

<p>
 See the <a href="/ChangeLog-4.php">ChangeLog</a> for a complete list of changes,
 or the <a href="/release_4_3_8.php">release notes</a> for more information on
 this particular release. Daily snapshots are also available from
 <a href="http://snaps.php.net/">snaps.php.net</a> (not intended for production use!).
</p>

<h2>Windows Binaries</h2>

<p>
 All Windows binaries can be used on Windows 98/Me and on Windows NT/2000/XP/2003.
</p>

<ul>
 <li>
  <?php download_link('php-4.3.8-Win32.zip', 'PHP 4.3.8 zip package'); ?> - 13 July 2004<br />
  (CGI binary plus server API versions for Apache, Apache2 (experimental),
  ISAPI, NSAPI, Servlet and Pi3Web. MySQL support built-in, many extensions
  included, packaged as zip)<br />
  <span class="md5sum">md5: dbf32bfa687e55dbc697d08c4ee09bf2</span>
 </li>
 <li>
  <?php download_link('php-4.3.7-installer.exe', 'PHP 4.3.8 installer'); ?> - 13 July 2004<br />
  (CGI only, MySQL support built-in, packaged as Windows installer to install
  and configure PHP, and automatically configure IIS, PWS and Xitami, with
  manual configuration for other servers. N.B. no external extensions
  included)<br />
  <span class="md5sum">md5: feea15b4405844fe44b17bd3973df674</span>
 </li>
</ul>

<hr />

<h1>Security fixes and patches</h1>

<h2>File Uploads Security Fix</h2>
<ul>
 <li>
  <?php download_link("rfc1867.c.diff-4.1.x.gz", "for PHP 4.1.0/4.1.1"); ?> - 27 February 2002<br />
  (Apply in php-4.1.x/main)<br />
  <span class="md5sum">md5: c8ad890a7fdb9843b48fef9a2034a1df</span>
 </li>
 <li>
  <?php download_link("rfc1867.c.diff-4.0.6.gz", "for PHP 4.0.6"); ?> - 27 February 2002<br />
  (Apply in php-4.0.6/main)<br />
  <span class="md5sum">md5: 2fcb7e1c4762a8253f30d08476f147dc</span>
 </li>
 <li>
  <?php download_link("mime.c.diff-3.0.gz", "for PHP 3.0"); ?> - 27 February 2002<br />
  (Apply in php-3.0.x/functions)<br />
  <span class="md5sum">md5: b4826b2d7968553f808ddb80269d87a0</span>
 </li>
</ul>

<h2>Patches</h2>
<ul>
 <li>
  <?php download_link("php-4.3.0-to-4.3.1.patch.gz", "PHP 4.3.0 to 4.3.1 patch"); ?>  - 17 February 2003<br />
  This unified diff will enable you to update your local PHP source to version 4.3.1 from 4.3.0.<br />
  <span class="md5sum">md5: ffcce0d50a752fe00c3552f7fa68dc71</span>
 </li>
 <li>
  <?php download_link("php-4.2.0-to-4.2.2.patch.gz", "PHP 4.2.0 to 4.2.2 patch"); ?>  - 22 July 2002<br />
  This unified diff will enable you to update your local PHP source to version 4.2.2 from 4.2.0.<br />
  <span class="md5sum">md5: 254bccc245d65cece1f40f782b70ec6b</span>
 </li>
 <li>
  <?php download_link("php-4.2.1-to-4.2.2.patch.gz", "PHP 4.2.1 to 4.2.2 patch"); ?>  - 22 July 2002<br />
  This unified diff will enable you to update your local PHP source to version 4.2.2 from 4.2.1.<br />
  <span class="md5sum">md5: a725c3c9fada0b2e21336250faeca39b</span>
 </li>
 <li>
  <?php download_link("php-4.0.6-memlimit.diff.gz", "PHP 4.0.6 memory limit fix"); ?> - 1 July 2001<br />
  (This patch fixes a bug in the 4.0.6 memory limit option. This is only needed when configuring
  PHP with --enable-memory-limit). If you have problems applying the patch try using GNU patch.<br />
  <span class="md5sum">md5: 75a6f4377ab54853bf866ffd44d1c700</span>
 </li>
 <li>
  <?php download_link("php-4.0.6-to-4.1.1.patch.gz", "PHP 4.0.6 to 4.1.1 patch"); ?>  - 03 January 2002<br />
  This unified diff will enable you to update your local PHP source to version 4.1.1 from 4.0.6.<br />
  <span class="md5sum">md5: 408127b09d87932c5e0f2cd57133e939</span>
 </li>
 <li>
  <?php download_link("php-4.1.0-to-4.1.1.patch.gz", "PHP 4.1.0 to 4.1.1 patch"); ?>  - 03 January 2002<br />
  This unified diff will enable you to update your local PHP source to version 4.1.1 from 4.1.0.<br />
  <span class="md5sum">md5: c3f73adfdbde3bfe5d0d51463432a07c</span>
 </li>
</ul>

<?php site_footer(); ?>
