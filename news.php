<?
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
<h1>PHP in the News</h1>

<P>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%>

<? makeEntry ("Why PHP?", "by <A HREF=\"mailto:the_jalal@yahoo.com\">Jalal Pushman</A>",
    "http://www.WebDevelopersJournal.com/articles/why_php.html", "November 7, 2000");?>
According to NetCraft surveys, PHP is now the most popular module for the Apache server and in total running on something like two million Web sites. Here are some of the reasons why PHP is such a popular server side scripting language.
<? endEntry(); ?>

<? makeEntry ("The Scoop on PHP - Want a Cure For the ASP Blues? Delve Into the Dynamic Web With This Popular Scripting Language", "by Craig Knudsen",
    "http://www.linux-mag.com/online/php_01.html", "September 14, 2000");?>
I first discovered PHP a little over a year ago at Freshmeat.net. Because most non-commercial sites at that time used Perl CGI scripts for dynamic content, I found it interesting that Freshmeat's dynamic pages all ended with .php3 instead of the .pl or .cgi associated with Perl/CGI sites like Slashdot. I did a little exploring, quickly downloaded PHP version 3, and immediately became a PHP fan.
<? endEntry(); ?>

<? makeEntry( "LinuxTag - some impressions", "by <a href=\"mailto:winni@xpilot.org\">Winfried Tr&uuml;mper</a>",
    "http://www.guug.de:8080/fotos/linuxtag/story/index.html", "July, 2000");?>
The literal translation of LinuxTag is LinuxDay. This title is a leftover from ancient times, when the event really lasted one day. This year the event occupied the fair in Stuttgart for four whole days, beginning at thurday with a business congress. For those commercially relevant lectures you had to pay. However, a total of over 100 hours of free lectures followed from friday to sunday, addressing the interests of end-users and developers. During all days companies and free software developers showed their Linux-products on an area of 6.000 m². An estimated number of 17.000 people visited the LinuxTag, making it a big success to be repeated next year. 
<? endEntry(); ?>

<? makeEntry ("Brennpunkt WWW", "by <a href=\"mailto:tobias@dnet.it\">Tobias Ratschiller</a>",
    "http://www.heise.de/ix/artikel/2000/07/052/", "June 23, 2000");?>
(In German.) Maßgeschneidert für das Web: PHP 4.0.  Mit der am 22. Mai freigegebenen Version 4.0 wandelt sich PHP von der Skriptsprache für kleine und mittlere Webanwendungen zur umfangreichen Middleware-Technik.
<? endEntry(); ?>

<? makeEntry( "Are PHP and MySQL the Perfect Couple?", "by <a href=\"http://www.oreillynet.com/pub/au/77\">Jason Gilmore</a>",
    "http://www.oreillynet.com/pub/a/network/2000/06/16/magazine/php_mysql.html", "June 16, 2000");?>
MySQL and PHP have developed a special sort of relationship over the past few years, perhaps due in large part to the fact that they are both freely available for download. The increased popularity of this dynamic duo, coupled with boundless enthusiasm from core developers of both technologies, culminated in a "meeting of the minds" in Israel earlier this year. This resulted in the MySQL library being packaged with the PHP 4.0 distribution, in addition to an agreement to help each other improve the performance quality of product integration whenever the opportunity arises.
<? endEntry(); ?>

<? makeEntry( "Your SQL Database Might Just Be MySQL", "by <a href=\"http://www.oreillynet.com/pub/au/75\">John Paul Ashenfelter</a>",
    "http://www.oreillynet.com/pub/a/network/2000/06/16/magazine/mysql.html", "June 16, 2000");?>
So you need to build a database application that will be delivered over the Web. Your users have the browsers, you've got the web server and application software, but you need a database. What are your choices?
<? endEntry(); ?>

<? makeEntry( "Student Suspended Over Suspected Use of PHP", "by National News",
    "http://bbspot.com/News/2000/6/php_suspend.html", "June 14, 2000");?>
"A teacher overheard him say that he was using PHP, and as part of our Zero-Tolerance policy against drug use, he was immediately suspended. No questions asked," said Principal Clyde Thurlow.  "We're not quite sure what PHP is, but we suspect it may be a derivative of PCP, or maybe a new designer drug like GHB."
<? endEntry(); ?>

