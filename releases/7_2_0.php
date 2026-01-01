<?php
$_SERVER['BASE_PAGE'] = 'releases/7_2_0.php';
include_once __DIR__ . '/../include/prepend.inc';
site_header("PHP 7.2.0 Release Announcement");
?>

	<h1>PHP 7.2.0 Release Announcement</h1>

	<p>The PHP development team announces the immediate availability of PHP 7.2.0.
	This release marks the second feature update to the PHP 7 series.</p>

	<p>PHP 7.2.0 comes with numerous improvements and new features such as</p>

	<ul>
	<li><a href="https://wiki.php.net/rfc/convert_numeric_keys_in_object_array_casts">Convert numeric keys in object/array casts</a></li>
	<li><a href="https://wiki.php.net/rfc/counting_non_countables">Counting of non-countable objects</a></li>
	<li><a href="https://wiki.php.net/rfc/object-typehint">Object typehint</a></li>
	<li><a href="https://wiki.php.net/rfc/hash-context.as-resource">HashContext as Object</a></li>
	<li><a href="https://wiki.php.net/rfc/argon2_password_hash">Argon2 in password hash</a></li>
	<li><a href="https://wiki.php.net/rfc/improved-tls-constants">Improve TLS constants to sane values</a></li>
	<li><a href="https://wiki.php.net/rfc/mcrypt-viking-funeral">Mcrypt extension removed</a></li>
	<li><a href="https://wiki.php.net/rfc/libsodium">New sodium extension</a></li>
	</ul>

	<p>For source downloads of PHP 7.2.0 please visit our <a href="https://www.php.net/downloads">downloads</a> page
	Windows binaries can be found on the <a href="https://windows.php.net/download">PHP for Windows</a> site.
	The list of changes is recorded in the <a href="https://www.php.net/ChangeLog-7.php#7.2.0">ChangeLog</a>.</p>

	<p>The <a href="https://www.php.net/manual/en/migration72.php">migration guide</a> is available in the PHP Manual.
	Please consult it for the detailed list of new features and backward incompatible changes.</p>

	<p>Many thanks to all the contributors and supporters!</p>

<?php site_footer(); ?>
