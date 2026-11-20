<?php
$_SERVER['BASE_PAGE'] = 'sites.php';
require_once __DIR__ . '/../include/prepend.inc';
site_header("A Tourist's Guide", ["current" => "help"]);
?>

<h1 class="content-header">PHP.net: A Tourist's Guide</h1>
<p class="content-box">
 Everyone knows the <code>www.php.net</code> site. All of us went there sooner or later,
 and will keep going back there. This is the central reference point for PHP
 users, and there is a wealth of information there. Not all of it is obvious.
 Come with me, I'll show you.
</p>

<h2 id="www" class="content-header"><a href="https://www.php.net/">php.net</a>: Main Website</h2>

<div class="content-box">
<p>
 This is the primary web site. The front page is where major news is published:
 new PHP versions, security updates, and new projects launched.
</p>

<p>
 This is the home of the <a href="/downloads.php">download page</a>, for
 everyone to get the latest version of the PHP source code and binaries
 for Windows. The current and next-to-current versions are available there.
 (There is also a <a href="https://museum.php.net/">PHP Museum</a>, which has
 all of the source distributions since June 1996).
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
 <a href="https://news-web.php.net/">news-web.php.net</a>:
 Mailing Lists Web and NNTP Interface
</h2>

<p class="content-box">
 news-web.php.net is the web interface to the PHP mailing lists. If you're not
 subscribed to the mailing lists, but you still want to keep in touch regularly,
 this is your place. An infinite pile of fresh news and trends of PHP. You can
 also point your news reader at the NNTP server at <a href="news://news.php.net">news server</a> to follow the
 lists.
</p>

<h2 id="packagist" class="content-header">
 <a href="https://packagist.org/">packagist.org</a>: The PHP Package Repository
</h2>

<p class="content-box">
 This repository is bringing higher level programming to PHP. Packagist is a
 distribution system for reusable PHP code and packages. It eases installation
 by utilising a command line tool, <a
 href="https://getcomposer.org">Composer</a> to bring the strength and
 experience of PHP users into a wealth of installable packages.
</p>

<p class="content-box">
 In addition, Packagist also contains a repository for PHP Extensions. These
 can be installed with a similar tool,
 <a href="https://php.github.io/pie/#docs/index">PIE</a>.
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
</div>

<h2 id="wiki" class="content-header"><a href="https://wiki.php.net/">wiki.php.net</a>: The PHP Wiki</h2>

<p class="content-box">
 Home of the official PHP wiki, this site contains information related to php.net like
 RFCs, GSOC information, and TODO files. Most every aspect of the PHP project
 has a wiki section and everyone is able to apply for wiki commit access.
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
<p class='panel'><a href="#packagist">PHP Package Repository</a></p>
<p class='panel'><a href="#bugs">Bug Database</a></p>
<p class='panel'><a href="#doc">Documentation collaboration</a></p>
<p class='panel'><a href="#git">Git Repository</a></p>
<p class='panel'><a href="#wiki">The PHP Wiki</a></h2>
<p class='panel'><a href="#people">The PHP Developers Profiles</a></h2>

SIDEBAR_DATA;

// Print the common footer.
site_footer([
    'sidebar' => $SIDEBAR,
]);
