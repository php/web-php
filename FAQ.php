<?
require_once 'prepend.inc';
commonHeader("Frequently Asked Questions");
?>

<h1>
PHP Frequently Asked Questions
</h1>

<!-- The website should stop chopping. -->

<p>

This is a list of Frequently Asked Questions about PHP and
their answers. 
<!--
If you have suggestions, corrections or additions, send them to
<a href="mailto:phpdoc@lists.php.net">phpdoc@lists.php.net</a>.
-->
<p>
<? echo hdelim(); ?>

<ul>
<li><b><a href="#1">1. General Information</a></b>
    <ul>
        <li><a href="#1.1">1.1. What is PHP?</a></li>
        <li><a href="#1.2">1.2. What is the relation between the versions?</a></li>
        <li><a href="#1.3">1.3. Can I run several versions of PHP at the same time?</a></li>
        <li><a href="#1.4">1.4. What are the differences between PHP 3 and PHP 4?</a></li>
    </ul>
<li><b><a href="#2">2. PHP mailing lists</a></b>
    <ul>
        <li><a href="#2.1">2.1. Is there a PHP mailing list?</a></li>
        <li><a href="#2.2">2.2. Help! I can't seem to subscribe/unsubscribe to/from the mailing list!</a></li>
        <li><a href="#2.3">2.3. Is there an archive of the mailing list anywhere?</a></li>
        <li><a href="#2.4">2.4. What can I ask the mailing list?</a></li>
        <li><a href="#2.5">2.5. What information should I include when posting to the mailing list?</a></li>
    </ul>
<li><b><a href="#3">3. Obtaining PHP</a></b>
    <ul>
        <li><a href="#3.1">3.1. Where can I obtain PHP?</a></li>
        <li><a href="#3.2">3.2. Are pre-compiled binary versions available?</a></li>
        <li><a href="#3.3">3.3. Where can I get libraries needed to compile some of the optional PHP extensions?</a></li>
        <li><a href="#3.4">3.4. How do I get these libraries to work?</a></li>
        <li><a href="#3.5">3.5. I got the latest version of the PHP source code from the CVS repository on my Windows 95/NT machine, what do I need to compile it?</a></li>
        <li><a href="#3.6">3.6. Where do I find the Browser Capabilities File?</a></li>
    </ul>
<li><b><a href="#4">4. Connecting to databases</a></b>
    <ul>
        <li><a href="#4.1">4.1. I heard it's possible to access Microsoft SQL Server from PHP. How?</a></li>
        <li><a href="#4.2">4.2. Can I access Microsoft Access databases?</a></li>
        <li><a href="#4.3">4.3. I saw PHP offers persistent database connections. What does that mean?</a></li>
        <li><a href="#4.4">4.4. I upgraded to php4, and now mysql keeps telling me "Warning: MySQL: Unable to save result set in ...". What's up?
        <li><a href="#4.5">4.5. After installing shared mysql support, Apache dumps core as soon as libphp4.so is loaded. Can this be fixed?
    </ul>
<li><b><a href="#5">5. Installation</a></b>
    <ul>
        <li><a href="#5.1">5.1. Where should my php3.ini file be located?</a></li>
        <li><a href="#5.2">5.2. I installed PHP using RPMS, but Apache isn't processing the PHP pages! What's going on here?</a></li>
        <li><a href="#5.3">5.3. I installed PHP using RPMS, but it doesn't compile with the database support I need! What's going on here?</a></li>
        <li><a href="#5.4">5.4. How do I get these libraries to work?</a></li>
    </ul>
<li><b><a href="#6">6. Build Problems</a></b>
    <ul>
        <li><a href="#6.1">6.1. I got the latest version of PHP using the anonymous CVS service, but there's no configure script!</a></li>
        <li><a href="#6.2">6.2. I'm having problems configuring PHP to work with Apache. It says it can't find httpd.h, but it's right where I said it is!</a></li>
        <li><a href="#6.3">6.3. When I run configure, it says that it can't find the include files or library for GD, gdbm, or some other package!</a></li>
        <li><a href="#6.4">6.4. When it is compiling the file language-parser.tab.c, it gives me errors that say 'yytname undeclared'.</a></li>
        <li><a href="#6.5">6.5. When I run 'make', it seems to run fine but then fails when it tries to link the final application complaining that it can't find some files.</a></li>
        <li><a href="#6.6">6.6. When linking PHP, it complains about a number of undefined references.</a></li>
        <li><a href="#6.7">6.7. I can't figure out how to build PHP with Apache 1.3.</a></li>
        <li><a href="#6.8">6.8. I have followed all the steps to install the Apache module version on UNIX, and my PHP scripts show up in my browser or I am being asked to save the file.</a></li>
        <li><a href="#6.9">6.9. It says to use: --activate-module=src/modules/php4/libphp4.a, but that file doesn't exist, so I changed it to --activate-module=src/modules/php4/libmodphp4.a and it doesn't work!? What's going on?</a></li>
        <li><a href="#6.10">6.10. When I try to build Apache with PHP as a static module using --activate-module=src/modules/php4/libphp4.a it tells me that my compiler is not ANSI compliant.</a></li>
        <li><a href="#6.11">6.11. When I try to build PHP using --with-apxs I get strange error messages.</a></li>
        <li><a href="#6.12">6.12. During 'make', I get errors in microtime, and a lot of 'RUSAGE_' stuff.</a></li>
    </ul>
