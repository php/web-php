<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'manual/phpfi2.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header('PHP/FI Version 2.0 Documentation');
?>

<!--
Documentation is like sex: when it is good, it is very, very good; and
when it is bad, it is better than nothing.
                ++ Dick Brandon 
-->

  <h1 style="text-align: center;">PHP/FI Version 2.0</h1>

  <h1>Table of Contents</h1>

  <ol>
    <li><a href="#history">Brief History</a></li>

    <li><a href="#install">Installation Instructions</a></li>

    <li><a href="#starting">So, what can I do with PHP/FI?</a></li>

    <li><a href="#redirect">CGI Redirection</a></li>

    <li><a href="#security">Security Issues</a></li>

    <li><a href="#safemode">Safe Mode</a></li>

    <li><a href="#commandline">Running PHP/FI from the Command
    Line</a></li>

    <li><a href="#http_auth">HTTP Authentication</a></li>

    <li><a href="#requestvars">Apache Request Variables</a></li>

    <li><a href="#module">Apache Module Notes</a></li>

    <li><a href="#directives">Apache Module Configuration
    Directives</a></li>

    <li><a href="#fastcgi">FastCGI Support</a></li>

    <li><a href="#access">Access Control</a></li>

    <li><a href="#logging">Access Logging</a></li>

    <li><a href="#relative">Relative vs. Absolute URL's - or, Why
    do my Images Break?</a></li>

    <li>
      <a href="#getpost">How PHP/FI handles GET and POST method
      data</a>

      <ul>
        <li><a href="#selmul"><code>SELECT MULTIPLE</code> and
        PHP</a></li>

        <li><a href="#imagecoord"><code>IMAGE SUBMIT</code> and
        PHP</a></li>
      </ul>
    </li>

    <li><a href="#gd_support">GD (a graphics library for GIF
    creation) Support in PHP</a></li>

    <li><a href="#virtual_hosts">PHP/FI and Virtual Hosts</a></li>

    <li><a href="#upload">File Upload Support</a></li>

    <li><a href="#cookies">Cookie Support</a></li>

    <li><a href="#msql_support">mSQL Support</a></li>

    <li><a href="#pg95_support">Postgres95/PostgreSQL
    Support</a></li>

    <li><a href="#mysql_support">mysql Support</a></li>

    <li><a href="#solid_support">Solid Support</a></li>

    <li><a href="#sybase_support">Sybase Support</a></li>

    <li><a href="#oracle_support">Oracle Support</a></li>

    <li><a href="#illustra_support">Illustra Support</a></li>

    <li><a href="#adabas_support">Adabas Support</a></li>

    <li><a href="#regexp">Regular Expressions</a></li>

    <li><a href="#escapes">Escape Characters</a></li>

    <li><a href="#octal">Octal notation of Unix file
    permissions</a></li>

    <li>
      <a href="#script">PHP/FI Script Language</a>

      <ul>
        <li><a href="#syntax">Syntax</a></li>

        <li><a href="#vars">Variables</a></li>

        <li><a href="#assoc">Associative Arrays</a></li>

        <li><a href="#varvars">Variable Variables</a></li>

        <li><a href="#lang">Language Constructs</a></li>

        <li><a href="#user_funcs">User-Defined Functions</a></li>

        <li><a href="#scope">Scope of Variables</a></li>

        <li><a href="#math">Mathematical Expressions</a></li>

        <li><a href="#while">While Loops</a></li>

        <li><a href="#switch">Switch Construct</a></li>

        <li><a href="#secure">Secure Variables - Defeating GET
        method hacks</a></li>

        <li><a href="#overload">Overloaded Operators and dealing
        with variable types</a></li>

        <li><a href="#quiet">Suppressing Errors from function
        calls</a></li>

        <li><a href="#funcs">Internal Functions</a></li>
      </ul>
    </li>

    <li><a href="#addfunc">Adding your own functions to
    PHP/FI</a></li>

    <li><a href="#hacknotes">Notes for Code Hacks</a></li>
  </ol>
  <hr>

  <h2><a name="history" id="history">Brief History</a></h2>

  <p>PHP began life as a simple little cgi wrapper written in Perl.
  I wrote it in an afternoon during a period between contracts when
  I needed a quick tool to get an idea of who was reading my online
  resume. It was never intended to go beyond my own private use.
  The web server where I had my resume was extremely overloaded and
  had constant problems forking processes. I rewrote the Perl
  wrapper in C to get rid of the considerable overhead of having to
  fork Perl each time my resume was accessed.</p>

  <p>Eventually other people on the same web server came across my
  wrapper and asked if they could use it. Then, as inevitably
  happens, they started asking for more features. I added more
  features and finally put together a semi-complete distribution
  along with documentation, a mailing-list and a FAQ. The name of
  this first package was Personal Home Page Tools, which later
  became Personal Home Page Construction Kit.</p>

  <p>At the same time I started playing with databases and wrote a
  tool to easily embed SQL queries into web pages. It was basically
  another CGI wrapper that parsed SQL queries and made it easy to
  create forms and tables based on these queries. This tool was
  named FI (Form Interpreter).</p>

  <p>PHP/FI version 2.0 is a complete rewrite of these two packages
  combined into a single program. It has now evolved to the point
  where it is a simple programming language embedded inside HTML
  files. The original acronym, PHP, has stuck. It isn't really
  appropriate any longer. PHP/FI is used more for entire web sites
  today than for small Personal Home Page setups. By whatever name,
  it eliminates the need for numerous small Perl cgi programs by
  allowing you to place simple scripts directly in your HTML files.
  This speeds up the overall performance of your web pages since
  the overhead of forking Perl several times has been eliminated.
  It also makes it easier to manage large web sites by placing all
  components of a web page in a single html file. By including
  support for various databases, it also makes it trivial to
  develop database enabled web pages. Many people find the embedded
  nature much easier to deal with than trying to create separate
  HTML and CGI files.</p>

  <p>PHP Version 3.0 is yet another rewrite. If you are just
  starting out with PHP, I suggest that you start with Version 3.0
  instead of continuing with 2.0 at this point. PHP3 is quickly
  going to replace PHP/FI 2.0 and all development efforts are now
  focused on PHP3. Any remaining bugs in PHP/FI 2.0 are unlikely to
  be fixed unless they are straightforward. More information on
  PHP3 can be found at <a href=
  "http://www.lerdorf.on.ca/php3/">http://www.lerdorf.on.ca/php3</a>.</p>

  <p>Throughout this documentation any references to PHP, FI or
  PHP/FI all refer to the same thing. The difference between PHP
  and FI is only a conceptual one. Both are built from the same
  source distribution. When I build the package without any access
  logging or access restriction support, I call my binary FI. When
  I build with these options, I call it PHP.</p>
  <hr>

  <h2><a name="install" id="install">Installation
  Instructions</a></h2>

  <dl>
    <dt><span class="big">Before You Begin</span></dt>

    <dd>
      <p>If you have absolutely no Unix experience, you may want to
      ask around for someone with a little bit of Unix knowledge to
      help you through this installation. Every attempt has been
      made to make it as simple as possible, but since the software
      is quite involved and relies on a number of different
      components, it is not realistic to assume it will go smoothly
      on all systems. You will probably need someone around who
      knows the particulars of the destination system well.</p>
    </dd>

    <dt><span class="big">Things You Need To Know Before
    Installing</span></dt>

    <dd>
      <p>- Can you run both get and post method cgi programs on
      your server?<br>
      <em>This is not relevant if you installing the Apache module
      version.</em> If not, you can not use this package. On many
      public ISP's CGI programs are either disallowed or severely
      restricted. If this is the case on your system, talk to your
      system administrator and ask him/her to have a look at this
      package and see if they will install it for you.</p>
    </dd>

    <dd>
      <p>- If you have mSQL installed on your system, you need to
      know the base directory of this installation.</p>
    </dd>

    <dd>
      <p>- If you have Postgres95 or PostgreSQL installed on your
      system, you need to know the base directory of this
      installation.</p>
    </dd>

    <dd>
      <p>- If you are going to be storing log and access
      configuration files in an NFS-mounted directory and your
      system does not provide NFS file locking then you will need
      to define the NFS_HACK variable manually in the src/Makefile
      and you may want to use a slightly modified version of the
      gdbm library. See the <strong>nfs_hack.txt</strong> file in
      the doc directory for more information on this.</p>
    </dd>

    <dd>
      <p>- Note that if you are not interested in using PHP to
      track accesses to your pages, do not compile this option into
      the binary. You should also leave out the access restriction
      code. There is considerable overhead in including these
      options.</p>
    </dd>

    <dd>
      <p>- If you are installing the Apache module version, you
      will need to know the Apache src code directory location.</p>
    </dd>

    <dt><span class="big">Installation Steps</span></dt>

    <dd>
      <p><em><strong>Step 1.</strong></em></p>

      <p>Run the install program: <code>./install</code></p>

      <p>You will be asked a number of questions. If you do not
      understand what is being asked, simply hit return. The
      default choice should be safe on most systems. This doesn't
      apply for the questions asking you to specify a directory for
      your configuration and log files however. Choose any
      directory to which the httpd (usually "nobody") has write
      privileges. You may create this directory manually somewhere
      and simply <strong><code>chown nobody
      directory</code></strong>.</p>

      <p><em><strong>Step 2.</strong></em></p>

      <p>Go into the src directory: <code>cd src</code></p>

      <p>Have a look at the php.h file. There are a number of
      compile-time options that can be set here.</p>

      <p><em><strong>Step 3.</strong></em></p>

      <p>type: <code>make</code></p>

      <p>This will create the actual executable program file named
      <em>php.cgi</em> by default, or if you are installing the
      Apache module, it will create a <em>libphp.a</em> file.</p>

      <p><em><strong>Step 4. (if you are not installing the Apache
      module version)</strong></em></p>

      <p>Copy the <strong>php.cgi</strong> binary to your system's
      cgi-bin directory. If you do not have access to do this and
      wish to install it in your own personal directory, you may do
      so, but you should set the setuid bit on the executable with:
      <code>chmod u+s /path/php.cgi</code></p>

      <p>If you do not make set the setuid bit on the binary then
      any files created by the binary will be owned by the user id
      under which the web server runs. If this is acceptable, then
      you can safely leave the setuid bit off.</p>

      <p><em><strong>Step 4. (if you are installing the Apache
      module version)</strong></em><br>
      Change to your Apache src directory where the
      <em>mod_php.c</em> and <em>mod_php.h</em> files should have
      been copied to. If they weren't which usually happens because
      of permission problems, copy these two files there manually.
      Edit your Apache Configuration file and add the EXTRA_LIBS
      line which was produced at the end of <strong>Step
      3</strong>. And add:</p>

      <p><code><strong>Module php_module mod_php.o</strong></code></p>

      <p>to the very end of the file. Then type:
      <strong>./Configure</strong> and then <strong>make</strong>
      to rebuild your Apache httpd binary. Install this binary.</p>

      <p>Next you need to edit your Apache conf/srm.conf file and
      add a line like:</p>

      <p><code><strong>AddType application/x-httpd-php
      .phtml</strong></code></p>

      <p>This defines a new MIME, application/x-httpd-php, which
      will trigger the PHP module to parse any file ending with the
      <em>.phtml</em> extension. You can pick any extension you
      like for this.</p>

      <p>You may not want to enable everyone to run PHP parsed
      files. You can place the above AddType line within
      &lt;Location /path&gt;....&lt;/Location&gt; directives in the
      <em>access.conf</em> file to only allow PHP-parsed documents
      in certain directories on your server.</p>

      <p>Now you are ready to restart your httpd server. See the
      <a href="#module">Apache Module Notes</a> for more details on
      configuring the PHP Module.</p>
    </dd>

    <dt><span class="big">Testing the software</span></dt>

    <dd>
      <p>Once installed you can test to see if your executable
      works by entering a URL similar to the following in your
      browser:</p>

      <p><code>http://your.site.domain/cgi-bin/php.cgi</code></p>

      <p>This should show you a page which contains the version
      number along with various other useful information.</p>

      <p>To test the Apache module version, create any file with a
      .phtml extension and put a tag like: &lt;?phpinfo()&gt; in
      the file and see if it gets parsed.</p>
    </dd>

    <dt><span class="big">Using the software</span></dt>

    <dd>
      <p>To actually use the software on an existing HTML file, you
      can simply append the path to your file to the above URL.
      ie.</p>

      <p>
      <code>http://your.site.domain/cgi-bin/php.cgi/path/file.html</code></p>

      <p>You should have a look at the <a href="#redirect">CGI
      Redirection</a> section of this documentation. Running PHP/FI
      through a redirect means you can automatically have a URL
      like <em>http://your.site.domain/file.phtml</em> be parsed by
      PHP/FI.</p>

      <p>This does not apply to Apace module users.</p>
    </dd>
  </dl>
  <hr>

  <h2><a name="starting" id="starting">So, what can I do with
  PHP/FI?</a></h2>

  <p>The first thing you will notice if you run a page through
  PHP/FI is that it adds a footer with information about the number
  of times your page has been accessed (if you have compiled access
  logging into the binary). This is just a very small part of what
  PHP/FI can do for you. It serves another very important role as a
  form interpreter cgi, hence the FI part of the name. For example,
  if you create a form on one of your web pages, you need something
  to process the information on that form. Even if you just want to
  pass the information to another web page, you will have to have a
  cgi program do this for you. PHP/FI makes it extremely easy to
  take form data and do things with it.</p>

  <p><em><strong>A simple example</strong></em></p>

  <p>Suppose you have a form:</p>

  <p><code>&lt;FORM ACTION="/cgi-bin/php.cgi/~userid/display.html"
  METHOD=POST&gt;<br>
  &lt;INPUT TYPE="text" name="name"&gt;<br>
  &lt;INPUT TYPE="text" name="age"&gt;<br>
  &lt;INPUT TYPE="submit"&gt;<br>
  &lt;/FORM&gt;</code></p>

  <p>Your display.html file could then contain something like:</p>

  <p><code>&lt;?echo "Hi $name, you are $age years
  old!&lt;p&gt;"&gt;</code></p>

  <p>It's that simple! PHP/FI automatically creates a variable for
  each form input field in your form. You can then use these
  variables in the ACTION URL file.</p>

  <p>The next step once you have figured out how to use variables
  is to start playing with some logical flow tags in your pages.
  For example, if you wanted to display different messages based on
  something the user inputs, you would use if/else logic. In our
  above example, we can display different things based on the age
  the user entered by changing our display.html to:</p>
  <pre>
&lt;?
    if($age&gt;50);
        echo "Hi $name, you are ancient!&lt;p&gt;";
    elseif($age&gt;30);
        echo "Hi $name, you are very old!&lt;p&gt;";
    else;
        echo "Hi $name.";
    endif;
&gt;
</pre>

  <p>PHP/FI provides a very powerful scripting language which will
  do much more than what the above simple example demonstrates. See
  the section on the <a href="#script">PHP/FI Script Language</a>
  for more information.</p>

  <p>You can also use PHP/FI to configure who is allowed to access
  your pages. This is done using a built-in configuration screen.
  With this you could for example specify that only people from
  certain domains would be allowed to see your pages, or you could
  create a rule which would password protect certain pages. See the
  <a href="#access">Access Control</a> section for more
  details.</p>

  <p>PHP/FI is also capable of receiving file uploads from any
  RFC-1867 compliant web browser. This feature lets people upload
  both text and binary files. With PHP/FI's access control and
  logical functions, you have full control over who is allowed to
  upload and what is to be done with the file once it has been
  uploaded. See the <a href="#upload">File Upload</a> section for
  more details.</p>

  <p>PHP/FI has support for a database package called mSQL. This
  allows you to put information into a database and access this
  information through simple embedded SQL queries right in your
  .HTML files. Adding a database back-end to a web page has never
  been easier. See the section on <a href="#msql_support">mSQL
  Support</a> for more information.</p>

  <p>PHP/FI has support for the Postgres95/PostgreSQL database
  package. It supports embedded SQL queries in your .HTML files.
  See the section on <a href="#pg95_support">Postgres95/PostgreSQL
  Support</a> for more information.</p>

  <p>PHP/FI also has support for the mysql database package. It
  supports embedded SQL queries in your .HTML files. See the
  section on <a href="#mysql_support">mysql Support</a> for more
  information.</p>
  <hr>

  <h2><a name="redirect" id="redirect">CGI Redirection</a></h2>

  <dl>
    <dt><strong>Apache 1.0.x Notes</strong></dt>

    <dd>
      <p>A good way to run PHP/FI is by using a cgi redirection
      module with the Apache server. Please note that you do not
      need to worry about redirection modules if you are using the
      Apache module version of PHP/FI. There are two of these
      redirection modules available. One is developed by Dave
      Andersen &lt;angio@aros.net&gt; and it is available at
      <a href=
      "ftp://ftp.aros.net/pub/util/apache/mod_cgi_redirect.c">ftp://ftp.aros.net/pub/util/apache/mod_cgi_redirect.c</a>
      and the other comes bundled with Apache and is called
      mod_actions.c. The modules are extremely similar. They differ
      slightly in their usage. Both have been tested and both work
      with PHP/FI.</p>

      <p>One large caveat at the time of this writing (Apr.20/96)
      is that the current official Apache release (1.0.5) has a
      severe limitation which prevents cgi redirected requests from
      having any post-method data associated with them. I have
      tracked this down and fixed it in my version of Apache, and
      there is an official patch available in the <a href=
      "http://php.iquest.net/files/">File Archives</a> on the
      <a href="http://php.iquest.net/">PHP Home Page</a>.</p>

      <p>A second rather large caveat with Apache 1.0.x is that it
      does not align double types correctly on most architectures.
      You may find yourself getting strange bus errors from your
      httpd when using mod_php, either upgrade to Apache 1.1 or
      edit the <i>alloc.c</i> Apache source file. In this file you
      will find the following piece of code:</p>
      <pre>
  union align
  {
    /* Types which are likely to have the longest RELEVANT alignment
     * restrictions... we don't do much with doubles.
     */

    char *cp;
    void (*f)();
    long l;
    FILE *fp;
  };
</pre>

      <p>You will need to add a double to this line and recompile
      your Apache server. The correct block of code is:</p>
      <pre>
  union align
  {
    /* Types which are likely to have the longest RELEVANT alignment
     * restrictions... we don't do much with doubles.
     */

    char *cp;
    void (*f)();
    long l;
    FILE *fp;
    double d;
  };
</pre>

      <p>These problems have all been fixed in later versions of
      Apache.</p>

      <p>Check the Apache documentation on how to add a module.
      Generally you add the module name to a file called
      <em>Configuration</em>. The line to be added if you want to
      use the mod_actions module is:</p>

      <p><code>Module action_module mod_actions.o</code></p>

      <p>If you are using the mod_cgi_redirect.c module add this
      line:</p>

      <p><code>Module cgi_redirect_module mod_cgi_redirect.o</code></p>

      <p>Then compile your httpd and install it. To configure the
      cgi redirection you need to either create a new mime type in
      your <em>mime.types</em> file or you can use the
      <strong>AddType</strong> command in your <em>srm.conf</em>
      file to add the mime type. The mime type to be added should
      be something like this:</p>

      <p><code>application/x-httpd-php phtml</code></p>

      <p>If you are using the mod_actions.c module you need to add
      the following line to your <em>srm.conf</em> file:</p>

      <p><code>Action application/x-httpd-php
      /cgi-bin/php.cgi</code></p>

      <p>If you are using mod_cgi_redirect.c you should add this
      line to <em>srm.conf</em>:</p>

      <p><code>CgiRedirect application/x-httpd-php
      /cgi-bin/php.cgi</code></p>

      <p>Don't try to use both mod_actions.c and mod_cgi_redirect.c
      at the same time.</p>

      <p>Once you have one of these cgi redirection modules
      installed and configured correctly, you will be able to
      specify that you want a file parsed by php/fi simply by
      making the file's extension <strong>.phtml</strong>.
      Furthermore, if you add <strong>index.phtml</strong> to your
      <strong>DirectoryIndex</strong> configuration line in your
      <em>srm.conf</em> file then the top-level page in a directory
      will be automatically parsed by php if your index file is
      called index.phtml.</p>
    </dd>

    <dt><strong>Netscape HTTPD</strong></dt>

    <dd>
      <p>You can automatically redirect requests for files with a
      given extension to be handled by PHP/FI by using the Netscape
      Server CGI Redirection module. This module is available in
      the <a href="http://php.iquest.net/files/">File Archives</a>
      on the <a href="http://php.iquest.net/">PHP/FI Home Page</a>.
      The README in the package explicitly explains how to
      configure it for use with PHP/FI.</p>
    </dd>

    <dt><strong>NCSA HTTPD</strong></dt>

    <dd>
      <p>NCSA does not currently support modules, so in order to do
      cgi redirection with this server you need to modify your
      server source code. A patch to do this with NCSA 1.5 is
      available in the <a href=
      "http://php.iquest.net/files/">PHP/FI file archives</a>.</p>
    </dd>
  </dl>
  <hr>

  <h2><a name="security" id="security">Security Issues</a></h2>

  <p>The CGI version of PHP/FI does <strong>not</strong> read any
  <em>.htaccess</em> files which may be present in a directory.
  This means that if you have files that are protected using the
  standard .htaccess server-based access control feature, people
  could potentially circumvent this security by loading the page
  through PHP/FI. Note that this is not an issue for the Apache
  module version of PHP/FI.</p>

  <p>A second problem with the CGI version is that if it is placed
  in the system's cgi-bin directory it can be used to view any file
  on your system as long as the user id it runs as has access to
  it.</p>

  <p>There are a couple of different solutions to this problem. The
  easiest is probably to use the <strong>PATTERN_RESTRICT</strong>
  feature found in <em>php.h</em>. This lets you define an
  extension (or a pattern of extensions) which are allowed to be
  parsed by PHP/FI. If a file does not have this extension and
  someone tries to load it with PHP/FI, an <em>access denied</em>
  message will appear.</p>

  <p>Another solution is to use the PHP/FI access control mechanism
  to mimic the access control setup you have in your .htaccess
  file. Keeping this information in two places can be tedious
  though, and the two systems don't share all of the same
  features.</p>

  <p>The problem can also be solved using file permissions. PHP/FI
  can be set up to run setuid as any user you wish. Then files that
  are to be read by PHP/FI can be given appropriate permissions and
  files not to be read by PHP/FI should be owned by another user id
  and have their permissions changed accordingly.</p>

  <p>For additional security options related to sites which provide
  shared access to PHP, see the <a href="#safemode">Safe Mode</a>
  section.</p>
  <hr>

  <h2><a name="safemode" id="safemode">Safe Mode</a></h2>

  <p>PHP's Safe Mode tries to solve the common problem faced by
  many ISP's regarding letting all their users run CGI programs.
  The common mechanism for making shared CGI access more secure is
  to use a cgi wrapper like the su_exec utility that comes with
  Apache. This will not work for PHP when it is running as a module
  because it is not a separate process that can be setuid'ed.</p>

  <p>It is based on a file permission scheme. Simply put, if a file
  is either owned by the same user id as the script that is trying
  to access it, or if the file is in a directory that is owned by
  the same user as the script that is trying to access it, then the
  access is allowed. One caveat here is that you must make sure
  that your OS does not allow non-root user to chown away the
  ownership on one of their files. Many older SysV systems allow
  this. The most common one is Irix. It is possible to change this
  behaviour at the OS level on Irix.</p>

  <p>Safe Mode applies to each function which could possibly be a
  security risk. Below is the current list of checks applied to
  each relevant function. In the following list, PHP UID refers to
  the user id of the owner of the current file being parsed by PHP,
  and HTTP UID refers to the user id the httpd process is running
  as (usually nobody).</p>

  <dl>
    <dt>Include, ReadFile, Fopen, File, Link, Unlink, Symlink,
    Rename, RmDir, ChMod, ChOwn, ChGrp</dt>

    <dd>Owner of file to be included must either be the PHP UID or
    the directory in which the file resides must be owned by the
    PHP UID.</dd>

    <dt>Exec, System, PassThru and Popen</dt>

    <dd>Executables to be forked and executed must reside in the
    directory defined by the PHP_SAFE_MODE_EXEC_DIR #define in
    php.h when PHP is compiled.</dd>

    <dt>Mysql_Connect</dt>

    <dd>This function takes an optional username to use to connect
    to an MySQL database. When in safe mode, this username must
    either be the username of the owner of the current file being
    parsed, or the name of the httpd user (usually nobody).</dd>

    <dt>HTTP Authentication</dt>

    <dd>The numerical user id of the owner of the script containing
    the HTTP Authentication code will be prepended to the
    authentication realm. This is to prevent someone from writing a
    password grabbing script which spoofs another authenticated
    page on the same server.</dd>
  </dl>
  <hr>

  <h2><a name="commandline" id="commandline">Running PHP/FI from
  the command line</a></h2>

  <p>If you build the CGI version of PHP/FI, you can use it from
  the command line simply typing: <code>php.cgi filename</code> where
  filename is the file you want to parse. You can also create
  standalone PHP/FI scripts by making the first line of your script
  look something like:</p>
  <pre>
    #!/usr/local/bin/php.cgi -q
</pre>The "-q" suppresses the printing of the HTTP headers. You can
leave off this option if you like.
  <hr>

  <h2><a name="http_auth" id="http_auth">HTTP
  Authentication</a></h2>

  <p>The HTTP Authentication hooks in PHP/FI are only available
  when it is running as an Apache module. In an Apache module
  PHP/FI script, it is possible to use the Header() command to send
  an "Authentication Required" message to the client browser
  causing it to pop up a Username/Password input window. Once the
  user has filled in a username and a password, the URL containing
  the PHP/FI script will be called again with the variables,
  $PHP_AUTH_USER, $PHP_AUTH_PW and $PHP_AUTH_TYPE set to the user
  name, password and authentication type respectively. Only "Basic"
  authentication is supported at this point.</p>

  <p>An example script fragment which would force client
  authentication on a page would be the following:</p>
  <pre>
    &lt;?
        if(!$PHP_AUTH_USER) {
            Header("WWW-authenticate: basic realm=\"My Realm\"");
            Header("HTTP/1.0 401 Unauthorized");
                        echo "Text to send if user hits Cancel button\n"
            exit;
        } else {
            echo "Hello $PHP_AUTH_USER.&lt;P&gt;";
            echo "You entered $PHP_AUTH_PW as your password.&lt;P&gt;";
        }
    &gt;
</pre>

  <p>Instead of simply printing out the $PHP_AUTH_USER and
  $PHP_AUTH_PW, you would probably want to check the username and
  password for validity. Perhaps by sending a query to a database,
  or by looking up the user in a dbm file.</p>

  <p>Watch out for buggy Internet Explorer browsers out there. They
  seem very picky about the order of the headers. Sending the
  <b>WWW-authenticate</b> header before the <b>HTTP/1.0 401</b>
  header seems to do the trick for now.</p>

  <p>In order to prevent someone from writing a script which
  reveals the password for a page that was authenticated through a
  traditional external mechanism, the PHP_AUTH variables will not
  be set if external authentication is enabled for that particular
  page.</p>

  <p>Note however that the above does not prevent someone who
  controls a non-authenticated URL from stealing passwords from
  authenticated URL's on the same server. The PHP_AUTH_VARS define
  in <em>php.h</em> can be undefined to make sure that these
  variables will never be set and thus disable anybody from using
  mod_php to try to steal passwords.</p>
  <hr>

  <h2><a name="requestvars" id="requestvars">Apache Request
  Variables</a></h2>

  <p>When running PHP as an Apache module, you may access the
  request header variables sent by the remote browser by prepending
  <b>$req_</b> to the beginning of the header value you would like
  to use. If the request name contains a <b>-</b> character such as
  User-Agent, then you need to map the - to _ (an underscore). ie.
  reference it as $req_User_Agent. The <a href=
  "#phpinfo">phpinfo()</a> function can be used to display all the
  request headers.</p>

  <p>eg.</p>
  <pre>
    &lt;
        echo "$req_connection&lt;br&gt;";
        echo "$req_host&lt;br&gt;";
    &gt;
</pre>The above simple script might output:
  <pre>
    Keep-Alive
    www.host.com
