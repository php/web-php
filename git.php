<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'git.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>What is Git?</h3>
<p>
 You can find more information about Git and download clients for most major
 platforms at <a href="http://git-scm.com/">the official Git site</a>.
</p>

<p>
 The <a href="http://progit.org/">Pro Git book</a> may also be useful.
</p>


<h3>Contribute</h3>
<p>
 If you would like to join PHP development or would like to
 contribute to the PHP documentation, contact the relevant
 group. You may want <a href="/git-php.php">your own Git account</a>
 to contribute.
</p>
';
site_header("Git Access", array("current" => "community"));
?>

<h1>Git Access</h1>

<p>
 If you wish to get the latest PHP source tree, you can obtain it through Git.
 You should be warned that the Git version is a development version, and as
 such, is often unstable, and may not even compile properly. The advantage of
 using Git, though, is that you can get the latest fixes and updates, without
 having to wait for the official releases.
</p>

<p>
 PHP uses an advanced configuration system that requires you to have
 the following tools. re2c is only necessary for developers and can be found
 <a href="http://re2c.org">here</a>.
 All other utilities can be obtained from
 <a href="ftp://ftp.gnu.org/pub/gnu/">the GNU FTP site</a>.
</p>

<ul>
 <li><i>autoconf</i>: 2.59+</li>
 <li><i>automake</i>: 1.4+</li>
 <li><i>libtool</i>: 1.4.x+ (except 1.4.2)</li>
 <li><i>re2c</i>: 0.13.4+</li>
 <li id="bison"><i>bison</i>:
  <ul>
   <li><i>PHP 5.4</i>: 1.28, 1.35, 1.75, 2.0 to 2.6.4</li>
   <li><i>PHP 5.5 and 5.6</i>: 2.4 to 2.7</li>
   <li><i>PHP 7</i>: 2.4+</li>
  </ul>
 </li>
</ul>

<p>
 If you're experiencing problems, see also the section on
 <a href="#buildconf_fail">buildconf failures</a>.
</p>

<h2>Steps for using PHP from Git</h2>

<ol>
 <li>
  You can retrieve the PHP source code from our
  <a href="https://github.com/php/php-src.git">GitHub mirror</a> with this
  command:
  <br><br>
  <code>git clone https://github.com/php/php-src.git</code>
  <br><br>

  Alternatively, you can retrieve the source code from
  <a href="http://git.php.net/">git.php.net</a> with this command:
  <br><br>
  <code>git clone http://git.php.net/repository/php-src.git</code>
  <br><br>

  You can also download a snapshot from GitHub:<br><br>
  <ul>
   <li>Go to the <a href="https://github.com/php/php-src">php-src project page</a>.</li>
   <li>Select the branch you're interested in from the branch dropdown.</li>
   <li>Click on the <strong>Download ZIP</strong> button.</li>
  </ul>
 </li>

 <li>
  Make sure you're in the right directory to work on PHP:
  <br><br>
  <code>cd php-src</code>
  <br><br>
 </li>

 <li>
  You can then check out the branch you want to build, for example:
  <br><br>
  <strong>PHP 5.4</strong>:
  <code>git checkout PHP-5.4</code>
  <br>
  <strong>PHP 5.5</strong>:
  <code>git checkout PHP-5.5</code>
  <br>
  <strong>PHP 5.6</strong>:
  <code>git checkout PHP-5.6</code>
  <br>
  <strong>PHP 7.0</strong>:
  <code>git checkout PHP-7.0</code>
  <br>
  <strong>PHP HEAD</strong>:
  <code>git checkout master</code>
  <br><br>
 </li>

 <li>
  <div class="tip" style="margin: 10px 0 10px 20px;">
   <p>Note that certain combinations of autoconf, automake and libtool may not
   work when used together, particularly with historical versions of PHP. See
   <a href="#buildconf_fail">below</a> for details.<br>
   Also, certain versions of autoconf may generate warnings of <code>AC_PROG_CPP
   called before AC_PROG_CC</code>. These messages can usually be ignored.</p>
  </div>
 </li>

 <li>
  Run <code>./buildconf</code> to generate the configure script. This may take several moments.
 </li>

 <li>
  From this point onwards, installation is similar to the installation of one of
  the official packages with one main difference &ndash; you will need
  <a href="#bison">a version of bison that is supported for the PHP version you want to build</a>.
  You may also require re2c if you intend to change any of the scanner and
  parser files PHP uses.
 </li>
</ol>

<p>
 There are many other things, such as the XML source code
 for the documentation, available via Git. See
 <a href="http://git.php.net/">the web-based view of the Git
 server</a> to see what is available.
</p>

<p>
 The PHP Wiki has a useful
 <a href="https://wiki.php.net/vcs/gitfaq">Git FAQ</a>, which provides useful
 tips and cheatsheets for using the PHP Git repository, and if you want to
 become involved in developing PHP, the
 <a href="https://wiki.php.net/vcs/gitworkflow">Git Workflow</a> page is also
 likely to be of interest.
</p>

<h2>PHP manual</h2>

<p>
 The PHP manual is still currently hosted on SVN, although it will be migrated
 to Git in the future. To checkout the latest English version of the PHP
 manual:<br>
 <code>svn checkout https://svn.php.net/repository/phpdoc/modules/doc-en ./phpdoc-en</code>
 <br><br>
 You can also check the <a href="https://wiki.php.net/vcs/svnfaq">SVN FAQ on the wiki</a>.
</p>

<h2>Historical issues</h2>

<h3 id="buildconf_fail">autoconf, automake and libtool information for PHP 5.3 and below</h3>

<p>
 There seem to be problems with libtool 1.4.2. It is suggested
 that you use libtool 1.4, along with autoconf 2.13 and
 automake 1.4. You should also ensure that autoconf, automake
 and libtool are installed in the same directory. libtool 1.5
 will not work.
</p>

<p>The following combinations are known to work with PHP 5.3 and below:</p>
<ul>
 <li>autoconf 2.13, automake 1.4 and libtool 1.4.3</li>
 <li>autoconf 2.13, automake 1.5 and libtool 1.4.3</li>
</ul>

<p>
 If you have multiple versions of autoconf installed on your computer, as is
 common for many UNIXes, you can set the PHP_AUTOCONF and PHP_AUTOHEADER
 variables when running buildconf to indicate which versions it should use
 e.g.:<br>
 <code>PHP_AUTOCONF=autoconf213 PHP_AUTOHEADER=autoheader213 ./buildconf</code>
</p>

<h3 id="flex_fail">Zend/zend_language_scanner.c: No such file or directory</h3>

<p>
 PHP only supports flex 2.5.4, <strong>not</strong> later versions as they broke backwards compatibility.
 Please note that PHP 5.3 and later do not require flex at all.
</p>

<?php site_footer(); ?>
