<?
require("shared.inc");
commonHeader("PHP 3.0 Development Credits"); 

function makeMail($mail) {
	echo "(<A HREF=\"mailto:$mail\">$mail</A>)";
};
?>

<center><h1><font color="#5B69A6">Core Developers</font></h1></center>

<table><tr><td>
<h3>Rasmus Lerdorf <? makeMail("rasmus@lerdorf.on.ca");?></h3>

<ul>
<li>Concept
<li>Original language definition and implementation
<li>CGI loader and many internal functions
<li>Apache module support
<li>SNMP module
<li>Original mSQL, MySQL and Sybase modules
<li>Project Coordinator
</ul>

<hr noshade width="80%" size=1>

<table><tr><td align="center">
<h3>Andi Gutmans <? makeMail("andi@php.net</A>");?></h3>
&
<h3>Zeev Suraski <? makeMail("zeev@php.net");?></h3>
</td></tr></table>

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

<hr noshade width="80%" size=1>

<h3>Stig Bakken <? makeMail("ssb@guardian.no");?></h3>

<ul>
<li>Oracle support
<li>configure/install script work
<li>sprintf reimplementation
<li>SGML documentation framework
<li>Loadable font support
<li>ODBC work
</ul>


<hr noshade width="80%" size=1>

<h3>Shane Caraveo <? makeMail("shane@caraveo.com");?></h3>

<ul>
<li>Porting to Visual C++
<li>Generalization to support different server APIs
<li>Work on ISAPI and NSAPI APIs

</ul>

<hr noshade width="80%" size=1>

<h3>Jim Winstead <? makeMail("jimw@php.net");?></h3>

<ul>
<li>Lots of PHP2 -> PHP3 porting
<li>dBase support
<li>URL parsing functions
<li>Makefile work
<li>Regex rewrite
<li>Win32 work
</ul>

</td></tr></table>

<hr noshade width="80%" size=1>

<center><h1><font color="#5B69A6">Major Contributors</font></h1></center>

<ul>
<li>Bjørn Borud <? makeMail("borud@guardian.no");?>
  <ul><li>soundex code and lots of enthusiasm</ul>

<li>Dean Gaudet <? makeMail("dgaudet@arctic.org");?>
  <ul><li>Apache module debugging + helpful hints along the way</ul>

<li>Mitch Golden <? makeMail("mgolden@interport.net");?>
  <ul><li>Oracle testing and bug fixes</ul>

<li>Simon Gornall <? makeMail("simon@oyster.co.uk");?>
  <ul><li>Illustra</ul>

<li>Mark Henderson <? makeMail("mark@togglemedia.com");?>
  <ul><li>Various odds and ends</ul>

<li>Jaakko Hyvätti <? makeMail("jaakko@hyvatti.iki.fi");?>
  <ul><li>Prototype cop, regular expression code fixes and CGI security issues</ul>

<li>Andreas Karajannis <? makeMail("Andreas.Karajannis@gmd.de");?>
  <ul><li>Adabas D, ODBC</ul>

<li>Muhammad A Muquit <? makeMail("MA_Muquit@fccc.ed");?>
  <ul><li>Original Sybase module</ul>
  
<li>Jeroen van der Most <? makeMail("jvdmost@digiface.nl");?>
  <ul><li>Solid</ul>
  
<li>Chad Robinson <? makeMail("chadr@brttech.com");?>
  <ul><li>Documentation, FilePro</ul>

<li>John Robinson <? makeMail("john@intelligent.co.uk");?>
  <ul><li>Postgres</ul>

<li>Lachlan Roche <? makeMail("lr@www.wwi.com.au");?>
  <ul><li>MD5</ul>
  
<li>Brian Schaffner <? makeMail("brian@tool.net");?>
  <ul><li>ODBC Support, PHP3 API testing</ul>

<li><? makeMail("sopwith@redhat.com");?>
  <ul><li>Solid</ul>
  
<li>Adam Sussman <? makeMail("asussman@vidya.com");?>
  <ul><li>Postgres</ul>

<li>Colin Viebrock <? makeMail("cmv@privateworld.com");?>
  <ul><li>Website graphic design and layout, PHP logo</ul>

<li>Lars Torben Wilson <? makeMail("cslawi@uta.fi");?>
  <ul><li>Documentation</ul>

<hr noshade width="80%" size=1>
<font size="-1">
Andi Gutmans and Zeev Suraski would like to thank Prof. Michael Rodeh for his
positive input during the initial development of the interpreter.
</font>
<br>
<?
commonFooter();
?>
