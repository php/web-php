<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.network.php3', 'Network Functions'),
  'next' => array('function.gethostbyaddr.php3', 'gethostbyaddr'),
  'up'   => array('ref.network.php3', 'Network Functions'),
  'toc'  => array(
    array('ref.network.php3#I(REF.NETWORK)C(1,TITLE)', ''),
    array('function.fsockopen.php3', 'fsockopen'),
    array('function.gethostbyaddr.php3', 'gethostbyaddr'),
    array('function.gethostbyname.php3', 'gethostbyname'))));
manualHeader('fsockopen');
?><H1
>fsockopen</H1
><P
>fsockopen -- Open Internet or Unix domain socket connection.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string fsockopen(string hostname, int port);<P
>     Opens an Internet domain socket connection to
     <TT
CLASS="PARAMETER"
><I
>hostname</I
></TT
> on port
     <TT
CLASS="PARAMETER"
><I
>port</I
></TT
> and returns a file pointer, which may
     be used by <A
HREF="function.fgets.php3"
>fgets</A
>, <A
HREF="function.fgetss.php3"
>fgetss</A
>, <A
HREF="function.fputs.php3"
>fputs</A
>, and <A
HREF="function.fclose.php3"
>fclose</A
>.

     </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>port</I
></TT
> is 0 and the operating system
     supports Unix domain sockets, <TT
CLASS="PARAMETER"
><I
>hostname</I
></TT
>
     will be used as the filename of a Unix domain socket to connect
     to.

   </P
></DIV
><?php manualFooter('fsockopen');?>