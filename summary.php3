<?
require("shared.inc");
commonHeader("PDM Technical Summary");
?>
<h3>PDM Technical Summary</h3>

<p>The PHP Developers' Meeting was held at the Tel Aviv Hilton in Israel from January 20-24, 2000.  
The following people attended:</p>
<ul>
<li> Thies C. Arntzen, CTO of Digital Collections in Hamburg Germany 
<li> David Axmark, CEO of MySQL in Uppsala Sweden 
<li> Stig Bakken, Systems Engineer for FAST Search and Transfer ASA of Trondheim Norway 
<li> Andi Gutmans CTO of Zend Technologies, Ltd. in Ramat Gan Israel 
<li> David Hahn, CEO of ISPI of Lincoln, Nebraska, USA 
<li> Frank Kromann, VP Development of Swwwing A/S in Hellerup Denmark 
<li> Rasmus Lerdorf, Senior OpenSource Researcher of Linuxcare Inc. in San Francisco, California, USA
<li> Sascha Schumann, Independent Programmer in Germany 
<li> Zeev Suraski, CTO of Zend Technologies, Ltd. in Ramat Gan Israel 
<li> Colin Viebrock, Senior Developer of easyDNS of Toronto, Ontario Canada 
<li> Michael Widenius, CTO of MySQL in Uppsala Sweden 
<li> Andrei Zmievski, Sr.Internet Developer of ISPI of Lincoln Nebraska, USA 
</ul>

<p>The main technical discussions revolved around what is required to get the production release PHP Version 4.0 out the door.  </p>

<b>Not Required before release</b>
<dl>
<dt> Announce snapshots 
<dd> Create snaps.php.net site where Sascha's daily snapshots will be available
<dt> Automated Windows build 
<dd> It would be interesting to be able to include snapshot Windows builds as well.  In order
to do this we need an automated way of building the Windows version.  Monty and Andi both had
some ideas on this and we will see what comes out of it.
<dt> Status of multibyte support?
<dd> Everyone is interested in UTF-8 support in PHP, but none of us are really clear on how to
approach the problem.  We need to get a better understanding of all the issues and find someone
who has a handle on the problem.
<dt> Combined TSRM fetch 
<dd> Thies brought up a way to optimize TSRM fetches by combining structs.  Perhaps something to
add in 4.01
<dt> Tru64 Text box is needed
<dd> Monty indicated that he will soon have a Tru64 box on the Net and he will provide us with access
<dt> Example clean extension (Stig)
<dd> Stig volunteered to write an example PHP 4 extension which outlines in a clean manner how people
should write PHP 4 extensions.  This is the first step towards complete API documentation.
<dt> Complete API documentation
<dd> The extension API needs to be documented at some point.  
</dl>

