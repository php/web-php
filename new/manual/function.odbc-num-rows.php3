<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.odbc-prepare.php3', 'odbc_prepare'),
  'next' => array('function.odbc-result.php3', 'odbc_result'),
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
manualHeader('odbc_num_rows');
?><H1
>odbc_num_rows</H1
><P
>odbc_num_rows -- Number of rows in a result</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int odbc_num_rows(int result_id);<P
>     <B
CLASS="FUNCTION"
>odbc_num_rows()</B
> will return the number of rows
     in an ODBC result.  This function will return -1 on error.  For
     INSERT, UPDATE and DELETE statements
     <B
CLASS="FUNCTION"
>odbc_num_rows()</B
> returns the number of rows
     affected.  For a SELECT clause this can be the number of rows
     available.
    </P
><P
>     Note: Using <B
CLASS="FUNCTION"
>odbc_num_rows()</B
> after a SELECT is
     not supported by most ODBC drivers and thus returns -1.
   </P
></DIV
><?php manualFooter('odbc_num_rows');?>