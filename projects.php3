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

An increasing number of projects, both commercial and Open Source, are using PHP as their main development
tool.  If you want to browse through a list companies using PHP, you can go <a href="/sites.php3">here</a>. 
This page, however, is a listing of cool things based on PHP, available for download.
<P>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>
<? makeEntry("Keystone","www.stonekeep.com/keystone.php3","Dave Belfer-Shevett","shevett@pobox.com"); ?>
Keystone is a web-based application designed to help a workgroup keep
track of issues and tasks via a shared central resource. The system was
designed specifically with the IT department in mind, where quick access
to shared data and history is a requirement. This centralized model works
to help organize the department, as well as giving the group the
information it needs to best serve its customers.

Keystone can be used for:
<ul>
<li>Bug tracking on software projects
<li>Problem ticketing for helpdesk operations
<li>IT department trouble ticketing
<li>Any environment where quick access to historical data on workgroup
activity is a requirement.
</ul>
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

<? makeEntry("IMP","horde.org/imp/","Chuck Hagenbuch","chuck@osmos.ml.org"); ?>
IMP is a set of PHP3 scripts that implement an IMAP based webmail system. 
Assuming you have an account on a server that supports IMAP, you can theoretically 
use an installation of IMP to check your mail from anywhere that you have web access. 
<? endEntry();?>

<? makeEntry("PHP Base Library","phplib.shonline.de","Boris Erdman & Kristian Köhntopp","be@shonline.de"); ?>
The PHP Base Library is a toolkit of extremely useful functions needed in many web applications.
<? endEntry();?>

<? makeEntry("MyAdServer","www.incluso.com","Incluso Networks","wj@incluso.com"); ?>
This is a web adserver using PHP3.0 and MySQL  It includes the following features:
<ul>
<li> &quot;random&quot; rotation of banners on web pages, done by inserting just one line
of PHP code into each page that you would like a banner displayed.
<li> password protected entry into restricted area for both clients and administrator.
<li> within this restricted area, the clients have access to statistics
relevant to their banner, including overall and daily clicks, views, ads
remaining in account, as well as ratio calculations pertaining to banner
view/clicks.
<li> The administrator has the power to:
<ul>
    <li> add client
    <li> modify client
    <li> view overall stats of ad server.
    <li> View each client statistics, both overall and daily.
</ul>
<li> In addition, each client is automatically emailed when their "ads
remaining on account" drops below a specified level.
</ul>
<? endEntry();?>

<? makeEntry("W-Agora","www.araxe.fr/w-agora","Marc Druilhe","mdruilhe@araxe.fr"); ?>
W-Agora is a web-based and customizable forum package. It allows you to install forums, BBS, guestbooks and all derived things.
More than "just another web BBS/forum software", w-agora is designed so you can easily adapt it to your needs. For example you can also use it to: 
<ul>
<li> distribute informations, news, announcements 
<li> diffuse software updates to people on an intranet site 
<li> publish adverts, FAQs, 
<li> allows people to upload documents and share information on your server 
</ul>
<? endEntry();?>

<? makeEntry("Timesheet","www.egr.uri.edu/~kovacsp/timesheet/","Peter Kovacs"
,"kovacsp@egr.uri.edu"); ?>
A multiuser time tracking system.  Users can check in and out and it keeps
track of how long they've worked.
<? endEntry();?>

<? makeEntry("FocalMail","www.focalmail.com/home/index.html","FocalTek"
,"support@focalmail.com"); ?>
FocalMail is a web based email interface which allow you to manage your mail virtually anywhere with any Javascript enabled web browser.
<? endEntry();?>

<? makeEntry("Joe Rock's Beer Recipe Calculator","www.jrock.com/recipe_calc/","Joseph S. Sellinger"
,"jss@jrock.com"); ?>
A web based recipe calculator with a recipe database and other beer related goodies.<br>
<b>Note from Rasmus:</b> This might sound like a trivial little thing, but go have a look.  It is
a very complete and complex site and not your average, &quot;duh.. I like beer site&quot;.
<? endEntry();?>

<? makeEntry("phpMyAdmin","www.htmlwizard.net/phpMyAdmin/","Tobias Ratschiller"
,"tobias@dnet.it"); ?>
phpMyAdmin is intended to handle the basic adminstration of MySQL. Currently it can create and drop 
databases and tables, modify, delete and add records and keys and execute any SQL-statement. It also 
features an overview of MySQL's activity and can import flat-file databases.
<? endEntry();?>

<? makeEntry("SQLFusion","212.208.174.2/sqlfusion/","Philippe Lewicki" ,"plewicki@ixio.com"); ?>
The SQLFusion project is a collection of components in java for
netobject Fusion.
It's an easy and fast way to build php3 and mSQL web sites with NetObject
Fusion.
Its all free under a GNU license.
<? endEntry();?>

<? makeEntry("TWIG","screwdriver.net/twig/","Christopher Heschong" ,"chris@wiw.org"); ?>
TWIG (formerly known as Muppet) came about because several of our users were running Windows 3.x with non-javascript browsers 
(specifically MSIE 3.x for Win3.x). Although we like IMP (http://web.horde.org/imp/), it wasn't exactly 
practical for them to use. Muppet works in every browser we've tested so far, including lynx.
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
