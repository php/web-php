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
<? makeEntry("Apache Gets Down to Business","WEBBuilder Magazine article by Bjørn Borud","http://www.devx.com/upload/free/features/webbuilder/1998/wb1098/bb1098/bb1098.htm","Sept. 24, 1998"); ?>
"The world's most popular Web server has a reputation for performance and extensibility. You may not be aware of the rich programming environment that surrounds Apache, though. PHP gives you strong SQL connectivity, and mod_perl has powerful application integration facilities. Learn how to exploit these capabilities. Also, see our review of Apache."
<? endEntry(); ?>

<? makeEntry("PHP/MySQL ... Two great things that go great together","Combination wins Database of the Year Award at Web98","http://webreview.com/wr/pub/wtawards","June 22, 1998"); ?>
"The substance of the Web is more and more residing in databases, and there are a variety of methods used to
generate Web pages.  This year, we selected a pair of "free software" tools that
work together quite nicely as a platform for building dynamic content. The award is also a tribute to the Open Source
initiative; both products are used, developed and supported by interlocking communities of people on the Net."
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
