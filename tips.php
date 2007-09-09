<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'tips.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
$SIDEBAR_DATA = '
<h3>About URL shortcuts</h3>
<p>
 Most of the tips here utilize PHP.net URL shortcuts, so they allow you
 more then just function lookups. For more information on what is possible
 with our shortcuts, see the <a href="/urlhowto.php">URL Howto page</a>.
</p>

<h3>More on language selection</h3>
<p>
 These shortcuts display pages in your own preferred language, as detected
 by the PHP site. For more information on language selection, see
 <a href="/my.php">the My PHP.net page</a>.
</p>
';
site_header("Quick Reference Tips");

function tip_title($title, $author = '', $date = '')
{
    echo "<hr />\n<h2>$title<br />\n";
    echo "<small>Submitted by $author ($date)</small></h2>\n";
}
?>

<h1>Quick Reference Tips</h1>

<p>
 On this page, you can find many neat tips and tricks to look up
 information about PHP functions and language constructs.
 Send your suggestions for tips to <a href="/contact.php">the webmasters</a>.
</p>

<?php tip_title('Quick Reference for Opera 9', 'Mustaque Ullah', '09-Sep-2007');?>

<p>
 In Opera, go to Tools --&gt; Preferences, and then click on the Search tab. You
 should "Add a new search engine" and fill in the appropriate fields. My
 choices are below.
</p>
<ul>
 <li>Name: PHP</li>
 <li>Keyword: p</li>
 <li>Address: http://www.php.net/search.php</li>
 <li>Query string: pattern=%s&amp;show=quickref</li>
</ul>
<p class="note">
 You have to check "Use POST" to be able to type in a query string.
</p>
<p>
 From then on (click OK twice to close the windows) you should be able to search
 the function list by typing "p function" in the address bar (or use the
 search dropdown menu). You can change "quickref" to "all" if you want to
 search all php.net sites, or "manual" for the online documentation.
</p>

<?php tip_title('Function lookup with Apple Dashboard', 'Gabor Hojtsy', '02-Apr-2006');?>

<p>
 There are some options for
 <a href="http://www.apple.com/macosx/features/dashboard/">Apple Dashboard</a> users:
</p>
<ul>
 <li>
  Andrew Hedges created the <a href="http://andrew.hedges.name/widgets/#phpfr">PHP
  Function Reference widget</a>, which ships with a copy of the PHP Manual, and
  includes additional functionality, such as a favourites list and an interactive
  <code>date()</code> formatter.
 </li>
 <li>
  Claudio Procida's <a href="http://www.apple.com/downloads/dashboard/developer/phpquickreferencewidget.html">PHPQuickReference widget</a> provides a custom
  view of the online PHP documentation with some added features.
 </li>
 <li>
  Havard Eide <a href="http://eide.org/view/osx/dashboard">implemented the
  Dashboard Widget</a> version of <a href="http://wiki.cc/php/Epc_phpm">phpm</a>,
  providing function lookups.
 </li>
 <li>
  Simon Ganiere created the <a href="http://www.simonganiere.ch/?page_id=39">PHP
  Manual widget</a>, which provides a simple search field to the PHP.net
  function lookup search.
 </li>
 <li>
  Nathan Bolender also created a simple <a
  href="http://www.apple.com/downloads/dashboard/developer/phpsearch.html">PHP.net
  Search widget</a>, available from the Apple website.
 </li>
</ul>

<?php tip_title('Search from the Safari Search Bar', 'Gabor Hojtsy', '19-Jan-2004');?>

<p>
 You can point your search engine setting to a local script on your own webserver,
 and set up a PHP script to allow you to use shortcuts provided by other browsers.
 See the detailed explanation at
 <a href="http://www.macosxhints.com/article.php?story=20030519070642235">MacOSXHints.com</a>.
</p>

<?php tip_title('Search from the WeberDev Toolbar', 'Boaz Yahav', '16-Aug-2003');?>

<p>
 The <a href="http://www.weberdev.com/toolbar">WeberDev Toolbar</a> provides direct
 search functions to the PHP function list and the bug database, right from a
 browser toolbar.
</p>

<?php tip_title('Quick Reference for BBEdit', 'Stian Andersen', '27-July-2003');?>

<p>
 BBEdit users can put this little AppleScript into the Scripts folder of
 BBEdit to look up functions on the PHP website as they type. This will
 probably work in other AppleScript supporting text editors too, with
 small modifications. The script uses the current selection, or prompts for
 a function name, and uses the default browser to show the page at php.net.
