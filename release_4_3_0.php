<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP 4.3.0 Release Announcement
</h1>


<p>After a long and arduous 8 months of development and testing, PHP 4.3.0 is
<a href="/downloads.php">out</a>! With regard to scope, time, and effort, this
is the largest 4.x release of PHP, and it further elevates PHP's standing as a
serious contender in the general purpose scripting language arena.<br />

<h2>Command line interface</h2>

<p>
This version finalizes the separate command line interface (CLI) that can be
used for developing shell and desktop applications (with
<a href="http://gtk.php.net/">PHP-GTK</a>). The CLI is always built, but
installed automatically only if CGI version is disabled via --disable-cgi
switch during configuration. Alternatively, one can use <b>make install-cli</b>
target. On Windows CLI can be found in <b>cli</b> folder.</p>
<p>
CLI has a number of differences compared to other server APIs. More information
can be found here:
<ul>
 <li><a href="/manual/en/features.commandline.php">PHP Manual: Using PHP from the command line</a></li>
</ul>
</p>

<h2>Streams</h2>

<p>
A very important "under the hood" feature is the streams API. It introduces a
unified approach to the handling of files, pipes, sockets, and other I/O
resources in the PHP core and extensions.</p>
<p>
What this means for users is that any I/O function that works with streams
(and that is almost all of them) can access built-in protocols, such as
HTTP/HTTPS and FTP/FTPS, as well as custom protocols registered from PHP
scripts. For more information please see:
<ul>
 <li><a href="/manual/en/wrappers.php">List of Supported Protocols/Wrappers</a></li>
 <li><a href="/manual/en/streams.php">Streams API</a></li>
</ul>
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
  <li><b>GD library is now bundled with the distribution and it is recommended
      to always use the bundled version</b></li>
  <li>vpopmail and cybermut extensions are moved to PECL</li>
  <li>several deprecated extensions (aspell, ccvs, cybercash, icap)
	  and SAPIs (fastcgi, fhttpd) are removed</li>
  <li>speed improvements in a variety of string functions</li>
  <li>Apache2 filter is improved, but is still
      considered experimental (use with PHP in prefork and not worker (thread)
	  model since many extensions based on external libraries are not thread
	  safe)</li>
  <li>various security fixes (imap, mysql, mcrypt, file upload, gd, etc)</li>
  <li>new SAPI for embedding PHP in other applications (experimental)</li>
  <li>much better test suite</li>
  <li>significant improvements in dba, gd, pcntl, sybase, and xslt extensions</li>
  <li>debug_backtrace() should help with debugging</li>
  <li>error messages now contain URLs linking to pages describing the error or
      function in question</li>
  <li>Zend Engine has some fixes and minor performance enhancements</li>
  <li>and <b>TONS</b> of other fixes, updates, new functions, etc</li>
</ul>

<p>
For the full list of changes in PHP 4.3.0, see the
<a href="/ChangeLog-4.php">ChangeLog</a> file.
</p>

<?php commonFooter(); ?>
