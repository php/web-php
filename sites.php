<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'sites.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
commonHeader("A Tourist's Guide");
?>

<h1>
 PHP.net: A Tourist's Guide<br />
 <small>originally by Damien Seguy</small>
</h1>

<p>
 Everyone knows the www.php.net site. All of us went there sooner or later,
 and will keep going back there. This is the central reference point for PHP
 users, and it has a wealth of informations there. All of it isn't that obvious.
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
 can have his questions answered. Non-English-speaking users also get a large
 share of attention.
</p>

<p>
 Now, buckle up your seat belt, and stop smoking. Here are the no-light streets:
</p>

<h2>
 <a href="http://talks.php.net/">talks.php.net</a>: Conference Materials and
 <a href="http://conf.php.net/">conf.php.net</a>: Older Conference Materials
</h3>

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

<h2><a href="http://bugs.php.net/">bugs.php.net</a>: Bug Database</h2>

<p>
 The bug database is where you can bring problems with PHP to the attention of
 developers (but don't forget to double-check that somebody else hasn't already
 reported the same problem!).
</p>

<h2><a href="http://qa.php.net/">qa.php.net</a>: Quality Assurance Team</h2>

<p>
 The Quality Assurance team is one of the most important pieces of the PHP
 project, protecting users from bugs. It is gathered around the QA mailing list,
 and this site allows anyone to provide tests and experience to the release
 process.
</p>

<h2><a href="http://chora.php.net/">cvs.php.net</a>: CVS Repository</h2>

<p>
 The PHP project is organised with a CVS server, and this website is the web
 interface to it. There you can browse the history (and latest versions) of the
 source code for all of the PHP projects. For example, the <a
 href="http://cvs.php.net/cvs.php/php4/">php4</a> module is the repository for
 the source code to the latest version of PHP itself.
</p>

<h2><a href="http://bonsai.php.net">bonsai.php.net</a>: Bonsai</h2>

<p>
 Bonsai is another window into the CVS repository that makes it easy to search
 within the sources, so you may keep track of who has done updates to files.
 This is most handy when you are working in a team on some specific section of
 the code. You may also keep an eye of evolution of implementation, and know the
 activity level of every extension.
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

<h2><a href="http://smarty.php.net/">smarty.php.net</a>: Smarty Template Engine</h2>

<p>
 Smarty is another PHP spin off: Smarty provides your basic variable
 substitution and dynamic block functionality, and also takes a step further to
 be a "smart" template engine, adding features such as configuration files,
 template functions, variable modifiers, and making all of this functionality as
 easy as possible to use for both programmers and template designers.
</p>

<h2><a href="http://snaps.php.net/">snaps.php.net</a>: Daily PHP Snapshots</h2>

<p>
 This is your first stop if you're looking for cutting edge development versions
 of PHP which are generated every day from the current stable and current
 development sources.
</p>

<?php commonFooter(); ?>