<? makeEntry( "Object-Oriented Programming with PHP", "by <a mailto:href=\"mailto:wj@unstrung.com\">Jason Gilmore</a>",
    "http://www.webreview.com/2000/06_02/developers/06_02_00_3.shtml", "June 2, 2000");?>
Couple Object-Oriented Programming with PHP and you've got features
worth inheriting. From foundations to class to inheritance, Jason makes
understanding objects within PHP easy--and practical.
<? endEntry(); ?>

<? makeEntry( "PHP From an IT Manager's Perspective", "by <a mailto:href=\"mailto:tobias@phpwizard.net\">Tobias Ratschiller</a>",
    "http://idm.internet.com/articles/200005/php_05_30_00a.html", "May 31, 2000");?>
What have sprint.ca, livebid.amazon.com, xoom.com, and mp3.lycos.com in
common? All employ one of the Web's hottest server side technologies: PHP,
the PHP Hypertext Preprocessor. As this article shows, PHP over the years
had the opportunity to strengthen its core base and to integrate more
features, and provides today a base that can easily stand out in the
increasingly crowded server-side application development platform market.
<? endEntry(); ?>

<? makeEntry( "PHP 4.0: Dynamic Content for the Web Warrior", "by <a href=\"mailto:paulferris@linuxtoday.com\">Paul Ferris</a>", 
	"http://www.linuxplanet.com/linuxplanet/reviews/1891/1/", "May 28, 2000");?>
If you've been cruising the net, looking for the latest and greatest things, you often come across vaporware technologies, and promises that are made and broken. You might find yourself imagining things, like over-hyped proprietary products coming down the pike, where the choices had been open in the past. 
<? endEntry(); ?>

<? makeEntry( "MySQL-Daten mit PHP ins Web bringen", "by <a href=\"mailto:hb@ix.heise.de\">Henning Behme</a>", 
	"http://www.heise.de/ix/artikel/2000/06/056/", "May 17, 2000");?>
