<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for June 2001</h1>

<p>
PHP: 6751394 Domains, 960954 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200106.png", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "E-Soft Inc.'s Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
