<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ora-errorcode.php3', 'Ora_ErrorCode'),
  'next' => array('function.ora-fetch.php3', 'Ora_Fetch'),
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
manualHeader('Ora_Exec');
?><H1
>Ora_Exec</H1
><P
>Ora_Exec -- execute parsed statement on an Oracle cursor</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ora_exec(int cursor);<P
>     Returns true on success, false on error.  Details about the error
     can be retrieved usign the <A
HREF="function.ora-error.php3"
>Ora_Error</A
> and <A
HREF="function.ora-errorcode.php3"
>Ora_ErrorCode</A
>
     functions.

   </P
></DIV
><?php manualFooter('Ora_Exec');?>