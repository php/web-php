<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.getenv.php3', 'getenv'),
  'next' => array('function.get-current-user.php3', 'get_current_user'),
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
manualHeader('get_cfg_var');
?><H1
>get_cfg_var</H1
><P
>get_cfg_var -- Get the value of a PHP configuration option.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string get_cfg_var(string varname);<P
>     Returns the current value of the PHP configuration variable
     specified by <TT
CLASS="PARAMETER"
><I
>varname</I
></TT
>, or false if an error 
     occurs.

   </P
></DIV
><?php manualFooter('get_cfg_var');?>