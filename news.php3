<?
require("shared.inc");
commonHeader("PHP in the News");

function makeEntry($title,$subtitle,$url,$date="") {
	global $FONTFACE;
?>
<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=left><?
	echo "<FONT FACE=\"$FONTFACE\">\n";
	echo "<B>$title</B><BR></FONT>\n";
?></TD>
<TD ALIGN=right width=200><?
	echo "<FONT FACE=\"$FONTFACE\" SIZE=-1>\n";
	echo "<I>$date</I>&nbsp;<BR></FONT>\n";
?></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=left COLSPAN=2><?
	echo "<FONT FACE=\"$FONTFACE\" SIZE=-1>\n";
	echo "$subtitle<BR>\n";
	echo "<A HREF=\"".$url."\" TARGET=\"_blank\">".$url."</A><BR></FONT>\n";
?></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=top>
<TD WIDTH=18><BR></TD>
<TD ALIGN=left colspan=2>
<TABLE border=0 cellpadding=5 cellspacing=0 bgcolor="#F0F0F0" width=100%>
<TR><TD><FONT FACE="<? echo $FONTFACE;?>" SIZE=-1>
<?
};

function endEntry() {
?>
<BR><BR></TD></TR></TABLE>
</TD>
<TD width=18><BR></TD>
</TR>
<?
};


?>
<h3>PHP in the News</h3>

<P>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>
<? makeEntry("Dave Garaffa sees the light!","Notes from a Webmaster","http://browserwatch.internet.com/news/story/news-980608-7.html","June 8, 1998"); ?>
"Boy what a weekend I've had! Why you ask? Well I found PHP3
on Friday!! For those who already know about PHP3 now you
know why I've been so busy. ;-) For those who don't know about
it... all I can say is AWSOME!"
<? endEntry();?>

<? makeEntry("PHP 3.0 Press Release","Read the release announcement here.","/press-release-3.0.txt","June 6, 1998"); ?>
Toronto, Canada (June 6, 1998) -- The PHP Development Team announced the release of
PHP 3.0, the latest release of the server-side scripting solution already
in use on over 70,000 World Wide Web sites.
<? endEntry();?>

<? makeEntry("PHP 3.0 Released","Writing an article about PHP3? - Read This","/release-3.0.txt","June 6, 1998"); ?>
PHP 3.0 is finally here!  After 10 months of development PHP Version 3.0
is ready for production environments.  Coupled with the release of the
final version of Apache-1.3.0 today, the combination provides an
unbeatable web hosting platform suitable for both small and large web
sites.
<? endEntry();?>

<? makeEntry("Linux, SQL, and the Web","from UnixWorld Online","http://www.unixworld.com/archives/95/tutorial/018.html"); ?>
Charles J. Fisher walks through the steps required to get Linux, PostgreSQL and PHP3 to talk to each other.
<? endEntry();?>

<? makeEntry("Building A Cross-Platform Web Infrastructure","<B>Part One</B>, from UnixIntegration","http://www.performancecomputing.com/unixintegration/9802/9802f1.htm"); ?>
Brian Platz and Robert Flannigan take a look at all the options out there and end up choosing PHP over all the big guys.
<? endEntry();?>

<? makeEntry("Building A Cross-Platform Web Infrastructure","<B>Part Two</B>, from UnixIntegration","http://www.performancecomputing.com/unixintegration/9803/9803f1.htm"); ?>
Brian and Robert continue their project by focusing on using PHP as the middleware between a Web-server process and a back-end relational-database system.
<? endEntry();?>

<? makeEntry("A Contact Database using MySQL and PHP","from WebTechniques","http://www.webtechniques.com/features/1998/01/note/note.shtml"); ?>
Mike Miller builds a contact database with MySQL and PHP
<? endEntry();?>

<? makeEntry("Dynamic Web Pages with PHP3","from WebTechniques","http://www.webtechniques.com/features/1998/02/lerdorf/lerdorf.shtml"); ?>
As PHP gets an upgrade and name change, Rasmus explains its history and shows us some new features
by building a dynamic Web photo album.
<? endEntry();?>

<? makeEntry("Clear Ink Announces SpellWeb","SpellWeb Press Release","http://www.clearink.com/about.htmy?topic=pr_3_23_98"); ?>
Walnut Creek, CA (March 23, 1998) -- Clear Ink, an independent Internet
strategy, technology and design services agency, announces today a new site
called SpellWeb, <a href="http://www.spellweb.com">http://www.spellweb.com</a>, 
designed to detect and compare patterns in word usage throughout the global 
online community. 
<? endEntry();?>

<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD VALIGN=middle ALIGN=left rowspan=2>
If you have written an article, or spot something on the Net somewhere that isn't listed here, please send a note
to <a href="mailto:core@php.net">core@php.net</a> and we will be sure to add it to this list.<BR></TD>
<TD></TD><TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD></TD><TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>

</TABLE>

<? commonFooter(); ?>
