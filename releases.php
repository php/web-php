<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

// Tarball list generated with:
// cvs status -v php[34]/INSTALL |grep 'php_'|awk '{print $1}'|grep -Ev '(RC[0-9]*|rc[_0-9]*|REL|[ab][a0-9-]+|b..rc.|b.pl.|bazaar|pre|[ab])$'|sed -e 's,php_,,' -e 's,_,.,g'|sort -n|while read ver; do echo "        <option value=\"php-${ver}.tar.gz\">$ver</option>"; done
$SIDEBAR_DATA = '
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
 you might try to search for a PHP tarball on FileWatcher:
</p>
 
<form action="http://www.filewatcher.com/" method="get">
 <p>
  <input type="hidden" name="min" value="500000" />
  <input type="hidden" name="af" value="1" />
  <select name="q" onchange="this.form.submit()">
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
   <option value="php-4.3.7.tar.gz">4.3.7</option>
   <option value="php-4.3.8.tar.gz">4.3.8</option>
   <option value="php-4.3.9.tar.gz">4.3.9</option>
   <option value="php-4.3.10.tar.gz">4.3.10</option>
   <option value="php-4.3.11.tar.gz">4.3.11</option>
   <option value="php-4.4.0.tar.gz">4.4.0</option>
   <option value="">--------</option>
   <option value="php-5.0.0.tar.gz">5.0.0</option>
   <option value="php-5.0.1.tar.gz">5.0.1</option>
   <option value="php-5.0.2.tar.gz">5.0.2</option>
   <option value="php-5.0.3.tar.gz">5.0.3</option>
   <option value="php-5.0.4.tar.gz">5.0.4</option>
   <option value="php-5.0.5.tar.gz">5.0.5</option>
   <option value="php-5.1.0.tar.gz">5.1.0</option>
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

<a name="v5"></a>
<a name="5.1.0"></a>
<h2>5.1.0</h2>

