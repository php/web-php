<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.pg-cmdtuples.php3', 'pg_cmdtuples'),
  'next' => array('function.pg-dbname.php3', 'pg_DBname'),
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
manualHeader('pg_Connect');
?><H1
>pg_Connect</H1
><P
>pg_Connect -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int pg_connect(string host, string port, string options, string tty, string dbname);<P
>     Returns a connection index on success, or false if the connection
     could not be made.  Opens a connection to a PostgreSQL
     database. Each of the arguments should be a quoted string,
     including the port number. The options and tty arguments are
     optional and can be left out. This function returns a connection
     index that is needed by other PostgreSQL functions. You can have
     multiple connections open at once.

    </P
><P
>     See also <A
HREF="function.pg-pconnect.php3"
>pg_pconnect</A
>.

   </P
></DIV
><?php manualFooter('pg_Connect');?>