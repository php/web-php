<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'usage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP Usage Stats", array("current" => "community"));
?>

<h1>Usage Stats for January 2013</h1>

<p>
PHP: 244M sites, 2.1M IP addresses<br>
Source: <a href="http://news.netcraft.com/archives/2013/01/31/php-just-grows-grows.html">Netcraft</a><br>
</p>

<p>
<?php print_image("stats/php-trend-201301-netcraft.png", "Graph"); ?>
</p>

<p>
<a href="http://w3techs.com/">w3techs.com</a> provides statistics for
<a href="http://w3techs.com/technologies/overview/programming_language/all">server-side programming languages</a>
where you can also see the market share
<a href="http://w3techs.com/technologies/details/pl-php/all/all">by version</a>.
<br>
See their <a href="http://w3techs.com/faq">FAQ</a> and <a href="http://w3techs.com/technologies">technologies</a>
page for the details of the methodologies used for the surveys.
</p>

<p>
 You can also see how popular PHP is relative to other Apache modules
 at <a href="http://www.securityspace.com/bizintel/index.html">SecuritySpace's
 Web Survey</a>.
</p>

<p>
 There is also a
 <a href="http://www.tiobe.com/tpci.htm">Programming Community Index</a>
 provided by TIOBE.
</p>

<?php site_footer(); ?>
