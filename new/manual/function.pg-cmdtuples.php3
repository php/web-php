<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.pg-close.php3', 'pg_Close'),
  'next' => array('function.pg-connect.php3', 'pg_Connect'),
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
manualHeader('pg_cmdtuples');
?><H1
>pg_cmdtuples</H1
><P
>pg_cmdtuples -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int pg_cmdtuples(int result_id);<P
>     pg_cmdtuples() returns the number of tuples (instances) affected
     by INSERT, UPDATE, and DELETE queries. If no tuple is affected the
     function will return 0.
    <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. pg_cmdtuples</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$result = pg_Exec ($conn, "INSERT INTO verlag VALUES ('Autor')");
$cmdtuples = pg_cmdtuples ($result);
echo $cmdtuples . " &#60;- cmdtuples affected.";</PRE
></DIV
></TD
></TR
></TABLE
>
   </P
></DIV
><?php manualFooter('pg_cmdtuples');?>