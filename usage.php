<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for September 2001</h1>

<p>
PHP: 6,624,340 Domains, 979,572 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200110.png", "Graph"); ?>
</p>
<p>
There have been some shakeout in the large-scale shared hosting space 
related to the .com crash and combine with some routing issues in 
Germany which caused 5-10% of German servers not being able to
respond to the Netcraft queries.  This hurt the PHP total domain
numbers a bit, but the number of unique ips seen running PHP is still up.

</p>
<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace's Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
