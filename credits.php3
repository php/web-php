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
<TD ALIGN=left WIDTH=100%><FONT SIZE=+1 <? echo $FONTFACEATTR;?>><B>Core Developers</B></FONT><BR></TD>
<TD ALIGN=right WIDTH=18><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>
<TR VALIGN=top><TD></TD><TD><FONT <? echo $FONTFACEATTR;?>>

<? makeName("Rasmus Lerdorf","rasmus@php.net",1);?>
<ul>
<li>Concept
<li>Original language definition and implementation
<li>CGI loader and many internal functions
<li>Apache module support
<li>SNMP module
<li>Original mSQL, MySQL and Sybase modules
<li>Project Coordinator
</ul>

<? makeName("Andi Gutmans","andi@php.net",1);?>
<? makeName("&  Zeev Suraski","zeev@php.net",1);?>
<ul>
<li>New language definition and implementation
<li>Internal functions API design
<li>General hash table implementation for symbol tables, arrays and objects
<li>Memory manager
<li>Token cache manager
<li>Several internal functions and migration from PHP 2.0
<li>Syntax highlighting mode
<li>Configuration file parser
<li>New persistent/multilink MySQL, PosgresSQL, Sybase and mSQL modules
</ul>

<? makeName("Stig Bakken","ssb@guardian.no",1);?>
<ul>
<li>Oracle support
<li>configure/install script work
<li>sprintf reimplementation
<li>SGML documentation framework
<li>Loadable font support
<li>ODBC work
</ul>

<? makeName("Shane Caraveo","shane@caraveo.com",1);?>
<ul>
<li>Porting to Visual C++
<li>Generalization to support different server APIs
<li>Work on ISAPI and NSAPI APIs
</ul>

<? makeName("Jim Winstead","jimw@php.net",1);?>
<ul>
<li>Lots of PHP2 -> PHP3 porting
<li>dBase support
<li>URL parsing functions
<li>Makefile work
<li>Regex rewrite
<li>Win32 work
</ul>

</TD><TD></TD></TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>

<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left WIDTH=18><IMG SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD ALIGN=left WIDTH=100%><FONT SIZE=+1 <? echo $FONTFACEATTR;?>><B>Major Contributors</B></FONT><BR></TD>
<TD ALIGN=right WIDTH=18><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>
<TR VALIGN=top><TD></TD><TD><FONT <? echo $FONTFACEATTR;?>>

<? makeName("Bjørn Borud","borud@guardian.no");?>
  <ul><li>soundex code and lots of enthusiasm</ul>

<? makeName("Dean Gaudet","dgaudet@arctic.org");?>
  <ul><li>Apache module debugging + helpful hints along the way</ul>

<? makeName("Mitch Golden","mgolden@interport.net");?>
  <ul><li>Oracle testing and bug fixes</ul>

<? makeName("Simon Gornall","simon@oyster.co.uk");?>
  <ul><li>Illustra</ul>

<? makeName("Mark Henderson","mark@togglemedia.com");?>
  <ul><li>Various odds and ends</ul>

<? makeName("Jaakko Hyvätti","jaakko@hyvatti.iki.fi");?>
  <ul><li>Prototype cop, regular expression code fixes and CGI security issues</ul>

<? makeName("Andreas Karajannis","Andreas.Karajannis@gmd.de");?>
  <ul><li>Adabas D, ODBC</ul>

<? makeName("Muhammad A Muquit","MA_Muquit@fccc.ed");?>
  <ul><li>Original Sybase module</ul>
  
<? makeName("Jeroen van der Most","jvdmost@digiface.nl");?>
  <ul><li>Solid</ul>
  
<? makeName("Chad Robinson","chadr@brttech.com");?>
  <ul><li>Documentation, FilePro</ul>

<? makeName("John Robinson","john@intelligent.co.uk");?>
  <ul><li>Postgres</ul>

<? makeName("Lachlan Roche","lr@www.wwi.com.au");?>
  <ul><li>MD5</ul>
  
<? makeName("Brian Schaffner","brian@tool.net");?>
  <ul><li>ODBC Support, PHP3 API testing</ul>

<? makeName("sopwith@redhat.com","sopwith@redhat.com");?>
  <ul><li>Solid</ul>
  
<? makeName("Adam Sussman","asussman@vidya.com");?>
  <ul><li>Postgres</ul>

<? makeName("Colin Viebrock","cmv@privateworld.com");?>
  <ul><li>Website graphic design and layout, PHP logo</ul>

<? makeName("Lars Torben Wilson","cslawi@uta.fi");?>
  <ul><li>Documentation</ul>

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
