<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'security-note.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("A Note on Security in PHP", array("current" => "docs"));
?>

<h1>A Note on Security in PHP</h1>

<p>
 PHP is a powerful and flexible tool.  This power and flexibility comes
 from PHP being a very thin framework sitting on top of dozens of distinct
 3rd-party libraries.  Each of these libraries have their own unique input
 data characteristics.  Data that may be safe to pass to one library may
 not be safe to pass to another.
</p>
<p>
 A recent Web Worm known as NeverEverSanity exposed a mistake in the input
 validation in the popular phpBB message board application.  Their
 highlighting code didn't account for double-urlencoded input correctly.
 Without proper input validation of untrusted user data combined with any
 of the PHP calls that can execute code or write to the filesystem you
 create a potential security problem.  Despite some confusion regarding the
 timing of some unrelated PHP security fixes and the NeverEverSanity worm,
 the worm didn't actually have anything to do with a security problem in
 PHP.
</p>

<p>
 When we talk about security in a web application we really have two
 classes.  Remote and Local.  Every remote exploit can be avoided with very
 careful input validation.  If you are writing an application that asks for
 a user's name and age, check and make sure you are only getting characters
 you would expect.  Also make sure you are not getting too much data that
 might overflow your backend data storage or whatever manipulation
 functions you may be passing this data to.  A variation of the remote
 exploit is the XSS or cross-site scripting problem where one user enters
 some javascript that the next user then views.
</p>
<p>
 For Local exploits we mostly hear about open_basedir or safemode problems
 on shared virtual hosts.  These two features are there as a convenience to
 system administrators and should in no way be thought of as a complete
 security framework.  With all the 3rd-party libraries you can hook into
 PHP and all the creative ways you can trick these libraries into accessing
 files, it is impossible to guarantee security with these directives.  The
 Oracle and Curl extensions both have ways to go through the library and
 read a local file, for example.  Short of modifying these 3rd-party
 libraries, which would be difficult for the closed-source Oracle library,
 there really isn't much PHP can do about this.
</p>
<p>
 When you have PHP by itself with only a small set of extensions safemode
 and open_basedir are generally enough to frustrate the average bad guy,
 but for critical security situations you should be using OS-level security
 by running multiple web servers each as their own user id and ideally in
 separate jailed/chroot'ed filesystems.  Better yet, use completely
 separate physical servers.  If you share a server with someone you don't
 trust you need to realize that you will never achieve airtight security.
</p>

<?php site_footer(); ?>
