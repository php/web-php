<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/5_1_2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 5.1.2 Release Announcement");
?>

<h1>PHP 5.1.2. Release Announcement</h1>
<p>
The PHP development team is proud to announce the release of <a href="/downloads.php">PHP 5.1.2</a>.
This release combines small feature enhancements with a fair number of
bug fixes and addresses three security issues. All PHP 5 users are encouraged to
upgrade to this release.
</p>

<p>
The security issues resolved include the following:
<ul>
<li>HTTP Response Splitting has been addressed in ext/session and in the
   header() function.  Header() can no longer be used to send multiple
   response headers in a single call.
</li>
<li>Format string vulnerability in ext/mysqli.</li>
<li>Possible cross-site scripting problems in certain error conditions.</li>
</ul>
</p>

<p>
The feature enhancements include the following notables:
<ul>
<li>Hash extension was added to core and is now enabled by default. This
    extension provides support for most common hashing algorithms without
    reliance on 3rd party libraries.</li>
<li>XMLWriter was added and enabled by default.</li>
<li>New OCI8 extension that includes numerous fixes.</li>
<li>PNG compression support added to the GD extension.</li>
<li>Added --enable-gcov configure option to enable C-level code coverage.</li>
<li>getNamespaces() and getDocNamespaces() methods added to SimpleXML extension.</li>
</ul>
</p>

<p>
The release also includes over 85 bug fixes with a focus on:
<ul>
<li>Correction of the many regressions in the strtotime() function.</li>
<li>Fixes of several crashes, leaks and memory corruptions found in the 
    imap, pdo, gd, mysqli, mcrypt and soap extensions.</li>
<li>Corrected problems with the usage of SSI and virtual() in the Apache2 SAPI.</li>
<li>Build fixes for iconv and sybase_ct extensions.</li>
<li>Fixed the previously broken Sun(rise|set) functions.</li>
<li>SQLite libraries upgraded to 2.8.17 and 3.2.8
<li>Win32 binaries now include libxml2-2.6.22 and libxslt-1.1.15.</li>
</ul>
</p>

<p>
 For a full list of changes in PHP 5.1.2, see the
 <a href="/ChangeLog-5.php#5.1.2">ChangeLog</a>.
</p>

<?php site_footer(); ?>
