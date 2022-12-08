<?php
$_SERVER['BASE_PAGE'] = 'releases/8_2_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header('PHP 8.2.0 Release Announcement');
?>
<h1>PHP 8.2.0 Release Announcement</h1>

<p>The PHP development team announces the immediate availability of PHP 8.2.0. This release marks the latest minor release of the PHP language.</p>

<p>PHP 8.2 comes with numerous improvements and new features such as:</p>

<ul>
    <li><a href="https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class.readonly">Readonly classes</a></li>
    <li><a href="https://www.php.net/manual/en/migration82.new-features.php#migration82.new-features.core.type-system">Disjunctive Normal Form (DNF) Types</a></li>
    <li>New stand-alone types: <a href="https://wiki.php.net/rfc/null-false-standalone-types">null, false</a>, and <a href="https://wiki.php.net/rfc/true-type">true</a></li>
    <li><a href="https://www.php.net/manual/en/book.random.php">New "Random" extension</a></li>
    <li><a href="https://www.php.net/manual/en/migration82.new-features.php#migration82.new-features.core.constant-in-traits">Constants in traits</a></li>
    <li><a href="https://www.php.net/manual/en/migration82.deprecated.php#migration82.deprecated.core.dynamic-properties">Deprecate dynamic properties</a></li>
    <li>And much much more...</li>
</ul>

<p>
    For source downloads of PHP 8.2.0 please visit our <a href="https://www.php.net/downloads.php">downloads page</a>,
    Windows source and binaries can be found on <a href="https://windows.php.net/download/">windows.php.net/download/</a>.
    The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-8.php#8.2.0">ChangeLog</a>.
</p>

<p>
    The <a href="https://php.net/manual/en/migration82.php">migration guide</a> is available in the PHP Manual.
    Please consult it for the detailed list of new features and backward incompatible changes.
</p>

<p>Kudos to all the contributors and supporters!</p>

<?php site_footer();
