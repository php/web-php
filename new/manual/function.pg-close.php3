<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.pgsql.php3', 'PostgreSQL functions'),
  'next' => array('function.pg-cmdtuples.php3', 'pg_cmdtuples'),
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
manualHeader('pg_Close');
?><H1
>pg_Close</H1
><P
>pg_Close -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void pg_close(int connection);<P
>     Returns false if connection is not a valid connection index, true
     otherwise.  Closes down the connection to a PostgreSQL database
     associated with the given connection index.

   </P
></DIV
><?php manualFooter('pg_Close');?>