<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('ref.dir.php3', 'Directory Functions'),
  'next' => array('function.closedir.php3', 'closedir'),
  'up'   => array('ref.dir.php3', 'Directory Functions'),
  'toc'  => array(
    array('ref.dir.php3#I(REF.DIR)C(1,TITLE)', ''),
    array('function.chdir.php3', 'chdir'),
    array('function.closedir.php3', 'closedir'),
    array('function.opendir.php3', 'opendir'),
    array('function.readdir.php3', 'readdir'),
    array('function.rewinddir.php3', 'rewinddir'))));
manualHeader('chdir');
?><H1
>chdir</H1
><P
>chdir -- change directory</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int chdir(string directory);<P
>     Changes PHP's current directory to
     <TT
CLASS="PARAMETER"
><I
>directory</I
></TT
>.  Returns FALSE if unable to
     change directory, TRUE otherwise.

   </P
></DIV
><?php manualFooter('chdir');?>