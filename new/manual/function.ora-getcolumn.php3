<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ora-fetch.php3', 'Ora_Fetch'),
  'next' => array('function.ora-logoff.php3', 'Ora_Logoff'),
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
manualHeader('Ora_GetColumn');
?><H1
>Ora_GetColumn</H1
><P
>Ora_GetColumn -- get data from a fetched row</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>mixed ora_getcolumn(int cursor, mixed column);<P
>     Returns the column data.  If an error occurs, False is returned
     and <A
HREF="function.ora-errorcode.php3"
><B
CLASS="FUNCTION"
>ora_errorcode()</B
></A
>
     will return a non-zero value.  Note, however, that a test for False
     on the results from this function may be true in cases where there is
     not error as well (NULL result, empty string, the number 0, the
     string "0").  Fetches the data for a column or function
     result.

   </P
></DIV
><?php manualFooter('Ora_GetColumn');?>