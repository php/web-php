<?php
if(!$conf=apc_fetch('ws_config')) {
  include '/local/Web/ws.conf';
  apc_store('ws_config',$conf);
}
$q = urlencode($_REQUEST['q']);
$r = isset($_REQUEST['results']) ? (int)$_REQUEST['results'] : 10;
$s = isset($_REQUEST['start']) ? (int)$_REQUEST['start'] : 1;
$l = isset($_REQUEST['lang']) ? htmlspecialchars($_REQUEST['lang']) : 'en';
$sites = array(  'all'=>'site=php.net',
               'local'=>'site=www.php.net',
                'news'=>'site=news.php.net',
                'bugs'=>'site=bugs.php.net',
                'pear'=>'site=pear.php.net',
                'pecl'=>'site=pecl.php.net',
               'talks'=>'site=talks.php.net',
              );
if(isset($sites[$_REQUEST['profile']])) {
  $scope = $_REQUEST['profile'];
} else { 
  $scope = 'all';
}

$request =  "{$conf['svc']}?appid={$conf['appid']}&query=$q&start=$s&results=$r&{$sites[$scope]}&language=$l&output=php";
$data = @file_get_contents($request);
list($version,$status_code,$msg) = explode(' ',$http_response_header[0], 3);
if($status_code==200) echo $data;
else echo serialize($http_response_header[0]);

$dbh = new PDO('mysql:host=localhost;dbname=ws', $conf['db_user'], $conf['db_pw'], array(PDO::ATTR_PERSISTENT => true,
                                                                                         PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $stmt = $dbh->prepare("INSERT INTO log (query,profile) VALUES (:query,:profile)");
  $stmt->execute(array(':query'=>$q,':profile'=>$scope));
} catch (PDOException $e) {
   
}
?>
