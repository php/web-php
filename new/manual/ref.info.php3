<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.imagesy.php3', 'ImageSY'),
  'next' => array('function.getenv.php3', 'getenv'),
  'up'   => array('funcref.php3', 'Function Reference'),
  'toc'  => array(
    array('funcref.php3#I(FUNCREF)C(1,TITLE)', ''),
    array('ref.adabas.php3', 'Adabas D Functions'),
    array('ref.array.php3', 'Array Functions'),
    array('ref.bc.php3', 'BC (Arbitrary Precision) Functions'),
    array('ref.datetime.php3', 'Date/Time Functions'),
    array('ref.dir.php3', 'Directory Functions'),
    array('ref.filesystem.php3', 'Filesystem Functions'),
    array('ref.image.php3', 'Image functions'),
    array('ref.info.php3', 'PHP options & information'),
    array('ref.ldap.php3', 'LDAP Functions'),
    array('ref.math.php3', 'Mathematical Functions'),
    array('ref.msql.php3', 'mSQL Functions'),
    array('ref.mysql.php3', 'MySQL Functions'),
    array('ref.network.php3', 'Network Functions'),
    array('ref.odbc.php3', 'ODBC Functions'),
    array('ref.oracle.php3', 'Oracle functions'),
    array('ref.pgsql.php3', 'PostgreSQL functions'),
    array('ref.regex.php3', 'Regular expression functions'),
    array('ref.strings.php3', 'String functions'),
    array('ref.url.php3', 'URL functions'),
    array('ref.var.php3', 'Variable functions'))));
manualHeader('PHP options & information');
?><H1
><A
NAME="REF.INFO"
>PHP options &#38; information</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="function.getenv.php3"
>getenv</A
></DT
><DT
><A
HREF="function.get-cfg-var.php3"
>get_cfg_var</A
></DT
><DT
><A
HREF="function.get-current-user.php3"
>get_current_user</A
></DT
><DT
><A
HREF="function.getlastmod.php3"
>getlastmod</A
></DT
><DT
><A
HREF="function.getmyinode.php3"
>getmyinode</A
></DT
><DT
><A
HREF="function.getmypid.php3"
>getmypid</A
></DT
><DT
><A
HREF="function.phpinfo.php3"
>phpinfo</A
></DT
><DT
><A
HREF="function.phpversion.php3"
>phpversion</A
></DT
></DL
><?php manualFooter('PHP options & information');?>