<?php
$_SERVER['BASE_PAGE'] = 'releases/8_4_1.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.4.1 Release Announcement');
?>
<h1>PHP 8.4.1 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.4.1. This release marks
the latest minor release of the PHP language.</p>

<p>PHP 8.4 comes with numerous improvements and new features such as:</p>

<ul>
  <li><a href="https://www.php.net/manual/en/migration84.new-features.php#migration84.new-features.core.property-hooks">Property Hooks</a></li>
  <li><a href="https://www.php.net/manual/en/migration84.new-features.php#migration84.new-features.core.asymmetric-property-visibility">Asymmetric Property Visibility</a></li>
  <li><a href="https://www.php.net/manual/en/migration84.new-features.php#migration84.new-features.core.lazy-objects">Lazy Objects</a></li>
  <li><a href="https://www.php.net/manual/en/migration84.new-features.php#migration84.new-features.pdo">PDO driver-specific subclasses</a></li>
  <li><a href="https://www.php.net/manual/en/migration84.new-classes.php#migration84.new-classes.bcmath">BCMath object type</a></li>
  <li>And much much more...</li>
</ul>

<p>For source downloads of PHP 8.4.1 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.4.1">ChangeLog</a>.
</p>
<?php site_footer();
