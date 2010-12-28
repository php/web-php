<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'results.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

function exit_with_pretty_error($title, $header, $msg) {
  if ($title) {
    site_header($title, array("noindex"));
  }
  echo '<h2>' .$header. '</h2>';
  echo '<p>' .$msg. '</p>';
  site_footer();
  exit;
}

if (!isset($_GET['q']) || (!is_string($_GET['q']) || strlen($_GET['q']) < 3)) {
  exit_with_pretty_error("Search results", "Empty query", "You need to specify what you want to search for, 3chars at least");
}
if (!isset($_GET['l']) || !is_string($_GET['l'])) {
  $_GET['l'] = null;
}

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

$s = (isset($_GET['start']) && is_numeric($_GET['start']) && $_GET['start']!=0) ? (int)$_GET['start'] : 1;
$profile = (isset($_GET['p']) && is_string($_GET['p'])) ? $_GET['p'] : 'all';
$per_page = 10;

$valid_profiles = array('all', 'local', 'manual', 'news', 'bugs', 'pear', 'pecl', 'talks');
$scope = in_array($profile, $valid_profiles) ? $profile : 'all';
$srch_host = "www.php.net";
$srch_rqst = "/ws.php?profile=$scope&q=$q&lang=$l&results=$per_page&start=$s&mirror=".trim(substr($MYSITE,7),'/');
$url = "http://".$srch_host.$srch_rqst;

$data = fetch_contents($url);
if (is_array($data)) {
  // FIXME: if (is_authenticated()) ...
  $comment = '<!-- ' .print_r($data, true). '-->';
  exit_with_pretty_error("Search error", "Internal error", "This mirror does not support searches, please report this error to <a href='/contact'>our webmasters</a>" . $comment);
}
$res = unserialize($data);

// HTTP status line is passed on, signifies an error
site_header('Search results', array("noindex", "current" => "FIXME")));

if (!is_array($res)) {
  exit_with_pretty_error(null, 'Internal error', 'Please try again later');
}

// No results for query
if ($res['ResultSet']['totalResultsAvailable'] == 0) {
  exit_with_pretty_error(null, 'No matches', 'No pages matched your query');
  exit;  
}

$start_result = $s + ($s<2?0:1);
$end_result = $s + $res['ResultSet']['totalResultsReturned'] - ($s<2 || $res['ResultSet']['totalResultsReturned'] < 10?1:0);

$results_count = ($res['ResultSet']['totalResultsAvailable'] < 100 ? $res['ResultSet']['totalResultsAvailable'] : 'more than 100');


echo <<<EOB
<h2>Showing results $start_result to $end_result of $results_count</h2>
<ul id="search-results">
EOB;
$pos = $res['ResultSet']['firstResultPosition'];

$php_img_dir = 'http://static.php.net/www.php.net/images';
$types = array(
  'pear'     => '<img src="'. $php_img_dir .'/pear_item.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
  'pecl'     => '<img src="'. $php_img_dir .'/pecl_item.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
  'pecl4win' => '<img src="'. $php_img_dir .'/pecl_item_win.gif" height="22" width="21" style="float:left; margin-left:-31px;"/>',
  'peclbugs' => '<img src="'. $php_img_dir .'/pecl_item_bug.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
  'pearbugs' => '<img src="'. $php_img_dir .'/pear_item_bug.gif" height="19" width="17" style="float:left; margin-left:-30px;"/>',
  'talks'    => '<img src="'. $php_img_dir .'/ele-icon.gif" height="20" width="32" style="float:left; margin-left:-40px;"/>',
  'snaps'    => '<img src="'. $php_img_dir .'/logos/php_xpstyle_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'cvsweb'   => '<img src="'. $php_img_dir .'/logos/php_script_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'viewcvs'  => '<img src="'. $php_img_dir .'/logos/php_script_ico.png" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'news'     => '<img src="'. $php_img_dir .'/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'php'      => '<img src="'. $php_img_dir .'/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'doc'      => '<img src="'. $php_img_dir .'/logos/php-icon-white.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'bugs'     => '<img src="'. $php_img_dir .'/php_bug.gif" height="32" width="32" style="float:left; margin-left:-40px;"/>',
  'gtk'      => '<img src="'. $php_img_dir .'/logos/php-gtk-white.gif" height="26" width="32" style="float:left; margin-left:-40px;"/>'
);
                
foreach($res['ResultSet']['Result'] as $i => $hit) {
  $cnt = $pos + $i; 

  $d = date('j M Y', $hit['ModificationDate']);
  $cachelink = $size = '';
  if (isset($hit['Cache'])) {
    $cachelink = " - <a href=\"{$hit['Cache']['Url']}\">Cached</a>";
    if ($hit['Cache']['Size'] > 1024) {
      $size = ' - ' . sprintf("%d", $hit['Cache']['Size']/1024) . 'k';
    }
    else {
      $size = " - {$hit['Cache']['Size']} bytes";
    }
  }

  // rewrite mirrors urls (\w\w\d? or www, but not qa, doc, gtk and ~/user)
  $real_url = preg_replace('@^http://(?!doc|qa|gtk)\w{2,3}\.php\.net(?!/~)(.*)$@', '$1', $hit['Url']);
  $displayurl = preg_replace('@^http://(?:(?!doc|qa|php|gtk)\w{2,3}\.)?(.+[^/])/?$@', '$1', $hit['Url']);
  $type = substr($displayurl,0,strpos($displayurl,'.'));
  if($type=='pecl' && strstr($displayurl,"/bugs/")) $type = "peclbugs";
  if($type=='pear' && strstr($displayurl,"/bugs/")) $type = "pearbugs";
  if($type=='smarty') continue;
  $display_title = str_replace(array('PHP:', '&amp;'), array('', '&'), $hit['Title']);

  // Fall back to the PHP logo for unknown hits
  if (!isset($types[$type])) {
    $type = "php";
  }

  // Fix &amp;gt; double escaping
  $summary = str_replace('&amp;', '&', $hit['Summary']);
  echo <<<EOB
<li>
 <p class="result">{$types[$type]}<a href="{$real_url}">{$display_title}</a></p>
 <p class="summary">{$summary}</p>
 <p class="meta">{$displayurl} - {$d}{$size}{$cachelink}</p>
</li>
EOB;
}
echo <<<EOB
</ul>
<span style="margin-left: 3em; margin-top: 1em; float: left;"><a href="http://developer.yahoo.net/about">
<img src="http://l.yimg.com/a/i/us/nt/bdg/websrv_120_1.gif" border="0">
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
