<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'sites.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

site_header("A Tourist's Guide");
column_box(COLUMN_LEFT);
?>
<h3>PHP.net Sitemap</h3>
<p>
 It might also be a good idea to dig deeper into
 what PHP.net can offer you. Our <a href="/sitemap.php">sitemap</a>
 helps you find your way around the site.
</p>

<h3>More PHP related sites</h3>
<p>
 Of course there are a lot more sites connected to PHP
 somehow, which are not part of the PHP.net site family.
 Our <a href="/links.php">links page</a> offers some start
 pages you will find interesting.
</p>

<?php
column_box();
column_box(COLUMN_MAIN);
?>

<h1>PHP.net: A Tourist's Guide</h1>

<p>
 Everyone knows the <code>www.php.net</code> site. All of us went there sooner or later,
 and will keep going back there. This is the central reference point for PHP
 users, and there is a wealth of information there. Not all of it is obvious.
 Come with me, I'll show you.
</p>

<h2><a href="http://www.php.net/">www.php.net</a>: Main Website</h2>

<p>
 This is the primary web site. The front page is where major news is published:
 new PHP versions, security updates, and new projects launched. This site is
 also <a href="/mirrors.php">mirrored in dozens of countries worldwide</a>.
</p>

<p>
 This is the home of the <a href="/downloads.php">download page</a>, for
 everyone to get the latest version of the PHP source code and binaries
 for Windows. The current and next-to-current versions are available there.
 (There is also a <a href="http://museum.php.net/">PHP Museum</a>, which has
 all of the source distributions since June 1996.)
</p>
                                                                        
<p>
 The next most visited section is the <a href="/docs.php">documentation</a>.
 The documentation is translated into twelve different languages, and is
 available in <a href="/download-docs.php">a variety of different formats</a>.
 Users are able to read notes on the documentation left by other users, and
 contribute their own notes. The documentation is a real community project
 by itself!
</p>

<p>
 The <a href="/support.php">support</a> page has all the directions to a wealth
 of resources both inside and outside of PHP.net. The community has built a huge
 network of knowledge bases, PHP user groups, and training sessions where anyone
 can have his or her questions answered. Non-English-speaking users also get a
 large share of attention.
</p>

<p>
 Now, buckle up your seat belt, and stop smoking. Here are the no-light streets:
</p>

<h2>
 <a href="http://talks.php.net/">talks.php.net</a>: Conference Materials
</h2>

<p>
 This is where speakers at various PHP-related conferences keep their slides.
 It covers all sorts of topics, from the famous 'Rasmus' introduction to PHP to
 the latest 'PHP system administration', through PEAR and advanced topics. All
 those slides are available within the PHP slide application.
</p>

<h2>
 <a href="http://news.php.net/">news.php.net</a>:
 Mailing Lists Web and NNTP Interface
</h2>

<p>
 news.php.net is the web interface to the PHP mailing lists. If you're not
 subscribed to the mailing lists, but you still want to keep in touch regularly,
 this is your place. An infinite pile of fresh news and trends of PHP. You can
 also point your news reader at the NNTP server at news.php.net to follow the
 lists.
</p>

<h2>
 <a href="http://pear.php.net/">pear.php.net</a>:
 The PHP Extension and Application Repository
</h2>

<p>
 PEAR is the next revolution in PHP. This repository is bringing higher level
 programming to PHP. PEAR is a framework and distribution system for reusable
 PHP components. It eases installation by bringing an automated wizard, and
 packing the strength and experience of PHP users into a nicely organised OOP
 library.
</p>

<h2>
 <a href="http://pecl.php.net/">pecl.php.net</a>:
 The PHP Extension Community Library
</h2>

<p>
 PECL is a repository for PHP Extensions, providing a directory of all known 
 extensions and hosting facilities for downloading and development of PHP 
 extensions. <br />

 The packaging and distribution system used by PECL is shared with 
 its sister, PEAR.
</p>

<h2>
 <a href="http://pecl4win.php.net/">pecl4win.php.net</a>:
 The PECL Windows Repository
</h2>

<p>
 This site hosts a repository of PECL extensions precompiled for the Windows
 platform.
</p>

<h2><a href="http://bugs.php.net/">bugs.php.net</a>: Bug Database</h2>

<p>
 The bug database is where you can bring problems with PHP to the attention of
 developers (but don't forget to double-check that somebody else hasn't already
 reported the same problem!).
</p>

<h2><a href="http://doc.php.net/">doc.php.net</a>: Documentation collaboration</h2>

<p>
 The documentation projects website tries to gather all PHP.net hosted
 documentation teams together with tools, status reports and an RFC system.
</p>

<h2><a href="http://docs.php.net/">docs.php.net</a>: Documentation dev server</h2>

<p>
 The documentation developmental server is a PHP mirror that contains upcoming 
 releases of the PHP documentation before it's pushed out to the mirrors. 
 Documentation changes, such as layout, is tested here (with feedback requested) 
 before being made official. Documentation is built here four times a day.
</p>

<h2><a href="http://qa.php.net/">qa.php.net</a>: Quality Assurance Team</h2>

<p>
 The Quality Assurance team is one of the most important pieces of the PHP
 project, protecting users from bugs. It is gathered around the QA mailing list,
 and this site allows anyone to provide tests and experience to the release
 process.
</p>

<h2><a href="http://cvs.php.net/viewvc.cgi/">cvs.php.net</a>: CVS Repository</h2>

<p>
 The PHP project is organized with a CVS server, and this website is the web
 interface to it. There you can browse the history (and latest versions) of the
 source code for all of the PHP projects. For example, the <a
 href="http://cvs.php.net/viewvc.cgi/php-src/">php-src</a> module is the 
 repository for the source code to the latest version of PHP itself.
</p>

<h2><a href="http://lxr.php.net/">lxr.php.net</a>: Cross Reference</h2>

<p>
 Cross reference for source code, based on the "Linux Cross Reference". This is
 the ultimate tool for exploring PHP code. Any time an important macro or
 function is detected within the code, it is linked to its definition, and
 all its usage locations. This will help you build your code, and understand
 the PHP source.
</p>
                                                                       
<h2><a href="http://gtk.php.net/">gtk.php.net</a>: PHP-GTK</h2>

<p>
 This web site is the home of the PHP-GTK project, which allows PHP to be
 used to build graphical interfaces, with slick interface and highly
 interactive content. You'll find the downloads and docs here,
 and the latest news from the project.
</p>

<h2><a href="http://snaps.php.net/">snaps.php.net</a>: Daily PHP Snapshots</h2>

<p>
 This is your first stop if you're looking for cutting edge development versions
 of PHP which are generated every day from the current stable and current
 development sources.
</p>

<h2><a href="http://gcov.php.net/">gcov.php.net</a>: Test and Code Coverage analysis</h2>

<p>
 This site is dedicated to automatic PHP code coverage testing. On a regular 
 basis current CVS snapshots are being build and tested on this machine. After 
 all tests are done the results are visualized along with a code coverage 
 analysis.  
</p>

<h2><a href="http://wiki.php.net/">wiki.php.net</a>: The PHP Wiki</h2>

<p>
 Home of the official PHP wiki, this site contains information related to php.net like
 RFCs, GSOC information, and TODO files. Most every aspect of the PHP project
 has a wiki section and everyone is able to apply for wiki commit access.
</p>

<?php
column_box();

site_footer();

