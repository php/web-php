<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('installation.php3', 'Installation'),
  'next' => array('installation02.php3', 'Problems?'),
  'up'   => array('installation.php3', 'Installation'),
  'toc'  => array(
    array('installation.php3#I(INSTALLATION)C(1,TITLE)', ''),
    array('installation.php3#I(INSTALLATION)C(1,ABSTRACT)', ''),
    array('installation01.php3', 'Installing From Source on UNIX'),
    array('installation02.php3', 'Problems?'),
    array('installation03.php3', 'Security'))));
manualHeader('Installing From Source on UNIX');
?><H1
><A
NAME="I(INSTALLATION)C(1,SECT1)"
>Installing From Source on UNIX</A
></H1
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(1,SECT2)"
>Downloading Source</A
></H2
><P
>     The source code for the latest version can be found at
     <TT
CLASS="LITERAL"
><A
HREF="http://www.php.net"
>http://www.php.net</A
></TT
>.
    </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(2,SECT2)"
>Configuration</A
></H2
><P
>     There are three ways of configuring PHP3.
     
     <P
></P
><UL
><LI
><P
>       Through the web interface available on the PHP3 distribution
       sites where you probably downloaded it from.  The main site is
       <A
HREF="http://www.php.net/config.php3"
>http://www.php.net/config.php3</A
>
       (requires JavaScript support in your browser).  This form
       remembers one configuration for your registered email address.
       When you are done setting up your installation here, you simply
       copy and paste a "configure" command to run on your UNIX
       command-line to set up PHP3.
      </P
></LI
><LI
><P
>       Using the "setup" script that comes with PHP3.  This script
       asks you a series of questions (almost like the "install"
       script of PHP/FI 2.0) and runs "configure" in the end.  To run
       this script, type <B
CLASS="COMMAND"
>./setup</B
>.
      </P
></LI
><LI
><P
>       Running configure by hand.  To see what options you have, type
       <B
CLASS="COMMAND"
>./configure --help</B
>.
      </P
></LI
></UL
>
     
    </P
><P
>     Details about some of the different configuration options are
     listed below.

   </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(3,SECT2)"
>Apache module</A
></H2
><P
>     To build PHP3 as an Apache module, answer "yes" to "Apache
     support" (the
     --with-apache=<TT
CLASS="REPLACEABLE"
><I
>DIR</I
></TT
>
     option to configure) and specify the Apache distribution base
     directory.  If you have unpacked your Apache distribution in
     <TT
CLASS="FILENAME"
>/usr/local/www/apache_1.2.4</TT
>,
     this is your Apache distribution base directory.  The default
     directory is <TT
CLASS="FILENAME"
>/usr/local/etc/httpd</TT
>.

   </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(4,SECT2)"
>CGI version</A
></H2
><P
>     The default is to build PHP3 as a CGI program.  If you are
     running a web server PHP3 has module support for, you should
     generally go for that solution for performance reasons.  However,
     the CGI version enables Apache users to run different
     PHP3-enabled pages under different user-ids.

   </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(5,SECT2)"
>Database Support Options</A
></H2
><P
>     PHP3 has native support for a number of databases (as well as
     ODBC):

    </P
><H3
><A
NAME="WITH-ADABAS"
>Adabas D</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-adabas<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Compiles with Adabas D support.  The parameter is the Adabas D
      install directory and defaults to <TT
CLASS="FILENAME"
>/usr/local/adabasd</TT
>.
     </P
><P
>      <A
HREF="http://www.softwareag.com"
>Software AG home
      page</A
>
    </P
><H3
><A
NAME="WITH-DBASE"
>dBase</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-dbase
     </PRE
><P
>      Enables the bundled DBase support.  No external libraries are
      required.
    </P
><H3
><A
NAME="WITH-FILEPRO"
>filePro</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-filepro
     </PRE
><P
>      Enables the bundled read-only filePro support.  No external
      libraries are required.
    </P
><H3
><A
NAME="WITH-MSQL"
>mSQL</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-msql<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Enables mSQL support.  The parameter to this option is the mSQL
      install directory and defaults to <TT
CLASS="FILENAME"
>/usr/local/Hughes</TT
>.  This is the
      default directory of the mSQL 2.0 distribution.
      <B
CLASS="COMMAND"
>configure</B
> automatically detects which mSQL
      version you are running and PHP3 supports both 1.0 and 2.0, but
      if you compile PHP3 with mSQL 1.0, you can only access mSQL 1.0
      databases, and vice-versa.
     </P
><P
>      <A
HREF="http://www.hughes.com.au"
>mSQL home page</A
>
    </P
