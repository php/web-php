<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.ada-fieldname.php3', 'ada_fieldname'),
  'next' => array('function.ada-fieldtype.php3', 'ada_fieldtype'),
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
manualHeader('ada_fieldnum');
?><H1
>ada_fieldnum</H1
><P
>ada_fieldnum -- </P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int ada_fieldnum(int result_id, string field_name);<P
>Returns:   Ada_FieldNum will return the number of the column slot that
  corresponds to the named field in the given Adabas result
  identifier.  Field numbering starts at 1.  0
 (false) is
  returned on error.
 
   </P
></DIV
><?php manualFooter('ada_fieldnum');?>