<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.closedir.php3', 'closedir'),
  'next' => array('function.readdir.php3', 'readdir'),
  'up'   => array('ref.dir.php3', 'Directory Functions'),
  'toc'  => array(
    array('ref.dir.php3#I(REF.DIR)C(1,TITLE)', ''),
    array('function.chdir.php3', 'chdir'),
    array('function.closedir.php3', 'closedir'),
    array('function.opendir.php3', 'opendir'),
    array('function.readdir.php3', 'readdir'),
    array('function.rewinddir.php3', 'rewinddir'))));
manualHeader('opendir');
?><H1
>opendir</H1
><P
>opendir -- open directory handle</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int opendir(string path);<P
>    Returns a directory handle to be used in subsequent <A
HREF="function.closedir.php3"
>closedir</A
>, <A
HREF="function.readdir.php3"
>readdir</A
>, and <A
HREF="function.rewinddir.php3"
>rewinddir</A
> calls.
  </P
></DIV
><?php manualFooter('opendir');?>