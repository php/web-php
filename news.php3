<?
require("shared.inc");
commonHeader("PHP in the News");

function makeEntry($title,$subtitle,$url=false,$date="") {
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
	if ($url) {
		echo "<A HREF=\"".$url."\" TARGET=\"_blank\">".$url."</A><BR></FONT>\n";
	} else {
		echo "<I>This article is not available online</I><BR></FONT>\n";
	}
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

<? makeEntry( "PHP: eingebettete Skriptsprache", "by Niels Pollem","http://www.heise.de/ix/artikel/1999/07/076/", "July 19, 1999");?>
(In German.) Dynamisch generierte Web-Seiten zu erstellen geh&ouml;rt
l&auml;ngst zum normalen Handwerk. Werkzeuge und Sprachen daf&uuml;r
stehen zur Verf&uuml;gung. Das derzeit noch in der Version&nbsp;3
verf&uuml;gbare PHP bietet sich dabei f&uuml;r Anf&auml;nger wie Profis
an - und PHP ist Open Source.
<? endEntry(); ?>

<? makeEntry( "Uncovering One of the Web's Secrets: Integrated Scripting with PHP", "by Leon Atkinson","http://webreview.com/wr/pub/1999/07/09/feature/index.html?wwwrrr_19990709.html", "July 9, 1999");?>
A basic introduction to PHP, by the author of "Core PHP Programming".
<? endEntry(); ?>

<? makeEntry( "Treasure trove: PHP offers features that will make your Web apps sparkle", "by Nicholas Petreley","http://www.infoworld.com/articles/op/xml/990621oppetreley.xml", "June 19, 1999");?>
LinuxWorld's editorial director discovers PHP and extols its virtues.
<? endEntry(); ?>

<? makeEntry( "Site Navigation with PHP", "by Brad Bulger","http://www.hotwired.com/webmonkey/99/25/index2a.html", "June 16, 1999");?>
Another Webmonkey article on using PHP, this time explaining how to use
PHP to make it easier for users to navigate your website.
<? endEntry(); ?>

<? makeEntry( "PHP/MySQL Tutorial", "by Graeme Merrall","http://www.hotwired.com/webmonkey/99/21/index2a.html?tw=frontdoor", "May 19, 1999");?>
A three-lesson tutorial on using PHP and MySQL together on Windows
and Unix systems.
<? endEntry(); ?>

<? makeEntry( "A fun thing happened on the way to the Phorum", "by Joe Barr","http://www.linuxworld.com/linuxworld/lw-1999-05/lw-05-vcontrol2.html", "May 12, 1999");?>
Slackware.com uses it. But have you heard of the freely available
conferencing software called Phorum? Joe tells the story of Phorum,
and how he came to try it out.
<? endEntry(); ?>

<? makeEntry( "Internet Publication System with GNU/Linux", "by &Aacute;lvaro del Castillo","http://www.openresources.com/magazine/publication-system-inet", "May 3, 1999");?>
First in a series dedicated to the analysis, development and
implementation of a very complete system for publishing data on the
Internet using GNU/Linux software (including PHP 3.0).
<? endEntry(); ?>

<? makeEntry( "Web mail in PHP", "by Bj&#248;rn Borud", "http://www.opensourceit.com/tutorials/990416php.html", "April 28, 1999");?>
Building a simple web-mail interface in PHP using the IMAP extension.
<? endEntry(); ?>

<? makeEntry( "LDAP at Home", "Article in May issue of Webtechniques by Rasmus Lerdorf", "http://www.webtechniques.com/1999/05/lerdorf/junk.shtml", "April. 14, 1999");?>
A very introductory look at LDAP and how to write a PHP interface to an LDAP server.
<? endEntry(); ?>

<? makeEntry("Search This","by Colin Viebrock","http://www.devshed.com/Server_Side/PHP/Search_This/","Mar. 15, 1999");?>
&quot;Search This: Searching Your Dynamic Site with PHP and ht://Dig&quot;
<? endEntry(); ?>

<? makeEntry( "PHP 3 - a Revolution for the Web", "Article in German Internet World by Tobias Ratschiller", false, "Feb. 15, 1999");?>
&quot;Static HTML pages are boring, CGI-scripts too slow, ColdFusion etc to
expensive? The solution is PHP 3.&quot; This German introductory article presents
PHP 3 as a scalable, easy-to-use, high-perfomance solution for server-side
scripting. Features also an interview with Rasmus Lerdorf.
<? endEntry(); ?>

<? makeEntry("PHP 3.0 - Full-power Web Scripting","by Ted Brockwood", "http://nctweb.com/articles/php.html","Jan. 27, 1999");?>
Ask most Web application developers their scripting language of choice,
and you'll find that most are divided into two camps - the Microsoft
Active Server Pages (ASP) folks, and the Cold Fusion users. If you do a
little more research however, you'll find there are other options out
there, and one of these, PHP 3.0, is in much wider use than one would
think for an "alternative product".
<? endEntry(); ?>

<? makeEntry("Articles on phpbuilder.com","by Tim Perdue and Rasmus Lerdorf", "http://www.phpbuilder.com","Jan. 24, 1999");?>
&quot;Building Dynamic Web Pages with Search Engines in Mind&quot; and &quot;Creating Dynamic Images with PHP&quot;
<? endEntry(); ?>

<? makeEntry( "Classified ads with PHP 3 and MySQL", "German article in Internet Pro (Ziff Davis) written by Tobias Ratschiller", "http://www.zdnet.de/internet/artikel/java/199902/php3mysql_00-wf.html", "Jan. 18, 1999"); ?>
&quot;PHP 3 is the most powerful tool on the market for building dynamic,
database-driven websites. Internet Pro shows how to realize a classified ads
site with PHP and MySQL.&quot;
<? endEntry(); ?>

<? makeEntry("Apache Gets Down to Business","WEBBuilder Magazine article by Bjørn Borud","http://www.devx.com/upload/free/features/webbuilder/1998/wb1098/bb1098/bb1098.htm","Sept. 24, 1998"); ?>
&quot;The world's most popular Web server has a reputation for performance and extensibility. 
You may not be aware of the rich programming environment that surrounds Apache, 
though. PHP gives you strong SQL connectivity, and mod_perl has powerful application 
integration facilities. Learn how to exploit these capabilities. Also, see our review of Apache.&quot;
<? endEntry(); ?>

<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right colspan=2><FONT FACE="tahoma, verdana, arial, helvetica, sans-serif">
<B>Older News</B><BR></FONT>
</TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right COLSPAN=2><FONT FACE="tahoma, verdana, arial, helvetica, sans-serif" SIZE=-1>
<A HREF="/oldnews.php3">Link to older articles</A><BR></FONT>
</TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=top>
<TD WIDTH=18><BR></TD>
<TD ALIGN=left colspan=2>
<TABLE border=0 cellpadding=5 cellspacing=0 bgcolor="#F0F0F0" width=100%>
<TR><TD><FONT FACE="tahoma, verdana, arial, helvetica, sans-serif" SIZE=-1>
<? spc(10,10);?>
<BR></TD></TR></TABLE>
</TD>
<TD width=18><BR></TD>
</TR>


<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD VALIGN=middle ALIGN=left colspan=2 rowspan=2>
If you have written an article, or spot something on the Net somewhere that isn't listed here, please send a note
to <a href="mailto:core@php.net">core@php.net</a> and we will be sure to add it to this list.<BR></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>

</TABLE>

<? commonFooter(); ?>
