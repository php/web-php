<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.mktime.php3', 'mktime'),
  'next' => array('function.set-time-limit.php3', 'set_time_limit'),
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
manualHeader('time');
?><H1
>time</H1
><P
>time -- return current UNIX timestamp</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int time(void);<P
>     Returns the current time measured in the number of seconds since
     the Unix Epoch (January 1, 1970).
    </P
><P
>     See also <A
HREF="function.date.php3"
>date()</A
>.
    </P
></DIV
><?php manualFooter('time');?>