<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.datetime.php3', 'Date/Time Functions'),
  'next' => array('function.date.php3', 'date'),
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
manualHeader('checkdate');
?><H1
>checkdate</H1
><P
>checkdate -- validate a date/time</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int checkdate(int month, int day, int year);<P
>     Returns true if the date given is valid; otherwise returns false.
     Checks the validity of the date formed by the arguments. A date is
     considered valid if:
     <P
></P
><UL
><LI
><P
>        year is between 1900 and 32767 inclusive
       </P
></LI
><LI
><P
>        month is between 1 and 12 inclusive
       </P
></LI
><LI
><P
>        day is within the allowed number of days for the given month.
        Leap years are taken into consideration.
       </P
></LI
></UL
>
    </P
></DIV
><?php manualFooter('checkdate');?>