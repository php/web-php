<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ora-exec.php3', 'Ora_Exec'),
  'next' => array('function.ora-getcolumn.php3', 'Ora_GetColumn'),
  'up'   => array('ref.oracle.php3', 'Oracle functions'),
  'toc'  => array(
    array('ref.oracle.php3#I(REF.ORACLE)C(1,TITLE)', ''),
    array('function.ora-close.php3', 'Ora_Close'),
    array('function.ora-commit.php3', 'Ora_Commit'),
    array('function.ora-commitoff.php3', 'Ora_CommitOff'),
    array('function.ora-commiton.php3', 'Ora_CommitOn'),
    array('function.ora-error.php3', 'Ora_Error'),
    array('function.ora-errorcode.php3', 'Ora_ErrorCode'),
    array('function.ora-exec.php3', 'Ora_Exec'),
    array('function.ora-fetch.php3', 'Ora_Fetch'),
    array('function.ora-getcolumn.php3', 'Ora_GetColumn'),
    array('function.ora-logoff.php3', 'Ora_Logoff'),
    array('function.ora-logon.php3', 'Ora_Logon'),
    array('function.ora-open.php3', 'Ora_Open'),
    array('function.ora-parse.php3', 'Ora_Parse'),
    array('function.ora-rollback.php3', 'Ora_Rollback'))));
manualHeader('Ora_Fetch');
?><H1
>Ora_Fetch</H1
><P
>Ora_Fetch -- fetch a row of data from a cursor</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ora_fetch(int cursor);<P
>     Returns true (a row was fetched) or false (no more rows, or an
     error occured).  If an error occured, details can be retrieved
     using the <A
HREF="function.ora-error.php3"
><B
CLASS="FUNCTION"
>ora_error()</B
></A
> and
     <A
HREF="function.ora-errorcode.php3"
><B
CLASS="FUNCTION"
>ora_errorcode()</B
></A
> functions.  If there was no
     error, <A
HREF="function.ora-errorcode.php3"
><B
CLASS="FUNCTION"
>ora_errorcode()</B
></A
> will return 0.
     Retrieves a row of data from the specified cursor.

   </P
></DIV
><?php manualFooter('Ora_Fetch');?>