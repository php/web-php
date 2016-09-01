<?php
$_SERVER['BASE_PAGE'] = 'sites.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("A Tourist's Guide", array("current" => "help"));
?>

<h1 class="content-header">PHP.net: A Tourist's Guide</h1>
<p class="content-box">
 Everyone knows the <code>php.net</code> site. All of us went there sooner or later,
 and will keep going back there. This is the central reference point for PHP
 users, and there is a wealth of information there. Not all of it is obvious.
 Come with me, I'll show you.
</p>

<h2 id="www" class="content-header"><a href="http://php.net/">php.net</a>: Main Website</h2>

<div class="content-box">
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
</div>

<h2 id="talks" class="content-header">
 <a href="http://talks.php.net/">talks.php.net</a>: Conference Materials
</h2>

<p class="content-box">
 This is where speakers at various PHP-related conferences keep their slides.
 It covers all sorts of topics, from the famous 'Rasmus' introduction to PHP to
 the latest 'PHP system administration', through PEAR and advanced topics. All
 those slides are available within the PHP slide application.
</p>

<h2 id="news" class="content-header">
 <a href="http://news.php.net/">news.php.net</a>:
 Mailing Lists Web and NNTP Interface
</h2>

<p class="content-box">
 news.php.net is the web interface to the PHP mailing lists. If you're not
 subscribed to the mailing lists, but you still want to keep in touch regularly,
 this is your place. An infinite pile of fresh news and trends of PHP. You can
 also point your news reader at the NNTP server at news.php.net to follow the
 lists.
</p>

<h2 id="pear" class="content-header">
 <a href="http://pear.php.net/">pear.php.net</a>:
 The PHP Extension and Application Repository
</h2>

<p class="content-box">
 PEAR is the next revolution in PHP. This repository is bringing higher level
 programming to PHP. PEAR is a framework and distribution system for reusable
 PHP components. It eases installation by bringing an automated wizard, and
 packing the strength and experience of PHP users into a nicely organised OOP
 library.
</p>

<h2 id="pecl" class="content-header">
 <a href="http://pecl.php.net/">pecl.php.net</a>:
 The PHP Extension Community Library
</h2>

<p class="content-box">
 PECL is a repository for PHP Extensions, providing a directory of all known 
 extensions and hosting facilities for downloading and development of PHP 
 extensions. <br>

 The packaging and distribution system used by PECL is shared with 
 its sister, PEAR.
</p>

<h2 id="bugs" class="content-header"><a href="https://bugs.php.net/">bugs.php.net</a>: Bug Database</h2>

<p class="content-box">
 The bug database is where you can bring problems with PHP to the attention of
 developers (but don't forget to double-check that somebody else hasn't already
 reported the same problem!).
</p>

<h2 id="doc" class="content-header"><a href="http://doc.php.net/">doc.php.net</a>: Documentation Tools</h2>

<p class="content-box">
 This page provides set of useful tools for PHP Manual translators
 and contributors.
</p>

<h2 id="edit" class="content-header"><a href="https://edit.php.net/">edit.php.net</a>: PhD Online Editor</h2>

<p class="content-box">
 PhD O.E. is an online documentation editor. Its a great tool for users that are looking for a way to get into
 contributing to PHP.net. Anonymous users can submit patches through the editor, while karma holders can approve
 and commit changes directly from the editor.
</p>

<h2 id="docs" class="content-header"><a href="http://docs.php.net/">docs.php.net</a>: Documentation dev server</h2>

<p class="content-box">
 The documentation developmental server is a PHP mirror that contains upcoming 
 releases of the PHP documentation before it's pushed out to the mirrors. 
 Documentation changes, such as layout, is tested here (with feedback requested) 
 before being made official. Documentation is built here four times a day.
</p>

<h2 id="qa" class="content-header"><a href="http://qa.php.net/">qa.php.net</a>: Quality Assurance Team</h2>

<p class="content-box">
 The Quality Assurance team is one of the most important pieces of the PHP
 project, protecting users from bugs. It is gathered around the QA mailing list,
 and this site allows anyone to provide tests and experience to the release
 process.
</p>

<h2 id="git" class="content-header"><a href="http://git.php.net/">git.php.net</a>: Git Repository</h2>

<div class="content-box">
<p>
 The PHP project is organized with a Git server, and this website is the web
 interface to it. There you can browse the history (and latest versions) of the
 source code for all of the PHP projects. For example, the
 <a href="http://git.php.net/?p=php-src.git;a=summary">php-src</a> module is
 the repository for the source code to the latest version of PHP itself.
 Checking out the source code can be done <a href="git.php">anonymously</a>.
