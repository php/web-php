<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('configuration.php3', 'Configuration'),
  'next' => array('configuration02.php3', 'Apache module'),
  'up'   => array('configuration.php3', 'Configuration'),
  'toc'  => array(
    array('configuration.php3#I(CONFIGURATION)C(1,TITLE)', ''),
    array('configuration.php3#I(CONFIGURATION)C(1,SIMPARA)', ''),
    array('configuration01.php3', 'The php3.ini file'),
    array('configuration02.php3', 'Apache module'),
    array('configuration03.php3', 'CGI'),
    array('configuration04.php3', 'Virtual hosts'),
    array('configuration05.php3', 'Security'))));
manualHeader('The php3.ini file');
?><H1
><A
NAME="CONFIG.PHP3.INI"
>The php3.ini file</A
></H1
><P
></P
><?php manualFooter('The php3.ini file');?>