<?
require("site.inc");
require("shared.inc");
commonHeader("Downloads");
?>
<center>
<H3>Please choose a mirror site close to you</H3>
<I>(all mirrors are updated at least once per hour)</I><BR><BR>
<?
$mirror_sites=$MIRRORS;
reset($mirror_sites);
$lastc="";
while ($site = key($mirror_sites)) {
	next($mirror_sites);
	$c=$mirror_sites[$site][0];
	if ($c!=$lastc) { echo('<A HREF="#'.$c.'">['.$c.']</A> '); $lastc=$c;}
}
?>
<BR><BR>
<table border=0 cellpadding=2><tr><td>
<?
reset($mirror_sites);
while ($site = key($mirror_sites)) {
	next($mirror_sites);
	$country=$mirror_sites[$site][0];
	$location=$mirror_sites[$site][1];
	if (eregi("^http://",$site)) {
		$method="HTTP";
		$srcdir="distributions/";
	} elseif (eregi("^ftp://",$site)) {
		$method="FTP";
		$srcdir="";
	} else {
		$method="unknown";
	}
	if (!isset($lastcountry)) {
		echo('<A NAME="'.$country.'">');
		echo('<table border=0 cellpadding=3><tr><td width=200><img src="'.gifurl("${country}.gif").'"></td><td bgcolor=#eeeeee>');
		$lastcountry=$country;
	} elseif ($lastcountry!=$country) {
		echo('<A NAME="'.$country.'">');
		echo('</td></table><hr><table border=0 cellpadding=3></tr><tr><td width=200><img src="'.gifurl("${country}.gif").'"></td><td bgcolor=#eeeeee>');
		$lastcountry=$country;
	}
	if ((!isset($lastlocation))||($lastlocation!=$location)) {
		echo("<B>$location</B><BR>\n");
		$lastlocation=$location;
	}
	$src_file = "${site}${srcdir}php-${current}.tar.gz";
	$win32_file = "${site}${srcdir}php-${win32_current}-win32.zip";
	echo("<UL>");
	if (eregi("caraveo",$site)) { # special case ;-)
		echo("<LI>");
		download_link("${site}/php3latest.zip","Latest patched Windows version");
		echo("<BR>\n");
	} else {
		echo("<LI>");
		download_link($src_file, "<FONT SIZE=-1>($method)</FONT> PHP $current source");
		echo("<BR>\n");
		echo("<LI>");
		download_link($win32_file, "<FONT SIZE=-1>($method)</FONT> $win32_current Win32 binary");
	}
	echo("</UL><BR>\n");
}
?>
</td></tr></table>
</td></tr></table>
<?commonFooter("")?>
