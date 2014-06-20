<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/shared-manual.inc';
$TOC = array();
$PARENTS = array();

$setup = array (
  'home' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'head' => 
  array (
    0 => 'UTF-8',
    1 => 'en',
  ),
  'this' => 
  array (
    0 => 'index.php',
    1 => 'PHP Manual',
  ),
  'up' => 
  array (
    0 => NULL,
    1 => NULL,
  ),
  'prev' => 
  array (
    0 => NULL,
    1 => NULL,
  ),
  'next' => 
  array (
    0 => NULL,
    1 => NULL,
  ),
  'alternatives' => 
  array (
  ),
  'extra_header_links' => 
  array (
    'rel' => 'alternate',
    'href' => '/manual/en/feeds/index.atom',
    'type' => 'application/atom+xml',
  ),
);
$setup["toc"] = $TOC;
$setup["parents"] = $PARENTS;
manual_setup($setup);

manual_header();
?>
<div id="index" class="set">
 <h1 class="title">PHP Manual</h1>
 


 <div class="info">
  <div class="authorgroup" id="authors">

   <div class="author vcard"><strong class="by">by</strong>:<br>
   <span class="personname fn">
     <span class="firstname given-name">Mehdi</span>  <span class="surname family-name">Achour</span>  
   </span>
   </div>

   
   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Friedhelm</span>  <span class="surname family-name">Betz</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Antony</span>  <span class="surname family-name">Dovgal</span>  
   </span>
   </div>

   
   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Nuno</span>  <span class="surname family-name">Lopes</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Hannes</span>  <span class="surname family-name">Magnusson</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Georg</span>  <span class="surname family-name">Richter</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Damien</span>  <span class="surname family-name">Seguy</span>  
   </span>
   </div>


   <div class="author vcard">
   <span class="personname fn">
     <span class="firstname given-name">Jakub</span>  <span class="surname family-name">Vrana</span>  
   </span>
   </div>


   
   <div class="othercredit">
    <span class="personname fn">
      <span class="othername">
     <a href="preface.php#contributors" class="link">And several others</a>
     </span> 
    </span>
   </div>

  </div>
  <div class="pubdate">2013-11-20</div>
  
  <div class="authorgroup" id="editors">
   <div class="editor vcard"><strong class="editedby">Edited By</strong>: 
   <span class="personname fn">
     <span class="firstname given-name">Philip</span>  <span class="surname family-name">Olson</span>  
   </span>
   </div>

  </div>

  <div class="copyright">&copy; 
   <span class="year">1997-2013</span>
   <span class="holder">the PHP Documentation Group</span>
  </div>

  

 </div>
 



 

 

 

 

 

 

 

 

 

 

 

