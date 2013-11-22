<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'results.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
include $_SERVER['DOCUMENT_ROOT'] . '/include/results.inc';
#include $_SERVER['DOCUMENT_ROOT'] . '/include/loadavg.inc';

function exit_with_pretty_error($title, $header, $msg) {
  if ($title) {
    site_header($title, array("noindex", 'layout_span' => 12, "current" => "help"));
  }
  echo '<h2>' .$header. '</h2>';
  echo '<p>' .$msg. '</p>';
  site_footer();
  exit;
}

if (!isset($_GET['q']) || (!is_string($_GET['q']) || strlen($_GET['q']) < 3)) {
  exit_with_pretty_error("Search results", "Empty query", "Please provide at least 3 characters to search for.");
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

$uq = urlencode($q);
$ul = urlencode($l);

$s = (isset($_GET['start']) && is_numeric($_GET['start'])) ? (int)$_GET['start'] : 0;
$profile = (isset($_GET['p']) && is_string($_GET['p'])) ? $_GET['p'] : 'all';
$per_page = 10;

$valid_profiles = array('all', 'local', 'manual', 'news', 'bugs', 'pear', 'pecl', 'talks');
$scope = in_array($profile, $valid_profiles) ? $profile : 'all';
$srch_host = "php.net";
$srch_rqst = "/ws.php?profile=$scope&q=$uq&lang=$ul&results=$per_page&start=$s&mirror=".trim(substr($MYSITE,7),'/');
$url = "http://".$srch_host.$srch_rqst;

#$data = fetch_contents($url);
#if (is_array($data)) {
#  // FIXME: if (is_authenticated()) ...
#  $comment = '<!-- ' .print_r($data, true). '-->';
#  exit_with_pretty_error("Search error", "Internal error", "This mirror does not support searches, please report this error to <a href='/contact'>our webmasters</a>" . $comment);
#}
#$res = unserialize($data);

// HTTP status line is passed on, signifies an error
site_header(
    'Search results',
    array(
        'noindex',
        'current' => 'help',
        'layout_span' => 12,
    )
);

echo '<h1>Search results</h1>';

#if (!is_array($res)) {
#  exit_with_pretty_error(null, 'Internal error', 'Please try again later');
#}

// No results for query
#if ($res['ResultSet']['totalResultsAvailable'] == 0) {
  // TODO Research possible encoding issues
  google_cse($q); 

  site_footer();
  exit;  
#}

#search_results($res, $q, $scope, $per_page, $s, $l);

#site_footer();
?>
