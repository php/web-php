<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>
<h1>
Usage Stats for May 2001
</h1>

PHP: 6280233 Domains, 941419 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>

<p>
<?php echo print_image("stats/phpstats-200105.gif", "Graph"); ?>
</p>

<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "E-Soft Inc.'s Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
