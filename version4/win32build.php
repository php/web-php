<?
require("shared.inc");
commonHeader("PHP 4.0 build instructions - Win32 platform");
?>

<P>These build instructions were compiled from various postings on the php3
newsgroup, and tested on a WinNT 4.0 SP4, Win98, and Win2K machines with
Microsoft Visual C++ V6.  It also believed to work with Windows 95 and
Visual C++ V5.</P>
<P>
If you have suggestions or additions, send them to
<A HREF="mailto:php3@lists.php.net">php3@lists.php.net</A>.</P>
<HR noshade>

<DL>
<DT><a HREF="#1">1. Preface</A></DT>
<DT><a HREF="#2">2. Preparations</A></DT>
<DT><a HREF="#3">3. Installation</A></DT>
<DT><a HREF="#4">4. Building</A></DT>
</DL>

<HR noshade>

<H2><A NAME="1">1. Preface</A></H2>
<P>Before getting started, it is worthwhile
answering the question:  &quot;Why is building
on Windows so hard&quot;? Two reasons come
to mind:</P>
<ul>
<li>Windows does not (yet) enjoy a large community
  of developers who are willing to freely share
  their source. As a direct result, the necessary
  investment in infrastructure required to
  support such development hasn't been made.
  By and large, what is available has been
  made possible by the porting of necessary
  utilities from Unix. Don't be surprised if
  some of this heritage shows through from
  time to time.
<li>Pretty much all of the instructions below
  are of the &quot;set and forget&quot; variety.
  So sit back and try follow the instructions
  below as faithfully as you can.
</ul>
<H2><A NAME="2">2. Preparations</A></H2>
<P>Before you get started, you have a lot to
download...</P><UL>
  <LI>For starters, get the Cygwin toolkit from
  the closes Cygnus <A href="http://sourceware.cygnus.com/cygwin/download.html">mirror</A> site.
  What you are looking for is cygwin.exe file.  This will provide you most
  of the popular GNU utilities used by the build process.
  <LI>Now download the rest of the PHP win32 build tools you will need from the
  PHP <A href="http://www.php.net/extra/win32build.zip">extra</A> site.
  <LI>Also at the
  <A href="http://www.php.net/extra/bindlib_w32.zip">downloads</A> site,
  is a replacement for the resolv.lib included within the win32build.zip.
  This adds some necessary functionality for dns name resolution.
  <LI>If you don't already have an unzip utility, you will need one.
  I use <A href="http://www.cdrom.com/pub/infozip/UnZip.html">InfoZip</A>,
  but others have had success with <A href="http://www.winzip.com/">WinZip</A>
  and <A href="http://www.pkware.com/">PkZip</A>.
</UL>
<p>Finally, you are going to need the source to PHP 4 itself.  Your best bet is
to get is straight from <A href="../anoncvs.php">CVS</A>.
If you get a <A href="http://snaps.php.net/">snapshot</A> or
a <A href="http://www.php.net/downloads.php">source</A> tarball, you
not only will have to untar and ungzip it, but you will have to convert the
bare linefeeds to crlf's in the <CODE>*.dsp</CODE> and <CODE>*.dsw</CODE> files
before Microsoft Visual C++ will have anything to do with them.</P>
<UL>
  <LI><B>Note:</B> place the <CODE>Zend</CODE> and <CODE>TSRM</CODE>
  directories inside the <CODE>php4</CODE> directory in order for the projects
  to be found during the build process.
</UL>

