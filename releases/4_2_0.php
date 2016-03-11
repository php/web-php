<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_2_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.2.0 Release Announcement");
?>

<h1>PHP 4.2.0 Release Announcement</h1>

<p>
 After an orderly QA process, PHP 4.2.0 is <a href="/downloads.php">out</a>!<br>
 [ <a href="/releases/4_2_0_fr.php">Version Fran&ccedil;aise</a> ]
</p>

<h2>External variables</h2>

<p>
 The biggest change in PHP 4.2.0 concerns variable handling. <strong>External
 variables (from the environment, the HTTP request, cookies or the web server)
 are no longer registered in the global scope by default.</strong> The preferred
 method of accessing these external variables is by using the new Superglobal
 arrays, introduced in PHP 4.1.0. More information about this change:</p>
 
<ul>
 <li><a href="/variables.predefined">PHP Manual: Predefined variables</a></li>
 <li><a href="/releases/4_1_0.php">The PHP 4.1.0 release announcement</a></li>
 <li><a href="http://www.zend.com/zend/art/art-oertli.php">Thomas Oertli's article on secure programming in PHP</a></li>
</ul>

<h2>Compatibility</h2>

<p>
 The Apache Software Foundation recently released their first
 General Availability version of Apache 2. PHP 4.2.0 will have
 <strong>EXPERIMENTAL</strong> support for this version. You can
 build a DSO module for Apache 2 with --with-apxs2. We do
 <strong>not</strong> recommend that you use this in a production
 environment.
</p>
<p>
 PHP 4.2.0 still lacks certain key features on Mac OS X and
 Darwin, and isn't officially supported by the PHP Group on
 these platforms. Specifically, building PHP as a dynamically
 loaded Apache module isn't supported at this time. PHP 4.3.0,
 due to be released in August, 2002, will be the first PHP
 release to officially support Mac OS X. It, along with future
 Mac OS X and Apache releases, will enable full feature parity
 with other PHP platforms. <strong>Update:</strong> 
 <a href="http://www.entropy.ch/software/macosx/php/">Instructions on
 overcoming these limitations</a>
</p>

<h2>Improvements</h2>

<p>PHP 4.2.0 includes several improvements:</p>

<ul>
 <li>
  <strong>External variables (from the environment, the HTTP request, cookies or
  the web server) are no longer registered as global variables</strong>
 </li>
 <li>Overhaul of the sockets extension</li>
 <li>Highly improved performance with file uploads</li>
 <li>
  The satellite and mailparse extensions were moved to PECL and are no longer 
  bundled with the official PHP release
 </li>
 <li>The posix extension has been cleaned up</li>
 <li>iconv handling has been improved</li>
 <li>
  Output buffering support, which was introduced in PHP 4.1.0 has
  been stabilized
 </li>
 <li>Improved performance and stability of the domxml extension</li>
 <li>New multibyte regular expression support</li>
 <li><strong>LOTS</strong> of fixes and new functions</li>
</ul>

<p>
 For a full list of changes in PHP 4.2.0,
 <a href="/ChangeLog-4.php#4.2.0">see the ChangeLog</a>.
</p>

<?php site_footer(); ?>
