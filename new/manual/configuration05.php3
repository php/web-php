<?php 
require('shared-manual.inc'); 
setupNavigation(array(
  'home' => array('manual.php3', 'PHP3 Manual'),
  'prev' => array('configuration04.php3', 'Virtual hosts'),
  'next' => array('lang-syntax.php3', 'Syntax and grammar'),
  'up'   => array('configuration.php3', 'Configuration'),
  'toc'  => array(
    array('configuration.php3#I(CONFIGURATION)C(1,TITLE)', ''),
    array('configuration.php3#I(CONFIGURATION)C(1,SIMPARA)', ''),
    array('configuration01.php3', 'The php3.ini file'),
    array('configuration02.php3', 'Apache module'),
    array('configuration03.php3', 'CGI'),
    array('configuration04.php3', 'Virtual hosts'),
    array('configuration05.php3', 'Security'))));
manualHeader('Security');
?><H1
><A
NAME="CONFIG.SECURITY"
>Security</A
></H1
><P
>    PHP is a powerful language and the interpreter, whether included
    in a web server as a module or executed as a separate CGI binary,
    is able to access files, execute commands and open network connections
    on the server.  These properties make anything run on a web server
    insecure by default.  PHP is designed specifically to be a more
    secure language for writing CGI programs than perl or C, and with
    correct selection of compile-time and runtime configuration
    options it gives you exactly the combination of freedom and
    security you need.

   </P
><P
>    As there are many different ways of utilizing PHP, there are many
    configuration options controlling its behaviour.  A large
    selection of options guarantees you can use PHP for a lot of
    purposes, but it also means there are combinations of these
    options and server configurations that result in an insecure
    setup.  This chapter explains the different configuration option
    combinations and the situations they can be safely used.

    </P
><H2
><A
NAME="CONFIG.SECURITY.CGI"
>CGI binary</A
></H2
><H3
><A
NAME="CONFIG.SECURITY.CGI.PREFACE"
>Possible attacks</A
></H3
><P
>      Using PHP as a CGI binary is an option for setups that for some
      reason do not wish to integrate PHP as a module into server
      software (like Apache), or will use PHP with different kinds of
      CGI wrappers to create safe chroot and setuid environments for
      scripts.  This setup usually involves installing executable PHP
      binary to the web server cgi-bin directory.  CERT advisory <A
HREF="http://www.cert.org/pub/advisories/CA-96.11.interpreters_in_cgi_bin_dir.html"
>CA-96.11</A
>
      recommends agains placing any interpreters into cgi-bin.  Even
      if the PHP binary can be used as a standalone interpreter, PHP
      is designed to prevent the attacks this setup makes possible:

     </P
><P
></P
><UL
><LI
><P
>Accessing system files:
        http://my.host/cgi-bin/php?/etc/passwd

       </P
><P
>        The query information in an url after the question mark (?)
	is passed as command line arguments to the interpreter by the
	CGI interface.  Usually interpreters open and execute the
	file specified as the first argument on the command line.

       </P
><P
>        When invoked as a CGI binary, PHP refuses to interpret the
	command	line arguments.
       </P
></LI
><LI
><P
>Accessing any web document on server:
       http://my.host/cgi-bin/php/secret/doc.html

      </P
><P
>       The path information part of the url after the PHP binary name,
       /secret/doc.html is conventionally used to specify the name of
       the file to be opened and interpreted by the CGI program.
       Usually some web server configuration directives (Apache:
       Action) are used to redirect requests to documents like
       http://my.host/secret/script.php3
       to the PHP interpreter.  With this setup, the web server first
       checks the access permissions to the directory /secret, and
       after that creates the redirected request
       http://my.host/cgi-bin/php/secret/script.php3.  Unfortunately, if
       the request is originally given in this form, no access checks
       are made by web server for file /secret/script.php3, but only
       for the /cgi-bin/php file.  This way any user able to access
       /cgi-bin/php is able to access any protected document on the
       web server.

      </P
><P
>       In PHP, compile-time configuration option
       --enable-force-cgi-redirect and runtime configuration directives
       doc_root and user_dir can be used to prevent this attack, if
       the server document tree has any directories with access
       restrictions.  See below for full explanation of different
       combinations.

      </P
