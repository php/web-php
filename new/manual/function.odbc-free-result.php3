<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.odbc-field-type.php3', 'odbc_field_type'),
  'next' => array('function.odbc-num-fields.php3', 'odbc_num_fields'),
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
manualHeader('odbc_free_result');
?><H1
>odbc_free_result</H1
><P
>odbc_free_result -- free resources associated with a result</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int odbc_free_result(int result_id);<P
>     Always returns <TT
CLASS="LITERAL"
>true</TT
>.
    </P
><P
>     <B
CLASS="FUNCTION"
>odbc_free_result()</B
> only needs to be called if
     you are worried about using too much memory while your script is
     running.  All result memory will automatically be freed when the
     script is finished.  But, if you are sure you are not going to
     need the result data anymore in a script, you may call
     <B
CLASS="FUNCTION"
>odbc_free_result()</B
>, and the memory associated
     with <TT
CLASS="PARAMETER"
><I
>result_id</I
></TT
> will be freed.
    </P
><P
>     <BLOCKQUOTE
CLASS="NOTE"
><P
><B
>NOTE: </B
>       If auto-commit is disabled (see
       <A
HREF="function.odbc-autocommit.php3"
><B
CLASS="FUNCTION"
>odbc_autocommit()</B
></A
>) and you call
       <B
CLASS="FUNCTION"
>odbc_free_result()</B
> before commiting, all
       pending transactions are rolled back.
      </P
></BLOCKQUOTE
>
   </P
></DIV
><?php manualFooter('odbc_free_result');?>