<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'release_4_4_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.4.0 Release Announcement");
?>

<h1>PHP 4.4. Release Announcement</h1>
<!-- <p>[ <a href="/release_4_3_11_fr.php">Version Fran&ccedil;aise</a> ]</p> -->
<p>
PHP Development Team is would like to announce the immediate release of <a href="/downloads.php">PHP 4.4.0</a>. 
This is a maintenance release that addresses a serious memory corruption
problem within PHP concerning references. If references were used in a wrong
way, PHP would often create memory corruptions which would not always surface
and be visible. In other cases it can cause variables and objects to change
type or class. If you encountered strange behavior like this, this release
might fix it. The increased middle digit was required because the fix that
corrected the problem with references changed PHP's internal API. Because of
this all binary extension modules need to be recompiled for work with this
release again.</p>
<p>
Besides this reference problem, this release also fixes numerous other bugs,
including a small security problem with our bundled shtool.  All Users of PHP
are strongly encouraged to upgrade to this release.</p>

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
