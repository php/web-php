<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a server-side, cross-platform, HTML embedded scripting
language. If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
PHP is a project of the ' . 
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
&nbsp; ' . make_link("http://www.synacor.com/", "Synacor") . '<br>
&nbsp; ' . make_link("http://valinux.com/", "VA Linux Systems") . '<br>
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>

<h3>Contact</h3>

<p>
Please
submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>
<p>
You can contact the webmaster at ' . 
make_link('mailto:webmaster@php.net', 'webmaster@php.net') . '.
</p>
';

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP 4.1.1 Release Announcement
</h1>

<p>Due to a few bugs in PHP 4.1.0, we decided to release PHP 4.1.1.  The bugs
that were fixed are not major ones but minor ones, which could be annoying
if you get bitten by them.</p>

<p>Our recommendation is that people who already upgraded to PHP 4.1.0 do
<b>not</b> upgrade to <a href="http://www.php.net/downloads.php">PHP 4.1.1</a>,
unless they're experiencing one of the described bugs.</p>

<p><b>No</b> new features or security updates are available in this release.</p>

<p>Full list of fixes:
<ul>
<li>Fixed incompatibility with Windows .NET / IIS 6 - may improve stability
  under other versions of IIS. (Zeev)</li>
<li>Fixed bug that caused crashes or error notices on shutdown on threaded
  platforms. (Zeev)</li>
<li> Fixed several crash bugs in the xslt extension. (Markus, Derick)</li>
<li>Fixed problem with dbase not returning very large (larger than long)
  integers properly. (Vlad)</li>
<li>Fixed several bugs and memleaks in the domxml extension. (Markus)</li>
<li>Fixed bug in gmmktime() which was one hour off during standard time -
  bug #9878. Patch by bfoddy@mediaone.net. (jmoore)</li>
<li>Fixed bug in gmdate() timezone handling on Windows - bug #13885. (jmoore)</li>
<li>Fixed several crash bugs in the mcrypt extension. (Derick)</li>
<li>Made the mcrypt extension compile with the libmcrypt 2.2 series again.
  (Sterling)</li>
<li>Fixed a bug where the is_file() family of functions would in-correctly give
  an error when they were given filenames that didn't exist. (Sterling)</li>
<li>Fixed a bug in the strtotime() function where it was incorrectly recognizing
  GMT +0100 and GMT -0100. (Derick)</li>
</ul>
</p>

<?php commonFooter(); ?>
