<?
require("shared.inc");

$current = "3.0.15";
$win32_current = "3.0.15";
#$rpm_current = "3.0.5-1";

$filesizes["php-${current}.tar.gz"]="1,963 kB";
$filesizes["php-${win32_current}-win32.zip"]="1,818 kB";
#$filesizes["mod_php3-${rpm_current}.i386.rpm"]="294 kB";
#$filesizes["mod_php3-${rpm_current}.src.rpm"]="1,503 kB";


function makeCap() {
	GLOBAL $MIRRORS, $COUNTRIES,$PHP_SELF,$MYSITE;
	global $showcountry,$showsites,$csel;
?>
<TR bgcolor='#D0D0D0' valign=top>
<TD ALIGN=left><IMG ALT=" " SRC="/gifs/gcap-lefttop.gif" WIDTH=18 HEIGHT=18 BORDER=0><BR></TD>
<TD align=center colspan=3 rowspan=2 NOWRAP>
<?
if (!isset($csel)) {
	$csel='';
	$hostname=getenv("REMOTE_HOST");
	$ipaddr=getenv("REMOTE_ADDR");
	if ((!$hostname)||($hostname==$ipaddr)) {
		$hostname=@gethostbyaddr($ipaddr);
		echo "<!-- no_remote_host\nipaddr=$ipaddr\nhostname=$hostname -->\n";
		if ($hostname==$ipaddr) { $hostname=""; }
	} else {
		echo "<!-- remote_host\nhostname=$hostname -->\n";
	}
	if ($hostname) {
		if (ereg('([a-zA-Z]+)$',$hostname,$reg)) {
			$csel=$reg[0];
		}
	}
}
if ($COUNTRIES[$csel]) {
	$showcountry=$csel;
} else {
	$info=$MIRRORS[$MYSITE];
	$showcountry=$info[0];
	if (!$showcountry) {
		$showcountry="us";
	}
}
$mirror_sites=$MIRRORS;

$count=0;
$lastc="";
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	$info = $mirror_sites[$site];
	
	next($mirror_sites);
	$c = $info[0];
        $cname=$COUNTRIES[$c];
	if ($c==$showcountry) {
		$showsites[]=$site;
	}
	if ($c == $lastc || $c == 'xx') {
		continue;
	}
	$count++;
	echo "<A HREF=\"$PHP_SELF?csel=$c\"><IMG SRC=\"/gifs/gflag-$c.gif\" WIDTH=45 HEIGHT=24 VSPACE=5 hspace=15 BORDER=0 ALT=\"$cname\"></A>";
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
<FONT SIZE=+1><B>Choose a country to download from:</B></FONT><BR>
<?php if (!$csel) { ?>
<I>(the closest has automagically been selected for you)</I><BR>
<?php } ?>
<BR>
<BR>

<CENTER>
<TABLE border=0 cellpadding=0 cellspacing=0>
<?
makeCap();

$thisurl=substr($PHP_SELF,1); /* strip leading slash */
$mirror_sites=$MIRRORS;
$lastcountry="xxxxx";
@reset($showsites);
while ($site = @current($showsites)) {
	next($showsites);
	$info = $mirror_sites[$site];
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
		echo "<TD><A HREF=\"$site$thisurl?csel=$country\"><IMG SRC='/gifs/gflag-$country.gif' ALT='$cname' WIDTH=45 HEIGHT=24 vspace=6 BORDER=0 hspace=10></A><BR></TD>\n";
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
#	$i386_rpm = "${site}${srcdir}mod_php3-${rpm_current}.i386.rpm";
#	$src_rpm = "${site}${srcdir}mod_php3-${rpm_current}.src.rpm";
	if (eregi("caraveo",$site)) { # special case ;-)
		echo("<LI>");
		download_link("${site}/php3latest.zip","Latest patched Windows version");
		echo "\n";
	} else {
		echo "<LI>";
		download_link($src_file, "($method) PHP $current source");
		echo "\n";
		echo "<LI>";
		download_link($win32_zfile, "($method) $win32_current Win32 binary");
		echo "\n";
#		echo "<LI>";
#		download_link($src_rpm, "($method) PHP $rpm_current source RPM");
#		echo "\n";
	}
	echo("</UL>\n</TD></TR></TABLE></TD></TR>\n");
}
?>

<TR><TD colspan=3><BR></TD><TD BGCOLOR='#F0F0F0'><BR></TD><TD><BR></TD></TR>
<TR BGCOLOR='#D0D0D0' VALIGN=middle>
<TD><IMG SRC='/gifs/gcap-left.gif' WIDTH=18 HEIGHT=36 BORDER=0 ALT=' '></TD>
<TD COLSPAN=4 align=right><IMG ALT=' ' SRC='/gifs/gcap-right.gif' WIDTH=18 HEIGHT=36 BORDER=0><BR></TD>
</TR>


</TABLE>
<?
commonFooter();
?>
