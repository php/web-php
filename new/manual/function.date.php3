<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.checkdate.php3', 'checkdate'),
  'next' => array('function.getdate.php3', 'getdate'),
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
manualHeader('date');
?><H1
>date</H1
><P
>date -- format a local time/date</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string date(string format, int timestamp);<P
>     Returns a string formatted according to the given format string
     using the given <TT
CLASS="PARAMETER"
><I
>timestamp</I
></TT
> or the current local time if no
     timestamp is given.

    </P
><P
>     The following characters are recognized in the format string:
     <P
></P
><UL
><LI
><P
>U - seconds since the epoch</P
></LI
><LI
><P
>Y - year, numeric, 4 digits</P
></LI
><LI
><P
>y - year, numeric, 2 digits</P
></LI
><LI
><P
>F - month, textual, long; i.e. "January"</P
></LI
><LI
><P
>M - month, textual, 3 letters; i.e. "Jan"</P
></LI
><LI
><P
>m - month, numeric</P
></LI
><LI
><P
>z - day of the year, numeric; i.e. "299"</P
></LI
><LI
><P
>d - day of the month, numeric</P
></LI
><LI
><P
>l (lowercase 'L') - day of the week, textual, long; i.e. "Friday"</P
></LI
><LI
><P
>D - day of the week, textual, 3 letters; i.e. "Fri"</P
></LI
><LI
><P
>w - day of the week, numeric, 1 digit</P
></LI
><LI
><P
>H - hour, numeric, 24 hour format</P
></LI
><LI
><P
>h - hour, numeric, 12 hour format</P
></LI
><LI
><P
>i - minutes, numeric</P
></LI
><LI
><P
>s - seconds, numeric</P
></LI
><LI
><P
>A - "AM" or "PM"</P
></LI
><LI
><P
>a - "am" or "pm"</P
></LI
><LI
><P
>S - English ordinal suffix, textual, 2 characters; i.e. "th", "nd"</P
></LI
></UL
>
     Unrecognized characters in the format string will be printed as-is. 
     
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
>Example 1. date() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>print(date( "l dS of F Y h:i:s A" ));
print("July 1, 2000 is on a " . date("l", mktime(0,0,0,7,1,2000)));</PRE
></DIV
></TD
></TR
></TABLE
>
     See also <A
HREF="function.gmdate.php3"
>gmdate()</A
> and
     <A
HREF="function.mktime.php3"
>mktime()</A
>.
    </P
></DIV
><?php manualFooter('date');?>