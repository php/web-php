<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.rmdir.php3', 'rmdir'),
  'next' => array('function.tempnam.php3', 'tempnam'),
  'up'   => array('ref.filesystem.php3', 'Filesystem Functions'),
  'toc'  => array(
    array('ref.filesystem.php3#I(REF.FILESYSTEM)C(1,TITLE)', ''),
    array('function.chgrp.php3', 'chgrp'),
    array('function.chmod.php3', 'chmod'),
    array('function.chown.php3', 'chown'),
    array('function.clearstatcache.php3', 'clearstatcache'),
    array('function.fclose.php3', 'fclose'),
    array('function.feof.php3', 'feof'),
    array('function.fgetc.php3', 'fgetc'),
    array('function.fgets.php3', 'fgets'),
    array('function.fgetss.php3', 'fgetss'),
    array('function.file.php3', 'file'),
    array('function.fileatime.php3', 'fileatime'),
    array('function.filectime.php3', 'filectime'),
    array('function.filegroup.php3', 'filegroup'),
    array('function.fileinode.php3', 'fileinode'),
    array('function.filemtime.php3', 'filemtime'),
    array('function.fileowner.php3', 'fileowner'),
    array('function.fileperms.php3', 'fileperms'),
    array('function.filesize.php3', 'filesize'),
    array('function.filetype.php3', 'filetype'),
    array('function.fileumask.php3', 'fileumask'),
    array('function.fopen.php3', 'fopen'),
    array('function.fpassthru.php3', 'fpassthru'),
    array('function.fputs.php3', 'fputs'),
    array('function.fseek.php3', 'fseek'),
    array('function.ftell.php3', 'ftell'),
    array('function.mkdir.php3', 'mkdir'),
    array('function.pclose.php3', 'pclose'),
    array('function.popen.php3', 'popen'),
    array('function.readfile.php3', 'readfile'),
    array('function.rename.php3', 'rename'),
    array('function.rewind.php3', 'rewind'),
    array('function.rmdir.php3', 'rmdir'),
    array('function.stat.php3', 'stat'),
    array('function.tempnam.php3', 'tempnam'),
    array('function.touch.php3', 'touch'),
    array('function.basename.php3', 'basename'),
    array('function.dirname.php3', 'dirname'),
    array('function.copy.php3', 'copy'))));
manualHeader('stat');
?><H1
>stat</H1
><P
>stat -- give information about a file</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>array stat(string filename);<P
>     Gathers the statistics of the file named by filename.
    </P
><P
>     Returns an array with the statistics of the file with the
     following elements:
     <P
></P
><OL
TYPE="1"
><LI
><P
>device</P
></LI
><LI
><P
>inode</P
></LI
><LI
><P
>number of links</P
></LI
><LI
><P
>user id of owner</P
></LI
><LI
><P
>group id owner</P
></LI
><LI
><P
>device type if inode device *</P
></LI
><LI
><P
>size in bytes</P
></LI
><LI
><P
>time of last access</P
></LI
><LI
><P
>time of last modification</P
></LI
><LI
><P
>time of last change</P
></LI
><LI
><P
>blocksize for filesystem I/O *</P
></LI
><LI
><P
>number of blocks allocated</P
></LI
></OL
>
     * - only valid on systems supporting the st_blksize type--other
     systems (i.e. Windows) return -1
    
   </P
></DIV
><?php manualFooter('stat');?>