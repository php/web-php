<?
require("shared.inc");
commonHeader("PHP 3.0 Development Credits"); 

function makeMail($mail) {
	$mail = ereg_replace('@', '&#64;', $mail);
	echo "<A HREF=\"mailto:$mail\">$mail</A>";
};

function makeName($name,$email,$size) {
	echo "<DT>";
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
<DL>
<? makeName("Rasmus Lerdorf","rasmus@php.net",1);?>
<UL TYPE=DISC>
<li>Concept
<li>Original language definition and implementation
<li>CGI loader and many internal functions
<li>Apache module support
<li>SNMP module
<li>Original mSQL, MySQL and Sybase modules
<li>Oracle module work
<li>Project Coordinator
</UL><BR>

<? makeName("Andi Gutmans","andi@php.net",1);?>
<? makeName("&  Zeev Suraski","zeev@php.net",1);?>
<UL TYPE=DISC>
<li>New language definition and implementation
<li>Internal functions API design
<li>General hash table implementation for symbol tables, arrays and objects
<li>Memory manager
<li>Token cache manager
<li>A lot of internal functions (including hebrev :) and migration from PHP 2.0
<li>Syntax highlighting mode
<li>Configuration file parser
<li>New persistent/multilink MySQL, PosgresSQL, Sybase and mSQL modules
</UL><BR>

<? makeName("Stig Bakken","ssb@guardian.no",1);?>
<UL TYPE=DISC>
<li>Oracle support
<li>configure/install script work
<li>sprintf reimplementation
<li>SGML documentation framework
<li>Loadable font support
<li>ODBC work
</UL><BR>

<? makeName("Shane Caraveo","shane@caraveo.com",1);?>
<UL TYPE=DISC>
<li>Porting to Visual C++
<li>Generalization to support different server APIs
<li>Work on ISAPI and NSAPI APIs
</UL><BR>

<? makeName("Jim Winstead","jimw@php.net",1);?>
<UL TYPE=DISC>
<li>Lots of PHP2 -> PHP3 porting
<li>dBase support
<li>URL parsing functions
<li>Makefile work
<li>Regex rewrite
<li>Win32 work
</UL><BR>

</DL>
</TD><TD></TD></TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>

<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left WIDTH=18><IMG SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD ALIGN=left WIDTH=100%><FONT SIZE=+1 FACE="<? echo $FONTFACE;?>"><B>Major Contributors</B></FONT><BR></TD>
<TD ALIGN=right WIDTH=18><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>
<TR VALIGN=top><TD></TD><TD><FONT FACE="<? echo $FONTFACE;?>">
<DL>

<? makeName("Bjørn Borud","borud@guardian.no",0);?>
  <UL TYPE=DISC><li>soundex code and lots of enthusiasm</UL><BR>

<? makeName("Dean Gaudet","dgaudet@arctic.org",0);?>
  <UL TYPE=DISC><li>Apache module debugging + helpful hints along the way</UL><BR>

<? makeName("Mitch Golden","mgolden@interport.net",0);?>
  <UL TYPE=DISC><li>Oracle testing and bug fixes</UL><BR>

<? makeName("Simon Gornall","simon@oyster.co.uk",0);?>
  <UL TYPE=DISC><li>Illustra</UL><BR>

<? makeName("Mark Henderson","mark@togglemedia.com",0);?>
  <UL TYPE=DISC><li>Various odds and ends</UL><BR>

<? makeName("Jaakko Hyvätti","jaakko@hyvatti.iki.fi",0);?>
  <UL TYPE=DISC><li>Prototype cop, regular expression code fixes and CGI security issues</UL><BR>

<? makeName("Andreas Karajannis","Andreas.Karajannis@gmd.de",0);?>
  <UL TYPE=DISC><li>Adabas D, ODBC, Oracle</UL><BR>

<? makeName("Muhammad A Muquit","MA_Muquit@fccc.ed",0);?>
  <UL TYPE=DISC><li>Original Sybase module</UL><BR>
  
<? makeName("Jeroen van der Most","jvdmost@digiface.nl",0);?>
  <UL TYPE=DISC><li>Solid</UL><BR>
  
<? makeName("Chad Robinson","chadr@brttech.com",0);?>
  <UL TYPE=DISC><li>Documentation, FilePro</UL><BR>

<? makeName("John Robinson","john@intelligent.co.uk",0);?>
  <UL TYPE=DISC><li>Postgres</UL><BR>

<? makeName("Lachlan Roche","lr@www.wwi.com.au",0);?>
  <UL TYPE=DISC><li>MD5</UL><BR>
  
<? makeName("Brian Schaffner","brian@tool.net",0);?>
  <UL TYPE=DISC><li>ODBC Support, PHP3 API testing</UL><BR>

<? makeName("sopwith@redhat.com","sopwith@redhat.com",0);?>
  <UL TYPE=DISC><li>Solid</UL><BR>
  
<? makeName("Adam Sussman","asussman@vidya.com",0);?>
  <UL TYPE=DISC><li>Postgres</UL><BR>

<? makeName("Colin Viebrock","cmv@privateworld.com",0);?>
  <UL TYPE=DISC><li>Website graphic design and layout, PHP logo</UL><BR>

<? makeName("Lars Torben Wilson","cslawi@uta.fi",0);?>
  <UL TYPE=DISC><li>Documentation</UL><BR>

</DL>
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
