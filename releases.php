<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Tarball list generated with:
// cvs status -v php[34]/INSTALL |grep 'php_'|awk '{print $1}'|grep -Ev '(RC[0-9]*|rc[_0-9]*|REL|[ab][a0-9-]+|b..rc.|b.pl.|bazaar|pre|[ab])$'|sed -e 's,php_,,' -e 's,_,.,g'|sort -n|while read ver; do echo "        <option value=\"php-${ver}.tar.gz\">$ver</option>"; done
$SIDEBAR_DATA = '
<h3>PHP 5 Releases</h3>
<p>
 There is no stable PHP 5 release yet. You can find the latest
 release candidate as well as links to more information on
 <a href="/downloads.php">our downloads page</a>.
</p>

<h3>Other PHP Releases</h3>
<p>
 Release candidates and beta versions are not listed here.
 You will be able to find those as well as even PHP 3 and
 PHP 2 releases in the <a href="http://museum.php.net/">PHP
 Museum</a>.
</p>

<h3>Still searching?</h3>
<p>
 If this page and the suggested links are unable to help you,
 you might try to search for a PHP tarball on AllTheWeb:
</p>
 
<form action="http://www.alltheweb.com/search" method="get">
 <p>
  <input type="hidden" name="cat" value="ftp" />
  <input type="hidden" name="ftype" value="6" />
  <select name="query" onchange="this.form.submit()">
   <option value="">-select version-</option>
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
   <option value="php-4.3.5.tar.gz">4.3.5</option>
   <option value="php-4.3.6.tar.gz">4.3.6</option>
  </select>
 </p>
</form>
';

site_header("Releases");
?>

<h1>Releases</h1>

<p>
 We have collected all the official information and code available for
 past PHP releases. You can find more details on the current release
 on <a href="/downloads.php">our downloads page</a>. Please note that
 <em>older releases are listed for archaeological purposes only, and
 they are no longer supported</em>.
</p>

<a name="4.3.5"></a>
<h2>4.3.5</h2>

