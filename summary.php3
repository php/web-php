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

<p>The main technical discussions revolved around what is required to get the production release of PHP Version 4.0 out the door.  </p>

<h3><u>Not Required before release</u></h3>
<dl>
<dt> <b>Announce snapshots</b>
<dd> Create snaps.php.net site where Sascha's daily snapshots will be available<p>
<dt> <b>Automated Windows build</b>
<dd> It would be interesting to be able to include snapshot Windows builds as well.  In order
to do this we need an automated way of building the Windows version.  Monty and Andi both had
some ideas on this and we will see what comes out of it.<p>
<dt> <b>Status of multibyte support?</b>
<dd> Everyone is interested in UTF-8 support in PHP, but none of us are really clear on how to
approach the problem.  We need to get a better understanding of all the issues and find someone
who has a handle on the problem.<p>
<dt> <b>Combined TSRM fetch</b>
<dd> Thies brought up a way to optimize TSRM fetches by combining structs.  Perhaps something to
add in 4.01<p>
<dt> <b>Tru64 Text box is needed</b>
<dd> Monty indicated that he will soon have a Tru64 box on the Net and he will provide us with access<p>
<dt> <b>Example clean extension (Stig)</b>
<dd> Stig volunteered to write an example PHP 4 extension which outlines in a clean manner how people
should write PHP 4 extensions.  This is the first step towards complete API documentation.<p>
<dt> <b>Complete API documentation</b>
<dd> The extension API needs to be documented at some point.  <p>
</dl>

<h3><u>Required before 4.0</u></h3>
<dl>
<dt> <b>Robust Apache and CGI versions</b>
<dd> PHP 4.0 will not be released with any known serious bugs in neither the Apache nor the CGI
version.  Other server interfaces are of course important, but not critical to the initial release.<p>
<dt> <b>Document known working Windows config (Andi)</b>
<dd> We have had reports of ISAPI problems on Windows and have been having trouble reproducing some
of them.  It is felt that having a known working Windows configuration would be beneficial.  That is,
the exact Windows version. SP-level, winsock version, etc. <p>
<dt> <b>Figure out Linux-SMP issue (error logging - autoconf) (Thies)</b>
<dd> We have had reports of very strange crashes on Linux.  It is as if signals are being delivered
randomly to processes.  Thies is going to add some more error logging to collect more data on this problem
and it might lead to an autoconf check for certain Linux kernels if SMP is detected.  The theory is that
this is a Linux kernel bug related to SMP.<p>
<dt> <b>get_module issues (look at loading debug extensions) Rename symbol + add version (Thies)</b>
<dd> We need to add some logic to the get_module code along with renaming the symbol to be able to
check that we are loading compatible extensions.  There might be a way to be able to load an extensions
compiled in debug mode into a non-debug server which could be handy. <p>
<dt> <b>Fix foreach to support references (Andi)</b>
<dd> The original thought was to remove it for 4.0, but Andi sat down and fixed it so the semantics of it
are now right.  The function is still no speed-deamon and this will be addressed later, but it is at least
able to traverse an array without copying every element now.<p>
<dt> <b>Ticks (Zeev and Stig)</b>
<dd> A cool feature dreamed up by Stig, Thies, Zeev and Andi.  It lets you mark a block of code that will
effectively be time-sliced such that a callback can be called if a pre-determined condition arises.<p>
<dt> <b>String offsets (Andi)</b>
<dd> Add $string{offset} syntax to fix ambiguity<p>
<dt> <b>Zend license grant (Zend)</b>
<dd> Need an official license grant from Zend Tech to the new PHP Organization which lays out the terms
of PHP's usage of the Zend engine.<p>
<dt> <b>PHP unrestricted non-exclusive clause (Rasmus)</b>
<dd> The license grant may supercede the need for this clause - will have a look at that.<p>
<dt> <b>Complete beta4 cycle</b>
<dd> It was agreed by all that we need a Beta4 release soon.  <p>
<dt> <b>ext/apache move to SAPI (Andrei)</b>
<dd> Andrei will move the ext/apache code to SAPI where it belongs<p>
<dt> <b>look for other SAPI issues (Rasmus and Zeev)</b>
<dd> It is important to get rid of all server-specific checks in the code and move them all into the SAPI
abstraction layer to make sure that people can load the same binary extensions into whatever type of PHP
framework they may be running.<p>
<dt> <b>PEAR/PFC include path (Stig)</b>
<dd> Stig is going to fiddle with the default include path so PEAR/PFC packages will be found automatically
in a default installation.<p>
<dt> <b>PEAR/PFC Formalization (Stig)</b>
<dd> The PEAR/PFC framework needs to be finalized.  It was agreed that we need to track the Author, maintainer account, 
aliases, dependencies including versions for each PEAR/PFC package.<p>
<dt> <b>Take a look at removing plist from every call (Zeev/Andi)</b>
<dd> Another Thies-optimization that Zeev and Andi promised to have a look at<p>
<dt> <b>Take a look at genfuncsummary (Rasmus)</b>
<dd> Rasmus will fix the genfuncsummary and related scripts so we can generate full function summaries
for PHP 4 the same way we currently do for PHP 3.<p>
<dt> <b>Clean up cvs (Thies)</b>
<dd> Thies volunteered to get rid of old crud cluttering up our CVS tree.<p>
<dt> <b>"make test" for PHP 4 (Rasmus)</b>
<dd> Rasmus will try to get "make test" working in PHP 4.  The goal is to expand the framework and to formalize
the procedures for adding test cases and to perhaps tie it into the bug database system somehow so people can
submit test cases with their bug reports.<p>
<dt> <b>Add MySQL client code (Monty)</b>
<dd> Once Monty is set up with a CVS account he will be adding the MySQL client code to the PHP source tree.
This will mean that PHP will be able to speak to MySQL servers right out of the box without any need for users
to install the MySQL client libraries.<p>
<dt> <b>Date-window mktime() (Sascha)</b>
<dd> It was decided that it makes sense to date-window mktime() such that a year argument of 10, for 
example, translates to 2010 and not 1910.<p>
</dl>

