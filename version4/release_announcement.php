<?
require("shared.inc");
commonHeader("Beta 1");
?>

<h1 align="center">PHP 4.0 Beta 1</h1>
<h2 align="center">Release Announcement</h2>
<p align="left">&nbsp;</p>
<h3 align="left">Introduction</h3>
<h3 align="left">&nbsp;</h3>
<p align="left">After eight months of intense development, the PHP group is
pleased to announce the release of PHP 4.0 Beta 1.&nbsp; This new,
downwards-compatible successor to the award winning PHP 3.0 Web scripting
language, features revolutionary enhancements that will allow PHP, more than
ever, to compete in the forefront of Web development tools.</p>
<p align="left">PHP 4.0 offers drastic improvements in every&nbsp; aspect -
performance and scalability, features, platform support and extendibility.</p>
<p align="left">The most significant change in PHP 4.0 is the integration of the
Zend engine.&nbsp; Zend, developed by Zeev Suraski and Andi Gutmans in the last
eight months, is a full rewrite of their PHP 3.0 scripting engine;&nbsp; The new
version is blazing fast, and offers significant performance boosts for both
simple and especially complex Web sites.&nbsp; In addition, the new scripting
engine enhances the PHP language with a bunch of new features, and removes
limitations that existed in version 3.0.</p>
<p align="left">In addition to Zend, PHP 4.0 introduces several other new
features.&nbsp; PHP 4.0 is truly platform independent, and is portable across
operating systems and different Web servers;&nbsp; Sascha Schumann added native
support for HTTP
sessions, without the need of a 3rd party library;&nbsp; And, Stig Bakken
implemented a
modular build process for UNIX, that would make it easy to use and distribute
dynamically loadable PHP modules.</p>
<p align="left">&nbsp;</p>
<h3 align="left">Beta 1 Status</h3>
<p align="left">PHP 4.0 has been tested by a group of about 30 people for the
last three months.&nbsp; This small scale beta test was conducted to ensure that
the first public beta of PHP 4.0, when it is released, is stable enough to be
tested by the masses.&nbsp; We now feel that the code has reached a stability
level that is suitable for a public beta test, as most legacy PHP 3.0 scripts we
try to run on PHP 4.0 run without a glitch, and this very web site, the one
you're browsing now, is powered by PHP 4.0.</p>
<p align="left">However, it is still beta software.&nbsp; As such, we're
positive that there will be bugs in it.&nbsp; Since mostly all of PHP has been
either written from scratch or heavily modified, the chances of finding no bugs
in the new code are slim.&nbsp; For that reason, we don't recommend that you use
PHP 4.0 Beta 1 on production servers;&nbsp; If you choose to run PHP 4.0 Beta 1
on a production server, at least make sure your web site runs properly under PHP
4.0 by first testing it offline, on a different Web server.</p>
<p align="left">Because we release the code as a beta, the default build
configuration builds PHP 4.0 in debug mode.&nbsp; Debug mode is considerably
slower than Release mode, but allows for more useful bug reports.&nbsp; If you
want to benchmark PHP 4.0 against PHP 3.0, make sure you turn debug mode off.</p>
<h3 align="left">New Features</h3>
<p align="left">PHP 4.0 is packed with many new features:</p>
<ul>
  <li>
    <p align="left"><b>The <a href="http://www.zend.com">Zend Engine</a>.</b>&nbsp;&nbsp;<br>
    In addition to unprecedented performance, the Zend engine features several
    important <a href="http://www.zend.com/?page=new_features">new language
    features</a>, such as reference counting, enhanced objects support, a new
    boolean type and extendibility.&nbsp; (Andi Gutmans, Zeev Suraski).<br>
  </li>
  <li>
    <p align="left"><b>Server Abstraction Layer.</b>&nbsp;&nbsp;<br>
    PHP 4.0 has no server-specific code in any of its parts, and interfaces with
    Web server through a thin abstraction layer.&nbsp; This makes the process of
    adding support for different types of Web servers an easy task.&nbsp; Beta 1
    supports the Apache Web server and Microsoft's Internet Information
    Server.&nbsp; Later betas are expected to add support for additional Web
    servers.&nbsp; (Shane Caraveo, Andi Gutmans, Zeev Suraski).<br>
  </li>
  <li>
    <p align="left"><b>HTTP Sessions support.</b>&nbsp;&nbsp;<br>
    One of the features that was most requested for PHP 3.0 was built-in HTTP
    sessions.&nbsp; While HTTP session support has been available for a long
    time through PHPlib, we decided it was time to support them natively.&nbsp;
    (Sascha Schumann).<br>
  </li>
  <li>
    <p align="left"><b>Generalized Build Process, under UNIX.</b>&nbsp;&nbsp;<br>
    While Beta 1 doesn't exploit the power of the new generalized build process,
    future betas will allow you to easily build PHP modules dynamically.&nbsp; (Stig
    Bakken).<br>
  </li>
  <li>
    <p align="left"><b>Easier and more powerful configuration.</b>&nbsp;&nbsp;<i><br>
    All</i> configuration directives available in <b>php.ini</b> (formerly
    php3.ini) can now be controlled at runtime, through Apache configuration
    files (Apache module only) or through the Windows registry (Win32
    only).&nbsp; (Zeev Suraski).</li>
