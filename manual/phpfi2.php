<?php
// $Id$
$_SERVER['BASE_PAGE'] = '/manual/phpfi2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
commonHeader('PHP/FI Version 2.0 Documentation');
?>

<!--
Documentation is like sex: when it is good, it is very, very good; and
when it is bad, it is better than nothing.
                ++ Dick Brandon 
-->

<H1 ALIGN="CENTER">PHP/FI Version 2.0</H1>
<H1>Table of Contents</H1>
<OL>
	<LI><A HREF="#history">Brief History</A>
	<LI><A HREF="#install">Installation Instructions</A>
	<LI><A HREF="#starting">So, what can I do with PHP/FI?</A>
	<LI><A HREF="#redirect">CGI Redirection</A>
	<LI><A HREF="#security">Security Issues</A>
	<LI><A HREF="#safemode">Safe Mode</A>
	<LI><A HREF="#commandline">Running PHP/FI from the Command Line</A>
	<LI><A HREF="#http_auth">HTTP Authentication</A>
	<LI><A HREF="#requestvars">Apache Request Variables</A>
	<LI><A HREF="#module">Apache Module Notes</A>
	<LI><A HREF="#directives">Apache Module Configuration Directives</A>
	<LI><A HREF="#fastcgi">FastCGI Support</A>
	<LI><A HREF="#access">Access Control</A>
	<LI><A HREF="#logging">Access Logging</A>
	<LI><A HREF="#relative">Relative vs. Absolute URL's - or, Why do my Images Break?</A>
	<LI><A HREF="#getpost">How PHP/FI handles GET and POST method data</A>
<UL>
	<LI><A HREF="#selmul"><TT>SELECT MULTIPLE</TT> and PHP</A>
	<LI><A HREF="#imagecoord"><TT>IMAGE SUBMIT</TT> and PHP</A>
</UL>
	<LI><A HREF="#gd_support">GD (a graphics library for GIF creation) Support in PHP</A>
	<LI><A HREF="#virtual_hosts">PHP/FI and Virtual Hosts</A>
	<LI><A HREF="#upload">File Upload Support</A>
	<LI><A HREF="#cookies">Cookie Support</A>
	<LI><A HREF="#msql_support">mSQL Support</A>
	<LI><A HREF="#pg95_support">Postgres95/PostgreSQL Support</A>
	<LI><A HREF="#mysql_support">mysql Support</A>
	<LI><A HREF="#solid_support">Solid Support</A>
	<LI><A HREF="#sybase_support">Sybase Support</A>
	<LI><A HREF="#oracle_support">Oracle Support</A>
	<LI><A HREF="#illustra_support">Illustra Support</A>
	<LI><A HREF="#adabas_support">Adabas Support</A>
	<LI><A HREF="#regexp">Regular Expressions</A>
	<LI><A HREF="#escapes">Escape Characters</A>
	<LI><A HREF="#octal">Octal notation of Unix file permissions</A>
	<LI><A HREF="#script">PHP/FI Script Language</A>
<UL>
	<LI><A HREF="#syntax">Syntax</A>
	<LI><A HREF="#vars">Variables</A>
	<LI><A HREF="#assoc">Associative Arrays</A>
	<LI><A HREF="#varvars">Variable Variables</A>
	<LI><A HREF="#lang">Language Constructs</A>
	<LI><A HREF="#user_funcs">User-Defined Functions</A>
	<LI><A HREF="#scope">Scope of Variables</A>
	<LI><A HREF="#math">Mathematical Expressions</A>
	<LI><A HREF="#while">While Loops</A>
	<LI><A HREF="#switch">Switch Construct</A>
	<LI><A HREF="#secure">Secure Variables - Defeating GET method hacks</A>
	<LI><A HREF="#overload">Overloaded Operators and dealing with variable types</A>
	<LI><A HREF="#quiet">Suppressing Errors from function calls</A>
	<LI><A HREF="#funcs">Internal Functions</A>
</UL>
	<LI><A HREF="#addfunc">Adding your own functions to PHP/FI</A>
	<LI><A HREF="#hacknotes">Notes for Code Hacks</A>
</OL>

<HR>
<H2><A NAME="history">Brief History</A></H2>
<P>
PHP began life as a simple little cgi wrapper written in Perl.  I
wrote it in an afternoon during a period between contracts when
I needed a quick tool to get an idea of who was reading
my online resume.  It was never intended to go beyond my own
private use.  The web server where I had my resume was extremely
overloaded and had constant problems forking processes.  I rewrote
the Perl wrapper in C to get rid of the considerable overhead of
having to fork Perl each time my resume was accessed.<P>

<P>
Eventually other people on the same web server came across my
wrapper and asked if they could use it.  Then, as inevitably
happens, they started asking for more features.  I added more
features and finally put together a semi-complete distribution
along with documentation, a mailing-list and a FAQ.  The name
of this first package was Personal Home Page Tools, which
later became Personal Home Page Construction Kit.<P>

<P>
At the same time I started playing with databases and wrote a
tool to easily embed SQL queries into web pages.  It was
basically another CGI wrapper that parsed SQL queries and made
it easy to create forms and tables based on these queries.  This
tool was named FI (Form Interpreter).<P>

<P>
PHP/FI version 2.0 is a complete rewrite of these two packages
combined into a single program.  It has now evolved to
the point where it is a simple programming language embedded
inside HTML files.  The original acronym, PHP, has stuck.  It
isn't really appropriate any longer.  PHP/FI is used more for
entire web sites today than for small Personal Home Page
setups.  By whatever name, it eliminates the need for numerous small Perl
cgi programs by allowing you to place simple scripts directly in your
HTML files.  This speeds up the overall performance of your web pages
since the overhead of forking Perl several times has been eliminated.
It also makes it easier to manage large web sites by placing all
components of a web page in a single html file.  By including support
for various databases, it also makes it trivial to develop database
enabled web pages.  Many people find the embedded nature much easier
to deal with than trying to create separate HTML and CGI files.<P>

<P>
PHP Version 3.0 is yet another rewrite.  If you are just starting out
with PHP, I suggest that you start with Version 3.0 instead of
continuing with 2.0 at this point.  PHP3 is quickly going to replace
PHP/FI 2.0 and all development efforts are now focused on PHP3.  Any
remaining bugs in PHP/FI 2.0 are unlikely to be fixed unless they 
are straightforward.  More information on PHP3 can be found at
<a href="http://www.lerdorf.on.ca/php3/">http://www.lerdorf.on.ca/php3</a>.

<P>
Throughout this documentation any references to PHP, FI or PHP/FI
all refer to the same thing.  The difference between PHP and FI
is only a conceptual one.  Both are built from the same source
distribution.  When I build the package without any access logging
or access restriction support, I call my binary FI.  When I build
with these options, I call it PHP.<P>

<HR>
<H2><A NAME="install">Installation Instructions</A></H2>

<DL>
<DT><FONT SIZE="+1">Before You Begin</FONT>

<DD><P>If you have absolutely no Unix experience, you may want to ask around
for someone with a little bit of Unix knowledge to help you through
this installation.  Every attempt has been made to make it as simple
as possible, but since the software is quite involved and relies on a
number of different components, it is not realistic to assume it will
go smoothly on all systems.  You will probably need someone around who
knows the particulars of the destination system well.<P></DD>

<DT><FONT SIZE="+1">Things You Need To Know Before Installing</FONT>

<DD><P>- Can you run both get and post method cgi programs on your server?<BR>
<EM>This is not relevant if you installing the Apache module version.</EM>

  If not, you can not use this package.  On many public ISP's CGI
  programs are either disallowed or severely restricted.  If this is
  the case on your system, talk to your system administrator and ask
  him/her to have a look at this package and see if they will install
  it for you.<P></DD>

<DD><P>- If you have mSQL installed on your system, you need to know the
  base directory of this installation.<P></DD>

<DD><P>- If you have Postgres95 or PostgreSQL installed on your system, you need to
  know the base directory of this installation.<P></DD>

<DD><P>- If you are going to be storing log and access configuration files
in an NFS-mounted directory and your system does not provide NFS file locking
then you will need to define the NFS_HACK variable manually in the src/Makefile
and you may want to use a slightly modified version of the gdbm library.  See
the <STRONG>nfs_hack.txt</STRONG> file in the doc directory for more information 
on this.<P></DD>

<DD><P>- Note that if you are not interested in using PHP to track accesses to your
pages, do not compile this option into the binary.  You should also leave out
the access restriction code.  There is considerable overhead in including these
options.<P></DD>

<DD><P>- If you are installing the Apache module version, you will need to know
the Apache src code directory location.<P></DD>

<DT><FONT SIZE="+1">Installation Steps</FONT>

<DD>
<P><EM><STRONG>Step 1.</STRONG></EM>
<P>
<P>
  Run the install program: <TT>./install</TT>
<P>
<P>
  You will be asked a number of questions.  If you do not understand
  what is being asked, simply hit return.  The default choice should
  be safe on most systems.  This doesn't apply for the questions
  asking you to specify a directory for your configuration and log
  files however.  Choose any directory to which the httpd (usually &quot;nobody&quot;)
  has write privileges.  You may create this directory manually
  somewhere and simply <STRONG><TT>chown nobody directory</TT></STRONG>.<P>
<P>
<EM><STRONG>Step 2.</STRONG></EM><P>
<P>
  Go into the src directory: <TT>cd src</TT><P>
  Have a look at the php.h file.  There are a number of compile-time
  options that can be set here.
<P>
<EM><STRONG>Step 3.</STRONG></EM><P>
<P>
  type: <TT>make</TT>
<P>
<P>
  This will create the actual executable program file named <EM>php.cgi</EM>
  by default, or if you are installing the Apache module, it will create
  a <EM>libphp.a</EM> file.<P>

<P>
<EM><STRONG>Step 4. (if you are <STRONG>not</STRONG> installing the Apache module
version)</STRONG></EM><P>

<P>
  Copy the <STRONG>php.cgi</STRONG> binary to your system's cgi-bin directory.  If you
  do not have access to do this and wish to install it in your own
  personal directory, you may do so, but you should set the setuid
  bit on the executable with: <TT>chmod u+s /path/php.cgi</TT><P>
<P>
  If you do not make set the setuid bit on the binary then any files
  created by the binary will be owned by the user id under which the
  web server runs.  If this is acceptable, then you can safely leave
  the setuid bit off.<P>

<P>
<EM><STRONG>Step 4. (if you are installing the Apache module version)</STRONG></EM><BR>
  Change to your Apache src directory where the <EM>mod_php.c</EM> and <EM>mod_php.h</EM>
  files should have been copied to.  If they weren't which usually happens
  because of permission problems, copy these two files there manually.
  Edit your Apache Configuration file and add the EXTRA_LIBS line which was
  produced at the end of <STRONG>Step 3</STRONG>.  And add:<P>
<P>
<TT><STRONG>Module php_module         mod_php.o</STRONG></TT><P>
<P>
  to the very end of the file.  Then type: <STRONG>./Configure</STRONG> and then
<STRONG>make</STRONG>
  to rebuild your Apache httpd binary.  Install this binary.<P>

<P>
  Next you need to edit your Apache conf/srm.conf file and add a line like:<P>
<P>
<TT><STRONG>AddType application/x-httpd-php .phtml</STRONG></TT><P>
<P>
  This defines a new MIME, application/x-httpd-php, which will trigger the PHP
  module to parse any file ending with the <EM>.phtml</EM> extension.  You can
  pick any extension you like for this.<P>
<P>You may not want to enable everyone
  to run PHP parsed files.  You can place the above AddType line within
  &lt;Location /path&gt;....&lt;/Location&gt; directives in the <EM>access.conf</EM>
  file to only allow PHP-parsed documents in certain directories on your server.<P>
<P>
 Now you are ready to restart your httpd server.  See the <A HREF="#module">Apache
 Module Notes</A> for more details on configuring the PHP Module.<P>

<DT><FONT SIZE="+1">Testing the software</FONT>

<DD>
<P>Once installed you can test to see if your executable works by
  entering a URL similar to the following in your browser:<P>
<P>
  <TT>http://your.site.domain/cgi-bin/php.cgi</TT><P>
<P>
  This should show you a page which contains the version number along
  with various other useful information. <P>
<P>
  To test the Apache module version, create any file with a .phtml
  extension and put a tag like: &lt;?phpinfo()&gt; in the file and see if
  it gets parsed.<P>

<DT><FONT SIZE="+1">Using the software</FONT>

<DD>
<P>To actually use the software on an existing HTML file, you can
  simply append the path to your file to the above URL.  ie.<P>
<P>
  <TT>http://your.site.domain/cgi-bin/php.cgi/path/file.html</TT><P>
<P>
You should have a look at the <A HREF="#redirect">CGI Redirection</A>
section of this documentation.  Running PHP/FI through a redirect
means you can automatically have a URL like <EM>http://your.site.domain/file.phtml</EM>
be parsed by PHP/FI.<P>
<P>
This does not apply to Apace module users.<P>
</DL>

<HR>
<H2><A NAME="starting">So, what can I do with PHP/FI?</A></H2>
<P>
The first thing you will notice if you run a page through PHP/FI is that
it adds a footer with information about the number of times your page
has been accessed (if you have compiled access logging into the binary).
This is just a very small part of what PHP/FI can
do for you.  It serves another very important role as a form interpreter
cgi, hence the FI part of the name.  For example, if you create a form
on one of your web pages, you need something to process the information
on that form.  Even if you just want to pass the information to another
web page, you will have to have a cgi program do this for you.  PHP/FI
makes it extremely easy to take form data and do things with it.<P>
<P>
<EM><STRONG>A simple example</STRONG></EM><P>
<P>
Suppose you have a form:<P>
<P>
<TT>&lt;FORM ACTION="/cgi-bin/php.cgi/~userid/display.html" METHOD=POST&gt;<BR>
&lt;INPUT TYPE="text" name="name"&gt;<BR>
&lt;INPUT TYPE="text" name="age"&gt;<BR>
&lt;INPUT TYPE="submit"&gt;<BR>
&lt;/FORM&gt;</TT><P>
<P>
Your display.html file could then contain something like:<P>
<P>
<TT>&lt;?echo "Hi $name, you are $age years old!&lt;p&gt;"&gt;</TT><P>
<P>
It's that simple!  PHP/FI automatically creates a variable for each
form input field in your form.  You can then use these variables in
the ACTION URL file.<P>
<P>
The next step once you have figured out how to use variables is to start
playing with some logical flow tags in your pages.  For example, if you wanted
to display different messages based on something the user inputs, you would
use if/else logic.  In our above example, we can display different things
based on the age the user entered by changing our display.html to:<P>
<P>
<PRE>&lt;?
    if($age>50);
        echo "Hi $name, you are ancient!&lt;p&gt;";
    elseif($age&gt;30);
        echo "Hi $name, you are very old!&lt;p&gt;";
    else;
        echo "Hi $name.";
    endif;
&gt;</PRE><P>
<P>
PHP/FI provides a very powerful scripting language which will do much more
than what the above simple example demonstrates.  See the section on the <A HREF="#script">
PHP/FI Script Language</A> for more information.<P>
<P>
You can also use PHP/FI to configure who is allowed to access your pages.
This is done using a built-in configuration screen.  With this you could
for example specify that only people from certain domains would be allowed
to see your pages, or you could create a rule which would password protect
certain pages.  See the <A HREF="#access">Access Control</A> section for more
details.<P>
<P>
PHP/FI is also capable of receiving file uploads from any RFC-1867
compliant web browser.  This feature lets people upload both text and binary
files.  With PHP/FI's access control and logical functions, you have full
control over who is allowed to upload and what is to be done with the
file once it has been uploaded.  See the <A HREF="#upload">File Upload</A>
section for more details.<P>
<P>
PHP/FI has support for a database package called mSQL.  This allows you to put
information into a database and access this information through simple embedded
SQL queries right in your .HTML files.  Adding a database back-end to a web page
has never been easier.  See the section on <A HREF="#msql_support">mSQL Support</A>
for more information.<P>
<P>
PHP/FI has support for the Postgres95/PostgreSQL database package. It supports
embedded SQL queries in your .HTML files.  See the section on
<A HREF="#pg95_support">Postgres95/PostgreSQL Support</A> for more information.<P>
<P>
PHP/FI also has support for the mysql database package. It supports
embedded SQL queries in your .HTML files.  See the section on
<A HREF="#mysql_support">mysql Support</A> for more information.<P>
<HR>
<H2><A NAME="redirect">CGI Redirection</A></H2>

<DL>
<DT><STRONG>Apache 1.0.x Notes</STRONG>
<DD>
<P>A good way to run PHP/FI is by using a cgi redirection module
with the Apache server.  Please note that you do not need to worry
about redirection modules if you are using the Apache module version
of PHP/FI.  There are two of these redirection modules available.  One
is developed by Dave Andersen &lt;angio@aros.net&gt; and it is available at
<A
HREF="ftp://ftp.aros.net/pub/util/apache/mod_cgi_redirect.c">ftp://ftp.aros.net/pub/util/apache/mod_cgi_redirect.c</A>
and the other comes bundled with Apache and is called
mod_actions.c.  The modules are extremely similar.  They differ slightly in their
usage.  Both have been tested and both work with PHP/FI.<P>
<P>
One large caveat at the time of this writing (Apr.20/96) is that the current
official Apache release (1.0.5) has a severe limitation which prevents
cgi redirected requests from having any post-method data associated with
them.  I have tracked this down and fixed it in my version of Apache, and there
is an official patch available in the <A HREF="http://php.iquest.net/files/">
File Archives</A> on the <A HREF="http://php.iquest.net/">PHP Home Page</A>.<P>
<P>A second rather large caveat with Apache 1.0.x is that it does not align
double types correctly on most architectures.  You may find yourself getting
strange bus errors from your httpd when using mod_php, either upgrade to 
Apache 1.1 or edit the <i>alloc.c</i> Apache source file.  In this file you will
find the following piece of code:<P>
<PRE>  union align
  {
    /* Types which are likely to have the longest RELEVANT alignment
     * restrictions... we don't do much with doubles.
     */

    char *cp;
    void (*f)();
    long l;
    FILE *fp;
  };</PRE>
<P>You will need to add a double to this line and recompile your Apache server.
The correct block of code is:<P>
<PRE>  union align
  {
    /* Types which are likely to have the longest RELEVANT alignment
     * restrictions... we don't do much with doubles.
     */

    char *cp;
    void (*f)();
    long l;
    FILE *fp;
    double d;
  };</PRE>
<P>These problems have all been fixed in later versions of Apache.

<P>Check the Apache documentation on how to add a module.  Generally you
add the module name to a file called <EM>Configuration</EM>.
The line to be added if you want to use the mod_actions module is:<P>
<P>
<TT>Module action_module       mod_actions.o</TT><P>
<P>
If you are using the mod_cgi_redirect.c module add this line:<P>
<P>
<TT>Module cgi_redirect_module mod_cgi_redirect.o</TT><P>
<P>
Then compile your httpd and install it.  To configure the cgi redirection
you need to either create a new mime type in your <EM>mime.types</EM> file
or you can use the <STRONG>AddType</STRONG> command in your <EM>srm.conf</EM>
file to add the mime type.  The mime type to be added should be something
like this:<P>
<P>
<TT>application/x-httpd-php     phtml</TT><P>
<P>
If you are using the mod_actions.c module you need to add the following
line to your <EM>srm.conf</EM> file:<P>
<P>
<TT>Action application/x-httpd-php /cgi-bin/php.cgi</TT><P>
<P>
If you are using mod_cgi_redirect.c you should add this line to
<EM>srm.conf</EM>:<P>
<P>
<TT>CgiRedirect     application/x-httpd-php     /cgi-bin/php.cgi</TT><P>
<P>
Don't try to use both mod_actions.c and mod_cgi_redirect.c at the same
time.<P>
<P>
Once you have one of these cgi redirection modules installed and
configured correctly, you will be able to specify that you want a
file parsed by php/fi simply by making the file's extension
<STRONG>.phtml</STRONG>.  Furthermore, if you add <STRONG>index.phtml</STRONG>
to your <STRONG>DirectoryIndex</STRONG> configuration line in your
<EM>srm.conf</EM> file then the top-level page in a directory will be
automatically parsed by php if your index file is called index.phtml.<P>

<DT><STRONG>Netscape HTTPD</STRONG>
<DD>
<P>
You can automatically redirect requests for files with a given
extension to be handled by PHP/FI by using the Netscape Server
CGI Redirection module.  This module is available in the
<A HREF="http://php.iquest.net/files/">File Archives</A> on the
<A HREF="http://php.iquest.net/">PHP/FI Home Page</A>.  The README
in the package explicitly explains how to configure it for use with
PHP/FI.<P>

<DT><STRONG>NCSA HTTPD</STRONG>
<DD>
<P>
NCSA does not currently support modules, so in order to do cgi
redirection with this server you need to modify your server source
code.  A patch to do this with NCSA 1.5 is available in the
<A HREF="http://php.iquest.net/files/">PHP/FI file archives</A>.
</DL>
<HR><P>
<H2><A NAME="security">Security Issues</A></H2>
<P>
The CGI version of PHP/FI does <STRONG>not</STRONG> read any 
<EM>.htaccess</EM> files which may be present in a directory.  This 
means that if you have files that are protected using the standard .htaccess 
server-based access control feature, people could potentially circumvent 
this security by loading the page through PHP/FI.  Note that this is not
an issue for the Apache module version of PHP/FI.<P>
<P>
A second problem with the CGI version is that if it is placed in the system's
cgi-bin directory it can be used to view any file on your system as long as
the user id it runs as has access to it.
<P>
There are a couple of different solutions to this problem.  The easiest
is probably to use the <STRONG>PATTERN_RESTRICT</STRONG> feature found
in <EM>php.h</EM>.  This lets you define an extension (or a pattern of
extensions) which are allowed to be parsed by PHP/FI.  If a file does
not have this extension and someone tries to load it with PHP/FI, an
<EM>access denied</EM> message will appear.<P>
<P>
Another solution is to use the PHP/FI access control mechanism to mimic the
access control setup you have in your .htaccess file.  Keeping this information
in two places can be tedious though, and the two systems don't share all
of the same features.<P>
<P>
The problem can also be solved using file permissions.  PHP/FI can be set
up to run setuid as any user you wish.  Then files that are to be read
by PHP/FI can be given appropriate permissions and files not to be read
by PHP/FI should be owned by another user id and have their permissions
changed accordingly.<P>
<P>
For additional security options related to sites which provide shared access
to PHP, see the <a href="#safemode">Safe Mode</a> section.<P>
<HR>
<H2><A NAME="safemode">Safe Mode</A></H2>
<P>
PHP's Safe Mode tries to solve the common problem faced by many ISP's regarding
letting all their users run CGI programs.  The common mechanism for making
shared CGI access more secure is to use a cgi wrapper like the su_exec
utility that comes with Apache.  This will not work for PHP when it is running
as a module because it is not a separate process that can be setuid'ed.  
<P>
It is based on a file permission scheme.  Simply put, if a file is either owned
by the same user id as the script that is trying to access it, or if the file is
in a directory that is owned by the same user as the script that is trying to
access it, then the access is allowed.  One caveat here is that you must make sure
that your OS does not allow non-root user to chown away the ownership on one of their
files.  Many older SysV systems allow this.  The most common one is Irix.  It is
possible to change this behaviour at the OS level on Irix.  
<P>
Safe Mode applies to each function which could possibly be a security risk.
Below is the current list of checks applied to each relevant function.  In
the following list, PHP UID refers to the user id of the owner of the current
file being parsed by PHP, and HTTP UID refers to the user id the httpd process
is running as (usually nobody).
<dl>
<dt>Include, ReadFile, Fopen, File, Link, Unlink, Symlink, Rename, RmDir, ChMod, ChOwn, ChGrp
<dd>Owner of file to be included must either be the PHP UID or the directory in which the
file resides must be owned by the PHP UID.
<dt>Exec, System, PassThru and Popen
<dd>Executables to be forked and executed must reside in the directory
defined by the PHP_SAFE_MODE_EXEC_DIR #define in php.h when PHP is compiled.
<dt>Mysql_Connect
<dd>This function takes an optional username to use to connect to an MySQL
database.  When in safe mode, this username must either be the username of
the owner of the current file being parsed, or the name of the httpd user
(usually nobody).
<dt>HTTP Authentication
<dd>The numerical user id of the owner of the script containing the HTTP Authentication
code will be prepended to the authentication realm.  This is to prevent someone from
writing a password grabbing script which spoofs another authenticated page on the
same server.
</dl><P>

<HR>
<H2><A NAME="commandline">Running PHP/FI from the command line</A></H2>
<P>
If you build the CGI version of PHP/FI, you can use it from the command line
simply typing: <tt> php.cgi filename</tt> where filename is the file you want 
to parse.  You can also create standalone PHP/FI scripts by making the first
line of your script look something like:
<PRE>    #!/usr/local/bin/php.cgi -q</PRE>
The &quot;-q&quot; suppresses the printing of the HTTP headers.  You can leave
off this option if you like.
<P>
<HR>
<H2><A NAME="http_auth">HTTP Authentication</A></H2>
<P>
The HTTP Authentication hooks in PHP/FI are only available when it is running
as an Apache module.  In an Apache module PHP/FI script, it is possible to
use the Header() command to send an &quot;Authentication Required&quot; message
to the client browser causing it to pop up a Username/Password input window.
Once the user has filled in a username and a password, the URL containing
the PHP/FI script will be called again with the variables, $PHP_AUTH_USER,
$PHP_AUTH_PW and $PHP_AUTH_TYPE set to the user name, password and 
authentication type respectively.  Only &quot;Basic&quot; authentication is
supported at this point.<P>
<P>An example script fragment which would force client authentication on a
page would be the following:<P>
<PRE>    &lt;?
        if(!$PHP_AUTH_USER) {
            Header(&quot;WWW-authenticate: basic realm=\&quot;My Realm\&quot;&quot;);
            Header(&quot;HTTP/1.0 401 Unauthorized&quot;);
			echo &quot;Text to send if user hits Cancel button\n&quot;
            exit;
        } else {
            echo &quot;Hello $PHP_AUTH_USER.&lt;P&gt;&quot;;
            echo &quot;You entered $PHP_AUTH_PW as your password.&lt;P&gt;&quot;;
        }
    &gt;</PRE>
<P>
Instead of simply printing out the $PHP_AUTH_USER and $PHP_AUTH_PW, you would
probably want to check the username and password for validity.  Perhaps by
sending a query to a database, or by looking up the user in a dbm file.<P>
<P>
Watch out for buggy Internet Explorer browsers out there.  They seem very
picky about the order of the headers.  Sending the <b>WWW-authenticate</b> 
header before the <b>HTTP/1.0 401</b> header seems to do the trick for now.<P>
<P>
In order to prevent someone from writing a script which reveals the password for
a page that was authenticated through a traditional external mechanism, the
PHP_AUTH variables will not be set if external authentication is enabled for
that particular page.<P>    
<P>
Note however that the above does not prevent someone who controls a 
non-authenticated URL from stealing passwords from authenticated URL's on the
same server.  The PHP_AUTH_VARS define in <em>php.h</em> can be undefined to
make sure that these variables will never be set and thus disable anybody 
from using mod_php to try to steal passwords.<P>
<HR>
<H2><A NAME="requestvars">Apache Request Variables</A></H2>
<P>
When running PHP as an Apache module, you may access the request header
variables sent by the remote browser by prepending <B>$req_</B> to the
beginning of the header value you would like to use.  If the request name
contains a <b>-</b> character such as User-Agent, then you need to map the
- to _ (an underscore).  ie. reference it as $req_User_Agent.
The <a href="#phpinfo">
phpinfo()</a> function can be used to display all the request headers.<P>
eg.
<PRE>    &lt;
        echo "$req_connection&lt;br&gt;";
        echo "$req_host&lt;br&gt;";
    &gt;</PRE>
The above simple script might output:
<PRE>    Keep-Alive
    www.host.com</PRE>
	
<HR>
<H2><A NAME="module">Apache Module Notes</A></H2>
<P>
Running PHP/FI as an Apache module is the most efficient way of using the
package.  Running it as a module means that the PHP/FI functionality is
combined with the Apache server's functionality in a single program.  There
are a number of advantages to running it as a module:<P>
<DL>
<DT><STRONG>Performance</STRONG>
<DD>
<P>Performance-wise it is a lot faster than traditional CGI programs.  In fact,
when running PHP/FI as a module, there is no CGI involved.  The script code
in the HTML files is executed directly by the Apache web server process.<P>

<DT><STRONG>Security</STRONG>
<DD>
<P>When running as a module, the normal httpd-based access restriction rules
defined either in the Apache conf files or in private .htaccess files are first
applied before the module is allowed to parse the file.  Alternatively, you
can also create PHP/FI scripts that control the normal httpd-based
authentication.  See <A HREF="#http_auth">HTTP Authentication</A>.<P>

<DT><STRONG>Configurability</STRONG>
<DD>
<P>Since the parser is always active inside the httpd process, it can be configured
on startup using the same configuration files used to configure the httpd process.
The module can even be configured on a per-directory basis by placing the
<A HREF="#directives">PHP configuration directives</A> in the <EM>.htaccess</EM> files.<P>

<DT><STRONG>Basis for custom server-based function</STRONG>
<DD>
<P>For C programmers interested in accessing their functions from within
Apache, the PHP/FI framework provides a very simple interface to Apache
and to PHP itself.  It is much easier to add a function to PHP and call that
from a parsed page than it is to write an entire Apache module from scratch.
See the <a href="#addfunc">Adding your own internal functions to PHP/FI</a>
sections at the end of this document for further details.
</DL>

