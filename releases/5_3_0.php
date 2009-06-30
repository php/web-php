<?php
// $Id: 5_2_0.php,v 1.4 2007/01/16 16:04:05 bjori Exp $
$_SERVER['BASE_PAGE'] = 'releases/5_3_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.0 Release Announcement");
?>

<h1>PHP 5.3.0 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate release of PHP
5.3.0. This release is a major improvement in the 5.X series, which includes a
large number of new features and bug fixes.
</p>

<p>
<b>The key features of PHP 5.3.0 include:</b>
</p>
<ul>
  <li>Support for <a href="http://php.net/namespaces">namespaces</a></li>
  <li><a href="http://php.net/lsb">Late static binding</a></li>
  <li><a href="http://php.net/closures">Lambda Functions and Closures</a></li>
  <li>
   Syntax additions:
   <a href="http://php.net/nowdoc">NOWDOC</a>,
   <a href="http://php.net/ternary">ternary short cut "?:"</a> and
   <a href="http://php.net/goto">jump label</a> (limited goto),
   <a href="http://php.net/__callstatic">__callStatic()</a>
  </li>
  <li>Under the hood performance improvements</li>
  <li>Optional <a href="http://php.net/gc_enable">garbage collection</a> for cyclic references</li>
  <li>Optional <a href="http://php.net/mysqli.mysqlnd">mysqlnd</a> PHP native replacement for libmysql</li>
  <li>Improved <a href="http://windows.php.net">Windows</a> support including VC9 and experimental X64 binaries
  as well as portability to other supported platforms</li>
  <li>More consistent float rounding</li>
  <li>Deprecation notices are now handled via <code>E_DEPRECATED</code> (part of <code>E_ALL</code>)
  instead of the <code>E_STRICT</code> error level</li>
  <li>Several enhancements to enable more <a href="http://php.net/ini.sections">flexiblity in php.ini</a> (and ini parsing in general)</li>
  <li>New bundled extensions:
   <a href="http://php.net/phar">ext/phar</a>,
   <a href="http://php.net/intl">ext/intl</a>,
   <a href="http://php.net/fileinfo">ext/fileinfo</a>,
   <a href="http://php.net/sqlite3">ext/sqlite3</a>,
   <a href="http://php.net/enchant">ext/enchant</a>
  </li>
  <li>Over 140 bug fixes and improvements to PHP, in particular to:
   <a href="http://php.net/openssl">ext/openssl</a>,
   <a href="http://php.net/spl">ext/spl</a> and
   <a href="http://php.net/datetime">ext/date</a>
  </li>
</ul>
<p>This release also drops several extensions and unifies the usage of internal APIs.
Users should be aware of the following known backwards compatibility breaks:</p>
<ul>
  <li>Parameter parsing API unification will cause some functions to behave more
  or less strict when it comes to type juggling</li>
  <li>Removed the following extensions:
   <a href="http://php.net/mhash">ext/mhash</a> (see <a href="http://php.net/hash">ext/hash</a>),
   <a href="http://php.net/msql">ext/msql</a>,
   <a href="http://php.net/pspell">ext/pspell</a> (see <a href="http://php.net/enchant">ext/enchant</a>),
   <a href="http://php.net/sybase">ext/sybase</a> (see <a href="http://php.net/sybase">ext/sybase_ct</a>)
  </li>
  <li>Moved the following extensions to PECL:
   <a href="http://php.net/ming">ext/ming</a>,
   <a href="http://php.net/fbsql">ext/fbsql</a>,
   <a href="http://php.net/ncurses">ext/ncurses</a>,
   <a href="http://php.net/fdf">ext/fdf</a>
  </li>
  <li>Removed <a href="http://php.net/manual/ini.core.php#ini.zend.ze1-compatibility-mode">zend.ze1_compatibility_mode</a></li>
</ul>

<p>
For users upgrading from PHP 5.2 there is a migration guide
available <a href="http://php.net/migration53">here</a>, detailing
the changes between those releases and PHP 5.3.0.
</p>

<p>
 For a full list of changes in PHP 5.3.0, see the
 <a href="/ChangeLog-5.php#5.3.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