<ul>
 <li>Released: 26 March 2004</li>
 <li>Announcement: <a href="/release_4_3_5.php">English</a>, <a href="/release_4_3_5_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.5">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.3.5.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: 29e61c125ac6278897c6c219f5d100d1</span>
   </li>
   <li>
    <?php download_link('php-4.3.5.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: da564d33f6fb2b8174a318b154c07c79</span>
   </li>
   <li>
    <?php download_link('php-4.3.5-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: a08af865d41c92d0023dd4db7370d9f7</span>
   </li>
   <li>
    <?php download_link('php-4.3.5-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 12760b31f94733075539e7aeacce6316</span>
   </li>
  </ul>
 </li>
</ul>


<a name="4.3.4"></a>
<h2>4.3.4</h2>

<ul>
 <li>Released: 03 November 2003</li>
 <li>Announcement: <a href="/release_4_3_4.php">English</a>, <a href="/release_4_3_4_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.4">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.3.4.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: b9dd601863e08e52e3c4d5e02c2627cf</span>
   </li>
   <li>
    <?php download_link('php-4.3.4.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: c0e7f7388fadacbf4948391c6d93dc5e</span>
   </li>
   <li>
    <?php download_link('php-4.3.4-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: 0c435d779cc61ed446fc69ee77f01abe</span>
   </li>
   <li>
    <?php download_link('php-4.3.4-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 261fb88be82c3d32ae441b48555ba4a3</span>
   </li>
  </ul>
 </li>
</ul>

<a name="4.3.3"></a>
<h2>4.3.3</h2>

<ul>
 <li>Released: 25 August 2003</li>
 <li>Announcement: <a href="/release_4_3_3.php">English</a>, <a href="/release_4_3_3_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.3">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.3.3.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: 1171d96104e2ff2cff9e19789a4a1536</span>
   </li>
   <li>
    <?php download_link('php-4.3.3.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: fe3fede4115354155fc6185522f7c6b2</span>
   </li>
   <li>
    <?php download_link('php-4.3.3-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: c3497c394b3f5829136eb2ff614da241</span>
   </li>
   <li>
    <?php download_link('php-4.3.3-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 2720deb87e799ba88e041e99051e78ab</span>
   </li>
  </ul>
 </li>
</ul>

<a name="4.3.2"></a>
<h2>4.3.2</h2>

<ul>
 <li>Released: 29 May 2003</li>
 <li>Announcement: <a href="/release_4_3_2.php">English</a>, <a href="/release_4_3_2_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.2">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.2.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/php4/php-4.3.2.tar.bz2">Source (tar.bz2)</a>,
  <a href="http://museum.php.net/win32/php-4.3.2-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.2-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.3.1"></a>
<h2>4.3.1</h2>

<ul>
 <li>Released: 17 February 2003</li>
 <li>Announcement: <a href="/release_4_3_1.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.3.1">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.1.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.1-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.1-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.3.0"></a>
<h2>4.3.0</h2>

<ul>
 <li>Released: 27 December 2002</li>
 <li>Announcement: <a href="/release_4_3_0.php">English</a>, <a href="/release_4_3_0_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.0">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.0.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.0-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.0-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.2.3"></a>
<h2>4.2.3</h2>

<ul>
 <li>Released: 6 September 2002</li>
 <li>Announcement: <a href="http://news.php.net/article.php?group=php.announce&amp;article=37">English</a></li>
 <li><a href="/ChangeLog-4.php#4.2.3">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.2.3.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.2.3-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.2.3-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.2.2"></a>
<h2>4.2.2</h2>

<ul>
 <li>Released: 22 July 2002</li>
 <li>Announcement: <a href="/release_4_2_2.php">English</a>, <a href="/release_4_2_2_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.2.2">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.2.2.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.2.2-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.2.2-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.2.1"></a>
<h2>4.2.1</h2>

<ul>
 <li>Released: 13 May 2002</li>
 <li>Announcement: <a href="/release_4_2_1.php">English</a>, <a href="/release_4_2_1_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.2.1">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.2.1.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.2.1-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.2.1-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.2.0"></a>
<h2>4.2.0</h2>

<ul>
 <li>Released: 22 April 2002</li>
 <li>Announcement: <a href="/release_4_2_0.php">English</a>, <a href="/release_4_2_0_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.2.0">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.2.0.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.2.0-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.2.0-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.1.2"></a>
<h2>4.1.2</h2>

<ul>
 <li>Released: 12 March 2002</li>
 <li>Announcement: <a href="/release_4_1_2_win32.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.1.2">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.1.2.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.1.2-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.1.2-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.1.1"></a>
<h2>4.1.1</h2>

<ul>
 <li>Released: 26 Dec 2001</li>
 <li>Announcement: <a href="/release_4_1_1.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.1.1">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.1.1.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.1.1-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.1.1-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.1.0"></a>
<h2>4.1.0</h2>

<ul>
 <li>Released: 10 Dec 2001</li>
 <li>Announcement: <a href="/release_4_1_0.php">English</a>, <a href="/release_4_1_0_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.1.0">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.1.0.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.1.0-Win32.zip">Windows binary</a>,
 </li>
</ul>

<a name="4.0.6"></a>
<h2>4.0.6</h2>

<ul>
 <li>Released: 23 June 2001</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-4.php#4.0.6">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.6.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.6-Win32.zip">Windows binary</a>
 </li>
</ul>

<a name="4.0.5"></a>
<h2>4.0.5</h2>

<ul>
 <li>Released: 30 April 2001</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-4.php#4.0.5">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.5.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.5-Win32.zip">Windows binary</a>
 </li>
</ul>

<a name="4.0.4"></a>
<h2>4.0.4</h2>

<ul>
 <li>Released: 19 December 2000</li>
 <li>Announcement: <a href="http://news.php.net/article.php?group=php.announce&amp;article=28">English</a></li>
 <li><a href="/ChangeLog-4.php#4.0.4">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.4.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.4-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.0.4-installer.zip">Windows installer</a>,
  <a href="http://museum.php.net/php4/php-4.0.4pl1.tar.gz">4.0.4pl1 Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.4pl1-Win32.zip">4.0.4pl1 Windows binary</a>
 </li>
</ul>

<a name="4.0.3"></a>
<h2>4.0.3</h2>

<ul>
 <li>Released: 11 October 2000</li>
 <li>
  Announcement: <a href="http://news.php.net/article.php?group=php.announce&amp;article=26">English</a>,
  <a href="http://news.php.net/article.php?group=php.announce&amp;article=27">English (pl1)</a>,
 </li>
 <li><a href="/ChangeLog-4.php#4.0.3">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.3.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.3-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/php4/php-4.0.3pl1.tar.gz">4.0.3pl1 Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.3pl1-installer.exe">4.0.3pl1 Windows installer</a>
 </li>
</ul>

<a name="4.0.2"></a>
<h2>4.0.2</h2>

<ul>
 <li>Released: 29 August 2000</li>
 <li>Announcement: <a href="http://news.php.net/article.php?group=php.announce&amp;article=24">English</a></li>
 <li><a href="/ChangeLog-4.php#4.0.2">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.2.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.2-Win32.zip">Windows binary</a>
 </li>
</ul>

<a name="4.0.1"></a>
<h2>4.0.1</h2>

<ul>
 <li>Released: 28 June 2000</li>
 <li>Announcement: <a href="http://news.php.net/article.php?group=php.announce&amp;article=23">English</a></li>
 <li><a href="/ChangeLog-4.php#4.0.1">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.1.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.1-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/php4/php-4.0.1pl2.tar.gz">4.0.1pl2 Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.1pl1-Win32.zip">4.0.1pl1 Windows binary</a>
 </li>
</ul>

<a name="4.0.0"></a>
<h2>4.0.0</h2>

<ul>
 <li>Released: 22 May 2000</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-4.php#4.0.0">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.0.0.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.0.0-Win32.zip">Windows binary</a>
 </li>
</ul>

<a name="3.0.x"></a>
<h2>3.0.x (latest)</h2>

<ul>
 <li>Released: 20 Oct 2000</li>
 <li>Announcement: None</li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link("php-3.0.18.tar.gz", "PHP 3.0.18 Source Code"); ?><br />
    <span class="md5sum">md5: b4b8f7f1151ce66d5f3910a066651133</span>
   </li>
   <li>
    <?php download_link("php-3.0.17-win32.zip", "PHP 3.0.17 Windows Binary"); ?><br />
    <span class="md5sum">md5: 29029ac1c3c2075dce38bbd804c42f72</span>
   </li>
  </ul>
 </li>
</ul>

<?php site_footer(); ?>
