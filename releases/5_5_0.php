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
 <li>Added <a href="http://www.php.net/generators">generators</a> and coroutines.</li>
 <li>Added <a href="http://www.php.net/exceptions">"finally"</a> keyword. </li>
 <li>Added <a href="http://www.php.net/password">simplified password hashing API</a>.</li>
 <li>Added support for constant array/string dereferencing.</li>
 <li>Added scalar class name resolution via <a href="http://www.php.net/oop5.basic#language.oop5.basic.class.class">::class</a>.</li>
 <li>Added <a href="http://www.php.net/migration55.new-features#migration55.new-features.empty">support for using empty() on the result of function calls and other expressions</a></li>
 <li>Added support for <a href="https://wiki.php.net/rfc/foreach-non-scalar-keys">non-scalar Iterator keys in foreach</a></li>
 <li>Added support for <a href="http://www.php.net/foreach#control-structures.foreach.list">list in foreach</a></li>
 <li>Added Zend Opcache extension and enable building it by default</li>
 <li>A lot more improvements and fixes</li>
</ul>

<p>
<b>Changes that affect compatibility:</b>
</p>
<ul>
  <li><a href="http://www.php.net/php-logo-guid">PHP logo GUIDs</a> have been removed</li>
  <li>Windows XP and 2003 support dropped</li>
  <li>Case insensitivity is no longer locale specific. All case insensitive matching for function, class and constant names is now performed in a locale independent manner according to ASCII rules</li>
</ul>

<p>
For users upgrading from PHP 5.4 there is a migration guide available
<a href="http://php.net/migration55">here</a>, detailing the changes between
PHP 5.4 and PHP 5.5.0.
</p>

<p>
 For a full list of changes in PHP 5.5.0, see the
 <a href="/ChangeLog-5.php#5.5.0">ChangeLog</a>.
</p>

<?php site_footer(); ?>
