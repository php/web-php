<?php
/* $Id$ */

require_once './include/prepend.inc';
commonHeader("Cool Quick Reference Tips");

function tipTitle($title,$author='',$date='') {
	echo hdelim();
	echo "<big><b>" . $title . "</b></big><br />\n";
	if ($author || $date) {
		echo "<small>\n";
		if ($author) {
			echo "Submitted by " . $author . "<br />\n";
		}
		if ($date) {
			echo $date . "<br />\n";
		}
		echo "</small>\n";
	}
	echo "<br />\n";
}

?>

<h1>Cool Quick Reference Tips</h1>

<p>
On this page, you can find many neat tips and tricks to optimize
your usage of our quick reference features. Send your suggestions
for tips to <a href="mailto:webmaster@php.net">webmaster@php.net</a>.
</p>

<p>
For a description of PHP.net shortcut URLs, please visit our
<a href="urlhowto.php">URL Howto page</a>.
</p>

<?php tipTitle('Quick Reference for BBEdit', 'Stian Andersen', '27-July-2003');?>

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
        set target_URL to "http://www.php.net/" & fu
        open location target_URL
    end if
end tell
</pre>

<?php tipTitle('Quick Reference for iCab', 'Telcontar', '17-Jun-2003');?>

<p>
Open the Preferences dialog box, select Searches and then Internet Sites.
Click New, add "PHP Quick Reference" as the Title, and "http://www.php.net/manual-lookup.php?function=" as the URL. If you add
a letter in the Key column (eg. "p") you can search using the address bar
with that letter (eg. "p str_replace"). Otherwise, use Edit &gt; Find (Cmd-F)
and select "On the Internet" under Find and choose "PHP Quick Reference" as
the search site.
</p>

<?php tipTitle('Quick Reference for Internet Explorer 4 and above', 'Fraghunter', '07-Nov-2002');?>

<p>
Just right-click on this link:
<a href="javascript:q=document.selection.createRange().text;if(!q)void(q=prompt('PHP%20Reference:',''));if(q)location.href='http://www.php.net/manual-lookup.php?lang=en&amp;function='+escape(q)" title="PHP Quick Reference">PHP Quick Reference</a>
and add it to your bookmarks. You can edit the bookmark to change the
default language by changing 'lang=en' to whatever language you want to
use by default. (For example, to pull up the German translation of the
manual, you would replace "lang=en" with "lang=de".)
</p>

<?php tipTitle('Quick Reference for KDE 3.x', 'James Grant', '07-Nov-2002');?>

<p>
In <a href="http://www.kde.org/">KDE</a> 3.0, the PHP quicksearch 
is preconfigured, so you can type "php:mail" in Konqueror to get
the mail() function's manual page.
</p>

<?php tipTitle('Search Box for Galeon', 'Carter Comunale', '31-Oct-2002'); ?>

<ol>
  <li>Press CTRL+D to add a bookmark</li>
  <li>Edit the bookmark, filling the folowing fields in:
  <dl>
   <dt>Name</dt><dd>PHP</dd>
   <dt>URL</dt><dd>http://php.net</dd>
   <dt>Smart URL</dt><dd>http://www.php.net/manual-lookup.php?pattern=%s&amp;lang=en</dd>
   <dt>Nicknames</dt><dd>php</dd>
  </dl>
  </li>
  <li>You can also add a logo to the bookmark, see our
  <a href="/download-logos.php">logos page</a></li>
</ol>

<?php tipTitle('Quick Reference for OmniWeb on Mac OS X', 'Steve Poole', '03-Oct-2002'); ?>

<ol>
  <li>In OmniWeb, open the Preferences window and select Shortcuts.</li>
  <li>Click the  + button to add a shortcut.</li>
  <li>In the Shortcut column type: <tt>php@</tt></li>
  <li>In the Destination URL column type: <tt>http://www.php.net/manual-lookup.php?function=%@</tt></li>
  <li>Close the Preferences window.</li>
</ol>

<p>
Now you can search for PHP functions by typing into the URL well.
For instance, <tt>php mysql</tt> or <tt>php strstr</tt>.
</p>

<?php tipTitle('Quick Reference for Opera', 'Paul Sculthorpe', '11-Jun-2002');?>

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
UK mirror of the PHP function list by typing 'p is_dir' in the 
address bar of any Opera window. Obviously the UK part can be 
changed back to 'www' to access the main site instead of the 
mirror.
</p>

<pre>
[Search Engine 4]
Name=PHP
URL=http://uk.php.net/manual-lookup.php?function=%s
Query=
Key=p
Is post=0
Has endseparator=0
Encoding=utf-8
Search Type=0
</pre>

<?php tipTitle('Quick Reference for KDE 2.1', 'Christoph Luehr', '10-Mar-2001');?>

<p>
With <a href="http://www.kde.org/">KDE</a> 2.1, it is possible
to configure the Konqueror web browser to recognize quick reference
URIs, for example: "php:mysql_connect".
</p>

<p>
Just open the Konqueror menu "Settings-&gt;Configure Konqueror",
select the tab "Enhanced Browsing", check "Enable Web Shortcuts".
</p>

