<?
require("shared.inc");
commonHeader("Migrating from PHP 3.0 to PHP 4.0");
?>

<p>&nbsp;</p>
<p>Migration from PHP 3.0 to PHP 4.0 is relatively easy, and should not require
you to change your code in any way.&nbsp; There are minor incompatibilities
between the two versions;&nbsp; You may want to check the <a href="incompatibilities.php">incompatibilities
list</a> to make sure that you're indeed not affected by them (the chances
you're affected by these incompatibilities are extremely slim).</p>
<p>&nbsp;</p>
<h2>Running PHP 3.0 and PHP 4.0 concurrently</h2>
<p>Many of you are probably interested to know whether it's possible to run both
PHP 3.0 and PHP 4.0 in the same server, for the duration of the transition
period.&nbsp; Well, the simple answer is that you can't.&nbsp; PHP 3.0 and PHP
4.0 share a lot of common code (not in the language itself, but in the module
code) and for many technical reasons, compiling the two versions into the same
server is not possible.&nbsp; We don't expect this to change in future betas or
the final release.</p>
<p>However, this shouldn't have too much impact on you, for two reasons:</p>
<ol>
  <li>The close to 100% compatibility PHP 4.0 features mean that most chances
    are that your web site would run with PHP 4.0 without requiring any
    additional work on your side.&nbsp; Note that PHP 4.0 Beta 1 is, as its name
    implies, still a beta, so there'll probably be bugs - don't try PHP 4.0 Beta
    1 on your production web site before testing it offline on a different
    machine or port!</li>
  <li>If you're still not sure, and want to slowly migrate from PHP 3.0 to PHP
    4.0 - you can run PHP 4.0 as a server module, and PHP 3.0 as a CGI binary
    (or vice versa).</li>
</ol>
<p>&nbsp;</p>
<h2>Migrating Configuration Files</h2>
<h3>Global Configuration File</h3>
<p>The global configuration file, <b>php3.ini</b>, has changed its name to <b>php.ini</b>.</p>
<p>&nbsp;</p>
<h3>Apache Configuration Files</h3>
<p>The MIME types recognized by the PHP module have changed:</p>
<p>application/x-httpd-php3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
--&gt;&nbsp;&nbsp;&nbsp; application/x-httpd-php</p>
<p>application/x-httpd-php3-source&nbsp;&nbsp;&nbsp; --&gt;&nbsp;&nbsp;&nbsp; application/x-httpd-php-source</p>
<p>You can make your configuration files work with both versions of PHP
(depending on which one is currently compiled into the server), using the
following syntax:<br>
<pre>
<IfModule mod_php3.c>
AddType  application/x-httpd-php3        .php3
AddType  application/x-httpd-php3-source .phps
</IfModule>
<IfModule mod_php4.c>
AddType  application/x-httpd-php         .php .php4
AddType  application/x-httpd-php-source  .phps
</IfModule>
</pre>
<br>
<p>In addition, the PHP directive names for Apache have changed.</p>
<p>Starting with PHP 4.0, there are only four Apache directives that relate to
PHP:</p>
<p><b>php_value [PHP directive name] [value]</b></p>
<p><b>php_flag [PHP directive name] [On|Off]</b></p>
<p><b>php_admin_value [PHP directive name] [value]</b></p>
<p><b>php_admin_flag [PHP directive name] [On|Off]</b></p>
<p>&nbsp;</p>
<p>There are two differences between the Admin values and the non admin values:</p>
<ol>
  <li>Admin values (or flags) can only appear in the Server-wide apache
    configuration files (e.g., httpd.conf).</li>
  <li>Standard values (or flags) cannot control certain PHP directives, for
    example - safe mode (if you could override safe mode settings in .htaccess
    files, it would defeat safe-mode's purpose).&nbsp; In contrast, Admin values
    can modify the value of any PHP directive.</li>
</ol>
<p>To make the transition process easier, PHP 4.0 is bundled with scripts that
automatically convert your Apache configuration and .htaccess files to work with
both PHP 3.0 and PHP 4.0.  These scripts do <b>NOT</b> convert the mime type lines!
You have to convert these yourself.</p>
<p>&nbsp;</p>
<p>To convert your Apache configuration files, run the apconf-conv.sh script
(available in the scripts/apache/ directory).&nbsp; For example:</p>
<p><b>~/php4/scripts/apache:#&nbsp; ./apconf-conv.sh /usr/local/apache/conf/httpd.conf</b></p>
<p>Your original configuration file will be saved in httpd.conf.orig.</p>
<p>To convert your .htaccess files, run the aphtaccess-conv.sh script (available
in the scripts/apache/ directory as well):</p>
<p><b>~/php4/scripts/apache:#&nbsp; find / -name .htaccess -exec ./aphtaccess-conv.sh
{} \;</b></p>
<p>Likewise, your old .htaccess files will be saved with an .orig prefix.</p>
<p>The conversion scripts require awk to be installed.</p>

<? commonFooter(); ?>