></LI
></UL
><H3
><A
NAME="CONFIG.SECURITY.CGI.PUBLIC"
>Case 1: only public files served</A
></H3
><P
>       If your server does not have any content that is not restricted
       by password or ip based access control, there is no need for
       these configuration options.  If your web server does not allow
       you to do redirects, or the server does not have a way to
       communicate with the PHP binary that the request is a safely
       redirected request, you can specify the option
       --disable-force-cgi-redirect to the configure script.
       You still have to make sure your PHP scripts do not rely on one
       or another way of calling the script, neither by directly
       http://my.host/cgi-bin/php/dir/script.php3 nor by redirection
       http://my.host/dir/script.php3.

      </P
><P
>       Redirection can be configured for example in apache by
       directives AddHandler and Action (see below).
     </P
><H3
><A
NAME="CONFIG.SECURITY.CGI.FORCE"
>Case 2: using --enable-force-cgi-redirect</A
></H3
><P
>       This compile time option to configure script will produce a PHP
       binary that when used as a CGI will refuse to work if the
       request is not redirected by the web server, for example
       Apache.  This prevents anyone to call PHP directly with an url
       like http://my.host/cgi-bin/php/secretdir/script.php3.

      </P
><P
>       Usually the redirection in apache configuration is done with
       the following statements:</P
><PRE
CLASS="PROGRAMLISTING"
>Action php3-script /cgi-bin/php
AddHandler php3-script .php3</PRE
><P
>       This option is tested only with Apache web server, and relies
       on Apache to set the non-standard CGI environment variable
       REDIRECT_STATUS on redirected requests.  If your web server
       does not support any way of telling if the request is direct or
       redirected, you cannot use this option and you must either to
       open all your documents for public use or use doc_root or
       user_dir runtime configuration directives described below.
     </P
><H3
><A
NAME="CONFIG.SECURITY.CGI.DOCROOT"
>Case 3: setting doc_root or user_dir</A
></H3
><P
>       To include active content, like scripts and executables, in the
       web server document directories is sometimes consider an
       insecure practice.  If for some configuration mistake the
       scripts are not executed but displayed as usual HTML documents,
       this may result in leakage of intellectual property or security
       information like passwords.  Therefore many sysadmins will
       prefer setting up another directory structure for scripts that
       is only accessible through the PHP CGI, and therefore always
       interpreted and not displayed as such.

      </P
><P
>       Also if the method for making sure the requests are not
       redirected, as described in the previous section, is not
       available, it is necessary to set up a script doc_root that is
       different from web document root.

      </P
><P
>       You can set the PHP script document root by the configuration
       directive doc_root in php3.ini file, or you can set the
       environment variable PHP_DOCUMENT_ROOT.  If it is set, the CGI
       version of PHP will always construct the file name to open with
       this doc_root and the path information in the request, so you
       can be sure no script is executed outside this directory
       (except for user_dir below).

      </P
><P
>       Another option usable here is user_dir.  When user_dir is
       unset, only thing controlling the opened file name is
       doc_root.  Opening an url like http://my.host/~user/doc.php3
       does not result in opening a file under users home directory,
       but a file called ~user/doc.php3 under doc_root (yes, a directory
       name starting with a tilde ~).

      </P
><P
>       If user_dir is set to for example "public_php", a request like
       http://my.host/~user/doc.php3 will open a file called doc.php3
       under the directory named public_php under the home directory of
       the user.  If the home of the user is /home/user, the file executed
       is /home/user/public_php/doc.php3.

      </P
><P
>       User_dir expansion happens regardless of the doc_root setting,
       so you can control the document root and user directory access
       separately.

    </P
><H3
><A
NAME="CONFIG.SECURITY.CGI.SHELL"
>Case 4: PHP parser outside of web tree</A
></H3
><P
>      A very secure option is to put the PHP parser binary somewhere
      outside of the web tree of files.  In /usr/local/bin, for
      example.  The only real downside to this option is that you
      will now have to put a line similar to:
      
      <DIV
CLASS="INFORMALEXAMPLE"
><P
></P
><PRE
CLASS="PROGRAMLISTING"
>#!/usr/local/bin/php</PRE
></DIV
>
	
      as the first line of any file containing PHP tags.  You will
      also need to make the file executable.  That is, treat it
      exactly as you would treat any other CGI script written in
      Perl or sh or any other common scripting language which uses
      the #! shell-escape mechanism for launnching itself.	
    </P
><H2
><A
NAME="CONFIG.SECURITY.APACHE"
>Apache module</A
></H2
><P
>     
   </P
><?php manualFooter('Security');?>