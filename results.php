<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'results.php';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

// Prepare data for search
if ($MQ) { $q = stripslashes($_GET['q']); }
else { $q = $_GET['q']; }
$q = urlencode($q);
$s = (int) $_GET['start'];

$data = file_get_contents("http://www.php.net/~rasmus/ws.php?q=$q&results=10&start=$s");
$res = unserialize($data);
$pos = $res['ResultSet']['firstResultPosition'];

// No results
if ($res['ResultSet']['totalResultsAvailable'] == 0) {
  echo '<h2>No pages matched your query</h2>';
}

// Got results
else {
  echo <<<EOB
<h2>Showing {$res['ResultSet']['totalResultsReturned']} of {$res['ResultSet']['totalResultsAvailable']}</h2>
<ul id="search-results">
EOB;
  foreach($res['ResultSet']['Result'] as $i => $hit) {
    $cnt = $pos + $i; 
    $d = date('r', $hit['ModificationDate']);
    echo <<<EOB
<li>
 <p class="result">$cnt. <a href="{$hit['Url']}">{$hit['Title']}</a></p>
 <p class="summary">{$hit['Summary']}</p>
 <p class="meta">Modified $d <a href="{$hit['Cache']['Url']}">Cache ({$hit['Cache']['Size']} bytes)</a></p>
</li>
EOB;
  }
 echo <<<EOB
</ul>
EOB;
}
?>
