<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ada-fieldtype.php3', 'ada_fieldtype'),
  'next' => array('function.ada-numfields.php3', 'ada_numfields'),
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
manualHeader('ada_freeresult');
?><H1
>ada_freeresult</H1
><P
>ada_freeresult -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ada_freeresult(int result_id);<P
>Returns:   True (1
).
 

 ada_freeresult only needs to be called if you are worried about using
 too much memory while your script is running.  All result memory will
 automatically be freed when the script is finished.  But, if you are
 sure you are not going to need the result data anymore in a script,
 you may call ada_freeresult with the result identifier as an argument
 and the associated result memory will be freed. Note: If autocommit
 has been turned off, all pending transactions are rolled back if you
 call ada_freeresult.
   </P
></DIV
><?php manualFooter('ada_freeresult');?>