<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.gethostbyaddr.php3', 'gethostbyaddr'),
  'next' => array('ref.odbc.php3', 'ODBC Functions'),
  'up'   => array('ref.network.php3', 'Network Functions'),
  'toc'  => array(
    array('ref.network.php3#I(REF.NETWORK)C(1,TITLE)', ''),
    array('function.fsockopen.php3', 'fsockopen'),
    array('function.gethostbyaddr.php3', 'gethostbyaddr'),
    array('function.gethostbyname.php3', 'gethostbyname'))));
manualHeader('gethostbyname');
?><H1
>gethostbyname</H1
><P
>gethostbyname -- Get the IP address corresponding to a given
    Internet host name.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string gethostbyname(string hostname);<P
>     Returns the IP address of the Internet host specified by
     <TT
CLASS="PARAMETER"
><I
>hostname</I
></TT
>. 

     </P
><P
>     See also <A
HREF="function.gethostbyaddr.php3"
>gethostbyaddr</A
>.

   </P
></DIV
><?php manualFooter('gethostbyname');?>