</p>
<p>
 The Git repository is also mirrored on
 <a href="https://github.com/php/php-src">GitHub</a>, for those who would
 prefer to use GitHub's interface.
</p>
<p>
 Using <a href="http://lxr.php.net/">OpenGrok</a> is another option to view the
 source code, and it offers additional features like search and cross referencing.
</p>
</div>

<h2 id="svn" class="content-header"><a href="http://svn.php.net/">svn.php.net</a>: Archived SVN Repository</h2>

<p class="content-box">
 The PHP project used to be organized under the SVN revision control system, but
 migrated to <a href="http://git.php.net/">Git</a> (see above) in March 2012.
 The old SVN repository is archived here for posterity, however it's still used for
 i.e. documentation files.
</p>

<h2 id="cvs" class="content-header"><a href="http://cvsold.php.net/">cvsold.php.net</a>: Archived CVS Repository</h2>

<p class="content-box">
 The PHP project used to be organized under the CVS revision control system, but
 migrated to <a href="http://svn.php.net/">Subversion</a> (see above) in July of 2009.
 The old CVS repository is archived here for posterity. It was formerly named
 cvs.php.net, but that now redirects to the SVN repository. This is not available
 via HTTP.
</p>

<h2 id="lxr" class="content-header"><a href="http://lxr.php.net/">lxr.php.net</a>: Cross Reference</h2>

<div  class="content-box">
<p>
 <a href="http://www.opensolaris.org/os/project/opengrok/">OpenGrok</a> allows
 search and viewing of the PHP source code in an intelligent manner. Several branches
 and sub-projects are listed.
 Any time an important macro or function is detected within the code, it is linked
 to its definition, and all its usage locations. This will help you build your code
 and understand the PHP source.
</p>
<p>
 The name "lxr" exists as it was once based on the "Linux Cross Reference", but
 changed over to OpenGrok sometime in 2010.
</p>
</div>
                                                                       
<h2 id="gtk" class="content-header"><a href="http://gtk.php.net/">gtk.php.net</a>: PHP-GTK</h2>

<p class="content-box">
 This web site is the home of the PHP-GTK project, which allows PHP to be
 used to build graphical interfaces, with slick interface and highly
 interactive content. You'll find the downloads and docs here,
 and the latest news from the project.
</p>

<h2 id="gcov" class="content-header"><a href="http://gcov.php.net/">gcov.php.net</a>: Test and Code Coverage analysis</h2>

<p class="content-box">
 This site is dedicated to automatic PHP code coverage testing. On a regular 
 basis current Git snapshots are being build and tested on this machine. After 
 all tests are done the results are visualized along with a code coverage 
 analysis.  
</p>

<h2 id="wiki" class="content-header"><a href="https://wiki.php.net/">wiki.php.net</a>: The PHP Wiki</h2>

<p class="content-box">
 Home of the official PHP wiki, this site contains information related to php.net like
 RFCs, GSOC information, and TODO files. Most every aspect of the PHP project
 has a wiki section and everyone is able to apply for wiki commit access.
</p>

<h2 id="people" class="content-header"><a href="http://people.php.net/">people.php.net</a>: The PHP Developers Profiles</h2>

<p class="content-box">
 A list of the developers behind PHP along with quick profiles for each of them.
</p>

<?php
$SIDEBAR = <<< SIDEBAR_DATA

<p class='panel'><a href="#www">Main Website</a></p>
<p class='panel'><a href="#talks">Conference Materials</a></p>
<p class='panel'><a href="#news">Mailing Lists Web and NNTP Interface</a></p>
<p class='panel'><a href="#pear">The PHP Extension and Application Repository</a></p>
<p class='panel'><a href="#pecl">The PHP Extension Community Library</a></p>
<p class='panel'><a href="#bugs">Bug Database</a></p>
<p class='panel'><a href="#doc">Documentation collaboration</a></p>
<p class='panel'><a href="#docs">Documentation dev server</a></p>
<p class='panel'><a href="#qa">Quality Assurance Team</a></p>
<p class='panel'><a href="#git">Git Repository</a></p>
<p class='panel'><a href="#svn">Archived SVN Repository</a></p>
<p class='panel'><a href="#cvs">Archived CVS Repository</a></p>
<p class='panel'><a href="#lxr">Cross Reference</a></p>
<p class='panel'><a href="#gtk">PHP-GTK</a></p>
<p class='panel'><a href="#gcov">Test and Code Coverage analysis</a></p>
<p class='panel'><a href="#wiki">The PHP Wiki</a></h2>
<p class='panel'><a href="#people">The PHP Developers Profiles</a></h2>

SIDEBAR_DATA;

// Print the common footer.
site_footer(
    array(
        'sidebar' => $SIDEBAR
    )
);

