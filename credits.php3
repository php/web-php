<?
require("shared.inc");
commonHeader("PHP 3.0 Development Credits"); 

$KICKS=(($NS4 || $IE4) && !$DISABLE_KICKOUTS);

$names_per_line = 3;
$CORE = array(
	"rasmus"	=> array ("Rasmus Lerdorf","rasmus@php.net"),
	"andi"	=> array ("Andi Gutmans","andi@php.net"),
	"zeev"	=> array ("Zeev Suraski","zeev@php.net"),
	"stig"	=> array ("Stig Bakken","ssb@guardian.no"),
	"shane"	=> array ("Shane Caraveo","shane@caraveo.com"),
	"jim"		=> array ("Jim Winstead","jimw@php.net")
);

if ($KICKS):
	echo "<SCRIPT LANGUAGE=\"JavaScript\"><!--\n";
	echo "function popUpCore(name) {\n";
	reset($CORE);
	while (list($key,$value)=each($CORE)):
		echo "	popUp('".$key."Kick',false);\n";
	endwhile;
	echo "	popUp(name,true);\n";
	echo "}\n";
	echo "// -->\n";
	echo "</SCRIPT>\n\n";
endif;


function makeKick($name) {
	echo "<DIV ID='".$name."Kick' STYLE=\"POSITION: absolute; Z-INDEX: 10; VISIBILITY: hidden; TOP: 90px; LEFT: 0px;\">\n";
	kickHeader(20,'none',350);
};

function endKick($name) {
	kickFooter($name."Kick",$name,350);
	echo "</DIV>\n";
	echo "<SCRIPT LANGUAGE=\"JavaScript\"><!--\n";
	echo "if (NS4) {\n";
	echo "	screenWidth = window.innerWidth;\n";
	echo "	document.layers['".$name."Kick'].left = screenWidth-430;\n";
	echo "} else {\n";
	echo "	screenWidth = document.body.clientWidth + 18;\n";
	echo "	document.all['".$name."Kick'].style.pixelLeft = screenWidth-430;\n";
	echo "}\n";
	echo "// -->\n";
	echo "</SCRIPT>\n\n";
};

function makeFile($name) {
	global $DOCUMENT_ROOT;
	$filename=$DOCUMENT_ROOT."/credits-".$name.".txt";
	if (file_exists($filename)):
		$credits=file($filename);
		echo "<UL TYPE=DISC>\n";
		for ($i=0;$i<count($credits);$i++) {
			echo "<LI>".$credits[$i];
		}
		echo "</UL><BR>\n";
		return true;
	else:
		return false;
	endif;
};

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
<TD ALIGN=left WIDTH=100%><FONT FACE="<? echo $FONTFACE;?>"><FONT SIZE=+1><B>Core Developers</B></FONT>
<? if ($KICKS):
	echo " - click on their name for more info</FONT>";
endif; ?>
<BR></TD>
<TD ALIGN=right WIDTH=18><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<TR><TD COLSPAN=3><? spc(10,10);?><BR></TD></TR>
<TR VALIGN=top><TD></TD><TD><FONT FACE="<? echo $FONTFACE;?>">
<?
if ($KICKS):
	echo "<TABLE CELLPADDING=5 CELLSPACING=0 BORDER=0>\n";
endif;
$i=0;
reset($CORE);
while (list($key,$value)=each($CORE)):
	if ($KICKS && $i==0) {
		print "<tr>\n";
	}
	if ($KICKS):
		echo "<TD align=\"center\"><FONT SIZE=+1><A HREF=\"javascript:popUpCore('".$key."Kick',true);\">".$value[0]."</A></FONT></TD>\n";
	else:
		makeName($value[0],$value[1],1);
		makeFile($key);
	endif;
	if ($KICKS && $i%3 == 2) {
		print "</tr>\n";
	}
	$i++;
endwhile;
if ($KICKS):
	echo "</TABLE>\n";
endif;
?>
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

<? makeName("Jouni Ahto","jah@cultnet.fi",0);?>
  <UL TYPE=DISC><li>Postgres, Informix</UL><BR>

<? makeName("Alex Belits","abelits@phobos.illtel.denver.co.us",0);?>
  <UL TYPE=DISC><li>fhttpd support</UL><BR>