<h3><u>Future Features</u></h3>
<dl>
<dt> <b>php-rpc server</b>
<dd> Stig has been talking about a backend php request server for a while now.  It would allow
db connection pooling and all sorts of other cool features.  We discussed various ways of implementing
this, but no solid action items came out of it.<p>
<dt> <b>Shared MT resource pool </b>
<dd> In MT mode it would be cool to be able to share resources across threads.  Something we will be 
looking at in a future version.<p>
<dt> <b>Finer granularity session variable locking</b>
<dd> Currently the PHP 4 session variables are locked on a per-request basis.  It was suggested that it
would be good to be able to indicate which variables should be locked instead of just locking them all.
I am not sure Sascha was completely convinced, but it is something we will look at for a future version.<p>
<dt> <b>Template engine</b>
<dd> Andrei would like a better framework for creating template systems with PHP.  We discussed a number
of ways of doing this with the favourite being a simple pre-processor pass which would run before the
main Zend engine kicks in.  Andrei is setting up a mailing list to discuss the implementation.<p>
<dt> <b>Request startup optimization</b>
<dd> There may be some optimization related to module initialization on request startup.  A lot of ideas 
were bounced around and something is likely to sneak into a future version.<p>
<dt> <b>Namespaces</b>
<dd> Stig would really like to have namespaces at some point.  It was discussed and it might be possible in 
a future version.<p>
<dt> <b>Swig Support</b>
<dd> It would be really cool to have Swig support.  Andrei and Rasmus have both had a look at it and 
got spooked by the apparent complexity.  Perhaps the Swig people can help us out a bit here.<p>
<dt> <b>Midgard patches?</b>
<dd> Figure out what sort of customizations Midgard had to make and see if we can roll them into a future
version of PHP.<p>
</dl>

<? commonFooter(); ?>
