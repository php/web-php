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
	$url2 = strstr($url,'://') ? $url : "http://".$url;
	echo "<A HREF=\"" . $url2."\" TARGET=\"_blank\">".$url2."</A><BR>\n";
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
tool.  If you want to browse through a list companies using PHP, you can go <a href="/sites.php">here</a>. 
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

<? makeEntry("Double Choco Latte","http://dcl.sourceforge.net/","Michael Dean & Tim Norman","mdean@kcnet.com"); ?>
Double Choco Latte is a system for tracking bugs, changes,
enhancements, requests for software. The system is suited for multiple
products and multiple accounts (clients). It is in its infancy now and
should only be downloaded by experienced users. Once the web interface
is completed, a Java 2/Swing enabled version will be started.
<? endEntry();?>

<? makeEntry("Phorum","www.phorum.org/","Brian Moon","brianlmoon@iname.com"); ?>
Forums and message boards are popping up all over the place. To this
point the most popular has been the free perl one at Matt's Script
Archive. This project is trying to design a better forum with the use
of PHP and a database. We are currently using MySQL, but hope to either
have a database independent version or multiple versions for different
databases in the future.
<? endEntry();?>


<? makeEntry("NeoBoard","www.neoqst.com/public/neoboard/neoboard.html","Wankyu Choi","wankyu@neoqst.com"); ?>
NeoBoard is a web based threaded message board written in PHP 3.0.
NeoBoard uses MySQL to manage its messages. If you have some knowlege on PHP,
it won't be too much trouble to get it to work with other database engines.
You need a PHP-enabled web server (or CGI PHP) and MySQL 3.22 or later to
get NeoBoard working.
<? endEntry();?>

<? makeEntry("Ministry of Truth","tomato.nvgc.vt.edu/~hroberts/mot/","Hal Roberts","hroberts@alumni.princeton.edu"); ?>
The Ministry of Truth is a web-based job, equipment, and software
tracking system that works via PHP and MySQL.  MOT is a handy way for
an IT support department to keep track of its support calls in a way
that also maintains change logs for all machines and software packages.
<? endEntry();?>

<? makeEntry("IMP","horde.org/imp/","Chuck Hagenbuch","chuck@osmos.ml.org"); ?>
IMP is a set of PHP 3.0 scripts that implement an IMAP based webmail system. 
Assuming you have an account on a server that supports IMAP, you can theoretically 
use an installation of IMP to check your mail from anywhere that you have web access. 
<? endEntry();?>

<? /* ?>
<? makeEntry("SwellMail","https://www.swellmail.net","Angelos Karageorgiou","angelos@www.datatone.com"); ?>
A PHP based secure email reading interface for IMAP based servers.
<? endEntry();?>
<? */ ?>

<? makeEntry("PHP Base Library","phplib.netuse.de","Boris Erdman & Kristian Köhntopp","kk@netuse.de"); ?>
The PHP Base Library is a toolkit of extremely useful functions needed in many web applications.
<? endEntry();?>

<? makeEntry("DJPIM","ftp://tcomtoo.tcomeng.com/djpim/","Daryl Jones","daryl@tcomeng.com"); ?>
DJPIM is a very simple web-based interface to a MYSQL table that
serves as a priortized list of reminders.  It's designed for rapid
data entry of things to do, like telephone messages, prepare quotations,
and send invoices.  The author uses it as a substitute for a paper
&quot;to do&quot; list.
<? endEntry();?>

<? makeEntry("OBM","http://www.aliacom.fr/obm/","Pierre Baudracco","pierre.baudracco@aliacom.fr"); ?>
OBM is an Intranet application which goal is to help manage a company,
but can be used as a contact database. It is written by Pierre Baudracco,
with contributions by Patrice Bridoux and Pierre Carlier (and more to
come) and released under the terms of the GPL.
<? endEntry();?>

<!-- site is down as of 7/8/1999
<? makeEntry("MyAdServer","www.314interactive.com","3.14Interactive","wj@314interactive.com"); ?>
This is a web adserver using PHP 3.0 and MySQL  It includes the following features:
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
-->

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

<? makeEntry("Timesheet","www.egr.uri.edu/~kovacsp/timesheet/","Peter Kovacs","kovacsp@egr.uri.edu"); ?>
A multiuser time tracking system.  Users can check in and out and it keeps
track of how long they've worked.
<? endEntry();?>

<? makeEntry("FocalMail","www.focalmail.com/home/index.html","FocalTek","support@focalmail.com"); ?>
FocalMail is a web based email interface which allow you to manage your mail virtually anywhere with any Javascript enabled web browser.
<? endEntry();?>