(In German.) Dynamische Websites sind meist von Datenbanken abhängig. Deren Bestände lassen sich `on the fly' vom Server zu Surfer übertragen. PHP ist eine Skriptsprache, die die Integration von DBMS-Daten in HTML-Dateien erleichtert.
<? endEntry(); ?>

<? makeEntry( "Evolution of a Super Hero", "by <a href=\"mailto:tobias@dnet.it\">Tobias Ratschiller</a>", 
	"http://www.webtechniques.com/archives/2000/05/ratschiller/", "April 7, 2000");?>
What's that in the sky? Is it Perl? Is it ASP? Is it JSP? No, it's PHP 4.0!
Tobias Ratschiller has the inside story on what you can expect from release
candidate 1.
<? endEntry(); ?>

<? makeEntry( "PHP and XML, technical or cultural gap?", "by <a href=\"http://www.xmlhack.com/author.php?id=8\">Eric van der Vlist</a>", 
	"http://www.xmlhack.com/read.php?item=338", "March 14, 2000");?>
Classified as "the most popular Apache module" by E-Soft, PHP is one of the least frequently mentioned languages amongst the XML discussion lists.
<? endEntry(); ?>

<? makeEntry( "Under The Hood of PHP 4", "by Zeev Suraski",
	"http://www.zend.com/zend/art/under-php4-hood.php", "February 27, 2000");?>

Describes the major differences and improvements in the next generation PHP, PHP 4.
<? endEntry(); ?>

<? makeEntry( "PHP: Past, Present, and Future", "by Rasmus Lerdorf, Stig Bakken, Andi Gutmans, and Zeev Suraski", 
	"http://hotwired.lycos.com/webmonkey/radio/php.html", "February 27, 2000");?>
You may already know that PHP is fast, stable, and easy to learn, but you may not know how it got that way. In this interview, Rasmus Lerdorf, the creator of PHP, talks about the unlikely origins of this open-source product. Then core developers Stig Bakken, Andi Gutmans, and Zeev Suraski explain how they came to work on PHP and discuss the evolution of the language. Plus, you'll hear about the planned support for XML and MySQL and what's going on with Zend.
<? endEntry(); ?>

<? makeEntry( "Template-Based Web Sites as Easy as P-H-P", "by <a href=\"http://www.webreview.com/pub/au/Gilmore_Jason\">Jason Gilmore</a>",
	"http://www.webreview.com/pub/2000/02/11/php/index.html", "February 11, 2000");?>
Tutorial for creating template-based Web sites with PHP.
<? endEntry(); ?>

<? makeEntry( "Authenticate and Track Users with PHP", "by <a href=\"mailto:jcm@i2ii.com\">Julie Meloni</a>", 
	"http://hotwired.lycos.com/webmonkey/00/05/index2a.html", "February 2, 2000");?>
Shows you the basics of PHP-based user authentication, the use of cookies, and a short glimpse (with working examples!) at the session functions of PHP4.  The article was written by Julie Meloni, author of <a href="http://www.thickbook.com/">PHP Essentials</a>, a book for the beginning or intermediate PHP user, available in March at a bookstore near you.
<? endEntry(); ?>

<? makeEntry( "What you should know about PHP", "by <a href=\"mailto:gilmore@cob.ohio-state.edu\">Jason Gilmore</a>", 
	"http://webreview.com/pub/2000/01/21/feature/index.html", "January 21, 2000");?>
PHP can help you look like a web-wunderkid while saving you hours of drudgery.
<? endEntry(); ?>

<? makeEntry( "PHP: a silent killer", "by <a href=\"mailto:jim.white@sreb.org\">Jim White</a>", 
	"http://www.osopinion.com/Opinions/JimWhite/JimWhite5.html", "December 22, 1999");?>
PHP is now running over a million web sites and with good reason. PHP is open source, it runs equally well on NT and UNIX, it's well documented. PHP is no doubt stealing market share from Microsoft's Active Server Pages, but the media has been unusually quiet about the issue. Even as Apache's success has become front page news, PHP has gone largely unnoticed. Maybe Microsoft wants to keep it that way.
<? endEntry(); ?>

<? makeEntry( "Welcome Zend", "by <a href=\"mailto:gmerrall@email.com\">Graeme Merral</a>", 
	"http://hotwired.lycos.com/webmonkey/99/51/index3a.html", "December 16, 1999");?>
Optimization - PHP vs. ASP - New Features - Geeky Features
<? endEntry(); ?>

<? makeEntry( "The latest best-kept secret", "by <a href=\"mailto:glyn_moody@cix,co.uk\">Glyn Moody</a>", 
	"http://www.computerweekly.com/cwarchive/gwfeat/19991209/cwcontainer.asp?name=F1.html", "December 9, 1999");?>
With the same features as ASP and JSP, PHP is the fastest growing Apache add-on.
<? endEntry(); ?>

<? makeEntry( "Trio informale", "by <a href=\"mailto:nicht_ich@gmx.de\">Dirk Reichelt</a>", 
	"http://www.zdnet.de/internet/artikel/java/199912/phpdatenbank01_00-wc.html", "November 29, 1999");?>
(In German.) &quot;Redaktionssystem für die Website mit PHP&quot;
<? endEntry(); ?>

<? makeEntry( "Interview with the PHP Team", "by <a href=\"mailto:lpdevel@linuxpower.org\">Linuxpower Team</a>", 
	"http://www.linuxpower.org/display_item.phtml?id=149", "November 17, 1999");?>
An interview with the core PHP development team: Andi, Andrei, Jim, Rasmus, Sascha, Stig, Thies, and Zeev.
<? endEntry(); ?>

<? makeEntry( "Web-Page Generator PHP Gets A Much-Needed Jolt in Version 4", "by Ahmad Abualsamid", 
	"http://www.techweb.com/se/directlink.cgi?NWC19991101S0014", "November 1, 1999");?>
PHP began as a small project to enhance a single Web site; it eventually became the most popular server-side scripting language for use with Apache. 
<? endEntry(); ?>

<? makeEntry( "PHP-Einf&uuml;hrung", "by <a href=\"mailto:tobias@dnet.it\">Tobias Ratschiller</a>", 
	"http://www.internetworld.de/iw/magazin_11phpeinfuehrung.htm", "October 20, 1999");?>
(In German.) &quot;Over ten percent of all web servers have the scripting
language PHP installed. Internet World shows you how to create dynamic
web pages with PHP.&quot; Introduction to PHP in four parts.&quot;
<? endEntry(); ?>

<? makeEntry( "PHP: One Size Fits All", "by Niels Pollem","http://www.heise.de/ix/artikel/1999/07/076/", "July 19, 1999");?>
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
<A HREF="/oldnews.php">Link to older articles</A><BR></FONT>
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
