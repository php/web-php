<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.pg-connect.php3', 'pg_Connect'),
  'next' => array('function.pg-errormessage.php3', 'pg_ErrorMessage'),
  'up'   => array('ref.pgsql.php3', 'PostgreSQL functions'),
  'toc'  => array(
    array('ref.pgsql.php3#I(REF.PGSQL)C(1,TITLE)', ''),
    array('function.pg-close.php3', 'pg_Close'),
    array('function.pg-cmdtuples.php3', 'pg_cmdtuples'),
    array('function.pg-connect.php3', 'pg_Connect'),
    array('function.pg-dbname.php3', 'pg_DBname'),
    array('function.pg-errormessage.php3', 'pg_ErrorMessage'),
    array('function.pg-exec.php3', 'pg_Exec'),
    array('function.pg-pconnect.php3', 'pg_pConnect'))));
manualHeader('pg_DBname');
?><H1
>pg_DBname</H1
><P
>pg_DBname -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string pg_dbname(int connection);<P
>     Returns the name of the database that the given PostgreSQL
     connection index is connected to, or false if connection is not a
     valid connection index.

   </P
></DIV
><?php manualFooter('pg_DBname');?>