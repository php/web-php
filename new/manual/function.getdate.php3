<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.date.php3', 'date'),
  'next' => array('function.gmdate.php3', 'gmdate'),
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
manualHeader('getdate');
?><H1
>getdate</H1
><P
>getdate -- get date/time information</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array getdate(int timestamp);<P
>     Returns an associative array containing the date information of the
     timestamp as the following array elements:
     <P
></P
><UL
><LI
><P
>"seconds" - seconds</P
></LI
><LI
><P
>"minutes" - minutes</P
></LI
><LI
><P
>"hours" - hours</P
></LI
><LI
><P
>"mday" - day of the month</P
></LI
><LI
><P
>"wday" - day of the week, numeric</P
></LI
><LI
><P
>"mon" - month, numeric</P
></LI
><LI
><P
>"year" - year, numeric</P
></LI
><LI
><P
>"yday" - day of the year, numeric; i.e. "299"</P
></LI
><LI
><P
>"weekday" - day of the week, textual, full; i.e.
       "Friday"</P
></LI
><LI
><P
>"month" - month, textual, full; i.e. "January"</P
></LI
></UL
>
    </P
></DIV
><?php manualFooter('getdate');?>