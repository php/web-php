<?php
require_once 'prepend.inc';
commonHeader("PHP Usage Stats");
?>

<h1>Usage Stats for November 2001</h1>

<p>
PHP: 7,095,691 Domains, 1,046,426 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br>
</p>

<p>
<?php echo print_image("stats/phpstats-200111.png", "Graph"); ?>
</p>
<p>
There has been some shakeout in the large-scale shared hosting space 
related to the .com crash and combined with some routing issues in 
Germany which caused 5-10% of German servers not being able to
respond to the Netcraft queries.  This hurt the PHP total domain
numbers a bit in recent months, but they appear to be back up nicely
as of November's numbers.
</p>
<p>
You can also see how popular PHP is relative to other Apache modules
at <?php print_link("http://www.securityspace.com/s_survey/", "SecuritySpace's Web Survey"); ?>.
Spoiler: PHP is the most popular.
</p>

<?php commonFooter(); ?>
