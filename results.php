<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'results.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

// Prepare data for search
if ($MQ) { 
	$q = stripslashes($_GET['q']); //query
	$l = stripslashes($_GET['l']); // language
} else { 
	$q = isset($_GET['q']) ? $_GET['q'] : ''; 
	$l = isset($_GET['l']) ? $_GET['l'] : 'en';
}

if(strlen($l)>2) $l = substr($l,0,2); // Just take the first 2 chars.  eg. pt_BR = pt

$q = urlencode($q);
$l = urlencode($l);

$s = (isset($_GET['start'])&&$_GET['start']!=0) ? (int)$_GET['start'] : 1;
$profile = isset($_GET['p']) ? $_GET['p'] : 'all';
$per_page = 10;

$valid_profiles = array('all', 'local', 'manual', 'news', 'bugs', 'pear', 'pecl', 'talks');
$scope = in_array($profile, $valid_profiles) ? $profile : 'all';
$srch_host = "www.php.net";
$srch_rqst = "/ws.php?profile=$scope&q=$q&lang=$l&results=$per_page&start=$s&mirror=".trim(substr($MYSITE,7),'/');
$url = "http://".$srch_host.$srch_rqst;

if(function_exists('file_get_contents') && ini_get('allow_url_fopen')) {
  $data = file_get_contents($url);
} else {
  // Let's find another way
  if(function_exists('curl_exec')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $data = curl_exec($ch);
    curl_close($ch);
  } else if(function_exists('fsockopen') && $fd = fsockopen($srch_host, 80)) {
    $data = ''; $header = false;
    fputs($fd,"GET $srch_rqst HTTP/1.0\r\n");
    fputs($fd,"Host: $srch_host\r\n");
    fputs($fd,"Connection: close\r\n\r\n");
    while($line = fgets($fd)) { 
      if($header) $data .= $line;
      if(strlen($line)<=2) $header = true;
    }
    fclose($fd);
  } else {
    // Redirect to www.php.net ?
  }
}
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

$start_result = $s + ($s<2?0:1);
$end_result = $s + $res['ResultSet']['totalResultsReturned'] - ($s<2?1:0);

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

  // rewrite mirrors urls (\w\w\d? or www, but not qa)
  $real_url = preg_replace('@^http://(?!qa)\w{2,3}\.php\.net(.*)$@', '$1', $hit['Url']);
  $displayurl = preg_replace('@^http://(?:(?!qa)\w{2,3}\.)?(.+[^/])/?$@', '$1', $hit['Url']);
  $type = substr($displayurl,0,strpos($displayurl,'.'));
  if($type=='pecl' && strstr($displayurl,"/bugs/")) $type = "peclbugs";
  if($type=='pear' && strstr($displayurl,"/bugs/")) $type = "pearbugs";
  $display_title = str_replace('PHP:', '', $hit['Title']);
  $types = array('pear'=>'<img src="http://static.php.net/www.php.net/images/pear_item.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
                 'pecl'=>'<img src="http://static.php.net/www.php.net/images/pecl_item.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
                 'pecl4win'=>'<img src="http://static.php.net/www.php.net/images/pecl_item_win.gif" height="22" width="21" style="float:left; margin-left:-31px;"/>',
                 'peclbugs'=>'<img src="http://static.php.net/www.php.net/images/pecl_item_bug.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
                 'pearbugs'=>'<img src="http://static.php.net/www.php.net/images/pear_item_bug.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
                 'talks'=>'<img src="http://static.php.net/www.php.net/images/ele-icon.gif" height="20" width="32" style="float:left; margin-left:-40px;"/>',
                 'snaps'=>'<img src="http://static.php.net/www.php.net/images/logos/php_xpstyle_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
                 'cvsweb'=>'<img src="http://static.php.net/www.php.net/images/logos/php_script_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
                 'viewcvs'=>'<img src="http://static.php.net/www.php.net/images/logos/php_script_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
                 'php'=>'<img src="http://static.php.net/www.php.net/images/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
                 'smarty'=>'<img src="http://static.php.net/www.php.net/images/smarty-icon.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
                 'bugs'=>'<img src="http://static.php.net/www.php.net/images/php_bug.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>'
                );
  echo <<<EOB
<li>
 <p class="result">{$types[$type]}<a href="{$real_url}">{$display_title}</a></p>
 <p class="summary">{$hit['Summary']}</p>
 <p class="meta">{$displayurl} - {$d}{$size}{$cachelink}</p>
</li>
EOB;
}
echo <<<EOB
</ul>
<span style="margin-left: 3em; margin-top: 1em; float: left;"><a href="http://developer.yahoo.net/about">
<img src="http://us.dev1.yimg.com/us.yimg.com/i/us/nt/bdg/websrv_120_1.gif" border="0">
</a></span>
<div id="results_nav"><h4>Results Page:</h4>
<ul id="results_nav_list">
EOB;
$start = 0;
for($z=1; $z < 11; $z++) {
	if($start > $res['ResultSet']['totalResultsAvailable']) {
		break;
	}
	printf('<li><a href="/results.php?q=%s&start=%d&p=%s&l=%s">%d</a></li>', $q, $start, $scope, $l, $z);
	$start += $per_page;
}
echo '</ul></div>';
site_footer();
?>