</p>
<pre>
tell application "BBEdit"
    set fu to selection of window 1 as string
    if fu = "" then
        set fu to text returned of (display dialog "PHP Function:" default answer "")
    end if

    if fu is not "" then
        set target_URL to "<?php echo $MYSITE; ?>" &amp; fu
        open location target_URL
    end if
end tell
</pre>

<?php tip_title('Quick Reference for iCab', 'Telcontar', '17-Jun-2003');?>

<p>
 Open the Preferences dialog box, select Searches and then Internet Sites.
 Click New, add "PHP Quick Reference" as the Title, and
 <tt>"<?php echo $MYSITE; ?>"</tt> as the URL. If
 you add a letter in the Key column (eg. "p") you can search using the
 address bar with that letter (eg. "p str_replace"). Otherwise, use Edit
 &rarr; Find (Cmd-F) and select "On the Internet" under Find and choose
 "PHP Quick Reference" as the search site.
</p>

<?php tip_title('Quick Reference for Internet Explorer 4 and above', 'Fraghunter', '07-Nov-2002');?>

<p>
 Just right-click on this link:
 <a href="javascript:q=document.selection.createRange().text;if(!q)void(q=prompt('PHP%20Reference:',''));if(q)location.href='<?php echo $MYSITE; ?>'+escape(q)" title="PHP Quick Reference">PHP Quick Reference</a>
 and add it to your bookmarks. Using this bookmark you can directly get to
 the documentation page of any function you have selected the name of
 on the page, or if there is no selection, you are prompted for a string to
 look for.
</p>

<?php tip_title('Quick Reference for KDE 3.x', 'James Grant', '07-Nov-2002');?>

<p>
 In <a href="http://www.kde.org/">KDE</a> 3.0, the PHP quicksearch 
 is preconfigured, so you can type "php:mail" in Konqueror to get
 the mail() function's manual page.
</p>

<?php tip_title('Search Box for Galeon', 'Carter Comunale', '31-Oct-2002'); ?>

<ol>
 <li>Press CTRL+D to add a bookmark</li>
 <li>Edit the bookmark, filling the following fields in:
 <dl>
  <dt>Name</dt><dd>PHP</dd>
  <dt>URL</dt><dd><?php echo $MYSITE; ?></dd>
  <dt>Smart URL</dt><dd><?php echo $MYSITE; ?></dd>
  <dt>Nicknames</dt><dd>php</dd>
 </dl>
 </li>
 <li>
  You can also add a logo to the bookmark, see our
  <a href="/download-logos.php">logos page</a>
 </li>
</ol>

<?php tip_title('Quick Reference for OmniWeb on Mac OS X', 'Steve Poole', '03-Oct-2002'); ?>

<ol>
 <li>Open the Preferences window in OmniWeb, and select Shortcuts.</li>
 <li>Click the + button to add a shortcut.</li>
 <li>In the Shortcut column type: <tt>php@</tt></li>
 <li>In the Destination URL column type: <tt><?php echo $MYSITE; ?>%@</tt></li>
 <li>Close the Preferences window.</li>
</ol>

<p>
 Now you can search for PHP functions by typing into the URL well.
 For instance, <tt>php mysql</tt> or <tt>php strstr</tt>.
</p>

<?php tip_title('Quick Reference for Opera', 'Paul Sculthorpe', '11-Jun-2002');?>

<p>
 Add this stuff to search.ini in your Opera directory.
</p>

<p>
 I replaced one of the existing search engine entries 
 (number 4 in this case), but there are tools around 
 that allow you to fully manage the search features of Opera.
</p>

<p>
 After adding, saving and restarting Opera, I can access the 
 PHP function list by typing 'p is_dir' in the address bar of
 any Opera window.
</p>

<pre>
[Search Engine 4]
Name=PHP
URL=<?php echo $MYSITE; ?>
Query=
Key=p
Is post=0
Has endseparator=0
Encoding=utf-8
Search Type=0
</pre>

<?php tip_title('Quick Reference for KDE 2.1', 'Christoph Luehr', '10-Mar-2001');?>

<p>
 With <a href="http://www.kde.org/">KDE</a> 2.1, it is possible
 to configure the Konqueror web browser to recognize quick reference
 URIs, for example: "php:mysql_connect".
</p>

<p>
 Just open the Konqueror menu "Settings &rarr; Configure Konqueror",
 select the tab "Enhanced Browsing", check "Enable Web Shortcuts".
</p>

<p>
 Then click on "Add..." and fill the dialog:
</p>

