<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.gmdate.php3', 'gmdate'),
  'next' => array('function.time.php3', 'time'),
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
manualHeader('mktime');
?><H1
>mktime</H1
><P
>mktime -- get UNIX timestamp for a date</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int mktime(int hour, int minute, int second, int month, int day, int year);<P
>     Returns the Unix timestamp corresponding to the arguments
     given. This timestamp is a long integer containing the number of
     seconds between the Unix Epoch (January 1 1970) and the time
     specified.
    </P
><P
>     Arguments may be left out in order from right to left; any
     arguments thus omitted will be set to the current value according
     to the local date and time.
    </P
><P
>     MkTime is useful for doing date arithmetic and validation, as it
     will automatically calculate the correct value for out-of-range
     input. For example, each of the following lines produces the
     string "Jan-01-1998".
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
>Example 1. mktime() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>echo date( "M-d-Y", mktime(0,0,0,12,32,1997) );
echo date( "M-d-Y", mktime(0,0,0,13,1,1997) );
echo date( "M-d-Y", mktime(0,0,0,1,1,1998) );</PRE
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
> and <A
HREF="function.mktime.php3"
>mktime()</A
>.
    </P
></DIV
><?php manualFooter('mktime');?>