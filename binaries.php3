<?
require("shared.inc");

$apache_version="1.3.0";
$php_version="3.0";

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


commonHeader("Download PHP Apache+PHP Binary Tarballs for UNIX");
?>
<FONT SIZE=+1><B>Pick a mirror site close to you:</B></FONT><BR>
<I>(all mirrors are updated at least every hour)</I><BR>
<BR>
The binary distributions on this page are experimental.  The goal is that they
will help get you up and running quickly so you can try Apache+PHP for yourself
without needing to learn how to compile both packages.  These tarballs all include
a minimal Apache-1.3.0 installation with the standard set of Apache modules 
enabled along with PHP support.  The PHP module includes support for MySQL 3.21.30,
so if you have MySQL 3.21.x installed on your system these binary distributions should
work right out of the box with your database.  For other configurations you will have
to compile Apache + PHP yourself.  Each tarball includes a 
<a href="README-binaries.txt">README</a> file which explains exactly how the tarball 
was built.
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
	$solaris251_file = "${site}${srcdir}httpd-php-solaris251.tar.gz";
	$solaris26_file = "${site}${srcdir}httpd-php-solaris26.tar.gz";
	$hpux1020_file = "${site}${srcdir}httpd-php-hpux1020.tar.gz";
	$linux21_file = "${site}${srcdir}httpd-php-linux21.tar.gz";
	$irix63_file = "${site}${srcdir}httpd-php-irix63.tar.gz";
	$freebsd225_file = "${site}${srcdir}httpd-php-freebsd225.tar.gz";
	$rpm_i386_file = "${site}${srcdir}mod_php-3.0.1-1.i386.rpm";
	$rpm_src_file = "${site}${srcdir}mod_php-3.0.1-1.src.rpm";
	echo "<LI>";
	download_link($solaris251_file, "($method) Solaris 2.5.1 Apache $apache_version + PHP $php_version binary");
	echo "\n";
	echo "<LI>";
	download_link($solaris26_file, "($method) Solaris 2.6 Apache $apache_version + PHP $php_version binary");
	echo "\n";
	echo "<LI>";
	download_link($hpux1020_file, "($method) HP-UX 10.20 Apache $apache_version + PHP $php_version binary");
	echo "\n";
	echo "<LI>";
	download_link($linux21_file, "($method) Linux 2.1.x (Redhat 5.x) Apache $apache_version + PHP $php_version binary");
	echo "\n";
	echo "<LI>";
	download_link($irix63_file, "($method) Irix 6.3 Apache $apache_version + PHP $php_version binary");
	echo "\n";
	echo "<LI>";
	download_link($freebsd225_file, "($method) FreeBSD 2.2.5 Apache $apache_version + PHP $php_version binary");
	echo "\n";
	echo "<LI>";
	download_link($rpm_i386_file, "($method) i386 RPM, dynamically loadable Apache 1.3 module");
	echo "\n";
	echo "<LI>";
	download_link($rpm_src_file, "($method) Source-RPM, dynamically loadable Apache 1.3 module");
	echo "\n";
	echo("</UL>\n</TD></TR></TABLE></TD></TR>\n");
}
?>
<TR><TD colspan=3><BR></TD><TD BGCOLOR='#F0F0F0'><BR></TD><TD><BR></TD></TR>
<? makeCap(); ?>
</TABLE>
<?
commonFooter();
?>
