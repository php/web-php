<?php
include_once "prepend.inc";
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for February 2003</h1>

<p>
PHP: 10,519,623 Domains, 1,220,927 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200302.png", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace's Web Survey"); ?>.
Spoiler: PHP is the most popular. There is also a
<a href="http://www.tiobe.com/tpci.htm">Programming Community Index</a>
provided by TIOBE.
</p>

<?php include_once "langchooser.inc"; echo "<!-- $LANG -->"; ?>

<?php commonFooter(); ?>
