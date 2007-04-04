<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'usage.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP Usage Stats");
?>

<h1>Usage Stats for February 2007</h1>

<p>
PHP: 20,140,063 domains, 1,332,514 IP addresses<br />
Source: <a href="http://www.netcraft.com/Survey/">Netcraft</a><br />
</p>

<p>
<?php echo print_image("stats/phpstats-200702.png", "Graph"); ?>
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
 There are <a href="http://www.nexen.net/the_english_speaking_nexen.net.php">
 detailed stats about PHP</a>, by version, by countries, by web servers
 and evolution from the &quot;PHP version tracker&quot;, run by 
 <a href="http://www.nexen.net/">nexen.net</a>.
</p>

<?php site_footer(); ?>
