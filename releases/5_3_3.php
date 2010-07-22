<?php
// $Id $
$_SERVER['BASE_PAGE'] = 'releases/5_3_3.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.3.3 Release Announcement");
?>

<h1>PHP 5.3.3 Release Announcement</h1>
<p>
The PHP development team would like to announce the immediate
availability of PHP 5.3.3. This release focuses on improving the  
stability and security of the PHP 5.3.x branch with over 100 bug
fixes, some of which are security related. All users are encouraged
to upgrade to this release.
</p>

<p>
<b>Backwards incompatible change:</b>
</p>
<ul>
	<li>Methods with the same name as the last element of a namespaced class name
	will no longer be treated as constructor. This change doesn't affect
	non-namespaced classes.

	<p><?php
	highlight_string('<?php
namespace Foo;
class Bar {
    public function Bar() {
        // treated as constructor in PHP 5.3.0-5.3.2
        // treated as regular method in PHP 5.3.3
    }
}
?>');
	?></p>
	<p>There is no impact on migration from 5.2.x because namespaces were only introduced in PHP 5.3.</p></li>
</ul>
<p>
<b>Security Enhancements and Fixes in PHP 5.3.3:</b>
</p>
<ul>
	<li>Rewrote var_export() to use smart_str rather than output buffering, prevents data disclosure if a fatal error occurs (CVE-2010-2531).</li>
	<li>Fixed a possible resource destruction issues in shm_put_var().</li>
	<li>Fixed a possible information leak because of interruption of XOR operator.</li>
	<li>Fixed a possible memory corruption because of unexpected call-time pass by refernce and following memory clobbering through callbacks.</li>
	<li>Fixed a possible memory corruption in ArrayObject::uasort().</li>
	<li>Fixed a possible memory corruption in parse_str().</li>
	<li>Fixed a possible memory corruption in pack().</li>
	<li>Fixed a possible memory corruption in substr_replace().</li>
	<li>Fixed a possible memory corruption in addcslashes().</li>
	<li>Fixed a possible stack exhaustion inside fnmatch().</li>
	<li>Fixed a possible dechunking filter buffer overflow.</li>
	<li>Fixed a possible arbitrary memory access inside sqlite extension.</li>
	<li>Fixed string format validation inside phar extension.</li>
	<li>Fixed handling of session variable serialization on certain prefix characters.</li>
	<li>Fixed a NULL pointer dereference when processing invalid XML-RPC requests (Fixes CVE-2010-0397, bug #51288).</li>
	<li>Fixed SplObjectStorage unserialization problems (CVE-2010-2225).</li>
	<li>Fixed possible buffer overflows in mysqlnd_list_fields,  mysqlnd_change_user.</li>
	<li>Fixed possible buffer overflows when handling error packets in mysqlnd.</li>
</ul>

<p>
<b>Key enhancements in PHP 5.3.3 include:</b>
</p>
<ul>
	<li>Upgraded bundled sqlite to version 3.6.23.1.</li>
	<li>Upgraded bundled PCRE to version 8.02.</li>
	<li>Added FastCGI Process Manager (FPM) SAPI.</li>
	<li>Added stream filter support to mcrypt extension.</li>
	<li>Added full_special_chars filter to ext/filter.</li>
	<li>Fixed a possible crash because of recursive GC invocation.</li>
	<li>Fixed bug #52238 (Crash when an Exception occured in iterator_to_array).</li>
	<li>Fixed bug #52041 (Memory leak when writing on uninitialized variable returned from function).</li>
	<li>Fixed bug #52060 (Memory leak when passing a closure to method_exists()).</li>
	<li>Fixed bug #52001 (Memory allocation problems after using variable variables).</li>
	<li>Fixed bug #51723 (Content-length header is limited to 32bit integer with Apache2 on Windows).</li>
	<li>Fixed bug #48930 (__COMPILER_HALT_OFFSET__ incorrect in PHP &gt;= 5.3).</li>
</ul>

<p>
For users upgrading from PHP 5.2 there is a migration guide available on
<a href="/migration53">http://php.net/migration53</a>, detailing the changes between those
releases and PHP 5.3.
</p>

<p>
 For a full list of changes in PHP 5.3.3, see the <a href="/ChangeLog-5.php#5.3.3">ChangeLog</a>.
</p>

<?php site_footer(); ?>
