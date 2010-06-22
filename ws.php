<?php
$conf['appid'] = 'x9z8FnjV34GpvBj3HNN94r4JcEWjlfMAHaf7XUeltFDQVczSJWth9QethWv_6Qf6JRZZ';
$conf['svc']   = 'http://search.yahooapis.com/WebSearchService/V1/webSearch';
/*
if(!$conf=apc_fetch('ws_config')) {
  include '/local/Web/ws.conf';
  apc_store('ws_config',$conf);
}
*/

$raw = filter_input(INPUT_GET, 'q', FILTER_UNSAFE_RAW);
$q = urlencode($raw);
$r = isset($_REQUEST['results']) ? (int)$_REQUEST['results'] : 10;
$s = isset($_REQUEST['start']) ? (int)$_REQUEST['start'] : 1;
$l = isset($_REQUEST['lang']) ? htmlspecialchars($_REQUEST['lang']) : 'en';
$m = isset($_REQUEST['mirror']) ? htmlspecialchars($_REQUEST['mirror']) : '';
$sites = array( 'all'=>'php.net',
                'local'=>'www.php.net',
                'manual'=>'www.php.net',
                'news'=>'news.php.net',
                'bugs'=>'bugs.php.net',
                'pear'=>'pear.php.net',
                'pecl'=>'pecl.php.net',
                'talks'=>'talks.php.net',
              );

if(isset($sites[$_REQUEST['profile']])) {
    $scope = $_REQUEST['profile'];
} else { 
    $scope = 'all';
}

$r_hack = $r;
if ($scope === 'manual') {
	$r_hack = $r * 3;
}

$request = "{$conf['svc']}?appid={$conf['appid']}&query=$q&start=$s&results=$r_hack&site=www.php.net&language=$l&output=php&similar_ok=1&vs=www.php.net&sm=EjK&smid=EjK";
$data    = file_get_contents($request);

list($version, $status_code, $msg) = explode(' ', $http_response_header[0], 3);

if ($status_code == 200) {
	
	$data = unserialize($data);
	
	if ($scope === 'manual') {
		#$data = process_manual_data($data, $r, $l);
	}
	
	print "<pre>";
    print_r($data);
} else {
    echo serialize($http_response_header[0]);
}

/*
$dbh = new PDO('mysql:host=localhost;dbname=ws', $conf['db_user'], $conf['db_pw'], array(PDO::ATTR_PERSISTENT => true,
                                                                                         PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $stmt = $dbh->prepare("INSERT INTO log (query,profile,mirror) VALUES (:query,:profile,:mirror)");
  $stmt->execute(array(':query'=>$raw,':profile'=>$scope,':mirror'=>$m));
} catch (PDOException $e) {
   
}
*/

/* 
  Hack to clean up 'manual' searches, to only show results from the PHP Manual.

  - This messes up various statistics, like totalResultsAvailable will no longer be true.
  - For this reason, and my lack of desire to recalculate or waste Y! resources,
    the intelligence (e.g., "you are viewing results 1-10 of 80") was removed.
    and replaced with a simple "more results ->"
  - Note: Many of the results are bogus anyways, so the count isn't all that useful
  - Feel free to update.
*/
function process_manual_data($data, $numresults, $langcode = 'en') {
	
	// Don't touch anything in this case
	if ($data['ResultSet']['totalResultsAvailable'] == 0) {
		return $data;
	}
	
	$good       = array();
	$en         = array();
	$count      = 0;
	
	$data_tmp = $data;

	foreach ($data['ResultSet']['Result'] as $num => $result) {
		
		// Sometimes the url refers to a specific user comment, so let's remove that part
		// Note: We use Url, but DisplayUrl and ClickUrl also exist
		// Note: Consider fixing this at the API level
		$result['Url'] = preg_replace('/(#\d+)/', '', $result['Url']);

		// Require manual/ in the result urls
		// Note: Consider allowing 404 urls, like php.net/function.strlen
		if (false === strpos($result['Url'], 'php.net/manual')) {
			continue;
		}
		
		// Lang code. 
		// Note: Language specific manuals already include English pages for missing text
		if (false === strpos($result['Url'], "php.net/manual/{$langcode}")) {

			/*
			Other languages don't seem possible at the moment, oh well, this is for FC I guess
			Not sure how useful this is, so not using it for now.
			Return code might look like: $good = array_merge($good, array_slice($en, 0, ($numresults - count($good))));
			
			if ($langcode !== 'en' && false !== strpos($result['Url'], "php.net/manual/en")) {
				$en[] = $result;
			}
			*/
			continue;
		}

		$good[$count++] = $result;
		
		// Stop if we have enough results
		if ($count === $numresults) {
			break;
		}
	}

	// Lie, and return our Result as their Result
	// Got and Desired information is new.
	$data['totalResultsDesired'] = $numresults;
	$data['totalResultsGot']     = count($good);
	$data['ResultSet']['Result'] = $good;
	return $data;
}
?>
