<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'usage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP Usage Stats");
?>

<h1>Usage Stats for April 2006</h1>

<p>
PHP: 20,475,056 Domains, 1,278,828 IP Addresses<br>
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br />
</p>

<p>
<?php echo print_image("stats/phpstats-200604.png", "Graph"); ?>
</p>

<p>
 You can also see how popular PHP is relative to other Apache modules
 at <a href="http://www.securityspace.com/s_survey/">SecuritySpace's
 Web Survey</a>. Spoiler: PHP is the most popular. There is also a
 <a href="http://www.tiobe.com/tpci.htm">Programming Community Index</a>
 provided by TIOBE.
</p>

<?php site_footer(); ?>