<li><b><a href="#7">7. Using PHP</a></b>
    <ul>
        <li><a href="#7.1">7.1. I would like to write a generic PHP script that can handle data coming from any form. How do I know which POST method variables are available?</a></li>
        <li><a href="#7.2">7.2. I need to convert all single-quotes (') to a backslash followed by a single-quote. How can I do this with a regular expression?</a></li>
        <li><a href="#7.3">7.3. When I do the following, the output is printed in the wrong order, what's going on?</a></li>
        <li><a href="#7.4">7.4. Hey, what happened to my newlines?</a></li>
        <li><a href="#7.5">7.5. I need to access information in the request header directly. How can I do this?</a></li>
        <li><a href="#7.6">7.6. When I try to use authentication with IIS I get 'No Input file specified'.</a></li>
        <li><a href="#7.7">7.7. I've followed all the instructions, but still can't get PHP and IIS to work together!</a></li>
        <li><a href="#7.8">7.8. My PHP script works on IE and Lynx, but on Netscape some of my output is missing. When I do a "View Source" I see the content in IE but not in Netscape.</a></li>
        <li><a href="#7.9">7.10. How am I supposed to mix XML and PHP? It complains about my &lt;?xml&gt; tags!</a></li>
        <li><a href="#7.10">7.10. How can I use PHP with FrontPage or Dreamweaver or some other HTML editor that insists on moving my code around?</a></li>
        <li><a href="#7.11">7.11. Where can I find a complete list of pre-set variables available to me, and why are these not documented in the PHP documentation?</a></li>
        <li><a href="#7.12">7.12. Why do I get an error that looks something like this: "Warning: 0 is not a MySQL result index in &lt;file&gt; on line &lt;x&gt;" or "Warning: Supplied argument is not a valid MySQL result resource in &lt;file&gt; on line &lt;x&gt;?</a></li>
        <li><a href="#7.13">7.13. I'm trying to use an &lt;input type="image"&gt; tag, but the $foo.x and $foo.y variables aren't available. Where are they?</a></li>
        <li><a href="#7.14">7.14. How do I get all the results from a SELECT MULTIPLE HTML tag? </a></li>
    </ul>
<li><b><a href="#8">8. PHP and HTML</a></b>
    <ul>
        <li><a href="#8.1">8.1. How do I create arrays in a HTML &lt;form&gt;?</a></li>
    </ul>
<li><b><a href="#9">9. PHP and other languages</a></b>
    <ul>
        <li><a href="#9.1">9.1. PHP vs. ASP?</a></li>
        <li><a href="#9.2">9.2. Is there an ASP to PHP converter?</a></li>
        <li><a href="#9.3">9.3. PHP vs. Cold Fusion?</a></li>
        <li><a href="#9.4">9.4. PHP vs. Perl?</a></li>
    </ul>
<li><b><a href="#10">10. Common Problems</a></b>
    <ul>
        <li><a href="#10.1">10.1. I installed PHP, but every time I load a document, I get the message 'Document Contains No Data'! What's going on here?</a></li>
        <li><a href="#10.2">10.2. I'm trying to access one of the standard CGI variables (such as $DOCUMENT_ROOT or $HTTP_REFERER) in a user-defined function, and it can't seem to find it. What's wrong?</a></li>
        <li><a href="#10.3">10.3. I patched Apache with the FrontPage extensions patch, and suddenly PHP stopped working. Is PHP incompatible with the Apache FrontPage extensions?</a></li>
        <li><a href="#10.4">10.4. I think I found a bug! Who should I tell?</a></li>
    </ul>
<li><b><a href="#11">11. Migrating from PHP3 to PHP4</a></b>
    <ul>
        <li><a href="#11.1">11.1. General information</a></li>
        <li><a href="#11.2">11.2. Incompatible functions</a></li>
    </ul>
<li><b><a href="#12">12. Migrating from PHP2 to PHP3</a></b>
<li><b><a href="#13">13. Miscellaneous Questions</a></b>
    <ul>
        <li><a href="#13.1">13.1. Where did the pop-ups go on the website?  Can I have the code for that?</a></li>
    </ul>
</ul>

<? echo hdelim(); ?>
<a name="1">
<h2>1. General Information</h2>
</a>

<dl>
  <dt><b>
    <a name="1.1">1.1.</a> What is PHP?
  </b></dt>
  <dd>
    From the <A href="http://www.php.net/manual/">manual</a>:

    <blockquote>
      <p>PHP is an HTML-embedded scripting language. Much of
      its syntax is borrowed from C, Java and Perl with a couple of unique
      PHP-specific features thrown in. The goal of the language is to
      allow web developers to write dynamically generated pages quickly.
    </blockquote>
    A nice introduction to PHP by Stig Sæther Bakken can be found <a
    href="http://www.zend.com/zend/art/intro.php">here</a> on the Zend
    website.
  <p>
  </dd>

  <dt><b>
    <a name="1.2">1.2.</a> What is the relation between the versions?
  </b></dt>
  <dd>
    PHP/FI 2.0 is an early and no longer supported version of PHP. PHP 3
    is the successor to PHP/FI 2.0 and is a lot nicer. PHP 4 is the latest
    generation of PHP, which uses the <? print_Link("http://www.zend.com/", "Zend engine"); ?>
    under the hood.
  <p>
  </dd>
  <dt><b>
    <a name="1.3">1.3.</a> Can I run several versions of PHP at the same time?
  </b></dt>
  <dd>
    Yes. See the INSTALL file that is included in the PHP 4 source distribution.
  <p>

  <dt><b>
    <a name="1.4">1.4.</a> What are the differences between PHP 3 and PHP 4?
  </b></dt>
  <dd>
    There are <a href="http://www.zend.com/zend/art/">a couple of articles</a> written on this by the authors of PHP4. Here's a list of some of the more important new features:
    <ul>
      <li>Extended API module 
      <li>Generalized build process under UNIX 
      <li>Generic web server interface that also supports multi-threaded web servers 
      <li>Improved syntax highlighter 
      <li>Native HTTP session support 
      <li>Output buffering support 
      <li>More powerful configuration system 
      <li>Reference counting 
    </ul>
    Please see the <a href="http://www.zend.com/zend/whats-new.php">What's new in PHP4 overview</a> for a detailed explanation of these features and more.
  <p>
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="2">
<h2>2. PHP mailing lists</h2>
</a>

<dl>
  <dt><b>
    <a name="2.1">2.1.</a> Is there a PHP mailing list?
  </b></dt>
  <dd>
    Of course! To subscribe, send mail to
    <code>php-general-subscribe@lists.php.net</code>. You don't need to include
    anything special in the subject or body of the message.

    <p>To unsubscribe, send mail to <code>php-general-unsubscribe@lists.php.net</code>.
  <p>
  </dd>

  <dt><b>
    <a name="2.2">2.2.</a> Help! I can't seem to subscribe to the mailing list!
    Help! I can't seem to unsubscribe from the mailing list!
  </b></dt>
  <dd>
    If you have problems subscribing to or unsubscribing from the
    PHP mailng list, it may be because the mailing list software
    can't figure out the correct mailing address to use. If
    your email address was <code>joeblow@example.com</code>,
    you can send your subscription request to
    <code>php-general-subscribe-joeblow=example.com@lists.php.net</code>,
    or your unsubscription request to
    <code>php-general-unsubscribe-joeblow=example.com@lists.php.net</code>.
  <p>
  </dd>

  <dt><b>
    <a name="2.3">2.3.</a> Is there an archive of the mailing list anywhere?
  </b></dt>
  <dd>
    Yes, you will find a list of archive sites on the <a href="/support.php">Support</a>
    page.<p>
  </dd>
  <dt><b>
    <a name="2.4">2.4.</a> What can I ask the mailing list?
  </b></dt>
  <dd>
    Since PHP is growing more and more popular by the day the traffic has increased on the PHP mailing list and as of now the list gets about 150 to 200 posts a day. Because of this it
    is in everyones interest that you use the list as a last resort when you have looked everywhere else.
    </P><p>
    Before you post to the list please have a look in this FAQ and the manual to see if you can find the help there. If there is nothing to be found there try out the mailing list
    archives (see above). If you're having problem with installing or configuring PHP please read through all included documentation and README's. If you still can't find any information
    that helps you out you're more than welcome to use the mailing list.
  </dd>
  <p>
  <dt><b>
    <a name="2.5">2.5.</a> What information should I include when posting to the mailing list?
  </b></dt>
  <dd>
    Posts like "I can't get PHP up and running! Help me! What is
    wrong?" are of absolutely no use to anyone. If you're having problems
    getting PHP up and running you must include what operating system
    you are running on, what version of PHP you're trying to set up,
    how you got it (pre-compiled, CVS, RPMs and so on), what you have
    done so far, where you got stuck and the exact error message.
    <p>
    This goes for any other problem as well. You have to include
    information on what you have done, where you got stuck, what
    you're trying to do and, if applicable, exact error messages. If
    you're having problems with your source code you need to include
    the part of the code that isn't working. Do not include more code
    than necessary though!  It makes the post hard to read and a lot of
    people might just skip it all together because of this. If you're
    unsure about how much information to include in the mail it's better
    that you include to much than to little.
    <p>
    Another important thing to remember is to summarize your problem
    on the subject line. A subject like "HELP MEEEE!!!" or "What is the
    problem here?" will be ignored by the majority of the readers.
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="3">
<h2>3. Obtaining PHP</h2>
</a>

<dl>
  <dt><b>
    <a name="3.1">3.1.</a> Where can I obtain PHP?
  </b></dt>
  <dd>
    You can download PHP from any of the members of the
    PHP network of sites. These can be found at <A
    href="http://www.php.net/">http://www.php.net/</a>.
    You can also use anonymous CVS to get the absolute latest
    version of the source. For more information, go to <A
    href="http://cvs.php.net">http://cvs.php.net</a>.
  <p>
  </dd>

  <dt><b>
    <a name="3.2">3.2.</a> Are pre-compiled binary versions available?
  </b></dt>
  <dd>
    Yes, although they are not always up to date.  The Windows binary is
    generally current, but the Unix binaries lag behind and are only available
    for certain platforms.  All download are available in the <a href="/downloads.php">
    Downloads</a> section.
  <p>
  </dd>

  <dt><b>
    <a name="3.3">3.3.</a> Where can I get libraries needed to compile some of the optional
    PHP extensions?
  </b></dt>
  <dd>
    <b>Note:</b> Those marked with * are not thread-safe libraries, and
    should not be used with PHP as a server module in the multi-threaded
    Windows web servers (IIS, Netscape).  This does not matter in Unix
    environments, yet.

    <ul>
      <li>LDAP (unix): <a href="ftp://ftp.openldap.org/pub/openldap/openldap-stable.tgz">ftp://ftp.openldap.org/pub/openldap/openldap-stable.tgz</a>
      <li>LDAP* (unix): <A href="ftp://terminator.rs.itd.umich.edu/ldap/ldap-3.3.tar.Z">ftp://terminator.rs.itd.umich.edu/ldap/ldap-3.3.tar.Z</a>
      <li>LDAP (unix/win): <a href="http://developer.netscape.com/tech/directory/downloads.html" TARGET="_top">Netscape Directory (LDAP) SDK 1.1</a>
          There is also a free LDAP server at: <A href="ftp://ftp.critical-angle.com/pub/cai/slapd/">ftp://ftp.critical-angle.com/pub/cai/slapd/</a>.
      <li>Berkeley DB2 (Unix/Win): <A href="http://www.sleepycat.com/">http://www.sleepycat.com/</a>
      <li>SNMP* (Unix): <A href="http://www.ece.ucdavis.edu/ucd-snmp/">http://www.ece.ucdavis.edu/ucd-snmp/</a> (Note: PHP uses the native SNMP interface in Windows.)
      <li>GD* (Unix/Win): <A href="http://www.boutell.com/gd/#buildgd">http://www.boutell.com/gd/#buildgd</a>
      <li>mSQL* (Unix): <A href="http://www.hughes.com.au/">http://www.hughes.com.au/</a>
      <li>mSQL* (Win) : <a href="http://blnet.com/msqlpc/">MSQL PC Home Page</a>
      <li>MySQL (Unix): <A href="http://www.mysql.com/">http://www.mysql.com/</a>
      <li>IMAP* (Win/Unix): <a href="ftp://ftp.cac.washington.edu/imap/old/imap-4.5.tar.Z">ftp://ftp.cac.washington.edu/imap/old/imap-4.5.tar.Z</a>
      <li>Sybase-CT* (Linux, libc5):  <A href="/extra/ctlib-linux-elf.tar.gz">Available locally</a>
      <li>FreeType (libttf): <a href="http://www.freetype.org/">http://www.freetype.org/</a>
      <li>ZLib (Unix/Win32): <a href="http://www.cdrom.com/pub/infozip/zlib/">http://www.cdrom.com/pub/infozip/zlib/</a>
      <li>expat XML parser (Unix/Win32): <a href="http://www.jclark.com/xml/expat.html">http://www.jclark.com/xml/expat.html</a>
      <li>PDFLib: <a href="http://www.pdflib.com">http://www.pdflib.com</a>
      <li>mcrypt: <a href="ftp://argeas.cs-net.gr/pub/unix/mcrypt/">ftp://argeas.cs-net.gr/pub/unix/mcrypt/</a>
      <li>mhash: <a href="http://sasweb.de/mhash/">http://sasweb.de/mhash/</a>
      <li>t1lib: <a href="http://www.neuroinformatik.ruhr-uni-bochum.de/ini/PEOPLE/rmz/t1lib/t1lib.html">http://www.neuroinformatik.ruhr-uni-bochum.de/ini/PEOPLE/rmz/t1lib/t1lib.html</a>
      <li>dmalloc: <a href="http://www.dmalloc.com/">http://www.dmalloc.com/</a>
      <li>aspell: <a href="http://download.sourceforge.net/aspell/aspell-.29.1.tar.gz">http://download.sourceforge.net/aspell/aspell-.29.1.tar.gz</a>
    <li>Readline: <a href="ftp://prep.ai.mit.edu/pub/gnu/readline/">ftp://prep.ai.mit.edu/pub/gnu/readline/</a>
    </ul>
  <p>
  </dd>

  <dt><b>
    <a name="3.4">3.4.</a> How do I get these libraries to work?
  </b></dt>
  <dd>
    You will need to follow instructions provided with the library. Some of
    these libraries are detected automatically when you run the 'configure'
    script of PHP (such as the GD library), and others you will have to
    enable using '--with-EXTENSION' options to 'configure'. Run 'configure
    --help' for a listing of these.
  <p>
  </dd>

  <dt><b>
    <a name="3.5">3.5.</a> I got the latest version of the PHP source code from the CVS
    repository on my Windows 95/NT machine, what do I need to compile it?
  </b></dt>
  <dd>
    First, you will need Microsoft Visual C++ v6 (v5 may do
    it also, but we do it with v6), and you will need to <A
    href="http://www.php.net/extra/win32build.zip">download the
    support files</a>. You will need to unzip this file (which
    has subdirectories, so make sure your unzip program keeps them)
    into the win32 subdirectory of the source distribution.
  <p>
  </dd>

  <dt><b>
    <a name="3.6">3.6.</a> Where do I find the Browser Capabilities File?
  </b></dt>
  <dd>
    You can find a browscap.ini file at <a href="http://www.cyscape.com/asp/browscap/">http://www.cyscape.com/asp/browscap/</a>.
  <p>
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="4">
<h2>4. Connecting to databases</h2>
</a>

<dl>
  <dt><b>
    <a name="4.1">4.1.</a> I heard it's possible to access Microsoft SQL Server from PHP. How?
  </b></dt>
  <dd>
    On Windows 95/NT machines, you can simply use the included ODBC support
    and the correct ODBC driver.

    <p>On Unix machines, you can use the Sybase-CT driver
    to access Microsoft SQL Servers because they are (at
    least mostly) protocol-compatible. Sybase has made a <A
    href="/extra/ctlib-linux-elf.tar.gz">free version of the necessary
    libraries for Linux systems</a>.  For other Unix operating systems,
    you need to contact Sybase for the correct libraries.  Also see
    the answer to the next question - 4.2.
  <p>
  </dd>

  <dt><b>
    <a name="4.2">4.2.</a> Can I access Microsoft Access databases?
  </b></dt>
  <dd>
    Yes. You already have all the tools you need if you are running
    entirely under Windows 95/98 or NT, where you can use ODBC and Microsoft's
    ODBC drivers for Microsoft Access databases.<p>
    If you are running PHP on a Unix box and want to talk to MS-Access on
    a Windows box you will need Unix ODBC drivers.
    <A href="http://www.openlinksw.com/">OpenLink Software</a> has Unix-based
    ODBC drivers that can do this.  There is a free pilot program where you
    can download an evaluation copy that doesn't expire and prices start at
    $675 for the commercial supported version.

    <p>Another alternative is to use an SQL server that has
    Windows ODBC drivers and use that to store the data, which you can
    then access from Microsoft Access (using ODBC) and PHP (using the
    built-in drivers), or to use an intermediary file format that Access
    and PHP both understand, such as flat-files or dBase databases.
    On this point Tim Hayes from OpenLink software writes:
<blockquote><blockquote>
Using another database as an intermediary is not a good idea, when you can
use ODBC from PHP straight to your database - i.e. with OpenLink's drivers. If
you do need to use an intermediary file format, OpenLink have now released
Virtuoso (a virtual database engine) for NT, Linux and other unix platforms.
Please visit our
<A href="http://www.openlinksw.com/">website</a> for a free download.
</blockquote></blockquote>

    <p>One option that has proven successful is to use MySQL and its
    MyODBC drivers on Windows and synchronizing the databases.  Steve Lawrence
    writes:
<blockquote><blockquote>
<ol>
<li> Install MySQL on your platform according to instructions with MySQL.
Latest available from www.mysql.org (get it from your mirror!). No special
configuration required except when you set up a database, and configure the
user account, you should put % in the host field, or the host name of the
Windows computer you wish to access MySQL with. Make a note of your server
name, username, and password.<p>

<li> Download the MyODBC for Windows driver from the MySQL site. Latest
release is myodbc-2_50_19-win95.zip (NT available too, as well as source
code). Install it on your Windows machine. You can test the operation with
the utilities included with this program.<p>

<li> Create a user or system dsn in your ODBC administrator, located in the
control panel. Make up a dsn name, enter your hostname, user name, password,
port, etc for you MySQL database configured in step 1.<p>

<li> Install Access with a full install, this makes sure you get the proper
add-ins.. at the least you will need ODBC support and the linked table
manager.<p>

<li> Now the fun part! Create a new access database. In the table window right
click and select Link Tables, or under the file menu option, select Get
External Data and then Link Tables. When the file browser box comes up,
select files of type: ODBC. Select System dsn and the name of your dsn
created in step 3. Select the table to link, press ok, and presto! you can
now open the table and add/delete/edit data on your MySQL server! You can
also build queries, import/export tables to MySQL, build forms and reports,
etc.<p>
</ol>
<b>Tips and Tricks:</b>
- You can construct your tables in access and export them to MySQL, then
link them back in. That makes table creation quick.<br>
- When creating tables in access, you must have a primary key defined in
order to have write access to the table in access. Make sure you create a
primary key in MySQL before linking in access.<br>
- If you change a table in MySQL, you have to re-link it in access. Go to
tools&gt;add-ins&gt;linked table manager, cruise to your ODBC DSN, and select the
table to re-link from there. you can also move your dsn source around there,
just hit the always prompt for new location checkbox before pressing ok.
</blockquote></blockquote>
  <p>
  </dd>

  <dt><b>
    <a name="4.3">4.3.</a> I saw PHP offers persistent database connections.   What does that mean?
  </b></dt>
  <dd>
    Persistent connections are SQL links that do not close when the
    execution of your script ends.  When a persistent connection is
    requested, PHP checks if there's already an identical persistent
    connection (that remained open from earlier) - and if it exists, it
    uses it.  If it does not exist, it creates the link.  An 'identical'
    connection is a connection that was opened to the same host, with
    the same username and the same password (where applicable).

    <p>People who aren't thoroughly familiar with the way web servers
    work and distribute the load may mistake persistent connects for what
    they're not.  In particular, they do <b>not</b> give you an ability
    to open 'user sessions' on the same SQL link, they do <b>not</b>
    give you an ability to build up a transaction efficently, and they
    don't do a whole lot of other things.  In fact, to be extremely
    clear about the subject, persistent connections don't give you <b>any</b>
    functionality that wasn't possible with their non-persistent brothers.

    <p>Why?

    <p>This has to do with the way web servers work. There are three ways
    in which your web server can utilize PHP to generate web pages.

    <p>The first method is to use PHP as a CGI "wrapper". When run this
    way, an instance of the PHP interpreter is created and destroyed for
    every page request (for a PHP page) to your web server. Because it
    is destroyed after every request, any resources that it acquires (such
    as a link to an SQL database server) are closed when it is destroyed.
    In this case, you do not gain anything from trying to use persistent
    connections -- they simply don't persist.

    <p>The second, and most popular, method is to run PHP as a module
    in a <I>multiprocess</I> web server, which currently only includes
    Apache. A multiprocess server typically has one process (the parent)
    which coordinates a set of processes (its children) who actually do
    the work of serving up web pages. When each request comes in from a a
    client, it is handed off to one of the children that is not already
    serving another client. This means that when the same client makes
    a second request to the server, it may be serviced by a different
    child process than the first time. What a persistent connection does
    for you in this case it make it so each child process only needs
    to connect to your SQL server the first time that it serves a page
    that makes us of such a connection. When another page then requires
    a connection to the SQL server, it can reuse the connection that
    child established earlier.

    <p>The last method is to use PHP as a plug-in for a <I>multithreaded</I>
    web server. Currently this is only theoretical -- PHP does not
    yet work as a plug-in for any multithreaded web servers. Work is
    progressing on support for ISAPI, WSAPI, and NSAPI (on Windows),
    which will all allow PHP to be used as a plug-in on multithreaded
    servers like Netscape FastTrack, Microsoft's Internet Information
    Server (IIS), and O'Reilly's WebSite Pro. When this happens, the
    behavior will be essentially the same as for the multiprocess model
    described before.

    <p>If persistent connections don't have any added functionality,
    what are they good for?

    <p>The answer here is extremely simple -- efficiency.  Persistent
    connections are good if the overhead to create a link to your SQL
    server is high.  Whether or not this overhead is really high depends
    on many factors.  Like, what kind of database it is, whether or
    not it sits on the same computer on which your web server sits,
    how loaded the machine the SQL server sits on is and so forth.
    The bottom line is that if that connection overhead is high,
    persistent connections help you considerably.  They cause the child
    process to simply connect only once for its entire lifespan, instead
    of every time it processes a page that requires connecting to the
    SQL server.  This means that for every child that opened a persistent
    connection will have its own open persistent connection to the server.
    For example, if you had 20 different child processes that ran a script
    that made a persistent connection to your SQL server, you'd have 20
    different connections to the SQL server, one from each child.

    <p>An important summary.  Persistent connections were designed to
    have one-to-one mapping to regular connections.  That means that you
    should <b>always</b> be able to replace persistent connections with
    non-persistent connections, and it won't change the way your script
    behaves.  It <b>may</b> (and probably will) change the efficiency
    of the script, but not its behavior!
  <p>
  </dd>

 <dt><b>
    <a name="4.4">4.4.</a> I upgraded to php4, and now mysql keeps telling
    me "Warning: MySQL: Unable to save result set in ...". What's up?
  </b></dt>
  <dd>
    <p>
    Most likely what has happened is, PHP4 was compiled with the '--with-mysql'
    option, without specifying the path to mysql. This means PHP is using its
    built-in mysql client library. If your system is running applications,
    such as php3 as a concurrent Apache module, or auth-mysql, that use other
    versions of mysql clients, then there is a conflict between the two
    differing versions of those clients.
    </p>
    <p>
    Recompiling php4, and adding the path to mysql to the flag,
    '--with-mysql=/your/path/to/mysql' usually solves the problem.
    </p>
    <p>
  </dd>

 <dt><b>
    <a name="4.5">4.5.</a> After installing shared mysql support, Apache dumps
    core as soon as libphp4.so is loaded. Can this be fixed?
  </b></dt>
  <dd>
    <p>
    If your MySQL libs are linked against pthreads this will happen.  Check
    using ldd.  If they are, grab the MySQL tarball and compile from source,
    or recompile from the source rpm and remove the switch in the spec file
    that turns on the threaded client code. Either of these suggestions will
    fix this. Then recompile PHP with the new mysql libs.
    </p>
    <p>
    </p>
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="5">
<h2>5. Installation</h2>
</a>

<p>To install PHP, follow the instructions in the <A
href="http://cvsweb.php.net/viewcvs.cgi/php3/INSTALL?rev=1.31&content-type=text/vnd.viewcvs-markup">INSTALL</a>
file located in the distribution. Windows
95 and NT users should also read the <A
href="http://cvsweb.php.net/viewcvs.cgi/php3/README.WIN32?rev=1.6&content-type=text/vnd.viewcvs-markup">README.WIN32</a>
file.  There are also some helpful hints for Windows users
<a href="/manual/config-apache-nt.html">here</a>.
<p>If you are trying to install PHP for use with Netscape's web server on
Unix see: <a href="http://www.webgenx.com/php/phpnes.php3">http://www.webgenx.com/php/phpnes.php3</a>
<dl>
  <dt><b>
    <a name="5.1">5.1.</a> Where should my <i>php3.ini</i> file be located?
  </b></dt>
  <dd>
    By default on UNIX it should be in <i>/usr/local/lib</i>.  Most people will want
    to change this at compile-time with the --with-config-file-path flag.  You would, for
    example, set it to something like:
  <pre>
    --with-config-file-path=/etc
  </pre>
    And then you would copy <i>php3.ini-dist</i> from the distribution to <i>/etc/php3.ini</i> and
    edit it to make any local changes you want.
  <p>
  </dd>

  <dt><b>
    <a name="5.2">5.2.</a> I installed PHP from an RPM, but Apache isn't processing the PHP pages! What's going on here?
  </b></dt>
  <dd>
  <ul>
<li>Assuming you installed both Apache and PHP from RPM packages, you need to uncomment or add some or all of the following lines in your http.conf file:<br>
<PRE>
# Extra Modules
AddModule mod_php.c
AddModule mod_php3.c
AddModule mod_perl.c

# Extra Modules
LoadModule php_module         modules/mod_php.so
LoadModule php3_module        modules/libphp3.so     /* for PHP 3 */
LoadModule php4_module        modules/libphp4.so     /* for PHP 4 */
LoadModule perl_module        modules/libperl.so
</PRE>

<li>And add:<br>
<PRE>
AddType application/x-httpd-php3 .php3    /* for PHP 3 */
AddType application/x-httpd-php .php      /* for PHP 4 */
</PRE>
... to the global properties, or to the properties of the VirtualDomain you want to have PHP support added to.
</ul><p></dd>

  <dt><b>
    <a name="5.3">5.3.</a> I installed PHP from an RPM, but it doesn't
    compile with the database support I need! What's going on here?
  </b></dt>
  <dd>
    Due to the way PHP is currently built, it is not easy to build a
    complete flexible PHP RPM.  This issue will be addressed in PHP 4.
    For PHP, we currently suggest you use the mechanism described in the
    INSTALL.REDHAT file in the PHP distribution.  If you insist on using
    an RPM version of PHP, read on...
    <p>Currently the RPM packagers are setting up the RPMS to install
    without database support to simplify installations <strong>and</strong>
    because RPMS use /usr/ instead of the standard /usr/local/ directory for
    files.  You need to tell the RPM spec file which databases to support
    and the location of the <em>top-level</em> of your database server.
    <p>This example will explain the process of adding support for the
    popular MySQL database server, using the mod installation for Apache.
    <p>Of course all of this information can be adjusted for any database
    server that PHP supports.  We will assume you installed MySQL and Apache
    completely with RPMS for this example as well.

    <ul>
    <li>First remove mod_php3<br>
    <code>rpm -e mod_php3</code><br>

    <li>Then get the source rpm and INSTALL it, NOT --rebuild<br>
    <code>rpm -Uvh mod_php3-3.0.5-2.src.rpm</code><br>
    <li>Then edit the /usr/src/redhat/SPECS/mod_php3.spec file<br>
    In the %build section add the database support you want, and the path.<br>
    For MySQL  you would add <code>--with-mysql=/usr \</code><br>
    The %build section will look something like this:<br>

    <pre>
	./configure --prefix=/usr \
	--with-apxs=/usr/sbin/apxs \
	--with-config-file-path=/usr/lib \
	--enable-debug=no \
	--enable-safe-mode \
	--with-exec-dir=/usr/bin \
	--with-mysql=/usr \
	--with-system-regex
    </pre>

    <li>Once this modification is made then build the binary rpm as follows:<br>
    <code>rpm -bb /usr/src/redhat/SPECS/mod_php3.spec </code><br>
    <li>Then install the rpm<br>
    <code>rpm -ivh /usr/src/redhat/RPMS/i386/mod_php3-3.0.5-2.i386.rpm</code><br>
    </ul>

    Make sure you restart Apache, and you now have PHP with MySQL support
    using RPM's.  Note that it is probably much easier to just build
    from the distribution tarball of PHP and follow the instructions in
    INSTALL.REDHAT found in that distribution.
  <p>
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="6">
<h2>6. Build Problems</h2>
</a>

<dl>
  <dt><b>
    <a name="6.1">6.1.</a> I got the latest version of PHP using the anonymous CVS service,
    but there's no configure script!
  </b></dt>
  <dd>
    You have to have the GNU autoconf package installed so you can
    generate the configure script from configure.in. Just run
    <code>./buildconf</code> in the top-level directory after getting
    the sources from the CVS server. (Also, unless you run configure
    with the <code>--enable-maintainer-mode</code> option, the
    configure script will not automatically get rebuilt when the
    configure.in file is updated, so you should make sure to do that
    manually when you notice configure.in has changed. One symptom
    of this is finding things like @VARIABLE@ in your Makefile after
    configure or config.status is run.)
  <p>
  </dd>
  <dt><b>
    <a name="6.2">6.2.</a> I'm having problems configuring PHP to work with Apache. It says
    it can't find httpd.h, but it's right where I said it is!
  </b></dt>
  <dd>
    You need to tell the configure/setup script the location of the
    <EM>top-level</EM> of your Apache source tree. This means that
    you want to specify '<code>--with-apache=/path/to/apache</code>'
    and <EM>not</EM> '<code>--with-apache=/path/to/apache/src</code>'.
  <p>
  </dd>
  <dt><b>
    <a name="6.3">6.3.</a> When I run configure, it says that it can't find the include files or
    library for GD, gdbm, or some other package!
  </b></dt>
  <dd>
    You can make the configure script looks for header files and libraries
    in non-standard locations by specifying additional flags to pass to
    the C preprocessor and linker, such as:
<FONT FACE="monospaced"><pre>
    CPPFLAGS=-I/path/to/include LDFLAGS=-L/path/to/library ./configure
</pre></FONT>
    If you're using a csh-variant for your login shell (why?), it would be:
<FONT FACE="monospaced"><pre>
    env CPPFLAGS=-I/path/to/include LDFLAGS=-L/path/to/library ./configure
</pre></FONT>
  <p>
  </dd>

  <dt><b>
    <a name="6.4">6.4.</a> When it is compiling the file language-parser.tab.c, it gives me errors
    that say 'yytname undeclared'.
  </b></dt>
  <dd>
    You need to update your version of Bison. You can find the latest version
    at <A href="ftp://ftp.gnu.org/pub/gnu/bison/">ftp://ftp.gnu.org/pub/gnu/bison/</a>.
  <p>
  </dd>

  <dt><b>
    <a name="6.5">6.5.</a> When I run 'make', it seems to run fine but then fails when it
    tries to link the final application complaining that it can't find
    some files.
  </b></dt>
  <dd>
    Some old versions of make that don't correctly put the compiled
    versions of the files in the functions directory into that same
    directory. Try running "<code>cp *.o functions</code>" and then
    re-running 'make' to see if that helps. If it does, you should really
    upgrade to a recent version of GNU make.
  <p>
  </dd>

  <dt><b>
    <a name="6.6">6.6.</a> When linking PHP, it complains about a number of undefined references.
  </b></dt>
  <dd>
    Take a look at the link line and make sure that all of the appropriate
    libraries are being included at the end. Common ones that you might have
    missed are '-ldl' and any libraries required for any database support
    you included.
    <p>
    If you're linking with Apache 1.2.x, did you remember to add the
    appropriate information to the EXTRA_LIBS line of the Configuration
    file and re-rerun Apache's Configure script? See the <A href="http://cvsweb.php.net/viewcvs.cgi/php3/INSTALL?rev=1.31&content-type=text/vnd.viewcvs-markup">INSTALL</a> file that
    comes with the distribution for more information.
    <p>
    Some people have also reported that they had to add '-ldl' immediately
    following 'libphp3.a' when linking with Apache.
  <p>
  </dd>

  <dt><b>
    <a name="6.7">6.7.</a> I can't figure out how to build PHP with Apache 1.3.
  </b></dt>
  <dd>
    <p>This is actually quite easy.  Follow these steps carefully:
    <ul>
    <li>Grab the latest Apache 1.3 distribution from <A href="http://www.apache.org/dist/">www.apache.org</a>.
    <li>Ungzip and untar it somewhere, for example /usr/local/src/apache-1.3.
    <li>Compile PHP by first running ./configure --with-apache=/<i>&lt;path&gt;</i>/apache-1.3  (substitute <i>&lt;path&gt;</i> for the actual path to your apache-1.3 directory.
    <li>Type 'make' followed by 'make install' to build PHP and copy the
            necessary files to the Apache distribution tree.
    <li>Change directories into to your /<i>&lt;path&gt;</i>/apache-1.3/src directory and edit the <i>Configuration</i> file.  At the end of the file, add: <tt>AddModule modules/php3/libphp3.a</tt>.
    <li>Type: './Configure' followed by 'make'.
    <li>You should now have a PHP-enabled httpd binary!
    </ul>
    <b>Note:</b> You can also use the new Apache ./configure script.  See the instructions in the README.configure file
    which is part of your Apache distribution.  Also have a look at the INSTALL file in the PHP distribution.
  <p>
  </dd>
  <dt><b>
    <a name="6.8">6.8.</a> I have followed all the steps to install the Apache module version on UNIX, and my
     PHP scripts show up in my browser or I am being asked to save the file.  Help!
  </b></dt>
  <dd>
    <p>This means that the PHP module is not getting invoked for some reason.  Three things to check before
    asking for further help:
    <ul>
    <li> Make sure that the httpd binary you are running is the actual new httpd binary you just built.  To do this,
try running: <i>/path/to/binary/httpd -l</i><br>
If you don't see <b>mod_php3.c</b> listed then you are not running the right binary.  Find and install the correct binary.
    <li> Make sure you have added the correct Mime Type to one of your Apache .conf files.  
It should be: <b><i>AddType application/x-httpd-php3 .php3</i></b> (for PHP 3)<br>
or <b><i>AddType application/x-httpd-php .php</i></b> (for PHP 4)<br>
Also make sure that this AddType line is not hidden away inside a &lt;Virtualhost&gt; or &lt;Directory&gt; block which would
prevent it from applying to the location of your test script.
    <li> Finally, the default location of the Apache configuration files changed between Apache 1.2 and Apache 1.3.  You
should check to make sure that the configuration file you are adding the AddType line to is actually being read.
You can put an obvious syntax error into your httpd.conf file or some other obvious change that will tell you if
the file is being read correctly.
    </ul>
  <p>
  </dd>

  <dt><b>
    <a name="6.9">6.9.</a> It says to use: --activate-module=src/modules/php4/libphp4.a, but that file
    doesn't exist, so I changed it to --activate-module=src/modules/php4/libmodphp4.a and it doesn't work!?
    What's going on?
  </b></dt>
  <dd>
    Well, you decided to try to outsmart the people who wrote those nice step-by-step instructions for you and you
    have now discovered that these people cannot be outsmarted.  The libphp4.a file is not supposed to
    exist.  The Apache build process will create it.<p>
  </dd>

  <dt><b>
    <a name="6.10">6.10.</a> When I try to build Apache with PHP as a static module using
    --activate-module=src/modules/php4/libphp4.a it tells me that my compiler is not ANSI
    compliant.
  </b></dt>
  <dd>
    This is a misleading error message from Apache that has been fixed
    in more recent versions.
  </dd>
  <dt><b>
    <a name="6.11">6.11.</a> When I try to build PHP using --with-apxs I get strange error messages
  </b></dt>
  <dd>
    There are three things to check here.  First, for some reason
    when Apache builds the apxs Perl script, it sometimes ends up
    getting built without the proper compiler and flags variables.
    Edit your apxs (sometimes found in /usr/local/apache/bin/apxs
    or /usr/sbin/apxs) and check for these lines:
<pre>my $CFG_CFLAGS_SHLIB  = '&nbsp;';      # substituted via Makefile.tmpl
my $CFG_LD_SHLIB      = '&nbsp;';          # substituted via Makefile.tmpl
my $CFG_LDFLAGS_SHLIB = '&nbsp;';      # substituted via Makefile.tmpl</pre>
    If this is what you see, you have found your problem.  Change these lines to say:
<pre>my $CFG_CFLAGS_SHLIB  = '-fpic -DSHARED_MODULE';      # substituted via Makefile.tmpl
my $CFG_LD_SHLIB      = 'gcc';          # substituted via Makefile.tmpl
my $CFG_LDFLAGS_SHLIB = q(-shared);# substituted via Makefile.tmpl </pre>
    The second possible problem should only be an issue on RedHat-6.1/6.2.
    The apxs script RedHat ships is broken.  Look for this line:
<pre>my $CFG_LIBEXECDIR    = 'modules';        # substituted via APACI install</pre>
    If you see the above line, change it to this:
<pre>my $CFG_LIBEXECDIR    = '/usr/lib/apache';        # substituted via APACI install</pre>
    Last, if you reconfigure/reinstall Apache, add a 'make clean' to the process after
    './configure' and before 'make'.
    <p>
    </dd>
  <dt><b>
    <a name="6.12">6.12.</a>During 'make', I get errors in microtime, and a lot of 'RUSAGE_' stuff.
  </b></dt>
   <dd>
   During the 'make' portion of installation, if you encounter problems that look similar
   to this:
    <p><pre>
    microtime.c: In function `php_if_getrusage':
    microtime.c:94: storage size of `usg' isn't known
    microtime.c:97: `RUSAGE_SELF' undeclared (first use in this function)
    microtime.c:97: (Each undeclared identifier is reported only once
    microtime.c:97: for each function it appears in.)
    microtime.c:103: `RUSAGE_CHILDREN' undeclared (first use in this function)
    make[3]: *** [microtime.lo] Error 1
    make[3]: Leaving directory `/home/master/php-4.0.1/ext/standard'
    make[2]: *** [all-recursive] Error 1
    make[2]: Leaving directory `/home/master/php-4.0.1/ext/standard'
    make[1]: *** [all-recursive] Error 1
    make[1]: Leaving directory `/home/master/php-4.0.1/ext'
    make: *** [all-recursive] Error 1
    </pre></p>
    Your system is broken.  You need to fix your /usr/include files either by making sure
    your /usr/include/linux symlink is pointing to the right place in your kernel sources or
    by installing a glibc-devel package that matches your glibc.  This has absolutely nothing
    to do with PHP.  To prove this to yourself, try this simple test:
    <p><pre>
    $ cat &gt;test.c &lt;&lt;X
    #include &lt;sys/resource.h&gt;
    X

    $ gcc -E test.c &gt;/dev/null
    </pre>
    If that spews out errors, you know your include files are messed up. 
    </p>
   </dd>
</dl>

<? echo hdelim(); ?>
<a name="7">
<h2>7. Using PHP</h2>
</a>

<dl>
  <dt><b>
    <a name="7.1">7.1.</a> I would like to write a generic PHP script
    that can handle data coming from any form.  How do I know which POST
    method variables are available?
  </b></dt>
  <dd>
    Make sure that the <i>track_vars</i> feature is
    enabled in your php3.ini file.    If you compiled PHP with
    &quot;--enable-track-vars&quot; it will be on by default.
    Alternatively you can enable it at run-time on a per-script
    basis by putting &lt;?php_track_vars?&gt; at the top of your file.
    When <i>track_vars</i> is on, it creates three associative arrays.
    $HTTP_GET_VARS, $HTTP_POST_VARS and $HTTP_COOKIE_VARS.  So, to
    write a generic script to handle POST method variables you would
    need something similar to the following:<pre>
    while (list($var, $value) = each($HTTP_POST_VARS)) {
        echo "$var = $value&lt;br&gt;\n";
    }</pre>
  <p>
  </dd>

  <dt><b>
    <a name="7.2">7.2.</a> I need to convert all single-quotes (')
    to a backslash followed by a single-quote. How can I do this with
    a regular expression?
  </b></dt>
  <dd>
    First off, take a look at the <A href="manual/function.addslashes.php3">addslashes()</a> function. It will do
    exactly what you want.  You should also have a look at the magic_quotes_gpc directive in your php3.ini
    file.
  <p>
    The ereg_replace magic you're looking for, however, is simply:<pre>
    $escaped = ereg_replace(&quot;'&quot;, &quot;\\'&quot;, $input);</pre>
  <p>
  </dd>

  <dt><b>
    <a name="7.3">7.3.</a> When I do the following, the output is printed in the wrong order:<pre>
      function myfunc($argument) {
        echo $argument + 10;
      }
      $variable = 10;
      echo "myfunc($variable) = " . myfunc($variable);
    </pre>
    <p>What's going on?
  </b></dt>
  <dd>
    To be able to use the results of your function in an expression (such
    as concatenating it with other strings in the example above), you need
    to <b>return</b> the value, not echo it.
  <p>
  </dd>

  <dt><b>
    <a name="7.4">7.4.</a> Hey, what happened to my newlines in:
<pre>
&lt;PRE&gt;
  1 &lt;?echo $result[1];?&gt;
  2 &lt;?echo $result[2];?&gt;
</pre>
  </b></dt>
  <dd>
    In PHP, the ending for a block of code is either "?&gt;" <b>or</b>
    "?&gt;\n" (where \n means a newline). This means that you need to
    insert an extra newline after each block of PHP code in the above
    example.
    <p>
    Why does PHP do this? Because when formatting normal HTML, this
    usually makes your life easier because you don't want that newline,
    but you'd have to create extremely long lines or otherwise make the
    raw page source unreadable to achieve that effect.
  <p>
  </dd>

  <dt><b>
    <a name="7.5">7.5.</a> I need to access information in the request header directly.  How can
    I do this?
  </b></dt>
  <dd>
    The getallheaders() function will do this if you are running PHP as a
    module.  So, the following bit of code will show you all the request
    headers:<pre>
    $headers = getallheaders();
    for(reset($headers); $key = key($headers); next($headers)) {
        echo "headers[$key] = ".$headers[$key]."&lt;br&gt;\n";
    }
</pre>
  <p>
  </dd>

  <dt><b>
    <a name="7.6">7.6.</a> When I try to use authentication with IIS I get 'No Input file specified'
  </b></dt>
  <dd>
    The security model of IIS is at fault here. This is a problem
    common to all CGI programs running under IIS.  A workaround is
    to create a plain HTML file (not parsed by php) as the entry page
    into an authenticated directory.  Then use a META tag to redirect
    to the PHP page, or have a link to the PHP page.  PHP will
    then recognize the authentication correctly.  When the ISAPI
    module is ready, this will no longer be a problem.  This should
    not effect other NT web servers.  For more information, see: <A
    href="http://support.microsoft.com/support/kb/articles/q160/4/22.asp"
    target="_new">http://support.microsoft.com/support/kb/articles/q160/4/22.asp</a>.
  <p>
  </dd>

  <dt><b>
    <a name="7.7">7.7.</a> I've followed all the instructions, but still can't get PHP and IIS
    to work together!
  </b></dt>
  <dd>
    Make sure any user who needs to run a PHP script has the rights
    to run php.exe!  IIS uses an anonymous user which is added at the
    time IIS is installed.  This user needs rights to php.exe.  Also,
    any authenticated user will also need rights to execute php.exe.  And
    for IIS4 you need to tell it that PHP is a script engine.
  <p>
  </dd>

  <dt><b>
    <a name="7.8">7.8.</a> My PHP script works on IE and Lynx, but on Netscape some of my output
    is missing.  When I do a &quot;View Source&quot; I see the content in IE but not in Netscape.
    Even when I telnet to port 80 directly the correct content shows up.  How can this be?  PHP
    is server-side and my browser can't possibly know that the content it is seeing is generated
    by PHP, so what is going on?
  </b></dt>
  <dd>
    Very good question!  ;)  This is a tricky little issue and it has come up twice in the
    past month as of this writing.  Both times I ended up spending a good 20 minutes trying to
    figure out what the heck was going on.  The answer is that both IE and Lynx ignore any NULs
    (\0) in the HTML stream.  Netscape does not.  The best way to check for this is to compile
    the command-line version of PHP (also known as the CGI version) and run your script from the
    command line and pipe it through 'od -c' and look for any \0 characters.  (If you are on
    Windows you need to find an editor or some other program that lets you look at binary files)
    When Netscape sees a NUL in a file it will typically not output anything else on that line
    whereas both IE and Lynx will.  If this issue has bitten you, congratulations!  You are not
    alone.
  <p>
  </dd>

  <dt><b>
    <a name="7.9">7.9.</a> How am I supposed to mix XML and PHP? It complains about my &lt;?xml&gt tags!
  </b></dt>
  <dd>
   You need to turn off the short tags by setting short_tags to 0 in your
   php3.ini file, or by using the php3_short_tags Apache directive. (You
   could even use a &lt;File&gt; section to do this selectively.) You can
   also disable and re-enable the short tags in your script using the
   short_tags() function.
  <p>
  </dd>

  <dt><b>
    <a name="7.10">7.10.</a> How can I use PHP with FrontPage or Dreamweaver or some other HTML editor that insists on moving my code around?
  </b></dt>
  <dd>
   One of the easiest things to do is to enable using ASP tags in your
   PHP code. This allows you to use the ASP-style &lt% and %&gt; code
   delimiters. Most of the popular HTML editors handle those more
   intelligently (for now). To enable the ASP-style tags, you need
   to set the asp_tags php3.ini variable, or use the php3_asp_tags
   Apache directive.
  <p>
  </dd>

  <dt><b>
    <a name="7.11">7.11.</a> Where can I find a complete list of pre-set variables available
   to me, and why are these not documented in the PHP documentation?
  </b></dt>
  <dd>
   The best way is to stick a &lt;?phpinfo()?&gt; tag on a page and load it up.  This will
   show you all sorts of information about your PHP setup, including a list of both
   environment variables and also special variables set by your web server.  This list
   can't really be documented in the PHP documentation because it will change from one
   server to another.
   <p>
  </dd>

  <dt><b>
    <a name="7.12">7.12.</a>Why do I get an error that looks something like this:
<B><tt>Warning: 0 is not a MySQL result index in &lt;file&gt; on line &lt;x&gt;</tt></B> or 
<B><tt>Warning: Supplied argument is not a valid MySQL result resource in &lt;file&gt; on line &lt;x&gt;</tt></B>?  
What am I doing wrong?
  </b></dt>
  <dd>
   You are trying to use a result identifier that is 0.  The 0 indicates that your query failed
   for some reason.  You need to check for errors after submitting a query and before you
   attempt to use the returned result identifier.  The proper way to do this is with code similar
   to the following:<pre>
        $result = mysql_query("select * from tables_priv");
        if(!$result) {
            echo mysql_error();
            exit;
        }</pre>
   or:<pre>
        $result = mysql_query("select * from tables_priv")
                    or die("Bad query: ".mysql_error());</pre>
   <p>
  </dd>

  <dt><b>
    <a name="7.13">7.13.</a> I'm trying to use an &lt;input
    type="image"&gt; tag, but the <I>$foo.x</I> and <I>$foo.y</I>
    variables aren't available.  Where are they?
  </b></dt>
  <dd>
   When submitting a form, it is possible to use an image instead of
   the standard submit button with a tag like:
   <pre>&lt;input type="image" SRC="image.gif" NAME="foo"&gt;</pre>
   When the user clicks somewhere on the image, the accompanying form
   will be transmitted to the server with two additional variables:
   foo.x and foo.y.
   <p>
   Because $foo.x and $foo.y are invalid variable names in PHP, they are
   automagically converted to $foo_x and $foo_y.  That is, the periods
   are replaced with underscores.
   <p>
  </dd>
  <dt><b>
    <a name="7.14">7.14.</a> How do I get all the results from a SELECT
MULTIPLE HTML tag? 
  </b></dt>
  <DD>
   The SELECT MULTIPLE tag in an HTML construct allows users to select multiple
   items from a list.  These items are then passed to the action handler for the 
   form. The problem is that they are all passed with the same widget name. ie.
   <PRE>   &lt;SELECT NAME="var" MULTIPLE&gt;</PRE>
   Each selected option will arrive at the action handler as:

<PRE>   var=option1
   var=option2
   var=option3</PRE>

   Each option will overwrite the contents of the previous $var variable. The
solution is to use PHP's 
   non-indexed array feature. The following should be used:

<PRE>   &lt;SELECT NAME="var[]" MULTIPLE&gt;</PRE>

   This tells PHP to treat <i>var</i> as an array and each assignment of a
   value to var[] adds an item to the array. The first item becomes $var[0], 
   the next $var[1], etc. The count() function can be used to determine how 
   many options were selected, and the sort() function can be used to sort 
   the option array if necessary.<P>

   Note that if you are using JavaScript the <i>[]</i> on the element name
   might cause you problems when you try to refer to the element by name.  
   Use it's numerical form element id instead, or enclose the
   variable name in single quotes and use that as the index to the
<I>elements</I> array, for example:

<PRE>   variable = documents.forms[0].elements['var[]'];
</PRE>

  <P>
  </DD>
</dl>

<? echo hdelim(); ?>
<a name="8">
<h2>8. PHP and HTML</h2>
</a>

<dl>
  <dt><b>
    <a name="8.1">8.1.</a> How do I create an array in a HTML &lt;form&gt;?
  </b></dt>
  <dd>
    To get your &lt;form&gt; result sent as an array to your PHP script
    you name the &lt;input&gt;, &lt;select&gt; or &lt;textarea&gt;
    elements like this:
    <pre>
    &lt;input name="MyArray[]"&gt;
    &lt;input name="MyArray[]"&gt;
    &lt;input name="MyArray[]"&gt;
    &lt;input name="MyArray[]"&gt;
    </pre>
    Notice the square brackets after the variable name, that's what
    makes it an array. You can group the elements into different arrays
    by assigning the same name to different elements:
    <pre>
    &lt;input name="MyArray[]"&gt;
    &lt;input name="MyArray[]"&gt;
    &lt;input name="MyOtherArray[]"&gt;
    &lt;input name="MyOtherArray[]"&gt;
    </pre>
    This produces two arrays, MyArray and MyOtherArray, that gets sent
    to the PHP script.
    <p>
    <i>Note that you must not use indices with arrays in HTML!</i> The
    array gets filled in the order the elements appear in the form. For
    functions you can use to process these arrays once you get them into
    your scripts, please see the Arrays section in the manual.
  </dd>
</dl>

<? echo hdelim(); ?>

<a name="9">
<h2>9. PHP and other languages</h2>
</a>

<dl>
  <dt><b>
    <a name="9.1">9.1.</a> PHP vs. ASP?
  </b></dt>
  <dd>
    ASP is not really a language in itself, it's an acronym for Active
    Server Pages, the actual language used to program ASP with is a
    script version of Visual Basic.  The biggest drawback of ASP is that
    it's a proprietary system that is natively used only on Microsofts
    Internet Information Server (IIS). This limits it's availability to
    Win32 based servers. There are a couple of projects in the works
    that allows ASP to run in other environments and webservers; <a
    href="http://www.halcyonsoft.com/prods/iasp/iasp.htm">InstantASP</a>
    from <a href="http://www.halcyonsoft.com/">Halcyon</a> (commercial),
    <a href="http://www.chilisoft.com/chiliasp/default.asp">Chili!Soft
    ASP</a> from <a href="http://www.chilisoft.com/">Chili!Soft</a>
    (commercial) and <a href="http://www.activescripting.org/">OpenASP
    from ActiveScripting.org</a> (free).  ASP is said to be a slower
    and more cumbersome language than PHP, less stable as well. Some of
    the pros of ASP is that since it uses VBScript it's relatively easy
    to pick up the language if you're already know how to program in
    Visual Basic. ASP support is also enabled by default in the IIS
    server making it easy to get up and running.
  </dd>
  <p>
  <dt><b>
    <a name="9.2">9.2.</a> Is there an ASP to PHP converter?
  </b></dt>
  <dd>
    Yes, <a href="http://asp2php.naken.cc/">asp2php</a> is the one most often referred to.
  </dd>
  <p>
  <dt><b>
    <a name="9.3">9.3.</a> PHP vs. Cold Fusion?
  </b></dt>
  <dd>
    PHP is commonly said to be faster and more efficient for complex
    programming tasks and trying out new ideas. PHP is generally referred
    to as more stable and less resource intensive as well. Cold Fusion
    has better error handling, database abstraction and date parsing
    although database abstraction is being addressed in PHP 4. Another
    thing that is listed as one of Cold Fusion's strengths is its excellent
    search engine, but it has been mentioned that a search engine is not
    something that should be included in a web scripting language. PHP
    runs on almost every platform there is; Cold Fusion is only available
    on Win32, Solaris, Linux and HP/UX.  Cold Fusion has a better IDE
    and is generally easier to get started with, whereas PHP initially
    requires more programming knowledge.

    <p>A great summary by Michael J Sheldon on this topic has
    been posted to the PHP mailing list. A copy can be found <a
    href="http://marc.theaimsgroup.com/?l=php3-general&m=95602167412542&w=1">here</a>.
  </dd>
  <p>
  <dt><b>
    <a name="9.4">9.4.</a> PHP vs. Perl?
  </b></dt>
  <dd>
    The biggest advantage of PHP over Perl is that PHP was designed for
    scripting for the web where Perl was designed to do a lot more and can
    because of this get very complicated. The flexibility / complexity
    of Perl makes it easier to write code that another author / coder
    has a hard time reading. PHP has a less confusing and stricter format
    without losing flexibility.  PHP is easier to integrate into existing
    HTML than Perl. PHP has pretty much all the 'good' functionality of
    Perl; constructs, syntax and so on, without making it as complicated
    as Perl can be. Perl is a very tried and true language, it's been
    around since the late eighties, but PHP is maturing very quickly.
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="10">
<h2>10. Common Problems</h2>
</a>

<dl>
  <dt><b>
    <a name="10.1">10.1.</a> I installed PHP, but every time I load
    a document, I get the message 'Document Contains No Data'! What's
    going on here?
  </b></dt>
  <dd>
    This probably means that PHP is having some sort of problem
    and is core-dumping. Look in your server error log to see if
    this is the case, and then try to reproduce the problem with
    a small test case. If you know how to use 'gdb', it is very
    helpful when you can provide a backtrace with your bug report
    to help the developers pinpoint the problem.  If you are using
    PHP as an Apache module try something like:
    <ul>
      <li> Stop your httpd processes
      <li> gdb httpd
      <li> &gt; run -X -f /path/to/httpd.conf
      <li> Then fetch the URL causing the problem with your browser
      <li> If you are getting a core dump, gdb should inform you of this now
      <li> type: bt
      <li> You should include your backtrace in your bug report. This should be submitted to <a href="http://bugs.php.net">http://bugs.php.net</a> 
    </ul>
    <p>
    If your script uses the regular expression functions (<code>ereg()</code>
    and friends), you should make sure that you compiled PHP and
    Apache with the same regular expression package. (This should
    happen automatically with PHP and Apache 1.3.x)
  <p>
  </dd>

  <dt><b>
    <a name="10.2">10.2.</a> I'm trying to access one of the standard CGI
    variables (such as $DOCUMENT_ROOT or $HTTP_REFERER) in a user-defined
    function, and it can't seem to find it. What's wrong?
  </b></dt>
  <dd>
    Environment variables are now normal global variables, so you must
    either declare them as global variables in your function (by using
    "<code>global $DOCUMENT_ROOT;</code>", for example) or by using
    the global variable array (ie, "<code>$GLOBALS["DOCUMENT_ROOT"]</code>".
  <p>
  </dd>

  <dt><b>
    <a name="10.3">10.3.</a> I patched Apache with the FrontPage extensions patch, and suddenly PHP stopped
    working.  Is PHP incompatible with the Apache FrontPage extensions?
  </b></dt>
  <dd>
    No, PHP works fine with the FrontPage extensions.
    The problem is that the FrontPage patch modifies several Apache structures,
    that PHP relies on.
    Recompiling PHP (using 'make clean ; make') after the FP patch is applied
    would solve the problem.
  <p>
  </dd>

  <dt><b>
    <a name="10.4">10.4.</a> I think I found a bug! Who should I tell?
  </b></dt>
  <dd>
    You should go to the PHP Bug Database and make sure the bug
    isn't a known bug.  If you don't see it in the database, use
    the reporting form to report the bug.  It is important to use
    the bug database instead of just sending an email to one of the
    mailing lists because the bug will have a tracking number assigned
    and it will then be possible for you to go back later and check
    on the status of the bug.  The bug database can be found at <A
    href="http://bugs.php.net/">http://bugs.php.net/</a>.
  <p>
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="11">
<h2>11. Migrating from PHP3 to PHP4</h2>
</a>

<dl>
  <dt><b>
    <a name="11.1">11.1.</a> General information
  </b></dt>
  <dd>
    PHP 4 was designed to be as compatible with earlier versions of
    PHP as possible and very little functionality was broken in the
    process. If you're really unsure about compatibility you should
    install PHP 4 in a test environment and run your scripts there.
  </dd>
  <dt><b>
    <a name="11.2">11.2.</a> Incompatible functions
  </b></dt>
  <dd>
    Since PHP 4 is basically a rewrite of the entire PHP engine there
    was very few functions that were altered and only then some of
    the more exotic ones.
  </dd>
</dl>

<? echo hdelim(); ?>
<a name="12">
<h2>12. Migrating from PHP2 to PHP3</h2>
</a>
<dl>
  <dt><b>
    <a name="12.1">12.1. </a>General information
  </b></dt>
  <dd>
    PHP/FI 2.0 is no longer supported. Please see <a
    href="http://www.php.net/manual/migration.php">the manual</a> for
    information about migration from PHP/FI 2.0.
  </dd>
</dl>


<? echo hdelim(); ?>
<a name="13">
<h2>13. Miscellaneous Questions</h2>
</a>

<dl>
  <dt><b>
    <a name="13.1">13.1.</a> Where did the pop-ups go on the website?  Can I have the code for that?
  </b></dt>
  <dd>
    The yellow pop-up windows on the old site were pretty cool, but
    were very difficult to maintain (since some companies seem to
    enjoy changing the way their browsers work with every new release).
    <p>
    All the code for previous versions of the website is still available
    through CVS.  Specifically, the last version of shared.inc (that had
    all the Javascript and DHTML to do the popups) is available 
    <? print_link("http://cvsweb.php.net/viewcvs.cgi/phpweb/include/shared.inc?rev=1.123&content-type=text/vnd.viewcvs-markup", "here"); ?>.
  </dd>
</dl>

<? echo hdelim(); ?>

<h2>Credits</h2>

<p>
This FAQ was originally written by Jim Winstead. It is currently
maintained by the PHP Documentation Team.
</p>

<?
commonFooter();
?>