<ul>
 <li>Released: 24 Nov 2005</li>
 <li>Announcement: <a href="/release_5_1_0.php">English</a></li>
 <li><a href="/ChangeLog-5.php#5.1.0">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-5.1.0.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: 4b9caa2f201f6b1f6a24de6c435cd4b1</span>
   </li>
   <li>
    <?php download_link('php-5.1.0.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: b565964b595df91be27900e490760d4b</span>
   </li>
   <li>
    <?php download_link('php-5.1.0-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: 93152588795d377743fe1b1fb1680b84</span>
   </li>
   <li>
    <?php download_link('php-5.1.0-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 28019a42c2845b3ad70e134a302c5089</span>
   </li>
  </ul>
 </li>
</ul>

<a name="5.0.5"></a>
<h2>5.0.5</h2>

<ul>
 <li>Released: 05 Sep 2005</li>
 <li>Announcement: none</li>
 <li><a href="/ChangeLog-5.php#5.0.5">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-5.0.5.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: b5d4ca75bbb11ee5b830fa67213d9f7f</span>
   </li>
   <li>
    <?php download_link('php-5.0.5.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: ae36a2aa35cfaa58bdc5b9a525e6f451</span>
   </li>
   <li>
    <?php download_link('php-5.0.5-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: e5201a26444b55101a113efddc529bf9</span>
   </li>
   <li>
    <?php download_link('php-5.0.5-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 0bb307c1a9185faa161fdf549348ab8e</span>
   </li>
  </ul>
 </li>
</ul>

<a name="5.0.4"></a>
<h2>5.0.4</h2>

<ul>
 <li>Released: 31 Mar 2005</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-5.php#5.0.4">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-5.0.4.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: fb1aac107870f897d26563a9cc5053c0</span>
   </li>
   <li>
    <?php download_link('php-5.0.4.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: 8edf259bcfab4cfc890a4bb4e7c3649f</span>
   </li>
   <li>
    <?php download_link('php-5.0.4-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: fff10991a8e6f3b36ee567eb236ae3f4</span>
   </li>
   <li>
    <?php download_link('pecl-5.0.4-Win32.zip', 'Collection of PECL modules for PHP 5.0.4'); ?><br />
    <span class="md5sum">md5: 44304bc1e1d3f08404ed99279ea1b8de</span>
   </li>
   <li>
    <?php download_link('php-5.0.4-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 8f951136757600ce78d5e442cb5b1541</span>
   </li>
  </ul>
 </li>
</ul>

<a name="5.0.3"></a>
<h2>5.0.3</h2>

<ul>
 <li>Released: 15 Dec 2004</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-5.php#5.0.3">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-5.0.3.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: fd26455febdddee0977ce226b9108d9c</span>
   </li>
   <li>
    <?php download_link('php-5.0.3.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: bf89557056ce34d502e20e24071616c7</span>
   </li>
   <li>
    <?php download_link('php-5.0.3-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: 50f3d62e7bb4526fd1deefdb263f9fa7</span>
   </li>
   <li>
    <?php download_link('pecl-5.0.3-Win32.zip', 'Collection of PECL modules for PHP 5.0.3'); ?><br />
    <span class="md5sum">md5: 3db2706fda3a690efa675581745d3bf7</span>
   </li>
   <li>
    <?php download_link('php-5.0.3-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: f5aa879a4195cd62d33de9d73e0ec0e2</span>
   </li>
  </ul>
 </li>
</ul>

<a name="5.0.2"></a>
<h2>5.0.2</h2>

<ul>
 <li>Released: 23 Sep 2004</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-5.php#5.0.2">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-5.0.2.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: 579f82f3d6a61b669183b2ebce357a1e</span>
   </li>
   <li>
    <?php download_link('php-5.0.2.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: 5467327e0cab6de76a90266933322b59</span>
   </li>
   <li>
    <?php download_link('php-5.0.2-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: dd74b477b3b9cabf8c448e333fcda2c6</span>
   </li>
   <li>
    <?php download_link('pecl-5.0.2-Win32.zip', 'Collection of PECL modules for PHP 5.0.2'); ?><br />
    <span class="md5sum">md5: 5a95c4bf9561d12ad992dfb4e6e60222</span>
   </li>
   <li>
    <?php download_link('php-5.0.2-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 2528dcc6a8b6c6e5027e262ba35c5d12</span>
   </li>
  </ul>
 </li>
</ul>

<a name="5.0.1"></a>
<h2>5.0.1</h2>

<ul>
 <li>Released: 12 Aug 2004</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-5.php#5.0.1">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php5/php-5.0.1.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/php5/php-5.0.1-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/php5/pecl-5.0.1-Win32.zip">Collection of PECL modules for PHP 5.0.1</a>
 </li>
</ul>

<a name="5.0.0"></a>
<h2>5.0.0</h2>

<ul>
 <li>Released: 13 July 2004</li>
 <li>Announcement: None</li>
 <li><a href="/ChangeLog-5.php#5.0.0">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php5/php-5.0.0.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/php5/php-5.0.0-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/php5/php-5.0.0-installer.exe">Windows installer</a>
  <a href="http://museum.php.net/php5/pecl-5.0.0-Win32.zip">Collection of PECL modules for PHP 5.0.0</a>
 </li>
</ul>

<hr />

<a name="v4"></a>
<a name="4.4.0"></a>
<h2>4.4.0</h2>

<ul>
 <li>Released: 11 Jul 2005</li>
 <li>Announcement: <a href="/release_4_4_0.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.4.0">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.4.0.tar.bz2','PHP 4.4.0 (tar.bz2)'); ?> - 11 Jul 2005<br />
    <span class="md5sum">md5: e85b606fe48198bfcd785e5a5b1c9613</span>
   </li>
   <li>
    <?php download_link('php-4.4.0.tar.gz', 'PHP 4.4.0 (tar.gz)');  ?> - 11 Jul 2005<br />
    <span class="md5sum">md5: 4c12d241216e4ca2f2ce2cb7ee5de48b</span>
   </li>
   <li>
    <?php download_link('php-4.4.0-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: bf5dfbda3cbf90609eaac8865145e052</span>
   </li>
   <li>
    <?php download_link('php-4.4.0-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 9f8c733be89ea32025ecc64f7aeae60b</span>
   </li>
  </ul>
 </li>
</ul>

<a name="4.3.11"></a>
<h2>4.3.11</h2>

<ul>
 <li>Released: 31 Mar 2005</li>
 <li>Announcement: <a href="/release_4_3_11.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.3.11">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.3.11.tar.bz2','PHP 4.3.11 (tar.bz2)'); ?> - 31 Mar 2005<br />
    <span class="md5sum">md5: fbc67d240812136a9842bc1f2a217b7a</span>
   </li>
   <li>
    <?php download_link('php-4.3.11.tar.gz', 'PHP 4.3.11 (tar.gz)');  ?> - 31 Mar 2005<br />
    <span class="md5sum">md5: 5de2ba1aababb5868d55ea43cf3bebef</span>
   </li>
   <li>
    <?php download_link('php-4.3.11-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: 3f2586bc27ac7eae3a5a1decf4d9b5b5</span>
   </li>
   <li>
    <?php download_link('php-4.3.11-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 07523a6a56441a8eb382114f1933af52</span>
   </li>
  </ul>
 </li>
</ul>

<a name="4.3.10"></a>
<h2>4.3.10</h2>

<ul>
 <li>Released: 15 Dec 2004</li>
 <li>Announcement: <a href="/release_4_3_10.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.3.10">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.3.10.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: 7e56824dae9679c59a8234eb848aa542</span>
   </li>
   <li>
    <?php download_link('php-4.3.10.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: 73f5d1f42e34efa534a09c6091b5a21e</span>
   </li>
   <li>
    <?php download_link('php-4.3.10-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: 0bb30525512ea686abf22c8fe61e1bb6</span>
   </li>
   <li>
    <?php download_link('php-4.3.10-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 6d60129d738e16ea0b69f3fd6646bf3a</span>
   </li>
  </ul>
 </li>
</ul>

<a name="4.3.9"></a>
<h2>4.3.9</h2>

<ul>
 <li>Released: 22 Sep 2004</li>
 <li>Announcement: <a href="/release_4_3_9.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.3.9">ChangeLog</a></li>
 <li>
  Download:
  <ul>
   <li>
    <?php download_link('php-4.3.9.tar.bz2','Source (tar.bz2)'); ?><br />
    <span class="md5sum">md5: b799bbb330da60324d972641baab693c</span>
   </li>
   <li>
    <?php download_link('php-4.3.9.tar.gz','Source (tar.gz)'); ?><br />
    <span class="md5sum">md5: c685cb76bff996a4dff87097c43e6987</span>
   </li>
   <li>
    <?php download_link('php-4.3.9-Win32.zip','Windows binary'); ?><br />
    <span class="md5sum">md5: c4a4c349e729b339a27c72abe833c58d</span>
   </li>
   <li>
    <?php download_link('php-4.3.9-installer.exe','Windows installer'); ?><br />
    <span class="md5sum">md5: 4a2af567ba607e40e4ca4e58adba5cc0</span>
   </li>
  </ul>
 </li>
</ul>


<a name="4.3.8"></a>
<h2>4.3.8</h2>

<ul>
 <li>Released: 13 July 2004</li>
 <li>Announcement: <a href="/release_4_3_8.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.3.8">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.8.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.8-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.8-installer.exe">Windows installer</a>
 </li>
</ul>


<a name="4.3.7"></a>
<h2>4.3.7</h2>

<ul>
 <li>Released: 03 June 2004</li>
 <li>Announcement: <a href="/release_4_3_7.php">English</a></li>
 <li><a href="/ChangeLog-4.php#4.3.7">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.7.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.7-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.7-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.3.6"></a>
<h2>4.3.6</h2>

<ul>
 <li>Released: 15 April 2004</li>
 <li>Announcement: <a href="/release_4_3_6.php">English</a>, <a href="/release_4_3_6_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.6">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.6.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.6-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.6-installer.exe">Windows installer</a>
 </li>
</ul>

<a name="4.3.5"></a>
<h2>4.3.5</h2>

<ul>
 <li>Released: 26 March 2004</li>
 <li>Announcement: <a href="/release_4_3_5.php">English</a>, <a href="/release_4_3_5_fr.php">French</a></li>
 <li><a href="/ChangeLog-4.php#4.3.5">ChangeLog</a></li>
 <li>
  Download:
  <a href="http://museum.php.net/php4/php-4.3.5.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.5-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.5-installer.exe">Windows installer</a>
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
  <a href="http://museum.php.net/php4/php-4.3.4.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/win32/php-4.3.4-Win32.zip">Windows binary</a>,
  <a href="http://museum.php.net/win32/php-4.3.4-installer.exe">Windows installer</a>
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
  <a href="http://museum.php.net/php4/php-4.3.3.tar.gz">Source (tar.gz)</a>,
  <a href="http://museum.php.net/php4/php-4.3.3.tar.bz2">Source (tar.bz2)</a>,
  <a href="http://museum.php.net/win32/php-4.3.3-Win32.zip">Windows binary</a>,
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

<hr />

<a name="v3"></a>
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
