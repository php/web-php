<?php
require_once 'prepend.inc';

commonHeader("PHP.net Search Bars");

?>
<h1>PHP.net Search Bars</h1>

<p>
Among the many smart access methods to get to information quickly
on the PHP site, we provide sidebars for the most popular browsers
used on different operating systems to access PHP.net pages easily.
Here you can find setup and uninstall information for the browsers
supported. Feel free to send in suggestions on how to implement our 
sidebar for another browser or how to enhance it's services using
our <a href="http://bugs.php.net">bug system</a> (categorize the bug
as a php.net website bug).
</p>

<h2>Mozilla 0.9.4 and above</h2>
<script language="JavaScript">
function addPanel()
{
    if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function"))
        window.sidebar.addPanel("PHP.net Search Bar","/searchbar.php","");
    else
        alert('Sidebar cannot be added! You must use Mozilla 0.9.4 or later!');
}
</script>
<p>
If you use Mozilla 0.9.4 or later, you can <a href="javascript:addPanel()">add
our sidebar to your set</a>. You can uninstall this sidebar using the "Customize
Sidebar" dialog in Mozilla. <i>To get more information on Mozilla sidebars
see the <a href="http://wp.netscape.com/sidebar/how.html">Netscape Sidebar
Howto</a>.</i>
</p>

<h2>Internet Explorer 5 and above</h2>

<p>
If you use Internet Explorer 5 or above on Windows, you can copy
<a href="javascript:void(open('/searchbar.php','_search'))">this link</a>
to your Links toolbar or add it to your favorites and clicking on it you
can see our bar displayed in place of your usual search bar. This
link does not install our bar as your default search bar, so no
modification is made to your system. <i>We used the _search target name
supported by IE 5+ passed to the
<a link="http://msdn.microsoft.com/workshop/author/dhtml/reference/methods/open_1.asp">open</a>
function to make this sidebar available.</i>
</p>

<p>
If you use Internet Explorer 5 or above on MacOS, <a href="/searchbar.php">open
our sidebar page</a> in a separate window. In that window, open the "Page Holder"
tab on the left side of the window. Click "Add." If you want to keep it for
future use, click on "Favorites" and select "Add to Page Holder Favorites."
<i>If you would like to read more about the Page Holder, see
<a href="http://www.microsoft.com/mac/products/ie/ie_main.asp?embfpath=howto&embfname=ie_1.asp">Microsoft's
Macintosh page</a>.</i>
</p>

<h2>Opera 6 and above</h2>

<p>
If you are using Opera, you can <a href="/searchbar.php" rel="sidebar"
title="PHP.net Search Bar">click on this link to add our sidebar to your set</a>.
You can uninstall the sidebar by right clicking on it's tab and choosing "Delete"
from the context menu. <i><a href="http://www.tntluoma.com/opera/lover/day16-sidebars/">Read
more about Opera sidebars on this page</a>.</i>
</p>

<?php commonFooter(); ?>
