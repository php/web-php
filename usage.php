<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for September 2001</h1>

<p>
PHP: 6,930,758 Domains, 957,249 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200109.png", "Graph"); ?>
</p>
<p>
The drop-off in August is related to the .com crash with a number of sites
and ISP's disappearing.  Netcraft's total number of sites found dropped in 
August from 31,299,592 to 30,775,624.  PHP's percentage actually rose from 22.2%
to 22.4%.

In September the numbers are back up somewhat.  Netcraft found 32,398,046 domains and PHP's
marketshare percentage has dropped to 21.4%.  This is mostly due to the fact that homestead.com 
sent Netcraft their site list of over a million domains running IIS.
</p>
<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace's Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
