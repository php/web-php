<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.opendir.php3', 'opendir'),
  'next' => array('function.rewinddir.php3', 'rewinddir'),
  'up'   => array('ref.dir.php3', 'Directory Functions'),
  'toc'  => array(
    array('ref.dir.php3#I(REF.DIR)C(1,TITLE)', ''),
    array('function.chdir.php3', 'chdir'),
    array('function.closedir.php3', 'closedir'),
    array('function.opendir.php3', 'opendir'),
    array('function.readdir.php3', 'readdir'),
    array('function.rewinddir.php3', 'rewinddir'))));
manualHeader('readdir');
?><H1
>readdir</H1
><P
>readdir -- read entry from directory handle</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>string readdir(int dir_handle);<P
>    Returns the filename of the next file from the directory. The
    filenames are not returned in any particular order.</P
></DIV
><?php manualFooter('readdir');?>