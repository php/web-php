<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('function.popen.php3', 'popen'),
  'next' => array('function.rename.php3', 'rename'),
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
manualHeader('readfile');
?><H1
>readfile</H1
><P
>readfile -- output a file</P
><DIV
CLASS="REFSECT1"
><H2
>Description</H2
>int readfile(string filename);<P
>    Reads a file and writes it to standard output.
    </P
><P
>    Returns the number of bytes read from the file. If an error
     occurs, false is returned and unless the function was called as
     @readfile, an error message is printed.
    </P
><P
>    If <TT
CLASS="PARAMETER"
><I
>filename</I
></TT
> begins with "http://"
     (not case sensitive), an HTTP 1.0 connection is opened to the 
     specified server and the text of the response is written to
     standard output.
    </P
><P
>    Does not handle HTTP redirects, so you must include trailing
     slashes on directories.
    </P
><P
>    If <TT
CLASS="PARAMETER"
><I
>filename</I
></TT
> begins with "ftp://"
     (not case sensitive), an ftp connection to the specified server is
     opened and the requested file is written to standard output. If the server
     does not support passive mode ftp, this will fail.
    </P
><P
>    If <TT
CLASS="PARAMETER"
><I
>filename</I
></TT
> begins with neither
     of these strings, the file will be opened from the filesystem and
     its contents written to standard output.
    </P
><P
>    
     See also <A
HREF="function.fpassthru.php3"
>fpassthru</A
>, <A
HREF="function.file.php3"
>file</A
>, and <A
HREF="function.fopen.php3"
>fopen</A
>.
     
   </P
></DIV
><?php manualFooter('readfile');?>