<ul>
 <li>Search provider name: <b>"PHP Manual Quick Reference"</b></li>
 <li>Search URI: <b><?php echo $MYSITE; ?>\1</b></li>
 <li>URI Shortcuts: <b>php</b></li>
</ul>

<p>
 Voila!
</p>

<?php tip_title('Adding the Quick Reference to most Javascript-capable Browsers', 'Anonymous', '07-Mar-2001'); ?>

<p>
 Just right-click (control-click or click-and-hold for Macintosh users)
 on this link: <a href="javascript:q=document.getSelection();if(!q)void(q=prompt('PHP Reference:',''));if(q)location.href='<?php echo $MYSITE; ?>'+escape(q)" title="PHP Quick Reference">PHP Quick Reference</a>
 and add it to your bookmarks. With some browsers, you may need to edit
 your bookmarks manually to give the bookmark an easy-to-remember title.
</p>

<?php tip_title('Adding the Quick Reference to Mozilla and Netscape 6/7', 'André Langhorst', '16-Aug-2000'); ?>

<p>
 Quick access to PHP documentation and site search for all Mozilla (including Firebird)
 and Netscape 6/7 users:
</p>

<ol>
 <li>Click "Bookmarks &rarr; Manage Bookmarks"</li>
 <li>
  Create a bookmark in a folder of your choice on
  the following URL: <tt><?php echo $MYSITE; ?>%s</tt>
  and choose a name for it.
 </li>
 <li>
  Right click the bookmark you have just created and select "Properties..."
 </li>
 <li>
  Choose a "custom keyword" you want to enter in the URL bar,
  eg. "php" and fill it in.
 </li>
 <li>Click "ok" and open a new browser window.</li>
 <li>
  Finished. Now you are able to enter eg. "php fgets" to look
  up the manual entry on the function fgets(). You can also access
  PHP.net pages with this shortcut. If you type "php links" you will
  get to the links page on our site.
 </li>
</ol>

<?php tip_title('Adding the Quick Reference to Internet Explorer 5', 'Colin Viebrock', '28-Jul-2000'); ?>

<ol>
 <li>
  If you don't already have the IE5 Tools package, download and install it from
  <a href="http://www.microsoft.com/Windows/IE/WebAccess/ie5tools.asp"
  >www.microsoft.com/Windows/IE/WebAccess/ie5tools.asp</a>
 </li>
 <li>Launch the QuickSearch utility (you'll find it on your Links bar)</li>
 <li>
  Add a new search shortcut by clicking on "New" and use the
  following settings:
  <ul>
   <li>Shortcut: <tt>php</tt></li>
   <li>Search: <strong>Custom URL</strong></li>
   <li>URL: <tt><?php echo $MYSITE; ?>%s</tt></li>
  </ul>
 </li>
 <li>Click "Ok", then click "Save" to keep your new settings</li>
 <li>
  That's it! Try it by typing "php strlen" in the IE Address bar.
  You should jump right to the manual entry for strlen().
 </li>
</ol>

<?php tip_title('Adding the Quick Reference to Netscape on Linux', 'David Rose', '28-Jul-2000'); ?>

<p>
 Further to the example above for Windows/IE users, here's something
 Linux folks can do:
</p>

<ol>
 <li>Create a file called <tt>phpfind</tt> somewhere on an executable path</li>
 <li>
  In that file, write the following code (substituting the path to Netscape,
  if necessary):
  <pre>
#!/bin/sh
/usr/bin/netscape <?php echo $MYSITE; ?>$1
  </pre>
 </li>
 <li>Save it and type <tt>chmod +x phpfind</tt> to make it executable</li>
 <li>
  That's it. When you type "phpfind fopen" on your command line, 
  Netscape will open the fopen() documentation page for you.
 </li>
</ol>

<?php tip_title('Quick Reference for Gnome Users', 'Benjamin Curtis', '29-Jul-2000'); ?>

<p>
 Here's another search option for Linux users who use Gnome. This is a macro
 for gnome's mini-commander panel applet (modified from the Yahoo search that
 comes with the applet):
</p>

<p>
 <strong>Regex:</strong><br /><tt>^php: *(.*)$</tt>
</p>

<p>
 <strong>Macro:</strong><br />
 <tt>gnome-moz-remote --newwin <?php echo $MYSITE; ?>$(echo<br />
'\1'|sed -e ': p;s/+/%2B/;t p;: s;s/\ /+/;t s;: q;s/\"/%22/;t q')</tt>
</p>

<?php site_footer(); ?>