</pre>
  <hr>

  <h2><a name="module" id="module">Apache Module Notes</a></h2>

  <p>Running PHP/FI as an Apache module is the most efficient way
  of using the package. Running it as a module means that the
  PHP/FI functionality is combined with the Apache server's
  functionality in a single program. There are a number of
  advantages to running it as a module:</p>

  <dl>
    <dt><strong>Performance</strong></dt>

    <dd>
      <p>Performance-wise it is a lot faster than traditional CGI
      programs. In fact, when running PHP/FI as a module, there is
      no CGI involved. The script code in the HTML files is
      executed directly by the Apache web server process.</p>
    </dd>

    <dt><strong>Security</strong></dt>

    <dd>
      <p>When running as a module, the normal httpd-based access
      restriction rules defined either in the Apache conf files or
      in private .htaccess files are first applied before the
      module is allowed to parse the file. Alternatively, you can
      also create PHP/FI scripts that control the normal
      httpd-based authentication. See <a href="#http_auth">HTTP
      Authentication</a>.</p>
    </dd>

    <dt><strong>Configurability</strong></dt>

    <dd>
      <p>Since the parser is always active inside the httpd
      process, it can be configured on startup using the same
      configuration files used to configure the httpd process. The
      module can even be configured on a per-directory basis by
      placing the <a href="#directives">PHP configuration
      directives</a> in the <em>.htaccess</em> files.</p>
    </dd>

    <dt><strong>Basis for custom server-based
    function</strong></dt>

    <dd>
      <p>For C programmers interested in accessing their functions
      from within Apache, the PHP/FI framework provides a very
      simple interface to Apache and to PHP itself. It is much
      easier to add a function to PHP and call that from a parsed
      page than it is to write an entire Apache module from
      scratch. See the <a href="#addfunc">Adding your own internal
      functions to PHP/FI</a> sections at the end of this document
      for further details.</p>
    </dd>
  </dl>

  <h2><a name="directives" id="directives">Apache Module
  Configuration Directives</a></h2>

  <p>The following directives can be placed either in the
  <em>srm.conf</em> file, or within
  &lt;Directory&gt;...&lt;/Directory&gt; tags in
  <em>access.conf</em> or in &lt;Location
  /path&gt;...&lt;/Location&gt; tags in <em>access.conf</em> or in
  individual <em>.htaccess</em> files. In order for the directives
  to work in .htaccess files, the Options override must be set on
  the AllowOverride Apache directive, with the exception of the
  phpEngine directive which is only available in the *.conf
  files.</p>

  <dl>
    <dt><strong>phpShowInfo <em>on</em>|<em>off</em></strong></dt>

    <dd>Turn the PHP info footers on or off. Default is on.</dd>

    <dt><strong>phpLogging <em>on</em>|<em>off</em></strong></dt>

    <dd>Turn logging on or off. Default is on.</dd>

    <dt><strong>phpDebug <em>on</em>|<em>off</em></strong></dt>

    <dd>Turn automatic ?info debug screen on or off. Default is
    off.</dd>

    <dt><strong>phpUploadTmpDir <em>directory</em></strong></dt>

    <dd>Set the directory where form-uploaded files will be
    placed.</dd>

    <dt><strong>phpDbmLogDir <em>directory</em></strong></dt>

    <dd>Set the directory where dbm-based logging files will be
    written.</dd>

    <dt><strong>phpSQLLogDB <em>database</em></strong></dt>

    <dd>Set name of SQL database to use for logging. Default is
    "phpfi"</dd>

    <dt><strong>phpSQLLogHost <em>hostname</em></strong></dt>

    <dd>Set hostname where SQL database to use for logging is
    found. Default is localhost.</dd>

    <dt><strong>phpAccessDir <em>directory</em></strong></dt>

    <dd>Set the directory where PHP-internal access control files
    are stored.</dd>

    <dt><strong>phpMaxDataSpace <em>KiloBytes</em></strong></dt>

    <dd>Max size a sub-pool can grow to within the PHP module.
    Setting this value to a low number will minimize the impact
    that mod_php will have on your system, but it may also limit
    people from writing complex scripts. The default is 8K.</dd>

    <dt><strong>phpIncludePath <em>colon-separated
    path</em></strong></dt>

    <dd>A colon-separated list of directories where php will look
    for files in when running <a href="#include">include()</a>. The
    default is to look only in the current directory.</dd>

    <dt><strong>phpAutoPrependFile <em>file name</em></strong></dt>

    <dd>Before the actual PHP/FI file is parsed, you may give a
    file name here that is parsed before the "main file", using
    PHP's Include() function (which means phpIncludePath applies
    for the file name). Keep in mind that you can make it difficult
    for yourself to use the Header() function in the main file if
    you write HTML from an auto-prepended file.</dd>

    <dt><strong>phpAutoAppendFile <em>file name</em></strong></dt>

    <dd>The name of a file parsed (using PHP's Include()
    function)after the actual PHP/FI file has been parsed, similar
    to phpAutoPrependFile.</dd>

    <dt><strong>phpAdaDefDB <em>database</em></strong></dt>

    <dd>Default Adabas database to use. No default value</dd>

    <dt><strong>phpAdaUser <em>username</em></strong></dt>

    <dd>Default Adabas database user. No default value</dd>

    <dt><strong>phpAdaPW <em>password</em></strong></dt>

    <dd>Default Adabas database password. No default value</dd>

    <dt><strong>phpEngine <em>on</em>|<em>off</em></strong></dt>

    <dd>Turn the PHP parsing engine on or off. The default is
    <em>on</em> and this directive is only useful for sites that
    wish to allow directives from the AllowOverride Options list of
    directives to function in .htaccess files while at the same
    time restricting mod_php access. The common way to handle
    per-virtual host php installs is to enable the PHP mime type
    with an AddType directive on a per virtual host basis and then
    put "phpEngine off" in the non-PHP virtual host blocks. If a
    non PHP customer tries to circumvent things by placing the PHP
    mime type in their .htaccess, the phpEngine off setting
    restricts the PHP parser from functioning.</dd>

    <dt><strong>phpLastModified
    <em>on</em>|<em>off</em></strong></dt>

    <dd>Since php pages are dynamic, they are processed and sent to
    the browser each time you access them. But sometimes, when you
    use php for basic includes, the parsed page does not change as
    long as the source doesn't. It that case, you may want to avoid
    page regeneration/reloading. If phpLastModified is turned on
    Apache will send the Last-Modified tag to the browser, so that
    the page will only be reloaded when it changes. (not that if
    you are using page logging, multiple accesses will not be
    logged!)</dd>
  </dl>

  <p>All of these directives are optional. If a directive is not
  specified anywhere, the compile-time default will be used.</p>
  <hr>

  <h2><a name="fastcgi" id="fastcgi">FastCGI Support</a></h2>

  <p>PHP/FI can be compiled with FastCGI support. You will need
  fetch and compile <a href="http://www.fastcgi.com">FCGI
  Development Kit</a> for your platform before compiling PHP/FI.
  You will also need to get <a href="#redirect">CGI Redirection</a>
  working. Then follow the instructions in the FastCGI
  documentation for configuring FastCGI for your platform. If you
  are using the mod_fastcgi module with the Apache server, here are
  the step-by-step instructions:</p>

  <ul>
    <li>Edit your Apache Configuration file and add the mod_fastcgi
    module, then recompile Apache.</li>

    <li>Edit your <em>srm.conf</em> file and add lines similar
    to:<br>
    <code>AddType application/x-httpd-fcgi .fcgi<br>
    AppClass /usr/local/etc/httpd/fcgi-bin/php.fcgi -processes
    4<br>
    AddType application/x-httpd-fphp .fhtml<br>
    Action application/x-httpd-fphp
    /fcgi-bin/php.fcgi<br></code></li>

    <li>Copy your <em>php.cgi</em> binary to
    <em>/usr/local/etc/httpd/fcgi-bin/php.fcgi</em></li>
  </ul>

  <p>Now, any pages with the .fhtml extension will be handed off to
  the FastCGI php.fcgi process which is already running. The
  php.fcgi binary will still work as a normal CGI binary, so you
  could just create a symbolic link from php.cgi to php.fcgi.</p>

  <p>If you are not using Apache, the above steps will be similar,
  but not identical. CGI Redirection mechanisms are available for
  NCSA and Netscape servers at the <a href=
  "http://php.iquest.net/files/">PHP/FI File Archive</a>.</p>
  <hr>

  <h2><a name="access" id="access">Access Control</a></h2>

  <p>Note that the built-in PHP/FI based access control is likely
  to be discontinued in future versions. You should seriously
  consider using the security mechanism that comes with your web
  server instead.</p>

  <p>If you chose to include access control when you compiled the
  package, you may append <em>?config</em> to any URL to edit the
  access control file. ie.</p>

  <p>
  <code>http://your.machine.domain/cgi-bin/php.cgi/path/file.html?config</code></p>

  <p>Your configuration password will initially be set to your user
  id. If your user id does not work as your password, it probably
  means that PHP could not read the /etc/passwd file to locate your
  user id. If this is the case, the initial password will be set to
  "<strong>php</strong>". It is a good idea to change this
  password. Note that multiple users may maintain their own
  personal configuration files through a single PHP/FI binary.</p>

  <p>Access Control can be quite confusing initially. The ?config
  screen is divided up into a number of sections. The top section
  is for changing the password used to make sure that only people
  who know this password can change access control characteristics.
  In a system-wide installation, each user has his or her own
  configuration screen with his or her own password.</p>

  <p>The second section of the ?config screen consists of a number
  of tables. Each table defines a rule-set. The first rule-set is
  always the default rule-set. This default rule-set is used if a
  page does not have a rule-set defined specifically for it. After
  the default rule-set, any number of specific rule-set tables will
  follow.</p>

  <p>To add a rule-set for a specific file, enter the URL of the
  file in your browser and add <em><strong>?config</strong></em> to
  the end of the URL. On the ?config screen that comes up you will
  see that a rule-set has been added for this page, if it wasn't
  already there. When a new rule-set is added, it is initially set
  to be the same as the default rule-set. The following picture
  shows two simple rule-sets. First a default rule-set which just
  indicates that hits from all domains should be logged, and
  second, for the file /~rasmus/test.html and only that file, any
  users coming from a "<em>.edu</em>" domain will not be granted
  access.</p>

  <p><img src="gifs/config.gif" alt="[Image of ?config screen]"></p>

  <p>To edit a rule-set modify the fields until the desired
  configuration is reached within a rule-set and then hit the
  "<em>Submit Changes</em>" button. If more rules are needed, hit
  the "<em>Add Rule</em>" button and then edit the added rule.</p>

  <p>To delete a rule, select the checkbox to the right of the rule
  and hit the "<em>Submit Changes</em>" button. The screen will
  redraw and the rule should disappear.</p>

  <p>Note that you need to enter a regular expression in the
  pattern field. See the section on regular expressions in this
  documentation for more details.</p>
  <hr>

  <h2><a name="logging" id="logging">Access Logging</a></h2>

  <p>Access Logging is another optional feature which can be
  enabled at compile-time by answering <em>Yes</em> to the question
  in the install script. You may either store your access log data
  in dbm files, in an mSQL database, or in an mysql database. The
  latter two are more powerful, but is also a bit more difficult to
  set up.</p>

  <p>To use dbm files for storing your access logs, you will need
  to specify a directory in which log files can be written. PHP
  will try to create this directory if it doesn't exist, but to
  make sure it has the proper permissions, you may want to create
  this directory yourself before running PHP for the first time.
  The permissions on the directory should be such that the user id
  under which the PHP cgi program will run can write to the
  directory.</p>

  <p>To use an mSQL or mysql database for storing your access log
  data, you need to first make sure you have mSQL or mysql
  installed and running on your system. Then you need to create a
  database. The default name is "phpfi" although this can be
  changed in <em>src/php.h</em>. To create this database for mSQL,
  type:</p>
  <pre>
    msqladmin create phpfi
</pre>

  <p>or for mysql type:</p>
  <pre>
    mysqladmin create phpfi
</pre>

  <p>Then for mSQL, edit your <em>msql.acl</em> file and make sure
  the permissions on the database are correct. Something like the
  following should suffice:</p>
  <pre>
    database=phpfi
    read=*
    write=nobody,&lt;your user id&gt;
    access=local
</pre>

  <p>For mysql, you need to make sure the httpd user (usually
  "nobody") has access to the database. Unlike mSQL, mysql stores
  access control data in a database. Assuming default permissions,
  you should be able to simply execute the following command:</p>
  <pre>
    echo "INSERT INTO user VALUES ('localhost','nobody','','Y','Y','Y','Y','Y','Y','Y','Y','Y');" | mysql mysql
</pre>

  <p>Don't forget to load this new configuration with:</p>
  <pre>
    mysqladmin reload
</pre>

  <p>For each user id for whom you want to store log data, you need
  to create two tables. The <em>msqllog</em> shell script in the
  scripts directory will do this for you. Simply type:</p>
  <pre>
    msqllog &lt;user id&gt; 
</pre>

  <p>or for mysql, type:</p>
  <pre>
    mysqllog &lt;user id&gt; 
</pre>

  <p>and the script will create the appropriate tables. You may
  need to edit the script to make it reflect where things are
  stored on your system.</p>

  <p>You may want to have a look at this script. It defines the
  field sizes of your log tables. If, for example, you know that
  your file paths exceed 64 characters, you need to bump up the
  filename size in both the <em>logN</em> and the <em>lastN</em>
  tables in this <em>msqllog</em> or <em>mysqllog</em> file.</p>

  <p>Access logging stores information about each "hit" on a page.
  This information can then be summarized by examining these log
  files. An example log file summarizing script is included in the
  package. It is the <code>log.html</code> file in the
  <code>examples</code> directory. This is the dbm log file analyzer.
  The mSQL log file analyzer is called <code>mlog.html</code>. And the
  mysql log file analyzer is called <code>mylog.html</code>. To run it,
  copy it and the other mlog.* files to a directory accessible from
  your web server and type:</p>
  <pre>
    http://your.machine.domain/cgi-bin/php.cgi/path/mlog.html
</pre>

  <p>Or, if you are using the Apache module version, you can give
  the script a ".phtml" extension and call it with:</p>
  <pre>
    http://your.machine.domain/path/mlog.phtml
</pre>

  <p>By default, if you have compiled PHP with access logging
  enabled, then your pages will appear with a footer containing
  some access information. You may not want to see this footer, but
  still log hits. You can turn off this footer with a "phpShowInfo
  off" line in your Apache httpd.conf or .htaccess files if you are
  running Apache. If you are not running Apache, you may turn these
  log footers off either by creating a rule in the <a href=
  "#access">?config</a> section for the page, or by adding a tag
  like this to your page:</p>

  <p><code>&lt;?setshowinfo(0)&gt;</code></p>
  <hr>

  <h2><a name="relative" id="relative">Relative vs. Absolute URL's
  - or, Why do my Images Break?</a></h2>

  <p>A problem common to all CGI wrappers is that the HTTPD program
  changes the current directory to the directory where whatever it
  is loading is stored. In the case of a CGI program, the current
  directory is set to the directory where the CGI program resides.
  This is normally not a problem, except when it comes to relative
  URL's.</p>

  <p>A relative URL is a URL which relies upon the current
  directory being the same as the directory where the current HTML
  file is located. So, for example, if I had the URL:</p>
  <pre>
    http://my.machine/~rasmus/file.html
</pre>

  <p>the actual HTML file might be:</p>
  <pre>
    ~rasmus/public_html/file.html
</pre>

  <p>If within the <code>file.html</code> file I had the tag:</p>
  <pre>
    &lt;IMG SRC="pic.gif"&gt;
</pre>

  <p>when loaded normally this file gif file is expected to be in
  <code>~rasmus/public_html/pic.gif</code>. However, when loaded
  through a CGI wrapper with a URL like:</p>
  <pre>
    http://my.machine/cgi-bin/php.cgi/~rasmus/file.html
</pre>

  <p>then HTTPD sets the current directory to <code>/cgi-bin</code> (or
  wherever the ScriptAlias might point) and subsequently when the
  page is loaded the <code>pic.gif</code> file is expected to be in:
  <code>/cgi-bin/pic.gif</code> which is usually not the desired
  effect.</p>

  <p>The quick way around this problem is to use absolute URL's. In
  the above example if the image tag had been:</p>
  <pre>
    &lt;IMG SRC="/~rasmus/pic.gif"&gt;
</pre>

  <p>then there would have been no problem. Using absolute URL's is
  not always desirable as it makes pages less portable. An obvious
  question you may have at this point is, "Why doesn't PHP just
  change the current directory to the right place?". The answer is
  that PHP actually does change the current directory to the
  location of the HTML file it is displaying. Any file paths used
  inside PHP Script tags, can be relative. The problem is that tags
  outside of PHP's control such as &lt;img &gt; and &lt;a href &gt;
  will not be passed through PHP. When they are parsed, PHP is no
  longer active and the current working directory has been set back
  to the directory specified by the HTTP Daemon.</p>

  <p><strong>The Solution</strong> is a compromise. PHP provides a
  variable called <strong>PATH_DIR</strong>. It contains the
  directory portion of the current HTML file at all times. If this
  PATH_DIR variable is used in the &lt;img &gt; and &lt;a href &gt;
  tags then the effect of a relative URL can be achieved, although
  to the server it will look like an absolute URL when parsed. From
  our above example, the only change we would need to make would be
  to change the img tag to:</p>
  <pre>
    &lt;IMG SRC="&lt;?echo $PATH_DIR&gt;/pic.gif"&gt;
</pre>By using the above, you can move the file containing this tag
around, and the tag will always refer to a <code>pic.gif</code> file in
the same directory as the source HTML file.

  <p>Another way to handle this is to use the traditional &lt;BASE
  HREF=...&gt; in the HTML file.</p>
  <hr>

  <h2><a name="getpost" id="getpost">How PHP handles GET and POST
  method data</a></h2>

  <p>PHP will detect both GET and POST method data coming from HTML
  forms. One important point to understand is that POST method data
  is always treated first if both are present. If a PHP variable is
  defined by the POST method data, or if the variable is defined by
  the HTTP daemon in the Unix environment, then GET method data
  cannot overwrite it. This is to prevent somebody from adding
  <em>?REMOTE_HOST=some.bogus.host</em> to their URL's and thus
  tricking the PHP logging mechanism into recording this alternate
  data. POST method data is however allowed to overwrite these
  variables.</p>

  <p>Any component of the GET data (the data following a '?' in the
  URL) which is of the form, <em>word=something</em> will define
  the variable <em>$word</em> to contain the value
  <em>something</em>. Even if the data is not of this form, it can
  be accessed with the $argv built-in array. For example, in a URL
  like:</p>
  <pre>
    /cgi-bin/php.cgi/file.html?abc+def+EMAIL_ADDR=rasmus@lerdorf.on.ca&amp;var=value
</pre>The relevant components of the PHP symbol table will be:
  <pre>
    $argc       = 4
    $argv[0]    = abc
    $argv[1]    = def
    $argv[2]    = EMAIL_ADDR=rasmus@lerdorf.on.ca&amp;var=value
    $EMAIL_ADDR = rasmus@lerdorf.on.ca
    $var        = value
</pre>

  <p>Notice how the EMAIL_ADDR part of the data shows up both as
  $argv[2] where it is unparsed, and the $EMAIL_ADDR variable is
  created to contain <em>rasmus@lerdorf.on.ca</em>.</p>

  <p>The $EMAIL_ADDR variable was used as an example in the above
  because it is a useful variable if you are using the logging
  features of PHP. By adding:</p>
  <pre>
    ?EMAIL_ADDR=
</pre>

  <p>to any links on a page where the user's email address is
  known, you may propagate it to the next page. The PHP logging
  system will automatically look for this variable and record its
  value as the user's e-mail address in the logs. For any users of
  PHP1, the above serves the same function as adding
  <em>?&lt;!--$email--&gt;</em> to the URL used to do in PHP1. It
  looks a little bit more complex now, but it is also completely
  general allowing you to build your own complex pages.</p>

  <p>In the above example you can also see how multiple variables
  can be defined right in the GET method data by separating each
  with the "&amp;" character. This "&amp;" separated list of
  variables must be the last (or only) component of the GET method
  data for it to be valid.</p>

  <p><a name="selmul" id="selmul"><strong><code>SELECT MULTIPLE</code>
  and PHP</strong></a></p>

  <p>The SELECT MULTIPLE tag in an HTML construct allows users to
  select multiple items from a list. These items are then passed to
  the action handler for the form. The problem is that they are all
  passed with the same widget name. ie.</p>
  <pre>
    &lt;SELECT NAME="var" MULTIPLE&gt;
</pre>

  <p>Each selected option will arrive at the action handler as:</p>

  <p>var=option1<br>
  var=option2<br>
  var=option3</p>

  <p>Each option will overwrite the contents of the previous $var
  variable. The solution is to use PHP/FI's non-indexed array
  feature. The following should be used:</p>
  <pre>
    &lt;SELECT NAME="var[]" MULTIPLE&gt;
</pre>

  <p>This tells PHP/FI to treat <em>var</em> as an array an each
  assignment of a value to var[] adds an item to the array. The
  first item becomes $var[0], the next $var[1], etc. The <a href=
  "#count">count()</a> function can be used to determine how many
  options were selected, and the <a href="#sort">sort()</a>
  function can be used to sort the option array if necessary.</p>
  <hr>
  <a name="imagecoord" id="imagecoord"><strong><code>IMAGE
  SUBMIT</code> and PHP</strong></a>

  <p>When submitting a form, it is possible to use an image instead
  of the standard submit button with a tag like:</p>
  <pre>
    &lt;input type=image src=image.gif name=sub&gt;
</pre>

  <p>When the user clicks somewhere on the image, the accompanying
  form will be transmitted to the server with two additional
  variables, <em>sub_x</em> and <em>sub_y</em>. These contain the
  coordinates of the user click within the image. The experienced
  may note that the actual variable names sent by the browser
  contains a period rather than an underscore, but PHP converts the
  period to an underscore automatically.</p>
  <hr>

  <h2><a name="gd_support" id="gd_support">GD (a graphics library
  for GIF creation) Support in PHP</a></h2>PHP supports the GD
  library version 1.2 written by Thomas Boutell. There is no GD
  code in PHP itself. If you wish to use the GD support in PHP/FI,
  you must obtain the GD library from <a href=
  "http://www.boutell.com/gd/http/gd1.3.tar.gz">http://www.boutell.com/gd/http/gd1.3.tar.gz</a>,
  install it, and then re-install PHP.

  <p>Not all of the GD features are supported by PHP. For a list of
  supported functions see the <a href="#funcs">Alphabetical List of
  Functions</a>. All the GD functions start with the word,
  <em>Image</em>.</p>

  <p>More information on the GD package is available at: <a href=
  "http://www.boutell.com/gd/">http://www.boutell.com/gd/</a>.</p>

  <p><em>GD 1.2 is copyright 1994, 1995 Quest Protein Database
  Center, Cold Springs Harbor Labs.</em></p>
  <hr>

  <h2><a name="virtual_hosts" id="virtual_hosts">PHP/FI and Virtual
  Hosts</a></h2>PHP works fine on virtual host setups supported by
  some http daemons. The one problem that may occur on such a setup
  is related to an inconsistency in the way httpd sets the
  SCRIPT_NAME environment variable. Normally it is set to the path
  of the current CGI program in relation to the top-level ROOT_DIR
  on the httpd server. However, when a virtual domain is used, some
  httpd's do not correctly set the SCRIPT_NAME variable as the
  relative path from the virtual domain's top level directory as it
  should. If the ?config screen gives you an invalid URL error
  message, you know that this problem exists on your setup. You
  will need to edit the <em>php.h</em> file and set the
  VIRTUAL_PATH #define to the path to your <em>php.cgi</em> binary
  relative to your top-level directory.
  <hr>

  <h2><a name="upload" id="upload">File Upload Support</a></h2>

  <p>PHP/FI will automatically detect a file upload from a browser
  which supports the form-based file upload features as proposed by
  <a href="mailto:nebel@xsoft.sd.xerox.com">E. Nebel</a> and
  <a href="mailto:masinter@parc.xerox.com">L. Masinter</a> from
  Xerox and described in <a href=
  "ftp://ds.internic.net/rfc/rfc1867.txt">RFC 1867</a>.</p>

  <p>A file upload screen can be built by creating a special form
  which looks something like this:</p>

  <blockquote>
   <pre>
    &lt;FORM ENCTYPE="multipart/form-data" ACTION="_URL_" METHOD=POST&gt;<br>
    &lt;INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000"&gt;<br>
    Send this file: &lt;INPUT NAME="userfile" TYPE="file"&gt;<br>
    &lt;INPUT TYPE="submit" VALUE="Send File"&gt;<br>
    &lt;/FORM&gt;
   </pre>
  </blockquote>

  <p>The _URL_ should point to a php html file. The MAX_FILE_SIZE
  hidden field must precede the file input field and its value is
  the maximum filesize accepted. The value is in bytes. In this
  destination file, the following variables will be defined upon a
  successful upload:</p>

  <dl>
    <dt><strong>$userfile</strong></dt>

    <dd>
      <p>The temporary filename in which the uploaded file was
      stored on the server machine.</p>
    </dd>

    <dt><strong>$userfile_name</strong></dt>

    <dd>
      <p>The original name of the file on the sender's system.</p>
    </dd>

    <dt><strong>$userfile_size</strong></dt>

    <dd>
      <p>The size of the uploaded file in bytes.</p>
    </dd>

    <dt><strong>$userfile_type</strong></dt>

    <dd>
      <p>The mime type of the file if the browser provided this
      information. An example would be "image/gif".</p>
    </dd>
  </dl>

  <p>The <em><strong>$userfile</strong></em> basename of the above
  variables will match the NAME field in the upload form.</p>

  <p>Files will by default be stored in the server's default
  temporary directory. This can be changed by setting the
  environment variable TMPDIR in the environment in which PHP/FI
  runs. Setting it using a PutEnv() call from within a PHP/FI
  script will not work though. Alternatively, you may hard-code in
  a temporary directory by editing <em>php.h</em> and defining the
  <strong>UPLOAD_TMPDIR</strong> variable.</p>

  <p>The PHP/FI script which receives the uploaded file should
  implement whatever logic is necessary for determining what should
  be done with the uploaded file. You can for example use the
  $file_size variable to throw away any files that are either too
  small or too big. You could use the $file_type variable to throw
  away any files that didn't match a certain type criteria.
  Whatever the logic, you should either delete the file from the
  temporary directory or move it elsewhere.</p>

  <p>Please note that the CERN httpd seems to strip off everything
  starting at the first whitespace in the content-type mime header
  it gets from the client. As long as this is the case, CERN httpd
  will not support the file upload feature.</p>
  <hr>

  <h2><a name="cookies" id="cookies">Cookie Support</a></h2>

  <p>PHP/FI transparently supports HTTP cookies as defined by
  <a href=
  "http://www.netscape.com/newsref/std/cookie_spec.html">Netscape's
  Spec</a>. Cookies are a mechanism for storing data in the remote
  browser and thus tracking or identifying return users. You can
  set cookies using the <a href="#setcookie">SetCookie()</a>
  function. Cookies are part of the HTTP header, so the SetCookie()
  function must be called before any output is sent to the browser.
  This is the same restriction as for the Header() function.</p>

  <p>Any cookies sent to you from the client will automatically be
  turned into a PHP/FI variable just like GET and POST method
  data.</p>

  <p>If you wish to assign multiple values to a single cookie, just
  add <b>[]</b> to the cookie name. For example:</p>
  <pre>
    SetCookie("MyCookie[]","Rasmus Lerdorf", time()+3600);
</pre>Note that a cookie will replace a previous cookie by the same
name in your browser unless the path or domain is different. So,
for a shopping cart application you may want to keep a counter and
pass this along. ie.
  <pre>
    
    $Count++;
    SetCookie("Count",$Count, time()+3600);
    SetCookie("Cart[$Count]",$item, time()+3600);