<H2><A NAME="directives">Apache Module Configuration Directives</A></H2>
<P>
The following directives can be placed either in the <EM>srm.conf</EM> file, or
within &lt;Directory&gt;...&lt;/Directory&gt; tags in <EM>access.conf</EM> or in
&lt;Location /path&gt;...&lt/Location&gt; tags in <EM>access.conf</EM> or in
individual <EM>.htaccess</EM> files. In order for the directives to work in
.htaccess files, the Options override must be set on the AllowOverride Apache
directive, with the exception of the phpEngine directive which is only 
available in the *.conf files.<P>
<DL>
<DT><STRONG>phpShowInfo <EM>on</EM>|<EM>off</EM></STRONG>
<DD>Turn the PHP info footers on or off.  Default is on.<P>
<DT><STRONG>phpLogging <EM>on</EM>|<EM>off</EM></STRONG>
<DD>Turn logging on or off.  Default is on.<P>
<DT><STRONG>phpDebug <EM>on</EM>|<EM>off</EM></STRONG>
<DD>Turn automatic ?info debug screen on or off.  Default is off.<P>
<DT><STRONG>phpUploadTmpDir <EM>directory</EM></STRONG>
<DD>Set the directory where form-uploaded files will be placed.<P>
<DT><STRONG>phpDbmLogDir <EM>directory</EM></STRONG>
<DD>Set the directory where dbm-based logging files will be written.<P>
<DT><STRONG>phpSQLLogDB <EM>database</EM></STRONG>
<DD>Set name of SQL database to use for logging.  Default is &quot;phpfi&quot;<P>
<DT><STRONG>phpSQLLogHost <EM>hostname</EM></STRONG>
<DD>Set hostname where SQL database to use for logging is found.  Default is localhost.<P>
<DT><STRONG>phpAccessDir <EM>directory</EM></STRONG>
<DD>Set the directory where PHP-internal access control files are stored.<P>
<DT><STRONG>phpMaxDataSpace <EM>KiloBytes</EM></STRONG>
<DD>Max size a sub-pool can grow to within the PHP module.  Setting this value
to a low number will minimize the impact that mod_php will have on your system,
but it may also limit people from writing complex scripts.  The default is 8K.<P>
<DT><STRONG>phpIncludePath <EM>colon-separated path</EM></STRONG>
<DD>A colon-separated list of directories where php will look for
files in when running <A HREF="#include">include()</A>.  The default
is to look only in the current directory. 
<P>
<DT><STRONG>phpAutoPrependFile <EM>file name</EM></STRONG> <DD>Before
the actual PHP/FI file is parsed, you may give a file name here that
is parsed before the "main file", using PHP's Include() function
(which means phpIncludePath applies for the file name).  Keep in mind
that you can make it difficult for yourself to use the Header()
function in the main file if you write HTML from an auto-prepended
file.
<P>
<DT><STRONG>phpAutoAppendFile <EM>file name</EM></STRONG>
<DD>The name of a file parsed (using PHP's Include() function)after
the actual PHP/FI file has been parsed, similar to phpAutoPrependFile.
<P>
<DT><STRONG>phpAdaDefDB <EM>database</EM></STRONG>
<DD>Default Adabas database to use. No default value
<P>
<DT><STRONG>phpAdaUser <EM>username</EM></STRONG>
<DD>Default Adabas database user. No default value
<P>
<DT><STRONG>phpAdaPW <EM>password</EM></STRONG>
<DD>Default Adabas database password. No default value
<P>
<DT><STRONG>phpEngine <EM>on</EM>|<EM>off</EM></STRONG>
<DD>Turn the PHP parsing engine on or off.  The default is <em>on</em> and
this directive is only useful for sites that wish to allow directives from the AllowOverride Options
list of directives to function in .htaccess files while at the same time restricting mod_php access.
The common way to handle per-virtual host php installs is to enable the PHP mime type with an AddType
directive on a per virtual host basis and then put &quote;phpEngine off&quot; in the non-PHP virtual
host blocks.  If a non PHP customer tries to circumvent things by placing the PHP mime type in
their .htaccess, the phpEngine off setting restricts the PHP parser from functioning.
<DT><STRONG>phpLastModified <EM>on</EM>|<EM>off</EM></STRONG>
<DD>Since php pages are dynamic, they are processed and sent to the browser each
time you access them.
But sometimes, when you use php for basic includes, the parsed page does not
change as long as the source doesn't. It that case, you may want to avoid page
regeneration/reloading.
If phpLastModified is turned on Apache will send the Last-Modified tag to the browser, so that
the page will only be reloaded when it changes.
(not that if you are using page logging, multiple accesses will not be logged!)
</DL>
<P>
All of these directives are optional.  If a directive is not specified anywhere,
the compile-time default will be used.<P>

<HR>
<H2><A NAME="fastcgi">FastCGI Support</A></H2>
<P>
PHP/FI can be compiled with FastCGI support.  
You will need fetch and compile
<A HREF="http://www.fastcgi.com">FCGI Development Kit</A> for your platform before
compiling PHP/FI.  You will also need to get <A HREF="#redirect">CGI Redirection</A> working.
Then follow the instructions in the FastCGI documentation for configuring FastCGI 
for your platform.  If you are using the mod_fastcgi module with the Apache server, here
are the step-by-step instructions:<P>
<P><UL>
<LI>Edit your Apache Configuration file and add the mod_fastcgi module, then recompile Apache.
<LI>Edit your <EM>srm.conf</EM> file and add lines similar to:<br>
<TT>
AddType application/x-httpd-fcgi .fcgi<br>
AppClass /usr/local/etc/httpd/fcgi-bin/php.fcgi -processes 4<br>
AddType application/x-httpd-fphp .fhtml<br>
Action application/x-httpd-fphp /fcgi-bin/php.fcgi<br>
</TT>
<LI>Copy your <EM>php.cgi</EM> binary to <EM>/usr/local/etc/httpd/fcgi-bin/php.fcgi</EM>
</UL><P>
<P>
Now, any pages with the .fhtml extension will be handed off to the FastCGI php.fcgi 
process which is already running.  The php.fcgi binary will still work as a normal
CGI binary, so you could just create a symbolic link from php.cgi to php.fcgi.<P>
<P>If you are not using Apache, the above steps will be similar, but not identical.
CGI Redirection mechanisms are available for NCSA and Netscape servers at the
<A HREF="http://php.iquest.net/files/">PHP/FI File Archive</A>.<P>
<HR>
<H2><A NAME="access">Access Control</A></H2>
<P>
Note that the built-in PHP/FI based access control is likely to be discontinued
in future versions.  You should seriously consider using the security mechanism
that comes with your web server instead.
<P>
If you chose to include access control when you compiled the package, you
may append <EM>?config</EM> to any URL to edit the access control file.  ie.<P>
<P>
<TT>http://your.machine.domain/cgi-bin/php.cgi/path/file.html?config</TT><P>
<P>
Your configuration password will initially be set to your user id.  If your user
id does not work as your password, it probably means that PHP could not read
the /etc/passwd file to locate your user id.  If this is the case, the initial
password will be set to "<STRONG>php</STRONG>". It is a good idea to change this password.
Note that multiple users may maintain their own personal configuration files
through a single PHP/FI binary.<P>
<P>
Access Control can be quite confusing initially.  The ?config screen is divided up
into a number of sections.  The top section is for changing the password used to
make sure that only people who know this password can change access control
characteristics.  In a system-wide installation, each user has his or her own
configuration screen with his or her own password.<P>
<P>
The second section of the ?config screen consists of a number of tables.  Each
table defines a rule-set.  The first rule-set is always the default rule-set.
This default rule-set is used if a page does not have a rule-set defined specifically
for it.  After the default rule-set, any number of specific rule-set tables will
follow.<P>
<P>
To add a rule-set for a specific file, enter the URL of the file in your browser and
add <EM><STRONG>?config</STRONG></EM> to the end of the URL.  On the ?config screen that comes
up you will see that a rule-set has been added for this page, if it wasn't already
there.  When a new rule-set is added, it is initially set to be the same as the
default rule-set.  The following picture shows two simple rule-sets.  First a
default rule-set which just indicates that hits from all domains should be
logged, and second, for the file /~rasmus/test.html and only that file, any
users coming from a &quot;<EM>.edu</EM>&quot; domain will not be granted access.<P>
<P>
<IMG SRC="gifs/config.gif" alt="[Image of ?config screen]"><P>
<P>
To edit a rule-set modify the fields until the desired configuration is
reached within a rule-set and then hit the &quot;<EM>Submit Changes</EM>&quot;
button.  If more rules are needed, hit the &quot;<EM>Add Rule</EM>&quot;
button and then edit the added rule.<P>
<P>
To delete a rule, select the checkbox to the right of the rule and
hit the &quot;<EM>Submit Changes</EM>&quot; button.  The screen will
redraw and the rule should disappear.<P>
<P>
Note that you need to enter a regular expression in the pattern field.
See the section on regular expressions in this documentation for more
details.<P>
<HR>
<H2><A NAME="logging">Access Logging</A></H2>
<P>
Access Logging is another optional feature which can be enabled at compile-time
by answering <EM>Yes</EM> to the question in the install script.  You may either
store your access log data in dbm files, in an mSQL database, or in an mysql
database.  The latter two are more powerful, but is also a bit more difficult 
to set up.<P>
<P>
To use dbm files for storing your access logs, you will need to specify a 
directory in which log files can be written.  PHP will try to create this 
directory if it doesn't exist, but to make sure it has the proper 
permissions, you may want to create this directory yourself before running 
PHP for the first time.  The permissions on the directory should be such 
that the user id under which the PHP cgi program will run can write to the 
directory.<P>
<P>
To use an mSQL or mysql database for storing your access log data, you need 
to first make sure you have mSQL or mysql installed and running on your 
system.  Then you need to create a database.  The default name is 
&quot;phpfi&quot; although this can be changed in <EM>src/php.h</EM>.  
To create this database for mSQL, type:<P>
<P>
<PRE>    msqladmin create phpfi</PRE><P>
or for mysql type:
<PRE>    mysqladmin create phpfi</PRE><P>
<P>
Then for mSQL, edit your <EM>msql.acl</EM> file and make sure the permissions 
on the database are correct.  Something like the following should suffice:<P>
<P>
<PRE>    database=phpfi
    read=*
    write=nobody,&lt;your user id&gt;
    access=local</PRE><P>
<P>
For mysql, you need to make sure the httpd user (usually &quot;nobody&quot;)
has access to the database.  Unlike mSQL, mysql stores access control data
in a database.  Assuming default permissions, you should be able to simply
execute the following command:<P>
<PRE>    echo "INSERT INTO user VALUES ('localhost','nobody','','Y','Y','Y','Y','Y','Y','Y','Y','Y');" | mysql mysql</PRE><P>
Don't forget to load this new configuration with:<P>
<PRE>    mysqladmin reload</PRE><P>
For each user id for whom you want to store log data, you need to create two
tables.  The <EM>msqllog</EM> shell script in the scripts directory will do
this for you.  Simply type:<P>
<P>
<PRE>    msqllog &lt;user id&gt; </PRE><P>
or for mysql, type:
<PRE>    mysqllog &lt;user id&gt; </PRE><P>
<P>
and the script will create the appropriate tables.  You may need to edit the
script to make it reflect where things are stored on your system.<P>
<P>
You may want to have a look at this script.  It defines the field sizes of your
log tables.  If, for example, you know that your file paths exceed 64 
characters, you need to bump up the filename size in both the <EM>logN</EM> 
and the <EM>lastN</EM> tables in this <EM>msqllog</EM> or <EM>mysqllog</EM> 
file.<P>
<P>
Access logging stores information about each &quot;hit&quot; on a page.  This
information can then be summarized by examining these log files.  An example
log file summarizing script is included in the package.  It is the 
<TT>log.html</TT> file in the <TT>examples</TT> directory.  This is the dbm 
log file analyzer.  The mSQL log file analyzer is called <TT>mlog.html</TT>.  
And the mysql log file analyzer is called <TT>mylog.html</TT>.
To run it, copy it and the other mlog.* files to a directory accessible from 
your web server and type:<P>
<PRE>    http://your.machine.domain/cgi-bin/php.cgi/path/mlog.html</PRE><P>
Or, if you are using the Apache module version, you can give the script
a &quot;.phtml&quot; extension and call it with:<P>
<PRE>    http://your.machine.domain/path/mlog.phtml</PRE>
<P>
By default, if you have compiled PHP with access logging enabled, then your
pages will appear with a footer containing some access information.
You may not want to see this footer, but still log hits.  You can turn off this
footer with a &quot;phpShowInfo off&quot; line in your Apache httpd.conf or 
.htaccess files if you are running Apache.  If you are not running Apache, 
you may turn these log footers off either by creating a rule in the 
<A HREF="#access">?config</A> section for the page, or by adding a tag like this 
to your page:<P><P><TT>&lt;?setshowinfo(0)&gt;</TT><P>

<HR><H2><A NAME="relative">Relative vs. Absolute URL's - or, Why do my Images Break?</A></H2>
<P>A problem common to all CGI wrappers is that the HTTPD program changes the current
directory to the directory where whatever it is loading is stored.  In the case
of a CGI program, the current directory is set to the directory where the CGI
program resides.  This is normally not a problem, except when it comes to relative
URL's.<P>
<P>
A relative URL is a URL which relies upon the current directory being the same
as the directory where the current HTML file is located.  So, for example, if
I had the URL:<P>
<P>
<PRE>    http://my.machine/~rasmus/file.html</PRE><P>
<P>
the actual HTML file might be:<P>
<P>
<PRE>    ~rasmus/public_html/file.html</PRE><P>
<P>
If within the <TT>file.html</TT> file I had the tag:<P>
<P>
<PRE>    &lt;IMG SRC=&quot;pic.gif&quot;&gt;</PRE><P>
<P>
when loaded normally this file gif file is expected to be in
<TT>~rasmus/public_html/pic.gif</TT>.  However, when loaded through a CGI
wrapper with a URL like:<P>
<P>
<PRE>    http://my.machine/cgi-bin/php.cgi/~rasmus/file.html</PRE><P>
<P>
then HTTPD sets the current directory to <TT>/cgi-bin</TT>
(or wherever the ScriptAlias might point)
and subsequently when the page is loaded the <TT>pic.gif</TT> file is expected to be
in: <TT>/cgi-bin/pic.gif</TT> which is usually not the desired effect.<P>
<P>
The quick way around this problem is to use absolute URL's.  In the above example
if the image tag had been:<P>
<PRE>    &lt;IMG SRC=&quot;/~rasmus/pic.gif&quot;&gt;</PRE>
<P>
then there would have been no problem.  Using absolute URL's is not always
desirable as it makes pages less portable.  An obvious question you may have at
this point is, &quot;Why doesn't PHP just change the current directory to the right
place?&quot;.  The answer is that PHP actually does change the current directory
to the location of the HTML file it is displaying.  Any file paths used inside
PHP Script tags, can be relative.  The problem is that tags outside of PHP's
control such as &lt;img &gt; and &lt;a href &gt; will not be passed through
PHP.  When they are parsed, PHP is no longer active and the current working
directory has been set back to the directory specified by the HTTP Daemon.<P>
<P>
<STRONG>The Solution</STRONG> is a compromise.  PHP provides a variable called
<STRONG>PATH_DIR</STRONG>.
It contains the directory portion of the current HTML file at all times.  If this
PATH_DIR variable is used in the &lt;img &gt; and &lt;a href &gt; tags then the
effect of a relative URL can be achieved, although to the server it will look like
an absolute URL when parsed.  From our above example, the only change we
would need to make would be to change the img tag to:
<PRE>    &lt;IMG SRC=&quot;&lt;?echo $PATH_DIR&gt;/pic.gif&quot;&gt;</PRE>
By using the above, you can move the file containing this tag around, and the
tag will always refer to a <TT>pic.gif</TT> file in the same directory as
the source HTML file.<P>
<P>
Another way to handle this is to use the traditional &lt;BASE HREF=...&gt; in
the HTML file.<P>
<HR>
<H2><A NAME="getpost">How PHP handles GET and POST method data</A></H2>
<P>
PHP will detect both GET and POST method data coming from HTML forms.
One important point to understand is that POST method data is always
treated first if both are present.  If a PHP variable is defined by the POST
method data, or if the variable is defined by the HTTP daemon in the Unix
environment, then GET method data cannot overwrite it.  This is to prevent
somebody from adding <EM>?REMOTE_HOST=some.bogus.host</EM> to their URL's
and thus tricking the PHP logging mechanism into recording this alternate
data.  POST method data is however allowed to overwrite these variables.<P>
<P>
Any component of the GET data (the data following a '?' in the URL) which is
of the form, <EM>word=something</EM> will define the variable <EM>$word</EM> to
contain the value <EM>something</EM>.  Even if the data is not of this form,
it can be accessed with the $argv built-in array.  For example, in a URL like:<P>
<PRE>    /cgi-bin/php.cgi/file.html?abc+def+EMAIL_ADDR=rasmus@lerdorf.on.ca&amp;var=value</PRE>
The relevant components of the PHP symbol table will be:<P>
<PRE>    $argc       = 4
    $argv[0]    = abc
    $argv[1]    = def
    $argv[2]    = EMAIL_ADDR=rasmus@lerdorf.on.ca&amp;var=value
    $EMAIL_ADDR = rasmus@lerdorf.on.ca
    $var        = value</PRE>
<P>
Notice how the EMAIL_ADDR part of the data shows up both as $argv[2] where it is
unparsed, and the $EMAIL_ADDR variable is created to contain <EM>rasmus@lerdorf.on.ca</EM>.<P>
<P>
The $EMAIL_ADDR variable was used as an example in the above because it
is a useful variable if you are using the logging features of PHP.  By adding:<P>
<PRE>    ?EMAIL_ADDR=</PRE>
<P>
to any links on a page where the user's email address is known, you may propagate
it to the next page.  The PHP logging system will automatically look for this
variable and record its value as the user's e-mail address in the logs.  For
any users of PHP1, the above serves the same function as adding
<EM>?&lt;!--$email--&gt;</EM> to the URL used to do in PHP1.  It looks a little
bit more complex now, but it is also completely general allowing you to
build your own complex pages.<P>
<P>
In the above example you can also see how multiple variables can be defined
right in the GET method data by separating each with the &quot;&amp;&quot; character.  This
&quot;&amp;&quot; separated list of variables must be the last (or only) component of the
GET method data for it to be valid.<P>
<P>
<A NAME="selmul"><STRONG><TT>SELECT MULTIPLE</TT> and PHP</STRONG></A><P>
<P>
The SELECT MULTIPLE tag in an HTML construct allows users to select
multiple items from a list.  These items are then passed to the action
handler for the form.  The problem is that they are all passed with the
same widget name. ie.<P>
<PRE>    &lt;SELECT NAME=&quot;var&quot; MULTIPLE&gt;</PRE>
<P>
Each selected option will arrive at the action handler as:<P>
<P>
var=option1<BR>
var=option2<BR>
var=option3<P>
<P>
Each option will overwrite the contents of the previous $var variable.
The solution is to use PHP/FI's non-indexed array feature.  The following
should be used:<P>
<P>
<PRE>    &lt;SELECT NAME=&quot;var[]&quot; MULTIPLE&gt;</PRE><P>
<P>
This tells PHP/FI to treat <EM>var</EM> as an array an each assignment of
a value to var[] adds an item to the array.  The first item becomes $var[0],
the next $var[1], etc.  The <A HREF="#count">count()</A> function can be
used to determine how many options were selected, and the <A HREF="#sort">
sort()</A> function can be used to sort the option array if necessary.<P>
<HR>
<A NAME="imagecoord"><STRONG><TT>IMAGE SUBMIT</TT> and PHP</STRONG></A><P>
<P>
When submitting a form, it is possible to use an image instead of the standard
submit button with a tag like:<P>
<P>
<PRE>    &lt;input type=image src=image.gif name=sub&gt;</PRE><P>
<P>
When the user clicks somewhere on the image, the accompanying form will be
transmitted to the server with two additional variables, <EM>sub_x</EM> and
<EM>sub_y</EM>.  These contain the coordinates of the user click within the
image.  The experienced may note that the actual variable names sent by the
browser contains a period rather than an underscore, but PHP converts the
period to an underscore automatically.
<P>
<HR>
<P>
<H2><A NAME="gd_support">GD (a graphics library for GIF creation) Support in PHP</A></H2>
PHP supports the GD library version 1.2 written by Thomas Boutell.  There is no GD
code in PHP itself.  If you wish to use the GD support in PHP/FI, you must obtain the
GD library from <A HREF="http://www.boutell.com/gd/http/gd1.3.tar.gz">
http://www.boutell.com/gd/http/gd1.3.tar.gz</A>, install it, and then re-install PHP.<P>
Not all of the GD features are supported by PHP.  For a list of supported functions see
the <A HREF="#funcs">Alphabetical List of Functions</A>.  All the GD functions
start with the word, <EM>Image</EM>.<P>  More information on the GD package is available at:
<A HREF="http://www.boutell.com/gd/">http://www.boutell.com/gd/</A>.<P>
<P>
<EM>GD 1.2 is copyright 1994, 1995 Quest Protein Database Center, Cold Springs Harbor Labs.</EM><P>
<HR>
<P>
<H2><A NAME="virtual_hosts">PHP/FI and Virtual Hosts</A></H2>
PHP works fine on virtual host setups supported by some http daemons.  The one
problem that may occur on such a setup is related to an inconsistency in the
way httpd sets the SCRIPT_NAME environment variable.  Normally it is set to the
path of the current CGI program in relation to the top-level ROOT_DIR on the
httpd server.  However, when a virtual domain is used, some httpd's do not
correctly set the SCRIPT_NAME variable as the relative path from the virtual
domain's top level directory as it should.  If the ?config screen gives you
an invalid URL error message, you know that this problem exists on your setup.
You will need to edit the <EM>php.h</EM> file and set the VIRTUAL_PATH #define to
the path to your <EM>php.cgi</EM> binary relative to your top-level directory.<P>
<HR>
<H2><A NAME="upload">File Upload Support</A></H2>
<P>
PHP/FI will automatically detect a file upload from a browser which supports the
form-based file upload features as proposed by
<A HREF="mailto:nebel@xsoft.sd.xerox.com">E. Nebel</A>
and <A HREF="mailto:masinter@parc.xerox.com">L. Masinter</A> from Xerox and described in
<A HREF="ftp://ds.internic.net/rfc/rfc1867.txt">RFC 1867</A>.<P>
A file upload screen can be built by creating a special form which looks
something like this:<P>
<P>
<BLOCKQUOTE>

    &lt;FORM ENCTYPE="multipart/form-data" ACTION="_URL_" METHOD=POST&gt;

<BR>&lt;INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000"&gt;

<BR>Send this file: &lt;INPUT NAME="userfile" TYPE="file"&gt;

<BR>&lt;INPUT TYPE="submit" VALUE="Send File"&gt;

<BR>&lt;/FORM&gt;

</BLOCKQUOTE>
<P>
<P>
The _URL_ should point to a php html file.  The MAX_FILE_SIZE hidden
field must precede the file input field and its value is the maximum filesize
accepted.  The value is in bytes.  In this destination file, the following
variables will be defined upon a successful upload:<P>

<DL>
<DT><STRONG>$userfile</STRONG>
<DD>
<P>The temporary filename in which the uploaded file was stored on the server machine.<P>
<DT><STRONG>$userfile_name</STRONG>
<DD>
<P>The original name of the file on the sender's system.<P>
<DT><STRONG>$userfile_size</STRONG>
<DD>
<P>The size of the uploaded file in bytes.<P>
<DT><STRONG>$userfile_type</STRONG>
<DD>
<P>The mime type of the file if the browser provided this information.  An example would
be "image/gif".<P>
</DL>
<P>The <EM><STRONG>$userfile</STRONG></EM> basename of the above variables will match the
NAME field in the upload form.<P>
<P>
Files will by default be stored in the server's default temporary directory.  This
can be changed by setting the environment variable TMPDIR in the environment in which
PHP/FI runs.  Setting it using a PutEnv() call from within a PHP/FI script will not
work though.  Alternatively, you may hard-code in a temporary directory by editing
<EM>php.h</EM> and defining the <STRONG>UPLOAD_TMPDIR</STRONG> variable.<P>
<P>
The PHP/FI script which receives the uploaded file should implement whatever
logic is necessary for determining what should be done with the uploaded file.
You can for example use the $file_size variable to throw away any files that are
either too small or too big.  You could use the $file_type variable to throw away
any files that didn't match a certain type criteria.  Whatever the logic, you should
either delete the file from the temporary directory or move it elsewhere.<P>
<P>
Please note that the CERN httpd seems to strip off everything starting at
the first whitespace in the content-type mime header it gets from the
client.  As long as this is the case, CERN httpd will not support the
file upload feature.<P>

<HR>
<H2><A NAME="cookies">Cookie Support</A></H2>
<P>PHP/FI transparently supports HTTP cookies as defined by
<A HREF="http://www.netscape.com/newsref/std/cookie_spec.html">Netscape's Spec</A>.
Cookies are a mechanism for storing data in the remote browser and thus tracking
or identifying return users. 
You can set cookies using the <A HREF="#setcookie">SetCookie()</A> function.  Cookies are part of the HTTP header, so the SetCookie() function must be
called before any output is sent to the browser.  This is the same
restriction as for the Header() function.<P>
Any cookies sent to you from the client will automatically be turned into a PHP/FI
variable just like GET and POST method data.<P>
<P>If you wish to assign multiple values to a single cookie, just add <b>[]</b>
to the cookie name.  For example:<P>
<PRE>    SetCookie("MyCookie[]","Rasmus Lerdorf", time()+3600);</PRE>
Note that a cookie will replace a previous cookie by the same name in your browser
unless the path or domain is different.  So, for a shopping cart application you may
want to keep a counter and pass this along.  ie.<P>
<PRE>    
    $Count++;
    SetCookie("Count",$Count, time()+3600);
    SetCookie("Cart[$Count]",$item, time()+3600);</PRE>
<HR>
<H2><A NAME="msql_support">mSQL Support</A></H2>
<P>mSQL stands for mini-SQL and is a small and simple SQL database engine written
by David Hughes.  It is available from <A HREF="ftp://ftp.bond.edu.au/pub/Minerva/msql">
ftp://ftp.bond.edu.au/pub/Minerva/msql</A><P>
<P>
PHP/FI supports has a rich set of mSQL support functions:
<P>
<DL>
<DT><A HREF="#msql">msql()</A>
<DT><A HREF="#msql_close">msql_Close()</A>
<DT><A HREF="#msql_connect">msql_Connect()</A>
<DT><A HREF="#msql_createdb">msql_CreateDB()</A>
<DT><A HREF="#msql_dbname">msql_dbName()</A>
<DT><A HREF="#msql_dropdb">msql_DropDB()</A>
<DT><A HREF="#msql_fieldflags">msql_FieldFlags()</A>
<DT><A HREF="#msql_fieldlen">msql_FieldLen()</A>
<DT><A HREF="#msql_fieldname">msql_FieldName()</A>
<DT><A HREF="#msql_fieldtype">msql_FieldType()</A>
<DT><A HREF="#msql_freeresult">msql_FreeResult()</A>
<DT><A HREF="#msql_listdbs">msql_ListDBs()</A>
<DT><A HREF="#msql_listfields">msql_Listfields()</A>
<DT><A HREF="#msql_listtables">msql_ListTables()</A>
<DT><A HREF="#msql_numfields">msql_NumFields()</A>
<DT><A HREF="#msql_numrows">msql_NumRows()</A>
<DT><A HREF="#msql_regcase">msql_RegCase()</A>
<DT><A HREF="#msql_result">msql_Result()</A>
<DT><A HREF="#msql_tablename">msql_TableName()</A>
</DL>
<P>
In addition to these functions, PHP/FI can also be compiled to automatically
escape any forward single quote ( ' ) characters found in GET or POST data.
If the MAGIC_QUOTES variable is defined in the <EM>php.h</EM> file then
these quotes will be automatically escaped making it easier to pass
form data directly to msql queries.<P>
<HR>
<H2><A NAME="pg95_support">Postgres95/PostgreSQL Support</A></H2>
<P>
Postgres95/PostgreSQL is a powerful public domain database that implements a significant
subset of the SQL language.  It supports many datatypes and commands that
are not available in mSQL.  More information about Postgres and the software
itself can be found at this URL:
<A HREF="http://www.postgreSQL.org/">
http://www.postgreSQL.org/</A>.<P>
<P>
The following PHP functions are available for Postgres95:<P>
<DL>
<DT><A HREF="#pg_connect">pg_Connect()</A>
<DT><A HREF="#pg_close">pg_Close()</A>
<DT><A HREF="#pg_host">pg_Host()</A>
<DT><A HREF="#pg_port">pg_Port()</A>
<DT><A HREF="#pg_options">pg_Options()</A>
<DT><A HREF="#pg_tty">pg_tty()</A>
<DT><A HREF="#pg_dbname">pg_DBname()</A>
<DT><A HREF="#pg_exec">pg_Exec()</A>
<DT><A HREF="#pg_result">pg_Result()</A>
<DT><A HREF="#pg_freeresult">pg_FreeResult()</A>
<DT><A HREF="#pg_getlastoid">pg_GetLastOid()</A>
<DT><A HREF="#pg_numrows">pg_NumRows()</A>
<DT><A HREF="#pg_numfields">pg_NumFields()</A>
<DT><A HREF="#pg_fieldnum">pg_FieldNum()</A>
<DT><A HREF="#pg_fieldname">pg_FieldName()</A>
<DT><A HREF="#pg_fieldtype">pg_FieldType()</A>
<DT><A HREF="#pg_fieldsize">pg_FieldSize()</A>
<DT><A HREF="#pg_fieldprtlen">pg_FieldPrtLen()</A>
<DT><A HREF="#pg_errorMessage">pg_errorMessage()</A>
</DL>
<P>
<STRONG>Note:</STRONG> Binary cursors are not supported.
<P>
<P>
In addition to these functions, PHP/FI can also be compiled to automatically
escape any forward single quote ( ' ) and double quote ( &quot; ) characters 
found in GET or POST data.  If the MAGIC_QUOTES variable is defined in the 
<EM>php.h</EM> file then these quotes will be automatically escaped making 
it easier to pass form data directly to Postgres queries.<P>
<P>
Here is a sample script that connects to Postgres database on localhost
called 'mydb' and retrieves the names and ages of people in a table:<P>
<P>
<PRE>
&lt;?
   $conn = pg_Connect("localhost", "5432", "", "", "mydb");
   if (!$conn) {
      echo "An error occured.\n";
      exit;
   }

   $result = pg_Exec($conn, "select * from table1");
   if (!$result) {
      echo "An error occured.\n";
      exit;
   }

   $num = pg_NumRows($result);
   $i = 0;

   while ($i &lt; $num) {
      echo "name: ";
      echo pg_Result($result, $i, "name");
      echo "  age: ";
      echo pg_Result($result, $i, "age");
      echo "&lt;BR&gt;";
      $i++;
   }

   pg_FreeResult($result);
   pg_Close($conn);
&gt;
</PRE><P>

<HR>
<H2><A NAME="mysql_support">mysql Support</A></H2>
<P>mysql is an clone of the mSQL package.  You can get a copy from
<A HREF="http://www.tcx.se/">http://www.tcx.se/</A><P>
<P>
PHP/FI supports has a rich set of mysql support functions:
<P>
<DL>
<DT><A HREF="#mysql">mysql()</A>
<DT><A HREF="#mysql_close">mysql_Close()</A>
<DT><A HREF="#mysql_connect">mysql_Connect()</A>
<DT><A HREF="#mysql_createdb">mysql_CreateDB()</A>
<DT><A HREF="#mysql_dbname">mysql_dbName()</A>
<DT><A HREF="#mysql_dropdb">mysql_DropDB()</A>
<DT><A HREF="#mysql_fieldflags">mysql_FieldFlags()</A>
<DT><A HREF="#mysql_fieldlen">mysql_FieldLen()</A>
<DT><A HREF="#mysql_fieldname">mysql_FieldName()</A>
<DT><A HREF="#mysql_fieldtype">mysql_FieldType()</A>
<DT><A HREF="#mysql_freeresult">mysql_FreeResult()</A>
<DT><A HREF="#mysql_listdbs">mysql_ListDBs()</A>
<DT><A HREF="#mysql_listfields">mysql_Listfields()</A>
<DT><A HREF="#mysql_listtables">mysql_ListTables()</A>
<DT><A HREF="#mysql_numfields">mysql_NumFields()</A>
<DT><A HREF="#mysql_numrows">mysql_NumRows()</A>
<DT><A HREF="#mysql_result">mysql_Result()</A>
<DT><A HREF="#mysql_tablename">mysql_TableName()</A>
</DL>
<P>
In addition to these functions, PHP/FI can also be compiled to automatically
escape any forward single quote ( ' ) characters found in GET or POST data.
If the MAGIC_QUOTES variable is defined in the <EM>php.h</EM> file then
these quotes will be automatically escaped making it easier to pass
form data directly to mysql queries.<P>
<HR>
<H2><A NAME="solid_support">Solid Support</A></H2>
<P>
The Solid server is a high-volume SQL server. It supports the ANSI SQL2, ODBC,
SAG CLI and X/Open SQL standards. More information about the Solid server is
available at <A HREF="http://www.solidtech.com/">www.solidtech.com</A>.
The Solid interface to PHP was developed by 
<a href="http://solid.digiface.nl/">DigiFace Internet Services</a>.
<P>
The following PHP functions are available for the Solid Server:<P>
<DL>
<DT><A HREF="#solid_connect">Solid_Connect()</A>
<DT><A HREF="#solid_close">Solid_Close()</A>
<DT><A HREF="#solid_exec">Solid_Exec()</A>
<DT><A HREF="#solid_result">Solid_Result()</A>
<DT><A HREF="#solid_freeresult">Solid_FreeResult()</A>
<DT><A HREF="#solid_numrows">Solid_NumRows()</A>
<DT><A HREF="#solid_numfields">Solid_NumFields()</A>
<DT><A HREF="#solid_fieldnum">Solid_FieldNum()</A>
<DT><A HREF="#solid_fieldname">Solid_FieldName()</A>
</DL>
<P>
In addition to these functions, PHP/FI can also be compiled to automatically
escape any forward single quote ( ' ) characters found in GET or POST data.
If the MAGIC_QUOTES variable is defined in the <EM>php.h</EM> file then
these quotes will be automatically escaped making it easier to pass
form data directly to Solid queries.<P>
<P>
Here is the same script that was shown in the Postgres section, adapted for
the Solid server.
<P>
<PRE>
&lt;?
   $conn = Solid_Connect("", "username", "password");
   if (!$conn) {
      echo "An error occured.\n";
      exit;
   }

   $result = Solid_Exec($conn, "select * from table1");
   if (!$result) {
      echo "An error occured.\n";
      exit;
   }

   while (Solid_FetchRow($result)) {
      echo "name: ";
      echo Solid_Result($result, "name");
      echo "  age: ";
      echo Solid_Result($result, "age");
      echo "&lt;BR&gt;";
   }

   Solid_FreeResult($result);
   Solid_Close($conn);
&gt;
</PRE><P>

<HR>
<H2><A NAME="sybase_support">Sybase Support</A></H2>
The supporting functions uses Sybase DB library API calls. Therefore
you must have sybase API libraries and headers files installed in your
system in order to compile PHP/FI with sybase support. 
<p>
The following PHP/FI functions are available for Sybase. <P>
<DL>
<DT><A HREF="#sybsql_checkconnect">SybSQL_CheckConnect()</A>
<DT><A HREF="#sybsql_connect">SybSQL_Connect()</A>
<DT><A HREF="#sybsql_DBuse">SybSQL_DBuse()</A>
<DT><A HREF="#sybsql_Exit">SybSQL_Exit()</A>
<DT><A HREF="#sybsql_fieldname">SybSQL_Fieldname()</A>
<DT><A HREF="#sybsql_getfield">SybSQL_GetField()</A>
<DT><A HREF="#sybsql_isrow">SybSQL_IsRow()</A>
<DT><A HREF="#sybsql_nextrow">SybSQL_NextRow()</A>
<DT><A HREF="#sybsql_numfields">SybSQL_NumFields()</A>
<DT><A HREF="#sybsql_numrows">SybSQL_NumRows()</A>
<DT><A HREF="#sybsql_query">SybSQL_Query()</A>
<DT><A HREF="#sybsql_result">SybSQL_Result()</A>
<DT><A HREF="#sybsql_result_all">SybSQL_Result_All()</A>
<DT><A HREF="#sybsql_seek">SybSQL_Seek()</A>
</DL><P>
For a complete example, see the example following the 
<A HREF="#sybsql_result">sybSQL_Result()</A> function.<P>

<HR>
<H2><A NAME="oracle_support">Oracle Support</A></H2>
The PHP/FI interface to Oracle uses the Oracle Call Interface (OCI).
You need the OCI libraries on your system to compile PHP/FI with
Oracle support.
<P>
The following PHP/FI functions are available for Oracle: <P>
<DL>
<DT><A HREF="#ora_bind">Ora_Bind()</A>
<DT><A HREF="#ora_close">Ora_Close()</A>
<DT><A HREF="#ora_commit">Ora_Commit()</A>
<DT><A HREF="#ora_commitoff">Ora_CommitOff()</A>
<DT><A HREF="#ora_commiton">Ora_CommitOn()</A>
<DT><A HREF="#ora_exec">Ora_Exec()</A>
<DT><A HREF="#ora_fetch">Ora_Fetch()</A>
<DT><A HREF="#ora_getcolumn">Ora_GetColumn()</A>
<DT><A HREF="#ora_logoff">Ora_Logoff()</A>
<DT><A HREF="#ora_logon">Ora_Logon()</A>
<DT><A HREF="#ora_open">Ora_Open()</A>
<DT><A HREF="#ora_parse">Ora_Parse()</A>
<DT><A HREF="#ora_rollback">Ora_Rollback()</A>
</DL><P>
An example PHP/FI Oracle application:
<PRE>
&lt;?
PutEnv(&quot;ORACLE_HOME=path_to_your_oracle_home&quot;
PutEnv(&quot;ORACLE_SID=database&quot;

/* Establish a connection between PHP and Oracle. */
$conn = Ora_Logon(&quot;username&quot; &quot;password&quot;

if ($conn &lt; 0) {
    echo(&quot;Could not connect to Oracle.\n&quot;
    exit;
}

/* Open a cursor in Oracle. */
$cursor = Ora_Open($conn);

if ($cursor &lt; 0) {
    echo(&quot;Could not open a cursor.\n&quot;
    Ora_Logoff($conn);
    exit;
}

/* Turn off autocommit. */
Ora_CommitOff($conn);

/* This is the SQL query. */
$query = &quot;SELECT * FROM some_table&quot;

if (Ora_Parse($cursor, $query) &lt; 0) {
    echo(&quot;Parse failed!\n&quot;
    Ora_Logoff($conn);
    exit;
}

/* Execute the SQL statement associated with $cursor and
   prepare storage for select-list items. */
$ncols = Ora_Exec($cursor);

echo &quot;lt;P&gt;\n&quot;
echo &quot;lt;TABLE BORDER=1 CELLSPACING=0&gt;\n&quot;

/*  Retrieve all rows from the database one after another. */
while (Ora_Fetch($cursor) == 1) {
    $i = 0;
    echo &quot;lt;TR&gt;\n&quot;
    while ($i &lt; $ncols) {
     /* Get data for a single column of currently fetched row. */
     $col = Ora_GetColumn($cursor, $i);
        echo(&quot;lt;TD&gt;$col&lt;/TD&gt;\n&quot;
     $i++;
    }
    echo(&quot;lt;/TR&gt;\n&quot;
}

echo &quot;&lt;/TABLE&gt;\n&quot;;

/* Close the Oracle connection. */
Ora_Close($cursor);
 
/* Disconnect the logon data area. */
Ora_Logoff($conn);
&gt;
</PRE>
<P>
<HR>
<H2><A NAME="illustra_support">Informix Illustra Support</A></H2>
<P>
Illustra is a commercial database sold by Informix. It has several features that
are not fully supported by this interface (yet). The main claim to fame for 
Illustra is that it is an object-relational database capable of being extended 
in an object-orientated fashion. For example, it is possible to have an Image
as a base type within the database. More information can be obtained from
<A HREF="http://www.illustra.com/">The illustra home page</A>.<P>
<P>
The following PHP functions are available for Illustra:<P>
<DL>
<DT><A HREF="#mi_connect">mi_Connect()</A>
<DT><A HREF="#mi_close">mi_Close()</A>
<DT><A HREF="#mi_dbname">mi_DBname()</A>
<DT><A HREF="#mi_exec">mi_Exec()</A>
<DT><A HREF="#mi_result">mi_Result()</A>
<DT><A HREF="#mi_numrows">mi_NumRows()</A>
<DT><A HREF="#mi_numfields">mi_NumFields()</A>
<DT><A HREF="#mi_fieldnum">mi_FieldNum()</A>
<DT><A HREF="#mi_fieldname">mi_FieldName()</A>
</DL>
<P>
<STRONG>Note:</STRONG> Type operations are not yet supported.
<P>
<P>
Here is a sample script that connects to the illustra database on localhost
called 'mydb' and retrieves the names and ages of people in a table:<P>
<P>
<PRE>
&lt;?
   $conn = mi_Connect("mydb", "username", "password");
   if ($conn&lt;0) {
      echo "An error occured on connection.\n";
      exit;
   }

   $result = mi_Exec($conn, "select * from table1");
   if ($result &lt; 0) {
      echo "An error occured.\n";
      exit;
   }

   $num = mi_NumRows($result);
   $i = 0;

   while ($i &lt; $num) {
      echo "name: ";
      echo mi_Result($result, $i, "name");
      echo "  age: ";
      echo mi_Result($result, $i, "age");
      echo "&lt;BR&gt;";
      $i++;
   }

   mi_Close($conn);
&gt;
</PRE><P>
<HR>
<H2><A NAME="adabas_support">Adabas Support</A></H2>
<P>
Adabas D is an advanced RDBMS that is available on many platforms. A special version, 
the so called Personal Edition is available for Linux and Win32 at no cost.
It is resticted to 5 simulataneous users and 100 MB of data.
For more information on Adabas D refer to 
<A HREF="http://www.softwareag.com">http://www.softwareag.com</A>.
<P>
The following PHP functions are available for accessing Adabas databases:<P>
<DL>
<DT><A HREF="#ada_connect">Ada_Connect()</A>
<DT><A HREF="#ada_close">Ada_Close()</A>
<DT><A HREF="#ada_exec">Ada_Exec()</A>
<DT><A HREF="#ada_result">Ada_Result()</A>
<DT><A HREF="#ada_resultall">Ada_ResultAll()</A>
<DT><A HREF="#ada_freeresult">Ada_FreeResult()</A>
<DT><A HREF="#ada_numrows">Ada_NumRows()</A>
<DT><A HREF="#ada_numfields">Ada_NumFields()</A>
<DT><A HREF="#ada_numrows">Ada_NumRows()</A>
<DT><A HREF="#ada_numfields">Ada_NumFields()</A>
<DT><A HREF="#ada_fieldnum">Ada_FieldNum()</A>
<DT><A HREF="#ada_fieldname">Ada_FieldName()</A>
<DT><A HREF="#ada_fieldtype">Ada_FieldType()</A>
</DL>
Here is the same script that was shown in the Postgres and Solid sections, adapted for
Adabas D.
<P>
<PRE>
&lt;?
   $conn = Ada_Connect("node:db", "username", "password");
   if (!$conn) {
      echo "An error occured.\n";
      exit;
   }

   $result = Ada_Exec($conn, "select * from table1");
   if (!$result) {
      echo "An error occured.\n";
      exit;
   }

   while (Ada_FetchRow($result)) {
      echo "name: ";
      echo Ada_Result($result, "name");
      echo "  age: ";
      echo Ada_Result($result, "age");
      echo "&lt;BR&gt;";
   }

   Ada_FreeResult($result);
   Ada_Close($conn);
&gt;
</PRE><P>

<HR>
<H2><A NAME="regexp">Regular Expressions</A></H2>
<P>
Regular expressions are used for complex string manipulation in PHP/FI.
The script interface to the regular expression support is through the following
functions: 
<A HREF="#ereg">EReg()</A>,
<A HREF="#eregi">ERegi()</A>,
<A HREF="#ereg_replace">EReg_Replace()</A>,
<A HREF="#eregi_replace">ERegi_Replace()</A>,
<A HREF="#reg_match">Reg_Match()</A>, 
<A HREF="#reg_replace">Reg_Replace()</A>, and 
<A HREF="#reg_search">Reg_Search()</A>.  
The first argument to all three functions is a regular expression string.  
The EReg functions use the Posix Extended regular expressions as defined
by POSIX 1003.2, while the Reg functions implement Basic regular
expressions.  For a complete description of regular expressions see your 
regex(7) man page.  If you do not have this page, the regex(7) man page
written by Henry Spencer can be found in the src/regex directory in the
PHP/FI distribution.  Ask your system administrator to install this
man page for you.<P>
Some examples of regular expressions and what they do:<p>
<blockquote>
<dl>
<dt><tt>ereg("abc",$string);</tt>
<dd>Returns true if &quot;abc&quot; is found anywhere in $string.<P>
<dt><tt>ereg("^abc",$string);</tt>
<dd>Returns true if &quot;abc&quot; is found at the beginning of $string.<P>
<dt><tt>ereg("abc$",$string);</tt>
<dd>Returns true if &quot;abc&quot; is found at the end of $string.<P>
<dt><tt>eregi("(ozilla.[23]|MSIE.3)",$HTTP_USER_AGENT);</tt>
<dd>Returns true if client browser is Netscape 2, 3 or MSIE 3.<P>
<dt><tt>ereg("([[:alnum:]]+) ([[:alnum:]]+) ([[:alnum:]]+)",$string,$regs);</tt><br>
<dd>Places three space separated words into $regs[1], $regs[2] and $regs[3].<P>
<dt><tt>ereg_replace("^","&lt;BR&gt;",$string)</tt>
<dd>Put a &lt;BR&gt; tag at the beginning of $string.<P>
<dt><tt>ereg_replace("$","&lt;BR&gt;",$string)</tt>
<dd>Put a &lt;BR&gt; tag at the end of $string.<P>
<dt><tt>ereg_replace(10,"",$string);</tt>
<dd>Get rid of any linefeed characters in $string.<P>
<dt><tt>ereg_replace(13,"&lt;BR&gt;",$string);</tt>
<dd>Replace all carriage returns with a &lt;BR&gt; tag in $string.<P>
</dl>
</blockquote>
<HR>
<H2><A NAME="escapes">Escape Characters</A></H2>
<P>
The following escape sequences are supported in most places where a
quoted string argument is used:
<blockquote>
<pre>	\a --&gt; bell
	\b --&gt; backspace
	\n --&gt; linefeed
	\r --&gt; carriage return
	\t --&gt; tab
	\nnn --&gt; octal char
	\xXX --&gt; hex char</pre>
</blockquote><P>
<HR>
<H2><A NAME="octal">Octal Notation of Unix file permissions</a></H2>
<P>
A couple of functions in the PHP/FI script language epxect octal arguments
to denote Unix-style permission parameters.
In this octal notation 3 bits are used to represent the values 0-7.  Each bit of
the three represents a specific permission.  Octal is traditionally noted
in some contexts by a leading 0, such as 0755.  You do not need to use this 
leading 0 in PHP since the functions that expect octal parameters are will
simplyassume that the parameter is octal.  Using the leading 0 is however good
practise to remind yourself that you are no longer dealing with a base 10 value.
<P><B>Bit Description</B>
<PRE>    xxx
    ^^^
    ||+----1 bit (execute permission)
    |+-----2 bit (write permission)
    +------4 bit (read permission)</PRE>

These three bits are repeated three times for owner, group, and world.
Thus 0755 means:

<PRE>    owner: r,w,x
    group: r, ,x
    world: r, ,x</PRE>

Note that the execute bit on a directory means 'access', not 'execute'.
There are also the extended bits in the fourth octal nibble, like 0?755:
<PRE>    4: suid bit   (set userid)
    2: sgid bit   (set group id)
    1: sticky bit (on a directory, only the owner can delete a file)</PRE>
<P>
<HR>
<H2><A NAME="script">PHP/FI Script Language</A></H2>
<P>
The PHP script language is similar in syntax to the C language in many ways.
It supports variables, arrays, function calls, different variable types
and most things you might need to write complex cgi programs.<P>
<P>
Each PHP/FI function is described in the following section and can be quickly
found by simply appending #function_name to the url for this document since
each function description has been tagged with its name.  <P>

<H3><A NAME="syntax">Syntax</A></H3>
<P>
Each PHP instruction starts with <STRONG>&lt;?</STRONG> and ends with a
<STRONG>&gt;</STRONG>.  Or, instructions may be grouped inside a single
<STRONG>&lt;? &gt;</STRONG> pair and separated by <STRONG>;</STRONG> characters.<P>
<P>
Variables are supported and are indicated by preceding the
variable name with a <STRONG>$</STRONG>.  So, for example, to set a
variable to 5 and then display this variable, the following
is valid:<P>
<P>
<PRE>	&lt;?$a = 5&gt;
	&lt;?echo $a&gt;</PRE><P>
<P>
This is the same as writing:<P>
<P>
<PRE>	&lt?; $a = 5; echo $a &gt;</PRE>
<P>
Or even:<P>
<P>
<PRE>	&lt?;
	$a = 5;
	echo $a;
	&gt;</PRE><P>
<P>
Extra white space characters such as spaces, tabs and new-lines
are ignored.  This fact should be used to format the PHP script
blocks to make them easier to read.  Case is relevant in variable
names, but not in function calls.  In the functional overview later
on in this documentation, case is only used to make the function
names easier to read.  In the actual script language you can use
any case you wish.
<P>
<P>
Comments are supported.  A comment is written just like comments in
the C language.  <STRONG>/*</STRONG> starts a comment and <STRONG>*/</STRONG> ends a
comment.  Comments can be placed anywhere within the <STRONG>&lt;? ... &gt;</STRONG>
block.<P>
<HR>
<H3><A NAME="vars">Variables</A></H3>
<P>
Three types of variables are supported.  <STRONG>Long integer</STRONG>,
<STRONG>Double precision floating point</STRONG> and <STRONG>character strings</STRONG>.
They are automatically detected.  For example:<P>
<P>
<PRE>	&lt;?$a = 5&gt;</PRE><P>
<P>
causes $a to become a variable of type INTEGER.<P>
<P>
<PRE>	&lt;?$a = 5.0&gt;</PRE><P>
causes $a to become a variable of type DOUBLE.<P>
<P>
<PRE>	&lt;?$a = "5"&gt;</PRE><P>
<P>
causes $a to become a variable of type STRING.<P>
<P>
The type of the variable is not generally important.  Every variable
regardless of its type is converted to all three types internally and
the various functions will try to use the correct type.  There are
only a few functions affected by the type of the variable.<P>
<P>
All three variable types may also be treated as arrays by appending
<STRONG>[value]</STRONG> to their names.  Unlike C, these are actually
associative arrays similar to those used in Perl.  The following would
be valid:<P>
<P>
<PRE>	&lt;?
	  $a[0] = 5;
	  $a["hello"] = 6;
	  echo $a[0];
	  echo $a["hello"];
	&gt;</PRE><P>
	<P>
Note that if a variable is used both as an array and as a normal variable,
the normal variable is synonymous with the index &quot;0&quot; entry in
the array.  ie.<P>
<P>
<PRE>    $a = 1;</PRE><P>
<P>
Is the same as writing:<P>
<P>
<PRE>    $a[0] = 1;</PRE><P>
<P>
PHP/FI also supports non-indexed arrays.  A non-indexed array will generate
its own index as items are added to it.  For example:<P>
<P>
<PRE>    $a[] = "Hello";
    $a[] = "There";</PRE><P>
    <P>
The first item inserted into a non-indexed array always gets assigned
index 0, the second index 1, etc.  Therefore the above items may be
printed out with:<P>
<P>
<PRE>    echo $a[0];
    echo $a[1];
	</PRE><P>
Arrays can be copied by a simple assignment.  If $b is an array, then
all the values can be copied to a new array named $a with:<P>
<PRE>    $a = $b;</PRE><P>
<P>Please not that if PHP does not force you to define variables before
using them.  If in the above statement, $b was undefined, then $a would
be set to an empty string (&quot;&quot;).</P>
<P>
The [] notation is also used to indicate that arrays are to be appended.
If $a and $b are both arrays, then $b can be appended to $a by:<P>
<PRE>    $a[] = $b;</PRE><P>
<P>
In the above, there will be a difference between associative arrays and
normal numbered arrays.  Numbered arrays will be renumbered such that all
elements from $b will come after the original elements from $a.  While with
associative arrays, elements in $b will be merged with elements in $a.
Any elements (items with the same index name) which already exist in $a
will be overwritten by $b elements.<P>
You can use the <A HREF="#count">count()</A> function to determine the
number of items in any array.<P>
<P>
Also inherent to the language is the fact that the type of the variable
determines how certain basic operations will be carried out.  For example:<P>
<P>
<PRE>    $a = $b + $c;</PRE><P>
<P>
can do a couple of different things.  If $b is a number, the numerical
value of $c is added to $b and the sum is stored in $a.  In this case
the type of $c is irrelevant.  The operation is guided by the type of
the first variable.  If $b is a string, then the string value of
$c is appended to $b and the resultant string is placed in $a.
This also leads to some caveats.  You should read the
section on <A HREF="#overload">overloaded operators</A> to get a
better understanding of how to deal with them.<P>
<HR>
<H3><A NAME="assoc">Associative Arrays</A></H3>
<P>
The previous section introduced associative arrays.  An associative array is an
array in which the index need not be a numerically sequential value.  The array
index can be any number or string.  PHP/FI provides a set of functions to
manipulate these associative arrays.  These include, <A HREF="#next">Next()</A>,
<A HREF="#prev">Prev()</A>,<A HREF="#reset">Reset()</A>,<A HREF="#end">End()</A>,
and <A HREF="#key">Key()</A>.<P>
<HR>
<H3><A NAME="varvars">Variable Variables</A></H3>
<P>
Sometimes it is convenient to be able to have variable variable names.
That is, a variable name which can be set and used dynamically.
A normal variable is set with a statement such as:<P>
<P>
<PRE>    $a = "hello";</PRE><P>
<P>
A variable variable takes the value of a variable and treats that as the
name of a variable.  In the above example, <STRONG>hello</STRONG>, can
be used as the name of a variable by using two dollar signs. ie.<P>
<P>
<PRE>    $$a = "world";</PRE><P>
<P>
At this point two variables have been defined and stored in the PHP/FI
symbol tree:<P>
<P>
<PRE>    Variable Name        Variable Content
         <EM>a</EM>                   <EM>hello</EM>
         <EM>hello</EM>               <EM>world</EM></PRE><P>
         <P>
Therefore, this statement:<P>
<P>
<PRE>    echo "$a $$a";</PRE><P>
<P>
produces the exact same output as:<P>
<P>
<PRE>    echo "$a $hello";</PRE><P>
<P>
ie. they both produce: <STRONG>hello world</STRONG><P>
<HR>
<H3><A NAME="lang">Language Constructs</A></H3>
<P>
As far as language constructs are concerned, the PHP language is
quite simple.  The following commands are used to guide the control
flow through a file:<P>
<P>
<UL>
	<LI>if (condition)
	<LI>else
	<LI>elseif (condition)
	<LI>endif
	<LI>switch(expression)
	<LI>case expression
	<LI>default
	<LI>break
	<LI>endswitch
	<LI>while
	<LI>endwhile
	<LI>include
	<LI>exit
</UL><P>
<P>
The syntax of conditions are similar to that of the C language.
<STRONG>==</STRONG> tests for equality.  <STRONG>!=</STRONG> means not equal.  Also
supported are: <STRONG>&gt;</STRONG>, <STRONG>&lt;</STRONG>, <STRONG>&gt;=</STRONG>,
<STRONG>&lt;=</STRONG>.
Conditional AND is <STRONG>&&</STRONG>, conditional OR is <STRONG>||</STRONG>.<P>

Examples:
<P>
<PRE>    &lt;?
      if($a==5 &&  $b!=0 );
        $c = 100 + $a / $b;
      endif;
    &gt;</PRE><P>
<P>The above may also be written in standard C syntax:<BR>
In this case, there is no need for a semicolon after the closing curly brace.
<P>
<PRE>    &lt;?
      if($a==5 && $b!=0) {
          $c = 100 + $a / $b;
      }
    &gt;</PRE><P>
	<P>
There is no difference between the two syntaxes.  I personally like to
use endif, endswitch and endwhile so I explicitly know which construct 
I am ending.  However, these ending constructs can always be replaced with
a closing curly brace.<P><P>
It is important to note that the flow of the language is not dependent
on the organization of the script blocks within the code.  You can
start an if expression in one block and have the end of the expression
in another.  For example:<P>
<P>
<PRE>	&lt;?if($a==5 &&  $b!=0)>
		  &lt;b&gt;Normal html text&lt;/b&gt;
	&lt;?endif&gt;</PRE><P>
<P>In this example it is easy to see why it is sometimes more desirable to use
the <TT>endif</TT> keyword as opposed to a closing brace.  The above is much more readable
than the following:<P>
<P>
<PRE>	&lt;?if($a==5 &&  $b!=0) {>
		  &lt;b&gt;Normal html text&lt;/b&gt;
	&lt;? } &gt;</PRE><P>
<P>Both version are valid and they will do exactly the same thing.<P>
<HR>
<H3><A NAME="user_funcs">User-Defined Functions</A></H3>
<P>You may define a function within a PHP script with the following syntax:<P>
<PRE>    &lt;?
      Function Test (
        echo "This is a test\n";
      );
    &gt;</PRE><P>
    <P>
This function can now be called from anywhere in the script as long as
the call comes after the function definition.  A sample call might be:<P>
<P>
<PRE>    &lt;?
      Test();
    &gt;</PRE><P>
    <P>
User defined functions like this act exactly like PHP's internal functions
in that you can pass arguments to them and have them return a value.  Here
is the syntax for a function definition of a function which takes 3 arguments
and returns the sum of these arguments:<P>
<P>
<PRE>    &lt;?
      Function Sum $a,$b,$c (
        return($a+$b+$c);
      );

      echo Sum($a,$b,$c);
    &gt;</PRE><P>
    <P>
The <EM>return</EM> statement is used to return a value from the function.  Only
a single value can be returned using this mechanism, however, if more values
need to be communicated back and forth between the main code and functions,
global variables can be used.  This brings us to the section on the scope of
variables.<P>

<HR>
<H3><A NAME="scope">Scope of Variables</A></H3>
<P>
The scope of a variable is the context within which it is defined.  For the
most part all PHP/FI variables only have a single scope.  However, within
user-defined functions a local function scope is introduced.  Any variable
used inside a function is by default limited to the local function scope.
For example:<P>
<P>
<PRE>    $a=1; /* global scope */
    Function Test (
      echo $a; /* reference to local scope variable */
    );
    Test();</PRE><P>
    <P>
This script will not produce any output because the <EM>echo</EM>
statement refers to a local version of the <EM>$a</EM> variable, and it has
not been assigned a value within this scope.  You may notice that this is
a little bit different from the C language in that global variables in C
are automatically available to functions unless specifically overridden by a local
definition.  This can cause some problems in that people may inadvertently
change a global variable.  In PHP/FI global variables must be declared global
inside a function if they are going to be used in that function.  An example:<P>
<P>
<PRE>    $a=1;
    $b=2;
    Function Sum $first,$second (
      global $a,$b;

      $b = $a + $b;
    );
    Sum();
    echo $b;</PRE><P>
    <P>
The above script will output &quot;3&quot;.  By declaring $a and $b global within
the function, all references to either variable will refer to the global version.
There is no limit to the number of global variables that can be manipulated by a
function.  However, the variable must exist in the global scope prior to the
function being called.  You cannot create new global variables from within a function.<P>
<P>
Another important feature of variable scoping is the <EM>static</EM> variable.
A static variable exists only in a local function scope, but it does not lose
its value when program execution leaves this scope.  Consider the following
example:<P>
<P>
<PRE>    Function Test (
      $a=0;
      echo $a;
      $a++;
    );</PRE><P>
    <P>
This function is quite useless since every time it is called it sets $a to 0 and
prints &quot;0&quot;.  The $a++ which increments the variable serves no purpose
since as soon as the function exits the $a variable disappears.  To make a useful
counting function which will not lose track of the current count, the $a variable
is declared static:<P>
<P>
<PRE>    Function Test (
      static $a=0;
      echo $a;
      $a++;
    );</PRE><P>
    <P>
Now, every time the Test() function is called it will print the value of $a and
increment it.<P>
<P>
Static variables are also essential when functions are called recursively.
A recursive function is one which calls itself.  Care must be taken when writing
a recursive function because it is possible to make it recurse indefinitely.  You
must make sure you have an adequate way of terminating the recursion.  The
following simple function recursively counts to 10:<P>
<PRE>    Function Test (
      static $count=0;

      $count++;
      echo $count;
      if($count <  10) {
        Test();
      } 
    );</PRE><P>

<HR>
<H3><A NAME="math">Mathematical Expressions</A></H3>
<P>
PHP supports full mathematical operations anywhere an expression is
expected.  Order of operations are taken into account.  The following
are the valid operators:<P>
<P>
<PRE>	&lt;? $a = 2 + 1 &gt; <EM>Addition</EM>
	&lt;? $a = 2 - 1 &gt; <EM>Subtraction</EM>
	&lt;? $a = 2 * 1 &gt; <EM>Multiplication</EM>
	&lt;? $a = 2 / 1 &gt; <EM>Division</EM>
	&lt;? $a = 2 % 1 &gt; <EM>Modulus</EM>
	&lt;? $a = 2 ^ 1 &gt; <EM>Bit-wise Exclusive OR</EM></PRE><P>
<P>
Both bracketing and order of operations is supported, so the following
is valid:<P>
<P>
<PRE>	&lt;?$a = (2+1)*3+6/3&gt;</PRE><P>
<P>
The C-like incremental operators <TT>+=</TT> and <TT>-=</TT> are
supported. ie.<P>
<P>
<PRE>    &lt;? $a += $b&gt;</PRE><P>
<P>
This is equivalent to:<P>
<P>
<PRE>    &lt;? $a = $a + $b&gt;</PRE><P>
<P>
The C-like bit-wise operators <TT>&amp;=</TT>, <TT>|=</TT> and <TT>^=</TT> are
supported. ie.<P>
<P>
<PRE>    &lt;? $a &= 4&gt;</PRE>
This is equivalent to:<P>
<P>
<PRE>    &lt;? $a = $a &  4&gt;</PRE><P>
<HR>
<H3><A NAME="while">While Loops</A></H3>
<P>
You can loop within a PHP script by using the <EM>while(); endwhile;</EM> construct.<P>
<P>
<PRE>	&lt;?
	  $a=0;
	  while($a&lt;100) {
		  $a++;
		  echo $list[$a];	
	  } 
	&gt;</PRE><P>
<P>
The above example shows the use of a while loop to display the contents of
an array.  <STRONG>WARNING</STRONG> although the PHP language supports incremental
operators such as <STRONG>++</STRONG> and <STRONG>-<!>-</STRONG> to increment and decrement
a variable, they are not treated exactly like they would be in the
C language.  The variable is incremented right away.  There is no
concept of incrementing the variable before or after the operation
as there is in C.
<P>As explained in the <A HREF="#lang">Language Constructs</A> section above,
the same can be obtained with <EM>while(); endwhile;</EM>.
<P>
<HR>
<H3><A NAME="switch">Switch Construct</A></H3>
<P>
PHP supports a switch construct very similar to the C equivalent.<P>
<P>
<PRE>	&lt;?
	  $a=0;
	  switch($a) {
		case 1;
		  echo "a is 1";
		  break;
		case "hello";
		  echo "a is hello";
		  break;
		default;
		  echo "a is unknown";
		  break;
	  } 
	&gt;</PRE><P>
<P>
The above is an example of a switch construct.  It is similar to a
series of if/elseif/else constructs but easier to read.  The only
difference between the PHP switch construct and that of the C
language is that semi-colons are used to terminate every line.  There
are no colons.<P>
As explained in the <A HREF="#lang">Language Constructs</A> section above,
the same can be obtained with <EM>switch(); endswitch;</EM>.
<P>
All of these constructs can of course be nested and used
inside each other just like C.  The various files in the <EM>examples</EM>
directory of the PHP distribution should provide a good starting point
for learning the language.<P>
<HR>
<H3><A NAME="secure">Secure Variables - Defeating GET method hacks</A></H3>
<P>
A previous section talked about GET and POST method data and variables.
If you think about it, you may be able to envision a security issue.  For example,
if on a web page I have obtained some data from a database and I pass this
data along in a variable called &quot;data&quot; in a POST method form.  In the
ensuing page I can access this variable and do something with it.  However, if
someone accessed this second page directly and put a &quot;?data=something&quot

right in the URL thereby doing a GET method variable set, they have effectively
circumvented the original POST method form.<P>
<P>
PHP provides a <EM>SecureVar()</EM> function which is used to mark variables
names as being secure variables.  These secure variables can only be set
directly in a PHP script, or they can come from a POST method form.  They
cannot be set using the GET method variable definition mechanism.  From our
above scenario, if we placed the line:<P>
<P>
<PRE>    &lt;?SecureVar("data")&gt;</PRE><P>
<P>
Near the beginning of our second page, then the GET method trick would
not work.  The &quot;data&quot; variable would appear to be empty unless
it came directly from the POST method form on the first page.<P>
<P>
The <EM>SecureVar()</EM> actually takes a regular expression as its
argument, so you can mark patterns of variable names that should be
treated in this secure manner.  For example,<P>
<P>
<PRE>    &lt;?SecureVar(".*data.*")&gt;</PRE><P>
Would mark any variable with the word &quot;data&quot; anywhere in their
name as being secure.<P>
Please note that POST-method forms are not intrinsically secure.  People can
emulate the posting of any data to a form by simply telnetting to the HTTP
port on your system.  You need to take appropriate security measures to
stop people from doing this if in fact security is a concern.<P>

<HR>
<H3><A NAME="overload">Overloaded Operators and dealing with variable types</A></H3>

An overloaded operator is an operator like '+' for example which can do different things
based on the types of the expressions it is asked to operate on.<P>

The problem is that PHP understands 3 variable types.  Integer,
Double and String.  When a variable is first assigned, PHP
automatically figures out the variable type.<P>
<P>
ie.
<P>
<P>
<PRE>    $a = 1;     Type would be integer
    $b = 1.5;   Type would be double
    $c = "1";   Type would be string</PRE><P>
<P>
Now, what happens when you do something like:<P>
<P>
<PRE>    $d = $a + $c;</PRE><P>
<P>
The parser looks at the first part of the
arithmetic expression and uses that to type the result and thus
also the nature of the arithmetic that is to be done.  In the
above case since $a is an integer, $d will be an integer and
an integer addition is done giving the result:<P>
<P>
<PRE>    $d = 2      Type is integer</PRE><P>
<P>
Therefore:<P>
<P>
<PRE>    $d = $c + $a</PRE><P>
<P>
Results in:<P>
<P>
<PRE>    $d = "11"   Type is string</PRE><P>
<P>
The above makes sense to me, and once you understand it, it is probably
workable.  However, when more complex expressions are used it can
get extremely confusing.<P>
<P>
The solution is a simple type casting mechanism.

In reality all variables are automatically converted to all
3 types, and an internal flag just marks what type the variable
actually is.  So, when I say:<P>

<PRE>    $a = 1;</PRE><P>
<P>
Internally in the symbol table I store 3 versions.
<P>
<P>
<PRE>    Integer:  1    &lt;-- flag
    Double :  1.0
    String :  "1"</PRE><P>
<P>
The <EM>SetType()</EM> function can move this flag indicating the type of the variable.
<P>
<P>
<PRE>    SetType($a,"double");</PRE><P>
<P>
This would force $a to be treated as a double from then on.<P>
<P>
The <EM>GetType()</EM> function returns the type.

<TT>GetType($a)</TT> would return &quot;double&quot; in this case.<P>
<P>
Functions also exist to return the 3 various types without moving the type flag.
<P>
<P>
<PRE>    IntVal($a)     returns  1
    DoubleVal($a)  returns  1.0
    StrVal($a)     returns  "1"</PRE><P>
<P>
This doesn't change the overloaded operator nature of the PHP variables,
but it does give you some tools to better deal with them.  PHP is not
not a full-fledged Perl look-alike.  It
has to be small and fast.  Perl deals with the overloaded operator
pitfall by forcing something like the '+' operator to only
work on numbers.  If you want to add strings, you must use the
'.' operator.  Once you start having separate operators for each type
you start making the language much more complex.  ie. you can't use
'==' for stings, you now would use 'eq'.  I don't see the point,
especially for something like PHP where most of the scripts will
be rather simple and in most cases written by non-programmers who
want a language with a basic logical syntax that doesn't have too
high a learning curve.<P>
<HR>
<H3><A NAME="quiet">Suppressing Errors from function calls</A></H3>
<P>
It may be desirable in certain circumstances to ignore fatal
errors which may be reported by specific PHP functions.  For example,
you may want to ignore errors from a dbmopen() call and simply
check the return value of the call without having error messages
appear on the web screen.  This can be done by putting the &quot;@&quot;
character in front of the function call.  ie.<P>
<P>
<PRE>    $err_code = @dbmopen($filename,"w");</PRE><P>
<P>
The actual error message that would have been printed can be checked
by looking at the PHP internal variable, <STRONG>$phperrmsg</STRONG>.<P>
<P>
A more general approach to suppress error message printing is to use the
<A HREF="#seterrorreporting">SetErrorReporting()</A> function.  With
this function error printing can be disabled for entire blocks of code
by preceding the block with a call like:<P>
<P>
<PRE>    SetErrorReporting(0);</PRE><P>
<P>
This turns off all errors.  They can then be re-enabled later with:<P>
<P>
<PRE>    SetErrorReporting(1);</PRE><P>
<HR>
<H3><A NAME="funcs">Internal Functions</A></H3><A HREF="function"> </A>
<P>
PHP has a number of built-in functions.  Functions are called in
the same manner as they are called in the C language.  Some take
one or more arguments, and some return values which can then be
assigned to a variable or used as an argument to another function.
For example:<P>
<P>
<PRE>	&lt;?$t=time()&gt;</PRE><P>
<P>
This assigns the return value of the <EM>time()</EM> function to the
<EM>t</EM> variable.<P>
<H3>Alphabetical List of Functions</H3>
<DL>

<DT><A NAME="abs"><FONT SIZE="+1">Abs(arg)</FONT></A>
<DD>
<P>Abs returns the absolute value of arg.<P>

<DT><A NAME="ada_close"><FONT SIZE="+1">Ada_Close(connection_id)</FONT></A>
<DD>
<P>Ada_Close will close down the connection to the Adabas server associated
with the given connection identifier.<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_connect"><FONT SIZE="+1">$connection = Ada_Connect(data source name, username, password)</FONT></A>
<DD>
<P>Ada_Connect opens a connection to a Adabas server. Each of the arguments
should be a quoted string. The first parameter (data source name) is a string 
in the form "servername:databasename". The servername (but not the colon) can be omitted if you want to
access a local database. This function returns a connection_id. This identifier is needed by other
Adabas functions. You can have multiple connections open at once. This function
will return <STRONG>0</STRONG> on error.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_exec"><FONT SIZE="+1">$result = Ada_Exec(connection_id, query_string)</FONT></A>
<DD>
<P>Ada_Exec will send an SQL statement to the Adabas server specified by
the connection_id. The connection_id must be a valid identifier
that was returned by Ada_Connect or the special value <STRONG>0</STRONG>. 
If connection_id is 0, ada_exec tries to establish or to use a connection 
with the parameters given with the <A HREF="#directives">configuration directives</A> 
<EM>phpAdaDefDB, phpAdaUser</EM> and <EM>phpAdaPW</EM>.<BR>
The return value of this function
is an identifier to be used to access the results by other Adabas functions.
This function will return <STRONG>0</STRONG> on error. It will return
<STRONG>1</STRONG> when the command executed correctly but is not expected to
return data (insert or update commands, for example). Note that selects which
return no data will still return a valid result greater than 1.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_fetchrow"><FONT SIZE="+1">Ada_FetchRow(result_id [,row_number])</FONT></A>
<DD>
<P>Ada_FetchRow fetches a row of the data that was returned by Ada_Exec.
After Ada_FetchRow is called, the fields of that row can be access with
Ada_Result. If no rownumber is given, Ada_FetchRow will try to fetch the next
row in the result set. Every time Ada_FetchRow is called a new row can be accessed by
Ada_Result. If Ada_FetchRow was succesful (there was a row),
<STRONG>1</STRONG> is returned, if there are no more rows, Ada_FetchRow will
return <STRONG>0</STRONG>. The return value of Ada_FetchRow can be used as
the condition of a while loop. Calls to Ada_FetchRow() with and without rownumber
can be mixed. To step through the result more than once, you can call Ada_FetchRow() 
with rownumber 1 and then continue with Ada_FetchRow() without rownumber to review the 
result.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_fieldname"><FONT SIZE="+1">Ada_FieldName(result_id, field_number)</FONT></A>
<DD>
<P>Ada_FieldName will return the name of the field occupying the given column
number in the given Adabas result identifier. Field numbering starts from 0.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_fieldnum"><FONT SIZE="+1">Ada_FieldNum(result_id, field_name)</FONT></A>
<DD>
<P>Ada_FieldNum will return the number of the column slot that corresponds to
the named field in the given Adabas result identifier. Field numbering starts at
0. This function will return <STRONG>-1</STRONG> on error.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_fieldtype"><FONT SIZE="+1">Ada_FieldType(result_id, field_name|field_number)</FONT></A>
<DD>
<P>Ada_FieldType will return the SQL type of the field referecend by name or number 
in the given Adabas result identifier. Note: Field numbering starts from 0.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_freeresult"><FONT SIZE="+1">Ada_FreeResult(result_id)</FONT></A>
<DD>
<P>Ada_FreeResult only needs to be called if you are worried about using too
much memory while your script is running. All result memory will automatically
be freed when the script is finished. But, if you are sure you are not going to
need the result data anymore in a script, you may call Ada_FreeResult with
the result identifier as an argument and the associated result memory will be
freed.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_numfields"><FONT SIZE="+1">Ada_NumFields(result_id)</FONT></A>
<DD>
<P>Ada_NumFields will return the number of fields (columns) in a Adabas
result. The argument is a valid result identifier returned by Ada_Exec.
This function will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_numrows"><FONT SIZE="+1">Ada_NumRows(result_id)</FONT></A>
<DD>
<P>Ada_NumRows will return the number of rows in a Adabas result. The argument
is a valid result identifier returned by Ada_Exec. This function will return
<STRONG>-1</STRONG> on error. For INSERT, UPDATE, DELETE statements Ada_NumRows() 
returns the number of rows affected. For a SELECT clause this is the number of 
rows available.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_result"><FONT SIZE="+1">Ada_Result(result_id, field name | index)</FONT></A>
<DD>
<P>Ada_Result will return values from a result identifier produced by
Ada_Exec. The field name specify what cell in the row to return. Instead of
naming the field, you may use the field index as an unquoted number. Field
indices start from 0. If the requested field is of code type BYTE (binary)
or is longer than 4096 bytes, the contents is sent directly to the client.
Hint: [VAR]CHAR BYTE fields can be returned into a php variable by using
the HEX() db function; e. g. SELECT HEX(SYSKEY) SYSKEY FROM MYTABLE.
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="ada_resultall"><FONT SIZE="+1">Ada_ResultAll(result_id [,format])</FONT></A>
<DD>
<P>Ada_ResultAll will print all rows from a result identifier produced by
Ada_Exec. The result is printed in HTML table format. With the optional formatstring
additional overall table formatting can be done (e. g. bgcolor= will set background 
color, &gt;caption&gt; &lt;/caption to set caption). Note: The contents of &quot;format&quot; will 
be inserted into the HTML table tag like this &lt;table format &gt;...
<P>
This function is only available if Adabas support has been enabled in PHP.<P>

<DT><A NAME="addslashes"><FONT SIZE="+1">AddSlashes(arg)</FONT></A>
<DD>
<P>Escapes any $ \ or ' (if MAGIC_QUOTES is set) with a backslash.  See 
also <a href="#stripslashes">StripSlashes()</a>.<P>

<DT><A NAME="asort"><FONT SIZE="+1">ASort(array)</FONT></A>
<DD>
<P>Sort is used to sort a PHP associative array in ascending order.  Use ARSort()
for descending order. Unlike the
<a href="#sort">Sort()</a> function, ASort() maintains index-value pairings. 
It understands the three variable types and will sort alphabetically if the array
contains strings, and numerically if the array contains numbers.  In
the case of an array which contains a mixture of types, the first type
in the array will specify the sort method.  Note that if you are going to
sort a non-associative array, you should use the <a href="#sort">Sort()</a>
function.<P>

<DT><A NAME="bindec"><FONT SIZE="+1">BinDec(binary_string)</FONT></A>
<DD>
<P>BinDec returns the decimal equivalent of the binary number
represented by the binary_string argument.
The largest number that can be converted is
31 bits long or 4294967295 in decimal.  See also the
<A HREF="#decbin">DecBin()</A> function.<P>

<DT><A NAME="ceil"><FONT SIZE="+1">Ceil(value)</FONT></A>
<DD>
<P>Ceil() rounds a floating point value up to the next integer.
The return value is of type double (floating point) such that
it can be used properly in complex equations.  To get an integer
type back, use: <tt>$new = IntVal(Ceil($value));</tt><br>
See also <a href="#floor">Floor()</a>.<P>

<DT><A NAME="chdir"><FONT SIZE="+1">ChDir(dir)</FONT></A>
<DD>
<P>ChDir changes the current working directory to the directory
specified in the argument.<P>

<DT><A NAME="chgrp"><FONT SIZE="+1">ChGrp(file,group)</FONT></A>
<DD>
<P>ChGrp changes the group id of the specified file.<P>

<DT><A NAME="chmod"><FONT SIZE="+1">ChMod(file,perms)</FONT></A>
<DD>
<P>ChMod changes the file permissions of the specified file.  The
<EM>perms</EM> parameter must be specified in <a href="#octal">octal</a>
notation. eg. ChMod($filename,0755)<P>

<DT><A NAME="chown"><FONT SIZE="+1">ChOwn(file,owner)</FONT></A>
<DD>
<P>ChOwn changes the specified file to be owned by the specified owner.  Note
that this will only work if the PHP/FI binary is running as root (which is not
generally a good idea).<P>

<DT><A NAME="chop"><FONT SIZE="+1">Chop(string)</FONT></A>
<DD>
<P>Chop removes all trailing whitespaces including new-lines, tabs and
spaces and returns the new string.<P>

<DT><A NAME="chr"><FONT SIZE="+1">Chr(arg)</FONT></A>
<DD>
<P>Chr returns the ASCII character represented by the integer argument.<P>

<DT><A NAME="clearstack"><FONT SIZE="+1">ClearStack()</FONT></A>
<DD>
<P>The ClearStack() function is a hack/workaround for a deficiency in the
PHP parser.  This dificiency is that PHP only has a single expression stack.
When inside a user-defined function this expression stack is never cleared
because its contents may be needed within a complex expression in the
context from which the user-defined function was called.  This means that
if you have a while loop with a lot of iterations inside a user-defined 
function, you may be chewing up a lot of stack space.  You may even be
hitting the max data space limit.  You can put a call to ClearStack() inside
your while loop to prevent this memory consumption, but the trade-off is that
you cannot use your function within any sort of context. ie. you have to
assign the output of the function to a temporary variable and then use this
temporary variable in whatever context you need.<P>

<DT><A NAME="clearstatcache"><FONT SIZE="+1">ClearStatCache()</FONT></A>
<DD>
<P>The stat() system call is normally an expensive operation on most
operating systems.  In order to make sure that repeated calls to the
various File* functions like <a href="#fileperms">FilePerms()</a>, 
<a href="#fileinode">FileInode()</a>, etc. the result of the last stat()
call is always cached.  If one of the File* functions is called again
with the same argument, the cached stat() result will be used.  In order
to force a new stat() system call this ClearStatCache() function may be
called to clear the cached stat() result.<P>

<DT><A NAME="closedir"><FONT SIZE="+1">closeDir()</FONT></A>
<DD>
<P>closeDir closes a directory opened using the <A HREF="#opendir">
openDir</A> function.<P>

<DT><A NAME="closelog"><FONT SIZE="+1">CloseLog()</FONT></A>
<DD>
<P>
CloseLog() closes the descriptor Syslog() uses to write to the system
logger.  See the closelog(3) UNIX man page for more details.  See also <a
href="#syslog">Syslog()</a>, <a href="#openlog">OpenLog()</a> and <a
href="#initsyslog">InitSyslog()</a>.
<P>

<DT><A NAME="cos"><FONT SIZE="+1">Cos(arg)</FONT></A>
<DD>
<P>Cos returns the cosine of arg in radians.  See also <A HREF="#sin">Sin()</A>
and <A HREF="#tan">Tan()</A><P>

<DT><A NAME="count"><FONT SIZE="+1">Count(array)</FONT></A>
<DD>
<P>Count returns the number of items in an array variable.  If the
variable is not an array, the return value will be 1 (because a normal
variable is similar to an array with only one item).  If the variable
is not defined, the return value will be 0.<P>

<DT><A NAME="crypt"><FONT SIZE="+1">Crypt(string,[salt])</FONT></A>
<DD>
<P>Crypt will encrypt a string using the standard Unix DES
encryption method.  Arguments are a string to be encrypted and an optional
two-character salt string to base the encryption on.  See the Unix man page for
your crypt function for more information.  If you do not have a crypt function
on your Unix system, you can use Michael Glad's public domain UFC-Crypt package
which was developed in Denmark and hence not restricted by US export laws as long
as you ftp it from an non-US site.<P>

<DT><A NAME="date"><FONT SIZE="+1">Date(format,time)</FONT></A>
<DD>
<P>The Date function is used to display times and dates in various
ways.  The function takes a format string and a time as arguments.  If the
time argument is left off, the current time and date will be used.  The time
argument is specified as an integer in number of seconds since the Unix
Epoch on Jan.1 1970.  The format string is used to indicate which date/time
components should be displayed and how they should be formatted.  The following
characters are recognized within the format string.  Any unrecognized
character is printed verbosely:<P>

<UL>
	<LI><TT>Y - Year eg. 1995</TT>
	<LI><TT>y - Year eg. 95</TT>
	<LI><TT>M - Month eg. Oct</TT>
	<LI><TT>m - Month eg. 10</TT>
	<LI><TT>F - Month eg. October</TT>
	<LI><TT>D - Day eg. Fri</TT>
	<LI><TT>l - Day eg. Friday</TT>
	<LI><TT>d - Day eg. 27</TT>
	<LI><TT>z - Day of the year eg. 299</TT>
	<LI><TT>H - Hours in 24 hour format eg. 13</TT>
	<LI><TT>h - Hours in 12 hour format eg. 1</TT>
	<LI><TT>i - Minutes eg. 5</TT>
	<LI><TT>s - Seconds eg. 40</TT>
	<LI><TT>U - Seconds since epoch eg. 814807830</TT>
	<LI><TT>A - AM/PM</TT>
	<LI><TT>a - am/pm</TT>
</UL><P>
See also the <a href="#mktime">MkTime()</a> function.
<P>

<DT><A NAME="dblist"><FONT SIZE="+1">dbList()</FONT></A>
<DD>
<P>dbList outputs information about the db support compiled into PHP.<P>

<DT><A NAME="dbmclose"><FONT SIZE="+1">dbmClose(filename)</FONT></A>
<DD>
<P>dbmClose simply closes the specified dbm file.  It will also
unlock any lock files, so it is important to close any dbm files that
have been opened.<P>

<DT><A NAME="dbmdelete"><FONT SIZE="+1">dbmDelete(filename,key)</FONT></A>
<DD>
<P>dbmDelete will delete the key/content pair specified by the given key argument.<P>

<DT><A NAME="dbmexists"><FONT SIZE="+1">dbmExists(filename,key)</FONT></A>
<DD>
<P>dbmExists will return 1 if the key exists and 0 otherwise.<P>

<DT><A NAME="dbmfetch"><FONT SIZE="+1">dbmFetch(filename,key)</FONT></A>
<DD>
<P>dbmFetch will return the content string associated with the given key.<P>

<DT><A NAME="dbmfirstkey"><FONT SIZE="+1">dbmFirstKey(filename)</FONT></A>
<DD>
<P>dbmFirstKey returns the first key in the dbm file.  Note that no particular
order is guaranteed since the order depends on hash table values calculated within the
dbm implementation.  You may use the <A HREF="#sort">Sort</A> function to sort arrays of data
from the dbm file if necessary.<P>

<DT><A NAME="dbminsert"><FONT SIZE="+1">dbmInsert(filename,key,content)</FONT></A>
<DD>
<P>dbmInsert inserts a new key/content data pair into a dbm file.  If the
key already exists, the insert will fail.<P>

<DT><A NAME="dbmnextkey"><FONT SIZE="+1">dbmNextKey(filename,key)</FONT></A>
<DD>
<P>dbmNextKey returns the next key after the specified key.  By calling
<STRONG>dbmfirstkey()</STRONG>
followed by successive calls to <STRONG>dbmnextkey()</STRONG> it is possible to visit every
key/content
pair in the dbm file.<P>

<DT><A NAME="dbmopen"><FONT SIZE="+1">dbmOpen(filename,mode)</FONT></A>
<DD>
<P>dbmOpen() opens a dbm file.  The first argument is the full-path filename
of the dbm file to be opened and the second is the file open mode which is one
of <B>&quot;r&quot;</B>, <B>&quot;n&quot;</B> or <B>&quot;w&quot;</B> for
read, new (implies write) and write respectively.  If ndbm support is used, ndbm 
will actually create <EM>filename.dir</EM> and <EM>filename.pag</EM> files.  gdbm
only uses one file, as does the internal flat ascii file support, and
Berkeley's libdb create a <EM>filename.db</EM> file.  Note that
PHP does its own file locking in addition to any file locking that may be
done by the dbm library itself.  PHP does not delete the <EM>.lck</EM>
files it creates.  It uses these files simply as fixed inodes on which
to do the file locking.  For more information on dbm files, see your
Unix man pages, or obtain GNU's gdbm from
<A HREF="ftp://prep.ai.mit.edu/pub/gnu">ftp://prep.ai.mit.edu/pub/gnu</A>.<P>

<DT><A NAME="dbmreplace"><FONT SIZE="+1">dbmReplace(filename,key,content)</FONT></A>
<DD>
<P>dbmReplace is similar to the <STRONG>dbminsert()</STRONG> function, the only
difference being that if the key already exists, the old content string will
be replaced with the new.<P>

<DT><A NAME="decbin"><FONT SIZE="+1">DecBin(number)</FONT></A>
<DD>
<P>DecBin returns a string containing a binary representation of the
given number argument.  The largest number that can be converted is
31 bits long or 4294967295 in decimal.  See also the
<A HREF="#bindec">BinDec()</A> function.<P>

<DT><A NAME="dechex"><FONT SIZE="+1">DecHex(number)</FONT></A>
<DD>
<P>DecHex converts a decimal number to a hexadecimal string.  See also
the <A HREF="#hexdec">HexDec()</A> function.<P>

<DT><A NAME="decoct"><FONT SIZE="+1">DecOct(number)</FONT></A>
<DD>
<P>DecOct converts a decimal number to an octal number. See also
<A HREF="#octdec">OctDec()</A>.<P>

<DT><A NAME="doubleval"><FONT SIZE="+1">doubleval(variable)</FONT></A>
<DD>
<P>doubleval returns the double (floating point) value of the variable.
See also the <A HREF="#strval">strval()</A> and <A HREF="#intval">intval()</A>
functions.<P>

<DT><A NAME="echo"><FONT SIZE="+1">Echo [format_string] expression [, expression [,...]]</FONT></A>
<DD>
<P>Echo is not a function.  ie. you do not put brackets around the
arguments to it.  It is used to display results of
PHP functions or PHP variables.  See the <a href="#escapes">Escape Character Section</a> for a list of special characters supported.
The format_string is
optional and if not present, no output formatting will be done.
The format string is similar to the format string of the C <EM>printf</EM>
function.  See the man page for <EM>printf</EM> for more details.
Up to 5 expressions can be printed with a single echo command.  If you try 
to print more you will get a parser error.  Note that the types of the
expressions are not relevant.  The expressions are automagically converted to
the appropriate types as specified by the format string if one is present.
If you want to format something and assign
the formatted string to a variable instead of displaying it, use the
<A HREF="#sprintf">sprintf()</A> function.<P>
<P>The following conversions are supported,<P>
<BLOCKQUOTE>
<P>
<DL>
<DT>%d %i</DT>
<DD>Print a signed decimal number.</DD>
<DT>%o</DT>
<DD>Print an octal number.</DD>
<DT>%u</DT>
<DD>Print an unsigned decimal number.</DD>
<DT>%x %X</DT>
<DD>Print a hexadecimal number.</DD>
<DT>%f</DT>
<DD>Print a floating-point number.</DD>
<DT>%e %E</DT>
<DD>Print a floating-point number in scientific notation.</DD>
<DT>%g %G</DT>
<DD>Print a floating-point number in scientific notation or normal notation,
as appropriate.</DD>
<DT>%c</DT>
<DD>Print a single character.</DD>
<DT>%s</DT>
<DD>Print a string of characters.</DD>
<DT>%%</DT>
<DD>Print a literal percent-sign.</DD>
</DL>
<P>
The following flags are accepted.
<DL>
<DT>'-'</DT>
<DD>Left-justify the output within the field-width.</DD>
<DT>'+'</DT>
<DD>Ensure that all integers are signed (with a plus/minus sign).</DD>
<DT>' '</DT>
<DD>Similar to '+', but uses a space instead of a plus-sign.</DD>
<DT>'#'</DT>
<DD>Print prefixes in front of hex and octal numbers designating them as
such.</DD>
<DT>'''</DT>
<DD>Separate the digits into groups (usually comma-separated groups of
three).</DD>
<DT>'0'</DT>
<DD>Pad the field-width with zeros.</DD>
</DL>
<P>
All of these flags are dependent upon whether or not your C library's printf
function supports them (the ''', for example, is a GNU extension).<P>
<P>
Most conversions will accept a field width and a precision, as shown in
the <TT>demo_echo.html</TT> file in the directory /examples.  It is not
necessary to specify any type modifiers, and, in fact, PHP will complain
if the type modifier does not make sense (which is almost always the
case).  PHP will complain about (and refuse to accept) anything that it
does not recognize.  Any extra arguments given that are not required
by the format-string are ignored.<P>
</BLOCKQUOTE>

<DT><A NAME="end"><FONT SIZE="+1">End(variable)</FONT></A>
<DD>
<P>End moves the internal array pointer for the given variable to the
last item of the array and returns the value of this item.
This is useful for traversing an associative
array in reverse order.  See also <A HREF="#reset">Reset()</A> and
<A HREF="#prev">Prev()</A>.  The following example would traverse an
associative array in reverse order:<P>
<P>
<PRE>    &lt;?
      Reset($array);
      $first_key = key($array);
      End($array);
      $k = key($array);
      while($k != $first_key);
        echo $array[$k];
        prev($array);
        $k = key($array);
      endwhile;
      echo $array[$k];
    &gt;</PRE><P>

<DT><A NAME="ereg"><FONT SIZE="+1">ereg(expr,arg[,regs])</FONT></A>
<DD>
<P>ereg returns non-zero if the regular expression is matched
in the argument string.  For example, the condition, <TT>&lt;?if (ereg(&quot;^This.*&quot;,
&quot;This is an example string&quot;)&gt;</TT> would be true since the &quot;^This.*&quot;
expression says to match the word <STRONG>This</STRONG> at the beginning of the string and then
match any characters afterwards.  If the <EM>regs</EM> argument is present, then match
registers are filled into positions 0-10 in the array named by the <EM>regs</EM>
argument.  Register 0 will always contain the full matched string.  
For more information on regular expressions, see
the <A HREF="#regexp">regular expression section</A> of this document.<P>

<DT><A NAME="eregi"><FONT SIZE="+1">eregi(expr,arg[,regs])</FONT></A>
<DD>
<P>eregi is identical to the <a href="#ereg">ereg()</a> function except
for the fact that the regular expression is applied such that upper/lower
case is ignored.<P>

<DT><A NAME="ereg_replace"><FONT SIZE="+1">ereg_replace(expr,replace,arg)</FONT></A>
<DD>
<P>ereg_Replace scans the entire argument string and replaces any portions
of the string matched by the given expression with the replacement string.  For
example, in the string, <TT>&quot;This is an example string&quot;</TT> we could
very easily replace every space with a dash with the command:
<STRONG>ereg_replace(" ","-","This is an example string")</STRONG>.For more information on regular
expressions, see the <A HREF="#regexp">regular expression section</A>
of this document.<P>

<DT><A NAME="eregi_replace"><FONT SIZE="+1">eregi_replace(expr,replace,arg)</FONT></A>
<DD>
<P>eregi_replace is identical to the <a href="#ereg_replace">ereg_replace()</a>
function except for the fact that the regular expression is applied such that 
upper/lower case is ignored.<P>

<DT><A NAME="escapeshellcmd"><FONT SIZE="+1">EscapeShellCmd(string)</FONT></A>
<DD><P>EscapeShellCmd escapes any characters in a string that might be used to
trick a shell command into executing arbitrary commands.  This function should
be used to make sure that any data coming from user input is escaped before
this data is passed to the <A HREF="#exec">Exec()</A> or <A HREF="#system">System()</A>
functions.  A standard use would be:<P>
<P>
<PRE>    &lt;?system(EscapeShellCmd($cmd))&gt;</PRE><P>

<DT><A NAME="eval"><FONT SIZE="+1">Eval(string)</FONT></A>
<DD>
<P>Eval takes the contents of the string argument and treats it like a mini
PHP/FI script.  It will execute it as a separate PHP/FI script.  Any variables
set or accessed from inside the eval will be from the global reference frame
in the current context of the eval statement in the script.  Variable substitution
is done on the string arguments, so if variables are to be used in the string
expression they should be escaped.  Some examples:<P>
<P>
<PRE>    $a = "echo phpversion();";
    eval($a);

    eval("echo phpversion();");

    eval("\$a=1; echo \$a;");</PRE><P>

<DT><A NAME="exec"><FONT SIZE="+1">Exec(command_string [, array [,return_var]])</FONT></A>
<DD>
<P>Exec executes the given unix command, however it does not
output anything.  It simply returns the last line from the result of the command.
If you need to execute a command and have all the data from the command passed
directly back without any interference, use the <a href="#passthru">PassThru()</a>
function.
If the array argument is present, then the specified array will be filled
with every line of output from the unix command starting at the end of the
array.  Make sure you <a href="#unset">UnSet</a> the array before the call if
your array already contains elements and you want to start filling it at
array element 0.  If the return_var argument is present along with the array 
argument, then the return status of the executed unix command will be written to this 
variable.  Note that if you are going to allow data coming from user input to be 
passed to this Exec function, then you should be using the 
<A HREF="#escpapeshellcmd">EscapeShellCmd()</A> function
to make sure that users cannot trick the system into executing arbitrary commands.
See also the <A HREF="#system">system()</A> function.<P>

<DT><A NAME="exit"><FONT SIZE="+1">Exit</FONT></A>
<DD>
<P>The Exit command is used to terminate parsing right away as soon
as this tag is parsed.<P>

<DT><A NAME="exp"><FONT SIZE="+1">Exp(arg)</FONT></A>
<DD>
<P>Exp returns e raised to the power of arg.  See also <a href="#pow">pow()</a><P>

<DT><A NAME="fclose"><FONT SIZE="+1">fclose($fd)</FONT></A>
<DD>
<P>fclose() closes a file opened by <A HREF="#fopen">fopen()</A>.
The argument is a file pointer index as returned by the fopen()
call.<P>

<DT><A NAME="feof"><FONT SIZE="+1">feof($fd)</FONT></A>
<DD>
<P>Feof returns true if the file referred to by the file pointer index
argument has hit end-of-file.<P>

<DT><A NAME="fgets"><FONT SIZE="+1">fgets($fd,bytes)</FONT></A>
<DD>
<P>fgets() reads a line from a file opened by <A HREF="#fopen">fopen()</A>.
Arguments are a file pointer index as returned by fopen() and the max number of
bytes to read.  Reading ends when max number of bytes have been read,
or on an end of line.  This is similar to the C fgets() call.
See also <A HREF="#fputs">fputs()</A>.<P>

<DT><A NAME="fgetss"><FONT SIZE="+1">fgetss($fd,bytes)</FONT></A>
<DD>
<P>Identical to the fgets() function, except this one tries to strip
off any HTML tags or PHP/FI script tags as it is reading the file.<P>

<DT><A NAME="file"><FONT SIZE="+1">$array = File(filename)</FONT></A>
<DD>
<P>File reads the entire file and returns an array with each array element
containing a line of the file starting with array index <STRONG>0</STRONG>.<P>

<DT><A NAME="fileatime"><FONT SIZE="+1">fileAtime(filename)</FONT></A>
<DD>
<P>fileAtime returns the time of last data access.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileAtime and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="filectime"><FONT SIZE="+1">fileCtime(filename)</FONT></A>
<DD>
<P>fileCtime returns the time of last status change.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileCtime and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="filegroup"><FONT SIZE="+1">fileGroup(filename)</FONT></A>
<DD>
<P>fileGroup returns the group id of the owner of the file.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileGroup and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="fileinode"><FONT SIZE="+1">fileInode(filename)</FONT></A>
<DD>
<P>fileInode returns the file's inode.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileInode and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="filemtime"><FONT SIZE="+1">fileMtime(filename)</FONT></A>
<DD>
<P>fileMtime returns the time of last data modification.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileMtime and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="fileowner"><FONT SIZE="+1">fileOwner(filename)</FONT></A>
<DD>
<P>fileOwner returns the uid of the owner of the file.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileOwner and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="fileperms"><FONT SIZE="+1">filePerms(filename)</FONT></A>
<DD>
<P>filePerms returns the permission bits of the file.  This is the
<EM>st_mode</EM> field of the Unix C stat structure.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to filePerms and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="filesize"><FONT SIZE="+1">fileSize(filename)</FONT></A>
<DD>
<P>fileSize returns the size of the file in bytes.  If the file does
not exist, or if it for some other reason could not be accessed,
this function returns -1.  If repeated calls to fileSize and the rest
ofthe file* functions are to be made and the file being accessed might
change or disappear, the <a href="#clearstatcache">ClearStatCache()</a>
should be called before the call to the file* function.<P>

<DT><A NAME="filetype"><FONT SIZE="+1">fileType(filename)</FONT></A>
<DD>
<P>fileType returns the type of the file.  The return values are one of:
&quot;dir&quot;, &quot;file&quot;,&quot;fifo&quot;,&quot;char&quot;,
&quot;block&quot;, or &quot;link&quot;.  These are for, directory, 
regular file, fifo special, character special, block special and symbolic
link, respectively.<P>

<DT><A NAME="floor"><FONT SIZE="+1">Floor(value)</FONT></A>
<DD>
<P>Floor() rounds a floating point value down to the previous integer.
The return value is of type double (floating point) such that
it can be used properly in complex equations.  To get an integer
type back, use: <tt>$new = IntVal(Floor($value));</tt><br>
See also <a href="#ceil">Ceil()</a>.<P>

<DT><A NAME="flush"><FONT SIZE="+1">Flush()</FONT></A>
<DD>
<P>The Flush() function is used to Flush the output buffer.  For the Apache module,
it flushes Apache's output buffer, and for the CGI version it simply flushes stdout.
When running as a CGI under Apache, the server will buffer the CGI script's output, so 
this Flush() function won't help much there.  Look at running your script as an nph- script
if you are running the CGI version of PHP under the Apache web server.  Or, alternatively, 
run the Apache module version of PHP.<P>

<DT><A NAME="fopen"><FONT SIZE="+1">$fp = fopen(filename,mode)</FONT></A>
<DD>
<P>fopen() opens a file and returns a file pointer index.  If the file
could not be opened the function returns -1.  It is
similar to the C fopen() call.  The filename argument is the
relative or absolute path to the file to be opened, and the mode
argument is one of, "r", "r+", "w", "w+", "a", "a+".  See the
Unix man page on the fopen() call for more information.  See also
the <A HREF="#popen">popen()</A> function description. See also the
 <A HREF="#fclose">fclose()</A> function description.<P>
<P>Example:<P>
<PRE>    $fp = fopen("/home/rasmus/file.txt","r");</PRE>

<DT><A NAME="fputs"><FONT SIZE="+1">fputs(fp,string)</FONT></A>
<DD>
<P>fputs() writes a line to a file opened by <A HREF="#fopen">fopen()</A>.
Arguments are a file pointer index as returned by fopen() and the string to
write.  Note that the string argument may contain the special escape characters,
<STRONG>\n</STRONG>, <STRONG>\r</STRONG> and <STRONG>\t</STRONG> to output newlines, carriage returns
and tabs
respectively.  See also <A HREF="#fgets">fgets()</A>.<P>

<DT><A NAME="fpassthru"><FONT SIZE="+1">FPassThru(fp)</FONT></A>
<DD>
<P>FPassThru() outputs all remaining data on <I>fp</I> directly.  It
is different from <A HREF="#readfile">ReadFile()</A> in that it can
also handle files opened with <A HREF="#fsockopen">fsockopen()</A>.
It differs from <A HREF="#passthru">PassThru()</A> in that it does not
handle commands, but opened files.  FPassThru() returns the number of
bytes read and written.<P>

<DT><A NAME="fseek"><FONT SIZE="+1">fseek(fp,pos)</FONT></A>
<DD>
<P>fseek() positions a file pointer identified by the
$fd argument which is the return value of the <A HREF="#fopen">fopen()</A>
call.  The file pointer is positioned at the beginning of the file plus
the offset specified by the <STRONG>pos</STRONG> argument.  See also
<A HREF="#ftell">ftell()</A> and <A HREF="#rewind">rewind()</A>.<P>

<DT><A NAME="fsockopen"><FONT SIZE="+1">fp = fsockopen(hostname,port)</FONT></A>
<DD>
<P>fsockopen() opens a socket connection and returns a file
pointer index. This file pointer index can be used by
<A HREF="#fgets">fgets</A>, <A HREF="#fputs">fputs</A> and
<A HREF="#fclose">fclose</A>.  Arguments are a hostname and a port number.
Return values are: -3 if the socket couldn't be created, -4 if the dns
lookup on the hostname failed, -5 if the connection was refused or it timed
out, -6 if the actual fdopen() call failed or -7 if the setvbuf() call failed.
If the port number is 0, then the hostname argument will be treated as a filename
of a Unix domain socket if your operating system support Unix domain sockets.<P>

<DT><A NAME="ftell"><FONT SIZE="+1">pos = ftell(fp)</FONT></A>
<DD>
<P>ftell() returns the position of a file pointer identified by the
fp argument which is the return value of the <A HREF="#fopen">fopen()</A>
call.  The position can later be used as an argument to fseek().
See also <A HREF="#fseek">fseek()</A> and <A HREF="#rewind">rewind()</A>.<P>

<DT><A NAME="getaccdir"><FONT SIZE="+1">getAccDir()</FONT></A>
<DD>
<P>getAccDir returns the directory where PHP access configuration files
are kept.  The access configuration filenames come from the numerical user
id of the user whose access configurations they represent.<P>

<DT><A NAME="getenv"><FONT SIZE="+1">GetEnv(string)</FONT></A>
<DD>
<P>GetEnv returns the value of the environment value specified by <EM>string</EM>.
Normally this function is not used because environment variables are available
to PHP/FI directly.  If a reference is made to a variable which is not found in
the internal symbol table, then the environment space is automatically searched.
GetEnv should be used when it is necessary to ensure that an environment variable
has not been overwritten by normal PHP/FI variable.  Security mechanisms that
rely on http server-defined variables like REMOTE_ADDR and REMOTE_HOST should load
these variables using GetEnv as opposed to referencing them directly as $REMOTE_ADDR
to avoid someone making up a fake form and posting the data to your server and
thereby bypassing whatever security mechanism you might have.<P>

<DT><A NAME="gethostbyname"><FONT SIZE="+1">getHostByName(domain_name)</FONT></A>
<DD>
<P>getHostByName converts the given domain name into an IP address
in nnn.nnn.nnn.nnn format.<P>

<DT><A NAME="gethostbyaddr"><FONT SIZE="+1">getHostByAddr(ip_address)</FONT></A>
<DD>
<P>getHostByAddr converts the given IP address in nnn.nnn.nnn.nnn
format into a fully qualified domain name.<P>

<DT><A NAME="getimagesize"><FONT SIZE="+1">GetImageSize(filename)</FONT></A>
<DD>
<P>The GetImageSize() function takes either a full path filename, or a
relative path relative to the location of the calling script.  It returns a
3 element array consisting of width, height and type.  Width and height are
in pixels, and a type of 1 means GIF, a 2 indicates a JPG file and a 3
indicates a PNG file.  Other file types are not supported.  The fourth element
in the returned array is a string containing, &quot;width=x height=y&quot; that
is suitable for using directly in an IMG tag.  It is important to 
note that the GD image library is not needed to use this function.  An example 
follows:</P>
<P><PRE>    &lt;?
        $result = GetImageSize("img/flag.jpg");
    &gt;
    &lt;IMG SRC=&quot;img/flag.jpg&quot; ?echo $result[3]&gt; &gt;</PRE></P>

<DT><A NAME="getlastaccess"><FONT SIZE="+1">getLastAccess()</FONT></A>
<DD>
<P>getLastAccess returns the date and time in unix time format of
the last time the current page was access.  This value can be passed to
the <A HREF="#date">Date()</A> function for formatting.  <BR>This function is
only available if PHP was compiled with Access Logging enabled.<P>

<DT><A NAME="getlastbrowser"><FONT SIZE="+1">getLastbrowser()</FONT></A>
<DD>
<P>getLastBrowser returns the identification string of browser the
last user to access the current page used.  <BR>This function is only
available if PHP was compiled with Access Logging enabled.<P>

<DT><A NAME="getlastemail"><FONT SIZE="+1">getLastEmail()</FONT></A>
<DD>
<P>getLastEmail returns the E-Mail address of the last user to access the
current page.  <BR>This function is only available if PHP was compiled
with Access Logging enabled.<P>

<DT><A NAME="getlasthost"><FONT SIZE="+1">getLastHost()</FONT></A>
<DD>
<P>getLastHost returns the hostname of the last user to access the
current page.  <BR>This function is only available if PHP was compiled
with Access Logging enabled.<P>

<DT><A NAME="getlastmod"><FONT SIZE="+1">getLastMod()</FONT></A>
<DD>
<P>getLastMod returns the date and time in unix time format of
the last time the current page was modified.  This value can be passed to
the <A HREF="#date">Date()</A> function for formatting.  <BR>This function is
only available if PHP was compiled with Access Logging enabled.<P>

<DT><A NAME="getlastref"><FONT SIZE="+1">getLastref()</FONT></A>
<DD>
<P>getLastRef returns the URL of the referring document of the
last user to access the current page.  <BR>This function is only available if
PHP was compiled with Access Logging enabled.<P>

<DT><A NAME="getlogdir"><FONT SIZE="+1">getLogDir()</FONT></A>
<DD>
<P>getLogDir returns the top-level directory under which PHP log
files can be found.  The actual log files are in directories
under this directory.  Each subdirectory is the numerical user id
of the user to whom the log files belong.  Then within each directory
a series of dbm log files are found, each with the numerical inode
of the file they represent as the primary component of the filename.<P>

<DT><A NAME="getmyinode"><FONT SIZE="+1">getMyInode()</FONT></A>
<DD>
<P>getMyInode returns the numerical inode of the current HTML file.<P>

<DT><A NAME="getmypid"><FONT SIZE="+1">getMyPid()</FONT></A>
<DD>
<P>getMyPid() returns the current process id of the PHP parsing
process.<P>

<DT><A NAME="getmyuid"><FONT SIZE="+1">getMyUid()</FONT></A>
<DD>
<P>getMyUid returns the numerical user id of the owner of the current
HTML file.<P>

<DT><A NAME="getrandmax"><FONT SIZE="+1">getRandMax()</FONT></A>
<DD>
<P>getRandMax returns the maximum random number the <A HREF="#rand">Rand</A>
function will return.  If the value returned does not seem to be accurate,
have a look in the php.h source file in the PHP distribution for more information.<P>

<DT><A NAME="getstartlogging"><FONT SIZE="+1">getStartLogging()</FONT></A>
<DD>
<P>getStartLogging returns the time and date in Unix time format when
logging commenced on the current page.  This is more accurate when mSQL-based
logging is used since a timestamp is kept in each log file.  For dbm-logging
the time returned is the time the user's log directory was created.<P>

<DT><A NAME="gettoday"><FONT SIZE="+1">getToday()</FONT></A>
<DD>
<P>getToday returns the total number of hits the current page has
had since 12 midnight local time.  <BR>This function is only available if
PHP was compiled with Access Logging enabled.<P>

<DT><A NAME="gettotal"><FONT SIZE="+1">getTotal()</FONT></A>
<DD>
<P>getTotal returns the total number of hits the current page has
had since access logging was started on the page.  <BR>This function is
only available if PHP was compiled with Access Logging enabled.<P>

<DT><A NAME="gettype"><FONT SIZE="+1">GetType(variable)</FONT></A>
<DD>
<P>GetType returns the type of the variable.  The return value is a string
and it is one of, &quot;integer&quot;, &quot;double&quot; or &quot;string&quot;.
See also the <A HREF="#settype">SetType()</A> function<P>

<DT><A NAME="gmdate"><FONT SIZE="+1">gmDate(format,time)</FONT></A>
<DD>
<P>gmDate is identical to the <A HREF="#date">Date</A> function
except for the fact that it uses Greenwich Mean Time instead of the current
local time.<P>

<DT><A NAME="header"><FONT SIZE="+1">Header(header_string)</FONT></A>
<DD>
<P>The Header command is used at the top of an HTML file to send
raw HTTP header strings.  See the
<A HREF="http://www.w3.org/Protocols/rfc2068/rfc2068">
HTTP Specification</A> for more information on raw http headers.  Remember that the
Header() command must be used before any actual output is sent either by normal
HTML tags or by PHP echo commands.<BR>
Usage examples can be found in the <A HREF="#http_auth">HTTP Authentication</A>
section.<P>

<DT><A NAME="hexdec"><FONT SIZE="+1">HexDec(hex_string)</FONT></A>
<DD>
<P>HexDec converts a hexadecimal string to a decimal number.  See also
the <A HREF="#dechex">DecHex()</A> function.<P>

<DT><A NAME="htmlspecialchars"><FONT SIZE="+1">HtmlSpecialChars(string)</FONT></A>
<DD>
<P>HtmlSpecialChars converts any characters with ascii codes in the string
argument between 160 and 255 inclusive to their corresponding HTML Entity names.
The function returns the converted string.  The <b>&lt;</b>, <b>&gt;</b>, 
<b>&amp;</b> and <b>&quot;</b> are also converted.<P>

<DT><A NAME="imagearc"><FONT SIZE="+1">ImageArc(im, cx, cy, w, h, s, e, col)</FONT></A>
<DD>
<P>ImageArc draws a partial ellipse centered at cx,cy (top left is 0,0) in the
image represented by <A HREF="#imagecreate">im</A>.
w and h specifies the ellipse's width and height respectively
while the start and end points are specified in degrees indicated by the s and e arguments.
<BR>This function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagechar"><FONT SIZE="+1">ImageChar(im, size, x, y, c, col)</FONT></A>
<DD>
<P>ImageChar draws the character c in the image identified by
<A HREF="#imagecreate">im</A> at coordinates x,y (top left is 0,0) in colour col.  The
size argument can be 1, 2, 3, 4 or 5 indicating the size of the font to be used.  1 is
the smallest and 5 is the largest.  <BR>This function is only available if GD support
has been enabled in PHP.<P>

<DT><A NAME="imagecharup"><FONT SIZE="+1">ImageCharUp(im, size, x, y, c, col)</FONT></A>
<DD>
<P>ImageCharUp draws the character c vertically in the image identified by
<A HREF="#imagecreate">im</A> at coordinates x,y (top left is 0,0) in colour col.  The
size argument can be 1, 2, 3, 4 or 5 indicating the size of the font to be used.  1 is
the smallest and 5 is the largest.  <BR>This function is only available if GD support
has been enabled in PHP.<P>

<DT><A NAME="imagecolorallocate"><FONT SIZE="+1">col = ImageColorAllocate(im, red, green,
blue)</FONT></A>
<DD>
<P>ImageColorAllocate returns a colour identifier representing the colour composed of the
given RGB components.  The im argument is the return from the <A HREF="#imagecreate">
ImageCreate</A> function.  ImageColorAllocate must be called to create each colour that
is to be used in the image represented by im.  <BR>This function is only available if
GD support has been enabled in PHP.<P>

<DT><A NAME="imagecolortransparent"><FONT SIZE="+1">ImageColorTransparent(im, col)</FONT></A>
<DD>
<P>ImageColorTransparent sets the transparent colour in the im image to col.  im is
the image identifier returned by <A HREF="#imagecreate">ImageCreate</A> and col is the
colour identifier returned by <A HREF="#imagecolorallocate">ImageColorAllocate</A>.  This
function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagecopyresized"><FONT SIZE="+1">ImageCopyResized(dst_im, src_im, dstX, 
dstY, srcX, srcY, dstW, dstH, srcW, srcH )</FONT></A>
<DD>
<P>ImageCopyResized copies a rectangular portion of one image to another image.  
<EM>dst_im</EM> is the destination image, <EM>src_im</EM> is the source image identifier.
If the source and destination coordinates and width and heights differ, appropriate
stretching or shrinking of the image fragment will be performed.  The coordinates
refer to the upper left corner.  This function can be used to copy regions within the
same image (if <EM>dst_im</EM> is the same as <EM>src_im</EM>) but if the regions
overlap the results will be unpredictable.  <BR>This function is only available if
GD support has been enabled in PHP.<P>

<DT><A NAME="imagecreate"><FONT SIZE="+1">im = ImageCreate(x_size, y_size)</FONT></A>
<DD>
<P>ImageCreate returns an image identifier representing a blank image of size
x_size by y_size.  <BR>This function is only available if GD support has been
enabled in PHP.<P>

<DT><A NAME="imagecreatefromgif"><FONT SIZE="+1">im = ImageCreateFromGif(filename)</FONT></A>
<DD>
<P>ImageCreateFromGif returns an image identifier representing the image obtained
from the given <EM>filename</EM>.  <BR>This function is only available if GD support
has been enabled in PHP.<P>

<DT><A NAME="imagedestroy"><FONT SIZE="+1">ImageDestroy(im)</FONT></A>
<DD>
<P>ImageDestroy frees any memory associated with image im.  im is the image
identifier returned by the <A HREF="#imagecreate">ImageCreate</A> function.  This
function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagefill"><FONT SIZE="+1">ImageFill(im, x, y, col)</FONT></A>
<DD>
<P>ImageFill performs a flood fill starting at coordinate x,y (top left is 0,0) with
colour col in image im.  <BR>This function is only available if GD support has been
enabled in PHP.<P>

<DT><A NAME="imagefilledpolygon"><FONT SIZE="+1">ImageFilledPolygon(im, points, num_points,
col)</FONT></A>
<DD>
<P>ImageFilledPolygon creates a filled polygon in image
<A HREF="#imagecreate">im</A>.  points is a
PHP array containing the polygon's vertices.  ie. points[0] = x0, points[1] = y0, points[2] =
x1, points[3] = y1, etc.  num_points is the total number of vertices.  <BR>This function is
only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagefilledrectangle"><FONT SIZE="+1">ImageFilledRectangle(im, x1, y1, x2, y2,
col)</FONT></A>
<DD>
<P>ImageFilledRectangle creates a filled rectangle of colour col in image im starting at upper left
coordinate x1,y1 and ending at bottom right coordinate x2,y2.  0,0 is the top left
corner of the image.  <BR>This function is only available if GD support has been
enabled in PHP.<P>

<DT><A NAME="imagefilltoborder"><FONT SIZE="+1">ImageFillToBorder(im, x, y, border, col)</FONT></A>
<DD>
<P>ImageFillToBorder performs a flood fill whose border colour is defined by border.  The
starting point for the fill is x,y (top left is 0,0) and the region is filled with colour
col.  <BR>This function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagegif"><FONT SIZE="+1">ImageGif(im [,filename])</FONT></A>
<DD>
<P>ImageGif creates the GIF file in filename from the image im.  The im argument is
the return from the <A HREF="#imagecreate">ImageCreate</A> function.  The filename
argument is optional, and if left off, the raw image stream will be returned directly.
By sending an <em>image/gif</em> content-type using the <a href="#header">Header()</a>
function, you can create a PHP/FI script which returns GIF images directly using this
function.  <BR>This function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imageinterlace"><FONT SIZE="+1">ImageInterlace(im, interlace)</FONT></A>
<DD>
<P>ImageInterlace turns the interlace bit on or off.  If interlace is 1 the im image
will be interlaced, and if interlace is 0 the interlace bit is turned off.  This functions
is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imageline"><FONT SIZE="+1">ImageLine(im, x1, y1, x2, y2, col)</FONT></A>
<DD>
<P>ImageLine draws a line from x1,y1 to x2,y2 (top left is 0,0) in image
<A HREF="#imagecreate">im</A> of colour <A HREF="#imagecolorallocate">col</A>.
<BR>This function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagepolygon"><FONT SIZE="+1">ImagePolygon(im, points, num_points, col)</FONT></A>
<DD>
<P>ImagePolygon creates a polygon in image <A HREF="#imagecreate">im</A>.  points is a
PHP array containing the polygon's vertices.  ie. points[0] = x0, points[1] = y0, points[2] =
x1, points[3] = y1, etc.  num_points is the total number of vertices.  <BR>This function is
only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagerectangle"><FONT SIZE="+1">ImageRectangle(im, x1, y1, x2, y2, col)</FONT></A>
<DD>
<P>ImageRectangle creates a rectangle of colour col in image im starting at upper left coordinate
x1,y1 and ending at bottom right coordinate x2,y2.  0,0 is the top left
corner of the image.  <BR>This function is only available if GD support has been
enabled in PHP.<P>

<DT><A NAME="imagesetpixel"><FONT SIZE="+1">ImageSetPixel(im, x, y, col)</FONT></A>
<DD>
<P>ImageSetPixel draws a pixel at x,y (top left is 0,0) in image
<A HREF="#imagecreate">im</A> of colour <A HREF="#imagecolorallocate">col</A>.
<BR>This function is only available if GD support has been enabled in PHP.<P>

<DT><A NAME="imagestring"><FONT SIZE="+1">ImageString(im, size, x, y, s, col)</FONT></A>
<DD>
<P>ImageString draws the string s in the image identified by
<A HREF="#imagecreate">im</A> at coordinates x,y (top left is 0,0) in colour col.  The
size argument can be 1, 2, 3, 4 or 5 indicating the size of the font to be used.  1 is
the smallest and 5 is the largest.  <BR>This function is only available if GD support
has been enabled in PHP.<P>

<DT><A NAME="imagestringup"><FONT SIZE="+1">ImageStringUp(im, size, x, y, s, col)</FONT></A>
<DD>
<P>ImageStringUp draws the string s vertically in the image identified by
<A HREF="#imagecreate">im</A> at coordinates x,y (top left is 0,0) in colour col.  The
size argument can be 1, 2, 3, 4 or 5 indicating the size of the font to be used.  1 is
the smallest and 5 is the largest.  <BR>This function is only available if GD support
has been enabled in PHP.<P>

<DT><A NAME="imagesx"><FONT SIZE="+1">ImageSX(im)</FONT></A>
<DD>
<P>ImageSX returns the width of the image identified by <em>im</em>.<P>

<DT><A NAME="imagesy"><FONT SIZE="+1">ImageSY(im)</FONT></A>
<DD>
<P>ImageSY returns the height of the image identified by <em>im</em>.<P>

<DT><A NAME="include"><FONT SIZE="+1">Include(filename)</FONT></A>
<DD>
<P>The Include command can be used to insert other files into the current
html file.  This is extremely handy for headers and footers which may need
to be included in hundreds of HTML files.  By using an include command you then
only need to modify the header or footer file in one place when it needs to be
changed.  Since full PHP parsing is done on the included file, you can also
use the include command to include common PHP scripts you may have
written.  Sort of like having a primitive shared library of scripts
you can call from your HTML file.  You can place such common library
files in one directory and set PHP's include path and not have to
refer to the files with pathnames.  For Apache module users this can be
configured with the <STRONG>phpIncludePath</STRONG> directive, for CGI
users with the PHP_INCLUDE_PATH environment variable.  This path is
colon-separated just like <CODE>$PATH</CODE> is in your UNIX shell.
eg.<PRE>    &lt;?include(&quot;/path/filename.txt&quot;)&gt;</PRE>
<P>

<DT><A NAME="initsyslog"><FONT SIZE="+1">InitSyslog()</FONT></A>
<DD>
<P>
InitSyslog() defines some PHP variables that you need when using
OpenLog() and Syslog().  These variables are not defined by default
for efficiency reasons.  The variables are named in the same way as in
the &lt;syslog.h&gt; C include file (such as $LOG_LOCAL0).  See your
syslog(3) UNIX manual page for more details.  See also <a
href="#initsyslog">InitSyslog()</a>, <a href="#syslog">Syslog()</a>
and <a href="#closelog">CloseLog()</a>.
<P>

<DT><A NAME="intval"><FONT SIZE="+1">intval(variable)</FONT></A>
<DD>
<P>intval returns the long integer value of the variable.  See also
the <A HREF="#strval">strval()</A> and <A HREF="#doubleval">doubleval()</A>
functions.<P>

<DT><A NAME="isset"><FONT SIZE="+1">IsSet(variable)</FONT></A>
<DD>
<P>The IsSet function returns 1 if the given variable is defined,
and 0 if it isn't.<P>

<DT><A NAME="key"><FONT SIZE="+1">Key(variable)</FONT></A>
<DD>
<P>Key returns the key of the current array item.  The current item is
determined by the position of the array pointer for the given variable.
This array pointer may be manipulated with the <A HREF="#reset">Reset()</A>,
<A HREF="#end">End()</A>, <A HREF="#next">Next()</A>, and <A HREF="#prev">Prev()</A>
functions.  This function is mainly used for determining the key value for
an item in an associative array, although it will work for normal array as well.<P>

<DT><A NAME="link"><FONT SIZE="+1">Link(target,link)</FONT></A>
<DD>
<P>Link() creates a hard link.  See the <a href="#symlink">Symlink()</a>
function for creating symbolic links (soft) links.  See also <a href="#readlink">
ReadLink</A> and <A HREF="#LinkInfo">LinkInfo</A> functions.<P>

<DT><A NAME="linkinfo"><FONT SIZE="+1">LinkInfo(path)</FONT></A>
<DD>
<P>LinkInfo returns the st_dev field of the UNIX C 
stat structure returned by the lstat system call.  This
function is used to verify if a link (pointed to by path) really exists 
(using the same method as the S_ISLNK macro defined in stat.h).
Returns -1 in case of error.<P>

<DT><A NAME="log"><FONT SIZE="+1">Log(arg)</FONT></A>
<DD>
<P>Log returns the natural logarithm of arg.<P>

<DT><A NAME="log10"><FONT SIZE="+1">Log10(arg)</FONT></A>
<DD>
<P>Log10 returns the base-10 logarithm of arg.<P>

<DT><A NAME="logas"><FONT SIZE="+1">LogAs(filename)</FONT></A>
<DD>
<P>The LogAs() function will treat the hit on the current page as if it 
as actually received on the argument filename.<P>

<DT><A NAME="mail"><FONT SIZE="+1">Mail(to,subject,message[,headers])</FONT></A>
<DD>
<P>Mail automatically mails the message specified in the message argument
to the receiver specified in the to argument.  Multiple recipients can
be specified by spaces between them in the to argument.<P>
eg. <PRE>   mail(&quot;rasmus@lerdorf.on.ca&quot;, 
        &quot;My Subject&quot;, 
        &quot;Line 1\nLine 2\nLine 3&quot;);</PRE>

If a fourth string argument is passed, this string is inserted at the
end of the header, example: <PRE>
   mail(&quot;ssb@guardian.no&quot;, &quot;the subject&quot;, $message,
        &quot;X-Mailer: PHP/FI &quot; + phpversion());
</PRE>

<DT><A NAME="max"><FONT SIZE="+1">Max(array)</FONT></A>
<DD>
<P>Max returns the maximum value of a PHP array.  ie. it will search through
the entire array looking for the max element.  If it is an array of strings,
the returned string is the string which would be alphabetically last in the
array if it were sorted.<P>

<DT><A NAME="md5"><FONT SIZE="+1">Md5(message)</FONT></A>
<DD>
<P>Md5 returns the MD5 hash of a string value.<P>

<DT><A NAME="mi_close"><FONT SIZE="+1">mi_Close(connection_id)</FONT></A>
<DD>
<P>mi_Close will close down the connection to an Illustra database
associated with the given connection identifier.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_connect"><FONT SIZE="+1">$connection = mi_Connect(database, username, password)</FONT></A>
<DD>
<P>mi_Connect opens a connection to an Illustra database.  Each
of the arguments should be a quoted string.
This function returns a connection_id.  This identifier is needed by other
Illustra functions.  You can have multiple connections open at once.
The host to connect to is governed by the MI_PARAMS file on the machine 
running the PHP executable. No support as yet for remote invocation
This function will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_dbname"><FONT SIZE="+1">mi_DBname(connection_id)</FONT></A>
<DD>
<P>mi_DBname will return the name of the database that the given
Illustra connection identifier is connected to.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_exec"><FONT SIZE="+1">$result = mi_Exec(connection_id, query_string)</FONT></A>
<DD>
<P>mi_Exec will send an SQL statement to the Illustra database specified by
the connection_id.  The connection_id must be a valid identifier
that was returned by mi_Connect.  The return value of this function
is an identifier to be used to access the results from other
Illustra functions.  This function will return <STRONG>-1</STRONG> on error.

<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_fieldname"><FONT SIZE="+1">mi_FieldName(connection_id, result_id, field_number)</FONT></A>
<DD>
<P>mi_FieldName will return the name of the field occupying the
given column number with the given Illustra result and connection identifiers.
Field numbering starts from 0.<P>This function will return <STRONG>-1</STRONG>
on error.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_fieldnum"><FONT SIZE="+1">mi_FieldNum(connection_id, result_id, field_name)</FONT></A>
<DD>
<P>mi_FieldNum will return the number of the column slot that
corresponds to the named field in the given Illustra result identifier.  Field
numbering starts at 0. This function
will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_numfields"><FONT SIZE="+1">mi_NumFields(connection_id, result_id)</FONT></A>
<DD>
<P>mi_NumFields will return the number of fields (columns) in
an Illustra result.  The argument is a valid result identifier returned
by mi_Exec. This function will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_numrows"><FONT SIZE="+1">mi_NumRows(connection_id, result_id)</FONT></A>
<DD>
<P>mi_NumRows will return the number of rows in an Illustra result.  The argument
is a valid result identifier returned by mi_Exec. This function will return
<STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Illustra support has been enabled in PHP.<P>

<DT><A NAME="mi_result"><FONT SIZE="+1">mi_Result(connection_id, result_id, row_number, field name/index)</FONT></A>
<DD>
<P>mi_Result will return values from a result identifier
produced by mi_Exec.  The row_number and field name specify what
cell in the table of results to return. Row numbering starts from
0.  Instead of naming the field, you may use the field index as
an unquoted number.  Field indices start from 0.<P>
<P>
All values returned from the database are in String form, since no type-detection
is available at the present.
<P>
This function is only available if Illustra support has been enabled in PHP.<P>


<DT><A NAME="microtime"><FONT SIZE="+1">Microtime()</FONT></A>
<DD>
<P>Microtime() returns a string "msec sec" where sec is number of seconds
since 00:00 GMT, Jan 1, 1970, and msec is the microseconds part (as fraction of
seconds). Ex "0.87633900 825010464".  <BR>This function is only available on
operating systems that support the gettimeofday() system call.<P>

<DT><A NAME="min"><FONT SIZE="+1">Min(array)</FONT></A>
<DD>
<P>Min returns the minimum value of a PHP array.  ie. it will search through
the entire array looking for the min element.  If it is an array of strings,
the returned string is the string which would be alphabetically first in the
array if it were sorted.<P>

<DT><A NAME="mkdir"><FONT SIZE="+1">MkDir(dir,mode)</FONT></A>
<DD>
<P>MkDir creates a directory.  The <EM>mode</EM> parameter must be
given in <a href="#octal">octal</a> notation.  eg. MkDir("DirName",0755);<P>

<DT><A NAME="mktime"><FONT SIZE="+1">MkTime(hour,min,sec,mon,day,year)</FONT></A>
<DD>
<P>MkTime returns a time in Unix timestamp (long integer) format which
corresponds to the date and time specified by the arguments.  Arguments may be
left out in which case the given component is set to the current value
according to the current local time and date.  These left out arguments may only
be left out from right to left.  ie. <TT>MkTime(hour,min,sec)</TT> is valid,
but <TT>MkTime(mon,day,year)</TT> is not valid.  Note that this function can
be very handy as a tool for doing both date arithmetic and date validation.
You can feed it invalid parameters, such as a month greater than 12, or a day
greater than 31 and it will figure out the right date anyway.  It will also
generate an error message if any of the parameters are outside the normal
values.  Use the <a href="#seterrorreporting">SetErrorReporting(0)</a> 
function to turn this error reporting off before calling the function and you
may then check the $phperrmsg for any errors that may have occurred.<P>
eg.<PRE>        SetErrorReporting(0);
        $a = MkTime(0,0,0,13,1,1997);
        SetErrorReporting(1);
        echo $phperrmsg;</PRE>

<DT><A NAME="msql"><FONT SIZE="+1">$result = msql($database,$query)</FONT></A>
<DD>
<P>msql sends an mSQL query.  Arguments are the database name and the query
string.  ie. <STRONG><TT>&lt;?msql(&quot;MyDatabase&quot; , &quot;select * from
table&quot;)&gt;</TT></STRONG>.
The return value from this function is a result identifier to be used to access the results
from the other msql_ functions.  A result identifier is a positive integer.  The function
returns <STRONG>0</STRONG> when no result identifier is created.  This is the case with
any queries that do not return anything, such as <EM>create</EM>, <EM>update</EM>,
<EM>drop</EM>, <EM>insert</EM> and
<EM>delete</EM>. The function will return <STRONG>-1</STRONG> if an error occurs.  A string
describing the error will be placed in $phperrmsg, and unless the function was called
as <STRONG>@msql()</STRONG> then this error string will also be printed out.
For mSQL 2.0, the $result variable will contain the number of rows affected by
the SQL command performed.  If you want your application to be portable to mSQL 1.0, 
do not rely on this.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_close"><FONT SIZE="+1">msql_close()</FONT></A>
<DD>
<P>msql_Close closes the socket connection to the msql daemon, if an open
connection exists.  Note, since only one concurrent mSQL session can be open
at any one time, this function does not take an argument.<P>

<DT><A NAME="msql_connect"><FONT SIZE="+1">msql_connect($hostname)</FONT></A>
<DD>
<P>msql_Connect specifies the host name or IP on which the mSQL database
engine resides.  This is equivalent to the msqlConnect() function in the mSQL C
API.  The one difference between this function and the C API equivalent is that
if the function isn't called, a connection to the local host is made by default
on the first call to the msql() function.  And, there is no need for an msql_close
function since only one connection may be active at any one time.  If a second call
to msql_connect() is made in a file, then the connection to the first host is
automatically closed.  To explicitly connect to the msql daemon on the local host, use:
<STRONG><TT>&lt;?msql_connect(&quot;localhost&quot;)&gt;</TT></STRONG><BR>This function is only
available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_createdb"><FONT SIZE="+1">msql_CreateDB($database)</FONT></A>
<DD>
<P>msql_CreateDB creates the given database.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_dbname"><FONT SIZE="+1">msql_dbName($result,$i)</FONT></A>
<DD>
<P>msql_dbName returns the database name stored in position <EM>$i</EM> of
the result pointer returned from the <A HREF="#msql_listdbs">msql_ListDbs()</A>
function.  The <A HREF="#msql_numrows">msql_NumRows()</A> function can
be used to determine how many database names are available.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_dropdb"><FONT SIZE="+1">msql_DropDB($database)</FONT></A>
<DD>
<P>msql_DropDB deletes the given mSQL database.  Use this with caution
as all data in the database will be lost.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_fieldflags"><FONT SIZE="+1">msql_FieldFlags($result,$i)</FONT></A>
<DD>
<P>msql_FieldFlags returns the field flags of the specified field.
Currently this is either, "not null", "primary key", a combination
of the two or "" (an empty string).
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_fieldlen"><FONT SIZE="+1">msql_FieldLen($result,$i)</FONT></A>
<DD>
<P>msql_FieldLen returns the length of the specified field.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_fieldname"><FONT SIZE="+1">msql_FieldName($result,$i)</FONT></A>
<DD>
<P>msql_FieldName returns the name of the specified field.  Arguments to the
function is the result identifier and the field index.  ie. <TT>msql_FieldName($result,2);</TT>
will return the name of the second field in the result associated with the result
identifier.  <BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_fieldtype"><FONT SIZE="+1">msql_FieldType($result,$i)</FONT></A>
<DD>
<P>msql_FieldType is similar to the msql_FieldName() function.  The arguments are
identical, but the field type is returned.  This will be one of "int", "char" or "real".
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_freeresult"><FONT SIZE="+1">msql_FreeResult($result)</FONT></A>
<DD>
<P>msql_FreeResult only needs to be called if you are worried about using
too much memory while your script is running.  All result memory will automatically
be freed when the script is finished.  But, if you are sure you are not going to
need the result data anymore in a script, you may call msql_freeresult with the
result identifier as an argument and the associated result memory will be freed.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_listdbs"><FONT SIZE="+1">$result = msql_ListDBs()</FONT></A>
<DD>
<P>msql_ListDBs will return a result pointer containing the databases
available from the current mSQL daemon.  Use the <A HREF="#msql_dbname">
msql_dbName()</A> function to traverse this result pointer.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_listfields"><FONT SIZE="+1">$result = msql_Listfields($database,$tablename)</FONT></A>
<DD>
<P>msql_listfields retrieves information about the the given tablename. 
Arguments are the database name and the table name.
A result pointer is returned which can be used with msql_fieldflags,
msql_fieldlen, msql_fieldname, msql_fieldtype.  A result identifier is a
positive integer.  The function returns -1 if a error occurs. A string 
describing the error will be placed in $phperrmsg, and unless the function 
was called as @msql() then this error string will also be printed out.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_listtables"><FONT SIZE="+1">$result = msql_ListTables($database)</FONT></A>
<DD>
<P>msql_ListTables takes a database name and result pointer much like the
<A HREF="#msql">msql()</A> function.  The <A HREF="#msql_tablename">msql_TableName()</A>
function should be used to extract the actual table names from the result pointer.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_numfields"><FONT SIZE="+1">msql_NumFields($result)</FONT></A>
<DD>
<P>msql_NumFields returns the number of fields in a result.  The argument is
the result identifier returned by the msql() function.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_numrows"><FONT SIZE="+1">msql_NumRows($result)</FONT></A>
<DD>
<P>msql_NumRows simply returns the number of rows in a result.  The argument
is the result identifier returned by the msql() function.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_regcase"><FONT SIZE="+1">msql_RegCase(string)</FONT></A>
<DD>
<P>msql_RegCase takes a string argument and converts it to the regular
expression needed to send to mSQL in order to get a case insensitive
match.  This turns a string like &quot;abc&quot  into &quot;[Aa][Bb][Cc]&quot;.
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_result"><FONT SIZE="+1">msql_Result($result,$i,field)</FONT></A>
<DD>
<P>msql_Result displays a field from a returned record.  Arguments are the result
identifier returned by the msql() function, an integer which is the index of the record
to be viewed and a field name.  The field argument supports the &quot;table.field&quot;
syntax for handling results from a join.  This function is perhaps best illustrated with
a complete example:<P>
<P>
<PRE>
    &lt;?
      $name = &quot;bob&quot;;	
      $result = msql($database,&quot;select * from table where firstname='$name'&quot;);
      $num = msql_numrows($result);
      echo &quot;$num records found!&lt;p&gt;&quot;;
      $i=0;
      while($i<$num);
        echo msql_result($result,$i,&quot;fullname&quot;);
        echo &quot;&lt;br&gt;&quot;;
        echo msql_result($result,$i,&quot;address&quot;);
        echo &quot;&lt;br&gt;&quot;;
        $i++;
      endwhile;
    &gt;</PRE><P>
<P>
The above script connects to the mSQL engine on the local machine, sets the <EM>name</EM>
variable to <EM>bob</EM> and sends a query which asks for all the fields from a
table where the <EM>firstname</EM> field is set to <EM>bob</EM>.  It then displays the
number of records it found after which it loops through each of the found
records and displays the <EM>fullname</EM> and <EM>address</EM> fields for each record.
As you can see, it would be trivial to add HTML markup tags around the printed
fields to format the results in a table or in whatever manner is desired.  Note
that there is no msql_connect() call.  msql_connect need only be called if a connection
to a remote database is desired.<P>
<P>
This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="msql_tablename"><FONT SIZE="+1">msql_TableName($result,$i)</FONT></A>
<DD>
<P>msql_TableName takes a result pointer returned by the <A HREF="#msql_listtables">
msql_ListTables()</A> function as well as an integer index and returns the name of
a table.  The <A HREF="#msql_numrows">msql_NumRows()</A> function may be used to
determine the number of tables in the result pointer.  An example would be:<P>
<P>
<PRE>
    &lt;?
      $result = msql_listtables(&quot;dbname&quot;);
      $i=0;
      while($i <  msql_numrows($result));
        $tb_names[$i]=msql_tablename($result, $i);
        echo $tb_names[$i];
        echo "&lt;BR&gt;";
        $i++;
      endwhile;
    &gt;</PRE>
<BR>This function is only available if mSQL support has been enabled in PHP.<P>

<DT><A NAME="mysql"><FONT SIZE="+1">$result = mysql($database,$query)</FONT></A>
<DD>
<P>mysql sends a mysql query.  Arguments are the database name and the query
string.  ie. <STRONG><TT>&lt;?mysql(&quot;MyDatabase&quot; , &quot;select * from
table&quot;)&gt;</TT></STRONG>.
The return value from this function is a result identifier to be used to access the results
from the other mysql_ functions.  A result identifier is a positive integer.  The function
returns <STRONG>0</STRONG> when no result identifier is created.  This is the case with
any queries that do not return anything, such as <EM>create</EM>, <EM>update</EM>,
<EM>drop</EM>, <EM>insert</EM> and
<EM>delete</EM>. The function will return <STRONG>-1</STRONG> if an error occurs.  A string
describing the error will be placed in $phperrmsg, and unless the function was called
as <STRONG>@mysql()</STRONG> then this error string will also be printed out.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_affected_rows"><FONT SIZE="+1">mysql_affected_rows()</FONT></A>
<DD>
<P>mysql_affected_rows() returns number of rows affected by the last INSERT, UPDATE
or DELETE query.<P>

<DT><A NAME="mysql_close"><FONT SIZE="+1">mysql_close()</FONT></A>
<DD>
<P>mysql_Close closes the socket connection to the mysql daemon, if an open
connection exists.<P>

<DT><A NAME="mysql_connect"><FONT SIZE="+1">mysql_connect($hostname [,username [,password]])</FONT></A>
<DD>
<P>mysql_Connect specifies the host name or IP on which the mysql database
engine resides.  This is equivalent to the mysqlConnect() function in the mysql C
API.  The one difference between this function and the C API equivalent is that
if the function isn't called, a connection to the local host is made by default
on the first call to the mysql() function.  And, there is no need for an mysql_close
function since only one connection may be active at any one time.  If a second call
to mysql_connect() is made in a file, then the connection to the first host is
automatically closed.<P>
An optional username and password may be provided.  Note that when PHP is compiled to run in <a href="#safemode">SAFE MODE</a> then the username must either
be the same as the owner of the file being processed, or the owner of the httpd
process (usually nobody).  Any other username will fail.<P>
To explicitly connect to the mysql daemon on the local host, use:
<STRONG><TT>&lt;?mysql_connect(&quot;localhost&quot;)&gt;</TT></STRONG><BR>This function is only
available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_createdb"><FONT SIZE="+1">mysql_CreateDB($database)</FONT></A>
<DD>
<P>mysql_CreateDB creates the given database.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_dbname"><FONT SIZE="+1">mysql_dbName($result,$i)</FONT></A>
<DD>
<P>mysql_dbName returns the database name stored in position <EM>$i</EM> of
the result pointer returned from the <A HREF="#mysql_listdbs">mysql_ListDbs()</A>
function.  The <A HREF="#mysql_numrows">mysql_NumRows()</A> function can
be used to determine how many database names are available.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_dropdb"><FONT SIZE="+1">mysql_DropDB($database)</FONT></A>
<DD>
<P>mysql_DropDB deletes the given mysql database.  Use this with caution
as all data in the database will be lost.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_fieldflags"><FONT SIZE="+1">mysql_FieldFlags($result,$i)</FONT></A>
<DD>
<P>mysql_FieldFlags returns the field flags of the specified field.
Currently this is either, "not null", "primary key", a combination
of the two or "" (an empty string).
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_fieldlen"><FONT SIZE="+1">mysql_FieldLen($result,$i)</FONT></A>
<DD>
<P>mysql_FieldLen returns the length of the specified field.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_fieldname"><FONT SIZE="+1">mysql_FieldName($result,$i)</FONT></A>
<DD>
<P>mysql_FieldName returns the name of the specified field.  Arguments to the
function is the result identifier and the field index.  ie. <TT>mysql_FieldName($result,2);</TT>
will return the name of the second field in the result associated with the result
identifier.  <BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_fieldtype"><FONT SIZE="+1">mysql_FieldType($result,$i)</FONT></A>
<DD>
<P>mysql_FieldType is similar to the mysql_FieldName() function.  The arguments are
identical, but the field type is returned.  This will be one of "int", "char" or "real".
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_freeresult"><FONT SIZE="+1">mysql_FreeResult($result)</FONT></A>
<DD>
<P>mysql_FreeResult only needs to be called if you are worried about using
too much memory while your script is running.  All result memory will automatically
be freed when the script is finished.  But, if you are sure you are not going to
need the result data anymore in a script, you may call mysql_freeresult with the
result identifier as an argument and the associated result memory will be freed.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_insert_id"><FONT SIZE="+1">mysql_insert_id()</FONT></A>
<DD>
<P>mysql_insert_id() returns the ID generated for an AUTO_INCREMENT field.  This function
takes no arguments.  It will return the auto-generated ID returned by the last INSERT query 
performed.<P>

<DT><A NAME="mysql_listdbs"><FONT SIZE="+1">$result = mysql_ListDBs()</FONT></A>
<DD>
<P>mysql_ListDBs will return a result pointer containing the databases
available from the current mysql daemon.  Use the <A HREF="#mysql_dbname">
mysql_dbName()</A> function to traverse this result pointer.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_listfields"><FONT SIZE="+1">$result = mysql_Listfields($database,$tablename)</FONT></A>
<DD>
<P>mysql_listfields retrieves information about the the given tablename. 
Arguments are the database name and the table name.
A result pointer is returned which can be used with mysql_fieldflags,
mysql_fieldlen, mysql_fieldname, mysql_fieldtype.  A result identifier is a
positive integer.  The function returns -1 if a error occurs. A string 
describing the error will be placed in $phperrmsg, and unless the function 
was called as @mysql() then this error string will also be printed out.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_listtables"><FONT SIZE="+1">$result = mysql_ListTables($database)</FONT></A>
<DD>
<P>mysql_ListTables takes a database name and result pointer much like the
<A HREF="#mysql">mysql()</A> function.  The <A HREF="#mysql_tablename">mysql_TableName()</A>
function should be used to extract the actual table names from the result pointer.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_numfields"><FONT SIZE="+1">mysql_NumFields($result)</FONT></A>
<DD>
<P>mysql_NumFields returns the number of fields in a result.  The argument is
the result identifier returned by the mysql() function.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_numrows"><FONT SIZE="+1">mysql_NumRows($result)</FONT></A>
<DD>
<P>mysql_NumRows simply returns the number of rows in a result.  The argument
is the result identifier returned by the mysql() function.
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_result"><FONT SIZE="+1">mysql_Result($result,$i,field)</FONT></A>
<DD>
<P>mysql_Result displays a field from a returned record.  Arguments are the result
identifier returned by the mysql() function, an integer which is the index of the record
to be viewed and a field name.  The field argument supports the &quot;table.field&quot;
syntax for handling results from a join.  One difference between mSQL 1.0 and mysql is 
that mysql supports functions that can act on the result data.  These functions can 
be applied in this function.  This function is perhaps best illustrated with
a complete example:<P>
<P>
<PRE>
    &lt;?
      $name = &quot;bob&quot;;	
      $result = mysql($database,&quot;select * from table where firstname='$name'&quot;);
      $num = mysql_numrows($result);
      echo &quot;$num records found!&lt;p&gt;&quot;;
      $i=0;
      while($i<$num);
        echo mysql_result($result,$i,&quot;lcase(fullname)&quot;);
        echo &quot;&lt;br&gt;&quot;;
        echo mysql_result($result,$i,&quot;address&quot;);
        echo &quot;&lt;br&gt;&quot;;
        $i++;
      endwhile;
    &gt;</PRE><P>
<P>
The above script connects to the mysql engine on the local machine, sets the <EM>name</EM>
variable to <EM>bob</EM> and sends a query which asks for all the fields from a
table where the <EM>firstname</EM> field is set to <EM>bob</EM>.  It then displays the
number of records it found after which it loops through each of the found
records and displays the <EM>fullname</EM> and <EM>address</EM> fields for each record.
The lcase() call in the result function changes the returned string to lower case.
For a complete set of functions that can be applied to the result data, see your 
mysql documentation.
As you can see, it would be trivial to add HTML markup tags around the printed
fields to format the results in a table or in whatever manner is desired.  Note
that there is no mysql_connect() call.  mysql_connect need only be called if a connection
to a remote database is desired.<P>
<P>
This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="mysql_tablename"><FONT SIZE="+1">mysql_TableName($result,$i)</FONT></A>
<DD>
<P>mysql_TableName takes a result pointer returned by the <A HREF="#mysql_listtables">
mysql_ListTables()</A> function as well as an integer index and returns the name of
a table.  The <A HREF="#mysql_numrows">mysql_NumRows()</A> function may be used to
determine the number of tables in the result pointer.  An example would be:<P>
<P>
<PRE>
    &lt;?
      $result = mysql_listtables(&quot;dbname&quot;);
      $i=0;
      while($i <  mysql_numrows($result));
        $tb_names[$i]=mysql_tablename($result, $i);
        echo $tb_names[$i];
        echo "&lt;BR&gt;";
        $i++;
      endwhile;
    &gt;</PRE>
<BR>This function is only available if mysql support has been enabled in PHP.<P>

<DT><A NAME="next"><FONT SIZE="+1">Next(variable)</FONT></A>
<DD>
<P>Next moves the internal array pointer to the next item in the array.
This happens automatically when an array is accessed using the non-indexed
method ($array[]).  The function returns the value of the new item.
This function can be used to move the pointer forward
without having to access the array explicitly.  One use would be to traverse
an associative array and only printing out the keys of the array and not
the actual contents.<P>
<P>
<PRE>    &lt;?
      Reset($array);
      $i=0;
      while($i &lt; count($array));
        echo key($array);
        next($array);
        $i++;
      endwhile;
    &gt;</PRE><P>

<DT><A NAME="octdec"><FONT SIZE="+1">OctDec(octal_number)</FONT></A>
<DD>
<P>OctDec converts an octal number to a decimal number. See also
<A HREF="#decoct">DecOct()</A>.<P>

<DT><A NAME="opendir"><FONT SIZE="+1">openDir(directory)</FONT></A>
<DD>
<P>openDir opens the specified directory and places an internal
pointer to the beginning of the directory.  Directory entries
are read using the <A HREF="#readdir">readDir</A> function, and an
opened directory should be closed with the <A HREF="#closedir">
closeDir</A> function.<P>

<DT><A NAME="openlog"><FONT SIZE="+1">OpenLog(ident,options,facility)</FONT></A>
<DD>
<P>
OpenLog() initializes the system for further Syslog() calls.  See the
openlog(3) UNIX man page for more details.  See also <a
href="#initsyslog">InitSyslog()</a>, <a href="#syslog">Syslog()</a> and <a
href="#closelog">CloseLog()</a>.
<P>

<DT><A NAME="ora_bind"><FONT SIZE="+1">Ora_Bind(cursor_ind, 
php_variable_name, sql_variable_name, size)</FONT></A><BR>
<DD>Ora_Bind() performs binding of PHP variables with Oracle ones.<BR><BR>
Function parameters are:<BR>
<DT><DD><VAR>cursor_id</VAR> - oracle cursor id for _parsed_ SQL query or PL/SQL block;<BR>
<VAR>php_variable_name</VAR> - variable name in PHP script without leading '$'<BR>
<VAR>sql_variable_name</VAR> - variable name in SQL with leading colon<BR>
<VAR>size</VAR> - maximal number of bytes to be taken into account at binding<BR><BR>
</DT>
<B>Notes:</B> <BR>
1) PHP variable <B>SHOULD</B> be initialised with at least <B>size</B> bytes
length string even it is return-only variable.<BR>
2) Ora_Bind() <B>SHOULD</B> be used after Ora_Parse and before Ora_Exec.
In case of re-parsing the SQL sentence, all used variables have
to be re-bound.<BR><BR>
Ora_Bind() returns 0 upon success, -1 upon failure.<BR>
<P>
There is an example of Ora_Bind() usage:<BR>
<PRE>

        /* This is the PHP variable to be bound */
        $rc  = "12345";

        /* This is the SQL query. */
        $query = "SELECT * FROM my_table where my_index = :indiana";
        
        ........

        if (Ora_Parse($cursor, $query) < 0) {
            echo("Parse failed!\n"
            Ora_Logoff($conn);
            exit;
        } 

        if (Ora_Bind($cursor, "rc", ":indiana", strlen($rc)) < 0) {
            echo("Binding failed!\n"
            Ora_Logoff($conn);
            exit;
        } 

        /* Execute the SQL statement associated with $cursor and
        prepare storage for select-list items. */
        $ncols = Ora_Exec($cursor);
        
        ......

</PRE>
<P>

<DT><A NAME="ora_close"><FONT SIZE="+1">Ora_Close(conn_ind)</FONT></A>
<DD>Ora_Close() closes the Oracle connection identified by
<var>conn_ind</var>.  Returns 0 upon success, -1 upon failure.
<P>

<DT><A NAME="ora_commit"><FONT SIZE="+1">Ora_Commit(conn_ind)</FONT></A>
<DD>Commits the current transaction on <var>conn_ind</var>.  The
current transaction starts from the <A
HREF="#ora_logon">Ora_Logon()</A> call or from the last Ora_Commit()
or <A HREF="#ora_rollback">Ora_Rollback()</A>, and lasts until an
Ora_Commit(), <A HREF="#ora_rollback">Ora_Rollback()</A> or <A
HREF="#ora_logoff">Ora_Logoff()</A> call is issued.  Ora_Commit()
returns -1 (and an error message) upon failure. <P>

<DT><A NAME="ora_commitoff"><FONT SIZE="+1">Ora_CommitOff(conn_ind)</FONT></A>
<DD>Ora_CommitOff() turns off autocommit (automatic commit of every
SQL data manipulation statement) on the Oracle connection
<var>conn_ind</var>. <P>

<DT><A NAME="ora_commiton"><FONT SIZE="+1">Ora_CommitOn(conn_ind)</FONT></A>
<DD>Ora_CommitOff() turns on autocommit (automatic commit of every
SQL data manipulation statement) on the Oracle connection
<var>conn_ind</var>. <P>

<DT><A NAME="ora_exec"><FONT SIZE="+1">Ora_Exec(cursor_ind)</FONT></A>
<DD>Ora_Exec() executes the SQL statement associated with
<var>cursor_ind</var> and prepares storage for select-list items.
The return value is the number of columns for selects, or -1 on
error. <P>

<DT><A NAME="ora_fetch"><FONT SIZE="+1">Ora_Fetch(cursor_ind)</FONT></A>
<DD>Ora_Fetch() retrieves a row from the database.  Returns 1 if a
column was retrieved, 0 if there are no more columns to retrieve or -1
on error. <P>

<DT><A NAME="ora_getcolumn"><FONT SIZE="+1">Ora_GetColumn(cursor_ind,
column)</FONT></A>
<DD>Ora_GetColumn() fetches data for a single column in a returned
row.  <A HREF="ora_fetch">Ora_Fetch()</A> must have been called prior
to Ora_GetColumn().<P>

<DT><A NAME="ora_logoff"><FONT
SIZE="+1">Ora_Logoff(conn_ind)</FONT></A>
<DD>Ora_Logoff() disconnects the logon data area belonging to
<var>conn_ind</var> and frees used Oracle resources. <P>

<DT><A NAME="ora_logoff"><FONT
SIZE="+1">Ora_Logon(userid, password)</FONT></A>
<DD>Ora_Logon() establishes a connection between PHP and an Oracle
database with the given user id and password.  Returns 0 on success
and -1 on failure.
<P>

<DT><A NAME="ora_open"><FONT SIZE="+1">Ora_Open(conn_ind)</FONT></A>
<DD>Ora_Open() opens a cursor in Oracle that maintains state
information about the processing of a SQL statement.  Returns a cursor
index or -1 on error. <P>

<DT><A NAME="ora_parse"><FONT SIZE="+1">Ora_Parse(cursor_ind,
sql_statement [, defer])</FONT></A>
<DD>Ora_Parse() parses a SQL statement or PL/SQL block and associates
it with a cursor.  An optional third argument can be set to 1 to defer
the parse.  Returns 0 on success or -1 on error. <P>

<DT><A NAME="ora_rollback"><FONT
SIZE="+1">Ora_Rollback(cursor_ind)</FONT></A>
<DD>Ora_Rollback() rolls back the current transaction.  See <A
HREF="#ora_commit">Ora_Commit()</A> for a definition of the current
transaction. <P>

<DT><A NAME="ord"><FONT SIZE="+1">Ord(arg)</FONT></A>
<DD>
<P>Ord returns the ASCII value of the first character of arg.<P>

<DT><A NAME="parse_str"><FONT SIZE="+1">Parse_Str(arg)</FONT></A>
<DD>
<P>Parse_str takes a string identical to a regular URL encoded
string and extracts variables and their values.<br>
ex.
<PRE>    &lt;? parse_str("a[]=hello+world&amp;a[]=second+variable");
        echo $a[],"&lt;br&gt;";
        echo $a[],"&lt;br&gt;";
    &gt;

produces

hello world
second variable</PRE>

<DT><A NAME="passthru"><FONT SIZE="+1">PassThru(command_string [,return_var])</FONT></A>
<DD>
<P>The PassThru() function is similar to the <a href="#exec">Exec()</a> function
in that it executes a Unix command.  If the return_var argument is present, the
return status of the Unix command will be placed here.  This command should be used in place of
Exec or System when the output from the Unix command is binary data which needs to
be passed directly back to the browser.  A common use for this is to execute something
like the pbmplus utilities that can output an image stream directly.  By setting
the content-type to <em>image/gif</em> and then calling a pbmplus program to output
a gif, you can create PHP/FI scripts that output images directly.  <P>

<DT><A NAME="pclose"><FONT SIZE="+1">pclose(fp)</FONT></A>
<DD>
<P>Pclose closes a pipe opened using the <A HREF="#popen">popen()</A>
function.<P>


<DT><A NAME="pg_close"><FONT SIZE="+1">pg_Close(connection_id)</FONT></A>
<DD>
<P>pg_Close will close down the connection to a Postgres database
associated with the given connection identifier.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_connect"><FONT SIZE="+1">$connection = pg_Connect(host, port, options, tty,
dbname)</FONT></A>
<DD>
<P>pg_Connect opens a connection to a Postgres database.  Each
of the arguments should be a quoted string, including the port number.
The options and tty arguments are optional and can be empty strings.
This function returns a connection_id.  This identifier is needed by other
Postgres functions.  You can have multiple connections open at once.
This function will return <STRONG>0</STRONG> on error.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_dbname"><FONT SIZE="+1">pg_DBname(connection_id)</FONT></A>
<DD>
<P>pg_DBname will return the name of the database that the given
Postgres connection identifier is connected to.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_errorMessage"><FONT SIZE="+1">pg_ErrorMessage(connection_id)</FONT></A>
<DD>
<P>
If an error occured on the last database action for which a valid connection
exists, this function will return a string containing the error message
generated by the back-end server.
<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_exec"><FONT SIZE="+1">$result = pg_Exec(connection_id, query_string)</FONT></A>
<DD>
<P>pg_Exec will send an SQL statement to the Postgres database specified by
the connection_id.  The connection_id must be a valid identifier
that was returned by pg_Connect.  The return value of this function
is an identifier to be used to access the results from other
Postgres functions.  This function will return <STRONG>0</STRONG> on error.
It will return <STRONG>1</STRONG> when the command executed correctly but
are not expected to returned data (insert or update commands, for
example).  Note that selects which return no data will still return a
valid result greater than 1.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_fieldname"><FONT SIZE="+1">pg_FieldName(result_id, field_number)</FONT></A>
<DD>
<P>pg_FieldName will return the name of the field occupying the
given column number in the given Postgres result identifier.  Field numbering
starts from 0.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_fieldprtlen"><FONT SIZE="+1">pg_FieldPrtLen(result_id, row_number,
field_name)</FONT></A>
<DD>
<P>pg_FieldPrtLen will return the actual printed length (number of
characters) of a specific value in a Postgres result.  Row numbering starts at 0. This function
will return <STRONG>-1</STRONG> on an error.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_fieldnum"><FONT SIZE="+1">pg_FieldNum(result_id, field_name)</FONT></A>
<DD>
<P>pg_FieldNum will return the number of the column slot that
corresponds to the named field in the given Postgres result identifier.  Field
numbering starts at 0. This function
will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_fieldsize"><FONT SIZE="+1">pg_FieldSize(result_id, field_name)</FONT></A>
<DD>
<P>pg_FieldSize will return the internal storage size (in bytes) of
the named field in the given Postgres result.  A field size of 0 indicates
a variable length field. This function
will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_fieldtype"><FONT SIZE="+1">pg_FieldType(result_id, field_number)</FONT></A>
<DD>
<P>pg_FieldType will return a string containing the type name of
the given field in the given Postgres result identifier.  Field numbering starts at 0.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_freeresult"><FONT SIZE="+1">pg_FreeResult(result_id)</FONT></A>
<DD>
<P>pg_FreeResult only needs to be called if you are worried about using
too much memory while your script is running. All result memory will
automatically be freed when the script is finished. But, if you are
sure you are not going to need the result data anymore in a script,
you may call pg_freeresult with the result identifier as an
argument and the associated result memory will be freed.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_getlastoid"><FONT SIZE="+1">pg_GetLastOid()</FONT></A>
<DD>
<P>pg_GetLastOid can be used to retrieve the Oid assigned to an
inserted tuple if the last command sent via pg_Exec was an
SQL Insert.  This function will return a positive integer if
there was a valid Oid.  It will return <STRONG>-1</STRONG> if an error
occured or the last command sent via pg_Exec was not an Insert.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_host"><FONT SIZE="+1">pg_Host(connection_id)</FONT></A>
<DD>
<P>pg_Host will return the host name the the given Postgres
connection identifier is connected to.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_numfields"><FONT SIZE="+1">pg_NumFields(result_id)</FONT></A>
<DD>
<P>pg_NumFields will return the number of fields (columns) in
a Postgres result.  The argument is a valid result identifier returned
by pg_Exec. This function
will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_numrows"><FONT SIZE="+1">pg_NumRows(result_id)</FONT></A>
<DD>
<P>pg_NumRows will return the number of rows in a Postgres result.  The argument
is a valid result identifier returned by pg_Exec. This function
will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_options"><FONT SIZE="+1">pg_Options(connection_id)</FONT></A>
<DD>
<P>pg_Options will return a string containing the options specified
on the given Postgres connection identifier.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_port"><FONT SIZE="+1">pg_Port(connection_id)</FONT></A>
<DD>
<P>pg_Port will return the port number that the given Postgres
connection identifier is connected to.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_result"><FONT SIZE="+1">pg_Result(result_id, row_number, field name/index)</FONT></A>
<DD>
<P>pg_Result will return values from a result identifier
produced by pg_Exec.  The row_number and field name specify what
cell in the table of results to return. Row numbering starts from
0.  Instead of naming the field, you may use the field index as
an unquoted number.  Field indices start from 0.<P>
<P>
Postgres has many built in types and only the basic ones are
directly supported here.  All forms of integer, boolean and oid
types are returned as integer values.  All forms of float, and real
types are returned as double values.  All other types, including
arrays are returned as strings formatted in the same default Postgres
manner that you would see in the 'monitor' or 'psql' programs.<P>
<P>
Support for returning PHP arrays of numerical and string data
from a Postgres result is planned for a later date.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="pg_tty"><FONT SIZE="+1">pg_tty(connection_id)</FONT></A>
<DD>
<P>pg_tty will return the tty name that server side debugging output
is sent to on the given Postgres connection identifier.<P>
<P>
This function is only available if Postgres support has been enabled in PHP.<P>

<DT><A NAME="phpinfo"><FONT SIZE="+1">phpInfo()</FONT></A>
<DD>
<P>phpInfo prints the same page you get when adding &quot;?info&quot;
to a PHP/FI parsed URL or when you run the php.cgi binary by itself.  It
is especially useful for debugging scripts in the Apache module version since
it displays a number of useful internal data.<P>

<DT><A NAME="phpversion"><FONT SIZE="+1">phpVersion()</FONT></A>
<DD>
<P>phpVersion returns the version number of PHP/FI currently running.<P>

<DT><A NAME="popen"><FONT SIZE="+1">fp = popen(command,mode)</FONT></A>
<DD>
<P>Popen opens a pipe to a command and returns a file pointer index.
This file pointer index can be used by
<A HREF="#fgets">fgets</A>, <A HREF="#fputs">fputs</A> and
<A HREF="#fclose">fclose</A>.  Arguments are the command to run and
the mode.  The mode can be either &quot;r&quot; for read or &quot;w&quot;
for write.  See the UNIX C library popen man page for more details.
Any file opened with popen() should be closed using the 
<A HREF="#pclose">pclose()</A> function.<P>

<DT><A NAME="pos"><FONT SIZE="+1">pos(var)</FONT></A>
<DD>
<P>The Pos() function returns the numerical position of an array element within
that array.  This is not very useful for normal arrays, but for associative 
arrays it can be handy.</P>

<DT><A NAME="pow"><FONT SIZE="+1">pow(x,y)</FONT></A>
<DD>
<P>Evaluates x raised to the power of y.  See also <a href="#exp">Exp()</a><P>

<DT><A NAME="prev"><FONT SIZE="+1">Prev(variable)</FONT></A>
<DD>
<P>Prev moves the internal array pointer for the given variable to the
previous item in the array.  If already at the beginning of the list,
the pointer will point to the first item.  The function returns the value
of the new item.  This function is useful for
traversing an associative array in reverse order.  See the example
in the <A HREF="#end">End()</A> definition.  Also see <A HREF="#next">Next()</A>.<P>

<DT><A NAME="putenv"><FONT SIZE="+1">PutEnv(string)</FONT></A>
<DD>
<P>PutEnv puts the given string in the environment.  Not extremely useful
since the local environment variables are wiped out when PHP is done with
a page, but in some cases it is useful if other things called from within
a PHP script checks environment variables.  For example, if you want to
run multiple mSQL daemon processes, you will need to use PutEnv to switch
back and forth between the different sockets.<P>

<DT><A NAME="quotemeta"><FONT SIZE="+1">QuoteMeta(arg)</FONT></A>
<DD>
<P>QuoteMeta returns a string composed of arg with any regular expression
special characters escaped with a backslash.<P>

<DT><A NAME="rand"><FONT SIZE="+1">Rand()</FONT></A>
<DD>
<P>Rand returns a random number between 0 and RANDMAX.  <B>Remember</B> to
seed your random number generator with a call to <a href="#srand">srand()</a> 
before calling rand().  You only need to seed the random number generator
once.  RANDMAX can be determined with the <A HREF="#getrandmax">getRandMax</A>
function.  Normally a specific range is chosen by simply using the modulus 
operator on the result.<P>

<DT><A NAME="readdir"><FONT SIZE="+1">readDir()</FONT></A>
<DD>
<P>readDir reads the next entry from the currently open
directory structure.  Once an entry is read, the pointer is
advanced to the next entry in the directory and the
next call to this function will return the next entry in the
directory.  Use the <A HREF="#opendir">openDir</A>
function to open a directory before calling this function.<P>

<DT><A NAME="readfile"><FONT SIZE="+1">ReadFile(filename)</FONT></A>
<DD>
<P>$size = ReadFile(Filename) - Reads the file filename and simply outputs
it directly.  It returns the number of bytes actually read.  It is different
from the File() command in that it does not store the file in memory, and it is
safe for use on binary files.  This function is generally used where one might
otherwise do a PassThru("cat filename").  Using ReadFile is more efficient.<P>

<DT><A NAME="readlink"><FONT SIZE="+1">ReadLink(path)</FONT></A>
<DD>ReadLink does the same as the readlink C function
and returns the contents of the symbolic link path or -1
in case of error.  See also <A HREF="#linkinfo">LinkInfo</A>.<P>

<DT><A NAME="reg_match"><FONT SIZE="+1">reg_Match(expr,arg[,regs])</FONT></A>
<DD>
<P><b>This function has been replaced by the <a href="#ereg">ereg()</a>
function.  It is however still available for backwards compatibility.</b><br>
reg_Match returns non-zero if the regular expression is matched
in the argument string.  For example, the condition, <TT>&lt;?if (reg_match(&quot;^This.*&quot;,
&quot;This is an example string&quot;)&gt;</TT> would be true since the &quot;^This.*&quot;
expression says to match the word <STRONG>This</STRONG> at the beginning of the string and then
match any characters afterwards.  If the <EM>regs</EM> argument is present, then match
registers are filled into positions 0-10 in the array named by the <EM>regs</EM>
argument.  Register 0 will always contain the full matched string.  
For more information on regular expressions, see
the <A HREF="#regexp">regular expression section</A> of this document.<P>

<DT><A NAME="reg_replace"><FONT SIZE="+1">reg_replace(expr,replace,arg)</FONT></A>
<DD>
<P><b>This function has been replaced by the <a href="#ereg_replace">ereg_replace()</a>
function.  It is however still available for backwards compatibility.</b><br>
reg_Replace scans the entire argument string and replaces any portions
of the string matched by the given expression with the replacement string.  For
example, in the string, <TT>&quot;This is an example string&quot;</TT> we could
very easily replace every space with a dash with the command:
<STRONG>reg_replace(" ","-","This is an example string")</STRONG>.For more information on regular
expressions, see the <A HREF="#regexp">regular expression section</A>
of this document.<P>

<DT><A NAME="reg_search"><FONT SIZE="+1">reg_Search(expr,arg[,regs])</FONT></A>
<DD>
<P><b>This function has been replaced by the <a href="#ereg">ereg()</a>
function.  It is however still available for backwards compatibility.</b><br>
reg_Search will scan the entire argument string for any matches to
the given regular expression.  If a match is found, it will return the portion
of the string starting at where the match occurred.  If no match is found a
zero-length string is returned.  If the <EM>regs</EM> argument is present, then match
registers are filled into positions 0-10 in the array named by the <EM>regs</EM>
argument.  Register 0 will always be assigned the full matched string.
For more information on regular expressions, see
the <A HREF="#regexp">regular expression section</A> of this document.<P>

<DT><A NAME="rename"><FONT SIZE="+1">Rename(old,new)</FONT></A>
<DD>
<P>Rename filename old to new.  Similar to the Unix C
rename() function.<P>

<DT><A NAME="reset"><FONT SIZE="+1">Reset(variable)</FONT></A>
<DD>
<P>Reset moves the internal array pointer for the given array variable to
the first item of the array and returns the value of this item.
This is useful for traversing associative
and non-indexed arrays.  See also <A HREF="#end">End()</A> and <A HREF="#next">Next()</A>.
The following example traverses an associative array:<P>
<P>
<PRE>    &lt;?
      Reset($array);
      $i=0;
      while($i &lt; count($array));
        echo $array[]; /* pointer automatically moves ahead one */
        $i++;
      endwhile;
    &gt;</PRE><P>

<DT><A NAME="return"><FONT SIZE="+1">return(value)</FONT></A>
<DD>
<P>Return exits the current function call and returns the specified value
back to the caller.  See the section on <A HREF="#user_funcs">User-Defined Functions</A>
for more information.<P>

<DT><A NAME="rewind"><FONT SIZE="+1">rewind($fd)</FONT></A>
<DD>
<P>rewind() resets a file pointer identified by the
$fd argument which is the return value of the <A HREF="#fopen">fopen()</A>
call.  The file pointer is positioned at the beginning of the file.
See also <A HREF="#ftell">ftell()</A> and <A HREF="#fseek">fseek()</A>.<P>

<DT><A NAME="rewinddir"><FONT SIZE="+1">rewindDir()</FONT></A>
<DD>
<P>rewindDir moves the current directory pointer back to the
beginning of the directory.  Use the <A HREF="#opendir">openDir</A>
function to open a directory before calling this function.<P>

<DT><A NAME="rmdir"><FONT SIZE="+1">RmDir(dir)</FONT></A>
<DD>
<P>RmDir() removes the given directory.  See the <a href="#unlink">Unlink()</a>
function for removing regular files.<P>

<DT><A NAME="setcookie"><FONT SIZE="+1">SetCookie(name,value,expire,path,domain,secure)</FONT></A>
<DD>
<P>SetCookie() defines a cookie to be sent along with the rest of the header information.
All the arguments except the name argument are optional.  If only the name argument is
present, the cookie by that name will be deleted from the remote client.  You may also
replace any argument with an empty string (<b>&quot;&quot;</b>) in order to skip that
argument.  The expire and secure arguments are integers and cannot be skipped with an empty
string.  Use a zero (<b>0</b>) instead.  The expire argument is a regular Unix time integer
as returned by the <a href="#time">time()</a> or 
<a href="#mktime">mktime()</a> functions.  Some examples follow:<P>
<PRE>    SetCookie("TestCookie","Test Value");
    SetCookie("TestCookie",$value,time()+3600);  /* expire in 1 hour */
    SetCookie("TestCookie",$value,time()+3600,"/~rasmus/",".utoronto.ca",1);</PRE>
<P>Note that the value portion of the cookie will automatically be urlencoded when
you send the cookie, and when it is received, it is automatically decoded and assigned
to a variable by the same name as the cookie name.  ie. to see the contents 
of our test cookie in a script, simply do:<P>
<PRE>    echo $TestCookie;</PRE>

<DT><A NAME="seterrorreporting"><FONT SIZE="+1">SetErrorReporting(arg)</FONT></A>
<DD>
<P>SetErrorReporting sets the current error reporting state to the
value of <EM>arg</EM>.  If non-zero, errors will be printed, and if 0
they won't be.  The function returns the previous error reporting state.
This is a more general way of disabling error
reporting than by preceding individual functions with a '@' character.
See the section on
<A HREF="#quiet">Suppressing Errors from function calls</A> for more
information.<P>

<DT><A NAME="setlogging"><FONT SIZE="+1">SetLogging(arg)</FONT></A>
<DD>
<P>SetLogging() either enables or disables the logging of access
statistics for a page.  If <EM>arg</EM> is
non-zero, logging will be enabled, if zero, disabled.<P>

<DT><A NAME="setshowinfo"><FONT SIZE="+1">SetShowInfo(arg)</FONT></A>
<DD>
<P>SetShowInfo() either enables or disables the information footer
at the bottom of all pages loaded through PHP.  If <EM>arg</EM> is
non-zero, the footers will be enabled, if zero, disabled.<P>

<DT><A NAME="settype"><FONT SIZE="+1">SetType(variable,type)</FONT></A>
<DD>
<P>SetType sets the type of a variable.  The type argument
is one of, &quot;integer&quot;, &quot;double&quot; or &quot;string&quot;.
See also the <A HREF="#gettype">GetType()</A> function.<P>

<DT><A NAME="shl"><FONT SIZE="+1">shl(n,b)</FONT></A>
<DD>
<P>Shift the value <b>n</b> left <b>b</b> bits.<P>

<DT><A NAME="shr"><FONT SIZE="+1">shr(n,b)</FONT></A>
<DD>
<P>Shift the value <b>n</b> right <b>b</b> bits.<P>

<DT><A NAME="sin"><FONT SIZE="+1">Sin(arg)</FONT></A>
<DD>
<P>Sin returns the sine of arg in radians.  See also <A HREF="#cos">Cos()</A>
and <A HREF="#tan">Tan()</A><P>

<DT><A NAME="sleep"><FONT SIZE="+1">Sleep(secs)</FONT></A>
<DD>
<P>Sleep will delay for secs seconds.  Similar to the Unix C sleep()
function.  See also the <A HREF="#usleep">USleep()</A> function.<P>

<DT><A NAME="solid_close"><FONT SIZE="+1">Solid_Close(connection_id)</FONT></A>
<DD>
<P>Solid_Close will close down the connection to the Solid server associated
with the given connection identifier.<P>
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_connect"><FONT SIZE="+1">$connection = Solid_Connect(data source name, username, password)</FONT>
<DD>
<P>Solid_Connect opens a connection to a Solid server. Each of the arguments
should be a quoted string. The first parameter (data source name) can be an
empty string, resulting in a connection to the default server on the localhost.
This function returns a connection_id. This identifier is needed by other
Solid functions. You can have multiple connections open at once. This function
will return <STRONG>0</STRONG> on error.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_exec"><FONT SIZE="+1">$result = Solid_Exec(connection_id, query_string)</FONT>
<DD>
<P>Solid_Exec will send an SQL statement to the Solid server specified by
the connection_id. The connection_id must be a valid identifier
that was returned by Solid_Connect. The return value of this function
is an identifier to be used to access the results by other Solid functions.
This function will return <STRONG>0</STRONG> on error. It will return
<STRONG>1</STRONG> when the command executed correctly but are not expected to
returned data (insert or update commands, for example). Note that selects which
return no data will still return a valid result greater than 1.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_fetchrow"><FONT SIZE="+1">Solid_FetchRow(result_id)</FONT>
<DD>
<P>Solid_FetchRow fetches a row of the data that was returned by Solid_Exec.
After Solid_FetchRow is called, the fields of that row can be access with
Solid_Result. Every time Solid_FetchRow is called a new row can be accessed by
Solid_Result. If Solid_FetchRow was succesful (there was a new row),
<STRONG>1</STRONG> is returned, if there are no more rows, Solid_FetchRow will
return <STRONG>0</STRONG>. The return value of Solid_FetchRow can be used as
the condition of a while loop.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_fieldname"><FONT SIZE="+1">Solid_FieldName(result_id, field_number)</FONT>
<DD>
<P>Solid_FieldName will return the name of the field occupying the given column
number in the given Solid result identifier. Field numbering starts from 0.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_fieldnum"><FONT SIZE="+1">Solid_FieldNum(result_id, field_name)</FONT>
<DD>
<P>Solid_FieldNum will return the number of the column slot that corresponds to
the named field in the given Solid result identifier. Field numbering starts at
0. This function will return <STRONG>-1</STRONG> on error.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_freeresult"><FONT SIZE="+1">Solid_FreeResult(result_id)</FONT>
<DD>
<P>Solid_FreeResult only needs to be called if you are worried about using too
much memory while your script is running. All result memory will automatically
be freed when the script is finished. But, if you are sure you are not going to
need the result data anymore in a script, you may call Solid_FreeResult with
the result identifier as an argument and the associated result memory will be
freed.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_numfields"><FONT SIZE="+1">Solid_NumFields(result_id)</FONT>
<DD>
<P>Solid_NumFields will return the number of fields (columns) in a Solid
result. The argument is a valid result identifier returned by Solid_Exec.
This function will return <STRONG>-1</STRONG> on error.<P>
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_numrows"><FONT SIZE="+1">Solid_NumRows(result_id)</FONT>
<DD>
<P>Solid_NumRows will return the number of rows in a Solid result. The argument
is a valid result identifier returned by Solid_Exec. This function will return
<STRONG>-1</STRONG> on error.  <B>Large Caveat:</B> 
The SOLID SQL server uses ODBC as it's primary (and only) interface.
SolidNumRows() uses SQLRowCount at the low-level to get the number of
rows.  SQLRowCount follows the age-old Microsoft
tradition of unnecessary limitations, strange exceptions and other odd things.
This means that the function will only return the number of rows affected
by an INSERT, UPDATE or a DELETE clause.  No SELECT!  As a workaround you can 
try the count() statement of SQL or a while-loop that counts the number 
of rows.  If you need Solid_NumRows() to figure out how many records to
read after a SELECT clause, try checking the return value from 
<a href="#solid_fetchrow">Solid_FetchRow()</a> instead.  So instead of:<P>
<PRE>     $num = Solid_NumRows();
    $i=0;
    while ($i < $num) {
        /* print results... */
        $i++;
    }</PRE><P>
you might try:<P>
<PRE>    while(Solid_FetchRow($result)) {
        /* print results... */
    }</PRE>
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="solid_result"><FONT SIZE="+1">Solid_Result(result_id, field name/index)</FONT>
<DD>
<P>Solid_Result will return values from a result identifier produced by
Solid_Exec. The field name specify what cell in the row to return. Instead of
naming the field, you may use the field index as an unquoted number. Field
indices start from 0.
<P>
This function is only available if Solid support has been enabled in PHP.<P>

<DT><A NAME="sort"><FONT SIZE="+1">Sort(array)</FONT></A>
<DD>
<P>Sort is used to sort a PHP array in ascending order.  To sort in descending order, use
the RSort() function.  It understands
the three variable types and will sort alphabetically if the array
contains strings, and numerically if the array contains numbers.  In
the case of an array which contains a mixture of types, the first type
in the array will specify the sort method.  Note that if you are going to
sort an associative array, you should use the <a href="#asort">ASort()</a>
function.<P>
     
<DT><A NAME="soundex"><FONT SIZE="+1">Soundex(string)</FONT></A>
<DD>
<P>This function takes a string argument and returns the soundex key
   for the string.  Soundex keys have the property that words
   pronounced similarly produce the same soundex key, and can thus
   be used to simplify searches in databases where you know the
   pronunciation but not the spelling.  This soundex function returns
   a string 4 characters long, starting with a letter.<BR>
   This particular soundex function is one described by Donald Knuth
   in "The Art Of Computer Programming, vol. 3: Sorting And
   Searching",  Addison-Wesley (1973), pp. 391-392.
   <BR>
   Example:
   <PRE>
   Euler and Ellery map to E460
   Gauss and Ghosh map to G200
   Hilbert and Heilbronn map to H416
   Knuth and Kant map to K530
   Lloyd and Ladd map to L300
   Lukasiewicz and Lissajous map to L222
     </PRE>
     <P>

<DT><A NAME="sprintf"><FONT SIZE="+1">Sprintf(format,arg [,arg,arg,arg,arg])</FONT></A>
<DD>
<P>Sprintf returns the string created by the formatted output defined
by the format argument and arg.  It is similar to the formatted version
of the <A HREF="#echo">echo</A> command, except this just returns the
string while echo displays it.  It is also similar to the C function
by the same name.  The difference being that this version does not
accept more than 5 <EM>arg</EM> arguments.  If you need to format more than
5 arguments into a single string, simply call sprintf() multiple times
for each group of arguments.  Note that the type of the argument doesn't 
affect the output.  The argument type is automagically converted to match the
type specified in the format string.<P>

<DT><A NAME="sqrt"><FONT SIZE="+1">Sqrt(arg)</FONT></A>
<DD>
<P>Sqrt returns the square root of arg.<P>

<DT><A NAME="srand"><FONT SIZE="+1">Srand(integer)</FONT></A>
<DD>
<P>Srand seeds the random number generator.  This function takes
any integer as an argument.  One choice for a seed value is to use the 
<STRONG>date</STRONG> function to give you the current number of seconds 
past the minute.  Note that this function <B>does not return a value</B>!  
This function simply seeds the random number generator for subsequent calls 
to the <A HREF="#rand">rand()</A> function.  eg.<P>
<PRE>	&lt;?srand(date(&quot;s&quot))&gt;</PRE><P>

<DT><A NAME="strchr"><FONT SIZE="+1">strchr(string,arg)</FONT></A>
<DD>
<P>strchr and <A HREF="#strstr">strstr</A> are actually identical functions.  They
can be used interchangeably and both are included for completeness sake.
They will return the portion of the string argument starting at the point
where the given sub-string is found.  For example, in the string,
&quot;This is an example string&quot; above, the call:
<TT>&lt;?echo strchr($string,&quot;an &quot;)&gt;</TT> would
return the string: <TT>&quot;an example string&quot;</TT>.<P>

<DT><A NAME="strtr"><FONT SIZE="+1">strtr(input,set1,set2)</FONT></A>
<DD>strtr() translates each character of &quot;string&quot; that is in 
&quot;set1&quot; to the corresponding character in &quot;set2&quot;.  
Characters not in set1 are passed through unchanged.  When a character 
appears more than once in &quot;set1&quot;  and the  corresponding 
characters  in  &quot;set2&quot;  are  not  all  the same, only
the final one is used. When one of &quot;set1&quot; or &quot;set2&quot; 
is longer, longer &quot;set?&quot; is truncated to length of shorter 
&quot;set?&quot;.<P>

<DT><A NAME="stripslashes"><FONT SIZE="+1">StripSlashes(arg)</FONT></A>
<DD>
<P>StripSlashes unescapes the string argument.  See also
<a href="#addslashes">AddSlashes()</a>.<P>

<DT><A NAME="strlen"><FONT SIZE="+1">strlen(string)</FONT></A>
<DD>
<P>strlen returns the length of the string.<P>

<DT><A NAME="strrchr"><FONT SIZE="+1">strrchr(string,arg)</FONT></A>
<DD>
<P>strrchr will search for a single character starting at the end of the
argument string and working its way backwards.  It returns the string
starting with the search character if the character was found and an
empty string if it wasn't.<P>

<DT><A NAME="strstr"><FONT SIZE="+1">strstr(string,arg)</FONT></A>
<DD>
<P>strstr and <A HREF="#strchr">strchr</A> are actually identical functions.  They
can be used interchangeably and both are included for completeness sake.
They will return the portion of the string argument starting at the point
where the given sub-string is found.  For example, in the string,
&quot;This is an example string&quot; above, the call:
<TT>&lt;?echo strstr($string,&quot;an &quot;)&gt;</TT> would
return the string: <TT>&quot;an example string&quot;</TT>.<P>

<DT><A NAME="strtok"><FONT SIZE="+1">strtok(string,arg)</FONT></A>
<DD>
<P>strtok is used to tokenize a string.  That is, if you have a string like
<STRONG>&quot;This is an example string&quot;</STRONG> you could tokenize this string into
its individual words by using the space character as the token.  You would use
the following script code:
<P>
<PRE>	&lt;?
	  $string = &quot;This is an example string&quot;;
	  $tok = strtok($string,&quot; &quot;);
	  while($tok);
		  echo "Word=$tok&lt;br&gt;";
		  $tok = strtok(&quot; &quot;);
	  endwhile;
	&gt;</PRE><P>
<P>
Note that only the first call to strtok uses the string argument.  Every
subsequent call to strtok only needs the token to use, as it keeps track of where
it is in the current string.  To start over, or to tokenize a new string you
simply call strtok with the string argument again to initialize it.  Note
that you may put multiple tokens in the <i>arg</i> parameter.  The string
will be tokenized when any one of the characters in the argument are found.<P>	

<DT><A NAME="strtolower"><FONT SIZE="+1">strtolower(string)</FONT></A>
<DD>
<P>strtolower converts the string argument to all lower case characters.<P>

<DT><A NAME="strtoupper"><FONT SIZE="+1">strtoupper(string)</FONT></A>
<DD>
<P>strtoupper converts the string argument to all upper case characters.<P>

<DT><A NAME="strval"><FONT SIZE="+1">strval(variable)</FONT></A>
<DD>
<P>strval returns the string value of the variable.  See also
the <A HREF="#intval">intval()</A> and <A HREF="#doubleval">doubleval()</A>
functions.<P>

<DT><A NAME="substr"><FONT SIZE="+1">substr(string, start, length)</FONT></A>
<DD>
<P>substr returns a part of the given string.  The start position is given
by the start argument.  The first position in a string is position 0.  And the
length argument specifies the number of characters to return from the start
position.<P>

<DT><A NAME="sybsql_checkconnect"><FONT SIZE="+1">sybSQL_CheckConnect()</FONT></A>
<DD><P>This function returns 1 if the connection to the database has been established and 0 otherwise.<P>

<DT><A NAME="sybsql_dbuse"><FONT SIZE="+1">sybSQL_DBuse(database)</FONT></A>
<DD><P>This function issues a Sybase Transact-SQL <b>use</b> command for the 
specified database. The only argument to the function is the name of the
database to use. Example: <code>sybsql_dbuse("pubs2");</code>
<P>
The function returns 1 on success and 0 on failure.<P>


<DT><A NAME="sybsql_connect"><FONT SIZE="+1">sybSQL_Connect()</FONT></A>
<DD>
<P>This function opens a network connection to the sybase server. This
function depends on several environment variables which must be set by
the caller before calling this function. 
<P>
The environment variables are:
<P>
<b>DSQUERY</b> - the alias of the sybase server as defined in the sybase
interface file.
<br>
<b>DBUSER</b> - connect to the sybase server as this user.
<br>
<b>DBPW</b> - password of the user.
<P>
These variables can be set in several ways. If php/fi is running as a CGI
program, then a shell wrapper can be used to set these variables or you can
set these variables directly in the HTML page using the builtin PHP/FI
function <b><a href="#putenv">putenv()</a></b>. 
Instead of using the values directly in
<b><a href="#putenv">putenv()</a></b>, the values can be obtained from form 
input. The variables can be defined in a file and included in the html files 
with PHP/FI 
<code><a href="#include">include</a></code> statement.
<p>
The function returns 1 on success and 0 on failure.<P>

<DT><A NAME="sybsql_fieldname"><FONT SIZE="+1">sybSQL_Exit()</FONT></A>
<DD><P>
This function forces a Sybase connection to be shut down.  If not called, the 
connection will automatically be closed when the PHP page has been fully parsed, 
so calling this function is optional.<P>

<DT><A NAME="sybsql_fieldname"><FONT SIZE="+1">sybSQL_Fieldname(index)</FONT></A>
<DD><P>
This function returns the field name of a regular result column. The argument
to the function is the field index. Example: <code>sybsql_fieldname(0);</code>.
NOTE: the field index starts at 0.
<P>
If the the result column does not have any name, the function returns an
empty string ("").<P>

<DT><A NAME="sybsql_getfield"><FONT SIZE="+1">sybSQL_GetField(field)</FONT></A>
<DD><P>
This function gets the value of a specific column of the current result
row. The only argument to the function is the string specifying the field.
Example: <code>$value=sybsql_getfield("@10");</code> 
<b>NOTE</b>: <a href="#sybsql_nextrow">sybsql_nextrow()</a> must be called 
before calling this function.  sybsql_nextrow() must be called if the row 
pointer needs to be incremented, because this function only reads the current 
row in the row buffer.
<P>
If the specified column has a value, the function returns the value as a
string otherwise the function returns an empty string ("").<P>

<DT><A NAME="sybsql_isrow"><FONT SIZE="+1">sybSQL_IsRow()</FONT></A>
<DD><P>
This function indicates if the current SQL command returned any rows.<P>
The function returns 1 if the SQL command returned any rows and 0 if the
command didn't return any rows.<P>

<DT><A NAME="sybsql_nextrow"><FONT SIZE="+1">sybSQL_NextRow()</FONT></A>
<DD><P>
This function increments the row pointer to the next result row.<P>
The function returns 1 as long as there are rows left to read. If there are
no more rows left to read or in case of error the function returns 0.<P>

<DT><A NAME="sybsql_numfields"><FONT SIZE="+1">sybSQL_NumFields()</FONT></A>
<DD><P>
This function returns the number of fields in a current result row.<P>
The function returns the number of rows in the current result row. If there are
no fields, the function returns 0.<P>

<DT><A NAME="sybsql_numrows"><FONT SIZE="+1">sybSQL_NumRows()</FONT></A>
<DD><P>
This function returns the number of rows in the current result buffer.
<b>NOTE:</b> 
when this function is called, it will seek to the first row right
away, then it will call dbnextrow() until there are no more rows and
increment a internal counter to calculate the number of rows in the
result buffer. Then it points back to the very first row. Therefore,
after calling this function row counter always points to the very
first row. It's ugly but I don't know any other way at this time.
<p>
If there are no rows in the result buffer, the function will return 0.<P>

<DT><A NAME="sybsql_query"><FONT SIZE="+1">sybSQL_Query()</FONT></A>
<DD><P>
This function submits a Sybase SQL query request to the server.
The only argument to the function is the query string.
Example:
<code>$rc=sybsql_query("select * from authors");</code><P>
The function returns 1, if the query is passed successfully and returns 0
if the request fails.<P>

<DT><A NAME="sybsql_result"><FONT SIZE="+1">sybSQL_Result(string)</FONT></A>
<DD><P>
This function prints specific fields of the current result row. The only
argument to the function is a string which holds information about the
fields to be printed. A field is specified with a @ followed by a number.
For example, @0 means first row, @10 means 11th row. Note that the field
number starts at 0. The function is perhaps best illustrated with a
complete example:<P>
<pre>&lt;?
    /*
    ** assuming all the necessary variables for 
    ** connection is already set. please note, NO error checking is
    ** done. You should always check return code of a function.
    */

    /* connect */
    $rc=sybsql_connect();

    /* use the pub2 database */
    $rc=sybsql_dbuse(&quot;pubs2&quot;);

    /* send the SQL request */
    $rc=sybsql_query(&quot;select * from authors&quot;);
    $i=0;

    /* find the no of rows returned */
    $nrows=sybsql_numrows();

    /* start table */
    echo &quot;&lt;table border&gt;\n&quot;;
    /*
    ** print only first and 2nd field
    */
    while($i&lt;$nrows) {
        sybsql_result(&quot;&lt;tr&gt;&lt;td&gt;@0&lt;/td&gt;@1&lt;/td&gt;&lt;/tr&gt;\n&quot;);
        $i++;
    }
    /* end table */
    echo &quot;&lt;/table&gt;\n&quot;;
&gt;</pre><P>
The above example uses HTML table to format the output. Of course, any
other valid HTML tags can be used.<P>

<DT><A NAME="sybsql_result_all"><FONT SIZE="+1">sybSQL_Result_All()</FONT></A>
<DD><P>
This function prints all rows in the current result buffer. The result is
printed in a hard coded HTML table format. Note that this function
should not be called inside a loop. The function will print the name of
the columns if there are any column headings in the output.<P>

<DT><A NAME="sybsql_seek"><FONT SIZE="+1">sybSQL_Seek(row)</FONT></A>
<DD><P>
This function sets the requested row number as the current row in the row
buffer. The only argument to the function is the row number. Example:
<code>$rc=sybsql_seek(10);</code> Note, row number starts at 0.<P>
The function returns 1 if the seek succeeds and 0 if the seek fails. When 
all of the rows in the current result buffer have been visited, the row 
pointer points to the last row. If it is needed to go backward and visit 
some more rows, this function can be used for this purpose.<P>

<DT><A NAME="symlink"><FONT SIZE="+1">Symlink(target,link)</FONT></A>
<DD>
<P>Symlink() creates a symbolic link.  See the <a href="#link">Link()</a>
function to create hard links.<P>

<DT><A NAME="syslog"><FONT SIZE="+1">Syslog(level,message)</FONT></A>
<DD>
<P>
Syslog() logs messages to the system using UNIX's syslog(3) feature.
See your UNIX man page for more details.  See also <a
href="#initsyslog">InitSyslog()</a>, <a href="#openlog">OpenLog()</a>
and <a href="#closelog">CloseLog()</a>.
<P>

<DT><A NAME="system"><FONT SIZE="+1">System(command_string [,return_var])</FONT></A>
<DD>
<P>System is just like the C <EM>system()</EM> command in that it executes
the given unix command and outputs the result.  If a variable is provided as
the second argument, then the return status code of the executed unix command
will be written to this variable.  Note, that if
you are going to allow data coming from user input to be passed to this System function,
then you should be using the <A HREF="#escapeshellcmd">EscapeShellCmd()</A> function
to make sure that users cannot trick the system into executing arbitrary commands.
The System() call also automatically flushes the Apache output buffer after each
line of output if PHP is running as an Apache module.  
If you need to execute a command and have all the data from the command passed
directly back without any interference, use the <a href="#passthru">PassThru()</a>
function.  See also the <A HREF="#exec">Exec</A> function.<P>

<DT><A NAME="tan"><FONT SIZE="+1">Tan(arg)</FONT></A>
<DD>
<P>Sin returns the tangent of arg in radians.  See also <A HREF="#sin">Sin()</A>
and <A HREF="#cos">Cos()</A><P>

<DT><A NAME="tempnam"><FONT SIZE="+1">TempNam(path, prefix)</FONT></A>
<DD>
<P>TempNam returns a unique filename located in the directory indicated
by path with filename prefix given by prefix.  It is identical to the
Unix C tempnam() function.<P>

<DT><A NAME="time"><FONT SIZE="+1">Time()</FONT></A>
<DD>
<P>Time simply returns the current local time in seconds
since Unix epoch (00:00:00 Jan. 1 1970).  It is equivalent to calling
<A HREF="#date">Date(&quot;U&quot;)</A>.  If you need better than per-second
granularity, use the <A HREF="#microtime">Microtime</A> function.<P>

<DT><A NAME="umask"><FONT SIZE="+1">Umask([mask])</FONT></A>
<DD>
<P>Umask(<i>mask</i>) sets PHP's umask to <i>mask</i> &amp; 0777 and
returns the old umask.  If PHP/FI is an Apache module, Apache's old
umask is restored when PHP/FI has finished.  <i>mask</i> must be
specified in <a href="#octal">octal</a> notation, like for 
<a href="#chmod">ChMod()</a>.  Umask()
without arguments simply returns the current umask.<P>

<DT><A NAME="uniqid"><FONT SIZE="+1">UniqId()</FONT></A>
<DD>
<P>UniqId returns a prefixed unique identifier based on current time
in microseconds.  The prefix can be useful for instance if you
generate identifiers simultaneously on several hosts that might happen
to generate the identifier at the same microsecond.  The prefix can be
up to 114 characters long.
<P>

<DT><A NAME="unlink"><FONT SIZE="+1">Unlink(filename)</FONT></A>
<DD>
<P>Unlink deletes the given filename.  Similar to the Unix C unlink() function.
See the <a href="#rmdir">RmDir()</a> function for removing directories.<P>

<DT><A NAME="unset"><FONT SIZE="+1">UnSet($var)</FONT></A>
<DD>
<P>UnSet undefines the given variable.  In the case of an array, the entire
array is cleared.  Individual array elements may also be unset.<P>

<DT><A NAME="urldecode"><FONT SIZE="+1">UrlDecode(arg)</FONT></A>
<DD>
<P>UrlDecode decodes a string encoded with the <A HREF="#urlencode">
UrlEncode</A> function.  In typical use, it is not necessary to decode
URL Encoded strings because these are automatically decoded when strings
are passed between pages.  However, for completeness sake, this function
has been included.<P>

<DT><A NAME="urlencode"><FONT SIZE="+1">UrlEncode(arg)</FONT></A>
<DD>
<P>UrlEncode encodes any characters from arg which are not one of
&quot;a-zA-Z0-9_-.&quot; by replacing them with %xx where xx is their
ASCII value in hexadecimal.  The encoded string is returned.<P>

<DT><A NAME="usleep"><FONT SIZE="+1">USleep(microsecs)</FONT></A>
<DD>
<P>Sleep will delay for the given number of microseconds.  Similar to 
the Unix C usleep() function.  See also the <A HREF="#sleep">Sleep()</A>
function.<P>

<DT><A NAME="virtual"><FONT SIZE="+1">Virtual(filename)</FONT></A>
<DD>
<P>Virtual is an Apache-specific function which is equivalent 
   to &lt;!--#include virtual...--&gt; in mod_include.  It performs an 
   Apache sub-request.  It is useful for including CGI scripts or .shtml 
   files, or anything else that you would parse through Apache 
   (for .phtml files, you'd probably want to use &lt;?Include&gt;.<P>

</DL>
<HR>
<H2><A NAME="addfunc">Adding your own internal functions to PHP/FI</A></H2>
It may well be that the set of functions provided by PHP/FI does not
include a particular function that you may need.  By carefully following
the steps described below, it is possible for you to add your own
functions to PHP/FI.<P>
<P>
Before you start hacking away at the internals of PHP/FI you need to
grab a copy of the latest version of Bison.  Bison is GNU's implementation
of YACC (Yet Another Compiler Compiler).  The YACC that came with your
operating system may or may not be good enough, but just to make sure,
go grab Bison.  You can find it at <A HREF="ftp://prep.ai.mit.edu/pub/gnu">
ftp://prep.ai.mit.edu/pub/gnu</A>.<P>
<P>
You should also have a look at the Makefile and turn on debugging.  Simply
uncomment the <STRONG>DEBUG</STRONG> line in the Makefile.  The output file
of debug information is specified by <STRONG>DEBUG_FILE</STRONG> in <EM>php.h</EM>.
It is by default set to <EM>/tmp/php.err</EM>.  You can change this to
suit your needs.<P>
<P>
A final thing you might want to keep in mind is that php runs as the
same user id as httpd on your system, unless of course you are running it
with the setuid bit set, and this httpd user does not generally have
write access to the various directories.  This means that if you do something
that causes php to core dump, you will not get a core file.  The easy way
around this is to make the directory where you keep your test .html files
writable to all.  PHP changes its current directory to the directory of
the .html file it is reading and will thus dump its core there if it can.<P>
<P>
In the following steps we will use the <EM>Time()</EM> function to
illustrate how to add a function.<P>

<DL><DT><STRONG>Step 1 - Defining the grammar of your Function</STRONG>
<DD>
<P>If your function takes 0 to 6 arguments, there are predefined
grammars available.  You can skip this step.<P>

<P>The grammar of your function is defined in the <EM>parse.raw</EM> file.
The first thing to add is a token.  A token is an upper case keyword
which is usually the same as your function name.  All the tokens are
defined near the top of the parse.raw file.  The order doesn't matter.
Then you need to build your actual YACC grammar rule.  Look at the 
existing rules and find a function that is similar to the one you are adding.
Keep in mind that most normal functions are standard functions that read their
arguments from the expression stack.  Your function will most likely fall into
this group in which case you won't need to touch the <EM>parse.raw</EM> file.<P>

<DT><STRONG>Step 2 - Adding your function to the lexical analyzer hash table</STRONG>
<DD>
<P>To do this, edit <EM>lex.c</EM> and find the hash table near the top of the
file.  Look for the line, <TT>static cmd_table_t cmd_table[22][30] = {</TT>,
which defines the beginning of the hash table.  The <TT>[22][30]</TT> defines
the size of the 2 dimensional array which holds the hash table.  The 22 is one
greater than the maximum function name length and the 30 refers to the
maximum number of functions in any one hash list.  If you exceed either of
these limits, simply increase them right here.<P>
<P>
This hash table would probably rate as the absolute simplest hash table in
the entire world.  The hash value is the length of the string of
the function name to be hashed.  So, for our <EM>Time()</EM> example, we
need to add an entry for hash value 4.  Therefore we add the following
line to the hash list for 4:<P>
<P>
<PRE>      { &quot;time&quot;,INTFUNC0,UnixTime },</PRE><P>
<P>
This entry maps a string to the INTFUNC0 token.  You can look up the grammar for
the INTFUNC0 token in <EM>parse.raw</EM> and you will see that it is a generic
grammar for an internal function call with 0 arguments.  The string,
in quotes above, is the actual string that you will be using in the .html files
to call your function.  Keep in mind that PHP/FI function names are
<STRONG>not</STRONG> case sensitive.  And the final <B>UnixTime</B> element is the
actual function to be called.<P>

<DT><STRONG>Step 3 - Write your actual Function</STRONG>
<DD>
<P>You can actually write your function in any language you like, as long
as it is callable through the normal C function call convention and you
have a way of creating either an object file or a library file compatible
with the linker on your system.  In general, we will assume that you are
writing your function in C.  All the functions that come with PHP/FI have
been written in C.  The Time() function, or UnixTime() as it is called
internally in PHP can be found in <EM>date.c</EM> and looks like this:<P>
<P>
<PRE>
void UnixTime(void) {
    char temp[32];

    sprintf(temp,"%ld",(long)time(NULL));
    Push(temp,LNUMBER);
}</PRE><P>
<P>
Note that the function is void.  This indicates that it doesn't return
anything.  This may seem confusing to you because obviously the function
needs to somehow return the time.  The time is returned, but not as the
return value of the function.  It is pushed onto what is called an
expression stack.  The expression stack is simply a stack of strings
and an associated type.  PHP/FI understands only 3 basic variable types:
STRING, LNUMBER and DNUMBER.  STRING is a character string, LNUMBER is
a long integer and DNUMBER is a double, or floating point, value.  In
this Time() example, the value to be returned is the time expressed in
Unix format (number of seconds since Jan.1 1970) and is thus an integer.
The expression stack only accepts strings, so we sprintf the long integer
into a string and push it onto the stack indicating that it is actually
a long integer with the line: <TT>Push(temp,LNUMBER);</TT><P>

<DT><STRONG>Step 4 - Add your function prototype to php.h</STRONG>
<DD>
<P>In the bottom half of the <EM>php.h</EM> file you will find a
complete list of prototypes of all the functions in php.  They are
grouped by the files in which they appear.  Simply add your prototype
to an appropriate place in this file.  For our Time() example the
following line is added:<P>
<P>
<PRE>void UnixTime(void);</PRE><P>

<DT><STRONG>Step 5 - Compile</STRONG>
<DD>
<P>You have to remember to re-make the parser whenever you make a change
to the <EM>parse.raw</EM> file.  Type: <STRONG>make parser</STRONG> to
do this.  You must have at least version 1.25 of Bison in order to make
the PHP parser.  Then do a normal compile by typing: <STRONG>make</STRONG>
once that is done.<P>

<DT><STRONG>Step 6 - Send me your additions!</STRONG>
<DD>
<P>If you would like your functions added to the next release of
PHP/FI, send them to me.  The best way is probably to make a context-sensitive
diff.  To do that, you need a copy of a clean unmodified distribution.  Simply
do a, <STRONG>diff -c</STRONG> on the files you have changed comparing them
to the original files.  Please don't send me a diff of the changes in
<EM>parse.c</EM> since that file is automatically generated.  Send me the diff
from <EM>parse.raw</EM> instead.<P>
</DL>
<P>
The Time() example illustrated the steps involved in adding a function.
Chances are that the function you wish to add is quite a bit more
complex than this example.  You will probably want to be able to pass
arguments to your function and have it manipulate these arguments in
some manner.  You may even want to have it callable in different ways.
These concepts will be illustrated by the PHP/FI crypt() function.
See also the section entitled <A HREF="#hacknotes">Notes for Code Hacks</A>
for some more technical details about writing code for PHP/FI.<P>
<P>
The Crypt() Grammar in <EM>parse.raw</EM>:<P>
<P>
<PRE>%token CRYPT
        .
        .
        .
    | CRYPT '(' expr ',' expr ')'
        {
            if(GetCurrentState(NULL) || inCase || inElseIf) Crypt(1);
        }
    | CRYPT '(' expr ')'
        {
            if(GetCurrentState(NULL) || inCase || inElseIf) Crypt(0);
        }</PRE><P>
<P>
Here it is shown how to define a grammar which lets you call a function
with either 1 or 2 arguments.  You could write different functions
to handle the two cases, or simply send a mode parameter as is done
here to indicate the mode in which the function is called.  Note that in
this case you cannot use one of the pre-defined INTFUNCn grammars since your
function can take a variable number of arguments.<P>
<P>
The other aspect that is shown is how to actually represent function
arguments.  In most cases you will want to use the <STRONG>expr</STRONG>
identifier.  This identifier means that the argument is an expression.
An expression can be a literal value, a function call or a combination
of many expressions.  See parse.raw for the complete yacc grammar
definition for expressions for more details.<P>
<P>
The Hash Table entry in <EM>lex.c</EM>:<P>

<P>
<PRE>      { "crypt",CRYPT,NULL },</PRE><P>
<P>
Notice that the last item is a NULL in this case since the function call is
handled in <EM>parse.raw</EM> directly.  If you used an INTFUNCn grammar, then
you would put the name of your function in place of this NULL.  The actual 
Crypt() function in <EM>crypt.c</EM>:<P>

<P>
<PRE>/*
 * If mode is non-zero, a salt is expected.
 * If mode is zero, a pseudo-random salt will be selected.
 */
void Crypt(int mode) {
#if HAVE_CRYPT
	Stack *s;
	char salt[8];
	char *enc;
	
	salt[0] = '\0';
	if(mode) {
		s = Pop();
		if(!s) {
			Error("Stack error in crypt");
			return;
		}
		if(s->strval) strncpy(salt,s->strval,2);
	}
	s = Pop();
	if(!s) {
		Error("Stack error in crypt");
		return;
	}
	if(!salt[0]) {
		salt[0] = 'A' + (time(NULL) % 26);
		salt[1] = 'a' + (time(NULL) % 26);
		salt[2] = '\0';
	}
	enc = (char *)crypt(s->strval,salt);
#if DEBUG
	Debug("Crypt returned [%s]\n",enc);
#endif
	Push(enc,STRING);	

#else
	Error("No crypt support compiled into this version");
#endif
}</PRE><P>
<P>
The most important aspect of this function is the <STRONG>s = Pop()</STRONG>
call.  The arguments to the function must be popped off the expression
stack one by one.  When you write a function which takes multiple
arguments, remember that a stack is a LAST-IN, FIRST-OUT data structure.
This means that you will be popping your arguments off the stack in
reverse order.  The last argument is popped off first.  In the above
example we check to see if we are in the 2 argument mode.  If we are,
we pop the argument off the stack and save it.  Then we pop the next
argument off the stack.  Pop() returns a pointer to a Stack structure (s).
The Stack structure looks like this (from <EM>php.h</EM>):<P>
<P>
<PRE>/* Expression Stack */
typedef struct Stack {
    short type;
    unsigned char *strval;
    long intval;
    double douval;
    VarTree *var;
    struct Stack *next;
} Stack;</PRE><P>
<P>
The <EM>type</EM> will generally be one of STRING, LNUMBER or DNUMBER.
The <EM>strval</EM>, <EM>intval</EM>, and <EM>douval</EM> components are
the string, integer and double representations of the value respectively.
If the expression is actually a defined variable, the <EM>var</EM> component
contains a pointer to the variable structure which defines this variable.<P>
<P>
In our Crypt() function we are only interested in the string value of
the argument, so we use <EM>s->strval</EM>.  Many PHP/FI functions can
do different things depending on the type of the variable simply by
checking <EM>s->type</EM> and using <EM>s->strval</EM>, <EM>s->intval</EM>
and/or <EM>s->douval</EM> appropriately.<P>
<P>
After calling the <STRONG>real</STRONG> crypt() function and getting the
encrypted string, our Crypt() function calls <EM>Push(enc,STRING);</EM>
to push the return value onto the expression stack.  It should be noted
that the expression stack is cleared after each PHP/FI line, so if
you push expressions onto this stack that are never popped by anything,
it won't matter.<P>
<P>
The <EM>Debug()</EM> call in the Crypt() example shows how to add debugging
output to your function.  Debug() is a varags (variable argument list)
function just like printf.<P>
<HR>
<H2><A NAME="hacknotes">Notes for Code-Hacks</A></H2>
<P>Memory management within PHP/FI is a tricky thing.  Since we can run as 
a server module, we have to be very careful about memory resources.  Not
only do we need to be reentrant, but we also need to be handle the fact
that we can receive a timeout signal at any time at which point we drop out
of the module.  We get no warning, and we get no time to free any memory
that we may have allocated.  And this memory has to be freed, or the data
space of the httpd process we are linked to could grow indefinitely.
This also applies when PHP is running in CGI mode since it can be set up
to run as a FastCGI persistent process.<P>
<P>The solution is to use sub-pools of memory.  These pools are
automatically cleared by Apache when a session is terminated, or in the case
of a FastCGI persistent process, these pools are cleared in <EM>main.c</EM>
every time the FastCGI wrapper loop executes.  Three such
pools are used at the moment.  They are numbered 0,1 and 2.  The sub-pool
number is the first argument to the <EM>emalloc</EM> and <EM>estrdup</EM>
functions.<P>
<DL>
<DT><STRONG>Pool 0 - Session lifespan</STRONG></DT>
<DD>Any memory allocated from this pool will span the entire session.
It is a good idea to keep the use of this pool as low as possible.
For example, if someone makes a while loop that iterates 1000 times and
within this while loop they call something which allocates memory from
pool 0, then this memory will be allocated 1000 times.  This is a quick
way to use up all alloted data space.</DD>
<DT><STRONG>Pool 1 - Temporary storage (shortest lifespan)</STRONG></DT>
<DD>If a temporary work buffer is needed for something within a function,
the memory for it must come from this pool.  This pool is cleared on every
call to yylex().  ie. the memory is lost just about as soon as you leave
a function.</DD>
<DT><STRONG>Pool 2 - Expression space (medium lifespan)</STRONG></DT>
<DD>This pool exists for the duration of an expression.  An expression in
this context being a full PHP/FI command line.  It will not get cleared
within functions since the higher level expression which called the
function has not been completed until the function returns.  The ClearIt
flag in the yylex() function indicates when it is safe to clear this
pool.</DD>
</DL>
<P>The use of sub-pools completely eliminates the need to explicitly free
memory anywhere in the code, with the one exception being memory allocated
using a regular malloc call by various libraries that could be linked into
PHP.  The gdbm library is one such example.<P>

<?php commonFooter(); ?>
