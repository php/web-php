<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.bcsub.php3', 'bcadd'),
  'next' => array('function.checkdate.php3', 'checkdate'),
  'up'   => array('funcref.php3', 'Function Reference'),
  'toc'  => array(
    array('funcref.php3#I(FUNCREF)C(1,TITLE)', ''),
    array('ref.adabas.php3', 'Adabas D Functions'),
    array('ref.array.php3', 'Array Functions'),
    array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
    array('ref.datetime.php3', 'Date/Time Functions'),
    array('ref.dir.php3', 'Directory Functions'),
    array('ref.filesystem.php3', 'Filesystem Functions'),
    array('ref.image.php3', 'Image functions'),
    array('ref.info.php3', 'PHP options & information'),
    array('ref.ldap.php3', 'LDAP Functions'),
    array('ref.math.php3', 'Mathematical Functions'),
    array('ref.msql.php3', 'mSQL Functions'),
    array('ref.mysql.php3', 'MySQL Functions'),
    array('ref.network.php3', 'Network Functions'),
    array('ref.odbc.php3', 'ODBC Functions'),
    array('ref.oracle.php3', 'Oracle functions'),
    array('ref.pgsql.php3', 'PostgreSQL functions'),
    array('ref.regex.php3', 'Regular expression functions'),
    array('ref.strings.php3', 'String functions'),
    array('ref.url.php3', 'URL functions'),
    array('ref.var.php3', 'Variable functions'))));
manualHeader('Date/Time Functions');
?><H1
><A
NAME="REF.DATETIME"
>Date/Time Functions</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="function.checkdate.php3"
>checkdate</A
></DT
><DT
><A
HREF="function.date.php3"
>date</A
></DT
><DT
><A
HREF="function.getdate.php3"
>getdate</A
></DT
><DT
><A
HREF="function.gmdate.php3"
>gmdate</A
></DT
><DT
><A
HREF="function.mktime.php3"
>mktime</A
></DT
><DT
><A
HREF="function.time.php3"
>time</A
></DT
><DT
><A
HREF="function.set-time-limit.php3"
>set_time_limit</A
></DT
></DL
><?php manualFooter('Date/Time Functions');?>