<?
require("shared.inc");
commonHeader("PHP 3.0 Development Credits"); 

function makeMail($mail) {
	$mail = ereg_replace('@', '&#64;', $mail);
	echo "<A HREF=\"mailto:$mail\">$mail</A>";
};

function makeName($name,$email,$size=0) {
	if ($size!=0):
		echo "<FONT SIZE=+$size><B>$name</B></FONT> - \n";
	else:
		echo "<B>$name</B> - \n";
	endif;
	echo "<FONT SIZE=-1>";
	makeMail($email);
	echo "</FONT><BR>\n";
};

?>

<TABLE border=0 cellpadding=0 cellspacing=0 WIDTH=100%>
<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left WIDTH=18><IMG SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD ALIGN=left WIDTH=100%><FONT SIZE=+1 FACE="<? echo $FONTFACE;?>"><B>Core Developers</B></FONT><BR></TD>
<TD ALIGN=right WIDTH=18><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>
<TR VALIGN=top><TD></TD><TD><FONT FACE="<? echo $FONTFACE;?>">

<? makeName("Rasmus Lerdorf","rasmus@php.net",1);?>

<li>Concept
<li>Original language definition and implementation
<li>CGI loader and many internal functions
<li>Apache module support
<li>SNMP module
<li>Original mSQL, MySQL and Sybase modules
<li>Project Coordinator
<BR><BR>

<? makeName("Andi Gutmans","andi@php.net",1);?>
<? makeName("&  Zeev Suraski","zeev@php.net",1);?>

<li>New language definition and implementation
<li>Internal functions API design
<li>General hash table implementation for symbol tables, arrays and objects
<li>Memory manager
<li>Token cache manager
<li>Several internal functions and migration from PHP 2.0
<li>Syntax highlighting mode
<li>Configuration file parser
<li>New persistent/multilink MySQL, PosgresSQL, Sybase and mSQL modules
<BR><BR>

<? makeName("Stig Bakken","ssb@guardian.no",1);?>

<li>Oracle support
<li>configure/install script work
<li>sprintf reimplementation
<li>SGML documentation framework
<li>Loadable font support
<li>ODBC work
<BR><BR>

<? makeName("Shane Caraveo","shane@caraveo.com",1);?>

<li>Porting to Visual C++
<li>Generalization to support different server APIs
<li>Work on ISAPI and NSAPI APIs
<BR><BR>

<? makeName("Jim Winstead","jimw@php.net",1);?>

<li>Lots of PHP2 -> PHP3 porting
<li>dBase support
<li>URL parsing functions
<li>Makefile work
<li>Regex rewrite
<li>Win32 work
<BR><BR>

</TD><TD></TD></TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>

<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left WIDTH=18><IMG SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD ALIGN=left WIDTH=100%><FONT SIZE=+1 FACE="<? echo $FONTFACE;?>"><B>Major Contributors</B></FONT><BR></TD>
<TD ALIGN=right WIDTH=18><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>
<TR VALIGN=top><TD></TD><TD><FONT FACE="<? echo $FONTFACE;?>">

<? makeName("Bjørn Borud","borud@guardian.no");?>
  <li>soundex code and lots of enthusiasm<BR><BR>

<? makeName("Dean Gaudet","dgaudet@arctic.org");?>
  <li>Apache module debugging + helpful hints along the way<BR><BR>

<? makeName("Mitch Golden","mgolden@interport.net");?>
  <li>Oracle testing and bug fixes<BR><BR>

<? makeName("Simon Gornall","simon@oyster.co.uk");?>
  <li>Illustra<BR><BR>

<? makeName("Mark Henderson","mark@togglemedia.com");?>
  <li>Various odds and ends<BR><BR>

<? makeName("Jaakko Hyvätti","jaakko@hyvatti.iki.fi");?>
  <li>Prototype cop, regular expression code fixes and CGI security issues<BR><BR>

<? makeName("Andreas Karajannis","Andreas.Karajannis@gmd.de");?>
  <li>Adabas D, ODBC<BR><BR>

<? makeName("Muhammad A Muquit","MA_Muquit@fccc.ed");?>
  <li>Original Sybase module<BR><BR>
  
<? makeName("Jeroen van der Most","jvdmost@digiface.nl");?>
  <li>Solid<BR><BR>
  
<? makeName("Chad Robinson","chadr@brttech.com");?>
  <li>Documentation, FilePro<BR><BR>

<? makeName("John Robinson","john@intelligent.co.uk");?>
  <li>Postgres<BR><BR>

<? makeName("Lachlan Roche","lr@www.wwi.com.au");?>
  <li>MD5<BR><BR>
  
<? makeName("Brian Schaffner","brian@tool.net");?>
  <li>ODBC Support, PHP3 API testing<BR><BR>

<? makeName("sopwith@redhat.com","sopwith@redhat.com");?>
  <li>Solid<BR><BR>
  
<? makeName("Adam Sussman","asussman@vidya.com");?>
  <li>Postgres<BR><BR>

<? makeName("Colin Viebrock","cmv@privateworld.com");?>
  <li>Website graphic design and layout, PHP logo<BR><BR>

<? makeName("Lars Torben Wilson","cslawi@uta.fi");?>
  <li>Documentation<BR><BR>

<hr noshade width="100%" size=1>
<font size="-1">
Andi Gutmans and Zeev Suraski would like to thank Prof. Michael Rodeh for his
positive input during the initial development of the interpreter.<BR>
</font>
</TD><TD></TD></TR>

</TABLE>
<?
commonFooter();
?>
