<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.odbc-fetch-into.php3', 'odbc_fetch_into'),
  'next' => array('function.odbc-field-name.php3', 'odbc_field_name'),
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
manualHeader('odbc_fetch_row');
?><H1
>odbc_fetch_row</H1
><P
>odbc_fetch_row -- Fetch a row</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int odbc_fetch_row(int result_id, int row_number);<P
>     If <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> was succesful (there was a
     row), <TT
CLASS="LITERAL"
>true</TT
> is returned.  If there are no more
     rows, <TT
CLASS="LITERAL"
>false</TT
> is returned.
 
    </P
><P
>     <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> fetches a row of the data
     that was returned by <A
HREF="function.odbc-do.php3"
><B
CLASS="FUNCTION"
>odbc_do()</B
></A
> /
     <A
HREF="function.odbc-exec.php3"
><B
CLASS="FUNCTION"
>odbc_exec()</B
></A
>.  After
     <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> is called, the fields of that
     row can be accessed with <A
HREF="function.odbc-result.php3"
><B
CLASS="FUNCTION"
>odbc_result()</B
></A
>.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>row_number</I
></TT
> is not specified,
     <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> will try to fetch the next
     row in the result set. Calls to
     <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> with and without
     <TT
CLASS="PARAMETER"
><I
>row_number</I
></TT
> can be mixed. 

    </P
><P
>     To step through the result more than once, you can call
     <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> with
     <TT
CLASS="PARAMETER"
><I
>row_number</I
></TT
> 1, and then continue doing
     <B
CLASS="FUNCTION"
>odbc_fetch_row()</B
> without
     <TT
CLASS="PARAMETER"
><I
>row_number</I
></TT
> to review the result.  If a
     driver doesn't support fetching rows by number, the
     <TT
CLASS="PARAMETER"
><I
>row_number</I
></TT
> parameter is ignored.

   </P
></DIV
><?php manualFooter('odbc_fetch_row');?>