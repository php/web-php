<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.odbc-do.php3', 'odbc_do'),
  'next' => array('function.odbc-execute.php3', 'odbc_execute'),
  'up'   => array('ref.odbc.php3', 'ODBC Functions'),
  'toc'  => array(
    array('ref.odbc.php3#I(REF.ODBC)C(1,TITLE)', ''),
    array('function.odbc-autocommit.php3', 'odbc_autocommit'),
    array('function.odbc-close.php3', 'odbc_close'),
    array('function.odbc-close-all.php3', 'odbc_close_all'),
    array('function.odbc-commit.php3', 'odbc_commit'),
    array('function.odbc-connect.php3', 'odbc_connect'),
    array('function.odbc-cursor.php3', 'odbc_cursor'),
    array('function.odbc-do.php3', 'odbc_do'),
    array('function.odbc-exec.php3', 'odbc_exec'),
    array('function.odbc-execute.php3', 'odbc_execute'),
    array('function.odbc-fetch-into.php3', 'odbc_fetch_into'),
    array('function.odbc-fetch-row.php3', 'odbc_fetch_row'),
    array('function.odbc-field-name.php3', 'odbc_field_name'),
    array('function.odbc-field-num.php3', 'odbc_field_num'),
    array('function.odbc-field-type.php3', 'odbc_field_type'),
    array('function.odbc-free-result.php3', 'odbc_free_result'),
    array('function.odbc-num-fields.php3', 'odbc_num_fields'),
    array('function.odbc-pconnect.php3', 'odbc_pconnect'),
    array('function.odbc-prepare.php3', 'odbc_prepare'),
    array('function.odbc-num-rows.php3', 'odbc_num_rows'),
    array('function.odbc-result.php3', 'odbc_result'),
    array('function.odbc-result-all.php3', 'odbc_result_all'),
    array('function.odbc-rollback.php3', 'odbc_rollback'))));
manualHeader('odbc_exec');
?><H1
>odbc_exec</H1
><P
>odbc_exec -- Prepare and execute a SQL statement</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int odbc_exec(int connection_id, string query_string);<P
>Returns:   Returns 0 (false) on error. Returns an ODBC result
  identifier if the SQL command was executed successfully.
 odbc_exec will send an SQL statement to the database server specified by
 the connection_id. The connection_id must be a valid identifier that
 was returned by <A
HREF="function.odbc-connect.php3"
>odbc_connect</A
> or
 <A
HREF="function.odbc-pconnect.php3"
>odbc_pconnect</A
>.</P
><P
> 
See also: <A
HREF="function.odbc-prepare.php3"
>odbc_prepare</A
> and <A
HREF="function.odbc-execute.php3"
>odbc_execute</A
> for multiple execution of SQL statements.
   </P
></DIV
><?php manualFooter('odbc_exec');?>