<? makeEntry("Joe Rock's Beer Recipe Calculator","www.jrock.com/recipe_calc/","Joseph S. Sellinger","jss@jrock.com"); ?>
A web based recipe calculator with a recipe database and other beer related goodies.<br>
<b>Note from Rasmus:</b> This might sound like a trivial little thing, but go have a look.  It is
a very complete and complex site and not your average, &quot;duh.. I like beer site&quot;.
<? endEntry();?>

<? makeEntry("phpMyAdmin","www.phpwizard.net/phpMyAdmin/","Tobias Ratschiller","tobias@dnet.it"); ?>
phpMyAdmin is intended to handle the adminstration of MySQL over the
web. Currently it can:
<UL>
<LI>create and drop databases
<LI>create, copy, drop and alter tables
<LI>delete, edit and add fields
<LI>execute any SQL-statement, even batch-queries
<LI>manage keys on fields
<LI>load text files into tables
<LI>create and read dumps of tables
<LI>export data to CSV values
<LI>administer multiple servers and single databases
</UL>
<? endEntry();?>

<? makeEntry("DBE","edseek.com/developers.shtml","Jason Boxman","jasonb@edseek.com"); ?>
DBE is a web-based database interface.
<? endEntry();?>

<? makeEntry("SQLFusion","www.sqlfusion.org","Philippe Lewicki" ,"plewicki@ixio.com"); ?>
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

<? makeEntry("phpAds","www.phpwizard.net/phpAds/","Tobias Ratschiller" ,"tobias@dnet.it"); ?>
phpAds is a free banner management system for PHP. Currently it can
<UL>
<LI>manage multiple clients (each with own login)
<LI>manage multiple banners (any size) per client
<LI>view daily, overall and summary statistics
<LI>send statistics to clients via email
<LI>use HTML, GIF, JPEG and PNG-banners
<LI>show random, pre-defined or HTML/image banners
<LI>show banners belonging to a specific group
<LI>activate and de-activate individual banners
</UL>
<? endEntry();?>

<? makeEntry("The Diary","keilor.cs.umass.edu/diary/index.php3","Agustin Schapira" ,"schapira@cs.umass.edu"); ?>
The Diary lets you keep notebooks and write notes in them. You can add notes or browse through your notes from any 
Web browser anywhere in the world. You can also search inside your notebooks to find
entries that interest you. 
<? endEntry();?>

<? makeEntry("Freemed","www.freemed.org","Jeff B","jeff@univrel.pr.uconn.edu"); ?>
Freemed is a medical management system written using PHP and MySQL.
<? endEntry();?>

<? makeEntry("PHPGem","sptl.org/phpgem/","Nickolas Grebnev","nick@sptl.org"); ?>
PHPGem is a program accelerates the process of creating of PHP scripts for
working with tables.  It works with a variety of SQL servers (PostgreSQL,
MySQL, mSQL, ODBC). You input a description and parameters of your
table's fields (name, on/off searching in the field, etc.). The result
is another PHP script which will work with this tables (view table,
edit table, add/delete entries, search in the tables).
<? endEntry();?>

<? makeEntry("IRM","www.redshift.com/~yramin/atp/irm","Yann Ramin" ,"atrus@montereyhigh.com"); ?>
IRM is a powerful tracking utility for computers and software.  Demos have
been set up where IRM successfully tracked thousands of records. Features
include:
   <ul>
   <li>A complete tracking utility with new and old jobs, followups, and more
   <li>Software to computer relationships: Track the number of licenses of a
piece of software.
   <li>Search utilities that get better every day.
   <li>A comprehensive number of fields, everything from Contact Person to the
NIC brand.
   <li>Multi-user, easy to use and light weight interface, user preferences
   <li>Adding from templates and batch update support (update more than one
computer at a time)
   </ul>
<? endEntry();?>

<?/* site disappeared -- June 12 1999
<? makeEntry("PHPGen","www.byggsoft.se/~mikaelu/","Mikael Ulfenborg" ,"mikael.ulfenborg@byggsoft.se"); ?>
PHPGen is small PHP-script used to make a framework for a new PHP-application. 
<? endEntry();?>
*/?>

<? makeEntry("FishCartSQL","www.fni.com/fcsql/","FishNet&reg;, Inc.","fcsql@fni.com"); ?>
FishCartSQL(sm) is a catalog management system for online e-commerce
solutions; it has been in active use since January 1998. A few of the key
benefits include multiple parallel catalogs, multiple languages, timed
sales, Associate ID tracking, and Web based catalog maintenance. The
order output of FishCartSQL(sm) can be adapted for easy integration with 
existing order processing systems.
<? endEntry();?>

