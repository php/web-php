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
 <li><a href="http://louise.amiga.hu/index.php?MENU=6">AmigaOS</a></li>
 <li><a href="http://www.entropy.ch/software/macosx/php/">Mac OS X</a></li>
 <li><a href="http://developer.novell.com/ndk/php.htm">Novell NetWare</a></li>
 <li><a href="http://silk.apana.org.au/php/">OS/2</a></li>
 <li><a href="http://php.alexwaugh.com/">RISC OS</a></li>
 <li><a href="http://freeware.sgi.com/index-by-alpha.html#php">SGI IRIX 6.5.x</a></li>
 <li><a href="http://publib-b.boulder.ibm.com/Redbooks.nsf/RedpieceAbstracts/redp3639.html">AS/400</a></li>
</ul>

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


<h1>Latest stable version of PHP</h1>

<h2>Complete Source Code</h2>
<ul>
 <li>
  <?php download_link('php-4.3.4.tar.bz2','PHP 4.3.4 (tar.bz2)'); ?> - 03 November 2003<br />
  <span class="md5sum">md5: b9dd601863e08e52e3c4d5e02c2627cf</span>
 </li>
 <li>
  <?php download_link('php-4.3.4.tar.gz', 'PHP 4.3.4 (tar.gz)');  ?> - 03 November 2003<br />
  <span class="md5sum">md5: c0e7f7388fadacbf4948391c6d93dc5e</span>
 </li>
</ul>

<p>
 See the <a href="/ChangeLog-4.php">ChangeLog</a> for a complete list of changes,
 or the <a href="/release_4_3_4.php">release notes</a> for more information on
 this particular release. Daily snapshots are also available from
 <a href="http://snaps.php.net/">snaps.php.net</a> (not intended for production use!).
</p>

<h2>Windows Binaries</h2>

<p>
 All Windows binaries can be used on Windows 98/Me and on Windows NT/2000/XP.
</p>

<ul>
 <li>
  <?php download_link('php-4.3.4-Win32.zip', 'PHP 4.3.4 zip package'); ?> - 03 November 2003<br />
  (CGI binary plus server API versions for Apache, Apache2 (experimental),
  ISAPI, NSAPI, Servlet and Pi3Web. MySQL support built-in, many extensions
  included, packaged as zip)<br />
  <span class="md5sum">md5: 0c435d779cc61ed446fc69ee77f01abe</span>
 </li>
 <li>
  <?php download_link('php-4.3.4-installer.exe', 'PHP 4.3.4 installer'); ?> - 03 November 2003<br />
  (CGI only, MySQL support built-in, packaged as Windows installer to install
  and configure PHP, and automatically configure IIS, PWS and Xitami, with
  manual configuration for other servers. N.B. no external extensions
  included)<br />
  <span class="md5sum">md5: 261fb88be82c3d32ae441b48555ba4a3</span>
 </li>
</ul>

<hr />

<h1>PHP 5 Beta 2</h1>

<h2>Complete Source Code</h2>
<ul>
 <li>
  <?php download_link('php-5.0.0b2.tar.bz2', 'PHP 5.0.0b2 (tar.bz2)'); ?> - 30 Oct 2003<br />
  <span class="md5sum">md5: 7acea44d0dc10eb54fa08984e94060e8</span>
 </li>
 <li>
  <?php download_link('php-5.0.0b2.tar.gz', 'PHP 5.0.0b2 (tar.gz)'); ?> - 30 Oct 2003<br />
  <span class="md5sum">md5: fd1dd3a3a958fc31e2fc32fee8e34402</span>
 </li>
</ul>

<h2>Windows Binaries</h2>
<ul>
 <li>
  <?php download_link('php-5.0.0b2-Win32.zip', 'PHP 5.0.0b2 zip package'); ?> - 30 Oct 2003<br />
  <span class="md5sum">md5: d58f09501d06a636f00c0be3d99e4669</span>
 </li>
</ul>

<p>
 We have a <a href="/zend-engine-2.php">PHP 5 / Zend Engine 2 page</a> explaining the
 changes introduced in PHP 5.
