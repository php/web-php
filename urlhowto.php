<?php
require_once 'prepend.inc';

$SIDEBAR_DATA='
<h3>URL examples</h3>
<p>
We have many kind of URL shortcuts. Here are some
examples you can try out:
<ul>
 <li><a href="http://php.net/echo">http://php.net/echo</a></li>
 <li><a href="http://php.net/it/echo">http://php.net/it/echo</a></li>
 <li><a href="http://php.net/imap">http://php.net/imap</a></li>
 <li><a href="http://php.net/downloads">http://php.net/downloads</a></li>
 <li><a href="http://php.net/searchterm">http://php.net/searchterm</a></li>
</ul>
</p>

<h3>Quick reference tips</h3>
<p>
You can find <a href="tips.php">more
quick reference tips</a> on our site.
</p>
';

commonHeader("URL Howto");

?>

<h1>URL Howto</h1>

<p>
We have found, that many of our users would like to access
the information on our site very quickly, so we decided to
implement a system, where there is even no need to write
something inside a search box, you can type in php.net
URLs to access pages.
</p>

<p>
Note, that these shortcuts are expected to work on all mirror
sites, not just at the main site. If you find that some of these
shortcuts are not working on your mirror site, please report them
as a "PHP.net Website Problem" at
<a href="http://bugs.php.net/">http://bugs.php.net/</a>.
</p>

<p>
There are currently three types of URLs you can use this way.
For the examples, we'll use the main site URL.
</p>

<h2>Page shortcuts</h2>

<p>
If you write in a php.net URL, like <tt>http://php.net/links</tt>,
first this URL is matched against the php.net pages. If there is
a page named <tt>links.php</tt>, then you'll get that page
immediately. This type of shortcut makes easy to type in a link
in an IRC conversation or mailing list message. If the script
finds no page with this name, it tries to find a manual page.
</p>

<h2>Manual shortcuts</h2>

<p>
If your URL can't be matched with a page name, a manual page
is searched for your query. This is the case for the 
<tt>http://php.net/preg_match</tt> URL. The following pages
are searched for in the manual:
<ul>
 <li>Chapter pages, like <tt>http://php.net/installation</tt></li>
 <li>Reference pages, like <tt>http://php.net/imap</tt></li>
 <li>Function pages, like <tt>http://php.net/join</tt></li>
 <li>Class pages, like <tt>http://php.net/dir</tt></li>
 <li>Feature pages, like <tt>http://php.net/safe_mode</tt></li>
 <li>Control structure pages, like <tt>http://php.net/while</tt></li>
 <li>Other langauge pages, like <tt>http://php.net/oop</tt></li>
</ul>
</p>

<p>
This kind of URL will bring up the manual page in the mirror's
default manual language. This is English for the main site,
but can be a wide range of languages, depending of the mirror's
setup. You can see the list of languages used by mirrors at
<a href="http://php.net/mirrors">http://php.net/mirrors</a>.
This way if you would like to get an Italian manual page for
your queries, you can type <tt>http://it.php.net/echo</tt>.
</p>

<p>
There is another method though for accessing the manual page
in your preferred langauge. You can embed the language in the
URL before the manual search term. <tt>http://php.net/hu/echo</tt>
will bring up the Hungarian manual page for echo for example.
</p>

<h2>Search shortcuts</h2>

<p>
At last, if there is no PHP page, and there is no manual
page matching your query, a search is issued on the site with
the query you typed into the URL. An example of this kind
of URL is <tt>http://php.net/search_for_this</tt>.
</p>

<?php commonFooter(); ?>
