<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.odbc-num-fields.php3', 'odbc_num_fields'),
  'next' => array('function.odbc-prepare.php3', 'odbc_prepare'),
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
manualHeader('odbc_pconnect');
?><H1
>odbc_pconnect</H1
><P
>odbc_pconnect -- Open a persistent database connection</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int odbc_pconnect(string dsn, string user, string password);<P
>     Returns an ODBC connection id or 0 (<TT
CLASS="LITERAL"
>false</TT
>) on error.  This
     function is much like <A
HREF="function.odbc-connect.php3"
><B
CLASS="FUNCTION"
>odbc_connect()</B
></A
>, except
     that the connection is not really closed when the script has
     finished.  Future requests for a connection with the same
     <TT
CLASS="PARAMETER"
><I
>dsn</I
></TT
>, <TT
CLASS="PARAMETER"
><I
>user</I
></TT
>,
     <TT
CLASS="PARAMETER"
><I
>password</I
></TT
> combination (via
     <A
HREF="function.odbc-connect.php3"
><B
CLASS="FUNCTION"
>odbc_connect()</B
></A
> and
     <B
CLASS="FUNCTION"
>odbc_pconnect()</B
>) can reuse the persistent
     connection.
    </P
><P
>     <BLOCKQUOTE
CLASS="NOTE"
><P
><B
>NOTE: </B
>       Persistent connections have no effect if PHP is used as a CGI
       program.
      </P
></BLOCKQUOTE
>
    </P
><P
>     For more information on persistent connections, refer to the PHP3
     FAQ.
   </P
></DIV
><?php manualFooter('odbc_pconnect');?>