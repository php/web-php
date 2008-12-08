<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_8.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.8 Release Announcement");
?>

<h1>PHP 5.2.8 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate availability
of PHP 5.2.8. This release addresses a regression introduced by 5.2.7 in
regard to the magic_quotes functionality, that was broken by an incorrect fix
to the filter extension. All users who have upgraded to 5.2.7 are encouraged
to upgrade to this release, alternatively you can apply a work-around for
the bug by changing "filter.default_flags=0" in php.ini
</p>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.8.
</p>

<p>
 For a full list of changes in PHP 5.2.8, see the <a href="/ChangeLog-5.php#5.2.8">ChangeLog</a>.
</p>

<?php site_footer(); ?>
