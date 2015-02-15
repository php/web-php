<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'urlhowto.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';

$SIDEBAR_DATA='
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

<h3>My PHP.net</h3>
<p>
 URL shortcut behaviour is greatly influenced by
 your <a href="/my.php">language preferences</a>
 detected and set.
</p>
';

site_header("URL Howto", array("current" => "help"));
function a($href) {
    global $MYSITE;
	echo '<a href="' . $MYSITE . $href . '">' . $MYSITE . $href . '</a>';
}

?>

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
 If you write in a PHP.net URL (e.g. <kbd><?php echo $MYSITE; ?>get-involved</kbd>,
 first this URL is matched against the PHP.net pages. If there is
 a page named <em>get-involved.php</em>, then you'll get that page
 immediately. This type of shortcut makes easy to type in a link
 in an IRC conversation or mailing list message. If the script
 finds no page with this name, it tries to find a manual page.
</p>

<h2>Manual shortcuts</h2>

<p>
 If your URL can't be matched with a page name, a manual page
 is searched for your query. This is the case for the 
 <kbd><?php echo $MYSITE; ?>preg_match</kbd> URL. The following pages
 are searched for in the manual:</p>
<ul>
 <li>Chapter pages (e.g. <?php a("installation") ?>)</li>
 <li>Reference pages (e.g. <?php a("imap") ?>)</li>
 <li>Function pages (e.g. <?php a("join") ?>)</li>
 <li>Class pages (e.g. <?php a("dir") ?>)</li>
 <li>Feature pages (e.g. <?php a("safe_mode") ?>)</li>
 <li>Control structure pages (e.g. <?php a("while") ?>)</li>
 <li>Other language pages (e.g. <?php a("oop") ?>)</li>
</ul>
<p>
 Since there are several manual pages that could potentially match the query
 (extension, class, function name..) you are encouraged to use their prefix/suffix:
</p>
<ul>
 <li>Extension <abbr title="Table of Contents">TOC</abbr>:
  <kbd><?php echo $MYSITE ?><var>book.extname</var></kbd>
  (e.g. <?php a("book.dom")?>).
 </li>
 <li>Extension intro pages:
  <kbd><?php echo $MYSITE ?><var>intro.extname</var></kbd>
  (e.g. <?php a("intro.array") ?>).
 </li>
 <li>Extension setup <abbr title="Table of Contents">TOC</abbr>:
  <kbd><?php echo $MYSITE ?><var>extname.setup</var></kbd>
  (e.g. <?php a("intl.setup") ?>).
 </li>
 <li>Extension install chapter:
  <kbd><?php echo $MYSITE ?><var>extname.installation</var></kbd>
  (e.g. <?php a("apc.installation") ?>).
 </li>
 <li>Extension configuration:
  <kbd><?php echo $MYSITE ?><var>extname.configuration</var></kbd>
  (e.g. <?php a("session.configuration") ?>).
 </li>
 <li>Extension resources:
  <kbd><?php echo $MYSITE ?><var>extname.resources</var></kbd>
  (e.g. <?php a("mysql.resources") ?>).
 </li>
 <li>Extension constants:
  <kbd><?php echo $MYSITE ?><var>extname.constants</var></kbd>
  (e.g. <?php a("image.constants") ?>).
 </li>
 <li>Class synopsis:
  <kbd><?php echo $MYSITE ?><var>class.classname</var></kbd>
  (e.g. <?php a("class.xmlreader") ?>).
 </li>
 <li>Class method:
  <kbd><?php echo $MYSITE ?><var>classname.methodname</var></kbd>
  (e.g. <?php a("pdo.query") ?>).
 </li>
 <li>Functions:
  <kbd><?php echo $MYSITE ?><var>function.functionname</var></kbd>
  (e.g. <?php a("function.strpos") ?>).
 </li>
</ul>

<p>
 This kind of URL will bring up the manual page in 
 <a href="/my.php">your preferred language</a>. You can
 always override this setting by explicitly providing
 the language you want to get to. You can embed the language
 in the URL before the manual search term.
 <kbd><?php echo $MYSITE; ?>hu/sort</kbd> will bring up
 the Hungarian manual page for sort() for example.
</p>

<h2>Search shortcuts</h2>

<p>
 At last, if there is no PHP page, and there is no manual
 page matching your query, a search is issued on the site with
 the query you typed into the URL. An example of this kind
 of URL is <kbd><?php echo $MYSITE; ?><var>search_for_this</var></kbd>.
 The exact behaviour of this search is affected by
 <a href="/my.php">your own My PHP.net settings</a>.
</p>

<h2>PHP Developer shortcuts</h2>
<ul>
 <li>Changelog information: <a href="http://php.net/changelog">http://php.net/changelog</a>
  (e.g. latest PHP changelog. php5news = latest PHP 5 NEWS, phptrunknews = latest PHP trunk NEWS)
 </li>
 <li>Bugs: <a href="http://php.net/42">http://php.net/42</a>
  (any numeric value redirects to said bug # at bugs.php.net)
 </li>
</ul>

<h2>Even smarter tricks</h2>

<p>
 We also have shortcut aliases to access some resources more quickly,
 and with a nice URL. Aliases are translated to their relevant shortcuts
 before the first step (PHP page search) mentioned above. Some examples
 of shortcut aliases: <?php a("whatisphp") ?>,
 <?php a("php4news") ?>. The latter is an external page
 alias, as it points to a file on the Git server, containing information
 about changes in PHP. There are also some convenient aliases(e.g.
 <?php a("de/phpversion") ?> which displays the German
 manual page for the phpversion() function.
</p>


<?php site_footer(); ?>
