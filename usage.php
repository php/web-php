<?
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>
<h1>
Usage Stats for March 2001
</h1>

PHP: 5747237 Domains, 882439 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>

<p>
<? echo print_image("stats/phpstats-200103.gif", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <? print_link("http://www.securityspace.com/s_survey/", "E-Soft Inc.'s Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<? commonFooter(); ?>
