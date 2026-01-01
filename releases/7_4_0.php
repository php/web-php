<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/7_4_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("PHP 7.4.0 Release Announcement");
?>
<h1>PHP 7.4.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 7.4.0.
This release marks the fourth feature update to the PHP 7 series.</p>

<p>PHP 7.4.0 comes with numerous improvements and new features such as:</p>

<ul>

<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.typed-properties">Typed Properties</a></li>
<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.arrow-functions">Arrow Functions</a></li>
<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.type-variance">Limited Return Type Covariance and Argument Type Contravariance</a></li>
<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.unpack-inside-array">Unpacking Inside Arrays</a></li>
<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.numeric-literal-separator">Numeric Literal Separator</a></li>
<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.weakreference">Weak References</a></li>
<li><a href="https://www.php.net/manual/migration74.new-features.php#migration74.new-features.core.tostring-exceptions">Allow Exceptions from __toString()</a></li>
<li><a href="https://www.php.net/manual/opcache.configuration.php#ini.opcache.preload">Opcache Preloading</a></li>
<li><a href="https://www.php.net/manual/migration74.deprecated.php">Several Deprecations</a></li>
<li><a href="https://www.php.net/manual/migration74.removed-extensions.php">Extensions Removed from the Core</a></li>
</ul>

<p>For source downloads of PHP 7.4.0 please visit our <a href="https://www.php.net/downloads">downloads</a> page
Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site.
The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-7.php#7.4.0">ChangeLog</a>.</p>

<p>The <a href="https://www.php.net/manual/en/migration74.php">migration guide</a> is available in the PHP Manual.
Please consult it for the detailed list of new features and backward incompatible changes.</p>

<p>Many thanks to all the contributors and supporters!</p>

<?php site_footer(); ?>
