<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('configuration.php3', 'Configuration'),
  'next' => array('configuration03.php3', 'CGI'),
  'up'   => array('configuration.php3', 'Configuration'),
  'toc'  => array(
    array('configuration.php3#I(CONFIGURATION)C(1,TITLE)', ''),
    array('configuration.php3#I(CONFIGURATION)C(1,SIMPARA)', ''),
    array('configuration01.php3', 'The php3.ini file'),
    array('configuration02.php3', 'Apache module'),
    array('configuration03.php3', 'CGI'),
    array('configuration04.php3', 'Virtual hosts'),
    array('configuration05.php3', 'Security'))));
manualHeader('Apache module');
?><H1
><A
NAME="CONFIG.APACHE"
>Apache module</A
></H1
><H2
><A
NAME="CONFIG.APACHE.MODULE"
>Apache module configuration directives</A
></H2
><P
></P
><H2
><A
NAME="CONFIG.APACHE.ACTION"
>CGI redirection module/action module</A
></H2
><P
></P
><?php manualFooter('Apache module');?>