<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.chdir.php3', 'chdir'),
  'next' => array('function.opendir.php3', 'opendir'),
  'up'   => array('ref.dir.php3', 'Directory Functions'),
  'toc'  => array(
    array('ref.dir.php3#I(REF.DIR)C(1,TITLE)', ''),
    array('function.chdir.php3', 'chdir'),
    array('function.closedir.php3', 'closedir'),
    array('function.opendir.php3', 'opendir'),
    array('function.readdir.php3', 'readdir'),
    array('function.rewinddir.php3', 'rewinddir'))));
manualHeader('closedir');
?><H1
>closedir</H1
><P
>closedir -- close directory handle</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void closedir(int dir_handle);<P
>     Closes the directory stream indicated by
     <TT
CLASS="PARAMETER"
><I
>dir_handle</I
></TT
>. The stream must have previously
     been opened by <A
HREF="function.opendir.php3"
>opendir</A
>.

   </P
></DIV
><?php manualFooter('closedir');?>