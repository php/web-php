<?
require("shared.inc");
commonHeader("PHP: Hypertext Preprocessor");
?>

<h3>PHP 3.0.4 build problems</h3>
<P>
<b>BSD/OS and AIX users:</b>
There is a small error in the 3.0.4 configure script which affects some
versions of BSD/OS and AIX.  If you get an error about <i>u_int</i> being 
redefined when you build PHP replace your php-3.0.4/configure script with 
<a href="http://ca.php.net/configure.gz">this file</a> and re-run configure.
</P>
<P>
<b>IRIX, Solaris and perhaps other users:</b>
If you're experiencing trouble compiling functions/basic_functions.c, please
get an updated file <a href="http://il.php.net/basic_functions.c.gz">here</a>,
and replace the one in your distribution with it.  The file included in
the distribution contained a couple of non ANSI-C conforming statements, that
confuse some compilers.  If you didn't have any problem compiling PHP 3.0.4,
there's no need to download this update!
</P>

<h3>PHP 3.0.4 has been released</h3>
<P>
Have a look at the <a href="ChangeLog.php3">ChangeLog</a> to see
what is new in this release. All users of earlier versions are encouraged 
to upgrade to this version.  
</P>

<h3>PHP in the News</h3>
<P>
A new online newsletter/magazine has two very nice stories about PHP 
this month.  Check out <a href="http://io.incluso.com">http://io.incluso.com</a>.
</P>

<h3>What is PHP?</h3>
<P>
PHP 3.0 is a server-side HTML embedded scripting language and it is a
complete rewrite of the popular PHP/FI 2.0 language.
This rewrite is faster, more robust and uses less
memory than version 2.  All users of version 2 are encouraged to
upgrade.
</P>
<P>
If you are new to PHP, a good place to start discovering the power of
this language is by clicking on the &quot;Source&quot; button in the
top right corner of all the pages on this site.  What you see is the
actual PHP files that are behind each of the pages you are looking at.
</P>

<h3>So, how much does it cost?</h3>
<P>
This may sound a little foreign to all you folks coming from a non-Unix
background, but PHP doesn't cost anything.  You can use it for commercial
and/or non-commercial use all you want.  You can give it to your friends,
print it out and hang it on your wall or eat it for lunch.  Welcome to
the world of <a href="http://www.opensource.org">Open Source</a> software!  
Smile, be happy, the world is good.  For the full legalese, see the 
official <a href="license.html">license</a>.
</P>

<h3><a href="old_news.php3">Older news</a></h3>

<?
commonFooter();
?>

