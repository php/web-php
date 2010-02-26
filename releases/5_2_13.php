<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_2_13.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.2.13 Release Announcement");
?>

<h1>PHP 5.2.13 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.2.13. This release focuses on improving the stability of
the PHP 5.2.x branch with over 40 bug fixes, some of which are security related. 
All users of PHP 5.2 are encouraged to upgrade to this release.
</p>

<p>
<b>Security Enhancements and Fixes in PHP 5.2.13:</b>
</p>
<ul>
	<li>Fixed safe_mode validation inside tempnam() when the directory path does not end with a /). (Martin Jansen)</li>
	<li>Fixed a possible open_basedir/safe_mode bypass in the session extension identified by Grzegorz Stachowiak. (Ilia)</li>
	<li>Improved LCG entropy. (Rasmus, Samy Kamkar)</li>
</ul>

<p>
<b>Key enhancements in PHP 5.2.13 include:</b>
</p>
<ul>
	<li>Fixed bug #50940 Custom content-length set incorrectly in Apache sapis.  (Brian France, Rasmus)</li>
	<li>Fixed bug #50847 (strip_tags() removes all tags greater then 1023 bytes long). (Ilia)</li>
	<li>Fixed bug #50661 (DOMDocument::loadXML does not allow UTF-16). (Rob)</li>
	<li>Fixed bug #50632 (filter_input() does not return default value if the variable does not exist). (Ilia)</li>
	<li>Fixed bug #50540 (Crash while running ldap_next_reference test cases). (Sriram)</li>
	<li>Fixed bug #49851 (http wrapper breaks on 1024 char long headers). (Ilia)</li>

	<li>Over 30 other bug fixes.</li>
</ul>

<p>
For users upgrading from PHP 5.0 and PHP 5.1, an upgrade guide is available 
<a href="/UPDATE_5_2.txt">here</a>, detailing the changes between those releases
and PHP 5.2.13.
</p>

<p>
 For a full list of changes in PHP 5.2.13, see the <a href="/ChangeLog-5.php#5.2.13">ChangeLog</a>.
</p>

<?php site_footer(); ?>