<p>
Then click on "Add..." and fill the dialog:
</p>

<ul>
 <li>Search provider name: <b>"PHP Manual Quick Reference"</b></li>
 <li>Search URI: <b>http://www.php.net/manual-lookup.php?function=\1</b></li>
 <li>URI Shortcuts:  <b>php</b></li>
</ul>

<p>
Voila!
</p>

<?php tipTitle('Adding the Quick Reference to most Javascript-capable Browsers', '', '07-Mar-2001'); ?>

<p>
Just right-click (control-click or click-and-hold for Macintosh users)
on this link: <a href="javascript:q=document.getSelection();if(!q)void(q=prompt('PHP Reference:',''));if(q)location.href='http://www.php.net/manual-lookup.php?lang=en&amp;function='+escape(q)" title="PHP Quick Reference">PHP Quick Reference</a>
and add it to your bookmarks. With some browsers, you may need to edit
your bookmarks manually to give the bookmark an easy-to-remember title.
You can also edit the bookmark to change the default language by changing
'lang=en' to whatever language you want to use by default. (For example,
to pull up the German translation of the manual, you would replace
"lang=en" with "lang=de".)
</p>

<?php tipTitle('Adding the Quick Reference to Mozilla and Netscape 6', 'Andr&eacute; Langhorst', '16-Aug-2000'); ?>

<p>
Quick access to PHP documentation and site search for all Mozilla
and Netscape 6 users:
</p>

<ol>
  <li>Click "Bookmarks -&gt; Manage Bookmarks"</li>
  <li>Create a bookmark in a folder of your choice on
      the following URL: http://www.php.net/manual-lookup.php?function=%s
      (or mirror site of your choice)
    <ul>
      <li>Choose a name for your bookmark.</li>
    </ul>
  </li>
  <li>Right click the bookmark you´ve created and select "Properties..."</li>
  <li>Choose a "custom keyword" you want to enter in the URL bar,
  eg. "php" and fill it in.</li>
  <li>Click "ok" and open a new browser window.</li>
  <li>Finished. Now you´re able to enter eg. "php fgets" to look
  up the manual entry on the function fgets() or eg. "php building
  PHP 4" to search all available information how to build PHP 4.</li>
</ol>

<?php tipTitle('Adding the Quick Reference to Internet Explorer 5', 'Colin Viebrock', '28-Jul-2000'); ?>

<ol>
  <li>If you don't already have the IE5 Tools package, download and install it from
  <a href="http://www.microsoft.com/Windows/IE/WebAccess/ie5tools.asp" target="_blank"
  >www.microsoft.com/Windows/IE/WebAccess/ie5tools.asp</a></li>
  <li>Launch the QuickSearch utility (you'll find it on your Links bar)</li>
  <li>Add a new search shortcut by clicking on "New" and use the
  following settings:
    <ul>
      <li>Shortcut: <b>php</b></li>
      <li>Search: <b>Custom URL</b></li>
      <li>URL: <b>http://www.php.net/manual-lookup.php?function=%s</b></li>
    </ul>
  ... or substitute your favorite mirror site instead of <b>www.php.net</b><br />
  <div align="center">
  <img src="images/tips-quickref.gif" width="317" height="293" border="0" alt="Edit shortcut" /><br />
  </div></li>
  <li>Click "Ok", then click "Save" to keep your new settings</li>
  <li>That's it! Try it by typing "php strlen" in the IE Address bar.
  You should jump right to the manual entry for strlen. And because the
  QuickRef code on the PHP site is smart, you can use it to do general
  searches of the PHP site. For example, try typing "php file upload"
  in your browser.</li>
</ol>

<?php tipTitle('Adding the Quick Reference to Netscape on Linux', 'David Rose', '28-Jul-2000'); ?>

<p>
Further to the example above for Windows/IE users, here's something Linux folk can do:
</p>

<ol>
  <li>Create a file called <b>phpfind</b> somewhere on an executable path</li>
  <li>In that file, write the following code (substituting the path to Netscape,
  if necessary):
<pre>
#!/bin/sh
/usr/bin/netscape http://www.php.net/manual-lookup.php?function=$1
</pre></li>
  <li>Save it and type <b>chmod +x phpfind</b> to make it executable</li>
  <li>That's it. When you type "phpfind funcionname" on your command line, 
  Netscape will open the proper URL for you.</li>
</ol>

<?php tipTitle('Quick Reference for Gnome Users', 'Benjamin Curtis', '29-Jul-2000'); ?>

<p>
Here's another search option for Linux users who use Gnome. This is a macro
for gnome's mini-commander panel applet (modified from the Yahoo search that
comes with the applet):
</p>

<p>
<b>Regex:</b><br />
^php: *(.*)$
</p>

<p>
<b>Macro:</b><br />
gnome-moz-remote --newwin http://www.php.net/manual-lookup.php?function=$(echo<br />
'\1'|sed -e ': p;s/+/%2B/;t p;: s;s/\ /+/;t s;: q;s/\"/%22/;t q')
</p>

<?php commonFooter(); ?>
