<?
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>
<h1>
Usage Stats for January 2001
</h1>

<p>
<B>PHP:</B> 5,104,536 Domains, 832,457 IP Addresses
</p>
<p><small>
Source: <? print_link("http://www.netcraft.com/Survey/", "Netcraft"); ?>
</small></p>

<p>
<? echo print_image("stats/phpstats-200101.gif", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <? print_link("http://www.securityspace.com/s_survey/", "E-Soft Inc.'s Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<? commonFooter(); ?>
