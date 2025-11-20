<?php
$_SERVER['BASE_PAGE'] = 'releases/8_5_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.5.0 Release Announcement');
?>
<h1>PHP 8.5.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.5.0. This release marks the latest minor release of the PHP language.</p>

<p>PHP 8.5 comes with numerous improvements and new features such as:</p>
<ul>
  <li>New "URI" extension</li>
  <li>New pipe operator (|&gt;)</li>
  <li>Clone With</li>
  <li>New #[\NoDiscard] attribute</li>
  <li>Support for closures, casts, and first class callables in constant expressions</li>
  <li>And much much more...</li>
</ul>
<p>
  For source downloads of PHP 8.5.0 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
  Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
  The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.5.0">ChangeLog</a>.
</p>
<p>
  The <a href="https://php.net/manual/en/migration85.php">migration guide</a> is available in the PHP Manual.
  Please consult it for the detailed list of new features and backward incompatible changes.
</p>
<p>Kudos to all the contributors and supporters!</p>

<?php site_footer();
