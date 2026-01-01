<?php
$_SERVER['BASE_PAGE'] = 'sites.php';
include_once __DIR__ . '/include/prepend.inc';
site_header("A Tourist's Guide", ["current" => "help"]);
?>

<h1 class="content-header">PHP.net: A Tourist's Guide</h1>
<p class="content-box">
 Everyone knows the <code>php.net</code> site. All of us went there sooner or later,
 and will keep going back there. This is the central reference point for PHP
 users, and there is a wealth of information there. Not all of it is obvious.
 Come with me, I'll show you.
</p>

<h2 id="www" class="content-header"><a href="https://www.php.net/">php.net</a>: Main Website</h2>

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
 (There is also a <a href="https://museum.php.net/">PHP Museum</a>, which has
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
 <a href="https://talks.php.net/">talks.php.net</a>: Conference Materials
</h2>

<p class="content-box">
 This is where speakers at various PHP-related conferences keep their slides.
 It covers all sorts of topics, from the famous 'Rasmus' introduction to PHP to
 the latest 'PHP system administration', through PEAR and advanced topics. All
 those slides are available within the PHP slide application.
</p>

<h2 id="news" class="content-header">
 <a href="https://news.php.net/">news.php.net</a>:
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
 <a href="https://pear.php.net/">pear.php.net</a>:
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
 <a href="https://pecl.php.net/">pecl.php.net</a>:
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

<h2 id="doc" class="content-header"><a href="https://doc.php.net/">doc.php.net</a>: Documentation Tools</h2>

<p class="content-box">
 This page provides set of useful tools for PHP Manual translators
 and contributors.
</p>

<h2 id="git" class="content-header"><a href="https://github.com/php/">github.com/php/</a>: Git Repository</h2>

<div class="content-box">
<p>
 The PHP project is organized with a Git server, and this website is the web
 interface to it. There you can browse the history (and latest versions) of the
 source code for all of the PHP projects. For example, the
 <a href="https://github.com/php/php-src">php-src</a> module is
 the repository for the source code to the latest version of PHP itself.
 Checking out the source code can be done <a href="git.php">anonymously</a>.
</p>
<p>
 Using <a href="https://heap.space/">OpenGrok</a> is another option to view the
 source code, and it offers additional features like search and cross referencing.
</p>
</div>

<h2 id="wiki" class="content-header"><a href="https://wiki.php.net/">wiki.php.net</a>: The PHP Wiki</h2>

<p class="content-box">
 Home of the official PHP wiki, this site contains information related to php.net like
 RFCs, GSOC information, and TODO files. Most every aspect of the PHP project
 has a wiki section and everyone is able to apply for wiki commit access.
</p>

<h2 id="windows" class="content-header"><a href="https://windows.php.net/">windows.php.net</a>: PHP for Windows</h2>

<p class="content-box">
 This site is dedicated to supporting PHP on Microsoft Windows.
 It also supports ports of PHP extensions or features as well as providing special builds for the various Windows architectures.
</p>

<h2 id="people" class="content-header"><a href="https://people.php.net/">people.php.net</a>: The PHP Developers Profiles</h2>

<p class="content-box">
 A list of the developers behind PHP along with quick profiles for each of them.
</p>

<?php

$SIDEBAR = <<<SIDEBAR_DATA

<p class='panel'><a href="#www">Main Website</a></p>
<p class='panel'><a href="#talks">Conference Materials</a></p>
<p class='panel'><a href="#news">Mailing Lists Web and NNTP Interface</a></p>
<p class='panel'><a href="#pear">The PHP Extension and Application Repository</a></p>
<p class='panel'><a href="#pecl">The PHP Extension Community Library</a></p>
<p class='panel'><a href="#bugs">Bug Database</a></p>
<p class='panel'><a href="#doc">Documentation collaboration</a></p>
<p class='panel'><a href="#git">Git Repository</a></p>
<p class='panel'><a href="#wiki">The PHP Wiki</a></h2>
<p class='panel'><a href="#windows">PHP for Windows</a></h2>
<p class='panel'><a href="#people">The PHP Developers Profiles</a></h2>

SIDEBAR_DATA;

// Print the common footer.
site_footer([
    'sidebar' => $SIDEBAR,
]);
