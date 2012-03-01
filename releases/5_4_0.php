<?php
// $Id: 5_2_0.php,v 1.4 2007/01/16 16:04:05 bjori Exp $
$_SERVER['BASE_PAGE'] = 'releases/5_4_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.4.0 Release Announcement");
?>

<h1>PHP 5.4.0 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate availability
of PHP <a href="http://php.net/downloads.php#v5.4.0">5.4.0</a>.
This release is a major leap forward in the 5.x series,
and includes a large number of new features and bug fixes.
</p>

<p>
<b>The key features of PHP 5.4.0 include:</b>
</p>
<ul>
 <li>New language syntax including <a href="http://php.net/traits">Traits</a>,
    <a href="http://docs.php.net/manual/language.types.array.php">shortened array syntax</a>
    and <a href="http://docs.php.net/manual/migration54.new-features.php">more</a></li>
 <li>Improved performance and reduced memory consumption</li>
 <li>Support for multibyte languages now available in all builds of PHP at the flip of a runtime switch</li>
 <li><a href="http://php.net/manual/features.commandline.webserver.php">
    Built-in webserver</a> in CLI mode to simplify development workflows and testing</li>
 <li>Cleaner code base thanks to the removal of multiple deprecated language features</li>
 <li>Many more improvements and fixes</li>
</ul>

<p>
<b>Changes that affect compatibility:</b>
</p>
<ul>
  <li><a href="http://www.php.net/manual/security.globals.php">Register globals</a>, <a href="http://www.php.net/manual/security.magicquotes.php">magic quotes</a> and <a href="http://www.php.net/manual/features.safe-mode.php">safe mode</a> were removed</li>
  <li>The <a href="http://php.net/manual/control-structures.break.php">break</a>/<a href="http://php.net/manual/control-structures.continue.php">continue</a> $var syntax was removed</li>
  <li>The ini option <a href="http://www.php.net/manual/ini.core.php#ini.allow-call-time-pass-reference">allow_call_time_pass_reference</a> was removed</li>
  <li>The PHP <a href="http://www.php.net/manual/ini.core.php#ini.default-charset">default_charset</a> is now "UTF-8" within the distributed php.ini files, but still defaults to ""</li>
</ul>

<p>
<b>Extensions moved to <a href="http://pecl.php.net">PECL</a>:</b>
</p>
<ul>
  <li><a href="http://www.php.net/manual/ref.sqlite.php">ext/sqlite</a> (<a href="http://www.php.net/manual/book.sqlite3.php">ext/sqlite3</a> and <a href="http://www.php.net/manual/ref.pdo-sqlite.php">ext/pdo_sqlite</a> are not affected)</li>
</ul>

<p>
PHP 5.4 will be the last series to support Windows XP and Windows
2003. We will not provide binary packages for these Windows versions
after PHP 5.4.
</p>

<p>
For users upgrading from PHP 5.3 there is a migration guide available
<a href="http://php.net/migration54">here</a>, detailing the changes between
PHP 5.3 and PHP 5.4.0.
</p>

<p>
 For a full list of changes in PHP 5.4.0, see the
 <a href="/ChangeLog-5.php#5.4.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
