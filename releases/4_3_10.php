<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_10.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.10 Release Announcement");
?>

<h1>PHP 4.3.10 Release Announcement</h1>
<p>[ <a href="/releases/4_3_10_fr.php">Version Fran&ccedil;aise</a> ]</p> 
<p>
PHP Development Team would like to announce the immediate release of <a href="/downloads.php">PHP 4.3.10</a>. This is a 
maintenance release that in addition to over 30 non-critical bug fixes addresses several very 
serious security issues. 
</p>
<p>
These include the following:
</p>
<p>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1018">CAN-2004-1018</a> - shmop_write() out of bounds memory write access.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1018">CAN-2004-1018</a> - integer overflow/underflow in pack() and unpack() functions.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1019">CAN-2004-1019</a> - possible information disclosure, double free and negative reference index array underflow in deserialization code.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1020">CAN-2004-1020</a> - addslashes() not escaping \0 correctly.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1063">CAN-2004-1063</a> - safe_mode execution directory bypass.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1064">CAN-2004-1064</a> - arbitrary file access through path truncation.<br>
<a href="http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-1065">CAN-2004-1065</a> - exif_read_data() overflow on long sectionname.<br>
magic_quotes_gpc could lead to one level directory traversal with file uploads.
</p>
<p>All Users of PHP are strongly encouraged to upgrade to this release as soon as possible.</p> 

<h2>Bugfix release</h2>

<p>
 Aside from the above mentioned issues this release includes the following important fixes:
</p>

<ul>
<li> Possible crash inside ftp_get().</li>
<li> get_current_user() crashes on Windows.</li>
<li> Possible crash in ctype_digit() on large numbers.</li>
<li> Crash when parsing <i>?getvariable[][</i>.</li>
<li> Possible crash in the curl_getinfo() function.</li>
<li> Double free when openssl_csr_new fails.</li>
<li> Crash when using unknown/unsupported session.save_handler and/or session.serialize_handler.</li>
<li> Prevent infinite recursion in url redirection.</li>
<li> Ensure that temporary files created by GD are removed.</li>
<li> Crash in fgetcsv() with negative length.</li>
<li> Improved performance of the foreach() construct.</li>
<li> Improved number handling on non-English locales.</li>
</ul>

<p>
 For a full list of changes in PHP 4.3.10, see the
 <a href="/ChangeLog-4.php#4.3.10">ChangeLog</a>.
 </p>

<?php site_footer(); ?>
