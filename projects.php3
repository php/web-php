<?
require("shared.inc");
commonHeader("Projects");

function makeEntry($project,$url,$name,$email) {
	global $FONTFACE;
?>
<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=left rowspan=2>
<?
	echo "<FONT FACE=\"$FONTFACE\" SIZE=-1><FONT SIZE=+0>\n";
	echo "<B>$project</B><BR></FONT>\n";
	echo "<A HREF=\"http://".$url."\" TARGET=\"_blank\">".$url."</A><BR>\n";
	if ($email):
		echo "by <A HREF=\"mailto:".$email."\">".$name."</A><BR>\n";
	else:
		echo "by ".$name."<BR>\n";
	endif;
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
<h3>Projects using PHP</h3>

An increasing number of projects, both commercial and open source, are using PHP as their main development
tool.  If you want to browse through a list companies using PHP, you can go <a href="/sites.php3">here</a>. 
This page, however, is a listing of cool things based on PHP, available for download.
<P>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>
<? makeEntry("Keystone","www.stonekeep.com/keystone/","Dave Belfer-Shevett","shevett@pobox.com"); ?>
Keystone is the next generation of PTS, the project tracking system developed by Dave Belfer-Shevett. It is
a complete rewrite of the system, with a new user interface built from the ground up. 
<? endEntry();?>

<? makeEntry("Phorum","www.phorum.org/","Brian Moon","brianlmoon@iname.com"); ?>
Forums and message boards are popping up all over the place. To this point the most 
popular has been the free perl one at Matt's Script Archive. This project is trying
to design a better forum with the use of PHP and a database. We are currently using
MySQL, but hope to either have a database independent version or multiple versions for
different databases in the future.
<? endEntry();?>

<? makeEntry("Ministry of Truth","tomato.nvgc.vt.edu/~hroberts/mot/","Hal Roberts","hroberts@alumni.princeton.edu"); ?>
The Ministry of Truth is a web-based job, equipment, and software
tracking system that works via PHP and MySQL.  MOT is a handy way for
an IT support department to keep track of its support calls in a way
that also maintains change logs for all machines and software packages.
<? endEntry();?>

<? makeEntry("IMP","osmos.ml.org/projects/imp/","Chuck Hagenbuch","chuck@osmos.ml.org"); ?>
IMP is a set of PHP3 scripts that implement an IMAP based webmail system. 
Assuming you have an account on a server that supports IMAP, you can theoretically 
use an installation of IMP to check your mail from anywhere that you have web access. 
<? endEntry();?>

<? makeEntry("PHP Base Library","phplib.shonline.de","Boris Erdman & Kristian Köhntopp","be@shonline.de"); ?>
The PHP Base Library is a toolkit of extremely useful functions needed in many web applications.
<? endEntry();?>

<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD VALIGN=middle ALIGN=left rowspan=2>
If you have a project you feel belongs on this list, send us email us at <A HREF="mailto:projects@php.net">projects@php.net</A>.
If you have a site that uses PHP, you may want to add it to the <a href="/sites.php3">sites page</a>.
<BR></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>

</TABLE>

<? commonFooter(); ?>
