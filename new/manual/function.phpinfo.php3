<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.getmypid.php3', 'getmypid'),
  'next' => array('function.phpversion.php3', 'phpversion'),
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
manualHeader('phpinfo');
?><H1
>phpinfo</H1
><P
>phpinfo -- Output lots of PHP information.</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int phpinfo(void);<P
>     Outputs a large amount of information about the current state of
     PHP. This includes information about PHP compilation options and
     extensions, the PHP version, server information and environment
     (if compiled as a module), the PHP environment, OS version
     information, paths, master and local values of configuration
     options, HTTP headers, and the GNU Public License.

    </P
><P
>     See also <A
HREF="function.phpversion.php3"
>phpversion</A
>.

   </P
></DIV
><?php manualFooter('phpinfo');?>