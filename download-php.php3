<?
require("shared.inc");

$current = "3.0.3";
$win32_current = "3.0.3";

$filesizes["php-3.0.3.tar.gz"]="~ 1107KB";
$filesizes["php-3.0.2a.tar.gz"]="~ 997KB";
$filesizes["php-3.0.3-win32.zip"]="~ 1481KB";
$filesizes["php-3.0.1-patch.gz"]="~ 130KB";
$filesizes["php-3.0.1-3.0.2a-patch.gz"]="~ 52KB";
$filesizes["php-3.0.2-3.0.2a-patch.gz"]="~ 15KB";
$filesizes["mod_php-3.0.1-1.i386.rpm"]="~ 260KB";
$filesizes["mod_php-3.0.1-1.src.rpm"]="~ 984KB";

function makeCap() {
	GLOBAL $MIRRORS, $COUNTRIES;
?>
<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD align=center colspan=3 rowspan=2 NOWRAP>
<?
$mirror_sites=$MIRRORS;
$count=0;
$lastc="";
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	$info = $mirror_sites[$site];
	next($mirror_sites);
	$c = $info[0];
        $cname=$COUNTRIES[$c];
	if ($c == $lastc || $c == 'xx') {
		continue;
	}
	$count++;
	echo "<A HREF=\"#$c\"><IMG SRC=\"/gifs/gflag-$c.gif\" WIDTH=45 HEIGHT=24 VSPACE=5 hspace=15 BORDER=0 ALT=\"$cname\"></A>";
	if ($count%5==0) {
		echo "<BR>\n";
	}
	$lastc = $c;
}
?><BR>
</TD>
<TD ALIGN=right><IMG ALT=" " SRC="/gifs/gcap-righttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<TR VALIGN=bottom bgcolor='#D0D0D0'>
<TD ALIGN=left><IMG alt=" " SRC="/gifs/gcap-leftbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD ALIGN=right><IMG alt=" " SRC="/gifs/gcap-rightbot.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
</TR>
<?
};


commonHeader("Download PHP Engine");
?>
<FONT SIZE=+1><B>Pick a mirror site close to you:</B></FONT><BR>
<I>(all mirrors are updated at least every hour)</I><BR>
<BR>
<BR>

<CENTER>
<TABLE border=0 cellpadding=0 cellspacing=0>
<?
makeCap();

$mirror_sites=$MIRRORS;
$lastcountry="xxxxx";
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	$info = $mirror_sites[$site];
	next($mirror_sites);
	list($country, $location, $shortname, $companyurl, $show) = $info;
	$cname=$COUNTRIES[$country];
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
		echo "<TR><TD colspan=3><BR></TD><TD BGCOLOR='#F0F0F0'><BR></TD><TD><BR></TD></TR>\n";
		echo "<TR BGCOLOR='#D0D0D0' VALIGN=middle>\n";
		echo "<TD><IMG SRC='/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0 ALT=' '></TD>\n";
		echo "<TD><A NAME=\"$country\"><IMG SRC='/gifs/gflag-$country.gif' ALT='$cname' WIDTH=45 HEIGHT=24 vspace=6 BORDER=0 hspace=10></A><BR></TD>\n";
		echo "<TD colspan=2>";
		echo "<FONT FACE='$FONTFACE'><B>$COUNTRIES[$country]</B><BR></TD>\n";
		echo "<TD align=right><IMG ALT=' ' SRC='/gifs/gcap-right.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>\n";
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
	$win32_zfile = "${site}${srcdir}php-${win32_current}-win32.zip";
	$patch_file_301 = "${site}${srcdir}php-3.0.1-patch.gz";
	$patch_file_302 = "${site}${srcdir}php-3.0.1-3.0.2a-patch.gz";
	$patch_file_302a = "${site}${srcdir}php-3.0.2-3.0.2a-patch.gz";
	if (eregi("caraveo",$site)) { # special case ;-)
		echo("<LI>");
		download_link("${site}/php3latest.zip","Latest patched Windows version");
		echo "\n";
	} else {
		echo "<LI>";
		download_link($src_file, "($method) PHP $current source");
		echo "\n";
		echo "<LI>";
		download_link($patch_file_301, "($method) PHP 3.0 -> 3.0.1 patch");
		echo "\n";
		echo "<LI>";
		download_link($patch_file_302, "($method) PHP 3.0.1 -> 3.0.2a patch");
		echo "\n";
		echo "<LI>";
		download_link($patch_file_302a, "($method) PHP 3.0.2 -> 3.0.2a patch");
		echo "\n";
		echo "<LI>";
		download_link($win32_zfile, "($method) $win32_current Win32 binary");
		echo "\n";
	}
	echo("</UL>\n</TD></TR></TABLE></TD></TR>\n");
}
?>
<TR><TD colspan=3><BR></TD><TD BGCOLOR='#F0F0F0'><BR></TD><TD><BR></TD></TR>
<? makeCap(); ?>
</TABLE>
<?
commonFooter();
?>
