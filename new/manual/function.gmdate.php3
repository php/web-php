<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.getdate.php3', 'getdate'),
  'next' => array('function.mktime.php3', 'mktime'),
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
manualHeader('gmdate');
?><H1
>gmdate</H1
><P
>gmdate -- format a GMT/CUT date/time</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string gmdate(string format, int timestamp);<P
>     Identical to the <A
HREF="function.date.php3"
>date</A
>
     function except that the time returned is Greenwich Mean Time
     (GMT). For example, when run in Finland (GMT +0200), the first
     line below prints "Jan 01 1998 00:00:00", while the second prints
     "Dec 31 1997 22:00:00".
     <TABLE
WIDTH="100%"
BORDER="0"
CELLPADDING="0"
CELLSPACING="0"
CLASS="EXAMPLE"
><TR
><TD
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. gmdate() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>echo date( "M d Y H:i:s",mktime(0,0,0,1,1,1998) );
echo gmdate( "M d Y H:i:s",mktime(0,0,0,1,1,1998) );</PRE
></DIV
></TD
></TR
></TABLE
>
    </P
><P
>     See also <A
HREF="function.date.php3"
>date()</A
> and
     <A
HREF="function.mktime.php3"
>mktime()</A
>.
    </P
></DIV
><?php manualFooter('gmdate');?>