><H3
><A
NAME="WITH-MYSQL"
>MySQL</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-mysql<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Enables MySQL support.  The parameter to this
      option is the MySQL install directory and defaults to <TT
CLASS="FILENAME"
>/usr/local</TT
>.  This is the default
      installation directory of the MySQL distribution.
     </P
><P
>      <A
HREF="http://www.tcx.se"
>MySQL home page</A
>
    </P
><H3
><A
NAME="WITH-IODBC"
>iODBC</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-iodbc<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes iODBC support.  This is an ODBC library developed for
      use with MySQL.  The parameter to this option is the iODBC
      installation directory and defaults to <TT
CLASS="FILENAME"
>/usr/local</TT
>.
     </P
><P
>      <A
HREF="http://www.tcx.se"
>MySQL/iODBC home page</A
>
    </P
><H3
><A
NAME="WITH-ORACLE"
>Oracle</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-oracle<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes Oracle support.  Has been tested and should be working
      at least with Oracle versions 7.0 through 7.3.  The parameter is
      the <TT
CLASS="ENVAR"
>ORACLE_HOME</TT
> directory.  You do not have to
      specify this parameter if your Oracle environment has been set
      up.
     </P
><P
>      <A
HREF="http://www.oracle.com"
>Oracle home page</A
>
    </P
><H3
><A
NAME="WITH-PGSQL"
>Postgres95</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-pgsql<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes Postgres95 support.  The parameter is the Postgres95 base
      install directory and defaults to <TT
CLASS="FILENAME"
>/usr/local/pgsql</TT
>.
    </P
><H3
><A
NAME="WITH-SOLID"
>Solid</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-solid<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes Solid support.  The parameter is the Solid install
      directory and defaults to <TT
CLASS="FILENAME"
>/usr/local/solid</TT
>.
     </P
><P
>      <A
HREF="http://www.solidtech.com"
>Solid home page</A
>
    </P
><H3
><A
NAME="WITH-SYBASE"
>Sybase</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-sybase<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes Sybase support.  The parameter is the Sybase install
      directory and defaults to <TT
CLASS="FILENAME"
>/home/sybase</TT
>.
     </P
><P
>      <A
HREF="http://www.sybase.com"
>Sybase home page</A
>
    </P
><H3
><A
NAME="WITH-SYBASE-CT"
>Sybase-CT</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-sybase-ct<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes Sybase-CT support.  The parameter is the Sybase-CT
      install directory and defaults to <TT
CLASS="FILENAME"
>/home/sybase</TT
>.
    </P
><H3
><A
NAME="ENABLE-UNIFIED-ODBC"
>Unified ODBC</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-unified-odbc
     </PRE
><P
>      Enables the Unified ODBC module, which is a common interface to
      all the databases with ODBC-based interfaces, such as Solid and
      Adabas D.  It also works for normal ODBC libraries.
    </P
><H3
><A
NAME="WITH-LDAP"
>LDAP</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-ldap<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Includes LDAP (Lightweight Directory Access
      Protocol) support.  The parameter is the LDAP base install
      directory, defaults to <TT
CLASS="FILENAME"
>/usr/local/ldap</TT
>.
    </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(6,SECT2)"
>Other configure options</A
></H2
><H3
><A
NAME="ENABLE-MAINTAINER-MODE"
>--enable-maintainer-mode</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-maintainer-mode
     </PRE
><P
>      Turns on extra dependencies and compiler warnings used by some
      of the PHP3 developers.
    </P
><H3
><A
NAME="WITH-SYSTEM-REGEX"
>--with-system-regex</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-system-regex
     </PRE
><P
>      Uses the system's regular expression library rather than the
      bundled one.  If you are building PHP3 as a server module, you
      must use the same library when building PHP3 as when linking the
      server.  It is recommended that you use the bundled library if
      possible.
    </P
><H3
><A
NAME="WITH-CONFIG-FILE-PATH"
>--with-config-file-path</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-config-file-path=DIR
     </PRE
><P
>      The path used to look for <A
HREF="configuration01.php3"
>the
      php3.ini file</A
> when PHP starts up.
    </P
><H3
><A
NAME="WITH-EXEC-DIR"
>--with-exec-dir</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --with-exec-dir<TT
CLASS="REPLACEABLE"
><I
>=DIR</I
></TT
>
     </PRE
><P
>      Only allow running of executables in DIR when in safe mode.
      Defaults to <TT
CLASS="FILENAME"
>/usr/local/bin</TT
>.
    </P
><H3
><A
NAME="DISABLE-DEBUG"
>--disable-debug</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --disable-debug
     </PRE
><P
>      Does not include debug information in the library or executable.
      The debug information makes it easier to pinpoint bugs, so it is
      a good idea to leave debug on as long as PHP3 is in alpha or
      beta state.
    </P
