<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ada-connect.php3', 'ada_connect'),
  'next' => array('function.ada-fetchrow.php3', 'ada_fetchrow'),
  'up'   => array('ref.adabas.php3', 'Adabas D Functions'),
  'toc'  => array(
    array('ref.adabas.php3#I(REF.ADABAS)C(1,TITLE)', ''),
    array('function.ada-afetch.php3', 'ada_afetch'),
    array('function.ada-autocommit.php3', 'ada_autocommit'),
    array('function.ada-close.php3', 'ada_close'),
    array('function.ada-commit.php3', 'ada_commit'),
    array('function.ada-connect.php3', 'ada_connect'),
    array('function.ada-exec.php3', 'ada_exec'),
    array('function.ada-fetchrow.php3', 'ada_fetchrow'),
    array('function.ada-fieldname.php3', 'ada_fieldname'),
    array('function.ada-fieldnum.php3', 'ada_fieldnum'),
    array('function.ada-fieldtype.php3', 'ada_fieldtype'),
    array('function.ada-freeresult.php3', 'ada_freeresult'),
    array('function.ada-numfields.php3', 'ada_numfields'),
    array('function.ada-numrows.php3', 'ada_numrows'),
    array('function.ada-result.php3', 'ada_result'),
    array('function.ada-resultall.php3', 'ada_resultall'),
    array('function.ada-rollback.php3', 'ada_rollback'))));
manualHeader('ada_exec');
?><H1
>ada_exec</H1
><P
>ada_exec -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ada_exec(int connection_id, string query_string);<P
>Returns:   Returns 0 (false) on error.  Returns 1 (true) if the SQL command was
  successful but not expected to return any data (such as INSERT,
  UPDATE and DELETE statements).  Returns an Adabas D result
  identifier if the SQL command was successful and returned data.
 

 Ada_Exec will send an SQL statement to the Adabas server specified by
 the connection_id. The connection_id must be a valid identifier that
 was returned by <A
HREF="function.ada-connect.php3"
>ada_connect</A
> or the special value 0.  If
 connection_id is 0, ada_exec tries to establish or to use a
 connection with the parameters given with the configuration
 directives , 
 and .

   </P
></DIV
><?php manualFooter('ada_exec');?>