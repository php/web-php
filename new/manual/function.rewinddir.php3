<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.readdir.php3', 'readdir'),
  'next' => array('ref.filesystem.php3', 'Filesystem Functions'),
  'up'   => array('ref.dir.php3', 'Directory Functions'),
  'toc'  => array(
    array('ref.dir.php3#I(REF.DIR)C(1,TITLE)', ''),
    array('function.chdir.php3', 'chdir'),
    array('function.closedir.php3', 'closedir'),
    array('function.opendir.php3', 'opendir'),
    array('function.readdir.php3', 'readdir'),
    array('function.rewinddir.php3', 'rewinddir'))));
manualHeader('rewinddir');
?><H1
>rewinddir</H1
><P
>rewinddir -- rewind directory handle</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>void rewinddir(int dir_handle);<P
>     Resets the directory stream indicated by
     <TT
CLASS="PARAMETER"
><I
>dir_handle</I
></TT
> to the beginning of the directory.


   </P
></DIV
><?php manualFooter('rewinddir');?>