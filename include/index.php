<?php

// This page tries to find the manual page for "include"
// because people can access that page by using
// http://www.php.net/include as a REQUEST_URI

require_once 'prepend.inc';
require_once 'manual-lookup.inc';

$file = find_manual_page(default_language(), "include");

if ($file) {
header("Location: http://".$SERVER_NAME.$file);
exit;
}
else { 
header("Location: http://".$SERVER_NAME."/"); 
exit;
}
?>