<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_4_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.0 Release Announcement");
?>

<h1>PHP 4.4. Release Announcement</h1>
<p>
The PHP Development Team would like to announce the immediate release of
<a href="/downloads.php">PHP 4.4.0</a>.
</p>
<p>
This is a maintenance release that addresses a serious memory corruption
problem within PHP concerning references. If references were used in a wrong
way, PHP would often create memory corruptions which would not always surface
or be visible. In other cases it could cause variables and objects to change
type or class unexpectedly. If you encountered strange behavior like this, this
release might fix it. The increased middle digit was required because the fix that
corrected the problem with references changed PHP's internal API, breaking
binary compatibility with the PHP 4.3.* series. This means that all binary
extension modules need to be recompiled in order to work with this release.
</p>
<p>
As part of the solution for the reference bug, you are very likely to find that
your own or third-party PHP scripts, considered 'clean' code under previous
versions of PHP, will now throw an E_NOTICE when references are incorrectly used
in the script. This is intended to alert developers to minor errors in their
approach, and does not affect the script's performance in any other way.
</p>
<p>
Besides the reference problem, this release also fixes numerous other bugs,
including a small security problem with our bundled shtool.
</p>

<h2>Bugfix release</h2>

<ul>
<li>Memory corruptions with references.</li>
<li>Small security problem with bundled shtool.</li>
</ul>

<p>
 For a full list of changes in PHP 4.4.0, see the
 <a href="/ChangeLog-4.php#4.4.0">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
