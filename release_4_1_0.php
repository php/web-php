<?php
/* if you're reading this, it isn't because you've found a security hole.
   this is an open source website. read and learn! */

header("Cache-Control: public, max-age=600");

require_once 'prepend.inc';

$SIDEBAR_DATA = '
<h3>What is PHP?</h3>

<p>
<acronym title="recursive acronym for PHP: Hypertext Preprocessor">PHP</acronym>
is a server-side, cross-platform, HTML embedded scripting
language. If you are new to PHP and want to get some idea
of how it works, try the ' . make_link("/tut.php", "introductory tutorial") . '.
After that, check out the online ' . make_link("/docs.php", "manual") . ',
and the example archive sites and some of the other resources
available in the ' . make_link("/links.php", "links section") . '.
</p>

<p>
PHP is a project of the ' . 
make_link("http://www.apache.org/","Apache Software Foundation") . '.
</p>

<h3>' . make_link("/thanks.php", "Thanks To") . '</h3>
&nbsp; ' . make_link("http://www.easydns.com/?V=698570efeb62a6e2", "easyDNS") . '<br>
&nbsp; ' . make_link("http://www.pair.com/", "pair Networks") . '<br>
&nbsp; ' . make_link("http://www.rackspace.com/?supbid=php.net", "Rackspace") . '<br>
&nbsp; ' . make_link("http://www.synacor.com/", "Synacor") . '<br>
&nbsp; ' . make_link("http://valinux.com/", "VA Linux Systems") . '<br>
<h3>Related sites</h3>
&nbsp; ' . make_link("http://www.apache.org/", "Apache") . '<br>
&nbsp; ' . make_link("http://www.mysql.com/", "MySQL") . '<br>
&nbsp; ' . make_link("http://www.postgresql.org/", "PostgreSQL") . '<br>
&nbsp; ' . make_link("http://www.zend.com/", "Zend Technologies") . '<br>
<h3>Community</h3>
&nbsp; ' . make_link("http://www.linuxfund.org/", "LinuxFund.org") . '<br>
&nbsp; ' . make_link("http://www.osdn.org/", "OSDN") . '<br>

<h3>Contact</h3>

<p>
Please
submit website bugs in the ' .
make_link('http://bugs.php.net/', 'bug system') . '.
</p>
<p>
You can contact the webmaster at ' . 
make_link('mailto:webmaster@php.net', 'webmaster@php.net') . '.
</p>
';

$fp = @fopen("backend/events.csv",'r');
if($fp) {
	$cm=0;
	while(!feof($fp)) {
		list($d,$m,$y,$url,$desc) = fgetcsv($fp,4096);
		if($cm!=(int)$m) { 
			if($cm) $RSIDEBAR_DATA.= "<br>\n"; 
			else $RSIDEBAR_DATA.='<h3>Upcoming Events<br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.php.net/cal.php?a=1">[add event]</a></h3>';
			$cm = (int)$m;  
			$RSIDEBAR_DATA .= "<h4>".strftime('%B',mktime(12,0,0,$cm,$d,$y))."</h4>\n"; 
			unset($seen);
		}
		if(!$seen[$desc]) {
			$RSIDEBAR_DATA .= "$d. <a href=\"$url\">$desc</a><br>\n";
			$seen[$desc] = true;
		}
	}
	fclose($fp);
}

commonHeader("Hypertext Preprocessor");
echo "\n<!--$MYSITE-->\n";
?>

<h1>
PHP 4.1.0 Release Announcement
</h1>

<p>A <a href="release_4_1_0_fr.php">French translation</a> of this
announcement is also available.</p>

<pre>

After a lengthy QA process, PHP 4.1.0 is finally out. 
Download at http://www.php.net/downloads.php !

PHP 4.1.0 includes several other key improvements:
- A new input interface for improved security (read below)
- Highly improved performance in general
- Revolutionary performance and stability improvements under
  Windows.  The multithreaded server modules under Windows (ISAPI,
  Apache, etc.) perform as much as 30 times faster under load!  We
  want to thank Brett Brewer and his team in Microsoft for working
  with us to improve PHP for Windows.
