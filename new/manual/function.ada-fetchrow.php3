<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ada-exec.php3', 'ada_exec'),
  'next' => array('function.ada-fieldname.php3', 'ada_fieldname'),
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
manualHeader('ada_fetchrow');
?><H1
>ada_fetchrow</H1
><P
>ada_fetchrow -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ada_fetchrow(int result_id, int row_number);<P
>Returns:   If Ada_FetchRow was succesful (there was a row), 1
 is
  returned, if there are no more rows, Ada_FetchRow will return
  0
. The return value of Ada_FetchRow can be used as the
  condition of a while loop.
 

 Ada_FetchRow fetches a row of the data that was returned by Ada_Exec.
 After Ada_FetchRow is called, the fields of that row can be access
 with Ada_Result. If no rownumber is given, Ada_FetchRow will try to
 fetch the next row in the result set. Every time Ada_FetchRow is
 called a new row can be accessed by Ada_Result. Calls to
 Ada_FetchRow() with and without rownumber can be mixed. To step
 through the result more than once, you can call Ada_FetchRow() with
 rownumber 1 and then continue with Ada_FetchRow() without rownumber
 to review the result.

   </P
></DIV
><?php manualFooter('ada_fetchrow');?>