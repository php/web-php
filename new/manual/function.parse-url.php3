<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.url.php3', 'URL functions'),
  'next' => array('function.urldecode.php3', 'urldecode'),
  'up'   => array('ref.url.php3', 'URL functions'),
  'toc'  => array(
    array('ref.url.php3#I(REF.URL)C(1,TITLE)', ''),
    array('function.parse-url.php3', 'parse_url'),
    array('function.urldecode.php3', 'urldecode'),
    array('function.urlencode.php3', 'urlencode'),
    array('function.base64-encode.php3', 'base64_encode'),
    array('function.base64-decode.php3', 'base64_decode'))));
manualHeader('parse_url');
?><H1
>parse_url</H1
><P
>parse_url -- parse a query string like PHP does with form data</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array parse_url(string url);<P
>Returns:    This function returns an associative array returning any of the various
   components of the URL that are present. This includes the "scheme", "host",
   "port", "user", "pass", "path", "query", and "fragment".
 </P
></DIV
><?php manualFooter('parse_url');?>