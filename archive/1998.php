<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'archive/1998.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
news_archive_sidebar();
site_header("News Archive - 1998", array("cache" => true));
?>

<h1>News Archive - 1998</h1>

<p>
 Here are the most important news items we have published in 1998 on PHP.net.
</p>

<hr>

<h1>PHP 3.0.6 has been released!</h1>
<p>
 <span class="newsdate">[24-Dec-1998]</span>
 Merry Christmas! 3.0.6 is ready to go. This is mostly a maintenance release.
 Some new modules make their first apperance in this version. Support for Adobe
 PDF and FDF as well as XML and an initial Interbase module are now available.
 If you need any of these features, or if you see something in the ChangeLog
 that might apply to you, then upgrade.
</p>

<hr>

<h1>
 PHP/MySQL ... Two great things that go great together<br>
 Combination wins Database of the Year Award at Web98
</h1>
<p>
 <span class="newsdate">[22-Jun-1998]</span>
 "The substance of the Web is more and more residing in databases, and there
 are a variety of methods used to generate Web pages. This year, we selected a
 pair of "free software" tools that work together quite nicely as a platform
 for building dynamic content. The award is also a tribute to the Open Source
 initiative; both products are used, developed and supported by interlocking
 communities of people on the Net."
</p>

<hr>

<h1>PHP 3.0 Released</h1>
<p>
 <span class="newsdate">[06-Jun-1998]</span>
 PHP 3.0 is finally here! After 10 months of development PHP Version 3.0
 is ready for production environments. Coupled with the release of the
 final version of Apache-1.3.0 today, the combination provides an
 unbeatable web hosting platform suitable for both small and large web
 sites.
</p>
<p>
 PHP 3.0 is the latest evolution of the PHP/FI 2.0 language and it offers
 some dramatic enhancements. It is more than twice as fast, it uses less
 memory, it has a more consistent language implementation and a much wider
 set of expressions and language features than PHP/FI 2.0. An included
 conversion program will help you migrate your PHP 2 scripts to PHP 3. 
</p>
<p>
 <a href="http://cvs.php.net/co.php/phpweb/Attic/release-3.0.txt?sa=1&amp;login=2&amp;r=1.2">Read
 the full anouncement</a>.
</p>

<hr>

<h1>PHP Meaning Vote</h1>
<p>
 <span class="newsdate">[18-Apr-1998]</span>
 <strong>PHP: Hypertext Preprocessor</strong> was chosen as the official
 meaning of the PHP acronym with 53% of the votes. The possible options
 were PHP HTML|Hypermedia|Hypertext Preprocesor.
</p>

<hr>

<h1>New Look</h1>
<p>
 <span class="newsdate">[23-Mar-1998]</span>
 The PHP site has been given a serious facelift recently.
 The design is courtesy of Colin Viebrock at Private World
 Communications. Please let us know of any problems
 with the site by sending a message to the webmasters.
</p>

<hr>

<h1>Bug Database Live</h1>
<p>
 <span class="newsdate">[25-Jan-1998]</span>
 Report or check on bugs in the PHP 3 Bug Database.
</p>

<?php site_footer(array('elephpants' => true, 'sidebar' => $SIDEBAR_DATA));

