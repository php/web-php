<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.pg-errormessage.php3', 'pg_ErrorMessage'),
  'next' => array('function.pg-pconnect.php3', 'pg_pConnect'),
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
manualHeader('pg_Exec');
?><H1
>pg_Exec</H1
><P
>pg_Exec -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int pg_exec(int connection, string query);<P
>     Returns a result index if query could be executed, false on
     failure or if connection is not a valid connection index.Details
     about the error can be retrieved using the <A
HREF="function.pg-errormessage.php3"
>pg_errormessage</A
>
     function if connection is valid.  Sends an SQL statement to the
     PostgreSQL database specified by the connection index. The
     connection must be a valid index that was returned by <A
HREF="function.pg-connect.php3"
>pg_connect</A
>.  The return
     value of this function is an index to be used to access the
     results from other PostgreSQL functions.

     <BLOCKQUOTE
CLASS="NOTE"
><P
><B
>NOTE: </B
>       PHP2 returned 1 if the query was not expected to
       return data (inserts or updates, for example) and greater than 1
       even on selects that did not return anything. No such assumption
       can be made in PHP3.
      </P
></BLOCKQUOTE
>

   </P
></DIV
><?php manualFooter('pg_Exec');?>