</p>

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
  This unified diff will enable you to update your local PHP source to the latest version from 4.3.0.<br />
  <span class="md5sum">md5: ffcce0d50a752fe00c3552f7fa68dc71</span>
 </li>
 <li>
  <?php download_link("php-4.2.0-to-4.2.2.patch.gz", "PHP 4.2.0 to 4.2.2 patch"); ?>  - 22 July 2002<br />
  This unified diff will enable you to update your local PHP source to the latest version from 4.2.0.<br />
  <span class="md5sum">md5: 254bccc245d65cece1f40f782b70ec6b</span>
 </li>
 <li>
  <?php download_link("php-4.2.1-to-4.2.2.patch.gz", "PHP 4.2.1 to 4.2.2 patch"); ?>  - 22 July 2002<br />
  This unified diff will enable you to update your local PHP source to the latest version from 4.2.1.<br />
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
  This unified diff will enable you to update your local PHP source to the latest version from 4.0.6.<br />
  <span class="md5sum">md5: 408127b09d87932c5e0f2cd57133e939</span>
 </li>
 <li>
  <?php download_link("php-4.1.0-to-4.1.1.patch.gz", "PHP 4.1.0 to 4.1.1 patch"); ?>  - 03 January 2002<br />
  This unified diff will enable you to update your local PHP source to the latest version from 4.1.0.<br />
  <span class="md5sum">md5: c3f73adfdbde3bfe5d0d51463432a07c</span>
 </li>
</ul>

<hr />

<h1>Older Versions of PHP</h1>

<p>
 <em>
  Older releases are listed for archaeological purposes only.
  They are no longer supported.
 </em>
</p>

<ul>

 <li>PHP 4.3.3
  <ul>
   <li>
    <?php download_link('php-4.3.3.tar.bz2','PHP 4.3.3 (tar.bz2)'); ?> - 25 August 2003<br />
    <span class="md5sum">md5: 1171d96104e2ff2cff9e19789a4a1536</span>
   </li>
   <li>
    <?php download_link('php-4.3.3.tar.gz', 'PHP 4.3.3 (tar.gz)');  ?> - 25 August 2003<br />
    <span class="md5sum">md5: fe3fede4115354155fc6185522f7c6b2</span>
   </li>
  </ul>
 </li>
 <li>PHP 4.3.2
  <ul>
   <li>
    <?php download_link('php-4.3.2.tar.bz2','PHP 4.3.2 (tar.bz2)'); ?> - 29 May 2003<br />
    <span class="md5sum">md5: 8aec1bb2dbcca1c92835c71e2e30d9c5</span>
   </li>
   <li>
    <?php download_link('php-4.3.2.tar.gz', 'PHP 4.3.2 (tar.gz)');  ?> - 29 May 2003<br />
    <span class="md5sum">md5: 8433a1d0ce679780990d4813ae094590</span>
   </li>
  </ul>
 </li>
 <li>PHP 4.3.1
  <ul>
   <li>
    <?php download_link('php-4.3.1.tar.bz2','PHP 4.3.1 (tar.bz2)'); ?> - 17 February 2003<br />
    <span class="md5sum">md5: bbfe584acb3549c62bb61355165e2ca6</span>
   </li>
   <li>
    <?php download_link('php-4.3.1.tar.gz', 'PHP 4.3.1 (tar.gz)');  ?> - 17 February 2003<br />
    <span class="md5sum">md5: d4a34efe145b43ed10dbd95825686065</span>
   </li>
  </ul>
 </li>
 <li>PHP 4.3.0
  <ul>
   <li>
    <?php download_link('php-4.3.0.tar.bz2','PHP 4.3.0 (tar.bz2)'); ?> - 27 December 2002<br />
    <span class="md5sum">md5: 6a3e1ad25cc912816c1f958cd4507767</span>
   </li>
   <li>
    <?php download_link('php-4.3.0.tar.gz', 'PHP 4.3.0 (tar.gz)');  ?> - 27 December 2002<br />
    <span class="md5sum">md5: 9e0eb9ee8e9193ee0a8aea2f428ec3de</span>
   </li>
  </ul>
 </li>
 <li>PHP 3.0.x (latest)
  <ul>
   <li>
    <?php download_link("php-3.0.18.tar.gz", "PHP 3.0.18 Source Code"); ?><br />
    <span class="md5sum">md5: b4b8f7f1151ce66d5f3910a066651133</span>
   </li>
   <li>
    <?php download_link("php-3.0.17-win32.zip", "PHP 3.0.17 Windows Binary (zip)"); ?><br />
    <span class="md5sum">md5: 29029ac1c3c2075dce38bbd804c42f72</span>
   </li>
  </ul>
 </li>
  
 <li>
  If you are searching for older versions of PHP, go to
  the <a href="http://museum.php.net/">"PHP Museum"</a>.
 </li>
 
 <li>
  Search for PHP tarballs on AllTheWeb.com:
  <form action="http://www.alltheweb.com/search" method="get">
   <input type="hidden" name="cat" value="ftp" />
   <input type="hidden" name="ftype" value="6" />
