<?
require("shared.inc");
commonHeader("Generating a gdb backtrace");
?>


<h3>Noticing PHP crashes</h3>

There's no absolute way to know that PHP is crashing, but there may be signs.  Typically,
if you access a page that is always supposed to generate output (has a leading HTML
block, for example), and suddenly get "Document contains no data" from netscape, it
may mean that PHP crashes somewhere along the execution of the script.  Another way
to tell that PHP is crashing is by looking at the Apache error logs, and looking for
SEGV (Apache 1.2) or Segmentation Fault (Apache 1.3).

<h3>Important!</h3>
To get a backtrace with correct information you must have PHP configured with --enable-debug !!

<h3>If you don't have a core file yet:</h3>

<ul>
<li>Remove any limits you may have on core dump size from your shell:
	<ul>
	<li>tcsh:  unlimit coredumpsize
	<li>bash/sh:  ulimit -c unlimited
	</ul>
<li>Ensure that the directory in which you're running PHP, or the PHP-enabled httpd, has
write permissions for the user who's running PHP.
<li>Cause PHP to crash:
	<ul>
	<li>PHP CGI:  Simply run php with the script that crashes it
	<li>PHP Apache Module:  Run httpd -X, and access the script that crashes PHP
	</ul>
</ul>

<h3>Once you have the core file:</h3>

<ul>
<li>Run gdb with the path to the PHP or PHP-enabled httpd binary, and path to the core file, for example:
	<ul>
	<li><code>gdb /usr/local/apache/sbin/httpd /usr/local/apache/sbin/core</code>
	</ul>
<li>At the gdb prompt, run:
	<ul>
	<li><code>(gdb) bt</code>
	</ul>
</ul>

<h3>If you can't get a core file:</h3>
<ul>
<li>Run httpd -X under gdb with something like:
	<ul>
	<li><code>gdb /usr/local/apache/sbin/httpd</code>
	<li>(gdb) run -X
	</ul>
<li>Then use your web browser and access your server to force the crash.  You should see a gdb
prompt appear and some message indicating that there was a crash.  At this gdb prompt, type:
	<ul>
	<li><code>(gdb) bt</code>
	</ul>
</ul>

This should generate a backtrace, that you should submit in the bug report, along with any other
details you can give us about your setup, and offending script.

<? commonFooter(); ?>
