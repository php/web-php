<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for August 2001</h1>

<p>
PHP: 6,883,004 Domains, 976,593 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200108.png", "Graph"); ?>
</p>
<p>
The drop-off in August is related to the .com crash with a number of sites
and ISP's disappearing.  Netcraft's total number of sites found dropped in 
August from 31,299,592 to 30,775,624.  PHP's percentage actually rose from 22.2%
to 22.4%
</p>
<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace's Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
