<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for July 2001</h1>

<p>
PHP: 6,954,476 Domains, 983,273 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200107.png", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "SecuritySPace's Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
