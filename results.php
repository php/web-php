<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'results.php';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

// Prepare data for search
if ($MQ) { $q = stripslashes($_GET['q']); }
else $q = $_GET['q'];
$q = urlencode($q);
$s = (int)$_GET['start'];

$data = file_get_contents("http://www.php.net/~rasmus/ws.php?q=$q&results=10&start=$s");
$res = unserialize($data);
$pos = $res['ResultSet']['firstResultPosition'];

echo <<<EOB
<h2>Showing {$res['ResultSet']['totalResultsReturned']} of {$res['ResultSet']['totalResultsAvailable']}</h2>
EOB;

foreach($res['ResultSet']['Result'] as $i=>$hit) {
  $cnt = $pos+$i; 
  $d = date('r',$hit['ModificationDate']);
  echo <<<EOB
$cnt. <a href="{$hit['Url']}">{$hit['Title']}</a><br />
&nbsp; &nbsp; {$hit['Summary']}<br />
&nbsp; &nbsp; <font size=-1>Modified $d
&nbsp; &nbsp; <a href="{$hit['Cache']['Url']}">Cache ({$hit['Cache']['Size']} bytes)</a></font><br />

EOB;
}
?>
