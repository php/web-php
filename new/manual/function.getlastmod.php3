<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.get-current-user.php3', 'get_current_user'),
  'next' => array('function.getmyinode.php3', 'getmyinode'),
  'up'   => array('ref.info.php3', 'PHP options & information'),
  'toc'  => array(
    array('ref.info.php3#I(REF.INFO)C(1,TITLE)', ''),
    array('function.getenv.php3', 'getenv'),
    array('function.get-cfg-var.php3', 'get_cfg_var'),
    array('function.get-current-user.php3', 'get_current_user'),
    array('function.getlastmod.php3', 'getlastmod'),
    array('function.getmyinode.php3', 'getmyinode'),
    array('function.getmypid.php3', 'getmypid'),
    array('function.phpinfo.php3', 'phpinfo'),
    array('function.phpversion.php3', 'phpversion'))));
manualHeader('getlastmod');
?><H1
>getlastmod</H1
><P
>getlastmod -- Get time of last page modification.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int getlastmod(void);<P
>     Returns the time of the last modification of the current
     page. The value returned is a Unix timestamp, suitable for
     feeding to <A
HREF="function.date.php3"
>date</A
>. Returns
     false on error.

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
>Example 1. getlastmod() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>// outputs e.g. 'Last modified: March 04 1998 20:43:59.'
echo "Last modified: ".date( "F d Y H:i:s", getlastmod() ).".";       
      </PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     See alse <A
HREF="function.date.php3"
>date</A
>.

   </P
></DIV
><?php manualFooter('getlastmod');?>