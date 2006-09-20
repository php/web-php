<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_1_4.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.1.4 Release Announcement");
?>

<h1>PHP 5.1.4 Release Announcement</h1>
<p>
A critical bug with file uploads as well as the fastcgi sapi has been discovered in PHP 5.1.3 and a new PHP release 5.1.4 has been
 made available to address these two issues. All PHP users are encouraged to upgrade to this release as soon as possible.
</p>

<p>
This release provides fixes for the following bugs:
<ul>
	<li>Fixed problems with file uploads and the $_POST array handling.</li>
	<li>Resolved multiple problems with the FastCGI sapi.</li>
	<li>Fixed possible crash in highlight_string().</li>
	<li>Fixed cloning of DOM Documents and Noded.</li>
	<li>Several fixes to PDO ODBC driver.</li>
</ul>
</p>

<p>
 For a full list of changes in PHP 5.1.4, see the
 <a href="/ChangeLog-5.php#5.1.4">ChangeLog</a>.
</p>

<?php site_footer(); ?>
