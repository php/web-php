<?php
// $Id: 5_2_0.php,v 1.4 2007/01/16 16:04:05 bjori Exp $
$_SERVER['BASE_PAGE'] = 'releases/5_5_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.5.0 Release Announcement");
?>

<h1>PHP 5.5.0 Release Announcement</h1>
<p>
The PHP development team is proud to announce the immediate availability
of PHP <a href="http://php.net/downloads.php#v5.5.0">5.5.0</a>.
This release includes a large number of new features and bug fixes.
</p>

<p>
<b>The key features of PHP 5.5.0 include:</b>
</p>
<ul>
 <li>Added <a href="http://php.net/generators">generators</a> and coroutines.</li>
 <li>Added the <a href="http://php.net/exceptions">finally</a> keyword.</li>
 <li>Added a <a href="http://php.net/password">simplified password hashing API</a>.</li>
 <li>Added <a href="http://php.net/migration55.new-features#migration55.new-features.const-dereferencing">support for constant array/string dereferencing</a>.</li>
 <li>Added scalar class name resolution via <a href="http://php.net/oop5.basic#language.oop5.basic.class.class">::class</a>.</li>
 <li>Added <a href="http://php.net/migration55.new-features#migration55.new-features.empty">support for using empty() on the result of function calls and other expressions</a>.</li>
 <li>Added <a href="http://php.net/migration55.new-features#migration55.new-features.non-scalar-iterator-keys">support for non-scalar Iterator keys in foreach</a>.</li>
 <li>Added <a href="http://php.net/foreach#control-structures.foreach.list">support for list() constructs in foreach statements</a>.</li>
 <li>Added the <a href="http://php.net/opcache">Zend OPcache</a> extension for opcode caching.</li>
 <li>The GD library has been upgraded to version 2.1 adding new functions and improving existing functionality.</li>
 <li>A lot more improvements and fixes.</li>
</ul>

<p>
<b>Changes that affect compatibility:</b>
</p>
<ul>
  <li><a href="http://php.net/php_logo_guid">PHP logo GUIDs</a> have been removed.</li>
  <li>Windows XP and 2003 support dropped.</li>
  <li>Case insensitivity is no longer locale specific. All case insensitive matching for function, class and constant names is now performed in a locale independent manner according to ASCII rules.</li>
</ul>

<p>
For users upgrading from PHP 5.4,
<a href="http://php.net/migration55">a migration guide is available</a>
detailing the changes between 5.4 and 5.5.0.
</p>

<p>
 For a full list of changes in PHP 5.5.0, see the
 <a href="http://php.net/ChangeLog-5.php#5.5.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
