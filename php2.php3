<?require "shared.inc";
  commonHeader("Building Apache 1.3.0 with PHP/FI 2.0 and PHP 3.0 modules");
?>
<b>Recipe for building php-2.0.1 with Apache-1.3.0 and PHP 3.0</b>
<P>
First make sure you have the current source tarballs for all three packages.

Start in the Apache directory:
<PRE>cd apache_1.3.0/src
./Configure</PRE> 

This is done so that a couple of auto-generated header files will be there
when you configure PHP 3.0.<P>

Next, follow the standard installation directions for PHP 3.0.  Something like:
<PRE>cd php-3.0
./configure --with-apache=../apache_1.3.0
make
make install</PRE>

Now the tricky part.  PHP/FI 2.0 was written long before Apache-1.3.0 was released, so 
it isn't quite a smooth as it could be.  There is a bug in mod_php.module.in.  The
trailing <b>&quot;</b> is missing.  Edit this file and add that.  Then run the
<b>./install</b> program.

During the install it asks you for the Apache include directory.  It will be something
like <i>&lt;path&gt;/apache_1.3.0/src/include</i>.  After the install program has finished you will need 
to edit 3 files.  First, edit <b>src/php.h</b> and down around line 95 you will find a line that
says:
<PRE>#include "httpd.h"</PRE>
Just before this line, add a line that says:
<PRE>#include "compat.h"</PRE>

Do the same thing in <i>mod_php.c</i>.  Just before the <b>#include &quot;httpd.h&quot;</b> line add
<b>#include &quot;compat.h&quot;</b><P>

The third file you need to edit is <b>src/Makefile</b>.  On the CPPFLAGS line around line 47
you will see a line which among other things has a -I followed by the Apache include directory 
you specified earlier.  Add another -I entry with the same path but instead of ending in
<i>src/include</i> it needs to end in <i>src/os/unix</i>.  For example, on my system this line
looks like this after fixing it:
<PRE>CPPFLAGS = -I./regex -I. -I/usr/local/include/mysql -DHAVE_LIBMYSQL=1 \
-I/export/home/rasmus/apache_1.3.0/src/include -I/export/home/rasmus/apache_1.3.0/src/os/unix \
-DFILE_UPLOAD -DAPACHE=1 -DAPACHE_NEWAPI=1 -DPHPSENDMAIL=1 -DSENDMAIL=\""/var/qmail/bin/sendmail -t"\" \
$(DEBUG)</PRE>

Now you can run <b>make</b>.  It will copy a bunch of files to the Apache src/include directory when it is
finished.  That is the wrong place for these files.  You should copy <i>libphp.a</i> and <i>mod_php.*</i> to
the Apache <i>src/modules/extra</i> directory.<P>

Back to the apache_1.3.0/src directory.  Edit the <b>Configuration</b> file and at the
end add these two lines:

<PRE>AddModule modules/php3/libphp3.a
AddModule modules/extra/mod_php.o</PRE>

The type: <b>./Configure</b> followed by <b>make</b> and you should end up with an httpd binary
that includes both the PHP/FI 2.0 and the PHP 3.0 module.  You can then set your AddType lines in src.conf to
poing <i>.phtml</i> files at PHP/FI 2.0 and </i>.php3</i> files at PHP 3.0, for example.  
<PRE>AddType application/x-httpd-php .phtml
AddType application/x-httpd-php3 .php3</PRE>

<?commonFooter()?>
