<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_2_1.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.2.1 Release Announcement");
?>

<h1>PHP 4.2.1 Release Announcement</h1>

<p>[ <a href="/releases/4_2_1_fr.php">Version Fran&ccedil;aise</a> ]</p>

<h2>Bugfix release</h2>

<p>
 This bug fix release solves a few bugs found in PHP 4.2.0.
 PHP 4.2.1 includes the following fixes:
</p>

<ul>
 <li>Fix for the MySQL extension not be able to connect to a MySQL server.</li>
 <li>Fix for a crash in the COM extension when using an outproc server.</li>
 <li>Fix for SID logic in the session extension.</li>
 <li>
  Fixes for the mbstring extension, including SJIS directory
  name handling and mb_output_buffer().
 </li>
 <li>
  Fix for a bug in socket_select() that could cause unexpected behavior when
  using a statement like $w = $e = array($sock);
 </li>
 <li>Almost full DOM compliance for the domxml extension, and fixes for several functions.</li>
 <li>Safe_mode checks for show_source(), parse_ini_file() and rmdir().</li>
</ul>

<p>
 For a full list of changes in PHP 4.2.1, see the
 <a href="/ChangeLog-4.php#4.2.1">ChangeLog</a>.
</p>

<h2>Compatibility</h2>

<p>
 PHP 4.2.1 also has improved (but still experimental) support for Apache version 2.
 We do <strong>not</strong> recommend that you use this in a production environment,
 but feel free to test it and report bugs to the <a href="http://bugs.php.net">bug
 system</a>.
</p>

<h2>External variables</h2>

<p>
 We would also like to attend you on a big change in PHP 4.2.0 concerning
 variable handling. <strong>External variables (from the environment, the HTTP
 request, cookies or the web server) are no longer registered in the global
 scope by default.</strong> The preferred method of accessing these external
 variables is by using the new Superglobal arrays, introduced in PHP 4.1.0.
 More information about this change:
</p>

<ul>
 <li><a href="/manual/en/language.variables.predefined.php">PHP Manual: Predefined variables</a></li>
 <li><a href="/release_4_1_0.php">The PHP 4.1.0 release announcement</a></li>
 <li><a href="http://www.zend.com/zend/art/art-oertli.php">Thomas Oertli's article on secure programming in PHP</a></li>
</ul>

<?php site_footer(); ?>