</pre>
  <hr>

  <h2><a name="msql_support" id="msql_support">mSQL
  Support</a></h2>

  <p>mSQL stands for mini-SQL and is a small and simple SQL
  database engine written by David Hughes. It is available from
  <a href=
  "ftp://ftp.bond.edu.au/pub/Minerva/msql">ftp://ftp.bond.edu.au/pub/Minerva/msql</a></p>

  <p>PHP/FI supports has a rich set of mSQL support functions:</p>

  <dl>
    <dt><a href="#msql">msql()</a></dt>

    <dt><a href="#msql_close">msql_Close()</a></dt>

    <dt><a href="#msql_connect">msql_Connect()</a></dt>

    <dt><a href="#msql_createdb">msql_CreateDB()</a></dt>

    <dt><a href="#msql_dbname">msql_dbName()</a></dt>

    <dt><a href="#msql_dropdb">msql_DropDB()</a></dt>

    <dt><a href="#msql_fieldflags">msql_FieldFlags()</a></dt>

    <dt><a href="#msql_fieldlen">msql_FieldLen()</a></dt>

    <dt><a href="#msql_fieldname">msql_FieldName()</a></dt>

    <dt><a href="#msql_fieldtype">msql_FieldType()</a></dt>

    <dt><a href="#msql_freeresult">msql_FreeResult()</a></dt>

    <dt><a href="#msql_listdbs">msql_ListDBs()</a></dt>

    <dt><a href="#msql_listfields">msql_Listfields()</a></dt>

    <dt><a href="#msql_listtables">msql_ListTables()</a></dt>

    <dt><a href="#msql_numfields">msql_NumFields()</a></dt>

    <dt><a href="#msql_numrows">msql_NumRows()</a></dt>

    <dt><a href="#msql_regcase">msql_RegCase()</a></dt>

    <dt><a href="#msql_result">msql_Result()</a></dt>

    <dt><a href="#msql_tablename">msql_TableName()</a></dt>
  </dl>

  <p>In addition to these functions, PHP/FI can also be compiled to
  automatically escape any forward single quote ( ' ) characters
  found in GET or POST data. If the MAGIC_QUOTES variable is
  defined in the <em>php.h</em> file then these quotes will be
  automatically escaped making it easier to pass form data directly
  to msql queries.</p>
  <hr>

  <h2><a name="pg95_support" id=
  "pg95_support">Postgres95/PostgreSQL Support</a></h2>

  <p>Postgres95/PostgreSQL is a powerful public domain database
  that implements a significant subset of the SQL language. It
  supports many datatypes and commands that are not available in
  mSQL. More information about Postgres and the software itself can
  be found at this URL: <a href=
  "http://www.postgreSQL.org/">http://www.postgreSQL.org/</a>.</p>

  <p>The following PHP functions are available for Postgres95:</p>

  <dl>
    <dt><a href="#pg_connect">pg_Connect()</a></dt>

    <dt><a href="#pg_close">pg_Close()</a></dt>

    <dt><a href="#pg_host">pg_Host()</a></dt>

    <dt><a href="#pg_port">pg_Port()</a></dt>

    <dt><a href="#pg_options">pg_Options()</a></dt>

    <dt><a href="#pg_tty">pg_tty()</a></dt>

    <dt><a href="#pg_dbname">pg_DBname()</a></dt>

    <dt><a href="#pg_exec">pg_Exec()</a></dt>

    <dt><a href="#pg_result">pg_Result()</a></dt>

    <dt><a href="#pg_freeresult">pg_FreeResult()</a></dt>

    <dt><a href="#pg_getlastoid">pg_GetLastOid()</a></dt>

    <dt><a href="#pg_numrows">pg_NumRows()</a></dt>

    <dt><a href="#pg_numfields">pg_NumFields()</a></dt>

    <dt><a href="#pg_fieldnum">pg_FieldNum()</a></dt>

    <dt><a href="#pg_fieldname">pg_FieldName()</a></dt>

    <dt><a href="#pg_fieldtype">pg_FieldType()</a></dt>

    <dt><a href="#pg_fieldsize">pg_FieldSize()</a></dt>

    <dt><a href="#pg_fieldprtlen">pg_FieldPrtLen()</a></dt>

    <dt><a href="#pg_errorMessage">pg_errorMessage()</a></dt>
  </dl>

  <p><strong>Note:</strong> Binary cursors are not supported.</p>

  <p>In addition to these functions, PHP/FI can also be compiled to
  automatically escape any forward single quote ( ' ) and double
  quote ( " ) characters found in GET or POST data. If the
  MAGIC_QUOTES variable is defined in the <em>php.h</em> file then
  these quotes will be automatically escaped making it easier to
  pass form data directly to Postgres queries.</p>

  <p>Here is a sample script that connects to Postgres database on
  localhost called 'mydb' and retrieves the names and ages of
  people in a table:</p>
  <pre>
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
</pre>
  <hr>

  <h2><a name="mysql_support" id="mysql_support">mysql
  Support</a></h2>

  <p>mysql is an clone of the mSQL package. You can get a copy from
  <a href="http://www.tcx.se/">http://www.tcx.se/</a></p>

  <p>PHP/FI supports has a rich set of mysql support functions:</p>

  <dl>
    <dt><a href="#mysql">mysql()</a></dt>

    <dt><a href="#mysql_close">mysql_Close()</a></dt>

    <dt><a href="#mysql_connect">mysql_Connect()</a></dt>

    <dt><a href="#mysql_createdb">mysql_CreateDB()</a></dt>

    <dt><a href="#mysql_dbname">mysql_dbName()</a></dt>

    <dt><a href="#mysql_dropdb">mysql_DropDB()</a></dt>

    <dt><a href="#mysql_fieldflags">mysql_FieldFlags()</a></dt>

    <dt><a href="#mysql_fieldlen">mysql_FieldLen()</a></dt>

    <dt><a href="#mysql_fieldname">mysql_FieldName()</a></dt>

    <dt><a href="#mysql_fieldtype">mysql_FieldType()</a></dt>

    <dt><a href="#mysql_freeresult">mysql_FreeResult()</a></dt>

    <dt><a href="#mysql_listdbs">mysql_ListDBs()</a></dt>

    <dt><a href="#mysql_listfields">mysql_Listfields()</a></dt>

    <dt><a href="#mysql_listtables">mysql_ListTables()</a></dt>

    <dt><a href="#mysql_numfields">mysql_NumFields()</a></dt>

    <dt><a href="#mysql_numrows">mysql_NumRows()</a></dt>

    <dt><a href="#mysql_result">mysql_Result()</a></dt>

    <dt><a href="#mysql_tablename">mysql_TableName()</a></dt>
  </dl>

  <p>In addition to these functions, PHP/FI can also be compiled to
  automatically escape any forward single quote ( ' ) characters
  found in GET or POST data. If the MAGIC_QUOTES variable is
  defined in the <em>php.h</em> file then these quotes will be
  automatically escaped making it easier to pass form data directly
  to mysql queries.</p>
  <hr>

  <h2><a name="solid_support" id="solid_support">Solid
  Support</a></h2>

  <p>The Solid server is a high-volume SQL server. It supports the
  ANSI SQL2, ODBC, SAG CLI and X/Open SQL standards. More
  information about the Solid server is available at <a href=
  "http://www.solidtech.com/">www.solidtech.com</a>. The Solid
  interface to PHP was developed by <a href=
  "http://solid.digiface.nl/">DigiFace Internet Services</a>.</p>

  <p>The following PHP functions are available for the Solid
  Server:</p>

  <dl>
    <dt><a href="#solid_connect">Solid_Connect()</a></dt>

    <dt><a href="#solid_close">Solid_Close()</a></dt>

    <dt><a href="#solid_exec">Solid_Exec()</a></dt>

    <dt><a href="#solid_result">Solid_Result()</a></dt>

    <dt><a href="#solid_freeresult">Solid_FreeResult()</a></dt>

    <dt><a href="#solid_numrows">Solid_NumRows()</a></dt>

    <dt><a href="#solid_numfields">Solid_NumFields()</a></dt>

    <dt><a href="#solid_fieldnum">Solid_FieldNum()</a></dt>

    <dt><a href="#solid_fieldname">Solid_FieldName()</a></dt>
  </dl>

  <p>In addition to these functions, PHP/FI can also be compiled to
  automatically escape any forward single quote ( ' ) characters
  found in GET or POST data. If the MAGIC_QUOTES variable is
  defined in the <em>php.h</em> file then these quotes will be
  automatically escaped making it easier to pass form data directly
  to Solid queries.</p>

  <p>Here is the same script that was shown in the Postgres
  section, adapted for the Solid server.</p>
  <pre>
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
</pre>
  <hr>

  <h2><a name="sybase_support" id="sybase_support">Sybase
  Support</a></h2>The supporting functions uses Sybase DB library
  API calls. Therefore you must have sybase API libraries and
  headers files installed in your system in order to compile PHP/FI
  with sybase support.

  <p>The following PHP/FI functions are available for Sybase.</p>

  <dl>
    <dt><a href=
    "#sybsql_checkconnect">SybSQL_CheckConnect()</a></dt>

    <dt><a href="#sybsql_connect">SybSQL_Connect()</a></dt>

    <dt><a href="#sybsql_DBuse">SybSQL_DBuse()</a></dt>

    <dt><a href="#sybsql_Exit">SybSQL_Exit()</a></dt>

    <dt><a href="#sybsql_fieldname">SybSQL_Fieldname()</a></dt>

    <dt><a href="#sybsql_getfield">SybSQL_GetField()</a></dt>

    <dt><a href="#sybsql_isrow">SybSQL_IsRow()</a></dt>

    <dt><a href="#sybsql_nextrow">SybSQL_NextRow()</a></dt>

    <dt><a href="#sybsql_numfields">SybSQL_NumFields()</a></dt>

    <dt><a href="#sybsql_numrows">SybSQL_NumRows()</a></dt>

    <dt><a href="#sybsql_query">SybSQL_Query()</a></dt>

    <dt><a href="#sybsql_result">SybSQL_Result()</a></dt>

    <dt><a href="#sybsql_result_all">SybSQL_Result_All()</a></dt>

    <dt><a href="#sybsql_seek">SybSQL_Seek()</a></dt>
  </dl>

  <p>For a complete example, see the example following the <a href=
  "#sybsql_result">sybSQL_Result()</a> function.</p>
  <hr>

  <h2><a name="oracle_support" id="oracle_support">Oracle
  Support</a></h2>The PHP/FI interface to Oracle uses the Oracle
  Call Interface (OCI). You need the OCI libraries on your system
  to compile PHP/FI with Oracle support.

  <p>The following PHP/FI functions are available for Oracle:</p>

  <dl>
    <dt><a href="#ora_bind">Ora_Bind()</a></dt>

    <dt><a href="#ora_close">Ora_Close()</a></dt>

    <dt><a href="#ora_commit">Ora_Commit()</a></dt>

    <dt><a href="#ora_commitoff">Ora_CommitOff()</a></dt>

    <dt><a href="#ora_commiton">Ora_CommitOn()</a></dt>

    <dt><a href="#ora_exec">Ora_Exec()</a></dt>

    <dt><a href="#ora_fetch">Ora_Fetch()</a></dt>

    <dt><a href="#ora_getcolumn">Ora_GetColumn()</a></dt>

    <dt><a href="#ora_logoff">Ora_Logoff()</a></dt>

    <dt><a href="#ora_logon">Ora_Logon()</a></dt>

    <dt><a href="#ora_open">Ora_Open()</a></dt>

    <dt><a href="#ora_parse">Ora_Parse()</a></dt>

    <dt><a href="#ora_rollback">Ora_Rollback()</a></dt>
  </dl>

  <p>An example PHP/FI Oracle application:</p>
  <pre>
&lt;?
PutEnv("ORACLE_HOME=path_to_your_oracle_home"
PutEnv("ORACLE_SID=database"

/* Establish a connection between PHP and Oracle. */
$conn = Ora_Logon("username" "password"

if ($conn &lt; 0) {
    echo("Could not connect to Oracle.\n"
    exit;
}

/* Open a cursor in Oracle. */
$cursor = Ora_Open($conn);

if ($cursor &lt; 0) {
    echo("Could not open a cursor.\n"
    Ora_Logoff($conn);
    exit;
}

/* Turn off autocommit. */
Ora_CommitOff($conn);

/* This is the SQL query. */
$query = "SELECT * FROM some_table"

if (Ora_Parse($cursor, $query) &lt; 0) {
    echo("Parse failed!\n"
    Ora_Logoff($conn);
    exit;
}

/* Execute the SQL statement associated with $cursor and
   prepare storage for select-list items. */
$ncols = Ora_Exec($cursor);

echo "lt;P&gt;\n"
echo "lt;TABLE BORDER=1 CELLSPACING=0&gt;\n"

/*  Retrieve all rows from the database one after another. */
while (Ora_Fetch($cursor) == 1) {
    $i = 0;
    echo "lt;TR&gt;\n"
    while ($i &lt; $ncols) {
     /* Get data for a single column of currently fetched row. */
     $col = Ora_GetColumn($cursor, $i);
        echo("lt;TD&gt;$col&lt;/TD&gt;\n"
     $i++;
    }
    echo("lt;/TR&gt;\n"
}

echo "&lt;/TABLE&gt;\n";

/* Close the Oracle connection. */
Ora_Close($cursor);
 
/* Disconnect the logon data area. */
Ora_Logoff($conn);
&gt;
</pre>
  <hr>

  <h2><a name="illustra_support" id="illustra_support">Informix
  Illustra Support</a></h2>

  <p>Illustra is a commercial database sold by Informix. It has
  several features that are not fully supported by this interface
  (yet). The main claim to fame for Illustra is that it is an
  object-relational database capable of being extended in an
  object-orientated fashion. For example, it is possible to have an
  Image as a base type within the database. More information can be
  obtained from <a href="http://www.illustra.com/">The illustra
  home page</a>.</p>

  <p>The following PHP functions are available for Illustra:</p>

  <dl>
    <dt><a href="#mi_connect">mi_Connect()</a></dt>

    <dt><a href="#mi_close">mi_Close()</a></dt>

    <dt><a href="#mi_dbname">mi_DBname()</a></dt>

    <dt><a href="#mi_exec">mi_Exec()</a></dt>

    <dt><a href="#mi_result">mi_Result()</a></dt>

    <dt><a href="#mi_numrows">mi_NumRows()</a></dt>

    <dt><a href="#mi_numfields">mi_NumFields()</a></dt>

    <dt><a href="#mi_fieldnum">mi_FieldNum()</a></dt>

    <dt><a href="#mi_fieldname">mi_FieldName()</a></dt>
  </dl>

  <p><strong>Note:</strong> Type operations are not yet
  supported.</p>

  <p>Here is a sample script that connects to the illustra database
  on localhost called 'mydb' and retrieves the names and ages of
  people in a table:</p>
  <pre>
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
</pre>
  <hr>

  <h2><a name="adabas_support" id="adabas_support">Adabas
  Support</a></h2>

  <p>Adabas D is an advanced RDBMS that is available on many
  platforms. A special version, the so called Personal Edition is
  available for Linux and Win32 at no cost. It is resticted to 5
  simulataneous users and 100 MB of data. For more information on
  Adabas D refer to <a href=
  "http://www.softwareag.com">http://www.softwareag.com</a>.</p>

  <p>The following PHP functions are available for accessing Adabas
  databases:</p>

  <dl>
    <dt><a href="#ada_connect">Ada_Connect()</a></dt>

    <dt><a href="#ada_close">Ada_Close()</a></dt>

    <dt><a href="#ada_exec">Ada_Exec()</a></dt>

    <dt><a href="#ada_result">Ada_Result()</a></dt>

    <dt><a href="#ada_resultall">Ada_ResultAll()</a></dt>

    <dt><a href="#ada_freeresult">Ada_FreeResult()</a></dt>

    <dt><a href="#ada_numrows">Ada_NumRows()</a></dt>

    <dt><a href="#ada_numfields">Ada_NumFields()</a></dt>

    <dt><a href="#ada_numrows">Ada_NumRows()</a></dt>

    <dt><a href="#ada_numfields">Ada_NumFields()</a></dt>

    <dt><a href="#ada_fieldnum">Ada_FieldNum()</a></dt>

    <dt><a href="#ada_fieldname">Ada_FieldName()</a></dt>

    <dt><a href="#ada_fieldtype">Ada_FieldType()</a></dt>
  </dl>Here is the same script that was shown in the Postgres and
  Solid sections, adapted for Adabas D.
  <pre>
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
</pre>
  <hr>

  <h2><a name="regexp" id="regexp">Regular Expressions</a></h2>

  <p>Regular expressions are used for complex string manipulation
  in PHP/FI. The script interface to the regular expression support
  is through the following functions: <a href="#ereg">EReg()</a>,
  <a href="#eregi">ERegi()</a>, <a href=
  "#ereg_replace">EReg_Replace()</a>, <a href=
  "#eregi_replace">ERegi_Replace()</a>, <a href=
  "#reg_match">Reg_Match()</a>, <a href=
  "#reg_replace">Reg_Replace()</a>, and <a href=
  "#reg_search">Reg_Search()</a>. The first argument to all three
  functions is a regular expression string. The EReg functions use
  the Posix Extended regular expressions as defined by POSIX
  1003.2, while the Reg functions implement Basic regular
  expressions. For a complete description of regular expressions
  see your regex(7) man page. If you do not have this page, the
  regex(7) man page written by Henry Spencer can be found in the
  src/regex directory in the PHP/FI distribution. Ask your system
  administrator to install this man page for you.</p>

  <p>Some examples of regular expressions and what they do:</p>

  <blockquote>
    <dl>
      <dt><code>ereg("abc",$string);</code></dt>

      <dd>Returns true if "abc" is found anywhere in $string.</dd>

      <dt><code>ereg("^abc",$string);</code></dt>

      <dd>Returns true if "abc" is found at the beginning of
      $string.</dd>

      <dt><code>ereg("abc$",$string);</code></dt>

      <dd>Returns true if "abc" is found at the end of
      $string.</dd>

      <dt>
      <code>eregi("(ozilla.[23]|MSIE.3)",$HTTP_USER_AGENT);</code></dt>

      <dd>Returns true if client browser is Netscape 2, 3 or MSIE
      3.</dd>

      <dt><code>ereg("([[:alnum:]]+) ([[:alnum:]]+)
      ([[:alnum:]]+)",$string,$regs);</code><br></dt>

      <dd>Places three space separated words into $regs[1],
      $regs[2] and $regs[3].</dd>

      <dt><code>ereg_replace("^","&lt;BR&gt;",$string)</code></dt>

      <dd>Put a &lt;BR&gt; tag at the beginning of $string.</dd>

      <dt><code>ereg_replace("$","&lt;BR&gt;",$string)</code></dt>

      <dd>Put a &lt;BR&gt; tag at the end of $string.</dd>

      <dt><code>ereg_replace(10,"",$string);</code></dt>

      <dd>Get rid of any linefeed characters in $string.</dd>

      <dt><code>ereg_replace(13,"&lt;BR&gt;",$string);</code></dt>

      <dd>Replace all carriage returns with a &lt;BR&gt; tag in
      $string.</dd>
    </dl>
  </blockquote>
  <hr>

  <h2><a name="escapes" id="escapes">Escape Characters</a></h2>

  <p>The following escape sequences are supported in most places
  where a quoted string argument is used:</p>

  <blockquote>
    <pre>
   \a --&gt; bell
        \b --&gt; backspace
        \n --&gt; linefeed
        \r --&gt; carriage return
        \t --&gt; tab
        \nnn --&gt; octal char
        \xXX --&gt; hex char
</pre>
  </blockquote>
  <hr>

  <h2><a name="octal" id="octal">Octal Notation of Unix file
  permissions</a></h2>

  <p>A couple of functions in the PHP/FI script language epxect
  octal arguments to denote Unix-style permission parameters. In
  this octal notation 3 bits are used to represent the values 0-7.
  Each bit of the three represents a specific permission. Octal is
  traditionally noted in some contexts by a leading 0, such as
  0755. You do not need to use this leading 0 in PHP since the
  functions that expect octal parameters are will simplyassume that
  the parameter is octal. Using the leading 0 is however good
  practise to remind yourself that you are no longer dealing with a
  base 10 value.</p>

  <p><b>Bit Description</b></p>
  <pre>
    xxx
    ^^^
    ||+----1 bit (execute permission)
    |+-----2 bit (write permission)
    +------4 bit (read permission)
</pre>These three bits are repeated three times for owner, group,
and world. Thus 0755 means:
  <pre>
    owner: r,w,x
    group: r, ,x
    world: r, ,x
</pre>Note that the execute bit on a directory means 'access', not
'execute'. There are also the extended bits in the fourth octal
nibble, like 0?755:
  <pre>
    4: suid bit   (set userid)
    2: sgid bit   (set group id)
    1: sticky bit (on a directory, only the owner can delete a file)
</pre>
  <hr>

  <h2><a name="script" id="script">PHP/FI Script Language</a></h2>

  <p>The PHP script language is similar in syntax to the C language
  in many ways. It supports variables, arrays, function calls,
  different variable types and most things you might need to write
  complex cgi programs.</p>

  <p>Each PHP/FI function is described in the following section and
  can be quickly found by simply appending #function_name to the
  url for this document since each function description has been
  tagged with its name.</p>

  <h3><a name="syntax" id="syntax">Syntax</a></h3>

  <p>Each PHP instruction starts with <strong>&lt;?</strong> and
  ends with a <strong>&gt;</strong>. Or, instructions may be
  grouped inside a single <strong>&lt;? &gt;</strong> pair and
  separated by <strong>;</strong> characters.</p>

  <p>Variables are supported and are indicated by preceding the
  variable name with a <strong>$</strong>. So, for example, to set
  a variable to 5 and then display this variable, the following is
  valid:</p>
  <pre>
   &lt;?$a = 5&gt;
        &lt;?echo $a&gt;
</pre>

  <p>This is the same as writing:</p>
  <pre>
   &lt;? $a = 5; echo $a &gt;
</pre>

  <p>Or even:</p>
  <pre>
   &lt;?
        $a = 5;
        echo $a;
        &gt;
</pre>

  <p>Extra white space characters such as spaces, tabs and
  new-lines are ignored. This fact should be used to format the PHP
  script blocks to make them easier to read. Case is relevant in
  variable names, but not in function calls. In the functional
  overview later on in this documentation, case is only used to
  make the function names easier to read. In the actual script
  language you can use any case you wish.</p>

  <p>Comments are supported. A comment is written just like
  comments in the C language. <strong>/*</strong> starts a comment
  and <strong>*/</strong> ends a comment. Comments can be placed
  anywhere within the <strong>&lt;? ... &gt;</strong> block.</p>
  <hr>

  <h3><a name="vars" id="vars">Variables</a></h3>

  <p>Three types of variables are supported. <strong>Long
  integer</strong>, <strong>Double precision floating
  point</strong> and <strong>character strings</strong>. They are
  automatically detected. For example:</p>
  <pre>
   &lt;?$a = 5&gt;
</pre>

  <p>causes $a to become a variable of type INTEGER.</p>
  <pre>
   &lt;?$a = 5.0&gt;
</pre>

  <p>causes $a to become a variable of type DOUBLE.</p>
  <pre>
   &lt;?$a = "5"&gt;
</pre>

  <p>causes $a to become a variable of type STRING.</p>

  <p>The type of the variable is not generally important. Every
  variable regardless of its type is converted to all three types
  internally and the various functions will try to use the correct
  type. There are only a few functions affected by the type of the
  variable.</p>

  <p>All three variable types may also be treated as arrays by
  appending <strong>[value]</strong> to their names. Unlike C,
  these are actually associative arrays similar to those used in
  Perl. The following would be valid:</p>
  <pre>
   &lt;?
          $a[0] = 5;
          $a["hello"] = 6;
          echo $a[0];
          echo $a["hello"];
        &gt;
</pre>

  <p>Note that if a variable is used both as an array and as a
  normal variable, the normal variable is synonymous with the index
  "0" entry in the array. ie.</p>
  <pre>
    $a = 1;
</pre>

  <p>Is the same as writing:</p>
  <pre>
    $a[0] = 1;
</pre>

  <p>PHP/FI also supports non-indexed arrays. A non-indexed array
  will generate its own index as items are added to it. For
  example:</p>
  <pre>
    $a[] = "Hello";
    $a[] = "There";
</pre>

  <p>The first item inserted into a non-indexed array always gets
  assigned index 0, the second index 1, etc. Therefore the above
  items may be printed out with:</p>
  <pre>
    echo $a[0];
    echo $a[1];
        
</pre>

  <p>Arrays can be copied by a simple assignment. If $b is an
  array, then all the values can be copied to a new array named $a
  with:</p>
  <pre>
    $a = $b;
</pre>

  <p>Please not that if PHP does not force you to define variables
  before using them. If in the above statement, $b was undefined,
  then $a would be set to an empty string ("").</p>

  <p>The [] notation is also used to indicate that arrays are to be
  appended. If $a and $b are both arrays, then $b can be appended
  to $a by:</p>
  <pre>
    $a[] = $b;
</pre>

  <p>In the above, there will be a difference between associative
  arrays and normal numbered arrays. Numbered arrays will be
  renumbered such that all elements from $b will come after the
  original elements from $a. While with associative arrays,
  elements in $b will be merged with elements in $a. Any elements
  (items with the same index name) which already exist in $a will
  be overwritten by $b elements.</p>

  <p>You can use the <a href="#count">count()</a> function to
  determine the number of items in any array.</p>

  <p>Also inherent to the language is the fact that the type of the
  variable determines how certain basic operations will be carried
  out. For example:</p>
  <pre>
    $a = $b + $c;
</pre>

  <p>can do a couple of different things. If $b is a number, the
  numerical value of $c is added to $b and the sum is stored in $a.
  In this case the type of $c is irrelevant. The operation is
  guided by the type of the first variable. If $b is a string, then
  the string value of $c is appended to $b and the resultant string
  is placed in $a. This also leads to some caveats. You should read
  the section on <a href="#overload">overloaded operators</a> to
  get a better understanding of how to deal with them.</p>
  <hr>

  <h3><a name="assoc" id="assoc">Associative Arrays</a></h3>

  <p>The previous section introduced associative arrays. An
  associative array is an array in which the index need not be a
  numerically sequential value. The array index can be any number
  or string. PHP/FI provides a set of functions to manipulate these
  associative arrays. These include, <a href="#next">Next()</a>,
  <a href="#prev">Prev()</a>,<a href="#reset">Reset()</a>,<a href=
  "#end">End()</a>, and <a href="#key">Key()</a>.</p>
  <hr>

  <h3><a name="varvars" id="varvars">Variable Variables</a></h3>

  <p>Sometimes it is convenient to be able to have variable
  variable names. That is, a variable name which can be set and
  used dynamically. A normal variable is set with a statement such
  as:</p>
  <pre>
    $a = "hello";
</pre>

  <p>A variable variable takes the value of a variable and treats
  that as the name of a variable. In the above example,
  <strong>hello</strong>, can be used as the name of a variable by
  using two dollar signs. ie.</p>
  <pre>
    $$a = "world";
</pre>

  <p>At this point two variables have been defined and stored in
  the PHP/FI symbol tree:</p>
  <pre>
    Variable Name        Variable Content
         <em>a</em>                   <em>hello</em>
         <em>hello</em>               <em>world</em>
</pre>

  <p>Therefore, this statement:</p>
  <pre>
    echo "$a $$a";
</pre>

  <p>produces the exact same output as:</p>
  <pre>
    echo "$a $hello";
</pre>

  <p>ie. they both produce: <strong>hello world</strong></p>
  <hr>

  <h3><a name="lang" id="lang">Language Constructs</a></h3>

  <p>As far as language constructs are concerned, the PHP language
  is quite simple. The following commands are used to guide the
  control flow through a file:</p>

  <ul>
    <li>if (condition)</li>

    <li>else</li>

    <li>elseif (condition)</li>

    <li>endif</li>

    <li>switch(expression)</li>

    <li>case expression</li>

    <li>default</li>

    <li>break</li>

    <li>endswitch</li>

    <li>while</li>

    <li>endwhile</li>

    <li>include</li>

    <li>exit</li>
  </ul>

  <p>The syntax of conditions are similar to that of the C
  language. <strong>==</strong> tests for equality.
  <strong>!=</strong> means not equal. Also supported are:
  <strong>&gt;</strong>, <strong>&lt;</strong>,
  <strong>&gt;=</strong>, <strong>&lt;=</strong>. Conditional AND
  is <strong>&amp;&amp;</strong>, conditional OR is
  <strong>||</strong>.</p>

  <p>Examples:</p>
  <pre>
    &lt;?
      if($a==5 &amp;&amp;  $b!=0 );
        $c = 100 + $a / $b;
      endif;
    &gt;
</pre>

  <p>The above may also be written in standard C syntax:<br>
  In this case, there is no need for a semicolon after the closing
  curly brace.</p>
  <pre>
    &lt;?
      if($a==5 &amp;&amp; $b!=0) {
          $c = 100 + $a / $b;
      }
    &gt;
</pre>

  <p>There is no difference between the two syntaxes. I personally
  like to use endif, endswitch and endwhile so I explicitly know
  which construct I am ending. However, these ending constructs can
  always be replaced with a closing curly brace.</p>

  <p>It is important to note that the flow of the language is not
  dependent on the organization of the script blocks within the
  code. You can start an if expression in one block and have the
  end of the expression in another. For example:</p>
  <pre>
   &lt;?if($a==5 &amp;&amp;  $b!=0)&gt;
                  &lt;b&gt;Normal html text&lt;/b&gt;
        &lt;?endif&gt;
</pre>

  <p>In this example it is easy to see why it is sometimes more
  desirable to use the <code>endif</code> keyword as opposed to a
  closing brace. The above is much more readable than the
  following:</p>
  <pre>
   &lt;?if($a==5 &amp;&amp;  $b!=0) {&gt;
                  &lt;b&gt;Normal html text&lt;/b&gt;
        &lt;? } &gt;
</pre>

  <p>Both version are valid and they will do exactly the same
  thing.</p>
  <hr>

  <h3><a name="user_funcs" id="user_funcs">User-Defined
  Functions</a></h3>

  <p>You may define a function within a PHP script with the
  following syntax:</p>
  <pre>
    &lt;?
      Function Test (
        echo "This is a test\n";
      );
    &gt;
</pre>

  <p>This function can now be called from anywhere in the script as
  long as the call comes after the function definition. A sample
  call might be:</p>
  <pre>
    &lt;?
      Test();
    &gt;
</pre>

  <p>User defined functions like this act exactly like PHP's
  internal functions in that you can pass arguments to them and
  have them return a value. Here is the syntax for a function
  definition of a function which takes 3 arguments and returns the
  sum of these arguments:</p>
  <pre>
    &lt;?
      Function Sum $a,$b,$c (
        return($a+$b+$c);
      );

      echo Sum($a,$b,$c);
    &gt;
</pre>

  <p>The <em>return</em> statement is used to return a value from
  the function. Only a single value can be returned using this
  mechanism, however, if more values need to be communicated back
  and forth between the main code and functions, global variables
  can be used. This brings us to the section on the scope of
  variables.</p>
  <hr>

  <h3><a name="scope" id="scope">Scope of Variables</a></h3>

  <p>The scope of a variable is the context within which it is
  defined. For the most part all PHP/FI variables only have a
  single scope. However, within user-defined functions a local
  function scope is introduced. Any variable used inside a function
  is by default limited to the local function scope. For
  example:</p>
  <pre>
    $a=1; /* global scope */
    Function Test (
      echo $a; /* reference to local scope variable */
    );
    Test();
</pre>

  <p>This script will not produce any output because the
  <em>echo</em> statement refers to a local version of the
  <em>$a</em> variable, and it has not been assigned a value within
  this scope. You may notice that this is a little bit different
  from the C language in that global variables in C are
  automatically available to functions unless specifically
  overridden by a local definition. This can cause some problems in
  that people may inadvertently change a global variable. In PHP/FI
  global variables must be declared global inside a function if
  they are going to be used in that function. An example:</p>
  <pre>
    $a=1;
    $b=2;
    Function Sum $first,$second (
      global $a,$b;

      $b = $a + $b;
    );
    Sum();
    echo $b;
</pre>

  <p>The above script will output "3". By declaring $a and $b
  global within the function, all references to either variable
  will refer to the global version. There is no limit to the number
  of global variables that can be manipulated by a function.
  However, the variable must exist in the global scope prior to the
  function being called. You cannot create new global variables
  from within a function.</p>

  <p>Another important feature of variable scoping is the
  <em>static</em> variable. A static variable exists only in a
  local function scope, but it does not lose its value when program
  execution leaves this scope. Consider the following example:</p>
  <pre>
    Function Test (
      $a=0;
      echo $a;
      $a++;
    );
</pre>

  <p>This function is quite useless since every time it is called
  it sets $a to 0 and prints "0". The $a++ which increments the
  variable serves no purpose since as soon as the function exits
  the $a variable disappears. To make a useful counting function
  which will not lose track of the current count, the $a variable
  is declared static:</p>
  <pre>
    Function Test (
      static $a=0;
      echo $a;
      $a++;
    );
</pre>

  <p>Now, every time the Test() function is called it will print
  the value of $a and increment it.</p>

  <p>Static variables are also essential when functions are called
  recursively. A recursive function is one which calls itself. Care
  must be taken when writing a recursive function because it is
  possible to make it recurse indefinitely. You must make sure you
  have an adequate way of terminating the recursion. The following
  simple function recursively counts to 10:</p>
  <pre>
    Function Test (
      static $count=0;

      $count++;
      echo $count;
      if($count &lt;  10) {
        Test();
      } 
    );
</pre>
  <hr>

  <h3><a name="math" id="math">Mathematical Expressions</a></h3>

  <p>PHP supports full mathematical operations anywhere an
  expression is expected. Order of operations are taken into
  account. The following are the valid operators:</p>
  <pre>
   &lt;? $a = 2 + 1 &gt; <em>Addition</em>
        &lt;? $a = 2 - 1 &gt; <em>Subtraction</em>
        &lt;? $a = 2 * 1 &gt; <em>Multiplication</em>
        &lt;? $a = 2 / 1 &gt; <em>Division</em>
        &lt;? $a = 2 % 1 &gt; <em>Modulus</em>
        &lt;? $a = 2 ^ 1 &gt; <em>Bit-wise Exclusive OR</em>
</pre>

  <p>Both bracketing and order of operations is supported, so the
  following is valid:</p>
  <pre>
   &lt;?$a = (2+1)*3+6/3&gt;
</pre>

  <p>The C-like incremental operators <code>+=</code> and <code>-=</code>
  are supported. ie.</p>
  <pre>
    &lt;? $a += $b&gt;
</pre>

  <p>This is equivalent to:</p>
  <pre>
    &lt;? $a = $a + $b&gt;
</pre>

  <p>The C-like bit-wise operators <code>&amp;=</code>, <code>|=</code> and
  <code>^=</code> are supported. ie.</p>
  <pre>
    &lt;? $a &amp;= 4&gt;
</pre>This is equivalent to:
  <pre>
    &lt;? $a = $a &amp;  4&gt;
</pre>
  <hr>

  <h3><a name="while" id="while">While Loops</a></h3>

  <p>You can loop within a PHP script by using the <em>while();
  endwhile;</em> construct.</p>
  <pre>
   &lt;?
          $a=0;
          while($a&lt;100) {
                  $a++;
                  echo $list[$a];       
          } 
        &gt;
</pre>

  <p>The above example shows the use of a while loop to display the
  contents of an array. <strong>WARNING</strong> although the PHP
  language supports incremental operators such as
  <strong>++</strong> and <strong>-&lt;!&gt;-</strong> to increment
  and decrement a variable, they are not treated exactly like they
  would be in the C language. The variable is incremented right
  away. There is no concept of incrementing the variable before or
  after the operation as there is in C.</p>

  <p>As explained in the <a href="#lang">Language Constructs</a>
  section above, the same can be obtained with <em>while();
  endwhile;</em>.</p>
  <hr>

  <h3><a name="switch" id="switch">Switch Construct</a></h3>

  <p>PHP supports a switch construct very similar to the C
  equivalent.</p>
  <pre>
   &lt;?
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
        &gt;
</pre>

  <p>The above is an example of a switch construct. It is similar
  to a series of if/elseif/else constructs but easier to read. The
  only difference between the PHP switch construct and that of the
  C language is that semi-colons are used to terminate every line.
  There are no colons.</p>

  <p>As explained in the <a href="#lang">Language Constructs</a>
  section above, the same can be obtained with <em>switch();
  endswitch;</em>.</p>

  <p>All of these constructs can of course be nested and used
  inside each other just like C. The various files in the
  <em>examples</em> directory of the PHP distribution should
  provide a good starting point for learning the language.</p>
  <hr>

  <h3><a name="secure" id="secure">Secure Variables - Defeating GET
  method hacks</a></h3>

  <p>A previous section talked about GET and POST method data and
  variables. If you think about it, you may be able to envision a
  security issue. For example, if on a web page I have obtained
  some data from a database and I pass this data along in a
  variable called "data" in a POST method form. In the ensuing page
  I can access this variable and do something with it. However, if
  someone accessed this second page directly and put a
  "?data=something" right in the URL thereby doing a GET method
  variable set, they have effectively circumvented the original
  POST method form.</p>

  <p>PHP provides a <em>SecureVar()</em> function which is used to
  mark variables names as being secure variables. These secure
  variables can only be set directly in a PHP script, or they can
  come from a POST method form. They cannot be set using the GET
  method variable definition mechanism. From our above scenario, if
  we placed the line:</p>
  <pre>
    &lt;?SecureVar("data")&gt;
</pre>

  <p>Near the beginning of our second page, then the GET method
  trick would not work. The "data" variable would appear to be
  empty unless it came directly from the POST method form on the
  first page.</p>

  <p>The <em>SecureVar()</em> actually takes a regular expression
  as its argument, so you can mark patterns of variable names that
  should be treated in this secure manner. For example,</p>
  <pre>
    &lt;?SecureVar(".*data.*")&gt;
</pre>

  <p>Would mark any variable with the word "data" anywhere in their
  name as being secure.</p>

  <p>Please note that POST-method forms are not intrinsically
  secure. People can emulate the posting of any data to a form by
  simply telnetting to the HTTP port on your system. You need to
  take appropriate security measures to stop people from doing this
  if in fact security is a concern.</p>
  <hr>

  <h3><a name="overload" id="overload">Overloaded Operators and
  dealing with variable types</a></h3>An overloaded operator is an
  operator like '+' for example which can do different things based
  on the types of the expressions it is asked to operate on.

  <p>The problem is that PHP understands 3 variable types. Integer,
  Double and String. When a variable is first assigned, PHP
  automatically figures out the variable type.</p>

  <p>ie.</p>
  <pre>
    $a = 1;     Type would be integer
    $b = 1.5;   Type would be double
    $c = "1";   Type would be string
</pre>

  <p>Now, what happens when you do something like:</p>
  <pre>
    $d = $a + $c;
</pre>

  <p>The parser looks at the first part of the arithmetic
  expression and uses that to type the result and thus also the
  nature of the arithmetic that is to be done. In the above case
  since $a is an integer, $d will be an integer and an integer
  addition is done giving the result:</p>
  <pre>
    $d = 2      Type is integer
</pre>

  <p>Therefore:</p>
  <pre>
    $d = $c + $a
</pre>

  <p>Results in:</p>
  <pre>
    $d = "11"   Type is string
</pre>

  <p>The above makes sense to me, and once you understand it, it is
  probably workable. However, when more complex expressions are
  used it can get extremely confusing.</p>

  <p>The solution is a simple type casting mechanism. In reality
  all variables are automatically converted to all 3 types, and an
  internal flag just marks what type the variable actually is. So,
  when I say:</p>
  <pre>
    $a = 1;
</pre>

  <p>Internally in the symbol table I store 3 versions.</p>
  <pre>
    Integer:  1    &lt;-- flag
    Double :  1.0
    String :  "1"
</pre>

  <p>The <em>SetType()</em> function can move this flag indicating
  the type of the variable.</p>
  <pre>
    SetType($a,"double");
</pre>

  <p>This would force $a to be treated as a double from then
  on.</p>

  <p>The <em>GetType()</em> function returns the type.
  <code>GetType($a)</code> would return "double" in this case.</p>

  <p>Functions also exist to return the 3 various types without
  moving the type flag.</p>
  <pre>
    IntVal($a)     returns  1
    DoubleVal($a)  returns  1.0
    StrVal($a)     returns  "1"
</pre>

  <p>This doesn't change the overloaded operator nature of the PHP
  variables, but it does give you some tools to better deal with
  them. PHP is not not a full-fledged Perl look-alike. It has to be
  small and fast. Perl deals with the overloaded operator pitfall
  by forcing something like the '+' operator to only work on
  numbers. If you want to add strings, you must use the '.'
  operator. Once you start having separate operators for each type
  you start making the language much more complex. ie. you can't
  use '==' for stings, you now would use 'eq'. I don't see the
  point, especially for something like PHP where most of the
  scripts will be rather simple and in most cases written by
  non-programmers who want a language with a basic logical syntax
  that doesn't have too high a learning curve.</p>
  <hr>

  <h3><a name="quiet" id="quiet">Suppressing Errors from function
  calls</a></h3>

  <p>It may be desirable in certain circumstances to ignore fatal
  errors which may be reported by specific PHP functions. For
  example, you may want to ignore errors from a dbmopen() call and
  simply check the return value of the call without having error
  messages appear on the web screen. This can be done by putting
  the "@" character in front of the function call. ie.</p>
  <pre>
    $err_code = @dbmopen($filename,"w");
</pre>

  <p>The actual error message that would have been printed can be
  checked by looking at the PHP internal variable,
  <strong>$phperrmsg</strong>.</p>

  <p>A more general approach to suppress error message printing is
  to use the <a href="#seterrorreporting">SetErrorReporting()</a>
  function. With this function error printing can be disabled for
  entire blocks of code by preceding the block with a call
  like:</p>
  <pre>
    SetErrorReporting(0);
</pre>

  <p>This turns off all errors. They can then be re-enabled later
  with:</p>
  <pre>
    SetErrorReporting(1);
</pre>
  <hr>

  <h3><a name="funcs" id="funcs">Internal
  Functions</a></h3><a href="function"></a>

  <p>PHP has a number of built-in functions. Functions are called
  in the same manner as they are called in the C language. Some
  take one or more arguments, and some return values which can then
  be assigned to a variable or used as an argument to another
  function. For example:</p>
  <pre>
   &lt;?$t=time()&gt;
</pre>

  <p>This assigns the return value of the <em>time()</em> function
  to the <em>t</em> variable.</p>

  <h3>Alphabetical List of Functions</h3>

  <dl>
    <dt><a name="abs" id="abs"><span class="big">Abs(arg)</span></a></dt>

    <dd>
      <p>Abs returns the absolute value of arg.</p>
    </dd>

    <dt><a name="ada_close" id="ada_close"><span class="big">Ada_Close(connection_id)</span></a></dt>

    <dd>
      <p>Ada_Close will close down the connection to the Adabas
      server associated with the given connection identifier.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_connect" id="ada_connect"><span class="big">$connection = Ada_Connect(data source name, username,
    password)</span></a></dt>

    <dd>
      <p>Ada_Connect opens a connection to a Adabas server. Each of
      the arguments should be a quoted string. The first parameter
      (data source name) is a string in the form
      "servername:databasename". The servername (but not the colon)
      can be omitted if you want to access a local database. This
      function returns a connection_id. This identifier is needed
      by other Adabas functions. You can have multiple connections
      open at once. This function will return <strong>0</strong> on
      error.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_exec" id="ada_exec"><span class="big">$result =
    Ada_Exec(connection_id, query_string)</span></a></dt>

    <dd>
      <p>Ada_Exec will send an SQL statement to the Adabas server
      specified by the connection_id. The connection_id must be a
      valid identifier that was returned by Ada_Connect or the
      special value <strong>0</strong>. If connection_id is 0,
      ada_exec tries to establish or to use a connection with the
      parameters given with the <a href="#directives">configuration
      directives</a> <em>phpAdaDefDB, phpAdaUser</em> and
      <em>phpAdaPW</em>.<br>
      The return value of this function is an identifier to be used
      to access the results by other Adabas functions. This
      function will return <strong>0</strong> on error. It will
      return <strong>1</strong> when the command executed correctly
      but is not expected to return data (insert or update
      commands, for example). Note that selects which return no
      data will still return a valid result greater than 1.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_fetchrow" id="ada_fetchrow"><span class="big">Ada_FetchRow(result_id [,row_number])</span></a></dt>

    <dd>
      <p>Ada_FetchRow fetches a row of the data that was returned
      by Ada_Exec. After Ada_FetchRow is called, the fields of that
      row can be access with Ada_Result. If no rownumber is given,
      Ada_FetchRow will try to fetch the next row in the result
      set. Every time Ada_FetchRow is called a new row can be
      accessed by Ada_Result. If Ada_FetchRow was succesful (there
      was a row), <strong>1</strong> is returned, if there are no
      more rows, Ada_FetchRow will return <strong>0</strong>. The
      return value of Ada_FetchRow can be used as the condition of
      a while loop. Calls to Ada_FetchRow() with and without
      rownumber can be mixed. To step through the result more than
      once, you can call Ada_FetchRow() with rownumber 1 and then
      continue with Ada_FetchRow() without rownumber to review the
      result.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_fieldname" id="ada_fieldname"><span class="big">Ada_FieldName(result_id, field_number)</span></a></dt>

    <dd>
      <p>Ada_FieldName will return the name of the field occupying
      the given column number in the given Adabas result
      identifier. Field numbering starts from 0.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_fieldnum" id="ada_fieldnum"><span class="big">Ada_FieldNum(result_id, field_name)</span></a></dt>

    <dd>
      <p>Ada_FieldNum will return the number of the column slot
      that corresponds to the named field in the given Adabas
      result identifier. Field numbering starts at 0. This function
      will return <strong>-1</strong> on error.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_fieldtype" id="ada_fieldtype"><span class="big">Ada_FieldType(result_id,
    field_name|field_number)</span></a></dt>

    <dd>
      <p>Ada_FieldType will return the SQL type of the field
      referecend by name or number in the given Adabas result
      identifier. Note: Field numbering starts from 0.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_freeresult" id="ada_freeresult"><span class="big">Ada_FreeResult(result_id)</span></a></dt>

    <dd>
      <p>Ada_FreeResult only needs to be called if you are worried
      about using too much memory while your script is running. All
      result memory will automatically be freed when the script is
      finished. But, if you are sure you are not going to need the
      result data anymore in a script, you may call Ada_FreeResult
      with the result identifier as an argument and the associated
      result memory will be freed.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_numfields" id="ada_numfields"><span class="big">Ada_NumFields(result_id)</span></a></dt>

    <dd>
      <p>Ada_NumFields will return the number of fields (columns)
      in a Adabas result. The argument is a valid result identifier
      returned by Ada_Exec. This function will return
      <strong>-1</strong> on error.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_numrows" id="ada_numrows"><span class="big">Ada_NumRows(result_id)</span></a></dt>

    <dd>
      <p>Ada_NumRows will return the number of rows in a Adabas
      result. The argument is a valid result identifier returned by
      Ada_Exec. This function will return <strong>-1</strong> on
      error. For INSERT, UPDATE, DELETE statements Ada_NumRows()
      returns the number of rows affected. For a SELECT clause this
      is the number of rows available.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_result" id="ada_result"><span class="big">Ada_Result(result_id, field name | index)</span></a></dt>

    <dd>
      <p>Ada_Result will return values from a result identifier
      produced by Ada_Exec. The field name specify what cell in the
      row to return. Instead of naming the field, you may use the
      field index as an unquoted number. Field indices start from
      0. If the requested field is of code type BYTE (binary) or is
      longer than 4096 bytes, the contents is sent directly to the
      client. Hint: [VAR]CHAR BYTE fields can be returned into a
      php variable by using the HEX() db function; e. g. SELECT
      HEX(SYSKEY) SYSKEY FROM MYTABLE.</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="ada_resultall" id="ada_resultall"><span class="big">Ada_ResultAll(result_id [,format])</span></a></dt>

    <dd>
      <p>Ada_ResultAll will print all rows from a result identifier
      produced by Ada_Exec. The result is printed in HTML table
      format. With the optional formatstring additional overall
      table formatting can be done (e. g. bgcolor= will set
      background color, &gt;caption&gt; &lt;/caption to set
      caption). Note: The contents of "format" will be inserted
      into the HTML table tag like this &lt;table format
      &gt;...</p>

      <p>This function is only available if Adabas support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="addslashes" id="addslashes"><span class="big">AddSlashes(arg)</span></a></dt>

    <dd>
      <p>Escapes any $ \ or ' (if MAGIC_QUOTES is set) with a
      backslash. See also <a href=
      "#stripslashes">StripSlashes()</a>.</p>
    </dd>

    <dt><a name="asort" id="asort"><span class="big">ASort(array)</span></a></dt>

    <dd>
      <p>Sort is used to sort a PHP associative array in ascending
      order. Use ARSort() for descending order. Unlike the <a href=
      "#sort">Sort()</a> function, ASort() maintains index-value
      pairings. It understands the three variable types and will
      sort alphabetically if the array contains strings, and
      numerically if the array contains numbers. In the case of an
      array which contains a mixture of types, the first type in
      the array will specify the sort method. Note that if you are
      going to sort a non-associative array, you should use the
      <a href="#sort">Sort()</a> function.</p>
    </dd>

    <dt><a name="bindec" id="bindec"><span class="big">BinDec(binary_string)</span></a></dt>

    <dd>
      <p>BinDec returns the decimal equivalent of the binary number
      represented by the binary_string argument. The largest number
      that can be converted is 31 bits long or 4294967295 in
      decimal. See also the <a href="#decbin">DecBin()</a>
      function.</p>
    </dd>

    <dt><a name="ceil" id="ceil"><span class="big">Ceil(value)</span></a></dt>

    <dd>
      <p>Ceil() rounds a floating point value up to the next
      integer. The return value is of type double (floating point)
      such that it can be used properly in complex equations. To
      get an integer type back, use: <code>$new =
      IntVal(Ceil($value));</code><br>
      See also <a href="#floor">Floor()</a>.</p>
    </dd>

    <dt><a name="chdir" id="chdir"><span class="big">ChDir(dir)</span></a></dt>

    <dd>
      <p>ChDir changes the current working directory to the
      directory specified in the argument.</p>
    </dd>

    <dt><a name="chgrp" id="chgrp"><span class="big">ChGrp(file,group)</span></a></dt>

    <dd>
      <p>ChGrp changes the group id of the specified file.</p>
    </dd>

    <dt><a name="chmod" id="chmod"><span class="big">ChMod(file,perms)</span></a></dt>

    <dd>
      <p>ChMod changes the file permissions of the specified file.
      The <em>perms</em> parameter must be specified in <a href=
      "#octal">octal</a> notation. eg. ChMod($filename,0755)</p>
    </dd>

    <dt><a name="chown" id="chown"><span class="big">ChOwn(file,owner)</span></a></dt>

    <dd>
      <p>ChOwn changes the specified file to be owned by the
      specified owner. Note that this will only work if the PHP/FI
      binary is running as root (which is not generally a good
      idea).</p>
    </dd>

    <dt><a name="chop" id="chop"><span class="big">Chop(string)</span></a></dt>

    <dd>
      <p>Chop removes all trailing whitespaces including new-lines,
      tabs and spaces and returns the new string.</p>
    </dd>

    <dt><a name="chr" id="chr"><span class="big">Chr(arg)</span></a></dt>

    <dd>
      <p>Chr returns the ASCII character represented by the integer
      argument.</p>
    </dd>

    <dt><a name="clearstack" id="clearstack"><span class="big">ClearStack()</span></a></dt>

    <dd>
      <p>The ClearStack() function is a hack/workaround for a
      deficiency in the PHP parser. This dificiency is that PHP
      only has a single expression stack. When inside a
      user-defined function this expression stack is never cleared
      because its contents may be needed within a complex
      expression in the context from which the user-defined
      function was called. This means that if you have a while loop
      with a lot of iterations inside a user-defined function, you
      may be chewing up a lot of stack space. You may even be
      hitting the max data space limit. You can put a call to
      ClearStack() inside your while loop to prevent this memory
      consumption, but the trade-off is that you cannot use your
      function within any sort of context. ie. you have to assign
      the output of the function to a temporary variable and then
      use this temporary variable in whatever context you need.</p>
    </dd>

    <dt><a name="clearstatcache" id="clearstatcache"><span class="big">
    ClearStatCache()</span></a></dt>

    <dd>
      <p>The stat() system call is normally an expensive operation
      on most operating systems. In order to make sure that
      repeated calls to the various File* functions like <a href=
      "#fileperms">FilePerms()</a>, <a href=
      "#fileinode">FileInode()</a>, etc. the result of the last
      stat() call is always cached. If one of the File* functions
      is called again with the same argument, the cached stat()
      result will be used. In order to force a new stat() system
      call this ClearStatCache() function may be called to clear
      the cached stat() result.</p>
    </dd>

    <dt><a name="closedir" id="closedir"><span class="big">
    closeDir()</span></a></dt>

    <dd>
      <p>closeDir closes a directory opened using the <a href=
      "#opendir">openDir</a> function.</p>
    </dd>

    <dt><a name="closelog" id="closelog"><span class="big">
    CloseLog()</span></a></dt>

    <dd>
      <p>CloseLog() closes the descriptor Syslog() uses to write to
      the system logger. See the closelog(3) UNIX man page for more
      details. See also <a href="#syslog">Syslog()</a>, <a href=
      "#openlog">OpenLog()</a> and <a href=
      "#initsyslog">InitSyslog()</a>.</p>
    </dd>

    <dt><a name="cos" id="cos"><span class="big">
    Cos(arg)</span></a></dt>

    <dd>
      <p>Cos returns the cosine of arg in radians. See also
      <a href="#sin">Sin()</a> and <a href="#tan">Tan()</a></p>
    </dd>

    <dt><a name="count" id="count"><span class="big">
    Count(array)</span></a></dt>

    <dd>
      <p>Count returns the number of items in an array variable. If
      the variable is not an array, the return value will be 1
      (because a normal variable is similar to an array with only
      one item). If the variable is not defined, the return value
      will be 0.</p>
    </dd>

    <dt><a name="crypt" id="crypt"><span class="big">
    Crypt(string,[salt])</span></a></dt>

    <dd>
      <p>Crypt will encrypt a string using the standard Unix DES
      encryption method. Arguments are a string to be encrypted and
      an optional two-character salt string to base the encryption
      on. See the Unix man page for your crypt function for more
      information. If you do not have a crypt function on your Unix
      system, you can use Michael Glad's public domain UFC-Crypt
      package which was developed in Denmark and hence not
      restricted by US export laws as long as you ftp it from an
      non-US site.</p>
    </dd>

    <dt><a name="date" id="date"><span class="big">
    Date(format,time)</span></a></dt>

    <dd>
      <p>The Date function is used to display times and dates in
      various ways. The function takes a format string and a time
      as arguments. If the time argument is left off, the current
      time and date will be used. The time argument is specified as
      an integer in number of seconds since the Unix Epoch on Jan.1
      1970. The format string is used to indicate which date/time
      components should be displayed and how they should be
      formatted. The following characters are recognized within the
      format string. Any unrecognized character is printed
      verbosely:</p>

      <ul>
        <li><code>Y - Year eg. 1995</code></li>

        <li><code>y - Year eg. 95</code></li>

        <li><code>M - Month eg. Oct</code></li>

        <li><code>m - Month eg. 10</code></li>

        <li><code>F - Month eg. October</code></li>

        <li><code>D - Day eg. Fri</code></li>

        <li><code>l - Day eg. Friday</code></li>

        <li><code>d - Day eg. 27</code></li>

        <li><code>z - Day of the year eg. 299</code></li>

        <li><code>H - Hours in 24 hour format eg. 13</code></li>

        <li><code>h - Hours in 12 hour format eg. 1</code></li>

        <li><code>i - Minutes eg. 5</code></li>

        <li><code>s - Seconds eg. 40</code></li>

        <li><code>U - Seconds since epoch eg. 814807830</code></li>

        <li><code>A - AM/PM</code></li>

        <li><code>a - am/pm</code></li>
      </ul>

      <p>See also the <a href="#mktime">MkTime()</a> function.</p>
    </dd>

    <dt><a name="dblist" id="dblist"><span class="big">
    dbList()</span></a></dt>

    <dd>
      <p>dbList outputs information about the db support compiled
      into PHP.</p>
    </dd>

    <dt><a name="dbmclose" id="dbmclose"><span class="big">
    dbmClose(filename)</span></a></dt>

    <dd>
      <p>dbmClose simply closes the specified dbm file. It will
      also unlock any lock files, so it is important to close any
      dbm files that have been opened.</p>
    </dd>

    <dt><a name="dbmdelete" id="dbmdelete"><span class="big">
    dbmDelete(filename,key)</span></a></dt>

    <dd>
      <p>dbmDelete will delete the key/content pair specified by
      the given key argument.</p>
    </dd>

    <dt><a name="dbmexists" id="dbmexists"><span class="big">
    dbmExists(filename,key)</span></a></dt>

    <dd>
      <p>dbmExists will return 1 if the key exists and 0
      otherwise.</p>
    </dd>

    <dt><a name="dbmfetch" id="dbmfetch"><span class="big">
    dbmFetch(filename,key)</span></a></dt>

    <dd>
      <p>dbmFetch will return the content string associated with
      the given key.</p>
    </dd>

    <dt><a name="dbmfirstkey" id="dbmfirstkey"><span class="big">
    dbmFirstKey(filename)</span></a></dt>

    <dd>
      <p>dbmFirstKey returns the first key in the dbm file. Note
      that no particular order is guaranteed since the order
      depends on hash table values calculated within the dbm
      implementation. You may use the <a href="#sort">Sort</a>
      function to sort arrays of data from the dbm file if
      necessary.</p>
    </dd>

    <dt><a name="dbminsert" id="dbminsert"><span class="big">
    dbmInsert(filename,key,content)</span></a></dt>

    <dd>
      <p>dbmInsert inserts a new key/content data pair into a dbm
      file. If the key already exists, the insert will fail.</p>
    </dd>

    <dt><a name="dbmnextkey" id="dbmnextkey"><span class="big">
    dbmNextKey(filename,key)</span></a></dt>

    <dd>
      <p>dbmNextKey returns the next key after the specified key.
      By calling <strong>dbmfirstkey()</strong> followed by
      successive calls to <strong>dbmnextkey()</strong> it is
      possible to visit every key/content pair in the dbm file.</p>
    </dd>

    <dt><a name="dbmopen" id="dbmopen"><span class="big">
    dbmOpen(filename,mode)</span></a></dt>

    <dd>
      <p>dbmOpen() opens a dbm file. The first argument is the
      full-path filename of the dbm file to be opened and the
      second is the file open mode which is one of <b>"r"</b>,
      <b>"n"</b> or <b>"w"</b> for read, new (implies write) and
      write respectively. If ndbm support is used, ndbm will
      actually create <em>filename.dir</em> and
      <em>filename.pag</em> files. gdbm only uses one file, as does
      the internal flat ascii file support, and Berkeley's libdb
      create a <em>filename.db</em> file. Note that PHP does its
      own file locking in addition to any file locking that may be
      done by the dbm library itself. PHP does not delete the
      <em>.lck</em> files it creates. It uses these files simply as
      fixed inodes on which to do the file locking. For more
      information on dbm files, see your Unix man pages, or obtain
      GNU's gdbm from <a href=
      "ftp://prep.ai.mit.edu/pub/gnu">ftp://prep.ai.mit.edu/pub/gnu</a>.</p>
    </dd>

    <dt><a name="dbmreplace" id="dbmreplace"><span class="big">
    dbmReplace(filename,key,content)</span></a></dt>

    <dd>
      <p>dbmReplace is similar to the <strong>dbminsert()</strong>
      function, the only difference being that if the key already
      exists, the old content string will be replaced with the
      new.</p>
    </dd>

    <dt><a name="decbin" id="decbin"><span class="big">
    DecBin(number)</span></a></dt>

    <dd>
      <p>DecBin returns a string containing a binary representation
      of the given number argument. The largest number that can be
      converted is 31 bits long or 4294967295 in decimal. See also
      the <a href="#bindec">BinDec()</a> function.</p>
    </dd>

    <dt><a name="dechex" id="dechex"><span class="big">
    DecHex(number)</span></a></dt>

    <dd>
      <p>DecHex converts a decimal number to a hexadecimal string.
      See also the <a href="#hexdec">HexDec()</a> function.</p>
    </dd>

    <dt><a name="decoct" id="decoct"><span class="big">
    DecOct(number)</span></a></dt>

    <dd>
      <p>DecOct converts a decimal number to an octal number. See
      also <a href="#octdec">OctDec()</a>.</p>
    </dd>

    <dt><a name="doubleval" id="doubleval"><span class="big">
    doubleval(variable)</span></a></dt>

    <dd>
      <p>doubleval returns the double (floating point) value of the
      variable. See also the <a href="#strval">strval()</a> and
      <a href="#intval">intval()</a> functions.</p>
    </dd>

    <dt><a name="echo" id="echo"><span class="big">Echo
    [format_string] expression [, expression
    [,...]]</span></a></dt>

    <dd>
      <p>Echo is not a function. ie. you do not put brackets around
      the arguments to it. It is used to display results of PHP
      functions or PHP variables. See the <a href="#escapes">Escape
      Character Section</a> for a list of special characters
      supported. The format_string is optional and if not present,
      no output formatting will be done. The format string is
      similar to the format string of the C <em>printf</em>
      function. See the man page for <em>printf</em> for more
      details. Up to 5 expressions can be printed with a single
      echo command. If you try to print more you will get a parser
      error. Note that the types of the expressions are not
      relevant. The expressions are automagically converted to the
      appropriate types as specified by the format string if one is
      present. If you want to format something and assign the
      formatted string to a variable instead of displaying it, use
      the <a href="#sprintf">sprintf()</a> function.</p>

      <p>The following conversions are supported,</p>

      <blockquote>
        <dl>
          <dt>%d %i</dt>

          <dd>Print a signed decimal number.</dd>

          <dt>%o</dt>

          <dd>Print an octal number.</dd>

          <dt>%u</dt>

          <dd>Print an unsigned decimal number.</dd>

          <dt>%x %X</dt>

          <dd>Print a hexadecimal number.</dd>

          <dt>%f</dt>

          <dd>Print a floating-point number.</dd>

          <dt>%e %E</dt>

          <dd>Print a floating-point number in scientific
          notation.</dd>

          <dt>%g %G</dt>

          <dd>Print a floating-point number in scientific notation
          or normal notation, as appropriate.</dd>

          <dt>%c</dt>

          <dd>Print a single character.</dd>

          <dt>%s</dt>

          <dd>Print a string of characters.</dd>

          <dt>%%</dt>

          <dd>Print a literal percent-sign.</dd>
        </dl>

        <p>The following flags are accepted.</p>

        <dl>
          <dt>'-'</dt>

          <dd>Left-justify the output within the field-width.</dd>

          <dt>'+'</dt>

          <dd>Ensure that all integers are signed (with a
          plus/minus sign).</dd>

          <dt>' '</dt>

          <dd>Similar to '+', but uses a space instead of a
          plus-sign.</dd>

          <dt>'#'</dt>

          <dd>Print prefixes in front of hex and octal numbers
          designating them as such.</dd>

          <dt>'''</dt>

          <dd>Separate the digits into groups (usually
          comma-separated groups of three).</dd>

          <dt>'0'</dt>

          <dd>Pad the field-width with zeros.</dd>
        </dl>

        <p>All of these flags are dependent upon whether or not
        your C library's printf function supports them (the ''',
        for example, is a GNU extension).</p>

        <p>Most conversions will accept a field width and a
        precision, as shown in the <code>demo_echo.html</code> file in
        the directory /examples. It is not necessary to specify any
        type modifiers, and, in fact, PHP will complain if the type
        modifier does not make sense (which is almost always the
        case). PHP will complain about (and refuse to accept)
        anything that it does not recognize. Any extra arguments
        given that are not required by the format-string are
        ignored.</p>
      </blockquote>
    </dd>

    <dt><a name="end" id="end"><span class="big">
    End(variable)</span></a></dt>

    <dd>
      <p>End moves the internal array pointer for the given
      variable to the last item of the array and returns the value
      of this item. This is useful for traversing an associative
      array in reverse order. See also <a href="#reset">Reset()</a>
      and <a href="#prev">Prev()</a>. The following example would
      traverse an associative array in reverse order:</p>
      <pre>
    &lt;?
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
    &gt;
</pre>
    </dd>

    <dt><a name="ereg" id="ereg"><span class="big">
    ereg(expr,arg[,regs])</span></a></dt>

    <dd>
      <p>ereg returns non-zero if the regular expression is matched
      in the argument string. For example, the condition,
      <code>&lt;?if (ereg("^This.*", "This is an example
      string")&gt;</code> would be true since the "^This.*"
      expression says to match the word <strong>This</strong> at
      the beginning of the string and then match any characters
      afterwards. If the <em>regs</em> argument is present, then
      match registers are filled into positions 0-10 in the array
      named by the <em>regs</em> argument. Register 0 will always
      contain the full matched string. For more information on
      regular expressions, see the <a href="#regexp">regular
      expression section</a> of this document.</p>
    </dd>

    <dt><a name="eregi" id="eregi"><span class="big">
    eregi(expr,arg[,regs])</span></a></dt>

    <dd>
      <p>eregi is identical to the <a href="#ereg">ereg()</a>
      function except for the fact that the regular expression is
      applied such that upper/lower case is ignored.</p>
    </dd>

    <dt><a name="ereg_replace" id="ereg_replace"><span class="big">
    ereg_replace(expr,replace,arg)</span></a></dt>

    <dd>
      <p>ereg_Replace scans the entire argument string and replaces
      any portions of the string matched by the given expression
      with the replacement string. For example, in the string,
      <code>"This is an example string"</code> we could very easily
      replace every space with a dash with the command:
      <strong>ereg_replace(" ","-","This is an example
      string")</strong>.For more information on regular
      expressions, see the <a href="#regexp">regular expression
      section</a> of this document.</p>
    </dd>

    <dt><a name="eregi_replace" id="eregi_replace"><span class="big">
    eregi_replace(expr,replace,arg)</span></a></dt>

    <dd>
      <p>eregi_replace is identical to the <a href=
      "#ereg_replace">ereg_replace()</a> function except for the
      fact that the regular expression is applied such that
      upper/lower case is ignored.</p>
    </dd>

    <dt><a name="escapeshellcmd" id="escapeshellcmd"><span class="big">
    EscapeShellCmd(string)</span></a></dt>

    <dd>
      <p>EscapeShellCmd escapes any characters in a string that
      might be used to trick a shell command into executing
      arbitrary commands. This function should be used to make sure
      that any data coming from user input is escaped before this
      data is passed to the <a href="#exec">Exec()</a> or <a href=
      "#system">System()</a> functions. A standard use would
      be:</p>
      <pre>
    &lt;?system(EscapeShellCmd($cmd))&gt;
</pre>
    </dd>

    <dt><a name="eval" id="eval"><span class="big">
    Eval(string)</span></a></dt>

    <dd>
      <p>Eval takes the contents of the string argument and treats
      it like a mini PHP/FI script. It will execute it as a
      separate PHP/FI script. Any variables set or accessed from
      inside the eval will be from the global reference frame in
      the current context of the eval statement in the script.
      Variable substitution is done on the string arguments, so if
      variables are to be used in the string expression they should
      be escaped. Some examples:</p>
      <pre>
    $a = "echo phpversion();";
    eval($a);

    eval("echo phpversion();");

    eval("\$a=1; echo \$a;");
</pre>
    </dd>

    <dt><a name="exec" id="exec"><span class="big">
    Exec(command_string [, array
    [,return_var]])</span></a></dt>

    <dd>
      <p>Exec executes the given unix command, however it does not
      output anything. It simply returns the last line from the
      result of the command. If you need to execute a command and
      have all the data from the command passed directly back
      without any interference, use the <a href=
      "#passthru">PassThru()</a> function. If the array argument is
      present, then the specified array will be filled with every
      line of output from the unix command starting at the end of
      the array. Make sure you <a href="#unset">UnSet</a> the array
      before the call if your array already contains elements and
      you want to start filling it at array element 0. If the
      return_var argument is present along with the array argument,
      then the return status of the executed unix command will be
      written to this variable. Note that if you are going to allow
      data coming from user input to be passed to this Exec
      function, then you should be using the <a href=
      "#escpapeshellcmd">EscapeShellCmd()</a> function to make sure
      that users cannot trick the system into executing arbitrary
      commands. See also the <a href="#system">system()</a>
      function.</p>
    </dd>

    <dt><a name="exit" id="exit"><span class="big">
    Exit</span></a></dt>

    <dd>
      <p>The Exit command is used to terminate parsing right away
      as soon as this tag is parsed.</p>
    </dd>

    <dt><a name="exp" id="exp"><span class="big">
    Exp(arg)</span></a></dt>

    <dd>
      <p>Exp returns e raised to the power of arg. See also
      <a href="#pow">pow()</a></p>
    </dd>

    <dt><a name="fclose" id="fclose"><span class="big">
    fclose($fd)</span></a></dt>

    <dd>
      <p>fclose() closes a file opened by <a href=
      "#fopen">fopen()</a>. The argument is a file pointer index as
      returned by the fopen() call.</p>
    </dd>

    <dt><a name="feof" id="feof"><span class="big">
    feof($fd)</span></a></dt>

    <dd>
      <p>Feof returns true if the file referred to by the file
      pointer index argument has hit end-of-file.</p>
    </dd>

    <dt><a name="fgets" id="fgets"><span class="big">
    fgets($fd,bytes)</span></a></dt>

    <dd>
      <p>fgets() reads a line from a file opened by <a href=
      "#fopen">fopen()</a>. Arguments are a file pointer index as
      returned by fopen() and the max number of bytes to read.
      Reading ends when max number of bytes have been read, or on
      an end of line. This is similar to the C fgets() call. See
      also <a href="#fputs">fputs()</a>.</p>
    </dd>

    <dt><a name="fgetss" id="fgetss"><span class="big">
    fgetss($fd,bytes)</span></a></dt>

    <dd>
      <p>Identical to the fgets() function, except this one tries
      to strip off any HTML tags or PHP/FI script tags as it is
      reading the file.</p>
    </dd>

    <dt><a name="file" id="file"><span class="big">$array =
    File(filename)</span></a></dt>

    <dd>
      <p>File reads the entire file and returns an array with each
      array element containing a line of the file starting with
      array index <strong>0</strong>.</p>
    </dd>

    <dt><a name="fileatime" id="fileatime"><span class="big">
    fileAtime(filename)</span></a></dt>

    <dd>
      <p>fileAtime returns the time of last data access. If the
      file does not exist, or if it for some other reason could not
      be accessed, this function returns -1. If repeated calls to
      fileAtime and the rest ofthe file* functions are to be made
      and the file being accessed might change or disappear, the
      <a href="#clearstatcache">ClearStatCache()</a> should be
      called before the call to the file* function.</p>
    </dd>

    <dt><a name="filectime" id="filectime"><span class="big">
    fileCtime(filename)</span></a></dt>

    <dd>
      <p>fileCtime returns the time of last status change. If the
      file does not exist, or if it for some other reason could not
      be accessed, this function returns -1. If repeated calls to
      fileCtime and the rest ofthe file* functions are to be made
      and the file being accessed might change or disappear, the
      <a href="#clearstatcache">ClearStatCache()</a> should be
      called before the call to the file* function.</p>
    </dd>

    <dt><a name="filegroup" id="filegroup"><span class="big">
    fileGroup(filename)</span></a></dt>

    <dd>
      <p>fileGroup returns the group id of the owner of the file.
      If the file does not exist, or if it for some other reason
      could not be accessed, this function returns -1. If repeated
      calls to fileGroup and the rest ofthe file* functions are to
      be made and the file being accessed might change or
      disappear, the <a href="#clearstatcache">ClearStatCache()</a>
      should be called before the call to the file* function.</p>
    </dd>

    <dt><a name="fileinode" id="fileinode"><span class="big">
    fileInode(filename)</span></a></dt>

    <dd>
      <p>fileInode returns the file's inode. If the file does not
      exist, or if it for some other reason could not be accessed,
      this function returns -1. If repeated calls to fileInode and
      the rest ofthe file* functions are to be made and the file
      being accessed might change or disappear, the <a href=
      "#clearstatcache">ClearStatCache()</a> should be called
      before the call to the file* function.</p>
    </dd>

    <dt><a name="filemtime" id="filemtime"><span class="big">
    fileMtime(filename)</span></a></dt>

    <dd>
      <p>fileMtime returns the time of last data modification. If
      the file does not exist, or if it for some other reason could
      not be accessed, this function returns -1. If repeated calls
      to fileMtime and the rest ofthe file* functions are to be
      made and the file being accessed might change or disappear,
      the <a href="#clearstatcache">ClearStatCache()</a> should be
      called before the call to the file* function.</p>
    </dd>

    <dt><a name="fileowner" id="fileowner"><span class="big">
    fileOwner(filename)</span></a></dt>

    <dd>
      <p>fileOwner returns the uid of the owner of the file. If the
      file does not exist, or if it for some other reason could not
      be accessed, this function returns -1. If repeated calls to
      fileOwner and the rest ofthe file* functions are to be made
      and the file being accessed might change or disappear, the
      <a href="#clearstatcache">ClearStatCache()</a> should be
      called before the call to the file* function.</p>
    </dd>

    <dt><a name="fileperms" id="fileperms"><span class="big">
    filePerms(filename)</span></a></dt>

    <dd>
      <p>filePerms returns the permission bits of the file. This is
      the <em>st_mode</em> field of the Unix C stat structure. If
      the file does not exist, or if it for some other reason could
      not be accessed, this function returns -1. If repeated calls
      to filePerms and the rest ofthe file* functions are to be
      made and the file being accessed might change or disappear,
      the <a href="#clearstatcache">ClearStatCache()</a> should be
      called before the call to the file* function.</p>
    </dd>

    <dt><a name="filesize" id="filesize"><span class="big">
    fileSize(filename)</span></a></dt>

    <dd>
      <p>fileSize returns the size of the file in bytes. If the
      file does not exist, or if it for some other reason could not
      be accessed, this function returns -1. If repeated calls to
      fileSize and the rest ofthe file* functions are to be made
      and the file being accessed might change or disappear, the
      <a href="#clearstatcache">ClearStatCache()</a> should be
      called before the call to the file* function.</p>
    </dd>

    <dt><a name="filetype" id="filetype"><span class="big">
    fileType(filename)</span></a></dt>

    <dd>
      <p>fileType returns the type of the file. The return values
      are one of: "dir", "file","fifo","char", "block", or "link".
      These are for, directory, regular file, fifo special,
      character special, block special and symbolic link,
      respectively.</p>
    </dd>

    <dt><a name="floor" id="floor"><span class="big">
    Floor(value)</span></a></dt>

    <dd>
      <p>Floor() rounds a floating point value down to the previous
      integer. The return value is of type double (floating point)
      such that it can be used properly in complex equations. To
      get an integer type back, use: <code>$new =
      IntVal(Floor($value));</code><br>
      See also <a href="#ceil">Ceil()</a>.</p>
    </dd>

    <dt><a name="flush" id="flush"><span class="big">
    Flush()</span></a></dt>

    <dd>
      <p>The Flush() function is used to Flush the output buffer.
      For the Apache module, it flushes Apache's output buffer, and
      for the CGI version it simply flushes stdout. When running as
      a CGI under Apache, the server will buffer the CGI script's
      output, so this Flush() function won't help much there. Look
      at running your script as an nph- script if you are running
      the CGI version of PHP under the Apache web server. Or,
      alternatively, run the Apache module version of PHP.</p>
    </dd>

    <dt><a name="fopen" id="fopen"><span class="big">$fp =
    fopen(filename,mode)</span></a></dt>

    <dd>
      <p>fopen() opens a file and returns a file pointer index. If
      the file could not be opened the function returns -1. It is
      similar to the C fopen() call. The filename argument is the
      relative or absolute path to the file to be opened, and the
      mode argument is one of, "r", "r+", "w", "w+", "a", "a+". See
      the Unix man page on the fopen() call for more information.
      See also the <a href="#popen">popen()</a> function
      description. See also the <a href="#fclose">fclose()</a>
      function description.</p>

      <p>Example:</p>
      <pre>
    $fp = fopen("/home/rasmus/file.txt","r");
</pre>
    </dd>

    <dt><a name="fputs" id="fputs"><span class="big">
    fputs(fp,string)</span></a></dt>

    <dd>
      <p>fputs() writes a line to a file opened by <a href=
      "#fopen">fopen()</a>. Arguments are a file pointer index as
      returned by fopen() and the string to write. Note that the
      string argument may contain the special escape characters,
      <strong>\n</strong>, <strong>\r</strong> and
      <strong>\t</strong> to output newlines, carriage returns and
      tabs respectively. See also <a href="#fgets">fgets()</a>.</p>
    </dd>

    <dt><a name="fpassthru" id="fpassthru"><span class="big">
    FPassThru(fp)</span></a></dt>

    <dd>
      <p>FPassThru() outputs all remaining data on <i>fp</i>
      directly. It is different from <a href=
      "#readfile">ReadFile()</a> in that it can also handle files
      opened with <a href="#fsockopen">fsockopen()</a>. It differs
      from <a href="#passthru">PassThru()</a> in that it does not
      handle commands, but opened files. FPassThru() returns the
      number of bytes read and written.</p>
    </dd>

    <dt><a name="fseek" id="fseek"><span class="big">
    fseek(fp,pos)</span></a></dt>

    <dd>
      <p>fseek() positions a file pointer identified by the $fd
      argument which is the return value of the <a href=
      "#fopen">fopen()</a> call. The file pointer is positioned at
      the beginning of the file plus the offset specified by the
      <strong>pos</strong> argument. See also <a href=
      "#ftell">ftell()</a> and <a href="#rewind">rewind()</a>.</p>
    </dd>

    <dt><a name="fsockopen" id="fsockopen"><span class="big">fp =
    fsockopen(hostname,port)</span></a></dt>

    <dd>
      <p>fsockopen() opens a socket connection and returns a file
      pointer index. This file pointer index can be used by
      <a href="#fgets">fgets</a>, <a href="#fputs">fputs</a> and
      <a href="#fclose">fclose</a>. Arguments are a hostname and a
      port number. Return values are: -3 if the socket couldn't be
      created, -4 if the dns lookup on the hostname failed, -5 if
      the connection was refused or it timed out, -6 if the actual
      fdopen() call failed or -7 if the setvbuf() call failed. If
      the port number is 0, then the hostname argument will be
      treated as a filename of a Unix domain socket if your
      operating system support Unix domain sockets.</p>
    </dd>

    <dt><a name="ftell" id="ftell"><span class="big">pos =
    ftell(fp)</span></a></dt>

    <dd>
      <p>ftell() returns the position of a file pointer identified
      by the fp argument which is the return value of the <a href=
      "#fopen">fopen()</a> call. The position can later be used as
      an argument to fseek(). See also <a href="#fseek">fseek()</a>
      and <a href="#rewind">rewind()</a>.</p>
    </dd>

    <dt><a name="getaccdir" id="getaccdir"><span class="big">
    getAccDir()</span></a></dt>

    <dd>
      <p>getAccDir returns the directory where PHP access
      configuration files are kept. The access configuration
      filenames come from the numerical user id of the user whose
      access configurations they represent.</p>
    </dd>

    <dt><a name="getenv" id="getenv"><span class="big">
    GetEnv(string)</span></a></dt>

    <dd>
      <p>GetEnv returns the value of the environment value
      specified by <em>string</em>. Normally this function is not
      used because environment variables are available to PHP/FI
      directly. If a reference is made to a variable which is not
      found in the internal symbol table, then the environment
      space is automatically searched. GetEnv should be used when
      it is necessary to ensure that an environment variable has
      not been overwritten by normal PHP/FI variable. Security
      mechanisms that rely on http server-defined variables like
      REMOTE_ADDR and REMOTE_HOST should load these variables using
      GetEnv as opposed to referencing them directly as
      $REMOTE_ADDR to avoid someone making up a fake form and
      posting the data to your server and thereby bypassing
      whatever security mechanism you might have.</p>
    </dd>

    <dt><a name="gethostbyname" id="gethostbyname"><span class="big">
    getHostByName(domain_name)</span></a></dt>

    <dd>
      <p>getHostByName converts the given domain name into an IP
      address in nnn.nnn.nnn.nnn format.</p>
    </dd>

    <dt><a name="gethostbyaddr" id="gethostbyaddr"><span class="big">
    getHostByAddr(ip_address)</span></a></dt>

    <dd>
      <p>getHostByAddr converts the given IP address in
      nnn.nnn.nnn.nnn format into a fully qualified domain
      name.</p>
    </dd>

    <dt><a name="getimagesize" id="getimagesize"><span class="big">
    GetImageSize(filename)</span></a></dt>

    <dd>
      <p>The GetImageSize() function takes either a full path
      filename, or a relative path relative to the location of the
      calling script. It returns a 3 element array consisting of
      width, height and type. Width and height are in pixels, and a
      type of 1 means GIF, a 2 indicates a JPG file and a 3
      indicates a PNG file. Other file types are not supported. The
      fourth element in the returned array is a string containing,
      "width=x height=y" that is suitable for using directly in an
      IMG tag. It is important to note that the GD image library is
      not needed to use this function. An example follows:</p>
      <pre>
    &lt;?
        $result = GetImageSize("img/flag.jpg");
    &gt;
    &lt;IMG SRC="img/flag.jpg" ?echo $result[3]&gt; &gt;
</pre>
    </dd>

    <dt><a name="getlastaccess" id="getlastaccess"><span class="big">
    getLastAccess()</span></a></dt>

    <dd>
      <p>getLastAccess returns the date and time in unix time
      format of the last time the current page was access. This
      value can be passed to the <a href="#date">Date()</a>
      function for formatting.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="getlastbrowser" id="getlastbrowser"><span class="big">
    getLastbrowser()</span></a></dt>

    <dd>
      <p>getLastBrowser returns the identification string of
      browser the last user to access the current page used.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="getlastemail" id="getlastemail"><span class="big">
    getLastEmail()</span></a></dt>

    <dd>
      <p>getLastEmail returns the E-Mail address of the last user
      to access the current page.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="getlasthost" id="getlasthost"><span class="big">
    getLastHost()</span></a></dt>

    <dd>
      <p>getLastHost returns the hostname of the last user to
      access the current page.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="getlastmod" id="getlastmod"><span class="big">
    getLastMod()</span></a></dt>

    <dd>
      <p>getLastMod returns the date and time in unix time format
      of the last time the current page was modified. This value
      can be passed to the <a href="#date">Date()</a> function for
      formatting.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="getlastref" id="getlastref"><span class="big">
    getLastref()</span></a></dt>

    <dd>
      <p>getLastRef returns the URL of the referring document of
      the last user to access the current page.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="getlogdir" id="getlogdir"><span class="big">
    getLogDir()</span></a></dt>

    <dd>
      <p>getLogDir returns the top-level directory under which PHP
      log files can be found. The actual log files are in
      directories under this directory. Each subdirectory is the
      numerical user id of the user to whom the log files belong.
      Then within each directory a series of dbm log files are
      found, each with the numerical inode of the file they
      represent as the primary component of the filename.</p>
    </dd>

    <dt><a name="getmyinode" id="getmyinode"><span class="big">
    getMyInode()</span></a></dt>

    <dd>
      <p>getMyInode returns the numerical inode of the current HTML
      file.</p>
    </dd>

    <dt><a name="getmypid" id="getmypid"><span class="big">
    getMyPid()</span></a></dt>

    <dd>
      <p>getMyPid() returns the current process id of the PHP
      parsing process.</p>
    </dd>

    <dt><a name="getmyuid" id="getmyuid"><span class="big">
    getMyUid()</span></a></dt>

    <dd>
      <p>getMyUid returns the numerical user id of the owner of the
      current HTML file.</p>
    </dd>

    <dt><a name="getrandmax" id="getrandmax"><span class="big">
    getRandMax()</span></a></dt>

    <dd>
      <p>getRandMax returns the maximum random number the <a href=
      "#rand">Rand</a> function will return. If the value returned
      does not seem to be accurate, have a look in the php.h source
      file in the PHP distribution for more information.</p>
    </dd>

    <dt><a name="getstartlogging" id="getstartlogging"><span class="big">
    getStartLogging()</span></a></dt>

    <dd>
      <p>getStartLogging returns the time and date in Unix time
      format when logging commenced on the current page. This is
      more accurate when mSQL-based logging is used since a
      timestamp is kept in each log file. For dbm-logging the time
      returned is the time the user's log directory was
      created.</p>
    </dd>

    <dt><a name="gettoday" id="gettoday"><span class="big">
    getToday()</span></a></dt>

    <dd>
      <p>getToday returns the total number of hits the current page
      has had since 12 midnight local time.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="gettotal" id="gettotal"><span class="big">
    getTotal()</span></a></dt>

    <dd>
      <p>getTotal returns the total number of hits the current page
      has had since access logging was started on the page.<br>
      This function is only available if PHP was compiled with
      Access Logging enabled.</p>
    </dd>

    <dt><a name="gettype" id="gettype"><span class="big">
    GetType(variable)</span></a></dt>

    <dd>
      <p>GetType returns the type of the variable. The return value
      is a string and it is one of, "integer", "double" or
      "string". See also the <a href="#settype">SetType()</a>
      function</p>
    </dd>

    <dt><a name="gmdate" id="gmdate"><span class="big">
    gmDate(format,time)</span></a></dt>

    <dd>
      <p>gmDate is identical to the <a href="#date">Date</a>
      function except for the fact that it uses Greenwich Mean Time
      instead of the current local time.</p>
    </dd>

    <dt><a name="header" id="header"><span class="big">
    Header(header_string)</span></a></dt>

    <dd>
      <p>The Header command is used at the top of an HTML file to
      send raw HTTP header strings. See the <a href=
      "http://www.w3.org/Protocols/rfc2068/rfc2068">HTTP
      Specification</a> for more information on raw http headers.
      Remember that the Header() command must be used before any
      actual output is sent either by normal HTML tags or by PHP
      echo commands.<br>
      Usage examples can be found in the <a href="#http_auth">HTTP
      Authentication</a> section.</p>
    </dd>

    <dt><a name="hexdec" id="hexdec"><span class="big">
    HexDec(hex_string)</span></a></dt>

    <dd>
      <p>HexDec converts a hexadecimal string to a decimal number.
      See also the <a href="#dechex">DecHex()</a> function.</p>
    </dd>

    <dt><a name="htmlspecialchars" id=
    "htmlspecialchars"><span class="big">HtmlSpecialChars(string)</span></a></dt>

    <dd>
      <p>HtmlSpecialChars converts any characters with ascii codes
      in the string argument between 160 and 255 inclusive to their
      corresponding HTML Entity names. The function returns the
      converted string. The <b>&lt;</b>, <b>&gt;</b>, <b>&amp;</b>
      and <b>"</b> are also converted.</p>
    </dd>

    <dt><a name="imagearc" id="imagearc"><span class="big">
    ImageArc(im, cx, cy, w, h, s, e, col)</span></a></dt>

    <dd>
      <p>ImageArc draws a partial ellipse centered at cx,cy (top
      left is 0,0) in the image represented by <a href=
      "#imagecreate">im</a>. w and h specifies the ellipse's width
      and height respectively while the start and end points are
      specified in degrees indicated by the s and e
      arguments.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagechar" id="imagechar"><span class="big">
    ImageChar(im, size, x, y, c, col)</span></a></dt>

    <dd>
      <p>ImageChar draws the character c in the image identified by
      <a href="#imagecreate">im</a> at coordinates x,y (top left is
      0,0) in colour col. The size argument can be 1, 2, 3, 4 or 5
      indicating the size of the font to be used. 1 is the smallest
      and 5 is the largest.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagecharup" id="imagecharup"><span class="big">
    ImageCharUp(im, size, x, y, c, col)</span></a></dt>

    <dd>
      <p>ImageCharUp draws the character c vertically in the image
      identified by <a href="#imagecreate">im</a> at coordinates
      x,y (top left is 0,0) in colour col. The size argument can be
      1, 2, 3, 4 or 5 indicating the size of the font to be used. 1
      is the smallest and 5 is the largest.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagecolorallocate" id=
    "imagecolorallocate"><span class="big">col =
    ImageColorAllocate(im, red, green, blue)</span></a></dt>

    <dd>
      <p>ImageColorAllocate returns a colour identifier
      representing the colour composed of the given RGB components.
      The im argument is the return from the <a href=
      "#imagecreate">ImageCreate</a> function. ImageColorAllocate
      must be called to create each colour that is to be used in
      the image represented by im.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagecolortransparent" id=
    "imagecolortransparent"><span class="big">
    ImageColorTransparent(im, col)</span></a></dt>

    <dd>
      <p>ImageColorTransparent sets the transparent colour in the
      im image to col. im is the image identifier returned by
      <a href="#imagecreate">ImageCreate</a> and col is the colour
      identifier returned by <a href=
      "#imagecolorallocate">ImageColorAllocate</a>. This function
      is only available if GD support has been enabled in PHP.</p>
    </dd>

    <dt><a name="imagecopyresized" id=
    "imagecopyresized"><span class="big">ImageCopyResized(dst_im,
    src_im, dstX, dstY, srcX, srcY, dstW, dstH, srcW, srcH
    )</span></a></dt>

    <dd>
      <p>ImageCopyResized copies a rectangular portion of one image
      to another image. <em>dst_im</em> is the destination image,
      <em>src_im</em> is the source image identifier. If the source
      and destination coordinates and width and heights differ,
      appropriate stretching or shrinking of the image fragment
      will be performed. The coordinates refer to the upper left
      corner. This function can be used to copy regions within the
      same image (if <em>dst_im</em> is the same as
      <em>src_im</em>) but if the regions overlap the results will
      be unpredictable.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagecreate" id="imagecreate"><span class="big">im =
    ImageCreate(x_size, y_size)</span></a></dt>

    <dd>
      <p>ImageCreate returns an image identifier representing a
      blank image of size x_size by y_size.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagecreatefromgif" id=
    "imagecreatefromgif"><span class="big">im =
    ImageCreateFromGif(filename)</span></a></dt>

    <dd>
      <p>ImageCreateFromGif returns an image identifier
      representing the image obtained from the given
      <em>filename</em>.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagedestroy" id="imagedestroy"><span class="big">
    ImageDestroy(im)</span></a></dt>

    <dd>
      <p>ImageDestroy frees any memory associated with image im. im
      is the image identifier returned by the <a href=
      "#imagecreate">ImageCreate</a> function. This function is
      only available if GD support has been enabled in PHP.</p>
    </dd>

    <dt><a name="imagefill" id="imagefill"><span class="big">
    ImageFill(im, x, y, col)</span></a></dt>

    <dd>
      <p>ImageFill performs a flood fill starting at coordinate x,y
      (top left is 0,0) with colour col in image im.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagefilledpolygon" id=
    "imagefilledpolygon"><span class="big">ImageFilledPolygon(im,
    points, num_points, col)</span></a></dt>

    <dd>
      <p>ImageFilledPolygon creates a filled polygon in image
      <a href="#imagecreate">im</a>. points is a PHP array
      containing the polygon's vertices. ie. points[0] = x0,
      points[1] = y0, points[2] = x1, points[3] = y1, etc.
      num_points is the total number of vertices.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagefilledrectangle" id=
    "imagefilledrectangle"><span class="big">ImageFilledRectangle(im,
    x1, y1, x2, y2, col)</span></a></dt>

    <dd>
      <p>ImageFilledRectangle creates a filled rectangle of colour
      col in image im starting at upper left coordinate x1,y1 and
      ending at bottom right coordinate x2,y2. 0,0 is the top left
      corner of the image.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagefilltoborder" id=
    "imagefilltoborder"><span class="big">ImageFillToBorder(im, x, y,
    border, col)</span></a></dt>

    <dd>
      <p>ImageFillToBorder performs a flood fill whose border
      colour is defined by border. The starting point for the fill
      is x,y (top left is 0,0) and the region is filled with colour
      col.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagegif" id="imagegif"><span class="big">
    ImageGif(im [,filename])</span></a></dt>

    <dd>
      <p>ImageGif creates the GIF file in filename from the image
      im. The im argument is the return from the <a href=
      "#imagecreate">ImageCreate</a> function. The filename
      argument is optional, and if left off, the raw image stream
      will be returned directly. By sending an <em>image/gif</em>
      content-type using the <a href="#header">Header()</a>
      function, you can create a PHP/FI script which returns GIF
      images directly using this function.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imageinterlace" id="imageinterlace"><span class="big">
    ImageInterlace(im, interlace)</span></a></dt>

    <dd>
      <p>ImageInterlace turns the interlace bit on or off. If
      interlace is 1 the im image will be interlaced, and if
      interlace is 0 the interlace bit is turned off. This
      functions is only available if GD support has been enabled in
      PHP.</p>
    </dd>

    <dt><a name="imageline" id="imageline"><span class="big">
    ImageLine(im, x1, y1, x2, y2, col)</span></a></dt>

    <dd>
      <p>ImageLine draws a line from x1,y1 to x2,y2 (top left is
      0,0) in image <a href="#imagecreate">im</a> of colour
      <a href="#imagecolorallocate">col</a>.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagepolygon" id="imagepolygon"><span class="big">
    ImagePolygon(im, points, num_points, col)</span></a></dt>

    <dd>
      <p>ImagePolygon creates a polygon in image <a href=
      "#imagecreate">im</a>. points is a PHP array containing the
      polygon's vertices. ie. points[0] = x0, points[1] = y0,
      points[2] = x1, points[3] = y1, etc. num_points is the total
      number of vertices.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagerectangle" id="imagerectangle"><span class="big">
    ImageRectangle(im, x1, y1, x2, y2, col)</span></a></dt>

    <dd>
      <p>ImageRectangle creates a rectangle of colour col in image
      im starting at upper left coordinate x1,y1 and ending at
      bottom right coordinate x2,y2. 0,0 is the top left corner of
      the image.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagesetpixel" id="imagesetpixel"><span class="big">
    ImageSetPixel(im, x, y, col)</span></a></dt>

    <dd>
      <p>ImageSetPixel draws a pixel at x,y (top left is 0,0) in
      image <a href="#imagecreate">im</a> of colour <a href=
      "#imagecolorallocate">col</a>.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagestring" id="imagestring"><span class="big">
    ImageString(im, size, x, y, s, col)</span></a></dt>

    <dd>
      <p>ImageString draws the string s in the image identified by
      <a href="#imagecreate">im</a> at coordinates x,y (top left is
      0,0) in colour col. The size argument can be 1, 2, 3, 4 or 5
      indicating the size of the font to be used. 1 is the smallest
      and 5 is the largest.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagestringup" id="imagestringup"><span class="big">
    ImageStringUp(im, size, x, y, s, col)</span></a></dt>

    <dd>
      <p>ImageStringUp draws the string s vertically in the image
      identified by <a href="#imagecreate">im</a> at coordinates
      x,y (top left is 0,0) in colour col. The size argument can be
      1, 2, 3, 4 or 5 indicating the size of the font to be used. 1
      is the smallest and 5 is the largest.<br>
      This function is only available if GD support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="imagesx" id="imagesx"><span class="big">
    ImageSX(im)</span></a></dt>

    <dd>
      <p>ImageSX returns the width of the image identified by
      <em>im</em>.</p>
    </dd>

    <dt><a name="imagesy" id="imagesy"><span class="big">
    ImageSY(im)</span></a></dt>

    <dd>
      <p>ImageSY returns the height of the image identified by
      <em>im</em>.</p>
    </dd>

    <dt><a name="include" id="include"><span class="big">
    Include(filename)</span></a></dt>

    <dd>
      <p>The Include command can be used to insert other files into
      the current html file. This is extremely handy for headers
      and footers which may need to be included in hundreds of HTML
      files. By using an include command you then only need to
      modify the header or footer file in one place when it needs
      to be changed. Since full PHP parsing is done on the included
      file, you can also use the include command to include common
      PHP scripts you may have written. Sort of like having a
      primitive shared library of scripts you can call from your
      HTML file. You can place such common library files in one
      directory and set PHP's include path and not have to refer to
      the files with pathnames. For Apache module users this can be
      configured with the <strong>phpIncludePath</strong>
      directive, for CGI users with the PHP_INCLUDE_PATH
      environment variable. This path is colon-separated just like
      <code>$PATH</code> is in your UNIX shell. eg.</p>
      <pre>
    &lt;?include("/path/filename.txt")&gt;
</pre>
    </dd>

    <dt><a name="initsyslog" id="initsyslog"><span class="big">
    InitSyslog()</span></a></dt>

    <dd>
      <p>InitSyslog() defines some PHP variables that you need when
      using OpenLog() and Syslog(). These variables are not defined
      by default for efficiency reasons. The variables are named in
      the same way as in the &lt;syslog.h&gt; C include file (such
      as $LOG_LOCAL0). See your syslog(3) UNIX manual page for more
      details. See also <a href="#initsyslog">InitSyslog()</a>,
      <a href="#syslog">Syslog()</a> and <a href=
      "#closelog">CloseLog()</a>.</p>
    </dd>

    <dt><a name="intval" id="intval"><span class="big">
    intval(variable)</span></a></dt>

    <dd>
      <p>intval returns the long integer value of the variable. See
      also the <a href="#strval">strval()</a> and <a href=
      "#doubleval">doubleval()</a> functions.</p>
    </dd>

    <dt><a name="isset" id="isset"><span class="big">
    IsSet(variable)</span></a></dt>

    <dd>
      <p>The IsSet function returns 1 if the given variable is
      defined, and 0 if it isn't.</p>
    </dd>

    <dt><a name="key" id="key"><span class="big">
    Key(variable)</span></a></dt>

    <dd>
      <p>Key returns the key of the current array item. The current
      item is determined by the position of the array pointer for
      the given variable. This array pointer may be manipulated
      with the <a href="#reset">Reset()</a>, <a href=
      "#end">End()</a>, <a href="#next">Next()</a>, and <a href=
      "#prev">Prev()</a> functions. This function is mainly used
      for determining the key value for an item in an associative
      array, although it will work for normal array as well.</p>
    </dd>

    <dt><a name="link" id="link"><span class="big">
    Link(target,link)</span></a></dt>

    <dd>
      <p>Link() creates a hard link. See the <a href=
      "#symlink">Symlink()</a> function for creating symbolic links
      (soft) links. See also <a href="#readlink">ReadLink</a> and
      <a href="#LinkInfo">LinkInfo</a> functions.</p>
    </dd>

    <dt><a name="linkinfo" id="linkinfo"><span class="big">
    LinkInfo(path)</span></a></dt>

    <dd>
      <p>LinkInfo returns the st_dev field of the UNIX C stat
      structure returned by the lstat system call. This function is
      used to verify if a link (pointed to by path) really exists
      (using the same method as the S_ISLNK macro defined in
      stat.h). Returns -1 in case of error.</p>
    </dd>

    <dt><a name="log" id="log"><span class="big">
    Log(arg)</span></a></dt>

    <dd>
      <p>Log returns the natural logarithm of arg.</p>
    </dd>

    <dt><a name="log10" id="log10"><span class="big">
    Log10(arg)</span></a></dt>

    <dd>
      <p>Log10 returns the base-10 logarithm of arg.</p>
    </dd>

    <dt><a name="logas" id="logas"><span class="big">
    LogAs(filename)</span></a></dt>

    <dd>
      <p>The LogAs() function will treat the hit on the current
      page as if it as actually received on the argument
      filename.</p>
    </dd>

    <dt><a name="mail" id="mail"><span class="big">
    Mail(to,subject,message[,headers])</span></a></dt>

    <dd>
      <p>Mail automatically mails the message specified in the
      message argument to the receiver specified in the to
      argument. Multiple recipients can be specified by spaces
      between them in the to argument.</p>

      <p>eg.</p>
      <pre>
   mail("rasmus@lerdorf.on.ca", 
        "My Subject", 
        "Line 1\nLine 2\nLine 3");
</pre>If a fourth string argument is passed, this string is
inserted at the end of the header, example:
      <pre>
   mail("ssb@guardian.no", "the subject", $message,
        "X-Mailer: PHP/FI " + phpversion());
</pre>
    </dd>

    <dt><a name="max" id="max"><span class="big">
    Max(array)</span></a></dt>

    <dd>
      <p>Max returns the maximum value of a PHP array. ie. it will
      search through the entire array looking for the max element.
      If it is an array of strings, the returned string is the
      string which would be alphabetically last in the array if it
      were sorted.</p>
    </dd>

    <dt><a name="md5" id="md5"><span class="big">
    Md5(message)</span></a></dt>

    <dd>
      <p>Md5 returns the MD5 hash of a string value.</p>
    </dd>

    <dt><a name="mi_close" id="mi_close"><span class="big">
    mi_Close(connection_id)</span></a></dt>

    <dd>
      <p>mi_Close will close down the connection to an Illustra
      database associated with the given connection identifier.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_connect" id="mi_connect"><span class="big">
    $connection = mi_Connect(database, username,
    password)</span></a></dt>

    <dd>
      <p>mi_Connect opens a connection to an Illustra database.
      Each of the arguments should be a quoted string. This
      function returns a connection_id. This identifier is needed
      by other Illustra functions. You can have multiple
      connections open at once. The host to connect to is governed
      by the MI_PARAMS file on the machine running the PHP
      executable. No support as yet for remote invocation This
      function will return <strong>-1</strong> on error.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_dbname" id="mi_dbname"><span class="big">
    mi_DBname(connection_id)</span></a></dt>

    <dd>
      <p>mi_DBname will return the name of the database that the
      given Illustra connection identifier is connected to.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_exec" id="mi_exec"><span class="big">$result =
    mi_Exec(connection_id, query_string)</span></a></dt>

    <dd>
      <p>mi_Exec will send an SQL statement to the Illustra
      database specified by the connection_id. The connection_id
      must be a valid identifier that was returned by mi_Connect.
      The return value of this function is an identifier to be used
      to access the results from other Illustra functions. This
      function will return <strong>-1</strong> on error.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_fieldname" id="mi_fieldname"><span class="big">
    mi_FieldName(connection_id, result_id,
    field_number)</span></a></dt>

    <dd>
      <p>mi_FieldName will return the name of the field occupying
      the given column number with the given Illustra result and
      connection identifiers. Field numbering starts from 0.</p>

      <p>This function will return <strong>-1</strong> on
      error.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_fieldnum" id="mi_fieldnum"><span class="big">
    mi_FieldNum(connection_id, result_id,
    field_name)</span></a></dt>

    <dd>
      <p>mi_FieldNum will return the number of the column slot that
      corresponds to the named field in the given Illustra result
      identifier. Field numbering starts at 0. This function will
      return <strong>-1</strong> on error.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_numfields" id="mi_numfields"><span class="big">
    mi_NumFields(connection_id, result_id)</span></a></dt>

    <dd>
      <p>mi_NumFields will return the number of fields (columns) in
      an Illustra result. The argument is a valid result identifier
      returned by mi_Exec. This function will return
      <strong>-1</strong> on error.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_numrows" id="mi_numrows"><span class="big">
    mi_NumRows(connection_id, result_id)</span></a></dt>

    <dd>
      <p>mi_NumRows will return the number of rows in an Illustra
      result. The argument is a valid result identifier returned by
      mi_Exec. This function will return <strong>-1</strong> on
      error.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="mi_result" id="mi_result"><span class="big">
    mi_Result(connection_id, result_id, row_number, field
    name/index)</span></a></dt>

    <dd>
      <p>mi_Result will return values from a result identifier
      produced by mi_Exec. The row_number and field name specify
      what cell in the table of results to return. Row numbering
      starts from 0. Instead of naming the field, you may use the
      field index as an unquoted number. Field indices start from
      0.</p>

      <p>All values returned from the database are in String form,
      since no type-detection is available at the present.</p>

      <p>This function is only available if Illustra support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="microtime" id="microtime"><span class="big">
    Microtime()</span></a></dt>

    <dd>
      <p>Microtime() returns a string "msec sec" where sec is
      number of seconds since 00:00 GMT, Jan 1, 1970, and msec is
      the microseconds part (as fraction of seconds). Ex
      "0.87633900 825010464".<br>
      This function is only available on operating systems that
      support the gettimeofday() system call.</p>
    </dd>

    <dt><a name="min" id="min"><span class="big">
    Min(array)</span></a></dt>

    <dd>
      <p>Min returns the minimum value of a PHP array. ie. it will
      search through the entire array looking for the min element.
      If it is an array of strings, the returned string is the
      string which would be alphabetically first in the array if it
      were sorted.</p>
    </dd>

    <dt><a name="mkdir" id="mkdir"><span class="big">
    MkDir(dir,mode)</span></a></dt>

    <dd>
      <p>MkDir creates a directory. The <em>mode</em> parameter
      must be given in <a href="#octal">octal</a> notation. eg.
      MkDir("DirName",0755);</p>
    </dd>

    <dt><a name="mktime" id="mktime"><span class="big">
    MkTime(hour,min,sec,mon,day,year)</span></a></dt>

    <dd>
      <p>MkTime returns a time in Unix timestamp (long integer)
      format which corresponds to the date and time specified by
      the arguments. Arguments may be left out in which case the
      given component is set to the current value according to the
      current local time and date. These left out arguments may
      only be left out from right to left. ie.
      <code>MkTime(hour,min,sec)</code> is valid, but
      <code>MkTime(mon,day,year)</code> is not valid. Note that this
      function can be very handy as a tool for doing both date
      arithmetic and date validation. You can feed it invalid
      parameters, such as a month greater than 12, or a day greater
      than 31 and it will figure out the right date anyway. It will
      also generate an error message if any of the parameters are
      outside the normal values. Use the <a href=
      "#seterrorreporting">SetErrorReporting(0)</a> function to
      turn this error reporting off before calling the function and
      you may then check the $phperrmsg for any errors that may
      have occurred.</p>

      <p>eg.</p>
      <pre>
        SetErrorReporting(0);
        $a = MkTime(0,0,0,13,1,1997);
        SetErrorReporting(1);
        echo $phperrmsg;
</pre>
    </dd>

    <dt><a name="msql" id="msql"><span class="big">$result =
    msql($database,$query)</span></a></dt>

    <dd>
      <p>msql sends an mSQL query. Arguments are the database name
      and the query string. ie. <strong><code>&lt;?msql("MyDatabase"
      , "select * from table")&gt;</code></strong>. The return value
      from this function is a result identifier to be used to
      access the results from the other msql_ functions. A result
      identifier is a positive integer. The function returns
      <strong>0</strong> when no result identifier is created. This
      is the case with any queries that do not return anything,
      such as <em>create</em>, <em>update</em>, <em>drop</em>,
      <em>insert</em> and <em>delete</em>. The function will return
      <strong>-1</strong> if an error occurs. A string describing
      the error will be placed in $phperrmsg, and unless the
      function was called as <strong>@msql()</strong> then this
      error string will also be printed out. For mSQL 2.0, the
      $result variable will contain the number of rows affected by
      the SQL command performed. If you want your application to be
      portable to mSQL 1.0, do not rely on this.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_close" id="msql_close"><span class="big">
    msql_close()</span></a></dt>

    <dd>
      <p>msql_Close closes the socket connection to the msql
      daemon, if an open connection exists. Note, since only one
      concurrent mSQL session can be open at any one time, this
      function does not take an argument.</p>
    </dd>

    <dt><a name="msql_connect" id="msql_connect"><span class="big">
    msql_connect($hostname)</span></a></dt>

    <dd>
      <p>msql_Connect specifies the host name or IP on which the
      mSQL database engine resides. This is equivalent to the
      msqlConnect() function in the mSQL C API. The one difference
      between this function and the C API equivalent is that if the
      function isn't called, a connection to the local host is made
      by default on the first call to the msql() function. And,
      there is no need for an msql_close function since only one
      connection may be active at any one time. If a second call to
      msql_connect() is made in a file, then the connection to the
      first host is automatically closed. To explicitly connect to
      the msql daemon on the local host, use:
      <strong><code>&lt;?msql_connect("localhost")&gt;</code></strong><br>

      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_createdb" id="msql_createdb"><span class="big">
    msql_CreateDB($database)</span></a></dt>

    <dd>
      <p>msql_CreateDB creates the given database.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_dbname" id="msql_dbname"><span class="big">
    msql_dbName($result,$i)</span></a></dt>

    <dd>
      <p>msql_dbName returns the database name stored in position
      <em>$i</em> of the result pointer returned from the <a href=
      "#msql_listdbs">msql_ListDbs()</a> function. The <a href=
      "#msql_numrows">msql_NumRows()</a> function can be used to
      determine how many database names are available.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_dropdb" id="msql_dropdb"><span class="big">
    msql_DropDB($database)</span></a></dt>

    <dd>
      <p>msql_DropDB deletes the given mSQL database. Use this with
      caution as all data in the database will be lost.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_fieldflags" id="msql_fieldflags"><span class="big">
    msql_FieldFlags($result,$i)</span></a></dt>

    <dd>
      <p>msql_FieldFlags returns the field flags of the specified
      field. Currently this is either, "not null", "primary key", a
      combination of the two or "" (an empty string).<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_fieldlen" id="msql_fieldlen"><span class="big">
    msql_FieldLen($result,$i)</span></a></dt>

    <dd>
      <p>msql_FieldLen returns the length of the specified
      field.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_fieldname" id="msql_fieldname"><span class="big">
    msql_FieldName($result,$i)</span></a></dt>

    <dd>
      <p>msql_FieldName returns the name of the specified field.
      Arguments to the function is the result identifier and the
      field index. ie. <code>msql_FieldName($result,2);</code> will
      return the name of the second field in the result associated
      with the result identifier.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_fieldtype" id="msql_fieldtype"><span class="big">
    msql_FieldType($result,$i)</span></a></dt>

    <dd>
      <p>msql_FieldType is similar to the msql_FieldName()
      function. The arguments are identical, but the field type is
      returned. This will be one of "int", "char" or "real".<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_freeresult" id="msql_freeresult"><span class="big">
    msql_FreeResult($result)</span></a></dt>

    <dd>
      <p>msql_FreeResult only needs to be called if you are worried
      about using too much memory while your script is running. All
      result memory will automatically be freed when the script is
      finished. But, if you are sure you are not going to need the
      result data anymore in a script, you may call msql_freeresult
      with the result identifier as an argument and the associated
      result memory will be freed.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_listdbs" id="msql_listdbs"><span class="big">
    $result = msql_ListDBs()</span></a></dt>

    <dd>
      <p>msql_ListDBs will return a result pointer containing the
      databases available from the current mSQL daemon. Use the
      <a href="#msql_dbname">msql_dbName()</a> function to traverse
      this result pointer.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_listfields" id="msql_listfields"><span class="big">
    $result =
    msql_Listfields($database,$tablename)</span></a></dt>

    <dd>
      <p>msql_listfields retrieves information about the the given
      tablename. Arguments are the database name and the table
      name. A result pointer is returned which can be used with
      msql_fieldflags, msql_fieldlen, msql_fieldname,
      msql_fieldtype. A result identifier is a positive integer.
      The function returns -1 if a error occurs. A string
      describing the error will be placed in $phperrmsg, and unless
      the function was called as @msql() then this error string
      will also be printed out.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_listtables" id="msql_listtables"><span class="big">
    $result = msql_ListTables($database)</span></a></dt>

    <dd>
      <p>msql_ListTables takes a database name and result pointer
      much like the <a href="#msql">msql()</a> function. The
      <a href="#msql_tablename">msql_TableName()</a> function
      should be used to extract the actual table names from the
      result pointer.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_numfields" id="msql_numfields"><span class="big">
    msql_NumFields($result)</span></a></dt>

    <dd>
      <p>msql_NumFields returns the number of fields in a result.
      The argument is the result identifier returned by the msql()
      function.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_numrows" id="msql_numrows"><span class="big">
    msql_NumRows($result)</span></a></dt>

    <dd>
      <p>msql_NumRows simply returns the number of rows in a
      result. The argument is the result identifier returned by the
      msql() function.<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_regcase" id="msql_regcase"><span class="big">
    msql_RegCase(string)</span></a></dt>

    <dd>
      <p>msql_RegCase takes a string argument and converts it to
      the regular expression needed to send to mSQL in order to get
      a case insensitive match. This turns a string like "abc" into
      "[Aa][Bb][Cc]".<br>
      This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_result" id="msql_result"><span class="big">
    msql_Result($result,$i,field)</span></a></dt>

    <dd>
      <p>msql_Result displays a field from a returned record.
      Arguments are the result identifier returned by the msql()
      function, an integer which is the index of the record to be
      viewed and a field name. The field argument supports the
      "table.field" syntax for handling results from a join. This
      function is perhaps best illustrated with a complete
      example:</p>
      <pre>
    &lt;?
      $name = "bob";  
      $result = msql($database,"select * from table where firstname='$name'");
      $num = msql_numrows($result);
      echo "$num records found!&lt;p&gt;";
      $i=0;
      while($i&lt;$num);
        echo msql_result($result,$i,"fullname");
        echo "&lt;br&gt;";
        echo msql_result($result,$i,"address");
        echo "&lt;br&gt;";
        $i++;
      endwhile;
    &gt;
</pre>

      <p>The above script connects to the mSQL engine on the local
      machine, sets the <em>name</em> variable to <em>bob</em> and
      sends a query which asks for all the fields from a table
      where the <em>firstname</em> field is set to <em>bob</em>. It
      then displays the number of records it found after which it
      loops through each of the found records and displays the
      <em>fullname</em> and <em>address</em> fields for each
      record. As you can see, it would be trivial to add HTML
      markup tags around the printed fields to format the results
      in a table or in whatever manner is desired. Note that there
      is no msql_connect() call. msql_connect need only be called
      if a connection to a remote database is desired.</p>

      <p>This function is only available if mSQL support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="msql_tablename" id="msql_tablename"><span class="big">
    msql_TableName($result,$i)</span></a></dt>

    <dd>
      <p>msql_TableName takes a result pointer returned by the
      <a href="#msql_listtables">msql_ListTables()</a> function as
      well as an integer index and returns the name of a table. The
      <a href="#msql_numrows">msql_NumRows()</a> function may be
      used to determine the number of tables in the result pointer.
      An example would be:</p>
      <pre>
    &lt;?
      $result = msql_listtables("dbname");
      $i=0;
      while($i &lt;  msql_numrows($result));
        $tb_names[$i]=msql_tablename($result, $i);
        echo $tb_names[$i];
        echo "&lt;BR&gt;";
        $i++;
      endwhile;
    &gt;
</pre><br>
      This function is only available if mSQL support has been
      enabled in PHP.
    </dd>

    <dt><a name="mysql" id="mysql"><span class="big">$result =
    mysql($database,$query)</span></a></dt>

    <dd>
      <p>mysql sends a mysql query. Arguments are the database name
      and the query string. ie. <strong><code>&lt;?mysql("MyDatabase"
      , "select * from table")&gt;</code></strong>. The return value
      from this function is a result identifier to be used to
      access the results from the other mysql_ functions. A result
      identifier is a positive integer. The function returns
      <strong>0</strong> when no result identifier is created. This
      is the case with any queries that do not return anything,
      such as <em>create</em>, <em>update</em>, <em>drop</em>,
      <em>insert</em> and <em>delete</em>. The function will return
      <strong>-1</strong> if an error occurs. A string describing
      the error will be placed in $phperrmsg, and unless the
      function was called as <strong>@mysql()</strong> then this
      error string will also be printed out.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_affected_rows" id=
    "mysql_affected_rows"><span class="big">
    mysql_affected_rows()</span></a></dt>

    <dd>
      <p>mysql_affected_rows() returns number of rows affected by
      the last INSERT, UPDATE or DELETE query.</p>
    </dd>

    <dt><a name="mysql_close" id="mysql_close"><span class="big">
    mysql_close()</span></a></dt>

    <dd>
      <p>mysql_Close closes the socket connection to the mysql
      daemon, if an open connection exists.</p>
    </dd>

    <dt><a name="mysql_connect" id="mysql_connect"><span class="big">
    mysql_connect($hostname [,username
    [,password]])</span></a></dt>

    <dd>
      <p>mysql_Connect specifies the host name or IP on which the
      mysql database engine resides. This is equivalent to the
      mysqlConnect() function in the mysql C API. The one
      difference between this function and the C API equivalent is
      that if the function isn't called, a connection to the local
      host is made by default on the first call to the mysql()
      function. And, there is no need for an mysql_close function
      since only one connection may be active at any one time. If a
      second call to mysql_connect() is made in a file, then the
      connection to the first host is automatically closed.</p>

      <p>An optional username and password may be provided. Note
      that when PHP is compiled to run in <a href="#safemode">SAFE
      MODE</a> then the username must either be the same as the
      owner of the file being processed, or the owner of the httpd
      process (usually nobody). Any other username will fail.</p>

      <p>To explicitly connect to the mysql daemon on the local
      host, use:
      <strong><code>&lt;?mysql_connect("localhost")&gt;</code></strong><br>

      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_createdb" id="mysql_createdb"><span class="big">
    mysql_CreateDB($database)</span></a></dt>

    <dd>
      <p>mysql_CreateDB creates the given database.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_dbname" id="mysql_dbname"><span class="big">
    mysql_dbName($result,$i)</span></a></dt>

    <dd>
      <p>mysql_dbName returns the database name stored in position
      <em>$i</em> of the result pointer returned from the <a href=
      "#mysql_listdbs">mysql_ListDbs()</a> function. The <a href=
      "#mysql_numrows">mysql_NumRows()</a> function can be used to
      determine how many database names are available.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_dropdb" id="mysql_dropdb"><span class="big">
    mysql_DropDB($database)</span></a></dt>

    <dd>
      <p>mysql_DropDB deletes the given mysql database. Use this
      with caution as all data in the database will be lost.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_fieldflags" id=
    "mysql_fieldflags"><span class="big">mysql_FieldFlags($result,$i)</span></a></dt>

    <dd>
      <p>mysql_FieldFlags returns the field flags of the specified
      field. Currently this is either, "not null", "primary key", a
      combination of the two or "" (an empty string).<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_fieldlen" id="mysql_fieldlen"><span class="big">
    mysql_FieldLen($result,$i)</span></a></dt>

    <dd>
      <p>mysql_FieldLen returns the length of the specified
      field.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_fieldname" id="mysql_fieldname"><span class="big">
    mysql_FieldName($result,$i)</span></a></dt>

    <dd>
      <p>mysql_FieldName returns the name of the specified field.
      Arguments to the function is the result identifier and the
      field index. ie. <code>mysql_FieldName($result,2);</code> will
      return the name of the second field in the result associated
      with the result identifier.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_fieldtype" id="mysql_fieldtype"><span class="big">
    mysql_FieldType($result,$i)</span></a></dt>

    <dd>
      <p>mysql_FieldType is similar to the mysql_FieldName()
      function. The arguments are identical, but the field type is
      returned. This will be one of "int", "char" or "real".<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_freeresult" id=
    "mysql_freeresult"><span class="big">mysql_FreeResult($result)</span></a></dt>

    <dd>
      <p>mysql_FreeResult only needs to be called if you are
      worried about using too much memory while your script is
      running. All result memory will automatically be freed when
      the script is finished. But, if you are sure you are not
      going to need the result data anymore in a script, you may
      call mysql_freeresult with the result identifier as an
      argument and the associated result memory will be
      freed.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_insert_id" id="mysql_insert_id"><span class="big">
    mysql_insert_id()</span></a></dt>

    <dd>
      <p>mysql_insert_id() returns the ID generated for an
      AUTO_INCREMENT field. This function takes no arguments. It
      will return the auto-generated ID returned by the last INSERT
      query performed.</p>
    </dd>

    <dt><a name="mysql_listdbs" id="mysql_listdbs"><span class="big">
    $result = mysql_ListDBs()</span></a></dt>

    <dd>
      <p>mysql_ListDBs will return a result pointer containing the
      databases available from the current mysql daemon. Use the
      <a href="#mysql_dbname">mysql_dbName()</a> function to
      traverse this result pointer.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_listfields" id=
    "mysql_listfields"><span class="big">$result =
    mysql_Listfields($database,$tablename)</span></a></dt>

    <dd>
      <p>mysql_listfields retrieves information about the the given
      tablename. Arguments are the database name and the table
      name. A result pointer is returned which can be used with
      mysql_fieldflags, mysql_fieldlen, mysql_fieldname,
      mysql_fieldtype. A result identifier is a positive integer.
      The function returns -1 if a error occurs. A string
      describing the error will be placed in $phperrmsg, and unless
      the function was called as @mysql() then this error string
      will also be printed out.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_listtables" id=
    "mysql_listtables"><span class="big">$result =
    mysql_ListTables($database)</span></a></dt>

    <dd>
      <p>mysql_ListTables takes a database name and result pointer
      much like the <a href="#mysql">mysql()</a> function. The
      <a href="#mysql_tablename">mysql_TableName()</a> function
      should be used to extract the actual table names from the
      result pointer.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_numfields" id="mysql_numfields"><span class="big">
    mysql_NumFields($result)</span></a></dt>

    <dd>
      <p>mysql_NumFields returns the number of fields in a result.
      The argument is the result identifier returned by the mysql()
      function.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_numrows" id="mysql_numrows"><span class="big">
    mysql_NumRows($result)</span></a></dt>

    <dd>
      <p>mysql_NumRows simply returns the number of rows in a
      result. The argument is the result identifier returned by the
      mysql() function.<br>
      This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_result" id="mysql_result"><span class="big">
    mysql_Result($result,$i,field)</span></a></dt>

    <dd>
      <p>mysql_Result displays a field from a returned record.
      Arguments are the result identifier returned by the mysql()
      function, an integer which is the index of the record to be
      viewed and a field name. The field argument supports the
      "table.field" syntax for handling results from a join. One
      difference between mSQL 1.0 and mysql is that mysql supports
      functions that can act on the result data. These functions
      can be applied in this function. This function is perhaps
      best illustrated with a complete example:</p>
      <pre>
    &lt;?
      $name = "bob";  
      $result = mysql($database,"select * from table where firstname='$name'");
      $num = mysql_numrows($result);
      echo "$num records found!&lt;p&gt;";
      $i=0;
      while($i&lt;$num);
        echo mysql_result($result,$i,"lcase(fullname)");
        echo "&lt;br&gt;";
        echo mysql_result($result,$i,"address");
        echo "&lt;br&gt;";
        $i++;
      endwhile;
    &gt;
</pre>

      <p>The above script connects to the mysql engine on the local
      machine, sets the <em>name</em> variable to <em>bob</em> and
      sends a query which asks for all the fields from a table
      where the <em>firstname</em> field is set to <em>bob</em>. It
      then displays the number of records it found after which it
      loops through each of the found records and displays the
      <em>fullname</em> and <em>address</em> fields for each
      record. The lcase() call in the result function changes the
      returned string to lower case. For a complete set of
      functions that can be applied to the result data, see your
      mysql documentation. As you can see, it would be trivial to
      add HTML markup tags around the printed fields to format the
      results in a table or in whatever manner is desired. Note
      that there is no mysql_connect() call. mysql_connect need
      only be called if a connection to a remote database is
      desired.</p>

      <p>This function is only available if mysql support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="mysql_tablename" id="mysql_tablename"><span class="big">
    mysql_TableName($result,$i)</span></a></dt>

    <dd>
      <p>mysql_TableName takes a result pointer returned by the
      <a href="#mysql_listtables">mysql_ListTables()</a> function
      as well as an integer index and returns the name of a table.
      The <a href="#mysql_numrows">mysql_NumRows()</a> function may
      be used to determine the number of tables in the result
      pointer. An example would be:</p>
      <pre>
    &lt;?
      $result = mysql_listtables("dbname");
      $i=0;
      while($i &lt;  mysql_numrows($result));
        $tb_names[$i]=mysql_tablename($result, $i);
        echo $tb_names[$i];
        echo "&lt;BR&gt;";
        $i++;
      endwhile;
    &gt;
</pre><br>
      This function is only available if mysql support has been
      enabled in PHP.
    </dd>

    <dt><a name="next" id="next"><span class="big">
    Next(variable)</span></a></dt>

    <dd>
      <p>Next moves the internal array pointer to the next item in
      the array. This happens automatically when an array is
      accessed using the non-indexed method ($array[]). The
      function returns the value of the new item. This function can
      be used to move the pointer forward without having to access
      the array explicitly. One use would be to traverse an
      associative array and only printing out the keys of the array
      and not the actual contents.</p>
      <pre>
    &lt;?
      Reset($array);
      $i=0;
      while($i &lt; count($array));
        echo key($array);
        next($array);
        $i++;
      endwhile;
    &gt;
</pre>
    </dd>

    <dt><a name="octdec" id="octdec"><span class="big">
    OctDec(octal_number)</span></a></dt>

    <dd>
      <p>OctDec converts an octal number to a decimal number. See
      also <a href="#decoct">DecOct()</a>.</p>
    </dd>

    <dt><a name="opendir" id="opendir"><span class="big">
    openDir(directory)</span></a></dt>

    <dd>
      <p>openDir opens the specified directory and places an
      internal pointer to the beginning of the directory. Directory
      entries are read using the <a href="#readdir">readDir</a>
      function, and an opened directory should be closed with the
      <a href="#closedir">closeDir</a> function.</p>
    </dd>

    <dt><a name="openlog" id="openlog"><span class="big">
    OpenLog(ident,options,facility)</span></a></dt>

    <dd>
      <p>OpenLog() initializes the system for further Syslog()
      calls. See the openlog(3) UNIX man page for more details. See
      also <a href="#initsyslog">InitSyslog()</a>, <a href=
      "#syslog">Syslog()</a> and <a href=
      "#closelog">CloseLog()</a>.</p>
    </dd>

    <dt><a name="ora_bind" id="ora_bind"><span class="big">
    Ora_Bind(cursor_ind, php_variable_name, sql_variable_name,
    size)</span></a><br></dt>

    <dd>Ora_Bind() performs binding of PHP variables with Oracle
    ones.<br>
    <br>
    Function parameters are:<br></dd>

    <dd>
      <var>cursor_id</var> - oracle cursor id for _parsed_ SQL
      query or PL/SQL block;<br>
      <var>php_variable_name</var> - variable name in PHP script
      without leading '$'<br>
      <var>sql_variable_name</var> - variable name in SQL with
      leading colon<br>
      <var>size</var> - maximal number of bytes to be taken into
      account at binding<br>
      <br>
      <b>Notes:</b><br>
      1) PHP variable <b>SHOULD</b> be initialised with at least
      <b>size</b> bytes length string even it is return-only
      variable.<br>
      2) Ora_Bind() <b>SHOULD</b> be used after Ora_Parse and
      before Ora_Exec. In case of re-parsing the SQL sentence, all
      used variables have to be re-bound.<br>
      <br>
      Ora_Bind() returns 0 upon success, -1 upon failure.<br>

      <p>There is an example of Ora_Bind() usage:</p>
      <pre>

        /* This is the PHP variable to be bound */
        $rc  = "12345";

        /* This is the SQL query. */
        $query = "SELECT * FROM my_table where my_index = :indiana";
        
        ........

        if (Ora_Parse($cursor, $query) &lt; 0) {
            echo("Parse failed!\n"
            Ora_Logoff($conn);
            exit;
        } 

        if (Ora_Bind($cursor, "rc", ":indiana", strlen($rc)) &lt; 0) {
            echo("Binding failed!\n"
            Ora_Logoff($conn);
            exit;
        } 

        /* Execute the SQL statement associated with $cursor and
        prepare storage for select-list items. */
        $ncols = Ora_Exec($cursor);
        
        ......

</pre>
    </dd>

    <dt><a name="ora_close" id="ora_close"><span class="big">
    Ora_Close(conn_ind)</span></a></dt>

    <dd>Ora_Close() closes the Oracle connection identified by
    <var>conn_ind</var>. Returns 0 upon success, -1 upon
    failure.</dd>

    <dt><a name="ora_commit" id="ora_commit"><span class="big">
    Ora_Commit(conn_ind)</span></a></dt>

    <dd>Commits the current transaction on <var>conn_ind</var>. The
    current transaction starts from the <a href=
    "#ora_logon">Ora_Logon()</a> call or from the last Ora_Commit()
    or <a href="#ora_rollback">Ora_Rollback()</a>, and lasts until
    an Ora_Commit(), <a href="#ora_rollback">Ora_Rollback()</a> or
    <a href="#ora_logoff">Ora_Logoff()</a> call is issued.
    Ora_Commit() returns -1 (and an error message) upon
    failure.</dd>

    <dt><a name="ora_commitoff" id="ora_commitoff"><span class="big">
    Ora_CommitOff(conn_ind)</span></a></dt>

    <dd>Ora_CommitOff() turns off autocommit (automatic commit of
    every SQL data manipulation statement) on the Oracle connection
    <var>conn_ind</var>.</dd>

    <dt><a name="ora_commiton" id="ora_commiton"><span class="big">
    Ora_CommitOn(conn_ind)</span></a></dt>

    <dd>Ora_CommitOff() turns on autocommit (automatic commit of
    every SQL data manipulation statement) on the Oracle connection
    <var>conn_ind</var>.</dd>

    <dt><a name="ora_exec" id="ora_exec"><span class="big">
    Ora_Exec(cursor_ind)</span></a></dt>

    <dd>Ora_Exec() executes the SQL statement associated with
    <var>cursor_ind</var> and prepares storage for select-list
    items. The return value is the number of columns for selects,
    or -1 on error.</dd>

    <dt><a name="ora_fetch" id="ora_fetch"><span class="big">
    Ora_Fetch(cursor_ind)</span></a></dt>

    <dd>Ora_Fetch() retrieves a row from the database. Returns 1 if
    a column was retrieved, 0 if there are no more columns to
    retrieve or -1 on error.</dd>

    <dt><a name="ora_getcolumn" id="ora_getcolumn"><span class="big">
    Ora_GetColumn(cursor_ind, column)</span></a></dt>

    <dd>Ora_GetColumn() fetches data for a single column in a
    returned row. <a href="ora_fetch">Ora_Fetch()</a> must have
    been called prior to Ora_GetColumn().</dd>

    <dt><a name="ora_logoff" id="ora_logoff"><span class="big">
    Ora_Logoff(conn_ind)</span></a></dt>

    <dd>Ora_Logoff() disconnects the logon data area belonging to
    <var>conn_ind</var> and frees used Oracle resources.</dd>

    <dt><a name="ora_logon" id="ora_logon"><span class="big">
    Ora_Logon(userid, password)</span></a></dt>

    <dd>Ora_Logon() establishes a connection between PHP and an
    Oracle database with the given user id and password. Returns 0
    on success and -1 on failure.</dd>

    <dt><a name="ora_open" id="ora_open"><span class="big">
    Ora_Open(conn_ind)</span></a></dt>

    <dd>Ora_Open() opens a cursor in Oracle that maintains state
    information about the processing of a SQL statement. Returns a
    cursor index or -1 on error.</dd>

    <dt><a name="ora_parse" id="ora_parse"><span class="big">
    Ora_Parse(cursor_ind, sql_statement [,
    defer])</span></a></dt>

    <dd>Ora_Parse() parses a SQL statement or PL/SQL block and
    associates it with a cursor. An optional third argument can be
    set to 1 to defer the parse. Returns 0 on success or -1 on
    error.</dd>

    <dt><a name="ora_rollback" id="ora_rollback"><span class="big">
    Ora_Rollback(cursor_ind)</span></a></dt>

    <dd>Ora_Rollback() rolls back the current transaction. See
    <a href="#ora_commit">Ora_Commit()</a> for a definition of the
    current transaction.</dd>

    <dt><a name="ord" id="ord"><span class="big">
    Ord(arg)</span></a></dt>

    <dd>
      <p>Ord returns the ASCII value of the first character of
      arg.</p>
    </dd>

    <dt><a name="parse_str" id="parse_str"><span class="big">
    Parse_Str(arg)</span></a></dt>

    <dd>
      <p>Parse_str takes a string identical to a regular URL
      encoded string and extracts variables and their values.<br>
      ex.</p>
      <pre>
    &lt;? parse_str("a[]=hello+world&amp;a[]=second+variable");
        echo $a[],"&lt;br&gt;";
        echo $a[],"&lt;br&gt;";
    &gt;

produces

hello world
second variable
</pre>
    </dd>

    <dt><a name="passthru" id="passthru"><span class="big">
    PassThru(command_string [,return_var])</span></a></dt>

    <dd>
      <p>The PassThru() function is similar to the <a href=
      "#exec">Exec()</a> function in that it executes a Unix
      command. If the return_var argument is present, the return
      status of the Unix command will be placed here. This command
      should be used in place of Exec or System when the output
      from the Unix command is binary data which needs to be passed
      directly back to the browser. A common use for this is to
      execute something like the pbmplus utilities that can output
      an image stream directly. By setting the content-type to
      <em>image/gif</em> and then calling a pbmplus program to
      output a gif, you can create PHP/FI scripts that output
      images directly.</p>
    </dd>

    <dt><a name="pclose" id="pclose"><span class="big">
    pclose(fp)</span></a></dt>

    <dd>
      <p>Pclose closes a pipe opened using the <a href=
      "#popen">popen()</a> function.</p>
    </dd>

    <dt><a name="pg_close" id="pg_close"><span class="big">
    pg_Close(connection_id)</span></a></dt>

    <dd>
      <p>pg_Close will close down the connection to a Postgres
      database associated with the given connection identifier.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_connect" id="pg_connect"><span class="big">
    $connection = pg_Connect(host, port, options, tty,
    dbname)</span></a></dt>

    <dd>
      <p>pg_Connect opens a connection to a Postgres database. Each
      of the arguments should be a quoted string, including the
      port number. The options and tty arguments are optional and
      can be empty strings. This function returns a connection_id.
      This identifier is needed by other Postgres functions. You
      can have multiple connections open at once. This function
      will return <strong>0</strong> on error.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_dbname" id="pg_dbname"><span class="big">
    pg_DBname(connection_id)</span></a></dt>

    <dd>
      <p>pg_DBname will return the name of the database that the
      given Postgres connection identifier is connected to.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_errorMessage" id="pg_errorMessage"><span class="big">
    pg_ErrorMessage(connection_id)</span></a></dt>

    <dd>
      <p>If an error occured on the last database action for which
      a valid connection exists, this function will return a string
      containing the error message generated by the back-end
      server.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_exec" id="pg_exec"><span class="big">$result =
    pg_Exec(connection_id, query_string)</span></a></dt>

    <dd>
      <p>pg_Exec will send an SQL statement to the Postgres
      database specified by the connection_id. The connection_id
      must be a valid identifier that was returned by pg_Connect.
      The return value of this function is an identifier to be used
      to access the results from other Postgres functions. This
      function will return <strong>0</strong> on error. It will
      return <strong>1</strong> when the command executed correctly
      but are not expected to returned data (insert or update
      commands, for example). Note that selects which return no
      data will still return a valid result greater than 1.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_fieldname" id="pg_fieldname"><span class="big">
    pg_FieldName(result_id, field_number)</span></a></dt>

    <dd>
      <p>pg_FieldName will return the name of the field occupying
      the given column number in the given Postgres result
      identifier. Field numbering starts from 0.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_fieldprtlen" id="pg_fieldprtlen"><span class="big">
    pg_FieldPrtLen(result_id, row_number,
    field_name)</span></a></dt>

    <dd>
      <p>pg_FieldPrtLen will return the actual printed length
      (number of characters) of a specific value in a Postgres
      result. Row numbering starts at 0. This function will return
      <strong>-1</strong> on an error.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_fieldnum" id="pg_fieldnum"><span class="big">
    pg_FieldNum(result_id, field_name)</span></a></dt>

    <dd>
      <p>pg_FieldNum will return the number of the column slot that
      corresponds to the named field in the given Postgres result
      identifier. Field numbering starts at 0. This function will
      return <strong>-1</strong> on error.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_fieldsize" id="pg_fieldsize"><span class="big">
    pg_FieldSize(result_id, field_name)</span></a></dt>

    <dd>
      <p>pg_FieldSize will return the internal storage size (in
      bytes) of the named field in the given Postgres result. A
      field size of 0 indicates a variable length field. This
      function will return <strong>-1</strong> on error.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_fieldtype" id="pg_fieldtype"><span class="big">
    pg_FieldType(result_id, field_number)</span></a></dt>

    <dd>
      <p>pg_FieldType will return a string containing the type name
      of the given field in the given Postgres result identifier.
      Field numbering starts at 0.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_freeresult" id="pg_freeresult"><span class="big">
    pg_FreeResult(result_id)</span></a></dt>

    <dd>
      <p>pg_FreeResult only needs to be called if you are worried
      about using too much memory while your script is running. All
      result memory will automatically be freed when the script is
      finished. But, if you are sure you are not going to need the
      result data anymore in a script, you may call pg_freeresult
      with the result identifier as an argument and the associated
      result memory will be freed.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_getlastoid" id="pg_getlastoid"><span class="big">
    pg_GetLastOid()</span></a></dt>

    <dd>
      <p>pg_GetLastOid can be used to retrieve the Oid assigned to
      an inserted tuple if the last command sent via pg_Exec was an
      SQL Insert. This function will return a positive integer if
      there was a valid Oid. It will return <strong>-1</strong> if
      an error occured or the last command sent via pg_Exec was not
      an Insert.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_host" id="pg_host"><span class="big">
    pg_Host(connection_id)</span></a></dt>

    <dd>
      <p>pg_Host will return the host name the the given Postgres
      connection identifier is connected to.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_numfields" id="pg_numfields"><span class="big">
    pg_NumFields(result_id)</span></a></dt>

    <dd>
      <p>pg_NumFields will return the number of fields (columns) in
      a Postgres result. The argument is a valid result identifier
      returned by pg_Exec. This function will return
      <strong>-1</strong> on error.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_numrows" id="pg_numrows"><span class="big">
    pg_NumRows(result_id)</span></a></dt>

    <dd>
      <p>pg_NumRows will return the number of rows in a Postgres
      result. The argument is a valid result identifier returned by
      pg_Exec. This function will return <strong>-1</strong> on
      error.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_options" id="pg_options"><span class="big">
    pg_Options(connection_id)</span></a></dt>

    <dd>
      <p>pg_Options will return a string containing the options
      specified on the given Postgres connection identifier.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_port" id="pg_port"><span class="big">
    pg_Port(connection_id)</span></a></dt>

    <dd>
      <p>pg_Port will return the port number that the given
      Postgres connection identifier is connected to.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_result" id="pg_result"><span class="big">
    pg_Result(result_id, row_number, field
    name/index)</span></a></dt>

    <dd>
      <p>pg_Result will return values from a result identifier
      produced by pg_Exec. The row_number and field name specify
      what cell in the table of results to return. Row numbering
      starts from 0. Instead of naming the field, you may use the
      field index as an unquoted number. Field indices start from
      0.</p>

      <p>Postgres has many built in types and only the basic ones
      are directly supported here. All forms of integer, boolean
      and oid types are returned as integer values. All forms of
      float, and real types are returned as double values. All
      other types, including arrays are returned as strings
      formatted in the same default Postgres manner that you would
      see in the 'monitor' or 'psql' programs.</p>

      <p>Support for returning PHP arrays of numerical and string
      data from a Postgres result is planned for a later date.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="pg_tty" id="pg_tty"><span class="big">
    pg_tty(connection_id)</span></a></dt>

    <dd>
      <p>pg_tty will return the tty name that server side debugging
      output is sent to on the given Postgres connection
      identifier.</p>

      <p>This function is only available if Postgres support has
      been enabled in PHP.</p>
    </dd>

    <dt><a name="phpinfo" id="phpinfo"><span class="big">
    phpInfo()</span></a></dt>

    <dd>
      <p>phpInfo prints the same page you get when adding "?info"
      to a PHP/FI parsed URL or when you run the php.cgi binary by
      itself. It is especially useful for debugging scripts in the
      Apache module version since it displays a number of useful
      internal data.</p>
    </dd>

    <dt><a name="phpversion" id="phpversion"><span class="big">
    phpVersion()</span></a></dt>

    <dd>
      <p>phpVersion returns the version number of PHP/FI currently
      running.</p>
    </dd>

    <dt><a name="popen" id="popen"><span class="big">fp =
    popen(command,mode)</span></a></dt>

    <dd>
      <p>Popen opens a pipe to a command and returns a file pointer
      index. This file pointer index can be used by <a href=
      "#fgets">fgets</a>, <a href="#fputs">fputs</a> and <a href=
      "#fclose">fclose</a>. Arguments are the command to run and
      the mode. The mode can be either "r" for read or "w" for
      write. See the UNIX C library popen man page for more
      details. Any file opened with popen() should be closed using
      the <a href="#pclose">pclose()</a> function.</p>
    </dd>

    <dt><a name="pos" id="pos"><span class="big">
    pos(var)</span></a></dt>

    <dd>
      <p>The Pos() function returns the numerical position of an
      array element within that array. This is not very useful for
      normal arrays, but for associative arrays it can be
      handy.</p>
    </dd>

    <dt><a name="pow" id="pow"><span class="big">
    pow(x,y)</span></a></dt>

    <dd>
      <p>Evaluates x raised to the power of y. See also <a href=
      "#exp">Exp()</a></p>
    </dd>

    <dt><a name="prev" id="prev"><span class="big">
    Prev(variable)</span></a></dt>

    <dd>
      <p>Prev moves the internal array pointer for the given
      variable to the previous item in the array. If already at the
      beginning of the list, the pointer will point to the first
      item. The function returns the value of the new item. This
      function is useful for traversing an associative array in
      reverse order. See the example in the <a href=
      "#end">End()</a> definition. Also see <a href=
      "#next">Next()</a>.</p>
    </dd>

    <dt><a name="putenv" id="putenv"><span class="big">
    PutEnv(string)</span></a></dt>

    <dd>
      <p>PutEnv puts the given string in the environment. Not
      extremely useful since the local environment variables are
      wiped out when PHP is done with a page, but in some cases it
      is useful if other things called from within a PHP script
      checks environment variables. For example, if you want to run
      multiple mSQL daemon processes, you will need to use PutEnv
      to switch back and forth between the different sockets.</p>
    </dd>

    <dt><a name="quotemeta" id="quotemeta"><span class="big">
    QuoteMeta(arg)</span></a></dt>

    <dd>
      <p>QuoteMeta returns a string composed of arg with any
      regular expression special characters escaped with a
      backslash.</p>
    </dd>

    <dt><a name="rand" id="rand"><span class="big">
    Rand()</span></a></dt>

    <dd>
      <p>Rand returns a random number between 0 and RANDMAX.
      <b>Remember</b> to seed your random number generator with a
      call to <a href="#srand">srand()</a> before calling rand().
      You only need to seed the random number generator once.
      RANDMAX can be determined with the <a href=
      "#getrandmax">getRandMax</a> function. Normally a specific
      range is chosen by simply using the modulus operator on the
      result.</p>
    </dd>

    <dt><a name="readdir" id="readdir"><span class="big">
    readDir()</span></a></dt>

    <dd>
      <p>readDir reads the next entry from the currently open
      directory structure. Once an entry is read, the pointer is
      advanced to the next entry in the directory and the next call
      to this function will return the next entry in the directory.
      Use the <a href="#opendir">openDir</a> function to open a
      directory before calling this function.</p>
    </dd>

    <dt><a name="readfile" id="readfile"><span class="big">
    ReadFile(filename)</span></a></dt>

    <dd>
      <p>$size = ReadFile(Filename) - Reads the file filename and
      simply outputs it directly. It returns the number of bytes
      actually read. It is different from the File() command in
      that it does not store the file in memory, and it is safe for
      use on binary files. This function is generally used where
      one might otherwise do a PassThru("cat filename"). Using
      ReadFile is more efficient.</p>
    </dd>

    <dt><a name="readlink" id="readlink"><span class="big">
    ReadLink(path)</span></a></dt>

    <dd>ReadLink does the same as the readlink C function and
    returns the contents of the symbolic link path or -1 in case of
    error. See also <a href="#linkinfo">LinkInfo</a>.</dd>

    <dt><a name="reg_match" id="reg_match"><span class="big">
    reg_Match(expr,arg[,regs])</span></a></dt>

    <dd>
      <p><b>This function has been replaced by the <a href=
      "#ereg">ereg()</a> function. It is however still available
      for backwards compatibility.</b><br>
      reg_Match returns non-zero if the regular expression is
      matched in the argument string. For example, the condition,
      <code>&lt;?if (reg_match("^This.*", "This is an example
      string")&gt;</code> would be true since the "^This.*"
      expression says to match the word <strong>This</strong> at
      the beginning of the string and then match any characters
      afterwards. If the <em>regs</em> argument is present, then
      match registers are filled into positions 0-10 in the array
      named by the <em>regs</em> argument. Register 0 will always
      contain the full matched string. For more information on
      regular expressions, see the <a href="#regexp">regular
      expression section</a> of this document.</p>
    </dd>

    <dt><a name="reg_replace" id="reg_replace"><span class="big">
    reg_replace(expr,replace,arg)</span></a></dt>

    <dd>
      <p><b>This function has been replaced by the <a href=
      "#ereg_replace">ereg_replace()</a> function. It is however
      still available for backwards compatibility.</b><br>
      reg_Replace scans the entire argument string and replaces any
      portions of the string matched by the given expression with
      the replacement string. For example, in the string, <code>"This
      is an example string"</code> we could very easily replace every
      space with a dash with the command: <strong>reg_replace("
      ","-","This is an example string")</strong>.For more
      information on regular expressions, see the <a href=
      "#regexp">regular expression section</a> of this
      document.</p>
    </dd>

    <dt><a name="reg_search" id="reg_search"><span class="big">
    reg_Search(expr,arg[,regs])</span></a></dt>

    <dd>
      <p><b>This function has been replaced by the <a href=
      "#ereg">ereg()</a> function. It is however still available
      for backwards compatibility.</b><br>
      reg_Search will scan the entire argument string for any
      matches to the given regular expression. If a match is found,
      it will return the portion of the string starting at where
      the match occurred. If no match is found a zero-length string
      is returned. If the <em>regs</em> argument is present, then
      match registers are filled into positions 0-10 in the array
      named by the <em>regs</em> argument. Register 0 will always
      be assigned the full matched string. For more information on
      regular expressions, see the <a href="#regexp">regular
      expression section</a> of this document.</p>
    </dd>

    <dt><a name="rename" id="rename"><span class="big">
    Rename(old,new)</span></a></dt>

    <dd>
      <p>Rename filename old to new. Similar to the Unix C rename()
      function.</p>
    </dd>

    <dt><a name="reset" id="reset"><span class="big">
    Reset(variable)</span></a></dt>

    <dd>
      <p>Reset moves the internal array pointer for the given array
      variable to the first item of the array and returns the value
      of this item. This is useful for traversing associative and
      non-indexed arrays. See also <a href="#end">End()</a> and
      <a href="#next">Next()</a>. The following example traverses
      an associative array:</p>
      <pre>
    &lt;?
      Reset($array);
      $i=0;
      while($i &lt; count($array));
        echo $array[]; /* pointer automatically moves ahead one */
        $i++;
      endwhile;
    &gt;
</pre>
    </dd>

    <dt><a name="return" id="return"><span class="big">
    return(value)</span></a></dt>

    <dd>
      <p>Return exits the current function call and returns the
      specified value back to the caller. See the section on
      <a href="#user_funcs">User-Defined Functions</a> for more
      information.</p>
    </dd>

    <dt><a name="rewind" id="rewind"><span class="big">
    rewind($fd)</span></a></dt>

    <dd>
      <p>rewind() resets a file pointer identified by the $fd
      argument which is the return value of the <a href=
      "#fopen">fopen()</a> call. The file pointer is positioned at
      the beginning of the file. See also <a href=
      "#ftell">ftell()</a> and <a href="#fseek">fseek()</a>.</p>
    </dd>

    <dt><a name="rewinddir" id="rewinddir"><span class="big">
    rewindDir()</span></a></dt>

    <dd>
      <p>rewindDir moves the current directory pointer back to the
      beginning of the directory. Use the <a href=
      "#opendir">openDir</a> function to open a directory before
      calling this function.</p>
    </dd>

    <dt><a name="rmdir" id="rmdir"><span class="big">
    RmDir(dir)</span></a></dt>

    <dd>
      <p>RmDir() removes the given directory. See the <a href=
      "#unlink">Unlink()</a> function for removing regular
      files.</p>
    </dd>

    <dt><a name="setcookie" id="setcookie"><span class="big">
    SetCookie(name,value,expire,path,domain,secure)</span></a></dt>

    <dd>
      <p>SetCookie() defines a cookie to be sent along with the
      rest of the header information. All the arguments except the
      name argument are optional. If only the name argument is
      present, the cookie by that name will be deleted from the
      remote client. You may also replace any argument with an
      empty string (<b>""</b>) in order to skip that argument. The
      expire and secure arguments are integers and cannot be
      skipped with an empty string. Use a zero (<b>0</b>) instead.
      The expire argument is a regular Unix time integer as
      returned by the <a href="#time">time()</a> or <a href=
      "#mktime">mktime()</a> functions. Some examples follow:</p>
      <pre>
    SetCookie("TestCookie","Test Value");
    SetCookie("TestCookie",$value,time()+3600);  /* expire in 1 hour */
    SetCookie("TestCookie",$value,time()+3600,"/~rasmus/",".utoronto.ca",1);
</pre>

      <p>Note that the value portion of the cookie will
      automatically be urlencoded when you send the cookie, and
      when it is received, it is automatically decoded and assigned
      to a variable by the same name as the cookie name. ie. to see
      the contents of our test cookie in a script, simply do:</p>
      <pre>
    echo $TestCookie;
</pre>
    </dd>

    <dt><a name="seterrorreporting" id=
    "seterrorreporting"><span class="big">
    SetErrorReporting(arg)</span></a></dt>

    <dd>
      <p>SetErrorReporting sets the current error reporting state
      to the value of <em>arg</em>. If non-zero, errors will be
      printed, and if 0 they won't be. The function returns the
      previous error reporting state. This is a more general way of
      disabling error reporting than by preceding individual
      functions with a '@' character. See the section on <a href=
      "#quiet">Suppressing Errors from function calls</a> for more
      information.</p>
    </dd>

    <dt><a name="setlogging" id="setlogging"><span class="big">
    SetLogging(arg)</span></a></dt>

    <dd>
      <p>SetLogging() either enables or disables the logging of
      access statistics for a page. If <em>arg</em> is non-zero,
      logging will be enabled, if zero, disabled.</p>
    </dd>

    <dt><a name="setshowinfo" id="setshowinfo"><span class="big">
    SetShowInfo(arg)</span></a></dt>

    <dd>
      <p>SetShowInfo() either enables or disables the information
      footer at the bottom of all pages loaded through PHP. If
      <em>arg</em> is non-zero, the footers will be enabled, if
      zero, disabled.</p>
    </dd>

    <dt><a name="settype" id="settype"><span class="big">
    SetType(variable,type)</span></a></dt>

    <dd>
      <p>SetType sets the type of a variable. The type argument is
      one of, "integer", "double" or "string". See also the
      <a href="#gettype">GetType()</a> function.</p>
    </dd>

    <dt><a name="shl" id="shl"><span class="big">
    shl(n,b)</span></a></dt>

    <dd>
      <p>Shift the value <b>n</b> left <b>b</b> bits.</p>
    </dd>

    <dt><a name="shr" id="shr"><span class="big">
    shr(n,b)</span></a></dt>

    <dd>
      <p>Shift the value <b>n</b> right <b>b</b> bits.</p>
    </dd>

    <dt><a name="sin" id="sin"><span class="big">
    Sin(arg)</span></a></dt>

    <dd>
      <p>Sin returns the sine of arg in radians. See also <a href=
      "#cos">Cos()</a> and <a href="#tan">Tan()</a></p>
    </dd>

    <dt><a name="sleep" id="sleep"><span class="big">
    Sleep(secs)</span></a></dt>

    <dd>
      <p>Sleep will delay for secs seconds. Similar to the Unix C
      sleep() function. See also the <a href="#usleep">USleep()</a>
      function.</p>
    </dd>

    <dt><a name="solid_close" id="solid_close"><span class="big">
    Solid_Close(connection_id)</span></a></dt>

    <dd>
      <p>Solid_Close will close down the connection to the Solid
      server associated with the given connection identifier.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_connect" id="solid_connect"><span class="big">
    $connection = Solid_Connect(data source name, username,
    password)</span></a></dt>

    <dd>
      <p>Solid_Connect opens a connection to a Solid server. Each
      of the arguments should be a quoted string. The first
      parameter (data source name) can be an empty string,
      resulting in a connection to the default server on the
      localhost. This function returns a connection_id. This
      identifier is needed by other Solid functions. You can have
      multiple connections open at once. This function will return
      <strong>0</strong> on error.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_exec" id="solid_exec"><span class="big">
    $result = Solid_Exec(connection_id,
    query_string)</span></a></dt>

    <dd>
      <p>Solid_Exec will send an SQL statement to the Solid server
      specified by the connection_id. The connection_id must be a
      valid identifier that was returned by Solid_Connect. The
      return value of this function is an identifier to be used to
      access the results by other Solid functions. This function
      will return <strong>0</strong> on error. It will return
      <strong>1</strong> when the command executed correctly but
      are not expected to returned data (insert or update commands,
      for example). Note that selects which return no data will
      still return a valid result greater than 1.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_fetchrow" id="solid_fetchrow"><span class="big">
    Solid_FetchRow(result_id)</span></a></dt>

    <dd>
      <p>Solid_FetchRow fetches a row of the data that was returned
      by Solid_Exec. After Solid_FetchRow is called, the fields of
      that row can be access with Solid_Result. Every time
      Solid_FetchRow is called a new row can be accessed by
      Solid_Result. If Solid_FetchRow was succesful (there was a
      new row), <strong>1</strong> is returned, if there are no
      more rows, Solid_FetchRow will return <strong>0</strong>. The
      return value of Solid_FetchRow can be used as the condition
      of a while loop.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_fieldname" id="solid_fieldname"><span class="big">
    Solid_FieldName(result_id, field_number)</span></a></dt>

    <dd>
      <p>Solid_FieldName will return the name of the field
      occupying the given column number in the given Solid result
      identifier. Field numbering starts from 0.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_fieldnum" id="solid_fieldnum"><span class="big">
    Solid_FieldNum(result_id, field_name)</span></a></dt>

    <dd>
      <p>Solid_FieldNum will return the number of the column slot
      that corresponds to the named field in the given Solid result
      identifier. Field numbering starts at 0. This function will
      return <strong>-1</strong> on error.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_freeresult" id=
    "solid_freeresult"><span class="big">Solid_FreeResult(result_id)</span></a></dt>

    <dd>
      <p>Solid_FreeResult only needs to be called if you are
      worried about using too much memory while your script is
      running. All result memory will automatically be freed when
      the script is finished. But, if you are sure you are not
      going to need the result data anymore in a script, you may
      call Solid_FreeResult with the result identifier as an
      argument and the associated result memory will be freed.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_numfields" id="solid_numfields"><span class="big">
    Solid_NumFields(result_id)</span></a></dt>

    <dd>
      <p>Solid_NumFields will return the number of fields (columns)
      in a Solid result. The argument is a valid result identifier
      returned by Solid_Exec. This function will return
      <strong>-1</strong> on error.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_numrows" id="solid_numrows"><span class="big">
    Solid_NumRows(result_id)</span></a></dt>

    <dd>
      <p>Solid_NumRows will return the number of rows in a Solid
      result. The argument is a valid result identifier returned by
      Solid_Exec. This function will return <strong>-1</strong> on
      error. <b>Large Caveat:</b> The SOLID SQL server uses ODBC as
      it's primary (and only) interface. SolidNumRows() uses
      SQLRowCount at the low-level to get the number of rows.
      SQLRowCount follows the age-old Microsoft tradition of
      unnecessary limitations, strange exceptions and other odd
      things. This means that the function will only return the
      number of rows affected by an INSERT, UPDATE or a DELETE
      clause. No SELECT! As a workaround you can try the count()
      statement of SQL or a while-loop that counts the number of
      rows. If you need Solid_NumRows() to figure out how many
      records to read after a SELECT clause, try checking the
      return value from <a href=
      "#solid_fetchrow">Solid_FetchRow()</a> instead. So instead
      of:</p>
      <pre>
     $num = Solid_NumRows();
    $i=0;
    while ($i &lt; $num) {
        /* print results... */
        $i++;
    }
</pre>

      <p>you might try:</p>
      <pre>
    while(Solid_FetchRow($result)) {
        /* print results... */
    }
</pre>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="solid_result" id="solid_result"><span class="big">
    Solid_Result(result_id, field name/index)</span></a></dt>

    <dd>
      <p>Solid_Result will return values from a result identifier
      produced by Solid_Exec. The field name specify what cell in
      the row to return. Instead of naming the field, you may use
      the field index as an unquoted number. Field indices start
      from 0.</p>

      <p>This function is only available if Solid support has been
      enabled in PHP.</p>
    </dd>

    <dt><a name="sort" id="sort"><span class="big">
    Sort(array)</span></a></dt>

    <dd>
      <p>Sort is used to sort a PHP array in ascending order. To
      sort in descending order, use the RSort() function. It
      understands the three variable types and will sort
      alphabetically if the array contains strings, and numerically
      if the array contains numbers. In the case of an array which
      contains a mixture of types, the first type in the array will
      specify the sort method. Note that if you are going to sort
      an associative array, you should use the <a href=
      "#asort">ASort()</a> function.</p>
    </dd>

    <dt><a name="soundex" id="soundex"><span class="big">
    Soundex(string)</span></a></dt>

    <dd>
      <p>This function takes a string argument and returns the
      soundex key for the string. Soundex keys have the property
      that words pronounced similarly produce the same soundex key,
      and can thus be used to simplify searches in databases where
      you know the pronunciation but not the spelling. This soundex
      function returns a string 4 characters long, starting with a
      letter.<br>
      This particular soundex function is one described by Donald
      Knuth in "The Art Of Computer Programming, vol. 3: Sorting
      And Searching", Addison-Wesley (1973), pp. 391-392.<br>
      Example:</p>
      <pre>
   Euler and Ellery map to E460
   Gauss and Ghosh map to G200
   Hilbert and Heilbronn map to H416
   Knuth and Kant map to K530
   Lloyd and Ladd map to L300
   Lukasiewicz and Lissajous map to L222
     
</pre>
    </dd>

    <dt><a name="sprintf" id="sprintf"><span class="big">
    Sprintf(format,arg [,arg,arg,arg,arg])</span></a></dt>

    <dd>
      <p>Sprintf returns the string created by the formatted output
      defined by the format argument and arg. It is similar to the
      formatted version of the <a href="#echo">echo</a> command,
      except this just returns the string while echo displays it.
      It is also similar to the C function by the same name. The
      difference being that this version does not accept more than
      5 <em>arg</em> arguments. If you need to format more than 5
      arguments into a single string, simply call sprintf()
      multiple times for each group of arguments. Note that the
      type of the argument doesn't affect the output. The argument
      type is automagically converted to match the type specified
      in the format string.</p>
    </dd>

    <dt><a name="sqrt" id="sqrt"><span class="big">
    Sqrt(arg)</span></a></dt>

    <dd>
      <p>Sqrt returns the square root of arg.</p>
    </dd>

    <dt><a name="srand" id="srand"><span class="big">
    Srand(integer)</span></a></dt>

    <dd>
      <p>Srand seeds the random number generator. This function
      takes any integer as an argument. One choice for a seed value
      is to use the <strong>date</strong> function to give you the
      current number of seconds past the minute. Note that this
      function <b>does not return a value</b>! This function simply
      seeds the random number generator for subsequent calls to the
      <a href="#rand">rand()</a> function. eg.</p>
      <pre>
   &lt;?srand(date("s"))&gt;
</pre>
    </dd>

    <dt><a name="strchr" id="strchr"><span class="big">
    strchr(string,arg)</span></a></dt>

    <dd>
      <p>strchr and <a href="#strstr">strstr</a> are actually
      identical functions. They can be used interchangeably and
      both are included for completeness sake. They will return the
      portion of the string argument starting at the point where
      the given sub-string is found. For example, in the string,
      "This is an example string" above, the call: <code>&lt;?echo
      strchr($string,"an ")&gt;</code> would return the string:
      <code>"an example string"</code>.</p>
    </dd>

    <dt><a name="strtr" id="strtr"><span class="big">
    strtr(input,set1,set2)</span></a></dt>

    <dd>strtr() translates each character of "string" that is in
    "set1" to the corresponding character in "set2". Characters not
    in set1 are passed through unchanged. When a character appears
    more than once in "set1" and the corresponding characters in
    "set2" are not all the same, only the final one is used. When
    one of "set1" or "set2" is longer, longer "set?" is truncated
    to length of shorter "set?".</dd>

    <dt><a name="stripslashes" id="stripslashes"><span class="big">
    StripSlashes(arg)</span></a></dt>

    <dd>
      <p>StripSlashes unescapes the string argument. See also
      <a href="#addslashes">AddSlashes()</a>.</p>
    </dd>

    <dt><a name="strlen" id="strlen"><span class="big">
    strlen(string)</span></a></dt>

    <dd>
      <p>strlen returns the length of the string.</p>
    </dd>

    <dt><a name="strrchr" id="strrchr"><span class="big">
    strrchr(string,arg)</span></a></dt>

    <dd>
      <p>strrchr will search for a single character starting at the
      end of the argument string and working its way backwards. It
      returns the string starting with the search character if the
      character was found and an empty string if it wasn't.</p>
    </dd>

    <dt><a name="strstr" id="strstr"><span class="big">
    strstr(string,arg)</span></a></dt>

    <dd>
      <p>strstr and <a href="#strchr">strchr</a> are actually
      identical functions. They can be used interchangeably and
      both are included for completeness sake. They will return the
      portion of the string argument starting at the point where
      the given sub-string is found. For example, in the string,
      "This is an example string" above, the call: <code>&lt;?echo
      strstr($string,"an ")&gt;</code> would return the string:
      <code>"an example string"</code>.</p>
    </dd>

    <dt><a name="strtok" id="strtok"><span class="big">
    strtok(string,arg)</span></a></dt>

    <dd>
      <p>strtok is used to tokenize a string. That is, if you have
      a string like <strong>"This is an example string"</strong>
      you could tokenize this string into its individual words by
      using the space character as the token. You would use the
      following script code:</p>
      <pre>
   &lt;?
          $string = "This is an example string";
          $tok = strtok($string," ");
          while($tok);
                  echo "Word=$tok&lt;br&gt;";
                  $tok = strtok(" ");
          endwhile;
        &gt;
</pre>

      <p>Note that only the first call to strtok uses the string
      argument. Every subsequent call to strtok only needs the
      token to use, as it keeps track of where it is in the current
      string. To start over, or to tokenize a new string you simply
      call strtok with the string argument again to initialize it.
      Note that you may put multiple tokens in the <i>arg</i>
      parameter. The string will be tokenized when any one of the
      characters in the argument are found.</p>
    </dd>

    <dt><a name="strtolower" id="strtolower"><span class="big">
    strtolower(string)</span></a></dt>

    <dd>
      <p>strtolower converts the string argument to all lower case
      characters.</p>
    </dd>

    <dt><a name="strtoupper" id="strtoupper"><span class="big">
    strtoupper(string)</span></a></dt>

    <dd>
      <p>strtoupper converts the string argument to all upper case
      characters.</p>
    </dd>

    <dt><a name="strval" id="strval"><span class="big">
    strval(variable)</span></a></dt>

    <dd>
      <p>strval returns the string value of the variable. See also
      the <a href="#intval">intval()</a> and <a href=
      "#doubleval">doubleval()</a> functions.</p>
    </dd>

    <dt><a name="substr" id="substr"><span class="big">substr(string,
    start, length)</span></a></dt>

    <dd>
      <p>substr returns a part of the given string. The start
      position is given by the start argument. The first position
      in a string is position 0. And the length argument specifies
      the number of characters to return from the start
      position.</p>
    </dd>

    <dt><a name="sybsql_checkconnect" id=
    "sybsql_checkconnect"><span class="big">
    sybSQL_CheckConnect()</span></a></dt>

    <dd>
      <p>This function returns 1 if the connection to the database
      has been established and 0 otherwise.</p>
    </dd>

    <dt><a name="sybsql_dbuse" id="sybsql_dbuse"><span class="big">
    sybSQL_DBuse(database)</span></a></dt>

    <dd>
      <p>This function issues a Sybase Transact-SQL <b>use</b>
      command for the specified database. The only argument to the
      function is the name of the database to use. Example:
      <code>sybsql_dbuse("pubs2");</code></p>

      <p>The function returns 1 on success and 0 on failure.</p>
    </dd>

    <dt><a name="sybsql_connect" id="sybsql_connect"><span class="big">
    sybSQL_Connect()</span></a></dt>

    <dd>
      <p>This function opens a network connection to the sybase
      server. This function depends on several environment
      variables which must be set by the caller before calling this
      function.</p>

      <p>The environment variables are:</p>

      <p><b>DSQUERY</b> - the alias of the sybase server as defined
      in the sybase interface file.<br>
      <b>DBUSER</b> - connect to the sybase server as this
      user.<br>
      <b>DBPW</b> - password of the user.</p>

      <p>These variables can be set in several ways. If php/fi is
      running as a CGI program, then a shell wrapper can be used to
      set these variables or you can set these variables directly
      in the HTML page using the builtin PHP/FI function
      <b><a href="#putenv">putenv()</a></b>. Instead of using the
      values directly in <b><a href="#putenv">putenv()</a></b>, the
      values can be obtained from form input. The variables can be
      defined in a file and included in the html files with PHP/FI
      <code><a href="#include">include</a></code> statement.</p>

      <p>The function returns 1 on success and 0 on failure.</p>
    </dd>

    <dt><a name="sybsql_exit" id="sybsql_exit"><span class="big">
    sybSQL_Exit()</span></a></dt>

    <dd>
      <p>This function forces a Sybase connection to be shut down.
      If not called, the connection will automatically be closed
      when the PHP page has been fully parsed, so calling this
      function is optional.</p>
    </dd>

    <dt><a name="sybsql_fieldname" id=
    "sybsql_fieldname"><span class="big">sybSQL_Fieldname(index)</span></a></dt>

    <dd>
      <p>This function returns the field name of a regular result
      column. The argument to the function is the field index.
      Example: <code>sybsql_fieldname(0);</code>. NOTE: the field
      index starts at 0.</p>

      <p>If the the result column does not have any name, the
      function returns an empty string ("").</p>
    </dd>

    <dt><a name="sybsql_getfield" id="sybsql_getfield"><span class="big">
    sybSQL_GetField(field)</span></a></dt>

    <dd>
      <p>This function gets the value of a specific column of the
      current result row. The only argument to the function is the
      string specifying the field. Example:
      <code>$value=sybsql_getfield("@10");</code> <b>NOTE</b>:
      <a href="#sybsql_nextrow">sybsql_nextrow()</a> must be called
      before calling this function. sybsql_nextrow() must be called
      if the row pointer needs to be incremented, because this
      function only reads the current row in the row buffer.</p>

      <p>If the specified column has a value, the function returns
      the value as a string otherwise the function returns an empty
      string ("").</p>
    </dd>

    <dt><a name="sybsql_isrow" id="sybsql_isrow"><span class="big">
    sybSQL_IsRow()</span></a></dt>

    <dd>
      <p>This function indicates if the current SQL command
      returned any rows.</p>

      <p>The function returns 1 if the SQL command returned any
      rows and 0 if the command didn't return any rows.</p>
    </dd>

    <dt><a name="sybsql_nextrow" id="sybsql_nextrow"><span class="big">
    sybSQL_NextRow()</span></a></dt>

    <dd>
      <p>This function increments the row pointer to the next
      result row.</p>

      <p>The function returns 1 as long as there are rows left to
      read. If there are no more rows left to read or in case of
      error the function returns 0.</p>
    </dd>

    <dt><a name="sybsql_numfields" id=
    "sybsql_numfields"><span class="big">sybSQL_NumFields()</span></a></dt>

    <dd>
      <p>This function returns the number of fields in a current
      result row.</p>

      <p>The function returns the number of rows in the current
      result row. If there are no fields, the function returns
      0.</p>
    </dd>

    <dt><a name="sybsql_numrows" id="sybsql_numrows"><span class="big">
    sybSQL_NumRows()</span></a></dt>

    <dd>
      <p>This function returns the number of rows in the current
      result buffer. <b>NOTE:</b> when this function is called, it
      will seek to the first row right away, then it will call
      dbnextrow() until there are no more rows and increment a
      internal counter to calculate the number of rows in the
      result buffer. Then it points back to the very first row.
      Therefore, after calling this function row counter always
      points to the very first row. It's ugly but I don't know any
      other way at this time.</p>

      <p>If there are no rows in the result buffer, the function
      will return 0.</p>
    </dd>

    <dt><a name="sybsql_query" id="sybsql_query"><span class="big">
    sybSQL_Query()</span></a></dt>

    <dd>
      <p>This function submits a Sybase SQL query request to the
      server. The only argument to the function is the query
      string. Example: <code>$rc=sybsql_query("select * from
      authors");</code></p>

      <p>The function returns 1, if the query is passed
      successfully and returns 0 if the request fails.</p>
    </dd>

    <dt><a name="sybsql_result" id="sybsql_result"><span class="big">
    sybSQL_Result(string)</span></a></dt>

    <dd>
      <p>This function prints specific fields of the current result
      row. The only argument to the function is a string which
      holds information about the fields to be printed. A field is
      specified with a @ followed by a number. For example, @0
      means first row, @10 means 11th row. Note that the field
      number starts at 0. The function is perhaps best illustrated
      with a complete example:</p>
      <pre>
&lt;?
    /*
    ** assuming all the necessary variables for 
    ** connection is already set. please note, NO error checking is
    ** done. You should always check return code of a function.
    */

    /* connect */
    $rc=sybsql_connect();

    /* use the pub2 database */
    $rc=sybsql_dbuse("pubs2");

    /* send the SQL request */
    $rc=sybsql_query("select * from authors");
    $i=0;

    /* find the no of rows returned */
    $nrows=sybsql_numrows();

    /* start table */
    echo "&lt;table border&gt;\n";
    /*
    ** print only first and 2nd field
    */
    while($i&lt;$nrows) {
        sybsql_result("&lt;tr&gt;&lt;td&gt;@0&lt;/td&gt;@1&lt;/td&gt;&lt;/tr&gt;\n");
        $i++;
    }
    /* end table */
    echo "&lt;/table&gt;\n";
&gt;
</pre>

      <p>The above example uses HTML table to format the output. Of
      course, any other valid HTML tags can be used.</p>
    </dd>

    <dt><a name="sybsql_result_all" id=
    "sybsql_result_all"><span class="big">
    sybSQL_Result_All()</span></a></dt>

    <dd>
      <p>This function prints all rows in the current result
      buffer. The result is printed in a hard coded HTML table
      format. Note that this function should not be called inside a
      loop. The function will print the name of the columns if
      there are any column headings in the output.</p>
    </dd>

    <dt><a name="sybsql_seek" id="sybsql_seek"><span class="big">
    sybSQL_Seek(row)</span></a></dt>

    <dd>
      <p>This function sets the requested row number as the current
      row in the row buffer. The only argument to the function is
      the row number. Example: <code>$rc=sybsql_seek(10);</code>
      Note, row number starts at 0.</p>

      <p>The function returns 1 if the seek succeeds and 0 if the
      seek fails. When all of the rows in the current result buffer
      have been visited, the row pointer points to the last row. If
      it is needed to go backward and visit some more rows, this
      function can be used for this purpose.</p>
    </dd>

    <dt><a name="symlink" id="symlink"><span class="big">
    Symlink(target,link)</span></a></dt>

    <dd>
      <p>Symlink() creates a symbolic link. See the <a href=
      "#link">Link()</a> function to create hard links.</p>
    </dd>

    <dt><a name="syslog" id="syslog"><span class="big">
    Syslog(level,message)</span></a></dt>

    <dd>
      <p>Syslog() logs messages to the system using UNIX's
      syslog(3) feature. See your UNIX man page for more details.
      See also <a href="#initsyslog">InitSyslog()</a>, <a href=
      "#openlog">OpenLog()</a> and <a href=
      "#closelog">CloseLog()</a>.</p>
    </dd>

    <dt><a name="system" id="system"><span class="big">
    System(command_string [,return_var])</span></a></dt>

    <dd>
      <p>System is just like the C <em>system()</em> command in
      that it executes the given unix command and outputs the
      result. If a variable is provided as the second argument,
      then the return status code of the executed unix command will
      be written to this variable. Note, that if you are going to
      allow data coming from user input to be passed to this System
      function, then you should be using the <a href=
      "#escapeshellcmd">EscapeShellCmd()</a> function to make sure
      that users cannot trick the system into executing arbitrary
      commands. The System() call also automatically flushes the
      Apache output buffer after each line of output if PHP is
      running as an Apache module. If you need to execute a command
      and have all the data from the command passed directly back
      without any interference, use the <a href=
      "#passthru">PassThru()</a> function. See also the <a href=
      "#exec">Exec</a> function.</p>
    </dd>

    <dt><a name="tan" id="tan"><span class="big">
    Tan(arg)</span></a></dt>

    <dd>
      <p>Sin returns the tangent of arg in radians. See also
      <a href="#sin">Sin()</a> and <a href="#cos">Cos()</a></p>
    </dd>

    <dt><a name="tempnam" id="tempnam"><span class="big">
    TempNam(path, prefix)</span></a></dt>

    <dd>
      <p>TempNam returns a unique filename located in the directory
      indicated by path with filename prefix given by prefix. It is
      identical to the Unix C tempnam() function.</p>
    </dd>

    <dt><a name="time" id="time"><span class="big">
    Time()</span></a></dt>

    <dd>
      <p>Time simply returns the current local time in seconds
      since Unix epoch (00:00:00 Jan. 1 1970). It is equivalent to
      calling <a href="#date">Date("U")</a>. If you need better
      than per-second granularity, use the <a href=
      "#microtime">Microtime</a> function.</p>
    </dd>

    <dt><a name="umask" id="umask"><span class="big">
    Umask([mask])</span></a></dt>

    <dd>
      <p>Umask(<i>mask</i>) sets PHP's umask to <i>mask</i> &amp;
      0777 and returns the old umask. If PHP/FI is an Apache
      module, Apache's old umask is restored when PHP/FI has
      finished. <i>mask</i> must be specified in <a href=
      "#octal">octal</a> notation, like for <a href=
      "#chmod">ChMod()</a>. Umask() without arguments simply
      returns the current umask.</p>
    </dd>

    <dt><a name="uniqid" id="uniqid"><span class="big">
    UniqId()</span></a></dt>

    <dd>
      <p>UniqId returns a prefixed unique identifier based on
      current time in microseconds. The prefix can be useful for
      instance if you generate identifiers simultaneously on
      several hosts that might happen to generate the identifier at
      the same microsecond. The prefix can be up to 114 characters
      long.</p>
    </dd>

    <dt><a name="unlink" id="unlink"><span class="big">
    Unlink(filename)</span></a></dt>

    <dd>
      <p>Unlink deletes the given filename. Similar to the Unix C
      unlink() function. See the <a href="#rmdir">RmDir()</a>
      function for removing directories.</p>
    </dd>

    <dt><a name="unset" id="unset"><span class="big">
    UnSet($var)</span></a></dt>

    <dd>
      <p>UnSet undefines the given variable. In the case of an
      array, the entire array is cleared. Individual array elements
      may also be unset.</p>
    </dd>

    <dt><a name="urldecode" id="urldecode"><span class="big">
    UrlDecode(arg)</span></a></dt>

    <dd>
      <p>UrlDecode decodes a string encoded with the <a href=
      "#urlencode">UrlEncode</a> function. In typical use, it is
      not necessary to decode URL Encoded strings because these are
      automatically decoded when strings are passed between pages.
      However, for completeness sake, this function has been
      included.</p>
    </dd>

    <dt><a name="urlencode" id="urlencode"><span class="big">
    UrlEncode(arg)</span></a></dt>

    <dd>
      <p>UrlEncode encodes any characters from arg which are not
      one of "a-zA-Z0-9_-." by replacing them with %xx where xx is
      their ASCII value in hexadecimal. The encoded string is
      returned.</p>
    </dd>

    <dt><a name="usleep" id="usleep"><span class="big">
    USleep(microsecs)</span></a></dt>

    <dd>
      <p>Sleep will delay for the given number of microseconds.
      Similar to the Unix C usleep() function. See also the
      <a href="#sleep">Sleep()</a> function.</p>
    </dd>

    <dt><a name="virtual" id="virtual"><span class="big">
    Virtual(filename)</span></a></dt>

    <dd>
      <p>Virtual is an Apache-specific function which is equivalent
      to &lt;!--#include virtual...--&gt; in mod_include. It
      performs an Apache sub-request. It is useful for including
      CGI scripts or .shtml files, or anything else that you would
      parse through Apache (for .phtml files, you'd probably want
      to use &lt;?Include&gt;.</p>
    </dd>
  </dl>
  <hr>

  <h2><a name="addfunc" id="addfunc">Adding your own internal
  functions to PHP/FI</a></h2>It may well be that the set of
  functions provided by PHP/FI does not include a particular
  function that you may need. By carefully following the steps
  described below, it is possible for you to add your own functions
  to PHP/FI.

  <p>Before you start hacking away at the internals of PHP/FI you
  need to grab a copy of the latest version of Bison. Bison is
  GNU's implementation of YACC (Yet Another Compiler Compiler). The
  YACC that came with your operating system may or may not be good
  enough, but just to make sure, go grab Bison. You can find it at
  <a href=
  "ftp://prep.ai.mit.edu/pub/gnu">ftp://prep.ai.mit.edu/pub/gnu</a>.</p>

  <p>You should also have a look at the Makefile and turn on
  debugging. Simply uncomment the <strong>DEBUG</strong> line in
  the Makefile. The output file of debug information is specified
  by <strong>DEBUG_FILE</strong> in <em>php.h</em>. It is by
  default set to <em>/tmp/php.err</em>. You can change this to suit
  your needs.</p>

  <p>A final thing you might want to keep in mind is that php runs
  as the same user id as httpd on your system, unless of course you
  are running it with the setuid bit set, and this httpd user does
  not generally have write access to the various directories. This
  means that if you do something that causes php to core dump, you
  will not get a core file. The easy way around this is to make the
  directory where you keep your test .html files writable to all.
  PHP changes its current directory to the directory of the .html
  file it is reading and will thus dump its core there if it
  can.</p>

  <p>In the following steps we will use the <em>Time()</em>
  function to illustrate how to add a function.</p>

  <dl>
    <dt><strong>Step 1 - Defining the grammar of your
    Function</strong></dt>

    <dd>
      <p>If your function takes 0 to 6 arguments, there are
      predefined grammars available. You can skip this step.</p>

      <p>The grammar of your function is defined in the
      <em>parse.raw</em> file. The first thing to add is a token. A
      token is an upper case keyword which is usually the same as
      your function name. All the tokens are defined near the top
      of the parse.raw file. The order doesn't matter. Then you
      need to build your actual YACC grammar rule. Look at the
      existing rules and find a function that is similar to the one
      you are adding. Keep in mind that most normal functions are
      standard functions that read their arguments from the
      expression stack. Your function will most likely fall into
      this group in which case you won't need to touch the
      <em>parse.raw</em> file.</p>
    </dd>

    <dt><strong>Step 2 - Adding your function to the lexical
    analyzer hash table</strong></dt>

    <dd>
      <p>To do this, edit <em>lex.c</em> and find the hash table
      near the top of the file. Look for the line, <code>static
      cmd_table_t cmd_table[22][30] = {</code>, which defines the
      beginning of the hash table. The <code>[22][30]</code> defines
      the size of the 2 dimensional array which holds the hash
      table. The 22 is one greater than the maximum function name
      length and the 30 refers to the maximum number of functions
      in any one hash list. If you exceed either of these limits,
      simply increase them right here.</p>

      <p>This hash table would probably rate as the absolute
      simplest hash table in the entire world. The hash value is
      the length of the string of the function name to be hashed.
      So, for our <em>Time()</em> example, we need to add an entry
      for hash value 4. Therefore we add the following line to the
      hash list for 4:</p>
      <pre>
      { "time",INTFUNC0,UnixTime },
</pre>

      <p>This entry maps a string to the INTFUNC0 token. You can
      look up the grammar for the INTFUNC0 token in
      <em>parse.raw</em> and you will see that it is a generic
      grammar for an internal function call with 0 arguments. The
      string, in quotes above, is the actual string that you will
      be using in the .html files to call your function. Keep in
      mind that PHP/FI function names are <strong>not</strong> case
      sensitive. And the final <b>UnixTime</b> element is the
      actual function to be called.</p>
    </dd>

    <dt><strong>Step 3 - Write your actual Function</strong></dt>

    <dd>
      <p>You can actually write your function in any language you
      like, as long as it is callable through the normal C function
      call convention and you have a way of creating either an
      object file or a library file compatible with the linker on
      your system. In general, we will assume that you are writing
      your function in C. All the functions that come with PHP/FI
      have been written in C. The Time() function, or UnixTime() as
      it is called internally in PHP can be found in
      <em>date.c</em> and looks like this:</p>
      <pre>
void UnixTime(void) {
    char temp[32];

    sprintf(temp,"%ld",(long)time(NULL));
    Push(temp,LNUMBER);
}
</pre>

      <p>Note that the function is void. This indicates that it
      doesn't return anything. This may seem confusing to you
      because obviously the function needs to somehow return the
      time. The time is returned, but not as the return value of
      the function. It is pushed onto what is called an expression
      stack. The expression stack is simply a stack of strings and
      an associated type. PHP/FI understands only 3 basic variable
      types: STRING, LNUMBER and DNUMBER. STRING is a character
      string, LNUMBER is a long integer and DNUMBER is a double, or
      floating point, value. In this Time() example, the value to
      be returned is the time expressed in Unix format (number of
      seconds since Jan.1 1970) and is thus an integer. The
      expression stack only accepts strings, so we sprintf the long
      integer into a string and push it onto the stack indicating
      that it is actually a long integer with the line:
      <code>Push(temp,LNUMBER);</code></p>
    </dd>

    <dt><strong>Step 4 - Add your function prototype to
    php.h</strong></dt>

    <dd>
      <p>In the bottom half of the <em>php.h</em> file you will
      find a complete list of prototypes of all the functions in
      php. They are grouped by the files in which they appear.
      Simply add your prototype to an appropriate place in this
      file. For our Time() example the following line is added:</p>
      <pre>
void UnixTime(void);
</pre>
    </dd>

    <dt><strong>Step 5 - Compile</strong></dt>

    <dd>
      <p>You have to remember to re-make the parser whenever you
      make a change to the <em>parse.raw</em> file. Type:
      <strong>make parser</strong> to do this. You must have at
      least version 1.25 of Bison in order to make the PHP parser.
      Then do a normal compile by typing: <strong>make</strong>
      once that is done.</p>
    </dd>

    <dt><strong>Step 6 - Send me your additions!</strong></dt>

    <dd>
      <p>If you would like your functions added to the next release
      of PHP/FI, send them to me. The best way is probably to make
      a context-sensitive diff. To do that, you need a copy of a
      clean unmodified distribution. Simply do a, <strong>diff
      -c</strong> on the files you have changed comparing them to
      the original files. Please don't send me a diff of the
      changes in <em>parse.c</em> since that file is automatically
      generated. Send me the diff from <em>parse.raw</em>
      instead.</p>
    </dd>
  </dl>

  <p>The Time() example illustrated the steps involved in adding a
  function. Chances are that the function you wish to add is quite
  a bit more complex than this example. You will probably want to
  be able to pass arguments to your function and have it manipulate
  these arguments in some manner. You may even want to have it
  callable in different ways. These concepts will be illustrated by
  the PHP/FI crypt() function. See also the section entitled
  <a href="#hacknotes">Notes for Code Hacks</a> for some more
  technical details about writing code for PHP/FI.</p>

  <p>The Crypt() Grammar in <em>parse.raw</em>:</p>
  <pre>
%token CRYPT
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
        }
</pre>

  <p>Here it is shown how to define a grammar which lets you call a
  function with either 1 or 2 arguments. You could write different
  functions to handle the two cases, or simply send a mode
  parameter as is done here to indicate the mode in which the
  function is called. Note that in this case you cannot use one of
  the pre-defined INTFUNCn grammars since your function can take a
  variable number of arguments.</p>

  <p>The other aspect that is shown is how to actually represent
  function arguments. In most cases you will want to use the
  <strong>expr</strong> identifier. This identifier means that the
  argument is an expression. An expression can be a literal value,
  a function call or a combination of many expressions. See
  parse.raw for the complete yacc grammar definition for
  expressions for more details.</p>

  <p>The Hash Table entry in <em>lex.c</em>:</p>
  <pre>
      { "crypt",CRYPT,NULL },
</pre>

  <p>Notice that the last item is a NULL in this case since the
  function call is handled in <em>parse.raw</em> directly. If you
  used an INTFUNCn grammar, then you would put the name of your
  function in place of this NULL. The actual Crypt() function in
  <em>crypt.c</em>:</p>
  <pre>
/*
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
                if(s-&gt;strval) strncpy(salt,s-&gt;strval,2);
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
        enc = (char *)crypt(s-&gt;strval,salt);
#if DEBUG
        Debug("Crypt returned [%s]\n",enc);
#endif
        Push(enc,STRING);       

#else
        Error("No crypt support compiled into this version");
#endif
}
</pre>

  <p>The most important aspect of this function is the <strong>s =
  Pop()</strong> call. The arguments to the function must be popped
  off the expression stack one by one. When you write a function
  which takes multiple arguments, remember that a stack is a
  LAST-IN, FIRST-OUT data structure. This means that you will be
  popping your arguments off the stack in reverse order. The last
  argument is popped off first. In the above example we check to
  see if we are in the 2 argument mode. If we are, we pop the
  argument off the stack and save it. Then we pop the next argument
  off the stack. Pop() returns a pointer to a Stack structure (s).
  The Stack structure looks like this (from <em>php.h</em>):</p>
  <pre>
/* Expression Stack */
typedef struct Stack {
    short type;
    unsigned char *strval;
    long intval;
    double douval;
    VarTree *var;
    struct Stack *next;
} Stack;
</pre>

  <p>The <em>type</em> will generally be one of STRING, LNUMBER or
  DNUMBER. The <em>strval</em>, <em>intval</em>, and
  <em>douval</em> components are the string, integer and double
  representations of the value respectively. If the expression is
  actually a defined variable, the <em>var</em> component contains
  a pointer to the variable structure which defines this
  variable.</p>

  <p>In our Crypt() function we are only interested in the string
  value of the argument, so we use <em>s-&gt;strval</em>. Many
  PHP/FI functions can do different things depending on the type of
  the variable simply by checking <em>s-&gt;type</em> and using
  <em>s-&gt;strval</em>, <em>s-&gt;intval</em> and/or
  <em>s-&gt;douval</em> appropriately.</p>

  <p>After calling the <strong>real</strong> crypt() function and
  getting the encrypted string, our Crypt() function calls
  <em>Push(enc,STRING);</em> to push the return value onto the
  expression stack. It should be noted that the expression stack is
  cleared after each PHP/FI line, so if you push expressions onto
  this stack that are never popped by anything, it won't
  matter.</p>

  <p>The <em>Debug()</em> call in the Crypt() example shows how to
  add debugging output to your function. Debug() is a varags
  (variable argument list) function just like printf.</p>
  <hr>

  <h2><a name="hacknotes" id="hacknotes">Notes for
  Code-Hacks</a></h2>

  <p>Memory management within PHP/FI is a tricky thing. Since we
  can run as a server module, we have to be very careful about
  memory resources. Not only do we need to be reentrant, but we
  also need to be handle the fact that we can receive a timeout
  signal at any time at which point we drop out of the module. We
  get no warning, and we get no time to free any memory that we may
  have allocated. And this memory has to be freed, or the data
  space of the httpd process we are linked to could grow
  indefinitely. This also applies when PHP is running in CGI mode
  since it can be set up to run as a FastCGI persistent
  process.</p>

  <p>The solution is to use sub-pools of memory. These pools are
  automatically cleared by Apache when a session is terminated, or
  in the case of a FastCGI persistent process, these pools are
  cleared in <em>main.c</em> every time the FastCGI wrapper loop
  executes. Three such pools are used at the moment. They are
  numbered 0,1 and 2. The sub-pool number is the first argument to
  the <em>emalloc</em> and <em>estrdup</em> functions.</p>

  <dl>
    <dt><strong>Pool 0 - Session lifespan</strong></dt>

    <dd>Any memory allocated from this pool will span the entire
    session. It is a good idea to keep the use of this pool as low
    as possible. For example, if someone makes a while loop that
    iterates 1000 times and within this while loop they call
    something which allocates memory from pool 0, then this memory
    will be allocated 1000 times. This is a quick way to use up all
    alloted data space.</dd>

    <dt><strong>Pool 1 - Temporary storage (shortest
    lifespan)</strong></dt>

    <dd>If a temporary work buffer is needed for something within a
    function, the memory for it must come from this pool. This pool
    is cleared on every call to yylex(). ie. the memory is lost
    just about as soon as you leave a function.</dd>

    <dt><strong>Pool 2 - Expression space (medium
    lifespan)</strong></dt>

    <dd>This pool exists for the duration of an expression. An
    expression in this context being a full PHP/FI command line. It
    will not get cleared within functions since the higher level
    expression which called the function has not been completed
    until the function returns. The ClearIt flag in the yylex()
    function indicates when it is safe to clear this pool.</dd>
  </dl>

  <p>The use of sub-pools completely eliminates the need to
  explicitly free memory anywhere in the code, with the one
  exception being memory allocated using a regular malloc call by
  various libraries that could be linked into PHP. The gdbm library
  is one such example.</p>

<?php site_footer(); ?>