</ul>
<p align="left">&nbsp;</p>
<h3 align="left">Incompatibilities</h3>
<p align="left">Zend has been designed from the ground up to be as compatible as
possible with the PHP 3.0 language.&nbsp; It is close to 100% compatibility with
PHP 3.0, except for very <a href="incompatibilities.php">minor
incompatibilities</a> that exist due to the nature of the new architecture.</p>
<h3 align="left">&nbsp;</h3>
<h3 align="left">Mailing list</h3>
<p align="left">The PHP 4.0 Beta mailing list is <a href="mailto:php4beta@lists.php.net">php4beta@lists.php.net</a>
(to subscribe, send an empty message to <a href="mailto:php4beta-subscribe@lists.php.net">php4beta-subscribe@lists.php.net</a>).&nbsp;
All PHP 4.0 related discussions should be held on this list;&nbsp; Please, don't
clutter the already over-flown PHP 3.0 mailing list with PHP 4.0 related
questions.</p>
<p align="left">&nbsp;</p>
<h3 align="left">Reporting Bugs</h3>
<p align="left">PHP 4.0 bugs should be reported at <a href="http://bugs.php.net/">http://bugs.php.net/</a>.&nbsp;
Please, don't mix between <a href="http://bugs.php.net/bugs-php3.php">http://bugs.php.net/bugs-php3.php</a>
(the PHP 3.0 bug report tool) and <a href="http://bugs.php.net/">http://bugs.php.net/</a>.</p>
<p align="left">&nbsp;</p>
<h3 align="left">For PHP Module Developers</h3>
<p align="left">PHP 4.0's inner API has changed significantly since version
3.0.&nbsp; If you used only module API functions in your modules, your module
should work with PHP 4.0 without requiring any changes.&nbsp;&nbsp; However, if
you used inner API functions (for example, accessed symbol tables or arrays
using Hash functions), your module will require some porting.</p>
<p align="left">We haven't yet prepared updated API documentation.&nbsp; We hope
to prepare some for Beta 2.</p>
<h3 align="left">&nbsp;</h3>
<h3 align="left">Future</h3>
<p align="left">One of the goals of Beta 1 is to find out whether any function
modules in the source tree are incompatible with PHP 4.0.&nbsp; We hope to find
all of these modules and have them fixed for Beta 2.</p>
<p align="left">No date has been set for the final release of PHP 4.0.&nbsp;
Assuming the beta test of PHP 4.0 goes well, we expect the final release to be
out on the fourth quarter of 1999.</p>
<p align="left">&nbsp;</p>

<? commonFooter(); ?>
