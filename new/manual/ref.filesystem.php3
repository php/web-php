<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.rewinddir.php3', 'rewinddir'),
  'next' => array('function.chgrp.php3', 'chgrp'),
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
manualHeader('Filesystem Functions');
?><H1
><A
NAME="REF.FILESYSTEM"
>Filesystem Functions</A
></H1
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="function.chgrp.php3"
>chgrp</A
></DT
><DT
><A
HREF="function.chmod.php3"
>chmod</A
></DT
><DT
><A
HREF="function.chown.php3"
>chown</A
></DT
><DT
><A
HREF="function.clearstatcache.php3"
>clearstatcache</A
></DT
><DT
><A
HREF="function.fclose.php3"
>fclose</A
></DT
><DT
><A
HREF="function.feof.php3"
>feof</A
></DT
><DT
><A
HREF="function.fgetc.php3"
>fgetc</A
></DT
><DT
><A
HREF="function.fgets.php3"
>fgets</A
></DT
><DT
><A
HREF="function.fgetss.php3"
>fgetss</A
></DT
><DT
><A
HREF="function.file.php3"
>file</A
></DT
><DT
><A
HREF="function.fileatime.php3"
>fileatime</A
></DT
><DT
><A
HREF="function.filectime.php3"
>filectime</A
></DT
><DT
><A
HREF="function.filegroup.php3"
>filegroup</A
></DT
><DT
><A
HREF="function.fileinode.php3"
>fileinode</A
></DT
><DT
><A
HREF="function.filemtime.php3"
>filemtime</A
></DT
><DT
><A
HREF="function.fileowner.php3"
>fileowner</A
></DT
><DT
><A
HREF="function.fileperms.php3"
>fileperms</A
></DT
><DT
><A
HREF="function.filesize.php3"
>filesize</A
></DT
><DT
><A
HREF="function.filetype.php3"
>filetype</A
></DT
><DT
><A
HREF="function.fileumask.php3"
>fileumask</A
></DT
><DT
><A
HREF="function.fopen.php3"
>fopen</A
></DT
><DT
><A
HREF="function.fpassthru.php3"
>fpassthru</A
></DT
><DT
><A
HREF="function.fputs.php3"
>fputs</A
></DT
><DT
><A
HREF="function.fseek.php3"
>fseek</A
></DT
><DT
><A
HREF="function.ftell.php3"
>ftell</A
></DT
><DT
><A
HREF="function.mkdir.php3"
>mkdir</A
></DT
><DT
><A
HREF="function.pclose.php3"
>pclose</A
></DT
><DT
><A
HREF="function.popen.php3"
>popen</A
></DT
><DT
><A
HREF="function.readfile.php3"
>readfile</A
></DT
><DT
><A
HREF="function.rename.php3"
>rename</A
></DT
><DT
><A
HREF="function.rewind.php3"
>rewind</A
></DT
><DT
><A
HREF="function.rmdir.php3"
>rmdir</A
></DT
><DT
><A
HREF="function.stat.php3"
>stat</A
></DT
><DT
><A
HREF="function.tempnam.php3"
>tempnam</A
></DT
><DT
><A
HREF="function.touch.php3"
>touch</A
></DT
><DT
><A
HREF="function.basename.php3"
>basename</A
></DT
><DT
><A
HREF="function.dirname.php3"
>dirname</A
></DT
><DT
><A
HREF="function.copy.php3"
>copy</A
></DT
></DL
><?php manualFooter('Filesystem Functions');?>