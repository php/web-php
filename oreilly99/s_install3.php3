<?php require "header.inc"?>
<H1>Installation</H1>

<h2>PHP (as an Apache DSO)</h2>
<ul>
<li>Get and untar the latest PHP tarball from www.php.net
<li><tt>./configure -with-apxs=/usr/sbin/apxs -with-mysql</tt>
<li><tt>make</tt>
<li><tt>make install</tt>
<li>Edit /etc/httpd/conf/httpd.conf and make sure you have:
<?example('AddType application/x-httpd-php3 .php3')?><font size=+4>
<li>For PHP Version 4 you need:</font>
<?example('AddType application/x-httpd-php .php')?><font size=+4>
<li><tt>apachectl start</tt></font>
</ul>

<?php require "footer.inc"?>
