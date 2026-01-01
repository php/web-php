<?php
$_SERVER['BASE_PAGE'] = 'releases/8_0_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.0.0 Release Announcement');
?>
<h1>PHP 8.0.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.0.0. This release marks the latest major release of the PHP language.</p>

<p>PHP 8.0 comes with numerous improvements and new features such as:</p>
<ul>
  <li>Union Types</li>
  <li>Named Arguments</li>
  <li>Match Expressions</li>
  <li>Attributes</li>
  <li>Constructor Property Promotion</li>
  <li>Nullsafe Operator</li>
  <li>Weak Maps</li>
  <li>Just In Time Compilation</li>
  <li>And much much more...</li>
</ul>

<p>Take a look at the <a href="https://www.php.net/releases/8.0/">PHP 8.0 Announcement Addendum</a> for more information.</p>

<p>For source downloads of PHP 8.0.0 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.0.0">ChangeLog</a>.
</p>

<p>The <a href="https://www.php.net/manual/en/migration80.php">migration guide</a> is available in the PHP Manual.
Please consult it for the detailed list of new features and backward incompatible changes.</p>

<p>Many thanks to all the contributors and supporters!</p>

<?php site_footer();
