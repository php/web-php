<?php 
    $baseUrl = 'http://php.net/'; // TODO set to '/' on prod for all phpweb mirrors
    $lang = 'en'; // TODO set accordingly on prod
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 
 <title>PHP: Hypertext Preprocessor</title>
 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
 <link rel="shortcut icon" href="http://static.php.net/www.php.net/favicon.ico" />
 <link rel="search" type="application/opensearchdescription+xml" href="http://www.php.net/phpnetimprovedsearch.src" title="Add PHP.net search" />
 <link rel="alternate" type="application/atom+xml" href="http://www.php.net/releases.atom" title="PHP Release feed" />
 <link rel="alternate" type="application/atom+xml" title="PHP: Hypertext Preprocessor" href="http://www.php.net/feed.atom" />
 <link rel="canonical" href="http://php.net/index.php" />
 
 <link rel="stylesheet" type="text/css" href="css/reset.css" media="all" /> 
 <link rel="stylesheet" type="text/css" href="css/structure.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="css/doc.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="css/theme.css" media="screen" />
 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
 <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
 <script type="text/javascript" src="js/common.js"></script>
 
</head>
<body>

<div id="headnav">
 
 <ul id="headmenu">
  <li id="headsearch">
    <form method="post" action="<?php echo $baseUrl ?>search.php" id="topsearch">
      <fieldset>
        <input type="text" id="headsearch-keywords" name="pattern" value="Search..." size="30" accesskey="s" />
        <input type="submit"
          value="Go"
          id="headsearch-submit"
          class="submit" />
       </fieldset>
    </form>
  </li>
  <li id="headhome">
    <a href="/" rel="home" class="menu-link">Home</a>
  </li>
  <li>
    <a href="<?php echo $baseUrl ?>downloads.php" class="menu-link">Downloads</a>
  </li>
  <li class="parent current">
    <a href="<?php echo $baseUrl ?>docs.php" class="menu-link">Documentation</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <dl>
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/getting-started.php">Getting Started</a></dt>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/preface.php">Preface</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/introduction.php">Introduction</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/tutorial.php">A simple tutorial</a></dd>
        
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/langref.php">Language Reference</a></dt>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.basic-syntax.php">Basic syntax</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.types.php">Types</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.variables.php">Variables</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.constants.php">Constants</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.expressions.php">Expressions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.operators.php">Operators</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.control-structures.php">Control Structures</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.functions.php">Functions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.oop5.php">Classes and Objects</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.namespaces.php">Namespaces</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.exceptions.php">Exceptions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/language.references.php">References Explained</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/reserved.variables.php">Predefined variables</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/reserved.exceptions.php">Predefined Exceptions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/reserved.interfaces.php">Predefined Interfaces</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/context.php">Context options and parameters</a></dd>
        </dl>
        
        <dl style="width: 185px;">
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.php">Security</a></dt>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.intro.php">Introduction</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.general.php">General considerations</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.cgi-bin.php">Installed as CGI binary</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.apache.php">Installed as an Apache module</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.filesystem.php">Filesystem Security</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.database.php">Database Security</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.errors.php">Error Reporting</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.globals.php">Using Register Globals</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.variables.php">User Submitted Data</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.magicquotes.php">Magic Quotes</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.hiding.php">Hiding PHP</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/security.current.php">Keeping Current</a></dd>
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.php">Features</a></dt>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.http-auth.php">HTTP authentication with PHP</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.cookies.php">Cookies</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.sessions.php">Sessions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.xforms.php">Dealing with XForms</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.file-uploads.php">Handling file uploads</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.remote-files.php">Using remote files</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.connection-handling.php">Connection handling</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.persistent-connections.php">Persistent Database Connections</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.safe-mode.php">Safe Mode</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.commandline.php">Using PHP from the command line</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/features.gc.php">Garbage Collection</a></dd>
        </dl>
        
        <dl style="width: 275px;">
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/funcref.php">Function Reference</a></dt>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.basic.php.php">Affecting PHP's Behaviour</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.utilspec.audio.php">Audio Formats Manipulation</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.remote.auth.php">Authentication Services</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.calendar.php">Date and Time Related Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.utilspec.cmdline.php">Command Line Specific Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.compression.php">Compression and Archive Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.creditcar.php">Credit Card Processing</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.crypto.php">Cryptography Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.database.php">Database Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.fileprocess.file.php">File System Related Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.international.php">Human Language and Char. Encoding Support</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.utilspec.image.php">Image Processing and Generation</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.remote.mail.php">Mail Related Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.math.php">Mathematical Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.utilspec.nontext.php">Non-Text MIME Output</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.fileprocess.process.php">Process Control Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.basic.other.php">Other Basic Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.remote.other.php">Other Services</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.search.php">Search Engine Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.utilspec.server.php">Server Specific Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.basic.session.php">Session Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.basic.text.php">Text Processing</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.basic.vartype.php">Variable and Type Related Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.webservice.php">Web Services</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.utilspec.windows.php">Windows Only Extensions</a></dd>
        	<dd><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/refs.xml.php">XML Manipulation</a></dd>
        </dl>
        <dl style="width: 195px;">
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/install.php">Installation and Configuration</a></dt>
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/internals2.php">PHP at the Core</a></dt>
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/faq.php">Frequently Asked Questions</a></dt>
        <dt><a href="<?php echo $baseUrl ?>manual/<?php echo $lang ?>/appendices.php">Appendices</a></dt>
        </dl>
        <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent">
    <a href="<?php echo $baseUrl ?>community.php" class="menu-link">Community</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <dl style="width: 300px;">
      <dt><a href="<?php echo $baseUrl ?>conferences/">Conferences</a></dt>
        <dd><a href="<?php echo $baseUrl ?>conferences/">All upcoming PHP conferences</a></dd>
        <dd><a href="<?php echo $baseUrl ?>submit-event.php">Add a new conference</a></dd>
      <dt><a href="#">News</a></dt>
        <dd><a href="#">Recent headline 1 (Oct 6)</a></dd>
        <dd><a href="#">Another recent headline 1 (Oct 4)</a></dd>
        <dd><a href="#">Yet another headline with a lot of text (Oct 2)</a></dd>
    </dl>
    <dl>
      <dt><a href="http://wiki.php.net/">PHP Wiki</a></dt>
        <dd><a href="http://wiki.php.net/rfc">Write a RFC</a></dd>
      <dt><a href="#">Get Involved</a></dt>
        <dd><a href="#">Report bugs</a></dd>
        <dd><a href="#">Contribute code</a></dd>
        <dd><a href="#">Organize an event</a></dd>
        <dd><a href="#">Write documentation</a></dd>
        <dd><a href="#">Test PHP</a></dd>
    </dl>
    <dl>
      <dt><a href="<?php echo $baseUrl ?>mailing-lists.php">Mailing lists</a></dt>
      <dt><a href="<?php echo $baseUrl ?>links.php">PHP related sites</a></dt>
      <dt><a href="#">About PHP.net</a></dt>
        <dd><a href="<?php echo $baseUrl ?>sites.php">Other PHP.net sites</a></dd>
        <dd><a href="<?php echo $baseUrl ?>my.php">My PHP.net</a></dd>
        <dd><a href="#">Contribute to the website</a></dd>
        <dd><a href="<?php echo $baseUrl ?>credits.php">Who's behind this?</a></dd>
        <dd><a href="<?php echo $baseUrl ?>contact.php">Contact us</a></dd>
        <dd><a href="<?php echo $baseUrl ?>mirrors.php">Mirror sites</a></dd>
    </dl>
    <br style="clear: both;" />
    </div></div></div>
  </li>
  <li>
    <a href="<?php echo $baseUrl ?>support.php" class="menu-link">Help</a>
  </li>
  
 </ul>
<br style="clear: both;" />
</div>

<div id="layout">