<b>Required before 4.0</b>
<dl>
<dt> Robust Apache and CGI versions
<dd> PHP 4.0 will not be released with any known serious bugs in neither the Apache nor the CGI
version.  Other server interfaces are of course important, but not critical to the initial release.
<dt> Document known working Windows config (Andi)
<dd> We have had reports of ISAPI problems on Windows and have been having trouble reproducing some
of them.  It is felt that having a known working Windows configuration would be beneficial.  That is,
the exact Windows version. SP-level, winsock version, etc. 
<dt> Figure out Linux-SMP issue (error logging - autoconf) (Thies)
<dd> We have had reports of very strange crashes on Linux.  It is as if signals are being delivered
randomly to processes.  Thies is going to add some more error logging to collect more data on this problem
and it might lead to an autoconf check for certain Linux kernels if SMP is detected.  The theory is that
this is a Linux kernel bug related to SMP.
<dt> get_module issues (look at loading debug extensions) Rename symbol + add version (Thies)
<dd> We need to add some logic to the get_module code along with renaming the symbol to be able to
check that we are loading compatible extensions.  There might be a way to be able to load an extensions
compiled in debug mode into a non-debug server which could be handy. 
<dt> Fix foreach to support references (Andi)
<dd> The original thought was to remove it for 4.0, but Andi sat down and fixed it so the semantics of it
are now right.  The function is still no speed-deamon and this will be addressed later, but it is at least
able to traverse an array without copying every element now.
<dt> Ticks (Zeev and Stig)
<dd> A cool feature dreamed up by Stig, Thies, Zeev and Andi.  It lets you mark a block of code that will
effectively be time-sliced such that a callback can be called if a pre-determined condition arises.
<dt> String offsets (Andi)
<dd> Add $string{offset} syntax to fix ambiguity
<dt> Zend license grant (Zend)
<dd> Need an official license grant from Zend Tech to the new PHP Organization which lays out the terms
of PHP's usage of the Zend engine.
<dt> PHP unrestricted non-exclusive clause (Rasmus)
<dd> The license grant may supercede the need for this clause - will have a look at that.
<dt> Complete beta4 cycle
<dd> It was agreed by all that we need a Beta4 release soon.  
<dt> ext/apache move to SAPI (Andrei)
<dd> Andrei will move the ext/apache code to SAPI where it belongs
<dt> look for other SAPI issues (Rasmus and Zeev)
<dd> It is important to get rid of all server-specific checks in the code and move them all into the SAPI
abstraction layer to make sure that people can load the same binary extensions into whatever type of PHP
framework they may be running.
<dt> PEAR/PFC include path (Stig)
<dd> Stig is going to fiddle with the default include path so PEAR/PFC packages will be found automatically
in a default installation.
<dt> PEAR/PFC Formalization (Stig)
<dd> The PEAR/PFC framework needs to be finalized.  It was agreed that we need to track the Author, maintainer account, 
aliases, dependencies including versions for each PEAR/PFC package.
<dt> Take a look at removing plist from every call (Zeev/Andi)
<dd> Another Thies-optimization that Zeev and Andi promised to have a look at
<dt> Take a look at genfuncsummary (Rasmus)
<dd> Rasmus will fix the genfuncsummary and related scripts so we can generate full function summaries
for PHP 4 the same way we currently do for PHP 3.
<dt> Clean up cvs (Thies)
<dd> Thies volunteered to get rid of old crud cluttering up our CVS tree.
<dt> "make test" for PHP 4 (Rasmus)
<dd> Rasmus will try to get "make test" working in PHP 4.  The goal is to expand the framework and to formalize
the procedures for adding test cases and to perhaps tie it into the bug database system somehow so people can
submit test cases with their bug reports.
<dt> Add MySQL client code (Monty)
<dd> Once Monty is set up with a CVS account he will be adding the MySQL client code to the PHP source tree.
This will mean that PHP will be able to speak to MySQL servers right out of the box without any need for users
to install the MySQL client libraries.
<dt> Date-window mktime() (Sascha)
<dd> It was decided that it makes sense to date-window mktime() such that a year argument of 10, for 
example, translates to 2010 and not 1910.
</dl>

<b>Future Features</b>
<dl>
<dt> php-rpc server
<dd> Stig has been talking about a backend php request server for a while now.  It would allow
db connection pooling and all sorts of other cool features.  We discussed various ways of implementing
this, but no solid action items came out of it.
<dt> Shared MT resource pool 
<dd> In MT mode it would be cool to be able to share resources across threads.  Something we will be 
looking at in a future version.
<dt> Finer granularity session variable locking
<dd> Currently the PHP 4 session variables are locked on a per-request basis.  It was suggested that it
would be good to be able to indicate which variables should be locked instead of just locking them all.
I am not sure Sascha was completely convinced, but it is something we will look at for a future version.
<dt> Template engine
<dd> Andrei would like a better framework for creating template systems with PHP.  We discussed a number
of ways of doing this with the favourite being a simple pre-processor pass which would run before the
main Zend engine kicks in.  Andrei is setting up a mailing list to discuss the implementation.
<dt> Request startup optimization
<dd> There may be some optimization related to module initialization on request startup.  A lot of ideas 
were bounced around and something is likely to sneak into a future version.
<dt> Namespaces
<dd> Stig would really like to have namespaces at some point.  It was discussed and it might be possible in 
a future version.
<dt> Swig Support
<dd> It would be really cool to have Swig support.  Andrei and Rasmus have both had a look at it and 
got spooked by the apparent complexity.  Perhaps the Swig people can help us out a bit here.
<dt> Midgard patches?
<dd> Figure out what sort of customizations Midgard had to make and see if we can roll them into a future
version of PHP.
</dl>

<? commonFooter(); ?>
