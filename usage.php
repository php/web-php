<?
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>
<h1>
Usage Stats for February 2001
</h1>

Feb 2001: PHP: 5558363 Domains, 856543 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>

<p>
<? echo print_image("stats/phpstats-200102.gif", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <? print_link("http://www.securityspace.com/s_survey/", "E-Soft Inc.'s Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<? commonFooter(); ?>
