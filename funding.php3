<?
require("shared.inc");
commonHeader("Funding PHP Development");

function makeEntry($heading) {
    global $FONTFACE;
?>
<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=left rowspan=2>
<?
    echo "<FONT FACE=\"$FONTFACE\" SIZE=-1><FONT SIZE=+0>\n";
    echo "<B>$heading</B><BR></FONT>\n";
?>
</TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=top>
<TD WIDTH=18><BR></TD>
<TD ALIGN=left>
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

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>
<?makeEntry("Why fund PHP development?")?>
PHP is developed by a group of volunteer programmers from around the world.  
From time to time, these programmers incur costs related to their work on PHP.
Examples include equipment, connectivity fees, books and various development tools.  
These costs are often absorbed by the programmers themselves, but it isn't always
feasible for them to do so, nor is it fair to expect them to.
<?endEntry()?>

<?makeEntry("How do I contribute?")?>
Send a US$ or CDN$ cheque or money order to:
<pre>PHP Development Team
c/o Lerdorf Consultants Inc.
1196 Avenue Rd.
Toronto, Ontario
M5N 2G1
CANADA
<?endEntry()?>

<?makeEntry("Where does my money go?")?>
We guarantee that all contributions will be put towards PHP development.  If not
right away, then at some point in the future.  We are not looking to get rich from
this, we are simply trying to cover our expenses and perhaps make development 
quicker and more fun for all involved by having adequate funding.
<?endEntry()?>

<?makeEntry("Do I have to contribute in order to use PHP?")?>
<b>No!</b>  PHP is free.  It will always be free.  You are under absolutely no obligation
to contribute any money towards the development of PHP.  
<?endEntry()?>

<?makeEntry("Contributions have been received from the following:")?>
<a href="http://www.tummy.com/">Tummy Com Ltd.</a><br>
<a href="http://www.clearink.com/">ClearInk</a><br>
<a href="http://www.fni.net/"><i>FishNet Inc.</i></a><br>
<a href="http://www.netjet.com/">NetJet Communications, Inc.<br>
<?endEntry()?>

<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD VALIGN=middle ALIGN=left rowspan=2>
If you contributed money and you are not listed here (and wish to be), please email us at <A HREF="mailto:core@php.net">core@php.net</A>.
<BR></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>

</TABLE>
<? commonFooter(); ?>
