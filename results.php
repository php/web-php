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
// HTTP status line is passed on, signifies and error
if (is_string($res)) {
  echo '<h2>Internal error, please try later</h2>';
  exit;  
}

// No results for query
if ($res['ResultSet']['totalResultsAvailable'] == 0) {
  echo '<h2>No pages matched your query</h2>';
  exit;  
}

echo <<<EOB
<style type="text/css">
ul#search-results {
  list-style-type: none;
}
ul#search-results li {
  margin-top: 1em;
}
ul#search-results p {
  margin: 0;
}
ul#search-results p.summary,
ul#search-results p.meta {
  font-size: 0.8em;
  margin-left: 2em;
}
ul#search-results p.meta {
  color: #008000;
}
ul#search-results p.meta a {
  color: #8284cc;
}

</style>
<h2>Showing {$res['ResultSet']['totalResultsReturned']} of {$res['ResultSet']['totalResultsAvailable']} results</h2>
<ul id="search-results">
EOB;
$pos = $res['ResultSet']['firstResultPosition'];
foreach($res['ResultSet']['Result'] as $i => $hit) {
  $cnt = $pos + $i; 

  $d = date('j M Y', $hit['ModificationDate']);
  $cachelink = $size = '';
  if ($hit['Cache']['Size']) {
    $cachelink = " - <a href=\"{$hit['Cache']['Url']}\">Cached</a>";
    if ($hit['Cache']['Size'] > 1024) {
      $size = ' - ' . sprintf("%d", $hit['Cache']['Size']/1024) . 'k';
    }
    else {
      $size = " - {$hit['Cache']['Size']} bytes";
    }
  }
  $displayurl = preg_replace('!^http://(.+[^/])(/?)$!', '\\1', $hit['Url']);
  
  echo <<<EOB
<li>
 <p class="result">$cnt. <a href="{$hit['Url']}">{$hit['Title']}</a></p>
 <p class="summary">{$hit['Summary']}</p>
 <p class="meta">{$displayurl} - {$d}{$size}{$cachelink}</p>
</li>
EOB;
}
echo <<<EOB
</ul>
EOB;

?>
