<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ora-rollback.php3', 'Ora_Rollback'),
  'next' => array('function.pg-close.php3', 'pg_Close'),
  'up'   => array('funcref.php3', 'Function Reference'),
  'toc'  => array(
    array('funcref.php3#I(FUNCREF)C(1,TITLE)', ''),
    array('ref.adabas.php3', 'Adabas D Functions'),
    array('ref.array.php3', 'Array Functions'),
    array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
    array('ref.datetime.php3', 'Date/Time Functions'),
    array('ref.dir.php3', 'Directory Functions'),
    array('ref.filesystem.php3', 'Filesystem Functions'),
    array('ref.html.php3', 'HTML functions'),
    array('ref.image.php3', 'Image functions'),
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
    array('ref.url.php3', 'URL functions'))));
manualHeader('PostgreSQL functions');
?><H1
><A
NAME="REF.PGSQL"
>PostgreSQL functions</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="function.pg-close.php3"
>pg_Close</A
></DT
><DT
><A
HREF="function.pg-cmdtuples.php3"
>pg_cmdtuples</A
></DT
><DT
><A
HREF="function.pg-connect.php3"
>pg_Connect</A
></DT
><DT
><A
HREF="function.pg-dbname.php3"
>pg_DBname</A
></DT
><DT
><A
HREF="function.pg-errormessage.php3"
>pg_ErrorMessage</A
></DT
><DT
><A
HREF="function.pg-exec.php3"
>pg_Exec</A
></DT
><DT
><A
HREF="function.pg-pconnect.php3"
>pg_pConnect</A
></DT
></DL
><?php manualFooter('PostgreSQL functions');?>