><H3
><A
NAME="ENABLE-SAFE-MODE"
>--enable-safe-mode</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-safe-mode
     </PRE
><P
>      Enables "safe mode" by default.  This option only sets the
      default, it may be enabled or disabled in the configuration file
      later.
    </P
><H3
><A
NAME="ENABLE-TRACK-VARS"
>--enable-track-vars</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-track-vars
     </PRE
><P
>      Makes PHP3 keep track of where GET/POST/cookie variables come
      from in the arrays HTTP_GET_VARS, HTTP_POST_VARS and
      HTTP_COOKIE_VARS.
    </P
><H3
><A
NAME="ENABLE-MAGIC-QUOTES"
>--enable-magic-quotes</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-magic-quotes
     </PRE
><P
>      Enable magic quotes by default.
    </P
><H3
><A
NAME="ENABLE-DEBUGGER"
>--enable-debugger</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-debugger
     </PRE
><P
>      Enables the internal PHP3 debugger support.  This feature is
      still in a very experimental state.
    </P
><H3
><A
NAME="ENABLE-BCMATH"
>--enable-bcmath</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-bcmath
     </PRE
><P
>      Enables <B
CLASS="COMMAND"
>bc</B
> style arbitrary precision math
      functions.
    </P
><H3
><A
NAME="DISABLE-SHORT-TAGS"
>--disable-short-tags</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --disable-short-tags
     </PRE
><P
>      Disables the short form <TT
CLASS="LITERAL"
>&#60;? ?&#62;</TT
> PHP3
      tags.  You must disable the short form if you want to use PHP3
      with XML.  With short tags disabled, the only
      PHP3 code tag is <TT
CLASS="LITERAL"
>&#60;?php ?&#62;</TT
>.
    </P
><H3
><A
NAME="ENABLE-URL-INCLUDES"
>--enable-url-includes</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --enable-url-includes
     </PRE
><P
>      Makes it possible to run code on other HTTP or FTP servers directly
      from PHP3 with <A
HREF="lang-const10.php3"
>include()</A
>.
    </P
><H3
><A
NAME="DISABLE-CGI-FORCE-REDIRECT"
>--disable-cgi-force-redirect</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --disable-cgi-force-redirect
     </PRE
><P
>      When using PHP as a CGI binary, PHP by default always first
      checks that it is used by redirection (for example under Apache,
      by using Action directives).  This makes sure that the PHP
      binary cannot be used to bypass standard web server authentication
      procedures by calling it directly, like
      http://my.host/cgi-bin/php/secret/doc.html.  This example accesses
      http://my.host/secret/doc.html but does not honour any security
      settings enforced by httpd for directory /secret.

     </P
><P
>      This option disables the check and enables bypassing httpd
      security and authentication settings.  Use it only if your
      server software is unable to indicate that a safe redirection
      was done and all your files under your document root and
      user directories may be accessed by anyone.
    </P
><H3
><A
NAME="DISABLE-SYNTAX-HL"
>--disable-syntax-hl</A
></H3
><PRE
CLASS="SYNOPSIS"
>      --disable-syntax-hl
     </PRE
><P
>      Turns off syntax highlighting.
    </P
><H3
><A
NAME="I(INSTALLATION)C(1,SECT1)(6,SECT2)(15,SECT3)"
>CFLAGS and LDFLAGS</A
></H3
><P
>      To make the PHP3 installation look for header or library files in
      different directories, modify the <TT
CLASS="ENVAR"
>CFLAGS</TT
> and
      <TT
CLASS="ENVAR"
>LDFLAGS</TT
> environment variables, respectively.  If
      you are using a sensible shell, you should be able to do
      <B
CLASS="COMMAND"
>LDFLAGS=-L/my/lib/dir CFLAGS=-I/my/include/dir ./configure
      </B
>
    </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(7,SECT2)"
>Building</A
></H2
><P
>     When PHP3 is configured, you are ready to build the CGI
     executable or the PHP3 library.  The command
     <B
CLASS="COMMAND"
>make</B
> should take care of this.  If it fails
     and you can't figure out why, see the <A
HREF="installation02.php3"
>Problems section</A
>.
   </P
><H2
><A
NAME="I(INSTALLATION)C(1,SECT1)(8,SECT2)"
>Testing</A
></H2
><P
>     If you have built PHP3 as a CGI program, you may test your build
     by typing <B
CLASS="COMMAND"
>make test</B
>.  It is always a good idea
     to test your build.  This way you may catch a problem with PHP3
     on your platform early instead of having to struggle with it
     later.
   </P
><?php manualFooter('Installing From Source on UNIX');?>