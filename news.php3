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

<? makeEntry( "LDAP at Home", "Article in May issue of Webtechniques by Rasmus Lerdorf", "http://www.webtechniques.com/1999/05/lerdorf/junk.shtml", "April. 14, 1999");?>
A very introductory look at LDAP and how to write a PHP interface to an LDAP server.
<? endEntry(); ?>

<? makeEntry("Search This","by Colin Viebrock","http://www.devshed.com/Server_Side/PHP/Search_This/","Mar. 15, 1999");?>
&quot;Search This: Searching Your Dynamic Site with PHP3 and ht://Dig&quot;
<? endEntry(); ?>

<? makeEntry( "PHP3 - a Revolution for the Web", "Article in German Internet World by Tobias Ratschiller", false, "Feb. 15, 1999");?>
&quot;Static HTML pages are boring, CGI-scripts too slow, ColdFusion etc to
expensive? The solution is PHP3.&quot; This German introductory article presents
PHP3 as a scalable, easy-to-use, high-perfomance solution for server-side
scripting. Features also an interview with Rasmus Lerdorf.
<? endEntry(); ?>

<? makeEntry("Articles on phpbuilder.com","by Tim Perdue and Rasmus Lerdorf", "http://www.phpbuilder.com","Jan. 24, 1999");?>
&quot;Building Dynamic Web Pages with Search Engines in Mind&quot; and &quot;Creating Dynamic Images with PHP&quot;
<? endEntry(); ?>

<? makeEntry( "Classified ads with PHP3 and MySQL", "German article in Internet Pro (Ziff Davis) written by Tobias Ratschiller", "http://www.zdnet.de/internet/artikel/java/199902/php3mysql_00-wf.html", "Jan. 18, 1999"); ?>
&quot;PHP3 is the most powerful tool on the market for building dynamic,
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
