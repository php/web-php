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
                'news'=>'site=news.php.net');
if(isset($sites[$_REQUEST['profile']])) $p = $sites[$_REQUEST['profile']];
else $p = $sites['all'];

$request =  "{$conf['svc']}?appid={$conf['appid']}&query=$q&start=$s&results=$r&{$p}&language=$l&output=php";
$data = @file_get_contents($request);
list($version,$status_code,$msg) = explode(' ',$http_response_header[0], 3);
if($status_code==200) echo $data;
else echo serialize($http_response_header[0]);
$fp = fopen("/tmp/ws.log","a");
fputs($fp,"$request\n");
fclose($fp);
?>
