<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.info.php3', 'PHP options & information'),
  'next' => array('function.get-cfg-var.php3', 'get_cfg_var'),
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
manualHeader('getenv');
?><H1
>getenv</H1
><P
>getenv -- Get the value of an environment variable.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string getenv(string varname);<P
>     Returns the value of the environment variable
     <TT
CLASS="PARAMETER"
><I
>varname</I
></TT
>, or false on an error. 

   </P
></DIV
><?php manualFooter('getenv');?>