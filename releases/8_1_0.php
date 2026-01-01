<?php
$_SERVER['BASE_PAGE'] = 'releases/8_1_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.1.0 Release Announcement');
?>
<h1>PHP 8.1.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.1.0. This release marks the latest minor release of the PHP language.</p>

<p>PHP 8.1 comes with numerous improvements and new features such as:</p>
<ul>
  <li><a href="https://www.php.net/manual/en/language.enumerations.php">Enumerations</a></li>
  <li><a href="https://wiki.php.net/rfc/readonly_properties_v2">Readonly properties</a></li>
  <li><a href="https://wiki.php.net/rfc/fibers">Fibers</a></li>
  <li><a href="https://wiki.php.net/rfc/pure-intersection-types">Pure Intersection Types</a></li>
  <li><a href="https://www.php.net/manual/en/migration81.new-features.php#migration81.new-features.core.never-type">never</a> return type</li>
  <li><a href="https://www.php.net/manual/en/migration81.new-features.php#migration81.new-features.core.callable-syntax">First-class Callable Syntax</a></li>
  <li>"final" modifier for class constants</li>
  <li>New <a href="https://www.php.net/manual/en/function.fsync.php">fsync</a> and <a href="https://www.php.net/manual/en/function.fdatasync.php">fdatasync</a> functions</li>
  <li>New <a href="https://www.php.net/manual/en/function.array-is-list.php">array_is_list</a> function</li>
  <li>Explicit <a href="https://www.php.net/manual/en/migration81.new-features.php#migration81.new-features.core.octal-literal-prefix">Octal numeral notation</a></li>
  <li>And much much more...</li>
</ul>

<p>For source downloads of PHP 8.1.0 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.1.0">ChangeLog</a>.
</p>

<p>The <a href="https://www.php.net/manual/en/migration81.php">migration guide</a> is available in the PHP Manual.
Please consult it for the detailed list of new features and backward incompatible changes.</p>

<p>Many thanks to all the contributors and supporters!</p>

<?php site_footer();
