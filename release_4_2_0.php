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
&nbsp; ' . make_link("http://vasoftware.com/", "VA Software Corporation") . '<br>
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
PHP 4.2.0 Release Announcement
</h1>

<p>After an ordered QA process, PHP 4.2.0 is <a href="http://www.php.net/downloads.php">out</a>!</p>

<h2>Form variables</h2>

<p>PHP 4.2.0 has some big changes regarding the use of form variables. As
 of PHP 4.2.0 the register globals configuration setting defaults to <b>off</b>.
 This means that for instance the following GET request "example.com/example.php?foo=bar"
 does <b>NOT</b> make the variable $foo available in your script. You can do
 two things to use the variable:</p>
<ol>
 <li>Access the form variable with $_GET['foo']</li>
 <li>Turn register_globals on in php.ini, but visit the resources
  below first to give you a nice insight in why register_globals is bad.</li>
</ol>
<p>The following resources explain what the register_globals php.ini option
 does and which problems may arise using it:</p>
<ul>
 <li><?php echo make_link ("release_4_1_0.php", "The PHP 4.1.0 release announcement"); ?></li>
 <li><?php echo make_link ("http://www.zend.com/zend/art/art-oertli.php", "Thomas' article on secure programming"); ?></li>
 <li><?php echo make_link ("/manual/en/html/configuration.html#ini.register-globals", "The Manual entry"); ?></li>
</ul>

<h2>Compability</h2>

<p>The Apache group released their first General Available version of Apache 2.
 PHP 4.2.0 will have <b>EXPERIMENTAL</b> support for this version. You can
 build a DSO module for Apache 2 with --with-apxs2. We do <b>not</b> recommend
 that you use this in a production environment.
</p>
<p>PHP 4.2.0 still lacks certain key features on Mac OS X and
 Darwin, and isn't officially supported by the PHP Group on
 these platforms. Specifically, building PHP as a dynamically
 loaded Apache module isn't supported at this time. PHP 4.3.0,
 due to be released in August, 2002, will be the first PHP
 release to officially support Mac OS X. It, along with future
 Mac OS X and Apache releases, will enable full feature parity
 with other PHP platforms.</p>

<h2>Improvements</h2>
<p>PHP 4.2.0 includes several other improvements:</p>
<ul>
 <li>Register globals is <b>off!</b> by default</li>
 <li>Overhaul of the sockets extension</li>
 <li>Highly improved performance with file uploads</li>
 <li>The satellite and mailparse extensions were moved to PECL and are not longer 
  bundled with the official PHP release.</li>
 <li>The posix extension has been cleaned up.</li>
 <li>iconv handling has been improved</li>
 <li>Output buffering support, which was introduced in PHP 4.1.0 has
  been stabilized.</li>
 <li>Improved performance and stability of the domxml extension.</li>
 <li>New multibyte regular expression support</li>
 <li><b>LOTS</b> of fixes and new functions</li>
</ul>


<?php commonFooter(); ?>
