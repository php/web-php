<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'sidebars.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP.net Search Bars", array("current" => "help"));
?>
<h1>PHP.net Search Bars</h1>

<p>
 Among the many smart access methods to get to information quickly
 on the PHP site, we provide sidebars for the most popular browsers
 used on different operating systems to access PHP.net pages easily.
 Here you can find setup and uninstall information for the browsers
 supported. Feel free to send in suggestions on how to implement our 
 sidebar for another browser or how to enhance it's services by sending
 an email to <a href="mailto:php-webmaster@lists.php.net">the webmasters</a>.
</p>

<h2>Mozilla, Firefox, Netscape 6+ and Sherlock for MacOSX</h2>
<script type="text/javascript">
function addPanel()
{
    if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function")) {
        window.sidebar.addPanel("PHP.net Search Bar", "<?php echo $MYSITE; ?>searchbar.php", "");
    } else {
        alert('Sidebar cannot be added! You must use Mozilla 0.9.4 or later!');
    }
}
function addPlugin()
{
    if ((typeof window.sidebar == "object") && (typeof window.sidebar.addSearchEngine == "function")) {
      window.sidebar.addSearchEngine(
          "<?php echo $MYSITE; ?>phpnetsearch.src",
          "<?php echo $MYSITE; ?>images/phpnetsearch.png",
          "phpnetsearch",
          "Web"
      );
    } else {
        alert('Search plugin cannot be installed! Netscape 6 or Mozilla is required!');
    }
}
</script>
<p>
 If you use Mozilla 0.9.4 or later, you can <a href="javascript:addPanel()">add
 our sidebar to your set</a>. You can uninstall this sidebar using the "Customize
 Sidebar" dialog in Mozilla. <em>To get more information on Mozilla sidebars
 see the <a href="http://wp.netscape.com/sidebar/how.html">Netscape Sidebar
 Howto</a>.</em>
</p>

<p>
 For users of Mozilla Firefox who are interested in adding the search sidebar,
 they can also click the above link, and that will offer a new bookmark. Save that
 bookmark anywhere in your set, and whenever you try to open that, it will
 dispslay the search sidebar. You can remove the sidebar by removing the bookmark.
</p>

<p>
 We also offer a plugin for the built-in <a href="http://mycroft.mozdev.org/">Mozilla
 Search Sidebar</a>, and this plugin will also work with the several Mozilla and
 Firefox <a href="http://update.mozilla.org/extensions/showlist.php?type=E&amp;application=firefox&amp;category=Search%20Tools&amp;numpg=10">search extensions</a> as well as Sherlock on MacOSX.
 <a href="javascript:addPlugin();">Install our sidebar plugin</a>, and enjoy the
 integrated search in Mozilla. Sherlock users should save our
 <a href="<?php echo $MYSITE; ?>phpnetsearch.src">phpnetsearch.src file</a> to
 their 'Internet Search Sites' folder.
</p>

<h2>Internet Explorer 5 and above</h2>

<p>
 If you use Internet Explorer 5 or above on Windows, you can add the
 <a href="javascript:void(open('<?php echo $MYSITE; ?>searchbar.php','_search'))">PHP.net Search Bar</a>
 to your Links toolbar (dragging the link there) or you can add it to your 
 favorites and clicking on it you can see our bar displayed in place of your
 usual search bar. This link does not install our bar as your default search bar,
 so no modification is made to your system. <em>We used the _search target name
 supported by IE 5+ passed to the
 <a href="http://msdn.microsoft.com/workshop/author/dhtml/reference/methods/open_1.asp">open()
 JavaScript function</a> to make this sidebar available.</em>
</p>

<p>
 If you use Internet Explorer 5 or above on MacOS,
 <a href="<?php echo $MYSITE; ?>searchbar.php">open our sidebar page</a> in a
 separate window. In that window, open the "Page Holder" tab on the left side
 of the window. Click "Add." If you want to keep it for future use, click on
 "Favorites" and select "Add to Page Holder Favorites." <em>If you would like to
 read more about the Page Holder, see
 <a href="http://www.microsoft.com/mac/products/ie/ie_main.asp?embfpath=howto&amp;embfname=ie_1.asp">Microsoft's
 Macintosh IE page</a>.</em>
</p>

<h2>Opera 6 and above</h2>

<p>
 If you are using Opera, you can <a href="<?php echo $MYSITE; ?>searchbar.php"
 rel="sidebar" title="PHP.net Search Bar">click on this link to add our sidebar
 to your set</a>. You can uninstall the sidebar by right clicking on it's tab
 and choosing "Delete" from the context menu.
 <em><a href="http://www.tntluoma.com/opera/lover/day16-sidebars/">Read
 more about Opera sidebars on this page</a>.</em>
</p>

<p>
 The Mozilla search plugin mentioned above also works with Opera if
 <a href="http://nontroppo.org/wiki/SearchPluginsHelp">OpSed</a> is installed.
 You just need to <a href="<?php echo $MYSITE; ?>phpnetsearch.src">click on
 this link</a> to add it to your set.
</p>

<h2>Windows Vista</h2>
<p>
 If you use Microsoft Windows Vista you can now search the php.net function
database directly from your desktop. The Microsoft Windows Vista Sidebar is a
pane on the right side of your Microsoft Windows Vista Desktop where you can
keep useful utilities. The
<a href="http://www.gozipline.com/phpfunctionfinder">php.net Function Finder</a>
will install in this bar giving you direct search access to the php.net
database directly from your Desktop.
</p>

<?php site_footer(); ?>
