<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('migration05.php3', 'Expression types'),
  'next' => array('migration07.php3', 'Short-circuited boolean evaluation'),
  'up'   => array('migration.php3', 'Migrating from PHP/FI 2.0 to PHP 3.0'),
  'toc'  => array(
    array('migration.php3#I(MIGRATION)C(1,TITLE)', ''),
    array('migration.php3#I(MIGRATION)C(1,SECT1)', 'About the incompatbilities in 3.0'),
    array('migration02.php3', 'Start/end tags'),
    array('migration03.php3', 'if..endif syntax'),
    array('migration04.php3', 'while syntax'),
    array('migration05.php3', 'Expression types'),
    array('migration06.php3', 'Error messages have changed'),
    array('migration07.php3', 'Short-circuited boolean evaluation'),
    array('migration08.php3', 'Function true/false return values'),
    array('migration09.php3', 'Other incompatibilities'))));
manualHeader('Error messages have changed');
?><H1
><A
NAME="I(MIGRATION)C(6,SECT1)"
>Error messages have changed</A
></H1
><P
>   PHP 3.0's error messages are usually more accurate than 2.0's were,
   but you no longer get to see the code fragment causing the error.
   You will be supplied with a file name and a line number for the
   error, though.
  </P
><?php manualFooter('Error messages have changed');?>