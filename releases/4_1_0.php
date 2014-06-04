<?php
// $Id$
$_SERVER['BASE_PAGE'] = 'releases/4_1_0.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/prepend.inc';
site_header("PHP 4.1.0 Release Announcement");
?>

<h1>PHP 4.1.0 Release Announcement</h1>

<p>
 After a lengthy QA process, PHP 4.1.0 is <a href="/downloads.php">finally out</a>!<br>
 [ <a href="/releases/4_1_0_fr.php">Version Fran&ccedil;aise</a> ]
</p>

<p> PHP 4.1.0 includes several other key improvements:</p>
<ul>
 <li>A new input interface for improved security (read below)</li>
 <li>Highly improved performance in general</li>
 <li>
  Revolutionary performance and stability improvements under
  Windows.  The multithreaded server modules under Windows (ISAPI,
  Apache, etc.) perform as much as 30 times faster under load!  We
  want to thank Brett Brewer and his team in Microsoft for working
  with us to improve PHP for Windows.
 </li>
 <li>
  Versioning support for extensions.  Right now it's barely being
  used, but the infrastructure was put in place to support separate
  version numbers for different extensions.  The negative side effect
  is that loading extensions that were built against old versions of
  PHP will now result in a crash, instead of in a nice clear message.
  Make sure you only use extensions built with PHP 4.1.0.
 </li>
 <li>Turn-key output compression support</li>
 <li><strong>LOTS</strong> of fixes and new functions</li>
</ul>

<p>
 As some of you may notice, this version is quite historic, as it's
 the first time in history we actually incremented the middle digit! :)
 The two key reasons for this unprecedented change were the new input
 interface, and the broken binary compatibility of modules due to the
 versioning support.
</p>

<p>
 Following is a description of the new input mechanism. For a full list of
 changes in PHP 4.1.0, see the <a href="/ChangeLog-4.php#4.1.0">ChangeLog</a>.
</p>

<hr>

<h2>SECURITY: NEW INPUT MECHANISM</h2>

<p>
 First and foremost, it's important to stress that regardless of
 anything you may read in the following lines, PHP 4.1.0 <strong>still
 supports</strong> the old input mechanisms from older versions.
 Old applications should go on working fine without modification!
</p>

<p>Now that we have that behind us, let's move on :)</p>

<p>
 For various reasons, PHP setups which rely on register_globals 
 being on (i.e., on form, server and environment variables becoming 
 a part of the global namespace, automatically) are very often 
 exploitable to various degrees.  For example, the piece of code:
</p>

<?php highlight_php('<?php
if (authenticate_user()) {
  $authenticated = true;
}
...
?>');?>

<p>
 May be exploitable, as remote users can simply pass on 'authenticated'
 as a form variable, and then even if authenticate_user() returns false,
 $authenticated will actually be set to true.  While this looks like a
 simple example, in reality, quite a few PHP applications ended up being
 exploitable by things related to this misfeature.
</p>

<p>
 While it is quite possible to write secure code in PHP, we felt that the
 fact that PHP makes it too easy to write insecure code was bad, and we've
 decided to attempt a far-reaching change, and deprecate register_globals.
 Obviously, because the vast majority of the PHP code in the world relies
 on the existence of this feature, we have no plans to actually remove it
 from PHP anytime in the foreseeable future, but we've decided to encourage
 people to shut it off whenever possible.
</p>

<p>
 To help users build PHP applications with register_globals being off,
 we've added several new special variables that can be used instead of the
 old global variables. There are 7 new special arrays:
</p>

<ul>
 <li>$_GET - contains form variables sent through GET</li>
 <li>$_POST - contains form variables sent through POST</li>
 <li>$_COOKIE - contains HTTP cookie variables</li>
 <li>$_SERVER - contains server variables (e.g., REMOTE_ADDR)</li>
 <li>$_ENV - contains the environment variables</li>
 <li>
  $_REQUEST - a merge of the GET variables, POST variables and Cookie variables.
  In other words - all the information that is coming from the user,
  and that from a security point of view, cannot be trusted.
 </li>
 <li>$_SESSION - contains HTTP variables registered by the session module</li>
</ul>

<p>
 Now, other than the fact that these variables contain this special information,
 they're also special in another way - they're automatically global in any
 scope. This means that you can access them anywhere, without having to
 'global' them first. For example:
</p>

<?php highlight_php('<?php
function example1()
{
	print $_GET["name"];   // works, \'global $_GET;\' is not necessary!
}
?>');?>

<p>
 would work fine! We hope that this fact would ease the pain in migrating
 old code to new code a bit, and we're confident it's going to make writing
 new code easier. Another neat trick is that creating new entries in the
 $_SESSION array will automatically register them as session variables, as
 if you called session_register(). This trick is limited to the session
 module only - for example, setting new entries in $_ENV will
 <strong>not</strong> perform an implicit putenv().
</p>

<p>
 PHP 4.1.0 still defaults to have register_globals set to on. It's a
 transitional version, and we encourage application authors, especially
 public ones which are used by a wide audience, to change their applications
 to work in an environment where register_globals is set to off. Of course,
 they should take advantage of the new features supplied in PHP 4.1.0 that
 make this transition much easier.
</p>
 
<p>
 As of the next semi-major version of PHP, new installations of PHP will
 default to having register_globals set to off. No worries! Existing
 installations, which already have a php.ini file that has register_globals
 set to on, will not be affected. Only when you install PHP on a brand new
 machine (typically, if you're a brand new user), will this affect you, and
 then too - you can turn it on if you choose to.
</p>

<p>
 Note: Some of these arrays had old names, e.g. $HTTP_GET_VARS. These names
 still work, but we encourage users to switch to the new shorter, and
 auto-global versions.
</p>

<p>
 Thanks go to Shaun Clowes (shaun at securereality dot com dot au) for
 pointing out this problem and for analyzing it.
</p>

<?php site_footer(); ?>