<?php /*
cvs status -v php[34]/INSTALL |grep 'php_'|awk '{print $1}'|grep -Ev '(RC[0-9]*|rc[_0-9]*|REL|[ab][a0-9-]+|b..rc.|b.pl.|bazaar|pre|[ab])$'|sed -e 's,php_,,' -e 's,_,.,g'|sort -n|while read ver; do echo "        <option value=\"php-${ver}.tar.gz\">$ver</option>"; done
*/?>
   <select name="query" onchange="this.form.submit()">
    <option value="">--select version--</option>
    <option value="php-3.0.tar.gz">3.0</option>
    <option value="php-3.0.1.tar.gz">3.0.1</option>
    <option value="php-3.0.2.tar.gz">3.0.2</option>
    <option value="php-3.0.3.tar.gz">3.0.3</option>
    <option value="php-3.0.4.tar.gz">3.0.4</option>
    <option value="php-3.0.5.tar.gz">3.0.5</option>
    <option value="php-3.0.6.tar.gz">3.0.6</option>
    <option value="php-3.0.7.tar.gz">3.0.7</option>
    <option value="php-3.0.8.tar.gz">3.0.8</option>
    <option value="php-3.0.9.tar.gz">3.0.9</option>
    <option value="php-3.0.10.tar.gz">3.0.10</option>
    <option value="php-3.0.11.tar.gz">3.0.11</option>
    <option value="php-3.0.12.tar.gz">3.0.12</option>
    <option value="php-3.0.13.tar.gz">3.0.13</option>
    <option value="php-3.0.14.tar.gz">3.0.14</option>
    <option value="php-3.0.15.tar.gz">3.0.15</option>
    <option value="php-3.0.16.tar.gz">3.0.16</option>
    <option value="php-3.0.17.tar.gz">3.0.17</option>
    <option value="php-3.0.18.tar.gz">3.0.18</option>
    <option value="">--------</option>
    <option value="php-4.0.0.tar.gz">4.0.0</option>
    <option value="php-4.0.1.tar.gz">4.0.1</option>
    <option value="php-4.0.1pl1.tar.gz">4.0.1pl1</option>
    <option value="php-4.0.2.tar.gz">4.0.2</option>
    <option value="php-4.0.3.tar.gz">4.0.3</option>
    <option value="php-4.0.4.tar.gz">4.0.4</option>
    <option value="php-4.0.4pl1.tar.gz">4.0.4pl1</option>
    <option value="php-4.0.5.tar.gz">4.0.5</option>
    <option value="php-4.0.6.tar.gz">4.0.6</option>
    <option value="php-4.1.0.tar.gz">4.1.0</option>
    <option value="php-4.1.1.tar.gz">4.1.1</option>
    <option value="php-4.1.2.tar.gz">4.1.2</option>
    <option value="php-4.2.0.tar.gz">4.2.0</option>
    <option value="php-4.2.1.tar.gz">4.2.1</option>
    <option value="php-4.2.2.tar.gz">4.2.2</option>
    <option value="php-4.2.3.tar.gz">4.2.3</option>
    <option value="php-4.3.0.tar.gz">4.3.0</option>
    <option value="php-4.3.1.tar.gz">4.3.1</option>
    <option value="php-4.3.2.tar.gz">4.3.2</option>
    <option value="php-4.3.3.tar.gz">4.3.3</option>
    <option value="php-4.3.4.tar.gz">4.3.4</option>
   </select>
  </form>
 </li>
</ul>

<?php site_footer(); ?>
