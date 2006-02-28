<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'results.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

// Prepare data for search
if ($MQ) { 
	$q = stripslashes($_GET['q']); //query
	$l = stripslashes($GET['l']); // language
} else { 
	$q = $_GET['q']; 
	$l = $_GET['l'];
}

$q = urlencode($q);
$l = urlencode($l);

$s = (int) $_GET['start'];
$per_page = 15;

$valid_profiles = array('all', 'local', 'manual', 'news', 'bugs', 'pear', 'pecl', 'talks');
$scope = in_array($_GET['p'], $valid_profiles) ? $_GET['p'] : 'all';

$data = file_get_contents("http://www.php.net/ws.php?profile=$scope&q=$q&lang=$l&results=$per_page&start=$s");
$res = unserialize($data);

// HTTP status line is passed on, signifies an error
site_header('Search results');

if (is_string($res)) {
  echo '<h2>Internal error, please try later</h2>';
  exit;  
}

// No results for query
if ($res['ResultSet']['totalResultsAvailable'] == 0) {
  echo '<h2>No pages matched your query</h2>';
  exit;  
}

$start_result = ($s == 0 ? 1 : $s);
$end_result = $s + $res['ResultSet']['totalResultsReturned'];

$results_count = ($res['ResultSet']['totalResultsAvailable'] < 100 ? $res['ResultSet']['totalResultsAvailable'] : 'more than 100');


echo <<<EOB
<h2>Showing results $start_result to $end_result of $results_count</h2>
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

  // rewrite mirrors urls (\w\w\d? or www)
  $real_url = preg_replace('!^http://\w{2,3}\.php\.net/(.*)$!', $MYSITE . '$1', $hit['Url']);

  $displayurl = preg_replace('!^http://(.+[^/])/?$!', '$1', $hit['Url']);
  $display_title = str_replace('PHP:', '', $hit['Title']);
  echo <<<EOB
<li>
 <p class="result"><a href="{$real_url}">{$display_title}</a></p>
 <p class="summary">{$hit['Summary']}</p>
 <p class="meta">{$displayurl} - {$d}{$size}{$cachelink}</p>
</li>
EOB;
}
echo <<<EOB
</ul>
<span style="margin-left: 3.5em;"><a href="http://developer.yahoo.net/about">
<img src="http://us.dev1.yimg.com/us.yimg.com/i/us/nt/bdg/websrv_120_1.gif" border="0">
</a></span>
<div id="results_nav"><h4>Results Page:</h4><ul id="results_nav_list">
EOB;
$start = 0;
for($z=1; $z < 11; $z++) {
	if($start > $res['ResultSet']['totalResultsAvailable']) {
		break;
	}
	printf('<li><a href="/results.php?q=%s&start=%d&p=%s">%d</a></li>', $q, $start, $scope, $z);
	$start += $per_page;
}
echo '</ul></div>';
site_footer();
?>