<H2><A NAME="3">3. Installation</A></H2>
<P>Putting it all together.</P>
<UL>

  <LI>Follow the instructions for installing the
  unzip utility of your choosing.


  <LI>Execute the Cygwin.exe and follow the installation instructions.
  If you choose another path than <CODE>C:\Cygnus</CODE>, let the build process know by setting the
  Cygwin environment variable. On Windows 95/98
  setting an environment variable can be done
  by placing a line in your autoexec.bat. On
  Windows NT, go to My Computer =&gt; Control
  Panel =&gt; System and select the environment
  tab.
  <UL>
    <LI><STRONG>Important</STRONG>: make a temporary directory for Cygwin to
    use otherwise many commands (most notably bison) will fail. On Windows
    95/98, <CODE>mkdir C:\TMP</CODE>. For WindowsNT,
    <CODE>mkdir %SystemDrive%\tmp</CODE>.
  </UL>


  <LI>Make a directory and unzip the win32build.zip file into it.


  <LI>Launch Microsoft Visual C++, and from the menu select Tools =&gt;
  Options. In the dialog, select the directories tab. Sequentially change the
  dropdown to Executables, Includes, and Library files, and ensure that the
  Cygwin\bin, win32build\include, and win32build\lib files are in the list
  below respectively. (To add an entry, select a blank line at the end of the
  list and begin typing).  Typical entries will look like this:
  <UL>
    <LI><CODE>C:\Cygnus\bin</CODE>
    <LI><CODE>C:\php-win32build\include</CODE>
    <LI><CODE>C:\php-win32build\lib</CODE>
    </UL>
  <P>Press OK, and exit out of Visual C++.</P>

  <LI>Make another directory and unzip bindlib_w32.zip into it. Decide whether
  you want to have debug symbols available (bindlib - Win32 Debug) or not
  (bindlib - Win32 Release).  Build the appropriate configuration:
  <UL>
    <LI>For GUI users, launch VC++, and then select File =&gt; Open Workspace
    and select bindlib.  Then select Build=&gt;Set Active Configuration
    and select the desired configuration.  Finally select
    Build=&gt;Rebuild All.
    <LI>For cmdline users, make sure that you either
    have the C++ environment variables registered,
    or have run <CODE>vcvars.bat</CODE>, and then execute on of the following:
    <UL>
      <LI><CODE>msdev bindlib.dsp /MAKE &quot;bindlib - Win32
      Debug&quot;</CODE>
      <LI><CODE>msdev bindlib.dsp /MAKE &quot;bindlib - Win32
      Release&quot;</CODE>
    </UL>
    <LI>At this point, you should have a usable resolv.lib in either your
    Debug or Release subdirectories.  Copy this file into your win32build\lib
    directory over the file by the same name found in there.
  </UL>


  <LI>Create a Command window and change directory into your php4 source
  directory.  The number.tar.gz file is packed using standard Unix utilites.
  If you have WinZip, you can use that utility to unpack this file.  Otherwise,
  you can use of the corresponding utilities found in Cygwin as follows:
  <UL>
    <LI><CODE>SETLOCAL</CODE>
    <LI><CODE>%CYGWIN%\cygnus</CODE>
    <LI><CODE>exit</CODE>
    <LI><CODE>gunzip -c number.tar.gz | tar xv</CODE>
    <LI><CODE>ENDLOCAL</CODE>
  </UL>

  </ul>

<H2><A NAME="4">4. Building</A></H2>
<P>The best way to get started is to build the
standalone/CGI version.</P>
<UL><LI>For GUI users, launch VC++, and then select
  File =&gt; Open Workspace and select php4ts.
  Then select Build=&gt;Set Active Configuration
  and select the desired configuration. Finally
  select Build=&gt;Rebuild All.
    <LI>For cmdline users, make sure that you either
  have the C++ environment variables registered,
  or have run <CODE>vcvars.bat</CODE>, and then execute one of the following:
  <UL>
      <LI><CODE>msdev php4ts.dsp /MAKE &quot;php4ts - Win32
    Debug_TS&quot;</CODE>
      <LI><CODE>msdev php4ts.dsp /MAKE &quot;php4ts - Win32
    Release_TS&quot;</CODE>
    <LI>At this point, you should have a usable php.exe in either your
    Debug_TS or Release_TS subdirectories.
    </UL>
  </UL>
<P>Repeat the above steps with php4isapi.dsp
(which can be found in sapi/isapi) in order
to build the code necessary for integrating
PHP with Microsoft IIS.</P>
</BODY>
</HTML>

<? commonFooter(); ?>
