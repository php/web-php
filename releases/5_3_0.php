<?php
$_SERVER['BASE_PAGE'] = 'releases/5_3_0.php';
include_once __DIR__ . '/../include/prepend.inc';
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
  <li>Support for <a href="https://www.php.net/namespaces">namespaces</a></li>
  <li><a href="https://www.php.net/lsb">Late static binding</a></li>
  <li><a href="https://www.php.net/closures">Lambda Functions and Closures</a></li>
  <li>
   Syntax additions:
   <a href="https://www.php.net/nowdoc">NOWDOC</a>,
   <a href="https://www.php.net/ternary">ternary short cut "?:"</a> and
   <a href="https://www.php.net/goto">jump label</a> (limited goto),
   <a href="https://www.php.net/__callstatic">__callStatic()</a>
  </li>
  <li>Under the hood performance improvements</li>
  <li>Optional <a href="https://www.php.net/gc_enable">garbage collection</a> for cyclic references</li>
  <li>Optional <a href="https://www.php.net/mysqli.mysqlnd">mysqlnd</a> PHP native replacement for libmysql</li>
  <li>Improved <a href="https://windows.php.net">Windows</a> support including VC9 and experimental X64 binaries
  as well as portability to other supported platforms</li>
  <li>More consistent float rounding</li>
  <li>Deprecation notices are now handled via <code>E_DEPRECATED</code> (part of <code>E_ALL</code>)
  instead of the <code>E_STRICT</code> error level</li>
  <li>Several enhancements to enable more <a href="https://www.php.net/ini.sections">flexiblity in php.ini</a> (and ini parsing in general)</li>
  <li>New bundled extensions:
   <a href="https://www.php.net/phar">ext/phar</a>,
   <a href="https://www.php.net/intl">ext/intl</a>,
   <a href="https://www.php.net/fileinfo">ext/fileinfo</a>,
   <a href="https://www.php.net/sqlite3">ext/sqlite3</a>,
   <a href="https://www.php.net/enchant">ext/enchant</a>
  </li>
  <li>Over 140 bug fixes and improvements to PHP, in particular to:
   <a href="https://www.php.net/openssl">ext/openssl</a>,
   <a href="https://www.php.net/spl">ext/spl</a> and
   <a href="https://www.php.net/datetime">ext/date</a>
  </li>
</ul>
<p>This release also drops several extensions and unifies the usage of internal APIs.
Users should be aware of the following known backwards compatibility breaks:</p>
<ul>
  <li>Parameter parsing API unification will cause some functions to behave more
  or less strict when it comes to type juggling</li>
  <li>Removed the following extensions:
   <a href="https://www.php.net/mhash">ext/mhash</a> (see <a href="https://www.php.net/hash">ext/hash</a>),
   <a href="https://www.php.net/msql">ext/msql</a>,
   <a href="https://www.php.net/pspell">ext/pspell</a> (see <a href="https://www.php.net/enchant">ext/enchant</a>),
   <a href="https://www.php.net/sybase">ext/sybase</a> (see <a href="https://www.php.net/sybase">ext/sybase_ct</a>)
  </li>
  <li>Moved the following extensions to PECL:
   <a href="https://www.php.net/ming">ext/ming</a>,
   <a href="https://www.php.net/fbsql">ext/fbsql</a>,
   <a href="https://www.php.net/ncurses">ext/ncurses</a>,
   <a href="https://www.php.net/fdf">ext/fdf</a>
  </li>
  <li>Removed <a href="https://www.php.net/manual/ini.core.php#ini.zend.ze1-compatibility-mode">zend.ze1_compatibility_mode</a></li>
</ul>

<p>
For users upgrading from PHP 5.2 there is a migration guide
available <a href="https://www.php.net/migration53">here</a>, detailing
the changes between those releases and PHP 5.3.0.
</p>

<p>
 For a full list of changes in PHP 5.3.0, see the
 <a href="/ChangeLog-5.php#5.3.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
