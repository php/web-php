<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.phpinfo.php3', 'phpinfo'),
  'next' => array('ref.ldap.php3', 'LDAP Functions'),
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
manualHeader('phpversion');
?><H1
>phpversion</H1
><P
>phpversion -- Get the current PHP version.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string phpversion(void);<P
>     Returns a string containing the version of the currently running
     PHP parser.

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
>Example 1. phpversion() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>// prints e.g. 'Current PHP version: 3.0rel-dev'
echo "Current PHP version: ".phpversion();
      </PRE
></DIV
></TD
></TR
></TABLE
>

    </P
><P
>     See also <A
HREF="function.phpinfo.php3"
>phpinfo</A
>.

   </P
></DIV
><?php manualFooter('phpversion');?>