<? makeEntry("EU-Webboard","www.eu-industries.com/produkt.html","EU-Industries","ulrich.eckardt@eu-industries.com"); ?>
EU-Webboard is a Webboard solution for Internet and Intranet-Servers
written in PHP 3.0 with a MySQL-connection. Freeware. (This site is in German.)
<? endEntry();?>

<? makeEntry("Bookmarker","renaghan.com/bookmarker/","Padraic Renaghan",""); ?>
bookmarker is a WWW based application for managing bookmarks. It allows         
multiple users to list, search, maintain, and create bookmarks. It is           
written in PHP using PHPLIB, which allows support for multiple                  
databases. bookmarker includes functions to store URLs and send URLs via        
e-mail directly from your browser (quik-mark, mail-this-link) using
javascript functions that link directly to the application.
<? endEntry();?>

<? makeEntry("MyGuestbook","www.html-design.com/MyGuestbook/","Mark Kronsbein","mk@html-design.com"); ?>
This is a simple guestbook application that uses MySQL and supports
several languages.
<? endEntry();?>

<? makeEntry("PHP3Domo","gateway.digitaria.com/users/chris/php3domo/","Chris Adams","chris@digitaria.com"); ?>
Provides full SMTP validation of a mailing list subscription before forwarding
the request on to Majordomo.
<? endEntry();?>

<? makeEntry("phpHoo","www.webreference.com/perl/xhoo/php1/","CDI","cdi@thewebmasters.net"); ?>
Xhoo is a collaborative project whose goal is to create Open Source
Web Catalog software for various platforms and languages that can
selectively import data from the Open Directory Project. This project
is currently being supported by Webreference.com. Early releases are
currently available for Perl, ASP, and PHP.
<? endEntry();?>

<? makeEntry("kidSister","kidsister.tjw.org","Tony J. White","tjw@tjw.org"); ?>
kidSister is a to-do list and a time logger. It was designed to help
programmers organize many intricate tasks pertaining to multiple projects
as well as keep track of the completion of such tasks. kidSister also has
workgroup-like features that give its users the ability to &quot;spy&quot;  
on each other when granted the proper permission.
<? endEntry();?>

<? makeEntry("Midgard","www.midgard-project.org","The Midgard Project","midgard@greywolves.org"); ?>
Midgard is a freely-available Web application
development and publishing platform based on the popular
PHP scripting language. It is an Open Source development
project, giving you the freedom to create your solutions
in an open environment. Midgard is the tool for
creating, modifying and maintaining dynamic
database-enabled Web services
<? endEntry();?>

<? makeEntry("Phorm","www.holotech.net/scripts.html","Alan Little","darguz@holotech.net"); ?>
The Script Formerly Known As PHPMail. As features were added to PHPMail, its name became inaccurate, as it can now do so much more than just mailing form results, including sending an autoresponder, logging to a text file, and logging to a MySQL database. The next version will support validation of email addresses, credit card numbers and U.S. phone numbers. 
<? endEntry();?>

<? makeEntry("phpDB","http://phpdb.linuxbox.com/","Joe Thong","darkjoe@softhome.net"); ?>
phpDB is a database wrapper that provides a consistent interface to
various database servers thus eliminating the need to port PHP software
to support another database specific server.  Supported database servers
are MySQL, MSQL, PostgreSQL, Microsoft SQL Server, Sybase.
<? endEntry();?>

<? makeEntry("Dominion","http://dominion.styx.net/","Master Phil","philippe@styx.net"); ?>
Dominion is a "Universal Database Administration System Generator". It allows creation of
multifunctional lists, and forms to insert, update and delete data against any kind of
database, just by changing one variable. It just reduces administration time developement
from 10 to 1.
<? endEntry();?>

<? makeEntry("TreeDoc","http://www.softky.com/TreeDoc/","Bill Softky","bill@softky.com"); ?>
TreeDoc allows even php-ignorant page designers to create "Tree Documents," or
"Fluid Documents," in which hyperlinks are opened in boxes in the middle of the
calling page, right below the link, instead of on a new page.  This lets you
open a document's sections, subsections, definitions etc. just like you would
open sub-folders in a "tree control."  The recursive code is encapsulated in php
tags analogous to HTML &lt;a href="..."&gt; tags, so non-programmers can create such
documents.  
<? endEntry(); ?>

<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD VALIGN=middle ALIGN=left rowspan=2>
If you have a project you feel belongs on this list, send us email us at 
<A HREF="mailto:projects@php.net">projects@php.net</A> (we consider a project to be 
a software package where the code is available for download).  If you have a site that 
uses PHP, you may want to add it to the <a href="/sites.php">sites page</a>.
<BR></TD>
<TD ALIGN=right WIDTH=18><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>

</TABLE>

<? commonFooter(); ?>
