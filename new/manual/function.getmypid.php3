<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.getmyinode.php3', 'getmyinode'),
  'next' => array('function.phpinfo.php3', 'phpinfo'),
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
manualHeader('getmypid');
?><H1
>getmypid</H1
><P
>getmypid -- Get PHP's process ID.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int getmypid(void);<P
>     Returns the current PHP process ID, or false on error.

    </P
><P
>     Note that when running as a server module, separate invocations
     of the script are not guaranteed to have distinct pids.
     
    </P
><P
>     See also <A
HREF="function.getmyinode.php3"
>getmyinode</A
>.

   </P
></DIV
><?php manualFooter('getmypid');?>