<? makeName("Bjørn Borud","borud@guardian.no",0);?>
  <UL TYPE=DISC><li>soundex code and lots of enthusiasm</UL><BR>

<? makeName("John Ellson","ellson@lucent.com",0);?>
  <UL TYPE=DISC><li>Freetype support</UL><BR>

<? makeName("Dean Gaudet","dgaudet@arctic.org",0);?>
  <UL TYPE=DISC><li>Apache module debugging + helpful hints along the way</UL><BR>

<? makeName("Mitch Golden","mgolden@interport.net",0);?>
  <UL TYPE=DISC><li>Oracle testing and bug fixes</UL><BR>

<? makeName("Simon Gornall","simon@oyster.co.uk",0);?>
  <UL TYPE=DISC><li>Illustra</UL><BR>

<? makeName("Danny Heijl","Danny.Heijl@cevi.be",0);?>
  <UL TYPE=DISC><li>Informix SE Support</UL><BR>

<? makeName("Mark Henderson","mark@togglemedia.com",0);?>
  <UL TYPE=DISC><li>Various odds and ends</UL><BR>

<? makeName("Jaakko Hyvätti","jaakko@hyvatti.iki.fi",0);?>
  <UL TYPE=DISC><li>Prototype cop, regular expression code fixes and CGI security issues</UL><BR>

<? makeName("Amitay Isaacs","amitay@pspl.co.in",0);?>
  <UL TYPE=DISC><li>LDAP</UL><BR>

<? makeName("Andreas Karajannis","Andreas.Karajannis@gmd.de",0);?>
  <UL TYPE=DISC><li>Adabas D, ODBC, Oracle</UL><BR>

<? makeName("Igor Kovalenko","owl@infomarket.ru",0);?>
  <UL TYPE=DISC><li>QNX support issues</UL><BR>

<? makeName("Richard Lynch","lynch@lscorp.com",0);?>
  <UL TYPE=DISC><li>Documentation</UL><BR>

<? makeName("Muhammad A Muquit","MA_Muquit@fccc.ed",0);?>
  <UL TYPE=DISC><li>Original Sybase module</UL><BR>
  
<? makeName("Jeroen van der Most","jvdmost@digiface.nl",0);?>
  <UL TYPE=DISC><li>Solid</UL><BR>
  
<? makeName("Chad Robinson","chadr@brttech.com",0);?>
  <UL TYPE=DISC><li>Documentation, FilePro</UL><BR>

<? makeName("Lachlan Roche","lr@www.wwi.com.au",0);?>
  <UL TYPE=DISC><li>MD5</UL><BR>

<? makeName("Stefan Roehrich","sr@linux.de",0);?>
  <UL TYPE=DISC><li>zlib</UL><BR>

<? makeName("Nikolay P. Romanyuk","mag@redcom.ru",0);?>
  <UL TYPE=DISC><li>Velocis Support</UL><BR>
  
<? makeName("Brian Schaffner","brian@tool.net",0);?>
  <UL TYPE=DISC><li>ODBC Support, PHP3 API testing</UL><BR>

<? makeName("Egon Schmid","eschmid@delos.lf.net",0);?>
  <UL TYPE=DISC><li>Documentation</UL><BR>

<? makeName("sopwith@redhat.com","sopwith@redhat.com",0);?>
  <UL TYPE=DISC><li>Solid</UL><BR>
  
<? makeName("Colin Viebrock","cmv@privateworld.com",0);?>
  <UL TYPE=DISC><li>Website graphic design and layout, PHP logo</UL><BR>

<? makeName("Eric Warnke","ericw@albany.edu",0);?>
  <UL TYPE=DISC><li>LDAP</UL><BR>

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

if ($KICKS):	/* Kick outs */
	echo "\n\n";
	reset($CORE);
	while (list($key,$value)=each($CORE)):
		makeKick($key);
		echo "<FONT SIZE=+1>".$value[0]."</FONT><BR>\n";
		echo "<FONT SIZE=-1>";
		makeMail($value[1]);
		echo "</FONT><BR>\n";
		makeFile($key);
		endKick($key);
	endwhile;
endif;
?>
