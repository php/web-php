<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'license/index.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA = <<<EOF
<aside>
  <h3>Contents</h3>

  <ol>
   <li><a href="#code-lic">PHP Codebase</a></li>
   <li><a href="#doc-lic">PHP Documentation</a></li>
   <li><a href="#web-lic">PHP Website</a></li>
   <li><a href="#logo-lic">PHP Logo</a></li>
   <li><a href="#faq-lic">FAQ's</a></li>
   <li><a href="#other-lic">Licensing information for related projects</a></li>
  </ol>
</aside>
EOF;

site_header("License Information", array("current" => "help"));
?>

<h1>PHP Licensing</h1>

<a name="code-lic"></a>
<h2>PHP Codebase</h2>

<ul>
 <li>
  PHP 4, PHP 5 and PHP 7 are distributed under the
  <a href="http://www.php.net/license/3_01.txt">PHP License v3.01</a>, copyright (c) the <a href="/credits.php">PHP Group</a>.
  <ul>
   <li>
    This is an <a href="http://www.opensource.org/docs/osd">Open Source license</a>, 
    certified by the Open Source Initiative.
   </li>
   <li>
    The PHP license is a BSD-style license which does not have the "copyleft" 
    restrictions associated with GPL.
   </li>
  </ul>
 </li>
 <li>
  Some files have been contributed under other (compatible) licenses and carry 
  additional requirements and copyright information.<br>
  This is indicated in the license + copyright comment block at the top of the source file.
 </li>
 <li>
  Practical Guidelines:
  <ul>
   <li><a href="/license/distrib-guidelines-code.php">Distributing PHP</a></li>
   <li><a href="/license/contrib-guidelines-code.php">Contributing to PHP</a></li>
  </ul>
 </li>
</ul>

<a name="doc-lic"></a>
<h2>PHP Documentation</h2>

<ul>
 <li>
  The PHP manual text and comments are covered by the
  <a href="http://creativecommons.org/licenses/by/3.0/legalcode">Creative Commons Attribution 3.0 License</a>,
  copyright (c) the PHP Documentation Group
 </li>
 <li><a href="http://creativecommons.org/licenses/by/3.0/">Summary</a> in human-readable form</li>
 <li>Practical Information: <a href="http://doc.php.net/tutorial/">Documentation HOWTO</a></li>
</ul>

<a name="web-lic"></a>
<h2>PHP Website</h2>

<ul>
 <li>The Website copyright can be viewed here: <a href="/copyright.php">Website Copyright</a></li>
</ul>

<a name="logo-lic"></a>
<h2>PHP Logo</h2>

<ul>
 <li>The Logo license terms can be viewed on the <a href="/download-logos.php">Logo and Icon Download page</a></li>
</ul>

<a name="faq-lic"></a>
<h2>Frequently Asked Questions</h2>

<!-- Selected FAQ points from former page on License Information [v 1.13] -->
<!-- Comments ref.old versions of PHP license prior to v3.0 have been removed -->

<h3>Use of the "PHP" name</h3>
<p>
<strong>Q.</strong> I've written a project in PHP that I'm going to release
as open source, and I'd like to call it PHPTransmogrifier. Is that
OK?
</p>

<p>
<strong>A.</strong> 
We cannot really stop you from using PHP in the name of 
your project unless you include any code from the PHP distribution, in
which case you would be violating the license. 
See Clause 4 in the <a href="http://www.php.net/license/3_01.txt">
PHP License v3.01</a>. 
<br>But we would really prefer if people would come up with their own names 
independent of the  PHP name. 
</p>

<p>
"Why?" you ask. You are only trying to contribute to the PHP
community. That may be true, but by using the PHP name you are
explicitly linking your efforts to those of the entire PHP development
community and the years of work that has gone into the PHP project.
Every time a flaw is found in one of the thousands of applications out
there that call themselves "PHP-Something" the negative karma that
generates reflects unfairly on the entire PHP project. We had nothing
to do with PHP-Nuke, for example, and every bugtraq posting on that
says "PHP" in it. Your particular project may in fact be the greatest
thing ever, but we have to be consistent in how we handle these
requests and we honestly have no way of knowing whether your project
is actually the greatest thing ever.
</p>

<p>
So, please, pick a name that stands on its own merits. If your
stuff is good, it will not take long to establish a reputation for
yourselves. Look at Zope, for example, that is a framework for Python
that doesn't have Python in the name. Smarty as well doesn't have PHP
in the name and does quite well.
</p>

<h3>Change in licensing from PHP 4 onwards</h3>
<p>
<strong>Q.</strong> Why is PHP 4 not dual-licensed under the GNU General
Public License (GPL) like PHP 3 was?
</p>

<p>
<strong>A.</strong> GPL enforces many restrictions on what can and cannot
be done with the licensed code. The PHP developers decided to
release PHP under a much more loose license (Apache-style), to help
PHP become as popular as possible.
</p>

<a name="other-lic"></a>
<h2>Licensing information for related projects</h2>

<p>
For related projects, please refer to licensing information on the Project websites:  
</p>
<ul>
  <li><a href="http://pecl.php.net/copyright.php">PECL</a></li>
  <li><a href="http://pear.php.net/copyright.php">PEAR</a></li>
  <li><a href="http://gtk.php.net/copyright.php">GTK</a></li>
</ul>

<?php site_footer(array('sidebar' => $SIDEBAR_DATA));

