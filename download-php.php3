<?
require("shared.inc");

$current = "3.0RC2";
$win32_current = "3.0RC";

$filesizes["php-3.0RC2.tar.gz"]="~ 935KB";
$filesizes["php-3.0RC-win32.exe"]="~ 1054KB";

commonHeader("Download PHP Engine");
?>
<FONT SIZE=+1><B>Pick a mirror site close to you:</B></FONT><BR>
<I>(all mirrors are updated at least every hour)</I><BR>
<BR>
<BR>

<CENTER>
<TABLE border=0 cellpadding=0 cellspacing=0>
<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left><IMG SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD align=left colspan=3 NOWRAP>
<?
$mirror_sites=$MIRRORS;

$lastc="";
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	$info = $mirror_sites[$site];
	next($mirror_sites);
	$c = $info[0];
	if ($c == $lastc || $c == 'xx') {
		continue;
	}
	echo "<A HREF=\"#$c\"><IMG SRC=\"/gifs/gflag-$c.gif\" WIDTH=45 HEIGHT=24 hspace=10 BORDER=0></A>";
	$lastc = $c;
}
?><BR>
</TD>
<TD ALIGN=right><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
<?
$lastcountry="xxxxx";
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	$info = $mirror_sites[$site];
	next($mirror_sites);
	list($country, $location, $shortname, $companyurl, $show) = $info;
	if (!$show) {
		continue;
	}
	if (eregi("^http://",$site)) {
		$method="HTTP";
		$srcdir="distributions/";
	} elseif (eregi("^ftp://",$site)) {
		$method="FTP";
		$srcdir="";
	} else {
		$method="unknown";
	}
	if ($lastcountry!=$country) {
		echo "<TR><TD colspan=3><BR></TD><TD BGCOLOR='#F0F0F0'><BR><BR></TD><TD><BR></TD></TR>\n";
		echo "<TR BGCOLOR='#D0D0D0' VALIGN=middle>\n";
		echo "<TD><IMG SRC='/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0></TD>\n";
		echo "<TD><A NAME='$country' HREF=\"$site\">";
		echo "<IMG SRC='/gifs/gflag-$country.gif' ALT='$site' WIDTH=45 HEIGHT=24 vspace=6 BORDER=0 hspace=10>";
		echo "</A><BR></TD>\n";
		echo "<TD colspan=2>";
		echo "<FONT FACE='$FONTFACE'><B>$COUNTRIES[$country]</B><BR></TD>\n";
		echo "<TD align=right><IMG SRC='/gifs/gcap-right.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
		echo "</TR>\n";
		$lastcountry=$country;
	}
	echo "<TR><TD colspan=3>";
	spc(75,1);
	echo "<BR></TD>\n<TD>";
	echo "<TABLE border=0 cellpadding=5 cellspacing=0 bgcolor=\"#F0F0F0\" width=100%>\n";
	echo "<TR><TD><FONT FACE='$FONTFACE'>\n";
	if ((!isset($lastlocation))||($lastlocation!=$location)) {
		echo("$location<BR>\n");
		$lastlocation=$location;
	}
	echo "<FONT SIZE=-1><UL>\n";
	$src_file = "${site}${srcdir}php-${current}.tar.gz";
	$win32_file = "${site}${srcdir}php-${win32_current}-win32.exe";
	if (eregi("caraveo",$site)) { # special case ;-)
		echo("<LI>");
		download_link("${site}/php3latest.zip","Latest patched Windows version");
		echo "\n";
	} else {
		echo "<LI>";
		download_link($src_file, "($method) PHP $current source");
		echo "\n";
		echo "<LI>";
		download_link($win32_file, "($method) $win32_current Win32 binary");
		echo "\n";
	}
	echo("</UL>\n</TD></TR></TABLE></TD></TR>\n");
}
?>
<TR><TD colspan=3>&nbsp;<BR></TD><TD BGCOLOR='#F0F0F0'>&nbsp;<BR><BR></TD><TD>&nbsp;<BR></TD></TR>
<TR bgcolor='#D0D0D0' valign=middle>
<TD ALIGN=left><IMG SRC="/gifs/gcap-left.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
<TD align=left colspan=3 NOWRAP>
<?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
$lastc="";
while ($site = key($mirror_sites)) {
	next($mirror_sites);
	$c=$mirror_sites[$site][0];
	if ($c!=$lastc):
		echo "<A HREF=\"#$c\"><IMG SRC=\"/gifs/gflag-$c.gif\" WIDTH=45 HEIGHT=24 hspace=10 BORDER=0></A>";
		$lastc=$c;
	endif;
}
?><BR>
</TD>
<TD ALIGN=right><IMG SRC="/gifs/gcap-right.gif" WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>
</TABLE>
<?
commonFooter();
?>
