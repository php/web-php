<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_3_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.3.0 Release Announcement");
?>

<h1>PHP 4.3.0 Release Announcement</h1>

<p>[ <a href="/releases/4_3_0_fr.php">Version Fran&ccedil;aise</a> ]</p>

<p>
 After a long and arduous 8 months of development and testing, PHP 4.3.0 is
 <a href="/downloads.php">out</a>! With regard to scope, time, and effort, this
 is the largest 4.x release of PHP, and it further elevates PHP's standing as a
 serious contender in the general purpose scripting language arena.
</p>

<h2>Command line interface</h2>

<p>
 This version finalizes the separate command line interface (CLI) that can be
 used for developing shell and desktop applications (with
 <a href="http://gtk.php.net/">PHP-GTK</a>). The CLI is always built, but
 installed automatically only if CGI version is disabled via --disable-cgi
 switch during configuration. Alternatively, one can use <strong>make
 install-cli</strong> target. On Windows CLI can be found in
 <strong>cli</strong> folder.
</p>

<p>
 CLI has a number of differences compared to other server APIs. More information
 can be found in the PHP Manual:
 <a href="/features.commandline">Using PHP from the command line</a>
</p>

<h2>Streams</h2>

<p>
 A very important "under the hood" feature is the streams API. It introduces a
 unified approach to the handling of files, pipes, sockets, and other I/O
 resources in the PHP core and extensions.
</p>
<p>
 What this means for users is that any I/O function that works with streams
 (and that is almost all of them) can access built-in protocols, such as
 HTTP/HTTPS and FTP/FTPS, as well as custom protocols registered from PHP
 scripts. For more information please see: <a href="/wrappers">List
 of Supported Protocols/Wrappers</a>
</p>

<h2>New build system</h2>

<p>
 This iteration of the build system, among other things, replaces the slow
 recursive make with one global Makefile and eases the integration of proper
 dependencies. Automake is only needed for its aclocal tool. The build process is
 now more portable and less resource-consuming.
</p>

<h2>Improvements</h2>

<p>PHP 4.3.0 has many improvements and enhancements:</p>

<ul>
 <li>
  <strong>
   GD library is now bundled with the distribution and it is recommended
   to always use the bundled version
  </strong>
 </li>
 <li>vpopmail and cybermut extensions are moved to PECL</li>
 <li>
  several deprecated extensions (aspell, ccvs, cybercash, icap)
  and SAPIs (fastcgi, fhttpd) are removed
 </li>
 <li>speed improvements in a variety of string functions</li>
 <li>
  Apache2 filter is improved, but is still considered experimental
  (use with PHP in prefork and not worker (thread) model since many
  extensions based on external libraries are not thread safe)
 </li>
 <li>various security fixes (imap, mysql, mcrypt, file upload, gd, etc)</li>
 <li>new SAPI for embedding PHP in other applications (experimental)</li>
 <li>much better test suite</li>
 <li>significant improvements in dba, gd, pcntl, sybase, and xslt extensions</li>
 <li>debug_backtrace() should help with debugging</li>
 <li>
  error messages now contain URLs linking to pages describing the error or
  function in question
 </li>
 <li>Zend Engine has some fixes and minor performance enhancements</li>
 <li>and <strong>TONS</strong> of other fixes, updates, new functions, etc</li>
</ul>

<p>
 For the full list of changes in PHP 4.3.0, see the
 <a href="/ChangeLog-4.php#4.3.0">ChangeLog</a> file.
</p>

<?php site_footer(); ?>
