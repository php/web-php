<?php
include 'include/languages.inc';
if(false && !$conf=apc_fetch('ws2_config')) {
  include '/local/Web/ws2.conf';
  apc_store('ws2_config',$conf);
} else {
  include '/local/Web/ws2.conf';
}
$raw = filter_input(INPUT_GET, 'q', FILTER_UNSAFE_RAW);
$q = urlencode($raw);
$r = isset($_REQUEST['results']) ? (int)$_REQUEST['results'] : 10;
$s = isset($_REQUEST['start']) ? (int)$_REQUEST['start'] : 1;
$l = isset($_REQUEST['lang']) ? htmlspecialchars($_REQUEST['lang'], ENT_QUOTES) : 'en';
$m = isset($_REQUEST['mirror']) ? htmlspecialchars($_REQUEST['mirror'], ENT_QUOTES) : '';
$sites = array( 'all'=>'php.net',
                'local'=>'php.net',
                'quickref'=>'php.net',
                '404quickref'=>'php.net',
                'manual'=>"php.net/manual/$l",
                '404manual'=>"php.net/manual/$l",
                'news'=>'news.php.net',
                'bugs'=>'bugs.php.net',
                'pear'=>'pear.php.net',
                'pecl'=>'pecl.php.net',
                'talks'=>'talks.php.net',
              );

$market = 'en-ca';
if(!empty($LANGUAGES_MAP[$l])) $market = $LANGUAGES_MAP[$l];

if(isset($sites[$_REQUEST['profile']])) {
    $scope = htmlspecialchars($_REQUEST['profile'], ENT_QUOTES);
    // If they are doing a manual search in a language we don't have a translation for, default to English
    if($scope == 'manual' && empty($ACTIVE_ONLINE_LANGUAGES[$l])) {
        $sites['manual'] = "php.net/manual/en";
    }
} else { 
    $scope = 'all';
}

// mtime is stored on the first line of the result file to
// avoid needing to call clearstatcache()
function limited_intermediate_result_cache($url,$ttl=1800, &$error=NULL) {
	global $cached;
	$cfile = '/var/tmp/bing_'.md5($url).'.json';
	$mtime = 0;
	$data = '';

	$fp = @fopen($cfile, 'r');  
	if($fp) {
		$mtime = (int)fgets($fp);
		$data = trim(stream_get_contents($fp));	
		fclose($fp);
		$cached = 1;
	}
	if(!$mtime || ($ttl && ($mtime < ($_SERVER['REQUEST_TIME']-$ttl)))) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$tmp = curl_exec($ch); 
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($status_code!=200) {
			$error = array('status_code'=>$status_code,'body'=>$data);
			fclose($fp);
			if(strlen($data)) return $data;
			else return false;
		}
		$data = $tmp;
		$cached = 0;
		$fp = fopen($cfile, 'w');
		fputs($fp, $_SERVER['REQUEST_TIME']."\n");	
		fputs($fp, $data);
		fflush($fp);
		fclose($fp);
	}
	return $data;
}

$request =  "{$conf['svc']}?appid={$conf['appid']}&query=$q%20site:{$sites[$scope]}&version=2.2&Sources=Web&web.offset=$s&web.count=$r&market=$market";
$error = '';
$cached = 0;
$data = limited_intermediate_result_cache($request, 1800, $error);
if($data) echo ws_bing_massage($data);
else echo serialize($error);

function ws_bing_massage($data) {
    $results = json_decode($data, true);
    $rsp = $results['SearchResponse']['Web'];
    $set = $rsp['Results'];

    $massaged = array(
        'ResultSet' => array(
            'totalResultsAvailable' => $rsp['Total'],
            'totalResultsReturned' => count($set),
            'firstResultPosition' => $rsp['Offset'],
            'Result' => array(),
        ),
    );

    foreach ($set as $result) {
        $massaged['ResultSet']['Result'][] = array(
            'Title' => $result['Title'],
            'Summary' => $result['Description'],
            'Url' => $result['Url'],
            'ClickUrl' => $result['Url'],
            'MimeType' => NULL, // Not returned by Bing
            'ModificationDate' => strtotime($result['DateTime']),
            'Cache' => $result['CacheUrl']
        );
    }

    return serialize($massaged);
}

if($raw!='mirrortest'):
$dbh = new PDO('mysql:host=localhost;dbname=ws', $conf['db_user'], $conf['db_pw'], array(PDO::ATTR_PERSISTENT => true,
                                                                                         PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $stmt = $dbh->prepare("INSERT INTO log (query,profile,mirror,lang,cached) VALUES (:query,:profile,:mirror,:lang,:cached)");
  $stmt->execute(array(':query'=>$raw,':profile'=>$scope,':mirror'=>$m,':lang'=>$l,':cached'=>$cached));
} catch (PDOException $e) {
   
}
endif;
?>
