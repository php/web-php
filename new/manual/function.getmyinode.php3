<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.getlastmod.php3', 'getlastmod'),
  'next' => array('function.getmypid.php3', 'getmypid'),
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
manualHeader('getmyinode');
?><H1
>getmyinode</H1
><P
>getmyinode -- Get the inode of the current script.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int getmyinode(void);<P
>     Returns the current script's inode, or false on error.

    </P
><P
>     See also <A
HREF="function.getmypid.php3"
>getmypid</A
>.

   </P
></DIV
><?php manualFooter('getmyinode');?>