- Versioning support for extensions.  Right now it's barely being
  used, but the infrastructure was put in place to support separate
  version numbers for different extensions.  The negative side effect
  is that loading extensions that were built against old versions of
  PHP will now result in a crash, instead of in a nice clear message.
  Make sure you only use extensions built with PHP 4.1.0.
- Turn-key output compression support
- *LOTS* of fixes and new functions

As some of you may notice, this version is quite historical, as it's
the first time in history we actually incremented the middle digit! :)
The two key reasons for this unprecedented change were the new input
interface, and the broken binary compatibility of modules due to the
versioning support.

Following is a description of the new input mechanism.  For a full
list of changes in PHP 4.1.0, scroll down to the end of this section.

-----------------------------------

SECURITY:  NEW INPUT MECHANISM

First and foremost, it's important to stress that regardless of
anything you may read in the following lines, PHP 4.1.0 *supports*
the old input mechanisms from older versions.  Old applications
should go on working fine without modification!

Now that we have that behind us, let's move on :)

For various reasons, PHP setups which rely on register_globals 
being on (i.e., on form, server and environment variables becoming 
a part of the global namespace, automatically) are very often 
exploitable to various degrees.  For example, the piece of code:

&lt;?php
if (authenticate_user()) {
  $authenticated = true;
}
...
?&gt;

May be exploitable, as remote users can simply pass on 'authenticated'
as a form variable, and then even if authenticate_user() returns false,
$authenticated will actually be set to true.  While this looks like a
simple example, in reality, quite a few PHP applications ended up being
exploitable by things related to this misfeature.

While it is quite possible to write secure code in PHP, we felt that the
fact that PHP makes it too easy to write insecure code was bad, and we've
decided to attempt a far-reaching change, and deprecate register_globals.
Obviously, because the vast majority of the PHP code in the world relies
on the existence of this feature, we have no plans to actually remove it
from PHP anytime in the foreseeable future, but we've decided to encourage
people to shut it off whenever possible.  

To help users build PHP applications with register_globals being off,
we've added several new special variables that can be used instead of the
old global variables.  There are 7 new special arrays:

$_GET - contains form variables sent through GET
$_POST - contains form variables sent through POST
$_COOKIE - contains HTTP cookie variables
$_SERVER - contains server variables (e.g., REMOTE_ADDR)
$_ENV - contains the environment variables
$_REQUEST - a merge of the GET variables, POST variables and Cookie variables.
            In other words - all the information that is coming from the user,
            and that from a security point of view, cannot be trusted.
$_SESSION - contains HTTP variables registered by the session module

Now, other than the fact that these variables contain this special information,
they're also special in another way - they're automatically global in any
scope.  This means that you can access them anywhere, without having to
'global' them first.  For example:

function example1()
{
	print $_GET["name"];   // works, 'global $_GET;' is not necessary!
}

would work fine!  We hope that this fact would ease the pain in migrating
old code to new code a bit, and we're confident it's going to make writing
new code easier.  Another neat trick is that creating new entries in the
$_SESSION array will automatically register them as session variables, as
if you called session_register().  This trick is limited to the session
module only - for example, setting new entries in $_ENV will *not* perform
an implicit putenv().

PHP 4.1.0 still defaults to have register_globals set to on.  It's a
transitional version, and we encourage application authors, especially
public ones which are used by a wide audience, to change their applications
to work in an environment where register_globals is set to off.  Of course,
they should take advantage of the new features supplied in PHP 4.1.0 that
make this transition much easier.
 
