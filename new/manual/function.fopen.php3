<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.fileumask.php3', 'fileumask'),
  'next' => array('function.fpassthru.php3', 'fpassthru'),
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
manualHeader('fopen');
?><H1
>fopen</H1
><P
>fopen -- open file or URL</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int fopen(string filename, string mode);<P
>     If <TT
CLASS="PARAMETER"
><I
>filename</I
></TT
> begins with "http://" (not case sensitive), an HTTP
     1.0 connection is opened to the specified server and a file
     pointer is returned to the beginning of the text of the response.

    </P
><P
>     Does not handle HTTP redirects, so you must include trailing
     slashes on directories.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>filename</I
></TT
> begins with "ftp://" (not case sensitive), an ftp
     connection to the specified server is opened and a pointer to the
     requested file is returned. If the server does not support
     passive mode ftp, this will fail.

    </P
><P
>     If <TT
CLASS="PARAMETER"
><I
>filename</I
></TT
> begins with anything else, the
     file will be opened from the filesystem, and a file pointer to
     the file opened is returned.

    </P
><P
>     If the open fails, the function returns false.
    
    </P
><P
><DIV
CLASS="EXAMPLE"
><P
><B
>Example 1. fopen() example</B
></P
><PRE
CLASS="PROGRAMLISTING"
>$fp = fopen( "/home/rasmus/file.txt", "r" );
$fp = fopen( "http://www.php.net/", "r" );</PRE
></DIV
>

    </P
><P
>     See also <A
HREF="function.fclose.php3"
>fclose</A
>.

   </P
></DIV
><?php manualFooter('fopen');?>