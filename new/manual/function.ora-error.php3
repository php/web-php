<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ora-commiton.php3', 'Ora_CommitOn'),
  'next' => array('function.ora-errorcode.php3', 'Ora_ErrorCode'),
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
manualHeader('Ora_Error');
?><H1
>Ora_Error</H1
><P
>Ora_Error -- get Oracle error message</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string Ora_Error(int cursor);<P
>     Returns an error message of the form
     <TT
CLASS="REPLACEABLE"
><I
>XXX</I
></TT
>-<TT
CLASS="REPLACEABLE"
><I
>NNNNN</I
></TT
>
     where <TT
CLASS="REPLACEABLE"
><I
>XXX</I
></TT
> is where the error comes
     from and <TT
CLASS="REPLACEABLE"
><I
>NNNNN</I
></TT
> identifies the error
     message.

   </P
></DIV
><?php manualFooter('Ora_Error');?>