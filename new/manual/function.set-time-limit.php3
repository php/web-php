<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.time.php3', 'time'),
  'next' => array('ref.dir.php3', 'Directory Functions'),
  'up'   => array('ref.datetime.php3', 'Date/Time Functions'),
  'toc'  => array(
    array('ref.datetime.php3#I(REF.DATETIME)C(1,TITLE)', ''),
    array('function.checkdate.php3', 'checkdate'),
    array('function.date.php3', 'date'),
    array('function.getdate.php3', 'getdate'),
    array('function.gmdate.php3', 'gmdate'),
    array('function.mktime.php3', 'mktime'),
    array('function.time.php3', 'time'),
    array('function.set-time-limit.php3', 'set_time_limit'))));
manualHeader('set_time_limit');
?><H1
>set_time_limit</H1
><P
>set_time_limit -- limit execution time</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void set_time_limit(int seconds);<P
>     Set the number of seconds a script is allowed to run.  If this is
     reached, the script returns a fatal error.  The default limit is 30
     seconds or, if it exists, the max_execution_time value defined in
     php3.ini.  If seconds is set to zero, no time limit is imposed.
    </P
></DIV
><?php manualFooter('set_time_limit');?>