<?php 
$MYSITE = "/"; // Will be http://[foo.]php.net
$MY_LANG = 'en'; // Will use lang from accept header, or last saved 'preferred lang'
if (!isset($curr)) {
    $curr = "docs"; // Quick workaround to change the 'current' highlighting
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $MY_LANG?>" lang="<?php echo $MY_LANG?>">
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
 <base href="<?php echo $MYSITE ?>" />
 
</head>
<body>

<div id="headnav">
 
 <ul id="headmenu">
  <li id="headsearch">
    <form method="post" action="/search.php" id="topsearch">
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
    <a href="/downloads.php" class="menu-link">Downloads</a>
  </li>
  <li class="parent <?php echo $curr != "docs" ?: "current"?>">
    <a href="/docs.php" class="menu-link">Documentation</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <dl>
        <dt><a href="/manual/<?php echo $MY_LANG ?>/getting-started.php">Getting Started</a></dt>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/preface.php">Preface</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/introduction.php">Introduction</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/tutorial.php">A simple tutorial</a></dd>
        
        <dt><a href="/manual/<?php echo $MY_LANG ?>/langref.php">Language Reference</a></dt>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.basic-syntax.php">Basic syntax</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.types.php">Types</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.variables.php">Variables</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.constants.php">Constants</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.expressions.php">Expressions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.operators.php">Operators</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.control-structures.php">Control Structures</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.functions.php">Functions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.oop5.php">Classes and Objects</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.namespaces.php">Namespaces</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.exceptions.php">Exceptions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/language.references.php">References Explained</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/reserved.variables.php">Predefined variables</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/reserved.exceptions.php">Predefined Exceptions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/reserved.interfaces.php">Predefined Interfaces</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/context.php">Context options and parameters</a></dd>
        </dl>
        
        <dl style="width: 185px;">
        <dt><a href="/manual/<?php echo $MY_LANG ?>/security.php">Security</a></dt>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.intro.php">Introduction</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.general.php">General considerations</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.cgi-bin.php">Installed as CGI binary</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.apache.php">Installed as an Apache module</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.filesystem.php">Filesystem Security</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.database.php">Database Security</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.errors.php">Error Reporting</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.globals.php">Using Register Globals</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.variables.php">User Submitted Data</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.magicquotes.php">Magic Quotes</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.hiding.php">Hiding PHP</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/security.current.php">Keeping Current</a></dd>
        <dt><a href="/manual/<?php echo $MY_LANG ?>/features.php">Features</a></dt>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.http-auth.php">HTTP authentication with PHP</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.cookies.php">Cookies</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.sessions.php">Sessions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.xforms.php">Dealing with XForms</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.file-uploads.php">Handling file uploads</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.remote-files.php">Using remote files</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.connection-handling.php">Connection handling</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.persistent-connections.php">Persistent Database Connections</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.safe-mode.php">Safe Mode</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.commandline.php">Using PHP from the command line</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/features.gc.php">Garbage Collection</a></dd>
        </dl>
        
        <dl style="width: 275px;">
        <dt><a href="/manual/<?php echo $MY_LANG ?>/funcref.php">Function Reference</a></dt>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.basic.php.php">Affecting PHP's Behaviour</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.utilspec.audio.php">Audio Formats Manipulation</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.remote.auth.php">Authentication Services</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.calendar.php">Date and Time Related Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.utilspec.cmdline.php">Command Line Specific Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.compression.php">Compression and Archive Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.creditcar.php">Credit Card Processing</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.crypto.php">Cryptography Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.database.php">Database Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.fileprocess.file.php">File System Related Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.international.php">Human Language and Char. Encoding Support</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.utilspec.image.php">Image Processing and Generation</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.remote.mail.php">Mail Related Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.math.php">Mathematical Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.utilspec.nontext.php">Non-Text MIME Output</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.fileprocess.process.php">Process Control Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.basic.other.php">Other Basic Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.remote.other.php">Other Services</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.search.php">Search Engine Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.utilspec.server.php">Server Specific Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.basic.session.php">Session Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.basic.text.php">Text Processing</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.basic.vartype.php">Variable and Type Related Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.webservice.php">Web Services</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.utilspec.windows.php">Windows Only Extensions</a></dd>
        	<dd><a href="/manual/<?php echo $MY_LANG ?>/refs.xml.php">XML Manipulation</a></dd>
        </dl>
        <dl style="width: 195px;">
        <dt><a href="/manual/<?php echo $MY_LANG ?>/install.php">Installation and Configuration</a></dt>
        <dt><a href="/manual/<?php echo $MY_LANG ?>/internals2.php">PHP at the Core</a></dt>
        <dt><a href="/manual/<?php echo $MY_LANG ?>/faq.php">Frequently Asked Questions</a></dt>
        <dt><a href="/manual/<?php echo $MY_LANG ?>/appendices.php">Appendices</a></dt>
        <dt><a href="/quickref.php">Quick function reference</a></dt>
        </dl>
        <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr != "community" ?: "current"?>">
    <a href="/community.php" class="menu-link">Community</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <dl style="width: 300px;">
      <dt><a href="/conferences/">Conferences</a></dt>
        <dd><a href="/conferences/">All upcoming PHP conferences</a></dd>
        <dd><a href="/submit-event.php">Add a new conference</a></dd>
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
      <dt><a href="/mailing-lists.php">Mailing lists</a></dt>
      <dt><a href="/links.php">PHP related sites</a></dt>
      <dt><a href="#">About PHP.net</a></dt>
        <dd><a href="/sites.php">Other PHP.net sites</a></dd>
        <dd><a href="/my.php">My PHP.net</a></dd>
        <dd><a href="#">Contribute to the website</a></dd>
        <dd><a href="/credits.php">Who's behind this?</a></dd>
        <dd><a href="/contact.php">Contact us</a></dd>
        <dd><a href="/mirrors.php">Mirror sites</a></dd>
    </dl>
    <br style="clear: both;" />
    </div></div></div>
  </li>
  <li class="parent <?php echo $curr != "help" ?: "current"?>">
    <a href="/support.php" class="menu-link">Help</a>
    <div class="children"><div class="children-1"><div class="children-2">
    <dl style="width: 250px;">
      <dt><a href="#">Navigation tips</a></dt>
        <dd><a href="/sidebars.php">Search sidebars</a></dd>
        <dd><a href="/urlhowto.php">URL Howto</a></dd>
        <dd><a href="/tips.php">Quick Reference tips</a></dd>
        <dd><a href="/sites.php">Other PHP sites</a></dd>
    </dl>
    <dl style="width: 250px;">
      <dt><a href="#">Support</a></dt>
        <dd><a href="/mailing-lists.php">Mailing lists</a></dd>
        <dd><a href="/support.php">General resources</a></dd>
    </dl>
    <dl style="swidth: 250px";>
      <dt><a href="http://bugs.php.net/">Bugs</a></dt>
        <dd><a href="http://bugs.php.net/report.php">Report a bug</a></dd>
        <dd><a href="http://bugs.php.net/how-to-report.php">How to file a bug report</a></dd>
        <dd><a href="http://bugs.php.net/search.php">Search reported bugs</a></dd>
    </dl>
    <br style="clear: both;" />
    </div></div></div>
  </li>
  
 </ul>
<br style="clear: both;" />
</div>

<div id="layout">
