<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.fsockopen.php3', 'fsockopen'),
  'next' => array('function.gethostbyname.php3', 'gethostbyname'),
  'up'   => array('ref.network.php3', 'Network Functions'),
  'toc'  => array(
    array('ref.network.php3#I(REF.NETWORK)C(1,TITLE)', ''),
    array('function.fsockopen.php3', 'fsockopen'),
    array('function.gethostbyaddr.php3', 'gethostbyaddr'),
    array('function.gethostbyname.php3', 'gethostbyname'))));
manualHeader('gethostbyaddr');
?><H1
>gethostbyaddr</H1
><P
>gethostbyaddr -- Get the Internet host name corresponding to a given
    IP address.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string gethostbyaddr(string ip_address);<P
>     Returns the host name of the Internet host specified by
     <TT
CLASS="PARAMETER"
><I
>ip_address</I
></TT
>. If an error occurs, returns
     <TT
CLASS="PARAMETER"
><I
>ip_address</I
></TT
>.

     </P
><P
>     See also <A
HREF="function.gethostbyname.php3"
>gethostbyname</A
>.

   </P
></DIV
><?php manualFooter('gethostbyaddr');?>