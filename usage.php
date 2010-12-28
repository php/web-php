<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'usage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP Usage Stats", array("current" => "FIXME"));
?>

<h1>Usage Stats for April 2007</h1>

<p>
PHP: 20,917,850 domains, 1,224,183 IP addresses<br />
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br />
</p>

<p>
<?php echo print_image("stats/phpstats-200707.png", "Graph"); ?>
</p>

<p>
 You can also see how popular PHP is relative to other Apache modules
 at <a href="http://www.securityspace.com/s_survey/">SecuritySpace's
 Web Survey</a>. Spoiler: PHP is the most popular. 
</p>

<p>
 There is also a
 <a href="http://www.tiobe.com/tpci.htm">Programming Community Index</a>
 provided by TIOBE.
</p>

<p>
 There are <a href="http://www.nexen.net/chiffres_cles/phpversion/">
 detailed stats about PHP</a>, by version, by countries, by web servers
 and evolution from the &quot;PHP version tracker&quot;, run by 
 <a href="http://www.nexen.net/">nexen.net</a>.
</p>

<?php site_footer(); ?>