As of the next semi-major version of PHP, new installations of PHP will
default to having register_globals set to off.  No worries!  Existing
installations, which already have a php.ini file that has register_globals
set to on, will not be affected.  Only when you install PHP on a brand new
machine (typically, if you're a brand new user), will this affect you, and
then too - you can turn it on if you choose to.

Note:  Some of these arrays had old names, e.g. $HTTP_GET_VARS.  These names
still work, but we encourage users to switch to the new shorter, and
auto-global versions.

Thanks go to Shaun Clowes (shaun@securereality.com.au) for pointing out this
problem and for analyzing it.

-------------------------------------

FULL LIST OF CHANGES

10 Dec 2001, Version 4.1.0
- Worked around a bug in the MySQL client library that could cause PHP to hang
  when using unbuffered queries. (Zeev)
- Fixed a bug which caused set_time_limit() to affect all subsequent requests
  to running Apache child process. (Zeev)
- Removed the sablotron extension in favor of the new XSLT extension.
  (Sterling)
- Fixed a bug in WDDX deserialization that would sometimes corrupt the root
  element if it was a scalar one. (Andrei)
- Make ImageColorAt() and ImageColorsForIndex() work with TrueColor images.
  (Rasmus)
- Fixed a bug in preg_match_all() that would return results under improper 
  indices in certain cases. (Andrei)
- Fixed a crash in str_replace() that would happen if search parameter was an
  array and one of the replacements resulted in subject string being empty.
  (Andrei)
- Fixed MySQL extension to work with MySQL 4.0. (Jani)
- Fixed a crash bug within Cobalt systems. Patch by tomc@tripac.com. (Jani)
- Bundled Dan Libby's xmlrpc-epi extension.
- Introduced extension version numbers. (Stig)
- Added version_compare() function. (Stig)
- Fixed pg_last_notice() (could cause random crashes in PostgreSQL
  applications, even if they didn't use pg_last_notice()). (Zeev)
- Fixed DOM-XML's error reporting, so E_WARNING errors are given instead of
  E_ERROR error's, this allows you to trap errors thrown by DOMXML functions.
  (Sterling)
- Fixed a bug in the mcrypt extension, where list destructors were not
  properly being allocated. (Sterling)
- Better Interbase blob, null and error handling. (Patch by Jeremy Bettis)
- Fixed a crash bug in array_map() if the input arrays had string or
  non-sequential keys. Also modified it so that if a single array is passed,
  its keys are preserved in the resulting array. (Andrei)
- Fixed a crash in dbase_replace_record. (Patch by robin.marlow@dps-int.com)
- Fixed a crash in msql_result(). (Zeev)
- Added support for single dimensional SafeArrays and Enumerations.
  Added an is_enum() function to check if a component implements an
  enumeration. (Alan, Harald)
- Fixed a bug in dbase_get_record() and dbase_get_record_with_names().
  boolean fields are now returned correctly.
  Patch by Lawrence E. Widman <widman@cardiothink.com> (Jani)
- Added --version option to php-config. (Stig)
- Improved support for thttpd-2.21b by incorporating patches for all known
  bugs. (Sascha)
- Added ircg_get_username, a roomkey argument to ircg_join, error fetching
  infrastructure, a tokenizer to speed up message processing, and fixed
  a lot of bugs in the IRCG extension. (Sascha)
- Improved speed of the serializer/deserializer. (Thies, Sascha)
- Floating point numbers are better detected when converting from strings.
  (Zeev, Zend Engine)
- Replaced php.ini-optimized with php.ini-recommended.  As the name implies,
  it's warmly recommended to use this file as the basis for your PHP
  configuration, rather than php.ini-dist.  (Zeev)
- Restore xpath_eval() and php_xpathptr_eval() for 4.0.7. There
  are still some known leaks. (Joey)
- Added import_request_variables(), to allow users to safely import form
  variables to the global scope (Zeev)
- Introduced a new $_REQUEST array, which includes any GET, POST or COOKIE
  variables.  Like the other new variables, this variable is also available
  regardless of the context.  (Andi & Zeev)
- Introduced $_GET, $_POST, $_COOKIE, $_SERVER and $_ENV variables, which
  deprecate the old $HTTP_*_VARS arrays.  In addition to be much shorter to
  type - these variables are also available regardless of the scope, and 
  there's no need to import them using the 'global' statement.  (Andi & Zeev)
- Added vprintf() and vsprintf() functions that allow passing all arguments
  after format as an array. (Andrei)
- Added support for GD2 image type for ImageCreateFromString() (Jani)
- Added ImageCreateFromGD(), ImageCreateFromGD2(), ImageCreateFromGD2part(),
  ImageGD() and ImageGD2() functions (Jani)
- addcslashes now warns when charlist is invalid. The returned string
  remained the same (Jeroen)
- Added optional extra argument to gmp_init(). The extra argument
  indicates which number base gmp should use when converting a
  string to the gmp-number. (Troels)
- Added the Cyrus-IMAP extension, which allows a direct interface to Cyrus' 
  more advanced capabilities. (Sterling)
- Enhance read_exif_data() to support multiple comment tags (Rasmus)
- Fixed a crash bug in array_map() when NULL callback was passed in. (Andrei)
- Change from E_ERROR to E_WARNING in the exif extension (Rasmus)
- New pow() implementation, which returns an integer when possible,
  and warnings on wrong input (jeroen)
- Added optional second parameter to trim, chop and ltrim. You can
  now specify which characters to trim (jeroen)
- Hugely improved the performance of the thread-safe version of PHP, especially
  under Windows (Andi & Zeev) 
- Improved request-shutdown performance significantly (Andi & Zeev, Zend
  Engine)
- Added a few new math functions. (Jesus)
- Bump bundled expat to 1.95.2 (Thies)
- Improved the stability of OCIPlogon() after a database restart. (Thies)
- Fixed __FILE__ in the CGI & Java servlet modes when used in the main script.
  It only worked correctly in included files before this fix (Andi)
- Improved the Zend hash table implementation to be much faster (Andi, Zend
  Engine)
- Updated PHP's file open function (used by include()) to check in the calling
  script's directory in case the file can't be found in the include_path (Andi)
- Fixed a corruption bug that could cause constants to become corrupted, and
  possibly prevent resources from properly being cleaned up at the end of
  a request (Zeev)
- Added optional use of Boyer-Moore algorithm to str_replace() (Sascha)
- Fixed and improved shared-memory session storage module (Sascha)
- Add config option (always_populate_raw_post_data) which when enabled
  will always populate $HTTP_RAW_POST_DATA regardless of the post mime
  type (Rasmus)
- Added support for socket and popen file types to ftp_fput (Jason)
- Fixed various memory leaks in the LDAP extension (Stig Venaas)
- Improved interactive mode - it is now available in all builds of PHP, without
  any significant slowdown (Zeev, Zend Engine)
- Fixed crash in iptcparse() if the supplied data was bogus. (Thies)
- Fixed return value for a failed snmpset() - now returns false  (Rasmus)
- Added hostname:port support to snmp functions (nbougues@axialys.net, Rasmus)
- Added fdf_set_encoding() function (Masaki YATSU, Rasmus)
- Reversed the destruction-order of resources.  This fixes the reported OCI8 
  "failed to rollback outstanding transactions!" message (Thies, Zend Engine)
- Added option for returning XMLRPC fault packets. (Matt Allen, Sascha
  Schumann)
- Improved range() function to support range('a','z') and range(9,0) types of
  ranges. (Rasmus)
- Added getmygid() and safe_mode_gid ini directive to allow safe mode to do
  a gid check instead of a uid check. (James E. Flemer, Rasmus)
- Made assert() accept the array(&$obj, 'methodname') syntax. (Thies)
- Made sure that OCI8 outbound variables are always zero-terminated. (Thies)
- Fixed a bug that allowed users to spawn processes while using the 5th
  parameter to mail(). (Derick)
- Added nl_langinfo() (when OS provides it) that returns locale.
- Fixed a major memory corruption bug in the thread safe version. (Zeev)
- Fixed a crash when using the CURLOPT_WRITEHEADER option. (Sterling)
- Added optional suffix removal parameter to basename(). (Hartmut)
- Added new parameter UDM_PARAM_VARDIR ha in Udm_Set_Agent_Param() function to
  support alternative search data directory.  This requires mnogoSearch 3.1.13
  or later.
- Fixed references in sessions. This doesn't work when using the WDDX
  session-serializer. Also improved speed of sessions. (Thies)
- Added new experimental module pcntl (Process Control). (Jason)
- Fixed a bug when com.allow_dcom is set to false. (phanto)
- Added a further parameter to the constructor to load typelibs from file when
  instantiating components (e.g. DCOM Components without local registration).
  (phanto)
- Added the possibility to specify typelibs by full name in the typelib file
  (Alan Brown)
- Renamed the ZZiplib extension to the Zip extension, function names have also
  changed accordingly, functionality, has stayed constant. (Sterling)
- Made the length argument (argument 2) to pg_loread() optional, if not
  specified data will be read in 1kb chunks. (Sterling)
- Added a third argument to pg_lowrite() which is the length of the data to
  write. (Sterling)
- Added the CONNECTION_ABORTED, CONNECTION_TIMEOUT and CONNECTION_NORMAL
  constants. (Zak)
- Assigning to a string offset beyond the end of the string now automatically
  increases the string length by padding it with spaces, and performs the
  assignment. (Zeev, Zend Engine)
- Added warnings in case an uninitialized string offset is read. (Zeev, Zend
  Engine)
- Fixed a couple of overflow bugs in case of very large negative integer
  numbers. (Zeev, Zend Engine)
- Fixed a crash bug in the string-offsets implementation (Zeev, Zend Engine)
- Improved the implementation of parent::method_name() for classes which use
  run-time inheritance. (Zeev, Zend Engine)
- Added 'W' flag to date() function to return week number of year using ISO
  8601 standard. (Colin)
- Made the PostgreSQL driver do internal row counting when iterating through
  result sets. (gvz@2scale.net)
- Updated ext/mysql/libmysql to version 3.23.39; Portability fixes, minor
  bug fixes. (tim@mysql.com)
- Added get_defined_constants() function to return an associative array of
  constants mapped to their values. (Sean)
- New mailparse extension for parsing and manipulating MIME mail. (Wez)
- Define HAVE_CONFIG_H when building standalone DSO extensions. (Stig)
- Added the 'u' modifier to printf/sprintf which prints unsigned longs.
  (Derick)
- Improved IRIX compatibility. (Sascha)
- Fixed crash bug in bzopen() when specifying an invalid file. (Andi)
- Fixed bugs in the mcrypt extension that caused crashes. (Derick)
- Added the IMG_ARC_ROUNDED option for the ImageFilledArc() function, which
  specified that the drawn curve should be rounded. (Sterling)
- Updated the sockets extension to use resources instead of longs for the
  socket descriptors.  The socket functions have been renamed to conform with
  the PHP standard instead of their C counterparts.  The sockets extension is 
  now usable under Win32. (Daniel)
- Added disk_total_space() to return the total size of a filesystem.
  (Patch from Steven Bower)
- Renamed diskfreespace() to disk_free_space() to conform to established
  naming conventions. (Jon)
- Fixed #2181. Now zero is returned instead of an unset value for
  7-bit encoding and plain text body type. (Vlad)
- Fixed a bug in call_user_*() functions that would not allow calling
  functions/methods that accepted parameters by reference. (Andrei)
- Added com_release($obj) and com_addref($obj) functions and the related class
  members $obj->Release() and $obj->AddRef() to gain more control over the used
  COM components. (phanto)
- Added an additional parameter to dotnet_load to specify the codepage (phanto)
- Added peak memory logging. Use --enable-memory-limit to create a new Apache
  1.x logging directive "{mod_php_memory_usage}n" which will log the peak
  amount of memory used by the script. (Thies)
- Made fstat() and stat() provide identical output by returning a numerical and
  string indexed array. (Jason)
- Fixed memory leak upon re-registering constants. (Sascha, Zend Engine)

-----------------------------------

Zeev
</pre>


<?php commonFooter(); ?>