<ul class="chunklist chunklist_set"><li><a href="copyright.php">Copyright</a></li><li><a href="manual.php">PHP Manual</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="preface.php">Preface</a></li></ul></li><li><a href="getting-started.php">Getting Started</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="introduction.php">Introduction</a></li><li><a href="tutorial.php">A simple tutorial</a></li></ul></li><li><a href="install.php">Installation and Configuration</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="install.general.php">General Installation Considerations</a></li><li><a href="install.unix.php">Installation on Unix systems</a></li><li><a href="install.macosx.php">Installation on Mac OS X</a></li><li><a href="install.windows.php">Installation on Windows systems</a></li><li><a href="install.cloud.php">Installation on Cloud Computing platforms</a></li><li><a href="install.fpm.php">FastCGI Process Manager (FPM)</a></li><li><a href="install.pecl.php">Installation of PECL extensions</a></li><li><a href="install.problems.php">Problems?</a></li><li><a href="configuration.php">Runtime Configuration</a></li></ul></li><li><a href="langref.php">Language Reference</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="language.basic-syntax.php">Basic syntax</a></li><li><a href="language.types.php">Types</a></li><li><a href="language.variables.php">Variables</a></li><li><a href="language.constants.php">Constants</a></li><li><a href="language.expressions.php">Expressions</a></li><li><a href="language.operators.php">Operators</a></li><li><a href="language.control-structures.php">Control Structures</a></li><li><a href="language.functions.php">Functions</a></li><li><a href="language.oop5.php">Classes and Objects</a></li><li><a href="language.namespaces.php">Namespaces</a></li><li><a href="language.exceptions.php">Exceptions</a></li><li><a href="language.generators.php">Generators</a></li><li><a href="language.references.php">References Explained</a></li><li><a href="reserved.variables.php">Predefined Variables</a></li><li><a href="reserved.exceptions.php">Predefined Exceptions</a></li><li><a href="reserved.interfaces.php">Predefined Interfaces and Classes</a></li><li><a href="context.php">Context options and parameters</a></li><li><a href="wrappers.php">Supported Protocols and Wrappers</a></li></ul></li><li><a href="security.php">Security</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="security.intro.php">Introduction</a></li><li><a href="security.general.php">General considerations</a></li><li><a href="security.cgi-bin.php">Installed as CGI binary</a></li><li><a href="security.apache.php">Installed as an Apache module</a></li><li><a href="security.filesystem.php">Filesystem Security</a></li><li><a href="security.database.php">Database Security</a></li><li><a href="security.errors.php">Error Reporting</a></li><li><a href="security.globals.php">Using Register Globals</a></li><li><a href="security.variables.php">User Submitted Data</a></li><li><a href="security.magicquotes.php">Magic Quotes</a></li><li><a href="security.hiding.php">Hiding PHP</a></li><li><a href="security.current.php">Keeping Current</a></li></ul></li><li><a href="features.php">Features</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="features.http-auth.php">HTTP authentication with PHP</a></li><li><a href="features.cookies.php">Cookies</a></li><li><a href="features.sessions.php">Sessions</a></li><li><a href="features.xforms.php">Dealing with XForms</a></li><li><a href="features.file-upload.php">Handling file uploads</a></li><li><a href="features.remote-files.php">Using remote files</a></li><li><a href="features.connection-handling.php">Connection handling</a></li><li><a href="features.persistent-connections.php">Persistent Database Connections</a></li><li><a href="features.safe-mode.php">Safe Mode</a></li><li><a href="features.commandline.php">Command line usage</a> — Using PHP from the command line</li><li><a href="features.gc.php">Garbage Collection</a></li><li><a href="features.dtrace.php">DTrace Dynamic Tracing</a></li></ul></li><li><a href="funcref.php">Function Reference</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="refs.basic.php.php">Affecting PHP's Behaviour</a></li><li><a href="refs.utilspec.audio.php">Audio Formats Manipulation</a></li><li><a href="refs.remote.auth.php">Authentication Services</a></li><li><a href="refs.utilspec.cmdline.php">Command Line Specific Extensions</a></li><li><a href="refs.compression.php">Compression and Archive Extensions</a></li><li><a href="refs.creditcard.php">Credit Card Processing</a></li><li><a href="refs.crypto.php">Cryptography Extensions</a></li><li><a href="refs.database.php">Database Extensions</a></li><li><a href="refs.calendar.php">Date and Time Related Extensions</a></li><li><a href="refs.fileprocess.file.php">File System Related Extensions</a></li><li><a href="refs.international.php">Human Language and Character Encoding Support</a></li><li><a href="refs.utilspec.image.php">Image Processing and Generation</a></li><li><a href="refs.remote.mail.php">Mail Related Extensions</a></li><li><a href="refs.math.php">Mathematical Extensions</a></li><li><a href="refs.utilspec.nontext.php">Non-Text MIME Output</a></li><li><a href="refs.fileprocess.process.php">Process Control Extensions</a></li><li><a href="refs.basic.other.php">Other Basic Extensions</a></li><li><a href="refs.remote.other.php">Other Services</a></li><li><a href="refs.search.php">Search Engine Extensions</a></li><li><a href="refs.utilspec.server.php">Server Specific Extensions</a></li><li><a href="refs.basic.session.php">Session Extensions</a></li><li><a href="refs.basic.text.php">Text Processing</a></li><li><a href="refs.basic.vartype.php">Variable and Type Related Extensions</a></li><li><a href="refs.webservice.php">Web Services</a></li><li><a href="refs.utilspec.windows.php">Windows Only Extensions</a></li><li><a href="refs.xml.php">XML Manipulation</a></li></ul></li><li><a href="internals2.php">PHP at the Core: A Hacker's Guide</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="internals2.preface.php">Preface</a></li><li><a href="internals2.memory.php">Memory management</a></li><li><a href="internals2.variables.php">Working with Variables</a></li><li><a href="internals2.funcs.php">Writing Functions</a></li><li><a href="internals2.classes.php">Writing Classes</a></li><li><a href="internals2.resources.php">Working with Resources</a></li><li><a href="internals2.ini.php">Working with INI settings</a></li><li><a href="internals2.streams.php">Working with streams</a></li><li><a href="internals2.counter.php">The &quot;counter&quot; Extension - A Continuing Example</a></li><li><a href="internals2.buildsys.php">The PHP 5 build system</a></li><li><a href="internals2.structure.php">Extension structure</a></li><li><a href="internals2.pdo.php">PDO Driver How-To</a></li><li><a href="internals2.faq.php">Extension FAQs</a></li><li><a href="internals2.apiref.php">Zend Engine 2 API reference</a></li><li><a href="internals2.opcodes.php">Zend Engine 2 Opcodes</a></li><li><a href="internals2.ze1.php">Zend Engine 1</a></li></ul></li><li><a href="faq.php">FAQ</a> — FAQ: Frequently Asked Questions<ul class="chunklist chunklist_set chunklist_children"><li><a href="faq.general.php">General Information</a></li><li><a href="faq.mailinglist.php">Mailing lists</a></li><li><a href="faq.obtaining.php">Obtaining PHP</a></li><li><a href="faq.databases.php">Database issues</a></li><li><a href="faq.installation.php">Installation</a></li><li><a href="faq.build.php">Build Problems</a></li><li><a href="faq.using.php">Using PHP</a></li><li><a href="faq.passwords.php">Password Hashing</a> — Safe Password Hashing</li><li><a href="faq.html.php">PHP and HTML</a></li><li><a href="faq.com.php">PHP and COM</a></li><li><a href="faq.languages.php">PHP and other languages</a></li><li><a href="faq.migration5.php">Migrating from PHP 4 to PHP 5</a></li><li><a href="faq.misc.php">Miscellaneous Questions</a></li></ul></li><li><a href="appendices.php">Appendices</a><ul class="chunklist chunklist_set chunklist_children"><li><a href="history.php">History of PHP and Related Projects</a></li><li><a href="migration55.php">Migrating from PHP 5.4.x to PHP 5.5.x</a></li><li><a href="migration54.php">Migrating from PHP 5.3.x to PHP 5.4.x</a></li><li><a href="migration53.php">Migrating from PHP 5.2.x to PHP 5.3.x</a></li><li><a href="migration52.php">Migrating from PHP 5.1.x to PHP 5.2.x</a></li><li><a href="migration51.php">Migrating from PHP 5.0.x to PHP 5.1.x</a></li><li><a href="migration5.php">Migrating from PHP 4 to PHP 5.0.x</a></li><li><a href="oop4.php">Classes and Objects (PHP 4)</a></li><li><a href="debugger.php">Debugging in PHP</a></li><li><a href="configure.php">Configure options</a></li><li><a href="ini.php">php.ini directives</a></li><li><a href="extensions.php">Extension List/Categorization</a></li><li><a href="aliases.php">List of Function Aliases</a></li><li><a href="reserved.php">List of Reserved Words</a></li><li><a href="resource.php">List of Resource Types</a></li><li><a href="filters.php">List of Available Filters</a></li><li><a href="transports.php">List of Supported Socket Transports</a></li><li><a href="types.comparisons.php">PHP type comparison tables</a></li><li><a href="tokens.php">List of Parser Tokens</a></li><li><a href="userlandnaming.php">Userland Naming Guide</a></li><li><a href="about.php">About the manual</a></li><li><a href="cc.license.php">Creative Commons Attribution 3.0</a></li><li><a href="indexes.php">Index listing</a></li><li><a href="doc.changelog.php">Changelog</a></li></ul></li></ul></div><?php manual_footer(); ?>