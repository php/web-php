<?
require("shared.inc");
commonHeader("PHP Usage Stats");
?>
September 1999: 795034 Domains, 289162 IP Addresses<br>
Source: <a href="http://www.netcraft.com">Netcraft</a><br>
<img src="phpstats-199909.gif"><br clear=left>
Note: We do not know what caused the sudden surge in the number
of domains and then the subsequent drop-off.  The number of physical
servers actually running PHP has ben growing steadily as witnessed
by the steady climb in the number of unique IP's identifying themselves
as being PHP servers.
<P>One possible explanation for the domain bubble is that a couple of
large ISP's switched from running the module version to the CGI version.
Servers that run the CGI version of PHP are not reflected in these stats.

<p>You can also see how popular PHP is relative to other Apache modules
at <a href="http://www.e-softinc.com/survey/">E-Soft Inc.'s
web survey</a>. (Spoiler: PHP is the most popular behind the FrontPage
extensions.)

<? commonFooter(); ?>
