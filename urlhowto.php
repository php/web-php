<?php
// $Id: urlhowto.php 283997 2009-07-13 08:14:46Z gwynne $
$curr = "help";
require "./header.php";

function a($href) {
    global $MYSITE;
	echo '<a href="' . $MYSITE . $href . '">' . $MYSITE . $href . '</a>';
}

?>
<aside>
<h3>URL examples</h3>
<p>
 We have many kind of URL shortcuts. Here are some
 examples you can try out:
</p>
<ul class="simple">
 <li><a href="'.$MYSITE.'echo">/echo</a></li>
 <li><a href="'.$MYSITE.'it/echo">/it/echo</a></li>
 <li><a href="'.$MYSITE.'imap">/imap</a></li>
 <li><a href="'.$MYSITE.'downloads">/downloads</a></li>
 <li><a href="'.$MYSITE.'searchterm">/searchterm</a></li>
</ul>

<h3>Quick reference tips</h3>
<p>
 You can find <a href="/tips.php">more
 quick reference tips</a> on our site.
</p>

<h3>My PHP.net</h3>
<p>
 URL shortcut behaviour is greatly influenced by
 your <a href="/my.php">language preferences</a>
 detected and set.
</p>
</aside>


<h1>Navigation tips&tricks</h1>

<p>
 When using the PHP.net website, there is even no need to get to
 a search box to access the content you would like to see quickly.
 You can use short PHP.net URLs to access pages directly.
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
</p>

<h2>Page shortcuts</h2>

<p>
 If you write in a PHP.net URL, like <tt><?php echo $MYSITE; ?>links</tt>,
 first this URL is matched against the PHP.net pages. If there is
 a page named <tt>links.php</tt>, then you'll get that page
 immediately. This type of shortcut makes easy to type in a link
 in an IRC conversation or mailing list message. If the script
 finds no page with this name, it tries to find a manual page.
</p>

<h2>Manual shortcuts</h2>

<p>
 If your URL can't be matched with a page name, a manual page
 is searched for your query. This is the case for the 
 <tt><?php echo $MYSITE; ?>preg_match</tt> URL. The following pages
 are searched for in the manual:</p>
<ul>
 <li>Chapter pages, like <tt><?php echo $MYSITE; ?>installation</tt></li>
 <li>Reference pages, like <tt><?php echo $MYSITE; ?>imap</tt></li>
 <li>Function pages, like <tt><?php echo $MYSITE; ?>join</tt></li>
 <li>Class pages, like <tt><?php echo $MYSITE; ?>dir</tt></li>
 <li>Feature pages, like <tt><?php echo $MYSITE; ?>safe_mode</tt></li>
 <li>Control structure pages, like <tt><?php echo $MYSITE; ?>while</tt></li>
 <li>Other language pages, like <tt><?php echo $MYSITE; ?>oop</tt></li>
</ul>
<p>
 Since there are several manual pages that could potentionally match the query
 (extension, class, function name..) you are encouraged to use their prefix/suffix:
</p>
<ul>
 <li>Extension <abbr title="Table of Contents">TOC</abbr>:
  <tt><?php echo $MYSITE ?>book.extname</tt>
  (ex: <?php a("book.dom")?>).
 </li>
 <li>Extension intro pages:
  <tt><?php echo $MYSITE ?>intro.extname</tt>
  (ex: <?php a("intro.array") ?>).
 </li>
 <li>Extension setup <abbr title="Table of Contents">TOC</abbr>:
  <tt><?php echo $MYSITE ?>extname.setup</tt>
  (ex: <?php a("intl.setup") ?>).
 </li>
 <li>Extension install chapter:
  <tt><?php echo $MYSITE ?>extname.installation</tt>
  (ex: <?php a("apc.installation") ?>).
 </li>
 <li>Extension configuration:
  <tt><?php echo $MYSITE ?>extname.configuration</tt>
  (ex: <?php a("session.configuration") ?>).
 </li>
 <li>Extension resources:
  <tt><?php echo $MYSITE ?>extname.resources</tt>
  (ex: <?php a("mysql.resources") ?>).
 </li>
 <li>Extension constants:
  <tt><?php echo $MYSITE ?>extname.constants</tt>
  (ex: <?php a("image.constants") ?>).
 </li>
 <li>Class synopsis:
  <tt><?php echo $MYSITE ?>class.classname</tt>
  (ex: <?php a("class.xmlreader") ?>).
 </li>
 <li>Class method:
  <tt><?php echo $MYSITE ?>classname.methodname</tt>
  (ex: <?php a("pdo.query") ?>).
 </li>
 <li>Functions:
  <tt><?php echo $MYSITE ?>function.functionname</tt>
  (ex: <?php a("function.strpos") ?>).
 </li>
</ul>

<p>
 This kind of URL will bring up the manual page in 
 <a href="/my.php">your preferred language</a>. You can
 always override this setting by explicitly providing
 the language you want to get to. You can embed the language
 in the URL before the manual search term.
 <tt><?php echo $MYSITE; ?>hu/sort</tt> will bring up
 the Hungarian manual page for sort() for example.
</p>

<h2>Search shortcuts</h2>

<p>
 At last, if there is no PHP page, and there is no manual
 page matching your query, a search is issued on the site with
 the query you typed into the URL. An example of this kind
 of URL is <tt><?php echo $MYSITE; ?>search_for_this</tt>.
 The exact behaviour of this search is affected by
 <a href="/my.php">your own My PHP.net settings</a>.
</p>

<h2>Even smarter tricks</h2>

<p>
 We also have shortcut aliases to access some resources more quickly,
 and with a nice URL. Aliases are translated to their relevant shortcuts
 before the first step (PHP page search) mentioned above. Some examples
 of shortcut aliases: <tt><?php echo $MYSITE; ?>whatisphp</tt>,
 <tt><?php echo $MYSITE; ?>php4news</tt>. The latter is an external page
 alias, as it points to a file on the SVN server, containing information
 about changes in PHP. There are also some convenient aliases, like
 <tt><?php echo $MYSITE; ?>de/phpversion</tt> which displays the German
 manual page for the phpversion() function.
</p>

<h1>Get it on your site</h1>

<p>
 What enables PHP.net to have this feature is a combination of some
 ErrorDocument Apache settings, redirecting the browser to another page
 in case of an "Error 401/3/4" and a little search script that looks up
 page names or functions names in the manual corresponding to what
 you searched for in <tt><?php echo $MYSITE; ?>search_for_this</tt>.
 We also have a general language selection method.
</p>

<p>
 Everything behind this feature is available here:
</p>
<ul>
 <li><a href="/mirroring.php">Mirroring instructions</a> (see the three ErrorDocument settings)</li>
 <li><a href="/source.php?url=/include/langchooser.inc">include/langchooser.inc</a></li>
 <li><a href="/source.php?url=/error.php">error.php</a></li>
 <li><a href="/source.php?url=/include/manual-lookup.inc">include/manual-lookup.inc</a></li>
 <li><a href="/source.php?url=/search.php">search.php</a></li>
</ul>

<?php
require "footer.php";

