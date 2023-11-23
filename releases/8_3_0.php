<?php
$_SERVER['BASE_PAGE'] = 'releases/8_3_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.3.0 Release Announcement');
?>
<h1>PHP 8.3.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.3.0. This release marks
the latest minor release of the PHP language.</p>

<p>PHP 8.3 comes with numerous improvements and new features such as:</p>

<ul>
  <li><a href="https://www.php.net/manual/en/migration83.new-features.php#migration83.new-features.core.typed-class-constants">Typed Class Constants</a></li>
  <li><a href="https://www.php.net/manual/en/migration83.new-features.php#migration83.new-features.core.fetch-class-constant-dynamically-syntax">Fetch class constant dynamically syntax</a></li>
  <li><a href="https://www.php.net/manual/en/migration83.new-features.php#migration83.new-features.core.readonly-modifier-improvements">Readonly Amendments</a></li>
  <li><a href="https://www.php.net/manual/en/migration83.new-features.php#migration83.new-features.core.override-attribute">Override Attribute</a></li>
  <li><a href="https://www.php.net/manual/en/random-randomizer.getbytesfromstring.php">New Randomizer method Random\Randomizer::getBytesFromString</a></li>
  <li><a href="https://www.php.net/manual/en/function.json-validate.php">New function json_validate</a></li>
  <li>And much much more...</li>
</ul>

<p>For source downloads of PHP 8.3.0 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.3.0">ChangeLog</a>.
</p>
<?php site_footer();
