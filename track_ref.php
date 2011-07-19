<?php
if(!empty($_GET['ref']) && !empty($_GET['url'])) {
	file_put_contents("/var/tmp/refer.txt","{$_GET['url']} from {$_GET['ref']}\n",FILE_APPEND);
	echo "OK";
}
?>
KO
